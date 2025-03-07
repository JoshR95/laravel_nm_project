<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-6">Welcome to the Admin Panel</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg shadow">
                            <h4 class="text-md font-medium mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                Companies Management
                            </h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Manage all companies in the system. Add new companies, edit existing ones, or remove companies that are no longer needed.</p>
                            <a href="{{ route('companies.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Manage Companies</a>
                        </div>
                        
                        <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg shadow">
                            <h4 class="text-md font-medium mb-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                Employees Management
                            </h4>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">Manage all employees in the system. Add new employees, edit their information, or remove employees as needed.</p>
                            <a href="{{ route('employees.index') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Manage Employees</a>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="text-md font-medium mb-4">System Information</h4>
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg shadow">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div class="bg-white dark:bg-gray-600 p-4 rounded shadow">
                                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-1">Total Companies</h5>
                                    <p class="text-2xl font-bold">{{ \App\Models\Company::count() }}</p>
                                </div>
                                <div class="bg-white dark:bg-gray-600 p-4 rounded shadow">
                                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-1">Total Employees</h5>
                                    <p class="text-2xl font-bold">{{ \App\Models\Employee::count() }}</p>
                                </div>
                                <div class="bg-white dark:bg-gray-600 p-4 rounded shadow">
                                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-1">Companies with Logo</h5>
                                    <p class="text-2xl font-bold">{{ \App\Models\Company::whereNotNull('logo')->count() }}</p>
                                </div>
                                <div class="bg-white dark:bg-gray-600 p-4 rounded shadow">
                                    <h5 class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-1">Employees with Email</h5>
                                    <p class="text-2xl font-bold">{{ \App\Models\Employee::whereNotNull('email')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 