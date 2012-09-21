<?php

/* ::shopTopMenu.html.twig */
class __TwigTemplate_77a0210878b7070c15829f2bd59fbf8b extends Twig_Template
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
        echo "<div class=\"top-menu-links\">
\t<a title=\"Start shopping for kitchen appliances\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\">Shopping</a>&nbsp;|&nbsp;
\t<a class=\"action-scroll-to-bottom\" title=\"Do you need any help or advice on your kitchen appliances?\" href=\"Javascript:void(0);\">Help &amp; Advice</a>&nbsp;|&nbsp;
\t";
        // line 4
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "get", array(0 => "_security_shop"), "method")) {
            // line 5
            echo "\t\t<a title=\"Click here if you would like to securely logout.\" class=\"account\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("security_logout"), "html", null, true);
            echo "\">Securely Logout</a>&nbsp;|&nbsp;
\t\t<a title=\"Click here to update your account.\" class=\"account\" href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_user"), "html", null, true);
            echo "\">Your Account</a>
\t";
        } else {
            // line 8
            echo "\t\t<a title=\"If you already have an account log in here\" class=\"account\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("security_login"), "html", null, true);
            echo "\">Secure Login</a>&nbsp;|&nbsp;
\t\t<a title=\"If you don't already have an account and would like to register one click here\" class=\"account\" href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_register"), "html", null, true);
            echo "\">Register</a>
\t";
        }
        // line 11
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "::shopTopMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  37 => 8,  32 => 6,  27 => 5,  20 => 2,  64 => 23,  62 => 22,  59 => 21,  52 => 17,  49 => 16,  47 => 11,  41 => 14,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 24,  154 => 14,  151 => 13,  145 => 10,  142 => 9,  136 => 8,  131 => 125,  128 => 124,  122 => 122,  119 => 121,  108 => 117,  93 => 106,  91 => 105,  70 => 86,  65 => 84,  63 => 83,  57 => 20,  55 => 78,  51 => 77,  43 => 47,  40 => 13,  38 => 9,  34 => 10,  25 => 4,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 92,  129 => 89,  125 => 123,  116 => 120,  113 => 119,  110 => 118,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 85,  60 => 15,  54 => 12,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
