<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <p class="text-muted">@current_time</p>
        </div>

        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">{{ $site_title }}</a>
        </div>

        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="mx-3">
                    <circle cx="10.5" cy="10.5" r="7.5"></circle>
                    <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                </svg>
            </a>
            @if(auth()->guest())
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Sign in</a>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Sign up</a>
            @else
                <a class="btn btn-sm btn-warning" href="{{ route('logout') }}">Sign out</a>
            @endif
        </div>
    </div>
</header>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach($links as $title => $url)
            <a class="p-2 text-muted" href="{{ $url }}">{{ $title }}</a>
        @endforeach
    </nav>
</div>
