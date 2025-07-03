<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#124d51] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <div class="flex justify-between mb-6">
                        <h3 class="text-lg font-semibold">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
                        <div>
                            <a href="{{ route('employees.edit', $employee) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 mr-2">Edit</a>
                            <a href="{{ route('employees.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Back to List</a>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-md font-medium mb-2 text-[#124d51]">Personal Information</h4>
                                <div class="bg-[#124d51] p-4 rounded shadow">
                                    <p class="mb-2"><span class="font-medium text-white">ID:</span> {{ $employee->id }}</p>
                                    <p class="mb-2"><span class="font-medium text-white">First Name:</span> {{ $employee->first_name }}</p>
                                    <p class="mb-2"><span class="font-medium text-white">Last Name:</span> {{ $employee->last_name }}</p>
                                    <p class="mb-2"><span class="font-medium text-white">Email:</span> {{ $employee->email ?? 'N/A' }}</p>
                                    <p class="mb-2"><span class="font-medium text-white">Phone:</span> {{ $employee->phone ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-md font-medium mb-2 text-[#124d51]">Company Information</h4>
                                <div class="bg-[#124d51] p-4 rounded shadow">
                                    <p class="mb-2"><span class="font-medium text-white">Company:</span> 
                                        <a href="{{ route('companies.show', $employee->company) }}" class="text-blue-200 hover:underline">
                                            {{ $employee->company->name }}
                                        </a>
                                    </p>
                                    <p class="mb-2"><span class="font-medium text-white">Company Email:</span> {{ $employee->company->email ?? 'N/A' }}</p>
                                    <p class="mb-2">
                                        <span class="font-medium text-white">Company Website:</span> 
                                        @if($employee->company->website)
                                            <a href="{{ $employee->company->website }}" target="_blank" class="text-blue-200 hover:underline">{{ $employee->company->website }}</a>
                                        @else
                                            <span class="text-white">N/A</span>
                                        @endif
                                    </p>
                                    @if($employee->company->logo)
                                        <div class="mt-4">
                                            <p class="font-medium mb-2 text-white">Company Logo:</p>
                                            @if(str_starts_with($employee->company->logo, 'http'))
                                                <img src="{{ $employee->company->logo }}" alt="{{ $employee->company->name }} Logo" class="h-16 w-16 object-cover">
                                            @else
                                                <img src="{{ asset('storage/' . $employee->company->logo) }}" alt="{{ $employee->company->name }} Logo" class="h-16 w-16 object-cover">
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-md font-medium mb-2 text-[#124d51]">Additional Information</h4>
                            <div class="bg-[#124d51] p-4 rounded shadow">
                                <p class="mb-2"><span class="font-medium text-white">Created:</span> {{ $employee->created_at->format('F d, Y') }}</p>
                                <p><span class="font-medium text-white">Last Updated:</span> {{ $employee->updated_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 