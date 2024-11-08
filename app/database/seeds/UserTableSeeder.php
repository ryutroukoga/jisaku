<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' =>  1,
            'name' => 'あいこ',
            'email' => 'email@email',
            'password' => 'aiko',
            'image' => 'image',
            'admins' => 0,
            'del_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
