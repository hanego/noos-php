<?php

namespace Noos;

/**
 * Class Customer
 *
 * @property string provider
 * @property string orderId
 * @property string status
 * @property string customerId
 * @property float baseDiscountAmount
 * @property float baseDiscountCanceled
 * @property float baseDiscountInvoiced
 * @property float baseDiscountRefunded
 * @property float baseGrandTotal
 * @property float baseShippingAmount
 * @property float baseShippingCanceled
 * @property float baseShippingInvoiced
 * @property float baseShippingRefunded
 * @property float baseShippingTaxAmount
 * @property float baseShippingTaxRefunded
 * @property float baseSubtotal
 * @property float baseSubtotalCanceled
 * @property float baseSubtotalInvoiced
 * @property float baseSubtotalRefunded
 * @property float baseTaxAmount
 * @property float baseTaxCanceled
 * @property float baseTaxInvoiced
 * @property float baseTaxRefunded
 * @property float baseToOrderRate
 * @property float baseTotalCanceled
 * @property float baseTotalInvoiced
 * @property float baseTotalInvoicedCost
 * @property float baseTotalPaid
 * @property float baseTotalQtyOrdered
 * @property float baseTotalRefunded
 * @property float discountAmount
 * @property float discountCanceled
 * @property float discountInvoiced
 * @property float discountRefunded
 * @property float grandTotal
 * @property float shippingAmount
 * @property float shippingCanceled
 * @property float shippingInvoiced
 * @property float shippingRefunded
 * @property float shippingTaxAmount
 * @property float shippingTaxRefunded
 * @property float subtotal
 * @property float subtotalCanceled
 * @property float subtotalInvoiced
 * @property float subtotalRefunded
 * @property float taxAmount
 * @property float taxCanceled
 * @property float taxInvoiced
 * @property float taxRefunded
 * @property float totalCanceled
 * @property float totalInvoiced
 * @property float totalPaid
 * @property float totalQtyOrdered
 * @property float totalRefunded
 * @property float adjustmentNegative
 * @property float adjustmentPositive
 * @property float baseAdjustmentNegative
 * @property float baseAdjustmentPositive
 * @property float baseShippingDiscountAmount
 * @property float baseSubtotalInclTax
 * @property float baseTotalDue
 * @property float shippingDiscountAmount
 * @property float subtotalInclTax
 * @property float totalDue
 * @property string orderCurrencyCode
 * @property string shippingMethod
 * @property int totalItemCount
 * @property float discountTaxCompensationAmount
 * @property float baseDiscountTaxCompensationAmount
 * @property float shippingDiscountTaxCompensationAmount
 * @property float baseShippingDiscountTaxCompensationAmnt
 * @property float discountTaxCompensationInvoiced
 * @property float baseDiscountTaxCompensationInvoiced
 * @property float discountTaxCompensationRefunded
 * @property float baseDiscountTaxCompensationRefunded
 * @property float shippingInclTax
 * @property float baseShippingInclTax
 * @property Date purchasedDate
 * @property Collection items
 *
 * @package Noos
 */
class Order extends ApiResource
{

    const OBJECT_NAME = "orders";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\NestedResource;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
