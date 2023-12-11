<?php

namespace Flyff\Modules\Post\Services;

use Flyff\Core\Database\Models\Model;
use Flyff\Modules\Post\Http\Resources\PostIndexResource;
use Flyff\Modules\Post\Http\Resources\PostUpdateResource;
use Flyff\Modules\Post\Models\Post;
use Flyff\Modules\Post\Repositories\PostRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class PostService
{
    public function __construct(
        private readonly PostRepository $postRepository
    ){}


    public function getPosts(): array
    {
        return PostIndexResource::collection($this->postRepository->published()->orderByPublishedAtDesc()->take(6)->get())->resolve();
    }

    public function getAllPosts(): array
    {
        return PostIndexResource::collection($this->postRepository->orderByPublishedAtDesc()->get())->resolve();
    }

    public function updatePost(array $data, Post $post, string $basename = null): Post|Model
    {
        // correct $data['published_at'] with Carbon and right timezone
        $data['published_at'] = $data['published_at'] !== null ? Carbon::parse($data['published_at'])->setTimezone('Europe/Berlin') : now()->subMinutes(60);
        $post->fill($data);
        if($basename !== null) {
            $post->image = $basename;
        }
        $post->category()->associate($data['category']);
        return $this->postRepository->save($post);
    }

    public function getPostToEdit(Post $post): PostUpdateResource
    {
        return new PostUpdateResource($post);
    }
    public function createPost(array $data, string $basename = null): Post|Model
    {
        $post = new Post();
        $data['published_at'] = $data['published_at'] !== null ? Carbon::parse($data['published_at'])->setTimezone('Europe/Berlin') : now()->subMinutes(60);
        $data['category_id'] = $data['category'] ?? 1;
        if ($data['image'] === null || $data['image'] === '' || empty($data['image'])) {
            unset($data['image']);
        }
        $post->fill($data);
        if($basename !== null) {
            $post->image = $basename;
        }
        $post->user()->associate(auth()->user());
        return $this->postRepository->save($post);
    }

    public function deletePost(Post $post): void
    {
        $this->postRepository->delete($post);
    }
}