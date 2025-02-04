<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Seels App</title>
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
      integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    @stack('style')
</head>

<body>
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

    @include('partials.footer')

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <script>
        // Mobile Sidebar Toggle
        const hamburgerBtn = document.getElementById("hamburgerBtn");
        const sidebar = document.querySelector("nav");

        hamburgerBtn.addEventListener("click", () => {
            sidebar.classList.toggle("hidden");
        });

        // // Toggle Password Visibility
        // const togglePassword = document.getElementById("togglePassword");
        // const passwordInput = document.getElementById("password");

        // togglePassword.addEventListener("click", () => {
        //     const isPassword = passwordInput.type === "password";
        //     passwordInput.type = isPassword ? "text" : "password";
        // });
    </script>
</body>

</html>
