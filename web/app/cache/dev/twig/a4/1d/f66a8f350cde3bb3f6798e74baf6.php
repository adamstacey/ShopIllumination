<?php

/* ::adminHeader.html.twig */
class __TwigTemplate_a41df66a8f350cde3bb3f6798e74baf6 extends Twig_Template
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
        echo "<header class=\"container_8 clearfix\">
\t<div>
\t\t<h1><a title=\"Kitchen Appliance Centre: Control Panel\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\"><strong>Kitchen Appliance Centre:</strong> Control Panel</a></h1>
        ";
        // line 4
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            $this->env->loadTemplate("::adminSearch.html.twig")->display($context);
        }
        // line 5
        echo "\t</div>
\t";
        // line 6
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 7
            echo "\t\t<div class=\"grid_8\">
    \t\t";
            // line 8
            $this->env->loadTemplate("::adminTopMenu.html.twig")->display($context);
            // line 9
            echo "\t\t</div>
\t";
        }
        // line 11
        echo "</header>";
    }

    public function getTemplateName()
    {
        return "::adminHeader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 7,  32 => 6,  25 => 4,  21 => 3,  17 => 1,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  314 => 47,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  224 => 27,  220 => 26,  215 => 23,  201 => 22,  197 => 21,  194 => 20,  138 => 18,  133 => 8,  130 => 7,  124 => 6,  119 => 114,  116 => 113,  113 => 112,  110 => 111,  107 => 110,  100 => 106,  96 => 104,  87 => 98,  85 => 97,  82 => 96,  80 => 95,  76 => 93,  71 => 90,  69 => 87,  62 => 83,  57 => 80,  54 => 79,  52 => 78,  43 => 11,  41 => 43,  37 => 8,  35 => 7,  31 => 6,  24 => 1,  99 => 42,  94 => 103,  91 => 40,  70 => 23,  64 => 84,  50 => 8,  47 => 7,  39 => 9,  36 => 3,  29 => 5,);
    }
}
