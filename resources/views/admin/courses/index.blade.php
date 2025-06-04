@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Курсы</h2>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">➕ Добавить курс</a>

        @foreach($courses as $course)
            <div class="card mb-3">
                <div class="card-body">
                    <h4>{{ $course->title }}</h4>
                    <p>{{ $course->description }}</p>
                    <p><strong>Категория:</strong> {{ isset($course->category->name) ? $course->category->name : '-' }}</p>
                    <p><strong>Тренер:</strong> {{ isset($course->trainer->name) ? $course->trainer->name : '-' }}</p>
                    <p><strong>Сроки:</strong> {{ $course->start_date }} — {{ $course->end_date }}</p>

                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning">✏️ Редактировать</a>
                    <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑️ Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
