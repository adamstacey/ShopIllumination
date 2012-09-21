<?php

/* WebIlluminationShopBundle:Content:fraudPrevention.html.twig */
class __TwigTemplate_c2e4bae11cae1039aac75fc480fa4a4a extends Twig_Template
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
        echo "Making Online Shopping Safe - Fraud Prevention | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"Kitchen Appliance Centre are committed to making sure your online experience is as safe as possible whilst at the same time minimising credit and debit card fraud.\">
\t<meta name=\"keywords\" content=\"kitchen appliance centre, security, trust, customer service, card details, fraud, 3d secure, online shopping, safe\">
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/pile-of-credit-cards.jpg"), "html", null, true);
        echo "\" alt=\"A pile of credit cards\" />
\t\t\t\t\t\t<h3 class=\"right\">Preventing Fraud</h3>
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
\t\t<h1>Making Online Shopping Safe</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Fraud Prevention and 3D Secure</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\">We are committed to making sure your online experience is as safe as possible whilst at the same time minimising credit and debit card fraud.</p>
\t\t\t\t\t\t<p>To do this we have implemented the following:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>When confirming your order, only the last four digits from your credit card will be revealed.</li>
    \t\t\t\t\t\t<li>The entire credit card number will only be transmitted to the appropriate credit card company during order processing.</li>
    \t\t\t\t\t\t<li>Our customer's security is of highest priority and we have invested in 3D Secure to give complete peace of mind.</li>
\t\t\t\t\t\t\t<li>3D Secure is the latest fraud prevention initiatives from Visa and MasterCard known as Verified by Visa and MasterCard Secure Code respectively.</li>
\t\t\t\t\t\t\t<li>3D Secure is a new security measure now required by most banks. This extra step to complete your order protects your card from fraudulent use online. When you click on the 'Confirm' button you will see a window open up entitled 3DSecure Authentication. The onscreen instructions will take you through what you need to do.</li>
\t\t\t\t\t\t\t<li>When submitting your card details, depending on the card type you have entered for your payment, you will be redirected to a secure Visa or MasterCard page with one of the above logos. These pages are on your bank's secure servers and at no stage will we be able to see or access this information.</li>
\t\t\t\t\t\t\t<li>If you have already registered your card for 3D Secure, you will be asked to enter your 3D Secure password.</li>
\t\t\t\t\t\t\t<li>If you have not registered your card before, you will have the option to do so, there and then. If you have not registered your card and do not wish to do so you may have the option to bypass the process depending on your card type and your bank. Some banks are forcing mandatory sign up to the scheme to upgrade your security to the highest level with immediate effect.</li>
\t\t\t\t\t\t\t<li>We highly recommend that you sign up to this new security initiative - it is for your protection when shopping online and will soon become the standard in online shopping for all websites.</li>
\t\t\t\t\t\t\t<li>If you have any questions regarding 3D Secure please <a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">contact us</a>. Your bank/card provider will also be happy to provide you with information regarding 3D Secure.</li>
\t\t\t\t\t\t</ul>
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
        return "WebIlluminationShopBundle:Content:fraudPrevention.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 45,  70 => 22,  67 => 21,  55 => 13,  48 => 8,  45 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
