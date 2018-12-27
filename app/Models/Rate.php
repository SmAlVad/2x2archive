<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rate
 * @package App\Models
 */
class Rate extends Model
{
    protected $fillable = ['name', 'time', 'price'];

    public function keys()
    {
        return $this->hasMany('App\Models\Key');
    }
}

