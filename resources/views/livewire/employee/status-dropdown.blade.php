<div>
    <select wire:model="selectedStatus" wire:change="changeStatus" name="selectedStatus" id="selectedStatus" class="border-gray-300 text-sm border-solid rounded-lg">
        <option value="">Select Status</option>
        @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->status}}</option>
        @endforeach
    </select>
</div>
