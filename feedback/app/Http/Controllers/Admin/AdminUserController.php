<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id' , 'DESC')->paginate(10);
        return view('admin.users.users' , compact('users'));
    }

    public function deleteuser($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        //Messages
        $sender = Message::where('user_id' , $id)->first();
        $reciver = Message::where('reciver_id' , $id)->get();
        if(!empty($reciver)) {
            for($count = 0; $count < count($reciver); $count++) {
                $mesagges = Message::where('reciver_id' , $id)->first();
                $mesagges->delete();
            }
        }
        if(!empty($sender)) {
            for($count = 0; $count < count($sender); $count++) {
                $mesagges = Message::where('user_id' , $id)->first();
                $mesagges->delete();
            }
        }

        //Subjects
        $subject = Subject::where('user_id' , $id)->get();
        $counted = $subject->count();
        if(!empty($subject)) {
            for($count = 0; $count < $counted; $count++) {
                $subject = Subject::where('user_id' , $id)->first();
                $subject->delete();
            }
        }

        //Blogs
        $blogs = Blog::where('user_id' , $id)->get();
        $countedBlogs = $blogs->count();
        if(!empty($blogs)) {
            for($count = 0; $count < $countedBlogs; $count++) {
                $blogs = Blog::where('user_id' , $id)->first();
                $blogs->delete();
            }
        }
        return back()->withSuccess('მომხმარებლის ანგარიში წარმატებით წაიშალა!');

    }
}
