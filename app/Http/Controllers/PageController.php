<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Destination;
use App\Models\TeamMember;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function services()
    {
        $services = Service::active()->get()->groupBy('category');
        $featured = Service::active()->featured()->get();
        return view('pages.services', compact('services', 'featured'));
    }

    public function destinations(Request $request)
    {
        $region = $request->query('region', 'all');
        $query  = Destination::active();
        if ($region !== 'all') {
            $query->byRegion($region);
        }
        $destinations = $query->get();
        $regions      = Destination::active()->distinct()->pluck('region')->sort()->values();
        $popular      = Destination::active()->popular()->get();
        return view('pages.destinations', compact('destinations', 'regions', 'region', 'popular'));
    }

    public function about()
    {
        $team = TeamMember::active()->get();
        return view('pages.about', compact('team'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'phone'       => ['nullable', 'string', 'max:30'],
            'service'     => ['nullable', 'string', 'max:100'],
            'destination' => ['nullable', 'string', 'max:100'],
            'subject'     => ['nullable', 'string', 'max:255'],
            'message'     => ['required', 'string', 'max:3000'],
        ]);

        Inquiry::create(array_merge($data, [
            'source'     => $request->header('referer', 'direct'),
            'ip_address' => $request->ip(),
        ]));

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been received. We will respond within 24 hours.',
            ]);
        }

        return back()->with('success', 'Thank you! Your message has been received. We will respond within 24 hours.');
    }
}
