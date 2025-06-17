@extends('layouts.app')

@section('content')
    <style>

        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-red: #dc2626;
            --light-red: #fecaca;
            --warning-orange: #f59e0b;
            --light-orange: #fef3c7;
            --gray-900: #111827;
            --gray-800: #1f2937;
            --gray-700: #374151;
            --gray-600: #4b5563;
            --gray-500: #6b7280;
            --gray-400: #9ca3af;
            --gray-300: #d1d5db;
            --gray-200: #e5e7eb;
            --gray-100: #f3f4f6;
            --gray-50: #f9fafb;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --gradient-primary: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            --gradient-red: linear-gradient(135deg, var(--accent-red) 0%, #b91c1c 100%);
            --gradient-orange: linear-gradient(135deg, var(--warning-orange) 0%, #d97706 100%);
        }


        /* Container styling */
        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
            position: relative;
        }

        /* Add subtle background pattern */
        .news-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: var(--gradient-primary);
            opacity: 0.03;
            border-radius: 0 0 50px 50px;
            z-index: -1;
        }

        /* Success Alert Styling */
        .alert-success {
            background: var(--gradient-primary) !important;
            border: none !important;
            border-radius: 16px !important;
            color: white !important;
            box-shadow: var(--shadow-lg) !important;
            padding: 1.25rem 1.5rem !important;
            margin-bottom: 2rem !important;
            position: relative;
            overflow: hidden;
        }

        .alert-success::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
        }

        .alert-success::after {
            content: '✓';
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            font-weight: bold;
            opacity: 0.7;
        }

        .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .btn-close:hover {
            opacity: 1;
        }

        /* Main heading */
        h2 {
            color: var(--gray-900) !important;
            font-size: 2.5rem !important;
            font-weight: 700 !important;
            margin-bottom: 0.5rem !important;
            letter-spacing: -0.025em;
            position: relative;
            display: inline-block;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        /* Add news button */
        .btn-primary {
            background: var(--gradient-primary) !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 14px 28px !important;
            font-weight: 600 !important;
            font-size: 1rem !important;
            letter-spacing: 0.025em !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: var(--shadow-md) !important;
            position: relative;
            overflow: hidden;
            margin-bottom: 0 !important;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px) !important;
            box-shadow: var(--shadow-xl) !important;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%) !important;
        }

        .btn-primary:active {
            transform: translateY(-1px) !important;
        }

        /* News Cards */
        .card {
            border: 1px solid var(--gray-200) !important;
            border-radius: 20px !important;
            background: var(--white) !important;
            box-shadow: var(--shadow-sm) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            margin-bottom: 2rem !important;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-primary);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card:hover {
            transform: translateY(-8px) !important;
            box-shadow: var(--shadow-xl) !important;
            border-color: var(--light-blue) !important;
        }

        .card-body {
            padding: 2rem !important;
            position: relative;
        }

        /* News title */
        .card-body h4 {
            color: var(--gray-900) !important;
            font-size: 1.5rem !important;
            font-weight: 700 !important;
            margin-bottom: 1rem !important;
            letter-spacing: -0.025em;
            line-height: 1.3;
        }

        /* Published date */
        .text-muted.small {
            background: var(--gray-100) !important;
            color: var(--gray-600) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 25px !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            display: inline-block !important;
            margin-bottom: 1rem !important;
            border: 1px solid var(--gray-200);
        }

        /* Content preview */
        .card-body > p:not(.text-muted) {
            color: var(--gray-600) !important;
            font-size: 1rem !important;
            line-height: 1.6 !important;
            margin-bottom: 1.5rem !important;
        }

        /* Image styling */
        .img-fluid {
            border-radius: 12px !important;
            box-shadow: var(--shadow-md) !important;
            transition: all 0.3s ease !important;
            border: 1px solid var(--gray-200) !important;
        }

        .img-fluid:hover {
            transform: scale(1.02) !important;
            box-shadow: var(--shadow-lg) !important;
        }

        /* Action buttons container */
        .mt-3 {
            display: flex !important;
            gap: 0.75rem !important;
            align-items: center !important;
            flex-wrap: wrap !important;
            padding-top: 1.5rem !important;
            border-top: 1px solid var(--gray-200) !important;
        }

        /* Edit button */
        .btn-warning {
            background: var(--gradient-orange) !important;
            border: none !important;
            color: white !important;
            border-radius: 10px !important;
            padding: 10px 20px !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: var(--shadow-sm) !important;
            position: relative;
            overflow: hidden;
        }

        .btn-warning::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.4s;
        }

        .btn-warning:hover::before {
            left: 100%;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: var(--shadow-md) !important;
        }

        /* Delete button */
        .btn-danger {
            background: var(--gradient-red) !important;
            border: none !important;
            color: white !important;
            border-radius: 10px !important;
            padding: 10px 20px !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            box-shadow: var(--shadow-sm) !important;
            position: relative;
            overflow: hidden;
        }

        .btn-danger::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.4s;
        }

        .btn-danger:hover::before {
            left: 100%;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: var(--shadow-md) !important;
        }

        /* Form inline styling */
        .d-inline {
            display: inline-block !important;
        }

        /* Button icons enhancement */
        .btn-primary::after {
            content: '';
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 6px solid white;
            border-top: 4px solid transparent;
            border-bottom: 4px solid transparent;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-primary:hover::after {
            opacity: 0.7;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            h2 {
                font-size: 2rem !important;
            }

            .card-body {
                padding: 1.5rem !important;
            }

            .btn-primary {
                width: 100%;
                margin-bottom: 2rem !important;
            }

            .mt-3 {
                flex-direction: column !important;
                align-items: stretch !important;
            }

            .btn-warning,
            .btn-danger {
                width: 100% !important;
                justify-content: center !important;
            }

            .img-fluid {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media (max-width: 480px) {
            h2 {
                font-size: 1.75rem !important;
            }

            .card-body h4 {
                font-size: 1.25rem !important;
            }

            .btn-primary {
                padding: 12px 20px !important;
                font-size: 0.9rem !important;
            }
        }

        /* Animation for page load */
        .card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        .card:nth-child(5) { animation-delay: 0.5s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Focus states for accessibility */
        .btn:focus {
            outline: 2px solid var(--secondary-blue) !important;
            outline-offset: 2px !important;
        }

        .btn-warning:focus {
            outline: 2px solid var(--warning-orange) !important;
            outline-offset: 2px !important;
        }

        .btn-danger:focus {
            outline: 2px solid var(--accent-red) !important;
            outline-offset: 2px !important;
        }

        /* Empty state (if no news) */
        .container:has(.card:empty) {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            text-align: center;
        }

        /* Loading state animation */
        .card-body::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s;
            pointer-events: none;
        }

        .card:hover .card-body::after {
            left: 100%;
        }

        /* Print styles */
        @media print {
            .card:hover {
                transform: none !important;
                box-shadow: var(--shadow-sm) !important;
            }

            .btn {
                display: none !important;
            }

            .alert {
                display: none !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .card {
                border: 2px solid var(--gray-900) !important;
            }

            .btn {
                border: 2px solid currentColor !important;
            }
        }

        /* Reduce motion for users who prefer it */
        @media (prefers-reduced-motion: reduce) {
            .card,
            .btn,
            .img-fluid {
                transition: none !important;
                animation: none !important;
            }

            .card:hover {
                transform: none !important;
            }
        }
    </style>

    <div class="news-container">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h2 class="m-0">Новости</h2>
                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">➕ Добавить новость</a>
            </div>

        @foreach($news as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{ $item->title }}</h4>
                        <p class="text-muted small">🕒 Опубликовано: {{ $item->created_at->format('d.m.Y H:i') }}</p>
                        <p>{{ Str::limit($item->content, 150) }}</p>

                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" width="200" class="img-fluid rounded mt-2">
                        @endif

                        <div class="mt-3">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm btn-warning">✏️ Редактировать</a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
    </div>
@endsection
