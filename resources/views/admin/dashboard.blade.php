@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <!-- Body -->
        <main>
            <h1 class="mb-1 text-3xl leading-[41px] font-bold text-[#211C37]">
                Hello {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }} 👋🏻
            </h1>
            <p class="mb-5 text-[#85878D] leading-[24px] text-lg">
                Good To have You On Board
            </p>
            <div class="bg-white w-full shadow p-4 mb-5 pr-[25px]">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-[24px] leading-[32px] font-semibold">
                        Overview
                    </h5>
                    {{-- <div class="flex items-center gap-[10px] bg-[#4072EE1A] py-[10px] px-5 rounded-md w-[125px]">
                        <img src="../icons/Export.svg" alt="" />
                        <span class="text-[#4072EE] font-medium text-[16px]">Export</span>
                    </div> --}}
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-[70%_29%] gap-4">
                    <!-- First Column -->
                    <div class="grid gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p
                                    class="mb-5 text-[14px] text-[rgba(0, 0, 0, 0.7)] font-medium leading-4 tracking-[-0.15px]">
                                    Emails Sent
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">124</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Delivered Emails
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">44</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Views
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">32</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Bounces
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">24</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Replies
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">53</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#EE645A] bg-opacity-15">
                                        <img src="{{ asset('assets/images/redDashIcon.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Column -->
                    <div class="">
                        <div class="border border-[0.5px] border-[#C6C5D0] p-4 h-full rounded-[8px]">
                            <div class="flex flex-col justify-between h-full">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('assets/images/cil_happy.svg') }}" alt="" />
                                        <span class="text-[14px] font-medium">Interested</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                        <span class="text-[18px]">10</span>
                                    </div>
                                </div>
                                <hr class="my-5" />
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('assets/images/notInterested.svg') }}" alt="" />
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
                                        <span class="text-[14px] font-medium">Not Interested</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/images/redDashIcon.svg') }}" alt="" />
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
                <div class="flex flex-wrap gap-6 items-center justify-between mb-6">
                    <h5 class="text-[24px] text-[#31394D] font-semibold">Graph</h5>
                    <div class="flex flex-wrap items-center gap-[10px] pr-[30px]">
                        <span
                            class="text-[#4072EE] bg-[#4072EE]/10 border-[0.5px] border-[#4072EE] text-[14px] text-center pt-[2.5px] rounded-full h-[27px] w-[96px]">
                            Emails Sent
                        </span>
                        <span
                            class="text-[#29CB97] bg-[#29CB97]/10 border-[0.5px] border-[#29CB97] text-[14px] text-center pt-[2.5px] rounded-full w-[77px] h-[27px]">
                            Bounces
                        </span>
                        <span
                            class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[126px]">
                            Delivered Emails
                        </span>
                        <span
                            class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[58px]">
                            Views
                        </span>
                        <span
                            class="text-[#767680] border-[0.5px] border-[#C6C5D0] text-[14px] text-center py-[2.5px] rounded-full h-[27px] w-[67px]">
                            Replies
                        </span>
                    </div>
                </div>
                <canvas id="myAdminChart" style="width: 100%" class="max-h-[500px]"></canvas>
            </div>
        </main>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const xValues = [
            "Aug 2018",
            "Sep 2018",
            "Oct 2018",
            "nov 2018",
            "Dec 2018",
            "Jan 2019",
            "Feb 2019",
            "Mar 2019",
            "April 2019",
            "May 2019",
        ];

        new Chart("myAdminChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                        data: [100, 250, 100, 150, 200, 150],
                        borderColor: "green",
                        fill: false,
                    },
                    {
                        data: [0, 50, 150, 210, 120, 250],
                        borderColor: "blue",
                        fill: false,
                    },
                ],
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        });
    </script>
@endpush
