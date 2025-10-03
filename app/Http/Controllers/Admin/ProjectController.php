<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('images')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'              => 'required|string|max:100',
            'location'          => 'nullable|string|max:100',
            'description'       => 'required|string',
            'year'              => 'required|digits:4|integer',
            'images'            => 'required|array',
            'images.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
            'canonical_url'     => 'nullable|url|max:255',
        ]);

        $slug = Str::slug($request->name);
        $canonicalUrl = $request->canonical_url ?: url('projects/' . $slug);

        $project = Project::create([
            'name'              => $request->name,
            'slug'              => $slug,
            'location'          => $request->location,
            'description'       => $request->description,
            'year'              => $request->year,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
            'canonical_url'     => $canonicalUrl,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('projects', 'public');
                ProjectImage::create([
                    'project_id'    => $project->id,
                    'image'         => $path
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project Created Successfully');
    }

    public function show($slug) {
        $project = Project::with('images')->where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    public function edit($slug){
        $project = Project::where('slug', $slug)->with('images')->firstOrFail();
        return view('admin.projects.edit', compact('project'));
    }

    public function deleteImage($id)
    {
        $image = ProjectImage::findOrFail($id);

        // Hapus file dari storage
        if ($image->image && Storage::exists('public/' . $image->image)) {
            Storage::delete('public/' . $image->image);
        }

        // Hapus record di database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

    public function update(Request $request, $slug) {
        $project = Project::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name'              => 'required|string|max:100',
            'location'          => 'nullable|string|max:100',
            'description'       => 'required|string',
            'year'              => 'required|digits:4|integer',
            'images.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string|max:255',
            'canonical_url'     => 'nullable|url|max:255',
        ]);

        $newSlug = Str::slug($request->name);
        $canonicalUrl = $request->canonical_url ?: url('projects/' . $newSlug);

        // Update data project
        $project->update([
            'name'              => $request->name,
            'slug'              => $newSlug,
            'location'          => $request->location,
            'description'       => $request->description,
            'year'              => $request->year,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
            'canonical_url'     => $canonicalUrl,
        ]);

        // Upload image baru (jika ada)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('projects', 'public');
                ProjectImage::create([
                    'project_id'    => $project->id,
                    'image'         => $path
                ]);
            }
        }

        return redirect()->route('projects.show', $project->slug)
                        ->with('success', 'Project updated successfully!');
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project Deleted Successfully');
    }
}
