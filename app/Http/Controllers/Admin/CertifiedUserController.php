<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CertifiedUserController extends Controller
{
    public function index() {
        // Показываем только зарегистрированных и сертифицированных
        $users = User::where('is_certified', true)->get();
        return view('admin.certified.index', compact('users'));
    }

    public function edit(User $user) {
        return view('admin.certified.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $user->update(['is_certified' => $request->has('is_certified')]);
        return redirect()->route('admin.certified.index')->with('message', 'Статус сертификации обновлён');
    }

    public function destroy(User $user) {
        $user->update(['is_certified' => false]);
        return redirect()->route('admin.certified.index')->with('message', 'Сертификация снята');
    }
}

