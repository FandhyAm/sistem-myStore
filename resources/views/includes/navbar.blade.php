<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="/" class="nabvar-brand">
            <img src="images/logo.svg" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a href="/" class="nav-link">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link">
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Rewards
                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">
                        Sign Up
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-success text-white px-4 nav-link">
                        Sign In
                    </a>
                </li>
                @endguest
            </ul>

            @auth
            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="/images/iconUser.png
                        " alt="" class="rounded-circle mr-2 profile-picture">
                        Hi, {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu">
                        <a href="{{ route('dashboard-page') }}" class="dropdown-item">Dashboard</a>
                        <a href="{{ route('dashboard-setting-store') }}" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick=" event.preventDefault(); .closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                        @php
                        $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp
                        @if($carts > 0)
                        <img src="../images/icons/cart-filled.svg" alt="">

                        <div class="cart-badge">{{ $carts }}</div>
                        @else
                        <img src="/images/icons/cart-empthy.svg" alt="">
                        @endif
                    </a>
                </li>
            </ul>

            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Hi, {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block">
                        Cart
                    </a>
                </li>
            </ul>
            @endauth
        </div>
</nav>