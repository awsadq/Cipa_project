@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Новости</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">➕ Добавить новость</a>

        @foreach($news as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{ $item->title }}</h4>
                        <p class="text-muted small">🕒 Опубликовано: {{ $item->created_at->format('d.m.Y H:i') }}</p>
                        <p>{{ Str::limit($item->content, 150) }}</p>

                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" width="200" class="img-fluid rounded mt-2">
                        @endif

                        <div class="mt-3">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">✏️ Редактировать</a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
    </div>
@endsection
