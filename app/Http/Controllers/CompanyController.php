<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
       return view('companies.index', ['companies' => Company::orderBy('id')->get()]);
    }

    public function create() {
        return view('companies.create');
    }

    public function store() {
       $company = new Company();

       $company->name = request('name');
       $company->address = request('address');
       $company->save();
       return redirect()->route('company.index');
    }

    public function show($id) {
        $company = Company::findOrFail($id);
        return view('companies.show', ['company' => $company, 'companies' => Company::orderBy('name')->get()]);
    } 

    public function destroy($id){
        $company = Company::findOrFail($id);
        $company->delete($id);

        return redirect()->route('company.index');
    }
    public function update($id){
        $company = Company::findOrFail($id);

        $company->name = request('name');
        $company->address = request('address');
        $company->save();
        return redirect()->route('company.index');
    }
}