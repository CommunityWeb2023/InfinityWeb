<?php

namespace App\Http\Controllers;

use Flyff\Modules\Post\Http\Requests\PostCreateRequest;
use Flyff\Modules\Post\Http\Requests\PostUpdateRequest;
use Flyff\Modules\Post\Http\Resources\PostIndexResource;
use Flyff\Modules\Post\Models\Post;
use Flyff\Modules\Post\Services\CategoryService;
use Flyff\Modules\Post\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{

    public function __construct(
        private readonly PostService $postService,
        private readonly CategoryService $categoryService
    ){}

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

    public function indexAdmin(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Post/Index', [
            'posts' => $this->postService->getAllPosts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Dashboard/Post/Add', [
            'categories' => $this->categoryService->getCategories()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $postCreateRequest)
    {
        $basename = null;

        if(!empty($postCreateRequest->file('image'))){
            if (!Storage::exists("public/post_image")) {
                Storage::makeDirectory("public/post_image");
            }
            $file = $postCreateRequest->file('image')[0];
            $original_name = $file->getClientOriginalName();
            $basename = Str::random(20) . $original_name;
            $basename = Str::replace(' ', '', $basename);
            Storage::putFileAs('public/post_image', $file, $basename);
        }
        $this->postService->createPost($postCreateRequest->validated(), $basename);

        //return Inertia::location(route('post.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): \Inertia\Response
    {
        return Inertia::render('Post/Show', [
            'post' => new PostIndexResource($post)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): \Inertia\Response
    {
        return Inertia::render('Dashboard/Post/Edit', [
            'post' => $this->postService->getPostToEdit($post),
            'categories' => $this->categoryService->getCategories()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post): void
    {
        $basename = null;
        if(!empty($request->file('newImage'))){
            if (!Storage::exists("public/post_image")) {
                Storage::makeDirectory("public/post_image");
            }
            $file = $request->file('newImage')[0];
            $original_name = $file->getClientOriginalName();
            $basename = Str::random(20) . $original_name;
            $basename = Str::replace(' ', '', $basename);
            Storage::putFileAs('public/post_image', $file, $basename);
        }

        $this->postService->updatePost($request->validated(), $post, $basename);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): void
    {
        $this->postService->deletePost($post);
    }

    public function all(): \Inertia\Response
    {
        return Inertia::render('Post/All', [
            'posts' => $this->postService->getAllPosts()
        ]);
    }
}
