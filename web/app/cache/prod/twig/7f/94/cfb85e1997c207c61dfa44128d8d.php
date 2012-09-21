<?php

/* WebIlluminationAdminBundle:Orders:ajaxGetListing.html.twig */
class __TwigTemplate_7f94cfb85e1997c207c61dfa44128d8d extends Twig_Template
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
        echo "<table class=\"data-table\" id=\"data\" width=\"100%\">
\t<thead>
\t\t<tr>
\t\t\t<th width=\"19\" class=\"ac\"><input type=\"checkbox\" class=\"action-select-all\" value=\"1\" /></th>
\t\t\t<th class=\"ac\">No.</th>
\t\t\t<th class=\"ac\">Status</th>
\t\t\t<th class=\"ac\">Total</th>
\t\t\t<th width=\"82\" colspan=\"2\" class=\"ac\">Payment</th>
\t\t\t<th class=\"ac\">Customer</th>
\t\t\t<th class=\"ac\">Date</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "orders"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            echo "\t
\t\t\t<tr class=\"order ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "statusColour"), "html", null, true);
            echo "\" id=\"order-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"order-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" value=\"1\" autocomplete=\"off\" /></td>
\t\t\t\t<td class=\"ac small\"><a href=\"Javascript:void(0);\" data-id=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"action-view-order-items\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "</a></td>
\t\t\t\t<td class=\"ac ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "statusColour"), "html", null, true);
            echo "\">
\t\t\t\t\t<select id=\"form-order-status-";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"action-order-status\">
\t\t\t\t\t\t<option";
            // line 21
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Cancelled")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Cancelled\">Cancelled</option>
\t\t\t\t\t\t<option";
            // line 22
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Open Payment")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Open Payment\">Open Payment</option>
\t\t\t\t\t\t<option";
            // line 23
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Processing Your Order")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Processing Your Order\">Processing Your Order</option>
\t\t\t\t\t\t<option";
            // line 24
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Back Ordered")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Back Ordered\">Back Ordered</option>
\t\t\t\t\t\t<option";
            // line 25
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Part Shipped")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Part Shipped\">Part Shipped</option>
\t\t\t\t\t\t<option";
            // line 26
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Payment Failed")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Payment Failed\">Payment Failed</option>
\t\t\t\t\t\t<option";
            // line 27
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Payment Received")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Payment Received\">Payment Received</option>
\t\t\t\t\t\t<option";
            // line 28
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Refunded")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Refunded\">Refunded</option>
\t\t\t\t\t\t<option";
            // line 29
            if (($this->getAttribute($this->getContext($context, "order"), "status") == "Order Completed")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"Order Completed\">Order Completed</option>
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t\t<td class=\"ac small\">&pound;";
            // line 32
            echo twig_escape_filter($this->env, _twig_default_filter(twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "0.00"), "html", null, true);
            echo "</td>
\t\t\t\t<td width=\"22\" class=\"ac small\"><img data-id=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"no-border action-view-payment-information\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "order"), "paymentResponseFraudIcon")), "html", null, true);
            echo "\" border=\"0\" alt=\"Fraud Status\" /></td>
\t\t\t\t<td width=\"60\" class=\"ac small\"><img data-id=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"no-border action-view-payment-information\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "order"), "paymentTypeLogo")), "html", null, true);
            echo "\" border=\"0\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "paymentType"), "html", null, true);
            echo "\" /></td>
\t\t\t\t<td class=\"ac small\"><a href=\"Javascript:void(0);\" data-id=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"action-view-customer\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "firstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "lastName"), "html", null, true);
            echo "</a></td>
\t\t\t\t<td class=\"ac small\">";
            // line 36
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "createdAt"), "d/m/Y h:iA"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac no-wrap\">
\t\t\t\t\t<img class=\"action-buttons-spacer\" src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"1\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete-order\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<button data-id=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none";
            if ((($this->getAttribute($this->getContext($context, "order"), "statusColour") == "green") || ($this->getAttribute($this->getContext($context, "order"), "statusColour") == "amber"))) {
                echo " action-view-documents";
                if (($this->getAttribute($this->getContext($context, "order"), "orderPrinted") > 0)) {
                    echo " ui-button-green";
                } else {
                    echo " ui-button-yellow";
                }
            } else {
                echo " disabled";
            }
            echo " button\" data-icon-primary=\"ui-icon-document\" data-icon-only=\"true\">Documents</button>
\t\t\t\t\t<button data-id=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-notes button\" data-icon-primary=\"ui-icon-comment\"";
            if (($this->getAttribute($this->getContext($context, "order"), "notesCount") > 0)) {
                echo " data-notification=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "notesCount"), "html", null, true);
                echo "\"";
            }
            echo " data-icon-only=\"true\">Notes</button>
\t\t\t\t\t<button data-id=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-order-items button\" data-icon-primary=\"ui-icon-cart\" data-notification=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "items"), "html", null, true);
            echo "\" data-icon-only=\"true\">Order Items</button>
