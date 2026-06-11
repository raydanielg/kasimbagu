<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => 'The Great Migration: A Once-in-a-Lifetime Experience',
                'slug' => 'great-migration-once-in-a-lifetime-experience',
                'category' => 'Safari',
                'image' => 'https://images.unsplash.com/photo-1516426122078-c23e76319801?w=600&q=80',
                'excerpt' => 'Witness millions of wildebeest and zebras crossing the Serengeti plains in one of nature\'s most spectacular events. Learn the best times and locations to experience this incredible journey.',
                'content' => 'The Great Migration is one of the most awe-inspiring natural spectacles on Earth. Over 1.5 million wildebeest, 200,000 zebras, and numerous gazelles make this annual journey across the Serengeti ecosystem...',
                'author' => 'Kasimbagu Travel Team',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'sort_order' => 1,
            ],
            [
                'title' => 'Climbing Mount Kilimanjaro: A Complete Guide',
                'slug' => 'climbing-mount-kilimanjaro-complete-guide',
                'category' => 'Adventure',
                'image' => 'https://images.unsplash.com/photo-1609766857071-0e0b3a9f4c19?w=600&q=80',
                'excerpt' => 'Everything you need to know about climbing Africa\'s highest peak. From choosing the right route to essential packing tips, prepare for your Kilimanjaro adventure.',
                'content' => 'Mount Kilimanjaro stands as Africa\'s highest peak and the world\'s tallest free-standing mountain. At 5,895 meters above sea level, it offers climbers a journey through five distinct climate zones...',
                'author' => 'Kasimbagu Travel Experts',
                'is_published' => true,
                'published_at' => now()->subDays(14),
                'sort_order' => 2,
            ],
            [
                'title' => 'Zanzibar: The Spice Island Paradise',
                'slug' => 'zanzibar-spice-island-paradise',
                'category' => 'Beach',
                'image' => 'https://images.unsplash.com/photo-1519681393784-d120267933ba?w=600&q=80',
                'excerpt' => 'Discover the magic of Zanzibar with its pristine beaches, rich Swahili culture, and historic Stone Town. Your ultimate guide to Tanzania\'s most beautiful island.',
                'content' => 'Zanzibar, known as the Spice Island, offers a perfect blend of stunning beaches, rich history, and vibrant culture. From the winding streets of Stone Town to the crystal-clear waters of its beaches...',
                'author' => 'Kasimbagu Travel Team',
                'is_published' => true,
                'published_at' => now()->subDays(21),
                'sort_order' => 3,
            ],
            [
                'title' => 'Ngorongoro Crater: The World\'s Natural Wonder',
                'slug' => 'ngorongoro-crater-worlds-natural-wonder',
                'category' => 'Wildlife',
                'image' => 'https://images.unsplash.com/photo-1547970810-dc1eac37d174?w=600&q=80',
                'excerpt' => 'Explore the world\'s largest volcanic caldera and its incredible wildlife density. Home to the Big Five and rare black rhinos, Ngorongoro is a must-visit destination.',
                'content' => 'The Ngorongoro Crater is often called the "Eighth Wonder of the World." This massive volcanic caldera spans 260 square kilometers and hosts an incredible density of wildlife...',
                'author' => 'Kasimbagu Travel Experts',
                'is_published' => true,
                'published_at' => now()->subDays(28),
                'sort_order' => 4,
            ],
            [
                'title' => 'Hidden Gems: Tanzania\'s Lesser-Known National Parks',
                'slug' => 'hidden-gems-tanzania-lesser-known-national-parks',
                'category' => 'Wildlife',
                'image' => 'https://images.unsplash.com/photo-1549366021-9f761d450615?w=600&q=80',
                'excerpt' => 'Beyond Serengeti and Ngorongoro, discover Tanzania\'s hidden treasures. From Selous to Ruaha, explore pristine wilderness away from the crowds.',
                'content' => 'While Serengeti and Ngorongoro draw the most visitors, Tanzania is home to numerous spectacular national parks that offer incredible wildlife experiences without the crowds...',
                'author' => 'Kasimbagu Travel Team',
                'is_published' => true,
                'published_at' => now()->subDays(35),
                'sort_order' => 5,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(
                ['slug' => $blog['slug']],
                $blog
            );
        }

        $this->command->info('Blogs seeded successfully.');
    }
}
