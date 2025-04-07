@forelse ($leads as $lead)
<tr class="border-b hover:bg-gray-50">
    <td class="pt-6 pb-4 px-4 pl-[30px]">
        <input type="checkbox" class="lead-checkbox" data-id="{{ $lead->id }}" {{ $lead->status == 1 ? 'checked' : '' }} />
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
