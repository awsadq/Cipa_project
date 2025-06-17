<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $news->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f4f9;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 640px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            padding: 40px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 20px;
        }

        .excerpt {
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            background-color: #1e40af;
            color: #ffffff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #777777;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="title">{{ $news->title }}</div>

    <div class="excerpt">{{ $news->excerpt }}</div>

    <p>
        <a href="{{ route('news.show', $news->id) }}" class="button">
            Читать полностью
        </a>
    </p>

    <div class="footer">
        Спасибо,<br>
        {{ config('app.name') }}
    </div>
</div>
</body>
</html>
