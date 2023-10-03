<aside class="widget col-xl-3 col-lg-3 col-md-12 col-xs-12 col-sm-12" id="left-main-sidebar">
    <section id="block-26" class="widget widget_block widget_media_image">
        <figure class="wp-block-image size-full">
            <img decoding="async" width="250" height="400" src="{{ asset('/uploads/2020/11/Baner-polyhrafyia-250kh400.gif') }}" alt=""
                 class="wp-image-19102"></figure>
    </section>
    <section id="block-29" class="widget widget_block widget_media_image">
        <figure class="wp-block-image size-full"><a href="tel:095-533-89-95">
                <img decoding="async" width="250" height="120"
                     src="{{ asset('/uploads/2022/01/ZHurba-2022-1-250kh120.gif') }}" alt="" class="wp-image-49828"></a>
        </figure>
    </section>
    <section id="block-30" class="widget widget_block widget_media_image">
        <figure class="wp-block-image size-full is-resized"><a href="tel:0503837590">
                <img decoding="async" src="{{ asset('/uploads/2021/11/ads_5bb9b273a081b.gif') }}" alt=""
                     class="wp-image-46400" width="250" height="120"></a></figure>
    </section>
    <section id="block-24" class="widget widget_block">
        <hr class="wp-block-separator has-text-color has-background is-style-wide" style="background-color:#172648;color:#172648">
    </section>
    <section id="block-21" class="widget widget_block">
        <pre class="wp-block-preformatted has-text-color has-normal-font-size" style="color:#c20e1a">Последние новости</pre>
    </section>
    <section id="block-17" class="widget widget_block">
        @php
            use App\Models\News\MainNews;
            $news = MainNews::orderBy('id', 'DESC')->paginate(10);
        @endphp
        <ul class="su-posts su-posts-list-loop ">
            @foreach($news as $post)
                <li id="su-post-{{ $post->id }}" class="su-post "><a href="{{ route('main-news.show', $post->id) }}">
                        {{ $post->title }}
                    </a></li>
            @endforeach
        </ul>
    </section>
</aside>
