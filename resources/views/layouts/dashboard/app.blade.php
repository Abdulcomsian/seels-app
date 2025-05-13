<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Seels App</title>
    <link rel="preload" href="{{ asset('assets/css/common.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('assets/css/dashboard.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    </noscript>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
        integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .loader {
            border-top-color: #f3c941;
            animation: spin 1s linear infinite;
            --loader-color: #f3c941;
        }

        @keyframes spin {
            0%   { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    @stack('style')
</head>

<body style="opacity: 0; transition: opacity 0.3s;">

    {{-- <div class="loader"></div> --}}

    @include('partials.header')

    <div class="">
        <div class="flex flex-col lg:flex-row">
            @hasrole('admin')
                @include('partials.admin_sidebar')
            @endrole
            @hasrole('customer')
                @include('partials.user_sidebar')
            @endrole
            @yield('content')
        </div>
    </div>
    <div id="page-loader" class="fixed inset-0 bg-white bg-opacity-80 z-50 hidden flex items-center justify-center">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
    </div>
    @include('partials.footer')
    @include('partials.scripts')
    @stack('script')
</body>

</html>
