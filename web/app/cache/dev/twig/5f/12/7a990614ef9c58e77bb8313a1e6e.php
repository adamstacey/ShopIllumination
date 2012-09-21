<?php

/* WebIlluminationShopBundle:Departments:index.html.twig */
class __TwigTemplate_5f127a990614ef9c58e77bb8313a1e6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'metatags' => array($this, 'block_metatags'),
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "pageTitle"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "metaDescription"), "html", null, true);
        echo "\">
\t<meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "metaKeywords"), "html", null, true);
        echo "\">
\t";
        // line 6
        if (($this->getContext($context, "brand") != "")) {
            // line 7
            echo "\t\t<link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('routing')->getPath("department_with_brand_all", array("url" => $this->getContext($context, "url"), "brand" => $this->getContext($context, "brand"))), "nocdn"), "html", null, true);
            echo "\" />
\t";
        } else {
            // line 9
            echo "\t\t<link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('routing')->getPath("department_all", array("url" => $this->getContext($context, "url"))), "nocdn"), "html", null, true);
            echo "\" />
\t";
        }
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "\t<header>
\t\t<h1>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "header"), "html", null, true);
        echo "</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_2 grid-filters\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Refine Search By</h2>
\t            </header>
\t\t\t\t<section>
\t\t\t\t\t<div id=\"filters\">
\t\t\t\t\t\t<h5 class=\"no-margin\">";
        // line 24
        ob_start();
        // line 25
        echo "\t\t\t\t\t\t\tPrice
\t\t\t\t\t\t\t<button data-filter=\"price\" class=\"ui-corner-none ui-corner-tr ui-corner-br small button ui-button-dark-grey fr action-show-hide-filter\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-only=\"true\">Filter</button>
\t\t\t\t\t\t\t<button data-filter=\"price\" class=\"ui-corner-none ui-corner-tl ui-corner-bl small button ui-button-dark-grey fr action-reset-filter\" data-icon-primary=\"ui-icon-refresh\" data-icon-only=\"true\">Reset</button>
\t\t\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 28
        echo "</h5>
\t\t\t\t\t\t<div id=\"filter-price-container\">
\t\t\t\t\t\t\t<div id=\"filter-price-loading\" class=\"loading-container\">
\t\t\t\t\t\t\t\t<p><img src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t\t\t<p>Loading Price Range&hellip;</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"filter-price\" class=\"filter price-range-filter ui-helper-hidden\"></div>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-price-reset-from\" id=\"filter-price-reset-from\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "priceRange"), "from"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-price-reset-to\" id=\"filter-price-reset-to\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "priceRange"), "to"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        // line 38
        if (($this->getContext($context, "brand") != "")) {
            // line 39
            echo "\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-brands\" id=\"filter-brands\" value=\"";
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "brands"), ","), "html", null, true);
            echo "\" />
\t\t\t\t\t\t";
        } else {
            // line 41
            echo "\t\t\t\t\t\t\t<h5>";
            ob_start();
            // line 42
            echo "\t\t\t\t\t\t\t\tBrands
\t\t\t\t\t\t\t\t<button data-filter=\"brand\" class=\"ui-corner-none ui-corner-tr ui-corner-br small button ui-button-dark-grey fr action-show-hide-filter\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-only=\"true\">Filter</button>
\t\t\t\t\t\t\t\t<button data-filter=\"brand\" class=\"ui-corner-none ui-corner-tl ui-corner-bl small button ui-button-dark-grey fr action-reset-filter\" data-icon-primary=\"ui-icon-refresh\" data-icon-only=\"true\">Reset</button>
\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 45
            echo "</h5>
\t\t\t\t\t\t\t<div id=\"filter-brand-container\">
\t\t\t\t\t\t\t\t<div id=\"filter-brand-loading\" class=\"loading-container\">
\t\t\t\t\t\t\t\t\t<p><img src=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
            echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t\t\t\t<p>Loading Available Brands&hellip;</p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"filter-brand\" class=\"filter ui-helper-hidden\"></div>
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-brands\" id=\"filter-brands\" value=\"";
            // line 52
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "brands"), ","), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t\t\t<h5>";
        ob_start();
        // line 56
        echo "\t\t\t\t\t\t\tDepartment
\t\t\t\t\t\t\t<button data-filter=\"department\" class=\"ui-corner-none ui-corner-tr ui-corner-br small button ui-button-dark-grey fr action-show-hide-filter\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-only=\"true\">Filter</button>
\t\t\t\t\t\t\t<button data-filter=\"department\" class=\"ui-corner-none ui-corner-tl ui-corner-bl small button ui-button-dark-grey fr action-reset-filter\" data-icon-primary=\"ui-icon-refresh\" data-icon-only=\"true\">Reset</button>
\t\t\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 59
        echo "</h5>
\t\t\t\t\t\t<div id=\"filter-department-container\">
\t\t\t\t\t\t\t<div id=\"filter-department-loading\" class=\"loading-container no-margin\">
\t\t\t\t\t\t\t\t<p><img src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t\t\t<p>Loading Available Departments&hellip;</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"filter-department\" class=\"filter ui-helper-hidden\"></div>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-departments\" id=\"filter-departments\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "department"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<h5>";
        // line 68
        ob_start();
        // line 69
        echo "\t\t\t\t\t\t\tFeatures
