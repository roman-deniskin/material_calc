<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'unit', 'unitPrice',
    ];
    
}
