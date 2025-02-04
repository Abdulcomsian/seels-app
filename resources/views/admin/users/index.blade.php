@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
<div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
    <!-- <div class="max-w-7xl mx-auto p-4 w-full"> -->
    <h1 class="text-[28px] leading-24 font-bold text-[#211C37] mb-6">
      Build
    </h1>
    <div class="flex items-center space-x-2 gap-4">
      <span
        class="text-[16px] text-[#1E293B] font-semibold border-b-[3px] border-[#4F46E5] px-[12px] py-2 cursor-pointer inline-block"
      >
        Prospect Check
      </span>
      <a
        class="text-[16px] text-[#475569] font-medium px-[12px] py-2 cursor-pointer border-b-[3px] hover:border-b-[3px] hover:border-gray-300 dark:hover:text-gray-500"
        href="Email.html"
        >Emails</a
      >
    </div>
    <!--  -->

    <!--  -->
    <div class="bg-white shadow">
      <div
        class="flex flex-col md:flex-row justify-between items-center pb-9 p-8"
      >
        <h2 class="text-[22px] text-[#182151] font-semibold">
          Prospect Check
        </h2>
        <div
          class="flex items-center gap-[13px] md:w-[359px] md:h-[35px]"
        >
          <div
            class="flex items-center justify-between border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px] max-w-[260px]"
          >
            <input
              type="text"
              placeholder="Search..."
              class="outline-none text-gray-400"
            />
            <div class="flex justify-center items-center">
              <span class="text-gray-400"> | </span>
              <i class="fas fa-search text-gray-400 ml-2"></i>
            </div>
          </div>
          <button
            class="flex items-center space-x-1 px-4 py-2 bg-[#FBF8FD] text-[14px] text-[#46464F] rounded-lg"
          >
            <i class="fa fa-filter"></i>
            <span>Filter</span>
          </button>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white px-[50px]">
          <thead class="border-b-[1px] border-t-[1px] border-gray-300">
            <tr>
              <th class="py-3 px-4 text-left pl-[30px]">
                <input type="checkbox" />
              </th>
              <td
                class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]"
              >
                Contact Email
              </td>
              <td
                class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]"
              >
                First Name
              </td>
              <td
                class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]"
              >
                Last Name
              </td>
              <td
                class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]"
              >
                Company Name
              </td>
              <td
                class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]"
              >
                Phone
              </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pt-6 pb-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="pt-6 pb-4 px-4 text-[#4072EE]">
                email@gmail.com
              </td>
              <td class="pt-6 pb-4 px-4">John</td>
              <td class="pt-6 pb-4 px-4">Demahom</td>
              <td class="pt-6 pb-4 px-4">Company 1</td>
              <td
                class="pt-6 pb-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email1@gmail.com</td>
              <td class="py-4 px-4">Gibson</td>
              <td class="py-4 px-4">Robinson</td>
              <td class="py-4 px-4">Company 2</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email2@gmail.com</td>
              <td class="py-4 px-4">Nick</td>
              <td class="py-4 px-4">Randy</td>
              <td class="py-4 px-4">Company 3</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input checked="" type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email3@gmail.com</td>
              <td class="py-4 px-4">Jane</td>
              <td class="py-4 px-4">Brown</td>
              <td class="py-4 px-4">Company 4</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email4@gmail.com</td>
              <td class="py-4 px-4">Drake</td>
              <td class="py-4 px-4">Evans</td>
              <td class="py-4 px-4">Company 5</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email5@gmail.com</td>
              <td class="py-4 px-4">Johnson</td>
              <td class="py-4 px-4">Hughes</td>
              <td class="py-4 px-4">Company 6</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email6@gmail.com</td>
              <td class="py-4 px-4">White</td>
              <td class="py-4 px-4">Walker</td>
              <td class="py-4 px-4">Company 7</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email8@gmail.com</td>
              <td class="py-4 px-4">Narmi</td>
              <td class="py-4 px-4">Green</td>
              <td class="py-4 px-4">Company 8</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email7@gmail.com</td>
              <td class="py-4 px-4">Bale</td>
              <td class="py-4 px-4">Edwards</td>
              <td class="py-4 px-4">Company 9</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email9@gmail.com</td>
              <td class="py-4 px-4">Aron</td>
              <td class="py-4 px-4">Hall</td>
              <td class="py-4 px-4">Company 10</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
            <tr>
              <td class="py-4 px-4 pl-[30px]">
                <input type="checkbox" />
              </td>
              <td class="py-4 px-4 text-[#4072EE]">email10@gmail.com</td>
              <td class="py-4 px-4">Lake</td>
              <td class="py-4 px-4">Taylor</td>
              <td class="py-4 px-4">Company 11</td>
              <td
                class="py-4 px-4 font-[300]"
                style="font-family: roboto, Helvetica, sans-serif"
              >
                +1 1245 647 364
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div
        class="py-4 px-6 text-[14px] font-raleway bg-gray-100 text-[#525B8E]"
      >
        Total Count:
        <span
          class="font-medium"
          style="font-family: Arial, Helvetica, sans-serif"
        >
          16</span
        >
      </div>
    </div>
    <div class="flex">
      <div class="ml-auto">
        <button
          class="bg-[#F3C941] text-black my-5 px-10 py-2 rounded-full items-end w-[110px]"
        >
          Save
        </button>
      </div>
    </div>
  </div>
@endsection

