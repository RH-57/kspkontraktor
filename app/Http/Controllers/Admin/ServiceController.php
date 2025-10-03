<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;


class ServiceController extends Controller
{
    public function index() {
        $services = Service::withoutTrashed()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug',
            'short_description' => 'required|string',
            'description'       => 'required|string',
            'icon'              => 'nullable|string|max:50',
            'image'             => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status'            => 'required|in:0,1',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
            'meta_image'        => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'canonical_url'     => 'nullable|url|max:255',
        ]);

        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services/images', 'public');
        }

        $metaImagePath = null;
        if ($request->hasFile('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('services/meta', 'public');
        }

        $canonicalUrl = $request->canonical_url ? $request->canonical_url : url('services', $slug);

        Service::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'icon'              => $request->icon,
            'image'             => $imagePath,
            'status'            => $request->status,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'meta_image'        => $metaImagePath,
            'canonical_url'     => $canonicalUrl,
        ]);

        return redirect()->route('services.index')->with(['success' => 'Service created successfully']);
    }

    public function show($slug) {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.services.show', compact('service'));
    }

    public function edit($slug) {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $slug) {
        $service = Service::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'short_description' => 'required|string',
            'description'       => 'required|string',
            'icon'              => 'nullable|string|max:50',
            'image'             => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'status'            => 'required|in:0,1',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
            'meta_image'        => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'canonical_url'     => 'nullable|url|max:255',
        ]);

        $slugNew = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
        if (Service::where('slug', $slugNew)->where('id', '!=', $service->id)->exists()) {
            $slugNew .= '-' . time();
        }

        // Update image jika ada upload baru
        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services/images', 'public');
        }

        // Update meta image jika ada upload baru
        $metaImagePath = $service->meta_image;
        if ($request->hasFile('meta_image')) {
            $metaImagePath = $request->file('meta_image')->store('services/meta', 'public');
        }

        $canonicalUrl = $request->canonical_url ? $request->canonical_url : url('services', $slug);

        $service->update([
            'title'             => $request->title,
            'slug'              => $slugNew,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'icon'              => $request->icon,
            'image'             => $imagePath,
            'status'            => $request->status,
            'meta_title'        => $request->meta_title,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'meta_image'        => $metaImagePath ?? $service->meta_image,
            'canonical_url'     => $canonicalUrl,
        ]);

        return redirect()->route('services.index')->with(['success' => 'Service updated successfully']);
    }


    public function destroy($id) {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service Deleted Successfully');
    }

}
