<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceTransfer extends Model
{
    use HasFactory;

    protected  $guarded = [];
    public function account()
    {
        return $this->belongsTo(MtHulul::class);
    }
}
