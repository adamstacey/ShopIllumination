<?php

/* WebIlluminationShopBundle:Checkout:index.html.twig */
class __TwigTemplate_17f3cefbe58f44df7db075eedee67cea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Secure Checkout | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<header>
\t\t<h1>Secure Checkout</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\">
            <div class=\"portlet\">
                <header>
                    <h2>Welcome to the Kitchen Appliance Centre Secure Checkout</h2>
                </header>
                <section>
                \t<input type=\"hidden\" name=\"current-checkout-step\" id=\"current-checkout-step\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "checkoutStep"), "html", null, true);
        echo "\" />
                    <div class=\"sidebar-tabs\">
                        <ul>
                            <li id=\"tab-step-1\"><a href=\"#step-1\"><span class=\"fr ui-helper-hidden no-margin ui-icon ui-icon-check\"></span><strong>1.</strong> Your Account</a></li>
                            <li id=\"tab-step-2\"><a href=\"#step-2\"><span class=\"fr ui-helper-hidden no-margin ui-icon ui-icon-check\"></span><strong>2.</strong> About You</a></li>
                            <li id=\"tab-step-3\"><a href=\"#step-3\"><span class=\"fr ui-helper-hidden no-margin ui-icon ui-icon-check\"></span><strong>3.</strong> Billing</a></li>
                            <li id=\"tab-step-4\"><a href=\"#step-4\"><span class=\"fr ui-helper-hidden no-margin ui-icon ui-icon-check\"></span><strong>4.</strong> Delivery</a></li>
                            <li id=\"tab-step-5\"><a href=\"#step-5\"><span class=\"fr ui-helper-hidden no-margin ui-icon ui-icon-check\"></span><strong>5.</strong> Confirm &amp; Pay</a></li>
                        </ul>
                        <section id=\"step-1\" class=\"form ui-helper-hidden\">
                        \t<div id=\"checkout-your-email-address\">
