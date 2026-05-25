<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Newsletter;
use App\Models\Service;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.dashboard', compact('inquiries'));
    }

    // Services Management
    public function servicesIndex()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function servicesCreate()
    {
        return view('admin.services.create');
    }

    public function servicesStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'icon_color' => 'required|string|max:20',
            'cta_text' => 'required|string|max:50',
            'is_featured' => 'boolean',
            'features' => 'nullable|array',
        ]);

        $data['features'] = $data['features'] ?? [];
        $data['is_featured'] = $request->has('is_featured');

        Service::create($data);

        return redirect()->route('admin.services')->with('success', 'Service created successfully.');
    }

    public function servicesShow($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    public function servicesEdit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function servicesUpdate(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'icon_color' => 'required|string|max:20',
            'cta_text' => 'required|string|max:50',
            'is_featured' => 'boolean',
            'features' => 'nullable|array',
        ]);

        $data['features'] = $data['features'] ?? [];
        $data['is_featured'] = $request->has('is_featured');

        $service->update($data);

        return redirect()->route('admin.services')->with('success', 'Service updated successfully.');
    }

    public function servicesDestroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')->with('success', 'Service deleted successfully.');
    }

    // Inquiries Management
    public function inquiriesIndex()
    {
        $inquiries = Inquiry::latest()->paginate(10);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function inquiriesShow($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function inquiriesDestroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry deleted successfully.');
    }

    // Users Management
    public function usersIndex()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function usersShow($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function usersDestroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->route('admin.users')->with('error', 'Cannot delete admin users.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Newsletter Management
    public function newslettersIndex()
    {
        $newsletters = Newsletter::latest()->paginate(10);
        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function newslettersToggle($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->is_active = !$newsletter->is_active;
        $newsletter->save();

        return redirect()->route('admin.newsletters')->with('success', 'Subscriber status updated successfully.');
    }

    public function newslettersDestroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();

        return redirect()->route('admin.newsletters')->with('success', 'Subscriber deleted successfully.');
    }

    // Bookings Management
    public function bookingsIndex()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function bookingsUpdateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,cancelled',
        ]);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'Booking status updated successfully.');
    }

    public function bookingsDestroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully.');
    }

    // Destinations Management
    public function destinationsIndex()
    {
        $destinations = Destination::orderBy('sort_order')->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    public function destinationsCreate()
    {
        return view('admin.destinations.create');
    }

    public function destinationsStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'region' => 'required|string|max:100',
            'description' => 'required|string',
            'image_url' => 'nullable|url|max:500',
            'visa_required' => 'boolean',
            'visa_type' => 'nullable|string|max:100',
            'flight_duration' => 'nullable|string|max:100',
            'best_season' => 'nullable|string|max:100',
            'highlights' => 'nullable|array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['visa_required'] = $request->has('visa_required');
        $data['is_popular'] = $request->has('is_popular');
        $data['is_active'] = $request->has('is_active');
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        $data['highlights'] = $data['highlights'] ?? [];

        Destination::create($data);

        return redirect()->route('admin.destinations')->with('success', 'Destination created successfully.');
    }

    public function destinationsEdit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    public function destinationsUpdate(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'region' => 'required|string|max:100',
            'description' => 'required|string',
            'image_url' => 'nullable|url|max:500',
            'visa_required' => 'boolean',
            'visa_type' => 'nullable|string|max:100',
            'flight_duration' => 'nullable|string|max:100',
            'best_season' => 'nullable|string|max:100',
            'highlights' => 'nullable|array',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $data['visa_required'] = $request->has('visa_required');
        $data['is_popular'] = $request->has('is_popular');
        $data['is_active'] = $request->has('is_active');
        $data['slug'] = \Illuminate\Support\Str::slug($data['name']);
        $data['highlights'] = $data['highlights'] ?? [];

        $destination->update($data);

        return redirect()->route('admin.destinations')->with('success', 'Destination updated successfully.');
    }

    public function destinationsDestroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destinations')->with('success', 'Destination deleted successfully.');
    }
}
