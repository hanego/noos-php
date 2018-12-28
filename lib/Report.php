<?php

namespace Noos;

/**
 * Class Product
 *
 * @property string $id
 * @property string $sku
 * @property Date $computedAt
 * @property int $status
 * @property int $horizon
 * @property float $qty
 * @property float $qty_low
 * @property float $qty_high
 * @property float $qty2
 * @property float $qty_low2
 * @property float $qty_high2
 * @property Collection $items
 *
 * @package Noos
 */
class Report extends ApiResource
{
    const OBJECT_NAME = "report";

    use ApiOperations\All;
    use ApiOperations\Retrieve;

}
