@extends('layouts.master')

@section('content')
    <style type="text/css">
        section #primary-navigation, section#bottom-navigation {
            display: none;
        }

        .front-slider .carousel-post, .first-front-slider-block .carousel-post, .front-slider .slick-slide, .first-front-slider-block .slick-slide, .variants .variant .slide-content {
            background-color: rgb(255, 255, 255);
            height: 90px !important;
            display: flex !important;
            align-items: center !important;
            width: 100% !important;
            max-width: calc(100% - 20px) !important;
            margin: 5px 0px;
            padding: 8px 6px 0px 10px;
            border-radius: 10px;
            flex-flow: row !important;
            border-width: 0px !important;
            border-style: initial !important;
            border-color: initial !important;
            border-image: initial !important;
        }

        .carousel-title {
            color: rgb(0, 0, 0);
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 700;
        }
.front-menu{
	border-style: solid;
	border-width: 1px 0px 1px 0px;
	border-color: #172648;
	transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
	margin-top: 0px;
	margin-bottom: 0px;
	padding: 0px 0px 0px 0px;
}
    </style>
    <div class="wrapper-front">
        <div class="franchises-grid">
            <div class="container-fluid pl-0 pr-0">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('news') }}">Новости</a></h3>
                        <div class="front-slider slider single-item">

                            @foreach($news as $post)
                                @include('partials.slider.news-carousel')
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('ads') }}">Обьявления</a></h3>
                        <div class="front-slider slider single-item">
                            @foreach($ads as $post)
                                @include('partials.slider.ads-carousel')
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('company.company-category') }}">Компании</a></h3>
                        <div class="front-slider slider single-item">
                            @foreach($companies as $post)
                                @include('partials.slider.companies-carousel')
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100 mt-3 mb-3">
            <div class="site-branding col-md-4" style="padding-left: 0; padding-top: 6px">
                @php
                    $logo_img_src = getImageInfo(37416);
                @endphp
                <a href="{{ route('home') }}" rel="home"
                   title="{{ env('APP_NAME') }}">
                    <img class="site-logo"
                         src="{{ asset($logo_img_src['url']) }}"
                         alt="{{ env('APP_TITLE') }}"></a>

            </div>
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Введите значение"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Поиск</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <section class="front-menu"></section>
                <nav id="mega-menu-wrap-main-menu" class="mega-menu-wrap">
                    <ul class="mega-menu max-mega-menu mega-menu-horizontal" id="mega-menu-main-menu">
                        @include('main-menu-items', ['items' => $MyNavBar->roots()])
                    </ul>
                </nav>
            </div>
        </div>
        <div class="franchises-grid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('products') }}">Доставка товаров</a></h3>
                        <div class="front-slider slider single-item">

                            {{--                            @foreach($news as $post)--}}
                            {{--                                @include('partials.slider.news-carousel')--}}
                            {{--                            @endforeach--}}

                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('shares') }}">Акции</a></h3>
                        <div class="front-slider slider single-item">
                            @foreach($shares as $post)
                                @include('partials.slider.shares-carousel')
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <h3 class="carousel-title"><a href="{{ route('main-news') }}">Новости</a></h3>
                        <div class="front-slider slider single-item">
                            @foreach($mainnews as $post)
                                @include('partials.slider.mainnews-carousel')
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="https://cdn.tiny.cloud/1/yb6etqlz0shtx6vy9c2yni2kuv4970cjvtg1pw4k22nyl2sl/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<script>
    jQuery(document).ready(function ($) {

        tinymce.init({
            selector: '#myeditorinstance',
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
        });
    });
</script>
