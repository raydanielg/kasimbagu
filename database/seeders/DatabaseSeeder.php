<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PageSeeder::class);
        $this->call(LegalServiceSeeder::class);
        $this->call(ResearchServiceSeeder::class);
        $this->call(CompanyServiceSeeder::class);
        $this->call(NGOServiceSeeder::class);
        $this->call(TRAServiceSeeder::class);
    }
}
