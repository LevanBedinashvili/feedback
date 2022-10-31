<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\City;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminCityController extends Controller
{
    public function citylist()
    {
        $cities = City::orderBy('name', 'asc')->paginate(10);
        return view('admin.city.citylist', compact('cities'));
    }

    public function deletecity($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return back()->withSuccess('ქალაქი წარმატებით წაიშალა!');
    }

    public function addcity()
    {
        return view('admin.city.addcity');
    }

    public function storecity(Request $request)
    {
        $storecity = New City;
        $storecity->name = $request->cityname;
        $storecity->save();
        return back()->withSuccess('თქვენ წარმატებით დაამატეთ ქალაქი!');
    }

    public function editcity($id)
    {
        $city = City::where('id', $id)->first();
        return view('admin.city.editcity', compact('city'));
    }

    public function updatecity(Request $request, $id)
    {
        $updatecity = City::findOrFail($id);
        $updatecity->name = $request->cityname;
        $updatecity->save();
        return back()->withSuccess('ქალაქის სახელი წარმატებით დარედაქტირდა');
    }

}
