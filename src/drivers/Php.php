<?php

namespace yii2lab\store\drivers;

use yii2lab\store\interfaces\DriverInterface;
use yii\helpers\VarDumper;
use yii2lab\helpers\yii\FileHelper;
use yii2mod\helpers\ArrayHelper;

class Php implements DriverInterface
{

	public function decode($content) {
		$code = '$data = ' . $content . ';';
		eval($code);
		return $data;
	}

	public function encode($data) {
		$content = VarDumper::export($data);
		$content = str_replace(str_repeat(SPC, 4), "\t", $content);
		return $content;
	}

	public function save($fileName, $data) {
		$content = $this->encode($data);
		$code = '<?php ' . PHP_EOL . PHP_EOL . 'return ' . $content . ';';
		FileHelper::save($fileName, $code);
	}

	public function load($fileName, $key = null) {
		if(!FileHelper::has($fileName)) {
			return null;
		}
		$data = include($fileName);
		if(func_num_args() > 1) {
			return ArrayHelper::getValue($data, $key);
		}
		return $data;
	}

}