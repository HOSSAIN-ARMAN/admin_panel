<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;

use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create() {
        return view('bladeFile.contact.create');
    }
    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Mail::to('test@gmail.com')->send(new ContactFormMail($data)); //php artisan make:mail ContactFormMail --markdown=emails.contact.contact-form
        return back();
    }
}
