<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'password' => bcrypt('ItsPassword!'),
        ]);

        DB::table('profiles')->insert([
            'email' => 'admin@fake.com',
            'user_id' => 1,
        ]);
    }
}
