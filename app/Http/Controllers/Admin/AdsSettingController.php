<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdsSetting;
use Illuminate\Http\Request;

class AdsSettingController extends Controller
{
     public function edit()
    {
        // Ambil data pertama, kalau belum ada bikin default
        $setting = AdsSetting::firstOrCreate([], [
            'client_id' => null,
            'slot_id' => null,
            'ad_format' => 'auto',
            'responsive' => true,
            'custom_style' => null,
        ]);

        return view('admin.settings.ads.index', compact('setting'));
    }

    /**
     * Update pengaturan Google Ads.
     */
    public function update(Request $request)
    {
        $request->validate([
            'client_id'   => 'nullable|string|max:255',
            'slot_id'     => 'nullable|string|max:255',
            'ad_format'   => 'nullable|string|max:50',
            'responsive'  => 'nullable|boolean',
            'custom_style'=> 'nullable|string',
        ]);

        $setting = AdsSetting::first();

        $setting->update([
            'client_id'   => $request->client_id,
            'slot_id'     => $request->slot_id,
            'ad_format'   => $request->ad_format ?? 'auto',
            'responsive'  => $request->boolean('responsive'),
            'custom_style'=> $request->custom_style,
        ]);

        return redirect()->back()->with('success', 'Google Ads settings updated successfully!');
    }
}
