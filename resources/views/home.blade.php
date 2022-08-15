@extends ('layouts.app')

@section('content')
    <section class="alert-success">
        @if (session('success'))
            <div class="alert alert-success">
                <span class="alert-success"> {{ session('success') }}</span>
            </div>
        @endif
    </section>

    <section class="banner">
        <div class="bg-banner"></div>
        <div class="content">
            <div class="slogan-first">
                Learn Anytime, Anywhere <br>
                <span> at HapoLearn <img src="{{ asset('images/icon-haposoft.png') }}" class="bg-img" alt="icon-hapo">!</span>
            </div>
            <div class="slogan-second">
                Interactive lessons, "on-the-go" <br>
                practice, peer support.
            </div>
            <button class="button"> {{ __('artribute.start_learning') }}</button>
        </div>
    </section>
    <div class="container-display">
        <div class="message-display">
            <div class="content active modal-header" id="message">
                <div class="content-detail">
                    <img src="{{ asset('images/icon-haposoft.png') }}" alt="message-icon" class="message-icon">
                    <span>HapoLearn</span>
                    <button type="button" class="message-btn close">
                        <span aria-hidden="true">&times</span>
                    </button>
                    <div class="message-content">HapoLearn xin chào bạn.<br>
                        Bạn có cần chúng tôi hỗ trợ gì không?
                    </div>
                    <button type="button" class="message-btn-login btn btn-primary" data-dismiss="modal">
                        <a class="message-link" href="#">
                            <i class="fa-brands fa-facebook-messenger"></i>
                            Đăng nhập vào Messenger
                        </a>
                    </button>
                    <a class="chat" href="#">Chat với HapoLearn trong Messenger</a>
                </div>
            </div>
            <button class="btn btn-primary message-btn"><i class="fa-brands fa-facebook-messenger"></i></button>
        </div>
    </div>
    <div class="bg-bottom-of-banner"></div>
    <div class="container main">
        <div class="row list-course">
            @foreach ($mainCourses as $course)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img">
                            <img class="card-img-top" src="{{ $course->image }}" alt="Card image">
                        </div>
                        <div class="card-body">
                            <div class="card-top">
                                <div class="card-title">{{ $course->name }}</div>
                                <p class="card-text">{{ $course->description }}</p>
                            </div>
                            <div class="card-bot">
                                <a href="{{ route('courses.show', [$course->id]) }}"
                                    class="btn btn-primary">{{ __('artribute.take_this_course') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="list-top">
            <div class="list-title">{{ __('artribute.other_courses') }}</div>
        </div>
        <div class="row list-course">
            @foreach ($otherCourses as $course)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img">
                            <img class="card-img-top" src="{{ $course->image }}" alt="Card image">
                        </div>
                        <div class="card-body">
                            <div class="card-top">
                                <div class="card-title">{{ $course->name }}</div>
                                <p class="card-text">{{ $course->description }}</p>
                            </div>
                            <div class="card-bot">
                                <a href="{{ route('courses.show', [$course->id]) }}"
                                    class="btn btn-primary">{{ __('artribute.take_this_course') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="course-footer">
                <a href="{{ route('courses.index') }}" class="course-text">{{ __('artribute.view_all_courses') }}</a>
                <i class="fa-solid fa-arrow-right-long"></i>
            </div>
        </div>
    </div>

    <div class="container-fluid reason">
        <div class="row why-container">
            <div class="col-gl-6 col-xl-6 col-sm-7 col-md-7 col-xs-12 why-content">
                <div class="why-heading">why hapoLearn?</div>
                <div class="why-container-item">
                    <div class="why-item">
                        <i class="far fa-check-circle"></i>
                        <span>Interactive lessons, "on-the-go" practice, peer support.</span>
                    </div>
                    <div class="why-item">
                        <i class="far fa-check-circle"></i>
                        <span>Interactive lessons, "on-the-go" practice, peer support.</span>
                    </div>
                    <div class="why-item">
                        <i class="far fa-check-circle"></i>
                        <span>Interactive lessons, "on-the-go" practice, peer support.</span>
                    </div>
                    <div class="why-item">
                        <i class="far fa-check-circle"></i>
                        <span>Interactive lessons, "on-the-go" practice, peer support.</span>
                    </div>
                    <div class="why-item">
                        <i class="far fa-check-circle"></i>
                        <span>Interactive lessons, "on-the-go" practice, peer support.</span>
                    </div>
                </div>
            </div>
            <div class="col-gl-6 col-xl-6 col-6 col-sm-5 col-md-5 col-xs-12 why-image">
                <img class="col-12" src="{{ asset('images/Devices.png') }}" alt="...">
            </div>
        </div>
    </div>

    <div class="container feedback">
        <div class="feedback-top">
            <div class="heading-courses">{{ __('artribute.feedback') }}</div>
            <div class="feedback-description">What other students turned professionals have to say about us<br>
                after learning with us and reaching their goals
            </div>
        </div>
        <div class="container">
            <div class="slide-feedback">
                @foreach ($reviews as $review)
                    <div class="feedback-item">
                        <div class="feedback-container">
                            <div class="feedback-content"> {{ $review->review }} </div>
                        </div>
                        <div class="row user-comment">
                            <img src="{{ $review->user->avatar }}" class="user-avatar" alt="...">
                            <div class="feedback-user-info col-8">
                                <div class="user-name">{{ $review->user->user_name }}</div>
                                <div class="user-category">{{ $review->course->name }}</div>
                                <div class="user-language">{{ $review->language }}</div>
                                <div class="user-rate">
                                    @for ($i = 0; $i < $review->rate; $i++)
                                        <i class="fa-solid fa-star user-star-icon"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid statistic-banner">
        <div class="statistic-container">
            <div class="banner-statistic-title">{{ __('artribute.become_a_member') }} </div>
            <div class="statistic-btn"> {{ __('artribute.start_learning') }} </div>
        </div>
    </div>
    <div class="container statistic-main">
        <div class="heading-statistic-main">{{ __('artribute.statistic') }}</div>
        <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 g-4">
            <div class="col">
                <div class="h-100 list-item">
                    <div class="list-title">courses</div>
                    <div class="list-data">{{ number_format($countCourse) }}</div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 list-item">
                    <div class="list-title">lessons</div>
                    <div class="list-data">{{ number_format($countLesson) }}</div>
                </div>
            </div>
            <div class="col">
                <div class="h-100 list-item">
                    <div class="list-title">learners</div>
                    <div class="list-data">{{ number_format($learners) }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
