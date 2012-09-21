<?php

/* WebIlluminationAdminBundle:Orders:listingPaymentInformation.html.twig */
class __TwigTemplate_dbe9db11f0b9e65401f4ad15e3c2430b extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-payment-information-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t";
        // line 2
        if ((($this->getAttribute($this->getContext($context, "order"), "paymentType") == "PayPal through SagePay") || ($this->getAttribute($this->getContext($context, "order"), "paymentType") == "SagePay"))) {
            // line 3
            echo "\t\t<h5 class=\"no-margin-top\">Payment Information</h5>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Payment Type:</label></td>
\t\t\t\t<td width=\"30%\">";
            // line 7
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "paymentType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "paymentType"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Amount:</label></td>
\t\t\t\t<td width=\"30%\">&pound;";
            // line 9
            echo twig_escape_filter($this->env, _twig_default_filter(twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "-"), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Transaction Status:</label></td>
\t\t\t\t<td width=\"30%\">";
            // line 13
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Status", array(), "any", true, true)) ? ((($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Status", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Status"), "-")) : ("-"))) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Authorisation Code:</label></td>
\t\t\t\t<td width=\"30%\">";
            // line 15
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "TxAuthNo", array(), "any", true, true)) ? ((($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "TxAuthNo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "TxAuthNo"), "-")) : ("-"))) : ("-")), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Status Information:</label></td>
\t\t\t\t<td colspan=\"3\" width=\"80%\">";
            // line 19
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "StatusDetail", array(), "any", true, true)) ? ((($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "StatusDetail", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "StatusDetail"), "-")) : ("-"))) : ("-")), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Unique Transaction ID:</label></td>
\t\t\t\t<td colspan=\"3\" width=\"80%\">";
            // line 23
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "VPSTxId", array(), "any", true, true)) ? ((($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "VPSTxId", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "VPSTxId"), "-")) : ("-"))) : ("-")), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t</table>
\t";
        }
        // line 27
        echo "\t<h5>Standard Fraud Checks</h5>
\t<table width=\"100%\">
\t\t<tr>
\t\t\t<td class=\"label\" width=\"40%\"><label>Has customer ordered before?</label></td>
\t\t\t<td width=\"10%\"";
        // line 31
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckCustomerOrdered") == 1)) ? (" class=\"green\"") : (" class=\"amber\""));
        echo ">";
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckCustomerOrdered") == 1)) ? ("YES") : ("NO"));
        echo "</td>
\t\t\t<td class=\"label\" width=\"40%\"><label>Is the billing and delivery address the same?</label></td>
\t\t\t<td width=\"10%\"";
        // line 33
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckAddressMatch") == 1)) ? (" class=\"green\"") : (" class=\"amber\""));
        echo ">";
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckAddressMatch") == 1)) ? ("YES") : ("NO"));
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"40%\"><label>Name found on a different order?</label></td>
\t\t\t<td width=\"10%\"";
        // line 37
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckNameUsedOnDifferentOrder") == 1)) ? (" class=\"red\"") : (" class=\"green\""));
        echo ">";
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckNameUsedOnDifferentOrder") == 1)) ? ("YES") : ("NO"));
        echo "</td>
\t\t\t<td class=\"label\" width=\"40%\"><label>Post code found on a different order?</label></td>
\t\t\t<td width=\"10%\"";
        // line 39
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckPostZipCodeUsedOnDifferentOrder") == 1)) ? (" class=\"red\"") : (" class=\"green\""));
        echo ">";
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckPostZipCodeUsedOnDifferentOrder") == 1)) ? ("YES") : ("NO"));
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"40%\"><label>Telphone number found on a different order?</label></td>
\t\t\t<td width=\"10%\"";
        // line 43
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckTelephoneUsedOnDifferentOrder") == 1)) ? (" class=\"red\"") : (" class=\"green\""));
        echo ">";
        echo ((($this->getAttribute($this->getContext($context, "order"), "fraudCheckTelephoneUsedOnDifferentOrder") == 1)) ? ("YES") : ("NO"));
        echo "</td>
