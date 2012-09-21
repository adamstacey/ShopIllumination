<?php

/* WebIlluminationShopBundle:Checkout:ajaxGetOrderInformation.html.twig */
class __TwigTemplate_ac286ed0be97438290c04052290a793b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"order-summary clearfix separator\">
\t";
        // line 2
        if (($this->getAttribute($this->getContext($context, "order"), "paymentAttempt") > 1)) {
            // line 3
            echo "\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p class=\"small-message\">We have noticed you are having problems placing the order. Please check the details below and make any required changes. If you have any further problems please <a href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
            echo "\">contact us</a>.</p>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t";
        }
        // line 9
        echo "\t<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t<tr>
\t\t\t<th width=\"50%\" class=\"al\">Payment Method</th>
\t\t\t<th width=\"50%\" class=\"al\">Delivery Method<a href=\"Javascript:void(0);\" data-checkout-section=\"step-4\" class=\"fr small button ui-button-orange action-go-to-checkout-section\">Change</a></th>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"50%\" class=\"al\">";
        // line 15
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "paymentType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "paymentType"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t<td width=\"50%\" class=\"al\">";
        // line 16
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryType"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<th width=\"50%\" class=\"al\">Billing Address<a href=\"Javascript:void(0);\" data-checkout-section=\"step-3\" class=\"fr small button ui-button-orange action-go-to-checkout-section\">Change</a></th>
\t\t\t<th width=\"50%\" class=\"al\">Delivery Address<a href=\"Javascript:void(0);\" data-checkout-section=\"step-4\" class=\"fr small button ui-button-orange action-go-to-checkout-section\">Change</a></th>
\t\t</tr>
\t\t<tr>
\t\t\t<td width=\"50%\" class=\"al\">";
        // line 23
        ob_start();
        // line 24
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 25
        if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
            // line 26
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 28
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 29
        if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
            // line 30
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 32
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 33
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
            // line 34
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 36
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
            // line 37
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 39
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            // line 40
            echo "\t\t\t\t\tRepublic of Ireland
\t\t\t\t";
        }
        // line 42
        echo "\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</td>
\t\t\t<td width=\"50%\" class=\"al\">";
        // line 43
        ob_start();
        // line 44
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 45
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
            // line 46
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 49
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
            // line 50
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 52
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 53
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
            // line 54
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 56
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
            // line 57
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 59
        echo "\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
            // line 60
            echo "\t\t\t\t\tRepublic of Ireland
\t\t\t\t";
        }
        // line 62
        echo "\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</td>
\t\t</tr>
\t</table>
\t";
        // line 65
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
            // line 66
            echo "\t\t<div class=\"spacer\"></div>
\t\t<div class=\"info-message ui-status-highlight no-margin-bottom\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p class=\"small-message\">Please note that the billing and delivery address are the same for all orders from the Republic of Ireland.</p>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t";
        }
        // line 73
        echo "</div>
<div id=\"basket-contents\" class=\"clearfix separator\">
\t";
        // line 75
        if (((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "basket"), "products")) > 0) || ($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "discounts"), "membershipCardNumber") != ""))) {
            // line 76
            echo "\t\t<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t\t<tr>
\t\t\t\t<th class=\"al\">Product</th>
\t\t\t\t<th class=\"ac\">Code</th>
\t\t\t\t<th class=\"ac\" colspan=\"5\" width=\"1\">Price</th>
\t\t\t</tr>
\t\t\t";
            // line 82
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "basket"), "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 83
                echo "\t\t\t\t<tr>
\t\t\t\t\t<td>
\t\t\t\t\t\t<a href=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "product"), "url"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t";
                // line 86
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                    // line 87
                    echo "\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t";
                    // line 88
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels"));
                    $context['loop'] = array(
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    );
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["selectedOptionLabel"]) {
                        // line 89
                        echo "\t\t\t\t\t\t\t\t";
                        echo $this->getContext($context, "selectedOptionLabel");
                        if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                            echo "<br />";
                        }
                        // line 90
                        echo "\t\t\t\t\t\t\t";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedOptionLabel'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 91
                    echo "\t\t\t\t\t\t";
                }
                // line 92
                echo "\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"ac\"><strong>";
                // line 93
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
                echo "</strong></td>
