<?php

/* WebIlluminationAdminBundle:Products:updateCheaperAlternativesFunctions.js.twig */
class __TwigTemplate_0b5ce33144f51af579305720b37378ca extends Twig_Template
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
        echo "\$(\"#form-cheaper-alternatives-container\").sortable({
\tplaceholder: \"highlighted-sortable\",
\tupdate: function(event, ui) {
\t\treOrderCheaperAlternatives();
\t}
});

";
        // line 9
        echo "\t
function loadCheaperAlternatives()
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_cheaper_alternatives")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$cheaperAlternativesLoaded = false;
\t\t\t\$(\"#ajax-cheaper-alternatives-loading\").show();
\t\t},
\t\tdata: {
\t\t\tproductId: ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "id"), "html", null, true);
        echo "
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-cheaper-alternatives-loading\").hide();
      \t\t\$(\"#cheaper-alternative-loading-error\").fadeIn();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-cheaper-alternatives\").html(data);
\t\t\tinitialiseUniform(\"ajax-cheaper-alternatives\");
\t\t\t\$(\".action-confirm-delete-cheaper-alternatives, .action-unselect-all-cheaper-alternatives\").hide();
\t        \$(\"#ajax-cheaper-alternatives\").fadeIn();
\t        \$cheaperAlternativesLoaded = true;
\t        checkDataLoaded();
    \t    \$(\"#ajax-cheaper-alternatives-loading\").hide();
    \t    \$(\"#form-cheaper-alternatives-container\").sortable({
\t\t\t\tplaceholder: \"highlighted-cheaper-alternative\",
\t\t\t\tupdate: function(event, ui) {
\t\t\t\t\treOrderCheaperAlternatives();
\t\t\t\t}
\t\t\t});
\t\t}
\t});
}

