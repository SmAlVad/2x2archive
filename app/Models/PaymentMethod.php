<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 * @package App\Models
 */
class PaymentMethod extends Model
{
    protected $fillable = ['name', 'robokassa', 'image', 'on_off'];
}
