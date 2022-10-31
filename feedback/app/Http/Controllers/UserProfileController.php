<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
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

    public function editprofile($id)
    {
        $userid = $id;
        if($userid == Auth::user()->id) {
            return view('editprofile');
        }
        return back();
    }

    public function updateprofile(Request $request , $id)
    {
        if(Auth::user()->id == $id) {
            $validator = Validator::make($request->all(), User::rules());
            if($validator->fails()) {
                return back()->withDanger('პროფილის რედაქტირება ვერ მოხერხდა!');
            }
            $emailcheck = User::where('email' , $request->email)->first();
            if(empty($emailcheck) OR $emailcheck->id == Auth::user()->id) {
                $profileupdate = User::findOrFail($id);
                $profileupdate->fname = $request->fname;
                $profileupdate->lname = $request->lname;
                $profileupdate->email = $request->email;
                $profileupdate->number = $request->number;
                $profileupdate->age = $request->age;
                $profileupdate->about = $request->about;
                $profileupdate->p_nomeri = $request->p_nomeri;
                $profileupdate->save();
                $this->storeImage($profileupdate);
                return back()->withSuccess('პროფილი წარმატებით განახლდა');
            }
            return back()->withDanger('ასეთი ელ.ფოსტა უკვე რეგისტრირებულია!');
        }
        return back()->withDanger('თქვენ არ შეგიძლიათ აღნიშნული პროფილის რედაქტირება!');
    }

    public function settings()
    {
        return view('settings' );
    }

    public function updatesettings(Request $request)
    {
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        if(Hash::check($request->old_password, $user->password)) {
            if($request->new_password == $request->confirm_password) {
                $updatepass = User::findOrFail(Auth::user()->id);
                $updatepass->password = Hash::make($request->new_password);
                $updatepass->save();
                return back()->withSuccess('თქვენი ანგარიშის პაროლი შეიცვალა!');
            }
            return back()->withDanger('შეყვანილი პაროლები ერთმანეთს არ ემთხვევა!');
        }
        return back()->withDanger('თქვენს მიერ შეყვანილი პაროლი არასწორია!');
    }

    public function HideNumber()
    {
        $HideOrShow = User::findOrFail(Auth::user()->id);
        if($HideOrShow->number_status == 1) {
            $HideOrShow->number_status = 2;
            $HideOrShow->save();
            return back();
        }
        if($HideOrShow->number_status == 2) {
            $HideOrShow->number_status = 1;
            $HideOrShow->save();
            return back();

        }
        Session::flash('message', 'უფს.. რაღაც შეცდომაა !');
    }

    public function mygallery()
    {
        $images = Gallery::where('user_id' , Auth::user()->id)->get();
        return view('mygallery' , compact('images'));
    }

    public function myrefferals()
    {
        $refferals = User::where('my_reffer' , Auth::user()->refferal_code)->paginate(10);
        return view('myrefferals' , compact('refferals'));
    }

    public function imagedelete($id)
    {
        $check = Gallery::where('id', $id)->first();
        if($check->user_id == Auth::user()->id) {
            $image = Gallery::findOrFail($id);
            $image->delete();
            return back()->withSuccess('ფოტო წარმატებით წაიშალა გალერიიდან!');
        }
        return back()->withDanger('თქვენი ვერ წაშლით ამ ფოტოს!');
    }

    public function storeImage($createdObject)
    {
        if(request()->has('image'))
        {
            $createdObject->update([
                'avatar' => request()->image->store('users', 'public'),
            ]);
        }
    }

    public function gallerystore(Request $request)
    {
        if ($request->hasFile('image')) {
            foreach($request->file('image') as $file){
                $path = $file->store('public/gallery');
                $gallery = new Gallery;
                $gallery->user_id = Auth::user()->id;
                $gallery->image = $path;
                $gallery->save();
            }

            return  back()->with('success', "სურათები წარმატებით დაემატა!");
        }
        return  back()->with('danger', "სურათების ატვირთვა ვერ მოხერხდა!");

    }
}
