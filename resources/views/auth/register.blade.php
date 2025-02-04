<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login Page')

@push('styles')
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="flex w-full loginLeft bg-[#f0f1f6]">
        <div class="flex-1 flex items-center justify-center">
            <div
                class="p-10 flex flex-col justify-center shadow-lg bg-white loginFormParent mx-2 lg:mx-0 lg:w-[496px] max-h-[503px] rounded-3xl">
                <div class="logo mb-[22px]">
                    <img src="{{ asset('assets/images/LogoSvg.svg') }}" alt="" />
                </div>
                <form class="MainContentBody">
                    <div class="mb-4">
                        <label for="email" class="block text-base text-[#333333]">
                            Login
                        </label>
                        <input type="email"
                            class="mt-2 block w-full border border-gray-300 rounded-md text-[#808080] shadow-sm p-3"
                            id="email" placeholder="Email or phone number" />
                    </div>


                    <div class="password mt-4 relative">
                        <label for="password"
                            class="block text-[#333333] text-base text-[#333333] leading-24 text-[#333333] mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password"
                                class="w-full border border-gray-300 rounded-lg p-3 text-[#808080] focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10 mb-4"
                                placeholder="Enter your password" />
                            <!-- Eye icon to toggle password visibility -->
                            <button type="button"
                                class="absolute top-6 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.26611 0.153381C4.62975 0.153381 1.5243 2.4152 0.266113 5.60793C1.5243 8.80065 4.62975 11.0625 8.26611 11.0625C11.9025 11.0625 15.0079 8.80065 16.2661 5.60793C15.0079 2.4152 11.9025 0.153381 8.26611 0.153381ZM8.26611 9.24429C6.25884 9.24429 4.62975 7.6152 4.62975 5.60793C4.62975 3.60065 6.25884 1.97156 8.26611 1.97156C10.2734 1.97156 11.9025 3.60065 11.9025 5.60793C11.9025 7.6152 10.2734 9.24429 8.26611 9.24429ZM8.26611 3.42611C7.05884 3.42611 6.0843 4.40065 6.0843 5.60793C6.0843 6.8152 7.05884 7.78974 8.26611 7.78974C9.47339 7.78974 10.4479 6.8152 10.4479 5.60793C10.4479 4.40065 9.47339 3.42611 8.26611 3.42611Z"
                                        fill="#DCD9DE" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4 w-full flex flex-col md:flex-row lg:items-center justify-between">
                        <div class="flex items-center gap-2">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="rememberMeSwitch" class="sr-only peer" />
                                <div
                                    class="w-11 h-6 bg-[#F2F2F2] rounded-full peer-checked:bg-blue-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-400 dark:peer-focus:ring-blue-800">
                                </div>
                                <span
                                    class="absolute left-1 top-0.5 w-5 h-5 bg-white rounded-full shadow transform transition-transform peer-checked:translate-x-5"></span>
                            </label>
                            <span class="py-2 md:py-0"> Remember me</span>
                        </div>
                        <a href="#" class="forgetPassword text-[#007AFF] text-sm">Forgot Password?</a>
                    </div>
                    <a href="../dashboard/dashboard.html"
                        class="my-7 mb-4 block text-center w-full font-semibold text-[16px] text-black py-3 rounded-3xl signInBtn bg-[#EBC23A] rounded-full">
                        Sign in
                    </a>

                    <p class="text-center text-sm md:text-base">
                        Dont have an account?
                        <span class="forgetPassword text-[#007AFF]">Sign up now</span>
                    </p>
                </form>
            </div>
        </div>
        <div class="hidden md:block md:w-1/2">
            <img alt="People working together on a laptop" class="rounded-l-3xl object-cover h-[100vh] w-full"
                src="{{ asset('assets/images/LoginImg.png') }}" />
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById("rememberMeSwitch").addEventListener("change", (event) => {
            console.log(event.target.checked ? "Remember me enabled" : "Remember me disabled");
        });

        document.getElementById("togglePassword").addEventListener("click", () => {
            let passwordInput = document.getElementById("password");
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        });
    </script>
@endpush
