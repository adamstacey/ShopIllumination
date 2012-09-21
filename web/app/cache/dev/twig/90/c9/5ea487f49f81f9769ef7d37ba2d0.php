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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_reset_1.css");
            // line 18
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_grid_2.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_slider-navigation_3.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_ui_4.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_portlet_5.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_uniform_6.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_form_7.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
            // asset "3b07914_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed_styles_8.css");
            echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t";
        } else {
            // asset "3b07914"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3b07914") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/compressed.css");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1f33139_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/ie_ie_1.css");
            // line 22
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "1f33139"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_1f33139") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/ie.css");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_536f917_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie9_ie9_1.css");
            // line 27
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "536f917"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_536f917") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie9.css");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b9a87fc_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie8_ie8_1.css");
            // line 32
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "b9a87fc"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_b9a87fc") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie8.css");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef4418d_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie7_ie7_1.css");
            // line 37
            echo "\t\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" />
\t\t\t\t";
        } else {
            // asset "ef4418d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ef4418d") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/shop-ie7.css");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3414868_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/html5_html5_1.js");
            // line 46
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "3414868"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_3414868") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/html5.js");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_jquery_1.js");
            // line 60
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_ui_2.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_2") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_tools_3.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_3") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_overlay_4.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_4") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_uniform_5.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_5") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_isotope_6.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_6") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_superfish_7.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_7") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_supersubs_8.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
            // asset "4f130ae_8"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae_8") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed_global_9.js");
            echo "\t        \t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t";
        } else {
            // asset "4f130ae"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4f130ae") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/compressed.js");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af8c3c1_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/selectivizr_selectivizr_1.js");
            // line 64
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "af8c3c1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_af8c3c1") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/selectivizr.js");
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
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7efcb0_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/ie_ie_1.js");
            // line 69
            echo "\t\t\t\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t\t\t\t";
        } else {
            // asset "d7efcb0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d7efcb0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/ie.js");
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
        return array (  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  314 => 47,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  224 => 27,  220 => 26,  215 => 23,  201 => 22,  197 => 21,  194 => 20,  138 => 18,  133 => 8,  130 => 7,  124 => 6,  119 => 114,  116 => 113,  113 => 112,  110 => 111,  107 => 110,  100 => 106,  96 => 104,  87 => 98,  85 => 97,  82 => 96,  80 => 95,  76 => 93,  71 => 90,  69 => 87,  62 => 83,  57 => 80,  54 => 79,  52 => 78,  43 => 73,  41 => 43,  37 => 41,  35 => 7,  31 => 6,  24 => 1,  99 => 42,  94 => 103,  91 => 40,  70 => 23,  64 => 84,  50 => 8,  47 => 7,  39 => 4,  36 => 3,  29 => 2,);
    }
}
