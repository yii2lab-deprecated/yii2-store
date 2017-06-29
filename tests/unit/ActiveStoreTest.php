<?php
namespace yii2lab\store\tests\unit;

use Codeception\Test\Unit;
use yii2lab\store\ActiveStore;
//use yii2lab\store\tests\models\Login;

class Login extends ActiveStore
{
	public static $name = 'rest_login';
	
}

class ActiveStoreTest extends Unit
{
	
	public function testOne()
	{
		$result = Login::one(['login' => '77004163092']);
		expect($result)->equals([
			'login' => '77004163092',
			'password' => 'Wwwqqq111',
			'description' => 'Admin',
			'role' => 'rAdministrator',
			'is_active' => 1,
		]);
	}
	
}
