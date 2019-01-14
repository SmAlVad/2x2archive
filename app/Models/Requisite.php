<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisite extends Model
{
    protected $fillable = ['user_id', 'recipient', 'inn', 'kpp', 'bank', 'account', 'bik', 'ks', 'address', 'phone'];
}
