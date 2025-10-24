<nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <span>GRILLON</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            @foreach ($navLinks->where('parent_id', null) as $parent)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url($parent->url) }}">
                        {{ $parent->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
