<?php

/* WebIlluminationAdminBundle:Departments:updateFunctions.js.twig */
class __TwigTemplate_fb02e794634559df1981bf707ace8533 extends Twig_Template
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
        echo "function checkDataLoaded()
{
\tif (\$imagesLoaded && \$filesLoaded && \$redirectsLoaded)
\t{
\t\tupdateStatus();
\t}
}

";
        // line 11
        echo "function updateStatus()
{
\t";
        // line 14
        echo "\t\$(\"#form-status, #tab-general\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\tif (\$(\"#form-status-a\").is(\":checked\"))
\t{
\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-state-success\");
\t} else if (\$(\"#form-status-h\").is(\":checked\")) {
\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-state-highlight\");
\t} else {
\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-state-error\");
\t}
\t
\t";
        // line 25
        echo "\t\$(\"#tab-description\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\tif (\$(\"#form-description\").val() == \"\")
\t{
\t\t\$(\"#tab-description\").addClass(\"ui-state-error\");
\t} else {
\t\t\$(\"#tab-description\").addClass(\"ui-state-success\");
\t}
\t\t
\t";
        // line 34
        echo "\t\$(\"#tab-images\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\tvar \$numberOfImages = \$(\"#images .image-container img.action-image-popup\").length;
\tif (\$numberOfImages > 0) {
\t\t\$(\"#tab-images\").addClass(\"ui-state-success\");
\t} else {
\t\t\$(\"#tab-images\").addClass(\"ui-state-highlight\");
\t}
\t
\t";
        // line 43
        echo "\t\$(\"#tab-prices\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\t\$(\"#tab-prices\").addClass(\"ui-state-success\");
\t
\t";
        // line 47
        echo "\t\$(\"#tab-files\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\tvar \$numberOfFiles = \$(\"#files .file-container .file-id[value!='0']\").length;
\tif (\$numberOfFiles > 0) {
\t\t\$(\"#tab-files\").addClass(\"ui-state-success\");
\t} else {
\t\t\$(\"#tab-files\").addClass(\"ui-state-highlight\");
\t}
\t\t
\t";
        // line 56
        echo "\t\$(\"#tab-redirects\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\t\$(\"#tab-redirects\").addClass(\"ui-state-success\");
\t
\t";
        // line 60
        echo "\t\$(\"#tab-seo\").removeClass(\"ui-state-success ui-state-highlight ui-state-error\");
\tif ((\$(\"#form-url\").val() == \"\") || (\$(\"#form-page-title\").val() == \"\") || (\$(\"#form-header\").val() == \"\") || (\$(\"#form-meta-description\").val() == \"\") || (\$(\"#form-meta-keywords\").val() == \"\") || (\$(\"#form-search-words\").val() == \"\") || (\$(\"#form-alternative-product-codes\").val() == \"\"))
\t{ 
\t\t\$(\"#tab-seo\").addClass(\"ui-state-error\");
\t} else {
\t\t\$(\"#tab-seo\").addClass(\"ui-state-success\");
\t}
}

";
        // line 70
        echo "function loadNotificationMessage(\$container, \$message, \$type)
{
\t\$(\"#\"+\$container+\" .message-text\").html(\$message);
\t\$(\"#\"+\$container).fadeIn();
\t\$(\"html, body\").animate({scrollTop: \$(\"#\"+\$container).offset().top - 50},'slow');
\t\$(\"#ajax_loading\").hide();
}

";
        // line 79
        echo "function resetInteractions()
{
\t\$(\"#flash_messages .message\").hide();
\t\$(\".form-error\").hide();
\t\$(\"input, select, textarea\").removeClass(\"invalid\");
\t\$(\"#description-confirm-overwrite\").hide();
\t\$(\"#ajax_loading\").hide();
}

";
        // line 89
        echo "function finishInteractions()
{
\t\$(\"#ajax_loading\").hide();
\tupdateStatus();
}

";
        // line 96
        echo "function initialiseUniform(\$objectId)
{
\t\$(\"#\"+\$objectId+\" :checkbox:not(.no-uniform), #\"+\$objectId+\" :radio:not(.no-uniform), #\"+\$objectId+\" select:not(.no-uniform), #\"+\$objectId+\" :file:not(.no-uniform)\").uniform();
\t\t\$(\"#\"+\$objectId+\" .button\").each(function () {
        \$(this).button({
        \ticons: {
            \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
            }, 
           \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t});
    \tvar \$dataNotification = \$(this).attr(\"data-notification\");
    \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
    \t{
    \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
    \t}
    });
    \$(\"#\"+\$objectId+\" .selector, #\"+\$objectId+\" .uploader\").addClass(\"full\");
    \$(\"#\"+\$objectId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find('.message-close').click(function () {
    \t\$(this).parent().fadeOut();
    });
    
    return false;
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateFunctions.js.twig";
    }

    public function getDebugInfo()
    {
        return array (  115 => 89,  83 => 60,  164 => 126,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 32,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 43,  43 => 25,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 11,  82 => 27,  72 => 16,  64 => 12,  53 => 34,  49 => 11,  44 => 5,  42 => 7,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 20,  20 => 2,  30 => 12,  26 => 6,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 125,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 25,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 9,  24 => 6,  17 => 2,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 79,  102 => 70,  94 => 70,  89 => 20,  87 => 28,  84 => 53,  81 => 26,  73 => 19,  70 => 86,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
