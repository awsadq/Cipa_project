@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Сертифицированные пользователи</h2>
        @foreach($users as $user)
            <div class="card mb-2 p-3">
                <p><strong>{{ $user->email }}</strong></p>
                <a href="{{ route('admin.certified.edit', $user) }}" class="btn btn-sm btn-primary">Редактировать</a>
            </div>
        @endforeach
    </div>
@endsection
