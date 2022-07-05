<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MtHulul extends Model
{
    use SoftDeletes;
    protected  $guarded = [];
    use HasFactory;
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }
    public function RealAccountRequest()
    {
        return $this->hasMany(RealAccountRequest::class);
    }
    public function DepositWithdraw()
    {
        return $this->hasMany(DepositWithdraw::class);
    }
}
