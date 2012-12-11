<?php

/* WebIlluminationAdminBundle:System:ajaxGetFilesFunctions.js.twig */
class __TwigTemplate_91fa4604f2583660ae99f3d62a26d426 extends Twig_Template
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
        echo "function updateFiles()
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.file-requires-update[value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\tvar filesValidator = \$(\"#files :input\").validator({
\t\t\tposition : 'bottom left', 
\t\t\toffset : [0, 0], 
\t\t\tmessageClass : 'form-error', 
    \t\tmessage : '<div><em/></div>'
\t\t});
\t\tif (filesValidator.data(\"validator\").checkValidity())
\t\t{
\t\t\t\$(\"input.file-requires-update[value='1']\").each(function(index) {
\t\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_file"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-file-id-\"+\$elementIndex).val(),
\t\t\t      \t\tfile: \$(\"#form-file-file-\"+\$elementIndex).val(),
\t\t\t      \t\tobjectId: '";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
\t\t\t      \t\tobjectType: '";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "',
\t\t\t      \t\tlocale: 'en',
\t\t\t      \t\tdisplayName: \$(\"#form-file-display-name-\"+\$elementIndex).val(),
\t\t\t      \t\tdisplayOrder: \$(\"#form-file-display-order-\"+\$elementIndex).val(),
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t        \t\$errorOccurred = true;
\t\t\t        \t\$(\"#file-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#file-error-message-text\").html('There was a problem trying to update the files. Make sure all fields are filled in and valid.');
\t\t\t\t\t\t\t\t\$(\"#file-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#file-success-message-text\").html('Your files were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#file-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#files\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#files-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#files .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#files-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t      \t\t\tif (data.response == 'success')
\t\t      \t\t\t{
\t\t      \t\t\t\t\$(\"#file-\"+data.elementIndex).removeClass(\"ui-state-highlight\");
\t\t      \t\t\t\t\$(\"#file-view-\"+data.elementIndex).html('<a target=\"_blank\" href=\"'+data.path+'\" class=\"button ui-button-blue\" data-icon-primary=\"ui-icon-document\">View</a>');
\t\t      \t\t\t\t\$(\"#file-view-\"+data.elementIndex+\" .button\").each(function () {
\t\t\t\t\t\t        \$(this).button({
\t\t\t\t\t\t        \ticons: {
\t\t\t\t\t\t            \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t\t\t\t\t\t                secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t\t\t\t\t\t            }, 
\t\t\t\t\t\t           \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t\t\t\t\t\t    \t});
\t\t\t\t\t\t    });
\t\t      \t\t\t\t\$(\"#form-file-id-\"+data.elementIndex).val(data.id);
\t\t      \t\t\t\t\$(\"#form-file-requires-update-\"+data.elementIndex).val(\"0\");
\t\t      \t\t\t\t\$(\"#file-upload-error-\"+data.elementIndex+\", #file-upload-success-\"+data.elementIndex+\", #file-file-uploading-\"+data.elementIndex).hide();
\t\t\t\t\t\t\t\$(\"#file-file-upload-\"+data.elementIndex+\" .qq-upload-list\").html(\"\");
\t\t\t\t\t\t\t\$(\"#file-file-upload-\"+data.elementIndex+\" span.filename\").html(\"No file selected\");
\t\t\t\t\t\t\t\$(\"#form-file-file-\"+data.elementIndex).val(\"\");
\t\t\t\t\t\t\t\$(\"#file-file-upload-\"+data.elementIndex).fadeIn();
\t\t      \t\t\t} else {
\t\t      \t\t\t\t\$(\"#file-\"+data.elementIndex).addClass(\"ui-state-highlight\");
\t\t      \t\t\t\t\$errorOccurred = true;
\t\t      \t\t\t}
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#file-error-message-text\").html('There was a problem trying to update the files. Make sure all fields are filled in and valid.');
\t\t\t\t\t\t\t\t\$(\"#file-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#file-success-message-text\").html('Your files were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#file-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#files\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#files-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#files .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#files-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t}
\t\t\t   \t});
\t\t\t});
\t\t} else {
\t\t\t\$(\"#file-error-message-text\").html('There was a problem trying to update the files. Make sure all fields are filled in and valid.');
        \t\$(\"#file-error-message\").fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#files\").offset().top + 35},'slow');
        \t\$(\"#ajax_loading\").hide();
\t\t}
\t}
}

";
        // line 114
        echo "function loadNewFile()
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#file-count\").val()) + 1;
\t\$(\"#file-count\").val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_file"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tobjectId: '";
        // line 124
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
      \t\tobjectType: '";
        // line 125
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "'
      \t},
      \terror: function(data) {
        \t\$(\"#file-error-message-text\").html('Sorry, there was an error adding a new file. Please try again.');
\t\t\t\$(\"#file-error-message\").fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-files-container\").append(data);
\t\t\t\t\$(\"#file-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #file-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #file-\"+\$nextElement.toString()+\" select:not(.no-uniform)\").uniform();
\t\t\t\t\$(\"#file-\"+\$nextElement.toString()).fadeIn();
\t\t\t\t\$(\"#file-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderFiles();
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#file-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 153
        echo "function reOrderFiles()
{
\t\$(\"#files .message\").hide();
\t\$(\".form-error\").remove();
\t\$fileCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.file-container:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.file-container:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.file-display-order\").val() != \$fileCount)
\t\t{
\t\t\tif (\$row.find(\"input.file-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.file-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.file-display-order\").val(\$fileCount);
\t    \$fileCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateFiles();
\t    }
\t});
\t\$(\"li.file-container:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:ajaxGetFilesFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 284,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 272,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 213,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 192,  466 => 190,  457 => 185,  451 => 181,  436 => 171,  422 => 167,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 151,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 327,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 313,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 281,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 210,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 202,  483 => 198,  480 => 196,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 166,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 146,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 100,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 120,  276 => 119,  262 => 115,  235 => 80,  232 => 106,  212 => 96,  207 => 44,  143 => 57,  157 => 68,  366 => 158,  340 => 255,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 118,  253 => 110,  233 => 105,  226 => 103,  187 => 65,  150 => 65,  260 => 82,  155 => 67,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 116,  258 => 114,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 78,  182 => 82,  175 => 62,  144 => 119,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 202,  491 => 201,  432 => 170,  203 => 92,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 159,  363 => 157,  359 => 154,  355 => 201,  351 => 200,  347 => 150,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 119,  265 => 116,  251 => 218,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 40,  168 => 60,  149 => 50,  139 => 114,  240 => 108,  230 => 104,  121 => 31,  257 => 222,  249 => 60,  106 => 40,  334 => 142,  294 => 125,  286 => 121,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 54,  45 => 9,  487 => 199,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 171,  424 => 167,  415 => 165,  392 => 162,  385 => 268,  376 => 339,  367 => 158,  360 => 156,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 112,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 92,  458 => 109,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 165,  391 => 159,  387 => 209,  384 => 62,  322 => 140,  318 => 139,  300 => 127,  296 => 126,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 56,  85 => 26,  76 => 31,  112 => 35,  101 => 39,  98 => 75,  272 => 118,  269 => 117,  228 => 105,  221 => 77,  197 => 89,  184 => 64,  138 => 73,  118 => 59,  105 => 36,  66 => 21,  56 => 21,  115 => 58,  83 => 23,  164 => 73,  140 => 74,  58 => 15,  21 => 4,  61 => 15,  36 => 4,  209 => 95,  205 => 94,  196 => 72,  192 => 87,  189 => 86,  178 => 79,  176 => 41,  165 => 75,  161 => 70,  152 => 125,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 48,  123 => 46,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 60,  111 => 38,  107 => 35,  80 => 55,  69 => 30,  60 => 16,  52 => 16,  97 => 55,  95 => 37,  88 => 26,  78 => 32,  75 => 55,  71 => 53,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 101,  218 => 100,  159 => 54,  154 => 124,  151 => 66,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 45,  110 => 42,  96 => 34,  93 => 36,  91 => 27,  68 => 29,  65 => 20,  63 => 17,  43 => 6,  50 => 16,  25 => 4,  92 => 36,  86 => 22,  79 => 54,  46 => 13,  37 => 4,  33 => 3,  27 => 2,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 11,  44 => 15,  42 => 8,  34 => 3,  29 => 3,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 101,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 164,  190 => 76,  188 => 153,  185 => 83,  179 => 48,  177 => 61,  171 => 75,  162 => 36,  158 => 125,  156 => 41,  153 => 67,  146 => 64,  142 => 46,  137 => 46,  131 => 44,  126 => 47,  120 => 45,  117 => 44,  103 => 33,  99 => 19,  77 => 21,  74 => 20,  57 => 17,  47 => 27,  39 => 5,  32 => 9,  24 => 3,  17 => 2,  135 => 38,  129 => 43,  122 => 59,  116 => 58,  113 => 57,  108 => 41,  104 => 40,  102 => 57,  94 => 21,  89 => 67,  87 => 30,  84 => 34,  81 => 60,  73 => 19,  70 => 52,  67 => 48,  62 => 16,  59 => 18,  55 => 13,  51 => 28,  48 => 15,  41 => 23,  38 => 21,  35 => 5,  31 => 4,  28 => 11,);
    }
}