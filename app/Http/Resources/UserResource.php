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
            'surname'       => $this->surname,
            'name'          => $this->name,
            'gender'        => $this->gender,
            'address'       => $this->address,
            'image'         => ($this->image == null) ? null : asset('img/'. $this->image),
            'birthday'      => (string) $this->birthday,
            'phone_number'  => $this->phone_number
        ];

        if ($this->role_id == 3) {
            if ($this->fields->group_id != null && $this->fields->group_id != 0)
                $arr['group']       = $this->group;
            else
                $arr['group']       = null;
            $arr['parent_surname']  = $this->fields->parent_surname;
            $arr['parent_name']     = $this->fields->parent_name;
            $arr['is_trial']        = (boolean) $this->fields->is_trial;
        } else if ($this->role_id == 2) {
            $arr['experience']      = $this->fields->experience;
            $arr['profession']      = $this->fields->profession;
            $arr['about']           = $this->fields->about;
        }

        return $arr;
    }
}
