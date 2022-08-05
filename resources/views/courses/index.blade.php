@extends('layouts.app')

@section('content')
    <div class="course-home container">
        <form method="GET" action="{{ route('courses.index') }}" class="course-filter">
            <div class="main">
                <div class="btn btn-filter">
                    <i class="fa-solid fa-sliders icon-filter"></i>
                    Filter
                </div>
                <div class="search">
                    <input name="keyword" value="@if (isset($data['keyword'])) {{ $data['keyword'] }} @endif"
                        type="text" placeh older="Search..." class="form-control">
                    <i class="fa-solid fa-magnifying-glass icon-search"></i>
                </div>
                <button type="submit" class="btn btn-search">Tìm kiếm</button>
            </div>

            <div class="sub">
                <div class="title">Lọc theo</div>
                <div class="group row align-items-center">

                    <div class="col-lg-2dot4 col-md-4 d-flex justify-content-between">
                        <label for="newRadio" class="btn">Mới nhất</label>
                        <input class="new-radio" id="newRadio" type="radio"
                            @if (isset($data['created_time'])) @if ($data['created_time'] == config('course_home.sort_descending')) {{ 'checked' }} @endif
                        @else {{ 'checked' }} @endif type="radio"
                        name="created_time" value="{{ config('course_home.sort_descending') }}">
                        <label for="oldRadio" class="btn">Cũ nhất</label>
                        <input class="old-radio" id="oldRadio" type="radio" @if (isset($data['created_time']) && $data['created_time'] == config('course_home.sort_ascending')) {{ 'checked' }} @endif
                            type="radio" name="created_time" value="{{ config('course_home.sort_ascending') }}">
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <select name="learners" class="item select">
                            <option value="" class="select-item">Số người học</option>
                            <option @if (isset($data['learners']) && $data['learners'] == config('course_home.sort_ascending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_ascending') }}" class="select-item">Tăng dần</option>
                            <option @if (isset($data['learners']) && $data['learners'] == config('course_home.sort_descending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_descending') }}" class="select-item">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <select name="learning_time" class="item select">
                            <option value="" class="select-item">Thời gian học</option>
                            <option @if (isset($data['learning_time']) && $data['learning_time'] == config('course_home.sort_ascending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_ascending') }}" class="select-item">Tăng dần</option>
                            <option @if (isset($data['learning_time']) && $data['learning_time'] == config('course_home.sort_descending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_descending') }}" class="select-item">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <select name="countLesson" class="item select">
                            <option value="" class="select-item">Số bài học</option>
                            <option @if (isset($data['lesson_counting']) && $data['lesson_counting'] == config('course_home.sort_ascending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_ascending') }}" class="select-item">Tăng dần</option>
                            <option @if (isset($data['lesson_counting']) && $data['lesson_counting'] == config('course_home.sort_descending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_descending') }}" class="select-item">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <select name="rate" class="item select">
                            <option value="" class="select-item">Review</option>
                            <option @if (isset($data['rate']) && $data['rate'] == config('course_home.sort_ascending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_ascending') }}" class="select-item">Tăng dần</option>
                            <option @if (isset($data['rate']) && $data['rate'] == config('course_home.sort_descending')) {{ 'selected' }} @endif
                                value="{{ config('course_home.sort_descending') }}" class="select-item">Giảm dần</option>
                        </select>
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <div class="select-label">Teachers</div>
                        <select name="teachers[]" class="item select js-example-basic-multiple" multiple="multiple">
                            @foreach ($teachers as $users)
                                <option value="{{ $users->id }}"
                                    @if (isset($data['teachers']) && in_array($user->id, $data['teachers'])) {{ 'selected' }} @endif class="select-item">
                                    {{ $users->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2dot4 col-md-4">
                        <div class="select-label">Tags</div>
                        <select name="tags[]" class="item select js-example-basic-multiple" multiple="multiple">
                            @foreach ($tags as $tags)
                                <option value="{{ $tags->id }}"
                                    @if (isset($data['tags']) && in_array($tags->id, $data['tags'])) {{ 'selected' }} @endif class="select-item">
                                    {{ $tags->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </form>
        <div class="course-list row">
            @foreach ($courses as $course)
                <div class="col-md-6">
                    <div class="course-item">
                        <div class="course-main">
                            <div class="left">
                                <img src="{{ $course->image }}" alt="">
                            </div>
                            <div class="right">
                                <div class="course-name">{{ $course->name }}</div>
                                <div class="course-desciption">{{ $course->description }}</div>
                            </div>
                        </div>
                        <div class="course-button">
                            <button class="btn">More</button>
                        </div>
                        <div class="course-footer">
                            <div>
                                <div class="title">Learners</div>
                                <div class="number">{{ number_format($course->learners) }}</div>
                            </div>
                            <div>
                                <div class="title">Lessons</div>
                                <div class="number">{{ number_format($course->lessons) }}</div>
                            </div>
                            <div>
                                <div class="title">Times</div>
                                <div class="number">{{ number_format($course->times) }} (h) </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $courses->appends(request()->query())->links() }}
    </div>
@endsection
