namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
public function index()
{
$payments = Auth::user()->payments()->latest()->get();
return response()->json($payments);
}
}
