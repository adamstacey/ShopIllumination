<?php

/* WebIlluminationAdminBundle:Departments:updateDescriptionFunctions.js.twig */
class __TwigTemplate_a79819ae08eeab198a73e2e508284443 extends Twig_Template
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
        // line 2
        echo "function getDescription()
{
\tvar editor = tinyMCE.get(\"form-description\");
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_description")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tresetInteractions();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#form-description\").addClass(\"disabled\");
\t\t},
\t    data: {
\t    \tshortDescription: \$(\"#form-short-description\").val()
\t    },
\t   \tsuccess: function(content) {
\t\t\teditor.setContent(content);
\t\t\t\$(\"#form-description\").removeClass(\"disabled\");
\t    \tfinishInteractions();
\t   \t}
\t});
}

";
        // line 25
        echo "function getShortDescription()
{
\tvar editor = tinyMCE.get(\"form-description\");
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_short_description")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tresetInteractions();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#form-short-description\").addClass(\"disabled\");
\t\t},
\t    data: {
\t    \tdescription: editor.getContent()
\t    },
\t   \tsuccess: function(content) {
\t    \t\$(\"#form-short-description\").val(content);
\t    \t\$(\"#form-short-description\").removeClass(\"disabled\");
\t    \tfinishInteractions();
\t   \t}
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateDescriptionFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 7,  100 => 106,  85 => 97,  76 => 93,  112 => 40,  101 => 34,  98 => 33,  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 42,  66 => 11,  56 => 32,  115 => 41,  83 => 60,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 79,  133 => 8,  124 => 6,  111 => 37,  107 => 110,  80 => 95,  69 => 87,  60 => 9,  52 => 78,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 90,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 47,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 5,  37 => 41,  33 => 12,  27 => 9,  82 => 96,  72 => 16,  64 => 84,  53 => 11,  49 => 28,  44 => 25,  42 => 24,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 6,  22 => 3,  224 => 27,  215 => 23,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 44,  126 => 49,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 18,  74 => 27,  57 => 80,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 2,  135 => 50,  129 => 50,  122 => 122,  116 => 113,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 24,  73 => 19,  70 => 40,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 25,  41 => 43,  38 => 3,  35 => 7,  31 => 6,  28 => 3,);
    }
}
