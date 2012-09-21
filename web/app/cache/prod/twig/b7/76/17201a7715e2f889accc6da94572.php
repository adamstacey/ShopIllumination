<?php

/* TwigBundle:Exception:error404.html.twig */
class __TwigTemplate_b77617201a7715e2f889accc6da94572 extends Twig_Template
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
        echo "404 - Page can not be found! | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<header>
\t\t<h1>Whoops looks like we lost one!</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>404 - Page can not be found!</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<img width=\"906\" class=\"border\" height=\"305\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/page-not-found.jpg"), "html", null, true);
        echo "\" alt=\"404 - Page can not be found!\" />
\t\t\t\t\t<h3>Wait, why am I here?</h3>
\t\t\t\t\t<p>Welcome to our 404 page. You are here because the page you have requested doesn't exist, at least not at this location.</p>
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
        return "TwigBundle:Exception:error404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  50 => 15,  37 => 4,  34 => 3,  27 => 2,);
    }
}
