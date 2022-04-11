<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class PostService
{
	public function store($data)
	{
		try {
			DB::beginTransaction();
			if(isset($data['tag_ids'])){
				$tagIds = $data['tag_ids'];
				unset($data['tag_ids']);
			}
			// dd($data);
			$data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
			$data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
			$post = Post::firstOrCreate($data);
			// dd($data);
			if(isset($data['tag_ids'])){
				$post ->tags()->attach($tagIds);
			}
			DB::commit();
			// Post::firstOrCreate($data);
		} catch (\Exception $exception){
				DB::rollBack();
				abort(500);
			}
	}
	public function update($data, $post)
	{
		try{
			DB::beginTransaction();
			if(isset($data['tag_ids'])){
				$tagIds = $data['tag_ids'];
				unset($data['tag_ids']);
				// dd($tagIds);
			} else {
				$tagIds = null;
			}
			// dd($data);
			if(isset($data['preview_image'])){
				$data['preview_image'] = Storage::disk('public')->put('/images',$data['preview_image']);
			}
			if(isset($data['main_image'])){
				$data['main_image'] = Storage::disk('public')->put('/images',$data['main_image']);
			}
			// dd($data);
			// $post = Post::firstOrCreate($data);
			$post->update($data);
			// dd($data);

			if($tagIds >= 0){
				$post->tags()->sync($tagIds);
				// dd($data);
			}
			DB::commit();
		} catch (Exception $exception){
			DB::rollBack();
			abort(500);
		}

		return $post;	
		
	}
	
}