<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\CourseUser;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainCourses = Course::main()->get();
        $otherCourses = Course::other()->get();
        $reviews = Review::get();
        $countCourse = Course::count();
        $countLesson = Lesson::count();
        $learners = CourseUser::learners()->count();

        return view('home', compact('mainCourses', 'otherCourses', 'reviews', 'countCourse', 'countLesson', 'learners'));
    }
}
