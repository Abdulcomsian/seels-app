<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User testing Dashboard</title>
    <!-- Updated TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
  </head>
  <body class="bg-gray-100 font-raleway">
    <!-- Header -->
    <header
      class="bg-white text-gray-700 px-10 shadow sticky top-0 z-30 w-full h-8.3vh"
    >
      <div class="flex items-center justify-between">
        <div class="logo headerLeftSide w-[130px] h-[58px]">
          <img src="{{ asset('assets/images/LogoSvg.svg') }}" alt="" />
        </div>

        <div class="headerRightSide flex items-center gap-6">
          <div
            class="notificationIcon cursor-pointer z-0 w-[48px] h-[48px] rounded-md bg-[#fefaf1] flex items-center justify-center relative"
          >
            <img src="{{ asset('assets/images/Notification.svg') }}" alt="" class="z-10" />
            <div
              class="dot bg-red-500 w-2 h-2 rounded-full absolute top-1 right-1"
            ></div>
          </div>
          <div class="profileSec flex items-center gap-4">
            <div
              class="profileImg bg-gray-300 w-[48px] h-[48px] rounded-full overflow-hidden"
            >
              <img
                src="{{ asset('assets/images/userImg.png') }}"
                alt=""
                class="object-cover w-full h-full"
              />
            </div>
            <!-- <div class="flex flex-col justify-between h-[40px]"> -->
            <div class="hidden sm:flex flex-col">
              <div class="flex items-center cursor-pointer">
                <span class="text-base text-[#151D48] font-medium"
                  >John Doe</span
                >
                <svg
                  width="16"
                  height="17"
                  viewBox="0 0 16 17"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="ml-2"
                >
                  <path
                    d="M4.00244 6.0415L8.00244 10.0415L12.0024 6.0415"
                    stroke="#151D48"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </div>
              <span class="text-sm text-[#737791] font-raleway">User</span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Mobile Sidebar Toggle -->
    <div class="lg:hidden bg-white p-4 w-full">
      <button class="text-gray-700" id="hamburgerBtn">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"
          />
        </svg>
      </button>
    </div>

    <div class="">
      <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <nav
          class="text-black hidden lg:block bg-white text-gray-700 w-[100%] lg:w-[250px] px-6 pb-4 lg:min-h-screen"
        >
          <div
            class="flex flex-col items-start h-full overflow-hidden text-black rounded active"
          >
            <div class="w-full px-2">
              <div
                class="flex flex-col items-center w-full border-gray-300 nav-wrap"
              >
                <!-- 1 -->
                <a
                  class="flex items-center justify-start group w-[184px] h-9 mt-3"
                  href="../onboarding/onboarding.html"
                  data-link="onboarding"
                >
                  <div class="rounded-full p-[1px] group-hover:bg-[#F3C941]">
                    <img src="{{ asset('assets/images/Onboarding.svg') }}" alt="icon" class="w-9" />
                  </div>
                  <button
                    class="text-[#000000] font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-12 group-hover:bg-[#F3C941]"
                  >
                    Onboarding
                  </button>
                </a>
                <!-- 2 -->
                <a
                  class="flex items-center justify-start group w-[184px] h-9 mt-3"
                  href="../dashboard/dashboard.html"
                  data-link="dashboard"
                >
                  <div class="rounded-full p-[7px] group-hover:bg-[#F3C941]">
                    <img src="{{ asset('assets/css/dashboard.css') }}" alt="icon" class="w-5" />
                  </div>
                  <button
                    class="text-[#1B1B1F] font-raleway text-sm hover:font-medium rounded-full py-2 px-5 pr-12 group-hover:bg-[#F3C941]"
                  >
                    Dashboard
                  </button>
                </a>
                <!-- 3 -->
                <a
                  class="flex items-center justify-start group w-[184px] h-9 mt-3"
                  href="../build/build.html"
                  data-link="build"
                >
                  <div class="rounded-full p-[1px] group-hover:bg-[#F3C941]">
                    <img src="{{ asset('assets/images/Build.svg') }}" alt="icon" class="w-9" />
                  </div>
                  <button
                    class="text-#000000 items-start font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-[86px] group-hover:bg-[#F3C941]"
                  >
                    Build
                  </button>
                </a>
                <!-- 4 -->
                <a
                  class="flex items-center justify-start group w-[] h-9 mt-3"
                  href="../reach-insight/reach-insight.html"
                  data-link="reach-insight"
                >
                  <div class="rounded-full p-[1px] group-hover:bg-[#F3C941]">
                    <img
                      src="{{ asset('assets/images/ReactAndInsight.svg') }}"
                      alt="icon"
                      class="w-9"
                    />
                  </div>
                  <button
                    class="text-#000000 items-start font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-6 group-hover:bg-[#F3C941]"
                  >
                    Reach & Insight
                  </button>
                </a>
                <!-- 5 -->
                <a
                  class="flex items-center justify-start group w-[] h-9 mt-3"
                  href="../grow/grow.html"
                  data-link="grow"
                >
                  <div class="rounded-full p-[1px] group-hover:bg-[#F3C941]">
                    <img src="{{ asset('assets/images/Grow.svg') }}" alt="icon" class="w-9" />
                  </div>
                  <button
                    class="text-#000000 items-start font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-[90px] group-hover:bg-[#F3C941]"
                  >
                    Grow
                  </button>
                </a>
                <!-- 6 -->
                <a
                  class="flex items-center justify-start group w-[] h-9 mt-3"
                  href="../info/info.html"
                  data-link="info"
                >
                  <div class="rounded-full p-[1px] group-hover:bg-[#F3C941]">
                    <img src="{{ asset('assets/images/Info.svg') }}" alt="icon" class="w-9" />
                  </div>
                  <button
                    class="text-#000000 items-start font-raleway text-sm hover:font-medium rounded-full py-2 px-4 pr-[90px] group-hover:bg-[#F3C941]"
                  >
                    Info
                  </button>
                </a>
                <div>
                  <!-- </div> -->
                  <!--
                <a
                  class="flex items-center w-full h-9 px-3 mt-2 rounded"
                  href="../dashboard/dashboard.html"
                  data-link="dashboard"
                >
                  <img src="../icons/Grow.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Dashboard</span>
                </a>
                <a
                  class="flex items-center w-full h-12 px-3 mt-2 rounded"
                  href="../onboarding/onboarding.html"
                  data-link="onboarding"
                >
                  <img src="../icons/Onboarding.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Onboarding</span>
                </a> -->
                  <!-- <a
                  class="flex items-center w-full h-12 px-3 mt-2 rounded"
                  href="../build/build.html"
                  data-link="build"
                >
                  <img src="../icons/Build.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Build</span>
                </a> -->
                  <!-- <a
                  class="flex items-center w-full h-12 px-3 mt-2 rounded"
                  href="../reach-insight/reach-insight.html"
                  data-link="reach-insight"
                >
                  <img src="../icons/ReactAndInsight.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Reach & Insight</span>
                </a> -->
                  <!-- <a
                  class="flex items-center w-full h-12 px-3 mt-2 rounded"
                  href="../grow/grow.html"
                  data-link="grow"
                >
                  <img src="../icons/Grow.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Grow</span>
                </a> -->
                  <!-- <a
                  class="flex items-center w-full h-12 px-3 mt-2 rounded"
                  href="../info/info.html"
                  data-link="info"
                >
                  <img src="../icons/Info.svg" alt="" />
                  <span class="ml-2 text-sm font-medium">Info</span>
                </a> -->
                </div>
              </div>
            </div>
          </div>
        </nav>

        <!-- Main Content -->
        <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
          <!-- Body -->
          <main>
            <h1 class="mb-1 text-3xl leading-[41px] font-bold text-[#211C37]">
              Hello John Doe 👋🏻
            </h1>
            <p class="mb-5 text-[#85878D] leading-[24px] text-lg">
              Good To have You On Board
            </p>
            <div class="bg-white w-full shadow p-4 mb-5 pr-[25px]">
              <div class="flex items-center justify-between mb-4">
                <h5 class="text-[24px] leading-[32px] font-semibold">
                  Overview
                </h5>
                <div
                  class="flex items-center gap-[10px] bg-[#4072EE1A] py-[10px] px-5 rounded-md w-[125px]"
                >
                  <img src="{{ asset('assets/images/Export.svg') }}" alt="" />
                  <span class="text-[#4072EE] font-medium text-[16px]"
                    >Export</span
                  >
                </div>
              </div>
              <div class="grid grid-cols-1 xl:grid-cols-[70%_29%] gap-4">
                <!-- First Column -->
                <div class="grid gap-4">
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div
                      class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]"
                    >
                      <p
                        class="mb-5 text-[14px] text-[rgba(0, 0, 0, 0.7)] font-medium leading-4 tracking-[-0.15px]"
                      >
                        Emails Sent
                      </p>
                      <div class="flex justify-between">
                        <span class="text-[24px] font-bold leading-6">124</span>
                        <div
                          class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15"
                        >
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                        </div>
                      </div>
                    </div>
                    <div
                      class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]"
                    >
                      <p
                        class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]"
                      >
                        Delivered Emails
                      </p>
                      <div class="flex justify-between">
                        <span class="text-[24px] font-bold leading-6">44</span>
                        <div
                          class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15"
                        >
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                        </div>
                      </div>
                    </div>
                    <div
                      class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]"
                    >
                      <p
                        class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]"
                      >
                        Views
                      </p>
                      <div class="flex justify-between">
                        <span class="text-[24px] font-bold leading-6">32</span>
                        <div
                          class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15"
                        >
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                    <div
                      class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]"
                    >
                      <p
                        class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]"
                      >
                        Bounces
                      </p>
                      <div class="flex justify-between">
                        <span class="text-[24px] font-bold leading-6">24</span>
                        <div
                          class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15"
                        >
                          <img src="../icons/greenDashIcon.svg" alt="" />
                        </div>
                      </div>
                    </div>
                    <div
                      class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]"
                    >
                      <p
                        class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]"
                      >
                        Replies
                      </p>
                      <div class="flex justify-between">
                        <span class="text-[24px] font-bold leading-6">53</span>
                        <div
                          class="w-7 h-7 rounded-full flex items-center justify-center bg-[#EE645A] bg-opacity-15"
                        >
                          <img src="{{ asset('assets/images/redDashIcon.svg') }}" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Second Column -->
                <div class="">
                  <div
                    class="border border-[0.5px] border-[#C6C5D0] p-4 h-full rounded-[8px]"
                  >
                    <div class="flex flex-col justify-between h-full">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                          <img src="{{ asset('assets/images/cil_happy.svg') }}" alt="" />
                          <span class="text-[14px] font-medium"
                            >Interested</span
                          >
                        </div>
                        <div class="flex items-center gap-2">
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                          <span class="text-[18px]">10</span>
                        </div>
                      </div>
                      <hr class="my-5" />
                      <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                          <img src="../icons/notInterested.svg" alt="" />
                          <span class="text-[14px] font-medium">May be</span>
                        </div>
                        <div class="flex items-center gap-2">
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                          <span class="text-[18px]">10</span>
                        </div>
                      </div>
                      <hr class="my-5" />
                      <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                          <img src="{{ asset('assets/images/cil_sad.svg') }}" alt="" />
                          <span class="text-[14px] font-medium"
                            >Not Interested</span
                          >
                        </div>
                        <div class="flex items-center gap-2">
                          <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                          <span class="text-[18px]">10</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Graph Section  -->
            <div class="bg-white w-full shadow p-4">
              <div
                class="flex flex-wrap gap-6 items-center justify-between mb-6"
              >
                <h5 class="text-[24px] text-[#31394D] font-semibold">Graph</h5>
                <div class="flex flex-wrap items-center gap-[10px] pr-[30px]">
                  <span
                    class="text-[#4072EE] bg-[#4072EE]/10 border-[0.5px] border-[#4072EE] text-[14px] text-center pt-[2.5px] rounded-full h-[27px] w-[96px]"
                    >Emails Sent</span
                  >
                  <span
                    class="text-[#29CB97] bg-[#29CB97]/10 border-[0.5px] border-[#29CB97] text-[14px] text-center pt-[2.5px] rounded-full w-[77px] h-[27px]"
                    >Bounces</span
                  >
                  <span
                    class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[126px]"
                    >Delivered Emails</span
                  >
                  <span
                    class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[58px]"
                    >Views</span
                  >
                  <span
                    class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[67px]"
                    >Replies</span
                  >
                </div>
              </div>
              <!-- graph chart  -->
              <canvas
                id="myChart"
                style="width: 100%"
                class="max-h-[500px]"
              ></canvas>
            </div>
          </main>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>
      // Mobile Sidebar Toggle
      const hamburgerBtn = document.getElementById("hamburgerBtn");
      const sidebar = document.querySelector("nav");

      hamburgerBtn.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
      });

      // Toggle Password Visibility
      const togglePassword = document.getElementById("togglePassword");
      const passwordInput = document.getElementById("password");

      togglePassword.addEventListener("click", () => {
        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";
      });
    </script>
  </body>
</html>
