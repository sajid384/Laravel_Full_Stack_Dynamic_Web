<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Plugins and styles -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- End layout styles -->

    @stack('styles')
</head>

<body>
    <div class="container-scroller">



        <!-- Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="{{ route('dashboard') }}"><img src="{{ asset('images/web_logo.png') }}"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
                        src="{{ asset('images/logo_mini.png') }}" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="{{ asset('images/face15.jpg') }}"
                                    alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    <div>{{ Auth::user()->name }}</div>
                                </h5>
                                <span>Admin</span>
                            </div>
                        </div>
                        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i
                                class="mdi mdi-dots-vertical"></i></a>
                    </div>
                </li>
                <!-- Your Menu Items here -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- Add other menu items as required -->
                <!-- Slider Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.slider.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-image-area"></i>
                        </span>
                        <span class="menu-title">Slider Management</span>
                    </a>
                </li>

                <!-- Offer Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.offers.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-sale"></i>
                        </span>
                        <span class="menu-title">Offer Management</span>
                    </a>
                </li>

                <!-- Menu-Item Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.menu.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-food"></i>
                        </span>
                        <span class="menu-title">Menu Management</span>
                    </a>
                </li>

                <!-- About Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.about.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-information-outline"></i>
                        </span>
                        <span class="menu-title">About Management</span>
                    </a>
                </li>

                <!-- Book Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.bookings.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-book-open-page-variant"></i>
                        </span>
                        <span class="menu-title">Booking Management</span>
                    </a>
                </li>

                <!-- Feedback Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.feedbacks.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-message-text-outline"></i>
                        </span>
                        <span class="menu-title">Feedback Management</span>
                    </a>
                </li>

                <!-- Client Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.clients.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-group-outline"></i>
                        </span>
                        <span class="menu-title">Client Management</span>
                    </a>
                </li>

                <!-- Footer Management -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.footer.index') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-format-align-bottom"></i>
                        </span>
                        <span class="menu-title">Footer Management</span>
                    </a>
                </li>

                <!-- Editor Management -->
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('show.page.editor') }}">
        <span class="menu-icon">
            <i class="mdi mdi-note-text"></i> <!-- You can change icon if needed -->
        </span>
        <span class="menu-title">Editor</span>
    </a>
</li>

            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img
                            src="{{ asset('images/logo-mini.svg') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="{{ asset('images/face15.jpg') }}"
                                        alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                    <div>{{ Auth::user()->name }}</div>
                                    </p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">

                                {{-- Profile --}}
                                <a href="{{ route('profile.edit') }}"
                                    class="dropdown-item preview-item d-flex align-items-center py-2 px-3 gap-2">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 35px; height: 35px;">
                                            <i class="mdi mdi-account text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <span class="preview-subject text-dark">Profile</span>
                                    </div>
                                </a>

                                {{-- Log Out --}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item preview-item d-flex align-items-center py-2 px-3 gap-2 w-100 text-start border-0 bg-transparent">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 35px; height: 35px;">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <span class="preview-subject text-dark">Log Out</span>
                                        </div>
                                    </button>
                                </form>

                            </div>


                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery UI (sortable functionality ke liye zaroori hai) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- jQuery Nested Sortable Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/NestedSortable/2.0.0/jquery.mjs.nestedSortable.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sortable-menu").sortable({
                handle: ".handle",
                placeholder: "sortable-placeholder",
                // update event hata diya taake auto-save na ho
            });

            $("#saveOrder").click(function() {
                saveOrder(); // Sirf button dabane pe order save hoga
            });

            function saveOrder() {
                var order = [];
                $("#sortable-menu .menu-item").each(function(index) {
                    order.push({
                        id: $(this).data("id"),
                        parent_id: $(this).closest("ul").parent(".menu-item").data("id") || 0,
                        position: index + 1
                    });
                });

                $.ajax({
                    url: "{{ route('admin.navlinks.reorder') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: order
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert("Menu order saved successfully!");
                        } else {
                            alert("Something went wrong: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", xhr.responseText);
                        alert("Something went wrong! Please check console.");
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
