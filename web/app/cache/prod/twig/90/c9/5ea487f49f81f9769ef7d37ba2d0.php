<?php

/* ::admin.html.twig */
class __TwigTemplate_90c95ea487f49f81f9769ef7d37ba2d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'headerscripts' => array($this, 'block_headerscripts'),
            'leftmenu' => array($this, 'block_leftmenu'),
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
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 41
        echo "\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js\" type=\"text/javascript\"></script>
        <script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js\" type=\"text/javascript\"></script>
\t\t";
        // line 43
        $this->displayBlock('headerscripts', $context, $blocks);
        // line 73
        echo "        <link rel=\"shortcut icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
    \t<div id=\"exposeMask\"></div>
    \t<div id=\"wrapper\" class=\"clearfix\">
\t\t\t";
        // line 78
        $this->env->loadTemplate("::adminHeader.html.twig")->display($context);
        // line 79
        echo "\t\t\t";
        $this->env->loadTemplate("::adminFlashMessages.html.twig")->display($context);
        // line 80
        echo "        \t<section>
\t            <div class=\"container_8 clearfix\">                
\t                <section class=\"main-section grid_8\">
\t\t                ";
        // line 83
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 84
            echo "\t    \t                <nav class=\"collapsed\">
\t        \t                <a class=\"chevron\" href=\"#\">&raquo;</a>
\t            \t            <ul>
\t            \t            \t";
            // line 87
            $this->displayBlock('leftmenu', $context, $blocks);
            // line 90
            echo "\t            \t            </ul>
\t                \t    </nav>
\t                \t";
        }
        // line 93
        echo "\t                    <div class=\"main-content\">
\t                    \t<header>
\t                    \t\t";
        // line 95
        $this->displayBlock('header', $context, $blocks);
        // line 96
        echo "\t                    \t</header>
    \t                    ";
        // line 97
        $this->displayBlock('body', $context, $blocks);
        // line 98
        echo "        \t            </div>
            \t    </section>
\t            </div>
\t        </section>
\t\t</div>
\t\t";
        // line 103
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 104
            echo "\t\t\t<div id=\"dialog-image-popup\" title=\"Detailed View\" class=\"ui-helper-hidden\">
\t\t\t\t<div class=\"ac\">
\t\t\t\t\t<img id=\"dialog-image-popup-image\" src=\"";
            // line 106
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/images/product/product/no-image-large.jpg"), "html", null, true);
            echo "\" border=\"0\" alt=\"\" />
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 110
        echo "        ";
        $this->env->loadTemplate("::adminFooter.html.twig")->display($context);
        // line 111
        echo "        ";
        $this->env->loadTemplate("::adminAjaxLoading.html.twig")->display($context);
        // line 112
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 113
        echo "        ";
        $this->env->loadTemplate("::adminScript.js.twig")->display($context);
        // line 114
        echo "    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Kitchen Appliance Centre";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "\t        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3b07914_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_0") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_reset_1.css");
            // line 18
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_1") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_grid_2.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_2") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_slider-navigation_3.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_3") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_ui_4.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_4") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_portlet_5.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_5") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_uniform_6.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_6") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_form_7.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_7") : $this->env->getExtension('assets')->getAssetUrl("css/compressed_styles_8.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
        } else {
            // asset "3b07914"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914") : $this->env->getExtension('assets')->getAssetUrl("css/compressed.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
        }
        unset($context["asset_url"]);
        // line 20
        echo "\t\t\t<!--[if IE]>
