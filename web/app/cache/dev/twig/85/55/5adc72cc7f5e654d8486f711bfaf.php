<?php

/* WebIlluminationShopBundle:Content:delivery.html.twig */
class __TwigTemplate_85555adc72cc7f5e654d8486f711bfaf extends Twig_Template
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
        echo "Delivery Costs and Delivery Times | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"Free UK delivery on all orders where you spend over £500. Delivery times: 1-5 working days.\">
\t<meta name=\"keywords\" content=\"kitchen appliance centre, free uk delivery, uk mainland, ireland, kitchen appliances, delivery, quick delivery\">
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/quick-delivery.jpg"), "html", null, true);
        echo "\" alt=\"Quick Delivery\" />
\t\t\t\t\t\t<h3 class=\"right\">Quick Delivery</h3>
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
\t\t<h1>Your Delivery from Kitchen Appliance Centre</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_4\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Delivery Information</h2>
\t            </header>
\t\t\t\t<section id=\"delivery-delivery-information\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<h5>How long will my delivery take?</h5>
\t\t\t\t\t\t<p><strong>SMALL ITEMS</strong><br />Approximately <strong>1-5 working days</strong> subject to availability on smaller items that can be easily sent by parcel service,  many items can be sent on a Next Day Service. Small items include products like:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Plinth Heaters</li>
\t\t\t\t\t\t\t<li>Taps</li>
\t\t\t\t\t\t\t<li>Ducting</li>
\t\t\t\t\t\t\t<li>Splash Backs</li>
\t\t\t\t\t\t\t<li>Hobs</li>
\t\t\t\t\t\t\t<li>Stainless Steel Sinks</li>
\t\t\t\t\t\t\t<li>Most Cooker Hoods</li>
\t\t\t\t\t\t\t<li>(Excludes Granite and Ceramic Sinks)</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<p><strong>LARGE ITEMS (by pallet service)</strong><br />Approximately <strong>2-7 working days</strong>. We can sometimes deliver much quicker if you are happy to have your goods delivered by pallet service. This is a doorstep delivery service only. The driver will NOT take goods into the property. (This service is subject to lorry access and excludes Worktops and American Fridges due to size.)
\t\t\t\t\t\t<p><strong>LARGE ITEMS (by home delivery service)</strong><br />If your order includes any large items, we will always quote approximately 5-12 working days as standard. However, we always aim to deliver as soon as possible. Large items include products like:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Worktops</li>
\t\t\t\t\t\t\t<li>Ovens</li>
\t\t\t\t\t\t\t<li>Washers</li>
\t\t\t\t\t\t\t<li>Fridges</li>
\t\t\t\t\t\t\t<li>Granite Sinks and Ceramic Pot Sinks</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Do I have to pay delivery per item?</h5>
\t\t\t\t\t\t<p><strong>No</strong><br />You only pay per delivery, NOT per item!</p>
\t\t\t\t\t\t<h5>How much will delivery cost?</h5>
\t\t\t\t\t\t<p><strong>FREE on orders when you spend £500 or more!</strong><br />(To selected areas.)</p>
\t\t\t\t\t\t<p>If you live in the green zone displayed on the map below then you are entitled to free delivery when you spend £500 or more. (Excludes Worktops and American Fridges.)</p>
\t\t\t\t\t\t<p class=\"ac\"><img width=\"350\" height=\"400\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/uk-delivery-map.jpg"), "html", null, true);
        echo "\" alt=\"UK Delivery Map\" /></p>
\t\t\t\t\t\t<p>If your order is less than £500 or you live outside the green zone then the following charges will apply:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Most areas £1.99 - £29.00 depending on the size of the item.</li>
\t\t\t\t\t\t\t<li>Some postcode areas are charged higher than this. To find out the exact cost to your area just enter your delivery postcode in the post code checker within the basket area, or <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">contact us</a>.</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Do you deliver anywhere?</h5>
\t\t\t\t\t\t<p>We deliver most items anywhere within the UK including Scottish Highlands, North and South Ireland and Channel islands. (Some areas exclude Worktops and American Fridges.)</p>
\t\t\t\t\t\t<h5>Can you deliver to a different address?</h5>
\t\t\t\t\t\t<p>Yes we can but you will need to put your order through online for fraud security reasons.</p>
\t\t\t\t\t\t<h5>How do you deliver large/heavy items?</h5>
\t\t\t\t\t\t<p>We normally like to do most areas by home delivery using a two man delivery service. This way goods are handled correctly and taken into your property.</p>
\t\t\t\t\t\t<p>We also deliver by pallet service which is often much quicker, however this is a door step delivery only. (They will NOT take goods into the property.)</p>
\t\t\t\t\t\t<p><strong>Special Note</strong><br />Some parts of Scotland, Ireland and Channel islands are pallet service only.</p>\t\t\t\t\t\t
\t\t\t\t\t\t<h5>Can I track my online order?</h5>
\t\t\t\t\t\t<p><strong>Yes</strong><br />Orders placed online can be easily tracked via our website.</p>
\t\t\t\t\t\t<h5>Why don't you do FREE delivery on all items like some companies?</h5>
\t\t\t\t\t\t<p>Although we do offer free delivery we can only offer it on delivery to selected areas when you spend over £500. Please don’t be fooled by free delivery offered by some of our competitors! You will often find the more products you add into your basket the overall price becomes lower compared to our competitors.</p>
\t\t\t\t\t\t<h5>Please Help Us!</h5>
\t\t\t\t\t\t<p>Let us know if delivery access is restricted.</p>
\t\t\t\t\t\t<p>Restricted access includes:</p>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li>Parking permits</li>
\t\t\t\t\t\t\t<li>Yellow lines</li>
\t\t\t\t\t\t\t<li>Bus routes</li>
\t\t\t\t\t\t\t<li>Low bridges</li>
\t\t\t\t\t\t\t<li>Width restricted roads</li>
\t\t\t\t\t\t\t<li>Upper floor with no lift</li>
\t\t\t\t\t\t\t<li>Steps</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<h5>Other Information</h5>
\t\t\t\t\t\t<p><strong>Please Note</strong><br />The delivery charges stated cover ground floor only. If you have any special requests for delivery, (for example you live in a flat) please make us aware of this at time of purchase and we shall endeavour to arrange special delivery for you. This may come with an additional charge. Please <a href=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
        echo "\">contact us</a> for further information.</p>
\t\t\t\t\t\t<p><strong>Please Note</strong><br />Please note: We strongly recommend that you do not book fitters for your Appliances/Worktops until you have received and inspected your goods as delays/undeliverable items caused by a third party will not be compensated.</p>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t\t<div class=\"grid_2\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Estimated Delivery</h2>
\t            </header>
\t\t\t\t<section id=\"delivery-estimated-delivery\">
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\">If you were to place an order with us now you would receive your items between the following dates:</p>
\t\t\t\t\t\t<p class=\"delivery-time\"><strong>";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "estimatedDeliveryDateRange"), "start"), "html", null, true);
        echo "</strong></p>
\t\t\t\t\t\t<p class=\"delivery-time\">-</p>
\t\t\t\t\t\t<p class=\"delivery-time\"><strong>";
        // line 106
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "estimatedDeliveryDateRange"), "end"), "html", null, true);
        echo "</strong></p>
\t\t\t\t\t\t<p class=\"ac small-info\">Any estimated delivery times are subject to availabilty.</p>
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
        return "WebIlluminationShopBundle:Content:delivery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 106,  163 => 104,  146 => 90,  116 => 63,  109 => 59,  70 => 22,  67 => 21,  55 => 13,  48 => 8,  45 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
