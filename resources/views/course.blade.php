<div class="list-course-card">
  <div class="row row-cols-1 row-cols-md-2 g-4">
      @foreach($courses as $course)
          <div class="col">
              <div class="card card-list-course">
                  <div class="row list-course-main">
                      <img src="{{ asset($course->image) }}" class="col-3 list-course-image" alt="...">
                      <div class="col-8 card-body">
                          <h5 class="course-card-title text-left">{{ $course->name }}</h5>
                          <p class="card-text text-left">{{ $course->description }}</p>
                          <button class="btn-main course-card-button"><a href="#">More</a></button>
                      </div>
                  </div>
                  <div class="card-footer">
                      <div class="row">
                          <div class="col-4 footer-course-item">
                              <div class="list-title">learners</div>
                              <div class="list-data">{{ number_format($learners) }}</div>
                          </div>
                          <div class="col-4 footer-course-item">
                              <div class="list-title">lessons</div>
                              <div class="list-data">{{ number_format($countLessons) }}</div>
                          </div>
                          <div class="col-4 footer-course-item">
                              <div class="list-title">times</div>
                              <div class="list-data">{{ number_format(($course->)/config('config.convert_hours'), 0, ',', ' ') }} (h)</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</div>
{{ $courses->withQueryString()->links() }}
</div>
@if(count($courses) == 0)
<h2 class="align-content-center">No result found</h2>
@endif
