@extends ('layouts.app')

@section('content')

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
        <button class="button"> start learning now !</button>
    </div>
</section>
<div class="bg-bottom-of-banner"></div>

<div class="container main">
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-img-left">
                    <img src="{{ asset('images/html.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">HTML/CSS/js Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media.
                        I had coded quite a bit, but never touched anything in regards to web development.
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-img-center">
                    <img src="{{ asset('images/laravel.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">LARAVEL Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media.
                        I had coded quite a bit, but never touched anything in regards to web development.
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-img-right">
                    <img src="{{ asset('images/php.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">PHP Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media.
                        I had coded quite a bit, but never touched anything in regards to web development.
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="heading-courses">Other courses</div>
    <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-3 g-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-img-left-bot">
                    <img src="{{ asset('images/css.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">CSS Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media,...
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-img-center-bot ">
                    <img src="{{ asset('images/rails.png') }}" class="card-img-top card-rail" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ruby on rails Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media,...
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <div class="card-img-right-bot">
                    <img src="{{ asset('images/java.png') }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Java Tutorial</h5>
                    <p class="card-text">
                        I knew hardly anything about HTML, JS, and CSS before entering New Media,...
                    </p>
                    <div class="button button-success">
                        <a href="#">take this course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-footer">
        <span class="course-text">View all our course</span>
        <i class="fa-solid fa-arrow-right-long"></i>
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
        <div class="heading-courses">Feedback</div>
        <div class="feedback-description">What other students turned professionals have to say about us<br>
            after learning with us and reaching their goals
        </div>
    </div>
    <div class="container">
        <div class="slide-feedback">
            <div class="feedback-item">
                <div class="feedback-container">
                    <div class="feedback-content">
                        “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer.
                        Very glad to have taken this course. Thank you Eddie Bryan.”
                    </div>
                </div>
                <div class="row user-comment">
                    <img src="{{ asset('images/avatar-user.png') }}" class="user-avatar" alt="...">
                    <div class="feedback-user-info col-8">
                        <div class="user-name">hoang anh nguyen</div>
                        <div class="user-category">PHP</div>
                        <div class="user-rate">
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-regular fa-star user-star-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-item">
                <div class="feedback-container">
                    <div class="feedback-content">
                        “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer.
                        Very glad to have taken this course. Thank you Eddie Bryan.”
                    </div>
                </div>
                <div class="row user-comment">
                    <img src="{{ asset('images/avatar-user.png') }}" class="user-avatar" alt="...">
                    <div class="feedback-user-info col-8">
                        <div class="user-name">tuan tran hoang</div>
                        <div class="user-category">Python</div>
                        <div class="user-rate">
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-regular fa-star-half-stroke user-star-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-item">
                <div class="feedback-container">
                    <div class="feedback-content">
                        “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer.
                        Very glad to have taken this course. Thank you Eddie Bryan.”
                    </div>
                </div>
                <div class="row user-comment">
                    <img src="{{ asset('images/avatar-user.png') }}" class="user-avatar" alt="...">
                    <div class="feedback-user-info col-8">
                        <div class="user-name">hoang anh nguyen</div>
                        <div class="user-category">PHP</div>
                        <div class="user-rate">
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-regular fa-star user-star-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-item">
                <div class="feedback-container">
                    <div class="feedback-content">
                        “A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer.
                        Very glad to have taken this course. Thank you Eddie Bryan.”
                    </div>
                </div>
                <div class="row user-comment">
                    <img src="{{ asset('images/avatar-user.png') }}" class="user-avatar" alt="...">
                    <div class="feedback-user-info col-8">
                        <div class="user-name">tuan tran hoang</div>
                        <div class="user-category">Python</div>
                        <div class="user-rate">
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-solid fa-star user-star-icon"></i>
                            <i class="fa-regular fa-star-half-stroke user-star-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid statistic-banner">
    <div class="statistic-container">
        <div class="banner-statistic-title">Become a member of our<br>
            growing community!
        </div>
        <div class="statistic-btn">
            start learning now!
        </div>
    </div>
</div>
<div class="container statistic-main">
    <div class="heading-statistic-main">statistic</div>
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 row-cols-xl-3 g-4">
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">courses</div>
                <div class="list-data">1,586</div>
            </div>
        </div>
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">lessons</div>
                <div class="list-data">2,689</div>
            </div>
        </div>
        <div class="col">
            <div class="h-100 list-item">
                <div class="list-title">learners</div>
                <div class="list-data">16,882</div>
            </div>
        </div>
    </div>
</div>

@endsection
