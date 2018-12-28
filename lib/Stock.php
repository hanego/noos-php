<?php

namespace Noos;

/**
 * Class Customer
 *
 * @property string $sku
 * @property int $quantity
 * @property Date $lastQuantityUpdated
 *
 * @package Noos
 */
class Stock extends ApiResource
{

    const OBJECT_NAME = "stock";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
