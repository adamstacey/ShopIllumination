<?php

/* WebIlluminationAdminBundle:Products:listingSettings.html.twig */
class __TwigTemplate_c84f8c1fc84332994c8ed4702ffa03e6 extends Twig_Template
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
        echo "<div id=\"listing-settings\">
\t<div class=\"fl\">
\t\t<div class=\"listing-settings-title fl\">Sort By</div>
\t\t<select id=\"listing-sort-order\" class=\"fl\">
\t\t\t<option";
        // line 5
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "product:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"product:ASC\">Alphabetically: A-Z</option>
\t\t\t<option";
        // line 6
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "product:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"product:DESC\">Alphabetically: Z-A</option>
\t\t\t<option";
        // line 7
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "listPrice:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"listPrice:ASC\">Price: Lowest First</option>
\t\t\t<option";
        // line 8
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "listPrice:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"listPrice:DESC\">Price: Highest First</option>
\t\t\t<option";
        // line 9
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "savings:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"savings:DESC\">Special Offers: Biggest Savings First</option>
\t\t\t<option";
        // line 10
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "discount:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"discount:DESC\">Special Offers: Biggest Discounts First</option>
\t\t\t<option";
        // line 11
        if (($this->getAttribute($this->getContext($context, "settings"), "listingSortOrder") == "createdAt:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"createdAt:DESC\">Latest</option>
\t\t</select>
\t</div>
    <div class=\"fr\">
    \t<div class=\"listing-settings-title fl\">Per Page</div>
        <select class=\"fl\" id=\"listing-max-results\">
\t\t\t<option";
        // line 17
        if (($this->getAttribute($this->getContext($context, "settings"), "listingMaxResults") == "10")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"10\">10</option>
\t\t\t<option";
        // line 18
        if (($this->getAttribute($this->getContext($context, "settings"), "listingMaxResults") == "20")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"20\">20</option>
\t\t\t<option";
        // line 19
        if (($this->getAttribute($this->getContext($context, "settings"), "listingMaxResults") == "50")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"50\">50</option>
\t\t\t<option";
        // line 20
        if (($this->getAttribute($this->getContext($context, "settings"), "listingMaxResults") == "100")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"100\">100</option>
\t\t\t<option";
        // line 21
        if (($this->getAttribute($this->getContext($context, "settings"), "listingMaxResults") == "99999999")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"99999999\">All</option>
\t\t</select>
\t\t<input type=\"hidden\" id=\"listing-current-page\" value=\"1\" />
\t</div>
    <div class=\"clear\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:listingSettings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  88 => 20,  82 => 19,  76 => 18,  70 => 17,  59 => 11,  47 => 9,  35 => 7,  29 => 6,  23 => 5,  644 => 211,  641 => 210,  617 => 206,  600 => 205,  593 => 203,  584 => 197,  581 => 196,  569 => 192,  552 => 191,  545 => 189,  514 => 161,  501 => 160,  488 => 159,  481 => 155,  468 => 154,  455 => 153,  448 => 149,  435 => 148,  422 => 147,  415 => 143,  402 => 142,  389 => 141,  382 => 137,  369 => 136,  356 => 135,  343 => 125,  330 => 124,  317 => 123,  310 => 119,  297 => 118,  284 => 117,  277 => 113,  264 => 112,  251 => 111,  244 => 107,  231 => 106,  218 => 105,  211 => 101,  198 => 100,  185 => 99,  167 => 86,  152 => 76,  135 => 64,  99 => 36,  90 => 30,  81 => 24,  53 => 10,  40 => 10,  27 => 9,  17 => 1,  142 => 56,  137 => 55,  134 => 54,  123 => 46,  120 => 54,  110 => 38,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 12,  60 => 9,  55 => 8,  52 => 7,  46 => 5,  41 => 8,  38 => 3,  30 => 2,);
    }
}
