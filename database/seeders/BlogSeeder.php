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
                'title' => 'Understanding Tanzania\'s New Tax Regulations for 2026',
                'slug' => 'understanding-tanzanias-new-tax-regulations-2026',
                'category' => 'Tax Law',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&q=80',
                'excerpt' => 'A comprehensive guide to the latest tax regulations affecting businesses and individuals in Tanzania, including new compliance requirements and deadlines.',
                'content' => 'The Tanzania Revenue Authority has introduced several new tax regulations for 2026 that businesses and individuals need to be aware of. This article provides a comprehensive overview of these changes...',
                'author' => 'Kasimbagu Legal Team',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'sort_order' => 1,
            ],
            [
                'title' => 'How to Register Your NGO in Tanzania: Complete Guide',
                'slug' => 'how-to-register-your-ngo-in-tanzania-complete-guide',
                'category' => 'NGO Registration',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=600&q=80',
                'excerpt' => 'Step-by-step process for registering Non-Governmental Organizations in Tanzania, including required documents, fees, and timeline.',
                'content' => 'Registering an NGO in Tanzania requires careful preparation and understanding of the regulatory framework. This guide walks you through the entire process...',
                'author' => 'Kasimbagu Consultancy',
                'is_published' => true,
                'published_at' => now()->subDays(14),
                'sort_order' => 2,
            ],
            [
                'title' => 'Company Registration vs. NGO Registration: Key Differences',
                'slug' => 'company-registration-vs-ngo-registration-key-differences',
                'category' => 'Business Law',
                'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80',
                'excerpt' => 'Understanding the key differences between company registration and NGO registration in Tanzania to help you choose the right structure.',
                'content' => 'Choosing between company registration and NGO registration is a critical decision for organizations in Tanzania. This article explores the key differences...',
                'author' => 'Kasimbagu Legal Team',
                'is_published' => true,
                'published_at' => now()->subDays(21),
                'sort_order' => 3,
            ],
            [
                'title' => 'TRA Compliance Checklist for Small Businesses',
                'slug' => 'tra-compliance-checklist-small-businesses',
                'category' => 'Tax Compliance',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=600&q=80',
                'excerpt' => 'Essential tax compliance checklist for small businesses operating in Tanzania to ensure full TRA compliance.',
                'content' => 'Small businesses in Tanzania must navigate various tax compliance requirements. This checklist covers everything you need to know...',
                'author' => 'Kasimbagu Tax Experts',
                'is_published' => true,
                'published_at' => now()->subDays(28),
                'sort_order' => 4,
            ],
            [
                'title' => 'Writing Winning Grant Proposals for NGOs',
                'slug' => 'writing-winning-grant-proposals-ngos',
                'category' => 'Proposal Writing',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80',
                'excerpt' => 'Expert tips and strategies for writing successful grant proposals that secure funding for your NGO projects.',
                'content' => 'Writing a winning grant proposal requires skill, strategy, and understanding of donor expectations. This article provides expert tips...',
                'author' => 'Kasimbagu Research Team',
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
