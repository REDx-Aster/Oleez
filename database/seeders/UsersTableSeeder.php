<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			[
				'name' => 'admin',
				'email' => 'admin@example.com',
				'password' => bcrypt('admin'),
				'email_verified_at' => '2021-10-27 00:00:00',
				'role' => 0,
			],
			[
				'name' => 'user',
				'email' => 'user@example.com',
				'password' => bcrypt('user'),
				'email_verified_at' => '2021-10-27 00:00:00',
				'role' => 1,
			],
		]);
    }
}
