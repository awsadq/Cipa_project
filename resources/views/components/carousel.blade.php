<style>
    :root {
        --white: #ffffff;
        --light-gray: #f8fafc;
        --gray: #64748b;
        --dark-gray: #334155;
        --shadow: rgba(0, 0, 0, 0.1);
        --shadow-dark: rgba(0, 0, 0, 0.15);

        /* Corporate Rainbow Palette */
        --corp-red: #e53e3e;
        --corp-orange: #ff8c00;
        --corp-yellow: #ffd700;
        --corp-green: #38a169;
        --corp-teal: #319795;
        --corp-blue: #3182ce;
        --corp-indigo: #5a67d8;
        --corp-purple: #805ad5;
    }


    /* Main Carousel Container - Full Width Corporate */
    #mainCarousel {
        width: 100vw;
        margin: 0;
        border-radius: 0;
        overflow: hidden;
        box-shadow: 0 4px 20px var(--shadow-dark);
        position: relative;
        background: var(--white);
        margin-top: -30px;
        min-height: 400px !important;
        height: auto !important;

    }

    /* Carousel Inner */
    .carousel-inner {
        border-radius: 0;
        overflow: hidden;
        position: relative;
        min-height: 400px !important;
        height: 100% !important;
    }

    /* Carousel Item Styling */
    .carousel-item {
        position: relative;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        min-height: 400px !important;
        height: 100% !important;

    }

    .carousel-item.active {
        transform: scale(1);
    }

    /* Corporate Rainbow Gradients - Clean and Professional */
    .carousel-item:nth-child(1) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-red) 0%, #dc2626 100%) !important;
    }

    .carousel-item:nth-child(2) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-orange) 0%, #ea580c 100%) !important;
    }

    .carousel-item:nth-child(3) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-yellow) 0%, #d97706 100%) !important;
    }

    .carousel-item:nth-child(4) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-green) 0%, #059669 100%) !important;
    }

    .carousel-item:nth-child(5) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-teal) 0%, #0891b2 100%) !important;
    }

    .carousel-item:nth-child(6) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-blue) 0%, #1d4ed8 100%) !important;
    }

    .carousel-item:nth-child(7) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-indigo) 0%, #4338ca 100%) !important;
    }

    .carousel-item:nth-child(8) .bg-corporate {
        background: linear-gradient(135deg, var(--corp-purple) 0%, #7c3aed 100%) !important;
    }

    /* Corporate Base Styling */
    .carousel-item .bg-corporate {
        position: relative;
        height: 600px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 60px !important;
        overflow: hidden;
    }

    /* Subtle Corporate Pattern Overlay */
    .carousel-item .bg-corporate::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            repeating-linear-gradient(
                45deg,
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.03) 2px,
                rgba(255, 255, 255, 0.03) 4px
            );
        z-index: 1;
    }

    /* Clean geometric accent */
    .carousel-item .bg-corporate::after {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        transform: rotate(45deg);
        z-index: 1;
    }

    /* Corporate Link Styling */
    .carousel-item a {
        color: var(--white) !important;
        text-decoration: none !important;
        font-size: 1.875rem !important;
        font-weight: 600;
        letter-spacing: -0.025em;
        position: relative;
        z-index: 2;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 24px 40px;
        border-radius: 8px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: block;
        text-align: center;
        line-height: 1.5;
        max-width: 800px;
        word-wrap: break-word;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }

    .carousel-item a:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .carousel-item a:focus {
        outline: 2px solid rgba(255, 255, 255, 0.8);
        outline-offset: 2px;
    }

    /* Corporate Navigation Controls */
    .carousel-control-prev,
    .carousel-control-next {
        width: 56px;
        height: 56px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.95);
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        opacity: 0.9;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .carousel-control-prev {
        left: 20px;
    }

    .carousel-control-next {
        right: 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
        transform: translateY(-50%) scale(1.05);
        background: var(--white);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .carousel-control-prev:focus,
    .carousel-control-next:focus {
        opacity: 1;
        outline: 2px solid var(--corp-blue);
        outline-offset: 2px;
    }

    /* Corporate Control Icons */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
        background-size: 20px 20px;
        filter: none;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23334155'%3e%3cpath fill-rule='evenodd' d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23334155'%3e%3cpath fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    /* Corporate Carousel Indicators */
    .carousel-indicators {
        bottom: 20px;
        margin-bottom: 0;
    }

    .carousel-indicators [data-bs-target] {
        width: 8px;
        height: 8px;
        border-radius: 4px;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        opacity: 0.6;
        transition: all 0.3s ease;
        margin: 0 4px;
    }

    .carousel-indicators .active {
        background-color: var(--white);
        opacity: 1;
        width: 24px;
    }

    /* Corporate Animation */
    .carousel-item {
        animation: fadeInSlide 0.6s ease-out;
    }

    @keyframes fadeInSlide {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Corporate Responsive Design */
    @media (max-width: 1200px) {
        .carousel-item a {
            font-size: 1.75rem !important;
            padding: 20px 35px;
            max-width: 700px;
        }

        .carousel-item .bg-corporate {
            padding: 70px 50px !important;
            min-height: 450px;
        }
    }

    @media (max-width: 992px) {
        .carousel-item a {
            font-size: 1.625rem !important;
            padding: 18px 30px;
            max-width: 600px;
        }

        .carousel-item .bg-corporate {
            padding: 60px 40px !important;
            min-height: 400px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 48px;
            height: 48px;
        }

        .carousel-control-prev {
            left: 15px;
        }

        .carousel-control-next {
            right: 15px;
        }
    }

    @media (max-width: 768px) {
        .carousel-item a {
            font-size: 1.5rem !important;
            padding: 16px 25px;
            max-width: 500px;
        }

        .carousel-item .bg-corporate {
            padding: 50px 30px !important;
            min-height: 300px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 44px;
            height: 44px;
        }

        .carousel-control-prev {
            left: 12px;
        }

        .carousel-control-next {
            right: 12px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 18px;
            height: 18px;
            background-size: 18px 18px;
        }
    }

    @media (max-width: 576px) {
        .carousel-item a {
            font-size: 1.25rem !important;
            padding: 14px 20px;
            line-height: 1.4;
            max-width: 400px;
        }

        .carousel-item .bg-corporate {
            padding: 40px 20px !important;
            min-height: 240px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
        }

        .carousel-control-prev {
            left: 10px;
        }

        .carousel-control-next {
            right: 10px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 16px;
            height: 16px;
            background-size: 16px 16px;
        }
    }

    /* Loading State */
    @keyframes shimmer {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    .carousel-loading {
        animation: shimmer 1.5s infinite;
    }

    /* Accessibility improvements */
    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    /* Focus management */
    .carousel:focus-within .carousel-control-prev,
    .carousel:focus-within .carousel-control-next {
        opacity: 1;
    }

    /* Print optimization */
    @media print {
        #mainCarousel {
            box-shadow: none;
            border: 1px solid var(--dark-gray);
        }

        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }

        .carousel-item .bg-corporate {
            background: var(--light-gray) !important;
            color: var(--dark-gray) !important;
        }

        .carousel-item a {
            color: var(--dark-gray) !important;
            border: 1px solid var(--gray);
        }
    }

    /* Enhanced corporate styling for larger screens */
    @media (min-width: 1400px) {
        .carousel-item a {
            font-size: 2rem !important;
            padding: 28px 50px;
            max-width: 900px;
        }

        .carousel-item .bg-corporate {
            min-height: 450px;
            padding: 90px 80px !important;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 64px;
            height: 64px;
        }

        .carousel-control-prev {
            left: 30px;
        }

        .carousel-control-next {
            right: 30px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 24px;
            height: 24px;
            background-size: 24px 24px;
        }

        .bg-corporate {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
            padding: 60px 20px;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .greeting-text h2.text-gradient {
            background: linear-gradient(90deg, #ffffff, #dbeafe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .greeting-text p {
            color: #f3f4f6;
            font-size: 1.25rem;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }

    }
</style>

</head>
<body>


@php
    use App\Models\News;
    $latestNews = News::latest()->first();

    $slides = [
        ['Как стать членом ПАО ИПБАК?', '#'],
        ['Двухуровневая программа CIPA', '#'],
        ['Трехуровневая программа CPA Eurasia', '#'],
        ['Профессиональная квалификация аудитора', '#'],
        ['Бухгалтер Банковского Учета 1 и 2', '#'],
        ['Расписание курсов и семинаров', '#'],
    ];

    if ($latestNews) {
        $slides[] = [$latestNews->title, route('news.show', $latestNews)];
    }
@endphp

<div class="carousel-wrapper">
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">

            {{-- Первый слайд с приветствием + ссылкой --}}
            <div class="carousel-item active">
                <div class="bg-corporate text-white text-center p-5">
                    <div class="greeting-text mb-4">
                        <h2 class="fw-bold display-6 text-gradient">Добро пожаловать в Учебный центр ИПБА КР!</h2>
                        <p class="lead mt-3 mb-0">
                            Мы предлагаем программы профессиональной подготовки, курсы повышения квалификации,<br>
                            семинары и тренинги по самым актуальным вопросам бухгалтерии, аудита и налогообложения.
                        </p>
                    </div>
                    <a href="{{ $slides[0][1] }}" class="text-white text-decoration-none d-block fs-4 mt-4">
                        {{ $slides[0][0] }}
                    </a>
                </div>
            </div>

            {{-- Остальные слайды --}}
            @foreach($slides as $index => $slide)
                @if ($index !== 0)
                    <div class="carousel-item">
                        <div class="bg-corporate text-white text-center p-5 fs-4">
                            <a href="{{ $slide[1] }}" class="text-white text-decoration-none d-block w-100">
                                {{ $slide[0] }}
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($slides as $index => $slide)
                <button type="button" data-bs-target="#mainCarousel"
                        data-bs-slide-to="{{ $index }}"
                        class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize carousel with custom options
        const carousel = new bootstrap.Carousel('#mainCarousel', {
            interval: 5000,
            ride: 'carousel',
            pause: 'hover',
            wrap: true,
            touch: true
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                carousel.prev();
            } else if (e.key === 'ArrowRight') {
                carousel.next();
            }
        });

        // Pause on focus for accessibility
        const carouselElement = document.getElementById('mainCarousel');
        carouselElement.addEventListener('focus', function() {
            carousel.pause();
        });

        carouselElement.addEventListener('blur', function() {
            carousel.cycle();
        });

        // Add touch/swipe support for mobile
        let startX = null;
        let currentX = null;

        carouselElement.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
        });

        carouselElement.addEventListener('touchmove', function(e) {
            if (!startX) return;
            currentX = e.touches[0].clientX;
        });

        carouselElement.addEventListener('touchend', function(e) {
            if (!startX || !currentX) return;

            const diffX = startX - currentX;
            const minSwipeDistance = 50;

            if (Math.abs(diffX) > minSwipeDistance) {
                if (diffX > 0) {
                    carousel.next();
                } else {
                    carousel.prev();
                }
            }

            startX = null;
            currentX = null;
        });

        // Preload images if any (for better performance)
        const carouselItems = document.querySelectorAll('.carousel-item');
        carouselItems.forEach(item => {
            const bgImage = getComputedStyle(item.querySelector('.bg-primary')).backgroundImage;
            if (bgImage && bgImage !== 'none') {
                const img = new Image();
                img.src = bgImage.slice(4, -1).replace(/"/g, "");
            }
        });

        // Add loading state
        carouselElement.classList.add('carousel-loading');
        setTimeout(() => {
            carouselElement.classList.remove('carousel-loading');
        }, 1000);
    });
</script>
