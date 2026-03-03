<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Courses', 'color' => '#10b981', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loyer', 'color' => '#6366f1', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Électricité', 'color' => '#f59e0b', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Internet', 'color' => '#3b82f6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eau', 'color' => '#06b6d4', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gaz', 'color' => '#ef4444', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Téléphone', 'color' => '#8b5cf6', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transports', 'color' => '#ec4899', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Loisirs', 'color' => '#f97316', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autre', 'color' => '#64748b', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}