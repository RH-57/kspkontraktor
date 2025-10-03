<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Procedure;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController
{
    public function index() {
        $contacts = Contact::first();
        $services = Service::where('status', '1')->get();
        $projects = Project::with('images')->latest()->take(6)->get();
        $sosmeds = MediaSocial::get();
        $procedures = Procedure::orderBy('no')->get();

        return view('web.service', compact('contacts','services', 'projects', 'sosmeds', 'procedures'));
    }

    public function show($slug)
    {
        $contacts = Contact::first();
        $service = Service::where('slug', $slug)->where('status', '1')->firstOrFail();
        $sosmeds = MediaSocial::get();

        // ambil related services selain service ini
        $relatedServices = Service::where('status', '1')
                            ->where('id', '!=', $service->id)
                            ->take(3)
                            ->get();

        return view('web.service-detail', compact('service', 'contacts', 'sosmeds', 'relatedServices'));
    }
}
