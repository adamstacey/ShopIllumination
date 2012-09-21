<?php

/* ::shopFooter.html.twig */
class __TwigTemplate_a237a66906e53346dc5a02f78f50ec8d extends Twig_Template
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
        echo "<footer id=\"footer\">
\t<div class=\"footer-sections\">
\t    <div class=\"container_8 clearfix\">
\t    \t<div class=\"footer-section footer-section-first\">
\t    \t\t<h4>Help &amp; Advice</h4>
\t    \t\t<ul>
\t    \t\t\t<li><a title=\"Find out all about our delivery\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_delivery"), "html", null, true);
        echo "\">Delivery Information</a></li>
\t    \t\t\t<li><a title=\"Do you need to return something?\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_returns"), "html", null, true);
        echo "\">Need to return something?</a></li>
\t    \t\t\t<li><a title=\"Find out how you can contact us\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">Contact Us</a></li>
\t    \t\t\t<li><a title=\"Find out all about our showroom based in Nottingham\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_the_shop"), "html", null, true);
        echo "\">The Showroom</a></li>
\t    \t\t\t<li><a title=\"Find out directions to get to our showroom in Nottingham\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_how_to_find_us"), "html", null, true);
        echo "\">How to Find Us</a></li>
\t    \t\t\t<li><a title=\"Need help installing a product? View our handy video guides\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_installation_guides"), "html", null, true);
        echo "\">Installation Guides</a></li>
\t    \t\t\t<li><a title=\"Before buying a tap make sure you have the right water pressure\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_water_pressure_information"), "html", null, true);
        echo "\">What is my water pressure?</a></li>
\t    \t\t\t<li><a title=\"Learn what information we may use from you to store in cookies\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_cookie_policy"), "html", null, true);
        echo "\">Cookie Policy</a></li>
\t    \t\t\t";
        // line 17
        echo "\t    \t\t</ul>
\t    \t</div>
\t    \t<div class=\"footer-section\">
\t    \t\t<h4>What our Customers Say</h4>
\t\t\t\t<div class=\"review-container\">
\t    \t\t\t<a href=\"http://www.trustpilot.co.uk/review/www.kitchenappliancecentre.co.uk\" target=\"_blank\"><img class=\"no-margin\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/trust-pilot-rating.png"), "html", null, true);
        echo "\" width=\"214\" height=\"64\" border=\"0\" alt=\"Kitchen Appliance Centre feedback from Trust Pilot\" /></a>
\t    \t\t</div>
\t    \t\t<div class=\"review-container\">
\t\t\t\t\t<a href=\"http://www.reviewcentre.com/reviews240740.html\" target=\"_blank\"><img class=\"no-margin\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/review-centre-rating.png"), "html", null, true);
        echo "\" width=\"214\" height=\"64\" border=\"0\" alt=\"Kitchen Appliance Centre feedback from Review Centre\" /></a>
\t\t\t\t</div>
\t\t\t\t<div>
\t\t\t\t\t<a href=\"http://feedback.ebay.co.uk/ws/eBayISAPI.dll?ViewFeedback2&userid=kitchenappliancecentre&ftab=AllFeedback\" target=\"_blank\"><img class=\"no-margin\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/ebay-top-rated-seller.png"), "html", null, true);
        echo "\" width=\"214\" height=\"64\" border=\"0\" alt=\"Kitchen Appliance Centre is an eBay Top-rated Seller\" /></a>
\t\t\t\t</div>
\t    \t</div>
\t    \t<div class=\"footer-section\">
\t    \t\t<h4>Security</h4>
\t    \t\t<ul>
\t    \t\t\t<li><a title=\"Find out how we keep your details safe and secure\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_security"), "html", null, true);
        echo "\">Security</a></li>
\t    \t\t\t<li><a title=\"Find out how we look after your privacy\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privacy_policy"), "html", null, true);
        echo "\">Privacy</a></li>
\t    \t\t\t<li><a title=\"We use 3D secure on all payments to prevent fraud\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_fraud_prevention"), "html", null, true);
        echo "\">3D Secure &amp; Fraud Prevention</a></li>
\t    \t\t</ul>
\t    \t\t<div class=\"spacer\"></div>
\t    \t\t<img class=\"no-margin\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/3d-secure-payments.png"), "html", null, true);
        echo "\" width=\"214\" height=\"82\" border=\"0\" alt=\"3D Secure Payments\" />
\t    \t\t<div class=\"spacer\"></div>
\t    \t\t<a target=\"_blank\" title=\"Click here to verify Kitchen Appliance Centre is an accredited retailer\" href=\"http://isisaccreditation.imrg.org/8025745000669E37/isisAccredited?readform&unid=99EB7990D942C669802575CB003EABE2&type=1certificateisis\"><img class=\"no-margin\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/internet-shopping-is-safe.png"), "html", null, true);
        echo "\" width=\"214\" height=\"38\" border=\"0\" alt=\"Internet Shopping Is Safe (ISIS) - Accredited Retailer\" /></a>
