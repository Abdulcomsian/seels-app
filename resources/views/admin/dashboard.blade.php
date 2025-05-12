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
                Welcome to the dashboard
            </p>
            <div class="bg-white w-full shadow p-4 mb-5 pr-[25px]">
                <div class="grid grid-cols-1 xl:grid-cols-[70%_29%] gap-4">
                    <!-- First Column -->
                    <div class="grid gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p
                                    class="mb-5 text-[14px] text-[rgba(0, 0, 0, 0.7)] font-medium leading-4 tracking-[-0.15px]">
                                    Total Users
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">{{ $totalUsers ?? 0 }}</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/user.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Total Active Campaigns
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">{{ $totalActiveCampaigns ?? 0 }}</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/ReactAndInsight.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Total Inactive Campaigns
                                </p>
                                <div class="flex justify-between">
                                    <span class="text-[24px] font-bold leading-6">{{ $totalInactiveCampaigns ?? 0 }}</span>
                                    <div
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/ReactAndInsight.svg') }}" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </main>
    </div>
@endsection
