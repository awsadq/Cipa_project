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
            position: relative;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 20px;
            max-width: 1440px;
            margin: 0 auto;
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
            max-width: 100%; /* для ограничения ширины */
            width: 100%;
        }

        .news-card-container:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
            border-color: #bcd3ff;
        }

        .news-image-container {
            height: 240px; /* NEW: выше картинка */
            overflow: hidden;
            position: relative;
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
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .news-date {
            font-size: 0.8rem;
            background-color: #e2e8f0;
            padding: 0.3rem 0.75rem;
            border-radius: 20px;
            display: inline-block;
            color: #334155;
            font-weight: 500;
            margin-bottom: 0.8rem;
        }

        .news-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            line-height: 1.4;
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
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            display: -webkit-box;
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

        .news-controls {
            margin-top: 2.5rem;
            text-align: center;
        }

        .toggle-news-btn {
            background: linear-gradient(135deg, #495057, #343a40);
            border: none;
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(52, 58, 64, 0.2);
        }

        .toggle-news-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .toggle-news-btn:hover::before {
            left: 100%;
        }

        .toggle-news-btn:hover {
            background: linear-gradient(135deg, #343a40, #23272b);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 58, 64, 0.3);
        }
    </style>


    <div class="news-section">
        <h3 class="news-header">📰 Новости Института</h3>

        <div class="news-grid" id="news-list">
            @foreach($news as $index => $item)
                <div class="news-card {{ $index >= 4 ? 'd-none' : '' }}" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="news-card-container">
                        {{-- Image Section --}}
                        <div class="news-image-container">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     class="news-image"
                                     alt="{{ $item->title }}"
                                     loading="lazy">
                            @else
                                <div class="news-image-placeholder">
                                    📰
                                </div>
                            @endif
                        </div>

                        {{-- Content Section --}}
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
                </div>
            @endforeach
        </div>

        {{-- Controls --}}
        <div class="news-controls">
            <a href="{{ route('news.allnews') }}" class="toggle-news-btn">📋 Все новости</a>

        </div>
    </div>
</div>

{{-- Enhanced Script --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('toggle-news-btn');
            const newsCards = document.querySelectorAll('.news-card');

            let expanded = false;

            // Initialize visible cards with staggered animation
            newsCards.forEach((card, index) => {
                if (index < 4) {
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });

            toggleBtn.addEventListener('click', () => {
                expanded = !expanded;

                if (expanded) {
                    // Show hidden cards with staggered animation
                    let hiddenCards = [];
                    newsCards.forEach((card, index) => {
                        if (index >= 4) {
                            hiddenCards.push(card);
                        }
                    });

                    hiddenCards.forEach((card, index) => {
                        card.classList.remove('d-none');
                        setTimeout(() => {
                            card.classList.add('fade-in');
                        }, index * 100);
                    });

                    toggleBtn.innerHTML = '📤 Свернуть';
                } else {
                    // Hide cards with fade out
                    newsCards.forEach((card, index) => {
                        if (index >= 4) {
                            card.classList.remove('fade-in');
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            setTimeout(() => {
                                card.classList.add('d-none');
                            }, 300);
                        }
                    });

                    toggleBtn.innerHTML = '📋 Все новости';

                    // Smooth scroll to news section
                    document.getElementById('news-section').scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });

            // Handle image loading
            const images = document.querySelectorAll('.news-image');
            images.forEach(img => {
                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });

                img.addEventListener('error', function() {
                    this.parentElement.innerHTML = '<div class="news-image-placeholder">📰</div>';
                });
            });
        });
    </script>
@endpush
