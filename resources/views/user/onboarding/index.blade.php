@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-4 bg-[#f0f1f6]">
        <!-- Body -->
        <h5 class="text-[28px] leading-[24px] font-semibold text-left mb-6">
            Onboarding
        </h5>
        <main class="w-full max-w-xl mx-auto flex flex-col items-center">
            <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 md:px-20 text-center mb-8">
                <h1 class="text-[20px] font-bold text-[#1B1B1F]">
                    Lorem ipsum dolor
                </h1>
                <p class="text-[14px] leading-22.4 font-normal text-[#46464F] pt-[8px]">
                    Lorem ipsum dolor sit amet consectetur. Arcu ac interdum orci
                    orci
                </p>
            </div>

            <div
                class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8 flex flex-col gap-5 md:flex-row items-center justify-between">
                <div class="flex-1">
                    <h1 class="text-[20px] leading-20 font-bold">
                        Lorem, ipsum dolor
                    </h1>
                    <p class="text-[14px] leading-22.4 text-[#46464F] max-w-[262px]">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Tempora, ipsum!
                    </p>
                </div>
                <span
                    class="bg-[#F3C941] text-[#000000] text-[16px] font-semibold max-h-[49px] w-[188px] py-3 px-5 text-center rounded-full w-[188px]">The
                    Seels Scan</span>
            </div>


            <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
                <form action="{{ route('onboarding.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="email">
                    <h1 class="text-[24px] font-bold text-[#333333] leading-36 flex items-center gap-6">
                        <img src="{{ asset('assets/images/email-multiple.svg') }}" alt="" />
                        Email Box Details
                    </h1>

                    <div class="email mt-6">
                        <label for="email" class="block text-base leading-24 text-[#333333] mb-2">Email</label>
                        <input type="email" name="email_email" id="email_email"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter your Email" required />
                    </div>

                    <div class="password mt-6">
                        <label for="password" class="block text-base leading-24 text-[#333333] mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="email_password" id="email_password"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Enter your password" required />
                            <!-- Eye icon to toggle password visibility -->
                            <button type="button"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
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
                </form>
            </div>


            <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
                <form action="{{ route('onboarding.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="linkedin" value="linkedin">
                    <h1 class="text-[24px] text-[#333333] font-bold leading-36 flex items-center gap-6">
                        <img src="{{ asset('assets/images/linkedin-multiple.svg') }}" alt="" />
                        Linkedln Details
                    </h1>

                    <div class="email mt-6">
                        <label for="email"
                            class="block text-[#333333] text-base leading-24 text-[#333333] mb-2">Email</label>
                        <input type="email" name="linkedin_email" id="linkedin_email"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter your Email" />
                    </div>

                    <div class="password mt-6 relative">
                        <label for="password"
                            class="block text-[#333333] text-base leading-24 text-[#333333] mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="linkedin_password" id="linkedin_password"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Enter your password" />
                            <!-- Eye icon to toggle password visibility -->
                            <button type="button" id="togglePassword password"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg width="17" height="12" viewBox="0 0 17 12" fill="none"
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
                </form>
            </div>
        </main>
    </div>
@endsection
