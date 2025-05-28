<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    // POST /admin/send-mail
    public function sendMail(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        foreach (Subscriber::all() as $subscriber) {
            Notification::create([
                'type' => 'email',
                'content' => "To: {$subscriber->email}\n\nSubject: {$data['subject']}\n\n{$data['content']}",
                'status' => 'queued',
            ]);

            // Здесь можно реализовать Mail::to($subscriber->email)->send(...)
        }

        return response()->json(['message' => 'Email-рассылка добавлена в очередь']);
    }

    // POST /admin/send-whatsapp
    public function sendWhatsApp(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $instanceId = env('ULTRAMSG_INSTANCE_ID');
        $token = env('ULTRAMSG_TOKEN');

        $response = Http::post("https://api.ultramsg.com/v2/{$instanceId}/messages/chat", [
            'token' => $token,
            'to' => $data['phone'],
            'body' => $data['message'],
        ]);

        Notification::create([
            'type' => 'whatsapp',
            'content' => "To: {$data['phone']} — {$data['message']}",
            'status' => $response->successful() ? 'sent' : 'failed',
        ]);

        if ($response->successful()) {
            return response()->json(['message' => 'Сообщение успешно отправлено в WhatsApp']);
        } else {
            return response()->json(['error' => 'Ошибка при отправке WhatsApp сообщения'], 500);
        }
    }

    // GET /admin/dashboard
    public function dashboard()
    {
        return response()->json([
            'users' => \App\Models\User::count(),
            'courses' => \App\Models\Course::count(),
            'applications' => \App\Models\Application::count(),
            'subscribers' => Subscriber::count(),
        ]);
    }
}
