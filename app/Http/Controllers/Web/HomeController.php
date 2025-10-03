<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController
{
    public function index() {
        $contacts = Contact::first();
        $services = Service::where('status', '1')->get();
        $projects = Project::with('images')->latest()->take(6)->get();
        $testimonials = Testimonial::get();
        $posts = Post::where('status', 'published')
                ->with('category')
                ->latest()
                ->take(3)
                ->get();
        $sosmeds = MediaSocial::get();

        return view('web.home', compact('contacts','services', 'projects', 'testimonials', 'posts', 'sosmeds'));
    }
}
