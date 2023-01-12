<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden rounded-md">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center mt-3">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900 pt-4">Employees</h1>
                    </div>
                </div>
                @if ($employees->count())
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="mb-4 mt-4 ml-6">
                            <input wire:model='startDate' wire:change='getStartDate' class="border-gray-300 text-base border-solid rounded-lg" type="date">
                            <input wire:model='endDate' wire:change='getEndDate' class="border-gray-300 text-base border-solid rounded-lg" type="date">
                        </div>
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <table class="min-w-full divide-y-2 divide-gray-500">
                                <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Full Name</th>
                                        @foreach ($dates as $date)
                                            <th scope="col" class="py-3.5 text-left text-sm font-semibold text-gray-900">{{ $date->format('d-m-Y') }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300">
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">{{ $employee->full_name }}</td>
                                            @foreach ($dates as $date)
                                                @if($date->isWeekend())
                                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">-</td>
                                                @else
                                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                        <livewire:employee.status-dropdown :employee='$employee' :statuses='$statuses' :attendanceDate='$date' wire:key="{{ $employee->id }}" />
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    @else
                                   <div class="bg-red-200 p-8 mt-6 rounded-lg mb-6">
                                        <p class="text-red-700">No record found</p>
                                   </div>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            {{ $employees->links() }}
        </div>
    </div>
</div>
