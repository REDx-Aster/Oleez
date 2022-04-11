<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
	{	
		$posts = Post::orderBy('created_at', 'desc')->paginate(3);
		$categories = Category::all();
		$tags = Tag::all();
		$user = Auth::user();
		// dd($posts);
		$likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);
		// dd($likedPosts);
		return view('post.index',compact('user','categories','posts','tags','likedPosts'));
	}
}
