<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function colocations()
    {
        return $this->belongsToMany(Colocation::class, 'memberships')
            ->withPivot('role', 'joined_at', 'left_at');
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

    public function isAdmin(): bool
    {
        return $this->is_admin === 1 || $this->is_admin === true;
    }
    public function owner(){
        return $this->hasMany(Colocation::class);
    }

    public function aToutPayeDans(Colocation $colocation): bool
{
    $depensesDesAutres = $colocation->depenses()->where('user_id', '!=', $this->id)->get();

    foreach ($depensesDesAutres as $depense) {
        if (!\App\Http\Controllers\PaiementController::hasPaid($this, $depense)) {
            return false;
        }
    }

    return true;
}

    
}
