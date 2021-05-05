<?php

namespace App\Transformers\ListComment;

use League\Fractal\TransformerAbstract;
use App\Models\Comment;

class ListCommentTransformers extends TransformerAbstract
{
    protected $defaultIncludes = [
        'user',
    ];

    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'post_id' => $comment->post_id,
            'parent_id' => $comment->parent_id,
            'content' => $comment->content,
            'published' => $comment->published,
            'published_at' => $comment->published_at,
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at
        ];
    }

    public function includeUser(Comment $comment)
    {
        $user = $comment->user;
        return $this->item($user, new UserTransformers);
    }
}