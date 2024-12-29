@foreach($items as $item)
    <li class="mega-menu-item menu-item">
        <a class="mega-menu-link" href="{!! $item->url() !!}">{!! $item->title !!} </a>
    </li>
@endforeach
