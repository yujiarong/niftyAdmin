<?php
namespace App\Services;
use Overtrue\Socialite\SocialiteManager;
/**
 * 第三方登陆服务
 */
class SocialiteService extends BaseService
{
	
	public function redirect($site){
		$config = [
		    'facebook' => [
		        'client_id'     => '288617088649236',
		        'client_secret' => '8e22ecd95b622919434c10210189f85f',
		        'redirect'      => 'http://localhost:8000/socialite/callback/facebook',
		    ],
		];

		$socialite = new SocialiteManager($config);

		$response = $socialite->driver('facebook')->redirect();
		dd($response->send());
		echo $response;// or $response->send();		
	}

	public function callback($site){

		$config = [
		    'facebook' => [
		        'client_id'     => '288617088649236',
		        'client_secret' => '8e22ecd95b622919434c10210189f85f',
		        'redirect'      => 'http://localhost:8000/socialite/callback/facebook',
		    ],
		];

		$socialite = new SocialiteManager($config);

		$user = $socialite->driver('facebook')->user();

		dd($user);
	}
}
