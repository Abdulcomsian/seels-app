@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <h1 class="text-[28px] leading-24 font-bold text-[#211C37] mb-6">
            Build
        </h1>
        <div class="flex items-center space-x-2 gap-4">
            <span
                class="text-[16px] text-[#1E293B] font-semibold border-b-[3px] border-[#4F46E5] px-[12px] py-2 cursor-pointer inline-block">
                Prospect Check
            </span>
            <a class="text-[16px] text-[#475569] font-medium px-[12px] py-2 cursor-pointer border-b-[3px] hover:border-b-[3px] hover:border-gray-300 dark:hover:text-gray-500"
                href="{{ route('emails.index') }}">Emails</a>
        </div>

        <div class="bg-white shadow">
            <div class="flex flex-col md:flex-row justify-between items-center pb-9 p-8">
                <h2 class="text-[22px] text-[#182151] font-semibold">
                    Prospect Check
                </h2>
                <div class="flex items-center gap-[13px] md:w-[359px] md:h-[35px]">
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
                                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                    onclick="getLeadsByCompaign(0)">
                                    All
                                </li>
                                @foreach ($compaigns as $compaign)
                                    <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                        onclick="getLeadsByCompaign({{ $compaign->id }})">
                                        {{ $compaign->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center gap-[13px] ml-auto">
                        <div class="flex items-center justify-between border border-gray-300 rounded-lg px-2 py-2 bg-white h-[40px] w-full max-w-[260px]">
                            <input type="text" id="search" placeholder="Search..." class="outline-none text-gray-400 w-full" />
                            <div class="flex justify-center items-center">
                                <span class="text-gray-400"> | </span>
                                <i class="fas fa-search text-gray-400 ml-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-3 px-4 text-left pl-[30px]">
                                <input type="checkbox" id="select-all" />
                            </th>
                            <th class="px-4 py-3 text-left text-[#4072EE]">Email</th>
                            <th class="px-4 py-3 text-left">First Name</th>
                            <th class="px-4 py-3 text-left">Last Name</th>
                            <th class="px-4 py-3 text-left">Company</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                        </tr>
                    </thead>
                    <tbody id="leads-tbody">
                        @include('partials.leads_table')
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
        </div>
        <div class="mt-4 px-4" id="pagination-links">
            {{ $leads->links() }}
        </div>
        <div class="flex">
            <div class="ml-auto">
                <button class="bg-[#F3C941] text-black my-5 px-10 py-2 rounded-full items-end w-[110px] save-leads">
                    Save
                </button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('build.index') }}",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#leads-tbody').html(data);
                        $('#pagination-links').hide();
                    }
                });
            });

            $('#select-all').on('click', function() {
                $('.lead-checkbox').prop('checked', this.checked);
            });

            $(document).on('click', '.lead-checkbox', function() {
                if (!$('.lead-checkbox:checked').length) {
                    $('#select-all').prop('checked', false);
                } else if ($('.lead-checkbox:checked').length === $('.lead-checkbox').length) {
                    $('#select-all').prop('checked', true);
                }
            });
        });

        document.querySelector(".save-leads").addEventListener("click", function() {
            let checkedLeads = [];

            document.querySelectorAll(".lead-checkbox:checked").forEach((checkbox) => {
                checkedLeads.push(checkbox.dataset.id);
            });

            fetch("{{ route('build.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        checkedLeads
                    })
                })
                .then(response => response.json())
                .then(data => {
                    toastr.success('Leads updated successfully!');
                })
                .catch(error => console.error("Error:", error));
        });

        function getLeadsByCompaign(compaignId) {
            document.getElementById('leads-tbody').innerHTML =
                '<tr><td colspan="6" class="text-center py-4">Loading...</td></tr>';

            $.ajax({
                url: '/user-get-leads-by-compaign/' + compaignId,
                method: 'GET',
                success: function(response) {
                    let leadsTbody = document.getElementById('leads-tbody');
                    leadsTbody.innerHTML = '';

                    document.querySelector('.mt-4.px-4').style.display = 'none';

                    response.leads.forEach(function(lead) {
                        let row = `<tr data-id="${lead.id}">
                            <td class="pt-6 pb-4 px-4 pl-[30px]">
                                <div class="relative w-4 h-4">
                                    <input type="checkbox" class="peer hidden" ${lead.status == 1 ? 'checked' : ''} disabled />
                                    <span class="w-4 h-4 inline-block border border-gray-400 rounded-md peer-checked:bg-[#4072EE] peer-checked:border-[#4072EE] flex items-center justify-center">
                                        ${lead.status == 1 ? '<svg class="w-3 h-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M4.293 12.293a1 1 0 011.414 0L10 16.586l8.293-8.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>' : ''}
                                    </span>
                                </div>
                            </td>
                            <td class="pt-6 pb-4 px-4 text-[#4072EE]">${lead.email}</td>
                            <td class="pt-6 pb-4 px-4">${lead.first_name}</td>
                            <td class="pt-6 pb-4 px-4">${lead.last_name}</td>
                            <td class="pt-6 pb-4 px-4">${lead.company}</td>
                            <td class="pt-6 pb-4 px-4 font-[300]" style="font-family: roboto, Helvetica, sans-serif">${lead.corporate_phone}</td>
                        </tr>`;
                        leadsTbody.innerHTML += row;
                    });
                },
                error: function(error) {
                    console.error("Error fetching leads:", error);
                    document.getElementById('leads-tbody').innerHTML =
                        '<tr><td colspan="6" class="text-center py-4 text-red-500">Error loading leads</td></tr>';
                }
            });
        }
    </script>
@endpush
