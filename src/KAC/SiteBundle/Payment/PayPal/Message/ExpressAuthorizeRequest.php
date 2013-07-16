<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KAC\SiteBundle\Payment\PayPal\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\PayPal\Message\ExpressAuthorizeRequest as AbstractRequest;

/**
 * PayPal Express Authorize Request
 */
class ExpressAuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        $data = parent::getData();

        $this->validate('products', 'subTotal', 'deliveryCharge');

        $products = $this->getProducts();
        if(!is_array($products)) {
            throw new InvalidRequestException("The products parameter is expected to have the type array");
        }

        $i=0;
        foreach($products as $product)
        {
            if(isset($product['name'])
                && isset($product['productCode'])
                && isset($product['description'])
                && isset($product['unitCost'])
                && isset($product['quantity']))
            {
                $data["L_PAYMENTREQUEST_0_NAME$i"] = $product['name'];
                $data["L_PAYMENTREQUEST_0_NUMBER$i"] = $product['productCode'];
                $data["L_PAYMENTREQUEST_0_DESC$i"] = $product['description'];
                $data["L_PAYMENTREQUEST_0_AMT$i"] = $product['unitCost'];
                $data["L_PAYMENTREQUEST_0_QTY$i"] = $product['quantity'];
                $i++;
            }
        }

        $data["PAYMENTREQUEST_0_ITEMAMT"] = $this->getSubTotal();
        $data["PAYMENTREQUEST_0_SHIPPINGAMT"] = $this->getDeliveryCharge();

        return $data;
    }

    public function getProducts()
    {
        return $this->getParameter('products');
    }

    public function setProducts($value)
    {
        return $this->setParameter('products', $value);
    }

    public function getSubTotal()
    {
        return $this->getParameter('subTotal');
    }

    public function setSubTotal($value)
    {
        return $this->setParameter('subTotal', $value);
    }

    public function getDeliveryCharge()
    {
        return $this->getParameter('deliveryCharge');
    }

    public function setDeliveryCharge($value)
    {
        return $this->setParameter('deliveryCharge', $value);
    }
}
