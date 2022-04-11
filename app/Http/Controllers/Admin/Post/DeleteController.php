<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
		{
			$post->delete();
			return redirect()->route('admin.post.index');
		}
}
