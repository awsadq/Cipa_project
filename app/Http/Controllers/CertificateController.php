use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;

public function store(Request $request)
{
$data = $request->validate([
'certificate_number' => 'required|string|unique:certificates',
'type' => 'required|string',
'issued_at' => 'required|date',
]);

$certificate = Auth::user()->certificates()->create($data);

return response()->json($certificate);
}
