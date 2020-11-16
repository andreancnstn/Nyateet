<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
