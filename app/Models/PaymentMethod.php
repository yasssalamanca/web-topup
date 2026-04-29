<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'fee' => 'integer',
        'is_active' => 'boolean',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
