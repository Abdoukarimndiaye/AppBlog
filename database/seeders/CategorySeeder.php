<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(['A la une','Actualité','Politiquee','Internationnal','Èconomie','People','Société','Sport']);
        $categories->each(fn($category)=>category::create([
            'name'=>$category,
            'slug'=>str::slug($category),
        ]));
    }
}