";
        // line 45
        echo "function updateCheaperAlternatives()
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.cheaper-alternative-requires-update[value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\tvar cheaperAlternativesValidator = \$(\"#cheaper-alternatives :input\").validator({
\t\t\tposition : 'bottom left', 
\t\t\toffset : [0, 0], 
\t\t\tmessageClass : 'form-error', 
    \t\tmessage : '<div><em/></div>'
\t\t});
\t\tif (cheaperAlternativesValidator.data(\"validator\").checkValidity())
\t\t{
\t\t\t\$(\"input.cheaper-alternative-requires-update[value='1']\").each(function(index) {
\t\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update_cheaper_alternative")), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-cheaper-alternative-id-\"+\$elementIndex).val(),
\t\t\t      \t\tproductId: ";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "id"), "html", null, true);
        echo ",
\t\t\t      \t\tproductLinkId: \$(\"#form-product-link-id-\"+\$elementIndex).val(),
\t\t\t      \t\tdisplayOrder: \$(\"#form-cheaper-alternative-display-order-\"+\$elementIndex).val(),
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t        \t\$errorOccurred = true;
\t\t\t        \t\$(\"#cheaper-alternative-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-error-message-text\").html('Problems occurred while trying to update your cheaper alternatives. Please try again.');
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-success-message-text\").html('Your cheaper alternatives were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#cheaper-alternatives\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#cheaper-alternatives-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternatives .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#cheaper-alternatives-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t      \t\t\tif (data.response == 'success')
\t\t      \t\t\t{
\t\t      \t\t\t\t\$(\"#cheaper-alternative-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t\t      \t\t\t\t\$(\"#form-cheaper-alternative-id-\"+data.elementIndex).val(data.id);
\t\t      \t\t\t\t\$(\"#form-cheaper-alternative-requires-update-\"+data.elementIndex).val(\"0\");
\t\t      \t\t\t} else {
\t\t      \t\t\t\t\$(\"#cheaper-alternative-\"+data.elementIndex).addClass(\"ui-state-error\");
\t\t      \t\t\t\t\$errorOccurred = true;
\t\t      \t\t\t}
\t\t\t        \t\$numberOfElementsProcessed++;
\t\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t\t        \t{
\t\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-error-message-text\").html('Problems occurred while trying to update your cheaper alternatives. Please try again.');
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-error-message\").fadeIn();
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-success-message-text\").html('Your cheaper alternatives were successfully updated.');
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternative-success-message\").fadeIn();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#cheaper-alternatives\").offset().top + 35},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\tif (\$(\"#cheaper-alternatives-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#cheaper-alternatives .message\").hide();
\t\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#cheaper-alternatives-tab-to-redirect-to\").val()));
\t\t\t\t\t\t\t}
\t\t\t        \t}
\t\t\t      \t}
\t\t\t   \t});
\t\t\t});
\t\t} else {
\t\t\t\$(\"#cheaper-alternative-error-message-text\").html('Sorry, there was a problem updating. Please ensure all cheaper alternatives have been filled in and are valid. Please correct the highlighted cheaper alternatives and try again.');
        \t\$(\"#cheaper-alternative-error-message\").fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#cheaper-alternatives\").offset().top + 35},'slow');
        \t\$(\"#ajax_loading\").hide();
\t\t}
\t}
}

";
        // line 139
        echo "function loadNewCheaperAlternative()
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#cheaper-alternative-count\").val()) + 1;
\t\$(\"#cheaper-alternative-count\").val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_add_cheaper_alternative")), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tproductId: '";
        // line 149
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "id"), "html", null, true);
        echo "'
      \t},
      \terror: function(data) {
        \t\$(\"#cheaper-alternative-error-message-text\").html('Sorry, there was an error adding a new cheaper alternative. Please try again.');
\t\t\t\$(\"#cheaper-alternative-error-message\").fadeIn();
\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#cheaper-alternative-error-message\").offset().top - 100},'slow');
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-cheaper-alternatives-container\").append(data);
\t\t\t\t\$(\"#cheaper-alternative-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #cheaper-alternative-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #cheaper-alternative-\"+\$nextElement.toString()+\" select:not(.no-uniform), #cheaper-alternative-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\t\$(\"#cheaper-alternative-\"+\$nextElement.toString()).fadeIn();
\t\t\t\t\$(\"#cheaper-alternative-\"+\$nextElement.toString()+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderCheaperAlternatives();
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#cheaper-alternative-\"+\$nextElement.toString()).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 178
        echo "function reOrderCheaperAlternatives()
{
\t\$(\"#cheaper-alternatives .message\").hide();
\t\$(\".form-error\").remove();
\t\$cheaperAlternativeCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.cheaper-alternative-container:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.cheaper-alternative-container:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.cheaper-alternative-display-order\").val() != \$cheaperAlternativeCount)
\t\t{
\t\t\tif (\$row.find(\"input.cheaper-alternative-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.cheaper-alternative-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.cheaper-alternative-display-order\").val(\$cheaperAlternativeCount);
\t    \$cheaperAlternativeCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateCheaperAlternatives();
\t    }
\t});
\t\$(\"li.cheaper-alternative-container:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:updateCheaperAlternativesFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  644 => 211,  600 => 205,  593 => 203,  584 => 197,  569 => 192,  455 => 153,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 124,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 160,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 119,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 161,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 128,  366 => 159,  340 => 160,  503 => 223,  488 => 159,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 129,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 90,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 202,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 85,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 139,  210 => 103,  180 => 128,  172 => 132,  168 => 54,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 88,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 131,  286 => 76,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 100,  181 => 86,  167 => 86,  160 => 79,  45 => 12,  487 => 199,  481 => 155,  479 => 117,  477 => 430,  468 => 154,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 138,  324 => 170,  320 => 168,  297 => 118,  274 => 126,  256 => 86,  254 => 74,  252 => 122,  231 => 106,  216 => 178,  213 => 175,  202 => 169,  458 => 139,  453 => 177,  448 => 149,  437 => 172,  434 => 87,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 117,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 163,  130 => 95,  100 => 74,  85 => 54,  76 => 18,  112 => 79,  101 => 34,  98 => 69,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 51,  184 => 95,  138 => 84,  118 => 93,  105 => 35,  66 => 11,  56 => 32,  115 => 63,  83 => 59,  164 => 80,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 173,  205 => 169,  196 => 93,  192 => 63,  189 => 106,  178 => 145,  176 => 57,  165 => 127,  161 => 49,  152 => 79,  148 => 47,  141 => 105,  134 => 54,  132 => 76,  127 => 93,  123 => 46,  109 => 73,  90 => 64,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 45,  60 => 9,  52 => 7,  97 => 38,  95 => 33,  88 => 66,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 72,  425 => 371,  420 => 68,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 144,  335 => 143,  321 => 137,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 124,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 105,  159 => 32,  154 => 76,  151 => 73,  145 => 77,  136 => 100,  128 => 102,  125 => 63,  119 => 38,  110 => 38,  96 => 62,  93 => 34,  91 => 33,  68 => 48,  65 => 12,  63 => 36,  43 => 25,  50 => 5,  25 => 50,  92 => 30,  86 => 61,  79 => 54,  46 => 5,  37 => 20,  33 => 14,  27 => 9,  82 => 19,  72 => 31,  64 => 35,  53 => 11,  49 => 28,  44 => 25,  42 => 20,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 9,  22 => 2,  224 => 65,  215 => 73,  211 => 101,  204 => 99,  200 => 111,  195 => 47,  193 => 160,  190 => 98,  188 => 146,  185 => 149,  179 => 92,  177 => 146,  171 => 76,  162 => 83,  158 => 81,  156 => 80,  153 => 47,  146 => 42,  142 => 56,  137 => 55,  131 => 58,  126 => 74,  120 => 45,  117 => 59,  103 => 71,  99 => 36,  77 => 18,  74 => 53,  57 => 15,  47 => 9,  39 => 10,  32 => 9,  24 => 7,  17 => 2,  135 => 64,  129 => 75,  122 => 76,  116 => 32,  113 => 36,  108 => 84,  104 => 30,  102 => 27,  94 => 61,  89 => 65,  87 => 31,  84 => 48,  81 => 24,  73 => 50,  70 => 40,  67 => 18,  62 => 17,  59 => 11,  55 => 8,  51 => 30,  48 => 12,  41 => 4,  38 => 3,  35 => 7,  31 => 14,  28 => 6,);
    }
}
