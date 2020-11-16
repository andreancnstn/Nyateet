<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'name', 'category_id', 'subCategory_id', 'deadline', 'isImportant',
    ];
}
