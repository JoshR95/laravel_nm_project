<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#124d51] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">{{ $company->name }}</h3>
                        <div>
                            <a href="{{ route('companies.edit', $company) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 mr-2">Edit</a>
                            <a href="{{ route('companies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-md font-medium mb-2 text-white">Company Information</h4>
                            <div class="bg-white p-4 rounded">
                                <p class="mb-2 text-[#124d51]"><span class="font-medium text-[#124d51]">ID:</span> {{ $company->id }}</p>
                                <p class="mb-2 text-[#124d51]"><span class="font-medium text-[#124d51]">Name:</span> {{ $company->name }}</p>
                                <p class="mb-2 text-[#124d51]"><span class="font-medium text-[#124d51]">Email:</span> {{ $company->email ?? 'N/A' }}</p>
                                <p class="mb-2 text-[#124d51]">
                                    <span class="font-medium text-[#124d51]">Website:</span> 
                                    @if($company->website)
                                        <a href="{{ $company->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $company->website }}</a>
                                    @else
                                        <span class="text-[#124d51]">N/A</span>
                                    @endif
                                </p>
                                <p class="mb-2 text-[#124d51]"><span class="font-medium text-[#124d51]">Created:</span> {{ $company->created_at->format('F d, Y') }}</p>
                                <p class="text-[#124d51]"><span class="font-medium text-[#124d51]">Last Updated:</span> {{ $company->updated_at->format('F d, Y') }}</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-md font-medium mb-2 text-white">Company Logo</h4>
                            <div class="bg-white p-4 rounded flex items-center justify-center">
                                @if($company->logo)
                                    @if(Str::startsWith($company->logo, 'http'))
                                        <img src="{{ $company->logo }}" alt="{{ $company->name }} Logo" class="max-h-48 max-w-full">
                                    @else
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="max-h-48 max-w-full">
                                    @endif
                                @else
                                    <div class="text-white py-8">No logo available</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-md font-medium mb-2 text-white">Employees</h4>
                        <div class="bg-white p-4 rounded">
                            @if($company->employees->count() > 0)
                                <div class="overflow-x-auto">
                                    <table class="min-w-full bg-[#124d51] border border-gray-300">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-white uppercase tracking-wider">Name</th>
                                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-white uppercase tracking-wider">Phone</th>
                                                <th class="px-6 py-3 border-b border-gray-300 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($company->employees as $employee)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 text-white">{{ $employee->id }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 text-white">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 text-white">{{ $employee->email ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 text-white">{{ $employee->phone ?? 'N/A' }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-300 text-sm">
                                                        <a href="{{ route('employees.show', $employee) }}" class="text-blue-200 hover:underline mr-2">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-white">No employees found for this company.</p>
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