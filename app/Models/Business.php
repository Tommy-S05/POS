<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'email',
        'address',
        'ruc_number',
        'phone'
    ];
}
