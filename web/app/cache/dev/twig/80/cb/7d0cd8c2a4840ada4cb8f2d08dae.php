<?php

/* WebIlluminationShopBundle:Content:waterPressureInformation.html.twig */
class __TwigTemplate_80cb7d0cd8c2a4840ada4cb8f2d08dae extends Twig_Template
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
        echo "What is my water pressure? | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.\">
\t<meta name=\"keywords\" content=\"kitchen appliance centre, video, products, demonstration, demo, guide, installation guide\">
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/water-pressure-guage.png"), "html", null, true);
        echo "\" alt=\"A water pressure guage\" />
\t\t\t\t\t\t<h3 class=\"right\">What is my water pressure?</h3>
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
\t\t<h1>Water Pressure</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>What is my water pressure?</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<img class=\"fr margin-left-20 margin-bottom-20\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/water-pressure-diagram.png"), "html", null, true);
        echo "\" alt=\"Water pressure diagram\" />
\t\t\t\t\t\t<p class=\"no-margin-top\">The amount of water available to the tap is important when choosing which product to buy. The cold water supply is at mains pressure so is generally not of importance; the tap however will require the correct amount of hot water pressure to perform satisfactorily. Water pressure can be measured in three common units, bar, psi and Head (m). 1 bar = 10 metres Head = 14.5 psi.</p>
\t\t\t\t\t\t<h5>Hot Water Pressure</h5>
\t\t\t\t\t\t<p>Domestic hot water systems generally fall into two categories pressurised and un-pressurised. Pressurised water heaters (instantaneous gas water heaters or modern combination boilers) deliver a continuous large volume of hot water. For Combination boilers or instantaneous water heating systems the boiler output is typically around 20 psi = 1.8 bar = 18m head. This means most taps should give good flow rates with these types of system.</p>
\t\t\t\t\t\t<p>Un-pressurised water heating systems found in older houses generally have a cold water storage tank in the loft and a heater tank on the first floor. The vertical distance between the header tank and the tap outlet gives an approximate calculation of the available hot water pressure. In general terms most single storey houses or bungalows with un-pressurised systems do not suit \"high\" pressure taps such as single lever mixers for example.</p>
\t\t\t\t\t\t<p>For this reason abode's range includes several \"low\" pressure mixertaps. Alternatively a booster pump can be fitted to increase the available water pressure, allowing a wider choice of models.</p>
\t\t\t\t\t\t<h5>Cold Water Pressure</h5>
\t\t\t\t\t\t<p>Cold water pressure is rarely an issue as it is normally provided from the municipal high pressure supply.</p>
\t\t\t\t\t\t<p>If you live in on the higher floors of a tall building or draw your cold water from a private supply you should check the available cold water pressure. Use the stated minimum water pressure in these cases for both the hot and cold supplies.</p>
\t\t\t\t\t\t<p class=\"no-margin-bottom\">The diagram shows a simplified un-pressurised system, for example if the vertical distance was 5m this would roughly equate to 0.5 bar maximum available pressure. Note: if the route the pipes take is not direct, has lots of bends or long horizontal runs the available water pressure will be reduced.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Content:waterPressureInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 33,  70 => 22,  67 => 21,  55 => 13,  48 => 8,  45 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
