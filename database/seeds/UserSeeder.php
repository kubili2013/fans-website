<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'lhb',
            'email' => 'kubili2013@gmail.com',
            'password' => bcrypt('*********'),
            'role' => 'admin',
            'weibo_id' => '0',
            'avatar' => '',
            'weibo_index' => '',
            'remember_token' => str_random(10),
        ]);
    }
}
