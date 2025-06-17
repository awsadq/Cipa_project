@extends('layouts.app')

@push('styles')

@endpush

@section('content')
    <div class="container-fluid px-0">

        {{-- 🔹 Карусель --}}
        @include('components.carousel')


        {{-- 🔹 Курсы --}}
        @include('components.home_courses', ['courses' => $courses])

        {{-- 🔹 Новости --}}
        @include('components.home_news', ['news' => $news])

    </div>
@endsection
