<div>
    <select wire:model="selectedStatus" wire:change="changeStatus" name="selectedStatus" id="selectedStatus" class="border-gray-300 -ml-10 text-sm border-solid rounded-lg">
        <option value="">Select Status</option>
        @foreach($labels as $status)
            <option value="{{ $status->id }}">{{ $status->label}}</option>
        @endforeach
    </select>
</div>
