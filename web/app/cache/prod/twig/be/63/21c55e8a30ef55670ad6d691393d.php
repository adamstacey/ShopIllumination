<?php

/* WebIlluminationAdminBundle:Departments:updateImages.html.twig */
class __TwigTemplate_be6321c55e8a30ef55670ad6d691393d extends Twig_Template
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
        echo "<section id=\"images\" class=\"form ui-helper-hidden\">
\t<h2>Images</h2>
\t<div class=\"clearfix\">
\t\t<div id=\"image-loading-error\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\">
\t\t    <div class=\"ui-state-error no-margin-top ui-corner-all\">
\t\t    \t<span class=\"ui-icon ui-icon-alert\"></span>
\t\t        <p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the images. Please contact support and advise.</p>
\t\t    </div>
\t\t</div>
\t\t<div id=\"ajax-images-loading\" class=\"ac\">
\t\t\t<p>Loading images, please wait&hellip;</p>
\t\t\t<p><img alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p>
\t\t</div>
\t\t<div id=\"ajax-images\" class=\"ui-helper-hidden\"></div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateImages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 126,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  90 => 32,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 85,  65 => 84,  63 => 34,  43 => 47,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 2,  82 => 27,  72 => 16,  64 => 12,  53 => 8,  49 => 11,  44 => 5,  42 => 7,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 20,  20 => 2,  30 => 12,  26 => 3,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 125,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 25,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 11,  24 => 6,  17 => 1,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 24,  102 => 70,  94 => 33,  89 => 20,  87 => 28,  84 => 53,  81 => 26,  73 => 19,  70 => 86,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
