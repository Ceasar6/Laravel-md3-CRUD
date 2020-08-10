<?php


namespace App\Http\Services;


use App\City;
use App\Http\Repositories\CityRepository;
use Illuminate\Http\Request;


class CityService
{
    protected $cityRepository;
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository  = $cityRepository;
    }
    public function index()
    {
        return $this->cityRepository->index();
    }
    public function add(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $this->cityRepository->save($city);
    }
}
