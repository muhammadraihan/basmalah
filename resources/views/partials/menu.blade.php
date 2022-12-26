<ul id="js-nav-menu" class="nav-menu">
    <li>
        <a href="{{route('backoffice.dashboard')}}" title="Dashboard" data-filter-tags="dashboard">
            <i class="fal fa-desktop"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{route('home.index')}}" title="Home" data-filter-tags="home">
            <i class="fal fa-home"></i>
            <span class="nav-link-text">Home</span>
        </a>
    </li>
    <li>
        <a href="{{route('hotel.index')}}" title="Hotel" data-filter-tags="hotel">
            <i class="fal fa-building"></i>
            <span class="nav-link-text">Hotel</span>
        </a>
    </li>
    <li>
        <a href="{{route('about.index')}}" title="About" data-filter-tags="about">
            <i class="fal fa-home"></i>
            <span class="nav-link-text">About</span>
        </a>
    </li>
    <li>
        <a href="{{route('transport.index')}}" title="Transportasi" data-filter-tags="tranpsortasi">
            <i class="fal fa-plane"></i>
            <span class="nav-link-text">Transportasi</span>
        </a>
    </li>
    <li>
        <a href="{{route('paket.index')}}" title="Daftar Paket" data-filter-tags="paket">
            <i class="fal fa-box"></i>
            <span class="nav-link-text">Daftar Paket Keberangkatan</span>
        </a>
    </li>
    <li>
        <a href="{{route('brosur.index')}}" title="Brosur" data-filter-tags="brosur">
            <i class="fal fa-file-image"></i>
            <span class="nav-link-text">Brosur</span>
        </a>
    </li>
    <li>
        <a href="{{route('youtube.index')}}" title="Youtube" data-filter-tags="youtube">
            <i class="fal fa-caret-circle-right"></i>
            <span class="nav-link-text">Link Youtube</span>
        </a>
    </li>
    <li>
        <a href="#" title="Master Data" data-filter-tags="Master Data">
            <i class="fal fa-exchange"></i>
            <span class="nav-link-text">Master Data</span>
        </a>
        <ul>
            <li>
                <a href="{{route('kategori.index')}}" title="Kategori" data-filter-tags="kategori">
                    <i class="fal fa-exchange"></i>
                    <span class="nav-link-text">Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{route('namapaket.index')}}" title="Nama Paket" data-filter-tags="namapaket">
                    <i class="fal fa-money-bill-alt"></i>
                    <span class="nav-link-text">Nama Paket</span>
                </a>
            </li>
        </ul>
    </li>
    @isset($menu)
    @foreach ($menu as $parent_menu)
    <li class="">
        <a href="{{$parent_menu->route_name ? route($parent_menu->route_name): '#'}}"
            title="{{$parent_menu->menu_title ? $parent_menu->menu_title:''}}">
            <i class="{{$parent_menu->icon_class ? $parent_menu->icon_class:''}}"></i>
            <span class="nav-link-text">{{$parent_menu->menu_title ?$parent_menu->menu_title:''}}</span>
        </a>
        @if (count($parent_menu->childs))
        <ul>
            @include('partials.submenu',['submenu' => $parent_menu->childs])
        </ul>
        @endif
    </li>
    @endforeach
    @endisset
</ul>