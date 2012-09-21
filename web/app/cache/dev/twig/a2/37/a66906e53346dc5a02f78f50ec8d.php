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
        return array (  133 => 58,  109 => 43,  99 => 39,  89 => 35,  85 => 34,  76 => 28,  53 => 14,  45 => 12,  33 => 9,  48 => 11,  44 => 10,  22 => 4,  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 62,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 41,  97 => 13,  80 => 12,  75 => 11,  72 => 10,  28 => 5,  21 => 3,  42 => 9,  37 => 10,  32 => 6,  27 => 5,  20 => 2,  64 => 22,  62 => 22,  59 => 21,  52 => 17,  49 => 13,  47 => 11,  41 => 11,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 27,  154 => 68,  151 => 66,  145 => 10,  142 => 61,  136 => 8,  131 => 125,  128 => 124,  122 => 50,  119 => 18,  108 => 117,  93 => 36,  91 => 105,  70 => 25,  65 => 8,  63 => 83,  57 => 17,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 10,  25 => 7,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 60,  129 => 89,  125 => 123,  116 => 47,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 9,  60 => 15,  54 => 14,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
