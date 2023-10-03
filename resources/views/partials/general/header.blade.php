@if (Route::currentRouteName() === 'home')
    <!-- Check if the current route name is 'home' -->
    <header id="header" class="bizov-container" style="min-height: 0;margin-bottom: 0!important">
        @else
            <header id="header" class="bizov-container">
                @endif
                @if (Route::currentRouteName() != 'home') <!-- Check if the current route name is 'home' -->
                <section id="primary-navigation" style="margin-bottom: 0;">
                    @else
                        <section id="primary-navigation">
                            @endif

                            @if (Route::currentRouteName() != 'home')
                                <!-- Check if the current route name is 'home' -->
                                <div class="site-branding" style="padding-left: 0; padding-top: 6px">
                                    @php
                                        $logo_img_src = getImageInfo(37416);
                                    @endphp
                                    <a href="{{ route('home') }}" rel="home"
                                       title="{{ env('APP_NAME') }}">
                                        <img class="site-logo"
                                             src="{{ asset($logo_img_src['url']) }}"
                                             alt="{{ env('APP_TITLE') }}"></a>

                                </div>
                            @endif

                            <?php get_sidebar('head-top-right'); ?>
                        </section>
                        @if (Route::currentRouteName() != 'home') <!-- Check if the current route name is 'home' -->
                        <section id="bottom-navigation" style="margin-bottom: 0!important;">
                            @else
                                <section id="bottom-navigation">
                                    @endif
                                    <!--        --><?php //get_sidebar('head-left');
                                                   ?>
                                    <div class="head-right-container">
                                        <?php
                                            get_sidebar('head-right');
                                        ?>
                                    </div>
                                </section>
            </header>
