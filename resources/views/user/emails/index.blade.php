@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
<div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
    <h1 class="text-[28px] leading-24 font-bold text-[#211C37] mb-6">
      Build
    </h1>
    <div class="flex items-center space-x-2 gap-4">
      <a
        class="text-[16px] text-[#475569] font-medium px-[12px] py-2 cursor-pointer border-b-[3px] hover:border-b-[3px] hover:border-gray-300 dark:hover:text-gray-500"
        href="{{ route('build.index') }}"
      >
        Prospect Check
      </a>
      <span
        class="text-[16px] text-[#1E293B] font-semibold border-b-[3px] border-[#4F46E5] px-[12px] py-2 cursor-pointer inline-block"
        >Emails</span
      >
    </div>
    <div class="bg-white shadow pb-4">
      <div class="flex justify-between items-center pb-0 p-8">
        <h2 class="text-[22px] text-[#182151] font-semibold">Emails</h2>
      </div>
      <div class="border m-6 mt-4 rounded-lg p-4">
        <div class="flex items-center justify-between border-b pb-4">
          <div class="flex items-center space-x-2">
            <span class="text-[21px] font-semibold"> 1. </span>
            <svg
              width="20.31"
              height="19.5"
              viewBox="0 0 23 22"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M21.5934 10.2408V16.4754C21.5934 17.6247 21.1369 18.7269 20.3242 19.5396C19.5116 20.3522 18.4094 20.8088 17.2601 20.8088H5.88509C4.73582 20.8088 3.63362 20.3522 2.82096 19.5396C2.0083 18.7269 1.55176 17.6247 1.55176 16.4754V6.72542C1.55176 5.57615 2.0083 4.47395 2.82096 3.66129C3.63362 2.84864 4.73582 2.39209 5.88509 2.39209H13.632"
                stroke="black"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M1.55176 6.82288L9.40592 11.297C10.0625 11.6839 10.8106 11.8878 11.5726 11.8878C12.3346 11.8878 13.0827 11.6839 13.7393 11.297L16.1432 9.93529"
                stroke="black"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M19.1558 6.72538C20.6516 6.72538 21.8642 5.51282 21.8642 4.01705C21.8642 2.52128 20.6516 1.30872 19.1558 1.30872C17.6601 1.30872 16.4475 2.52128 16.4475 4.01705C16.4475 5.51282 17.6601 6.72538 19.1558 6.72538Z"
                stroke="black"
                stroke-width="1.5"
              />
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
                  Potential for expansion abroad</span
                >
              </p>
            </div>

            <p class="mt-4 pb-3 text-sm leading-normal">
              Good morning {{Auth::user()->name}},
            </p>
            <p class="mt-2 pb-3 text-sm leading-normal">
              I hope you had a wonderful summer holiday. I noticed that
              you have posted over SNIPPET1 ads in SNIPPET2. This
              prompted me to ask the following question.
            </p>
            <p class="mt-2 pb-3 text-sm leading-normal">
              Has the CPA per ad increased for you in recent months? And
              could you be missing out on markets that might be very
              interesting for COMPANY's product? We create ad
              creatives for Meta and TikTok in eight different languages.
              We guarantee that new content is always being created and
              tested.
            </p>
            <p class="mt-2 pb-3 text-sm leading-normal">
              Based on your products, I see a few opportunities. I'd love
              to show you how you can advertise effectively in multiple
              countries in the right language without spending more on
              content. Shall we schedule a brief 30-minute online call? I
              can show you the details.
            </p>
            <p class="mt-2 pb-3 text-sm leading-normal">
              Would next Thursday, late afternoon work? How about 3:00
              p.m.?
            </p>
          </div>

          <div class="w-full lg:w-1/3 lg:border rounded-lg mt-4 lg:mt-0">
            <div
              class="flex items-center justify-between p-4 border-b-[0.5px] bg-[#D9D9D917]"
            >
              <p
                class="text-base"
                style="font-family: Arial, Helvetica, sans-serif"
              >
                Comments (3)
              </p>
              <button
                class="relative flex items-center justify-center gap-2 rounded-md border-[#C6C5D0] border-[0.5px] w-[55px] h-[25px] px-1"
              >
                <p class="text-xs text-[#767680]">All</p>
                <i class="fas fa-chevron-down text-[10px] text-[#767680]">
                </i>
              </button>
            </div>
            <div class="p-4 space-y-4 overflow-y-auto max-h-80">
              <div class="border-[#EBEDF4] border-b-[0.5px]">
                <div class="flex items-center gap-2">
                  <span class="text-base font-semibold">
                    Kristin Watson
                  </span>
                  <span class="text-xs text-[#C6C5D0]"> 10:10 AM </span>
                </div>
                <p class="mt-1 text-xs">
                  Going Good. Let's add the option of quick view as well.
                </p>
                <button class="mt-2 text-gray-500">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_116_4872)">
                      <path
                        d="M7.25245 7.25704L7.25251 7.25698L12.5351 1.97434L13.1879 2.46412C13.3064 2.55305 13.3959 2.67505 13.4451 2.81475L13.9167 2.64864L13.4451 2.81475C13.4943 2.95445 13.501 3.1056 13.4644 3.24912L13.4644 3.24926L12.5036 7.02426L12.3449 7.64759H12.9881H18.3215C18.6309 7.64759 18.9276 7.77051 19.1464 7.9893C19.3652 8.2081 19.4881 8.50484 19.4881 8.81426V10.5676V10.5681C19.4883 10.7206 19.4585 10.8716 19.4006 11.0126L16.8217 17.2746C16.7965 17.3357 16.7538 17.3879 16.6989 17.4246C16.644 17.4614 16.5794 17.481 16.5133 17.4809H16.5131H7.48812C7.39971 17.4809 7.31493 17.4458 7.25242 17.3833C7.1899 17.3208 7.15479 17.236 7.15479 17.1476V7.4927C7.15479 7.49267 7.15479 7.49263 7.15479 7.49259C7.15483 7.40423 7.18996 7.31951 7.25245 7.25704ZM12.5863 1.92314C12.5862 1.92331 12.586 1.92348 12.5858 1.92365L12.5863 1.92314ZM2.48812 8.48093H4.48812V17.4809H2.48812C2.39971 17.4809 2.31493 17.4458 2.25242 17.3833C2.1899 17.3208 2.15479 17.236 2.15479 17.1476V8.81426C2.15479 8.72586 2.1899 8.64107 2.25242 8.57856C2.31493 8.51605 2.39971 8.48093 2.48812 8.48093Z"
                        stroke="black"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_116_4872">
                        <rect
                          width="20"
                          height="20"
                          fill="white"
                          transform="translate(0.821289 0.480957)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
              <div class="border-[#EBEDF4] border-b-[0.5px]">
                <div class="flex items-center gap-2">
                  <span class="text-base font-semibold"> You </span>
                  <span class="text-xs text-[#C6C5D0]"> 10:10 AM </span>
                </div>
                <p class="mt-1 text-xs">Noted</p>
                <button class="mt-2">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_116_4872)">
                      <path
                        d="M7.25245 7.25704L7.25251 7.25698L12.5351 1.97434L13.1879 2.46412C13.3064 2.55305 13.3959 2.67505 13.4451 2.81475L13.9167 2.64864L13.4451 2.81475C13.4943 2.95445 13.501 3.1056 13.4644 3.24912L13.4644 3.24926L12.5036 7.02426L12.3449 7.64759H12.9881H18.3215C18.6309 7.64759 18.9276 7.77051 19.1464 7.9893C19.3652 8.2081 19.4881 8.50484 19.4881 8.81426V10.5676V10.5681C19.4883 10.7206 19.4585 10.8716 19.4006 11.0126L16.8217 17.2746C16.7965 17.3357 16.7538 17.3879 16.6989 17.4246C16.644 17.4614 16.5794 17.481 16.5133 17.4809H16.5131H7.48812C7.39971 17.4809 7.31493 17.4458 7.25242 17.3833C7.1899 17.3208 7.15479 17.236 7.15479 17.1476V7.4927C7.15479 7.49267 7.15479 7.49263 7.15479 7.49259C7.15483 7.40423 7.18996 7.31951 7.25245 7.25704ZM12.5863 1.92314C12.5862 1.92331 12.586 1.92348 12.5858 1.92365L12.5863 1.92314ZM2.48812 8.48093H4.48812V17.4809H2.48812C2.39971 17.4809 2.31493 17.4458 2.25242 17.3833C2.1899 17.3208 2.15479 17.236 2.15479 17.1476V8.81426C2.15479 8.72586 2.1899 8.64107 2.25242 8.57856C2.31493 8.51605 2.39971 8.48093 2.48812 8.48093Z"
                        stroke="black"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_116_4872">
                        <rect
                          width="20"
                          height="20"
                          fill="white"
                          transform="translate(0.821289 0.480957)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
              <div class="border-[#EBEDF4] border-b-[0.5px]">
                <div class="flex items-center gap-2">
                  <span class="text-base font-semibold">
                    Kristin Watson
                  </span>
                  <span class="text-xs text-[#C6C5D0]"> 10:10 AM </span>
                </div>
                <p class="mt-1 text-xs">Thanks</p>
                <button class="mt-2">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_116_4872)">
                      <path
                        d="M7.25245 7.25704L7.25251 7.25698L12.5351 1.97434L13.1879 2.46412C13.3064 2.55305 13.3959 2.67505 13.4451 2.81475L13.9167 2.64864L13.4451 2.81475C13.4943 2.95445 13.501 3.1056 13.4644 3.24912L13.4644 3.24926L12.5036 7.02426L12.3449 7.64759H12.9881H18.3215C18.6309 7.64759 18.9276 7.77051 19.1464 7.9893C19.3652 8.2081 19.4881 8.50484 19.4881 8.81426V10.5676V10.5681C19.4883 10.7206 19.4585 10.8716 19.4006 11.0126L16.8217 17.2746C16.7965 17.3357 16.7538 17.3879 16.6989 17.4246C16.644 17.4614 16.5794 17.481 16.5133 17.4809H16.5131H7.48812C7.39971 17.4809 7.31493 17.4458 7.25242 17.3833C7.1899 17.3208 7.15479 17.236 7.15479 17.1476V7.4927C7.15479 7.49267 7.15479 7.49263 7.15479 7.49259C7.15483 7.40423 7.18996 7.31951 7.25245 7.25704ZM12.5863 1.92314C12.5862 1.92331 12.586 1.92348 12.5858 1.92365L12.5863 1.92314ZM2.48812 8.48093H4.48812V17.4809H2.48812C2.39971 17.4809 2.31493 17.4458 2.25242 17.3833C2.1899 17.3208 2.15479 17.236 2.15479 17.1476V8.81426C2.15479 8.72586 2.1899 8.64107 2.25242 8.57856C2.31493 8.51605 2.39971 8.48093 2.48812 8.48093Z"
                        stroke="black"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_116_4872">
                        <rect
                          width="20"
                          height="20"
                          fill="white"
                          transform="translate(0.821289 0.480957)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
              <div class="border-[#EBEDF4] border-b-[0.5px]">
                <div class="flex items-center gap-2">
                  <span class="text-base font-semibold"> You </span>
                  <span class="text-xs text-[#C6C5D0]"> 10:10 AM </span>
                </div>
                <p class="mt-1 text-xs">Noted</p>
                <button class="mt-2">
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 21 21"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <g clip-path="url(#clip0_116_4872)">
                      <path
                        d="M7.25245 7.25704L7.25251 7.25698L12.5351 1.97434L13.1879 2.46412C13.3064 2.55305 13.3959 2.67505 13.4451 2.81475L13.9167 2.64864L13.4451 2.81475C13.4943 2.95445 13.501 3.1056 13.4644 3.24912L13.4644 3.24926L12.5036 7.02426L12.3449 7.64759H12.9881H18.3215C18.6309 7.64759 18.9276 7.77051 19.1464 7.9893C19.3652 8.2081 19.4881 8.50484 19.4881 8.81426V10.5676V10.5681C19.4883 10.7206 19.4585 10.8716 19.4006 11.0126L16.8217 17.2746C16.7965 17.3357 16.7538 17.3879 16.6989 17.4246C16.644 17.4614 16.5794 17.481 16.5133 17.4809H16.5131H7.48812C7.39971 17.4809 7.31493 17.4458 7.25242 17.3833C7.1899 17.3208 7.15479 17.236 7.15479 17.1476V7.4927C7.15479 7.49267 7.15479 7.49263 7.15479 7.49259C7.15483 7.40423 7.18996 7.31951 7.25245 7.25704ZM12.5863 1.92314C12.5862 1.92331 12.586 1.92348 12.5858 1.92365L12.5863 1.92314ZM2.48812 8.48093H4.48812V17.4809H2.48812C2.39971 17.4809 2.31493 17.4458 2.25242 17.3833C2.1899 17.3208 2.15479 17.236 2.15479 17.1476V8.81426C2.15479 8.72586 2.1899 8.64107 2.25242 8.57856C2.31493 8.51605 2.39971 8.48093 2.48812 8.48093Z"
                        stroke="black"
                      />
                    </g>
                    <defs>
                      <clipPath id="clip0_116_4872">
                        <rect
                          width="20"
                          height="20"
                          fill="white"
                          transform="translate(0.821289 0.480957)"
                        />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
            </div>
            <div class="flex items-center border-t-[0.5px] borde">
              <textarea
                class="flex-1 pt-1 pl-2 focus:outline-none text-xs text-[#46464F]"
                placeholder="Add a Comment"
                type="text"
                rows="5"
                cols="10"
              ></textarea>
              <button class="text-gray-500 px-3 pb-0 pt-9">
                <svg
                  width="29"
                  height="29"
                  viewBox="0 0 29 29"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    x="0.633789"
                    y="0.212891"
                    width="28"
                    height="28"
                    rx="14"
                    fill="white"
                  />
                  <path
                    d="M9.97662 17.4677L2.43186 11.4134C2.31654 11.3211 2.23004 11.1977 2.18255 11.0578C2.13506 10.9179 2.12856 10.7673 2.16382 10.6238C2.19909 10.4804 2.27464 10.35 2.38157 10.248C2.48851 10.1461 2.62236 10.0768 2.76735 10.0485L2.87069 10.0353L23.6209 8.78982C23.7546 8.78173 23.8882 8.80848 24.0086 8.86746C24.1289 8.92644 24.2319 9.01563 24.3075 9.12632C24.383 9.23701 24.4286 9.36541 24.4397 9.49897C24.4508 9.63253 24.4271 9.76669 24.3708 9.88833L24.314 9.99031L12.8603 27.3378C12.489 27.8992 11.645 27.7471 11.4696 27.1292L11.4474 27.0287L9.97662 17.4677ZM4.96798 11.4616L10.7683 16.116L16.6965 12.6934C16.8586 12.5998 17.0492 12.5681 17.2329 12.6041C17.4166 12.6401 17.581 12.7414 17.6958 12.8893L17.7548 12.977C17.8484 13.1392 17.8801 13.33 17.8439 13.5138C17.8077 13.6976 17.7061 13.8621 17.5579 13.9768L17.4712 14.0352L11.5412 17.4589L12.6728 24.8088L22.1676 10.4292L4.96798 11.4616Z"
                    fill="#767680"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div
        class="flex items-center justify-between border rounded-lg p-4 mx-6 my-4"
      >
        <div class="flex items-center space-x-2">
          <span class="text-[21px] font-semibold"> 2. </span>
          <svg
            width="20"
            height="20"
            viewBox="0 0 23 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M21.5934 10.2408V16.4754C21.5934 17.6247 21.1369 18.7269 20.3242 19.5396C19.5116 20.3522 18.4094 20.8088 17.2601 20.8088H5.88509C4.73582 20.8088 3.63362 20.3522 2.82096 19.5396C2.0083 18.7269 1.55176 17.6247 1.55176 16.4754V6.72542C1.55176 5.57615 2.0083 4.47395 2.82096 3.66129C3.63362 2.84864 4.73582 2.39209 5.88509 2.39209H13.632"
              stroke="black"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M1.55176 6.82288L9.40592 11.297C10.0625 11.6839 10.8106 11.8878 11.5726 11.8878C12.3346 11.8878 13.0827 11.6839 13.7393 11.297L16.1432 9.93529"
              stroke="black"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M19.1558 6.72538C20.6516 6.72538 21.8642 5.51282 21.8642 4.01705C21.8642 2.52128 20.6516 1.30872 19.1558 1.30872C17.6601 1.30872 16.4475 2.52128 16.4475 4.01705C16.4475 5.51282 17.6601 6.72538 19.1558 6.72538Z"
              stroke="black"
              stroke-width="1.5"
            />
          </svg>
          <span class="text-[21px] font-semibold"> Email </span>
        </div>
        <i class="fas fa-chevron-down"> </i>
      </div>

      <div
        class="flex items-center justify-between border rounded-lg p-4 mx-6 my-4"
      >
        <div class="flex items-center space-x-2">
          <span class="text-[21px] font-semibold"> 3. </span>
          <svg
            width="20"
            height="20"
            viewBox="0 0 23 22"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M21.5934 10.2408V16.4754C21.5934 17.6247 21.1369 18.7269 20.3242 19.5396C19.5116 20.3522 18.4094 20.8088 17.2601 20.8088H5.88509C4.73582 20.8088 3.63362 20.3522 2.82096 19.5396C2.0083 18.7269 1.55176 17.6247 1.55176 16.4754V6.72542C1.55176 5.57615 2.0083 4.47395 2.82096 3.66129C3.63362 2.84864 4.73582 2.39209 5.88509 2.39209H13.632"
              stroke="black"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M1.55176 6.82288L9.40592 11.297C10.0625 11.6839 10.8106 11.8878 11.5726 11.8878C12.3346 11.8878 13.0827 11.6839 13.7393 11.297L16.1432 9.93529"
              stroke="black"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M19.1558 6.72538C20.6516 6.72538 21.8642 5.51282 21.8642 4.01705C21.8642 2.52128 20.6516 1.30872 19.1558 1.30872C17.6601 1.30872 16.4475 2.52128 16.4475 4.01705C16.4475 5.51282 17.6601 6.72538 19.1558 6.72538Z"
              stroke="black"
              stroke-width="1.5"
            />
          </svg>

          <span class="text-[21px] font-semibold"> Email </span>
        </div>
        <i class="fas fa-chevron-down"> </i>
      </div>
    </div>
  </div>
@endsection
