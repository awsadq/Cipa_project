<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    // Получить список всех сертификаций
    public function index()
    {
        $certifications = Certification::with('user')->get();
        return response()->json($certifications);
    }

    // Поиск сертификата по номеру
    public function search(Request $request)
    {
        $number = $request->query('number');

        $cert = Certification::where('certificate_number', $number)->with('user')->first();

        if (!$cert) {
            return response()->json(['message' => 'Сертификат не найден'], 404);
        }

        return response()->json($cert);
    }
}
