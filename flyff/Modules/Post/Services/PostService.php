<?php

namespace Flyff\Modules\Post\Services;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Post\Http\Resources\PostIndexResource;
use Flyff\Modules\Post\Models\Post;
use Flyff\Modules\Post\Repositories\PostRepository;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository
    ){}


    public function getPosts(): array
    {
        return PostIndexResource::collection($this->postRepository->published()->take(6))->resolve();
    }

    public function getAllPosts(): array
    {
        return PostIndexResource::collection($this->postRepository->published())->resolve();
    }

    public function createPost(array $data): Post|Model
    {
        $post = new Post();
        $post->fill($data);
        $post->user()->attach(auth()->user());
        return $this->postRepository->save($post);
    }
}