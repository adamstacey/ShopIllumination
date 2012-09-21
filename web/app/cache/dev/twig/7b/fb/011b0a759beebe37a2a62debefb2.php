<?php

/* WebIlluminationAdminBundle:Products:ajaxGetListing.html.twig */
class __TwigTemplate_7bfb011b0a759beebe37a2a62debefb2 extends Twig_Template
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
\t\t\t<th class=\"al\" colspan=\"2\">Product</th>
\t\t\t<th class=\"ac\">Code</th>
\t\t\t<th class=\"ac\">Brand</th>
\t\t\t<th class=\"ac\">Price</th>
\t\t\t<th class=\"ac\">Status</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "items"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            echo "\t
\t\t\t<tr class=\"item ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "statusColour"), "html", null, true);
            echo "\" id=\"item-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"listing-select-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\" value=\"1\" /></td>
\t\t\t\t<td width=\"50\" class=\"al small white\"><a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "productId"))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "item"), "thumbnailPath")), "html", null, true);
            echo "\" border=\"0\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "header"), "html", null, true);
            echo "\" width=\"50\" height=\"50\"></a></td>
\t\t\t\t<td class=\"al small\"><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "productId"))), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "product"), "html", null, true);
            echo "</a><br /><span class=\"small\">";
            echo strtr($this->getAttribute($this->getContext($context, "item"), "departmentPaths"), array(" |" => "<br />", "|" => "<br />"));
            echo "</span></td>
\t\t\t\t<td class=\"ac small\">";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productCode"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "brand"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small no-wrap\">";
            // line 21
            ob_start();
            // line 22
            echo "\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "item"), "recommendedRetailPrice") > $this->getAttribute($this->getContext($context, "item"), "listPrice"))) {
                // line 23
                echo "\t\t\t\t\t\t<span class=\"small strikethrough\">&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "recommendedRetailPrice"), 2), "html", null, true);
                echo "</span><br /><span class=\"small\">(-&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "savings"), 2), "html", null, true);
                echo ")</span><br />
\t\t\t\t\t";
            }
            // line 25
            echo "\t\t\t\t\t&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "listPrice"), 2), "html", null, true);
            echo "
\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 26
            echo "</td>
\t\t\t\t<td width=\"85\" class=\"ac small ";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "statusColour"), "html", null, true);
            echo "\">
\t\t\t\t\t<select id=\"listing-status-";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\" class=\"listing-status full\">
\t\t\t\t\t\t<option";
            // line 29
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "a")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"a\">Active</option>
\t\t\t\t\t\t<option";
            // line 30
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "h")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"h\">Hidden</option>
\t\t\t\t\t\t<option";
            // line 31
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "d")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"d\">Disabled</option>
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t\t<td width=\"1\" class=\"buttons-container ac no-wrap\">
\t\t\t\t\t<img id=\"buttons-spacer\" src=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"0\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "productId"))), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl button\" data-icon-primary=\"ui-icon-pencil\" data-icon-only=\"true\">Update</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"9\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 49
            $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingConfirmDelete.html.twig"));
            $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "item" => $this->getContext($context, "item"))));
            // line 50
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 54
        echo "\t</tbody>
</table>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t";
        // line 59
        echo "\t\tinitialiseUniform(\"data\");
\t    
\t    ";
        // line 62
        echo "\t\tvar \$actionButtonsWidth = 0;
\t\t\$(\"td.buttons-container:eq(0) .button\").each(function() {
\t\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(this).outerWidth(true) + 2;
\t\t});
\t\t\$(\"#buttons-spacer\").width(\$actionButtonsWidth).attr(\"width\", \$actionButtonsWidth);
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 62,  194 => 59,  188 => 54,  171 => 50,  168 => 49,  157 => 41,  151 => 38,  147 => 37,  142 => 35,  133 => 31,  127 => 30,  121 => 29,  115 => 28,  111 => 27,  108 => 26,  102 => 25,  94 => 23,  91 => 22,  89 => 21,  85 => 20,  81 => 19,  71 => 18,  63 => 17,  57 => 16,  51 => 15,  32 => 14,  17 => 1,);
    }
}
