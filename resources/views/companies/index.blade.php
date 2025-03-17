<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
                        <h3 class="text-lg font-semibold">Company  List</h3>
                        <a href="{{ route('companies.create') }}" class="px-4 py-2 bg-[#124d51] text-white rounded hover:bg-[#124d51]/80 text-center">Add New Company</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Grid Layout for Companies -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                        @forelse($companies as $company)
                            <div class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-200">
                                <div class="p-4">
                                    <!-- Logo -->
                                    <div class="flex justify-center mb-3">
                                        @if($company->logo)
                                            @if(str_starts_with($company->logo, 'http'))
                                                <img src="{{ $company->logo }}" alt="{{ $company->name }} Logo" class="h-24 w-24 object-cover rounded">
                                            @else
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="h-24 w-24 object-cover rounded">
                                            @endif
                                        @else
                                            <div class="h-24 w-24 bg-gray-200 dark:bg-gray-600 rounded flex items-center justify-center">
                                                <span class="text-gray-400">No Logo</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Company Info -->
                                    <div class="text-center mb-4">
                                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 truncate" title="{{ $company->name }}">{{ $company->name }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 truncate" title="{{ $company->email ?? 'No email available' }}">
                                            {{ $company->email ?? 'No email available' }}
                                        </p>
                                        @if($company->website)
                                            <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline text-sm truncate block mt-1">Visit Website</a>
                                        @else
                                            <p class="text-gray-400 text-sm mt-1">No website</p>
                                        @endif
                                    </div>
                                    
                                    <!-- Actions -->
                                    <div class="flex justify-center space-x-2 pt-3 border-t border-[#124d51] dark:border-gray-600">
                                        <a href="{{ route('companies.show', $company->id) }}" class="px-3 py-1 bg-blue-100 text-blue-600 rounded hover:bg-blue-200 text-sm">View</a>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="px-3 py-1 bg-green-100 text-green-600 rounded hover:bg-green-200 text-sm">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full p-6 text-center text-gray-500 dark:text-gray-400">
                                No companies found. Click "Add New Company" to create one.
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-6">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>