<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Newsletter;
use App\Models\Service;
use App\Models\User;
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
}
