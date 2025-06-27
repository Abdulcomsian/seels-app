@extends('layouts.dashboard.app')

@section('title', 'Onboarding')

@section('content')
<div class="MainContentBody w-full p-4 bg-[#f0f1f6]">
    <h5 class="text-[28px] leading-[24px] font-semibold text-left mb-6">
        Onboarding
    </h5>

    <main class="w-full max-w-xl mx-auto flex flex-col items-center">
        <!-- Email Box Details -->
        <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
            <form action="{{ route('onboarding.store') }}" method="post">
                @csrf

                <h1 class="text-[24px] font-bold text-[#333333] leading-36 flex items-center gap-6">
                    <img src="{{ asset('assets/images/email-multiple.svg') }}" alt="" />
                    Email Box Details
                </h1>

                <div id="email-groups-wrapper" class="mt-6">
                    @forelse($accountDetails as $index => $emailDetail)
                    <div class="email-group mb-6 border p-4 rounded-lg relative">
                        <input type="hidden" name="email_ids[]" value="{{ $emailDetail->id }}">

                        <button type="button"
                            onclick="submitDelete({{ $emailDetail->id }})"
                            class="absolute top-2 right-2 text-yellow-600 font-semibold text-lg">X</button>

                        <label class="block text-base text-[#333333] mb-2 mt-4">Email</label>
                        <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3"
                            placeholder="Enter Email" value="{{ $emailDetail->email_email ?? '' }}" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
                        <div class="relative">
                            <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field"
                                placeholder="Enter your password" value="{{ $emailDetail->email_password ?? '' }}" required />
                            <button type="button"
                                class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none passwordToggle"
                                onclick="togglePassword(this)">

                                <!-- Eye icon -->
                                <svg class="eye-icon block" xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12" fill="none">
                                    <path d="M8.26611 0.153381C4.62975 0.153381 1.5243 2.4152 0.266113 5.60793C1.5243 8.80065 4.62975 11.0625 8.26611 11.0625C11.9025 11.0625 15.0079 8.80065 16.2661 5.60793C15.0079 2.4152 11.9025 0.153381 8.26611 0.153381ZM8.26611 9.24429C6.25884 9.24429 4.62975 7.6152 4.62975 5.60793C4.62975 3.60065 6.25884 1.97156 8.26611 1.97156C10.2734 1.97156 11.9025 3.60065 11.9025 5.60793C11.9025 7.6152 10.2734 9.24429 8.26611 9.24429ZM8.26611 3.42611C7.05884 3.42611 6.0843 4.40065 6.0843 5.60793C6.0843 6.8152 7.05884 7.78974 8.26611 7.78974C9.47339 7.78974 10.4479 6.8152 10.4479 5.60793C10.4479 4.40065 9.47339 3.42611 8.26611 3.42611Z" fill="#DCD9DE" />
                                </svg>

                                <!-- Eye-off icon -->
                                <svg class="eye-off-icon hidden" xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 24 24" fill="none">
                                    <path d="M2 2L22 22M17.94 17.94C16.37 19.18 14.31 20 12 20C7 20 2.73 16.11 1 12C1.68 10.3 2.76 8.79 4.1 7.6M10.67 10.67C10.24 11.11 10 11.68 10 12.3C10 13.74 11.26 15 12.7 15C13.32 15 13.89 14.76 14.33 14.33M9.17 4.26C10.08 4.09 11.03 4 12 4C17 4 21.27 7.89 23 12C22.52 13.11 21.86 14.14 21.06 15.06" stroke="#DCD9DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>

                        <label class="block text-base text-[#333333] mb-2 mt-4">Platform</label>
                        <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3"
                            placeholder="Enter email type" value="{{ $emailDetail->type ?? '' }}" required />
                    </div>
                    @empty
                    <div class="email-group mb-6 border p-4 rounded-lg">
                        <input type="hidden" name="email_ids[]" value="">

                        <label class="block text-base text-[#333333] mb-2">Email</label>
                        <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
                        <div class="relative">
                            <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field" placeholder="Enter Password" required />
                            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">👁</button>
                        </div>

                        <label class="block text-base text-[#333333] mb-2 mt-4">Platform</label>
                        <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email Type" required />
                    </div>
                    @endforelse
                </div>

                <button type="button" onclick="addEmailGroup()" class="mt-2 text-sm text-[#F3C941] hover:underline">
                    + Add More
                </button>

                <button type="submit" class="bg-[#F3C941] text-[#000000] text-[14px] font-medium py-2 px-9 rounded-full mt-6">
                    Save
                </button>

            </form>
        </div>

        <form id="deleteForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <!-- LinkedIn Details -->
        <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8">
            <form action="{{ route('onboarding.store') }}" method="post">
                @csrf
                <input type="hidden" name="linkedin" value="linkedin">

                <h1 class="text-[24px] text-[#333333] font-bold leading-36 flex items-center gap-6">
                    <img src="{{ asset('assets/images/linkedin-multiple.svg') }}" alt="" />
                    LinkedIn Details
                </h1>

                <div class="mt-6">
                    <label for="linkedin_email" class="block text-[#333333] text-base mb-2">Email</label>
                    <input type="email" name="linkedin_email" id="linkedin_email"
                        class="w-full border border-gray-300 rounded-lg p-3"
                        placeholder="Enter your Email" value="{{ old('linkedin_email', $accountDetail->linkedin_email ?? '') }}" required />
                </div>

                <div class="mt-6 relative">
                    <label for="linkedin_password" class="block text-[#333333] text-base mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="linkedin_password" id="linkedin_password"
                            class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field"
                            placeholder="Enter your password" value="{{ old('linkedin_email', $accountDetail->linkedin_password ?? '') }}" required />
                        <button type="button"
                            class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none passwordToggle"
                            onclick="togglePassword(this)">

                            <!-- Eye icon -->
                            <svg class="eye-icon block" xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12" fill="none">
                                <path d="M8.26611 0.153381C4.62975 0.153381 1.5243 2.4152 0.266113 5.60793C1.5243 8.80065 4.62975 11.0625 8.26611 11.0625C11.9025 11.0625 15.0079 8.80065 16.2661 5.60793C15.0079 2.4152 11.9025 0.153381 8.26611 0.153381ZM8.26611 9.24429C6.25884 9.24429 4.62975 7.6152 4.62975 5.60793C4.62975 3.60065 6.25884 1.97156 8.26611 1.97156C10.2734 1.97156 11.9025 3.60065 11.9025 5.60793C11.9025 7.6152 10.2734 9.24429 8.26611 9.24429ZM8.26611 3.42611C7.05884 3.42611 6.0843 4.40065 6.0843 5.60793C6.0843 6.8152 7.05884 7.78974 8.26611 7.78974C9.47339 7.78974 10.4479 6.8152 10.4479 5.60793C10.4479 4.40065 9.47339 3.42611 8.26611 3.42611Z" fill="#DCD9DE" />
                            </svg>

                            <!-- Eye-off icon -->
                            <svg class="eye-off-icon hidden" xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 24 24" fill="none">
                                <path d="M2 2L22 22M17.94 17.94C16.37 19.18 14.31 20 12 20C7 20 2.73 16.11 1 12C1.68 10.3 2.76 8.79 4.1 7.6M10.67 10.67C10.24 11.11 10 11.68 10 12.3C10 13.74 11.26 15 12.7 15C13.32 15 13.89 14.76 14.33 14.33M9.17 4.26C10.08 4.09 11.03 4 12 4C17 4 21.27 7.89 23 12C22.52 13.11 21.86 14.14 21.06 15.06" stroke="#DCD9DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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

