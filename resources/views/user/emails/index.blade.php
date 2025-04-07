@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

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
                <h2 class="text-[22px] text-[#182151] font-semibold">Emails</h2>
            </div>
            <div class="border m-6 mt-4 rounded-lg p-4">
                <div class="flex items-center justify-between border-b pb-4">
                    <div class="flex items-center space-x-2">
                        <span class="text-[21px] font-semibold"> 1. </span>
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

                        <span class="text-[21px] font-semibold"> Email </span>
                    </div>
                    <i class="fas fa-chevron-up"> </i>
                </div>
                <div class="mt-4 flex flex-col justify-between lg:flex-row">
                    <div class="w-full pl-3 leading-normal lg:w-7/12 lg:pr-4">
                        <div class="border-b pb-4">
                            <p class="font-semibold text-sm">
                                Subject:
                                <span class="font-normal text-sm">
                                    Potential for expansion abroad</span>
                            </p>
                        </div>

                        <p class="mt-4 pb-3 text-sm leading-normal">
                            Good morning {{ 'FIRST_NAME' }},
                        </p>
                        <p class="mt-2 pb-3 text-sm leading-normal">
                            {{ $userEmail->snippet1 ?? 'I hope you had a wonderful summer holiday. I noticed that you have posted over SNIPPET1 ads in SNIPPET2. This prompted me to ask the following question.' }}
                        </p>
                        <p class="mt-2 pb-3 text-sm leading-normal">
                            {{ $userEmail->snippet2 ?? 'Has the CPA per ad increased for you in recent months? And could you be missing out on markets that might be very interesting for COMPANY\'s product? We create ad creatives for Meta and TikTok in eight different languages. We guarantee that new content is always being created and tested.' }}
                        </p>
                        <p class="mt-2 pb-3 text-sm leading-normal">
                            {{ $userEmail->snippet3 ?? 'Based on your products, I see a few opportunities. I\'d love to show you how you can advertise effectively in multiple countries in the right language without spending more on content. Shall we schedule a brief 30-minute online call? I can show you the details.' }}
                        </p>
                        <p class="mt-2 pb-3 text-sm leading-normal">
                            {{ $userEmail->snippet4 ?? 'Would next Thursday, late afternoon work? How about 3:00 p.m.?' }}
                        </p>
                    </div>

                    <div class="w-full lg:w-1/3 lg:border rounded-lg mt-4 lg:mt-0">
                        <div class="flex items-center justify-between p-4 border-b-[0.5px] bg-[#D9D9D917]">
                            <p class="text-base" style="font-family: Arial, Helvetica, sans-serif">
                                Comments (0)
                            </p>
                            <button
                                class="relative flex items-center justify-center gap-2 rounded-md border-[#C6C5D0] border-[0.5px] w-[55px] h-[25px] px-1">
                                <p class="text-xs text-[#767680]">All</p>
                                <i class="fas fa-chevron-down text-[10px] text-[#767680]">
                                </i>
                            </button>
                        </div>
                        <div id="chatContainer" class="p-4 space-y-4 overflow-y-auto max-h-80">

                        </div>
                        <div class="flex items-center border-t-[0.5px] borde">
                            <textarea id="message-input" class="flex-1 pt-1 pl-2 focus:outline-none text-xs text-[#46464F]"
                                placeholder="Add a Comment" type="text" rows="5" cols="10"></textarea>
                            <button id="send-btn" class="text-gray-500 px-3 pb-0 pt-9">
                                <svg width="29" height="29" viewBox="0 0 29 29" fill="none"
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
    <script>
        $(document).ready(function() {
            // Function to Load Messages
            function loadMessages() {
                $.ajax({
                    url: "{{ route('fetchMessages') }}",
                    type: "GET",
                    success: function(response) {
                        $("#chatContainer").html(""); // Clear chat box

                        let commentCount = response.length;
                        $("#comment-count").text(`Comments (${commentCount})`); // Update comment count

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
                        </div>
                    `);
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


            // Load Messages Initially
            loadMessages();

            // Send Message on Button Click
            $("#send-btn").click(function() {
                let messageText = $("#message-input").val();
                if (messageText.trim() === "") return;

                $.ajax({
                    url: "{{ route('sendMessage') }}",
                    type: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    data: JSON.stringify({
                        message: messageText
                    }),
                    success: function(response) {
                        $("#message-input").val(""); // Clear input
                        loadMessages(); // Reload messages
                    },
                    error: function(xhr) {
                        console.log("AJAX Error:", xhr.responseText);
                    }
                });
            });

            // Auto Refresh Messages Every 5 Seconds
            setInterval(loadMessages, 5000);
        });
    </script>
@endpush
