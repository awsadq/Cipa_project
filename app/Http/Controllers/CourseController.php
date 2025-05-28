<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // GET /courses — список курсов с фильтрацией
    public function index(Request $request)
    {
        $query = Course::with(['trainer', 'category']);

        if ($request->has('category')) {
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

        // ближайшие 2 месяца
        if ($request->has('upcoming')) {
            $query->whereBetween('start_date', [now(), now()->addMonths(2)]);
        }

        return response()->json($query->get());
    }
}

