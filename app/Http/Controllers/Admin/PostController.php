<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function index() {
        $posts = Post::with(['user', 'category', 'images'])->latest()->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with(['user', 'category'])->findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    public function create(){
        $categories = PostCategory::get();

        return view('admin.posts.create', compact('categories'));
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // buat nama unik biar nggak tabrakan
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // simpan ke storage/app/public/posts/images
            $file->storeAs('posts/images', $filename);

            // ambil URL publik
            $url = asset('storage/posts/images/' . $filename);

            // CKEditor 5 EXPECTS "uploaded" + "url"
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'No file uploaded.'
            ]
        ], 400);
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'            => 'required|string|max:255',
            'post_category_id' => 'required|exists:post_categories,id',
            'featured_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content'          => 'required|string',
            'status'           => 'required|in:draft,published',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keyword'     => 'nullable|string|max:255',
        ]);


        // Siapkan data
        $data = $request->only([
            'title',
            'post_category_id',
            'content',
            'status',
            'meta_title',
            'meta_description',
            'meta_keyword',
        ]);

        // Tambahkan user_id (misal ambil dari auth)
        $data['user_id'] = Auth::id();

        // Generate slug
        $data['slug'] = Str::slug($request->title) . '-' . time();

        // Jika upload featured image
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts/featured', 'public');
            $data['featured_image'] = $path; // contoh: "posts/featured/namafile.png"
        }

        // Kalau status published, set published_at
        if ($request->status === 'published') {
            $data['published_at'] = now();
        }

        // Simpan ke database
        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat.');
    }


    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'post_category_id'  => 'required|exists:post_categories,id',
            'content'           => 'required',
            'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title'        => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string',
            'meta_keyword'      => 'nullable|string',
            'status'            => 'required|in:draft,published',
        ]);

        // update featured image jika ada upload baru
        if ($request->hasFile('featured_image')) {
            // hapus yang lama
            if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $path = $request->file('featured_image')->store('posts/featured', 'public');
            $post->featured_image = $path;
        }

        $slugNew = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);
            if (Post::where('slug', $slugNew)->where('id', '!=', $post->id)->exists()) {
                $slugNew .= '-' . time();
            }

        // update field lain
        $post->update([
            'title'             => $request->title,
            'slug'              => $slugNew,
            'post_category_id'  => $request->post_category_id,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
            'status'            => $request->status,
            'published_at'      => $request->status === 'published' ? now() : null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


    public function destroy(Post $post)
    {
       // Soft delete hanya hapus dari database (set deleted_at)
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post moved to trash!');
    }
}
