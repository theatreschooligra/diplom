<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserChatResource extends JsonResource
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
            'id'      => $this->id,
            'name'    => $this->surname .' '. $this->name,
            'message' => $this->getLastMessage(),
            'image'   => ($this->image == null) ? null : asset('img/'. $this->image),
        ];
    }
}
