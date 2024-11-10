<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\category;
use App\Models\tag;
use App\Models\User;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories  = category::all();
        $tags = tag::all();
        $users = User::all();
        Article::factory(20)
        ->sequence(fn()=>[
            'category_id'=>$categories->random(),
        ])
        ->hascomments(5, fn()=>['users_id'=>$users->random()])
        ->create()
        ->each(function($article){
            $tags = tag::all()->random(rand(0,3));
            $article->tags()->attach($tags);

        });
    }
}
