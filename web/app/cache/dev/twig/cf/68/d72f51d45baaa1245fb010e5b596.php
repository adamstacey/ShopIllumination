<?php

/* ::shopCookiePolicy.html.twig */
class __TwigTemplate_cf68d72f51d45baaa1245fb010e5b596 extends Twig_Template
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
        echo "<div id=\"cookie-policy\" class=\"cookie-policy ui-helper-hidden\">
\t<img class=\"fr\" src=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/icons/cookies.png"), "html", null, true);
        echo "\" width=\"50\" height=\"38\" border=\"0\" alt=\"Cookies\" />
\t<h2>Cookie Policy</h2>
\t<div id=\"cookie-policy-disclaimer\">
\t\t<p>This website uses cookies to track and improve the visitor experience. These cookies do not hold any personal data.</p>
\t\t<p class=\"accept-cookie-policy\"><a class=\"action-decline-cookies\" title=\"Decline Cookies\" href=\"Javascript:void(0);\"></a><a class=\"action-accept-cookies\" title=\"Accept Cookies\" href=\"Javascript:void(0);\"></a><strong>Happy to accept</strong><br /><a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_cookie_policy"), "html", null, true);
        echo "\">Learn more</a></p>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "::shopCookiePolicy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 39,  77 => 34,  71 => 30,  56 => 22,  133 => 58,  109 => 43,  99 => 39,  89 => 35,  85 => 34,  76 => 28,  53 => 14,  45 => 17,  33 => 9,  48 => 11,  44 => 10,  22 => 4,  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 62,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 41,  97 => 13,  80 => 35,  75 => 11,  72 => 10,  28 => 5,  21 => 3,  42 => 9,  37 => 10,  32 => 6,  27 => 6,  20 => 2,  64 => 22,  62 => 25,  59 => 21,  52 => 17,  49 => 13,  47 => 11,  41 => 11,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 27,  154 => 68,  151 => 66,  145 => 10,  142 => 61,  136 => 8,  131 => 125,  128 => 124,  122 => 50,  119 => 18,  108 => 117,  93 => 36,  91 => 105,  70 => 25,  65 => 8,  63 => 83,  57 => 17,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 11,  25 => 7,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 60,  129 => 89,  125 => 123,  116 => 47,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 29,  60 => 24,  54 => 21,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
