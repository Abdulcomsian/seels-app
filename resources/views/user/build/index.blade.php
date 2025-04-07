@extends('layouts.dashboard.app')

@section('title', 'Dashboard')
@push('style')
    <style>
        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                background-color: white !important;
            }
        }
    </style>
@endpush
@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <!-- <div class="max-w-7xl mx-auto p-4 w-full"> -->
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
                    <div
                        class="flex items-center justify-between border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px] max-w-[260px]">
                        <input type="text" id="search" placeholder="Search..." class="outline-none text-gray-400" />
                        <div class="flex justify-center items-center">
                            <span class="text-gray-400"> | </span>
                            <i class="fas fa-search text-gray-400 ml-2"></i>
                        </div>
                    </div>
                    <button
                        class="flex items-center space-x-1 px-4 py-2 bg-[#FBF8FD] text-[14px] text-[#46464F] rounded-lg">
                        <i class="fa fa-filter"></i>
                        <span>Filter</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                {{-- <table class="min-w-full bg-white px-[50px]">
                    <thead class="border-b-[1px] border-t-[1px] border-gray-300">
                        <tr>
                            <th class="py-3 px-4 text-left pl-[30px]">
                                <input type="checkbox" />
                            </th>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">
                                Contact Email
                            </td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">
                                First Name
                            </td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">
                                Last Name
                            </td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">
                                Company Name
                            </td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">
                                Phone
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leads as $lead)
                            <tr>
                                <td class="pt-6 pb-4 px-4 pl-[30px]">
                                    <input type="checkbox" class="lead-checkbox" data-id="{{ $lead->id }}"
                                        {{ $lead->status == 1 ? 'checked' : '' }} />
                                </td>
                                <td class="pt-6 pb-4 px-4 text-[#4072EE]">
                                    {{ $lead->email }}
                                </td>
                                <td class="pt-6 pb-4 px-4">{{ $lead->first_name }}</td>
                                <td class="pt-6 pb-4 px-4">{{ $lead->last_name }}</td>
                                <td class="pt-6 pb-4 px-4">{{ $lead->company }}</td>
                                <td class="pt-6 pb-4 px-4 font-[300]" style="font-family: roboto, Helvetica, sans-serif">
                                    {{ $lead->corporate_phone }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="pt-6 pb-4 px-4 text-center text-gray-500">
                                    No leads found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> --}}

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
        <div class="mt-4 px-4">
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
                        $('#leads-tbody').html(data); // Update the table body
                        $('#pagination-links').hide(); // Hide pagination when searching
                    }
                });
            });

            $('#select-all').on('click', function() {
                $('.lead-checkbox').prop('checked', this.checked);
            });

            // If any checkbox is unchecked, uncheck the "Select All" checkbox
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
    </script>
@endpush
