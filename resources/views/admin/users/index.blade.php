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

                <!-- Use ml-auto to push search to the right -->
                <div class="flex items-center gap-[13px] ml-auto">
                    <div class="flex items-center justify-between border border-gray-300 rounded-lg px-3 py-2 bg-white h-[40px] w-full max-w-[260px]">
                        <input type="text" id="search" placeholder="Search..." class="outline-none text-gray-400 w-full" />
                        <div class="flex justify-center items-center">
                            <span class="text-gray-400"> | </span>
                            <i class="fas fa-search text-gray-400 ml-2"></i>
                        </div>
                    </div>
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
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Actions</td>
                        </tr>
                    </thead>

                    <tbody id="users-tbody">
                       {{-- data will append here --}}
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 px-4" id="pagination-links">
            {{-- pagination will append here --}}
        </div>
    </div>
@endsection

@push('script')
    <script>

        function fetchUsers(page = 1) {
            let search = $('#search').val();

            $('#page-loader').removeClass('hidden'); // Show loader

            $.ajax({
                url: `{{ route('users.index') }}`,
                type: 'GET',
                 data: {
                    page: page,
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#users-tbody').html(response.data);
                    $('#pagination-links').html(response.pagination);

                    $('#page-loader').addClass('hidden'); // Hide loader
                },
                error: function(err) {
                    console.error("AJAX Load Failed", err);
                    $('#page-loader').addClass('hidden'); // Hide loader
                }
            });
        }

        function debounce(fn, delay) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => fn.apply(this, args), delay);
            };
        }

        // On filters change
        $('#search').on('input', debounce(function() {
            fetchUsers();
        }, 800));

        // On pagination click
        $(document).on('click', '#pagination-links a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchUsers(page);
        });

        fetchUsers()

    </script>
@endpush
