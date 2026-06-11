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
                'title' => 'Understanding BRELA Company Registration in Tanzania',
                'slug' => 'understanding-brela-company-registration-tanzania',
                'category' => 'Business',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80',
                'excerpt' => 'A comprehensive guide to company registration with BRELA in Tanzania. Learn about requirements, procedures, and timelines for starting your business legally.',
                'content' => 'Starting a business in Tanzania requires proper registration with the Business Registrations and Licensing Agency (BRELA). This process involves several steps including name reservation, incorporation, and obtaining necessary licenses...',
                'author' => 'Kasimbagu Consultancy Team',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'sort_order' => 1,
            ],
            [
                'title' => 'NGO Registration Requirements in Tanzania',
                'slug' => 'ngo-registration-requirements-tanzania',
                'category' => 'NGO',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&q=80',
                'excerpt' => 'Everything you need to know about registering NGOs, CBOs, and CSOs in Tanzania. Complete compliance guide for non-profit organizations.',
                'content' => 'Non-Governmental Organizations play a crucial role in Tanzania\'s development. Registration with the NGO Coordination Unit is mandatory for legal operation. This guide covers all requirements from constitution drafting to compliance...',
                'author' => 'Kasimbagu Legal Experts',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'sort_order' => 2,
            ],
            [
                'title' => 'Tax Compliance Guide for Tanzanian Businesses',
                'slug' => 'tax-compliance-guide-tanzanian-businesses',
                'category' => 'Tax',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&q=80',
                'excerpt' => 'Essential tax compliance information for businesses operating in Tanzania. TIN registration, VAT, SDL, PAYE, and TRA requirements explained.',
                'content' => 'Tax compliance is critical for business success in Tanzania. This guide covers TIN registration, VAT requirements, SDL and PAYE filing, tax assessments, and how to avoid penalties with Tanzania Revenue Authority...',
                'author' => 'Kasimbagu Tax Consultants',
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'sort_order' => 3,
            ],
            [
                'title' => 'Legal Requirements for SACCOS Registration',
                'slug' => 'legal-requirements-saccos-registration-tanzania',
                'category' => 'Consultancy',
                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&q=80',
                'excerpt' => 'Complete guide to registering SACCOS and microfinance institutions in Tanzania. Regulatory requirements and compliance procedures.',
                'content' => 'SACCOS and microfinance institutions are vital for financial inclusion in Tanzania. Registration requires compliance with multiple regulatory bodies including the Ministry of Finance and Bank of Tanzania...',
                'author' => 'Kasimbagu Consultancy Team',
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'sort_order' => 4,
            ],
            [
                'title' => 'Research Proposal Writing for Funding Success',
                'slug' => 'research-proposal-writing-funding-success',
                'category' => 'Research',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80',
                'excerpt' => 'Expert tips for writing winning research proposals and concept notes. How to secure funding for your research projects and academic initiatives.',
                'content' => 'Writing successful research proposals requires a clear understanding of funding requirements and donor expectations. This guide covers proposal structure, methodology development, budget preparation, and how to make your proposal stand out...',
                'author' => 'Kasimbagu Research Team',
                'is_published' => true,
                'published_at' => now()->subDays(25),
                'sort_order' => 5,
            ],
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
                'sort_order' => 6,
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
                'sort_order' => 7,
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
                'sort_order' => 8,
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
                'sort_order' => 9,
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
                'sort_order' => 10,
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
