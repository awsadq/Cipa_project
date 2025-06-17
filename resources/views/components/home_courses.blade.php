<div class="container mt-5">
    <!-- Custom CSS for modern corporate design -->
    <style>

        .courses-section {
            position: relative;
            z-index: 1;
            margin-top: 30px;
        }

        /* Section Header */
        .section-header {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-header::after {
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

        /* Category Filters */
        .category-filters {
            margin-bottom: 3rem;
            display: flex;
            justify-content: center;
        }

        .filter-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem;
            background: #ffffff;
            color: #64748b;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid #e2e8f0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .filter-btn:hover::before {
            left: 100%;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            color: #1e293b;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #ffffff;
            border-color: #ef4444;
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        }

        /* Course Cards */
        .course-card {
            background: linear-gradient(135deg, #f9fafb, #f3f4f4);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: 1px solid #f1f5f9;
            height: 100%;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ef4444, #3b82f6, #06b6d4);
            z-index: 1;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: #e2e8f0;
        }

        .course-card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
        }

        .course-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-description {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .course-date {
            color: #3b82f6;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            padding: 0.5rem 1rem;
            background: #eff6ff;
            border-radius: 12px;
            border-left: 4px solid #3b82f6;
        }

        .course-actions {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: auto;
        }

        .btn-details {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            color: #475569;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border: 2px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .btn-details::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            transition: all 0.3s ease;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        .btn-details:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-details:hover {
            color: #1e293b;
            border-color: #cbd5e1;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-enroll {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-enroll::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-enroll:hover::before {
            left: 100%;
        }

        .btn-enroll:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
            color: #ffffff;
        }

        /* No Courses Alert */
        .no-courses-alert {
            text-align: center;
            padding: 3rem 2rem;
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            border-radius: 20px;
            border: 2px dashed #cbd5e1;
            color: #64748b;
        }

        .no-courses-alert h5 {
            color: #475569 !important;
            font-weight: 600;
            margin-bottom: 1rem !important;
        }

        /* Schedule Link */
        .schedule-link {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #ffffff;
            text-decoration: none;
            border-radius: 15px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
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
            transition: left 0.5s;
        }

        .schedule-link:hover::before {
            left: 100%;
        }

        .schedule-link:hover {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
            color: #ffffff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
                margin: 1rem;
                border-radius: 15px;
            }

            .section-header {
                font-size: 1.75rem;
                margin-bottom: 1.5rem;
            }

            .category-filters {
                margin-bottom: 2rem;
            }

            .filter-btn {
                padding: 0.6rem 1.2rem;
                font-size: 0.85rem;
                margin: 0.15rem;
            }

            .course-card-body {
                padding: 1.5rem;
            }

            .course-title {
                font-size: 1.1rem;
            }

            .course-actions {
                gap: 0.5rem;
            }

            .btn-details, .btn-enroll {
                padding: 0.7rem 1.2rem;
                font-size: 0.85rem;
            }

            .schedule-link {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        /* Advanced Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .course-card {
            animation: fadeInUp 0.6s ease-out;
        }

        .course-card:nth-child(1) { animation-delay: 0.1s; }
        .course-card:nth-child(2) { animation-delay: 0.2s; }
        .course-card:nth-child(3) { animation-delay: 0.3s; }
        .course-card:nth-child(4) { animation-delay: 0.4s; }
        .course-card:nth-child(5) { animation-delay: 0.5s; }
        .course-card:nth-child(6) { animation-delay: 0.6s; }


    </style>

    <div class="courses-section">
        <h3 class="section-header">📚 Ближайшие курсы и семинары</h3>

        {{-- Category Filters --}}
        <div class="category-filters">
            <div class="d-flex flex-wrap">
                <a href="{{ route('courses.index') }}"
                   class="filter-btn {{ request('category') ? '' : 'active' }}">
                    Все курсы
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('courses.index', ['category' => $cat->name]) }}"
                       class="filter-btn {{ request('category') === $cat->name ? 'active' : '' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Course Cards --}}
        <div class="row g-4">
            @forelse($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="course-card-body">
                            <h5 class="course-title">{{ $course->title }}</h5>

                            <p class="course-description">
                                {{ Str::limit(strip_tags($course->description), 120) }}
                            </p>

                            <div class="course-date">
                                📅 {{ \Carbon\Carbon::parse($course->start_date)->format('d.m.Y') }} — {{ \Carbon\Carbon::parse($course->end_date)->format('d.m.Y') }}
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
                </div>
            @empty
                <div class="col-12">
                    <div class="no-courses-alert">
                        <h5 style="color: #495057; margin-bottom: 1rem;">📋 Курсы не найдены</h5>
                        <p style="margin: 0;">По выбранной категории курсы в настоящее время не проводятся. Попробуйте выбрать другую категорию или вернитесь позже.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- All Courses Link --}}
        <div class="text-end mt-5">
            <a href="{{ route('courses.allcourses') }}" class="schedule-link">
                📚 Все курсы
            </a>
        </div>

    </div>
</div>
