<?php

/* WebIlluminationAdminBundle:Orders:listingDeliveryInformation.html.twig */
class __TwigTemplate_d25b04637f03eba2fd9a4c46234394b6 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-delivery-information-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<h5 class=\"no-margin-top\">Delivery Information</h5>
\t";
        // line 3
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 4
            echo "\t\t<p class=\"important padding-top-5 padding-bottom-5\">Order for collection only</p>
\t";
        } else {
            // line 6
            echo "\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Estimated Delivery:</label></td>
\t\t\t\t<td colspan=\"3\" width=\"80%\">Estimated delivery between <strong>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "estimatedDeliveryDateRangeStart"), "html", null, true);
            echo "</strong> and <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "estimatedDeliveryDateRangeEnd"), "html", null, true);
            echo "</strong> subject to availability.</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Type:</label></td>
\t\t\t\t<td width=\"30%\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryType"), "html", null, true);
            echo "</td>
\t\t\t\t<td rowspan=\"3\" class=\"label\" width=\"20%\"><label>Deliver To:</label></td>
\t\t\t\t<td rowspan=\"3\" width=\"30%\" class=\"uppercase\">";
            // line 15
            ob_start();
            // line 16
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 17
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 18
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 20
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 21
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 22
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 24
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 25
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 26
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 28
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
            echo "
\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 29
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Charge:</label></td>
\t\t\t\t<td width=\"20%\">&pound;";
            // line 33
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Post Code:</label></td>
\t\t\t\t<td width=\"20%\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t</table>
\t";
        }
        // line 41
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingDeliveryInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 33,  91 => 28,  85 => 26,  83 => 25,  78 => 24,  72 => 22,  65 => 20,  59 => 18,  57 => 17,  50 => 16,  48 => 15,  43 => 13,  34 => 9,  29 => 6,  25 => 4,  23 => 3,  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 63,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 52,  117 => 41,  115 => 47,  106 => 43,  97 => 29,  90 => 37,  81 => 33,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  42 => 13,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 27,  110 => 37,  104 => 25,  98 => 24,  92 => 23,  86 => 22,  80 => 21,  74 => 31,  70 => 21,  64 => 18,  58 => 17,  52 => 16,  33 => 15,  17 => 1,);
    }
}
