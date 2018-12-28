<?php

namespace Noos;

/**
 * Class Product
 *
 * @property string sku
 * @property string name
 * @property string description
 * @property float price
 * @property float basePrice
 * @property float originalPrice
 * @property float baseOriginalPrice
 * @property float baseCost
 * @property boolean is_qty_decimal
 * @property int qtyBackordered
 * @property int qtyCanceled
 * @property int qtyInvoiced
 * @property int qtyOrdered
 * @property int qtyRefunded
 * @property int qtyShipped
 * @property float taxPercent
 * @property float taxAmount
 * @property float baseTaxAmount
 * @property float taxInvoiced
 * @property float baseTaxInvoiced
 * @property float discountPercent
 * @property float discountAmount
 * @property float baseDiscountAmount
 * @property float discountInvoiced
 * @property float baseDiscountInvoiced
 * @property float amountRefunded
 * @property float baseAmountRefunded
 * @property float rowTotal
 * @property float baseRowTotal
 * @property float rowInvoiced
 * @property float baseRowInvoiced
 * @property float baseTaxBeforeDiscount
 * @property float taxBeforeDiscount
 * @property float priceInclTax
 * @property float basePriceInclTax
 * @property float rowTotalInclTax
 * @property float baseRowTotalInclTax
 * @property float discountTaxCompensationAmount
 * @property float baseDiscountTaxCompensationAmount
 * @property float discountTaxCompensationInvoiced
 * @property float baseDiscountTaxCompensationInvoiced
 * @property float discountTaxCompensationRefunded
 * @property float baseDiscountTaxCompensationRefunded
 * @property float taxCanceled
 * @property float discountTaxCompensationCanceled
 * @property float taxRefunded
 * @property float baseTaxRefunded
 * @property float discountRefunded
 * @property float baseDiscountRefunded
 *
 * @package Noos
 */
class OrderItem extends ApiResource
{
    const OBJECT_NAME = "order-items";

}
