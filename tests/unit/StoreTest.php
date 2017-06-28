<?php
namespace api\tests\unit\helpers;

use Codeception\Test\Unit;
use yii2lab\store\Store;

class StoreTest extends Unit
{
	
	public $encoded = '{"name":"John","balance":{"active":100}}';
	public $decoded = [
		'name' => 'John',
		'balance' => [
			'active' => 100
		]
	];
	
	public function testEncode()
	{
		$store = new Store('Json');
		$result = $store->encode($this->decoded);
		expect($result)->equals($this->encoded);
	}
	
	public function testDecode()
	{
		$store = new Store('Json');
		$result = $store->decode($this->encoded);
		expect($result)->equals($this->decoded);
	}
	
	public function testSave()
	{
		$store = new Store('Json');
		$fileName = $this->fileName('example');
		$store->save($fileName, $this->decoded);
		$result = $store->load($fileName);
		expect($result)->equals($this->decoded);
	}
	
	public function testUpdate()
	{
		//$this->loadFixture();
		$store = new Store('Json');
		$fileName = $this->fileName('example');
		$store->update($fileName, 'balance.active', 200);
		$result = $store->load($fileName, 'balance.active');
		expect($result)->equals(200);
	}

	public function testLoad()
	{
		$store = new Store('Json');
		$fileName = $this->fileName('source');
		$result = $store->load($fileName);
		expect($result)->equals($this->decoded);
	}
	
	public function testLoadWithKey()
	{
		$store = new Store('Json');
		$fileName = $this->fileName('source');
		$result = $store->load($fileName, 'name');
		expect($result)->equals('John');
	}
	
	public function testLoadWithMultiKey()
	{
		$store = new Store('Json');
		$fileName = $this->fileName('source');
		$result = $store->load($fileName, 'balance.active');
		expect($result)->equals(100);
	}
	
	private function fileName($name)
	{
		$fileName = codecept_data_dir() . DS . $name . '.json';
		return $fileName;
	}
	
	private function loadFixture()
	{
		$fileName = $this->fileName('example');
		file_put_contents($fileName, $this->encoded);
	}
}
