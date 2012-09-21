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
        return array (  309 => 94,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 62,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 44,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 34,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 27,  110 => 26,  104 => 25,  98 => 24,  92 => 23,  86 => 22,  80 => 21,  74 => 20,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 15,  17 => 1,);
    }
}
