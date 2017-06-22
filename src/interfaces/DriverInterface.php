<?php

namespace yii2lab\store\interfaces;

interface DriverInterface
{

    public function decode($content);
    public function encode($data);

}