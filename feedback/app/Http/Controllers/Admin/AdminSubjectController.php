<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminSubjectController extends Controller
{
    public function subjectapproval()
    {
        $subjectapproval = Subject::where('status', 0)->orderBy('date', 'desc')->paginate(10);
        return view('admin.subject.subjectapproval', compact('subjectapproval'));
    }

    public function subjectapproved()
    {
        $subjectapproved = Subject::where('status', 1)->orderBy('date', 'desc')->paginate(10);
        return view('admin.subject.subjectapproved', compact('subjectapproved'));
    }

    public function approve($id)
    {
        $subject = Subject::findOrFail($id);
        if($subject->status == 0)
        {
            $subject->status = 1;
            $subject->save();
            return back()->withSuccess('სუბიექტი წარმატებით დადასტურდა!');
        }
        return back()->withDanger('სუბიექტის დადასტურება ვერ მოხერხდა!');
    }

    public function subjectdelete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return back()->withSuccess('სუბიექტი წარმატებით წაიშალა!');
    }


}