\t                        \t<h5>Your Email Address</h5>
\t                        \t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-checkout-your-email-address-email-address\" class=\"form-label\"><em>*</em> Email Address<small>Enter a valid email address</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"email-address\" data-message=\"Enter a valid email address\" type=\"email\" id=\"form-checkout-your-email-address-email-address\" name=\"email-address\" required=\"required\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "emailAddress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "emailAddress"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t\t    \t\t<button class=\"button action-check-email-address ui-button-green\" data-icon-primary=\"ui-icon-check\">Check and Continue to Next Step</button>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div id=\"checkout-login\" class=\"ui-helper-hidden\">
\t\t\t\t\t\t\t    <h5>Your Account</h5>
\t\t\t\t\t\t\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t<p>Your email address has already been registered with us.<br />Please enter your password below and we will fetch all your details for you.</p>
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-checkout-login-email-address\" class=\"form-label\"><em>*</em> Email Address<small>Enter a valid email address</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input class=\"email-address\" data-message=\"Enter a valid email address\" type=\"email\" id=\"form-checkout-login-email-address\" name=\"email-address\" required=\"required\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "emailAddress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "emailAddress"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-password\" class=\"form-label\"><em>*</em> Password<small>Enter a password</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your password\" type=\"password\" id=\"form-checkout-login-password\" name=\"password\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <div class=\"form-input\"><a href=\"Javascript:void(0);\" class=\"action-forgotten-your-password\">Have you forgotten your password?</a></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t\t    \t\t<button class=\"button action-login ui-button-green\" data-icon-primary=\"ui-icon-key\">Securely Login</button>
\t\t\t\t\t\t\t    \t\t<button class=\"button action-use-different-email-address ui-button-red\" data-icon-primary=\"ui-icon-arrowthick-1-w\">Use a Different Email Address</button>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"forgotten-your-password\" class=\"ui-helper-hidden\"> 
\t\t\t\t\t\t\t\t<h5>Forgotten your password?</h5>
\t\t\t\t\t\t\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t<p>If you have forgotten your password enter your email address and we will email you instructions on how to reset your password.</p>
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-email-address\" class=\"form-label\"><em>*</em> Your Email Address<small>Enter a valid email address</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"full email\" required=\"required\" data-message=\"Enter a valid email address\" type=\"email\" id=\"form-forgotten-your-password-email-address\" name=\"email-address\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t\t    \t\t<button type=\"submit\" class=\"button action-reset-password ui-button-green\" data-icon-primary=\"ui-icon-key\">Reset Password</button>
\t\t\t\t\t\t\t    \t\t<a href=\"Javascript:void(0);\" class=\"button action-secure-login ui-button-blue\" data-icon-primary=\"ui-icon-key\">Secure Login</a>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t<div id=\"checkout-create-user\" class=\"ui-helper-hidden\">
\t\t\t\t\t\t\t    <h5>Create Your Account</h5>
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-email-address\" class=\"form-label\"><em>*</em> Email Address<small>Enter a valid email address</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input class=\"email-address\" data-message=\"Enter a valid email address\" type=\"email\" id=\"form-checkout-create-user-email-address\" name=\"email-address\" required=\"required\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "emailAddress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "emailAddress"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-email-address\" class=\"form-label\"><em>*</em> Confirm Email Address<small>Confirm your email address</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"email-address\" data-message=\"Confirm your email address\" data-equals=\"email-address\" type=\"email\" id=\"form-checkout-create-user-confirm-email-address\" name=\"confirm-email-address\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-password\" class=\"form-label\"><em>*</em> Password<small>Enter a password</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your password\" type=\"password\" id=\"form-checkout-create-user-password\" name=\"password\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-confirm-password\" class=\"form-label\"><em>*</em> Confirm Password<small>Confirm your password</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input data-message=\"Confirm your password\" data-equals=\"password\" type=\"password\" id=\"form-checkout-create-user-confirm-password\" name=\"confirm-password\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t\t    \t\t<button class=\"button action-create-user ui-button-green\" data-icon-primary=\"ui-icon-check\">Create Your Account</button>
\t\t\t\t\t\t\t    \t\t<button class=\"button action-use-different-email-address ui-button-red\" data-icon-primary=\"ui-icon-arrowthick-1-w\">Use a Different Email Address</button>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t\t\t\t<section id=\"step-2\" class=\"form ui-helper-hidden\">
\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-first-name\" class=\"form-label\"><em>*</em> First Name<small>Enter your first name</small></label>
\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your first name\" type=\"text\" id=\"form-first-name\" name=\"first-name\" required=\"required\" value=\"";
        // line 108
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "firstName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "firstName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-last-name\" class=\"form-label\"><em>*</em> Last Name<small>Enter your last name</small></label>
\t\t\t\t\t\t        <div class=\"form-input\"><input data-message=\"Enter your last name\" type=\"text\" id=\"form-last-name\" name=\"last-name\" required=\"required\" value=\"";
        // line 112
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "lastName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "lastName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-telephone-daytime\" class=\"form-label\"><em>*</em> Telephone (Daytime)<small>Enter a valid telephone number</small></label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-validation-type=\"telephone\" class=\"telephone\" data-message=\"Enter a valid telephone number\" type=\"text\" id=\"form-telephone-daytime\" name=\"telephone-daytime\" required=\"required\" value=\"";
        // line 116
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-telephone-evening\" class=\"form-label\">Telephone (Evening)<small>Enter a valid telephone number</small></label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-validation-type=\"telephone\" data-message=\"Enter a valid telephone number\" class=\"telephone\" type=\"text\" id=\"form-telephone-evening\" name=\"telephone-evening\" value=\"";
        // line 120
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-mobile\" class=\"form-label\">Mobile<small>Enter a valid mobile number</small></label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-validation-type=\"mobile\" class=\"telephone\" data-message=\"Enter a valid mobile number\" type=\"text\" id=\"form-mobile\" name=\"mobile\" value=\"";
        // line 124
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "mobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "mobile"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <div class=\"form-input\">
\t\t\t\t\t\t        \t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t\t<p>Although we do not require your mobile number, we would be able to keep you up-to-date with your order progress by text message if you did supply your mobile number.</p>
\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t    \t\t<button class=\"button action-save-step-2 ui-button-green\" data-icon-primary=\"ui-icon-check\">Save and Continue to Next Step</button>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</section>
\t\t\t\t\t\t<section id=\"step-3\" class=\"form ui-helper-hidden\">
\t\t\t\t\t\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t<p class=\"small-message\">Please enter the billing address. This must match the address on the statement of the card you want to pay with. You will be able to select a different delivery address on the next step.</p>
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-first-name\" class=\"form-label\"><em>*</em> First Name<small>Enter your first name</small></label>
\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your first name\" type=\"text\" id=\"form-billing-first-name\" name=\"billing-first-name\" required=\"required\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingFirstName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingFirstName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-last-name\" class=\"form-label\"><em>*</em> Last Name<small>Enter your last name</small></label>
\t\t\t\t\t\t        <div class=\"form-input\"><input data-message=\"Enter your last name\" type=\"text\" id=\"form-billing-last-name\" name=\"billing-last-name\" required=\"required\" value=\"";
        // line 153
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingLastName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingLastName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-organisation-name\" class=\"form-label\">Company<small>Enter the company name</small></label>
\t\t\t\t\t\t        <div class=\"form-input\"><input type=\"text\" id=\"form-billing-organisation-name\" name=\"billing-organisation-name\" value=\"";
        // line 157
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingOrganisationName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingOrganisationName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-country-code\" class=\"form-label\"><em>*</em> Country</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\">
\t\t\t\t\t\t        \t<select id=\"form-billing-country-code\" name=\"billing-country-code\">
\t\t\t\t\t\t        \t\t<option value=\"GB\"";
        // line 163
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
            echo " selected=\"selected\"";
        }
        echo ">United Kingdom</option>
