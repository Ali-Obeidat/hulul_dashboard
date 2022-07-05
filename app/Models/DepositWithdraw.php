<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositWithdraw extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function realAccount()
    {
        return $this->belongsTo(MtHulul::class);
    }
}
