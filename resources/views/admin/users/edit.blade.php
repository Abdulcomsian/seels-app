@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-4 bg-[#f0f1f6]">
        <!-- Body -->
        <h5 class="text-[28px] leading-[24px] font-semibold text-left mb-6">
            Edit
        </h5>
        <main class="w-full max-w-xl mx-auto flex flex-col items-center">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
                    <h1 class="text-[24px] font-bold text-[#333333] leading-36 flex items-center gap-6">
                        Edit User
                    </h1>

                    <div class="mt-6">
                        <label for="first_name" class="block text-base leading-24 text-[#333333] mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter first name" />
                    </div>

                    <div class="mt-6">
                        <label for="last_name" class="block text-base leading-24 text-[#333333] mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter last name" />
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-base leading-24 text-[#333333] mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter email" />
                    </div>

                    <div class="mt-6">
                        <label for="company_name" class="block text-base leading-24 text-[#333333] mb-2">Company Name</label>
                        <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $user->company_name) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter company name" />
                    </div>

                    <div class="mt-6">
                        <label for="phone" class="block text-base leading-24 text-[#333333] mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941]"
                            placeholder="Enter phone number" />
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-base leading-24 text-[#333333] mb-2">Change Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Enter new password" />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-base leading-24 text-[#333333] mb-2">Confirm Password</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-[#F3C941] pr-10"
                                placeholder="Confirm password" />
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-[#F3C941] text-[#000000] text-[14px] font-medium leading-20 h-fit py-2 px-9 rounded-full mt-6 inline-block cursor-pointer">
                        Save
                    </button>
                </div>
            </form>
        </main>
    </div>
@endsection
