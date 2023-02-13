<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status'
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function saleDetails(){
        return $this->hasMany(SaleDetail::class);
    }
}
