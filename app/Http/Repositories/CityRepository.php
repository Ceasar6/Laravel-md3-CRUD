<?php


namespace App\Http\Repositories;


use App\City;

class CityRepository
{
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }
    public function index()
    {
       return $this->city->all();
    }
    public function save($city)
    {
        $city->save();
    }
}
