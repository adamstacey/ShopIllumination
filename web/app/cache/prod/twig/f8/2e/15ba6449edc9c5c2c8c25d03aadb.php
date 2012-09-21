<?php

/* WebIlluminationShopBundle:Content:linkToUs.html.twig */
class __TwigTemplate_f82e15ba6449edc9c5c2c8c25d03aadb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metatags' => array($this, 'block_metatags'),
            'slider' => array($this, 'block_slider'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::shop.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Link to Ride Direct | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"If you find the Ride Direct site useful and would like to link to us choose from a number of links below.\">
\t<meta name=\"keywords\" content=\"ride direct, useful, links, site\">
";
    }

    // line 7
    public function block_slider($context, array $blocks = array())
    {
        // line 8
        echo "\t<div class=\"container_8 clearfix\">
\t\t<header>
\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t<img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/link-to-us.jpg"), "html", null, true);
        echo "\" alt=\"Would you like to link to us?\" />
\t\t\t\t\t\t<h3 class=\"right\">Would you like to link to us?</h3>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</header>
\t</div>
";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        echo "\t<header>
\t\t<h1>Copy a Ride Direct link and link to this site</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\"><strong>Do you share our passion for motocross? Do you want to include links and banners to Ride Direct on your website? Would you like us to link to your site and list you as a partner?</strong></p>
\t\t\t\t\t\t<p class=\"no-margin-bottom\">Thank you for your interest in supporting the Ride Direct site. We welcome everyone that wants to link to our site. The process is simple:</p>
\t\t\t\t\t\t<ol>
\t\t\t\t\t\t\t<li>Select a link from the <a class=\"action-scroll-to-links\" href=\"Javascript:void(0);\">image or text links below</a> and copy the HTML code to a page on your site.</li>
\t\t\t\t\t\t\t<li>Fill out the form below, providing us with some information about yourself, what link you would like us to add and where we can find our link on your site.</li>
\t\t\t\t\t\t\t<li>We will check your site to make sure you have linked to us. If we cannot find a link to us your request will be denied.</li>
\t\t\t\t\t\t\t<li>It may take us a few days to process your request, but if everything is okay we will publsih a link on our <a href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_useful_links"), "html", null, true);
        echo "\">Useful Links</a> page.</li>
\t\t\t\t\t\t</ol>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"clear\"></div>
\t    <div class=\"grid_6 leading\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Request a reciprocal link</h2>
\t            </header>
\t\t\t\t<section id=\"link-to-us-request-a-reciprocal-link\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t<p>Please make sure that you link to us before completing this form. If we can't find your link we won't add a reciprocal link.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<form id=\"form-request-a-reciprocal-link\" method=\"post\" action=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_link_to_us"), "html", null, true);
        echo "\" class=\"form has-validation\">
\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-name\" class=\"form-label\"><em>*</em> Your Name<small>Enter your full name</small></label>
\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input class=\"full\" data-message=\"Please enter your full name.\" type=\"text\" id=\"form-name\" name=\"name\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-name\" class=\"form-label\">Your Company Name<small>Enter your company name</small></label>
\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input class=\"full\" type=\"text\" id=\"form-organisation\" name=\"organisation\" value=\"\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-email-address\" class=\"form-label\"><em>*</em> Your Email Address<small>Enter a valid email address</small></label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input class=\"full\" data-message=\"Please enter a valid email address.\" type=\"email\" id=\"form-email-address\" name=\"email-address\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-email-address\" class=\"form-label\"><em>*</em> Your Contact Number<small>Enter a contact number</small></label>
\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"full\" data-message=\"Please enter a contact number.\" type=\"text\" id=\"form-contact-number\" name=\"contact-number\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-web-address\" class=\"form-label\"><em>*</em> Your Web Address<small>Web address where our link is</small></label>
\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"full url\" data-message=\"Please enter your web address where you have added our link.\" type=\"url\" id=\"form-web-address\" name=\"web-address\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-html-link\" class=\"form-label\"><em>*</em> Your HTML link<small>Enter HTML code</small></label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><textarea data-message=\"Please enter your HTML code.\" required=\"required\" id=\"form-html-link\" name=\"html-link\"></textarea></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t    \t\t<button type=\"submit\" class=\"button action-save-about-you ui-button-orange\" data-icon-primary=\"ui-icon-circle-check\">Send Reciprocal Link Request</button>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"clear\"></div>
\t\t<div class=\"grid_3 leading\">
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Image Links</h2>
\t            </header>
\t\t\t\t<section id=\"link-to-us-image-links\" class=\"no-padding-top\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "imageLinks"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["imageLink"]) {
            // line 99
            echo "\t\t\t\t\t\t\t<div";
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo " class=\"separator\"";
            }
            echo ">
\t\t\t\t\t\t\t\t<div class=\"clearfix ac\">";
            // line 100
            echo $this->getContext($context, "imageLink");
            echo "</div>
