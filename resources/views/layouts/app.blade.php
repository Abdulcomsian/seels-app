<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet" />

    @stack('styles')
</head>

<body class="flex items-center justify-center w-full h-screen m-0 font-raleway">

    {{-- @include('partials.auth-header') <!-- Include the header --> --}}

    {{-- <div class="container mx-auto"> --}}
    @yield('content')
    {{-- </div> --}}

    {{-- @include('partials.auth-footer') <!-- Include the footer --> --}}

    @stack('scripts')
</body>

</html>

<script>
    document.getElementById("rememberMeSwitch").addEventListener("change", (event) => {
        console.log(event.target.checked ? "Remember me enabled" : "Remember me disabled");
    });

    document.getElementById("togglePassword").addEventListener("click", () => {
        let passwordInput = document.getElementById("password");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    });
</script>
