<?php

/* WebIlluminationAdminBundle:Products:ajaxGetPrices.html.twig */
class __TwigTemplate_0b3b4493964c18c30d3567124200cbc4 extends Twig_Template
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
        echo "<div class=\"ui-widget info-message\">
\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>Please enter the available prices.</p>
\t</div>
</div>
<div id=\"price-success-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-success ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
        <p><strong>SUCCESS:</strong> <span id=\"price-success-message-text\"></span></p>
    </div>
</div>
<div id=\"price-error-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-alert\"></span>
        <p><strong>ERROR:</strong> <span id=\"price-error-message-text\"></span></p>
    </div>
</div>
<div id=\"price-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
        <p>
        \t<button class=\"button action-update-prices-and-leave ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button data-tab-index=\"\" id=\"price-leave-prices-button\" class=\"button ui-button-red action-leave-prices\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
        </p>
    </div>
</div>
<div id=\"price-confirm-delete\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\"> 
        <span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the highlighted price?</p>
        <p>
        \t<button data-index=\"\" id=\"price-confirm-delete-button\" class=\"button ui-button-red action-delete-price\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"price-cancel-delete-button\" class=\"button ui-button-blue action-cancel-delete-price\">Cancel</button>
        </p>
    </div>
</div>
<div id=\"price-confirm-deletes\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the selected prices?</p>
        <p>
        \t<button data-index=\"\" id=\"price-confirm-deletes-button\" class=\"button ui-button-red action-delete-prices\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"price-cancel-deletes-button\" class=\"button ui-button-blue action-cancel-delete-prices\">Cancel</button>
        </p>
    </div>
</div>
<div class=\"clearfix\">
    <div class=\"form-input-long\">
\t\t<div class=\"prices-container\">
\t\t\t<input type=\"hidden\" id=\"price-count\" value=\"";
        // line 52
        if ((twig_length_filter($this->env, $this->getContext($context, "prices")) > 1)) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "prices")), "html", null, true);
        } else {
            echo "1";
        }
        echo "\" />
\t\t\t<ul class=\"list-fields\" id=\"form-prices-container\">
\t\t\t\t";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "prices"));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["price"]) {
            echo "\t