@push('script')
<script>
    document.addEventListener('click', function(e) {
        if (e.target.closest('.password-toggle')) {
            const button = e.target.closest('.password-toggle');
            const input = button.closest('.relative').querySelector('.password-field');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    });

    function submitDelete(id) {
        if (confirm("Are you sure you want to delete this email?")) {
            const form = document.getElementById('deleteForm');
            form.action = `/email/delete/${id}`;
            form.submit();
        }
    }

    function addEmailGroup() {
        const wrapper = document.getElementById('email-groups-wrapper');
        const div = document.createElement('div');
        div.className = 'email-group mb-6 border p-4 rounded-lg relative';
        div.innerHTML = `
            <input type="hidden" name="email_ids[]" value="">
            <button type="button" onclick="this.parentNode.remove()" class="absolute top-2 right-2 text-yellow-600 font-semibold text-lg">X</button>

            <label class="block text-base text-[#333333] mb-2 mt-4">Email</label>
            <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter your Email" required />

            <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
            <div class="relative">
                <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field" placeholder="Enter your password" required />
                <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">👁</button>
            </div>

            <label class="block text-base text-[#333333] mb-2 mt-4">Platform</label>
            <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email Type" required />
        `;
        wrapper.appendChild(div);
    }

    function togglePassword(button) {
        const input = button.closest('.relative').querySelector('input');
        const eyeIcon = button.querySelector('.eye-icon');
        const eyeOffIcon = button.querySelector('.eye-off-icon');

        if (input.type === "password") {
            input.type = "text";
            eyeIcon.classList.add('hidden');
            eyeOffIcon.classList.remove('hidden');
        } else {
            input.type = "password";
            eyeIcon.classList.remove('hidden');
            eyeOffIcon.classList.add('hidden');
        }
    }
</script>
@endpush