<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Provider extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'ruc_number', 'address', 'phone'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
