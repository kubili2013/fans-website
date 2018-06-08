<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Repositories\UsersRepository;

class OAuthController extends Controller
{
    protected  $repoUser;
    public function __construct(UsersRepository $up){

        $this->repoUser = $up;
    }
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($name)
    {
        return Socialite::driver($name)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($name)
    {
        $tUser = Socialite::driver($name)->user();
        $wUser = $this->repoUser->getWeiboUser($tUser->id);
        if(!$wUser){
            //不存在 新建用户登录
            Auth::login($this->repoUser->createUserUseWeibo($tUser),true);
        }else{
            Auth::login($wUser->user, true);
        }
        return redirect('/');
    }
}
