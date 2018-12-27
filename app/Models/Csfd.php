<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Csfd
 * @package App\Models
 */
class Csfd extends Model
{
    protected $fillable = [
        'csfd_id',
        'region',
        'city',
        'cat1',
        'cat2',
        'cat3',
        'title',
        'body',
        'tags',
        'price',
        'tel',
        'email',
        'name',
        'date_start',
        'date_end',
        'image',
        'params'
    ];

    /**
     * Принимает массив параметров из json файла с обьявлениями и возвращает строку вида
     * 'key:value|key2:value2'
     * Так-как проект не планировали развиать(!) формат возвращаемой строки задан жестко
     *
     * @param object $params
     * @return string
     */
    public function makeStrParams($params) : string
    {
       $result = '';
       foreach ($params as $param) {
           if ($param->title !== '' && $param->value !== '' && $param->value != 0)
            $result .= "{$param->title}:{$param->value}|";
       }

       return substr($result,0,-1);
    }
}