\t\t\t\t\t<li class=\"price-container\" data-index=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" id=\"price-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">
\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"9\" rowspan=\"4\">
\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"4\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"price-select\" id=\"form-price-select-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"1\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-cost-price-";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Cost (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-recommended-retail-price-";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">RRP (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-markup-percentage-";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Markup (%)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-list-price-";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Price (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-profit-";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Profit (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"4\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-supplier-id\" id=\"form-price-supplier-id-";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-currency-code\" id=\"form-price-currency-code-";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"GBP\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-display-order\" id=\"form-price-display-order-";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"price-requires-update\" id=\"form-price-requires-update-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"price-id\" id=\"form-price-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t<button data-index=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"button ui-button-red action-confirm-delete-price\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a cost price.\" class=\"ac price-cost-price full\" id=\"form-price-cost-price-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Cost (inc. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "costPrice"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a recommended retail price.\" class=\"ac price-recommended-retail-price full\" id=\"form-price-recommended-retail-price-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"RRP (inc. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "recommendedRetailPrice"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-markup-percentage full ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "markupPercentageClass"), "html", null, true);
            echo "\" id=\"form-price-markup-percentage-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Markup (%)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "markupPercentage"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a list price.\" class=\"ac price-list-price full\" id=\"form-price-list-price-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Price (inc. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "listPrice"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-profit full\" id=\"form-price-profit-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Profit (inc. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "profit"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-cost-price-excluding-vat-";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Cost (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-recommended-retail-price-excluding-vat-";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">RRP (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-percentage-";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Profit (%)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-list-price-excluding-vat-";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Price (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-excluding-vat-";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">Profit (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-cost-price-excluding-vat full\" id=\"form-price-cost-price-excluding-vat-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Cost (ex. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "costPriceExcludingVat"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-recommended-retail-price-excluding-vat full\" id=\"form-price-recommended-retail-price-excluding-vat-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"RRP (ex. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "recommendedRetailPriceExcludingVat"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-profit-percentage full ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "profitPercentageClass"), "html", null, true);
            echo "\" id=\"form-price-profit-percentage-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Profit (%)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "profitPercentage"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-list-price-excluding-vat full\" id=\"form-price-list-price-excluding-vat-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Price (ex. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "listPriceExcludingVat"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"text\" class=\"ac price-profit-excluding-vat full\" id=\"form-price-profit-excluding-vat-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" placeholder=\"Profit (ex. VAT)\" value=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "price"), "profitExcludingVat"), 4), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t        </li>
\t\t\t    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 124
            echo "\t\t\t    \t<li class=\"price-container\" data-index=\"1\" id=\"price-1\">
\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"9\" rowspan=\"4\">
\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"4\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"checkbox\" class=\"price-select\" id=\"form-price-select-1\" value=\"1\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-cost-price-1\">Cost (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-recommended-retail-price-1\">RRP (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-markup-percentage-1\">Markup (%)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-list-price-1\">Price (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-profit-1\">Profit (inc. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"4\">
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-supplier-id\" id=\"form-price-supplier-id-1\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-currency-code\" id=\"form-price-currency-code-1\" value=\"GBP\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"price-display-order\" id=\"form-price-display-order-1\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"1\" class=\"price-requires-update\" id=\"form-price-requires-update-1\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"1\" class=\"price-id\" id=\"form-price-id-1\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<button data-index=\"1\" class=\"button ui-button-red action-confirm-delete-price\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" required=\"required\" data-message=\"Please enter a cost price.\" class=\"ac price-cost-price full\" id=\"form-price-cost-price-1\" placeholder=\"Cost (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" required=\"required\" data-message=\"Please enter a recommended retail price.\" class=\"ac price-recommended-retail-price full\" id=\"form-price-recommended-retail-price-1\" placeholder=\"RRP (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-markup-percentage full ui-state-error\" id=\"form-price-markup-percentage-1\" placeholder=\"Markup (%)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" required=\"required\" data-message=\"Please enter a list price.\" class=\"ac price-list-price full\" id=\"form-price-list-price-1\" placeholder=\"Price (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-profit full\" id=\"form-price-profit-1\" placeholder=\"Profit (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-cost-price-excluding-vat-1\">Cost (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-recommended-retail-price-excluding-vat-1\">RRP (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-percentage-1\">Profit (%)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-list-price-excluding-vat-1\">Price (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-excluding-vat-1\">Profit (ex. VAT)</label></td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-cost-price-excluding-vat full\" id=\"form-price-cost-price-excluding-vat-1\" placeholder=\"Cost (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-recommended-retail-price-excluding-vat full\" id=\"form-price-recommended-retail-price-excluding-vat-1\" placeholder=\"RRP (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-profit-percentage full ui-state-error\" id=\"form-price-profit-percentage-1\" placeholder=\"Profit (%)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-list-price-excluding-vat full\" id=\"form-price-list-price-excluding-vat-1\" placeholder=\"Price (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"text\" class=\"ac price-profit-excluding-vat full\" id=\"form-price-profit-excluding-vat-1\" placeholder=\"Profit (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['price'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 193
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
</div>
<div class=\"clearfix\">
    <div class=\"form-input-long buttons no-margin-bottom\">
    \t<button class=\"button ui-button-green action-update-prices\" data-icon-primary=\"ui-icon-check\">Update</button>
    \t<button class=\"button ui-button-red action-confirm-delete-prices ui-helper-hidden\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
    \t<button class=\"button ui-button-blue action-add-new-price\" data-icon-primary=\"ui-icon-plusthick\">Add</button>
    \t<button class=\"button ui-button-blue action-select-all-prices\" data-icon-primary=\"ui-icon-radio-on\">Select All</button>
    \t<button class=\"button ui-button-blue action-unselect-all-prices ui-helper-hidden\" data-icon-primary=\"ui-icon-bullet\">Unselect All</button>
    \t<input type=\"hidden\" value=\"-1\" id=\"prices-tab-to-redirect-to\" />
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:ajaxGetPrices.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 193,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 113,  163 => 75,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 175,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 72,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 120,  246 => 83,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 62,  207 => 160,  143 => 71,  157 => 74,  366 => 159,  340 => 160,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 101,  242 => 108,  239 => 190,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 390,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 24,  208 => 92,  183 => 63,  166 => 129,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 111,  265 => 108,  251 => 84,  199 => 87,  191 => 149,  170 => 57,  210 => 72,  180 => 128,  172 => 132,  168 => 54,  149 => 46,  139 => 50,  240 => 99,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 105,  244 => 100,  214 => 87,  198 => 85,  181 => 35,  167 => 34,  160 => 51,  45 => 12,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 117,  274 => 80,  256 => 86,  254 => 74,  252 => 94,  231 => 83,  216 => 63,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 125,  296 => 124,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 66,  130 => 67,  100 => 74,  85 => 30,  76 => 20,  112 => 33,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 51,  184 => 60,  138 => 69,  118 => 21,  105 => 34,  66 => 18,  56 => 32,  115 => 63,  83 => 30,  164 => 52,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 85,  205 => 169,  196 => 57,  192 => 63,  189 => 84,  178 => 59,  176 => 57,  165 => 51,  161 => 49,  152 => 30,  148 => 47,  141 => 44,  134 => 68,  132 => 37,  127 => 53,  123 => 92,  109 => 60,  90 => 52,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 33,  60 => 19,  52 => 13,  97 => 38,  95 => 33,  88 => 22,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 214,  343 => 257,  339 => 144,  335 => 143,  321 => 124,  317 => 140,  314 => 87,  311 => 133,  305 => 154,  291 => 124,  287 => 114,  282 => 138,  268 => 94,  264 => 73,  259 => 99,  245 => 90,  241 => 137,  236 => 98,  222 => 76,  218 => 96,  159 => 32,  154 => 111,  151 => 73,  145 => 45,  136 => 103,  128 => 39,  125 => 63,  119 => 38,  110 => 23,  96 => 27,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 16,  43 => 8,  50 => 5,  25 => 50,  92 => 25,  86 => 61,  79 => 54,  46 => 10,  37 => 3,  33 => 3,  27 => 2,  82 => 21,  72 => 31,  64 => 16,  53 => 14,  49 => 13,  44 => 11,  42 => 13,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 12,  26 => 8,  22 => 2,  224 => 65,  215 => 73,  211 => 90,  204 => 98,  200 => 157,  195 => 47,  193 => 104,  190 => 75,  188 => 65,  185 => 47,  179 => 81,  177 => 78,  171 => 76,  162 => 44,  158 => 38,  156 => 31,  153 => 47,  146 => 42,  142 => 60,  137 => 43,  131 => 58,  126 => 66,  120 => 36,  117 => 59,  103 => 69,  99 => 55,  77 => 18,  74 => 21,  57 => 15,  47 => 9,  39 => 10,  32 => 11,  24 => 6,  17 => 1,  135 => 29,  129 => 95,  122 => 65,  116 => 32,  113 => 36,  108 => 25,  104 => 30,  102 => 27,  94 => 66,  89 => 62,  87 => 31,  84 => 23,  81 => 24,  73 => 50,  70 => 52,  67 => 18,  62 => 17,  59 => 40,  55 => 31,  51 => 7,  48 => 12,  41 => 11,  38 => 3,  35 => 9,  31 => 2,  28 => 6,);
    }
}
