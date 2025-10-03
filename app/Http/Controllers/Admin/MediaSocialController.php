<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaSocial;
use Illuminate\Http\Request;

class MediaSocialController
{
    public function store (Request $request) {
        $request->validate([
            'name'      => 'required|string|max:100',
            'url'       => 'required|url|max:255',
            'icon'      => 'required|string|max:100',
        ]);

        MediaSocial::create([
            'name'  => $request->name,
            'url'   => $request->url,
            'icon'  => $request->icon,
        ]);

        return redirect()->back()->with('success', 'Add Social Media Successfully');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'  => 'required|string|max:100',
            'url'   => 'required|url|max:255',
            'icon'  => 'required|string|max:100',
        ]);

        $mediasocial = MediaSocial::findOrFail($id);
        $mediasocial->update([
            'name'  => $request->name,
            'url'   => $request->url,
            'icon'  => $request->icon,
        ]);

        return redirect()->back()->with('success', 'Social Media Updated Successfully');
    }

    public function destroy($id) {
        $mediasocial = MediaSocial::findOrFail($id);

        $mediasocial->delete();

        return redirect()->back()->with('success', 'Add Social Media Deleted Successfully');
    }
}
