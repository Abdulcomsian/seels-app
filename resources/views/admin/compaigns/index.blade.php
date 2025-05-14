@extends('layouts.dashboard.app')

@section('title', 'Campaigns')

@section('content')

    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-[28px] leading-24 font-bold text-[#211C37]">
                Campaigns
            </h1>
            {{-- <button
                class="bg-[#F3C941] text-black px-10 py-2 rounded-full w-[110px] flex items-center justify-center">
                <i class="fas fa-plus mr-2"></i> Create
            </button> --}}

            <button id="createCampaignBtn"
                class="bg-[#F3C941] text-black px-10 py-2 rounded-full w-[110px] flex items-center justify-center">
                <i class="fas fa-plus mr-2"></i> Create
            </button>
        </div>
        <div class="bg-white shadow">
             <div class="flex flex-col md:flex-row justify-between items-center pb-9 p-8">
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
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">User</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Status</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Actions</td>
                        </tr>
                    </thead>
                    <tbody id="campaignData">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 px-4" id="pagination-links">
        </div>
    </div>

    <div id="create-campaign-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 compaignModal">
        <div id="create-modal-content" class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <h3 class="px-4 py-2 font-semibold">Create Campaign</h3><hr/>
                <!-- Modal body -->
                <form id="testimonialForm" action="{{ route('compaigns.store') }}" method="POST">
                    @csrf
                    <div class="p-4 space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Select User</label>
                        <select name="user"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            required>
                            <option value="" selected disabled>Select User</option>
                            @isset($users)
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }} |
                                        {{ $item->email }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="p-4 space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter compaign name" required>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="bg-[#F3C941] text-black hover:bg-[#F3C941] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 compaignModal">
        <div id="modal-content" class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <h3 class="px-4 py-2 font-semibold">Edit Campaign</h3><hr/>
                <!-- Modal body -->
                <form id="compaignForm" method="POST">
                    @csrf

                    <div class="p-4 space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">User</label>
                        <input type="hidden" name="user" id="selected-user-id" />
                        <input type="text" id="selected-user-name"
                            class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter compaign name" >
                    </div>

                    <div class="p-4 space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="edit-compaign-name" name="name"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Enter compaign name" required>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-4 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="bg-[#F3C941] text-black hover:bg-[#F3C941] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>

        function fetchCampaigns(page = 1) {
            let search = $('#search').val();

            $('#page-loader').removeClass('hidden'); // Show loader

            $.ajax({
                url: `{{ route('compaigns.index') }}`,
                type: 'GET',
                 data: {
                    page: page,
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#campaignData').html(response.data);
                    $('#pagination-links').html(response.pagination);

                    $('#page-loader').addClass('hidden'); // Hide loader
                },
                error: function(err) {
                    console.error("AJAX Load Failed", err);
                    $('#page-loader').addClass('hidden'); // Hide loader
                }
            });
        }

        // On filters change
        $('#search').on('input', debounce(function() {
            fetchCampaigns();
        }, 800));

        // On pagination click
        $(document).on('click', '#pagination-links a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchCampaigns(page);
        });

        fetchCampaigns()

        function openEditModal(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const user_id = button.getAttribute('data-user');
            const campaignUserName = button.getAttribute('data-user-name');
            const campaignUserEmail = button.getAttribute('data-user-email');

            console.log(id, name, user_id, campaignUserName, campaignUserEmail);

            // Set name field
            document.getElementById('edit-compaign-name').value = name;
            document.getElementById('selected-user-id').value = user_id;
            document.getElementById('selected-user-name').value = `${campaignUserName} | ${campaignUserEmail}`;


            // Set form action
            const form = document.getElementById('compaignForm');
            const actionUrl = `{{ url('compaigns/update') }}/${id}`;
            form.action = actionUrl;

            // Show modal
            document.getElementById('edit-modal').classList.remove('hidden');
        }

        // Close modal on outside click
        document.getElementById('edit-modal').addEventListener('click', function (e) {
            const modalContent = document.getElementById('modal-content');
            if (!modalContent.contains(e.target)) {
                this.classList.add('hidden');
            }
        });

        // open create campaign modal
        document.getElementById('createCampaignBtn').addEventListener('click', function () {
            document.getElementById('create-campaign-modal').classList.remove('hidden');
        });


        document.getElementById('create-campaign-modal').addEventListener('click', function (e) {
            const createModalContent = document.getElementById('create-modal-content');
            if (!createModalContent.contains(e.target)) {
                this.classList.add('hidden');
            }
        });


    </script>
@endpush
