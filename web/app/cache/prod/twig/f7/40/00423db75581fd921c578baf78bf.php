<?php

/* WebIlluminationAdminBundle:Departments:updateFilesFunctions.js.twig */
class __TwigTemplate_f74000423db75581fd921c578baf78bf extends Twig_Template
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
function loadFiles()
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_files"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$filesLoaded = false;
\t\t\t\$(\"#ajax-images-loading\").show();
\t\t},
\t\tdata: {
\t\t\tobjectId: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"), "html", null, true);
        echo ",
\t\t\tobjectType: 'department'
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-files-loading\").hide();
      \t\t\$(\"#file-loading-error\").fadeIn();
      \t\t\$filesLoaded = true;
\t        checkDataLoaded();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-files\").html(data);
\t\t\t\$(\"#ajax-files :checkbox:not(.no-uniform), #ajax-files :radio:not(.no-uniform), #ajax-files select:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-files .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
\t        \$(\"#ajax-files .selector, #ajax-files .uploader\").addClass(\"full\");
\t        \$(\"#ajax-files\").fadeIn();
\t        \$filesLoaded = true;
\t        checkDataLoaded();
    \t    \$(\"#ajax-files-loading\").hide();
\t\t}
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateFilesFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 4,  61 => 11,  36 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 85,  65 => 84,  63 => 18,  43 => 47,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 2,  82 => 27,  72 => 16,  64 => 12,  53 => 8,  49 => 11,  44 => 5,  42 => 7,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 7,  20 => 2,  30 => 4,  26 => 3,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 9,  137 => 51,  131 => 125,  126 => 46,  120 => 39,  117 => 44,  103 => 36,  99 => 34,  77 => 25,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 11,  24 => 6,  17 => 1,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 24,  102 => 37,  94 => 33,  89 => 20,  87 => 28,  84 => 28,  81 => 26,  73 => 19,  70 => 86,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
