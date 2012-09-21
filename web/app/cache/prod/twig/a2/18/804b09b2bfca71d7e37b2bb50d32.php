<?php

/* WebIlluminationShopBundle:Content:cookiePolicy.html.twig */
class __TwigTemplate_a218804b09b2bfca71d7e37b2bb50d32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'slider' => array($this, 'block_slider'),
            'body' => array($this, 'block_body'),
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
        echo "Kitchen Appliance Centre Cookies Policy | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_slider($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"container_8 clearfix\">
\t\t<header>
\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t<img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/cookie-monster.jpg"), "html", null, true);
        echo "\" alt=\"A cookie monster\" />
\t\t\t\t\t\t<h3 class=\"right\">Cookies!</h3>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</header>
\t</div>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "\t<header>
\t\t<h1>What You Need to Know About Cookies</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>How Kitchen Appliance Centre Uses Cookies</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\">Whenever you use our website information may be collected through the use of cookies and similar technologies.</p>
\t\t\t\t\t\t<p><strong>BY USING THE KITCHEN APPLIANCE CENTRE WEBSITE YOU AGREE TO OUR USE OF COOKIES AS DESCRIBED IN THIS COOKIES POLICY.</strong></p>
\t\t\t\t\t\t<h5>What are \"cookies\"?</h5>
\t\t\t\t\t\t<p>Cookies are small text files which are downloaded to your computer or mobile device when you visit a website. Your Internet browser (such as Internet Explorer, Mozilla Firefox, Safari, Google Chrome, Opera, etc) then sends these cookies back to the website on each subsequent visit so that they can recognise you and remember things like personalised details or user preferences.</p>
\t\t\t\t\t\t<p>Cookies are very useful and do lots of different jobs which help to make your experience on websites as smooth as possible. For example, they let you move between web pages efficiently, remembering your preferences, and generally improving your experience (see below for more examples). They can also help to ensure that adverts you see online are more relevant to you and your interests.</p>
\t\t\t\t\t\t<p>They are referred to as <strong>session</strong> or <strong>persistent</strong> cookies, depending on how long they are used:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Session cookies only last for your online session and disappear from your computer or mobile device when you close your Internet browser.</li>
\t\t\t\t\t\t\t<li>Persistent cookies stay on your computer or mobile device after the Internet browser has been closed and last for the period of time specified in the cookie. These persistent cookies are activated each time you visit the site where the cookie was generated.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Which cookies do Kitchen Appliance Centre use and why?</h5>
\t\t\t\t\t\t<p>When you use our website, the following five categories of cookies may be set on your computer or mobile device:</p>
\t\t\t\t\t\t<p><strong>1. \"STRICTLY NECESSARY\" COOKIES</strong></p>
\t\t\t\t\t\t<p>These cookies are essential in helping you to move around our website and use the website features, such as accessing secure areas. Without these cookies, services you have asked for cannot be provided. These cookies do not gather information about you that could be used for marketing or remembering where you've been on the Internet.</p>
\t\t\t\t\t\t<p>Some examples of these essential cookies include:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Remembering previous actions (such as text you've entered in a registration form) when navigating back to a page in the same session.</li>
\t\t\t\t\t\t\t<li>Identifying you as being signed in to the Kitchen Appliance Centre website and and keeping you logged in throughout your visit so that you don't need to sign in each and every time you visit.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<p><strong>2. FUNCTIONAL COOKIES</strong></p>
\t\t\t\t\t\t<p>These cookies allow websites to remember choices you make (such as your user name, language or the region you are in) and provide enhanced, more personal features. The information these cookies collect is usually anonymised which means we can't identify you personally. They do not gather any information about you that could be used for selling advertising or remembering where you've been on the Internet, but do help with serving advertising.</p>
\t\t\t\t\t\t<p>We use these types of cookies to improve your experience on our website. Some examples of how we do this include:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Remembering your preferences and settings. This might include product listings, favourites or specific settings that you have chosen for the layout, text size and colours used on the website.</li>
\t\t\t\t\t\t\t<li>Remembering your product filter settings if you leave the website before you've finished viewing, so that you can pick up where you left off the next time.</li>
\t\t\t\t\t\t\t<li>Remembering if we've already asked you if you want to fill in a form or if you've completed a form, so you're not asked to do it again.</li>
\t\t\t\t\t\t\t<li>Remembering if you've been to the site before so that messages intended for first-time users are not displayed to you.</li>
\t\t\t\t\t\t\t<li>Supporting social media components, like Facebook, Twitter or Google Plus (where a website uses a plugin from these third party platforms, for example).</li>
\t\t\t\t\t\t\t<li>If you would like a list of the functional cookies used by the website or have any further questions, please <a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">contact us</a>.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<p><strong>3. ANALYTICS COOKIES</strong></p>
\t\t\t\t\t\t<p>In order to keep our website relevant, easy to use and up-to-date, we use web analytics services to help us understand how people use them. For example, we can see which parts of the website are most popular, identify which products have been viewed online, identify when errors occur, and test different versions of a page or feature to see which one works best.</p>
\t\t\t\t\t\t<p>These web analytics services may be designed and operated by other companies on our behalf. They do this using small invisible images known as \"web beacons\" or \"tracking pixels\" that may be included in the website. These are used to count the number of times something has been seen. These web beacons are anonymous and do not contain or collect any information that identifies you.</p>
\t\t\t\t\t\t<p>The web analytics services may also use cookies and similar technologies to make the information collected by the web beacons more useful. When you are viewing a website, a cookie is transferred to your Internet browser by the web server and is stored on your computer. It can only be read by the server that gave it to you.</p>
\t\t\t\t\t\t<p>Cookies allow web analytics services to recognise your Internet browser or device and, for example, identify whether you have visited our website before, what you have previously viewed or clicked on, and how you found us. The information is anonymous and only used for statistical purposes. It allows us to track information, such as how many individual users we have and how often they visit our websites. It also helps us to analyse patterns of user activity and to develop a better user experience. For example, we might see that many people who viewed product A also viewed product B and we can then recommend product B to everyone else who viewed product A.</p>
\t\t\t\t\t\t<p>Web analytics data and cookies cannot be used to identify you as they never contain personal information such as your name or email address. However, if you have registered and signed in to our website, we may combine information from your registration with the data we get from the web analytics service and its cookies (or similar technologies) to analyse how you and other people use our website in detail and, where you have opted in to receive such communications, to send you email and other communications that might be of interest to you. The combined information may include information that is collected by the web analytics services while you are not signed in, and information that was collected using cookies and similar technologies before you registered or signed in. Where the combined information can be used to identify you, we use it only in accordance with our <a href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_terms_and_conditions"), "html", null, true);
        echo "\">Terms and Conditions</a> and <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privacy_policy"), "html", null, true);
        echo "\">Privacy Policy</a>.</p>
