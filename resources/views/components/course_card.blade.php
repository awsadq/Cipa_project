@push('styles')
    <style>
        .course-card {
            background: linear-gradient(145deg, #f3f4f6, #e8f1fd);
            border-radius: 18px;
            box-shadow: 0 12px 28px rgba(30, 64, 175, 0.12);
            border: 1px solid #cbd5e1;
            padding: 24px;
            position: relative;
            transition: all 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            min-height: 100%;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 5px;
            width: 100%;
            background: linear-gradient(to right, #3b82f6, #1e3a8a, #494747);
        }

        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(30, 58, 138, 0.2);
        }

        .course-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 0.75rem;
            letter-spacing: -0.5px;
        }

        .course-description {
            color: #374151;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.25rem;
        }

        .course-date {
            background: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 0.65rem 1rem;
            border-radius: 10px;
            color: #1e293b;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .course-actions {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-top: auto;
        }

        .btn-details,
        .btn-enroll {
            display: inline-block;
            padding: 0.75rem 1.3rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-details {
            background: #e0f2fe;
            color: #1e40af;
            border: 1px solid #93c5fd;
        }

        .btn-details:hover {
            background: #bae6fd;
            color: #1e3a8a;
        }

        .btn-enroll {
            background: linear-gradient(to right, #ef4444, #dc2626);
            color: white;
            border: none;
        }

        .btn-enroll:hover {
            background: linear-gradient(to right, #dc2626, #b91c1c);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }

        @media (max-width: 768px) {
            .course-card {
                padding: 18px;
            }

            .course-title {
                font-size: 1.2rem;
            }

            .course-description {
                font-size: 0.9rem;
            }

            .btn-details,
            .btn-enroll {
                font-size: 0.85rem;
                padding: 0.65rem 1rem;
            }
        }
    </style>
@endpush




<div class="course-card">

    <div class="course-card-body">
        <h5 class="course-title">{{ $course->title }}</h5>

        <p class="course-description">
            {{ Str::limit(strip_tags($course->description), 120) }}
        </p>

        <div class="course-date">
            📅 {{ \Carbon\Carbon::parse($course->start_date)->format('d.m.Y') }} —
            {{ \Carbon\Carbon::parse($course->end_date)->format('d.m.Y') }}
        </div>

        <div class="course-actions">
            <a href="{{ route('courses.show', $course) }}" class="btn-details">
                Подробная информация
            </a>

            @php
                $orgPhone = '996555500182';
                $message = 'Здравствуйте! Я хочу записаться на курс: ' . $course->title;
            @endphp

            <a href="https://wa.me/{{ $orgPhone }}?text={{ urlencode($message) }}"
               class="btn-enroll" target="_blank">
                ✓ Записаться на курс
            </a>
        </div>
    </div>
</div>
