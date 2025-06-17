<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Получаем самую свежую новость
        $latestNews = News::latest()->first();

        if (!$latestNews) {
            return back()->with('error', 'Нет доступных новостей для отправки.');
        }

        // Отправляем письмо
        Mail::to($request->email)->send(new \App\Mail\LatestNewsMail($latestNews));

        return back()->with('success', 'Последняя новость отправлена на ваш Email!');
    }
}

