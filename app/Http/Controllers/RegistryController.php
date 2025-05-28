<?php

namespace App\Http\Controllers;

use App\Models\RegistryEntry;
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    // Получить список записей реестра по типу: auditor | organization
    public function index(Request $request)
    {
        $type = $request->query('type', 'auditor'); // значение по умолчанию — 'auditor'
        $entries = RegistryEntry::where('type', $type)->get();
        return response()->json($entries);
    }

    // Добавить новую запись в реестр
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:auditor,organization',
            'name' => 'required|string',
            'license_number' => 'nullable|string',
            'included_at' => 'nullable|date',
            'pdf_path' => 'nullable|string',
        ]);

        $entry = RegistryEntry::create($data);
        return response()->json([
            'message' => 'Запись успешно добавлена',
            'entry' => $entry
        ], 201);
    }
}
