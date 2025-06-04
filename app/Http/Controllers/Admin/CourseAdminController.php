<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Trainer;
use Illuminate\Http\Request;

class CourseAdminController extends Controller
{
    public function index()
    {
        $courses = Course::with('trainer', 'category')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = CourseCategory::all();
        $trainers = Trainer::all();
        return view('admin.courses.create', compact('categories', 'trainers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'program' => 'nullable|string', // ✅ добавлено
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'course_category_id' => 'required|exists:course_categories,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'whatsapp_link' => 'nullable|string',
        ]);

        if ($request->hasFile('program_file')) {
            $data['program_file'] = $request->file('program_file')->store('programs', 'public');
        }

        Course::create($data);
        return redirect()->route('admin.courses.index')->with('message', 'Курс успешно добавлен');

    }

    // ✅ Добавлен метод редактирования
    public function edit(Course $course)
    {
        $categories = CourseCategory::all();
        $trainers = Trainer::all();
        return view('admin.courses.edit', compact('course', 'categories', 'trainers'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'program' => 'nullable|string', // ✅ добавлено
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'course_category_id' => 'required|exists:course_categories,id',
            'trainer_id' => 'nullable|exists:trainers,id',
            'whatsapp_link' => 'nullable|string',
        ]);

        if ($request->hasFile('program_file')) {
            $data['program_file'] = $request->file('program_file')->store('programs', 'public');
        }

        $course->update($data);
        return redirect()->route('admin.courses.index')->with('message', 'Курс успешно обновлён');


    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('message', 'Курс успешно удалён');
    }
}
