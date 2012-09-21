<?php

/* WebIlluminationAdminBundle:VoucherCodes:listingDiscounts.html.twig */
class __TwigTemplate_01ada309ae9c8ef286ebed2b88b86a02 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"voucher-code-discounts-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
        echo "\">
\t";
        // line 2
        if ((($this->getAttribute($this->getContext($context, "voucherCode"), "discountType") == "d") || ($this->getAttribute($this->getContext($context, "voucherCode"), "discountType") == "m"))) {
            // line 3
            echo "\t\t<div class=\"ui-widget message\">
\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin\">
\t\t    \t<span class=\"ui-icon ui-icon-info\"></span>
\t\t        <p>This voucher code entitles the customer to <strong>\"";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeName"), "html", null, true);
            echo "\"</strong>, so no further discounts are available.</p>
\t\t    </div>
\t\t</div>
\t";
        } else {
            // line 9
            echo "\t
\t\t<div id=\"discounts-success-message-";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-helper-hidden ui-widget message closeable\">
\t\t    <div class=\"ui-state-success ui-corner-all no-margin\">
\t\t    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
\t\t        <p><strong>SUCCESS:</strong> <span id=\"discounts-success-message-text-";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\"></span></p>
\t\t    </div>
\t\t</div>
\t\t<div id=\"discounts-error-message-";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-helper-hidden ui-widget message closeable\">
\t\t    <div class=\"ui-state-error ui-corner-all no-margin\">
\t\t    \t<span class=\"ui-icon ui-icon-alert\"></span>
\t\t        <p><strong>ERROR:</strong> <span id=\"discounts-error-message-text-";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\"></span></p>
\t\t    </div>
\t\t</div>
\t\t<h5 class=\"no-margin-top\">Order Discount</h5>
\t\t<div class=\"ui-widget message no-margin-bottom\">
\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin\">
\t\t    \t<span class=\"ui-icon ui-icon-info\"></span>
\t\t        <p>To take an amount off the total order value please enter the amount in the box below.</p>
\t\t    </div>
\t\t</div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"140\" class=\"label\"><label>Order Discount (";
            // line 31
            echo $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeSymbol");
            echo "):</label></td>
\t\t\t\t<td class=\"no-padding\"><input type=\"text\" id=\"discounts-discount-";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-margin full decimal\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "discount"), 2), "html", null, true);
            echo "\" /></td>
\t\t\t\t<td width=\"60\" class=\"no-padding\"><button data-id=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button no-float ui-button-green action-save-discount\" data-icon-primary=\"ui-icon-check\">Save</button></td>
\t\t\t</tr>
\t\t</table>
\t\t<h5>Brand Discounts<button data-id=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr button ui-button-green action-view-add-brand-discount\" data-icon-primary=\"ui-icon-plusthick\" data-icon-only=\"true\">Add</button></h5>
\t\t<div id=\"brand-discount-confirm-delete-";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-widget message ui-helper-hidden\">
\t\t    <div class=\"ui-state-highlight ui-corner-all\"> 
\t\t    \t<div class=\"confirmation-message fl no-margin no-padding\">
\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the highlighted brand discount?</p>
\t\t    \t</div>
\t\t        <div class=\"fr no-margin no-padding\">
\t\t        \t<a href=\"Javascript:void(0);\" data-brand-id=\"\" data-voucher-code-id=\"\" id=\"brand-discount-confirm-delete-button-";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-brand-discount\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t        \t<a href=\"Javascript:void(0);\" data-brand-id=\"\" data-voucher-code-id=\"\" id=\"brand-discount-cancel-delete-button-";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete-brand-discount\">Cancel</a>
\t\t        </div>
\t\t        <div class=\"clear\"></div>
\t\t    </div>
\t\t</div>
\t\t<div class=\"ui-helper-hidden\" id=\"add-brand-discount-";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Brand:</label></td>
\t\t\t\t\t<td class=\"no-padding\">
\t\t\t\t\t\t<select id=\"discounts-brand-id-";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-margin full\">
\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
            foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
                // line 58
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
                echo "</option>\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 60
            echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"160\" class=\"no-padding\">
