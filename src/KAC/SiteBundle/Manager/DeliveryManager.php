<?php
namespace KAC\SiteBundle\Manager;

use Doctrine\Bundle\DoctrineBundle\Registry;
use JMS\Serializer\Serializer;
use KAC\SiteBundle\Manager\Delivery\ShippableInterface;
use KAC\SiteBundle\Model\Basket;
use KAC\SiteBundle\Model\BasketItem;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DeliveryManager extends Manager
{
    public function calculateZone($country, $postcode)
    {
        $country = $country ? $country : 'GB';
        $postcode = $postcode ? $postcode : 'NG162UZ';

        switch ($country)
        {
            case 'GB':
                // Calculate the zone
                if (preg_match("/^(AL|B0|B1|B2|B3|B4|B5|B6|B7|B8|B9|BA|BB|BD|BH|BL|BN|BR|BS|CB|CF|CH|CM|CO|C0|CR|CV|CW|DA|DE|DH|DL|DN|DT|DY|E0|E1|E2|E3|E4|E5|E6|E7|E8|E9|EC|EN|FY|GL|GU|HA|HD|HG|HP|HR|HU|HX|IG|IP|KT|L0|L1|L2|L3|L4|L5|L6|L7|L8|L9|LD|LE|LN|LS|LU|M0|M1|M2|M3|M4|M5|M6|M7|M8|M9|ME|MK|N0|N1|N2|N3|N4|N5|N6|N7|N8|N9|NG|NN|NP|NR|NW|OL|0L|OX|0X|PE|PR|RG|RH|RM|S0|S1|S2|S3|S4|S5|S6|S7|S8|S9|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TF|TN|TS|TW|UB|W0|W1|W2|W3|W4|W5|W6|W7|W8|W9|WA|WC|WD|WF|WN|WR|WS|WV|YO|Y0)[A-Z0-9]*/", $postcode))
                {
                    $zone = 1;
                } elseif (preg_match("/^(CA|CT|DG|EH|EX|G0|G1|G2|G3|G4|G5|G6|G7|G8|G9|LA|LL|ML|NE|PL|SA|TA|TD|TQ|TR)[A-Z0-9]*/", $postcode)) {
                    $zone = 2;
                } elseif (preg_match("/^(AB|BT|DD|FK|KY)[A-Z0-9]*/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(HS|ZE)[A-Z0-9]*/", $postcode)) {
                    $zone = 5;
                } elseif (preg_match("/^(GY1|GY2|GY3|GY4|GY5|GY6|GY7|GY8|IM|JE)[A-Z0-9]*/", $postcode)) {
                    $zone = 6;
                } elseif (preg_match("/^(PO|P0)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 1;
                } elseif (preg_match("/^(PO|P0)(30|31|32|33|34|35|36|37|38|39|40|41)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(KA)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|29|30)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 2;
                } elseif (preg_match("/^(KA27)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 5;
                } elseif (preg_match("/^(KA28)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 6;
                } elseif (preg_match("/^(PA)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 2;
                } elseif (preg_match("/^(PA)(21|22|23|24|25|26|27|28|29|30|31|32|33|35|41)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(PA)(20|42|43|44|45|46|47|48|49|62|63|64|65|66|67|68|69|70|71|72|73|74|75)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 5;
                } elseif (preg_match("/^(PA)(34|60|61|76|77|78)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 6;
                } elseif (preg_match("/^(PH)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31|32|33|34|35|36|37|38|39|40|41|49|50)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(PH)(42|43|44)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 6;
                } elseif (preg_match("/^(KW)(1|2|3|5|6|7|8|9|10|11|12|13|14)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(KW)(15|16|17)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 4;
                } elseif (preg_match("/^(IV)(1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|30|31|32|36|55|56|63)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 3;
                } elseif (preg_match("/^(IV)(40|42|43|44|45|46|47|48|51|52|53|54)[0-9][A-Z]{2}/", $postcode)) {
                    $zone = 4;
                } else {
                    $zone = 0;
                }
                break;
            case 'IE':
                $zone = 4;
                break;
            default:
                $zone = 0;
                break;
        }

        return $zone;
    }

    /**
     * Calculate the total order weight
     *
     * @param ShippableInterface[] $items
     * @return int
     */
    public function calculateWeight($items)
    {
        $weight = 0;

        foreach($items as $item)
        {
            $weight = $weight + ($item->getWeight() * $item->getQuantity());
        }

        return $weight;
    }

    /**
     * Calculate the delivery band
     *
     * @param ShippableInterface[] $items
     * @return int
     */
    public function calculateBand($items)
    {
        $weighting = $this->calculateWeighting($items);

        if ($weighting < 5)
        {
            return 1;
        } elseif (($weighting >= 5) && ($weighting < 25)) {
            return 2;
        } elseif (($weighting >= 25) && ($weighting < 75)) {
            return 3;
        } elseif (($weighting >= 75) && ($weighting < 75000)) {
            return 4;
        } elseif (($weighting >= 75000) && ($weighting < 75000000)) {
            return 5;
        } elseif ($weighting >= 75000000) {
            return 6;
        }

        return 0;
    }

    /**
     * Calculate the weighting of the delivery
     *
     * @param ShippableInterface[] $items
     * @return int
     */
    public function calculateWeighting($items)
    {
        $weighting = 0;

        foreach($items as $item)
        {
            switch ($item->getBaseDeliveryBand() * 1)
            {
                case 1:
                    $weighting += (1 * $item->getQuantity());
                    break;
                case 2:
                    $weighting += (5 * $item->getQuantity());
                    break;
                case 3:
                    $weighting += (25 * $item->getQuantity());
                    break;
                case 4:
                    $weighting += (75 * $item->getQuantity());
                    break;
                case 5:
                    $weighting += (75000 * $item->getQuantity());
                    break;
                case 6:
                    $weighting += (75000000 * $item->getQuantity());
                    break;
            }
        }

        return $weighting;
    }

    public function calculatePrice($deliveryOptions, $service)
    {
//        if($service === '' && count($deliveryOptions) > 0)
//        {
//            return $deliveryOptions[0]['price'];
//        } else {
//            foreach($deliveryOptions as $item)
//            {
//                if($item['service'] === $service)
//                {
//                    return $item['price'];
//                }
//            }
//        }

        return 0;
    }

    public function getCouriers($deliveryType)
    {
        if(strpos($deliveryType, 'Royal Mail'))
        {
            return array(
                'Royal Mail' => 'Royal Mail'
            );
        } elseif(strpos($deliveryType, 'Parcel')) {
            return array(
                'Parcelforce' => 'Parcelforce',
                'DPD' => 'DPD',
            );
        } elseif(strpos($deliveryType, 'Pallet')) {
            return array(
                'Palletways' => 'Palletways',
            );
        } elseif(strpos($deliveryType, 'Home Delivery')) {
            return array(
                'GHD Transport',
            );
        } else {
            return array(
                'Royal Mail' => 'Royal Mail',
                'Parcelforce' => 'Parcelforce',
                'DPD' => 'DPD',
                'Palletways' => 'Palletways',
                'GHD Transport',
            );
        }
    }
}