\t    \t\t<div class=\"spacer\"></div>
\t    \t\t<a target=\"_blank\" title=\"Click here to verify Kitchen Appliance Centre is an accredited retailer\" href=\"http://isisaccreditation.imrg.org/8025745000669E37/isisAccredited?readform&unid=99EB7990D942C669802575CB003EABE2&type=1&idis=1certificateisis\"><img class=\"no-margin\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/internet-delivery-is-safe.png"), "html", null, true);
        echo "\" width=\"214\" height=\"38\" border=\"0\" alt=\"Internet Delivery Is Safe (IDIS) - Accredited Retailer\" /></a>
\t    \t</div>
\t    \t<div class=\"footer-section\">
\t    \t\t<h4>Secure Payments by</h4>
\t    \t\t<img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/sage-pay-google-paypal.png"), "html", null, true);
        echo "\" width=\"214\" height=\"92\" border=\"0\" alt=\"Secure Payments by Sage Pay, Google Checkout and PayPal\" />
\t    \t\t<div class=\"spacer\"></div>
\t    \t\t<h4>Accepted Cards</h4>
\t    \t\t<img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/accepted-credit-and-debit-cards.png"), "html", null, true);
        echo "\" width=\"214\" height=\"91\" border=\"0\" alt=\"Accepted Credit and Debit Cards\" />
