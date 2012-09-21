<?php

/* WebIlluminationAdminBundle:Orders:listingSettings.html.twig */
class __TwigTemplate_398c48f9601e3832874da3a3726e56ce extends Twig_Template
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
\t\t<select id=\"form-sort-order\" class=\"fl\">
\t\t\t<option";
        // line 5
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "createdAt:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"createdAt:DESC\">Latest Orders</option>
\t\t\t<option";
        // line 6
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "id:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"id:DESC\">Order Number: Last Orders Placed First</option>
\t\t\t<option";
        // line 7
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "id:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"id:ASC\">Order Number: First Orders Placed First</option>
\t\t\t<option";
        // line 8
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "total:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"total:DESC\">Order Total: Highest First</option>
\t\t\t<option";
        // line 9
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "total:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"total:ASC\">Order Total: Lowest First</option>
\t\t\t<option";
        // line 10
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "firstName:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"firstName:ASC\">First Name: Alphabetically (A-Z)</option>
\t\t\t<option";
        // line 11
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "firstName:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"firstName:DESC\">First Name: Alphabetically (Z-A)</option>
\t\t\t<option";
        // line 12
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "firstName:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"firstName:ASC\">Last Name: Alphabetically (A-Z)</option>
\t\t\t<option";
        // line 13
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "lastName:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"lastName:DESC\">Last Name: Alphabetically (Z-A)</option>
\t\t\t<option";
        // line 14
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "emailAddress:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"emailAddress:ASC\">Email Address: Alphabetically (A-Z)</option>
\t\t\t<option";
        // line 15
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingSortOrder") == "emailAddress:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"emailAddress:DESC\">Email Address: Alphabetically (Z-A)</option>
\t\t</select>
\t</div>
    <div class=\"fr\">
    \t<div class=\"listing-settings-title fl\">Per Page</div>
        <select class=\"fl\" id=\"form-max-results\">
\t\t\t<option";
        // line 21
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingMaxResults") == "10")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"10\">10</option>
\t\t\t<option";
        // line 22
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingMaxResults") == "20")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"20\">20</option>
\t\t\t<option";
        // line 23
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingMaxResults") == "50")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"50\">50</option>
\t\t\t<option";
        // line 24
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingMaxResults") == "100")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"100\">100</option>
\t\t\t<option";
        // line 25
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "settings"), "admin"), "orders"), "listingMaxResults") == "99999999")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"99999999\">All</option>
\t\t</select>
\t\t<input type=\"hidden\" id=\"form-current-page\" value=\"1\" />
\t</div>
    <div class=\"clear\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingSettings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 25,  112 => 24,  106 => 23,  100 => 22,  94 => 21,  83 => 15,  77 => 14,  71 => 13,  53 => 10,  47 => 9,  41 => 8,  29 => 6,  23 => 5,  58 => 6,  50 => 5,  42 => 4,  34 => 3,  26 => 2,  69 => 24,  59 => 11,  55 => 16,  43 => 10,  39 => 9,  35 => 7,  31 => 7,  27 => 6,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
