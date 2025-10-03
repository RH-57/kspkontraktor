<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Post;
use App\Models\Project;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function index() {
        $projects = Project::withoutTrashed()->count();
        $posts = Post::withoutTrashed()->count();
        $todayVisitors = Visitor::whereDate('visit_date', Carbon::today())->count();
        $todayMessages = Message::whereDate('created_at', Carbon::today())->count();

        $visitorStats = Visitor::select(
                DB::raw('DATE(visit_date) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->whereMonth('visit_date', Carbon::now()->month)   // bulan berjalan
            ->whereYear('visit_date', Carbon::now()->year)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // ambil array untuk chart
        $dates = $visitorStats->pluck('date')->toArray();
        $totals = $visitorStats->pluck('total')->toArray();


        return view('admin.dashboard.index', compact(
            'projects',
            'posts',
            'todayVisitors',
            'todayMessages',
            'dates',
            'totals'
        ));
    }
}
