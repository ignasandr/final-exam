<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        if(isset($request->company_id) && $request->company_id !== 0)
            $customers = Customer::where('company_id', $request->company_id)->orderBy('surname')->get();
        else
            $customers = Customer::orderBy('surname')->get();

       return view('customers.index', ['customers' => $customers,
                                       'companies' => Company::orderBy('id')->get()]);
    }

    public function create() {
        return view('customers.create', ['companies' => Company::orderBy('id')->get()]);
    }

    public function store() {
       $customer = new Customer();

       $customer->name = request('name');
       $customer->surname = request('surname');
       $customer->phone = request('phone');
       $customer->email = request('email');
       $customer->comment = request('comment');
       $customer->company_id = request('company_id');
       $customer->save();
       return redirect()->route('customer.index');
    }

    public function show($id) {
        $customer = Customer::findOrFail($id);
        return view('customers.show', ['customer' => $customer, 'companies' => Company::orderBy('id')->get()]);
    } 

    public function destroy($id){
        $customer = Customer::findOrFail($id);
        $customer->delete($id);

        return redirect()->route('customer.index');
    }
    public function update($id){
        $customer = Customer::findOrFail($id);

        $customer->name = request('name');
        $customer->surname = request('surname');
        $customer->phone = request('phone');
        $customer->email = request('email');
        $customer->comment = request('comment');
        $customer->company_id = request('company_id');
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function getName($id) {
        $company = Company::findOrFail($id);
        return $company->name;
    }
}