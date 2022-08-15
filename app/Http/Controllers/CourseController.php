<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $teachers = User::teachers()->get();
        $tags = Tag::get();
        $courses = Course::search($data)->paginate(config('course_home.paginate'));

        return view('courses.index', compact('courses', 'teachers', 'tags', 'data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $others = Course::other()->get();
        $course = Course::find($id);
        $lessons = $course->lessons()->search($request->all())->paginate(config('lesson.paginate'), ['*'], 'lesson')->appends(['tab' => 'lesson']);
        $teachers = $course->users()->teachers()->get();
        $tags = $course->tags;
        $reviews = $course->reviews()->orderBy('created_at', config('course_home.sort_descending'))->get();

        return view('courses.show', compact('course', 'lessons', 'teachers', 'tags', 'others', 'reviews'));
    }
}
