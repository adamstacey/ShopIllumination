<?php
namespace KAC\SiteBundle\Twig;

class CurrencyExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'currency' => new \Twig_Filter_Method($this, 'currencyFilter'),
        );
    }

    public function currencyFilter($price, $currencyCode = 'GBP', $style = false, $includeTax = true, $taxMessage = '')
    {
        switch ($currencyCode)
        {
            case 'GBP':
            default:
                if ($style)
                {
                    $currency = '<span class="currency-sign">£</span><span class="currency-integer">'.number_format($price, 2, '</span><span class="currency-decimal">.', ',').'</span>';
                    if ($taxMessage != '')
                    {
                        $currency .= '<span class="currency-tax">'.$taxMessage.'</span>';
                    }
                } else {
                    $currency = '£'.number_format($price, 2, '.', ',');
                    if ($taxMessage != '')
                    {
                        $currency .= $taxMessage;
                    }
                }
                return $currency;
                break;
        }
    }

    public function getName()
    {
        return 'kac_currency_extension';
    }
}