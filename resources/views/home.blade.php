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
            max-width: 320px !important;
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

    </style>
    <div class="wrapper-front">
        <div class="franchises-grid">
            <div class="container-fluid">
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
        <textarea name="content" id="myeditorinstance" cols="30" rows="10"></textarea>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    jQuery(document).ready(function ($) {

        tinymce.init({
            selector: '#myeditorinstance',
            plugins: 'advlist code table lists link image media emoticons codesample save visualblocks',
            menubar: 'insert',
        });
    });
</script>
