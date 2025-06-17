@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Success message --}}
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Редактировать курс</h2>
                <p class="form-subtitle">Отредактируйте необходимые поля</p>
            </div>

            <div class="form-body">
                <form method="POST" action="{{ route('admin.courses.update', $course) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.courses.form', ['course' => $course])
                    <button type="submit" class="btn btn-primary w-100 mt-4">💾 Обновить</button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('styles')
    <style>
        /*
           The CSS provided in the second code block should be placed here.
           For brevity, I'm omitting the full CSS here, but you should copy
           all the CSS rules from the second code block's <style> tag
           and paste them here.
        */
        .form-container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #3b82f6 0%, #1e40af 50%, #dc2626 100%);
        }

        /* Header Section */
        .form-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            padding: 50px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .form-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0 0 15px 0;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        /* Form Body */
        .form-body {
            padding: 60px 50px;
        }

        /* Form Groups */
        .mb-3 {
            margin-bottom: 35px;
            position: relative;
        }

        /* Labels */
        label {
            display: block;
            font-weight: 600;
            font-size: 0.95rem;
            color: #374151;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
            position: relative;
        }

        label::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            transition: width 0.3s ease;
        }

        .mb-3:focus-within label::after {
            width: 30px;
        }

        /* Form Controls */
        .form-control {
            width: 100%;
            padding: 18px 24px;
            font-size: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            background: #fafbfc;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            font-family: inherit;
            position: relative;
        }

        .form-control:hover {
            border-color: #cbd5e1;
            background: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .form-control:focus {
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1), 0 8px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        /* Textarea Specific */
        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        /* Select Specific */
        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 20px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 60px;
            appearance: none;
        }

        /* File Input */
        input[type="file"].form-control {
            padding: 16px 20px;
            border: 2px dashed #cbd5e1;
            background: #f8fafc;
            cursor: pointer;
            position: relative;
        }

        input[type="file"].form-control:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
        }

        input[type="file"].form-control:focus {
            border-color: #3b82f6;
            background: #f0f9ff;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        /* File Link Styling */
        .mb-3 small {
            display: inline-block;
            margin-top: 12px;
            padding: 10px 16px;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            border: 1px solid #bae6fd;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #0369a1;
        }

        .mb-3 small a {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: color 0.2s ease;
        }

        .mb-3 small a:hover {
            color: #1e40af;
        }

        .mb-3 small a::before {
            content: '📄';
            margin-right: 6px;
        }

        /* Trainer Info Section */
        #trainerInfo {
            margin-top: 25px;
            padding: 30px;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            animation: slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #trainerInfo::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-15px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        /* Trainer Photo */
        #trainerPhoto {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }

        #trainerPhoto:hover {
            transform: scale(1.05);
        }

        .me-3 {
            margin-right: 24px;
        }

        /* Trainer Details */
        #trainerPosition {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
            display: block;
        }

        #trainerBio {
            font-size: 1rem;
            color: #64748b;
            line-height: 1.6;
            margin: 0;
        }

        /* Error Messages */
        .text-danger {
            color: #dc2626 !important;
            font-size: 0.875rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .text-danger::before {
            content: '⚠️';
            margin-right: 6px;
            font-size: 0.8rem;
        }

        /* Date Inputs Grid */
        .date-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        /* Section Dividers */
        .mb-3:nth-child(3)::after,
        .mb-3:nth-child(5)::after,
        .mb-3:nth-child(7)::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        }

        /* Form Sections */
        .form-section {
            position: relative;
            padding: 35px 0;
        }

        .form-section:not(:last-child)::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        }

        .btn-primary { /* Changed from btn-success for update button */
            background: linear-gradient(to right, #1e3a8a, #3b82f6);
            border: none;
            font-weight: 600;
            border-radius: 12px;
            padding: 0.75rem 2rem;
        }

        .btn-primary:hover { /* Changed from btn-success for update button */
            background: linear-gradient(to right, #3b82f6, #1e3a8a);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                margin: 20px auto;
                border-radius: 20px;
            }

            .form-header {
                padding: 40px 30px;
            }

            .form-title {
                font-size: 2rem;
            }

            .form-body {
                padding: 40px 30px;
            }

            .date-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            #trainerInfo {
                padding: 25px 20px;
            }

            .d-flex {
                flex-direction: column;
                text-align: center;
            }

            .me-3 {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .form-container {
                margin: 10px auto;
            }

            .form-header {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 1.75rem;
            }

            .form-body {
                padding: 30px 20px;
            }

            .form-control {
                padding: 16px 20px;
            }
        }

        /* Enhanced Visual Effects */
        .form-control:focus {
            animation: focusGlow 0.5s ease-out;
        }

        @keyframes focusGlow {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4);
            }
            70% {
                box-shadow: 0 0 0 8px rgba(59, 130, 246, 0);
            }
            100% {
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1), 0 8px 30px rgba(0, 0, 0, 0.1);
            }
        }

        /* Loading State for Dynamic Content */
        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid #e5e7eb;
            border-top: 2px solid #3b82f6;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
        @media (max-width: 991px) {
            .form-header {
                padding: 30px 20px;
            }

            .form-body {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 1.8rem;
            }

            .form-subtitle {
                font-size: 1rem;
            }

            .form-control {
                padding: 16px 18px;
            }

            #trainerInfo {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .form-container {
                margin: 5px;
                border-radius: 16px;
                box-shadow: none;
            }

            .form-title {
                font-size: 1.5rem;
            }

            .form-subtitle {
                font-size: 0.95rem;
            }

            .form-control {
                padding: 14px 16px;
                font-size: 0.95rem;
            }

            label {
                font-size: 0.9rem;
            }

            #trainerInfo {
                padding: 16px;
                font-size: 0.9rem;
            }

            #trainerPhoto {
                width: 70px;
                height: 70px;
            }

            .btn-primary { /* Changed from btn-success for update button */
                background: linear-gradient(to right, #1e3a8a, #3b82f6);
                border: none;
                font-weight: 600;
                border-radius: 12px;
                padding: 0.75rem 2rem;
            }
        }
    </style>
@endsection
