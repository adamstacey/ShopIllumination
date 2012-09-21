<?php

/* WebIlluminationAdminBundle:Departments:ajaxGetListing.html.twig */
class __TwigTemplate_1fc03d9e5777c90246baf8dcf2a7fe6c extends Twig_Template
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
        // line 37
        echo "<div class=\"clearfix\">
    <div class=\"form-input-long\">
\t\t<div id=\"listing\" class=\"departments-container\">
\t\t\t<input type=\"hidden\" id=\"items-count\" value=\"";
        // line 40
        if ((twig_length_filter($this->env, $this->getContext($context, "items")) > 1)) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "items")), "html", null, true);
        } else {
            echo "1";
        }
        echo "\" />
\t\t\t<ul class=\"list-fields\">
\t\t\t\t";
        // line 42
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
            // line 43
            echo "\t\t\t   \t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this, "list", array(0 => $this->getContext($context, "item"), 1 => $this->getAttribute($this->getContext($context, "loop"), "index"), 2 => $this->getContext($context, "settings")), "method"), "html", null, true);
            echo "
\t\t\t   \t";
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
        // line 45
        echo "\t\t\t</ul>
\t\t</div>
\t</div>
</div>
<table class=\"data-table\" id=\"data\" width=\"100%\">
\t<thead>
\t\t<tr>
\t\t\t<th width=\"9\" class=\"ac\">&nbsp;</th>
\t\t\t<th width=\"19\" class=\"ac\"><input type=\"checkbox\" class=\"action-select-all\" value=\"1\" /></th>
\t\t\t<th class=\"al\">Department</th>
\t\t\t<th class=\"ac\">Status</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 60
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
\t\t\t<tr class=\"item\" id=\"item-";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"9\" class=\"ac\"><img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" /></td>
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"listing-select-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" value=\"1\" /></td>
\t\t\t\t<td class=\"al small\"><a href=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "id"))), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "department"), "html", null, true);
            echo "</a></td>
\t\t\t\t<td width=\"85\" class=\"ac small \">
\t\t\t\t\t<select id=\"listing-status-";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" class=\"listing-status full\">
\t\t\t\t\t\t<option";
            // line 67
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "a")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"a\">Active</option>
\t\t\t\t\t\t<option";
            // line 68
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "h")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"h\">Hidden</option>
\t\t\t\t\t\t<option";
            // line 69
            if (($this->getAttribute($this->getContext($context, "item"), "status") == "d")) {
                echo " selected=\"selected\"";
            }
            echo " value=\"d\">Disabled</option>
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t\t<td width=\"1\" class=\"buttons-container ac no-wrap\">
\t\t\t\t\t<img id=\"buttons-spacer\" src=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"0\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<a href=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "id"))), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl button\" data-icon-primary=\"ui-icon-pencil\" data-icon-only=\"true\">Update</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"9\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 88
            $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingConfirmDelete.html.twig"));
            $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "item" => $this->getContext($context, "item"))));
            // line 89
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
        // line 93
        echo "\t</tbody>
</table>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t";
        // line 98
        echo "\t\t\$(\".list-fields\").sortable({
\t\t\tplaceholder: \"highlighted-row\",
\t\t\tupdate: function(event, ui) {
\t\t\t\t//reOrderFiles();
\t\t\t}
\t\t});
\t\t
\t\t
\t\t";
        // line 107
        echo "\t\tinitialiseUniform(\"listing\");
\t    
\t    ";
        // line 110
        echo "\t\tvar \$actionButtonsWidth = 0;
\t\t\$(\"td.buttons-container:eq(0) .button\").each(function() {
\t\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(this).outerWidth(true) + 2;
\t\t});
\t\t\$(\"#buttons-spacer\").width(\$actionButtonsWidth).attr(\"width\", \$actionButtonsWidth);
\t});
</script>";
    }

    // line 1
    public function getlist($item = null, $index = null, $settings = null)
    {
        $context = $this->env->mergeGlobals(array(
            "item" => $item,
            "index" => $index,
            "settings" => $settings,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "\t";
            ob_start();
            // line 3
            echo "\t\t<li class=\"item-container\" data-index=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" id=\"item-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td width=\"9\" class=\"ac\">
\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"1\" class=\"ac select delete\">
\t\t\t\t\t\t\t<input data-index=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"item-select\" id=\"form-item-select-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"1\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"no-padding-bottom\">
\t\t\t\t\t\t\t<input type=\"text\" class=\"file-display-name full\" id=\"form-file-display-name-";
            // line 14
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" placeholder=\"Enter a department\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "department"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"1\" class=\"buttons-container ac no-wrap\">
\t\t\t\t\t\t\t<img id=\"buttons-spacer\" src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"0\" height=\"0\" alt=\"\" />
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t<a href=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_update"), array("id" => $this->getAttribute($this->getContext($context, "item"), "id"))), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl button\" data-icon-primary=\"ui-icon-pencil\" data-icon-only=\"true\">Update</a>
\t\t\t\t\t\t\t<button data-id=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t    ";
            // line 25
            if ($this->getAttribute($this->getContext($context, "item", true), "departments", array(), "any", true, true)) {
                // line 26
                echo "\t\t    \t<div>
\t\t\t        <ul class=\"list-fields\">
\t\t\t\t        ";
                // line 28
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "item"), "departments"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                    // line 29
                    echo "\t\t\t\t            ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this, "list", array(0 => $this->getContext($context, "department"), 1 => $this->getAttribute($this->getContext($context, "loop"), "index"), 2 => $this->getContext($context, "settings")), "method"), "html", null, true);
                    echo "
\t\t\t\t        ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 31
                echo "\t\t\t        </ul>
\t\t        </div>
\t\t    ";
            }
            // line 34
            echo "\t    </li>
\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 12,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 61,  98 => 33,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 62,  66 => 11,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 14,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 63,  90 => 30,  54 => 79,  133 => 8,  124 => 66,  111 => 47,  107 => 110,  80 => 22,  69 => 87,  60 => 17,  52 => 78,  97 => 34,  95 => 21,  88 => 24,  78 => 56,  75 => 15,  71 => 90,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 24,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 45,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 9,  27 => 9,  82 => 60,  72 => 20,  64 => 18,  53 => 15,  49 => 13,  44 => 25,  42 => 24,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 40,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 13,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 37,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 40,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 43,  41 => 11,  38 => 3,  35 => 7,  31 => 42,  28 => 3,);
    }
}
