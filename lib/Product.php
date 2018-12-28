<?php

namespace Noos;

/**
 * Class Product
 *
 * @property string name
 * @property string description
 * @property string sku
 * @property float price
 * @property boolean enabled
 * @property int horizon
 * @property int lowStockLimit
 * @property int quantity
 * @property Date lastQuantityUpdated
 *
 * @package Noos
 */
class Product extends ApiResource
{
    const OBJECT_NAME = "products";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    /**
     * @param array|null $params
     *
     * @return array An array of the product's Sales.
     */
    public function sales($params = null)
    {
        $params = $params ?: [];
        $params['product'] = $this->sku;
        $sales = Sale::all($params, $this->_opts);
        return $sales;
    }

    /**
     * @param Prediction|null $params
     *
     * @return the product's Predictions.
     */
    public function prediction($params = null)
    {
        $params = $params ?: [];
        $params['product'] = $this->sku;
        $prediction = Prediction::retrieve($params, $this->_opts);
        return $prediction;
    }

    /**
     * @param array|null $params
     *
     * @return array An array of the product's Sales.
     */
    public function report($params = null)
    {
        $params = $params ?: [];
        $params['product'] = $this->sku;
        $report = Report::retrieve($params, $this->_opts);
        return $report;
    }

}