\t\t\t\t\t\t<p><strong>4. TARGETING COOKIES</strong></p>
\t\t\t\t\t\t<p>We may also use cookies to assist in targeted advertising in the following ways:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Cookies may be placed on your device by our third party service providers which remember that you have visited a website in order to provide you with targeted adverts which are more relevant to you and your interests. This is often called online behavioural advertising (OBA) (also known as \"behavioural targeting\" or \"interest based advertising\") and is done by grouping together shared interests based upon previous web browsing activity. Your previous web browsing activity can also be used to infer things about you, such as your demographics (age, gender etc.).</li>
\t\t\t\t\t\t\t<li>Personalised retargeting is another form of OBA that enables our advertiser partners to show you adverts based on your online browsing away from the Kitchen Appliance Centre website. For example, if you visited the website of an online travel company you may start seeing adverts from the same travel company displaying special offers or showing you the products that you were browsing when you come to our website. This allows companies to advertise to people who previously visited their website. These cookies will usually be dropped by third-party advertising networks.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<p>Although these cookies can track your visits around the web they don't know who you are. Even if you sign in to the Kitchen Appliance Centre website, the OBA data is still not linked to your profile.</p>
\t\t\t\t\t\t<p>Without these cookies, online advertisements you encounter will be less relevant to you and your interests. If you would like more information about OBA, including how to opt-out of these cookies, please visit www.youronlinechoices.com.</p>
\t\t\t\t\t\t<p><strong>5. OTHER THIRD PARTY COOKIES</strong></p>
\t\t\t\t\t\t<p>Please note that on some pages of our websites you may notice that cookies have been set that are not related to Kitchen Appliance Centre or our authorised service providers. When you visit a page with content embedded from, for example, YouTube or Facebook, these service providers may set their own cookies on your web browser. These anonymous cookies may be set by that third party to track the success of their application or to customise their application to you. Kitchen Appliance Centre does not control the use of these cookies and cannot access them due to the way that cookies work, as cookies can only be accessed by the party who originally set them. You should check the third party websites for more information about these cookies.</p>
\t\t\t\t\t\t<h5>How to Control Your Cookies</h5>
\t\t\t\t\t\t<p>Please remember that Kitchen Appliance Centre does not use cookies to collect personally identifiable information about you although, as explained above, we may combine information from your registration with the data we get from the web analytics services we use and their cookies (or similar technologies) to analyse how you and other people use our Digital Products and Services in detail. These cookies are set to improve your experience on our websites and to enable you to benefit from specific features and to set preferences.</p>
\t\t\t\t\t\t<p>However, there are various ways that you can control and manage your cookies that are discussed in a bit more detail below. Please remember that any settings you change will not just affect Kitchen Appliance Centre cookies. These changes will apply to all websites that you visit (unless you choose to block cookies from particular sites).</p>
\t\t\t\t\t\t<h5>Managing Cookies in Your Browser</h5>
\t\t\t\t\t\t<p>Most modern browsers will allow you to:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>See what cookies you've got and delete them on an individual basis.</li>
\t\t\t\t\t\t\t<li>Block third party cookies.</li>
\t\t\t\t\t\t\t<li>Block cookies from particular sites.</li>
\t\t\t\t\t\t\t<li>Block all cookies from being set.</li>
\t\t\t\t\t\t\t<li>Delete all cookies when you close your browser.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<p>You should be aware that any preferences will be lost if you delete cookies. Ironically, this includes where you have opted out from cookies, as this requires an opt-out cookie to be set. Also, if you block cookies completely many websites will not work properly and some functionality on these websites will not work at all. We do not recommend turning cookies off when using our website for these reasons.</p>
\t\t\t\t\t\t<p>If you are primarily concerned about third party cookies generated by advertisers, you can turn these off separately. This is discussed in more detail below.</p>
\t\t\t\t\t\t<p>The links below take you to the \"Help\" sections for each of the major browsers so that you can find out more about how to manage your cookies.</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://support.microsoft.com/kb/196955\">Microsoft Internet Explorer</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://support.mozilla.org/en-US/kb/Cookies\">Mozilla Firefox</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://support.google.com/chrome/bin/answer.py?hl=en&answer=95647\">Google Chrome</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://www.opera.com/browser/tutorials/security/privacy/\">Opera</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://docs.info.apple.com/article.html?path=Safari/5.0/en/9277.html\">Safari</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://support.apple.com/kb/HT1677\">Safari (on Apple mobile devices)</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://support.google.com/mobile/bin/answer.py?hl=en&answer=169022\">Android</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://docs.blackberry.com/en/smartphone_users/deliverables/32004/Turn_off_cookies_in_the_browser_60_1072866_11.jsp\">Blackberry</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://www.microsoft.com/windowsphone/en-us/howto/wp7/web/changing-privacy-and-other-browser-settings.aspx\">Windows Mobile</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Managing Analytics Cookies</h5>
\t\t\t\t\t\t<p>It is possible to opt out of having your anonymised browsing activity within websites recorded by analytics cookies. Kitchen Appliance Centre uses the following analytics providers and you can opt out of their cookies by clicking on the following links. Please note that this will take you to the relevant third party's website and generate a \"no thanks\" cookie, which will stop any further cookies being set by those third parties.</p>
\t\t\t\t\t\t<p>Don't forget that by not allowing analytics cookies, this stops us from being able to learn what people like or don't like about our website so that we can make them better.</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://www.omniture.com/en/privacy/2o7\">Omniture</a></li>
\t\t\t\t\t\t\t<li><a target=\"_blank\" href=\"http://tools.google.com/dlpage/gaoptout\">Google Analytics</a></li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Further Information</h5>
\t\t\t\t\t\t<p>Further information can be found at <a target=\"_blank\" href=\"http://www.ico.gov.uk/for_organisations/privacy_and_electronic_communications/the_guide/cookies.aspx\">www.ico.gov.uk</a> and <a target=\"_blank\" href=\"http://www.allaboutcookies.org/\">www.allaboutcookies.org</a>.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Content:cookiePolicy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 367,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 382,  440 => 195,  377 => 312,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 369,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 428,  501 => 194,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 104,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 157,  273 => 214,  263 => 107,  246 => 100,  234 => 197,  217 => 69,  173 => 100,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 36,  207 => 152,  143 => 71,  157 => 97,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 241,  271 => 129,  253 => 212,  233 => 204,  226 => 64,  187 => 61,  150 => 114,  260 => 91,  155 => 98,  223 => 40,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 117,  174 => 32,  182 => 72,  175 => 55,  144 => 25,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 151,  114 => 63,  208 => 92,  183 => 101,  166 => 119,  423 => 279,  419 => 166,  411 => 215,  407 => 336,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 287,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 33,  170 => 107,  210 => 93,  180 => 55,  172 => 99,  168 => 106,  149 => 96,  139 => 85,  240 => 99,  230 => 116,  121 => 41,  257 => 195,  249 => 74,  106 => 82,  334 => 283,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 9,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 319,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 127,  216 => 95,  213 => 115,  202 => 35,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 354,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 223,  261 => 228,  247 => 191,  243 => 174,  238 => 107,  220 => 79,  201 => 113,  194 => 148,  130 => 20,  100 => 43,  85 => 34,  76 => 33,  112 => 16,  101 => 57,  98 => 44,  272 => 118,  269 => 108,  228 => 126,  221 => 39,  197 => 112,  184 => 60,  138 => 80,  118 => 92,  105 => 23,  66 => 17,  56 => 13,  115 => 27,  83 => 19,  164 => 29,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 66,  192 => 120,  189 => 119,  178 => 145,  176 => 110,  165 => 101,  161 => 100,  152 => 88,  148 => 41,  141 => 93,  134 => 85,  132 => 77,  127 => 30,  123 => 29,  109 => 55,  90 => 41,  54 => 34,  133 => 104,  124 => 42,  111 => 64,  107 => 25,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 22,  88 => 34,  78 => 30,  75 => 17,  71 => 22,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 343,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 249,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 128,  264 => 112,  259 => 123,  245 => 186,  241 => 118,  236 => 187,  222 => 158,  218 => 105,  159 => 91,  154 => 43,  151 => 42,  145 => 77,  136 => 100,  128 => 30,  125 => 88,  119 => 28,  110 => 52,  96 => 30,  93 => 35,  91 => 21,  68 => 21,  65 => 8,  63 => 14,  43 => 12,  50 => 15,  25 => 8,  92 => 70,  86 => 25,  79 => 18,  46 => 7,  37 => 3,  33 => 3,  27 => 2,  82 => 31,  72 => 37,  64 => 16,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 6,  19 => 2,  40 => 4,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 65,  215 => 173,  211 => 178,  204 => 61,  200 => 104,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 108,  179 => 100,  177 => 105,  171 => 31,  162 => 62,  158 => 132,  156 => 90,  153 => 97,  146 => 90,  142 => 81,  137 => 86,  131 => 31,  126 => 92,  120 => 69,  117 => 50,  103 => 24,  99 => 23,  77 => 54,  74 => 29,  57 => 17,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 32,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 53,  104 => 58,  102 => 17,  94 => 21,  89 => 38,  87 => 36,  84 => 18,  81 => 27,  73 => 28,  70 => 22,  67 => 15,  62 => 25,  59 => 13,  55 => 12,  51 => 14,  48 => 8,  41 => 7,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
