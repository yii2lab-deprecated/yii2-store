<?php

namespace yii2lab\store\interfaces;

/**
 * Interface DriverInterface
 * @package yii2lab\store\interfaces
 * @deprecated
 */
interface DriverInterface
{

    public function decode($content);
    public function encode($data);

}