<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name', 'owner_id', 'description', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->withPivot('role', 'joined_at', 'left_at')
            ->withTimestamps();
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }
}
