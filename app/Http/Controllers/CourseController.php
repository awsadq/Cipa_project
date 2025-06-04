<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\News;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $categories = CourseCategory::all();
        $query = Course::with(['trainer', 'category']);

        $selectedCategory = null;

        // 🔍 Фильтрация по категории
        if ($request->has('category')) {
            $selectedCategory = $request->category;
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // 🔍 Фильтрация по тренеру
        if ($request->has('trainer')) {
            $query->whereHas('trainer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->trainer . '%');
            });
        }

        // 🔍 Фильтрация по дате (если явно указано)
        if ($request->has('from') && $request->has('to')) {
            $query->whereBetween('start_date', [$request->from, $request->to]);
        }

        // ❌ Удалили ограничение по дате окончания!
        // Все курсы будут отображаться, независимо от времени начала/окончания

        $courses = $query->orderBy('start_date', 'desc')->get();
        $news = News::latest()->take(4)->get();

        return view('pages.home', [
            'courses' => $courses,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'news' => $news,
        ]);
    }


    public function show(Course $course)
    {
        $course->load(['trainer', 'category']);
        return view('courses.show', compact('course'));
    }

    public function schedule()
    {
        $courses = Course::with(['trainer', 'category'])
            ->orderBy('start_date')
            ->get();

        return view('courses.schedule', compact('courses'));
    }
}
