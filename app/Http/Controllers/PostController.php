<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    
    public function dashboard()
    {
          $posts = Post::with('user')->latest()->get(); 
 
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->user_id = auth()->id(); // Giriş yapan kullanıcının ID'sini atama
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Makale başarıyla oluşturuldu!');
    }

    public function index()
    {
        $user = Auth::user(); // Giriş yapmış kullanıcıyı al
        $posts = $user->posts()->latest()->get();// Bu kullanıcıya ait tüm makaleleri al
 
        return view('posts.index', compact('posts'));
    }
    public function destroy(Post $post)
    {
       
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Makale başarıyla silindi.');
    }
}
