<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cover_url' => $this->cover_url,
            'title' => $this->title,
            // 'name' => UserResource::make($this->user),
            'name' => $this->user->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
