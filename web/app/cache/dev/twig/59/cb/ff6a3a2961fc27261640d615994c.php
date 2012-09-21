<?php

/* WebIlluminationShopBundle:Content:installationGuides.html.twig */
class __TwigTemplate_59cbff6a3a2961fc27261640d615994c extends Twig_Template
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
        echo "Kitchen Appliance Centre Installation Guides | ";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/kitchen-being-fitted.png"), "html", null, true);
        echo "\" alt=\"A kitchen being fitted\" />
\t\t\t\t\t\t<h3 class=\"right\">Kitchen Appliance Centre Installation Guides</h3>
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
\t\t<h1>Installation Guides</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Kitchen Appliance Centre Installation Guides</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\"><strong>Welcome to the Kitchen Appliance Centre installation guide area.</strong></p>
\t\t\t\t\t\t<p class=\"no-margin-bottom\">We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t   \t<div class=\"grid_6 leading\">
            <div class=\"portlet\">
                <header>
                    <h2>Video Guides</h2>
                </header>
                <section>
                    <div class=\"sidebar-tabs\">
                        <ul>
                            <li id=\"tab-apollo-slab-tech\"><a href=\"#apollo-slab-tech\">Apollo Slab Tech</a></li>
                            <li id=\"tab-encore\"><a href=\"#encore\">Encore</a></li>
                            <li id=\"tab-ise\"><a href=\"#ise\">In-Sink-Erator (ISE)</a></li>
                            <li id=\"tab-maia\"><a href=\"#maia\">Maia</a></li>
                            <li id=\"tab-mistral\"><a href=\"#mistral\">Mistral</a></li>
                            <li id=\"tab-smartstone\"><a href=\"#smartstone\">Smartstone</a></li>
                            <li id=\"tab-smiths\"><a href=\"#smiths\">Smiths</a></li>
                        </ul>
                        <section id=\"apollo-slab-tech\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/apollo-slab-tech.jpg"), "html", null, true);
        echo "\" alt=\"Apollo Slab Tech\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Apollo Slab Tech Solid Surface Worktops.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Before you Start</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/87dLmqQaZsM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Tools Required</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/0-VOX_BT41w\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Planning and Design</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/XW0i7lNC6jM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Cutting to Size</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/b2pKxSBmhqM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Cutouts</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/WFO1wKE8gDU\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Upstands</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/6SR7ukHxFV4\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Undermounted Sinks</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/IyjqYtkOV70\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Tap Holes</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/HN47oRSm5J4\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Scribing Worktops</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/HWOjSPTX8Q8\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Edge Detail</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/ZjiGfOQopOQ\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Adding Curves</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/gWRkurPqjyA\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Preparing Joints</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/RATXYcDGUXc\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Bonding Joints</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/nmeoLrzxuCQ\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Finishing Joints</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/7TITBD3-gnY\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Health and Safety</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/cWpAjbb5szE\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Care and Maintenance</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/rKP_i_Z-SFs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"encore\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/encore.jpg"), "html", null, true);
        echo "\" alt=\"Encore\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Encore.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktop: Introduction</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/UdjPMuok9m4\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Before You Start</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/XpoHWViKipQ\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Cutting - Sizing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/pPm1Lx-O7F4\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Cutting - Mason's Mitre</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/zmiy23pZnWM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Cutting - Diagonal Mitre</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/U2K1RiNAckk\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Using Bolts and Biscuits</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/u81Tlatye7Y\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Sink and Hob Cut-outs</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/XK7ODi41mvY\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Undermounted Sinks</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/1SWV4vmsKek\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Sealing Cut Edges</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/k1M1LhR8_vs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Joining Encore</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/TQvtCECJQUA\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Finishing Encore</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/mBKYRXsYWe4\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Radius Ends</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/UMLKYbCnv3Y\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Slab Ends</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/jRePMbYGrvs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Sealant</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/JugsYbsCqJs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"ise\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/insinkerator.jpg"), "html", null, true);
        echo "\" alt=\"In-Sink-Erator\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for In-Sink Erator.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Steaming Hot Water Tap: Introduction</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/bQPRZLCx_II\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Steaming Hot Water Tap: Installation Guide</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/fBn6ZfSxgHg\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Food Waste Disposer: Introduction</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/CIQaIjFA-oM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Food Waste Disposer: Installation Guide</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/RATXYcDGUXc\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"maia\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/maia.jpg"), "html", null, true);
        echo "\" alt=\"Maia\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Maia Worktops.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Getting Started</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/Gekc96dZWow\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Gluing and Finishing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/9hcjOXrrhlI\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Edging</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/HuItfPDtjNM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Cutting for a Sink or Hob</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/C-CA-Wd67bM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Sink Module Installation</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/73i6efJhONs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Fitting Maia Accessories</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/ST7PzCuKcBY\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Care and Maintenance</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/Lhsjdr4OxJw\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"mistral\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/mistral.jpg"), "html", null, true);
        echo "\" alt=\"Mistral\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Mistral Solid Surface Worktops.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Introduction to Mistral</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/5ZlsY2iwg58\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Getting Started</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/lXMxSfy2N0Y\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Cutting</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/kdi_sysGIqk\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Routing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/0quHtYKoA7w\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Adhesive Set-up</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/YAqwp9jrj3o\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Jointing Preparation</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/-dD-l_foOhY\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Jointing Procedure</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/ehC9cCFIf3w\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Joint Smoothing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/NQSPOW2uLtc\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Shaping and Edging</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/pwerHtmqwsU\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Undermount Cut Outs</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/2b0cHo8m5V8\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Overmount Cut Out</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/yf5iJh0rkXM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Drainer Grooves</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/KZAJqcdGHyQ\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Finishing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/HJJ9omcFaVA\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Care and Maintenance</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/wAh6tbo-j6I\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"smartstone\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 312
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/smartstone.jpg"), "html", null, true);
        echo "\" alt=\"Smartstone\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Artis Smartstone.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Surfaces</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/9Qn_d9eFI8U\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Designing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/arb0euu0v6Q\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Smartstone Preparation</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/GCTw1Vov_dw\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Smartsone Installation</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/ge9iUjSAImg\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Measuring and Machining</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/yvAWB0t5fiI\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Inconspicuous Seams</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/MLzkfUlKjVM\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Hob and Sink Cut-outs</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/XJUIyKhYico\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Edging Smartstone</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/oxgCVSEZ350\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Finishing Smartstone</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/UjmM3Q1ZQ0k\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Vertical Surfacing</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/OKqpAgGkMSU\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video\">
                        \t\t<h4>Solid Surface Worktops: Repairing Smartstone</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/VV3sXTW_TcA\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"video no-margin-right\">
                        \t\t<h4>Solid Surface Worktops: Care and Maintenance</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/nlhj01cntSs\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                        <section id=\"smiths\" class=\"form ui-helper-hidden\">
                        \t<img class=\"fr border margin-left-15 margin-bottom-15\" src=\"";
        // line 367
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/logos/apollo-slab-tech.jpg"), "html", null, true);
        echo "\" alt=\"Apollo Slab Tech\" />
                        \t<p class=\"no-margin-top\"><strong>Welcome to our installation guide area for Smith's.</strong></p>
\t\t\t\t\t\t\t<p>We have put together an extensive video library to help you work with our products. As well as installation guides there are a number of videos that demonstrate in more detail the products and their uses and benefits.</p>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
                        \t<div class=\"video\">
                        \t\t<h4>Space Saver</h4>
                        \t\t<iframe width=\"340\" height=\"203\" src=\"https://www.youtube.com/embed/cftstZ3J2tQ\" frameborder=\"0\" allowfullscreen></iframe>
                        \t</div>
                        \t<div class=\"clear\"></div>
                        </section>
                    </div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"clear\"></div>
\t</section>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Content:installationGuides.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  435 => 367,  377 => 312,  311 => 249,  273 => 214,  247 => 191,  181 => 128,  107 => 57,  70 => 22,  67 => 21,  55 => 13,  48 => 8,  45 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
