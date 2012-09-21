<?php

/* WebIlluminationAdminBundle:Departments:update.html.twig */
class __TwigTemplate_33bd2e07ae2a878fc017e4f001da95f8 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "pageTitle"), "html", null, true);
        echo "  | ";
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
        // line 8
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "59b89b2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_59b89b2_0") : $this->env->getExtension('assets')->getAssetUrl("js/file-upload_file-upload_1.js");
            // line 9
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "59b89b2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_59b89b2") : $this->env->getExtension('assets')->getAssetUrl("js/file-upload.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 11
        echo "\t";
    }

    // line 13
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 15
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 17
    public function block_header($context, array $blocks = array())
    {
        // line 18
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<a href=\"Javascript:void(0);\" class=\"button ui-button-red action-confirm-delete fr ui-corner-none ui-corner-tr ui-corner-br\" data-icon-primary=\"ui-icon-closethick\">Delete Department</a>
\t<a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath(("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath"))), "html", null, true);
        echo "\" class=\"button ui-button-blue fr ui-corner-none ui-corner-tl ui-corner-bl\" data-icon-primary=\"ui-icon-triangle-1-w\">Back to Departments</a>
\t<h2>";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "header"), "html", null, true);
        echo "</h2>
";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        echo "    <section class=\"container_6 clearfix\">
        <div class=\"grid_6\">
        \t<div id=\"confirm-delete\" class=\"ui-helper-hidden ui-widget following message confirmation-message no-margin no-padding\">
\t\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t\t\t    \t<div class=\"fl no-margin no-padding\">
\t\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the department \"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "department"), "html", null, true);
        echo "\"? Any products associated to this department will end up having no department associated with them.</p>
\t\t\t    \t</div>
\t\t\t        <div class=\"fr\">
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete\">Cancel</a>
\t\t\t        \t<a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_delete"), array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"))), "html", null, true);
        echo "\" class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t\t        </div>
\t\t\t        <div class=\"clear\"></div>
\t\t\t    </div>
\t\t\t</div>
            <div class=\"portlet\">
                <header>
                    <h2>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo " Information</h2>
                </header>
                <section>
                    <div class=\"sidebar-tabs\">
                        <ul>
                            <li id=\"tab-general\"><a href=\"#general\">General</a></li>
                            <li id=\"tab-description\"><a href=\"#description\">Description</a></li>
                            <li id=\"tab-images\"><a href=\"#images\">Images</a></li>
                            <li id=\"tab-prices\"><a href=\"#prices\">Prices</a></li>
                            <li id=\"tab-files\"><a href=\"#files\">Files</a></li>
                            <li id=\"tab-redirects\"><a href=\"#redirects\">Redirects</a></li>
                            <li id=\"tab-seo\"><a href=\"#seo\">SEO</a></li>
                        </ul> 
                        ";
        // line 54
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateGeneral.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 55
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateDescription.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 56
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateImages.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 57
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updatePrices.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 58
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateFiles.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 59
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateRedirects.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 60
        echo "                        ";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateSeo.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 61
        echo "                    </div>
                </section>
            </div>
        </div>
\t    <div class=\"clear\"></div>
\t</section>
";
    }

    // line 68
    public function block_javascripts($context, array $blocks = array())
    {
        // line 69
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 70
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 41,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 121,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 45,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 43,  105 => 18,  66 => 49,  56 => 16,  115 => 21,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 18,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 88,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 57,  141 => 55,  134 => 99,  132 => 30,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 24,  111 => 20,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 30,  97 => 34,  95 => 17,  88 => 13,  78 => 16,  75 => 15,  71 => 43,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 15,  93 => 61,  91 => 14,  68 => 9,  65 => 8,  63 => 36,  43 => 24,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 13,  72 => 20,  64 => 18,  53 => 22,  49 => 9,  44 => 25,  42 => 4,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 60,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 3,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 17,  94 => 103,  89 => 20,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 9,  67 => 43,  62 => 37,  59 => 21,  55 => 14,  51 => 6,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 2,  28 => 3,);
    }
}
