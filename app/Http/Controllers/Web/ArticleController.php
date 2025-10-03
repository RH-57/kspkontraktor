<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController
{
     public function index() {
        $contacts = Contact::first();
        $posts = Post::where('status', 'published')
                ->with('category')
                ->latest()
                ->paginate(6);
        $sosmeds = MediaSocial::get();

        return view('web.article', compact('contacts', 'posts', 'sosmeds'));
     }

    public function show($slug) {
        $contacts = Contact::first();
        $sosmeds = MediaSocial::get();

        // Ambil artikel utama
        $post = Post::where('slug', $slug)
                    ->where('status', 'published')
                    ->with('category')
                    ->firstOrFail();

        // Ambil artikel terkait (berdasarkan kategori yang sama, exclude artikel ini)
        $relatedPosts = Post::where('status', 'published')
                        ->where('post_category_id', $post->post_category_id)
                        ->where('id', '!=', $post->id)
                        ->latest()
                        ->take(3)
                        ->get();

        return view('web.article-show', compact('contacts', 'sosmeds', 'post', 'relatedPosts'));
    }
}
