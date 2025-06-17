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

        if ($request->has('category')) {
            $selectedCategory = $request->category;
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->has('trainer')) {
            $query->whereHas('trainer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->trainer . '%');
            });
        }

        if ($request->has('from') && $request->has('to')) {
            $query->whereBetween('start_date', [$request->from, $request->to]);
        }

        $courses = $query->orderBy('start_date', 'desc')
            ->take(4) // 👈 Показываем только 4 курса на главной
            ->get();

        $news = News::latest()->take(4)->get();

        return view('pages.home', [
            'courses' => $courses,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'news' => $news,
        ]);
    }

    public function allCourses(Request $request)
    {
        $query = Course::with(['trainer', 'category']);

        // Фильтрация по названию курса
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Фильтрация по категории
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        // Фильтрация по тренеру
        if ($request->filled('trainer')) {
            $query->whereHas('trainer', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->trainer . '%');
            });
        }

        // Фильтрация по дате начала
        if ($request->filled('from')) {
            $query->whereDate('start_date', '>=', $request->from);
        }

        // Фильтрация по дате окончания
        if ($request->filled('to')) {
            $query->whereDate('end_date', '<=', $request->to);
        }

        $courses = $query->orderBy('start_date', 'desc')->get();
        $categories = CourseCategory::all();

        return view('courses.allcourses', compact('courses', 'categories'));
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
