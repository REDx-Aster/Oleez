<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostUserLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_user_likes')->insert([
			[
				'post_id' => 1,
				'user_id' => 2,
			],	
		]);
    }
}
