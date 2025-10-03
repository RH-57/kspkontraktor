<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Post;
use App\Models\Project;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController
{
    public function index() {
        $projects = Project::withoutTrashed()->count();
        $posts = Post::withoutTrashed()->count();
        $todayVisitors = Visitor::whereDate('visit_date', Carbon::today())->count();
        $todayMessages = Message::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard.index', compact(
            'projects',
            'posts',
            'todayVisitors',
            'todayMessages',
        ));
    }
}
