<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable = ['name', 'owner_id', 'description', 'status'];

    public function membres()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->withPivot('role', 'joined_at', 'left_at');
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}
