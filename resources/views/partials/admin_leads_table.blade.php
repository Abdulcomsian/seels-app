@forelse ($leads as $lead)
    <tr data-id="{{ $lead->id }}">
        <td class="pt-6 pb-4 px-4 pl-[30px]">
            <div class="relative w-4 h-4">
                <input type="checkbox" class="peer hidden" {{ $lead->status == 1 ? 'checked' : '' }} disabled />
                <!-- Custom Checkbox -->
                <span
                    class="w-4 h-4 inline-block border border-gray-400 rounded-md peer-checked:bg-[#4072EE] peer-checked:border-[#4072EE] flex items-center justify-center">
                    @if ($lead->status == 1)
                        <svg class="w-3 h-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 12.293a1 1 0 011.414 0L10 16.586l8.293-8.293a1 1 0 011.414 1.414l-9 9a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </span>
            </div>
        </td>

        <td class="pt-6 pb-4 px-4 text-[#4072EE]">{{ $lead->email }}</td>
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