\t\t\t\t\t\t\t<button data-filter=\"feature\" class=\"ui-corner-none ui-corner-tr ui-corner-br small button ui-button-dark-grey fr action-show-hide-filter\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-only=\"true\">Filter</button>
\t\t\t\t\t\t\t<button data-filter=\"feature\" class=\"ui-corner-none ui-corner-tl ui-corner-bl small button ui-button-dark-grey fr action-reset-filter\" data-icon-primary=\"ui-icon-refresh\" data-icon-only=\"true\">Reset</button>
\t\t\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 72
        echo "</h5>
\t\t\t\t\t\t<div id=\"filter-feature-container\">
\t\t\t\t\t\t\t<div id=\"filter-feature-loading\" class=\"loading-container\">
\t\t\t\t\t\t\t\t<p><img src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t\t\t<p>Loading Available Feature&hellip;</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"filter-feature\" class=\"filter ui-helper-hidden\"></div>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"filter-features\" id=\"filter-features\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "filter"), "features"), ","), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t\t<div class=\"grid_4 grid-listings\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2 id=\"product-count\"><img src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;</h2>
\t            </header>
\t\t\t\t<section class=\"clearfix no-padding-right no-padding-bottom\">
\t\t\t\t\t<div id=\"product-sorting\">
\t\t\t\t\t\t<div class=\"fl\">
\t\t\t\t\t\t\t<div class=\"buttonset-title\">Sort By</div>
\t\t\t\t\t\t\t<select name=\"sort-order\" id=\"sort-order\">
\t\t\t\t\t\t\t\t<option";
        // line 95
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "listPrice:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"listPrice:ASC\">Price: Lowest First</option>
\t\t\t\t\t\t\t\t<option";
        // line 96
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "listPrice:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"listPrice:DESC\">Price: Highest First</option>
\t\t\t\t\t\t\t\t<option";
        // line 97
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "savings:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"savings:DESC\">Special Offers: Biggest Savings First</option>
\t\t\t\t\t\t\t\t<option";
        // line 98
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "discount:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"discount:DESC\">Special Offers: Biggest Discounts First</option>
\t\t\t\t\t\t\t\t<option";
        // line 99
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "product:ASC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"product:ASC\">Alphabetically: A-Z</option>
\t\t\t\t\t\t\t\t<option";
        // line 100
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "product:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"product:DESC\">Alphabetically: Z-A</option>
\t\t\t\t\t\t\t\t<option";
        // line 101
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "sortOrder") == "createdAt:DESC")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"createdAt:DESC\">Latest</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
                        <div class=\"fr\">
                        \t<div class=\"buttonset-title fl\">Per Page</div>
\t                        <select class=\"fl\" id=\"results-per-page\">
\t\t\t\t\t\t\t\t<option";
        // line 107
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "maxResults") == "10")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"10\">10</option>
\t\t\t\t\t\t\t\t<option";
        // line 108
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "maxResults") == "20")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"20\">20</option>
\t\t\t\t\t\t\t\t<option";
        // line 109
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "maxResults") == "50")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"50\">50</option>
\t\t\t\t\t\t\t\t<option";
        // line 110
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "maxResults") == "100")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"100\">100</option>
\t\t\t\t\t\t\t\t<option";
        // line 111
        if (($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "maxResults") == "99999999")) {
            echo " selected=\"selected\"";
        }
        echo " value=\"99999999\">All</option>
\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"form-current-page\" id=\"current-page\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cataloguePageHistory"), "page"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
                        <div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"product-pagination-top\" class=\"padding-bottom-15 padding-right-15 ui-helper-hidden\"></div>
\t\t\t\t\t<div id=\"products\" class=\"ui-helper-hidden\"></div>
\t\t\t\t\t<div id=\"products-loading\" class=\"loading-container\">
\t\t\t\t\t\t<p><img src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t<p>Loading Products&hellip;</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"product-pagination-bottom\" class=\"padding-bottom-15 padding-right-15 ui-helper-hidden\"></div>
\t\t        \t<div class=\"clear\"></div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 131
    public function block_javascripts($context, array $blocks = array())
    {
        // line 132
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 133
        $this->env->loadTemplate("WebIlluminationShopBundle:Departments:indexScript.js.twig")->display(array_merge($context, array("url" => $this->getContext($context, "url"), "brand" => $this->getContext($context, "brand"), "department" => $this->getContext($context, "department"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Departments:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 133,  322 => 132,  319 => 131,  304 => 120,  294 => 113,  287 => 111,  281 => 110,  275 => 109,  269 => 108,  263 => 107,  252 => 101,  246 => 100,  240 => 99,  234 => 98,  228 => 97,  222 => 96,  216 => 95,  206 => 88,  194 => 79,  187 => 75,  182 => 72,  176 => 69,  174 => 68,  169 => 66,  162 => 62,  157 => 59,  151 => 56,  148 => 55,  142 => 52,  135 => 48,  130 => 45,  124 => 42,  121 => 41,  115 => 39,  113 => 38,  108 => 36,  104 => 35,  97 => 31,  92 => 28,  86 => 25,  84 => 24,  71 => 14,  68 => 13,  65 => 12,  57 => 9,  51 => 7,  49 => 6,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
