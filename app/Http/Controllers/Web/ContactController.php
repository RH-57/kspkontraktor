<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController
{
    public function index()
    {
        $contacts = Contact::first();
        $sosmeds  = MediaSocial::get();

        return view('web.contact', compact('contacts', 'sosmeds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:1000',
            'g-recaptcha-response' => 'required', // wajib ada token reCAPTCHA
        ]);

        // 🔹 Verifikasi token ke Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $result = $response->json();

        // 🔹 Cek hasil validasi reCAPTCHA
        if (!($result['success'] ?? false) || ($result['score'] ?? 0) < 0.5) {
            return back()->withErrors([
                'captcha' => 'Captcha verification failed, please try again.',
            ])->withInput();
        }

        // 🔹 Simpan pesan ke database
        Message::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'subject'    => $request->subject,
            'message'    => $request->message,
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('contact.index')
            ->with('success', 'Pesan berhasil dikirim!');
    }
}
