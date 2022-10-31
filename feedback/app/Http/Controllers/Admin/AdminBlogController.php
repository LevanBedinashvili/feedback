<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function blogapproval()
    {
        $blogapproval = Blog::where('status', 0)->orderBy('date', 'desc')->paginate(10);
        return view('admin.blog.blogapproval', compact('blogapproval'));
    }

    public function blogapproved()
    {
        $blogapproved = blog::where('status', 1)->orderBy('date', 'desc')->paginate(10);
        return view('admin.blog.blogapproved', compact('blogapproved'));
    }


    public function approve($id)
    {
        $blog = blog::findOrFail($id);
        if($blog->status == 0)
        {
            $blog->status = 1;
            $blog->save();
            return back()->withSuccess('ბლოგი წარმატებით დადასტურდა!');
        }
        return back()->withDanger('ბლოგი დადასტურება ვერ მოხერხდა!');
    }

    public function blogDelete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->withSuccess('ბლოგი წარმატებით წაიშალა!');
    }

}
