<?php

/* WebIlluminationAdminBundle:Departments:add.html.twig */
class __TwigTemplate_f51fc9ebe89a95c4768102e3c5f5e892 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'headerscripts' => array($this, 'block_headerscripts'),
            'leftmenu' => array($this, 'block_leftmenu'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Add New ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_headerscripts($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("headerscripts", $context, $blocks);
        echo "
\t";
        // line 5
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "27960c7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7_0") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce_jquery.tinymce_1.js");
            // line 6
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "27960c7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
    }

    // line 9
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 11
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<h2>Add New ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo "</h2>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    <section class=\"container_6 clearfix\">
        <div class=\"grid_6\">
            <div class=\"portlet\">
                <header>
                    <h2>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo " Information</h2>
                </header>
                <section>
                \t<form class=\"form has-validation\" id=\"form-add\" method=\"post\" action=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_add")), "html", null, true);
        echo "\">
\t\t\t\t\t\t <div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-brand-id\" class=\"form-label\"><em>*</em> Brand<small>Select a brand of the product</small></label>
\t\t\t\t\t        <div class=\"form-input\">
\t\t\t\t\t        \t<table width=\"100%\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<select id=\"form-brand-id\" name=\"brand-id\" class=\"no-margin full\" required=\"required\" data-message=\"Please select the brand of the product.\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "brands"));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 35
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo "</option>\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"10\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"200\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t\t\t\t\t\t<input placeholder=\"Find a brand&hellip;\" type=\"text\" id=\"search-brand\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-brand-id\" class=\"form-label\"><em>*</em> Department<small>Select a department of the product</small></label>
\t\t\t\t\t        <div class=\"form-input\">
\t\t\t\t\t        \t<table width=\"100%\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<select id=\"form-department-id\" name=\"department-id\" class=\"no-margin full\" required=\"required\" data-message=\"Please select the department of the product.\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 59
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
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
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 61
        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"10\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"200\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t\t\t\t\t\t\t<input placeholder=\"Find a department&hellip;\" type=\"text\" id=\"search-department\" class=\"embedded-icon no-margin full\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t        <div class=\"form-input\">
\t\t\t\t\t        \t<div class=\"ui-widget info-message\">
\t\t\t\t\t\t\t\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t\t<p>Please DO NOT add the Brand or Department information to the product name.</p>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-product\" class=\"form-label\"><em>*</em> Name<small>Enter the product name</small></label>
\t\t\t\t\t        <div class=\"form-input\"><input type=\"text\" id=\"form-product\" name=\"product\" required=\"required\" data-message=\"Please enter the name of the product.\" value=\"\" /></div>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-product-code\" class=\"form-label\"><em>*</em> Product Code<small>Enter your own unique product code</small></label>
\t\t\t\t\t        <div class=\"form-input\"><input type=\"text\" id=\"form-product-code\" name=\"product-code\" class=\"uppercase\" required=\"required\" data-message=\"Please enter the code of the product.\" value=\"\" /></div>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t    \t<label for=\"form-description\" class=\"form-label\">Description<small>Detailed description</small></label>
\t\t\t\t\t        <div class=\"form-input\">
\t\t\t\t\t        \t<div class=\"ac\">
\t\t\t\t\t                <div class=\"buttonset no-margin-right\">
\t\t\t\t\t                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"1\" id=\"tinymce-description-1\" checked=\"checked\" /><label for=\"tinymce-description-1\">Visual</label>
\t\t\t\t\t                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"0\" id=\"tinymce-description-0\" /><label for=\"tinymce-description-0\">HTML</label>
\t\t\t\t\t                    <hr class=\"inset\" />
\t\t\t\t\t                </div>
\t\t\t\t\t                <div class=\"leading\">
\t\t\t\t\t                    <textarea id=\"form-description\" name=\"description\" rows=\"3\" class=\"tinymce-basic\"></textarea>
\t\t\t\t\t                </div>
\t\t\t\t\t            </div>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t    \t\t<button type=\"submit\" class=\"button ui-button-green\" data-icon-primary=\"ui-icon-check\">Add New Product</button>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t\t</form>
                </section>
            </div>
        </div>
\t    <div class=\"clear\"></div>
\t</section>
";
    }

    // line 119
    public function block_javascripts($context, array $blocks = array())
    {
        // line 120
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 121
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":addScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 121,  249 => 119,  106 => 20,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 11,  112 => 40,  101 => 61,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 37,  118 => 43,  105 => 22,  66 => 16,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 59,  161 => 58,  152 => 58,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 35,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 8,  124 => 90,  111 => 25,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 6,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 17,  93 => 33,  91 => 105,  68 => 9,  65 => 45,  63 => 36,  43 => 4,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 13,  27 => 9,  82 => 13,  72 => 20,  64 => 18,  53 => 10,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 61,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 11,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 57,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 83,  59 => 21,  55 => 14,  51 => 30,  48 => 5,  41 => 11,  38 => 3,  35 => 8,  31 => 2,  28 => 3,);
    }
}
