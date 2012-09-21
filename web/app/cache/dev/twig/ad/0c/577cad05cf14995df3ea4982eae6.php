<?php

/* WebIlluminationShopBundle:Products:price.html.twig */
class __TwigTemplate_ad0c577cad05cf14995df3ea4982eae6 extends Twig_Template
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
        echo "<p class=\"ar product-code\">";
        ob_start();
        // line 2
        echo "\t";
        if (($this->getContext($context, "url") != "")) {
            // line 3
            echo "\t\t<a itemprop=\"model\" class=\"ellipsis\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getContext($context, "url"))), "html", null, true);
            echo "\">
\t";
        }
        // line 5
        echo "\tCode: <strong>";
        echo twig_escape_filter($this->env, $this->getContext($context, "productCode"), "html", null, true);
        echo "</strong>
\t";
        // line 6
        if (($this->getContext($context, "url") != "")) {
            // line 7
            echo "\t\t</a>
\t";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 9
        echo "</p>
<div itemprop=\"offers\" itemscope itemtype=\"http://schema.org/Offer\">
\t<p class=\"ar product-was-price\">";
        // line 11
        ob_start();
        // line 12
        echo "\t\t";
        if ((($this->getContext($context, "recommendedRetailPrice") > $this->getContext($context, "listPrice")) && ($this->getContext($context, "hidePrice") == 0))) {
            // line 13
            echo "\t\t\tRRP&nbsp;<span>&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getContext($context, "recommendedRetailPrice"), 2), "html", null, true);
            echo "</span>
\t\t\t";
            // line 14
            if (($this->getContext($context, "savings") > 0)) {
                // line 15
                echo "\t\t\t\t&nbsp;save &pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getContext($context, "savings"), 2), "html", null, true);
                echo "
\t\t\t";
            }
            // line 17
            echo "\t\t";
        } else {
            // line 18
            echo "\t\t\t&nbsp;
\t\t";
        }
        // line 20
        echo "\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</p>
\t<p class=\"ar product-price\">";
        // line 21
        ob_start();
        // line 22
        echo "\t\t";
        if (($this->getContext($context, "hidePrice") == 0)) {
            // line 23
            echo "\t\t\t";
            if (($this->getContext($context, "url") != "")) {
                // line 24
                echo "\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getContext($context, "url"))), "html", null, true);
                echo "\">
\t\t\t";
            }
            // line 26
            echo "\t\t\t<span itemprop=\"price\">&pound;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getContext($context, "listPrice"), 2), "html", null, true);
            echo "</span>
\t\t\t";
            // line 27
            if (($this->getContext($context, "url") != "")) {
                // line 28
                echo "\t\t\t\t</a>
\t\t\t";
            }
            // line 30
            echo "\t\t\t<span class=\"product-tax\"> (inc. VAT)</span>
\t\t";
        } else {
            // line 32
            echo "\t\t\t<a itemprop=\"price\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
            echo "\">CONTACT US</a>
\t\t";
        }
        // line 34
        echo "\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</p>
\t";
        // line 42
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 42,  110 => 34,  104 => 32,  100 => 30,  96 => 28,  94 => 27,  89 => 26,  83 => 24,  80 => 23,  77 => 22,  75 => 21,  70 => 20,  66 => 18,  63 => 17,  57 => 15,  55 => 14,  50 => 13,  47 => 12,  45 => 11,  41 => 9,  36 => 7,  34 => 6,  29 => 5,  23 => 3,  20 => 2,  46 => 8,  44 => 7,  30 => 3,  24 => 2,  56 => 6,  49 => 9,  35 => 5,  17 => 1,);
    }
}
