 @forelse ($campaigns as $campaign)
     <tr>
         <td class="pt-6 pb-4 px-4">{{ $loop->iteration }}</td>
         <td class="pt-6 pb-4 px-4 text-[#4072EE]">{{ $campaign->user->first_name }}
             {{ $campaign->user->last_name }}</td>
         <td class="pt-6 pb-4 px-4 text-[#4072EE]">{{ $campaign->name }}</td>
         <td class="pt-6 pb-4 px-4">
             <span
                 class="px-2 py-1 rounded-full text-xs font-semibold
                                        {{ $campaign->status == 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                 {{ $campaign->status == 'active' ? 'Active' : 'Inactive' }}
             </span>
         </td>
         <td class="pt-6 pb-4 px-4 flex space-x-2">
             <form action="{{ route('compaigns.toggleStatus', $campaign->id) }}" method="POST" class="flex">
                 @csrf
                 <label class="inline-flex items-center cursor-pointer">
                     <input type="checkbox" name="status" onchange="this.form.submit()" class="sr-only peer"
                         {{ $campaign->status == 'active' ? 'checked' : '' }}>
                     <div
                         class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-green-500
                                                            peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                                                            after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all relative">
                     </div>
                 </label>
             </form>

             <button data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-id="{{ $campaign->id }}"
                 data-name="{{ $campaign->name }}" data-user="{{ $campaign->user->id }}" data-user-name="{{ $campaign->user->first_name ?? '' }} {{ $campaign->user->last_name ?? '' }}" data-user-email="{{ $campaign->user->email ?? '' }}" onclick="openEditModal(this)"
                 class="bg-[#4072EE] text-white px-4 rounded-md w-[70px] flex items-center justify-center text-sm">
                 <i class="fas fa-edit mr-1 text-xs"></i>
                 Edit
             </button>

             <!-- Delete Button -->
             <form action="{{ route('compaigns.destroy', $campaign->id) }}" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit" onclick="return confirm('Are you sure you want to delete this compaign?')"
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
