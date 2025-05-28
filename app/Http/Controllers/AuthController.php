namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
public function register(Request $request)
{
$fields = $request->validate([
'email' => 'required|email|unique:users,email',
'full_name' => 'required|string',
'password' => 'nullable|string|min:6',
]);

$password = $fields['password'] ?? Str::random(10);

$user = User::create([
'email' => $fields['email'],
'password' => Hash::make($password),
'role' => 'user',
]);

$user->profile()->create([
'full_name' => $fields['full_name'],
]);

// Здесь можешь позже добавить отправку email/WhatsApp с логином и паролем

return response()->json([
'message' => 'Пользователь зарегистрирован',
'password' => $password, // для теста, в проде не возвращать!
]);
}

public function login(Request $request)
{
$fields = $request->validate([
'email' => 'required|email',
'password' => 'required|string',
]);

if (!Auth::attempt($fields)) {
return response()->json(['message' => 'Неверные данные'], 401);
}

$user = Auth::user();
$token = $user->createToken('auth_token')->plainTextToken;

return response()->json([
'token' => $token,
'user' => $user,
]);
}
}
public function logout(Request $request)
{
$request->user()->currentAccessToken()->delete();

return response()->json([
'message' => 'Вы вышли из системы'
]);
}
public function changePassword(Request $request)
{
$request->validate([
'current_password' => 'required|string',
'new_password' => 'required|string|min:6|confirmed',
]);

$user = $request->user();

if (!Hash::check($request->current_password, $user->password)) {
return response()->json(['message' => 'Неверный текущий пароль'], 400);
}

$user->update([
'password' => Hash::make($request->new_password),
]);

return response()->json(['message' => 'Пароль успешно обновлен']);
}
