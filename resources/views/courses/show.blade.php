@extends('layouts.app')

@section('content')
    <div class="course-detail">
        <div class="container">
            <div class="row">
                <div class="main col-md-8 col-12">
                    <img src="{{ $course->image }}" alt="" class="course-img">
                    <div class="group" id="accordion">
                        <div class="group-title">
                            <div id="jsLinkLesson" data-toggle="collapse" class="title-link active"
                                data-target="#collapseLesson" aria-expanded="true" aria-controls="collapseLesson">
                                {{ __('artribute.lessons') }}
                            </div>
                            <div id="jsLinkTeacher" data-toggle="collapse" class="collapsed title-link"
                                data-target="#collapseTeacher" aria-expanded="false" aria-controls="collapseTeacher">
                                {{ __('artribute.teachers') }}
                            </div>
                            <div id="jsLinkReview" data-toggle="collapse" class="collapsed title-link"
                                data-target="#collapseReview" aria-expanded="false" aria-controls="collapseReview">
                                {{ __('artribute.reviews') }}
                            </div>
                        </div>

                        <div class="collapse show lessons group-item" data-parent="#accordion" id="collapseLesson">
                            <div class="lessons-action">
                                <form action="{{ route('courses.show', [$course->id]) }}" method="GET" class="">
                                    <div class="lessons-search">
                                        <input type="text" name="keyword" placeholder="Search...">
                                        <button type="submit"
                                            class="lessons-search-btn btn">{{ __('artribute.search') }}</button>
                                    </div>
                                </form>

                                <form class="form-join" action="{{ route('course-user.store') }}" method="POST">
                                    @csrf
                                    @if ($course->isFinished)
                                        <div class="btn lessons-join active">{{ __('artribute.finished') }}</div>
                                    @else
                                        @if ($course->isJoined && auth()->user()->is_teacher)
                                            <div class="btn lessons-join active">{{ __('artribute.teaching') }}</div>
                                        @elseif($course->isJoined && !auth()->user()->is_teacher)
                                            <div class="btn lessons-join active">{{ __('artribute.learning') }}</div>
                                        @else
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <button type="submit"
                                                class="btn lessons-join">{{ __('artribute.join_course') }}</button>
                                        @endif
                                    @endif

                                </form>
                            </div>

                            @foreach ($lessons as $lesson)
                                <div class="lesson">
                                    <div class="lesson-content">
                                        <div class="lesson-num">{{ $lesson->num }} .</div>
                                        <div class="lesson-name">{{ $lesson->name }}</div>
                                    </div>
                                    <div class="btn lesson-btn">{{ __('artribute.learn') }}</div>
                                </div>
                            @endforeach
                            {{ $lessons->appends(request()->query())->links() }}
                        </div>

                        <div class="collapse teachers group-item" data-parent="#accordion" id="collapseTeacher">
                            <div class="teachers-title">{{ __('artribute.main_teacher') }}</div>

                            @foreach ($teachers as $teacher)
                                <div class="teacher">
                                    <div class="teacher-information">
                                        <img src="{{ $teacher->avatar }}" alt="" class="teacher-avatar">
                                        <div class="teacher-general">
                                            <div class="teacher-name"> {{ $teacher->name }}
                                            </div>
                                            <div class="teacher-experience"> {{ $teacher->experience }}
                                                {{ __('artribute.years_teacher') }}
                                            </div>
                                            <div class="teacher-socials">
                                                <i class="teacher-social teacher-google fa-brands fa-google-plus-g"></i>
                                                <i class="teacher-social teacher-facebook fa-brands fa-facebook-f"></i>
                                                <i class="teacher-social teacher-slack fa-brands fa-slack"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teacher-description">{{ $teacher->description }}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="collapse reviews group-item" data-parent="#accordion" id="collapseReview">
                            <div class="reviews-total">{{ $reviews->count() }} {{ __('artribute.reviews') }}</div>
                            <div class="reviews-evaluate">
                                <div class="left">
                                    <div class="reviews-num">{{ $course->averages }}</div>
                                    <div class="reviews-stars">
                                        @for ($i = 0; $i < floor($course->averages); $i++)
                                            <i class="star-icon active fa-solid fa-star"></i>
                                        @endfor
                                        @if (strpos($course->averages, '.') == true)
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                        @endif
                                        @for ($i = 0; $i < floor(5 - $course->averages); $i++)
                                            <i class="star-icon fa-solid fa-star"></i>
                                        @endfor
                                    </div>
                                    <div class="reviews-ratings">{{ $reviews->count() }} {{ __('artribute.ratings') }}
                                    </div>
                                </div>

                                <div class="right">
                                    <div class="reviews-item @if ($course->five_stars > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">5 stars</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->five_stars }}</div>
                                    </div>
                                    <div class="reviews-item @if ($course->four_stars > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">4 stars</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->four_stars }}</div>
                                    </div>
                                    <div class="reviews-item @if ($course->three_stars > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">3 stars</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->three_stars }}</div>
                                    </div>
                                    <div class="reviews-item @if ($course->two_stars > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">2 stars</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->two_stars }}</div>
                                    </div>
                                    <div
                                        class="reviews-item @if ($course->one_star > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">1 star</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->one_star }}</div>
                                    </div>
                                    <div
                                        class="reviews-item @if ($course->zero_stars > 0) {{ 'active' }} @endif">
                                        <div class="reviews-item-label">0 stars</div>
                                        <div class="reviews-item-hr"></div>
                                        <div class="reviews-item-num">{{ $course->zero_stars }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="show-all" id="showAllComments"> {{ __('artribute.show_all_comments') }}
                                <i class="down-icon fa-solid fa-caret-right"></i>
                            </div>
                            {{-- @include('components.review') --}}
                        </div>
                    </div>

                </div>
                <div class="side-bar col-md-4 col-12">
                    <div class="side-bar-item course-description" id="jsDescriptionCourse">
                        <div class="title">{{ __('artribute.course_description') }}</div>
                        <p class="content">{{ $course->description }}</p>
                    </div>
                    <div class="side-bar-item course-information" id="jsInfoCourse">
                        <div class="course-information-row">
                            <div class="title">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                {{ __('artribute.learners') }}
                            </div>
                            <p class="content">:&nbsp {{ $course->learners }} </p>
                        </div>
                        <div class="course-information-row">
                            <div class="title">
                                <i class="fa-solid fa-table-list"></i>
                                {{ __('artribute.lessons') }}
                            </div>
                            <p class="content">:&nbsp {{ $course->lessons }} </p>
                        </div>
                        <div class="course-information-row">
                            <div class="title">
                                <i class="fa-solid fa-clock"></i>
                                {{ __('artribute.times') }}
                            </div>
                            <p class="content">:&nbsp {{ $course->times }} (hours) </p>
                        </div>
                        <div class="course-information-row">
                            <div class="title">
                                <i class="fa-solid fa-tag"></i>
                                {{ __('artribute.tags') }}
                            </div>
                            <p class="content">:&nbsp
                                @foreach ($tags as $tag)
                                    <a href="{{ route('courses.index', ['tags' => [$tag->id]]) }}"
                                        class="tag-link">#{{ $tag->name }}</a>
                                @endforeach
                            </p>
                        </div>
                        <div class="course-information-row">
                            <div class="title">
                                <i class="fa-solid fa-money-bill-1"></i>
                                {{ __('artribute.price') }}
                            </div>
                            <p class="content">:&nbsp {{ $course->cost }} $</p>
                        </div>
                        @if ($course->isJoined && !$course->isFinished)
                            <div class="course-information-row">
                                <form action="{{ route('course-user.destroy', [$course->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button class="btn finish-course">{{ __('artribute.finish_course') }}</button>
                                </form>
                            </div>
                        @elseif ($course->isFinished)
                            <div class="course-information-row">
                                <form action="{{ route('course-user.update', [$course->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT" />
                                    <button class="btn finish-course">{{ __('artribute.join_again') }}</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    @include('components.other-courses-suggestion');
                </div>
            </div>
        </div>
    </div>
@endsection
