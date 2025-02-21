<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{config('app.name')}} - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="admin">
    <meta name="keyword" content="">
    <meta name="theme-color" content="#ffffff">
    @vite(['resources/assets/vendor/gridjs/theme/mermaid.min.css'])
    @vite(['resources/assets/css/vendor.min.css'])
    @vite(['resources/assets/css/app.min.css'])
    @vite(['resources/assets/css/icons.min.css'])
    @vite(['resources/assets/js/config.js'])
    @stack('styles')
</head>

<body>
<!-- Begin page -->
<div class="wrapper">

    <!-- Menu -->
    <!-- Sidenav Menu Start -->
    @include('console.layouts.common.sidenav')
    <!-- Sidenav Menu End -->

    <!-- Topbar Start -->
    @include('console.layouts.common.header')
    <!-- Topbar End -->

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-transparent">
                <form>
                    <div class="card mb-1">
                        <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">
                            <i class="ri-search-line fs-22"></i>
                            <input type="search" class="form-control border-0" id="search-modal-input"
                                   placeholder="Search for actions, people,">
                            <button type="submit" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">[esc]
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="page-content">


        <div class="page-title-head d-flex align-items-center gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-bold mb-0">Grid Js Tables</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0 fs-13">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>

                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>

                    <li class="breadcrumb-item active">Grid Js Tables</li>
                </ol>
            </div>
        </div>


        <div class="page-container">

            @yield('content')

        </div> <!-- container -->


        <!-- Footer Start -->
        @include('console.layouts.common.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center gap-2 px-3 py-3 offcanvas-header border-bottom border-dashed">
        <h5 class="flex-grow-1 mb-0">Theme Settings</h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body p-0 h-100" data-simplebar>
        <div class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

            <div class="row">
                <div class="col-4">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                               value="light">
                        <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                               for="layout-color-light">
                            <iconify-icon icon="solar:sun-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                </div>

                <div class="col-4">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                               value="dark">
                        <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                               for="layout-color-dark">
                            <iconify-icon icon="solar:cloud-sun-2-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                </div>
            </div>
        </div>

        <div class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fs-16 fw-bold">Topbar Color</h5>

            <div class="row">
                <div class="col-3 darkMode">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light"
                               value="light">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                </div>

                <div class="col-3">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                               value="dark">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                          style="background-color: #313a46;"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                </div>

                <div class="col-3">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand"
                               value="brand">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                </div>

                <div class="col-3">
                    <div class="form-check card-radio">
                        <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-gradient"
                               value="gradient">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                          style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                </div>
            </div>
        </div>

        <div class="p-3 border-bottom border-dashed">
            <h5 class="mb-3 fs-16 fw-bold">Menu Color</h5>

            <div class="row">
                <div class="col-3 darkMode">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-light"
                               value="light">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                </div>

                <div class="col-3">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-dark"
                               value="dark">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                          style="background-color: #313a46;"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                </div>
                <div class="col-3">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-brand"
                               value="brand">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                </div>
                <div class="col-3">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-gradient"
                               value="gradient">
                        <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                          style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                </div>
            </div>
        </div>

        <div class="p-3 .border-bottom .border-dashed">
            <h5 class="mb-3 fs-16 fw-bold">Sidebar Size</h5>

            <div class="row">
                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default"
                               value="default">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-default">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Default</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-compact"
                               value="compact">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-compact">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Compact</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small"
                               value="condensed">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column"
                                              style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Condensed</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                               id="sidenav-size-small-hover" value="sm-hover">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column"
                                              style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Hover View</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                               id="sidenav-size-small-hover-active" value="sm-hover-active">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover-active">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column"
                                              style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Hover Active</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-full"
                               value="full">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-full">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="d-block p-1 bg-dark-subtle mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Full Layout</h5>
                </div>

                <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                        <input class="form-check-input" type="radio" name="data-sidenav-size"
                               id="sidenav-size-fullscreen" value="fullscreen">
                        <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-fullscreen">
                                <span class="d-flex h-100">
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                        </label>
                    </div>
                    <h5 class="fs-14 text-center text-muted mt-2">Hidden</h5>
                </div>
            </div>
        </div>

        <div class="p-3 border-bottom border-dashed d-none">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fs-16 fw-bold mb-0">Container Width</h5>

                <div class="btn-group radio" role="group">
                    <input type="radio" class="btn-check" name="data-container-position" id="container-width-fixed"
                           value="fixed">
                    <label class="btn btn-sm btn-soft-primary w-sm" for="container-width-fixed">Full</label>

                    <input type="radio" class="btn-check" name="data-container-position" id="container-width-scrollable"
                           value="scrollable">
                    <label class="btn btn-sm btn-soft-primary w-sm ms-0" for="container-width-scrollable">Boxed</label>
                </div>
            </div>
        </div>

        <div class="p-3 border-bottom border-dashed d-none">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="fs-16 fw-bold mb-0">Layout Position</h5>

                <div class="btn-group radio" role="group">
                    <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                           value="fixed">
                    <label class="btn btn-sm btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                    <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable"
                           value="scrollable">
                    <label class="btn btn-sm btn-soft-primary w-sm ms-0"
                           for="layout-position-scrollable">Scrollable</label>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2 px-3 py-2 offcanvas-header border-top border-dashed">
        <button type="button" class="btn w-50 btn-soft-danger" id="reset-layout">Reset</button>
        <a href="https://1.envato.market/coderthemes" target="_blank" class="btn w-50 btn-soft-info">Buy Now</a>
    </div>

</div>
</body>
@vite(['resources/assets/js/vendor.min.js'])
@vite(['resources/assets/js/app.js'])
@vite(['resources/assets/vendor/gridjs/gridjs.umd.js'])
@vite(['resources/assets/js/components/table-gridjs.js'])
@stack('scripts')
</html>
