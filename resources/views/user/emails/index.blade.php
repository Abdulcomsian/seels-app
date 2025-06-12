@extends('layouts.dashboard.app')

@section('title', 'Email Layouts')

@section('content')










<div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
    <h1 class="text-[28px] leading-24 font-bold text-[#211C37] mb-6">
        Build
    </h1>
    <div class="flex items-center space-x-2 gap-4">
        <a class="text-[16px] text-[#475569] font-medium px-[12px] py-2 cursor-pointer border-b-[3px] hover:border-b-[3px] hover:border-gray-300 dark:hover:text-gray-500"
            href="{{ route('build.index') }}">
            Prospect Check
        </a>
        <span
            class="text-[16px] text-[#1E293B] font-semibold border-b-[3px] border-[#4F46E5] px-[12px] py-2 cursor-pointer inline-block">Emails</span>
    </div>
    <div class="bg-white shadow pb-4">
        <div class="flex justify-between items-center pb-0 p-8">
            <div>
                <h2 class="text-[22px] text-[#182151] font-semibold">Emails</h2>
            </div>
            <div>
                <div class="flex flex-row gap-1 border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px]">
                    <div>
                        <svg width="15" height="15" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mt-1">
                            <g clip-path="url(#clip0_32_4)">
                                <path
                                    d="M15.3872 7.29045C15.0722 7.29045 14.8247 7.04295 14.8247 6.72795V2.36295C14.8247 2.04795 14.5772 1.80045 14.2622 1.80045H4.13721C3.82221 1.80045 3.57471 2.04795 3.57471 2.36295V4.61295C3.57471 4.92795 3.32721 5.17545 3.01221 5.17545C2.69721 5.17545 2.44971 4.92795 2.44971 4.61295V2.36295C2.44971 1.4292 3.20346 0.675446 4.13721 0.675446H14.2622C15.196 0.675446 15.9497 1.4292 15.9497 2.36295V6.72795C15.9497 7.04295 15.7022 7.29045 15.3872 7.29045Z"
                                    fill="black" />
                                <path
                                    d="M16.5122 18.6754H1.88721C0.953457 18.6754 0.199707 17.9217 0.199707 16.9879V5.73795C0.199707 4.8042 0.953457 4.05045 1.88721 4.05045H7.23096C7.41096 4.05045 7.57971 4.1292 7.68096 4.27545L9.19971 6.30045H16.5122C17.446 6.30045 18.1997 7.0542 18.1997 7.98795V16.9879C18.1997 17.9217 17.446 18.6754 16.5122 18.6754ZM1.88721 5.17545C1.57221 5.17545 1.32471 5.42295 1.32471 5.73795V16.9879C1.32471 17.3029 1.57221 17.5504 1.88721 17.5504H16.5122C16.8272 17.5504 17.0747 17.3029 17.0747 16.9879V7.98795C17.0747 7.67295 16.8272 7.42545 16.5122 7.42545H8.91846C8.83082 7.42728 8.74405 7.40776 8.66565 7.36855C8.58725 7.32935 8.51957 7.27166 8.46846 7.20045L6.94971 5.17545H1.88721Z"
                                    fill="black" />
                                <path
                                    d="M6.38721 15.3004H4.13721C3.82221 15.3004 3.57471 15.0529 3.57471 14.7379C3.57471 14.4229 3.82221 14.1754 4.13721 14.1754H6.38721C6.70221 14.1754 6.94971 14.4229 6.94971 14.7379C6.94971 15.0529 6.70221 15.3004 6.38721 15.3004Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_32_4">
                                    <rect width="18" height="18" fill="white"
                                        transform="translate(0.199707 0.675446)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <select name="campaign_id" id="campaignId" class="rounded-lg w-25 focus:outline-none overflow-hidden cursor-pointer">
                            @forelse ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                            @empty
                            <option value="">Select Campaign</option>
                            @endforelse
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <div class="border m-6 mt-4 rounded-lg p-4">
            <div class="flex items-center justify-between border-b pb-4">
                <div class="flex items-center space-x-2 ml-3">
                    <svg width="20.31" height="19.5" viewBox="0 0 23 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.5934 10.2408V16.4754C21.5934 17.6247 21.1369 18.7269 20.3242 19.5396C19.5116 20.3522 18.4094 20.8088 17.2601 20.8088H5.88509C4.73582 20.8088 3.63362 20.3522 2.82096 19.5396C2.0083 18.7269 1.55176 17.6247 1.55176 16.4754V6.72542C1.55176 5.57615 2.0083 4.47395 2.82096 3.66129C3.63362 2.84864 4.73582 2.39209 5.88509 2.39209H13.632"
                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M1.55176 6.82288L9.40592 11.297C10.0625 11.6839 10.8106 11.8878 11.5726 11.8878C12.3346 11.8878 13.0827 11.6839 13.7393 11.297L16.1432 9.93529"
                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M19.1558 6.72538C20.6516 6.72538 21.8642 5.51282 21.8642 4.01705C21.8642 2.52128 20.6516 1.30872 19.1558 1.30872C17.6601 1.30872 16.4475 2.52128 16.4475 4.01705C16.4475 5.51282 17.6601 6.72538 19.1558 6.72538Z"
                            stroke="black" stroke-width="1.5" />
                    </svg>

                    <!-- <span class="text-[21px] font-semibold"> Email </span> -->
                <input type="text" id="emailId" class="text-[21px] font-semibold border border-gray-300 rounded px-2 py-1" value="" required readonly 
            />


                </div>
                {{-- <i class="fas fa-chevron-up"> </i> --}}
            </div>
            <div class="mt-4 flex flex-col justify-between lg:flex-row">
                <div class="w-full pl-3 leading-normal lg:w-7/12 lg:pr-4">
                    <div class="border-b pb-4">
                        <p class="font-semibold text-sm">
                            Subject:
                            <input type="hidden" name="email_format_id" id="emailFormatId" />
                            <span id="subject" class="font-normal text-sm px-1" >
                                {{ 'Potential for expansion abroad' }}
                            </span>
                        </p>
                    </div>

                    <p id="description" class="mt-2 pb-3 px-1 text-sm leading-normal" >
                        {{ 'I hope you had a wonderful summer holiday. I noticed that you have posted over SNIPPET1 ads in SNIPPET2. This prompted me to ask the following question.' }}
                    </p>

                    {{-- <button type="submit" id="saveButton"
                        class="bg-[#F3C941] text-[#000000] text-[14px] font-medium leading-20 h-fit py-2 px-9 rounded-full mt-6 inline-block cursor-pointer">
                        Save
                    </button> --}}
                </div>

                <div class="w-full lg:w-1/3 lg:border rounded-lg mt-4 lg:mt-0">
                    <div class="flex items-center justify-between p-4 border-b-[0.5px] bg-[#D9D9D917]">
                        <p class="text-base" style="font-family: Arial, Helvetica, sans-serif">
                            Comments (<span id="comments-count">0</span>)
                        </p>
                        {{-- <button
                                class="relative flex items-center justify-center gap-2 rounded-md border-[#C6C5D0] border-[0.5px] w-[55px] h-[25px] px-1">
                                <p class="text-xs text-[#767680]">All</p>
                                <i class="fas fa-chevron-down text-[10px] text-[#767680]">
                                </i>
                            </button> --}}
                    </div>
                    <div id="chatContainer" class="p-4 space-y-4 overflow-y-auto max-h-80">

                    </div>
                    <div class="flex items-center border-t-[0.5px] border-gray-300">
                        <textarea id="message-input" class="flex-1 pt-1 pl-2 focus:outline-none text-xs text-[#46464F]"
                            placeholder="Add a Comment" rows="5" cols="10"></textarea>
                        <button id="send-btn" class="text-gray-500 px-3 pb-0 pt-9 disabled">
                            <svg id="send-icon" width="29" height="29" viewBox="0 0 29 29" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.633789" y="0.212891" width="28" height="28" rx="14"
                                    fill="white" />
                                <path
                                    d="M9.97662 17.4677L2.43186 11.4134C2.31654 11.3211 2.23004 11.1977 2.18255 11.0578C2.13506 10.9179 2.12856 10.7673 2.16382 10.6238C2.19909 10.4804 2.27464 10.35 2.38157 10.248C2.48851 10.1461 2.62236 10.0768 2.76735 10.0485L2.87069 10.0353L23.6209 8.78982C23.7546 8.78173 23.8882 8.80848 24.0086 8.86746C24.1289 8.92644 24.2319 9.01563 24.3075 9.12632C24.383 9.23701 24.4286 9.36541 24.4397 9.49897C24.4508 9.63253 24.4271 9.76669 24.3708 9.88833L24.314 9.99031L12.8603 27.3378C12.489 27.8992 11.645 27.7471 11.4696 27.1292L11.4474 27.0287L9.97662 17.4677ZM4.96798 11.4616L10.7683 16.116L16.6965 12.6934C16.8586 12.5998 17.0492 12.5681 17.2329 12.6041C17.4166 12.6401 17.581 12.7414 17.6958 12.8893L17.7548 12.977C17.8484 13.1392 17.8801 13.33 17.8439 13.5138C17.8077 13.6976 17.7061 13.8621 17.5579 13.9768L17.4712 14.0352L11.5412 17.4589L12.6728 24.8088L22.1676 10.4292L4.96798 11.4616Z"
                                    fill="#767680" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white shadow pb-4">
        <div class="flex justify-between items-center pb-0 p-8">
            <div>
                <!-- <h2 class="text-[22px] text-[#182151] font-semibold">Emails</h2> -->
            </div>
            <div>
                <!-- <div class="flex flex-row gap-1 border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px]">
                    <div>
                        <svg width="15" height="15" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="mt-1">
                            <g clip-path="url(#clip0_32_4)">
                                <path
                                    d="M15.3872 7.29045C15.0722 7.29045 14.8247 7.04295 14.8247 6.72795V2.36295C14.8247 2.04795 14.5772 1.80045 14.2622 1.80045H4.13721C3.82221 1.80045 3.57471 2.04795 3.57471 2.36295V4.61295C3.57471 4.92795 3.32721 5.17545 3.01221 5.17545C2.69721 5.17545 2.44971 4.92795 2.44971 4.61295V2.36295C2.44971 1.4292 3.20346 0.675446 4.13721 0.675446H14.2622C15.196 0.675446 15.9497 1.4292 15.9497 2.36295V6.72795C15.9497 7.04295 15.7022 7.29045 15.3872 7.29045Z"
                                    fill="black" />
                                <path
                                    d="M16.5122 18.6754H1.88721C0.953457 18.6754 0.199707 17.9217 0.199707 16.9879V5.73795C0.199707 4.8042 0.953457 4.05045 1.88721 4.05045H7.23096C7.41096 4.05045 7.57971 4.1292 7.68096 4.27545L9.19971 6.30045H16.5122C17.446 6.30045 18.1997 7.0542 18.1997 7.98795V16.9879C18.1997 17.9217 17.446 18.6754 16.5122 18.6754ZM1.88721 5.17545C1.57221 5.17545 1.32471 5.42295 1.32471 5.73795V16.9879C1.32471 17.3029 1.57221 17.5504 1.88721 17.5504H16.5122C16.8272 17.5504 17.0747 17.3029 17.0747 16.9879V7.98795C17.0747 7.67295 16.8272 7.42545 16.5122 7.42545H8.91846C8.83082 7.42728 8.74405 7.40776 8.66565 7.36855C8.58725 7.32935 8.51957 7.27166 8.46846 7.20045L6.94971 5.17545H1.88721Z"
                                    fill="black" />
                                <path
                                    d="M6.38721 15.3004H4.13721C3.82221 15.3004 3.57471 15.0529 3.57471 14.7379C3.57471 14.4229 3.82221 14.1754 4.13721 14.1754H6.38721C6.70221 14.1754 6.94971 14.4229 6.94971 14.7379C6.94971 15.0529 6.70221 15.3004 6.38721 15.3004Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_32_4">
                                    <rect width="18" height="18" fill="white"
                                        transform="translate(0.199707 0.675446)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <select name="campaign_id" id="campaignId" class="rounded-lg w-25 focus:outline-none overflow-hidden cursor-pointer">
                            @forelse ($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                            @empty
                            <option value="">Select Campaign</option>
                            @endforelse
                        </select>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="border m-6 mt-4 rounded-lg p-4">
            <div class="flex items-center justify-between border-b pb-4">
                <div class="flex items-center space-x-2 ml-3">
                    <svg width="20.31" height="19.5" viewBox="0 0 23 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.5934 10.2408V16.4754C21.5934 17.6247 21.1369 18.7269 20.3242 19.5396C19.5116 20.3522 18.4094 20.8088 17.2601 20.8088H5.88509C4.73582 20.8088 3.63362 20.3522 2.82096 19.5396C2.0083 18.7269 1.55176 17.6247 1.55176 16.4754V6.72542C1.55176 5.57615 2.0083 4.47395 2.82096 3.66129C3.63362 2.84864 4.73582 2.39209 5.88509 2.39209H13.632"
                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M1.55176 6.82288L9.40592 11.297C10.0625 11.6839 10.8106 11.8878 11.5726 11.8878C12.3346 11.8878 13.0827 11.6839 13.7393 11.297L16.1432 9.93529"
                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M19.1558 6.72538C20.6516 6.72538 21.8642 5.51282 21.8642 4.01705C21.8642 2.52128 20.6516 1.30872 19.1558 1.30872C17.6601 1.30872 16.4475 2.52128 16.4475 4.01705C16.4475 5.51282 17.6601 6.72538 19.1558 6.72538Z"
                            stroke="black" stroke-width="1.5" />
                    </svg>

                    <!-- <span class="text-[21px] font-semibold"> Email </span> -->
                    <input type="text" id="emailIds" class="text-[21px] font-semibold border border-gray-300 rounded px-2 py-1" value="{{ $emailFormat[1]->email_name ?? 'Email 2' }} "required readonly  />

                </div>
                {{-- <i class="fas fa-chevron-up"> </i> --}}
            </div>
            <div class="mt-4 flex flex-col justify-between lg:flex-row">
                <div class="w-full pl-3 leading-normal lg:w-7/12 lg:pr-4">
                    <div class="border-b pb-4">
                        <p class="font-semibold text-sm">
                            Subject:
                            <input type="hidden" name="email_format_id" id="emailFormatIds" />
                            <span id="subjects" class="font-normal text-sm px-1" >
                                {{ 'Potential for expansion abroad' }}
                            </span>
                        </p>
                    </div>

                    <p id="descriptions" class="mt-2 pb-3 px-1 text-sm leading-normal" >
                        {{ 'I hope you had a wonderful summer holiday. I noticed that you have posted over SNIPPET1 ads in SNIPPET2. This prompted me to ask the following question.' }}
                    </p>

                    {{-- <button type="submit" id="saveButtons"
                        class="bg-[#F3C941] text-[#000000] text-[14px] font-medium leading-20 h-fit py-2 px-9 rounded-full mt-6 inline-block cursor-pointer">
                        Save
                    </button> --}}

                </div>

                <div class="w-full lg:w-1/3 lg:border rounded-lg mt-4 lg:mt-0">
                    <div class="flex items-center justify-between p-4 border-b-[0.5px] bg-[#D9D9D917]">
                        <p class="text-base" style="font-family: Arial, Helvetica, sans-serif">
                            Comments (<span id="comments-counts">0</span>)
                        </p>
                        {{-- <button
                                class="relative flex items-center justify-center gap-2 rounded-md border-[#C6C5D0] border-[0.5px] w-[55px] h-[25px] px-1">
                                <p class="text-xs text-[#767680]">All</p>
                                <i class="fas fa-chevron-down text-[10px] text-[#767680]">
                                </i>
                            </button> --}}
                    </div>
                    <div id="chatContainer1" class="p-4 space-y-4 overflow-y-auto max-h-80">

                    </div>
                    <div class="flex items-center border-t-[0.5px] border-gray-300">
                        <textarea id="message-inputs" class="flex-1 pt-1 pl-2 focus:outline-none text-xs text-[#46464F]"
                            placeholder="Add a Comment"  rows="5" cols="10"></textarea>
                        <button id="send-btns" class="text-gray-500 px-3 pb-0 pt-9 disabled">
                            <svg id="send-icons" width="29" height="29" viewBox="0 0 29 29" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.633789" y="0.212891" width="28" height="28" rx="14"
                                    fill="white" />
                                <path
                                    d="M9.97662 17.4677L2.43186 11.4134C2.31654 11.3211 2.23004 11.1977 2.18255 11.0578C2.13506 10.9179 2.12856 10.7673 2.16382 10.6238C2.19909 10.4804 2.27464 10.35 2.38157 10.248C2.48851 10.1461 2.62236 10.0768 2.76735 10.0485L2.87069 10.0353L23.6209 8.78982C23.7546 8.78173 23.8882 8.80848 24.0086 8.86746C24.1289 8.92644 24.2319 9.01563 24.3075 9.12632C24.383 9.23701 24.4286 9.36541 24.4397 9.49897C24.4508 9.63253 24.4271 9.76669 24.3708 9.88833L24.314 9.99031L12.8603 27.3378C12.489 27.8992 11.645 27.7471 11.4696 27.1292L11.4474 27.0287L9.97662 17.4677ZM4.96798 11.4616L10.7683 16.116L16.6965 12.6934C16.8586 12.5998 17.0492 12.5681 17.2329 12.6041C17.4166 12.6401 17.581 12.7414 17.6958 12.8893L17.7548 12.977C17.8484 13.1392 17.8801 13.33 17.8439 13.5138C17.8077 13.6976 17.7061 13.8621 17.5579 13.9768L17.4712 14.0352L11.5412 17.4589L12.6728 24.8088L22.1676 10.4292L4.96798 11.4616Z"
                                    fill="#767680" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
@push('script')
@vite(['resources/js/app.js'])
<script>
    let userId = "{{ $userId }}";
    // Function to Load Messages
    function loadMessages() {
        let emailFormatId = document.getElementById('emailFormatId').value;
        if (emailFormatId == '') {
            return;
        }
        let actionUrl = `{{ route('fetchMessages', ':id') }}`;
        actionUrl = actionUrl.replace(':id', emailFormatId);
        $.ajax({
            url: actionUrl,
            type: "GET",
            success: function(response) {
                // console.log('alert', response);

                $("#chatContainer").html(""); // Clear chat box

                let commentCount = response.length;
                $("#comments-count").text(commentCount); // Update comment count

                if (commentCount === 0) {
                    $("#chatContainer").html(
                        `<p class="text-center text-gray-500">No comments yet.</p>`);
                } else {
                    response.forEach(function(message) {
                        $("#chatContainer").append(`
                        <div class="border-b-[0.5px] p-2">
                            <div class="flex items-center gap-2">
                                <span class="text-base font-semibold">${message.user}</span>
                                <span class="text-xs text-[#C6C5D0]">${message.time}</span>
                            </div>
                            <p class="mt-1 text-xs">${message.text}</p>
                        </div>`);
                    });

                    // Scroll to the bottom
                    $("#chatContainer").scrollTop($("#chatContainer")[0].scrollHeight);
                }
            },
            error: function(xhr) {
                console.log("Error loading messages:", xhr.responseText);
            }
        });
    }

    // Send Message on Button Click
    $("#send-btn").click(function() {
        let messageText = $("#message-input").val();
        if (messageText.trim() === "") {
            toastr.error("Message cannot be empty!");
            return;
        }
        let emailFormatId = document.getElementById('emailFormatId').value;
        $.ajax({
            url: "{{ route('sendMessage') }}",
            type: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: JSON.stringify({
                message: messageText,
                emailFormatId: emailFormatId
            }),
            success: function(response) {
                $("#message-input").val(""); // Clear input
                // loadMessages(); // Reload messages

                if (Number($("#comments-count").text()) == 0) {
                    $("#chatContainer").html(""); // Clear chat box
                }

                $("#comments-count").text(Number($("#comments-count").text()) + 1);

                $("#chatContainer").append(`
                            <div class="border-b-[0.5px] p-2">
                                <div class="flex items-center gap-2">
                                    <span class="text-base font-semibold">${response.data.user}</span>
                                    <span class="text-xs text-[#C6C5D0]">${response.data.time}</span>
                                </div>
                                <p class="mt-1 text-xs">${response.data.text}</p>
                            </div>`);

                // Optionally scroll to bottom
                $("#chatContainer").scrollTop($("#chatContainer")[0].scrollHeight);
            },
            error: function(xhr) {
                console.log("AJAX Error:", xhr.responseText);
            }
        });
    });

    $("#send-btns").click(function () {
    let messageText = $("#message-inputs").val(); // Corrected ID
    if (messageText.trim() === "") {
        toastr.error("Message cannot be empty!");
        return;
    }

    let emailFormatId = document.getElementById('emailFormatId').value;
    $.ajax({
        url: "{{ route('sendMessage') }}",
        type: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        data: JSON.stringify({
            message: messageText,
            emailFormatId: emailFormatId
        }),
        success: function (response) {
            $("#message-inputs").val(""); // Clear input

            if (Number($("#comments-counts").text()) == 0) {
                $("#chatContainer1").html(""); // Clear chat box
            }

            $("#comments-counts").text(Number($("#comments-counts").text()) + 1);

            $("#chatContainer1").append(`
                <div class="border-b-[0.5px] p-2">
                    <div class="flex items-center gap-2">
                        <span class="text-base font-semibold">${response.data.user}</span>
                        <span class="text-xs text-[#C6C5D0]">${response.data.time}</span>
                    </div>
                    <p class="mt-1 text-xs">${response.data.text}</p>
                </div>`);

            $("#chatContainer1").scrollTop($("#chatContainer1")[0].scrollHeight);
        },
        error: function (xhr) {
            console.log("AJAX Error:", xhr.responseText);
        }
    });
});


    let currentChannel = null;
    const getEmailFormatOfUserByCampaignId = (userId, campaignId) => {
        return new Promise((resolve, reject) => {

            if (campaignId == '') {

                $('#emailFormatId').val('')
                $('#subject').text('')
                $('#description').html('')

                reject('No campaign found');
                return;
            }

            let actionUrl = `{{ route('campaign.email-formats', ['user' => ':userId', 'campaignId' => ':campaignId']) }}`;
            actionUrl = actionUrl.replace(':userId', userId).replace(':campaignId', campaignId);

            $.ajax({
                type: 'GET',
                url: actionUrl,
                dataType: 'json',
                success: function(response) {

                    $('#emailFormatId').val('')
                    $('#subject').text('')
                    $('#description').html('')

                    if (response.status) {
                        $('#emailId').val(response.data[0].email_name);
                        $('#emailIds').val(response.data[1].email_name);
                        $('#emailFormatId').val(response.data[0].id);
                        $('#emailFormatIds').val(response.data[1].id);
                        $('#subject').text(response.data[0].subject);
                        $('#subjects').text(response.data[1].subject);
                        $('#description').html(response.data[0].description.replace(/\n/g, '<br>'));
                        $('#descriptions').html(response.data[1].description.replace(/\n/g, '<br>'));



                        const emailFormatIdVal = response.data.id;
                        if (emailFormatIdVal) {

                            // Leave previous channel
                            if (currentChannel) {
                                window.Echo.leave(`private-comments.${currentChannel}`);
                            }

                            // Subscribe to new channel
                            currentChannel = emailFormatIdVal;

                            window.Echo.private(`comments.${emailFormatIdVal}`)
                                .listen('.new.comment', (event) => {

                                    let response = event.data

                                    if (Number($("#comments-count").text()) == 0) {
                                        $("#chatContainer").html(""); // Clear chat box
                                    }

                                    $("#comments-count").text(Number($("#comments-count").text()) + 1);

                                    $("#chatContainer").append(`
                                                <div class="border-b-[0.5px] p-2">
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-base font-semibold">${response.user}</span>
                                                        <span class="text-xs text-[#C6C5D0]">${response.time}</span>
                                                    </div>
                                                    <p class="mt-1 text-xs">${response.text}</p>
                                                </div>`);

                                    // Optionally scroll to bottom
                                    $("#chatContainer").scrollTop($("#chatContainer")[0].scrollHeight);

                                });
                        } else {
                            console.warn('emailFormatId is not defined');
                        }

                        resolve();
                    } else {
                        reject('Invalid response from server');
                    }
                },
                error: function(xhr) {
                    reject(xhr.responseText);
                }
            });
        });
    };


    // onload campaign
    let campaignIdSelect = document.getElementById('campaignId');
    if (campaignIdSelect) {
        let campaignId = campaignIdSelect.value;
        getEmailFormatOfUserByCampaignId(userId, campaignId).then(() => {
            loadMessages();
        }).catch(error => {
            console.error('Error loading email format:', error);
        });
    }

    // onchange campaign
    $('#campaignId').on('change', function() {
        let campaignId = this.value;
        getEmailFormatOfUserByCampaignId(userId, campaignId).then(() => {
            loadMessages();
        }).catch(error => {
            console.error('Error loading email format:', error);
        });

    })
</script>
@endpush
