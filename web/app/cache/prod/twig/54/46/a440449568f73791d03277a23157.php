<?php

/* WebIlluminationAdminBundle:Products:ajaxGetRelatedProducts.html.twig */
class __TwigTemplate_5446a440449568f73791d03277a23157 extends Twig_Template
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
\t\t<p>Please select any related products.</p>
\t</div>
</div>
<div id=\"related-product-success-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-success ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
        <p><strong>SUCCESS:</strong> <span id=\"related-product-success-message-text\"></span></p>
    </div>
</div>
<div id=\"related-product-error-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-alert\"></span>
        <p><strong>ERROR:</strong> <span id=\"related-product-error-message-text\"></span></p>
    </div>
</div>
<div id=\"related-product-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
        <p>
        \t<button class=\"button action-update-related-products-and-leave ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button data-tab-index=\"\" id=\"related-product-leave-related-products-button\" class=\"button ui-button-red action-leave-related-products\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
        </p>
    </div>
</div>
<div id=\"related-product-confirm-delete\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\"> 
        <span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the highlighted related product?</p>
        <p>
        \t<button data-index=\"\" id=\"related-product-confirm-delete-button\" class=\"button ui-button-red action-delete-related-product\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"related-product-cancel-delete-button\" class=\"button ui-button-blue action-cancel-delete-related-product\">Cancel</button>
        </p>
    </div>
</div>
<div id=\"related-product-confirm-deletes\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the selected related products?</p>
        <p>
        \t<button data-index=\"\" id=\"related-product-confirm-deletes-button\" class=\"button ui-button-red action-delete-related-products\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"related-product-cancel-deletes-button\" class=\"button ui-button-blue action-cancel-delete-related-products\">Cancel</button>
        </p>
    </div>
</div>
<div class=\"clearfix\">
    <div class=\"form-input-long\">
\t\t<div class=\"related-products-container\">
\t\t\t<input type=\"hidden\" id=\"related-product-count\" value=\"";
        // line 52
        if ((twig_length_filter($this->env, $this->getContext($context, "relatedProducts")) > 1)) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "relatedProducts")), "html", null, true);
        } else {
            echo "1";
        }
        echo "\" />
\t\t\t<ul class=\"list-fields\" id=\"form-related-products-container\">
\t\t\t\t";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "relatedProducts"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["relatedProduct"]) {
            echo "\t
