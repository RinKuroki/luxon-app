<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\SelectionDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ServicePlanTableSeeder::class,
            MentorsTableSeeder::class,
            UsersTableSeeder::class,
            SelectionStatusTableSeeder::class,
            IndustriesTableSeeder::class,
            CompaniesTableSeeder::class,
            SelectionPhaseTableSeeder::class,
            SelectionDetailTableSeeder::class,
            EventTableSeeder::class,
            EventParticipateTableSeeder::class,
            CaseTableSeeder::class,
            EsTableSeeder::class,
            UserDetailTableSeeder::class,
        ]);
    }
}
