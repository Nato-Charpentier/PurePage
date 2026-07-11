<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadSubmitted;
use Illuminate\Support\Facades\RateLimiter;
class LeadController extends Controller
{
    public function store(Request $request)
    {
        $key = 'contact-form:' . $request->ip();

        // Refuse les robots avant de consommer une tentative valide.
        if ($request->filled('website')) {
            return response()->json([
                'error' => 'Spam détecté.'
            ], 422);
        }

        $startedAt = (int) $request->input('started_at', 0);
        $elapsed = (now()->timestamp * 1000) - $startedAt;

        if ($startedAt <= 0 || $elapsed < 2000) {
            return response()->json([
                'error' => 'Envoi trop rapide.'
            ], 429);
        }

        if (RateLimiter::tooManyAttempts($key, 3)) {
            return response()->json([
                'error' => 'Trop de tentatives. Réessayez dans une minute.'
            ], 429);
        }

        // ✅ Validation
        $v = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'pack' => ['nullable', 'string', 'max:60'],
        ]);

        RateLimiter::hit($key, 60);

        // 📩 Envoi email
        Mail::to(config('purpage.brand_email'))
            ->send(new LeadSubmitted(
                $v['name'],
                $v['email'],
                $v['message'],
                $v['pack'] ?? 'Contact'
            ));

        return response()->json(['ok' => true]);
    }
}
