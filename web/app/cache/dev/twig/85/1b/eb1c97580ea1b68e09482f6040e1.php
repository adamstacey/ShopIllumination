<?php

/* WebIlluminationAdminBundle:Orders:listingCustomer.html.twig */
class __TwigTemplate_851beb1c97580ea1b68e09482f6040e1 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-customer-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<h5 class=\"no-margin-top\">Customer</h5>
\t<table width=\"100%\">
\t\t<tr>
\t\t\t<td class=\"label\" width=\"20%\"><label>Name:</label></td>
\t\t\t<td width=\"20%\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "lastName"), "html", null, true);
        echo "</td>
\t\t\t<td rowspan=\"5\" class=\"label\" width=\"10%\"><label>Billing<br />Address</label></td>
\t\t\t<td rowspan=\"5\" width=\"20%\" class=\"uppercase\">";
        // line 8
        ob_start();
        // line 9
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 10
        if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
            // line 11
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 13
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 14
        if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
            // line 15
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 17
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 18
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
            // line 19
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 21
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
        echo "
\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 22
        echo "</td>
\t\t\t<td rowspan=\"5\" class=\"label\" width=\"10%\"><label>Delivery<br />Address</label></td>
\t\t\t<td rowspan=\"5\" width=\"20%\" class=\"uppercase\">";
        // line 24
        ob_start();
        // line 25
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 26
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
            // line 27
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 29
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 30
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
            // line 31
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 33
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t";
        // line 34
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
            // line 35
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t";
        }
        // line 37
        echo "\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
        echo "
\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 38
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"20%\"><label>Email Address:</label></td>
\t\t\t<td width=\"20%\"><a class=\"lowercase\" href=\"mailto:";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "emailAddress"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "emailAddress"), "html", null, true);
        echo "</a></td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"20%\"><label>Telephone (Daytime):</label></td>
\t\t\t<td width=\"20%\">";
        // line 46
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"20%\"><label>Telephone (Evening):</label></td>
\t\t\t<td width=\"20%\">";
        // line 50
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"label\" width=\"20%\"><label>Mobile:</label></td>
\t\t\t<td width=\"20%\">";
        // line 54
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "mobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "mobile"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t</tr>
\t</table>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingCustomer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 50,  150 => 46,  141 => 42,  135 => 38,  129 => 37,  121 => 34,  108 => 30,  95 => 26,  88 => 25,  82 => 22,  76 => 21,  63 => 17,  55 => 14,  44 => 11,  26 => 6,  103 => 29,  91 => 28,  85 => 26,  83 => 25,  78 => 24,  72 => 22,  65 => 20,  59 => 18,  57 => 15,  50 => 13,  48 => 15,  43 => 13,  34 => 9,  29 => 6,  25 => 4,  23 => 3,  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 54,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 35,  117 => 41,  115 => 47,  106 => 43,  97 => 27,  90 => 37,  81 => 33,  68 => 18,  61 => 23,  54 => 19,  47 => 15,  42 => 10,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 33,  110 => 31,  104 => 25,  98 => 24,  92 => 23,  86 => 24,  80 => 21,  74 => 31,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 8,  17 => 1,);
    }
}