\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t<input placeholder=\"Find a brand&hellip;\" type=\"text\" id=\"discounts-brand-";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Discount (";
            // line 68
            echo $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeSymbol");
            echo "):</label></td>
\t\t\t\t\t<td width=\"80\" class=\"no-padding\"><input type=\"text\" id=\"discounts-brand-discount-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-margin full decimal\" value=\"0.00\" /></td>
\t\t\t\t\t<td width=\"60\" class=\"no-padding\"><button data-id=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button no-float ui-button-green action-add-brand-discount\" data-icon-primary=\"ui-icon-check\">Save</button></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\$(\"#discounts-brand-";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").autocomplete({
\t\t\t\t\t\tsource: brands,
\t\t\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-brand-";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(ui.item.label);
\t\t\t\t\t\t\t\$(\"#uniform-discounts-brand-id-";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " span\").html(\$(\"#discounts-brand-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\t\t\t\$(\"#discounts-brand-id-";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\$(\"#discounts-brand-id-";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t},
\t\t\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-brand-";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(\"\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t</div>
\t\t<div id=\"brand-discounts-loading-";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"loading-container\">
\t\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
            echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t</div>
\t\t<div class=\"sub-table-data-container\" id=\"brand-discounts-";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<p class=\"ac\">There are no brand discounts setup.</p>
\t\t</div>
\t\t<h5>Department Discounts<button data-id=\"";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr button ui-button-green action-view-add-department-discount\" data-icon-primary=\"ui-icon-plusthick\" data-icon-only=\"true\">Add</button></h5>
\t\t<div id=\"department-discount-confirm-delete-";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-widget message ui-helper-hidden\">
\t\t    <div class=\"ui-state-highlight ui-corner-all\"> 
\t\t    \t<div class=\"confirmation-message fl no-margin no-padding\">
\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the highlighted department discount?</p>
\t\t    \t</div>
\t\t        <div class=\"fr no-margin no-padding\">
\t\t        \t<a href=\"Javascript:void(0);\" data-department-id=\"\" data-voucher-code-id=\"\" id=\"department-discount-confirm-delete-button-";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-department-discount\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t        \t<a href=\"Javascript:void(0);\" data-department-id=\"\" data-voucher-code-id=\"\" id=\"department-discount-cancel-delete-button-";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete-department-discount\">Cancel</a>
\t\t        </div>
\t\t        <div class=\"clear\"></div>
\t\t    </div>
\t\t</div>
\t\t<div class=\"ui-helper-hidden\" id=\"add-department-discount-";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Department:</label></td>
\t\t\t\t\t<td class=\"no-padding\">
\t\t\t\t\t\t<select id=\"discounts-department-id-";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-margin full\">
\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t";
            // line 120
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
            foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                // line 121
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
                echo "\">";
                if (($this->getAttribute($this->getContext($context, "department"), "level") > 0)) {
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getContext($context, "department"), "level")));
                    foreach ($context['_seq'] as $context["_key"] => $context["level"]) {
                        echo "&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['level'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                }
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "productCount"), "html", null, true);
                echo ")</option>\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 123
            echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"160\" class=\"no-padding\">
