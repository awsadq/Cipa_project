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

        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Добавить курс</h2>
                <p class="form-subtitle">Заполните все обязательные поля</p>
            </div>

            <div class="form-body">
                <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.courses.form')
                    <button type="submit" class="btn btn-success w-100 mt-4">💾 Сохранить</button>
                </form>
            </div>
        </div>


    </div>
@endsection