\t\t\t\t\t<li class=\"related-product-container\" data-index=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" id=\"related-product-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\">
\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"9\" rowspan=\"2\">
\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"related-product-select\" id=\"form-related-product-select-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"1\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"no-padding-bottom\">
\t\t\t\t\t\t\t\t\t\t<select id=\"form-product-link-id-";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"product-link-id full\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 68
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 69
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<option";
                if (($this->getAttribute($this->getContext($context, "product"), "productId") == $this->getAttribute($this->getContext($context, "relatedProduct"), "productLinkId"))) {
                    echo " selected=\"selected\"";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</option>\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 71
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\">
\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\" defer=\"defer\">
\t\t\t\t\t\t\t\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\").autocomplete({
\t\t\t\t\t\t\t\t\t\t\t\t\tsource: products,
\t\t\t\t\t\t\t\t\t\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\").val(ui.item.label);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#uniform-form-product-link-id-";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " span\").html(\$(\"#form-product-link-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#form-product-link-id-";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#form-product-link-id-";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo " option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\t\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\").val(\"\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"related-product-display-order\" id=\"form-related-product-display-order-";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"related-product-requires-update\" id=\"form-related-product-requires-update-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"related-product-id\" id=\"form-related-product-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "relatedProduct"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t<button data-index=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"button ui-button-red action-confirm-delete-related-product\" data-icon-only=\"true\"  data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t\t\t\t\t<input placeholder=\"Find a product&hellip;\" type=\"text\" id=\"search-product-";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
            echo "\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t\t\t\t\t</div>
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
            // line 110
            echo "\t\t\t    \t<li class=\"related-product-container\" data-index=\"1\" id=\"related-product-1\">
\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"9\" rowspan=\"2\">
\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t<input data-index=\"1\" type=\"checkbox\" class=\"related-product-select\" id=\"form-related-product-select-1\" value=\"1\" />
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td class=\"no-padding-bottom\">
\t\t\t\t\t\t\t\t\t\t<select id=\"form-product-link-id-1\" class=\"product-link-id full\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 123
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 124
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</option>\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 126
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\">
\t\t\t\t\t\t\t\t\t\t<script type=\"text/javascript\" defer=\"defer\">
\t\t\t\t\t\t\t\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-1\").autocomplete({
\t\t\t\t\t\t\t\t\t\t\t\t\tsource: products,
\t\t\t\t\t\t\t\t\t\t\t\t\tfocus: function(event, ui) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-1\").val(ui.item.label);
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#uniform-form-product-link-id-1 span\").html(\$(\"#form-product-link-id-1 option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#form-product-link-id-1 option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#form-product-link-id-1 option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t\t\t\t\t\t\t\t},
\t\t\t\t\t\t\t\t\t\t\t\t\tselect: function(event, ui) {
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\$(\"#search-product-1\").val(\"\");
\t\t\t\t\t\t\t\t\t\t\t\t\t\treturn false;
\t\t\t\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"related-product-display-order\" id=\"form-related-product-display-order-1\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"1\" class=\"related-product-requires-update\" id=\"form-related-product-requires-update-1\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"1\" class=\"related-product-id\" id=\"form-related-product-id-1\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t<button data-index=\"1\" class=\"button ui-button-red action-confirm-delete-related-product\" data-icon-only=\"true\"  data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td class=\"no-padding-top\">
\t\t\t\t\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t\t\t\t\t<input placeholder=\"Find a product&hellip;\" type=\"text\" id=\"search-product-1\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relatedProduct'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 165
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
</div>
<div class=\"clearfix\">
    <div class=\"form-input-long buttons no-margin-bottom\">
    \t<button class=\"button ui-button-green action-update-related-products\" data-icon-primary=\"ui-icon-check\">Update</button>
    \t<button class=\"button ui-button-red action-confirm-delete-related-products ui-helper-hidden\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
    \t<button class=\"button ui-button-blue action-add-new-related-product\" data-icon-primary=\"ui-icon-plusthick\">Add</button>
    \t<button class=\"button ui-button-blue action-select-all-related-products\" data-icon-primary=\"ui-icon-radio-on\">Select All</button>
    \t<button class=\"button ui-button-blue action-unselect-all-related-products ui-helper-hidden\" data-icon-primary=\"ui-icon-bullet\">Unselect All</button>
    \t<input type=\"hidden\" value=\"-1\" id=\"related-products-tab-to-redirect-to\" />
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:ajaxGetRelatedProducts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 197,  569 => 192,  455 => 153,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 313,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 223,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 255,  312 => 190,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 206,  501 => 160,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 172,  229 => 67,  206 => 70,  147 => 71,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 41,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 191,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 204,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 60,  301 => 85,  298 => 180,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 90,  144 => 40,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 85,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 227,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 187,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 81,  210 => 95,  180 => 49,  172 => 47,  168 => 49,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 29,  257 => 225,  249 => 74,  106 => 20,  334 => 269,  294 => 131,  286 => 171,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 62,  181 => 86,  167 => 86,  160 => 79,  45 => 8,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 154,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 156,  352 => 225,  338 => 235,  333 => 71,  327 => 204,  324 => 289,  320 => 168,  297 => 118,  274 => 126,  256 => 86,  254 => 74,  252 => 139,  231 => 106,  216 => 178,  213 => 175,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 172,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 170,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 213,  238 => 107,  220 => 64,  201 => 90,  194 => 59,  130 => 95,  100 => 27,  85 => 20,  76 => 18,  112 => 30,  101 => 68,  98 => 18,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 169,  184 => 50,  138 => 32,  118 => 93,  105 => 35,  66 => 11,  56 => 32,  115 => 63,  83 => 59,  164 => 80,  140 => 39,  58 => 6,  21 => 5,  61 => 14,  36 => 10,  209 => 173,  205 => 63,  196 => 93,  192 => 52,  189 => 106,  178 => 145,  176 => 48,  165 => 127,  161 => 49,  152 => 42,  148 => 41,  141 => 34,  134 => 30,  132 => 69,  127 => 30,  123 => 66,  109 => 60,  90 => 62,  54 => 18,  133 => 94,  124 => 22,  111 => 27,  107 => 29,  80 => 22,  69 => 45,  60 => 42,  52 => 16,  97 => 38,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 49,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 284,  425 => 371,  420 => 277,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 143,  321 => 137,  317 => 123,  314 => 87,  311 => 133,  305 => 186,  291 => 174,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 105,  159 => 55,  154 => 76,  151 => 38,  145 => 77,  136 => 101,  128 => 68,  125 => 63,  119 => 38,  110 => 21,  96 => 26,  93 => 34,  91 => 22,  68 => 48,  65 => 12,  63 => 22,  43 => 19,  50 => 5,  25 => 6,  92 => 35,  86 => 61,  79 => 54,  46 => 20,  37 => 21,  33 => 13,  27 => 9,  82 => 19,  72 => 31,  64 => 35,  53 => 21,  49 => 28,  44 => 25,  42 => 24,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 8,  22 => 5,  224 => 65,  215 => 73,  211 => 101,  204 => 99,  200 => 111,  195 => 54,  193 => 160,  190 => 92,  188 => 54,  185 => 149,  179 => 92,  177 => 146,  171 => 50,  162 => 83,  158 => 81,  156 => 43,  153 => 47,  146 => 122,  142 => 35,  137 => 38,  131 => 58,  126 => 74,  120 => 32,  117 => 84,  103 => 41,  99 => 55,  77 => 18,  74 => 53,  57 => 11,  47 => 9,  39 => 18,  32 => 13,  24 => 7,  17 => 1,  135 => 64,  129 => 75,  122 => 76,  116 => 31,  113 => 36,  108 => 26,  104 => 28,  102 => 19,  94 => 23,  89 => 68,  87 => 31,  84 => 30,  81 => 56,  73 => 26,  70 => 52,  67 => 23,  62 => 43,  59 => 18,  55 => 17,  51 => 15,  48 => 31,  41 => 24,  38 => 3,  35 => 15,  31 => 14,  28 => 11,);
    }
}
