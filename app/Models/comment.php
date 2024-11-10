<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class comment extends Model
{

    use HasFactory;
    protected $with = ['users'];
    public function users():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
