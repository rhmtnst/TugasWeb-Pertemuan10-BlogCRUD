<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $posts = Post::query()
        ->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(6)
        ->withQueryString();

    return view('posts.index', compact('posts', 'search'));
}

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:200',
        'body' => 'required|min:10',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('posts', 'public');
    }

    Post::create($validated);

    return redirect()
        ->route('posts.index')
        ->with('success', 'Post berhasil dibuat!');
}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

   public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'title' => 'required|max:200',
        'body' => 'required|min:10',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $validated['image'] = $request->file('image')->store('posts', 'public');
    }

    $post->update($validated);

    return redirect()
        ->route('posts.index')
        ->with('success', 'Post berhasil diperbarui!');
}

    public function destroy(Post $post)
{
    try {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post berhasil dihapus!');
    } catch (\Throwable $e) {

        return redirect()
            ->route('posts.index')
            ->with('error', 'Post gagal dihapus.');
    }
}
}