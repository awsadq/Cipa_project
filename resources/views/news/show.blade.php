@extends('layouts.app')

@section('content')
    <style>
        .news-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .news-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #e3e8ed;
            transition: all 0.3s ease;
        }

        .news-card:hover {
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .news-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .news-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(239, 68, 68, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
            z-index: 1;
        }

        .news-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
            position: relative;
            z-index: 2;
        }

        .news-image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
            height: 200px;
            z-index: 3;
        }

        .news-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 30px 0;
            line-height: 1.2;
            text-align: center;
            padding: 40px 40px 0 40px;
            letter-spacing: -0.025em;
        }

        .news-meta {
            display: flex;
            justify-content: center;
            gap: 40px;
            padding: 0 40px 40px 40px;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f1f5f9;
            padding: 16px 24px;
            border-radius: 12px;
            border-left: 4px solid #ef4444;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .meta-item:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .meta-item:nth-child(2) {
            border-left-color: #3b82f6;
        }

        .meta-icon {
            font-size: 1.25rem;
            color: #64748b;
        }

        .meta-text {
            font-size: 1rem;
            font-weight: 600;
            color: #374151;
            margin: 0;
        }

        .news-content {
            padding: 50px;
            background: #ffffff;
        }

        .content-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #374151;
            text-align: justify;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content-text::first-letter {
            font-size: 4rem;
            font-weight: 700;
            float: left;
            line-height: 1;
            margin: 8px 12px 0 0;
            color: #ef4444;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-button-container {
            padding: 40px 50px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-top: 1px solid #e5e7eb;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
            border: none;
            cursor: pointer;
        }

        .back-button:hover {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(59, 130, 246, 0.4);
            color: #ffffff;
            text-decoration: none;
        }

        .back-button:active {
            transform: translateY(0);
        }

        .back-icon {
            font-size: 1.25rem;
            transition: transform 0.3s ease;
        }

        .back-button:hover .back-icon {
            transform: translateX(-4px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .news-detail-container {
                padding: 20px 10px;
            }

            .news-title {
                font-size: 2rem;
                padding: 30px 20px 0 20px;
            }

            .news-meta {
                flex-direction: column;
                gap: 15px;
                padding: 0 20px 30px 20px;
            }

            .meta-item {
                justify-content: center;
            }

            .news-content {
                padding: 30px 20px;
            }

            .content-text {
                font-size: 1rem;
                line-height: 1.7;
            }

            .content-text::first-letter {
                font-size: 3rem;
            }

            .back-button-container {
                padding: 30px 20px;
            }

            .news-image {
                height: 250px;
            }
        }

        @media (max-width: 480px) {
            .news-title {
                font-size: 1.75rem;
            }

            .meta-item {
                padding: 12px 16px;
            }

            .back-button {
                padding: 14px 24px;
                font-size: 1rem;
            }
        }

        /* Loading Animation */
        .news-card {
            animation: fadeInUp 0.6s ease-out;
        }

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

        /* Print Styles */
        @media print {
            .news-detail-container {
                background: white;
                padding: 0;
            }

            .news-card {
                box-shadow: none;
                border: 1px solid #000;
            }

            .back-button-container {
                display: none;
            }
        }
    </style>

    <div class="news-detail-container">
        <article class="news-card">
            <header class="news-header">
                @if($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="news-image">
                    <div class="news-image-overlay"></div>
                @endif
            </header>

            <div class="news-title-section">
                <h1 class="news-title">{{ $news->title }}</h1>

                <div class="news-meta">
                    <div class="meta-item">
                        <span class="meta-icon">🗓️</span>
                        <p class="meta-text">Опубликовано: {{ $news->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    <div class="meta-item">
                        <span class="meta-icon">👁️</span>
                        <p class="meta-text">Просмотрено: {{ number_format($news->views) }}</p>
                    </div>
                </div>
            </div>

            <section class="news-content">
                <div class="content-text">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </section>

            <footer class="back-button-container">
                <a href="{{ route('components.home_news') }}" class="back-button">
                <span class="back-icon">←</span>
                    <span>Назад к новостям</span>
                </a>
            </footer>
        </article>
    </div>
@endsection
