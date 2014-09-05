<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = array(
			"username" => "thawheinthit",
			"password" => Hash::make("password"),
			"email" => "thawheinthit@gmail.com",
			"created_at" => DB::raw("NOW()"),
			"updated_at" => DB::raw("NOW()"),
			"role" => 'admin'
		);

		DB::table('users')->insert($user);
	}

}