<?php
namespace App\Http\Repositories;

use App\Customer;

class CustomerRepository
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function getAll(){
       return $this->customer->all();
    }

    public function save($customer){
        $customer->save();
    }
    public function getId($id)
    {
        return $this->customer->findOrFail($id);
    }
    public function delete($customer)
    {
        $customer->delete();
    }

}