\t\t\t\t\t\t        \t\t<option value=\"IE\"";
        // line 164
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            echo " selected=\"selected\"";
        }
        echo ">Republic of Ireland</option>
\t\t\t\t\t\t        \t</select>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-address-line-1\" class=\"form-label\"><em>*</em> Address Line 1</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter the first line of your address\" type=\"text\" id=\"form-billing-address-line-1\" name=\"billing-address-line-1\" required=\"required\" value=\"";
        // line 170
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingAddressLine1", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingAddressLine1"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-address-line-2\" class=\"form-label\">Address Line 2</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input type=\"text\" id=\"form-billing-address-line-2\" name=\"billing-address-line-2\" value=\"";
        // line 174
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingAddressLine2", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingAddressLine2"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-town-city\" class=\"form-label\"><em>*</em> Town/City</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your Town or City\" type=\"text\" id=\"form-billing-town-city\" name=\"billing-town-city\" required=\"required\" value=\"";
        // line 178
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingTownCity", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingTownCity"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <label for=\"form-billing-county-state\" class=\"form-label\">County</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input type=\"text\" id=\"form-billing-county-state\" name=\"billing-county-state\" value=\"";
        // line 182
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingCountyState", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingCountyState"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t     <div id=\"billing-post-zip-code-container\" class=\"clearfix";
        // line 184
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") != "GB")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t        <label for=\"form-billing-post-zip-code\" class=\"form-label\"><em>*</em> Post Code</label>
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input class=\"uppercase\" data-validation-type=\"postcode\" data-message=\"Enter a valid post code\" type=\"text\" id=\"form-billing-post-zip-code\" name=\"billing-post-zip-code\" required=\"required\" value=\"";
        // line 186
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "billingPostZipCode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "billingPostZipCode"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div id=\"same-address-billing\" class=\"same-addresses clearfix";
        // line 188
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t\t\t<label for=\"form-same-delivery-address\" class=\"form-label\">&nbsp;</label>
\t\t\t\t\t\t\t\t<div class=\"form-input\"><input type=\"checkbox\"";
        // line 190
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            echo " checked=\"checked\"";
        } else {
            if ($this->getAttribute($this->getContext($context, "order", true), "sameDeliveryAddress", array(), "any", true, true)) {
                if (($this->getAttribute($this->getContext($context, "order"), "sameDeliveryAddress") == 1)) {
                    echo " checked=\"checked\"";
                }
            }
        }
        echo " id=\"form-same-delivery-address\" name=\"same-delivery-address\" value=\"1\" />Do you want to deliver to this address?</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"republic-of-ireland-billing-address-message\" class=\"clearfix republic-of-ireland-address-message";
        // line 192
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") != "IE")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\">
\t\t\t\t\t\t        \t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t\t<p class=\"small-message\">Please note that the billing and delivery address need to be the same for all orders from the Republic of Ireland.</p>
\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t    \t\t<button class=\"button action-save-step-3 ui-button-green\" data-icon-primary=\"ui-icon-check\">Save and Continue to Next Step</button>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</section>
\t\t\t\t\t\t<section id=\"step-4\" class=\"form ui-helper-hidden\">
\t\t\t\t\t\t\t<h5>Delivery Options</h5>
\t\t\t\t\t\t\t<div class=\"clearfix spacer\">
\t\t\t\t\t\t\t\t<div class=\"form-input spacer\"><label><input";
        // line 210
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "service") == "Standard Delivery")) {
            echo " checked=\"checked\"";
        }
        echo " type=\"radio\" name=\"delivery-option\" id=\"form-delivery-option-standard-delivery\" value=\"Standard Delivery\" /> Delivery by <strong>Standard Delivery</strong> - <span class=\"delivery-price";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "deliveryOptions"), "standardDelivery") == 0)) {
            echo " free";
        }
        echo "\">";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "deliveryOptions"), "standardDelivery") == 0)) {
            echo "FREE";
        } else {
            echo "&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "deliveryOptions"), "standardDelivery"), 2), "html", null, true);
        }
        echo "</span></label></div>
