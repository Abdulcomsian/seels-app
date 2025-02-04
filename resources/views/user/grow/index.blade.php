@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
<div class="MainContentBody w-full p-0 md:p-5 bg-[#f0f1f6]">
    <h1 class="text-2xl font-semibold inline-block pl-6 mb-[25px]">
      Grow
    </h1>

    <div class="max-w-full mx-6 p-[21px] bg-white shadow-md">
      <!-- <h1 class="text-2xl font-semibold mb-4">Grow</h1> -->
      <div class="border-b pb-4 mb-4">
        <h2 class="text-lg font-bold leading-24px mb-2">Grow Details</h2>
        <p class="text-[#46464F] text-sm">
          You can change grow details here seamlessly.
        </p>
      </div>
      <div class="mb-8 border-b pb-6">
        <div class="flex flex-wrap gap-[30px]">
          <div class="">
            <h3 class="text-[14px] font-bold mb-1">Scale-Up</h3>
            <p class="text-[#46464F] mb-2 text-[14px] max-w-[260px]">
              Increase your outreach by scaling up the number of prospects
            </p>
          </div>

          <input
            type="number"
            value="200"
            class="pl-2 border rounded-md mb-4 w-[30vw] h-[48px]"
          />
        </div>
        <div class="bg-gray-100 p-4 rounded-md max-w-[351px] mx-auto">
          <p class="text-[#000000] font-semibold text-[14px] mb-2">
            Results Based on Current Stats
          </p>
          <div class="flex justify-between">
            <p class="text-[#1E293B] text-[14px]">Predicted responses</p>
            <p class="text-[#1E293B] text-[14px]">44%</p>
          </div>
          <div class="flex justify-between">
            <p class="text-[#1E293B] text-[14px]">Estimated leads</p>
            <p class="text-[#16A34A] text-[14px]">88</p>
          </div>
        </div>
      </div>
      <div class="mb-8 border-b pb-6">
        <div class="flex flex-col md:flex-row items-start gap-9">
          <div class="mr-8">
            <h3 class="text-[14px] font-bold mb-1">Add Services</h3>
            <p class="text-[#46464F] mb-2 text-[14px] max-w-[260px]">
              Services to enhance your offerings.
            </p>
          </div>
          <div class="flex">
            <div class="md:mr-8">
              <div class="flex items-center mb-4">
                <input
                  type="checkbox"
                  class="form-checkbox h-[16px] w-[16px] bg-[#5869DC]"
                  checked
                />
                <label
                  class="ml-2 text-[14px] text-gray-800 text-[rgba(27, 27, 31, 1)]"
                  >LinkedIn Outreach</label
                >
              </div>
              <div class="flex items-center mb-4">
                <input
                  type="checkbox"
                  class="form-checkbox h-[16px] w-[16px] text-blue-600"
                  checked
                />
                <label
                  class="ml-2 text-[14px] text-gray-800 text-[rgba(27, 27, 31, 1)]"
                  >Online Training</label
                >
              </div>
              <div class="flex items-center mb-4">
                <input
                  type="checkbox"
                  class="form-checkbox h-[16px] w-[16px] text-gray-600"
                />
                <label
                  class="ml-2 text-[14px] text-gray-800 text-[rgba(27, 27, 31, 1)]"
                  >CRM Optimization</label
                >
              </div>
              <div class="flex items-center mb-4">
                <input
                  type="checkbox"
                  class="form-checkbox h-[16px] w-[16px] text-gray-600"
                />
                <label
                  class="ml-2 text-[14px] text-gray-800 text-[rgba(27, 27, 31, 1)]"
                  >Cold Calling</label
                >
              </div>
            </div>
            <div>
              <div class="flex items-center mb-4">
                <span
                  class="sm:ml-10 ml-4 bg-[#DEE0FF] text-rgba(0, 0, 0, 1) rounded-full px-2 py-[2px] text-[12px]"
                  >€1.099/ Month</span
                >
              </div>
              <div class="flex items-center mb-4">
                <span
                  class="sm:ml-10 ml-4 bg-[#DEE0FF] text-rgba(0, 0, 0, 1) rounded-full px-2 py-[2px] text-[12px]"
                  >€1.250/ Piece</span
                >
              </div>
              <div class="flex items-center mb-4">
                <span
                  class="sm:ml-10 ml-4 bg-[#DEE0FF] text-rgba(0, 0, 0, 1) rounded-full px-2 py-[2px] text-[12px]"
                  >€1.250/ One-time</span
                >
              </div>
              <div class="flex items-center mb-4">
                <span
                  class="sm:ml-10 ml-4 bg-[#DEE0FF] text-rgba(0, 0, 0, 1) rounded-full px-2 py-[2px] text-[12px]"
                  >Price on Request</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-8 flex flex-col md:flex-row gap-[32px] pb-6">
        <div>
          <div class="flex items-center gap-[12px]">
            <h3 class="text-[14px] text-[#1B1B1F] font-bold mb-2">
              Add Salesperson
            </h3>

            <span
              class="bg-[#DEE0FF] text-rgba(0, 0, 0, 1) rounded-full w-[105px] px-2 py-[2px] text-[12px]"
              >€1.099/ Month</span
            >
          </div>
          <p class="text-[14px] text-[#46464F] mb-2 w-[260px]">
            Assign an additional account manager to the campaign by
            linking their mailbox for seamless collaboration.
          </p>
        </div>
        <div>
          <button
            class="bg-[#F3C941] px-4 py-2 rounded-full flex items-center"
          >
            <i
              class="ri-add-line mr-2 text-[14px] text-black font-bold"
            ></i>
            <span class="text-[#000000] text-[14px]">
              Add Salesperson
            </span>
          </button>
        </div>
      </div>
      <div class="flex">
        <div class="ml-auto">
          <button
            class="bg-[#F3C941] text-black text-[14px] font-medium px-6 py-2 rounded-full items-end w-[86px]"
          >
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

