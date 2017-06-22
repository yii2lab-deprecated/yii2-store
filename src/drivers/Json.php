<?php

namespace yii2lab\store\drivers;

use yii2lab\store\interfaces\DriverInterface;
use yii2mod\helpers\ArrayHelper;

class Json implements DriverInterface
{

    public function decode($content) {
        $data = json_decode($content);
        $data = ArrayHelper::toArray($data);
        return $data;
    }

    public function encode($data) {
        $content = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return $content;
    }

}