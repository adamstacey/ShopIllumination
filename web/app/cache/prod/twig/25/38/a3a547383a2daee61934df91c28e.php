<?php

/* WebIlluminationAdminBundle:Departments:updateScript.js.twig */
class __TwigTemplate_2538a3a547383a2daee61934df91c28e extends Twig_Template
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
        echo "<script type=\"text/javascript\" defer=\"defer\">
\t";
        // line 3
        echo "\tvar \$imagesLoaded = false;
\tvar \$filesLoaded = false;
\tvar \$redirectsLoaded = false;
\t
\t";
        // line 7
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 8
        echo "\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateDescriptionFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 9
        echo "\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateImagesFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 10
        echo "\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateFilesFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 11
        echo "\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateRedirectsFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 12
        echo "\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateSeoFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 13
        echo "\t
\t\$(document).ready(function() {
\t\t";
        // line 15
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateGeneralScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 16
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateDescriptionScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 17
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateImagesScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 18
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updatePricesScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 19
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateFilesScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 20
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateRedirectsScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 21
        echo "\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":updateSeoScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 22
        echo "\t\t
\t\t";
        // line 24
        echo "\t\t\$(\".sidebar-tabs\").each(function() {
\t\t\tvar \$minimumSideBarHeight = 3;
\t\t\t\$(this).find(\"li\").each(function() {
\t\t\t\t\$minimumSideBarHeight = \$minimumSideBarHeight + \$(this).outerHeight(true);
\t\t\t});
\t\t\t\$(\".sidebar-tabs\").css(\"min-height\", \$minimumSideBarHeight);
\t\t});
\t\t
\t\t";
        // line 33
        echo "\t\t\$(\".sidebar-tabs input, .sidebar-tabs select, .sidebar-tabs textarea\").live('change', function() {
\t\t\tupdateStatus();
\t\t});
\t\t\$(\".sidebar-tabs\").bind(\"tabsselect\", function(event, ui) {
\t\t\tupdateStatus();
\t\t\treturn true;
\t\t});
\t\t
\t\t";
        // line 41
        echo "        
        \$(\".action-confirm-delete\").live('click', function() {
\t    \t\$(\"#confirm-delete\").fadeIn();
\t    \t\$(\"html, body\").animate({scrollTop: \$(\"#confirm-delete\").offset().top - 50},'slow');
        });
        
        ";
        // line 47
        echo " 
        \$(\".action-cancel-delete\").live('click', function() {
        \t\$(\"#confirm-delete\").fadeOut();
        });
\t});\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 12,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 7,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 36,  98 => 33,  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 42,  66 => 11,  56 => 16,  115 => 41,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 14,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 79,  133 => 8,  124 => 6,  111 => 47,  107 => 110,  80 => 22,  69 => 87,  60 => 17,  52 => 78,  97 => 34,  95 => 21,  88 => 24,  78 => 56,  75 => 15,  71 => 90,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 84,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 9,  27 => 9,  82 => 96,  72 => 20,  64 => 18,  53 => 15,  49 => 13,  44 => 25,  42 => 24,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 3,  224 => 27,  215 => 23,  211 => 135,  204 => 84,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 87,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 13,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 40,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 25,  41 => 11,  38 => 3,  35 => 7,  31 => 6,  28 => 3,);
    }
}