\t\t\t\t\t\t\t\t<div class=\"clearfix code\">";
            // line 101
            echo twig_escape_filter($this->env, $this->getContext($context, "imageLink"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['imageLink'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 104
        echo "\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"grid_3 leading\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Text Links</h2>
\t            </header>
\t\t\t\t<section id=\"link-to-us-text-links\" class=\"no-padding-top\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t";
        // line 115
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "textLinks"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["textLink"]) {
            // line 116
            echo "\t\t\t\t\t\t\t<div";
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo " class=\"separator\"";
            }
            echo ">
\t\t\t\t\t\t\t\t<div class=\"clearfix\">";
            // line 117
            echo $this->getContext($context, "textLink");
            echo "</div>
\t\t\t\t\t\t\t\t<div class=\"clearfix code\">";
            // line 118
            echo twig_escape_filter($this->env, $this->getContext($context, "textLink"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['textLink'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 121
        echo "\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"clear\"></div>
\t</section>
";
    }

    // line 128
    public function block_javascripts($context, array $blocks = array())
    {
        // line 129
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t\$(\".action-scroll-to-links\").live('click', function() {
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#link-to-us-image-links\").offset().top - 50},'slow');
\t\t\t});
\t\t\t\$(\"#link-to-us-image-links\").height(\$(\"#link-to-us-text-links\").height());
\t\t\t\$(\"#form-request-a-reciprocal-link\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Content:linkToUs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 367,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 382,  440 => 195,  377 => 312,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 369,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 428,  501 => 194,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 104,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 157,  273 => 214,  263 => 107,  246 => 100,  234 => 197,  217 => 69,  173 => 100,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 36,  207 => 152,  143 => 71,  157 => 97,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 241,  271 => 129,  253 => 212,  233 => 204,  226 => 64,  187 => 61,  150 => 114,  260 => 91,  155 => 98,  223 => 40,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 117,  174 => 32,  182 => 72,  175 => 55,  144 => 25,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 151,  114 => 63,  208 => 92,  183 => 101,  166 => 119,  423 => 279,  419 => 166,  411 => 215,  407 => 336,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 287,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 33,  170 => 107,  210 => 93,  180 => 55,  172 => 99,  168 => 106,  149 => 96,  139 => 85,  240 => 99,  230 => 116,  121 => 41,  257 => 195,  249 => 74,  106 => 82,  334 => 283,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 7,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 319,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 127,  216 => 95,  213 => 115,  202 => 35,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 354,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 223,  261 => 228,  247 => 191,  243 => 174,  238 => 107,  220 => 79,  201 => 113,  194 => 148,  130 => 20,  100 => 43,  85 => 34,  76 => 33,  112 => 16,  101 => 33,  98 => 37,  272 => 118,  269 => 108,  228 => 126,  221 => 39,  197 => 112,  184 => 60,  138 => 80,  118 => 92,  105 => 23,  66 => 17,  56 => 13,  115 => 27,  83 => 19,  164 => 29,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 66,  192 => 120,  189 => 119,  178 => 145,  176 => 110,  165 => 101,  161 => 100,  152 => 88,  148 => 41,  141 => 93,  134 => 85,  132 => 77,  127 => 30,  123 => 29,  109 => 55,  90 => 41,  54 => 34,  133 => 104,  124 => 42,  111 => 26,  107 => 25,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 22,  88 => 34,  78 => 30,  75 => 17,  71 => 22,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 343,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 249,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 128,  264 => 112,  259 => 123,  245 => 186,  241 => 118,  236 => 187,  222 => 158,  218 => 105,  159 => 91,  154 => 43,  151 => 42,  145 => 77,  136 => 100,  128 => 30,  125 => 88,  119 => 28,  110 => 15,  96 => 30,  93 => 35,  91 => 21,  68 => 21,  65 => 8,  63 => 14,  43 => 12,  50 => 15,  25 => 8,  92 => 70,  86 => 25,  79 => 18,  46 => 7,  37 => 3,  33 => 3,  27 => 2,  82 => 30,  72 => 37,  64 => 16,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 6,  19 => 2,  40 => 4,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 65,  215 => 173,  211 => 178,  204 => 61,  200 => 104,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 108,  179 => 100,  177 => 105,  171 => 31,  162 => 62,  158 => 132,  156 => 90,  153 => 97,  146 => 90,  142 => 81,  137 => 86,  131 => 31,  126 => 92,  120 => 69,  117 => 50,  103 => 24,  99 => 23,  77 => 54,  74 => 29,  57 => 17,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 32,  129 => 70,  122 => 72,  116 => 63,  113 => 41,  108 => 53,  104 => 58,  102 => 17,  94 => 21,  89 => 38,  87 => 36,  84 => 18,  81 => 27,  73 => 28,  70 => 22,  67 => 15,  62 => 25,  59 => 13,  55 => 12,  51 => 14,  48 => 8,  41 => 7,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
