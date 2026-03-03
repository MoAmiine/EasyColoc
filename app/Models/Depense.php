<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = ['colocation_id', 'user_id', 'category_id', 'title', 'amount', 'spent_at'];

    protected $casts = [
        'spent_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payeur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
