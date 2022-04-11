<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
		{
			$data = [];
			$data['likedPostsCount'] = Auth::user()->likedPosts->count();
			// dd($data['likedPosts']);
			$data['commentsCount'] = Auth::user()->comments->count();
			// dd($data);
			return view('personal.main.index',compact('data'));
		}
}
