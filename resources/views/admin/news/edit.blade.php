@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Редактировать новость</h2>
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Заголовок</label>
                <input type="text" name="title" value="{{ $news->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Контент</label>
                <textarea name="content" class="form-control" rows="5" required>{{ $news->content }}</textarea>
            </div>

            <div class="mb-3">
                <label>Текущее изображение</label><br>
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" width="200"><br><br>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">💾 Обновить</button>
        </form>
    </div>
@endsection
