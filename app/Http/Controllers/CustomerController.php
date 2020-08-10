<?php

namespace App\Http\Controllers;


use App\City;
use App\Http\Services\CityService;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    protected $customerService;
    protected $cityService;
    public function __construct(CustomerService $customerService,
                                CityService $cityService)
    {
        $this->customerService = $customerService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        $customers = $this->customerService->all();
        return view('customer.list', compact('customers'));
    }
    public function create()
    {
        $cities = $this->cityService->index();
        return view('customer.create', compact('cities'));
    }
    public function add(Request $request)
    {
        $this->customerService->add($request);
        toastr()->success('Data has been add successfully!');
        return redirect()->route('customers.index');
    }
    public function getID($id)
    {
        $customer = $this->customerService->getId($id);
        $cities = $this->cityService->index();
        return view('customer.update', compact('customer', 'cities'));
    }

    public function update(Request $request, $id){
        $this->customerService->update($request,$id);
        toastr()->success('Data has been update successfully!');
        return redirect()->route('customers.index');
    }
    public function delete($id)
    {
        $this->customerService->delete($id);
        toastr()->success('Data has been deleted successfully!');
        return redirect()->route('customers.index');
    }
}
