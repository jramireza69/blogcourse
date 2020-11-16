{{-- <div class="row p-5">
    <div class="col-xs-12 col-xl-9 col-md-8 col-sm-8 col-lg-9">
        <p>{!! $course->description !!}</p>

        @include("partials.learning.courses.curriculum.index")
    </div>

    <div class="col-xs-12 col-xl-3 col-md-4 col-sm-4 col-lg-3">
        @include("partials.learning.courses.sidebar")
    </div>
</div> --}}


<div class="mix col-lg-3 col-md-4 col-sm-6 @foreach($course->categories as $category) {{ $category->name }} @endforeach">
    <div class="course-item">
        <div class="course-thumb set-bg" data-setbg="{{ $course->imagePath() }}">
            <div class="price">{{ __("Precio :price €", ["price" => $course->price]) }}</div>
        </div>
        <div class="course-info">
            <div class="course-text">
                <h5>{{ $course->title }}</h5>
                <div class="students">{{ __(":count Estudiantes", ['count' => $course->students_count]) }}</div>
            </div>
            <div class="course-author">
                <div class="ca-pic set-bg" data-setbg="/img/authors/1.jpg"></div>
                <p>{{ $course->teacher->name }}</p>
            </div>
        </div>
    </div>
</div>