<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    use Likeable;
    
    protected $guarded=['id','created_at','updated_at'];
    protected $with = [
        'category',
        'tags',
    ];
    public function scopefilters(Builder $query ,array $filters){
        if(isset($filters['search'])){
        $query->where(fn(Builder $query)=>   
        $query->where('title','LIKE','%'.$filters['search'].'%')
        ->orWhere('content','LIKE','%'.$filters['search'].'%')
        );
        }
        if(isset($filters['category'])){
            $query->where('category_id',$filters['category']->id ?? $filters['category']);
        }
        if(isset($filters['tag'])){
            $query->whereRelation('tags','tags.id',$filters['tag']->id) ?? $filters['tag'];
         
             
         }
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function category():BelongsTo{
        return $this->belongsTo(category::class);
    }
    public function tags():BelongsToMany{
        return $this->belongsToMany(tag::class);
    }
    public function comments():HasMany{
        return $this->hasMany(comment::class)->latest();
        
    }
  
}
