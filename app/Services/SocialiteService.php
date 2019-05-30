<?php
namespace App\Services;
use Overtrue\Socialite\SocialiteManager;
/**
 * 第三方登陆服务
 */
class SocialiteService extends BaseService
{
	
	public function redirect($site){

		$config = $this->getConfig($site);

		$socialite = new SocialiteManager($config);

		$response = $socialite->driver($site)->redirect();
		$response->send();
	}

	public function callback($site){

		$config = $this->getConfig($site);

		$socialite = new SocialiteManager($config);

		$user = $socialite->driver($site)->user();

		dd($user);
	}

	public function getConfig($site){
		return config('socialite');
	}
}
