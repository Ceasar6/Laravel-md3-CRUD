<?php

namespace App\Http\Controllers;

use App\Http\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $cityService;
    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }
    public function index()
    {
        $cities = $this->cityService->index();
        return view('cities.list', compact('cities'));
    }
    public function create()
    {
        return view('cities.create');
    }
    public function add(Request $request)
    {
        $this->cityService->add($request);
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('cities.index');
    }

}
