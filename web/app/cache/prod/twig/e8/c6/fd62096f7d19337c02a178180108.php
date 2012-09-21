<?php

/* WebIlluminationAdminBundle:System:file.html.twig */
class __TwigTemplate_e8c6fd62096f7d19337c02a178180108 extends Twig_Template
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
        echo "<li class=\"file-container\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" id=\"file-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tbody>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"9\" rowspan=\"2\" class=\"ac\">
\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"ac select delete\">
\t\t\t\t\t\t<input data-index=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" type=\"checkbox\" class=\"file-select\" id=\"form-file-select-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"1\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"no-padding-bottom\">
\t\t\t\t\t\t<input type=\"text\" class=\"file-display-name full\" id=\"form-file-display-name-";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" placeholder=\"Enter a title\" value=\"";
        if ($this->getAttribute($this->getContext($context, "data", true), "displayName", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "displayName"), "html", null, true);
        }
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"ac\">
\t\t\t\t\t\t<div id=\"file-view-";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">";
        if ($this->getAttribute($this->getContext($context, "data", true), "path", array(), "any", true, true)) {
            if (($this->getAttribute($this->getContext($context, "data"), "path") != "")) {
                echo "<a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "data"), "path")), "html", null, true);
                echo "\" class=\"button ui-button-blue\" data-icon-primary=\"ui-icon-document\">View</a>";
            }
        }
        echo "</div>
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"ac\">
\t\t\t\t\t\t<input type=\"hidden\" class=\"file-display-order\" id=\"form-file-display-order-";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"file-requires-update\" id=\"form-file-requires-update-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t\t<input type=\"hidden\" class=\"file-id\" id=\"form-file-id-";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"";
        if ($this->getAttribute($this->getContext($context, "data", true), "id", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "id"), "html", null, true);
        } else {
            echo "0";
        }
        echo "\" />
