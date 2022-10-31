<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $myblogs = Blog::where('user_id' , Auth::user()->id)->paginate(10);
        return view('Blog.myblogs' , compact('myblogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blog.addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'image' => ['required'],

        ]);
    }
    public function store(Request $request)
    {
        $new_blog = new Blog;
        $new_blog->user_id = Auth::user()->id;
        $new_blog->title = $request->title;
        $new_blog->text = $request->text;
        $new_blog->date = date('Y-m-d');
        $new_blog->save();
        $this->storeImage($new_blog);
        return back()->withSuccess('სტატია წარმატებით დაემატა!');
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
        $blog = Blog::where('id', $id)->first();
        if($blog->user_id == Auth::user()->id) {
            return view('Blog.editblog', compact('blog'));
        }
        return back();
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
        $blogupdate = Blog::findOrFail($id);
        if($blogupdate->user_id == Auth::user()->id) {
            $blogupdate->title = $request->title;
            $blogupdate->text = $request->text;
            $blogupdate->save();
            $this->storeImage($blogupdate);
            return back()->withSuccess('სტატია წარმატებით დარედაქტირდა!');
        }
        return back()->withDanger('თქვენ არ შეგიძლიათ ამ სტატიის რედაქტირება');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Blog::where('id',$id)->first();
        $id->delete();
        return back();
    }

    public function storeImage($createdObject)
    {
        if(request()->has('image'))
        {
            $createdObject->update([
                'image' => request()->image->store('blog', 'public'),
            ]);
        }
    }
}
