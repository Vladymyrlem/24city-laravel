@extends('layouts.master')

@section('title', 'Афиши')

@section('content')
    <section id="primary" class="bizov-container d-flex flex-column mx-auto row">
        {{ get_sidebar('head-left') }}
        <div class="content-area col-12 row">
            {{ get_sidebar('left-main') }}
            <main id="main" class="single-main single-affiche col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="header d-flex"><span id="head-title" class="d-flex">{{ $affiche->title }}</span></div>
                <article id="post-{{ $affiche->id }}" class="affiche-post" style="">
                    <div class="public-content" style="">
                        <div class="entry-thumbnail" style="padding: 6px 0;">
                            @if ( !empty($affiche->image) )
                                <img class="thumb-img" style="visibility: visible;max-width: 150px" width="auto" height="100%" src="{{ asset($affiche->image) }}" alt="">
                            @else
                                <img class="thumb-img" width="auto" height="auto" src="{{ asset('/images/none-image.png') }}" alt="none image">
                            @endif
                        </div>
                        <div class="entry-content">
                            {!! $affiche->content !!}
                            <div class="subscription-news d-flex flex-row">
                                <span>Хочеш дізнатися більше? Підписуйся на <a href="https://t.me/joinchat/B8Pq6YSoeWswZWFi">Telegram канал Чернігів24</a> </span></div>
                            <div class="d-flex flex-row justify-content-between">
                                <div class="left-title d-flex">
                                    {{--                                    <?php echo do_shortcode('[post-views]');?>--}}
                                    {{--                                    <?php echo '<span class="comm-count"><img class="comm-ico" width="16" height="16" src="'.get_template_directory_uri().'/images/comments.png" alt="">'.do_shortcode('[andreyex_total_comments]').'</span>';?>--}}
                                    {{--                                    <div class="d-flex"><?php echo do_shortcode('[wp_ulike]'); ?>--}}
                                    {{--                                                        <?php--}}
                                    {{--                                                            if(function_exists('wp_ulike_get_post_likes')):--}}
                                    {{--                                                                echo '<span class="likes-count">'.wp_ulike_get_post_likes(get_the_ID()).'</span>';--}}
                                    {{--                                                            endif;--}}
                                    {{--                                                        ?>--}}
                                    {{--                                    </div>--}}
                                </div>
                                <div class="right-title d-flex">
                                    <span>Поделиться:&nbsp;&nbsp;</span>
                                    {{--                                    <?php echo do_shortcode('[TheChamp-Sharing]');?>--}}
                                </div>
                            </div>
                        </div>
                        {{--                        <?php comments_template();?>--}}
                    </div>
                </article>


            </main>
            <div class="advertising-block">
                <a href="https://24city.cn.ua/kontakty/" class="advertising-place" redirect>
                    Місце для вашої реклами
                </a>
            </div>
            <div id="related-news" class="related-news related-post-slider">
                {{--                <?php echo do_shortcode('[related_news type="mainnews" posts="36" orderby="date" order="desc"]'); ?>--}}
            </div>
        </div>
    </section>

@endsection

