<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Auth\Events\Verified;
    use Illuminate\Support\Facades\Auth;
    use Laravel\Socialite\Facades\Socialite;

    class SocialiteController extends Controller
    {
        public function redirect($provider)
        {
            // redirect from social site
            if (request()->input('state')) {
                // already logged in
                // get user info from social site
                $user = Socialite::driver($provider)->user();

                // check for existing user
                $existingUser = User::where('email', $user->getEmail())->first();

                if ($existingUser) {
                    auth()->login($existingUser, true);

                    return redirect()->to('/');
                }

                $newUser = $this->createUser($user);
                auth()->login($newUser, true);
            }

            // request login from social site
            return Socialite::driver($provider)->redirect();
        }


        function createUser($user)
        {
            $user = User::updateOrCreate([
                'email' => $user->getEmail(),
            ], [
                'name' => $user->getName(),
                'password' => '',
                'avatar' => $user->getAvatar(),
            ]);

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }

            return $user;
        }

        public function redirectToGoogle()
        {
            return Socialite::driver('google')->redirect();
        }

        public function handleGoogleCallback()
        {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('email', $user->email)->first();

            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('password'), // Set a default password here
                    // Additional user data if required
                ]);

                Auth::login($newUser);
            }

            return redirect('/home'); // Change '/home' to the desired URL after successful login
        }
    }