\t    \t</div>
\t    \t<div class=\"clear\"></div>
\t    </div>
\t    <div class=\"clear\"></div>
    </div>
    <div class=\"container_8 clearfix\">
    \t<span class=\"fl\">
    \t\t&copy; ";
        // line 58
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " All Rights Reserved <strong>Kitchen Appliance Centre</strong><br />
    \t\t";
        // line 60
        echo "    \t\t<a title=\"View our terms and conditions\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_terms_and_conditions"), "html", null, true);
        echo "\">Terms &amp; Conditions</a>&nbsp;|&nbsp;
    \t\t<span itemscope itemtype=\"http://schema.org/Product\">";
        // line 61
        ob_start();
        // line 62
        echo "    \t\t\t<span itemprop=\"name\"><strong>Kitchen Appliance Centre</strong></span>
    \t\t\t<span>&nbsp;is</span>
    \t\t\t<span itemprop=\"aggregateRating\" itemscope itemtype=\"http://schema.org/AggregateRating\">&nbsp;rated&nbsp;<span itemprop=\"ratingValue\">5</span>&nbsp;/&nbsp;5&nbsp;based&nbsp;on&nbsp;<span itemprop=\"reviewCount\">100</span>&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"http://www.trustpilot.co.uk/review/www.kitchenappliancecentre.co.uk\">customer reviews</a></span>
    \t\t\t<span>&nbsp;on&nbsp;TrustPilot.co.uk</span>
    \t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 66
        echo "</span>
    \t\t";
        // line 68
        echo "    \t</span>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "::shopFooter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  430 => 154,  378 => 129,  365 => 124,  518 => 227,  452 => 191,  733 => 657,  694 => 620,  688 => 616,  647 => 577,  633 => 565,  612 => 546,  508 => 217,  590 => 345,  582 => 343,  541 => 239,  537 => 314,  533 => 237,  442 => 254,  530 => 163,  504 => 221,  498 => 147,  492 => 208,  482 => 189,  289 => 243,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 502,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 401,  435 => 182,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 163,  456 => 382,  440 => 185,  377 => 125,  313 => 136,  281 => 129,  469 => 199,  426 => 335,  421 => 242,  397 => 136,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 115,  400 => 137,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 238,  527 => 477,  346 => 298,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 207,  485 => 417,  445 => 187,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 128,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 679,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 166,  465 => 204,  441 => 389,  431 => 183,  396 => 131,  364 => 157,  348 => 154,  336 => 181,  310 => 192,  304 => 84,  18 => 1,  489 => 433,  486 => 168,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 148,  417 => 163,  413 => 330,  408 => 368,  388 => 167,  382 => 126,  350 => 211,  315 => 141,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 533,  595 => 267,  581 => 196,  563 => 254,  522 => 229,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 219,  496 => 203,  493 => 219,  483 => 215,  480 => 214,  476 => 213,  474 => 201,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 161,  398 => 160,  389 => 157,  372 => 151,  369 => 150,  357 => 102,  341 => 288,  332 => 104,  328 => 86,  325 => 117,  316 => 166,  278 => 118,  250 => 123,  163 => 112,  523 => 216,  516 => 222,  512 => 211,  506 => 207,  500 => 451,  497 => 211,  494 => 151,  484 => 205,  462 => 133,  447 => 155,  438 => 185,  393 => 257,  373 => 140,  370 => 126,  368 => 125,  361 => 217,  342 => 145,  329 => 146,  326 => 118,  319 => 142,  288 => 80,  229 => 60,  206 => 52,  147 => 41,  227 => 102,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 225,  450 => 156,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 71,  246 => 208,  234 => 119,  217 => 69,  173 => 81,  309 => 86,  285 => 186,  280 => 78,  276 => 94,  262 => 113,  235 => 163,  232 => 61,  212 => 149,  207 => 107,  143 => 50,  157 => 28,  366 => 136,  340 => 160,  503 => 214,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 203,  433 => 167,  416 => 145,  412 => 184,  409 => 141,  404 => 162,  390 => 312,  362 => 146,  358 => 284,  356 => 122,  353 => 266,  349 => 148,  345 => 113,  306 => 107,  271 => 95,  253 => 68,  233 => 204,  226 => 59,  187 => 47,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 100,  169 => 66,  301 => 254,  298 => 83,  292 => 243,  267 => 114,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 146,  182 => 72,  175 => 146,  144 => 62,  596 => 538,  589 => 390,  557 => 503,  545 => 485,  502 => 156,  495 => 218,  491 => 217,  432 => 176,  203 => 50,  114 => 42,  208 => 53,  183 => 46,  166 => 85,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 138,  395 => 103,  383 => 130,  379 => 153,  375 => 161,  371 => 152,  363 => 135,  359 => 93,  355 => 149,  351 => 131,  347 => 101,  331 => 120,  323 => 146,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 76,  265 => 231,  251 => 111,  199 => 51,  191 => 33,  170 => 116,  210 => 82,  180 => 45,  172 => 64,  168 => 44,  149 => 74,  139 => 113,  240 => 99,  230 => 200,  121 => 59,  257 => 225,  249 => 109,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 77,  255 => 193,  244 => 65,  214 => 55,  198 => 62,  181 => 128,  167 => 96,  160 => 77,  45 => 12,  487 => 216,  481 => 167,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 176,  415 => 179,  392 => 102,  385 => 154,  376 => 319,  367 => 160,  360 => 123,  352 => 91,  338 => 124,  333 => 210,  327 => 145,  324 => 99,  320 => 168,  297 => 138,  274 => 96,  256 => 69,  254 => 110,  252 => 170,  231 => 104,  216 => 111,  213 => 58,  202 => 76,  458 => 194,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 132,  387 => 229,  384 => 155,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 82,  290 => 188,  284 => 79,  270 => 122,  266 => 127,  261 => 70,  247 => 66,  243 => 107,  238 => 63,  220 => 57,  201 => 90,  194 => 101,  130 => 46,  100 => 30,  85 => 34,  76 => 28,  112 => 16,  101 => 8,  98 => 36,  272 => 75,  269 => 115,  228 => 81,  221 => 80,  197 => 158,  184 => 84,  138 => 80,  118 => 10,  105 => 25,  66 => 23,  56 => 36,  115 => 42,  83 => 24,  164 => 61,  140 => 24,  58 => 35,  21 => 3,  61 => 18,  36 => 11,  209 => 150,  205 => 146,  196 => 73,  192 => 87,  189 => 158,  178 => 44,  176 => 110,  165 => 57,  161 => 100,  152 => 125,  148 => 77,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 57,  109 => 43,  90 => 21,  54 => 14,  133 => 58,  124 => 73,  111 => 89,  107 => 71,  80 => 35,  69 => 24,  60 => 15,  52 => 17,  97 => 45,  95 => 29,  88 => 34,  78 => 55,  75 => 21,  71 => 30,  464 => 157,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 179,  425 => 165,  420 => 147,  406 => 175,  402 => 343,  399 => 105,  343 => 112,  339 => 152,  335 => 298,  321 => 115,  317 => 123,  314 => 142,  311 => 82,  305 => 135,  291 => 123,  287 => 121,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 121,  236 => 84,  222 => 158,  218 => 99,  159 => 60,  154 => 68,  151 => 66,  145 => 77,  136 => 48,  128 => 58,  125 => 101,  119 => 39,  110 => 34,  96 => 28,  93 => 36,  91 => 27,  68 => 29,  65 => 44,  63 => 17,  43 => 11,  50 => 13,  25 => 7,  92 => 34,  86 => 39,  79 => 30,  46 => 8,  37 => 10,  33 => 9,  27 => 6,  82 => 27,  72 => 17,  64 => 22,  53 => 14,  49 => 13,  44 => 10,  42 => 23,  34 => 7,  29 => 8,  23 => 5,  19 => 2,  40 => 4,  20 => 2,  30 => 7,  26 => 6,  22 => 4,  224 => 86,  215 => 187,  211 => 54,  204 => 91,  200 => 170,  195 => 50,  193 => 46,  190 => 48,  188 => 69,  185 => 65,  179 => 83,  177 => 120,  171 => 40,  162 => 119,  158 => 76,  156 => 108,  153 => 116,  146 => 41,  142 => 61,  137 => 60,  131 => 63,  126 => 61,  120 => 72,  117 => 90,  103 => 68,  99 => 39,  77 => 34,  74 => 52,  57 => 17,  47 => 11,  39 => 9,  32 => 6,  24 => 5,  17 => 1,  135 => 51,  129 => 70,  122 => 50,  116 => 47,  113 => 53,  108 => 32,  104 => 41,  102 => 17,  94 => 27,  89 => 35,  87 => 36,  84 => 21,  81 => 22,  73 => 28,  70 => 25,  67 => 8,  62 => 25,  59 => 17,  55 => 16,  51 => 15,  48 => 15,  41 => 11,  38 => 9,  35 => 8,  31 => 13,  28 => 5,);
    }
}
