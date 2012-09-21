<?php

/* WebIlluminationAdminBundle:Departments:updateSeoFunctions.js.twig */
class __TwigTemplate_1f3ae5084a505136171492502aa2f5fd extends Twig_Template
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
        echo "function resetSeo()
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\tdataType: \"json\",
\t\turl: \"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_reset_seo")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tresetInteractions();
\t\t\t\$(\"#ajax_loading\").show();
\t\t},
\t\tdata: {
\t\t\tid: ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"), "html", null, true);
        echo "
\t\t},
\t\terror: function(data) {
\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem resetting the SEO. Please try again.\");
\t\t\tfinishInteractions();
\t    },
\t\tsuccess: function(data) {
\t\t\t\$(\"#form-url\").val(data.seo.url);
\t\t\t\$(\"#form-page-title\").val(data.seo.pageTitle);
\t\t\t\$(\"#form-header\").val(data.seo.header);
\t\t\t\$(\"#form-meta-description\").val(data.seo.metaDescription);
\t\t\t\$(\"#form-meta-keywords\").val(data.seo.metaKeywords);
\t\t\t\$(\"#form-search-words\").val(data.seo.searchWords);
\t\t\tif (data.response == 'success')
\t\t\t{
\t\t\t\tloadNotificationMessage(\"message-success\", \"The SEO was successfully reset and any redirects required were setup.\");
\t\t\t} else {
\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem resetting the SEO. Please try again.\");
\t\t\t}
\t\t\tfinishInteractions();
\t\t\tloadRedirects();
\t\t\tupdateStatus();
\t\t}
\t});
}
";
        // line 39
        echo "function checkMaximumCharcaters(\$object, \$maximumCharacters)
{
\tif (\$object)
\t{
\t\tvar \$value = \$object.val();
\t\tvar \$returnMessage = '';
\t\tvar \$charactersLeft = 0;
\t\tif (\$value.length <= \$maximumCharacters)
\t\t{
\t\t\t\$charactersLeft = \$maximumCharacters - \$value.length;
\t\t\t\$returnMessage = '<strong>Max Characters:</strong> ' + \$maximumCharacters + ' (You have <strong class=\"green\">' + \$charactersLeft + '</strong> character';
\t\t\tif (\$charactersLeft != 1)
\t\t\t{
\t\t\t\t\$returnMessage = \$returnMessage + 's';
\t\t\t}
\t\t\t\$returnMessage = \$returnMessage + ' remaining)';
\t\t} else {
\t\t\t\$charactersLeft = \$value.length - \$maximumCharacters;
\t\t\t\$returnMessage = '<strong>Max Characters:</strong> ' + \$maximumCharacters + ' (You have used <strong class=\"red\">' + \$charactersLeft + '</strong> character';
\t\t\tif (\$charactersLeft != 1)
\t\t\t{
\t\t\t\t\$returnMessage = \$returnMessage + 's';
\t\t\t}
\t\t\t\$returnMessage = \$returnMessage + ' too many)';
\t\t}
\t\treturn \$returnMessage;
\t}
\treturn '';
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateSeoFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 12,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 61,  98 => 33,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 62,  66 => 11,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 63,  90 => 30,  54 => 79,  133 => 8,  124 => 66,  111 => 47,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 78,  97 => 34,  95 => 21,  88 => 24,  78 => 56,  75 => 15,  71 => 90,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 24,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 45,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 13,  27 => 9,  82 => 60,  72 => 20,  64 => 18,  53 => 15,  49 => 13,  44 => 25,  42 => 24,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 40,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 13,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 2,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 49,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 43,  41 => 11,  38 => 3,  35 => 7,  31 => 42,  28 => 3,);
    }
}
