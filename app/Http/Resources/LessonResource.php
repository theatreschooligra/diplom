<?php

namespace App\Http\Resources;

use App\Helpers\Dict;
use Carbon\Carbon;
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
        $date = '';
        $diff = -1;
        if ($this->homework_send_time) {
            $date = $this->homework_send_time->format('d/m/Y');

            $diff = Carbon::now()->diffInDays($this->homework_send_time);
            if ($diff == 0) $date = 'сегодня';
            else if ($diff < 7) $date = Carbon::now()->diffInDays($this->homework_send_time) . ($diff == 1 ? ' день' : 'дней') . ' назад';
        }
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'group'             => $this->group,
            'lesson_date'       => (string) $this->lesson_date,
            'lesson_time_index' => $this->lesson_time,
            'lesson_time'       => Dict::lesson_times()[$this->lesson_time],
            'room'              => Dict::rooms()[$this->room],
            'teacher'           => new UserResource($this->teacher),
            'homework'          => $this->homework_id ? (new HomeworkResource($this->homework)) : null,
            'date'              => $date,
            'active'            => $diff == 0 ? true : false,
            'bonus1'            => (boolean) $this->bonus1,
            'bonus2'            => (boolean) $this->bonus2,
            'fine1'             => (boolean) $this->fine1,
            'fine2'             => (boolean) $this->fine2,
        ];
    }
}