<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // adnali sme Model::unguard(); v app/Providers/AppServiceProvider.php, zatova ne ni trqbva
    // protected $fillable  = ['title', 'tags', 'company', 'location', 'email', 'website', 'description'];

    public function scopeFilter($query, array $filters)
    {
        //dd($filters['tag']);
        if ($filters['tag'] ?? false) {
            // pravi Where tags LIKE "%$_GET['tag']%"
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            // where title, description or tags LIKE '%$_GET['search']%'
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User, type = belongs to
    public function user()
    {
        // job post prinadlejat na USER, kato v DB se posochva poleto
        return $this->belongsTo(User::class, 'user_id');
    }


}
