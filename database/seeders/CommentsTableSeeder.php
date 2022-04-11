<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('comments')->insert([
			[
				'post_id' => 1,
				'user_id' => 2,
				'message' => 'Ураааа!!!',
			],
			[
				'post_id' => 2,
				'user_id' => 2,
				'message' => 'The High-Quality Architecture Solutions from a Silicon Valley!',
			],
			[
				'post_id' => 3,
				'user_id' => 2,
				'message' => 'Perfect!!! If you know, what I mean ;)',
			]
		]);
    }
}
