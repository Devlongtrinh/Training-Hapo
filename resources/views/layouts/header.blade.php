<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="HapoLearn Logo">
        </a>
        <button id="jqueryBtn" class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="btn-cancel active" id="cancel" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-times"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('artribute.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('artribute.all_courses') }}</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item ">
                        <a class="nav-link" href="profile">{{ __('artribute.profile') }}</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li class="nav-item ">
                            <button type="submit" class="btn btn-danger">{{ __('artribute.logout') }}</a></button>
                        </li>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('artribute.login_register') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
