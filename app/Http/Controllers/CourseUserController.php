<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseUserRequest;
use App\Models\Course;
use App\Models\CourseUser;

class CourseUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseUserRequest $request)
    {
        $course = Course::find($request['course_id']);
        $course->users()->attach(auth()->user()->id);
        return redirect()->route('courses.show', [$request['course_id']]);
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
        $course = Course::find($id);
        $course->users()->updateExistingPivot(auth()->id(), ['deleted_at' => null]);
        return redirect()->route('courses.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseUser::where('course_id', $id)->where('user_id', auth()->id())->delete();
        return redirect()->route('courses.show', [$id]);
    }
}
