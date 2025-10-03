<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController
{
    public function index() {
        $testimonials = Testimonial::paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create() {
        return view('admin.testimonials.create');
    }

    public function store(Request $request) {
        $request->validate([
            'client_name'       => 'required|string|max:35',
            'project_name'      => 'required|string|max:100',
            'description'       => 'required|string',
            'image'             => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials/images', 'public');
        }

        Testimonial::create([
            'client_name'       => $request->client_name,
            'project_name'      => $request->project_name,
            'description'       => $request->description,
            'image'             => $imagePath,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial Created Successfully');
    }

    public function edit($id) {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update (Request $request, $id) {
        $testimonial = Testimonial::where('id', $id)->firstOrFail();

        $request->validate([
            'client_name'       => 'required|string|max:35',
            'project_name'      => 'required|string|max:100',
            'description'       => 'required|string',
            'image'             => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials/images', 'public');
        }

        $testimonial->update([
            'client_name'       => $request->client_name,
            'project_name'      => $request->project_name,
            'description'       => $request->description,
            'image'             => $imagePath,
        ]);

        return redirect()->route('testimonials.edit', $id)->with('success', 'Testimonial Updated Successfully');
    }

    public function destroy($id) {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial Deleted Successfully');
    }
}
