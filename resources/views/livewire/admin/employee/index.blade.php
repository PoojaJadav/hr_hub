<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden rounded-md">
            <div class="px-4 sm:px-6 lg:px-8 mb-6">
                <div class="sm:flex sm:items-center mt-3">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900 pt-4">Employees</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <x-jet-nav-link  x-jet-nav-link href="{{ route('admin.employees.create') }}">Add Employee</x-jet-nav-link>
                    </div>
                </div>
                @if ($employees->count())
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <table class="min-w-full divide-y-2 divide-gray-500">
                                <thead>
                                    <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">First Name</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Last Name</th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Email</th>
                                    <th scope="col" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <button wire:click="sortBy('birth_date')" class="font-semibold text-gray-900 text-sm">Date Of Birth</button>
                                            @if($sortAsc)
                                                <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col" class="cursor-pointer">
                                        <div class="flex items-center">
                                            <button wire:click="sortBy('joined_at')" class="font-semibold text-gray-900 text-sm">Joined At</button>
                                           @if($sortAsc)
                                                <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0">{{ $employee->first_name }}</td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->last_name }}</td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->email }}</td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->birth_date?->format('d-m-Y') ?? 'No data' }} </td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $employee->joined_at?->format('d-m-Y') ?? 'No data' }}</td>
                                                <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                                    <a data-cy="edit-button-{{ $employee->id }}" role="button"
                                                        class="text-darkgray hover:text-gray inline-block cursor-pointer"
                                                        href="{{ route('admin.employees.edit',$employee->id ) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </a>
                                                    <span data-cy="delete-button-{{ $employee->id }}" role="button"
                                                        class="text-darkgray hover:text-lightred inline-block cursor-pointer ml-2"
                                                        wire:click="openConfirmModal({{ $employee->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-5 w-5" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </span>
                                                    <x-toggle-button
                                                        wire:click="setStatus({{ $employee->id }})"
                                                        :isOn="$employee?->is_active"/>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                <div class="bg-red-200 p-8 mt-6 rounded-lg">
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
        <div class="container mt-2">
            {{ $employees->links() }}
        </div>
    </div>
    @include('template.employee.delete_modal')
</div>
<style>
    .toggle-checkbox:checked {
       @apply: right-0 border-green-400;
       right: 0;
       border-color: #68D391;
   }
   .toggle-checkbox:checked + .toggle-label {
       @apply: bg-green-400;
       background-color: #68D391;
   }
</style>
