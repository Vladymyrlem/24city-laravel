<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Laravel\Socialite\Facades\Socialite;
    use App\Models\User;

    class AuthController extends Controller
    {
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
                    // Additional user data if required
                ]);

                Auth::login($newUser);
            }

            return redirect('/home'); // Change '/home' to the desired URL after successful login
        }
    }
