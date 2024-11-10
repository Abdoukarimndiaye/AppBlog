<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Article;

class category extends Model
{
    use HasFactory;
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
   public function articles():HasMany{
    return $this->hasMany(Article::class);
   }
}
