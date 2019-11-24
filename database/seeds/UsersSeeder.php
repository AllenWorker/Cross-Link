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
        'email' => 'admin@localhost.com',
        'password' => bcrypt('Password'),
    ]);

        DB::table('profiles')->insert([
            'user_id' => 1,
            'nickname' => 'Admin',
        ]);

        DB::table('users')->insert([
            'name' => 'UserAdmin',
            'email' => 'useradmin@localhost.com',
            'password' => bcrypt('Password'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
            'nickname' => 'UserAdmin',
        ]);

        DB::table('users')->insert([
            'name' => 'Allen',
            'email' => 'Allen@localhost.com',
            'password' => bcrypt('AllenPassword'),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 3,
            'nickname' => 'YuiLin',
        ]);
    }
}
