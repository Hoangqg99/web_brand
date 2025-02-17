<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="surfside media" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">


    {{-- -- --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('shop/fonts/icomoon/style.css') }}">
    {{-- <link rel="stylesheet" href="fonts/icomoon/style.css"> --}}

    {{-- <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css">') }}">

    {{-- <link rel="stylesheet" href="css/magnific-popup.css"> --}}
    <link rel="stylesheet" href="{{ asset('shop/css/magnific-popup.css') }}">

    {{-- <link rel="stylesheet" href="css/jquery-ui.css"> --}}
    <link rel="stylesheet" href="{{ asset('shop/css/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('shop/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
    {{-- --     --}}

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">




    @stack('styles')
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>




<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">
                <div class="section-menu-left">
                    <div class="box-logo">
                        <div class="site-logo">
                            <a href="{{ route('admin.index') }}" id="site-logo-inner" class="js-logo-clone"
                                data-dark="{{ asset('images/logo/logo.png') }}">
                                <h3>Dashboard</h3>
                            </a>
                        </div>

                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('home.index') }}" class="">
                                        <div class="icon"><i class="icon-home"></i></div>
                                        <div class="text">Home Shop</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.products') }}" class="menu-item-button">
                                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                                        <div class="text">Products</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.brands') }}" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Brand</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.categories') }}" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Category</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('admin.orders') }}" class="menu-item-button">
                                        <div class="icon"><i class="icon-file-plus"></i></div>
                                        <div class="text">Order</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.slides') }}" class="">
                                        <div class="icon"><i class="icon-image"></i></div>
                                        <div class="text">Slider</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.coupons') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Coupons</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('admin.contacts') }}" class="">
                                        <div class="icon"><i class="icon-mail"></i></div>
                                        <div class="text">Messages</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="{{ route('admin.users') }}" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">User</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}" class=""
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">Logout</div>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    <img class="" id="logo_header_mobile" alt=""
                                        src="{{ asset('images/logo/logo.png') }}"
                                        data-light="{{ asset('images/logo/logo.png') }}"
                                        data-dark="{{ asset('images/logo/logo.png') }}" data-width="154px"
                                        data-height="52px" data-retina="{{ asset('images/logo/logo.png') }}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search"
                                            name="name" id="search-input" tabindex="2" value=""
                                            aria-required="true" required="" autocomplete="off">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search">
                                        <ul id="box-content-search">

                                        </ul>
                                    </div>
                                </form>

                            </div>
                            <div class="header-grid">

                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <h6>Notifications</h6>
                                            </li>
                                            <li>
                                                <div class="message-item item-1">
                                                    <div class="image">
                                                        <i class="icon-noti-1"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2"> <a
                                                                href="{{ route('admin.users') }}">Discount
                                                                available</a></div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                                                            at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-2">
                                                    <div class="image">
                                                        <i class="icon-noti-2"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2"> <a
                                                                href="{{ route('admin.users') }}">Account has been
                                                                verified</a></div>
                                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                                                            et</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-3">
                                                    <div class="image">
                                                        <i class="icon-noti-3"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2"> <a
                                                                href="{{ route('admin.orders') }}">Order shipped
                                                            </a></div>
                                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin
                                                            sollicitudin</div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li><a href="{{ route('admin.index') }}" class="tf-button w-full">View
                                                    all</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>




                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('images/avatar/user-1.') }}png"
                                                        alt="">
                                                </span>
                                                <span class="flex flex-col">
                                                    <span class="body-title mb-2">{{ Auth::user()->name }}</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton3">
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="body-title-2">Account</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-mail"></i>
                                                    </div>
                                                    <div class="body-title-2">Inbox</div>
                                                    <div class="number">27</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-file-text"></i>
                                                    </div>
                                                    <div class="body-title-2">Taskboard</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-headphones"></i>
                                                    </div>
                                                    <div class="body-title-2">Support</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="login.html" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        @yield('content')

                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 shop max</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // ajax seach 
        $(function() {
            $("#search-input").on("keyup", function() {
                var searchQuery = $(this).val();

                // Check if the search query length is greater than 2
                if (searchQuery.length > 2) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.search') }}",
                        data: {
                            query: searchQuery
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#box-content-search").html('');
                            $.each(data, function(index, item) {
                                var url =
                                    "{{ route('admin.product.edit', ['id' => 'product_id']) }}";
                                var link = url.replace("product_id", item.id);
                                $("#box-content-search").append(`
                                                <li>
                                                    <ul>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                        <img src="{{ asset('uploads/products/thumbnails') }}/${item.image}" alt="${item.name}">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                        <div class="name">
                                                            <a href="${link}" class="body-text">${item.name}</a>
                                                        </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    </ul>
                                                </li>`);
                            });
                        },
                        error: function() {
                            console.error(
                                "An error occurred during the search process."
                            ); // Improved error message
                        }
                    });
                }
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
