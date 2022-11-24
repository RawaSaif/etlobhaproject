<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
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
            'id' =>$this->id,
            'title' => $this->title,
            'page_content' => $this->page_content,
            'seo_title' => $this->seo_title,
            'seo_link' => $this->seo_link,
            'seo_desc' => $this->seo_desc,
            'tags' => $this->tags,
            'status' => $this->status,
            'is_deleted' => $this->is_deleted,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'store' => New StoreResource($this->store)
           
        ];
    }
}