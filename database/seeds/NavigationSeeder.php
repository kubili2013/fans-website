<?php

use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/videos',
            'image_url'=>'/img/1_160x160.jpg',
            'title'=>'坤视频',
            'self'=>true,
            'description'=>'来自于大家分享的各种坤坤视频'
        ]);
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/images',
            'image_url'=>'/img/2_160x160.jpg',
            'title'=>'坤美图',
            'self'=>true,
            'description'=>'来自于大家分享的各种坤坤图片'
        ]);
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/news',
            'image_url'=>'/img/3_160x160.jpg',
            'title'=>'坤动态',
            'self'=>true,
            'description'=>'坤坤的动态'
        ]);
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/goods',
            'image_url'=>'/img/4_160x160.jpg',
            'title'=>'坤好物',
            'self'=>true,
            'description'=>'各种关于坤坤的好物分享'
        ]);
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/fans',
            'image_url'=>'/img/5_160x160.jpg',
            'title'=>'粉丝墙',
            'self'=>true,
            'description'=>'粉丝们来登陆一下报个到吧！'
        ]);
        DB::table('navigations')->insert([
            'user_id'=>1,
            'url'=>'/about',
            'image_url'=>'/img/6_160x160.jpg',
            'title'=>'关于',
            'self'=>true,
            'description'=>'关于本站的问题以及信息'
        ]);
        // 测试用
        for($i = 0;$i<100;$i++){
            DB::table('images')->insert([
                'user_id'=>1,
                'url'=>'//cdn.foolishgoat.com/1528423966567.jpg',
                'size' => 0.0,
                'download_count'=>0,
                'description'=>'MEITU'
            ]);
        }
    }
}
