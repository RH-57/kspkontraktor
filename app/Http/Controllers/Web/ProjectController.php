<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProjectController
{
    public function index() {
        $contacts = Contact::first();
        $projects = Project::with('images')->get();
        $testimonials = Testimonial::get();
        $sosmeds = MediaSocial::get();

        return view('web.project', compact('contacts','testimonials', 'projects', 'sosmeds'));
    }

    public function show($slug)
    {
        $project = Project::with('images')->where('slug', $slug)->firstOrFail();
        $sosmeds = MediaSocial::get();
        $contacts = Contact::first();
        $otherProjects = Project::where('id', '!=', $project->id)
        ->with('images')
        ->inRandomOrder()
        ->take(4)
        ->get();

        return view('web.projectshow', compact('project', 'contacts', 'sosmeds', 'otherProjects'));
    }
}
