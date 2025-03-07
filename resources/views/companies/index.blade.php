<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">Company List</h3>
                        <a href="{{ route('companies.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add New Company</a>
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
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Logo</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Website</th>
                                    <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $company->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">
                                            @if($company->logo)
                                                @if(Str::startsWith($company->logo, 'http'))
                                                    <img src="{{ $company->logo }}" alt="{{ $company->name }} Logo" class="h-10 w-10 object-cover">
                                                @else
                                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="h-10 w-10 object-cover">
                                                @endif
                                            @else
                                                <span class="text-gray-400">No Logo</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $company->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">{{ $company->email ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600">
                                            @if($company->website)
                                                <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $company->website }}</a>
                                            @else
                                                <span class="text-gray-400">N/A</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600 text-sm">
                                            <div class="flex flex-col space-y-1">
                                                <a href="{{ route('companies.show', $company->id) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                                <a href="{{ route('companies.edit', $company->id) }}" class="text-green-600 hover:text-green-800">Edit</a>
                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap border-b border-gray-300 dark:border-gray-600 text-center">No companies found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 