\t\t\t\t\t<button data-id=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-discounts button";
            if (((($this->getAttribute($this->getContext($context, "order"), "voucherCode") != "") || ($this->getAttribute($this->getContext($context, "order"), "giftVoucherCode") > 0)) || ($this->getAttribute($this->getContext($context, "order"), "membershipCardNumber") > 0))) {
                echo " ui-button-green";
            }
            echo "\" data-icon-primary=\"ui-icon-tag\" data-icon-only=\"true\">Discounts</button>
\t\t\t\t\t<button data-id=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-customer button\" data-icon-primary=\"ui-icon-contact\" data-icon-only=\"true\">Customer</button>
\t\t\t\t\t<button data-id=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-delivery-information button";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                echo " ui-button-yellow";
            }
            echo "\" data-icon-primary=\"ui-icon-clipboard\" data-icon-only=\"true\">Delivery Information</button>
\t\t\t\t\t<button data-id=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl action-view-payment-information button\" data-icon-primary=\"ui-icon-calculator\" data-icon-only=\"true\">Payment Information</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"9\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 58
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingPaymentInformation.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 59
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingDeliveryInformation.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 60
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingCustomer.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 61
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingDiscounts.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 62
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingOrderItems.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 63
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingNotes.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 64
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingDocuments.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 65
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingConfirmDelete.html.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"))));
            // line 66
            echo "\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 70
        echo "\t</tbody>
</table>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#data :checkbox:not(.no-uniform), #data :radio:not(.no-uniform), #data select:not(.no-uniform), #data :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#data .button\").each(function () {
            \$(this).button({
            \ticons: {
                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
                }, 
               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
        \t});
        \tvar \$dataNotification = \$(this).attr(\"data-notification\");
        \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
        \t{
        \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
        \t}
        });
        \$(\".message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find('.message-close').click(function () {
\t    \t\$(this).parent().fadeOut();
\t    });
\t    
\t    ";
        // line 94
        echo "\t\tvar \$actionButtonsWidth = 0;
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-confirm-delete-order:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-documents:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-notes:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-order-items:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-discounts:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-customer:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-payment-information:eq(0)\").outerWidth(true);
\t\t\$(\".action-buttons-spacer\").width(\$actionButtonsWidth).attr(\"width\", \$actionButtonsWidth);
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 47,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 719,  778 => 704,  748 => 675,  721 => 649,  695 => 625,  651 => 584,  630 => 565,  604 => 541,  561 => 501,  540 => 482,  514 => 458,  450 => 399,  354 => 308,  344 => 300,  219 => 46,  273 => 86,  263 => 83,  246 => 59,  234 => 78,  217 => 77,  173 => 60,  309 => 94,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 44,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 418,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 50,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 123,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 66,  258 => 63,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 64,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 31,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 217,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 42,  170 => 59,  210 => 47,  180 => 59,  172 => 40,  168 => 58,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 60,  106 => 23,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 62,  244 => 58,  214 => 76,  198 => 71,  181 => 89,  167 => 38,  160 => 54,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 61,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 70,  270 => 122,  266 => 36,  261 => 64,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 43,  194 => 71,  130 => 23,  100 => 22,  85 => 30,  76 => 21,  112 => 35,  101 => 38,  98 => 24,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 25,  105 => 33,  66 => 21,  56 => 21,  115 => 29,  83 => 27,  164 => 63,  140 => 33,  58 => 17,  21 => 4,  61 => 23,  36 => 3,  209 => 75,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 63,  176 => 41,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 55,  123 => 52,  109 => 63,  90 => 37,  54 => 8,  133 => 40,  124 => 54,  111 => 45,  107 => 35,  80 => 21,  69 => 17,  60 => 16,  52 => 16,  97 => 39,  95 => 29,  88 => 26,  78 => 24,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 275,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 65,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 35,  151 => 50,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 114,  110 => 26,  96 => 35,  93 => 28,  91 => 33,  68 => 27,  65 => 42,  63 => 17,  43 => 13,  50 => 13,  25 => 7,  92 => 23,  86 => 22,  79 => 23,  46 => 13,  37 => 3,  33 => 15,  27 => 9,  82 => 22,  72 => 18,  64 => 18,  53 => 32,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 6,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 88,  215 => 45,  211 => 106,  204 => 98,  200 => 71,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 137,  162 => 36,  158 => 72,  156 => 41,  153 => 54,  146 => 34,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 88,  103 => 29,  99 => 19,  77 => 14,  74 => 20,  57 => 16,  47 => 27,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 28,  116 => 27,  113 => 46,  108 => 30,  104 => 25,  102 => 61,  94 => 21,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 21,  70 => 19,  67 => 19,  62 => 11,  59 => 37,  55 => 16,  51 => 15,  48 => 23,  41 => 22,  38 => 12,  35 => 7,  31 => 8,  28 => 11,);
    }
}
