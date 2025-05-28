namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
public function me()
{
$user = Auth::user()->load(['profile', 'certificates']);
return response()->json($user);
}

public function update(Request $request)
{
$user = Auth::user();

$data = $request->validate([
'full_name' => 'sometimes|string',
'education' => 'nullable|string',
'workplace' => 'nullable|string',
'phone' => 'nullable|string',
'telegram' => 'nullable|string',
]);

$user->profile->update($data);

return response()->json(['message' => 'Профиль обновлен']);
}
}
public function uploadAvatar(Request $request)
{
$request->validate([
'photo' => 'required|image|max:2048',
]);

$user = $request->user();

$path = $request->file('photo')->store('avatars', 'public');

$user->profile->update([
'photo' => $path,
]);

return response()->json(['message' => 'Фото обновлено', 'photo_url' => asset('storage/' . $path)]);
}
