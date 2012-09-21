<?php

/* WebIlluminationShopBundle:Checkout:orderInformation.html.twig */
class __TwigTemplate_7304d95ac6f01f1920b50efa96558b5a extends Twig_Template
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
        echo "<div class=\"grid_3 leading\">
    <div class=\"portlet\">
        <section id=\"your-details-1\">
\t\t\t<dl>
\t\t\t\t<dt>Name:</dt>
\t\t\t\t\t<dd>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "lastName"), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Company:</dt>
\t\t\t\t\t<dd>";
        // line 8
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingOrganisationName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingOrganisationName"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Email Address:</dt>
\t\t\t\t\t<dd>";
        // line 10
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "emailAddress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "emailAddress"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t</dl>
\t\t\t<div class=\"clear\"></div>
        </section>
    </div>
</div>
<div class=\"grid_3 leading\">
    <div class=\"portlet\">
        <section id=\"your-details-2\">
\t\t\t<dl>
\t\t\t\t<dt>Telephone (Daytime):</dt>
\t\t\t\t\t<dd>";
        // line 21
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Telephone (Evening):</dt>
\t\t\t\t\t<dd>";
        // line 23
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Mobile:</dt>
\t\t\t\t\t<dd>";
        // line 25
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "mobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "mobile"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t</dl>
\t\t\t<div class=\"clear\"></div>
        </section>
    </div>
</div>
<div class=\"clear\"></div>
";
        // line 32
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
            // line 33
            echo "\t<div class=\"grid_6 leading\">
\t    <div class=\"portlet\">
\t    \t<header>
\t            <h2>Notes</h2>
\t        </header>
\t        <section>
\t\t\t\t";
            // line 39
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 40
                echo "\t\t\t\t\t<p class=\"no-margin\"><em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                echo "</em></p>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 41
            echo "\t\t\t\t\t\t\t\t\t\t
\t        </section>
\t    </div>
\t</div>
\t<div class=\"clear\"></div>
";
        }
        // line 47
        echo "<div class=\"grid_2 leading\">
    <div class=\"portlet\">
        <header>
            <h2>Order Details</h2>
        </header>
        <section id=\"order-details\">
\t\t\t<dl>
\t\t\t\t<dt>Order Number:</dt>
\t\t\t\t\t<dd>";
        // line 55
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "orderNumber", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "orderNumber"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Order Status:</dt>
\t\t\t\t\t<dd>";
        // line 57
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "status", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "status"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Order Total:</dt>
\t\t\t\t\t<dd>&pound;";
        // line 59
        echo twig_escape_filter($this->env, _twig_default_filter(twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "0.00"), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Payment Method:</dt>
\t\t\t\t\t<dd>";
        // line 61
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "paymentType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "paymentType"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t\t<dt>Delivery Method:</dt>
\t\t\t\t\t<dd";
        // line 63
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            echo " class=\"important\"";
        }
        echo ">";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryType"), "-")) : ("-")), "html", null, true);
        echo "</dd>
\t\t\t</dl>
\t\t\t<div class=\"clear\"></div>
        </section>
    </div>
</div>
<div class=\"grid_2 leading\">
    <div class=\"portlet\">
        <header>
            <h2>Billing Address</h2>
        </header>
        <section id=\"billing-address\" class=\"uppercase\">";
        // line 74
        ob_start();
        // line 75
        echo "\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
        echo "<br />
\t\t\t";
        // line 76
        if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
            // line 77
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t";
        }
        // line 79
        echo "\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t";
        // line 80
        if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
            // line 81
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t";
        }
        // line 83
        echo "\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
        echo "<br />
\t\t\t";
        // line 84
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
            // line 85
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
            echo "<br />
\t\t\t";
        }
        // line 87
        echo "\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
            // line 88
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
            echo "<br />
\t\t\t";
        }
        // line 90
        echo "\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            // line 91
            echo "\t\t\t\tRepublic of Ireland
\t\t\t";
        }
        // line 93
        echo "\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</section>
    </div>
