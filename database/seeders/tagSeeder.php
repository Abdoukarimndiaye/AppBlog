<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\tag;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['fantastique','horreur','humour','amour','action','romance']);
        $tags->each(fn($tag)=>tag::create([
            'name'=>$tag,
            'slug'=>str::slug($tag),
        ]));
    }
}
