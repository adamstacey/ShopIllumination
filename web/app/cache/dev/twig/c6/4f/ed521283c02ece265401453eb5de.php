<?php

/* ::shop.html.twig */
class __TwigTemplate_c64fed521283c02ece265401453eb5de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metatags' => array($this, 'block_metatags'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'headerscripts' => array($this, 'block_headerscripts'),
            'slider' => array($this, 'block_slider'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
    \t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" >
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=Edge\">
\t\t<meta name=\"google-site-verification\" content=\"pIj6BxDZZICPTWekMPyzcGkNY-9rZUTydD5x9bf69dE\" />
\t\t<meta name=\"google-site-verification\" content=\"2OcwHkbOALlBy17M8hxLUwo3C87YtL9YTGgESix37nk\" />
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 9
        $this->displayBlock('metatags', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 47
        echo "        ";
        $this->displayBlock('headerscripts', $context, $blocks);
        // line 76
        echo "        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"apple-touch-icon\" href=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("apple-touch-icon.png"), "html", null, true);
        echo "\">
        ";
        // line 78
        $this->env->loadTemplate("::shopTracking.html.twig")->display($context);
        // line 79
        echo "    </head>
    <body>
    \t<div id=\"exposeMask\"></div>
    \t<div id=\"wrapper\" class=\"clearfix\">
\t\t\t";
        // line 83
        $this->env->loadTemplate("::shopHeader.html.twig")->display($context);
        // line 84
        echo "\t\t\t<section>
\t\t\t\t";
        // line 85
        $this->displayBlock('slider', $context, $blocks);
        // line 86
        echo "\t            <div class=\"container_8 clearfix\">                
\t                <section class=\"main-section grid_8\">
\t                    <div class=\"main-content\">
\t                    \t<div id=\"search-container\" class=\"container_8 clearfix ui-helper-hidden\">                
\t\t                    \t<header>
\t\t                    \t\t<button class=\"button ui-button action-cancel-search ui-button-red fr\" data-icon-primary=\"ui-icon-closethick\">Close</button>
\t\t\t\t\t\t\t\t\t<h1 id=\"search-results-title\">Search Results</h1>
\t\t\t\t\t\t\t\t</header>
\t\t\t\t\t\t\t\t<section class=\"container_6 clearfix\">
\t\t\t\t\t\t\t\t\t<div class=\"grid_6\"> 
\t\t\t\t\t\t\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t\t\t\t\t\t\t<section class=\"no-padding-bottom no-padding-right\">
\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"search-results\"></div>
\t\t\t\t\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t\t\t        </div>
\t\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t   \t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</section>
\t\t\t\t            </div>
\t                    \t";
        // line 105
        $this->displayBlock('header', $context, $blocks);
        // line 106
        echo "    \t                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 107
        echo "        \t            </div>
            \t    </section>
\t            </div>
\t        </section>
\t\t</div>
\t\t<div id=\"dialog-image-popup\" title=\"Detailed View\" class=\"ui-helper-hidden\">
\t\t\t<div class=\"ac\">
\t\t\t\t<img id=\"dialog-image-popup-image\" src=\"/\" border=\"0\" alt=\"\" />
\t\t\t</div>
\t\t</div>
        ";
        // line 117
        $this->env->loadTemplate("::shopFooter.html.twig")->display($context);
        // line 118
        echo "        ";
        $this->env->loadTemplate("::shopFlashMessages.html.twig")->display($context);
        // line 119
        echo "        ";
        $this->env->loadTemplate("::shopAjaxLoading.html.twig")->display($context);
        // line 120
        echo "        ";
        $this->env->loadTemplate("::shopLargeImage.html.twig")->display($context);
        // line 121
        echo "        ";
        $this->env->loadTemplate("::shopShoppingBasketPopup.html.twig")->display($context);
        // line 122
        echo "        ";
        $this->env->loadTemplate("::shopCookiePolicy.html.twig")->display($context);
        // line 123
        echo "  \t\t";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 124
        echo "\t\t";
        $this->env->loadTemplate("::shopScript.js.twig")->display($context);
        // line 125
        echo "    </body>
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Kitchen Appliance Centre";
    }

    // line 9
    public function block_metatags($context, array $blocks = array())
    {
        // line 10
        echo "        \t<meta name=\"description\" content=\"Kitchen Appliance Centre - A wide selection of kitchen appliances including Kitchen Sinks, Range Cookers, Fridges, Freezers, Dishwashers, Washing Machines, Worktops, Ovens and Hobs, all at low affordable prices.\">
        \t<meta name=\"keywords\" content=\"worktops, charcoal filters, cooker hoods, built-in microwaves, integrated dishwashers, integrated washing machines, refrigeration, cleaning products, glass splashbacks, waste disposer, sinks, taps, plinth heaters, range cookers, ducting, hobs, ovens, coffee machines, solid surface worktops, kitchen appliances\">
        ";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "\t        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9ea80d5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_reset_1.css");
            // line 24
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_grid_2.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_ui_3.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_portlet_4.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_uniform_5.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_slider_6.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_form_7.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "9ea80d5_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed_styles_8.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
        } else {
            // asset "9ea80d5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9ea80d5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-compressed.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
        }
        unset($context["asset_url"]);
        // line 26
        echo "\t\t\t<!--[if IE]>
\t\t\t\t";
        // line 27
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "c2f445b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c2f445b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/ie_ie_1.css");
            // line 28
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "c2f445b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_c2f445b") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/ie.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 29
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if gte IE 9]>
\t\t\t\t";
        // line 32
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5c1358b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5c1358b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie9_ie9_1.css");
            // line 33
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "5c1358b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5c1358b") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie9.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 34
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if IE 8]>
\t\t\t\t";
        // line 37
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "03fd00a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_03fd00a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie8_ie8_1.css");
            // line 38
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "03fd00a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_03fd00a") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie8.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 39
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if IE 7]>
\t\t\t\t";
        // line 42
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "fd87c9d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fd87c9d_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie7_ie7_1.css");
            // line 43
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "fd87c9d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_fd87c9d") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie7.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 44
        echo " 
