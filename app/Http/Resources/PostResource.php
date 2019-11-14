<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'school_id'     => $this->school_id,
            'verify_status' => $this->sverify_status,
            'resource_type' => $this->resource_type,
            'resource_urls' => $this->resource_urls,
            'repost_count'  => $this->repost_count,
            'like_count'    => $this->like_count,
            'dislike_count' => $this->dislike_count,
            'comment_count' => $this->comment_count,
            'content'       => $this->content,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}