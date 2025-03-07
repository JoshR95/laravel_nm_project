<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10); // Get all employees with their related company information
        return view('employees.index', compact('employees')); // Return the index view with the employees data
    }

    //// CREATE
    //////////////////////////////////////////////

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all(); // Get all companies to populate the dropdown in the form
        return view('employees.create', compact('companies')); // Return the create view with the companies data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        Employee::create($validated); // Create a new employee with the validated data

        // Redirect to the employees list with a success message
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    //// READ
    //////////////////////////////////////////////

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee')); // Return the show view with the employee data
    }

    //// UPDATE
    //////////////////////////////////////////////

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all(); // Get all companies to populate the dropdown in the form
        return view('employees.edit', compact('employee', 'companies')); // Return the edit view with the employee and companies data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable'
        ]);

        // Update the employee with the validated data
        $employee->update($validated);

        // Redirect to the employees list with a success message
        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    //// DELETE
    //////////////////////////////////////////////
    
    public function destroy(Employee $employee)
    {
        // Delete the employee from the database
        $employee->delete();

        // Redirect to the employees list with a success message
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