\t\t\t<![endif]-->
\t\t";
    }

    // line 47
    public function block_headerscripts($context, array $blocks = array())
    {
        // line 48
        echo "\t\t\t<!--[if lt IE 9]>
\t\t\t\t";
        // line 49
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "2726b65_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2726b65_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-html5_html5_1.js");
            // line 50
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "2726b65"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2726b65") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-html5.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 51
        echo " 
\t\t\t<![endif]-->
        \t";
        // line 53
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e42e45f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_jquery_1.js");
            // line 63
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_ui_2.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_tools_3.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_overlay_4.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_uniform_5.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_slider_6.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_cookies_7.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "e42e45f_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed_global_8.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
        } else {
            // asset "e42e45f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e42e45f") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-compressed.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
        }
        unset($context["asset_url"]);
        // line 65
        echo "\t\t\t<!--[if lt IE 9]>
\t\t\t\t";
        // line 66
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f6b7c6e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f6b7c6e_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-selectivizr_selectivizr_1.js");
            // line 67
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "f6b7c6e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f6b7c6e") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-selectivizr.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 68
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if lt IE 8]>
\t\t\t\t";
        // line 71
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "5a0363a_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5a0363a_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-ie_ie_1.js");
            // line 72
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "5a0363a"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_5a0363a") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/shop-ie.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 73
        echo " 
\t\t\t<![endif]-->
\t\t";
    }

    // line 85
    public function block_slider($context, array $blocks = array())
    {
    }

    // line 105
    public function block_header($context, array $blocks = array())
    {
    }

    // line 106
    public function block_body($context, array $blocks = array())
    {
    }

    // line 123
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 24,  154 => 14,  151 => 13,  145 => 10,  142 => 9,  136 => 8,  131 => 125,  128 => 124,  122 => 122,  119 => 121,  108 => 117,  93 => 106,  91 => 105,  70 => 86,  65 => 84,  63 => 83,  57 => 79,  55 => 78,  51 => 77,  43 => 47,  40 => 13,  38 => 9,  34 => 8,  25 => 1,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 92,  129 => 89,  125 => 123,  116 => 120,  113 => 119,  110 => 118,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 85,  60 => 15,  54 => 12,  46 => 76,  39 => 4,  36 => 3,  29 => 2,);
    }
}
