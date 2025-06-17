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

        /* Beautiful Corporate Header Design */
        .top-bar {
            background: linear-gradient(135deg, #1e293b 0%, #1e40af 35%, #3b82f6 65%, #1e293b 100%);

            box-shadow: 0 8px 32px rgba(30, 64, 175, 0.12);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .top-bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 4s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Animated Logo Border */
        .animate-border-logo {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-border-logo::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 2px;
            background: linear-gradient(45deg, #ffffff, #60a5fa, #ef4444, #ffffff);
            border-radius: inherit;
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            -webkit-mask-composite: xor;
            animation: rotate-border 3s linear infinite;
        }

        @keyframes rotate-border {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .animate-border-logo:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 40px rgba(30, 64, 175, 0.25);
            background: rgba(255, 255, 255, 0.15);
        }

        .animate-border-logo img {
            position: relative;
            z-index: 2;
            filter: brightness(1.1) contrast(1.05);
            transition: all 0.3s ease;
        }

        /* Language Switcher */
        .top-bar a[href*="lang"] {
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 4px 8px;
            border-radius: 6px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            letter-spacing: 0.5px;
        }

        .top-bar a[href*="lang"]:hover {
            color: #dbeafe !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .top-bar a[href*="lang"]:active {
            transform: translateY(0);
        }

        /* Personal Account Button */
        .btn-outline-light {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: #ffffff;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.875rem;
            letter-spacing: 0.3px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .btn-outline-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-light:hover::before {
            left: 100%;
        }

        .btn-outline-light:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.6);
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
        }

        .btn-outline-light:active {
            transform: translateY(-1px);
        }

        /* Search Form */
        .top-bar form.d-flex {
            position: relative;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 2px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .top-bar form.d-flex:focus-within {
            background: #ffffff;
            box-shadow: 0 8px 30px rgba(30, 64, 175, 0.2);
            transform: scale(1.02);
        }

        .form-control-sm {
            background: transparent;
            border: none;
            padding: 10px 16px;
            font-size: 0.875rem;
            color: #374151;
            border-radius: 25px;
            width: 200px;
            transition: all 0.3s ease;
            outline: none;
            box-shadow: none;
        }

        .form-control-sm::placeholder {
            color: #9ca3af;
            font-weight: 400;
            opacity: 0.8;
        }

        .form-control-sm:focus {
            background: transparent;
            border: none;
            box-shadow: none;
            width: 220px;
            color: #1f2937;
        }

        .form-control-sm:focus::placeholder {
            opacity: 0.6;
        }

        /* Search Submit Button (Hidden but functional) */
        .top-bar form.d-flex::after {
            content: '🔍';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 0.875rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .top-bar form.d-flex:focus-within::after {
            color: #1e40af;
            transform: translateY(-50%) scale(1.1);
        }

        /* Mobile Responsive Design */
        @media (max-width: 768px) {
            .top-bar .d-flex.justify-content-between {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .top-bar .ms-4 {
                margin-left: 0 !important;
                align-self: flex-start;
            }

            .top-bar .d-flex.align-items-center.gap-3 {
                gap: 0.75rem !important;
                justify-content: center;
            }

            .form-control-sm {
                width: 160px;
            }

            .form-control-sm:focus {
                width: 180px;
            }
        }

        @media (max-width: 576px) {
            .top-bar .d-flex.align-items-center.gap-3 {
                flex-direction: column;
                gap: 0.5rem !important;
                width: 100%;
            }

            .btn-outline-light {
                width: 100%;
                max-width: 200px;
                text-align: center;
            }

            .top-bar form.d-flex {
                width: 100%;
                max-width: 250px;
            }

            .form-control-sm {
                width: 100%;
            }

            .form-control-sm:focus {
                width: 100%;
            }

            .top-bar {
                padding: 1rem 0.75rem;
            }
        }

        /* Enhanced Hover Effects */
        .top-bar .d-flex.align-items-center > div:first-child {
            background: rgba(255, 255, 255, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .top-bar .d-flex.align-items-center > div:first-child:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Accessibility Improvements */
        .top-bar a:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        .btn-outline-light:focus {
            outline: none;
        }

        /* Performance Optimizations */
        .top-bar * {
            will-change: transform;
        }

        .animate-border-logo::before {
            will-change: transform;
        }

        /* Additional Corporate Styling */
        .top-bar {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            letter-spacing: -0.01em;
        }

        /* Subtle Gradient Text Effect */
        .top-bar a[href*="lang"] {
            background: linear-gradient(135deg, #ffffff, #dbeafe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .top-bar a[href*="lang"]:hover {
            background: linear-gradient(135deg, #ffffff, #93c5fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

    @stack('styles')
</head>
<body>


<div class="top-bar py-2 px-3 d-flex justify-content-between align-items-center">
    <!-- Логотип -->
    <div class="ms-4 animate-border-logo p-1 rounded">
        <img src="{{ asset('images/home_logo.png') }}" alt="Логотип" height="30">
    </div>

    <div class="d-flex align-items-center gap-3 mt-2 mt-md-0 flex-wrap">

        <div>
            <a href="{{ url('lang/kg') }}" class="text-white me-2">@lang('menu.language_kg')</a> /
            <a href="{{ url('lang/ru') }}" class="text-white">@lang('menu.language_ru')</a>
        </div>

        <a href="#" class="btn btn-sm btn-outline-light">@lang('menu.login')</a>

        <!-- Поиск -->
        <form action="{{ route('search') }}" method="GET" class="d-flex">
            <input type="text" name="q" class="form-control form-control-sm" placeholder="@lang('menu.search_placeholder')" required>
        </form>
    </div>
</div>


<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">@lang('menu.ipba_kr')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- О НАС -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.about_us')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.institute')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.news')</a></li>

                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">@lang('menu.governance_bodies')</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">@lang('menu.general_meeting')</a></li>
                                <li><a class="dropdown-item" href="#">@lang('menu.audit_council')</a></li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">@lang('menu.committees')</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">@lang('menu.admin_committee')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('menu.training_committee')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('menu.quality_committee')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('menu.investigation_committee')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('menu.disciplinary_committee')</a></li>
                                        <li><a class="dropdown-item" href="#">@lang('menu.audit_committee')</a></li>
                                    </ul>
                                </li>

                                <li><a class="dropdown-item" href="#">@lang('menu.executive_body')</a></li>
                                <li><a class="dropdown-item" href="#">@lang('menu.control_body')</a></li>
                            </ul>
                        </li>

                        <li><a class="dropdown-item" href="#">@lang('menu.international')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.documents')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.partners')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.reporting')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.contacts')</a></li>
                    </ul>
                </li>


                <!-- Реестры -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.registers')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.audit_orgs')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.auditors')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.qualification_info')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.membership_ended')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.orgs_ended')</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">@lang('menu.discipline_registry')</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">@lang('menu.to_auditors')</a></li>
                                <li><a class="dropdown-item" href="#">@lang('menu.to_auditors_and_orgs')</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">@lang('menu.certified_cipa')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.certified_intl_cipa')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cpa_eurasia')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.auditor_qualification')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.bank_accounting_1')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.bank_accounting_2')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.member_search')</a></li>
                    </ul>
                </li>

                <!-- Членство -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.membership')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.join')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.certificate')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.fees')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.member_reports')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.registry_changes')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.terminate')</a></li>
                    </ul>
                </li>

                <!-- Сертификации -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.certifications')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.auditor_prof_qual')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cipa_program')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cpa_program')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.bank_course_1_2')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cert_conversion')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cert_search')</a></li>
                    </ul>
                </li>

                <!-- Учебный центр -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.training_center')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.main_page')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.beginner_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.cipa_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.auditor_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.bank_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.advanced_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.excel_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.leader_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.hr_courses')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.seminars')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.online_training')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.course_records')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.trainers')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.consulting')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.payment_methods')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.download_contract')</a></li>
                    </ul>
                </li>

                <!-- Ресурсы -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.resources')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.actual')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.useful_links')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.regulations')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.isa')</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">@lang('menu.ifrs')</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">@lang('menu.methods')</a></li>
                                <li><a class="dropdown-item" href="#">@lang('menu.templates')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Работодателям -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">@lang('menu.employers')</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">@lang('menu.post_job')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.find_specialist')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.placement_terms')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('menu.attestation')</a></li>
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
                <h5 class="footer-title">Последние новости</h5>
                <p>Получайте актуальную информацию о событиях и новостях института</p>
                <form class="input-group mb-3" method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <div class="input-group footer-subscribe-group">
                        <input type="email" name="email" class="form-control" placeholder="Введите ваш Email" required>
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-paper-plane me-2"></i> Узнать новость
                        </button>
                    </div>
                </form>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                    </div>
                @endif

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