\t\t\t\t\t<td width=\"1\" class=\"ac\">";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                echo "</td>
\t\t\t\t\t<td width=\"1\" class=\"ac\">&times;</td>
\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
                // line 96
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t<td width=\"1\" class=\"ac\">=</td>
\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
                // line 98
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
                echo "</td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 101
            echo "\t\t</table>
\t";
        } else {
            // line 103
            echo "\t\t<p>Sorry, you haven't added anything to your basket.</p>
\t";
        }
        // line 105
        echo "</div>
<div id=\"basket-totals\" class=\"clearfix separator\">
\t<table align=\"right\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t";
        // line 108
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "recommendedRetailPrice") > $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "subTotal"))) {
            // line 109
            echo "\t\t\t<tr>
\t\t\t\t<td>&nbsp;</td>
\t\t\t\t<td class=\"al\"><strong>RRP (inc. VAT):</strong></td>
\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
            // line 112
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "recommendedRetailPrice"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 115
        echo "\t\t<tr>
\t\t\t<td>&nbsp;</td>
\t\t\t<td class=\"al\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 118
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "subTotal"), 2), "html", null, true);
        echo "</strong></td>
\t\t</tr>
\t\t";
        // line 120
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "savings") > 0)) {
            // line 121
            echo "\t\t\t<tr>
\t\t\t\t<td>&nbsp;</td>
\t\t\t\t<td class=\"al\"><strong>You Save:</strong></td>
\t\t\t\t<td width=\"1\" class=\"price free ar\">&pound;";
            // line 124
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "savings"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 127
        echo "\t\t<tr>
\t\t\t<td>&nbsp;</td>
\t\t\t<td class=\"al\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t";
        // line 130
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "deliveryCharge") == 0)) {
            // line 131
            echo "\t\t\t\t<td width=\"1\" class=\"price free ar\">FREE<input type=\"hidden\" id=\"delivery-charge\" value=\"FREE\" /></td>
\t\t\t";
        } else {
            // line 133
            echo "\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "deliveryCharge"), 2), "html", null, true);
            echo "<input type=\"hidden\" id=\"delivery-charge\" value=\"&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "deliveryCharge"), 2), "html", null, true);
            echo "\" /></td>
\t\t\t";
        }
        // line 135
        echo "\t\t</tr>
\t\t";
        // line 136
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "discount") > 0)) {
            // line 137
            echo "\t\t\t<tr>
\t\t\t\t<td>&nbsp;</td>
\t\t\t\t<td class=\"al\"><strong>Discount:</strong></td>
\t\t\t\t<td width=\"1\" class=\"discount ar\">&pound;";
            // line 140
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "discount"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 143
        echo "\t\t<tr>
\t\t\t<td>&nbsp;</td>
\t\t\t<td class=\"al\"><strong>Total to Pay (inc. VAT):</strong></td>
\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 146
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "total"), 2), "html", null, true);
        echo "</strong></td>
