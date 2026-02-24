<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['debtor_id', 'creditor_id', 'colocation_id', 'amount', 'is_paid'];

    public function debiteur()
    {
        return $this->belongsTo(User::class, 'debtor_id');
    }

    public function crediteur()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }
}
