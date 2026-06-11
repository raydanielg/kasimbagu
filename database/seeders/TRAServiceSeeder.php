<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class TRAServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $traServices = [
            [
                'name' => 'TIN Registration',
                'slug' => 'tin-registration',
                'category' => 'legal',
                'icon' => 'bi-receipt',
                'icon_color' => '#fb923c',
                'short_description' => 'Registration of Tax Identification Number (TIN) with Tanzania Revenue Authority for individuals and businesses.',
                'full_description' => 'We provide TIN registration services with Tanzania Revenue Authority for both individuals and businesses, ensuring proper tax compliance from the start.',
                'image_url' => null,
                'features' => [
                    'Individual TIN registration',
                    'Business TIN registration',
                    'Documentation preparation',
                    'TRA liaison services',
                    'Certificate issuance support'
                ],
                'cta_text' => 'Get TIN',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'VAT Registration',
                'slug' => 'vat-registration',
                'category' => 'legal',
                'icon' => 'bi-percent',
                'icon_color' => '#f472b6',
                'short_description' => 'Registration of Value Added Tax Number (VAT) for businesses meeting TRA threshold requirements.',
                'full_description' => 'We assist businesses in registering for VAT with TRA when they meet the threshold requirements, ensuring full compliance with tax regulations.',
                'image_url' => null,
                'features' => [
                    'VAT eligibility assessment',
                    'Application preparation',
                    'Threshold compliance verification',
                    'VAT certificate issuance',
                    'Ongoing VAT compliance support'
                ],
                'cta_text' => 'Register VAT',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Tax Returns Filing',
                'slug' => 'tax-returns-filing',
                'category' => 'legal',
                'icon' => 'bi-file-earmark-text',
                'icon_color' => '#a78bfa',
                'short_description' => 'Professional tax returns filing services for corporate and individual taxpayers with TRA compliance.',
                'full_description' => 'We provide professional tax returns filing services for both corporate and individual taxpayers, ensuring full TRA compliance and timely submissions.',
                'image_url' => null,
                'features' => [
                    'Corporate tax returns',
                    'Individual tax returns',
                    'Quarterly filing support',
                    'Annual tax preparation',
                    'Compliance verification'
                ],
                'cta_text' => 'File Returns',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Tax Advisory',
                'slug' => 'tax-advisory',
                'category' => 'legal',
                'icon' => 'bi-cash-coin',
                'icon_color' => '#60a5fa',
                'short_description' => 'Strategic tax planning, consultation, and advisory services for optimal tax compliance and efficiency.',
                'full_description' => 'We offer strategic tax planning, consultation, and advisory services to help businesses and individuals achieve optimal tax compliance and efficiency.',
                'image_url' => null,
                'features' => [
                    'Tax planning strategies',
                    'Compliance consultation',
                    'Tax optimization advice',
                    'Risk assessment',
                    'Strategic tax structuring'
                ],
                'cta_text' => 'Get Advisory',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Tax Compliance Audit',
                'slug' => 'tax-compliance-audit',
                'category' => 'legal',
                'icon' => 'bi-shield-check',
                'icon_color' => '#34d399',
                'short_description' => 'Comprehensive tax compliance audits to ensure full adherence to TRA regulations and requirements.',
                'full_description' => 'We conduct comprehensive tax compliance audits to ensure your business maintains full adherence to all TRA regulations and requirements.',
                'image_url' => null,
                'features' => [
                    'Comprehensive compliance review',
                    'Regulatory gap analysis',
                    'Risk identification',
                    'Corrective action planning',
                    'Ongoing monitoring support'
                ],
                'cta_text' => 'Request Audit',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Tax Dispute Resolution',
                'slug' => 'tax-dispute-resolution',
                'category' => 'legal',
                'icon' => 'bi-graph-up',
                'icon_color' => '#f87171',
                'short_description' => 'Expert representation and resolution services for tax disputes, assessments, and negotiations with TRA.',
                'full_description' => 'We provide expert representation and resolution services for tax disputes, assessments, and negotiations with Tanzania Revenue Authority.',
                'image_url' => null,
                'features' => [
                    'Dispute representation',
                    'Assessment review support',
                    'TRA negotiation services',
                    'Appeal preparation',
                    'Settlement facilitation'
                ],
                'cta_text' => 'Resolve Dispute',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($traServices as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        $this->command->info('TRA services seeded successfully.');
    }
}