</div>
<div class=\"grid_2 leading\">
    <div class=\"portlet\">
        <header>
            <h2>Delivery";
        // line 99
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
            echo " Address";
        }
        echo "</h2>
        </header>
        ";
        // line 101
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 102
            echo "        \t<section id=\"delivery-address\"><p class=\"important ac\">Collection</p></section>
        ";
        } else {
            // line 104
            echo "\t        <section id=\"delivery-address\" class=\"uppercase\">";
            ob_start();
            // line 105
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t";
            // line 106
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 107
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t";
            }
            // line 109
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t";
            // line 110
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 111
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t";
            }
            // line 113
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t";
            // line 114
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 115
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t";
            }
            // line 117
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                // line 118
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                echo "<br />
\t\t\t\t";
            }
            // line 120
            echo "\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                // line 121
                echo "\t\t\t\t\tRepublic of Ireland
\t\t\t\t";
            }
            // line 123
            echo "\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</section>
\t\t";
        }
        // line 125
        echo "    </div>
</div>
<div class=\"clear\"></div>
<div class=\"grid_6 leading\">
    <div class=\"portlet\">
        <header>
            <h2>Your Order</h2>
        </header>
        <section>
\t\t\t<div id=\"basket-contents\" class=\"clearfix separator\">
\t\t\t\t<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"al\">Product</th>
\t\t\t\t\t\t<th class=\"ac\">Code</th>
\t\t\t\t\t\t<th class=\"ac\" colspan=\"5\" width=\"1\">Price</th>
\t\t\t\t\t</tr>
\t\t\t\t\t";
        // line 141
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 142
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t<strong>";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "</strong>
\t\t\t\t\t\t\t\t";
            // line 145
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                // line 146
                echo "\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t";
                // line 147
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
                    // line 148
                    echo "\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                    echo $this->getContext($context, "selectedOptionLabel");
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "<br />";
                    }
                    // line 149
                    echo "\t\t\t\t\t\t\t\t\t";
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
                // line 150
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 151
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td class=\"ac\"><strong>";
            // line 152
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
            echo "</strong></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">";
            // line 153
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&times;</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
            // line 155
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">=</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
            // line 157
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 160
        echo "\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "membershipCardNumber") == 1)) {
            // line 161
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td><a href=\"";
            // line 162
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privilege_card"), "html", null, true);
            echo "\">Ride Direct Privilege Card</a></td>
\t\t\t\t\t\t\t<td class=\"ac\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">1</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&times;</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;1.00</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">=</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"ac\">&pound;1.00</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 171
        echo "\t\t\t\t</table>
\t\t\t</div>
\t\t\t<div id=\"basket-totals\" class=\"clearfix no-margin-bottom\">
\t\t\t\t<table align=\"right\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t\t\t\t";
        // line 175
        if (($this->getAttribute($this->getContext($context, "order"), "recommendedRetailPrice") > $this->getAttribute($this->getContext($context, "order"), "subTotal"))) {
            // line 176
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td class=\"al\"><strong>RRP (inc. VAT):</strong></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
            // line 179
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "recommendedRetailPrice"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 182
        echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t<td class=\"al\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 185
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "subTotal"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
        // line 187
        if (($this->getAttribute($this->getContext($context, "order"), "savings") > 0)) {
            // line 188
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td class=\"al\"><strong>You Save:</strong></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"price free ar\">&pound;";
            // line 191
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "savings"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 194
        echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t<td class=\"al\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t\t\t\t";
        // line 197
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 198
            echo "\t\t\t\t\t\t\t<td width=\"1\" class=\"important\">Collection</td>\t\t
\t\t\t\t\t\t";
        } else {
            // line 199
            echo "\t\t\t\t
\t\t\t\t\t\t\t";
            // line 200
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCharge") == 0)) {
                // line 201
                echo "\t\t\t\t\t\t\t\t<td width=\"1\" class=\"price free ar\">FREE</td>
\t\t\t\t\t\t\t";
            } else {
                // line 203
                echo "\t\t\t\t\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t";
            }
            // line 205
            echo "\t\t\t\t\t\t";
        }
        // line 206
        echo "\t\t\t\t\t</tr>
