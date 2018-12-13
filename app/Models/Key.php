<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = ['key', 'rate_id', 'user_id', 'active', 'created_by'];

    public function rate()
    {
        return $this->belongsTo('\App\Models\Rate', 'rate_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }

    /**
     * Проверяет существавоние ключа
     *
     * @param int $key
     * @return bool
     */
    public function keyExist(int $key)
    {
        $exist = Key::where('key', $key)->first();

        if ($exist) {
            return true;
        }

        return false;
    }

    /**
     * Генерирует случайное 12-ти значное число, которое будет ключом
     *
     * @return string
     */
    public function generateKey()
    {
        $code = '';

        for ($i = 0; $i < 3; $i++) {
            $code .= mt_rand(0, 9) . mt_rand(0, 9) . mt_rand(0, 9) . mt_rand(0, 9);
        }

        return $code;
    }
}
