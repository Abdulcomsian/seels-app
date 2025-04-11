@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@push('style')
    <style>
        @media (min-width: 768px) {
            .md\:w-\[359px\] {
                width: 248px !important;
            }
        }
    </style>
@endpush
@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <h1 class="text-2xl font-semibold inline-block mb-6 mt-1">Campaigns</h1>
        <div class="bg-white shadow w-full">
            <div class="flex flex-col md:flex-row justify-between md:items-center p-4 md:p-8 md:pb-9">
                <!-- Left Section -->
                <div class="flex items-center flex-wrap space-x-4">
                    <span class="text-[#182151] text-[18px] font-semibold">All Campaigns</span>
                    <span class="text-gray-500"> | </span>

                    <div class="relative">
                        <button id="folderDropdownBtn" class="text-gray-600 flex items-center">
                            <svg width="15" height="15" viewBox="0 0 19 19" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
                            <span class="pl-[9px] pr-[3px] text-[18px] text-[#000000]">Compaigns</span>
                            <i class="ri-arrow-drop-down-line text-[18px]"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="folderDropdownMenu" class="hidden absolute bg-white shadow-md rounded-lg mt-2 w-40 z-10">
                            <ul>
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer" onclick="getLeadsByCompaign(0)">
                                    All
                                </li>
                                @foreach ($localCompaignsData as $compaign)
                                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                        onclick="getLeadsByCompaign({{ $compaign->id }})">
                                        {{ $compaign->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- Right Section -->
                <div class="flex items-center flex-wrap gap-[13px] w-auto pt-6 md:pt-0 md:w-[359px] md:h-[35px]">
                    <form method="GET" action="{{ route('reach.index') }}"
                        class="flex items-center justify-between border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px] max-w-[260px]">
                        <input
                            type="text"
                            name="search"
                            id="searchInput"
                            placeholder="Search..."
                            class="outline-none text-gray-400"
                            value="{{ request('search') }}"
                        />
                        <div class="flex justify-center items-center">
                            <span class="text-gray-400"> | </span>
                            <button type="submit" class="ml-2">
                                <i id="searchIcon" class="fas fa-search text-gray-400 transition-colors duration-200"></i>
                            </button>
                        </div>
                    </form>

                    @if (request('search'))
                        <a href="{{ route('reach.index') }}" class="text-sm text-blue-500 hover:text-blue-700">
                            Clear Search
                        </a>
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="bg-white">
                    <thead>
                        <tr class="w-full text-[#000000] font-normal capitalize text-sm leading-normal border-b border-t">
                            <td class="py-3 px-6 text-left">Campaign</td>
                            <td class="py-3 px-6 text-center">Prospects</td>
                            <td class="py-3 px-6 text-center">Delivered</td>
                            <td class="py-3 px-6 text-center">Opened</td>
                            <td class="py-3 px-6 text-center">Responded</td>
                            <td class="py-3 pl-3 text-center">Interest Level</td>
                            <td class="py-3 px-6 text-center"></td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse($campaigns as $campaign)
                            <tr class="border-gray-200 hover:bg-gray-100">
                                <td class="py-3 text-left whitespace-nowrap border-r">
                                    <div class="flex items-center px-3 gap-[15px]">
                                        <svg width="31" height="31" viewBox="0 0 36 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.57471 17.8895V28.0497C4.57471 31.4185 8.27012 33.5462 11.2787 31.9114L15.9497 29.371M4.57471 12.0562V7.72933C4.57471 4.36058 8.27012 2.23287 11.2787 3.86766L29.9628 14.0293C30.6633 14.4018 31.2492 14.9578 31.6577 15.6379C32.0663 16.3179 32.2821 17.0962 32.2821 17.8895C32.2821 18.6828 32.0663 19.4612 31.6577 20.1412C31.2492 20.8212 30.6633 21.3773 29.9628 21.7497L20.6207 26.8306"
                                                stroke="#75D661" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        <div>
                                            <div class="font-medium text-base leading-8 text-[#000000]">
                                                {{ $campaign['name'] }}
                                            </div>
                                            <div class="text-[#000000] leading-5 text-xs">
                                                Sender: {{ $campaign['from_name'] }} ({{ $campaign['from_email'] }})
                                            </div>
                                            <div class="text-[#767680] leading-5 text-xs">
                                                Created On:
                                                {{ \Carbon\Carbon::parse($campaign['created'])->format('M d, Y | H:i') }}
                                            </div>
                                            <div class="flex items-center mt-1">
                                                <span class="bg-[#525B8E2E] text-[#525B8E] text-xs px-2 rounded-full">
                                                    {{ strtoupper($campaign['status']) }}
                                                </span>
                                            </div>
                                            @php
                                                $progress =
                                                    $campaign['stats']['prospects'] > 0
                                                        ? ($campaign['stats']['delivery'] /
                                                                $campaign['stats']['prospects']) *
                                                            100
                                                        : 0;
                                            @endphp
                                            <div class="w-[130px] bg-gray-200 mt-3 rounded-full h-1.5">
                                                <div class="bg-green-500 h-1.5 rounded-full"
                                                    style="width: {{ $progress }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Prospects -->
                                <td class="py-3 text-center">
                                    <div class="flex flex-col items-center px-3">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.8906 19.8557C21.8906 17.7657 20.2206 14.7877 17.8906 14.1287M15.8906 19.8557C15.8906 17.2047 13.2046 13.8557 9.89062 13.8557C6.57663 13.8557 3.89062 17.2047 3.89062 19.8557M15.8906 10.3557C16.6863 10.3557 17.4493 10.0396 18.0119 9.47697C18.5746 8.91436 18.8906 8.1513 18.8906 7.35565C18.8906 6.56 18.5746 5.79694 18.0119 5.23433C17.4493 4.67172 16.6863 4.35565 15.8906 4.35565M12.8906 7.35565C12.8906 8.1513 12.5746 8.91436 12.0119 9.47697C11.4493 10.0396 10.6863 10.3557 9.89062 10.3557C9.09498 10.3557 8.33191 10.0396 7.7693 9.47697C7.2067 8.91436 6.89062 8.1513 6.89062 7.35565C6.89062 6.56 7.2067 5.79694 7.7693 5.23433C8.33191 4.67172 9.09498 4.35565 9.89062 4.35565C10.6863 4.35565 11.4493 4.67172 12.0119 5.23433C12.5746 5.79694 12.8906 6.56 12.8906 7.35565Z"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span class="font-medium">{{ $campaign['stats']['prospects'] }}</span>
                                    </div>
                                </td>
                                <!-- Delivered -->
                                <td class="py-3 text-center">
                                    <div class="flex flex-col items-center px-3">
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8908 3.10965C11.3275 3.11765 10.7708 3.13998 10.2208 3.17665C6.03684 3.45465 2.70484 6.83465 2.43084 11.0766C2.37787 11.9158 2.37787 12.7575 2.43084 13.5967C2.53084 15.1417 3.21384 16.5726 4.01884 17.7806C4.48584 18.6256 4.17784 19.6816 3.69084 20.6036C3.34084 21.2686 3.16484 21.6007 3.30584 21.8407C3.44584 22.0807 3.76084 22.0886 4.38984 22.1036C5.63484 22.1336 6.47384 21.7816 7.13984 21.2906C7.51684 21.0116 7.70584 20.8726 7.83584 20.8566C7.96584 20.8406 8.22284 20.9467 8.73484 21.1567C9.19484 21.3467 9.72984 21.4637 10.2198 21.4967C11.6448 21.5907 13.1338 21.5917 14.5618 21.4967C18.7448 21.2187 22.0768 17.8387 22.3508 13.5967C22.4038 12.7667 22.4038 11.9066 22.3508 11.0766C22.2961 10.2316 22.1168 9.3993 21.8188 8.60665"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M14.3906 6.10565C14.3906 6.10565 15.3906 6.10565 16.3906 8.10565C16.3906 8.10565 19.5676 3.10565 22.3906 2.10565M8.89062 15.1057H15.8906M8.89062 10.1057H12.3906"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span class="font-medium">{{ $campaign['stats']['delivery'] }}</span>
                                    </div>
                                </td>
                                <!-- Opened -->
                                <td class="py-3 text-center">
                                    <div class="flex flex-col items-center px-3">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.39062 11.1057L11.3906 14.6057L16.3906 11.1057" stroke="black"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M1.39063 19.1057V8.23766C1.39062 7.89228 1.48006 7.5528 1.65022 7.25225C1.82038 6.95171 2.06547 6.70035 2.36162 6.52266L10.3616 1.72266C10.6725 1.53615 11.0281 1.43764 11.3906 1.43764C11.7531 1.43764 12.1088 1.53615 12.4196 1.72266L20.4196 6.52266C20.7158 6.70035 20.9609 6.95171 21.131 7.25225C21.3012 7.5528 21.3906 7.89228 21.3906 8.23766V19.1057C21.3906 19.6361 21.1799 20.1448 20.8048 20.5199C20.4298 20.8949 19.9211 21.1057 19.3906 21.1057H3.39062C2.86019 21.1057 2.35148 20.8949 1.97641 20.5199C1.60134 20.1448 1.39063 19.6361 1.39063 19.1057Z"
                                                stroke="black" />
                                        </svg>
                                        <span class="font-medium">{{ $campaign['stats']['opened'] }}</span>
                                    </div>
                                </td>
                                <!-- Responded -->
                                <td class="py-3 text-center">
                                    <div class="flex flex-col items-center px-3">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.8904 9.10565C20.8904 8.61498 20.8851 8.12298 20.8744 7.62964C20.8094 4.56464 20.7764 3.03164 19.6454 1.89664C18.5144 0.760645 16.9404 0.721645 13.7914 0.642645C11.8577 0.59385 9.92313 0.59385 7.98944 0.642645C4.84044 0.721645 3.26644 0.760645 2.13544 1.89664C1.00444 3.03164 0.971437 4.56464 0.905437 7.62964C0.884386 8.61353 0.884386 9.59776 0.905437 10.5816C0.971437 13.6466 1.00444 15.1796 2.13544 16.3146C3.26644 17.4506 4.84044 17.4896 7.98944 17.5686C8.95877 17.5933 9.92544 17.6056 10.8894 17.6056"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M5.89062 5.60565L8.83263 7.34565C10.5476 8.35965 11.2326 8.35965 12.9486 7.34565L15.8906 5.60565M20.8906 19.6057C20.7746 17.0817 20.8776 16.1627 19.2346 14.9857C18.4266 14.4057 16.8016 14.0247 14.6086 14.2307M16.3426 11.6987L14.0456 13.8517C13.9518 13.945 13.8988 14.0717 13.8982 14.204C13.8977 14.3364 13.9496 14.4635 14.0426 14.5577L16.3426 16.7457"
                                                stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span class="font-medium">{{ $campaign['stats']['replied'] }}</span>
                                    </div>
                                </td>
                                <!-- Interest Level -->
                                <td class="py-3 text-center">
                                    <div class="flex justify-center space-x-2 px-3">
                                        <!-- Interested -->
                                        <div>
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_35_123)">
                                                    <path
                                                        d="M12.8906 0.105652C6.26323 0.105652 0.890625 5.47825 0.890625 12.1057C0.890625 18.7331 6.26323 24.1057 12.8906 24.1057C19.518 24.1057 24.8906 18.7331 24.8906 12.1057C24.8906 5.47825 19.518 0.105652 12.8906 0.105652ZM20.2445 19.4596C18.421 21.2776 15.986 22.3516 13.4139 22.4724C10.8418 22.5931 8.31686 21.7519 6.33109 20.1127C4.34532 18.4735 3.04096 16.1537 2.67217 13.6053C2.30338 11.0569 2.89658 8.46245 4.33618 6.32754C5.77579 4.19262 7.95867 2.67014 10.4595 2.05676C12.9603 1.44338 15.5999 1.78304 17.864 3.00955C20.128 4.23606 21.8544 6.26156 22.7066 8.69139C23.5588 11.1212 23.4759 13.7813 22.474 16.1533C21.9518 17.3893 21.1947 18.5122 20.2445 19.4596Z"
                                                        fill="#75D661" />
                                                    <path
                                                        d="M8.01566 9.48065H9.89066V11.3557H8.01566V9.48065ZM15.8907 9.48065H17.7657V11.3557H15.8907V9.48065ZM16.748 14.5057C16.4578 15.2377 15.9539 15.8655 15.3018 16.3069C14.6497 16.7484 13.8797 16.9832 13.0922 16.9807H12.6891C11.9016 16.9832 11.1316 16.7485 10.4795 16.307C9.82733 15.5885 9.32335 15.2378 9.03322 14.5057L8.97327 14.3557H7.35791L7.64066 15.0626C8.04425 16.0716 8.74091 16.9365 9.64077 17.5457C10.5406 18.155 11.6024 18.4806 12.6891 18.4807H13.0922C14.1789 18.4806 15.2407 18.155 16.1406 17.5457C17.0404 16.9365 17.7371 16.0716 18.1407 15.0626L18.4234 14.3557H16.8079L16.748 14.5057Z"
                                                        fill="#75D661" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_35_123">
                                                        <rect width="24" height="24" fill="white"
                                                            transform="translate(0.890625 0.105652)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="font-medium">{{ $campaign['stats']['interested'] }}</span>
                                        </div>

                                        <!-- Maybe Later -->
                                        <div>
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_35_133)">
                                                    <path
                                                        d="M8.39062 16.6057H17.3906V18.1057H8.39062V16.6057ZM12.8906 0.105652C13.9922 0.105652 15.0547 0.246277 16.0781 0.527527C17.1016 0.808777 18.0547 1.21503 18.9375 1.74628C19.8203 2.27753 20.6289 2.90253 21.3633 3.62128C22.0977 4.34003 22.7266 5.14862 23.25 6.04706C23.7734 6.9455 24.1758 7.90253 24.457 8.91815C24.7383 9.93378 24.8828 10.9963 24.8906 12.1057C24.8906 13.2072 24.75 14.2697 24.4688 15.2932C24.1875 16.3166 24.7852 17.2736 23.2617 18.1642C22.7383 19.0549 22.1133 19.8635 21.3867 20.59C20.6602 21.3166 19.8477 21.9416 18.9492 22.465C18.0508 22.9885 17.0938 23.3908 16.0781 23.6721C15.0625 23.9533 14 24.0978 12.8906 24.1057C11.7891 24.1057 10.7266 23.965 9.70312 23.6838C8.67969 23.4025 7.72266 23.0002 6.83203 22.4767C5.94141 21.9533 5.13281 21.3283 4.40625 20.6017C3.67969 19.8752 3.05469 19.0627 2.53125 18.1642C2.00781 17.2658 1.60547 16.3127 1.32422 15.3049C1.04297 14.2971 0.898438 13.2307 0.890625 12.1057C0.890625 11.0041 1.03125 9.94159 1.3125 8.91815C1.59375 7.89471 1.99609 6.93768 2.51953 6.04706C3.04297 5.15643 3.66797 4.34784 4.39453 3.62128C5.12109 2.89471 5.93359 2.26971 6.83203 1.74628C7.73047 1.22284 8.68359 0.820496 9.69141 0.539246C10.6992 0.257996 11.7656 0.113464 12.8906 0.105652ZM12.8906 22.6057C13.8516 22.6057 14.7773 22.4807 15.668 22.2307C16.5586 21.9807 17.3945 21.6291 18.1758 21.176C18.957 20.7228 19.668 20.1721 20.3086 19.5236C20.9492 18.8752 21.4961 18.1682 21.9492 17.4025C22.4023 16.6369 22.7578 15.801 23.0156 14.8947C23.2734 13.9885 23.3984 13.0588 23.3906 12.1057C23.3906 11.1447 23.2656 10.2189 23.0156 9.32831C22.7656 8.43768 22.4141 7.60175 21.9609 6.8205C21.5078 6.03925 20.957 5.32831 20.3086 4.68768C19.6602 4.04706 18.9531 3.50018 18.1875 3.04706C17.4219 2.59393 16.5859 2.23846 15.6797 1.98065C14.7734 1.72284 13.8438 1.59784 12.8906 1.60565C11.9297 1.60565 11.0039 1.73065 10.1133 1.98065C9.22266 2.23065 8.38672 2.58221 7.60547 3.03534C6.82422 3.48846 6.11328 4.03925 5.47266 4.68768C4.83203 5.33612 4.28516 6.04315 3.83203 6.80878C3.37891 7.5744 3.02344 8.41034 2.76562 9.31659C2.50781 10.2228 2.38281 11.1525 2.39062 12.1057C2.39062 13.0666 2.51562 13.9924 2.76562 14.883C3.01562 15.7736 3.36719 16.6096 3.82031 17.3908C4.27344 18.1721 4.82422 18.883 5.47266 19.5236C6.12109 20.1642 6.82812 20.7111 7.59375 21.1642C8.35938 21.6174 9.19531 21.9728 10.1016 22.2307C11.0078 22.4885 11.9375 22.6135 12.8906 22.6057Z"
                                                        fill="#929BD2" />
                                                    <path d="M9.89062 10.2307H8.01562V12.1057H9.89062V10.2307Z"
                                                        fill="#929BD2" />
                                                    <path d="M17.7656 10.2307H15.8906V12.1057H17.7656V10.2307Z"
                                                        fill="#929BD2" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_35_133">
                                                        <rect width="24" height="24" fill="white"
                                                            transform="translate(0.890625 0.105652)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="font-medium">{{ $campaign['stats']['maybe_later'] }}</span>
                                        </div>

                                        <!-- Not Interested -->
                                        <div>
                                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_35_126)">
                                                    <path
                                                        d="M12.8906 0.855652C6.67744 0.855652 1.64062 5.89246 1.64062 12.1057C1.64062 18.3188 6.67744 23.3557 12.8906 23.3557C19.1038 23.3557 24.1406 18.3188 24.1406 12.1057C24.1406 5.89246 19.1038 0.855652 12.8906 0.855652ZM19.7849 18.9999C18.0754 20.7043 15.7926 21.7112 13.3812 21.8244C10.9699 21.9376 8.60272 21.149 6.74106 19.6123C4.8794 18.0755 3.65656 15.9007 3.31082 13.5115C2.96508 11.1224 3.52121 8.69015 4.87084 6.68867C6.22046 4.68719 8.26691 3.25986 10.6114 2.68482C12.9559 2.10978 15.4306 2.4282 17.5531 3.57806C19.6757 4.72791 21.2941 6.62682 22.0931 8.90478C22.8921 11.1827 22.8143 13.6766 21.875 15.9003C21.3855 17.0591 20.6757 18.1118 19.7849 18.9999Z"
                                                        fill="black" />
                                                    <path
                                                        d="M8.01562 9.48065H9.89062V11.3557H8.01562V9.48065ZM15.8906 9.48065H17.7656V11.3557H15.8906V9.48065ZM12.8906 13.6057C11.797 13.6069 10.7485 14.0419 9.97518 14.8152C9.20186 15.5885 8.76687 16.637 8.76562 17.7307H10.2656C10.2656 17.0345 10.5422 16.3668 11.0345 15.8745C11.5268 15.3822 12.1944 15.1057 12.8906 15.1057C13.5868 15.1057 14.2545 15.3822 14.7468 15.8745C15.2391 16.3668 15.5156 17.0345 15.5156 17.7307H17.0156C17.0144 16.637 16.5794 15.5885 15.8061 14.8152C15.0328 14.0419 13.9843 13.6069 12.8906 13.6057Z"
                                                        fill="black" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_35_126">
                                                        <rect width="24" height="24" fill="white"
                                                            transform="translate(0.890625 0.105652)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="font-medium">{{ $campaign['stats']['not_interested'] }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 text-center">
                                    <a class="bg-blue-100 text-[#5EA9F5] font-medium mx-6 px-4 py-1.5 rounded"
                                        href="#">
                                        Stats
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-3 px-6 text-center text-gray-500">No campaigns found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @unless ($isSearch)
            <div class="mt-4">
                {{ $campaigns->links() }}
            </div>
        @endunless
    </div>
@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchIcon = document.getElementById('searchIcon');

        function updateIconColor() {
            if (searchInput.value.trim() !== '') {
                searchIcon.classList.remove('text-gray-400');
                searchIcon.classList.add('text-blue-500'); // or any color you prefer
            } else {
                searchIcon.classList.remove('text-blue-500');
                searchIcon.classList.add('text-gray-400');
            }
        }

        // Initial check
        updateIconColor();

        // Update on input change
        searchInput.addEventListener('input', updateIconColor);
    });
</script>
@endpush