\t\t\t\t\t";
        // line 207
        if (($this->getAttribute($this->getContext($context, "order"), "discount") > 0)) {
            // line 208
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t\t<td class=\"al\"><strong>Discount:</strong></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"discount ar\">&pound;";
            // line 211
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "discount"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 214
        echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t<td class=\"al\"><strong>VAT (20%):</strong></td>
\t\t\t\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 217
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "vat"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>&nbsp;</td>
\t\t\t\t\t\t<td class=\"al\"><strong>Total to Pay (inc. VAT):</strong></td>
\t\t\t\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 222
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div>
        </section>
    </div>
</div>
<script defer=\"defer\" type=\"text/javascript\">
\t\$(document).ready(function() {
\t\tvar \$orderDetailsHeight = 0;
\t\tif (\$(\"#order-details\").height() > \$orderDetailsHeight)
\t\t{
\t\t\t\$orderDetailsHeight = \$(\"#order-details\").height();
\t\t}
\t\tif (\$(\"#billing-address\").height() > \$orderDetailsHeight)
\t\t{
\t\t\t\$orderDetailsHeight = \$(\"#billing-address\").height();
\t\t}
\t\tif (\$(\"#delivery-address\").height() > \$orderDetailsHeight)
\t\t{
\t\t\t\$orderDetailsHeight = \$(\"#delivery-address\").height();
\t\t}
\t\t\$(\"#order-details\").height(\$orderDetailsHeight);
\t\t\$(\"#billing-address\").height(\$orderDetailsHeight);
\t\t\$(\"#delivery-address\").height(\$orderDetailsHeight);
\t\t
\t\tvar \$yourDetailsHeight = 0;
\t\tif (\$(\"#your-details-1\").height() > \$yourDetailsHeight)
\t\t{
\t\t\t\$yourDetailsHeight = \$(\"#your-details-1\").height();
\t\t}
\t\tif (\$(\"#your-details-2\").height() > \$yourDetailsHeight)
\t\t{
\t\t\t\$yourDetailsHeight = \$(\"#your-details-2\").height();
\t\t}
\t\t\$(\"#your-details-1\").height(\$yourDetailsHeight);
\t\t\$(\"#your-details-2\").height(\$yourDetailsHeight);
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Checkout:orderInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  452 => 191,  733 => 657,  694 => 620,  688 => 616,  647 => 577,  633 => 565,  612 => 546,  508 => 217,  590 => 345,  582 => 343,  541 => 315,  537 => 314,  533 => 313,  442 => 254,  530 => 163,  504 => 297,  498 => 147,  492 => 208,  482 => 189,  289 => 243,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 502,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 401,  435 => 182,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 200,  456 => 382,  440 => 185,  377 => 125,  313 => 136,  281 => 96,  469 => 199,  426 => 335,  421 => 242,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 101,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 298,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 207,  485 => 417,  445 => 187,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 679,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 203,  465 => 198,  441 => 389,  431 => 148,  396 => 131,  364 => 157,  348 => 146,  336 => 181,  310 => 192,  304 => 120,  18 => 1,  489 => 433,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 175,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 126,  350 => 211,  315 => 141,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 533,  595 => 267,  581 => 196,  563 => 254,  522 => 305,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 201,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 161,  398 => 160,  389 => 157,  372 => 151,  369 => 150,  357 => 102,  341 => 288,  332 => 147,  328 => 86,  325 => 117,  316 => 166,  278 => 118,  250 => 68,  163 => 112,  523 => 216,  516 => 222,  512 => 211,  506 => 207,  500 => 451,  497 => 211,  494 => 151,  484 => 205,  462 => 133,  447 => 188,  438 => 172,  393 => 257,  373 => 140,  370 => 240,  368 => 221,  361 => 217,  342 => 145,  329 => 146,  326 => 118,  319 => 142,  288 => 102,  229 => 88,  206 => 75,  147 => 41,  227 => 102,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 107,  246 => 89,  234 => 105,  217 => 69,  173 => 81,  309 => 108,  285 => 186,  280 => 235,  276 => 94,  262 => 113,  235 => 163,  232 => 175,  212 => 149,  207 => 152,  143 => 50,  157 => 97,  366 => 136,  340 => 160,  503 => 214,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 197,  433 => 167,  416 => 171,  412 => 184,  409 => 103,  404 => 162,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 148,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 157,  187 => 66,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 85,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 114,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 60,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 485,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 42,  208 => 93,  183 => 101,  166 => 79,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 153,  375 => 152,  371 => 152,  363 => 135,  359 => 93,  355 => 149,  351 => 131,  347 => 101,  331 => 120,  323 => 144,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 117,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 116,  210 => 82,  180 => 55,  172 => 64,  168 => 44,  149 => 74,  139 => 85,  240 => 99,  230 => 82,  121 => 59,  257 => 195,  249 => 109,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 113,  255 => 193,  244 => 107,  214 => 83,  198 => 62,  181 => 128,  167 => 96,  160 => 77,  45 => 15,  487 => 206,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 176,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 310,  352 => 91,  338 => 124,  333 => 210,  327 => 145,  324 => 289,  320 => 168,  297 => 125,  274 => 96,  256 => 111,  254 => 110,  252 => 170,  231 => 104,  216 => 95,  213 => 58,  202 => 76,  458 => 194,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 129,  387 => 229,  384 => 155,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 188,  284 => 120,  270 => 122,  266 => 178,  261 => 70,  247 => 191,  243 => 107,  238 => 107,  220 => 79,  201 => 90,  194 => 71,  130 => 46,  100 => 43,  85 => 32,  76 => 33,  112 => 16,  101 => 47,  98 => 36,  272 => 93,  269 => 115,  228 => 81,  221 => 80,  197 => 158,  184 => 84,  138 => 80,  118 => 92,  105 => 23,  66 => 26,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 10,  209 => 150,  205 => 146,  196 => 73,  192 => 87,  189 => 119,  178 => 62,  176 => 110,  165 => 57,  161 => 100,  152 => 88,  148 => 42,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 59,  54 => 8,  133 => 34,  124 => 42,  111 => 55,  107 => 71,  80 => 39,  69 => 29,  60 => 25,  52 => 17,  97 => 45,  95 => 30,  88 => 34,  78 => 48,  75 => 17,  71 => 42,  464 => 178,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 179,  425 => 165,  420 => 143,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 115,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 123,  287 => 121,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 106,  236 => 84,  222 => 158,  218 => 99,  159 => 60,  154 => 53,  151 => 75,  145 => 77,  136 => 48,  128 => 83,  125 => 47,  119 => 43,  110 => 40,  96 => 63,  93 => 41,  91 => 17,  68 => 16,  65 => 18,  63 => 37,  43 => 12,  50 => 21,  25 => 8,  92 => 34,  86 => 25,  79 => 30,  46 => 11,  37 => 4,  33 => 9,  27 => 2,  82 => 27,  72 => 33,  64 => 25,  53 => 32,  49 => 16,  44 => 14,  42 => 13,  34 => 3,  29 => 3,  23 => 6,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 86,  215 => 173,  211 => 178,  204 => 91,  200 => 75,  195 => 88,  193 => 46,  190 => 92,  188 => 69,  185 => 65,  179 => 83,  177 => 120,  171 => 80,  162 => 56,  158 => 76,  156 => 108,  153 => 116,  146 => 41,  142 => 55,  137 => 86,  131 => 63,  126 => 61,  120 => 44,  117 => 50,  103 => 68,  99 => 23,  77 => 29,  74 => 29,  57 => 24,  47 => 13,  39 => 4,  32 => 10,  24 => 6,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 57,  113 => 53,  108 => 39,  104 => 58,  102 => 17,  94 => 21,  89 => 31,  87 => 45,  84 => 40,  81 => 22,  73 => 28,  70 => 32,  67 => 39,  62 => 14,  59 => 35,  55 => 23,  51 => 7,  48 => 29,  41 => 15,  38 => 4,  35 => 3,  31 => 8,  28 => 2,);
    }
}
