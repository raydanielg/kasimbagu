<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class LegalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $legalServices = [
            [
                'name' => 'Aviation Law',
                'slug' => 'aviation-law',
                'category' => 'legal',
                'icon' => 'bi-airplane',
                'icon_color' => '#c9993a',
                'short_description' => 'Regulatory compliance, aircraft registration, leasing agreements, and aviation industry legal advisory.',
                'full_description' => 'We provide comprehensive aviation law services including regulatory compliance, aircraft registration, leasing agreements, and aviation industry legal advisory for airlines and aviation companies.',
                'image_url' => null,
                'features' => [
                    'Aircraft registration',
                    'Regulatory compliance',
                    'Leasing agreements',
                    'Aviation industry advisory',
                    'Airline legal support'
                ],
                'cta_text' => 'Get Aviation Legal Help',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Banking & Finance Law',
                'slug' => 'banking-finance-law',
                'category' => 'legal',
                'icon' => 'bi-bank',
                'icon_color' => '#c9993a',
                'short_description' => 'Banking regulations, financial compliance, loan agreements, and financial institution legal support.',
                'full_description' => 'We offer specialized banking and finance law services including regulatory compliance, loan agreements, financial institution support, and banking transaction legal advisory.',
                'image_url' => null,
                'features' => [
                    'Banking regulatory compliance',
                    'Financial institution support',
                    'Loan agreement drafting',
                    'Banking transaction advisory',
                    'Financial compliance'
                ],
                'cta_text' => 'Get Banking Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Corporate & Commercial Law',
                'slug' => 'corporate-commercial-law',
                'category' => 'legal',
                'icon' => 'bi-building',
                'icon_color' => '#c9993a',
                'short_description' => 'Corporate governance, commercial contracts, mergers & acquisitions, and business transactions.',
                'full_description' => 'We provide corporate and commercial law services including corporate governance, commercial contracts, mergers & acquisitions, and business transaction legal support.',
                'image_url' => null,
                'features' => [
                    'Corporate governance',
                    'Commercial contracts',
                    'Mergers & acquisitions',
                    'Business transactions',
                    'Corporate advisory'
                ],
                'cta_text' => 'Get Corporate Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Litigation & Dispute Resolution',
                'slug' => 'litigation-dispute-resolution',
                'category' => 'legal',
                'icon' => 'bi-gavel',
                'icon_color' => '#c9993a',
                'short_description' => 'Court representation, dispute resolution, mediation, and arbitration services.',
                'full_description' => 'We offer comprehensive litigation and dispute resolution services including court representation, mediation, arbitration, and alternative dispute resolution.',
                'image_url' => null,
                'features' => [
                    'Court representation',
                    'Dispute resolution',
                    'Mediation services',
                    'Arbitration',
                    'Alternative dispute resolution'
                ],
                'cta_text' => 'Get Litigation Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Mining & Natural Resources Law',
                'slug' => 'mining-natural-resources-law',
                'category' => 'legal',
                'icon' => 'bi-gem',
                'icon_color' => '#c9993a',
                'short_description' => 'Mining licenses, environmental compliance, natural resource contracts, and regulatory advisory.',
                'full_description' => 'We provide mining and natural resources law services including mining licenses, environmental compliance, natural resource contracts, and regulatory advisory for mining companies.',
                'image_url' => null,
                'features' => [
                    'Mining licenses',
                    'Environmental compliance',
                    'Natural resource contracts',
                    'Mining regulatory advisory',
                    'Resource extraction legal support'
                ],
                'cta_text' => 'Get Mining Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Oil & Gas Law',
                'slug' => 'oil-gas-law',
                'category' => 'legal',
                'icon' => 'bi-fuel-pump',
                'icon_color' => '#c9993a',
                'short_description' => 'Petroleum licenses, oil & gas contracts, regulatory compliance, and energy sector legal support.',
                'full_description' => 'We offer oil and gas law services including petroleum licenses, oil & gas contracts, regulatory compliance, and energy sector legal support for petroleum companies.',
                'image_url' => null,
                'features' => [
                    'Petroleum licenses',
                    'Oil & gas contracts',
                    'Energy sector compliance',
                    'Petroleum regulatory advisory',
                    'Energy transaction support'
                ],
                'cta_text' => 'Get Oil & Gas Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Project Finance',
                'slug' => 'project-finance',
                'category' => 'legal',
                'icon' => 'bi-graph-up-arrow',
                'icon_color' => '#c9993a',
                'short_description' => 'Project financing, loan agreements, financial structuring, and investment legal support.',
                'full_description' => 'We provide project finance services including project financing, loan agreements, financial structuring, and investment legal support for large-scale projects.',
                'image_url' => null,
                'features' => [
                    'Project financing',
                    'Loan agreements',
                    'Financial structuring',
                    'Investment legal support',
                    'Project transaction advisory'
                ],
                'cta_text' => 'Get Project Finance Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Real Estate & Property Law',
                'slug' => 'real-estate-property-law',
                'category' => 'legal',
                'icon' => 'bi-house-fill',
                'icon_color' => '#c9993a',
                'short_description' => 'Property transactions, land registration, real estate contracts, and property disputes.',
                'full_description' => 'We offer real estate and property law services including property transactions, land registration, real estate contracts, and property dispute resolution.',
                'image_url' => null,
                'features' => [
                    'Property transactions',
                    'Land registration',
                    'Real estate contracts',
                    'Property disputes',
                    'Real estate advisory'
                ],
                'cta_text' => 'Get Real Estate Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Tax Law',
                'slug' => 'tax-law',
                'category' => 'legal',
                'icon' => 'bi-receipt',
                'icon_color' => '#c9993a',
                'short_description' => 'Tax planning, tax compliance, tax disputes, and revenue authority legal support.',
                'full_description' => 'We provide tax law services including tax planning, tax compliance, tax disputes, and revenue authority legal support for individuals and businesses.',
                'image_url' => null,
                'features' => [
                    'Tax planning',
                    'Tax compliance',
                    'Tax disputes',
                    'Revenue authority support',
                    'Tax advisory'
                ],
                'cta_text' => 'Get Tax Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Telecommunications Law',
                'slug' => 'telecommunications-law',
                'category' => 'legal',
                'icon' => 'bi-wifi',
                'icon_color' => '#c9993a',
                'short_description' => 'Telecom licenses, regulatory compliance, spectrum allocation, and communications law.',
                'full_description' => 'We offer telecommunications law services including telecom licenses, regulatory compliance, spectrum allocation, and communications law for telecom companies.',
                'image_url' => null,
                'features' => [
                    'Telecom licenses',
                    'Regulatory compliance',
                    'Spectrum allocation',
                    'Communications law',
                    'Telecom transaction support'
                ],
                'cta_text' => 'Get Telecom Legal Help',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        foreach ($legalServices as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        $this->command->info('Legal services seeded successfully.');
    }
}
