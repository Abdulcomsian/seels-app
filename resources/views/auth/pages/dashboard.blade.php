@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
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
                    {{-- <button id="refreshButton" class="bg-[#4072EE] text-white px-4 py-2 rounded-[8px] hover:bg-[#3058CC] transition-colors">
                        Refresh Data
                    </button> --}}
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
                                    <span id="emails_sent"
                                        class="text-[24px] font-bold leading-6">{{ $totals['emails_sent'] ?? 'N/A' }}</span>
                                    <div id="emails_sent-icon"
                                        class="w-7 h-7 rounded-full flex items-center justify-center bg-[#75D661] bg-opacity-15">
                                        <img src="{{ asset('assets/images/greenDashIcon.svg') }}" alt="" />
                                        <!-- Always green -->
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Delivered Emails
                                </p>
                                <div class="flex justify-between">
                                    <span id="delivered"
                                        class="text-[24px] font-bold leading-6">{{ $totals['delivered'] ?? 'N/A' }}</span>
                                    <div id="delivered-icon"
                                        class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['delivered'] >= $totals['emails_sent'] * 0.9 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                        <img src="{{ $totals['delivered'] >= $totals['emails_sent'] * 0.9 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Views
                                </p>
                                <div class="flex justify-between">
                                    <span id="views"
                                        class="text-[24px] font-bold leading-6">{{ $totals['views'] ?? 'N/A' }}</span>
                                    <div id="views-icon"
                                        class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['views'] >= $totals['emails_sent'] * 0.5 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                        <img src="{{ $totals['views'] >= $totals['emails_sent'] * 0.5 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                            alt="" />
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
                                    <span id="bounces"
                                        class="text-[24px] font-bold leading-6">{{ $totals['bounces'] ?? 'N/A' }}</span>
                                    <div id="bounces-icon"
                                        class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['bounces'] <= $totals['emails_sent'] * 0.05 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                        <img src="{{ $totals['bounces'] <= $totals['emails_sent'] * 0.05 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="border border-[0.5px] border-[#C6C5D0] p-4 rounded-[8px]">
                                <p class="mb-5 text-[14px] font-medium leading-4 tracking-[-0.15px]">
                                    Replies
                                </p>
                                <div class="flex justify-between">
                                    <span id="replies"
                                        class="text-[24px] font-bold leading-6">{{ $totals['replies'] ?? 'N/A' }}</span>
                                    <div id="replies-icon"
                                        class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['replies'] >= $totals['emails_sent'] * 0.02 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                        <img src="{{ $totals['replies'] >= $totals['emails_sent'] * 0.02 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                            alt="" />
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
                                        <div id="interested-icon"
                                            class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['interested'] >= $totals['emails_sent'] * 0.01 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                            <img src="{{ $totals['interested'] >= $totals['emails_sent'] * 0.01 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                                alt="" />
                                        </div>
                                        <span id="interested" class="text-[18px]">{{ $totals['interested'] }}</span>
                                    </div>
                                </div>
                                <hr class="my-5" />
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('assets/images/notInterested.svg') }}" alt="" />
                                        <span class="text-[14px] font-medium">May be</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div id="maybe_later-icon"
                                            class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['maybe_later'] >= $totals['emails_sent'] * 0.005 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                            <img src="{{ $totals['maybe_later'] >= $totals['emails_sent'] * 0.005 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                                alt="" />
                                        </div>
                                        <span id="maybe_later" class="text-[18px]">{{ $totals['maybe_later'] }}</span>
                                    </div>
                                </div>
                                <hr class="my-5" />
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ asset('assets/images/cil_sad.svg') }}" alt="" />
                                        <span class="text-[14px] font-medium">Not Interested</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div id="not_interested-icon"
                                            class="w-7 h-7 rounded-full flex items-center justify-center {{ $totals['not_interested'] <= $totals['emails_sent'] * 0.02 ? 'bg-[#75D661]' : 'bg-[#EE645A]' }} bg-opacity-15">
                                            <img src="{{ $totals['not_interested'] <= $totals['emails_sent'] * 0.02 ? asset('assets/images/greenDashIcon.svg') : asset('assets/images/redDashIcon.svg') }}"
                                                alt="" />
                                        </div>
                                        <span id="not_interested"
                                            class="text-[18px]">{{ $totals['not_interested'] }}</span>
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
                    {{-- <div class="flex flex-wrap items-center gap-[10px] pr-[30px]">
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
                    </div> --}}
                </div>
                <canvas id="myChart" style="width: 100%" class="max-h-[500px]"></canvas>
            </div>
        </main>
    </div>
