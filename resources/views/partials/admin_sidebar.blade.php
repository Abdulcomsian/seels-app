<!-- Sidebar -->
<div class="lg:hidden bg-white p-4 w-full">
    <button class="text-gray-700" id="hamburgerBtn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
</div>

<nav class="text-black hidden lg:block bg-white text-gray-700 w-[100%] lg:w-[250px] px-6 pb-4 lg:min-h-screen">
    <div class="flex flex-col items-start h-full overflow-hidden text-black rounded active">
        <div class="w-full px-2">
            <div class="flex flex-col items-center w-full border-gray-300 nav-wrap">
                <!-- 1 -->

                <!-- 2 -->
                <a class="flex items-center justify-start group w-[184px] h-9 mt-3
                {{ request()->routeIs('auth') ? 'bg-[#F3C941] rounded-full' : '' }}"
                    href="{{ route('auth') }}" data-link="dashboard">
                    <div
                        class="rounded-full p-[7px]
                    {{ request()->routeIs('auth') ? 'bg-[#F3C941]' : '' }}
                    group-hover:bg-[#F3C941]">
                        <img src="{{ asset('assets/images/Dashboard.svg') }}" alt="icon" class="w-5" />
                    </div>
                    <button
                        class="text-[#1B1B1F] font-raleway text-sm hover:font-medium rounded-full py-2 px-5 pr-12
                    {{ request()->routeIs('auth') ? 'bg-[#F3C941]' : '' }}
                    group-hover:bg-[#F3C941]">
                        Dashboard
                    </button>
                </a>

                <a class="flex items-center justify-start group w-[184px] h-9 mt-3
{{ request()->routeIs('users.*') ? 'bg-[#F3C941] rounded-full' : '' }}"
                    href="{{ route('users.index') }}" data-link="users">
                    <div
                        class="rounded-full p-[1px]
    {{ request()->routeIs('users.*') ? 'bg-[#F3C941]' : '' }}
    group-hover:bg-[#F3C941]">
                        <img src="{{ asset('assets/images/Build.svg') }}" alt="icon" class="w-9" />
                    </div>
                    <button
                        class="text-[#000000] font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-[86px]
    {{ request()->routeIs('users.*') ? 'bg-[#F3C941]' : '' }}
    group-hover:bg-[#F3C941]">
                        Users
                    </button>
                </a>

                <a class="flex items-center justify-start group w-[184px] h-9 mt-3
{{ request()->routeIs('compaigns.*') ? 'bg-[#F3C941] rounded-full' : '' }}"
                    href="{{ route('compaigns.index') }}" data-link="compaigns">
                    <div
                        class="rounded-full p-[1px]
    {{ request()->routeIs('compaigns.*') ? 'bg-[#F3C941]' : '' }}
    group-hover:bg-[#F3C941]">
                        <img src="{{ asset('assets/images/ReactAndInsight.svg') }}" alt="icon" class="w-9" />
                    </div>
                    <button
                        class="text-[#000000] font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-[86px]
    {{ request()->routeIs('compaigns.*') ? 'bg-[#F3C941]' : '' }}
    group-hover:bg-[#F3C941]">
                        Compaigns
                    </button>
                </a>
                <div>
                </div>
            </div>
        </div>
    </div>
</nav>
