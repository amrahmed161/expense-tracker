<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $categories = [
            ['name' => 'طعام ومشروبات', 'icon' => 'fas fa-utensils',     'color' => '#FF6B6B'],
            ['name' => 'مواصلات',        'icon' => 'fas fa-car',           'color' => '#4ECDC4'],
            ['name' => 'فواتير',         'icon' => 'fas fa-file-invoice',  'color' => '#45B7D1'],
            ['name' => 'ترفيه',          'icon' => 'fas fa-gamepad',       'color' => '#96CEB4'],
            ['name' => 'ملابس',          'icon' => 'fas fa-tshirt',        'color' => '#FFEAA7'],
            ['name' => 'صحة وطب',        'icon' => 'fas fa-heartbeat',     'color' => '#DDA0DD'],
            ['name' => 'تعليم',          'icon' => 'fas fa-graduation-cap','color' => '#98D8C8'],
            ['name' => 'أخرى',           'icon' => 'fas fa-ellipsis-h',    'color' => '#B0BEC5'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
