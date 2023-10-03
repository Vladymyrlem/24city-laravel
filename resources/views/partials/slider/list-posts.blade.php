@foreach($posts as $post)
    <div id="post-{{ $post->id }}" class="d-flex flex-row slide-content">
        @if(!empty($post->image))

            @if($routeName === 'company.show')
                {{ $post->title_company }}
            @else
                {{ $post->title }}
            @endif
            <div class="thumb">
                @if (Route::currentRouteName() == 'company.show')
                    <img class="thumb-img" style="visibility: visible" width="60" height="auto" src="{{ $post->thumbnail }}"
                         loading="lazy" alt="">
                @else
                    {{-- Default image --}}
                    <img class="thumb-img" style="visibility: visible" width="60" height="auto" src="{{ $post->image }}"
                         loading="lazy" alt="">
                @endif
            </div>
        @else
            <img class="none-img" width="60" height="60" src="{{ asset('/images/none-image.png') }}" alt="">
        @endif
        <div class="slide-title d-flex flex-column" style="">
            <div class="d-flex flex-row justify-content-between head-slide">
                <a class="post-link" href="{{ route($routeName, $post->id) }}" redirect>
                    @if($routeName === 'company.show')
                        {{ $post->title_company }}
                    @else
                        {{ $post->title }}
                    @endif
                </a>
                {{--            <div class="d-flex"><?php echo do_shortcode('[wp_ulike]'); ?>--}}
                {{--                                <?php--}}
                {{--                                    if (function_exists('wp_ulike_get_post_likes')):--}}
                {{--                                        echo '<span class="likes-count">' . wp_ulike_get_post_likes(get_the_ID()) . '</span>';--}}
                {{--                                    endif;--}}
                {{--                                ?>--}}
                {{--            </div>--}}
            </div>
            @if(!empty($post->excerpt))
                {{ $post->excerpt }}
            @endif
            <div class="post-date">
<span class="public-date">
    {{ $post->created_at }}
</span>
            </div>
        </div>
    </div>
@endforeach
