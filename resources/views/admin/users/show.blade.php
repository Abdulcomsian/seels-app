@extends('layouts.dashboard.app')
@section('title', 'Users')
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
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-2 gap-4">
                <span
                    class="text-[16px] text-[#1E293B] font-semibold border-b-[3px] border-[#4F46E5] px-[12px] py-2 cursor-pointer inline-block">
                    Prospect Check
                </span>
                <a class="text-[16px] text-[#475569] font-medium px-[12px] py-2 cursor-pointer border-b-[3px] hover:border-b-[3px] hover:border-gray-300 dark:hover:text-gray-500"
                    href="{{ route('users.email', $user->id) }}">Emails</a>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('users.importCsv', $user->id) }}" method="post" enctype="multipart/form-data"
                    class="flex items-center gap-4">
                    @csrf
                    <div class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 flex items-center">
                        <input type="file" name="excel_file" id="excel_file" class="text-sm text-gray-700">
                    </div>

                    <button type="submit"
                        class="bg-purple-500 text-white px-6 py-1.5 rounded-md flex items-center text-sm">
                        <i class="fas fa-upload mr-2"></i> Import
                    </button>
                </form>

                <!-- Export Button -->
                <button id="export-btn" class="bg-orange-500 text-white px-6 py-1.5 rounded-md flex items-center text-sm">
                    <i class="fas fa-download mr-2"></i> Export
                </button>
            </div>
        </div>
        <div class="bg-white shadow">
            <div class="flex flex-col md:flex-row justify-between items-center pb-9 p-8">
                <h2 class="text-[22px] text-[#182151] font-semibold">
                    Leads
                </h2>
                <div class="flex items-center gap-[13px] md:w-[359px] md:h-[35px]">
                    <div
                        class="flex items-center justify-between border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px] max-w-[260px]">
                        <input type="text" placeholder="Search..." class="outline-none text-gray-400" />
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
                <table class="min-w-full bg-white px-[50px]">
                    <thead class="border-b-[1px] border-t-[1px] border-gray-300">
                        <tr>
                            {{-- <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">#</td> --}}
                            <th class="py-3 px-4 text-left pl-[30px]">
                                <input type="checkbox" disabled />
                            </th>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Contact Email</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">First Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Last Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Company Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Phone</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leads as $lead)
                            <tr data-id="{{ $lead->id }}">
                                <td class="pt-6 pb-4 px-4 pl-[30px]">
                                    <div class="relative w-4 h-4">
                                        <input type="checkbox" class="peer hidden" {{ $lead->status == 1 ? 'checked' : '' }}
                                            disabled />
                                        <!-- Custom Checkbox -->
                                        <span
                                            class="w-4 h-4 inline-block border border-gray-400 rounded-md
                                                 peer-checked:bg-[#4072EE] peer-checked:border-[#4072EE] flex items-center justify-center">
                                            <!-- Checkmark Icon -->
                                            @if ($lead->status == 1)
                                                <svg class="w-3 h-3 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 12.293a1 1 0 011.414 0L10 16.586l8.293-8.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
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
                </table>
            </div>
        </div>
        <div class="mt-4 px-4">
            {{ $leads->links() }}
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.getElementById('export-btn').addEventListener('click', function() {
            let selectedLeads = [];
            document.querySelectorAll('tbody input[type="checkbox"]:checked').forEach(checkbox => {
                selectedLeads.push(checkbox.closest('tr').dataset.id);
            });

            if (selectedLeads.length === 0) {
                alert('Please select at least one lead to export.');
                return;
            }

            let form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('users.leads.export') }}";
            form.style.display = 'none';

            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = "{{ csrf_token() }}";
            form.appendChild(csrfInput);

            let leadsInput = document.createElement('input');
            leadsInput.type = 'hidden';
            leadsInput.name = 'selectedLeads';
            leadsInput.value = JSON.stringify(selectedLeads);
            form.appendChild(leadsInput);

            document.body.appendChild(form);
            form.submit();
        });
    </script>
@endpush
