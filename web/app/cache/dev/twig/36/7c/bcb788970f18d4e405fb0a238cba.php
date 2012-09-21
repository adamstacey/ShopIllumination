<?php

/* WebIlluminationAdminBundle:Security:login.html.twig */
class __TwigTemplate_367cbcb788970f18d4e405fb0a238cba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Secure Login  | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<h2>Secure Login</h2>
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "    <section class=\"container_6 clearfix no-padding-top\">
    \t<div class=\"grid_6\">
    \t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Secure Login</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div id=\"message-notice\" class=\"ui-widget message\">
\t\t\t\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin-top\"> 
\t\t\t\t\t        <p class=\"no-margin\"><span class=\"ui-icon ui-icon-info\"></span>To access the control panel please enter your email address and password and click the \"Login Securely\" button.</p>
\t\t\t\t\t    </div>
\t\t\t\t\t</div>
\t\t\t\t\t<form id=\"form-login\" class=\"form has-validation\" action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_security_login"), "html", null, true);
        echo "\" method=\"post\">
\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-header\" class=\"form-label\"><em>*</em> Email Address<small>Enter your email address</small></label>
\t\t\t\t\t        <div class=\"form-input\"><input class=\"full\" data-message=\"Please enter a valid email address.\" type=\"email\" class=\"lowercase emai\" id=\"form-email-address\" name=\"email-address\" required=\"required\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, ((array_key_exists("emailAddress", $context)) ? (_twig_default_filter($this->getContext($context, "emailAddress"), "")) : ("")), "html", null, true);
        echo "\" /></div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t        <label for=\"form-header\" class=\"form-label\"><em>*</em> Password<small>Enter your password</small></label>
\t\t\t\t\t        <div class=\"form-input\"><input class=\"full\" data-message=\"Please enter your password.\" type=\"password\" id=\"form-password\" name=\"password\" required=\"required\" value=\"\" /></div>
\t\t\t\t\t    </div>
\t\t\t\t\t    <div class=\"clearfix\">
\t\t\t\t\t        <div class=\"form-input buttons no-margin-bottom\">
\t\t\t\t\t    \t\t<button class=\"button ui-button-green\" data-icon-primary=\"ui-icon-key\">Login Securely</button>
\t\t\t\t\t        </div>
\t\t\t\t\t    </div>
\t\t\t\t    </form>
\t\t\t\t</section>
\t        </div>
\t\t</div>
\t</section>
";
    }

    // line 40
    public function block_javascripts($context, array $blocks = array())
    {
        // line 41
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 42
        $this->env->loadTemplate("WebIlluminationAdminBundle:Security:script.js.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 42,  94 => 41,  91 => 40,  70 => 23,  64 => 20,  50 => 8,  47 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
