<?php

/* WebIlluminationAdminBundle:Departments:updateImagesFunctions.js.twig */
class __TwigTemplate_33ce3b444c4d44d3c91933b13ea08bae extends Twig_Template
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
        echo "\t
function loadImages()
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_images"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$imagesLoaded = false;
\t\t\t\$(\"#ajax-images-loading\").show();
\t\t},
\t\tdata: {
\t\t\tobjectId: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"), "html", null, true);
        echo ",
\t\t\tobjectType: 'department',
\t\t\timageType: 'gallery'
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-images-loading\").hide();
      \t\t\$(\"#image-loading-error\").fadeIn();
      \t\t\$filesLoaded = true;
\t        checkDataLoaded();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-images\").html(data);
\t\t\t\$(\"#ajax-images :checkbox:not(.no-uniform), #ajax-images :radio:not(.no-uniform), #ajax-images select:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-images .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
\t        \$(\"#ajax-images .selector, #ajax-images .uploader\").addClass(\"full\");
\t        \$(\"#ajax-images\").fadeIn();
\t        \$imagesLoaded = true;
\t        checkDataLoaded();
    \t    \$(\"#ajax-images-loading\").hide();
\t\t}
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateImagesFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 121,  249 => 119,  106 => 20,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 11,  112 => 40,  101 => 61,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 37,  118 => 43,  105 => 22,  66 => 16,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 59,  161 => 58,  152 => 58,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 35,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 8,  124 => 90,  111 => 25,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 6,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 17,  93 => 33,  91 => 105,  68 => 9,  65 => 45,  63 => 36,  43 => 4,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 12,  27 => 9,  82 => 13,  72 => 20,  64 => 18,  53 => 10,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 61,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 11,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 57,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 83,  59 => 21,  55 => 14,  51 => 30,  48 => 5,  41 => 11,  38 => 3,  35 => 8,  31 => 2,  28 => 3,);
    }
}
