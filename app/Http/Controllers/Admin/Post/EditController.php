<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    public function __invoke(Post $post)
		{
			$categories = Category::all();
			$tags = Tag::all();
			// dd($post->tags->pluck('id'));
			return view('admin.post.edit', compact('post','categories','tags'));
		}
}
