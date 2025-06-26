@extends('layouts.dashboard.app')

@section('title', 'Onboarding')

@section('content')
<div class="MainContentBody w-full p-4 bg-[#f0f1f6]">
    <h5 class="text-[28px] leading-[24px] font-semibold text-left mb-6">
        Onboarding
    </h5>

    <main class="w-full max-w-xl mx-auto flex flex-col items-center">

        <!-- Introduction Card -->
        <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 md:px-20 text-center mb-8">
            <h1 class="text-[20px] font-bold text-[#1B1B1F]">Lorem ipsum dolor</h1>
            <p class="text-[14px] leading-22.4 font-normal text-[#46464F] pt-[8px]">
                Lorem ipsum dolor sit amet consectetur. Arcu ac interdum orci orci
            </p>
        </div>

        <!-- Highlight Card -->
        <div class="bg-white w-full shadow rounded-[26px] py-8 px-5 mb-8 flex flex-col gap-5 md:flex-row items-center justify-between">
            <div class="flex-1">
                <h1 class="text-[20px] leading-20 font-bold">Lorem, ipsum dolor</h1>
                <p class="text-[14px] leading-22.4 text-[#46464F] max-w-[262px]">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora, ipsum!
                </p>
            </div>
            <span class="bg-[#F3C941] text-[#000000] text-[16px] font-semibold max-h-[49px] w-[188px] py-3 px-5 text-center rounded-full">
                The Seels Scan
            </span>
        </div>

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
                    <!-- <div class="email-group mb-6 border p-4 rounded-lg"> -->
                    <div class="email-group mb-6 border p-4 rounded-lg relative">

                        <!-- <button type="button"
                            onclick="submitDelete({{ $emailDetail->id }})"
                            class="absolute top-2 right-2 text-yellow-600 font-semibold hover:underline text-lg">
                            X
                        </button> -->
                        <button type="button"
                            onclick="submitDelete({{ $emailDetail->id }})"
                            class="absolute top-2 right-2 text-yellow-600 font-semibold text-lg">
                            X
                        </button>

                        <label class="block text-base text-[#333333] mb-2 mt-4">Email Type</label>
                        <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3"
                            placeholder="Enter email type" value="{{ $emailDetail->type ?? '' }}" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Email</label>
                        <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3"
                            placeholder="Enter Email" value="{{ $emailDetail->email_email ?? '' }}" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
                        <div class="relative">
                            <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field"
                                placeholder="Enter your password" value="{{ $emailDetail->email_password ?? '' }}" required />
                            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">
                                👁
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="email-group mb-6 border p-4 rounded-lg">
                        <label class="block text-base text-[#333333] mb-2">Email</label>
                        <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Email Type</label>
                        <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email Type" required />

                        <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
                        <div class="relative">
                            <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field"
                                placeholder="Enter Password" required />
                            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">
                                👁
                            </button>
                        </div>
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
                        <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">
                            👁
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
    // Toggle password visibility for all buttons
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
            form.action = `/email/delete/${id}`; // use route('email.delete', id) if using Laravel named routes in JS
            form.submit();
        }
    }


    function addEmailGroup() {
        const wrapper = document.getElementById('email-groups-wrapper');
        const div = document.createElement('div');
        div.className = 'email-group mb-6 border p-4 rounded-lg relative';
        div.innerHTML = `
      <button type="button"
         onclick="this.parentNode.remove()"
        class="absolute top-2 right-2 text-yellow-600 font-semibold text-lg">
           X
      </button>


        <label class="block text-base text-[#333333] mb-2 mt-4">Email Type</label>
        <input type="text" name="email_types[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter Email Type" required />

        <label class="block text-base text-[#333333] mb-2 mt-4">Email</label>
        <input type="email" name="email_email[]" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Enter your Email" required />

        <label class="block text-base text-[#333333] mb-2 mt-4">Password</label>
        <div class="relative">
            <input type="password" name="email_password[]" class="w-full border border-gray-300 rounded-lg p-3 pr-10 password-field" placeholder="Enter your password" required />
            <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-500 password-toggle">👁</button>
        </div>
    `;
        wrapper.appendChild(div);
    }
</script>