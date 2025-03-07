<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">{{ $company->name }}</h3>
                        <div>
                            <a href="{{ route('companies.edit', $company) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 mr-2">Edit</a>
                            <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-md font-medium mb-2">Company Information</h4>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                                <p class="mb-2"><span class="font-medium">ID:</span> {{ $company->id }}</p>
                                <p class="mb-2"><span class="font-medium">Name:</span> {{ $company->name }}</p>
                                <p class="mb-2"><span class="font-medium">Email:</span> {{ $company->email ?? 'N/A' }}</p>
                                <p class="mb-2">
                                    <span class="font-medium">Website:</span> 
                                    @if($company->website)
                                        <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $company->website }}</a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                                <p class="mb-2"><span class="font-medium">Created:</span> {{ $company->created_at->format('F d, Y') }}</p>
                                <p><span class="font-medium">Last Updated:</span> {{ $company->updated_at->format('F d, Y') }}</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-md font-medium mb-2">Company Logo</h4>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded flex items-center justify-center">
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="max-h-48 max-w-full">
                                @else
                                    <div class="text-gray-400 py-8">No logo available</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-md font-medium mb-2">Employees</h4>
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded">
                            @if($company->employees->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-white dark:bg-gray-600 border border-gray-300 dark:border-gray-500">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-500 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-500 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-500 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-500 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Phone</th>
                                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-500 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($company->employees as $employee)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-500">{{ $employee->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-500">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-500">{{ $employee->email ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-500">{{ $employee->phone ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-500 text-sm">
                                                        <a href="{{ route('employees.show', $employee) }}" class="text-blue-500 hover:underline mr-2">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-gray-500 dark:text-gray-400">No employees found for this company.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8">
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company? This will also delete all associated employees.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 