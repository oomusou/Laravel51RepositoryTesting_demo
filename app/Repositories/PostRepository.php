<?php
/**
 * Created by PhpStorm.
 * User: oomusou
 * Date: 11/4/15
 * Time: 2:09 PM
 */

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository
{

    /**
     * @var Post
     */
    protected $post;

    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * 傳回最新3筆文章
     *
     * @return Collection
     */
    public function getLatest3Posts()
    {
        return $this->post
            ->query()
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();
    }


}