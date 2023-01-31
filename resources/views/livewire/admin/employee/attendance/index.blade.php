<div class="bg-gray-100 text-gray-900 leading-normal 2xl:flex 2xl:justify-center 2xl:w-ful 2xl:p-4">
    <div
        class="py-8 pt-4 2xl:p-8 bg-white">

        <div class="overflow-x-auto mt-4">
            @if ($employees->count())
            <div class="table-responsive">
                <div class="mb-4 mt-4 ml-2">
                    <input wire:model='startDate' wire:change='getStartDate' class="border-gray-300 text-base border-solid rounded-lg" type="date">
                    <input wire:model='endDate' wire:change='getEndDate' class="border-gray-300 text-base border-solid rounded-lg" type="date">
                </div>
                <table class="w-full divide-y divide-cool ml-2" id="dataTable">
                    <thead>
                        <tr class="flex">
                            <th scope="col" class="flex-shrink-0 px-6 py-3 w-52 text-left text-sm font-medium text-gray-900 tracking-wider">Full Name</th>
                            @foreach ($dates as $date)
                                @if($date->format('d-m-Y') == now()->format('d-m-Y'))
                                    <th scope="col" class="flex-shrink-0 px-6 py-3 w-52 text-left text-sm font-medium tracking-wider text-green-500">{{ $date->format('d-m-Y') }}</th>
                                @elseif($date->isWeekend())
                                    <th scope="col" class="flex-shrink-0 px-6 py-3 w-36 text-left text-sm font-medium tracking-wider text-gray-900">{{ $date->format('d-m-Y') }}</th>
                                @else
                                    <th scope="col" class="flex-shrink-0 px-6 py-3 w-52 text-left text-sm font-medium text-gray-900 tracking-wider">{{ $date->format('d-m-Y') }}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="flex">
                            <td class="flex-shrink-0 px-6 py-4 w-52 text-sm text-gray-500">{{ $employee->full_name }}</td>
                            @foreach ($dates as $date)
                                @if($date->isWeekend())
                                    <td class="flex-shrink-0 px-6 py-4 w-36 text-sm text-gray-500"><span class="ml-8">-</span></td>
                                @else
                                    <td class="flex-shrink-0 px-6 py-4 w-52 text-sm text-gray-500">
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

        <div id="table_pagination" class="pt-3">
            {{ $employees->links() }}
        </div>
    </div>
</div>
<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    table th {
        background-color: #fff;
        color: #003A79;
    }

    table td {
        background-color: #fff;
    }

    table td,
    table th {
        border-top: 1px solid #C6C7C8;
        border-bottom: 1px solid #C6C7C8;
        padding: 10px 20px;
    }

    table td:first-child,
    table th:first-child {
        border-left: 1px solid #C6C7C8;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    table td:last-child,
    table th:last-child {
        border-right: 1px solid #C6C7C8;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
    }
</style>