\t\t\t\t\t\t<a href=\"Javascript:void(0);\" data-index=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"button ui-button-red action-confirm-delete-file\" data-icon-primary=\"ui-icon-closethick\">Delete</a>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"no-padding-top\">
\t\t\t\t\t\t<div class=\"file-file-upload\" id=\"file-file-upload-";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\"></div>
\t\t\t\t\t\t<div class=\"file-file-uploading ui-helper-hidden\" id=\"file-file-uploading-";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<img class=\"fl\" alt=\"Loading\" width=\"16\" height=\"11\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-file-loader.gif"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<p>Please wait, uploading file&hellip;</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"file-upload-success-";
        // line 32
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"ui-widget file-upload-success file-upload-message ui-helper-hidden\">
\t\t\t\t\t\t    <div class=\"ui-state-success no-margin ui-corner-all\"> 
\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-circle-check\"></span>
\t\t\t\t\t\t            <span class=\"file-upload-success-text\" id=\"file-upload-success-text-";
        // line 36
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\"></span>
\t\t\t\t\t\t            <img class=\"fr action-cancel-file-upload action-cancel-file-upload-";
        // line 37
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t        </p>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"file-upload-error-";
        // line 41
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"ui-widget file-upload-error file-upload-message ui-helper-hidden\">
\t\t\t\t\t\t    <div class=\"ui-state-error no-margin ui-corner-all\"> 
\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-alert\"></span>
\t\t\t\t\t\t            <span class=\"file-upload-error-text\" id=\"file-upload-error-text-";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\"></span>
\t\t\t\t\t\t            <img class=\"fr action-cancel-file-upload action-cancel-file-upload-";
        // line 46
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t        </p>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"form-file-file-";
        // line 50
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"file-file\" />\t\t
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</tbody>
\t\t</table>
\t\t<script type=\"text/javascript\">
\t\t\t\$(document).ready(function() {
\t\t\t\t";
        // line 58
        echo "\t\t\t\t\$(\".action-cancel-file-upload-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").live('click', function() {
\t\t\t\t\t\$(\"#file-upload-error-";
        // line 59
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #file-upload-success-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #file-file-uploading-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t\t\t\t\t\$(\"#file-file-upload-";
        // line 60
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " .qq-upload-list\").html(\"\");
\t\t\t\t\t\$(\"#file-file-upload-";
        // line 61
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " span.filename\").html(\"No file selected\");
\t\t\t\t\t\$(\"#form-file-file-";
        // line 62
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"\");
\t\t\t\t\t\$(\"#file-file-upload-";
        // line 63
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t\t\t\t});
\t\t\t\t
\t\t\t\t";
        // line 67
        echo "\t\t\t\tvar fileUploader";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " = new qq.FileUploader({
\t\t\t\t    element: document.getElementById('file-file-upload-";
        // line 68
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "'),
\t\t\t\t    action: '";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_upload_file"), "html", null, true);
        echo "',
\t\t\t\t    onSubmit: function(id, fileName) {
\t\t\t\t    \t\$(\"#form-file-file-";
        // line 71
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"\");
\t\t\t\t    \t\$(\"#file-file-upload-";
        // line 72
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t\t\t\t    \tvar fileExtensions = fileName.toLowerCase().split(\".\");
\t        \t\t\tvar fileExtension = fileExtensions[(fileExtensions.length - 1)];
\t        \t\t\tif ((fileExtension == 'pdf') || (fileExtension == 'doc') || (fileExtension == 'docx') || (fileExtension == 'xls') || (fileExtension == 'xlsx') || (fileExtension == 'ppt') || (fileExtension == 'pptx'))
\t\t\t\t\t\t{
\t        \t\t\t\t\$(\"#file-file-uploading-";
        // line 77
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t} else {
\t        \t\t\t\t\$(\"#file-upload-error-text-";
        // line 79
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(\"pdf, doc, xls and ppt files only.\");
\t        \t\t\t\t\$(\"#file-upload-error-";
        // line 80
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t\treturn false;
\t\t\t\t\t    }
\t\t\t\t    },
\t        \t\tonComplete: function(id, fileName, responseJSON) {
\t        \t\t\t\$(\"#file-file-upload-";
        // line 85
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #file-file-uploading-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #file-upload-error-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #file-upload-success-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t        \t\t\tif (responseJSON.response == 'success')
\t        \t\t\t{
\t        \t\t\t\t\$(\"#form-file-requires-update-";
        // line 88
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"1\");
\t        \t\t\t\t\$(\"#file-upload-success-text-";
        // line 89
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(\"File Uploaded: \"+responseJSON.fileSize);
\t        \t\t\t\t\$(\"#form-file-file-";
        // line 90
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(responseJSON.fileName);
\t        \t\t\t\t\$(\"#file-upload-success-";
        // line 91
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t} else {
\t        \t\t\t\t\$(\"#file-upload-error-text-";
        // line 93
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(responseJSON.message);
\t        \t\t\t\t\$(\"#file-upload-error-";
        // line 94
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t}
\t        \t\t}
\t\t\t\t});
\t\t\t\t
\t\t\t\t\$(\"#file-file-upload-";
        // line 99
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " :file:not(.no-uniform)\").uniform();
\t\t\t});
\t\t</script>
\t</div>
</li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 127,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 641,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 615,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 146,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 35,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 111,  288 => 123,  229 => 105,  206 => 71,  147 => 120,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 71,  273 => 86,  263 => 229,  246 => 80,  234 => 106,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 99,  262 => 86,  235 => 85,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 375,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 220,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 67,  223 => 79,  186 => 63,  169 => 136,  301 => 65,  298 => 100,  292 => 98,  267 => 57,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 114,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 57,  208 => 64,  183 => 58,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 111,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 249,  279 => 120,  275 => 240,  265 => 116,  251 => 89,  199 => 90,  191 => 42,  170 => 59,  210 => 72,  180 => 152,  172 => 137,  168 => 52,  149 => 50,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 30,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 90,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 128,  45 => 9,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 53,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 228,  247 => 88,  243 => 110,  238 => 107,  220 => 26,  201 => 69,  194 => 88,  130 => 106,  100 => 26,  85 => 63,  76 => 31,  112 => 25,  101 => 28,  98 => 75,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 68,  184 => 64,  138 => 45,  118 => 36,  105 => 29,  66 => 18,  56 => 19,  115 => 58,  83 => 18,  164 => 51,  140 => 38,  58 => 17,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 67,  189 => 86,  178 => 61,  176 => 41,  165 => 36,  161 => 58,  152 => 125,  148 => 32,  141 => 45,  134 => 105,  132 => 102,  127 => 99,  123 => 98,  109 => 84,  90 => 35,  54 => 12,  133 => 40,  124 => 60,  111 => 32,  107 => 24,  80 => 24,  69 => 16,  60 => 16,  52 => 16,  97 => 27,  95 => 37,  88 => 21,  78 => 23,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 94,  264 => 93,  259 => 91,  245 => 119,  241 => 204,  236 => 107,  222 => 62,  218 => 77,  159 => 34,  154 => 124,  151 => 50,  145 => 29,  136 => 103,  128 => 100,  125 => 98,  119 => 26,  110 => 42,  96 => 34,  93 => 20,  91 => 69,  68 => 29,  65 => 23,  63 => 17,  43 => 13,  50 => 27,  25 => 7,  92 => 36,  86 => 22,  79 => 21,  46 => 26,  37 => 10,  33 => 7,  27 => 5,  82 => 33,  72 => 19,  64 => 17,  53 => 16,  49 => 13,  44 => 15,  42 => 13,  34 => 9,  29 => 7,  23 => 3,  19 => 2,  40 => 7,  20 => 2,  30 => 7,  26 => 6,  22 => 3,  224 => 194,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 76,  188 => 153,  185 => 40,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 130,  153 => 30,  146 => 110,  142 => 46,  137 => 28,  131 => 41,  126 => 40,  120 => 93,  117 => 58,  103 => 33,  99 => 76,  77 => 56,  74 => 49,  57 => 13,  47 => 27,  39 => 17,  32 => 11,  24 => 5,  17 => 1,  135 => 105,  129 => 32,  122 => 37,  116 => 58,  113 => 53,  108 => 84,  104 => 24,  102 => 29,  94 => 68,  89 => 22,  87 => 30,  84 => 20,  81 => 60,  73 => 20,  70 => 52,  67 => 19,  62 => 15,  59 => 18,  55 => 14,  51 => 31,  48 => 15,  41 => 23,  38 => 21,  35 => 10,  31 => 12,  28 => 11,);
    }
}
