@extends('layouts.dashboard.app')

@section('title', 'Compaigns')

@section('content')

    <div class="MainContentBody w-full p-5 bg-[#f0f1f6]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-[28px] leading-24 font-bold text-[#211C37]">
                Compaigns
            </h1>
            {{-- <button
                class="bg-[#F3C941] text-black px-10 py-2 rounded-full w-[110px] flex items-center justify-center">
                <i class="fas fa-plus mr-2"></i> Create
            </button> --}}

            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="bg-[#F3C941] text-black px-10 py-2 rounded-full w-[110px] flex items-center justify-center">
                Create
            </button>
        </div>
        <div class="bg-white shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white px-[50px]">
                    <thead class="border-b-[1px] border-t-[1px] border-gray-300">
                        <tr>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">#</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Name</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Status</td>
                            <td class="py-3 px-4 text-left text-[16px] font-[400] text-[#000000]">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($compaigns as $key => $compaign)
                            <tr>
                                <td class="pt-6 pb-4 px-4">{{ $key + 1 }}</td>
                                <td class="pt-6 pb-4 px-4 text-[#4072EE]">{{ $compaign->name }}</td>
                                <td class="pt-6 pb-4 px-4">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                        {{ $compaign->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $compaign->status == 'active' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>                                
                                <td class="pt-6 pb-4 px-4 flex space-x-2">
                                        <form action="{{ route('compaigns.toggleStatus', $compaign->id) }}" method="POST">
                                            @csrf
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="checkbox" name="status" onchange="this.form.submit()" class="sr-only peer"
                                                    {{ $compaign->status == 'active' ? 'checked' : '' }}>
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-green-500 
                                                            peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                                            after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative"></div>
                                            </label>
                                        </form>
                                    
                                        <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                        data-id="{{ $compaign->id }}" data-name="{{ $compaign->name }}"
                                        onclick="openEditModal(this)"
                                        class="bg-[#4072EE] text-white px-4 rounded-md w-[70px] flex items-center justify-center text-sm">
                                        <i class="fas fa-edit mr-1 text-xs"></i>
                                        Edit
                                    </button>
                                
                                    <!-- Delete Button -->
                                    <form action="{{ route('compaigns.destroy', $compaign->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this compaign?')"
                                            class="bg-[#E74C3C] text-white px-4 py-2 rounded-md w-[70px] flex items-center justify-center text-sm">
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

    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full compaignModal">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal body -->
                <form id="testimonialForm" action="{{ route('compaigns.store') }}" method="POST">
                    @csrf
                    <div class="p-4 space-y-4">
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
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full compaignModal">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal body -->
                <form id="compaignForm" method="POST">
                    @csrf
                    <div class="p-4 space-y-4">
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
        function openEditModal(button) {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            // Set name field
            document.getElementById('edit-compaign-name').value = name;

            // Set form action
            const form = document.getElementById('compaignForm');
            const actionUrl = `{{ url('compaigns/update') }}/${id}`;
            form.action = actionUrl;
        }
    </script>
@endpush
