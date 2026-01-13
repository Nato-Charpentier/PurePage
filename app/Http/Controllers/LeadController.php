<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadSubmitted;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $v = $request->validate([
            'name' => ['required','string','max:120'],
            'email' => ['required','email','max:255'],
            'message' => ['required','string','max:5000'],
            'pack' => ['nullable','string','max:60'],
        ]);

        Mail::to(config('purepage.brand_email'))
            ->send(new LeadSubmitted($v['name'], $v['email'], $v['message'], $v['pack'] ?? 'Contact'));

        return response()->json(['ok' => true]);
    }
}
