<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $learners = CourseUser::learners();

        return view('home', compact('mainCourses', 'otherCourses', 'reviews', 'countCourses', 'countLessons', 'learners'));
    }
}
