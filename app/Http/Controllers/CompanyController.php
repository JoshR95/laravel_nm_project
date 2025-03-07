<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10); // Gets 10 companies per page
        return view('companies.index', compact('companies')); // Shows them in the index view
    }
    
    //// CREATE
    //////////////////////////////////////////////

    // Show/GET form for creating a new company
    public function create()
    {
        return view('companies.create'); // Show the creation form
    }


    // Store/POST a newly created company
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ]);

        // If a logo was uploaded with the form
        if ($request->hasFile('logo')) {
            // Store the logo in storage/app/public/logos directory
            $path = $request->file('logo')->store('logos', 'public');
            // Save the path to the logo in the database
            $validated['logo'] = $path;
        }

        // Create new company with validated data
        Company::create($validated);

        // Redirect to companies list with success message
        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    //// READ
    //////////////////////////////////////////////

    // Display/GET specific company
    public function show(Company $company)
    {
        // Show single company details
        return view('companies.show', compact('company'));
    }


    //// UPDATE
    //////////////////////////////////////////////

    // Show form for editing company
    public function edit(Company $company)
    {
        // Show edit form with company data
        return view('companies.edit', compact('company'));
    }

    // Update the company
    public function update(Request $request, Company $company)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ]);

        // If a new logo was uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            // Store the new logo
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }
        // Update company with validated data
        $company->update($validated);
        // Redirect to companies list with success message
        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    //// DELETE
    //////////////////////////////////////////////

    // Remove/DELETE the company
    public function destroy(Company $company)
    {
        // Delete the logo file if it exists
        if ($company->logo) {
            Storage::disk('public')->delete($company->logo);
        }
        // Delete the company from database
        $company->delete();
        // Redirect to companies list with success message
        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}