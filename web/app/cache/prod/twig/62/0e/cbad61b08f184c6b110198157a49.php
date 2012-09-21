<?php

/* WebIlluminationAdminBundle:System:ajaxGetImagesFunctions.js.twig */
class __TwigTemplate_620ecbad61b08f184c6b110198157a49 extends Twig_Template
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
        echo "function updateImages()
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.image-requires-update[value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\tvar imagesValidator = \$(\"#images :input\").validator({
\t\t\tposition : 'bottom left', 
\t\t\toffset : [0, 0], 
\t\t\tmessageClass : 'form-error', 
    \t\tmessage : '<div><em/></div>'
\t\t});
\t\tif (imagesValidator.data(\"validator\").checkValidity())
\t\t{
\t\t\t\$(\"input.image-requires-update[value='1']\").each(function(index) {
\t\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_image"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-image-id-\"+\$elementIndex).val(),
\t\t\t      \t\tfile: \$(\"#form-image-file-\"+\$elementIndex).val(),
\t\t\t      \t\tobjectId: '";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
\t\t\t      \t\tobjectType: '";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "',
\t\t\t      \t\timageType: '";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "imageType"), "html", null, true);
        echo "',
\t\t\t      \t\tlocale: 'en',
\t\t\t      \t\ttitle: \$(\"#form-image-title-\"+\$elementIndex).val(),
\t\t\t      \t\talignment: \$(\"#form-image-alignment-\"+\$elementIndex).val(),
\t\t\t      \t\tdescription: \$(\"#form-image-description-\"+\$elementIndex).val(),
\t\t\t      \t\tlink: \$(\"#form-image-link-\"+\$elementIndex).val(),
\t\t\t      \t\tdisplayOrder: \$(\"#form-image-display-order-\"+\$elementIndex).val(),
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t        \t\$errorOccurred = true;
\t\t\t        \t\$(\"#image-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#image-error-message-text\").html('Problems occurred while trying to update your images. Please check and try again.');
\t\t\t\t\t\t\t\t\$(\"#image-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#image-success-message-text\").html('Your images were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#image-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#images\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#images-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#images .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#images-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t      \t\t\tif (data.response == 'success')
\t\t      \t\t\t{
\t\t      \t\t\t\t\$(\"#image-\"+data.elementIndex).removeClass(\"ui-state-highlight\");
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).attr(\"alt\", data.title);
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).attr(\"data-image-size-width\", data.largeWidth);
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).attr(\"data-image-size-height\", data.largeHeight);
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).attr(\"data-image-large-path\", data.large);
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).attr(\"src\", data.thumbnail);
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).addClass(\"action-image-popup\");
\t\t      \t\t\t\t\$(\"#form-image-preview-\"+data.elementIndex).addClass(\"thumbnail\");
\t\t      \t\t\t\t\$(\"#form-image-id-\"+data.elementIndex).val(data.id);
\t\t      \t\t\t\t\$(\"#form-image-requires-update-\"+data.elementIndex).val(\"0\");
\t\t      \t\t\t\t\$(\"#image-upload-error-\"+data.elementIndex+\", #image-upload-success-\"+data.elementIndex+\", #image-file-uploading-\"+data.elementIndex).hide();
\t\t\t\t\t\t\t\$(\"#image-file-upload-\"+data.elementIndex+\" .qq-upload-list\").html(\"\");
\t\t\t\t\t\t\t\$(\"#image-file-upload-\"+data.elementIndex+\" span.filename\").html(\"No file selected\");
\t\t\t\t\t\t\t\$(\"#form-image-file-\"+data.elementIndex).val(\"\");
\t\t\t\t\t\t\t\$(\"#image-file-upload-\"+data.elementIndex).fadeIn();
\t\t      \t\t\t} else {
\t\t      \t\t\t\t\$(\"#image-\"+data.elementIndex).addClass(\"ui-state-highlight\");
\t\t      \t\t\t\t\$errorOccurred = true;
\t\t      \t\t\t}
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#image-error-message-text\").html('Problems occurred while trying to update your images. Please check and try again.');
\t\t\t\t\t\t\t\t\$(\"#image-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#image-success-message-text\").html('Your images were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#image-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#images\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#images-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#images .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#images-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t}
\t\t\t   \t});
\t\t\t});
\t\t} else {
\t\t\t\$(\"#image-error-message-text\").html('Sorry, there was a problem saving. Please ensure all images have been filled in and are valid. Please correct the highlighted images and try again.');
        \t\$(\"#image-error-message\").fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#images\").offset().top + 35},'slow');
        \t\$(\"#ajax_loading\").hide();
\t\t}
\t}
}

";
        // line 115
        echo "function loadNewImage()
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#image-count\").val()) + 1;
\t\$(\"#image-count\").val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_image"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tobjectId: '";
        // line 125
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
      \t\tobjectType: '";
        // line 126
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "'
      \t},
      \terror: function(data) {
        \t\$(\"#image-error-message-text\").html('Sorry, there was an error adding a new image. Please try again.');
\t\t\t\$(\"#image-error-message\").fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-images-container\").append(data);
\t\t\t\t\$(\"#image-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #image-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #image-\"+\$nextElement.toString()+\" select:not(.no-uniform)\").uniform();
\t\t\t\t\$(\"#image-\"+\$nextElement.toString()).fadeIn();
\t\t\t\t\$(\"#image-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderImages();
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#image-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 154
        echo "function reOrderImages()
{
\t\$(\"#images .message\").hide();
\t\$(\".form-error\").remove();
\t\$imageCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.image-container:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.image-container:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.image-display-order\").val() != \$imageCount)
\t\t{
\t\t\tif (\$row.find(\"input.image-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.image-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.image-display-order\").val(\$imageCount);
\t    \$imageCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateImages();
\t    }
\t});
\t\$(\"li.image-container:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:ajaxGetImagesFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 93,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 127,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 641,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 421,  476 => 146,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 111,  288 => 123,  229 => 105,  206 => 54,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 147,  219 => 71,  273 => 86,  263 => 115,  246 => 80,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 235,  276 => 119,  262 => 86,  235 => 80,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 110,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 67,  223 => 102,  186 => 45,  169 => 51,  301 => 102,  298 => 100,  292 => 98,  267 => 224,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 78,  182 => 44,  175 => 40,  144 => 119,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 92,  114 => 43,  208 => 64,  183 => 58,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 111,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 98,  279 => 120,  275 => 119,  265 => 116,  251 => 82,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 53,  168 => 52,  149 => 50,  139 => 41,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 30,  334 => 94,  294 => 78,  286 => 76,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 50,  45 => 9,  487 => 199,  481 => 147,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 118,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 53,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 62,  194 => 88,  130 => 106,  100 => 56,  85 => 26,  76 => 31,  112 => 25,  101 => 37,  98 => 75,  272 => 118,  269 => 91,  228 => 105,  221 => 72,  197 => 89,  184 => 64,  138 => 27,  118 => 59,  105 => 38,  66 => 16,  56 => 19,  115 => 58,  83 => 18,  164 => 51,  140 => 38,  58 => 17,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 154,  189 => 86,  178 => 79,  176 => 41,  165 => 36,  161 => 35,  152 => 125,  148 => 43,  141 => 45,  134 => 60,  132 => 102,  127 => 48,  123 => 39,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 60,  111 => 38,  107 => 24,  80 => 55,  69 => 30,  60 => 16,  52 => 16,  97 => 27,  95 => 37,  88 => 21,  78 => 32,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 67,  402 => 164,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 138,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 62,  218 => 100,  159 => 54,  154 => 124,  151 => 121,  145 => 29,  136 => 103,  128 => 35,  125 => 98,  119 => 26,  110 => 42,  96 => 34,  93 => 20,  91 => 36,  68 => 29,  65 => 23,  63 => 17,  43 => 13,  50 => 18,  25 => 4,  92 => 36,  86 => 22,  79 => 29,  46 => 13,  37 => 4,  33 => 7,  27 => 5,  82 => 33,  72 => 22,  64 => 17,  53 => 16,  49 => 11,  44 => 15,  42 => 13,  34 => 3,  29 => 7,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 7,  26 => 2,  22 => 2,  224 => 101,  215 => 58,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 76,  188 => 153,  185 => 83,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 49,  153 => 30,  146 => 64,  142 => 42,  137 => 28,  131 => 44,  126 => 40,  120 => 45,  117 => 92,  103 => 33,  99 => 19,  77 => 21,  74 => 20,  57 => 17,  47 => 27,  39 => 10,  32 => 9,  24 => 4,  17 => 2,  135 => 38,  129 => 27,  122 => 26,  116 => 58,  113 => 25,  108 => 41,  104 => 24,  102 => 29,  94 => 21,  89 => 22,  87 => 30,  84 => 34,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 15,  59 => 18,  55 => 29,  51 => 28,  48 => 15,  41 => 23,  38 => 21,  35 => 10,  31 => 4,  28 => 11,);
    }
}
