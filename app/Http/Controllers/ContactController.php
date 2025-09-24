<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Simpan data ke database
            $contact = Contact::create($validated);

            // Kirim email rapi langsung HTML tabel ke Gmail
            Mail::to("artrevand@gmail.com")->send(new ContactMail($contact));

            // Kembali ke halaman dengan pesan sukses
            return back()->with('success', 'Pesan berhasil dikirim!');
        } catch (\Exception $e) {
            // Jika gagal, kembali dengan error
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // 🔹 Tambahkan function baru untuk dashboard
    public function index()
    {
        // Ambil semua contact terbaru
        $contacts = Contact::latest()->get();

        // Kirim ke view dashboard.contacts.index
        return view('admin.liat_contact', compact('contacts'));
    }
}
