<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ИПБА КР</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>

        :root {
            --primary-blue: #1e40af;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-red: #dc2626;
            --dark-gray: #1f2937;
            --medium-gray: #6b7280;
            --light-gray: #f8fafc;
            --border-gray: #e5e7eb;
            --white: #ffffff;
            --text-muted: #9ca3af;
        }

        :root {
            --primary-blue: #1e3a8a;
            --light-blue: #3b82f6;
            --lighter-blue: #dbeafe;
            --white: #ffffff;
            --light-gray: #f8fafc;
            --gray: #64748b;
            --dark-gray: #334155;
            --red: #dc2626;
            --shadow: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #c5daf6, #f1f5f9); /* голубой → серый */
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            color: #1e293b; /* тёмно-серый для текста */
            line-height: 1.6;
        }

        .top-bar {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 100%);
            color: var(--white);
            font-size: 0.875rem;
            box-shadow: 0 2px 4px var(--shadow);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .top-bar a {
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 2px 6px;
            border-radius: 4px;
        }

        .top-bar a:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }

        .top-bar span {
            margin-right: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .top-bar .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: var(--white);
            font-weight: 500;
            padding: 6px 16px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .top-bar .btn-outline-light:hover {
            background-color: var(--white);
            color: var(--primary-blue);
            border-color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .top-bar .form-control {
            border: 2px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .top-bar .form-control:focus {
            border-color: var(--white);
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        .top-bar .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Main Navigation Styling */
        .navbar {
            background: var(--white);
            box-shadow: 0 4px 20px var(--shadow);
            border-bottom: 3px solid var(--light-blue);
            padding: 0;
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-blue) !important;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--light-blue) !important;
            transform: scale(1.05);
        }

        .navbar-nav {
            gap: 5px;
        }

        .nav-link {
            color: var(--dark-gray) !important;
            font-weight: 500;
            padding: 15px 20px !important;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 8px 8px 0 0;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
            background-color: var(--lighter-blue);
            transform: translateY(-2px);
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--light-blue), var(--primary-blue));
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::before {
            width: 80%;
        }

        /* Dropdown Styling */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 10px 0;
            margin-top: 0;
            background-color: var(--white);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(59, 130, 246, 0.1);
        }

        .dropdown-item {
            color: var(--dark-gray);
            padding: 12px 25px;
            font-weight: 400;
            transition: all 0.3s ease;
            position: relative;
            border-left: 3px solid transparent;
        }

        .dropdown-item:hover {
            background: linear-gradient(90deg, var(--lighter-blue), rgba(59, 130, 246, 0.05));
            color: var(--primary-blue);
            border-left-color: var(--light-blue);
            transform: translateX(5px);
        }

        .dropdown-item:active {
            background-color: var(--light-blue);
            color: var(--white);
        }

        /* Multi-level Dropdown */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            border-radius: 8px;
        }

        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
            animation: slideInRight 0.3s ease;
        }

        .dropdown-submenu > .dropdown-item::after {
            content: '\f054';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            float: right;
            margin-top: 2px;
            color: var(--gray);
            transition: all 0.3s ease;
        }

        .dropdown-submenu:hover > .dropdown-item::after {
            color: var(--primary-blue);
            transform: translateX(3px);
        }

        /* Animations */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .dropdown-menu {
            animation: fadeInUp 0.3s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Navbar Toggler */
        .navbar-toggler {
            border: 2px solid var(--light-blue);
            border-radius: 8px;
            padding: 8px 12px;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background-color: var(--lighter-blue);
            transform: scale(1.1);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%231e3a8a' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .top-bar {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .top-bar span {
                margin: 0 10px;
            }

            .navbar-collapse {
                background-color: var(--white);
                border-radius: 12px;
                margin-top: 10px;
                box-shadow: 0 8px 32px var(--shadow);
                padding: 20px;
            }

            .dropdown-submenu > .dropdown-menu {
                position: static;
                float: none;
                box-shadow: none;
                border-left: 3px solid var(--light-blue);
                margin-left: 20px;
                background-color: var(--light-gray);
            }
        }

        @media (max-width: 576px) {
            .top-bar {
                font-size: 0.75rem;
                padding: 15px 10px;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }

            .nav-link {
                padding: 12px 15px !important;
            }
        }

        /* Logo placeholder styling */
        .logo-placeholder {
            width: 30px;
            height: 30px;
            background: linear-gradient(45deg, var(--light-blue), var(--primary-blue));
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: bold;
            font-size: 0.875rem;
        }

        /* Enhanced interactivity */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu .dropdown-menu {
            display: none;
        }

        .dropdown-submenu:hover .dropdown-menu {
            display: block !important;
        }

        /* Focus states for accessibility */
        .nav-link:focus,
        .dropdown-item:focus {
            outline: 2px solid var(--light-blue);
            outline-offset: 2px;
        }

        /* Language selector styling */
        .top-bar .me-3 a {
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 6px;
        }

        /* Search input enhanced styling */
        .top-bar .form-control {
            min-width: 200px;
            border-radius: 25px;
            padding: 8px 16px;
        }

        /* Hover effects for better UX */
        .container {
            transition: all 0.3s ease;
        }

        /* Additional corporate styling */
        .navbar-nav .nav-link.active {
            color: var(--primary-blue) !important;
            background-color: var(--lighter-blue);
        }

        .navbar-nav .nav-link.active::before {
            width: 80%;
        }

        .goog-te-banner-frame.skiptranslate,
        .goog-te-gadget {
            display: inline-block !important;
        }
        body {
            top: 0px !important;
        }

        .footer-custom {
            background: linear-gradient(135deg, var(--dark-gray) 0%, #111827 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .footer-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg,
            var(--primary-blue) 0%,
            var(--secondary-blue) 25%,
            var(--accent-red) 50%,
            var(--secondary-blue) 75%,
            var(--primary-blue) 100%);
            animation: gradientShift 8s ease-in-out infinite;
        }

        @keyframes gradientShift {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .footer-custom::after {
            content: '';
            position: absolute;
            top: 0;
            right: -50px;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .footer-custom .container {
            position: relative;
            z-index: 2;
            padding-top: 60px;
            padding-bottom: 30px;
        }

        /* Footer Title Styling */
        .footer-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 28px;
            position: relative;
            letter-spacing: -0.02em;
            text-transform: uppercase;
            font-size: 16px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-red) 0%, var(--secondary-blue) 100%);
            border-radius: 2px;
            animation: titleUnderline 2s ease-in-out infinite alternate;
        }

        @keyframes titleUnderline {
            0% { width: 50px; }
            100% { width: 70px; }
        }

        /* Footer List Styling */
        .footer-list {
            margin: 0;
            padding: 0;
        }

        .footer-list li {
            color: #d1d5db;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
            font-size: 14px;
            line-height: 1.5;
        }

        .footer-list li:last-child {
            border-bottom: none;
        }

        .footer-list li:hover {
            color: var(--white);
            padding-left: 8px;
            border-left: 3px solid var(--secondary-blue);
        }

        .footer-list li i {
            color: var(--secondary-blue);
            margin-right: 12px;
            width: 16px;
            font-size: 14px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* Footer Links Styling */
        .footer-links {
            margin: 0;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }

        .footer-links li a {
            color: #d1d5db;
            text-decoration: none;
            padding: 8px 0;
            display: flex;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 6px;
            position: relative;
        }

        .footer-links li a::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--secondary-blue);
            transform: scaleY(0);
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .footer-links li a:hover {
            color: var(--white);
            padding-left: 12px;
            background: rgba(59, 130, 246, 0.1);
        }

        .footer-links li a:hover::before {
            transform: scaleY(1);
        }

        .footer-links li a i {
            color: var(--medium-gray);
            margin-right: 10px;
            transition: all 0.3s ease;
            width: 12px;
        }

        .footer-links li a:hover i {
            color: var(--secondary-blue);
            transform: translateX(4px);
        }

        /* Newsletter Section */
        .footer-custom p {
            color: #d1d5db;
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .footer-custom .input-group {
            margin-bottom: 24px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        .footer-custom .form-control {
            border: none;
            background: rgba(255, 255, 255, 0.95);
            color: var(--dark-gray);
            padding: 16px 20px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .footer-custom .form-control:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
            background: var(--white);
            transform: translateY(-2px);
        }

        .footer-custom .form-control::placeholder {
            color: var(--medium-gray);
            font-weight: 400;
        }

        .footer-custom .btn-danger {
            background: linear-gradient(135deg, var(--accent-red) 0%, #b91c1c 100%);
            border: none;
            padding: 16px 24px;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .footer-custom .btn-danger::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .footer-custom .btn-danger:hover {
            background: linear-gradient(135deg, #b91c1c 0%, var(--accent-red) 100%);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(220, 38, 38, 0.4);
        }

        .footer-custom .btn-danger:hover::before {
            left: 100%;
        }

        /* Social Icons */
        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #d1d5db;
            font-size: 18px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .social-icons a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--secondary-blue), var(--primary-blue));
            opacity: 0;
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .social-icons a:hover {
            transform: translateY(-6px) scale(1.1);
            color: var(--white);
            border-color: var(--secondary-blue);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.3);
        }

        .social-icons a:hover::before {
            opacity: 1;
        }

        .social-icons a i {
            position: relative;
            z-index: 2;
        }

        /* Facebook specific hover */
        .social-icons a:nth-child(1):hover {
            box-shadow: 0 12px 30px rgba(66, 103, 178, 0.4);
        }

        /* Instagram specific hover */
        .social-icons a:nth-child(2):hover {
            box-shadow: 0 12px 30px rgba(225, 48, 108, 0.4);
        }

        /* Telegram specific hover */
        .social-icons a:nth-child(3):hover {
            box-shadow: 0 12px 30px rgba(38, 166, 212, 0.4);
        }

        /* LinkedIn specific hover */
        .social-icons a:nth-child(4):hover {
            box-shadow: 0 12px 30px rgba(10, 102, 194, 0.4);
        }

        /* Footer Bottom Section */
        .footer-custom hr {
            border-color: rgba(255, 255, 255, 0.1) !important;
            margin: 40px 0 20px 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            border: none;
        }

        .footer-custom .text-center {
            padding: 20px 0 10px 0;
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .footer-custom .text-center a {
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .footer-custom .text-center a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--secondary-blue);
            transition: all 0.3s ease;
        }

        .footer-custom .text-center a:hover {
            color: var(--secondary-blue);
        }

        .footer-custom .text-center a:hover::after {
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .footer-custom .container {
                padding-top: 50px;
            }

            .footer-title {
                font-size: 18px;
                margin-bottom: 20px;
            }

            .social-icons {
                justify-content: center;
                margin-top: 30px;
            }

            .footer-custom .col-lg-4:last-child {
                text-align: center;
            }
        }

        @media (max-width: 767.98px) {
            .footer-custom .container {
                padding-top: 40px;
            }

            .social-icons a {
                width: 44px;
                height: 44px;
                font-size: 16px;
            }

            .footer-custom .input-group {
                flex-direction: column;
                border-radius: 8px;
            }

            .footer-custom .form-control {
                border-radius: 8px 8px 0 0;
                margin-bottom: 0;
            }

            .footer-custom .btn-danger {
                border-radius: 0 0 8px 8px;
                padding: 14px 20px;
            }
        }

        /* Animation for entire footer on scroll */
        .footer-custom {
            animation: fadeInUp 1s ease-out;
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

        /* Hover effect for entire footer sections */
        .footer-custom .col-lg-4,
        .footer-custom .col-md-6 {
            transition: all 0.3s ease;
            padding: 20px;
            border-radius: 12px;
        }

        .footer-custom .col-lg-4:hover,
        .footer-custom .col-md-6:hover {
            background: rgba(255, 255, 255, 0.02);
            transform: translateY(-5px);
        }

        /* Accessibility improvements */
        .footer-custom a:focus,
        .footer-custom button:focus,
        .footer-custom input:focus {
            outline: 2px solid var(--secondary-blue);
            outline-offset: 2px;
        }

        /* Loading animation for social icons */
        .social-icons a {
            animation: socialIconsLoad 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .social-icons a:nth-child(1) { animation-delay: 0.1s; }
        .social-icons a:nth-child(2) { animation-delay: 0.2s; }
        .social-icons a:nth-child(3) { animation-delay: 0.3s; }
        .social-icons a:nth-child(4) { animation-delay: 0.4s; }

        @keyframes socialIconsLoad {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background-color: #25D366;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .whatsapp-float img {
            width: 32px;
            height: 32px;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        @keyframes borderGlow {
            0% {
                box-shadow: 0 0 0px rgba(59, 130, 246, 0.0),
                0 0 5px rgba(59, 130, 246, 0.5),
                0 0 10px rgba(59, 130, 246, 0.4);
            }
            50% {
                box-shadow: 0 0 5px rgba(59, 130, 246, 0.7),
                0 0 10px rgba(59, 130, 246, 0.8),
                0 0 15px rgba(59, 130, 246, 0.9);
            }
            100% {
                box-shadow: 0 0 0px rgba(59, 130, 246, 0.0),
                0 0 5px rgba(59, 130, 246, 0.5),
                0 0 10px rgba(59, 130, 246, 0.4);
            }
        }

        .animate-border-logo {
            display: inline-block;
            border-radius: 12px;
            animation: borderGlow 2s infinite ease-in-out;
        }


    </style>
</head>
<body>

<div class="top-bar py-2 px-3 d-flex justify-content-between align-items-center">
    <div class="ms-4 animate-border-logo p-1 rounded">
        <img src="{{ asset('images/home_logo.png') }}" alt="Логотип" height="30">
    </div>
    <div class="d-flex align-items-center">
        <a href="#" class="btn btn-sm btn-outline-light">Личный кабинет</a>
        <form class="d-inline ms-3" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" class="form-control form-control-sm d-inline w-auto" placeholder="Поиск..." required>
        </form>
    </div>
</div>



<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">ИПБА КР</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- О НАС -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">О нас</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Об институте</a></li>
                        <li><a class="dropdown-item" href="#">Новости</a></li>
                        <li><a class="dropdown-item" href="#">Общее собрание членов</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Органы управления</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Совет аудиторов</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Комитеты</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Комитет по администрированию</a></li>
                                        <li><a class="dropdown-item" href="#">Комитет по обучению</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Международная деятельность</a></li>
                        <li><a class="dropdown-item" href="#">Документы</a></li>
                        <li><a class="dropdown-item" href="#">Партнеры</a></li>
                        <li><a class="dropdown-item" href="#">Отчетность</a></li>
                        <li><a class="dropdown-item" href="#">Контакты</a></li>
                    </ul>
                </li>

                <!-- Реестры -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Реестры</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Аудиторские организации</a></li>
                        <li><a class="dropdown-item" href="#">Аудиторы</a></li>
                        <li><a class="dropdown-item" href="#">Сведения о повышении квалификации аудиторами</a></li>
                        <li><a class="dropdown-item" href="#">Аудиторы, прекратившие членство</a></li>
                        <li><a class="dropdown-item" href="#">Аудиторские организации, прекратившие членство</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Реестр дисциплинарных мер</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">К аудиторам</a></li>
                                <li><a class="dropdown-item" href="#">К аудиторам и организациям</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Сертифицированные бухгалтера практики (CIPA)</a></li>
                        <li><a class="dropdown-item" href="#">Сертифицированные международные проф. бухгалтера (CIPA)</a></li>
                        <li><a class="dropdown-item" href="#">CPA Eurasia</a></li>
                        <li><a class="dropdown-item" href="#">Профессиональная квалификация аудиторов</a></li>
                        <li><a class="dropdown-item" href="#">Бухгалтер банковского учёта — Уровень 1</a></li>
                        <li><a class="dropdown-item" href="#">Бухгалтер банковского учёта — Уровень 2</a></li>
                        <li><a class="dropdown-item" href="#">Поиск членов</a></li>
                    </ul>
                </li>

                <!-- Членство -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Членство</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Вступить</a></li>
                        <li><a class="dropdown-item" href="#">Свидетельство</a></li>
                        <li><a class="dropdown-item" href="#">Взносы</a></li>
                        <li><a class="dropdown-item" href="#">Отчетность членов</a></li>
                        <li><a class="dropdown-item" href="#">Изменения в реестр</a></li>
                        <li><a class="dropdown-item" href="#">Прекращение членства</a></li>
                    </ul>
                </li>

                <!-- Сертификации -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Сертификации</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Профессиональная квалификация аудитора</a></li>
                        <li><a class="dropdown-item" href="#">Двухуровневая программа CIPA</a></li>
                        <li><a class="dropdown-item" href="#">Трехуровневая программа CPA Eurasia</a></li>
                        <li><a class="dropdown-item" href="#">Бухгалтер банковского учёта 1 и 2</a></li>
                        <li><a class="dropdown-item" href="#">Конвертация сертификатов</a></li>
                        <li><a class="dropdown-item" href="#">Поиск сертификата</a></li>
                    </ul>
                </li>

                <!-- Учебный центр -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Учебный центр</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Главная страница учебного центра</a></li>
                        <li><a class="dropdown-item" href="#">Курсы для начинающих</a></li>
                        <li><a class="dropdown-item" href="#">Курсы по программе CIPA (1 и 2 уровень)</a></li>
                        <li><a class="dropdown-item" href="#">Курсы по программе Профессиональной квалификации аудиторов</a></li>
                        <li><a class="dropdown-item" href="#">Курсы ББУ 1 и 2</a></li>
                        <li><a class="dropdown-item" href="#">Курсы MS EXCEL</a></li>
                        <li><a class="dropdown-item" href="#">Курсы для руководителей</a></li>
                        <li><a class="dropdown-item" href="#">Курсы для кадровиков</a></li>
                        <li><a class="dropdown-item" href="#">Семинары / тренинги</a></li>
                        <li><a class="dropdown-item" href="#">Онлайн обучение</a></li>
                        <li><a class="dropdown-item" href="#">Записи курсов и семинаров</a></li>
                        <li><a class="dropdown-item" href="#">Тренеры и эксперты</a></li>
                        <li><a class="dropdown-item" href="#">Консультации</a></li>
                        <li><a class="dropdown-item" href="#">Способы оплаты</a></li>
                        <li><a class="dropdown-item" href="#">Скачать договор</a></li>
                    </ul>
                </li>

                <!-- Ресурсы -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Ресурсы</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Актуальное</a></li>
                        <li><a class="dropdown-item" href="#">Полезные ссылки</a></li>
                        <li><a class="dropdown-item" href="#">Нормативные документы</a></li>
                        <li><a class="dropdown-item" href="#">МСА / МСФО</a></li>
                        <li><a class="dropdown-item" href="#">Методические материалы</a></li>
                        <li><a class="dropdown-item" href="#">Шаблоны и формы</a></li>
                    </ul>
                </li>

                <!-- Работодателям -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Работодателям</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Разместить вакансию</a></li>
                        <li><a class="dropdown-item" href="#">Найти специалиста</a></li>
                        <li><a class="dropdown-item" href="#">Условия размещения</a></li>
                        <li><a class="dropdown-item" href="#">Аттестация сотрудников</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

{{-- 🔹 Плавающая кнопка WhatsApp --}}
<a href="https://wa.me/996555500182" class="whatsapp-float" target="_blank" title="Связаться по WhatsApp">
    <img src="{{ asset('images/whatsapp-icon.png') }}" alt="WhatsApp" />
</a>


{{-- 🔹 Футер --}}
<footer class="footer-custom mt-5 pt-5">
    <div class="container">
        <div class="row">
            {{-- Контакты --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-title">Контакты</h5>
                <ul class="list-unstyled footer-list">
                    <li><i class="fas fa-building me-2"></i>ПАО Институт профессиональных бухгалтеров и аудиторов Кыргызстана</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i>г. Бишкек, ул. Главная 12</li>
                    <li><i class="fas fa-phone me-2"></i>+996 555 123 456</li>
                    <li><i class="fas fa-envelope me-2"></i>info@ipba.kg</li>
                    <li><i class="fas fa-clock me-2"></i>Часы работы: Пн–Пт 09:00–18:00</li>
                </ul>
            </div>

            {{-- Разделы --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-title">Разделы</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>О нас</a></li>
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>Реестры</a></li>
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>Сертификации</a></li>
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>Учебный центр</a></li>
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>Ресурсы</a></li>
                    <li><a href="#"><i class="fas fa-angle-right me-2"></i>Работодателям</a></li>
                </ul>
            </div>

            {{-- Подписка --}}
            <div class="col-lg-4 mb-4">
                <h5 class="footer-title">Подписка на новости</h5>
                <p>Получайте актуальную информацию о событиях и новостях института</p>
                <form class="input-group mb-3" method="POST" action="#">
                    <input type="email" class="form-control form-control-lg" placeholder="Введите ваш Email" required>
                    <button class="btn btn-danger px-4" type="submit">
                        <i class="fas fa-paper-plane me-2"></i>Подписаться
                    </button>
                </form>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram-plane"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <hr class="border-secondary-subtle">
        <div class="text-center text-light small pt-2 pb-1">
            © {{ date('Y') }} ИПБА КР. Все права защищены.
            <a href="#" class="text-decoration-underline text-light ms-2">Политика конфиденциальности</a> |
            <a href="#" class="text-decoration-underline text-light ms-2">Пользовательское соглашение</a>
        </div>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
    // Enhanced dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Handle multi-level dropdowns on mobile
        const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

        dropdownSubmenus.forEach(function(submenu) {
            submenu.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    const dropdownMenu = this.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                    }
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            if (anchor.getAttribute('href') !== '#') {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    });
</script>



</body>
</html>
