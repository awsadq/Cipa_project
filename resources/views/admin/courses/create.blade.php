@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Сообщение об успехе --}}
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Добавить курс</h2>
        <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.courses.form')
            <button type="submit" class="btn btn-success">💾 Сохранить</button>
        </form>

    </div>
@endsection
