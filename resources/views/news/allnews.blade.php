@extends('layouts.app')

@section('content')
    <div class="container mt-5" id="news-section">

        <style>
            .news-section {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(180deg, #f9f9fb, #f1f4f8);
                padding: 40px 0;
                border-radius: 12px;
            }

            .news-header {
                font-size: 2.25rem;
                font-weight: 700;
                color: #1e3a8a;
                text-align: center;
                margin-bottom: 3rem;
            }

            .news-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
                gap: 2rem;
                padding: 0 20px;
                max-width: 1320px;
                margin: 0 auto;
            }

            @media (min-width: 1200px) {
                .news-grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            .news-card-container {
                background: white;
                border-radius: 16px;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
                overflow: hidden;
                display: flex;
                flex-direction: column;
                transition: all 0.4s ease;
                border: 1px solid #e4e7ec;
                height: 500px;
            }

            .news-card-container:hover {
                transform: translateY(-6px);
                box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
                border-color: #bcd3ff;
            }

            .news-image-container {
                height: 240px;
                overflow: hidden;
            }

            .news-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .news-card-container:hover .news-image {
                transform: scale(1.05);
            }

            .news-body {
                padding: 1.5rem;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .news-date {
                font-size: 0.8rem;
                background-color: #e2e8f0;
                padding: 0.3rem 0.75rem;
                border-radius: 20px;
                color: #334155;
                font-weight: 500;
                margin-bottom: 0.8rem;
            }

            .news-title {
                font-size: 1.1rem;
                font-weight: 700;
                color: #1e293b;
                margin-bottom: 0.6rem;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 48px;
            }

            .news-content {
                font-size: 0.9rem;
                color: #64748b;
                line-height: 1.6;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
                margin-bottom: 1.2rem;
            }

            .news-btn {
                display: inline-block;
                text-align: center;
                background: linear-gradient(135deg, #1e3a8a, #3b82f6);
                color: white;
                font-weight: 600;
                padding: 0.7rem 1.2rem;
                border-radius: 10px;
                font-size: 0.9rem;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
            }

            .news-btn:hover {
                background: linear-gradient(135deg, #3b82f6, #1e3a8a);
                box-shadow: 0 6px 20px rgba(30, 58, 138, 0.35);
                transform: translateY(-2px);
            }

            @media (max-width: 768px) {
                .news-header {
                    font-size: 1.8rem;
                }

                .news-grid {
                    padding: 0 10px;
                }
            }
        </style>

        <div class="news-section">
            <h3 class="news-header">📰 Новости Института</h3>

            <div class="news-grid">
                @foreach($news as $item)
                    <div class="news-card-container">
                        {{-- Image --}}
                        <div class="news-image-container">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     class="news-image"
                                     alt="{{ $item->title }}"
                                     loading="lazy">
                            @else
                                <div class="news-image-placeholder">📰</div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="news-body">
                            @if($item->created_at)
                                <div class="news-meta">
                                <span class="news-date">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d.m.Y') }}
                                </span>
                                </div>
                            @endif

                            <h5 class="news-title">{{ $item->title }}</h5>

                            <p class="news-content">
                                {{ Str::limit(strip_tags($item->content), 140) }}
                            </p>

                            <a href="{{ route('news.show', $item) }}" class="news-btn">
                                Читать далее →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
