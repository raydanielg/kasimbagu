<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Tax Compliance Workshop for Small Businesses',
                'slug' => 'tax-compliance-workshop-small-businesses',
                'description' => 'Join our comprehensive workshop on TRA tax compliance requirements for small businesses. Learn about TIN registration, VAT compliance, tax returns filing, and more.',
                'location' => 'Dar es Salaam, Tanzania',
                'google_maps_link' => null,
                'event_date' => now()->addDays(30),
                'event_time' => '09:00 AM - 04:00 PM',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&q=80',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'NGO Registration Seminar',
                'slug' => 'ngo-registration-seminar',
                'description' => 'Learn the complete process of registering NGOs in Tanzania. This seminar covers documentation, regulatory requirements, and compliance setup for Non-Governmental Organizations.',
                'location' => 'Moshi, Kilimanjaro',
                'google_maps_link' => null,
                'event_date' => now()->addDays(45),
                'event_time' => '10:00 AM - 03:00 PM',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&q=80',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Business Plan Development Training',
                'slug' => 'business-plan-development-training',
                'description' => 'Hands-on training for entrepreneurs and business owners on developing professional business plans. Learn financial projections, market analysis, and investor pitch deck creation.',
                'location' => 'Dar es Salaam, Tanzania',
                'google_maps_link' => null,
                'event_date' => now()->addDays(60),
                'event_time' => '09:00 AM - 05:00 PM',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Legal Advisory Networking Event',
                'slug' => 'legal-advisory-networking-event',
                'description' => 'Connect with legal professionals, business leaders, and consultants at our networking event. Share insights, build partnerships, and explore collaboration opportunities.',
                'location' => 'Dar es Salaam, Tanzania',
                'google_maps_link' => null,
                'event_date' => now()->addDays(75),
                'event_time' => '05:00 PM - 08:00 PM',
                'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?w=600&q=80',
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Grant Writing Masterclass',
                'slug' => 'grant-writing-masterclass',
                'description' => 'Advanced grant writing techniques for NGOs and development organizations. Learn how to craft compelling proposals that secure funding from international donors.',
                'location' => 'Moshi, Kilimanjaro',
                'google_maps_link' => null,
                'event_date' => now()->addDays(90),
                'event_time' => '09:00 AM - 04:00 PM',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80',
                'is_published' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['slug' => $event['slug']],
                $event
            );
        }

        $this->command->info('Events seeded successfully.');
    }
}
