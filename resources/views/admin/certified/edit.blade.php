@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2>Редактировать статус</h2>
        <form method="POST" action="{{ route('admin.certified.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" name="is_certified" id="is_certified"
                    {{ $user->is_certified ? 'checked' : '' }}>
                <label for="is_certified" class="form-check-label">Сертифицирован</label>
            </div>
            <button type="submit" class="btn btn-success">💾 Сохранить</button>
        </form>

        <form action="{{ route('admin.certified.destroy', $user) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">❌ Удалить сертификацию</button>
        </form>
    </div>
@endsection
