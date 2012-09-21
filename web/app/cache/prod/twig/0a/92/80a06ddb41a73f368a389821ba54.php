<?php

/* TwigBundle:Exception:error.html.twig */
class __TwigTemplate_0a9280a06ddb41a73f368a389821ba54 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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
        echo "An Error Occurred! | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<header>
\t\t<h1>Whoops looks like we have a problem!</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>An Error Occurred!</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<img width=\"906\" class=\"border\" height=\"305\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/page-not-found.jpg"), "html", null, true);
        echo "\" alt=\"404 - Page can not be found!\" />
\t\t\t\t\t<h3>Wait, why am I here?</h3>
\t\t\t\t\t<p>Welcome to our error page. You are here because there was a problem loading the page you have requested.</p>
\t\t\t\t\t<p>We have been made aware of this and will be looking into this as soon as possible.</p>
\t\t\t\t\t<p>In the mean time you could&hellip;</p>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>Try contacting us for any advice or support. <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">Click here</a> to find out how to contact us.</a></li>
\t\t\t\t\t\t<li>Try searching for what you were looking for using our search box above.</li>
\t\t\t\t\t\t<li>Try looking through one of our departments using the menu above.</li>
\t\t\t\t\t</ul>
\t            </section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 15,  25 => 4,  92 => 39,  86 => 6,  79 => 40,  46 => 14,  37 => 4,  33 => 5,  27 => 2,  82 => 19,  72 => 16,  64 => 15,  53 => 13,  49 => 9,  44 => 8,  42 => 7,  34 => 3,  29 => 4,  23 => 3,  19 => 2,  40 => 6,  20 => 2,  30 => 4,  26 => 3,  22 => 4,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  131 => 48,  126 => 46,  120 => 45,  117 => 44,  103 => 36,  99 => 34,  77 => 39,  74 => 27,  57 => 22,  47 => 19,  39 => 9,  32 => 11,  24 => 3,  17 => 1,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 43,  108 => 40,  104 => 38,  102 => 37,  94 => 31,  89 => 20,  87 => 28,  84 => 27,  81 => 26,  73 => 21,  70 => 26,  67 => 19,  62 => 24,  59 => 21,  55 => 14,  51 => 11,  48 => 10,  41 => 7,  38 => 8,  35 => 7,  31 => 6,  28 => 3,);
    }
}
