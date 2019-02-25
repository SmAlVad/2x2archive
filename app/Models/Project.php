<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App\Models
 */
class Project extends Model
{
    protected $fillable = ['name', 'slug', 'sort'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pdfs()
    {
        return $this->hasMany('App\Models\Pdf');
    }
}
