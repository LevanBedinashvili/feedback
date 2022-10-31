<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectType;
use App\Models\Proffesion;
use App\Models\City;
use App\Models\Subject;
use App\Models\SubjectImage;
use App\Models\Star;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SubjectController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        $segment['data'] = SubjectType::orderby("id","desc")->get();
        $cities = City::orderby('name', 'asc')->get();
        return view('subject.addsubject', compact('segment', 'cities'));
    }

    public function getProffesion($proffesionid)
    {
        $empData['data'] = Proffesion::select('id','name')->where('subject_type_id' , $proffesionid)->orderby("name","asc")->get();
        return response()->json($empData);
    }

    public function InputReturner(Request $request)
    {
        if($request->value == 1) {
            $html = '
        <div class="form-group">
            <input type="text" class="form-control" name="fname"  placeholder="კომპანიის დასახელება"  required>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="position"  placeholder="შენი პოზიცია (მაგ: მენეჯერი)"  required>
    </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="code"   placeholder="საიდენთიფიკაციო კოდი">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="web"  placeholder="კომპანიის ვებგვერდი" >

                </div>
            </div>
        </div>';
        return response()->json(['success' => true, 'html' => $html]);
        }

        if($request->value == 2) {
            $html = '<div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="fname"  placeholder="ექიმის სახელი"  required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="lname"  placeholder="ექიმის გვარი"  required>
                </div>
            </div>
        </div>';
        return response()->json(['success' => true, 'html' => $html]);
        }

        if($request->value == 3) {
            $html = ' <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" placeholder="ხელოსნის სახელი"  required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="lname"  placeholder="ხელოსნის გვარი"  required>
                </div>
            </div>
        </div>';
        return response()->json(['success' => true, 'html' => $html]);
        }
    }

    public function store(Request $request)
    {
        if(!empty($request->yt)) {
            $ytlink = $request->yt;
            $newyt = str_replace('https://www.youtube.com/watch?v=', "", $ytlink);
        }
        else {
            $newyt = "";
        }


        $validator = Validator::make($request->all(), Subject::rules());
        if($validator->fails()) {
            dd($validator->errors());
            return back()->withDanger('სუბიექტის დამატება ვერ მოხერხდა!');
        }
        $subjectcreate = New Subject;
        $subjectcreate->user_id = Auth::user()->id;
        $subjectcreate->title = $request->title;
        $subjectcreate->desc_ka = $request->text;
        $subjectcreate->youtube = $newyt;
        $subjectcreate->facebook = $request->fb;
        $subjectcreate->segment_id = $request->segment;
        $subjectcreate->category_id = $request->category;
        $subjectcreate->address = $request->address;
        $subjectcreate->city_id = $request->city;
        $subjectcreate->fname = $request->fname;
        $subjectcreate->lname = $request->lname;
        //company
        if($request->segment == 1) {
            $subjectcreate->company_position = $request->position;
            $subjectcreate->company_code  = $request->code;
            $subjectcreate->company_web = $request->web;
        }
        $subjectcreate->date = Carbon::now()->locale('ka');
        $subjectcreate->status = 0;
        $subjectcreate->save();
        $this->storeImage($subjectcreate);
        return back()->withSuccess('სუბიექტი წარმატებით დაემატა!');
    }

    public function index()
    {
        $mysubjects = Subject::where('user_id' , Auth::user()->id)->paginate(10);
        return view('subject.mysubjects' , compact('mysubjects'));
    }

    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        if($subject->user_id = Auth::user()->id) {
            $subject->delete();
            return back()->withSuccess('სუბიექტი წარმატებით წაიშალა!');
        }
    }

    public function edit($id)
    {
        $subject = Subject::where('id' ,  $id)->where('user_id' , Auth::user()->id)->first();
        if(!empty($subject))
        {
            $segment['data'] = SubjectType::orderby("id","desc")->get();
            $cities = City::orderby('name', 'asc')->get();
            return view('subject.edit' , compact('subject' , 'segment' , 'cities'));
        }
        return back();
    }

    public function photos($id)
    {
        $images = SubjectImage::where('subject_id' , $id)->where('user_id' , Auth::user()->id)->get();
        return view('subject.photos' , compact('images' , 'id'));
    }

    public function photosstore(Request $request , $id)
    {
        $subjectcheck = Subject::where('id' , $id)->first();
        if($subjectcheck->user_id == Auth::user()->id) {
            if ($request->hasFile('image')) {
                foreach($request->file('image') as $file){
                    $path = $file->store('public/SubjetImages');
                    $gallery = new SubjectImage;
                    $gallery->user_id = Auth::user()->id;
                    $gallery->subject_id = $id;
                    $gallery->image = $path;
                    $gallery->save();
                }
                return  back()->with('success', "სურათები წარმატებით დაემატა!");
            }
            return  back()->with('danger', "სურათების ატვირთვა ვერ მოხერხდა!");
        }
        return  back()->with('danger', "სურათების ატვირთვა ვერ მოხერხდა!");
    }

    public function photoDelete($id)
    {
        $check = SubjectImage::where('id', $id)->first();
        if($check->user_id == Auth::user()->id) {
            $image = SubjectImage::findOrFail($id);
            $image->delete();
            return back()->withSuccess('ფოტო წარმატებით წაიშალა გალერიიდან!');
        }
        return back()->withDanger('თქვენი ვერ წაშლით ამ ფოტოს!');
    }

    public function rateSys(Request $request)
    {
        $RatedCheck = Star::where('sender' , Auth::user()->id)->where('subject_id' ,  $request->subject_id)->first();
        if(empty($RatedCheck)) {
            $newRate = new Star;
            $newRate->subject_id = $request->subject_id;
            $newRate->sender = Auth::user()->id;
            $newRate->reciver = $request->user_id;
            $newRate->stars = $request->stars;
            $newRate->save();
            return back();
        }else {
            $updateStar = Star::findOrfail($RatedCheck->id);
            $updateStar->stars = $request->stars;
            $updateStar->save();
        }


    }

    public function storeImage($createdObject)
    {
        if(request()->has('image'))
        {
            $createdObject->update([
                'image' => request()->image->store('subject', 'public'),
            ]);
        }
    }
}
