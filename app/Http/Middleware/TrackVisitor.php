<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $crawlerDetect = new CrawlerDetect();

        if ($crawlerDetect->isCrawler($request->userAgent())) {
            // Simpan hanya sekali per IP per hari
            $today = Carbon::today()->toDateString();

            $exists = Visitor::where('ip_address', $request->ip())
                ->where('visit_date', $today)
                ->exists();

            if (!$exists) {
                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'visit_date' => $today,
                ]);
            }
        }

        return $next($request);
    }
}