\t\t\t\t\t\t\t\t<div class=\"form-input no-margin-bottom\"><label><input";
        // line 211
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "service") == "Collection")) {
            echo " checked=\"checked\"";
        }
        echo " type=\"radio\" name=\"delivery-option\" id=\"form-delivery-option-collection\" value=\"Collection\" /> Collection from <strong>Derby Shop</strong> - <span class=\"free\"><strong>FREE</strong></span></label></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"checkout-delivery-address\">
\t\t\t\t\t\t\t\t<h5>Delivery Address</h5>
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-first-name\" class=\"form-label\"><em>*</em> First Name<small>Enter your first name</small></label>
\t\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your first name\" type=\"text\" id=\"form-delivery-first-name\" name=\"delivery-first-name\" required=\"required\" value=\"";
        // line 217
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryFirstName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryFirstName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-last-name\" class=\"form-label\"><em>*</em> Last Name<small>Enter your last name</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input data-message=\"Enter your last name\" type=\"text\" id=\"form-delivery-last-name\" name=\"delivery-last-name\" required=\"required\" value=\"";
        // line 221
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryLastName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryLastName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-organisation-name\" class=\"form-label\">Company<small>Enter the company name</small></label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input type=\"text\" id=\"form-delivery-organisation-name\" name=\"delivery-organisation-name\" value=\"";
        // line 225
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryOrganisationName", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryOrganisationName"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div id=\"same-address-delivery\" class=\"same-addresses clearfix";
        // line 227
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t<label for=\"form-use-billing-address\" class=\"form-label\">&nbsp;</label>
\t\t\t\t\t\t\t\t\t<div class=\"form-input no-margin-bottom\"><input type=\"checkbox\"";
        // line 229
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
            echo " checked=\"checked\"";
        } else {
            if ($this->getAttribute($this->getContext($context, "order", true), "sameDeliveryAddress", array(), "any", true, true)) {
                if (($this->getAttribute($this->getContext($context, "order"), "sameDeliveryAddress") == 1)) {
                    echo " checked=\"checked\"";
                }
            }
        }
        echo " id=\"form-use-billing-address\" name=\"use-billing-address\" value=\"1\" />Do you want to use your billing address?</div>
\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-country-code\" class=\"form-label\"><em>*</em> Country</label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\">
\t\t\t\t\t\t\t        \t<select id=\"form-delivery-country-code\" name=\"delivery-country-code\">
\t\t\t\t\t\t\t        \t\t<option value=\"GB\"";
        // line 235
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
            echo " selected=\"selected\"";
        }
        echo ">United Kingdom</option>
\t\t\t\t\t\t\t        \t\t<option value=\"IE\"";
        // line 236
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
            echo " selected=\"selected\"";
        }
        echo ">Republic of Ireland</option>
