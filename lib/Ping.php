<?php

namespace Noos;

/**
 * Class Customer
 *
 * @property string $greeting
 * @property Date $date
 *
 * @package Noos
 */
class Ping extends ApiResource
{

    const OBJECT_NAME = "ping";

    use ApiOperations\Retrieve;

    public function instanceUrl()
    {
        return '/ping';
    }
}
