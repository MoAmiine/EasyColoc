<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    protected $fillable = ['colocation_id', 'email', 'token', 'expires_at', 'accepted_at'];
    
    protected $casts = [
        'expires_at' => 'datetime',
        'accepted_at' => 'datetime',
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($invitation) {
            $invitation->token = Str::random(32);
            $invitation->expires_at = now()->addDays(7);
        });
    }

        public function isValid(): bool
    {
        return $this->accepted_at === null 
            && $this->expires_at->isFuture();
    }
}