\t\t\t\t\t\t\t        \t</select>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-address-line-1\" class=\"form-label\"><em>*</em> Address Line 1</label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter the first line of your address\" type=\"text\" id=\"form-delivery-address-line-1\" name=\"delivery-address-line-1\" required=\"required\" value=\"";
        // line 242
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryAddressLine1", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryAddressLine1"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-address-line-2\" class=\"form-label\">Address Line 2</label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input type=\"text\" id=\"form-delivery-address-line-2\" name=\"delivery-address-line-2\" value=\"";
        // line 246
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryAddressLine2", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryAddressLine2"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-town-city\" class=\"form-label\"><em>*</em> Town/City</label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input data-message=\"Enter your Town or City\" type=\"text\" id=\"form-delivery-town-city\" name=\"delivery-town-city\" required=\"required\" value=\"";
        // line 250
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryTownCity", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryTownCity"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-county-state\" class=\"form-label\">County</label>
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\"><input type=\"text\" id=\"form-delivery-county-state\" name=\"delivery-county-state\" value=\"";
        // line 254
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryCountyState", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryCountyState"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div id=\"delivery-post-zip-code-container\" class=\"clearfix";
        // line 256
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") != "GB")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t\t        <label for=\"form-delivery-post-zip-code\" class=\"form-label\"><em>*</em> Post Code</label>
\t\t\t\t\t\t\t        <div class=\"form-input\"><input class=\"uppercase\" data-validation-type=\"postcode\" data-message=\"Enter a valid post code\" type=\"text\" id=\"form-delivery-post-zip-code\" name=\"delivery-post-zip-code\" required=\"required\" value=\"";
        // line 258
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryPostZipCode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryPostZipCode"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t    <div id=\"republic-of-ireland-delivery-address-message\" class=\"clearfix republic-of-ireland-address-message";
        // line 260
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") != "IE")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t\t        <div class=\"form-input no-margin-bottom\">
\t\t\t\t\t\t\t        \t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t\t\t<p class=\"small-message\">Please note that the billing and delivery address need to be the same for all orders from the Republic of Ireland.</p>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t\t    \t\t<button class=\"button action-save-step-4 ui-button-green\" data-icon-primary=\"ui-icon-check\">Save and Continue to Next Step</button>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t</section>
\t\t\t\t\t\t<section id=\"step-5\" class=\"form ui-helper-hidden\">
\t\t\t\t\t\t\t<div> 
\t\t\t\t\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t\t\t\t\t<header>
\t\t\t\t\t\t                <h2 id=\"products-found\">Your Order Details</h2>
\t\t\t\t\t\t            </header>
\t\t\t\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t\t\t\t<div id=\"order-information-loading\" class=\"clearfix ac\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
        // line 284
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />
\t\t\t\t\t\t\t\t\t\t\t<p>Loading your order details&hellip;</p>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div id=\"order-information\" class=\"ui-helper-hidden\"></div>
\t\t\t\t\t\t\t\t\t\t<div id=\"order-notes\" class=\"form clearfix\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"small-message\">If you would like your items delivered at a later date we can store them in our secure warehouse until you need them at no extra cost. Just let us know below.</p>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div id=\"checkout-requested-delivery-date\" class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t        <label id=\"label-requested-delivery-date\" for=\"form-requested-delivery-date\" class=\"form-label\">Requested Delivery Date<small>Enter a requested delivery date</small></label>
\t\t\t\t\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><input type=\"text\" id=\"form-requested-delivery-date\" name=\"requested-delivery-date\" value=\"";
        // line 297
        if ((($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "requestedDeliveryDate") != "") && ($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "requestedDeliveryDate") != "Deliver ASAP"))) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "delivery"), "requestedDeliveryDate"), "l j F Y"), "html", null, true);
        } else {
            echo "Deliver ASAP";
        }
        echo "\" /></div>
\t\t\t\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t        <label for=\"form-notes\" class=\"form-label\">Special Requirements<small>If you have any special delivery requirements please enter them here</small></label>
\t\t\t\t\t\t\t\t\t\t\t    <div class=\"form-input no-margin-bottom\"><textarea id=\"form-notes\" name=\"notes\">";
        // line 301
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "basket", true), "delivery", array(), "any", false, true), "notes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "basket", true), "delivery", array(), "any", false, true), "notes"), "")) : ("")), "html", null, true);
        echo "</textarea></div>
