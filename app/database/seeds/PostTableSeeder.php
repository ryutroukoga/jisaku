<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' =>  1,
            'user_id' => 1,
            'title' => 'テスト',
            'amount' => 1000,
            'detail' => 'テスト詳細',
            'image' => 'image',
            'status' => '進行中',
            'del_flg' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
