<?php

namespace App\Http\Controllers;


use App\Http\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->all();
        return view('customer.list', compact('customers'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function add(Request $request)
    {
        $this->customerService->add($request);
        Session::flash('success','add success');
        return redirect()->route('customers.index');
    }
    public function getID($id)
    {
        $customer = $this->customerService->getId($id);
        return view('customer.update', compact('customer'));
    }

    public function update(Request $request, $id){
        $this->customerService->update($request,$id);
        Session::flash('success', 'success update');
        return redirect()->route('customers.index');
    }
    public function delete($id)
    {
        $this->customerService->delete($id);
        Session::flash('success', 'success delete');
        return redirect()->route('customers.index');
    }
}
