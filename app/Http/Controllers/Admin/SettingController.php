<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController
{
    public function index() {
        $contacts = Setting::first();
        return view('admin.settings.contact.index', compact('contacts'));
    }

    public function store(Request $request) {
        $request->validate([
            'address'   => 'required|string',
            'phone'     => 'required|string|max:15',
            'email'     => 'required|string|max:30',
        ]);

        $settings = Setting::first();

        if ($settings) {
            $settings->update($request->only(['address','phone','email']));
        } else {
            Setting::create($request->only(['address','phone','email']));
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts updated successfully');
    }
}
