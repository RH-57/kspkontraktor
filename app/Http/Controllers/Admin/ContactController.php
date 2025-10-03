<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\social_media;
use Illuminate\Http\Request;

class ContactController
{
    public function index() {
        $contacts = Contact::first();
        $mediasocials = MediaSocial::all();
        return view('admin.settings.contact.index', compact('contacts', 'mediasocials'));
    }

    public function store(Request $request) {
        $request->validate([
            'address'   => 'required|string|max:255',
            'phone'     => 'required|string|max:15',
            'email'     => 'required|string|max:30',
            'maps'      => 'required|string',
        ]);

        $contacts = Contact::first();

        if ($contacts) {
            $contacts->update($request->only(['address','phone','email', 'maps']));
        } else {
            Contact::create($request->only(['address','phone','email', 'maps']));
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts updated successfully');
    }
}
