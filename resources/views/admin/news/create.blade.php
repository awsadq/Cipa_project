@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Добавить новость</h2>
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Заголовок</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Контент</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label>Изображение</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">💾 Сохранить</button>
        </form>
    </div>
@endsection
