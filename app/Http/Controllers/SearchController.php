<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\News;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $courses = Course::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        $news = News::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return view('search.results', compact('query', 'courses', 'news'));
    }
}

