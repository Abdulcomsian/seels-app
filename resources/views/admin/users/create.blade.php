@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-4 bg-[#f0f1f6]">
        <!-- Body -->
        <h5 class="text-[28px] leading-[24px] font-semibold text-left mb-6">
            Create
        </h5>
        <form action="{{ route('users.store') }}" method="post">
            @csrf
        <main class="w-full max-w-xl mx-auto flex flex-col items-center">
                <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
                    <h1 class="text-[24px] font-bold text-[#333333] leading-36 flex items-center gap-6">
                        Create User
                    </h1>

                    <div class="mt-6">
                        <label for="first_name" class="block text-base leading-24 text-[#333333] mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter first name" />
                    </div>

                    <div class="mt-6">
                        <label for="last_name" class="block text-base leading-24 text-[#333333] mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter last name" />
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-base leading-24 text-[#333333] mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter email" />
                    </div>

                    <div class="mt-6">
                        <label for="company_name" class="block text-base leading-24 text-[#333333] mb-2">Company
                            Name</label>
                        <input type="text" id="company_name" name="company_name"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter company name" />
                    </div>

                    <div class="mt-6">
                        <label for="phone" class="block text-base leading-24 text-[#333333] mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter phone number" />
                    </div>

                    <div class="mt-6">
                        <label for="key" class="block text-base leading-24 text-[#333333] mb-2">Woodpeker Key</label>
                        <input type="text" id="key" name="key"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter key" />
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-base leading-24 text-[#333333] mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Enter password" />
                            <!-- Eye icon to toggle password visibility -->
                            <button type="button" id="togglePassword" data-target="password"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none toggle-password">
                                <svg id="eyeIcon" width="17" height="12" viewBox="0 0 17 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.26611 0.153381C4.62975 0.153381 1.5243 2.4152 0.266113 5.60793C1.5243 8.80065 4.62975 11.0625 8.26611 11.0625C11.9025 11.0625 15.0079 8.80065 16.2661 5.60793C15.0079 2.4152 11.9025 0.153381 8.26611 0.153381ZM8.26611 9.24429C6.25884 9.24429 4.62975 7.6152 4.62975 5.60793C4.62975 3.60065 6.25884 1.97156 8.26611 1.97156C10.2734 1.97156 11.9025 3.60065 11.9025 5.60793C11.9025 7.6152 10.2734 9.24429 8.26611 9.24429ZM8.26611 3.42611C7.05884 3.42611 6.0843 4.40065 6.0843 5.60793C6.0843 6.8152 7.05884 7.78974 8.26611 7.78974C9.47339 7.78974 10.4479 6.8152 10.4479 5.60793C10.4479 4.40065 9.47339 3.42611 8.26611 3.42611Z"
                                        fill="#DCD9DE" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-base leading-24 text-[#333333] mb-2">Confirm
                            Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Confirm password" />
                            <!-- Eye icon to toggle password visibility -->
                            <button type="button" id="toggleConfirmPassword" data-target="password_confirmation"
                            class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none toggle-password">
                            <svg id="eyeIcon" width="17" height="12" viewBox="0 0 17 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.26611 0.153381C4.62975 0.153381 1.5243 2.4152 0.266113 5.60793C1.5243 8.80065 4.62975 11.0625 8.26611 11.0625C11.9025 11.0625 15.0079 8.80065 16.2661 5.60793C15.0079 2.4152 11.9025 0.153381 8.26611 0.153381ZM8.26611 9.24429C6.25884 9.24429 4.62975 7.6152 4.62975 5.60793C4.62975 3.60065 6.25884 1.97156 8.26611 1.97156C10.2734 1.97156 11.9025 3.60065 11.9025 5.60793C11.9025 7.6152 10.2734 9.24429 8.26611 9.24429ZM8.26611 3.42611C7.05884 3.42611 6.0843 4.40065 6.0843 5.60793C6.0843 6.8152 7.05884 7.78974 8.26611 7.78974C9.47339 7.78974 10.4479 6.8152 10.4479 5.60793C10.4479 4.40065 9.47339 3.42611 8.26611 3.42611Z"
                                    fill="#DCD9DE" />
                            </svg>
                        </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-[#F3C941] text-[#000000] text-[14px] font-medium leading-20 h-fit py-2 px-9 rounded-full mt-6 inline-block cursor-pointer">
                        Save
                    </button>
                </div>
            </main>
        </form>
    </div>
@endsection
