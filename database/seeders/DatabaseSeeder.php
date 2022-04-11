<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->call(UsersTableSeeder::class);
		$this->call(CategoriesTableSeeder::class);
		$this->call(TagsTableSeeder::class);
		$this->call(PostsTableSeeder::class);
		$this->call(PostTagsTableSeeder::class);
		$this->call(CommentsTableSeeder::class);
		$this->call(PostUserLikesTableSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}