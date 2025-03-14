@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')
    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-[28px] leading-24 font-bold text-[#211C37]">
                Users
            </h1>
            <a href="{{ route('users.create') }}">
                <button class="bg-[#F3C941] text-black px-10 py-2 rounded-full w-[110px] flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i> Create
                </button>
            </a>
        </div>
        <div class="bg-white shadow">
            <div class="flex flex-col md:flex-row justify-between items-center pb-9 p-8">
                <h2 class="text-[22px] text-[#182151] font-semibold">
                    Prospect Check
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
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key => $user)
                        <tr>
                            <td class="pt-6 pb-4 px-4">{{ $key + 1 }}</td>
                            <td class="pt-6 pb-4 px-4 text-[#4072EE]">{{ $user->email }}</td>
                            <td class="pt-6 pb-4 px-4">{{ $user->first_name }}</td>
                            <td class="pt-6 pb-4 px-4">{{ $user->last_name }}</td>
                            <td class="pt-6 pb-4 px-4">{{ $user->company_name }}</td>
                            <td class="pt-6 pb-4 px-4 font-[300]" style="font-family: roboto, Helvetica, sans-serif">
                                {{ $user->phone }}
                            </td>
                            <td class="pt-6 pb-4 px-4 flex space-x-2">
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button class="bg-[#4072EE] text-white px-3 py-1 rounded-md w-[60px] flex items-center justify-center text-sm">
                                        <i class="fas fa-edit mr-1 text-xs"></i> Edit
                                    </button>
                                </a>

                                <a href="{{ route('users.show', $user->id) }}">
                                    <button class="bg-[#4072EE] text-white px-3 py-1 rounded-md w-[60px] flex items-center justify-center text-sm">
                                        <i class="fas fa-eye mr-1 text-xs"></i> View
                                    </button>
                                </a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')"
                                     class="bg-[#E74C3C] text-white px-3 py-1 rounded-md w-[70px] flex items-center justify-center text-sm">
                                        <i class="fas fa-trash mr-1 text-xs"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No Data Found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
