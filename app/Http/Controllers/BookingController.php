<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'booking_type' => 'required|string|in:flight,visa,hotel,tour,pickup',
            'destination' => 'nullable|string|max:100',
            'departure_date' => 'nullable|date',
            'return_date' => 'nullable|date|after_or_equal:departure_date',
            'passengers' => 'required|integer|min:1|max:10',
            'message' => 'nullable|string|max:2000',
        ]);

        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }

        Booking::create($data);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your booking application has been received successfully! Our team will contact you shortly.',
            ]);
        }

        return redirect()->back()->with('success_booking', 'Your booking application has been received successfully! Our team will contact you shortly.');
    }
}
