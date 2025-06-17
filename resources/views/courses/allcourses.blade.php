@extends('layouts.app')

@push('styles')
    <style>
        .styled-header {
            font-size: 2.1rem;
            font-weight: 800;
            color: #1e3a8a;
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
            padding-bottom: 0.5rem;
            letter-spacing: -0.5px;
            background: linear-gradient(to right, #1e3a8a, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeSlideDown 0.7s ease forwards;
            opacity: 0;
        }

        .styled-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #ef4444, #3b82f6);
            border-radius: 2px;
        }

        @keyframes fadeSlideDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .styled-header {
                font-size: 1.6rem;
            }

            .styled-header::after {
                width: 60px;
                height: 3px;
            }
        }

        .filter-form {
            background: #f8fafc;
            border-radius: 20px;
            padding: 1.5rem 2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 2.5rem;
        }

        .filter-form:hover {
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.08);
        }

        .filter-form .filter-group {
            display: flex;
            flex-direction: column;
            flex: 1 1 180px;
            min-width: 180px;
        }

        .filter-form .form-label {
            font-weight: 600;
            color: #1e3a8a;
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
        }

        .filter-form .form-select,
        .filter-form .form-control {
            border-radius: 12px;
            border: 1.5px solid #cbd5e1;
            padding: 0.75rem 1rem;
            font-weight: 500;
            background: #ffffff;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.03);
        }

        .filter-form .form-select:focus,
        .filter-form .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #1e3a8a);
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.25);
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #1e3a8a, #2563eb);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.35);
            color: #fff;
        }

        .no-results-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 16px;
            color: #991b1b;
            box-shadow: 0 8px 20px rgba(255, 0, 0, 0.08);
        }

        .no-results-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .no-results-text {
            font-size: 1rem;
            color: #7f1d1d;
        }


    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="courses-section">
            <h3 class="section-header styled-header">📚 Все курсы и семинары</h3>

            <!-- Логичная форма фильтрации -->
            <form method="GET" class="filter-form d-flex flex-wrap gap-3 align-items-end">
                <div class="filter-group">
                    <label for="title" class="form-label">Название курса</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ request('title') }}" placeholder="Введите название">
                </div>

                <div class="filter-group">
                    <label for="category" class="form-label">Категория</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Все категории</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->name }}" {{ request('category') == $cat->name ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label for="trainer" class="form-label">Тренер</label>
                    <input type="text" name="trainer" id="trainer" class="form-control"
                           value="{{ request('trainer') }}" placeholder="Имя тренера">
                </div>

                <div class="filter-group">
                    <label for="from" class="form-label">Дата начала (с)</label>
                    <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                </div>

                <div class="filter-group">
                    <label for="to" class="form-label">Дата окончания (по)</label>
                    <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                </div>

                <div class="filter-group">
                    <button type="submit" class="btn btn-gradient w-100 mt-2">🔍 Найти курсы</button>
                </div>
            </form>

            <!-- Карточки курсов -->
            <div class="row g-4">
                @forelse($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        @include('components.course_card', ['course' => $course])
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-results-box text-center p-5 mt-4">
                            <h4 class="no-results-title">Ничего не найдено 😕</h4>
                            <p class="no-results-text">Попробуйте изменить фильтры или сбросить параметры поиска.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
