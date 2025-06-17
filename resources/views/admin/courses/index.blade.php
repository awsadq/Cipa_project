@extends('layouts.app')

@section('content')
    <div class="min-vh-100" style=" ">
        <div class="container py-5">
            @if(session('message'))
                <div class="alert alert-success border-0 shadow-sm mb-4" role="alert" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; border-radius: 12px;">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.061L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        </div>
                        <div class="flex-grow-1">
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white ms-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Header Section -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="mb-2" style="color: #1e293b; font-weight: 700; font-size: 2.5rem;">Управление курсами</h1>
                            <p class="text-muted mb-0" style="font-size: 1.1rem;">Создавайте и управляйте образовательными программами</p>
                        </div>
                        <div>
                            <a href="{{ route('admin.courses.create') }}" class="btn btn-lg shadow-sm" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); border: none; color: white; border-radius: 12px; font-weight: 600; padding: 12px 24px; transition: all 0.3s ease;">
                                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                                Добавить курс
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; transition: all 0.3s ease; background: white;">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <h3 class="mb-2" style="color: #1e293b; font-weight: 600; font-size: 1.5rem;">{{ $course->title }}</h3>
                                            <p class="text-muted mb-3" style="font-size: 1rem; line-height: 1.6;">{{ $course->description }}</p>
                                        </div>

                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #e0f2fe 0%, #b3e5fc 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                        <svg width="20" height="20" fill="#0277bd" viewBox="0 0 16 16">
                                                            <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block" style="font-size: 0.85rem;">Категория</small>
                                                        <span style="color: #475569; font-weight: 500;">{{ isset($course->category->name) ? $course->category->name : 'Не указана' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                        <svg width="20" height="20" fill="#7c3aed" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block" style="font-size: 0.85rem;">Тренер</small>
                                                        <span style="color: #475569; font-weight: 500;">{{ isset($course->trainer->name) ? $course->trainer->name : 'Не назначен' }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3" style="width: 40px; height: 40px; background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                        <svg width="20" height="20" fill="#d97706" viewBox="0 0 16 16">
                                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V1.5A.5.5 0 0 1 2 1h1V.5a.5.5 0 0 1 .5 0zM2 2v10h12V2H2z"/>
                                                            <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted d-block" style="font-size: 0.85rem;">Период</small>
                                                        <span style="color: #475569; font-weight: 500; font-size: 0.9rem;">{{ $course->start_date }} — {{ $course->end_date }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="d-flex flex-column flex-lg-row gap-2 justify-content-lg-end">
                                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-outline-primary" style="border-radius: 10px; border-width: 2px; font-weight: 500; padding: 8px 20px; transition: all 0.3s ease;">
                                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708L10.5 8.207l-3-3L12.146.146zM11.207 9L9 6.793l-7.5 7.5V16h1.707L11.207 9z"/>
                                                </svg>
                                                Редактировать
                                            </a>
                                            <form method="POST" action="{{ route('admin.courses.destroy', $course) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border: none; border-radius: 10px; font-weight: 500; padding: 8px 20px; transition: all 0.3s ease;">
                                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84L13.962 3.5H14.5a.5.5 0 0 0 0-1h-1.004a.58.58 0 0 0-.01 0H11Z"/>
                                                    </svg>
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($courses) === 0)
                <div class="text-center py-5">
                    <div class="mb-4">
                        <svg width="80" height="80" fill="#cbd5e1" viewBox="0 0 16 16" class="mx-auto">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        </svg>
                    </div>
                    <h4 style="color: #64748b; font-weight: 600;">Курсы не найдены</h4>
                    <p class="text-muted">Создайте свой первый курс, чтобы начать работу</p>
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mt-3">Создать курс</a>
                </div>
            @endif
        </div>
    </div>

    <style>
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-outline-primary:hover {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }
    </style>
@endsection
