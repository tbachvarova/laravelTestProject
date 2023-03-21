<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        //dd($filters['tag']);
        if($filters['tag'] ?? false){
            // pravi Where tags LIKE "%$_GET['tag']%"
            $query->where('tags', 'like', '%'.request('tag').'%');
        }

    }
}
