<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    protected $fillable = ['name'];

    public function toDoItems()
    {
        return $this->hasMany(ToDoItem::class);
    }
}
