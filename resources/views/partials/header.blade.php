<header class="bg-white text-gray-700 px-10 shadow sticky top-0 z-30 w-full h-8.3vh">
    <div class="flex items-center justify-between">
        <div class="logo headerLeftSide w-[130px] h-[58px]">
            <img src="{{ asset('assets/images/LogoSvg.svg') }}" alt="Logo" />
        </div>

        <div class="headerRightSide flex items-center gap-6">
            <div class="notificationIcon cursor-pointer z-0 w-[48px] h-[48px] rounded-md bg-[#fefaf1] flex items-center justify-center relative">
                <img src="{{ asset('assets/images/Notification.svg') }}" alt="Notifications" class="z-10" />
                <div class="dot bg-red-500 w-2 h-2 rounded-full absolute top-1 right-1"></div>
            </div>

            <!-- Profile Section -->
            <div class="relative">
                <div class="profileSec flex items-center gap-4 cursor-pointer" onclick="toggleDropdown()">
                    <div class="profileImg bg-gray-300 w-[48px] h-[48px] rounded-full overflow-hidden">
                        <img src="{{ asset('assets/images/userImg.png') }}" alt="User" class="object-cover w-full h-full" />
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <div class="flex items-center">
                            <span class="text-base text-[#151D48] font-medium">{{ Auth::user()->name }}</span>
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2">
                                <path d="M4.00244 6.0415L8.00244 10.0415L12.0024 6.0415" stroke="#151D48" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="text-sm text-[#737791] font-raleway">User</span>
                    </div>
                </div>

                <!-- Dropdown Menu -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md border border-gray-200">
                    <ul class="py-2">
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Profile</a>
                        </li> --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function toggleDropdown() {
        document.getElementById('profileDropdown').classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        var dropdown = document.getElementById('profileDropdown');
        var profileSec = document.querySelector('.profileSec');
        if (!profileSec.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
