<?php

namespace App\Http\Controllers;

use Flyff\Modules\Post\Http\Requests\PostCreateRequest;
use Flyff\Modules\Post\Http\Resources\PostIndexResource;
use Flyff\Modules\Post\Models\Post;
use Flyff\Modules\Post\Services\PostService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{

    public function __construct(private readonly PostService $postService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        //dd($this->postService->getPosts());
        return Inertia::render('Welcome', [
            'posts' => $this->postService->getPosts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $postCreateRequest): void
    {
        $this->postService->createPost($postCreateRequest->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Post/Show', [
            'post' => new PostIndexResource($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function all(): \Inertia\Response
    {
        return Inertia::render('Post/All', [
            'posts' => $this->postService->getAllPosts()
        ]);
    }
}
