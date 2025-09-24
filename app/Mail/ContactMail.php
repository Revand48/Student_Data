<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        // Membuat email langsung dengan HTML tabel
        $htmlContent = '
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Pesan Baru dari Kontak</title>
            <style>
                body { font-family: Arial, sans-serif; color: #0b2e66; }
                table { border-collapse: collapse; width: 100%; margin-top: 10px; }
                th, td { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #ffffff; color: #0b2e66; text-align: left; }
                td { background-color: #ffffff; }
            </style>
        </head>
        <body>
            <h2>Pesan Baru dari Kontak</h2>
            <table>
                <tr><th>Nama</th><td>'.$this->contact->name.'</td></tr>
                <tr><th>Email</th><td>'.$this->contact->email.'</td></tr>
                <tr><th>Subjek</th><td>'.$this->contact->subject.'</td></tr>
                <tr><th>Pesan</th><td>'.nl2br(e($this->contact->message)).'</td></tr>
            </table>
        </body>
        </html>';

        return $this->subject('Pesan Baru dari Kontak')
                    ->html($htmlContent);
    }
}
