@extends('layouts.learning')

@section('hero')
    @include('partials.learning.hero_topics')
@endsection

@section('content')


    <topics
        :course="{{ request()->route("course")->id
            
           
        }}"
    ></topics>
@endsection

@push("js")
    <script src="{{ asset("js/app.js") }}"></script>
@endpush
