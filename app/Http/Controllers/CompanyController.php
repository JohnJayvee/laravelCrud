<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'asc')->paginate(5);

        return view('companies.index', $data);
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        // $company = new Company;
        // $company->name = $request->name;
        // $company->email = $request->email;
        // $company->address = $request->addresss;


        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),

        ]);


        $company->save();


        return redirect()->route('companies.index')
            ->with('success', 'Company has been created successfully.');
    }


    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }


    public function edit(Company $company, $id)
    {
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $company = Company::find($id);

        // $company->name = $request->name;
        // $company->email = $request->email;
        // $company->address = $request->address;

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'Company Has Been updated successfully');
    }

    public function destroy(Company $company, $id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company has been deleted successfully');
    }

        
}