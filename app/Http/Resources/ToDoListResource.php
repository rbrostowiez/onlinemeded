<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToDoListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
            'items' => ToDoItemResource::collection($this->toDoItems)
        ];
    }
}