\t\t\t\t";
        // line 21
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "1f33139_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1f33139_0") : $this->env->getExtension('assets')->getAssetUrl("css/ie_ie_1.css");
            // line 22
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "1f33139"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1f33139") : $this->env->getExtension('assets')->getAssetUrl("css/ie.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 23
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if gte IE 9]>
\t\t\t\t";
        // line 26
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "536f917_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_536f917_0") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie9_ie9_1.css");
            // line 27
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "536f917"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_536f917") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie9.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 28
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if IE 8]>
\t\t\t\t";
        // line 31
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "b9a87fc_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b9a87fc_0") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie8_ie8_1.css");
            // line 32
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "b9a87fc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b9a87fc") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie8.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 33
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if IE 7]>
\t\t\t\t";
        // line 36
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ef4418d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef4418d_0") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie7_ie7_1.css");
            // line 37
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "ef4418d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef4418d") : $this->env->getExtension('assets')->getAssetUrl("css/shop-ie7.css");
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 38
        echo " 
\t\t\t<![endif]-->
\t\t";
    }

    // line 43
    public function block_headerscripts($context, array $blocks = array())
    {
        // line 44
        echo "\t\t\t<!--[if lt IE 9]>
\t\t\t\t";
        // line 45
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "3414868_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3414868_0") : $this->env->getExtension('assets')->getAssetUrl("js/html5_html5_1.js");
            // line 46
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "3414868"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3414868") : $this->env->getExtension('assets')->getAssetUrl("js/html5.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 47
        echo " 
\t\t\t<![endif]-->
        \t";
        // line 49
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4f130ae_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_0") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_jquery_1.js");
            // line 60
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_1") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_ui_2.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_2") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_tools_3.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_3") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_overlay_4.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_4") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_uniform_5.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_5") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_isotope_6.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_6") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_superfish_7.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_7") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_supersubs_8.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_8") : $this->env->getExtension('assets')->getAssetUrl("js/compressed_global_9.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
        } else {
            // asset "4f130ae"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae") : $this->env->getExtension('assets')->getAssetUrl("js/compressed.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
        }
        unset($context["asset_url"]);
        // line 62
        echo "\t\t\t<!--[if lt IE 9]>
\t\t\t\t";
        // line 63
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "af8c3c1_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af8c3c1_0") : $this->env->getExtension('assets')->getAssetUrl("js/selectivizr_selectivizr_1.js");
            // line 64
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "af8c3c1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af8c3c1") : $this->env->getExtension('assets')->getAssetUrl("js/selectivizr.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 65
        echo " 
\t\t\t<![endif]-->
\t\t\t<!--[if lt IE 8]>
\t\t\t\t";
        // line 68
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d7efcb0_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7efcb0_0") : $this->env->getExtension('assets')->getAssetUrl("js/ie_ie_1.js");
            // line 69
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "d7efcb0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7efcb0") : $this->env->getExtension('assets')->getAssetUrl("js/ie.js");
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        }
        unset($context["asset_url"]);
        // line 70
        echo " 
\t\t\t<![endif]-->
\t\t";
    }

    // line 87
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 88
        echo "\t            \t            \t\t<li class=\"";
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "homepage") || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == ""))) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\" class=\"navicon-grid\">Dashboard</a></li>
\t            \t            \t";
    }

    // line 95
    public function block_header($context, array $blocks = array())
    {
    }

    // line 97
    public function block_body($context, array $blocks = array())
    {
    }

    // line 112
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 7,  100 => 106,  85 => 97,  76 => 93,  112 => 40,  101 => 34,  98 => 33,  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 42,  66 => 11,  56 => 32,  115 => 41,  83 => 60,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 79,  133 => 8,  124 => 6,  111 => 37,  107 => 110,  80 => 95,  69 => 87,  60 => 9,  52 => 78,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 90,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 47,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 5,  37 => 41,  33 => 12,  27 => 9,  82 => 96,  72 => 16,  64 => 84,  53 => 11,  49 => 28,  44 => 5,  42 => 24,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 6,  22 => 3,  224 => 27,  215 => 23,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 44,  126 => 49,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 18,  74 => 27,  57 => 80,  47 => 19,  39 => 4,  32 => 9,  24 => 1,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 113,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 24,  73 => 19,  70 => 40,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 13,  48 => 25,  41 => 43,  38 => 3,  35 => 7,  31 => 6,  28 => 3,);
    }
}
