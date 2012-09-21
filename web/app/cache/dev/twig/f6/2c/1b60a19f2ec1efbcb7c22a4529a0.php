<?php

/* WebIlluminationShopBundle:Content:theShop.html.twig */
class __TwigTemplate_f62c1b60a19f2ec1efbcb7c22a4529a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metatags' => array($this, 'block_metatags'),
            'slider' => array($this, 'block_slider'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "Visit the Kitchen Appliance Centre Showroom Based in Nottingham | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"If you need any help or advice on kitchen appliances or just want a look around please visit us in our showroom in Nottingham.\">
\t<meta name=\"keywords\" content=\"kitchen appliance centre, nottingham, kitchen appliances, hobs, ovens, worktops, charcoal filters\">
";
    }

    // line 7
    public function block_slider($context, array $blocks = array())
    {
        // line 8
        echo "\t<div class=\"container_8 clearfix\">
\t\t<header>
\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t<img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/the-kitchen-appliance-centre-showroom.jpg"), "html", null, true);
        echo "\" alt=\"The Kitchen Appliance Centre Showroom\" />
\t\t\t\t\t\t<h3 class=\"right\">Come and See Us</h3>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</header>
\t</div>
";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        echo "\t<header>
\t\t<h1>Visit the Kitchen Appliance Centre Showroom Based in Nottingham</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_4\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Welcome to the Kitchen Appliance Centre Showroom</h2>
\t            </header>
\t\t\t\t<section id=\"the-showroom-welcome\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\">If you need any help or advice or just want a look around please visit us in our showroom in Nottingham.</p>
\t\t\t\t\t\t<p>Onefit Kitchen Appliance Centre began in the 1990's providing a fast, efficient and reliable Kitchen fitting service to the public. The Company soon became well established and achieved a major contract with Ikea Nottingham which took the business even further forward.</p>
\t\t\t\t\t\t<p>When fitting kichens, we found that customers appliance orders were not being delivered on time for the kitchen, which in turn had a knock on effect for both the customers and fitters, who then had to return again to complete their work causing unnecessary inconvenience for all concerned.</p>
\t\t\t\t\t\t<p>We realised this problem could be easily solved by supplying all the appliances directly at discounted prices. After this came a small showroom in Denby Derbyshire along with a small home made website.  Kitchen Appliance Centre was formed supplying both the trade and general public.</p>
\t\t\t\t\t\t<p>We very quickly outgrew the Denby premises and in May 2003 moved to larger Premises with better warehousing facilities, ideally situated near Ikea Nottingham, making us more readily accessable to a wider catchment area. In 2005 we turned our head more towards the internet and concentrated on offering Appliances, Sinks, Taps and Worktops to the whole of the UK.</p>
\t\t\t\t\t\t<p>Once we realised our potential on the net we developed our site massively, closely monitoring feedback from customers to make our site what it is today. We have highly knowledgeable, customer friendly staff that are here to offer help to all customers to make sure they make the correct choice in appliances. Our prices are regularly checked to keep us competitive with appliance sales online.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"grid_2\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Opening Hours</h2>
\t            </header>
\t\t\t\t<section id=\"the-showroom-opening-hours\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<dl>
\t\t\t\t\t\t\t<dt>Monday:</dt>
\t\t\t\t\t\t\t\t<dd>9:00am - 5:00pm</dd>
\t\t\t\t\t\t\t<dt>Tuesday:</dt>
\t\t\t\t\t\t\t\t<dd>9:00am - 5:00pm</dd>
\t\t\t\t\t\t\t<dt>Wednesday:</dt>
\t\t\t\t\t\t\t\t<dd>9:00am - 5:00pm</dd>
\t\t\t\t\t\t\t<dt>Thursday:</dt>
\t\t\t\t\t\t\t\t<dd>9:00am - 5:00pm</dd>
\t\t\t\t\t\t\t<dt>Friday:</dt>
\t\t\t\t\t\t\t\t<dd>9:00am - 5:00pm</dd>
\t\t\t\t\t\t\t<dt>Saturday:</dt>
\t\t\t\t\t\t\t\t<dd>Closed</dd>
\t\t\t\t\t\t\t<dt>Sunday:</dt>
\t\t\t\t\t\t\t\t<dd>Closed</dd>
\t\t\t\t\t\t\t<dt>Bank Holidays:</dt>
\t\t\t\t\t\t\t\t<dd>Closed</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t<p class=\"ac no-margin-bottom\"><a href=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_how_to_find_us"), "html", null, true);
        echo "\">Click here</a> for directions.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 77
    public function block_javascripts($context, array $blocks = array())
    {
        // line 78
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t\$(\"#the-showroom-opening-hours\").height(\$(\"#the-showroom-welcome\").height());
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Content:theShop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 78,  132 => 77,  120 => 69,  71 => 22,  68 => 21,  56 => 13,  49 => 8,  46 => 7,  40 => 4,  37 => 3,  30 => 2,);
    }
}
