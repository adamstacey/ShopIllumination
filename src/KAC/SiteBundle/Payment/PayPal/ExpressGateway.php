<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KAC\SiteBundle\Payment\PayPal;

use Omnipay\PayPal\ExpressGateway as BaseExpressGateway;

/**
 * PayPal Express Class
 */
class ExpressGateway extends BaseExpressGateway
{
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\KAC\SiteBundle\Payment\PayPal\Message\ExpressAuthorizeRequest', $parameters);
    }
}
