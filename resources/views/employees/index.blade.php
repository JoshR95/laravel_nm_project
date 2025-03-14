<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
                        <h3 class="text-lg font-semibold">Employee List</h3>
                        <a href="{{ route('employees.create') }}" class="px-4 py-2 bg-[#124d51] text-white rounded hover:bg-[#124d51]/80 text-center">Add New Employee</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Grid Layout for Employees -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                        @forelse($employees as $employee)
                            <div class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                                <div class="p-4">
                                    <!-- Profile Icon/Avatar -->
                                    <div class="flex justify-center mb-3">
                                        <div class="h-20 w-20 bg-[#124d51] dark:bg-blue-900 rounded-full flex items-center justify-center text-white dark:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Employee Info -->
                                    <div class="text-center mb-4">
                                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 truncate" title="{{ $employee->first_name }} {{ $employee->last_name }}">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </h4>
                                        
                                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            <p class="mb-1">
                                                <span class="font-medium">Company:</span> 
                                                <a href="{{ route('companies.show', $employee->company) }}" class="text-blue-500 hover:underline">
                                                    {{ $employee->company->name }}
                                                </a>
                                            </p>
                                            
                                            <p class="mb-1 truncate" title="{{ $employee->email ?? 'No email available' }}">
                                                <span class="font-medium">Email:</span> 
                                                {{ $employee->email ?? 'N/A' }}
                                            </p>
                                            
                                            <p class="truncate" title="{{ $employee->phone ?? 'No phone available' }}">
                                                <span class="font-medium">Phone:</span> 
                                                {{ $employee->phone ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="flex justify-center space-x-2 pt-3 border-t border-[#124d51] dark:border-gray-600">
                                        <a href="{{ route('employees.show', $employee->id) }}" class="px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">View</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="px-3 py-1 bg-green-100 text-green-600 rounded hover:bg-green-200 text-sm">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full p-6 text-center text-gray-500 dark:text-gray-400">
                                No employees found. Click "Add New Employee" to create one.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>