<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Employee List</h3>
                        <a href="{{ route('employees.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add New Employee</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">First Name</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Last Name</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Company</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $employee->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $employee->first_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $employee->last_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">
                                            <a href="{{ route('companies.show', $employee->company) }}" class="text-blue-500 hover:underline">
                                                {{ $employee->company->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $employee->email ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $employee->phone ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600 text-sm">
                                            <div class="flex flex-col space-y-1">
                                                <a href="{{ route('employees.show', $employee->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                                <a href="{{ route('employees.edit', $employee->id) }}" class="text-green-600 hover:text-green-800">Edit</a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600 text-center">No employees found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 