<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class NGOServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ngoServices = [
            [
                'name' => 'NGO Registration',
                'slug' => 'ngo-registration',
                'category' => 'NGO',
                'icon' => 'bi-people-fill',
                'icon_color' => '#10b981',
                'short_description' => 'Full registration of Non-Governmental Organizations with complete compliance setup and regulatory requirements.',
                'full_description' => 'We provide comprehensive NGO registration services including documentation preparation, regulatory compliance, and ongoing support for Non-Governmental Organizations operating in Tanzania.',
                'image_url' => null,
                'features' => [
                    'Complete documentation preparation',
                    'Regulatory compliance setup',
                    'Government liaison services',
                    'Ongoing compliance support',
                    'Annual reporting assistance'
                ],
                'cta_text' => 'Register NGO',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'CBO Registration',
                'slug' => 'cbo-registration',
                'category' => 'NGO',
                'icon' => 'bi-house-heart-fill',
                'icon_color' => '#059669',
                'short_description' => 'Registration of Community-Based Organizations for grassroots development and community initiatives.',
                'full_description' => 'We assist in registering Community-Based Organizations (CBOs) for grassroots development projects and community initiatives across Tanzania.',
                'image_url' => null,
                'features' => [
                    'Community organization setup',
                    'Grassroots development planning',
                    'Local government coordination',
                    'Constitution drafting',
                    'Membership structure design'
                ],
                'cta_text' => 'Register CBO',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'CSO Registration',
                'slug' => 'cso-registration',
                'category' => 'NGO',
                'icon' => 'bi-globe2',
                'icon_color' => '#047857',
                'short_description' => 'Registration of Civil Society Organizations for advocacy, civic engagement, and social development.',
                'full_description' => 'We help register Civil Society Organizations (CSOs) focused on advocacy, civic engagement, and social development initiatives.',
                'image_url' => null,
                'features' => [
                    'Advocacy organization setup',
                    'Civic engagement planning',
                    'Social development frameworks',
                    'Stakeholder engagement strategies',
                    'Policy influence support'
                ],
                'cta_text' => 'Register CSO',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Charity Registration',
                'slug' => 'charity-registration',
                'category' => 'NGO',
                'icon' => 'bi-heart-fill',
                'icon_color' => '#0d9488',
                'short_description' => 'Registration of charitable organizations for philanthropic activities and social welfare programs.',
                'full_description' => 'We provide charity registration services for organizations focused on philanthropic activities and social welfare programs.',
                'image_url' => null,
                'features' => [
                    'Charitable organization setup',
                    'Philanthropic program design',
                    'Social welfare compliance',
                    'Donation management systems',
                    'Beneficiary tracking frameworks'
                ],
                'cta_text' => 'Register Charity',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Foundation Registration',
                'slug' => 'foundation-registration',
                'category' => 'NGO',
                'icon' => 'bi-building-exclamation',
                'icon_color' => '#0f766e',
                'short_description' => 'Registration of foundations for grant-making, charitable endowments, and institutional philanthropy.',
                'full_description' => 'We assist in registering foundations for grant-making activities, charitable endowments, and institutional philanthropy programs.',
                'image_url' => null,
                'features' => [
                    'Foundation establishment',
                    'Grant-making framework design',
                    'Endowment management setup',
                    'Institutional philanthropy planning',
                    'Governance structure development'
                ],
                'cta_text' => 'Register Foundation',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Society Registration',
                'slug' => 'society-registration',
                'category' => 'NGO',
                'icon' => 'bi-people',
                'icon_color' => '#115e59',
                'short_description' => 'Registration of societies and membership organizations for cultural, educational, and recreational purposes.',
                'full_description' => 'We register societies and membership organizations for cultural, educational, and recreational purposes with proper legal frameworks.',
                'image_url' => null,
                'features' => [
                    'Society establishment',
                    'Membership structure design',
                    'Cultural organization setup',
                    'Educational institution registration',
                    'Recreational club formation'
                ],
                'cta_text' => 'Register Society',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Trust Registration',
                'slug' => 'trust-registration',
                'category' => 'NGO',
                'icon' => 'bi-shield-lock-fill',
                'icon_color' => '#065f46',
                'short_description' => 'Registration of trusts for asset protection, estate planning, and fiduciary management.',
                'full_description' => 'We provide trust registration services for asset protection, estate planning, and professional fiduciary management.',
                'image_url' => null,
                'features' => [
                    'Trust establishment',
                    'Asset protection planning',
                    'Estate planning frameworks',
                    'Fiduciary management setup',
                    'Beneficiary designation services'
                ],
                'cta_text' => 'Register Trust',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($ngoServices as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        $this->command->info('NGO services seeded successfully.');
    }
}
