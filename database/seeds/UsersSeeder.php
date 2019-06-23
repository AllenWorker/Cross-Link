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
            'email' => 'admin@fake.com',
            'password' => bcrypt('ItsPassword!'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
        ]);
    }
}
