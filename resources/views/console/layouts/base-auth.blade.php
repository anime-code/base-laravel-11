<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>{{config('app.name')}} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    @vite(['resources/assets/css/vendor.min.css'])
    @vite(['resources/assets/css/app.min.css'])
    @vite(['resources/assets/css/icons.min.css'])
    @vite(['resources/assets/js/config.js'])
</head>

<body>

@yield('content')

<!-- Vendor js -->
@vite(['resources/assets/js/vendor.min.js'])
<!-- App js -->
@vite(['resources/assets/js/app.js'])

</body>

</html>