\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t<input placeholder=\"Find a department&hellip;\" type=\"text\" id=\"discounts-department-";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Discount (";
            // line 131
            echo $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeSymbol");
            echo "):</label></td>
\t\t\t\t\t<td width=\"80\" class=\"no-padding ac\"><input type=\"text\" id=\"discounts-department-discount-";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ac no-margin full decimal\" value=\"0.00\" /></td>
\t\t\t\t\t<td width=\"60\" class=\"no-padding\"><button data-id=\"";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button no-float ui-button-green action-add-department-discount\" data-icon-primary=\"ui-icon-check\">Save</button></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\$(\"#discounts-department-";
            // line 138
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").autocomplete({
\t\t\t\t\t\tsource: departments,
\t\t\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-department-";
            // line 141
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(ui.item.label);
\t\t\t\t\t\t\t\$(\"#uniform-discounts-department-id-";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " span\").html(\$(\"#discounts-department-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\t\t\t\$(\"#discounts-department-id-";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\$(\"#discounts-department-id-";
            // line 144
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t},
\t\t\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-department-";
            // line 148
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(\"\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t</div>
\t\t<div id=\"department-discounts-loading-";
            // line 155
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"loading-container\">
\t\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
            echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t</div>
\t\t<div class=\"sub-table-data-container\" id=\"department-discounts-";
            // line 159
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<p class=\"ac\">There are no department discounts setup.</p>
\t\t</div>
\t\t
\t\t<h5>Product Discounts<button data-id=\"";
            // line 163
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr button ui-button-green action-view-add-product-discount\" data-icon-primary=\"ui-icon-plusthick\" data-icon-only=\"true\">Add</button></h5>
\t\t<div id=\"product-discount-confirm-delete-";
            // line 164
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-widget message ui-helper-hidden\">
\t\t    <div class=\"ui-state-highlight ui-corner-all\"> 
\t\t    \t<div class=\"confirmation-message fl no-margin no-padding\">
\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the highlighted product discount?</p>
\t\t    \t</div>
\t\t        <div class=\"fr no-margin no-padding\">
\t\t        \t<a href=\"Javascript:void(0);\" data-product-id=\"\" data-voucher-code-id=\"\" id=\"product-discount-confirm-delete-button-";
            // line 171
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-product-discount\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t        \t<a href=\"Javascript:void(0);\" data-product-id=\"\" data-voucher-code-id=\"\" id=\"product-discount-cancel-delete-button-";
            // line 172
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete-product-discount\">Cancel</a>
\t\t        </div>
\t\t        <div class=\"clear\"></div>
\t\t    </div>
\t\t</div>
\t\t<div class=\"ui-helper-hidden\" id=\"add-product-discount-";
            // line 177
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Product:</label></td>
\t\t\t\t\t<td class=\"no-padding\">
\t\t\t\t\t\t<select id=\"discounts-product-id-";
            // line 182
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-margin full\">
\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t";
            // line 184
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 185
                echo "\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</option>\t\t\t\t
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 187
            echo "\t\t\t\t\t\t</select>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"160\" class=\"no-padding\">
\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t<input placeholder=\"Find a product&hellip;\" type=\"text\" id=\"discounts-product-";
            // line 191
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"80\" class=\"label\"><label>Discount (";
            // line 195
            echo $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeSymbol");
            echo "):</label></td>
\t\t\t\t\t<td width=\"80\" class=\"no-padding ac\"><input type=\"text\" id=\"discounts-product-discount-";
            // line 196
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ac no-margin full decimal\" value=\"0.00\" /></td>
\t\t\t\t\t<td width=\"60\" class=\"no-padding\"><button data-id=\"";
            // line 197
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"button no-float ui-button-green action-add-product-discount\" data-icon-primary=\"ui-icon-check\">Save</button></td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\$(\"#discounts-product-";
            // line 202
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").autocomplete({
\t\t\t\t\t\tsource: products,
\t\t\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-product-";
            // line 205
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(ui.item.label);
\t\t\t\t\t\t\t\$(\"#uniform-discounts-product-id-";
            // line 206
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " span\").html(\$(\"#discounts-product-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\t\t\t\$(\"#discounts-product-id-";
            // line 207
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\$(\"#discounts-product-id-";
            // line 208
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t},
\t\t\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t\t\t\$(\"#discounts-product-";
            // line 212
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\").val(\"\");
\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t</div>
\t\t<div id=\"product-discounts-loading-";
            // line 219
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"loading-container\">
\t\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
            // line 220
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
            echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t</div>
\t\t<div class=\"sub-table-data-container\" id=\"product-discounts-";
            // line 223
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t<p class=\"ac\">There are no product discounts setup.</p>
\t\t</div>
\t";
        }
        // line 227
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:VoucherCodes:listingDiscounts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 432,  476 => 208,  474 => 194,  461 => 363,  446 => 175,  427 => 187,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 141,  316 => 166,  278 => 120,  250 => 113,  163 => 70,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 175,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 81,  229 => 67,  206 => 70,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 120,  246 => 83,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 78,  212 => 93,  207 => 44,  143 => 73,  157 => 46,  366 => 159,  340 => 255,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 85,  233 => 132,  226 => 64,  187 => 80,  150 => 48,  260 => 91,  155 => 68,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 82,  267 => 121,  258 => 118,  248 => 68,  242 => 108,  239 => 87,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 50,  208 => 92,  183 => 63,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 81,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 80,  149 => 76,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 45,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 85,  181 => 79,  167 => 50,  160 => 32,  45 => 13,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 94,  231 => 83,  216 => 64,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 172,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 88,  296 => 127,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 74,  201 => 68,  194 => 66,  130 => 29,  100 => 74,  85 => 61,  76 => 32,  112 => 45,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 100,  221 => 176,  197 => 51,  184 => 55,  138 => 70,  118 => 21,  105 => 34,  66 => 24,  56 => 32,  115 => 58,  83 => 30,  164 => 52,  140 => 43,  58 => 6,  21 => 4,  61 => 41,  36 => 9,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 97,  178 => 59,  176 => 86,  165 => 121,  161 => 49,  152 => 90,  148 => 64,  141 => 33,  134 => 42,  132 => 33,  127 => 57,  123 => 46,  109 => 58,  90 => 52,  54 => 17,  133 => 104,  124 => 40,  111 => 35,  107 => 35,  80 => 28,  69 => 33,  60 => 37,  52 => 20,  97 => 38,  95 => 33,  88 => 36,  78 => 57,  75 => 44,  71 => 26,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 177,  343 => 257,  339 => 144,  335 => 143,  321 => 112,  317 => 68,  314 => 87,  311 => 133,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 99,  245 => 90,  241 => 137,  236 => 106,  222 => 76,  218 => 96,  159 => 69,  154 => 111,  151 => 109,  145 => 105,  136 => 103,  128 => 41,  125 => 63,  119 => 38,  110 => 86,  96 => 18,  93 => 32,  91 => 48,  68 => 9,  65 => 8,  63 => 7,  43 => 8,  50 => 5,  25 => 50,  92 => 37,  86 => 46,  79 => 36,  46 => 68,  37 => 11,  33 => 3,  27 => 2,  82 => 33,  72 => 31,  64 => 12,  53 => 14,  49 => 15,  44 => 5,  42 => 13,  34 => 3,  29 => 6,  23 => 3,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 99,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 73,  193 => 104,  190 => 62,  188 => 65,  185 => 47,  179 => 45,  177 => 78,  171 => 75,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 42,  142 => 60,  137 => 55,  131 => 58,  126 => 91,  120 => 83,  117 => 59,  103 => 69,  99 => 33,  77 => 18,  74 => 56,  57 => 19,  47 => 9,  39 => 10,  32 => 13,  24 => 3,  17 => 1,  135 => 96,  129 => 65,  122 => 55,  116 => 70,  113 => 36,  108 => 25,  104 => 55,  102 => 44,  94 => 25,  89 => 62,  87 => 31,  84 => 22,  81 => 24,  73 => 51,  70 => 9,  67 => 40,  62 => 29,  59 => 40,  55 => 31,  51 => 16,  48 => 13,  41 => 17,  38 => 3,  35 => 5,  31 => 2,  28 => 5,);
    }
}
