<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->class_id == 1) {
            $courses = Course::with('users')->where('class_id', 1)->get();
            return view('course.webProg', compact('courses'));
        } elseif ($user->class_id == 2) {
            $courses = Course::with('users')->where('class_id', 2)->get();
            return view('course.mobile', compact('courses'));
        }

        return redirect()->back()->with('error', 'Unauthorized access');
    }

    // public function indexWeb()
    // {
    //     $courses = Course::with('users')->where('class_id', 1)->get();
    //     return view('course.webProg', compact('courses'));
    // }

    // public function indexMobile()
    // {
    //     $courses = Course::with('users')->where('class_id', 2)->get();
    //     return view('course.webProg', compact('courses'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required_if:type,pdf|mimes:pdf|max:2048',
            'link' => 'required_if:type,link|url'
        ]);

        $filePath = $request->hasFile('file') ? $request->file('file')->store('courses') : null;

        $data = [
            'instructor_id' => Auth::id(),
            'class_id' => Auth::user()->class_id,
            'title' => $request->title,
            'description' => $request->desc,
            'file_path' => $filePath,
            'link_path' => $request->link,
        ];

        Course::create($data);

        // return redirect()->back()->with('success', 'Materi berhasil disimpan.');
        return redirect()->route('course.index')->with('success', 'Course Added!');
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
