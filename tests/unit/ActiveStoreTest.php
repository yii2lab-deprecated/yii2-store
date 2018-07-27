<?php
namespace tests\unit;

use yii2lab\test\Test\Unit;
use yii2lab\store\tests\models\Login;

class ActiveStoreTest extends Unit
{
	
	public function testOne()
	{
		$result = Login::one(['login' => '77004163092']);
		expect($result)->equals([
			'login' => '77004163092',
			'role' => 'rAdministrator',
			'is_active' => 1,
		]);
	}
	
	public function testAll()
	{
		$result = Login::all(['is_active' => 1]);
		expect($result)->equals([
			[
				'login' => '77004163092',
				'role' => 'rAdministrator',
				'is_active' => 1,
			],
			[
				'login' => '77783177384',
				'role' => 'rUnknownUser',
				'is_active' => 1,
			],
		]);
	}
	
}
