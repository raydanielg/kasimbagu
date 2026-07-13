<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    // Public: Display all published events
    public function index()
    {
        $events = Event::where('is_published', true)
            ->orderBy('event_date', 'asc')
            ->orderBy('sort_order')
            ->paginate(9);
        return view('events.index', compact('events'));
    }

    // Public: Display single event
    public function show($slug)
    {
        $event = Event::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        $upcomingEvents = Event::where('is_published', true)
            ->where('id', '!=', $event->id)
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->take(3)
            ->get();
        return view('events.show', compact('event', 'upcomingEvents'));
    }

    // Admin: Index with search and filtering
    public function adminIndex(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $events = $query->orderBy('event_date', 'desc')->orderBy('sort_order')->paginate(10);

        if ($request->ajax()) {
            return view('admin.events.partials.table', compact('events'))->render();
        }

        return view('admin.events.index', compact('events'));
    }

    // Admin: Create form
    public function create()
    {
        return view('admin.events.create');
    }

    // Admin: Store new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'google_maps_link' => 'nullable|url|max:500',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/events', 'public');
        } else {
            unset($validated['image']);
        }

        Event::create($validated);

        return redirect()->route('admin.events')->with('success', 'Event created successfully.');
    }

    // Admin: Show single event
    public function adminShow($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    // Admin: Edit form
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    // Admin: Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'google_maps_link' => 'nullable|url|max:500',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('images/events', 'public');
        } else {
            unset($validated['image']);
        }

        $event->update($validated);

        return redirect()->route('admin.events')->with('success', 'Event updated successfully.');
    }

    // Admin: Delete event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->route('admin.events')->with('success', 'Event deleted successfully.');
    }

    // Admin: Toggle publish status
    public function togglePublish($id)
    {
        $event = Event::findOrFail($id);
        $event->is_published = !$event->is_published;
        $event->save();
        return response()->json(['success' => true, 'is_published' => $event->is_published]);
    }
}
