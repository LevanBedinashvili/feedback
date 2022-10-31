<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\City;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Gallery;
use App\Models\Proffesion;
use App\Models\Star;
use App\Models\Subject;
use App\Models\SubjectImage;
use App\Models\SubjectType;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{
    public function index()
    {
        $users = User::where('avatar', "!=", NULL)->orderBy('id', 'desc')->take(15)->get();
        $newsubjects = Subject::where('status', 1)->where('segment_id', 1)->orderBy('date', 'desc')->take(15)->get();
        $randsubjects = Subject::where('status', 1)->where('segment_id', 1)->inRandomOrder()->take(15)->get();
        $cities = City::orderBy('name' , 'ASC')->get();
        $segments = SubjectType::orderBy('id', 'asc')->get();

        $proffesions = Proffesion::where('icon', '!=', "")->get();
        return view('index', compact('users', 'newsubjects', 'randsubjects', 'cities', 'segments', 'proffesions'));
    }

    public function getProffesion($proffesionid)
    {
        $empData['data'] = Proffesion::select('id','name')->where('subject_type_id' , $proffesionid)->orderby("name","asc")->get();
        return response()->json($empData);
    }

    public function profile($id)
    {
        $user = User::where('id' , $id)->first();
        if(!empty($user)) {
            $age = Carbon::parse($user->age)->diff(Carbon::now())->format('%y წლის');
            $images = Gallery::where('user_id' , $id)->get();
            $subjects = Subject::where('user_id', $user->id)->get();

            return view('profile' , compact('user' , 'age' , 'images', 'subjects'));
        }
        return back();
    }

    public function blogs()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->where('status' , 1)->paginate(10);
        return view('blogs' , compact('blogs'));
    }

    public function openblog($id)
    {
        $openblog = Blog::where('id', $id)->first();
        return view('openblog', compact('openblog'));
    }

    public function opensubject($id)
    {
        $opensubject = Subject::where('id', $id)->first();

            $current_date = Carbon::now()->locale('ka');
            $timeago = Carbon::parse($opensubject->date)->diffForHumans(Carbon::parse($current_date));
            $images = SubjectImage::where('subject_id' , $opensubject->id)->where('user_id' , $opensubject->user_id)->get();
            $stars = Star::where('subject_id' , $opensubject->id)->get();
            $countedstar = 0;
            if($stars->isNotEmpty()) {
                $countedstar = (int)(round($stars->sum('stars')/$stars->count() , 0));
            }
            return view('opensubject', compact('opensubject' , 'timeago' , 'images', 'countedstar'));

    }

    public function contact()
    {
        return view('contact');
    }

    public function categories()
    {
        $kompaniebi = Proffesion::where('subject_type_id', 1)->get();
        $medicina = Proffesion::where('subject_type_id', 2)->get();
        $mewarme = Proffesion::where('subject_type_id', 3)->get();
        return view('categories', compact('kompaniebi', 'medicina', 'mewarme'));
    }

    public function submitContact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,
        ];
        Mail::to('koteg165@gmail.com')->send(new ContactMail($data));

        return back()->withSuccess('წერილი წარმატებით გაიგზავნა!');
    }

   /* public function loadMore(Request $request)
    {
        dd($request->value);
        if($request->value == 1) {
            $kompaniebi = Proffesion::where('subject_type_id', 1)->get();
            $html ='
            <li class="">
            <a href="#" class="text-dark"><i
                    class="fa fa-arrow-right text-primary"></i>{{ $company->name }}</a>
            </li>';
            return response()->json(['success' => true, 'html' => $html]);
        }
    }
    */

    public function search(Request $request)
    {

        $segment = $request->segment;
        $city = $request->city;
        $category = $request->category;
        $result = Subject::where('title', 'LIKE', '%' . $request->keyword . '%')->
        when($segment != 0, function($query) use ($segment){
            return $query->where('segment_id', $segment);
        })
        ->when(!empty($category), function($query) use ($category){
            return $query->where('category_id' ,  $category);
        })
        ->when(!empty($city), function($query) use ($city){
            return $query->where('city_id' ,  $city);
        })
        ->paginate(15);
        return view('search' , compact('result'));
    }

    public function opencategory($id)
    {
        $subjects = Subject::where('category_id', $id)->paginate(15);
        $category = Proffesion::where('id', $id)->first();
        return view('opencategory' , compact('subjects', 'category'));
    }

    public function price()
    {
        return view('price');
    }
}
