<div class="side-bar-item other-course" id="jsOtherCourse">
    <div class="title">{{ __('artribute.other_courses') }}</div>
    <div class="content">

        @foreach ($others as $key => $other)
            <a href="{{ route('courses.show', [$other->id]) }}" class="other-course-row">
                <div class="num">{{ $key + 1 }}. </div>
                <div class="name">{{ $other->name }}</div>
            </a>
        @endforeach

        <div class="other-course-row">
            <a href="{{ route('courses.index') }}" class="btn view-all">{{ __('artribute.view_all_courses') }}</a>
        </div>
    </div>
</div>
