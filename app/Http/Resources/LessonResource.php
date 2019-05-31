<?php

namespace App\Http\Resources;

use App\Helpers\Dict;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'group'       => $this->group,
            'lesson_date' => (string) $this->lesson_date,
            'lesson_time' => Dict::lesson_times()[$this->lesson_time],
            'room'        => Dict::rooms()[$this->room],
            'teacher'     => new UserResource($this->teacher),
        ];
    }
}