\t\t\t\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form-use-billing-address\" class=\"form-label\">&nbsp;</label>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-input no-margin-bottom\"><input type=\"checkbox\" data-message=\"Confirm you have read and agreed\" required=\"required\" id=\"form-accept-terms-and-conditions\" name=\"accept-terms-and-conditions\" checked=\"checked\" />I have read and agreed to your <a target=\"_blank\" href=\"";
        // line 305
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_terms_and_conditions"), "html", null, true);
        echo "\">Terms and Conditions</a>.</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t        </div>
\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t<div id=\"payment-type-sagepay\" class=\"leading clearfix ui-helper-hidden\">
\t\t\t\t\t\t\t\t<form id=\"submit-payment-sagepay\" method=\"POST\" action=\"https://live.sagepay.com/gateway/service/vspform-register.vsp\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"sage-pay-vsp-protocol\" name=\"VPSProtocol\" value=\"";
        // line 313
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "vspProtocol", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "vspProtocol"), "")) : ("")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"sage-pay-vendor\" name=\"Vendor\" value=\"";
        // line 314
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "vendor", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "vendor"), "")) : ("")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"sage-pay-tx-type\" name=\"TxType\" value=\"";
        // line 315
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "txType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "txType"), "")) : ("")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"sage-pay-crypt\" name=\"Crypt\" value=\"";
        // line 316
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "crypt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getContext($context, "order", true), "paymentProcess", array(), "any", false, true), "crypt"), "")) : ("")), "html", null, true);
        echo "\"/>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t<div class=\"buttons no-margin-bottom ac\">
\t\t\t\t\t    \t\t\t<button data-form-id=\"submit-payment-sagepay\" class=\"action-submit-payment button ui-button-green\" data-icon-primary=\"ui-icon-check\">Confirm Your Order and Pay Securely Through SagePay or PayPal</button>
\t\t\t\t\t        \t</div>
\t\t\t\t\t        </div>
\t\t\t\t\t\t\t<div id=\"payment-type-voucher-code\" class=\"leading clearfix ui-helper-hidden\">
\t\t\t\t\t\t\t\t<form id=\"submit-payment-voucher-code\" method=\"POST\" action=\"";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_order_placed"), "html", null, true);
        echo "\"></form>
\t\t\t\t\t\t\t\t<div class=\"buttons no-margin-bottom ac\">
\t\t\t\t\t    \t\t\t<button data-form-id=\"submit-payment-voucher-code\" class=\"action-submit-payment button ui-button-green\" data-icon-primary=\"ui-icon-check\">Confirm Your Order</button>
\t\t\t\t\t        \t</div>
\t\t\t\t\t        </div>
\t\t\t\t\t        <div id=\"payment-type-gift-voucher\" class=\"leading clearfix ui-helper-hidden\">
\t\t\t\t\t\t\t\t<form id=\"submit-payment-gift-voucher\" method=\"POST\" action=\"";
        // line 329
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_order_placed"), "html", null, true);
        echo "\"></form>
