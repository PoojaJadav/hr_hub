<div>
    @role(ROLE_ADMIN)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden rounded-md">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-end">
                            <div class="">
                                <div class="p-4 flex-shrink-0 flex items-center justify-between">
                                    <div class="relative z-5 flex-shrink-0 mt-1" x-data="{ open: false }">
                                        <a @click="open = true" class="inline-flex justify-end items-center text-sm font-medium duration-300 cursor-pointer select-none text-black border border-gray rounded-md px-4 py-2 w-28">
                                            <span class="block truncate mr-2">{{ $sortBy }}</span>
                                            <svg class="h-4 w-4 stroke-current flex-shrink-0" width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.667 5.667 8 10.333 3.333 5.667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show.transition.origin.top.left="open" @click.away="open = false" class="absolute right-0 z-50 w-40 mt-2 text-sm font-medium border divide-y rounded-lg cursor-pointer text-black p-3 bg-white border-gray top-full divide-gray overflow-hidden">
                                            <li @click="open = false" wire:click="$set('sortBy','week')" class="py-2 truncate hover:text-primary">{{ __('Week') }}</li>
                                            <li @click="open = false" wire:click="$set('sortBy','month')" class="py-2 truncate hover:text-primary">{{ __('Month') }}</li>
                                            <li @click="open = false" wire:click="$set('sortBy','year')" class="py-2 truncate hover:text-primary">{{ __('Year') }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="mt-8 flex flex-col">
                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <table class="min-w-full divide-y-2 divide-gray-500">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">Full Name</th>
                                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Total Working Days</th>
                                                    <th scope="col" class="cursor-pointer">
                                                        <div class="flex items-center">
                                                            <button wire:click="sortBy('present_count')" class="font-semibold text-gray-900 text-sm">Total Present</button>
                                                            <x-sort-icon
                                                                field="present_count"
                                                                :sortField="$sortField"
                                                                :sortDirection="$sortDirection"
                                                            />
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="cursor-pointer">
                                                        <div class="flex items-center">
                                                            <button wire:click="sortBy('absent_count')" class="font-semibold text-gray-900 text-sm">Total Leave</button>
                                                            <x-sort-icon
                                                                field="absent_count"
                                                                :sortField="$sortField"
                                                                :sortDirection="$sortDirection"
                                                                />
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="cursor-pointer">
                                                        <div class="flex items-center">
                                                            <button wire:click="sortBy('wfh_count')" class="font-semibold text-gray-900 text-sm">Total WFH</button>
                                                            <x-sort-icon
                                                                field="wfh_count"
                                                                :sortField="$sortField"
                                                                :sortDirection="$sortDirection"
                                                            />
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="cursor-pointer">
                                                        <div class="flex items-center">
                                                            <button wire:click="sortBy('half_day_count')" class="font-semibold text-gray-900 text-sm">Total Half-Day</button>
                                                            <x-sort-icon
                                                                field="half_day_count"
                                                                :sortField="$sortField"
                                                                :sortDirection="$sortDirection"
                                                            />
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="cursor-pointer">
                                                        <div class="flex items-center">
                                                            <button wire:click="sortBy('late_count')" class="font-semibold text-gray-900 text-sm">Total Late</button>
                                                            <x-sort-icon
                                                                field="late_count"
                                                                :sortField="$sortField"
                                                                :sortDirection="$sortDirection"
                                                            />
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($employees as $employee)
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">{{ $employee->full_name }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $workingDaysCount ?: '-' }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->present_count ?: '-' }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->absent_count ?: '-' }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->wfh_count ?: '-' }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->half_day_count ?: '-' }}</td>
                                                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->late_count ?: '-' }}</td>
                                                        </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11">
                                                            <div class="mb-8">
                                                                <div class="text-base font-extralight text-center mt-8 text-gray-500">
                                                                    {{ __('No Data Found') }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="container mt-2">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    @endrole
</div>
