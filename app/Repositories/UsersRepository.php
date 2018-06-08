<?php

namespace App\Repositories;
/**
 * Created by PhpStorm.
 * User: kubili2013
 * Date: 2017/8/30
 * Time: 下午3:06
 */
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UsersRepository
{

    public function createUserUseWeibo($weiboUser){
        $user = new User();
        $user->name = $weiboUser->nickname;
        $user->email = ($weiboUser->email == null ? $weiboUser->id:$weiboUser->email);
        $user->password = Crypt::encrypt(str_random(32));
        $user->avatar = $weiboUser->avatar;
        $user->weibo_id = $weiboUser->id;
        $user->weibo_index = ($weiboUser->original['url'] != null ?$weiboUser->original['url']:$weiboUser->id);
        $user->save();
        return $user;
    }

    /**
     * 根据 weibo id 查找用户实例
     * @param $github_id
     */
    public function getWeiboUser($weibo_id){
        return User::where('weibo_id',$weibo_id)->first();
    }

}