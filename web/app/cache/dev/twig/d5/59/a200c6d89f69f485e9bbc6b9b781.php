<?php

/* ::adminTopMenu.html.twig */
class __TwigTemplate_d559a200c6d89f69f485e9bbc6b9b781 extends Twig_Template
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
        echo "<nav>
    <ul class=\"sf-menu clearfix\">
        <li><a href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders"), "html", null, true);
        echo "\">Orders</a></li>
        <li><a href=\"#\">Catlogue</a>
            <ul>
            \t<li><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_brands"), "html", null, true);
        echo "\">Brands</a></li>
            \t<li><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_departments"), "html", null, true);
        echo "\">Departments</a></li>
            \t<li><a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_product_options"), "html", null, true);
        echo "\">Product Options</a></li>
            \t<li><a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_product_features"), "html", null, true);
        echo "\">Product Features</a></li>
                <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\">Products</a></li>
            </ul>
        </li>
        <li><a href=\"#\">Marketing</a>
            <ul>
            \t<li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_links"), "html", null, true);
        echo "\">Links</a></li>
            \t<li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes"), "html", null, true);
        echo "\">Voucher Codes</a></li>
            \t<li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards"), "html", null, true);
        echo "\">Membership Cards</a></li>
            </ul>
        </li>
        <li class=\"fr\"><a href=\"#\" class=\"arrow-down\">Your Account</a>
            <ul>
                <li><a href=\"#\">Change Your Password</a></li>
                <li><a href=\"#\">Update Your Details</a></li>
                <li><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_security_logout"), "html", null, true);
        echo "\">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>";
    }

    public function getTemplateName()
    {
        return "::adminTopMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 24,  59 => 17,  55 => 16,  43 => 10,  39 => 9,  35 => 8,  31 => 7,  27 => 6,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
