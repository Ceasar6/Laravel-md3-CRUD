<?php


namespace App\Http\Services;

use App\Customer;
use App\Http\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function all()
    {
        return $this->customerRepository->getAll();
    }

    public function add($request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $this->customerRepository->save($customer);
    }

    public function getId($id)
    {
        return $this->customerRepository->getId($id);
    }

    public function update($request, $id)
    {
        $customer = $this->customerRepository->getId($id);
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        //cap nhat anh
        if ($request->hasFile('image')) {

            //xoa anh cu neu co
            $currentImg = $customer->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            // cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $this->customerRepository->save($customer);
    }

    public function delete($id)
    {
        $customer = $this->customerRepository->getId($id);
        $this->customerRepository->delete($customer);

    }
}
