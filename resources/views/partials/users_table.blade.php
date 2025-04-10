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
                <button
                    class="bg-[#4072EE] text-white px-3 py-1 rounded-md w-[60px] flex items-center justify-center text-sm">
                    <i class="fas fa-edit mr-1 text-xs"></i> Edit
                </button>
            </a>

            <a href="{{ route('users.show', $user->id) }}">
                <button
                    class="bg-[#4072EE] text-white px-3 py-1 rounded-md w-[60px] flex items-center justify-center text-sm">
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