@endsection
@push('script')
    <script>
        // Generate previous 10 months (for fallback)
        function getPreviousMonths(count) {
            const months = [];
            const now = new Date();
            for (let i = count - 1; i >= 0; i--) {
                const date = new Date(now.getFullYear(), now.getMonth() - i, 1);
                const monthName = date.toLocaleString('default', {
                    month: 'short'
                });
                const year = date.getFullYear();
                months.push(`${monthName} ${year}`);
            }
            return months;
        }

        const initialXValues = getPreviousMonths(10);

        // Initialize the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: initialXValues,
                datasets: [{
                        label: 'Emails Sent',
                        data: [],
                        borderColor: '#4072EE',
                        fill: false
                    },
                    {
                        label: 'Bounces',
                        data: [],
                        borderColor: '#29CB97',
                        fill: false
                    },
                    {
                        label: 'Delivered',
                        data: [],
                        borderColor: '#767680',
                        fill: false
                    },
                    {
                        label: 'Views',
                        data: [],
                        borderColor: '#767680',
                        fill: false
                    },
                    {
                        label: 'Replies',
                        data: [],
                        borderColor: '#767680',
                        fill: false
                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function refreshData() {
            axios.get('{{ url('/dashboard/refresh-campaign-totals') }}')
                .then(response => {
                    const data = response.data;

                    // Use latest_totals for text and icons
                    const totals = data.latest_totals;
                    document.getElementById('emails_sent').innerText = totals.emails_sent || 'N/A';
                    document.getElementById('delivered').innerText = totals.delivered || 'N/A';
                    document.getElementById('views').innerText = totals.views || 'N/A';
                    document.getElementById('bounces').innerText = totals.bounces || 'N/A';
                    document.getElementById('replies').innerText = totals.replies || 'N/A';
                    document.getElementById('interested').innerText = totals.interested || 'N/A';
                    document.getElementById('maybe_later').innerText = totals.maybe_later || 'N/A';
                    document.getElementById('not_interested').innerText = totals.not_interested || 'N/A';

                    // Update icons using latest totals
                    const emailsSent = totals.emails_sent || 0;
                    updateIcon('emails_sent-icon', true);
                    updateIcon('delivered-icon', totals.delivered >= emailsSent * 0.9);
                    updateIcon('views-icon', totals.views >= emailsSent * 0.5);
                    updateIcon('bounces-icon', totals.bounces <= emailsSent * 0.05);
                    updateIcon('replies-icon', totals.replies >= emailsSent * 0.02);
                    updateIcon('interested-icon', totals.interested >= emailsSent * 0.01);
                    updateIcon('maybe_later-icon', totals.maybe_later >= emailsSent * 0.005);
                    updateIcon('not_interested-icon', totals.not_interested <= emailsSent * 0.02);

                    // Use graph_data for the chart
                    const graphData = data.graph_data;
                    if (graphData && graphData.months) {
                        myChart.data.labels = graphData.months;
                        myChart.data.datasets[0].data = graphData.emails_sent;
                        myChart.data.datasets[1].data = graphData.bounces;
                        myChart.data.datasets[2].data = graphData.delivered;
                        myChart.data.datasets[3].data = graphData.views;
                        myChart.data.datasets[4].data = graphData.replies;
                    } else {
                        // Fallback: Use latest totals for the last month
                        myChart.data.labels = initialXValues;
                        myChart.data.datasets.forEach((dataset, index) => {
                            const value = [totals.emails_sent || 0, totals.bounces || 0, totals.delivered || 0,
                                totals.views || 0, totals.replies || 0
                            ][index];
                            dataset.data = Array(9).fill(0).concat([value]);
                        });
                    }
                    myChart.update();
                })
                .catch(error => {
                    console.error('Failed to refresh campaign data:', error);
                });
        }

        function updateIcon(iconId, isSuccess) {
            const icon = document.getElementById(iconId);
            icon.className =
                `w-7 h-7 rounded-full flex items-center justify-center ${isSuccess ? 'bg-[#75D661]' : 'bg-[#EE645A]'} bg-opacity-15`;
            icon.querySelector('img').src = isSuccess ? '{{ asset('assets/images/greenDashIcon.svg') }}' :
                '{{ asset('assets/images/redDashIcon.svg') }}';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initial chart data from Blade (using latest totals)
            const initialData = {
                emails_sent: {{ $totals['emails_sent'] ?? 0 }},
                delivered: {{ $totals['delivered'] ?? 0 }},
                views: {{ $totals['views'] ?? 0 }},
                bounces: {{ $totals['bounces'] ?? 0 }},
                replies: {{ $totals['replies'] ?? 0 }}
            };
            myChart.data.datasets.forEach((dataset, index) => {
                const value = [initialData.emails_sent, initialData.bounces, initialData.delivered,
                    initialData.views, initialData.replies
                ][index];
                dataset.data = Array(9).fill(0).concat([value]);
            });
            myChart.update();

            // Polling for fallback data
            @if ($isFallback)
                const checkData = setInterval(() => {
                    axios.get('{{ url('/dashboard/get-campaign-totals') }}')
                        .then(response => {
                            const data = response.data;
                            if (data.latest_totals && Number.isInteger(data.latest_totals
                                    .emails_sent)) {
                                // Update text with latest totals
                                const totals = data.latest_totals;
                                document.getElementById('emails_sent').innerText = totals.emails_sent ||
                                    'N/A';
                                document.getElementById('delivered').innerText = totals.delivered ||
                                    'N/A';
                                document.getElementById('views').innerText = totals.views || 'N/A';
                                document.getElementById('bounces').innerText = totals.bounces || 'N/A';
                                document.getElementById('replies').innerText = totals.replies || 'N/A';
                                document.getElementById('interested').innerText = totals.interested ||
                                    'N/A';
                                document.getElementById('maybe_later').innerText = totals.maybe_later ||
                                    'N/A';
                                document.getElementById('not_interested').innerText = totals
                                    .not_interested || 'N/A';

                                // Update icons
                                const emailsSent = totals.emails_sent || 0;
                                updateIcon('emails_sent-icon', true);
                                updateIcon('delivered-icon', totals.delivered >= emailsSent * 0.9);
                                updateIcon('views-icon', totals.views >= emailsSent * 0.5);
                                updateIcon('bounces-icon', totals.bounces <= emailsSent * 0.05);
                                updateIcon('replies-icon', totals.replies >= emailsSent * 0.02);
                                updateIcon('interested-icon', totals.interested >= emailsSent * 0.01);
                                updateIcon('maybe_later-icon', totals.maybe_later >= emailsSent *
                                    0.005);
                                updateIcon('not_interested-icon', totals.not_interested <= emailsSent *
                                    0.02);

                                // Update chart with graph_data
                                const graphData = data.graph_data;
                                if (graphData && graphData.months) {
                                    myChart.data.labels = graphData.months;
                                    myChart.data.datasets[0].data = graphData.emails_sent;
                                    myChart.data.datasets[1].data = graphData.bounces;
                                    myChart.data.datasets[2].data = graphData.delivered;
                                    myChart.data.datasets[3].data = graphData.views;
                                    myChart.data.datasets[4].data = graphData.replies;
                                } else {
                                    myChart.data.labels = initialXValues;
                                    myChart.data.datasets.forEach((dataset, index) => {
                                        const value = [totals.emails_sent || 0, totals
                                            .bounces || 0, totals.delivered || 0, totals
                                            .views || 0, totals.replies || 0
                                        ][index];
                                        dataset.data = Array(9).fill(0).concat([value]);
                                    });
                                }
                                myChart.update();

                                clearInterval(checkData);
                            }
                        })
                        .catch(error => {
                            console.error('Failed to check campaign data:', error);
                        });
                }, 10000);
                refreshData();
            @endif
        });
    </script>
@endpush
