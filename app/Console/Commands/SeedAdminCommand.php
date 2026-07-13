<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\AdminUserSeeder;

class SeedAdminCommand extends Command
{
    protected $signature = 'seed:admin';

    protected $description = 'Seed only the admin user into the database';

    public function handle(): int
    {
        $this->info('Seeding admin user...');

        $seeder = new AdminUserSeeder();
        $seeder->setCommand($this);
        $seeder->run();

        $this->info('Admin user seeded successfully.');

        return Command::SUCCESS;
    }
}
