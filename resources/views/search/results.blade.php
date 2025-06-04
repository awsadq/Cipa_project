@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4 text-primary fw-bold">🔍 Результаты поиска по запросу: <span class="text-dark">"{{ $query }}"</span></h3>

        @if($courses->count())
            <h4 class="mt-4 mb-3">📘 Найденные курсы</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($courses as $course)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ \Illuminate\Support\Str::limit($course->description, 100, '...') }}
                                </p>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($news->count())
            <h4 class="mt-5 mb-3">📰 Найденные новости</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($news as $item)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 100, '...') }}
                                </p>
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-secondary btn-sm">Читать</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($courses->isEmpty() && $news->isEmpty())
            <div class="alert alert-warning mt-4">
                <strong>😔 Ничего не найдено</strong><br>
                Попробуйте изменить запрос или использовать другие ключевые слова.
            </div>
        @endif
    </div>
@endsection
