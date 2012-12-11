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
        return array (  111 => 64,  101 => 57,  60 => 18,  57 => 17,  45 => 9,  38 => 4,  35 => 3,  28 => 2,);
    }
}