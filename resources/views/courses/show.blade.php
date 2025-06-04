@extends('layouts.app')

@section('content')
    <style>
        .course-detail-section {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .course-hero {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
        }

        .course-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #007bff, #17a2b8, #007bff);
            z-index: 1;
        }

        .course-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 3rem 2rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .course-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .course-header::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 0;
        }

        .course-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
            line-height: 1.2;
        }

        .course-breadcrumb {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        .course-content {
            padding: 0;
            background: white;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }

        .info-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 4px solid #17a2b8;
            position: relative;
        }

        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .info-label {
            color: #6c757d;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .content-section {
            padding: 2.5rem 2rem;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 1rem;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 30px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 2px;
        }

        .description-content {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid #e9ecef;
            color: #495057;
            font-size: 1.05rem;
            line-height: 1.7;
            position: relative;
        }

        .description-content::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 20px;
            font-size: 4rem;
            color: #dee2e6;
            font-weight: bold;
        }

        .program-section {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
            margin-top: 2rem;
        }

        .program-header {
            background: linear-gradient(135deg, #495057, #343a40);
            color: white;
            padding: 1.25rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .program-content {
            padding: 2rem;
            background: #f8f9fa;
            font-size: 1rem;
            line-height: 1.8;
            color: #495057;
            white-space: pre-line;
        }

        .program-file-btn {
            background: linear-gradient(135deg, #6c757d, #495057);
            border: none;
            color: white;
            padding: 0.875rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .program-file-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .program-file-btn:hover::before {
            left: 100%;
        }

        .program-file-btn:hover {
            background: linear-gradient(135deg, #495057, #343a40);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
            color: white;
        }

        .action-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2.5rem 2rem;
            text-align: center;
            border-top: 3px solid #007bff;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .btn-enroll {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.3);
        }

        .btn-enroll::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s;
        }

        .btn-enroll:hover::before {
            left: 100%;
        }

        .btn-enroll:hover {
            background: linear-gradient(135deg, #c82333, #a71e2a);
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(220, 53, 69, 0.4);
            color: white;
        }

        .btn-back {
            background: white;
            border: 2px solid #6c757d;
            color: #6c757d;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #6c757d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.3);
        }

        .schedule-link {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .schedule-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .schedule-link:hover::before {
            left: 100%;
        }

        .schedule-link:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
            color: white;
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #dee2e6, transparent);
            margin: 2rem 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .course-title {
                font-size: 2rem;
            }

            .course-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
                padding: 1.5rem;
            }

            .content-section {
                padding: 2rem 1.5rem;
            }

            .action-section {
                padding: 2rem 1.5rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-enroll,
            .btn-back {
                width: 100%;
                max-width: 300px;
            }
        }

        /* Animation for page load */
        .course-hero {
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .info-card {
            animation: fadeInScale 0.6s ease-out forwards;
            opacity: 0;
        }

        .info-card:nth-child(1) { animation-delay: 0.1s; }
        .info-card:nth-child(2) { animation-delay: 0.2s; }
        .info-card:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

    <div class="course-detail-section">
        <div class="container">
            <div class="course-hero">
                <!-- Hero Header -->
                <div class="course-header">
                    <div class="course-breadcrumb">
                        Главная → Курсы → Детали курса
                    </div>
                    <h1 class="course-title">{{ $course->title }}</h1>
                </div>

                <div class="course-content">
                    <!-- Course Info Grid -->
                    <div class="info-grid">
                        <div class="info-card">
                            <div class="info-label">📚 Категория</div>
                            <div class="info-value">{{ $course->category->name ?? 'Не указана' }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">👨‍🏫 Тренер</div>
                            <div class="info-value">{{ $course->trainer->name ?? 'Не указан' }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">📅 Период обучения</div>
                            <div class="info-value">
                                {{ \Carbon\Carbon::parse($course->start_date)->format('d.m.Y') }} —
                                {{ \Carbon\Carbon::parse($course->end_date)->format('d.m.Y') }}
                            </div>
                        </div>
                    </div>

                    <!-- Course Description -->
                    <div class="content-section">
                        <h2 class="section-title">Описание курса</h2>
                        <div class="description-content">
                            {{ $course->description }}
                        </div>

                        <!-- Course Program -->
                        @if($course->program || $course->program_file)
                            <div class="divider"></div>
                            <h2 class="section-title">Программа курса</h2>

                            <div class="program-section">
                                <div class="program-header">
                                    📋 Учебная программа
                                </div>

                                @if($course->program)
                                    <div class="program-content">
                                        {{ $course->program }}
                                    </div>
                                @endif

                                @if($course->program_file)
                                    <div style="padding: 0 2rem 2rem;">
                                        <a href="{{ asset('storage/' . $course->program_file) }}"
                                           class="program-file-btn" target="_blank">
                                            📄 Скачать полную программу
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Action Section -->
                    <div class="action-section">
                        @php
                            $orgPhone = '996555500182';
                            $message = 'Здравствуйте! Я хочу записаться на курс: ' . $course->title;
                        @endphp

                        <div class="action-buttons">
                            <a href="https://wa.me/{{ $orgPhone }}?text={{ urlencode($message) }}"
                               class="btn-enroll" target="_blank">
                                📲 Записаться на курс
                            </a>

                            <a href="{{ url()->previous() }}" class="btn-back">
                                ⬅️ Вернуться назад
                            </a>
                        </div>

                        <div class="divider"></div>

                        <a href="{{ route('courses.full_schedule') }}" class="schedule-link">
                            📅 Полное расписание курсов
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