\t\t\t<td colspan=\"2\" width=\"50%\">&nbsp;</td>
\t\t</tr>
\t</table>
\t";
        // line 47
        if (($this->getAttribute($this->getContext($context, "order"), "paymentType") == "PayPal through SagePay")) {
            // line 48
            echo "\t\t<h5>PayPal Fraud Checks</h5>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Address Status:</label></td>
\t\t\t\t";
            // line 52
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressStatus", array(), "any", true, true)) {
                // line 53
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AddressStatus") == "CONFIRMED")) {
                    echo " class=\"green\"";
                } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AddressStatus") == "UNCONFIRMED")) {
                    echo " class=\"red\"";
                } else {
                    echo " class=\"amber\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressStatus", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressStatus"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 55
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t<td class=\"label\" width=\"20%\"><label>Payer Status:</label></td>
\t\t\t\t";
            // line 58
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PayerStatus", array(), "any", true, true)) {
                // line 59
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "PayerStatus") == "VERIFIED")) {
                    echo " class=\"green\"";
                } else {
                    echo " class=\"red\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PayerStatus", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PayerStatus"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 61
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 63
            echo "\t\t\t</tr>
\t\t</table>
\t";
        } elseif (($this->getAttribute($this->getContext($context, "order"), "paymentType") == "SagePay")) {
            // line 66
            echo "\t\t<h5>SagePay Fraud Checks</h5>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Card Type:</label></td>
\t\t\t\t";
            // line 70
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CardType", array(), "any", true, true)) {
                // line 71
                echo "\t\t\t\t\t<td width=\"30%\">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CardType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CardType"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 73
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t<td class=\"label\" width=\"20%\"><label>Card Number:</label></td>
\t\t\t\t";
            // line 76
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Last4Digits", array(), "any", true, true)) {
                // line 77
                echo "\t\t\t\t\t<td width=\"30%\">";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "Last4Digits") > 0)) {
                    echo "**** **** **** ";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Last4Digits", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "Last4Digits"), "-")) : ("-")), "html", null, true);
                } else {
                    echo "-";
                }
                echo "</td>
\t\t\t\t";
            } else {
                // line 79
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 81
            echo "\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Address Check:</label></td>
\t\t\t\t";
            // line 84
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressResult", array(), "any", true, true)) {
                // line 85
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AddressResult") == "MATCHED")) {
                    echo " class=\"green\"";
                } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AddressResult") == "NOTMATCHED")) {
                    echo " class=\"red\"";
                } else {
                    echo " class=\"amber\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressResult", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AddressResult"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 87
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 89
            echo "\t\t\t\t<td class=\"label\" width=\"20%\"><label>Post Code Check:</label></td>
\t\t\t\t";
            // line 90
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PostCodeResult", array(), "any", true, true)) {
                // line 91
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "PostCodeResult") == "MATCHED")) {
                    echo " class=\"green\"";
                } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "PostCodeResult") == "NOTMATCHED")) {
                    echo " class=\"red\"";
                } else {
                    echo " class=\"amber\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PostCodeResult", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "PostCodeResult"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 93
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 95
            echo "\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>AVS/CV2 Check:</label></td>
\t\t\t\t";
            // line 98
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AVSCV2", array(), "any", true, true)) {
                // line 99
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AVSCV2") == "ALL MATCH")) {
                    echo " class=\"green\"";
                } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "AVSCV2") == "NO DATA MATCHES")) {
                    echo " class=\"red\"";
                } else {
                    echo " class=\"amber\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AVSCV2", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "AVSCV2"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 101
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 103
            echo "\t\t\t\t<td class=\"label\" width=\"20%\"><label>CV2 Result:</label></td>
\t\t\t\t";
            // line 104
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CV2Result", array(), "any", true, true)) {
                // line 105
                echo "\t\t\t\t\t<td width=\"30%\"";
                if (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "CV2Result") == "MATCHED")) {
                    echo " class=\"green\"";
                } elseif (($this->getAttribute($this->getAttribute($this->getContext($context, "order"), "paymentResponse"), "CV2Result") == "NOTMATCHED")) {
                    echo " class=\"red\"";
                } else {
                    echo " class=\"amber\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CV2Result", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentResponse", array(), "any", false, true), "CV2Result"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t\t\t";
            } else {
                // line 107
                echo "\t\t\t\t\t<td width=\"30%\">-</td>
\t\t\t\t";
            }
            // line 109
            echo "\t\t\t</tr>
\t\t\t
\t\t</table>
\t";
        }
        // line 113
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingPaymentInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 63,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 52,  117 => 48,  115 => 47,  106 => 43,  97 => 39,  90 => 37,  81 => 33,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  42 => 13,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 27,  110 => 26,  104 => 25,  98 => 24,  92 => 23,  86 => 22,  80 => 21,  74 => 31,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 15,  17 => 1,);
    }
}
