<?php

/* ::adminFooter.html.twig */
class __TwigTemplate_9e55a7eec66a99ad4e5996bf4a46a280 extends Twig_Template
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
        echo "<footer>
\t<div id=\"footer-inner\" class=\"container_8 clearfix\">
\t    <div class=\"grid_8\">
\t        <span class=\"fr\">&copy; ";
        // line 4
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " Kitchen Appliance Centre</span>
\t    </div>
\t</div>
</footer>";
    }

    public function getTemplateName()
    {
        return "::adminFooter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 4,  66 => 23,  48 => 15,  30 => 7,  34 => 7,  32 => 6,  25 => 4,  21 => 3,  17 => 1,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  314 => 47,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  224 => 27,  220 => 26,  215 => 23,  201 => 22,  197 => 21,  194 => 20,  138 => 18,  133 => 8,  130 => 7,  124 => 6,  119 => 114,  116 => 113,  113 => 112,  110 => 111,  107 => 110,  100 => 106,  96 => 104,  87 => 98,  85 => 97,  82 => 96,  80 => 95,  76 => 93,  71 => 90,  69 => 87,  62 => 83,  57 => 19,  54 => 79,  52 => 78,  43 => 11,  41 => 43,  37 => 8,  35 => 7,  31 => 6,  24 => 1,  99 => 42,  94 => 103,  91 => 40,  70 => 23,  64 => 84,  50 => 8,  47 => 7,  39 => 11,  36 => 3,  29 => 5,);
    }
}
