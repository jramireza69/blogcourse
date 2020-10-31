<!-- Hero section -->
<section class="hero-section set-bg" data-setbg="/img/bg.jpg">
    <div class="container">
        <div class="hero-text text-white">

            <h2>{{ __("Los mejores cursos de programacion Online") }}</h2>
            <p> {{__("puedes evolusionar rapido", [
                  'app' => env('APP_NAME')
                  ])
                  }} </p>
        </div>

        @guest()
            @include('partials.learning.signup_customer')
        @else
            <h2 class="welcome text-center">
                {{__("que quieres ver hoy :user?", ['user' => auth()->user()->name ])}}
            </h2>

        @endguest


    </div>
</section>
<!-- Hero section end -->
