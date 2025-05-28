<?php

namespace App\Http\Controllers;

use App\Models\MembershipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    // Отправить заявку на членство
    public function apply(Request $request)
    {
        $request->validate([
            'comment' => 'nullable|string',
        ]);

        $application = MembershipApplication::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'comment' => $request->comment,
        ]);

        return response()->json([
            'message' => 'Заявка успешно отправлена',
            'application' => $application
        ], 201);
    }

    // Получить список всех заявок (например, для админа)
    public function index()
    {
        return MembershipApplication::with('user')->get();
    }
}
