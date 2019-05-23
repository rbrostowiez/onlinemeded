<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoItem extends Model
{
    protected $fillable = ['description', 'completed'];
}
