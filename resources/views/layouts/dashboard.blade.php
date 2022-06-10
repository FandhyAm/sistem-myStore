<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepand-style')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="/style/main.css">
  @stack('addon-style')


<body>

  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- Sidebard -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="/images/dashboard-store-logo.svg" alt="logo" class="img-fluid my-4" />
        </div>
        <div class="list-group list-group-flush">
          <a href="{{ route('dashboard-page') }}"
            class="list-group-item list-group-item-action {{ (request() ->is('dashboard-page')) ? 'active' : '' }}">
            Dashboard
          </a>
          <a href="{{ route('dashboard-product') }}"
            class="list-group-item list-group-item-action {{ (request() ->is('dashboard-page/product')) ? 'active' : '' }}">
            My Products
          </a>
          </a>
          <a href="{{ route('dashboard-transactions') }}"
            class="list-group-item list-group-item-action {{ (request() ->is('dashboard-page/transactions')) ? 'active' : '' }}">
            Transactions
          </a>
          </a>
          <a href="{{ route('dashboard-setting') }}"
            class="list-group-item list-group-item-action {{ (request() ->is('dashboard-page/store-setting')) ? 'active' : '' }}">
            Store Settings
          </a>
          <a href="{{ route('dashboard-account') }}"
            class="list-group-item list-group-item-action {{ (request() ->is('dashboard-page/store-account')) ? 'active' : '' }}">
            My Account
          </a>
          <a href="route('logout')" onclick=" event.preventDefault(); .closest('form').submit();"
            class="list-group-item list-group-item-action">
            {{ __('Log Out') }}
          </a>
        </div>
      </div>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
      </form>

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
          <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
              &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <!-- Desktop Menu -->
              <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <img src="/images/iconUser.png" alt="" class="rounded-circle mr-2 profile-picture">
                    Hi, {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu">
                    <a href="{{ route('dashboard-page') }}" class="dropdown-item">Dasbhoard</a>
                    <a href="{{ route('dashboard-setting') }}" class="dropdown-item">Settings</a>
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
                    Hi,{{Auth::user()->name}}
                  </a>
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
            </div>
        </nav>

        {{-- content --}}
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  @stack('prepand-scripts')
  <script src="/vendor/jquery/jquery.slim.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();

  </script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    })

  </script>
  @stack('addon-script')
</body>

</html>