<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Company,User};
use Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'admin_name' => 'required|string|max:255',
            'admin_email' => 'required|email|max:255|unique:users,email',
        ]);

        // Create company
        $company = Company::create([
            'name' => $request->company_name,
        ]);
        
        // Create admin user and assign to the company
        $user = User::create([
            'name' => $request->admin_name,  // Admin name
            'email' => $request->admin_email,  // Admin email
            'password' => Hash::make('123456'),  // Admin password (hashed)
            'role_id' => 2,  // Admin role (assuming role_id 1 is for admin)
            'company_id' => $company->id,  // Company ID
        ]);

        return redirect()->route('companies.index')->with('success', 'Company and Admin user created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
