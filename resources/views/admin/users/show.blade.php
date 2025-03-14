@extends('layouts.dashboard.app')

@section('title', 'Users')

@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-[28px] leading-24 font-bold text-[#211C37]">
                Leads
            </h1>
            <div class="flex items-center gap-4 mb-6">
                <!-- File Input -->
                <form action="{{ route('users.importCsv', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-100 flex items-center">
                    <input type="file" name="excel_file" id="excel_file" class="text-sm text-gray-700">
                </div>

                <!-- Import Button -->
                <button type="submit" class="bg-purple-500 text-white px-6 py-1.5 rounded-md flex items-center text-sm">
                    <i class="fas fa-upload mr-2"></i> Import
                </button>
            </form>
                <!-- Export Button -->
                <button class="bg-orange-500 text-white px-6 py-1.5 rounded-md flex items-center text-sm">
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
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">#</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Contact Email</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">First Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Last Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Company Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Phone</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($leads as $lead)
                        <tr>
                            <td class="pt-6 pb-4 px-4 pl-[30px]">
                                <input type="checkbox" {{ $lead->status == 1 ? 'checked' : '' }} />
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