\t\t\t\t\t\t\t\t<div class=\"buttons no-margin-bottom ac\">
\t\t\t\t\t    \t\t\t<button data-form-id=\"submit-payment-gift-voucher\" class=\"action-submit-payment button ui-button-green\" data-icon-primary=\"ui-icon-check\">Confirm Your Order</button>
\t\t\t\t\t        \t</div>
\t\t\t\t\t        </div>
\t\t\t\t\t\t   \t<div class=\"clear\"></div>
\t\t\t\t\t\t</section>
                    </div>
                </section>
            </div>
        </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 343
    public function block_javascripts($context, array $blocks = array())
    {
        // line 344
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 345
        $this->env->loadTemplate("WebIlluminationShopBundle:Checkout:indexScript.js.twig")->display(array_merge($context, array("order" => $this->getContext($context, "order"), "basket" => $this->getContext($context, "basket"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Checkout:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  590 => 345,  582 => 343,  541 => 315,  537 => 314,  533 => 313,  442 => 254,  530 => 163,  504 => 297,  498 => 147,  492 => 144,  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 329,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 158,  435 => 250,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 167,  456 => 382,  440 => 151,  377 => 125,  313 => 136,  281 => 96,  469 => 403,  426 => 335,  421 => 242,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 89,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 153,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 148,  396 => 131,  364 => 157,  348 => 146,  336 => 181,  310 => 192,  304 => 120,  18 => 1,  489 => 143,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 126,  350 => 211,  315 => 112,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 305,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 168,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 119,  328 => 86,  325 => 117,  316 => 166,  278 => 184,  250 => 68,  163 => 112,  523 => 216,  516 => 154,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 141,  462 => 133,  447 => 256,  438 => 172,  393 => 257,  373 => 140,  370 => 240,  368 => 221,  361 => 217,  342 => 145,  329 => 142,  326 => 118,  319 => 131,  288 => 102,  229 => 88,  206 => 75,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 107,  246 => 89,  234 => 64,  217 => 69,  173 => 100,  309 => 108,  285 => 186,  280 => 235,  276 => 94,  262 => 92,  235 => 163,  232 => 175,  212 => 149,  207 => 152,  143 => 50,  157 => 97,  366 => 136,  340 => 160,  503 => 223,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 112,  412 => 184,  409 => 103,  404 => 235,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 130,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 157,  187 => 66,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 60,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 316,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 42,  208 => 92,  183 => 101,  166 => 62,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 143,  375 => 225,  371 => 152,  363 => 135,  359 => 93,  355 => 133,  351 => 131,  347 => 101,  331 => 120,  323 => 145,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 109,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 116,  210 => 82,  180 => 55,  172 => 64,  168 => 44,  149 => 52,  139 => 85,  240 => 99,  230 => 82,  121 => 44,  257 => 195,  249 => 88,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 113,  255 => 193,  244 => 107,  214 => 83,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 16,  487 => 142,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 145,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 123,  352 => 91,  338 => 124,  333 => 210,  327 => 118,  324 => 289,  320 => 168,  297 => 190,  274 => 96,  256 => 90,  254 => 89,  252 => 170,  231 => 127,  216 => 95,  213 => 58,  202 => 76,  458 => 139,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 129,  387 => 229,  384 => 146,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 188,  284 => 100,  270 => 122,  266 => 178,  261 => 70,  247 => 191,  243 => 86,  238 => 107,  220 => 79,  201 => 74,  194 => 71,  130 => 46,  100 => 43,  85 => 32,  76 => 33,  112 => 16,  101 => 37,  98 => 36,  272 => 93,  269 => 92,  228 => 81,  221 => 80,  197 => 72,  184 => 124,  138 => 80,  118 => 92,  105 => 23,  66 => 26,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 73,  192 => 120,  189 => 119,  178 => 62,  176 => 110,  165 => 57,  161 => 100,  152 => 88,  148 => 42,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 33,  54 => 8,  133 => 34,  124 => 42,  111 => 64,  107 => 39,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 30,  88 => 34,  78 => 30,  75 => 17,  71 => 21,  464 => 178,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 166,  425 => 165,  420 => 143,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 115,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 174,  287 => 77,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 164,  236 => 84,  222 => 158,  218 => 85,  159 => 60,  154 => 53,  151 => 57,  145 => 77,  136 => 48,  128 => 83,  125 => 47,  119 => 43,  110 => 40,  96 => 33,  93 => 29,  91 => 17,  68 => 16,  65 => 18,  63 => 13,  43 => 12,  50 => 14,  25 => 8,  92 => 34,  86 => 25,  79 => 30,  46 => 11,  37 => 4,  33 => 9,  27 => 2,  82 => 27,  72 => 28,  64 => 25,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 3,  23 => 6,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 5,  22 => 3,  224 => 86,  215 => 59,  211 => 178,  204 => 61,  200 => 75,  195 => 54,  193 => 46,  190 => 92,  188 => 69,  185 => 65,  179 => 66,  177 => 120,  171 => 59,  162 => 56,  158 => 132,  156 => 108,  153 => 58,  146 => 41,  142 => 55,  137 => 86,  131 => 31,  126 => 92,  120 => 44,  117 => 50,  103 => 37,  99 => 23,  77 => 29,  74 => 29,  57 => 24,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 39,  104 => 58,  102 => 17,  94 => 21,  89 => 31,  87 => 45,  84 => 23,  81 => 22,  73 => 28,  70 => 15,  67 => 28,  62 => 14,  59 => 13,  55 => 23,  51 => 7,  48 => 8,  41 => 15,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
