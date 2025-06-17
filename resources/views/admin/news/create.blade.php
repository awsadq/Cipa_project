@extends('layouts.app')

@section('content')

    <style>
        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --extra-light-blue: #eff6ff;
            --accent-red: #dc2626;
            --light-red: #fecaca;
            --success-green: #059669;
            --light-green: #d1fae5;
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
            --shadow-inner: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            --gradient-primary: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            --gradient-success: linear-gradient(135deg, var(--success-green) 0%, #047857 100%);
            --gradient-bg: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 40%, #f1f5f9 100%);
        }

        .news-create-wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 3rem 1rem;
            position: relative;
            z-index: 1;
        }

        .news-alert-success {
            background: var(--gradient-success) !important;
            border: none !important;
            border-radius: 16px !important;
            color: white !important;
            box-shadow: var(--shadow-lg) !important;
            padding: 1.5rem 2rem !important;
            margin-bottom: 3rem !important;
            position: relative;
            overflow: hidden;
            animation: slideInDown 0.5s ease-out;
        }

        .news-alert-success::before {
            content: '✓';
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            font-weight: bold;
            opacity: 0.8;
        }

        .news-alert-success::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
        }

        .news-btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .news-btn-close:hover {
            opacity: 1;
            transform: scale(1.1);
        }

        .news-heading {
            color: var(--gray-900) !important;
            font-size: 2.75rem !important;
            font-weight: 700 !important;
            margin-bottom: 3rem !important;
            letter-spacing: -0.025em;
            text-align: center;
            position: relative;
            animation: fadeInUp 0.6s ease-out;
        }

        .news-heading::before,
        .news-heading::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .news-heading::before {
            top: -1rem;
            width: 60px;
            height: 4px;
        }

        .news-heading::after {
            bottom: -1rem;
            width: 100px;
            height: 2px;
            opacity: 0.6;
        }

        .news-form {
            background: var(--white);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.7s ease-out 0.2s both;
        }

        .news-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--gradient-primary);
        }

        .news-form::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(59, 130, 246, 0.02) 100%);
            pointer-events: none;
        }

        .news-form-group {
            margin-bottom: 2rem !important;
            position: relative;
        }

        .news-form-group::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background: var(--gradient-primary);
            transition: width 0.3s ease;
        }

        .news-form-group:focus-within::after {
            width: 100%;
        }

        .news-label {
            display: block;
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--gray-700);
            margin-bottom: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            position: relative;
        }

        .news-label::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--gradient-primary);
            opacity: 0.7;
        }

        .news-input {
            width: 100%;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--gray-700);
            background: var(--white);
            border: 2px solid var(--gray-300);
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
        }

        .news-input:focus {
            border-color: var(--secondary-blue);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: var(--extra-light-blue);
            transform: translateY(-1px);
        }

        .news-input:hover {
            border-color: var(--light-blue);
            box-shadow: var(--shadow-md);
        }

        textarea.news-input {
            resize: vertical;
            min-height: 150px;
        }

        textarea.news-input:focus {
            min-height: 180px;
        }

        input[type="file"].news-input {
            padding: 1.25rem;
            background: var(--gray-50);
            border: 2px dashed var(--gray-300);
            cursor: pointer;
        }

        input[type="file"].news-input:hover {
            background: var(--light-blue);
            border-color: var(--secondary-blue);
        }

        .news-submit-btn {
            background: linear-gradient(to right, #1e3a8a, #3b82f6);
            border: none;
            color: white;
            font-weight: 600;
            font-size: 1.125rem;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            display: block;
            margin: 2rem auto 0;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            min-width: 200px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .news-submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        .news-submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .news-submit-btn:hover::before {
            left: 100%;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-100%); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="news-create-wrapper">
        @if(session('message'))
            <div class="news-alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="news-btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2 class="news-heading">Добавить новость</h2>

        <form class="news-form" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="news-form-group">
                <label class="news-label">Заголовок</label>
                <input type="text" name="title" class="news-input" required>
            </div>

            <div class="news-form-group">
                <label class="news-label">Контент</label>
                <textarea name="content" class="news-input" rows="5" required></textarea>
            </div>

            <div class="news-form-group">
                <label class="news-label">Изображение</label>
                <input type="file" name="image" class="news-input">
            </div>

            <button type="submit" class="news-submit-btn">💾 Сохранить</button>
        </form>
    </div>

@endsection