\t\t</tr>
\t</table>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Checkout:ajaxGetOrderInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  530 => 163,  504 => 149,  498 => 147,  492 => 144,  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 158,  435 => 367,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 152,  472 => 167,  456 => 382,  440 => 151,  377 => 125,  313 => 136,  281 => 96,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 89,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 153,  386 => 127,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 148,  396 => 131,  364 => 157,  348 => 146,  336 => 181,  310 => 109,  304 => 120,  18 => 1,  489 => 143,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 126,  350 => 224,  315 => 112,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 157,  515 => 211,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 168,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 119,  328 => 86,  325 => 117,  316 => 166,  278 => 98,  250 => 68,  163 => 104,  523 => 216,  516 => 154,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 141,  462 => 133,  447 => 180,  438 => 172,  393 => 257,  373 => 140,  370 => 240,  368 => 137,  361 => 285,  342 => 145,  329 => 142,  326 => 118,  319 => 131,  288 => 102,  229 => 88,  206 => 75,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 122,  344 => 127,  219 => 157,  273 => 214,  263 => 107,  246 => 89,  234 => 64,  217 => 69,  173 => 100,  309 => 108,  285 => 80,  280 => 235,  276 => 94,  262 => 92,  235 => 189,  232 => 175,  212 => 76,  207 => 152,  143 => 50,  157 => 97,  366 => 136,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 112,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 130,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 87,  187 => 66,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 60,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 42,  208 => 92,  183 => 101,  166 => 62,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 143,  375 => 151,  371 => 152,  363 => 135,  359 => 93,  355 => 133,  351 => 131,  347 => 101,  331 => 120,  323 => 145,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 109,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 107,  210 => 82,  180 => 55,  172 => 64,  168 => 44,  149 => 52,  139 => 85,  240 => 99,  230 => 82,  121 => 44,  257 => 195,  249 => 88,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 113,  255 => 193,  244 => 107,  214 => 83,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 16,  487 => 142,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 145,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 123,  352 => 91,  338 => 124,  333 => 121,  327 => 118,  324 => 289,  320 => 168,  297 => 105,  274 => 96,  256 => 90,  254 => 89,  252 => 90,  231 => 127,  216 => 95,  213 => 58,  202 => 76,  458 => 139,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 116,  414 => 354,  410 => 164,  405 => 134,  391 => 129,  387 => 171,  384 => 146,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 103,  284 => 100,  270 => 122,  266 => 91,  261 => 70,  247 => 191,  243 => 86,  238 => 107,  220 => 79,  201 => 74,  194 => 71,  130 => 46,  100 => 43,  85 => 32,  76 => 33,  112 => 16,  101 => 37,  98 => 36,  272 => 93,  269 => 92,  228 => 81,  221 => 80,  197 => 72,  184 => 60,  138 => 80,  118 => 92,  105 => 23,  66 => 26,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 73,  192 => 120,  189 => 119,  178 => 62,  176 => 110,  165 => 57,  161 => 100,  152 => 88,  148 => 42,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 33,  54 => 8,  133 => 34,  124 => 42,  111 => 64,  107 => 39,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 30,  88 => 34,  78 => 30,  75 => 17,  71 => 21,  464 => 178,  459 => 160,  454 => 105,  449 => 155,  443 => 152,  429 => 166,  425 => 165,  420 => 143,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 115,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 174,  287 => 77,  282 => 76,  268 => 128,  264 => 112,  259 => 123,  245 => 67,  241 => 85,  236 => 84,  222 => 158,  218 => 85,  159 => 60,  154 => 53,  151 => 57,  145 => 77,  136 => 48,  128 => 45,  125 => 47,  119 => 43,  110 => 40,  96 => 33,  93 => 29,  91 => 17,  68 => 16,  65 => 18,  63 => 13,  43 => 12,  50 => 19,  25 => 8,  92 => 34,  86 => 25,  79 => 30,  46 => 11,  37 => 4,  33 => 9,  27 => 2,  82 => 27,  72 => 28,  64 => 25,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 3,  23 => 6,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 5,  22 => 3,  224 => 86,  215 => 59,  211 => 178,  204 => 61,  200 => 75,  195 => 54,  193 => 46,  190 => 92,  188 => 69,  185 => 65,  179 => 66,  177 => 65,  171 => 59,  162 => 56,  158 => 132,  156 => 54,  153 => 58,  146 => 41,  142 => 55,  137 => 86,  131 => 31,  126 => 92,  120 => 44,  117 => 50,  103 => 37,  99 => 23,  77 => 29,  74 => 29,  57 => 24,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 39,  104 => 58,  102 => 17,  94 => 21,  89 => 31,  87 => 36,  84 => 23,  81 => 22,  73 => 28,  70 => 15,  67 => 19,  62 => 14,  59 => 13,  55 => 23,  51 => 7,  48 => 8,  41 => 15,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
