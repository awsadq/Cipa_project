<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ❗ Берём все курсы, без ограничения по дате и количеству
        $courses = Course::with(['trainer', 'category'])
            ->orderBy('start_date')
            ->get();

        $news = News::latest()->get();
        $categories = CourseCategory::all();

        return view('pages.home', compact('courses', 'news', 'categories'));
    }

    // Этот метод можно удалить, он не нужен больше
    // public function homeNews()
    // {
    //     return view('pages.home');
    // }
}
