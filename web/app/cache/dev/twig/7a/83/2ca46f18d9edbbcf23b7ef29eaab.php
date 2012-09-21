<?php

/* WebIlluminationShopBundle:Content:termsAndConditions.html.twig */
class __TwigTemplate_7a832ca46f18d9edbbcf23b7ef29eaab extends Twig_Template
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
        echo "Kitchen Appliance Centre Terms and Conditions | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<header>
\t\t<h1>The Small Print</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Kitchen Appliance Centre Terms and Conditions</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<p class=\"no-margin-top\">Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privacy_policy"), "html", null, true);
        echo "\">privacy policy</a> govern Kitchen Appliance Centre's relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.</p>
\t\t\t\t\t\t<p>The term 'Kitchen Appliance Centre' or 'us' or 'we' refers to the owner of the website whose registered office is Kitchen Appliance Centre, Unit 3 Pentrich Road, Giltbrook Industrial Park, Giltbrook, Nottingham, NG16 2UZ. Kitchen Appliance Centre is a trading company of Onefit Ltd. Our company registration number is 4605369. The term 'you' refers to the user or viewer of our website.</p>
\t\t\t\t\t\t<p>The use of this website is subject to the following terms of use:</p>
\t\t\t\t\t\t<ul class=\"no-margin-bottom\">
\t\t\t\t\t\t\t<li>The content of the pages of this website is for your general information and use only. It is subject to change without notice.
    \t\t\t\t\t\t<li>This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties (see our <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privacy_policy"), "html", null, true);
        echo "\">privacy policy</a> for more information).</li>
    \t\t\t\t\t\t<li>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</li>
    \t\t\t\t\t\t<li>Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</li>
    \t\t\t\t\t\t<li>This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</li>
    \t\t\t\t\t\t<li>All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.</li>
    \t\t\t\t\t\t<li>Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</li>
    \t\t\t\t\t\t<li>From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</li>
    \t\t\t\t\t\t<li>Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.</li>
\t\t\t\t\t\t</ul>
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
        return "WebIlluminationShopBundle:Content:termsAndConditions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 20,  50 => 15,  37 => 4,  34 => 3,  27 => 2,);
    }
}
