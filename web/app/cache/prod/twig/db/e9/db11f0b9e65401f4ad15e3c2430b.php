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
        return array (  309 => 113,  285 => 105,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 84,  207 => 81,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 75,  150 => 46,  260 => 98,  155 => 48,  223 => 116,  186 => 103,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 91,  174 => 35,  182 => 37,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 79,  114 => 31,  208 => 58,  183 => 73,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 55,  240 => 191,  230 => 182,  121 => 34,  257 => 222,  249 => 119,  106 => 43,  334 => 31,  294 => 25,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 85,  198 => 93,  181 => 89,  167 => 50,  160 => 61,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 68,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 164,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 14,  76 => 21,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 32,  105 => 84,  66 => 21,  56 => 29,  115 => 47,  83 => 11,  164 => 63,  140 => 43,  58 => 6,  21 => 4,  61 => 23,  36 => 4,  209 => 85,  205 => 69,  196 => 79,  192 => 77,  189 => 53,  178 => 36,  176 => 47,  165 => 75,  161 => 42,  152 => 90,  148 => 59,  141 => 42,  134 => 42,  132 => 53,  127 => 87,  123 => 52,  109 => 63,  90 => 37,  54 => 19,  133 => 95,  124 => 33,  111 => 29,  107 => 30,  80 => 34,  69 => 20,  60 => 20,  52 => 16,  97 => 39,  95 => 26,  88 => 26,  78 => 25,  75 => 72,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 31,  96 => 18,  93 => 17,  91 => 40,  68 => 27,  65 => 18,  63 => 17,  43 => 21,  50 => 14,  25 => 7,  92 => 28,  86 => 24,  79 => 13,  46 => 13,  37 => 11,  33 => 10,  27 => 8,  82 => 22,  72 => 29,  64 => 8,  53 => 31,  49 => 6,  44 => 11,  42 => 13,  34 => 3,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 7,  26 => 6,  22 => 2,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 76,  179 => 48,  177 => 71,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 48,  103 => 29,  99 => 19,  77 => 25,  74 => 31,  57 => 15,  47 => 15,  39 => 19,  32 => 13,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 33,  113 => 36,  108 => 30,  104 => 30,  102 => 61,  94 => 33,  89 => 53,  87 => 38,  84 => 49,  81 => 33,  73 => 22,  70 => 19,  67 => 26,  62 => 17,  59 => 22,  55 => 14,  51 => 70,  48 => 23,  41 => 24,  38 => 3,  35 => 9,  31 => 13,  28 => 11,);
    }
}