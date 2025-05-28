<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    // POST /courses/{id}/apply
    public function apply(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $exists = Application::where('course_id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if ($exists) {
            return response()->json(['message' => 'Вы уже подали заявку на этот курс'], 409);
        }

        $application = Application::create([
            'course_id' => $id,
            'user_id' => Auth::id(),
            'status' => 'pending',
            'comment' => $request->comment,
        ]);

        return response()->json([
            'message' => 'Заявка отправлена',
            'data' => $application,
        ]);
    }
}
