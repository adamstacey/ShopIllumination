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
    const CUT_OFF_TIME = 12;

    public function calculateZone($country, $postcode)
    {
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

    public function calculateDeliveryOptions($zone=0, $band=0)
    {
        $deliveryOptions = array();
        switch ($zone)
        {
            case 1:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 1.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 3.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 4;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Parcel Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 5;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 19.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 19.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 35.00;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 6:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 35;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                // Include collection
                $deliveryOption = array();
                $deliveryOption['service'] = 'Collection';
                $deliveryOption['description'] = 'You will need to collect your order from our shop in Nottingham. We will contact you as soon as your order is ready for collection.';
                $deliveryOption['price'] = 0;
                $deliveryOption['estimatedDeliveryDaysStart'] = 0;
                $deliveryOption['estimatedDeliveryDaysEnd'] = 0;
                $deliveryOptions[] = $deliveryOption;
                break;
            case 2:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 1.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 3.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 4;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Parcel Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 5;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 29;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 14;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 29;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 14;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'FREE DELIVERY Pallet Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 0;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 1;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 45;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 14;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 6:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Home Delivery Service';
                        $deliveryOption['description'] = 'Goods sent home delivery service by GHD Distribution. This is a two-man delivery service where the goods are taken into the house on the ground floor.';
                        $deliveryOption['price'] = 45;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 7;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 16;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                break;
            case 3:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 2.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 8;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 4.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 5;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Economy';
                        $deliveryOption['description'] = 'Package sent economy service by courier DPD.';
                        $deliveryOption['price'] = 4.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 8;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 9.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Economy';
                        $deliveryOption['description'] = 'Pallet sent Economy service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 19;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 7;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 39;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Economy';
                        $deliveryOption['description'] = 'Pallet sent Economy service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 29.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 7;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 49;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Express';
                        $deliveryOption['description'] = 'Pallet sent Express service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 49;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                break;
            case 4:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 3.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 9;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 7.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Economy';
                        $deliveryOption['description'] = 'Package sent economy service by courier DPD.';
                        $deliveryOption['price'] = 4.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 9.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 2;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 69;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 69;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 69;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                break;
            case 5:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 3.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 7.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 6;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Economy';
                        $deliveryOption['description'] = 'Package sent economy service by courier DPD.';
                        $deliveryOption['price'] = 7.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 7;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 15.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 8;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 79;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 10;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 89;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 89;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 4;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                break;
            case 6:
                switch ($band)
                {
                    case 1:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail Economy';
                        $deliveryOption['description'] = 'Small package sent recorded Economy by Royal Mail.';
                        $deliveryOption['price'] = 3.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 6;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Royal Mail 1st Class';
                        $deliveryOption['description'] = 'Small package sent recorded 1st Class by Royal Mail.';
                        $deliveryOption['price'] = 7.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 7;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 2:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Economy';
                        $deliveryOption['description'] = 'Package sent economy service by courier DPD.';
                        $deliveryOption['price'] = 7.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 7;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Parcel Delivery Express';
                        $deliveryOption['description'] = 'Package sent express service by courier DPD.';
                        $deliveryOption['price'] = 15.95;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 3;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 8;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 3:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 89;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 12;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 4:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 149;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 14;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                    case 5:
                        $deliveryOption = array();
                        $deliveryOption['service'] = 'Pallet Delivery Service';
                        $deliveryOption['description'] = 'Pallet service by Palletways. This is a doorstep delivery service only. The driver will <strong>NOT</strong> take goods into the property. This service is subject to lorry access.';
                        $deliveryOption['price'] = 149;
                        $deliveryOption['estimatedDeliveryDaysStart'] = 5;
                        $deliveryOption['estimatedDeliveryDaysEnd'] = 14;
                        $deliveryOptions[] = $deliveryOption;
                        break;
                }
                break;
            default:
        }

        return $deliveryOptions;
    }

    public function calculateEstimatedDeliveryDays($deliveryOptions, $service)
    {
        // Calculate the weightings and overall band
        $estimatedDeliveryDays = array('start' => '', 'end' => '', 'requested' => '');

        // Get the default delivery charge
        foreach ($deliveryOptions as $deliveryOption)
        {
            if ($deliveryOption['service'] == $service)
            {
                // Work out next day for delivery option
                $nextDay = $deliveryOption['estimatedDeliveryDaysStart'];

                // If delivery passes cut off time
                if (date("G") > self::CUT_OFF_TIME)
                {
                    $nextDay++;
                }

                // Check if delivery date start does not fall on a Saturday or Sunday
                $weekendDaysToAdd = 0;
                for ($deliveryDateCount = 1; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
                {
                    if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
                    {
                        $weekendDaysToAdd++;
                    }
                }
                $nextDay += $weekendDaysToAdd;

                // Check that start date does not fall on a weekend
                if (date("l", strtotime("+$nextDay day")) == 'Saturday')
                {
                    $nextDay += 2;
                } elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
                    $nextDay++;
                }

                $deliveryStartDate = $nextDay;
                $estimatedDeliveryDaysStart = date("l, jS F Y", strtotime("+$nextDay day"));
                $nextDay = $nextDay + ($deliveryOption['estimatedDeliveryDaysEnd'] - 1);
                $weekendDaysToAdd = 0;
                for ($deliveryDateCount = $deliveryStartDate; $deliveryDateCount <= $nextDay; $deliveryDateCount++)
                {
                    if ((date("l", strtotime("+$deliveryDateCount day")) == 'Saturday') || (date("l", strtotime("+$deliveryDateCount day")) == 'Sunday'))
                    {
                        $weekendDaysToAdd++;
                    }
                }
                $nextDay += $weekendDaysToAdd;

                // Check that start date does not fall on a weekend
                if (date("l", strtotime("+$nextDay day")) == 'Saturday')
                {
                    $nextDay += 2;
                } elseif (date("l", strtotime("+$nextDay day")) == 'Sunday') {
                    $nextDay++;
                }

                $estimatedDeliveryDaysEnd = date("l, jS F Y", strtotime("+$nextDay day"));
                $estimatedDeliveryDays['start'] = $estimatedDeliveryDaysStart;
                $estimatedDeliveryDays['end'] = $estimatedDeliveryDaysEnd;
                $nextDay++;

                $estimatedDeliveryDays['requested'] = date("F d, Y H:i:s", strtotime("+$nextDay day"));
            }
        }

        return $estimatedDeliveryDays;
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
                    $weighting = $weighting + 1 * $item->getQuantity();
                    break;
                case 2:
                    $weighting = $weighting + 5 * $item->getQuantity();
                    break;
                case 3:
                    $weighting = $weighting + 25 * $item->getQuantity();
                    break;
                case 4:
                    $weighting = $weighting + 75 * $item->getQuantity();
                    break;
                case 5:
                    $weighting = $weighting + 75000 * $item->getQuantity();
                    break;
                case 6:
                    $weighting = $weighting + 75000000 * $item->getQuantity();
                    break;
            }
        }

        return $weighting;
    }

    public function calculatePrice($deliveryOptions, $service)
    {
        if($service === '' && count($deliveryOptions) > 0)
        {
            return $deliveryOptions[0]['price'];
        } else {
            foreach($deliveryOptions as $item)
            {
                if($item['service'] === $service)
                {
                    return $item['price'];
                }
            }
        }

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