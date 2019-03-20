<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $arr = [
            'id'            => $this->id,
            'role'          => $this->role,
            'email'         => $this->email,
            'surname'       => $this->fields->surname,
            'name'          => $this->fields->name,
            'gender'        => $this->fields->gender,
            'address'       => $this->fields->address,
            'image'         => $this->image,
            'birthday'      => (new Carbon($this->date))->toDateTimeString(),
            'phone_number'  => $this->phone_number,
        ];

        if ($this->role_id == 3) {
            $arr['group']           = $this->group;
            $arr['parent_surname']  = $this->fields->parent_surname;
            $arr['parent_name']     = $this->fields->parent_name;
        } else if ($this->role_id == 2) {
            $arr['experience']      = $this->fields->experience;
            $arr['profession']      = $this->fields->profession;
            $arr['about']           = $this->fields->about;
        }

        return $arr;
    }
}
