<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ResearchServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researchServices = [
            [
                'name' => 'Research Writing',
                'slug' => 'research-writing',
                'category' => 'research',
                'icon' => 'bi-pencil-square',
                'icon_color' => '#2dd4bf',
                'short_description' => 'Academic research writing, thesis development, dissertation support, and scholarly publication assistance.',
                'full_description' => 'We provide comprehensive research writing services including academic research writing, thesis development, dissertation support, and scholarly publication assistance for students and researchers.',
                'image_url' => null,
                'features' => [
                    'Academic research writing',
                    'Thesis development',
                    'Dissertation support',
                    'Scholarly publication',
                    'Research methodology'
                ],
                'cta_text' => 'Get Research Writing Help',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Proposal Writing',
                'slug' => 'proposal-writing',
                'category' => 'research',
                'icon' => 'bi-file-earmark-text',
                'icon_color' => '#2dd4bf',
                'short_description' => 'Grant proposals, project proposals, funding applications, and donor proposal development.',
                'full_description' => 'We offer proposal writing services including grant proposals, project proposals, funding applications, and donor proposal development for NGOs and organizations.',
                'image_url' => null,
                'features' => [
                    'Grant proposals',
                    'Project proposals',
                    'Funding applications',
                    'Donor proposals',
                    'Budget development'
                ],
                'cta_text' => 'Get Proposal Writing Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Business Plan Development',
                'slug' => 'business-plan-development',
                'category' => 'research',
                'icon' => 'bi-diagram-3',
                'icon_color' => '#2dd4bf',
                'short_description' => 'Business plan writing, financial projections, market analysis, and startup documentation.',
                'full_description' => 'We provide business plan development services including business plan writing, financial projections, market analysis, and startup documentation for entrepreneurs.',
                'image_url' => null,
                'features' => [
                    'Business plan writing',
                    'Financial projections',
                    'Market analysis',
                    'Startup documentation',
                    'Investor pitch decks'
                ],
                'cta_text' => 'Get Business Plan Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Concept Note Development',
                'slug' => 'concept-note-development',
                'category' => 'research',
                'icon' => 'bi-lightbulb',
                'icon_color' => '#2dd4bf',
                'short_description' => 'Concept notes, project concepts, development frameworks, and initial project documentation.',
                'full_description' => 'We offer concept note development services including concept notes, project concepts, development frameworks, and initial project documentation for development projects.',
                'image_url' => null,
                'features' => [
                    'Concept notes',
                    'Project concepts',
                    'Development frameworks',
                    'Initial documentation',
                    'Project scoping'
                ],
                'cta_text' => 'Get Concept Note Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($researchServices as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        $this->command->info('Research services seeded successfully.');
    }
}
