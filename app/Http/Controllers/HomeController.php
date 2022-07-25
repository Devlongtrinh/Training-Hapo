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
        $otherCourses = Course::other()->orderBy('id', config('course.course_sort_descending'))->get();
        $reviews = Review::get();
        $countCourses = Course::count();
        $countLessons = Lesson::count();
        $countLearners = CourseUser::countRegistered() -> Learners();

        return view('home', compact('mainCourses', 'otherCourses', 'reviews', 'learners', 'countCourse', 'countLession'));
    }
}
