<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\City;
use App\Models\Proffesion;
use App\Models\Subject;
use App\Models\SubjectType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Proffesion::orderBy('name', 'desc')->paginate(15);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $segmenti = SubjectType::get();
        return view('admin.category.create', compact('segmenti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = New Proffesion;
        $cat->subject_type_id = $request->segment;
        $cat->name = $request->catname;
        $cat->save();
        return back()->withSuccess('თქვენ წარმატებით დაამატეთ კატეგორია!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $segmenti = SubjectType::get();
        $categories = Proffesion::findOrFail($id);
        return view('admin.category.edit', compact('categories', 'segmenti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Proffesion::findOrFail($id);
        $update->subject_type_id = $request->segment;
        $update->name = $request->catname;
        $update->save();
        return back()->withSuccess('კატეგორია წარმატებით დარედაქტირდა!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Proffesion::findOrFail($id);
        $destroy->delete();
        return back()->withSuccess('კატეგორია წარმატებით წაიშალა!');
    }
}
