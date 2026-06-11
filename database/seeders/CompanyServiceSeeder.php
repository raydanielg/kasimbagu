<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class CompanyServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyServices = [
            [
                'name' => 'Company Registration',
                'slug' => 'company-registration',
                'category' => 'registration',
                'icon' => 'bi-building-fill',
                'icon_color' => '#60a5fa',
                'short_description' => 'BRELA company registration, business name reservation, and incorporation services.',
                'full_description' => 'We provide comprehensive company registration services including BRELA company registration, business name reservation, and incorporation services for all types of companies.',
                'image_url' => null,
                'features' => [
                    'BRELA registration',
                    'Business name reservation',
                    'Company incorporation',
                    'Certificate of incorporation',
                    'Memorandum & articles'
                ],
                'cta_text' => 'Register Company',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Organizational Structuring',
                'slug' => 'organizational-structuring',
                'category' => 'company',
                'icon' => 'bi-diagram-3',
                'icon_color' => '#60a5fa',
                'short_description' => 'Corporate structure design, organizational hierarchy, and governance framework development.',
                'full_description' => 'We offer organizational structuring services including corporate structure design, organizational hierarchy, and governance framework development for businesses.',
                'image_url' => null,
                'features' => [
                    'Corporate structure design',
                    'Organizational hierarchy',
                    'Governance frameworks',
                    'Board composition',
                    'Management structure'
                ],
                'cta_text' => 'Get Structuring Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Construction Company Registration',
                'slug' => 'construction-company-registration',
                'category' => 'company',
                'icon' => 'bi-building-gear',
                'icon_color' => '#60a5fa',
                'short_description' => 'Construction company registration, contractor licensing, and building permits.',
                'full_description' => 'We provide construction company registration services including contractor licensing, building permits, and construction industry compliance.',
                'image_url' => null,
                'features' => [
                    'Construction registration',
                    'Contractor licensing',
                    'Building permits',
                    'Construction compliance',
                    'Industry certifications'
                ],
                'cta_text' => 'Register Construction Company',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Microfinance Institution Registration',
                'slug' => 'microfinance-institution-registration',
                'category' => 'company',
                'icon' => 'bi-bank2',
                'icon_color' => '#60a5fa',
                'short_description' => 'Microfinance institution licensing, financial services registration, and regulatory compliance.',
                'full_description' => 'We offer microfinance institution registration services including licensing, financial services registration, and regulatory compliance for microfinance institutions.',
                'image_url' => null,
                'features' => [
                    'Microfinance licensing',
                    'Financial services registration',
                    'Regulatory compliance',
                    'Bank of Tanzania requirements',
                    'Financial institution setup'
                ],
                'cta_text' => 'Register Microfinance Institution',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($companyServices as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        $this->command->info('Company services seeded successfully.');
    }
}
