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
            'Music Concerts',
            'Theater Shows',
            'Sporting Events',
            'Comedy Shows',
            'Arts & Culture',
            'Festivals & Fairs',
            'Family & Kids Events',
            'Food & Drink Events',
            'Workshops & Classes',
            'Charity & Fundraising Events',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
