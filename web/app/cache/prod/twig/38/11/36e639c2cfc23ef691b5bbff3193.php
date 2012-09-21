<?php

/* WebIlluminationAdminBundle:BrandsOld:edit.html.twig */
class __TwigTemplate_381136e639c2cfc23ef691b5bbff3193 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'leftmenu' => array($this, 'block_leftmenu'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "brand"), "html", null, true);
        echo "  | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 5
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "27960c7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7_0") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce_jquery.tinymce_1.js");
            // line 6
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "27960c7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 8
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ed9f77b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ed9f77b_0") : $this->env->getExtension('assets')->getAssetUrl("js/data-table_data-table_1.js");
            // line 9
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "ed9f77b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ed9f77b") : $this->env->getExtension('assets')->getAssetUrl("js/data-table.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 11
        echo "\t";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "59b89b2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_59b89b2_0") : $this->env->getExtension('assets')->getAssetUrl("js/file-upload_file-upload_1.js");
            // line 12
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "59b89b2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_59b89b2") : $this->env->getExtension('assets')->getAssetUrl("js/file-upload.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 14
        echo "\t<script type=\"text/javascript\" src=\"https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart','table']}]}\"></script>
";
    }

    // line 16
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 17
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 18
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 20
    public function block_header($context, array $blocks = array())
    {
        // line 21
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t
\t<h2>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "brand"), "html", null, true);
        echo "</h2>
";
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "    <section class=\"container_6 clearfix\">
    \t<div class=\"grid_6\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Actions</h2>
                </header>
\t\t\t\t<section>
                    ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brand_warnings"));
        $context['_iterated'] = false;
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["brand_warning"]) {
            // line 34
            echo "        \t\t\t\t<div class=\"brand-warning ui-status-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_warning"), "status"), "html", null, true);
            if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                echo " no-margin-bottom";
            }
            echo "\">
\t        \t\t\t\t<span class=\"brand-warning-icon ui-icon ui-icon-";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_warning"), "icon"), "html", null, true);
            echo "\"></span>
        \t\t\t\t\t<button class=\"button action-fix\" rel=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_warning"), "section"), "html", null, true);
            echo "\" data-icon-primary=\"ui-icon-wrench\">&nbsp;&nbsp;Fix This!</button>
        \t\t\t\t\t<p>";
            // line 37
            echo $this->getAttribute($this->getContext($context, "brand_warning"), "message");
            echo "</p>
        \t\t\t\t\t<div class=\"clear\"></div>
        \t\t\t\t</div>
\t\t\t\t    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 41
            echo "\t\t\t\t        <div class=\"brand-warning ui-status-success no-margin-bottom\">
\t        \t\t\t\t<span class=\"brand-warning-icon ui-icon ui-icon-circle-check\"></span>
        \t\t\t\t\t<p>Your brand is up-to-date.<br />There are no actions required for this brand at this time.</p>
        \t\t\t\t\t<div class=\"clear\"></div>
        \t\t\t\t</div>
\t\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand_warning'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 47
        echo "\t            </section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t   \t<form action=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_edit", array("id" => $this->getAttribute($this->getContext($context, "brand"), "id"))), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form has-validation\">
\t        <div class=\"grid_6 leading\">
\t            <div class=\"portlet\">
\t                <header>
\t                    <h2>Brand Information</h2>
\t                </header>
\t                <section>
\t                    <div class=\"sidebar-tabs\" style=\"min-height: 368px\">
\t                        <ul>
\t                            <li id=\"tab-general\"><a href=\"#general\">General</a></li>
\t                            <li id=\"tab-description\"><a href=\"#description\">Description</a></li>
\t                            <li id=\"tab-seo\"><a href=\"#seo\">SEO</a></li>
\t                            <li id=\"tab-pricing\" class=\"ui-status-success\"><a href=\"#pricing\">Pricing</a></li>
\t                            <li id=\"tab-images\"><a href=\"#images\">Images</a></li>
\t                            <li id=\"tab-guarantees\"><a href=\"#guarantees\">Guarantees</a></li>
\t                            <li id=\"tab-redirects\"><a href=\"#redirects\">Redirects</a></li>
\t                            <li id=\"tab-attachments\"><a href=\"#attachments\">Attachments</a></li>
\t                        </ul>
\t                        ";
        // line 69
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionGeneral.html.twig")->display(array_merge($context, array("brand" => $this->getContext($context, "brand"), "brand_description" => $this->getContext($context, "brand_description"))));
        // line 70
        echo "                            ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionDescription.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        // line 71
        echo "                            ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionSeo.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"), "web_address" => $this->getContext($context, "web_address"))));
        // line 72
        echo "                            ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionPricing.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        // line 73
        echo "                            ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionImages.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        // line 74
        echo "                            ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionGuarantees.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        echo " 
                            ";
        // line 75
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionRedirects.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        // line 76
        echo "\t                        ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionAttachments.html.twig")->display(array_merge($context, array("brand_description" => $this->getContext($context, "brand_description"))));
        // line 77
        echo "\t                    </div>
\t                </section>
\t            </div>
\t        </div>
\t        <input type=\"hidden\" id=\"form-current-tab\" name=\"current-tab\" value=\"";
        // line 81
        if (array_key_exists("current_tab", $context)) {
            echo twig_escape_filter($this->env, $this->getContext($context, "current_tab"), "html", null, true);
        } else {
            echo "general";
        }
        echo "\" />
\t    </form>
\t    <div class=\"clear\"></div>
        <div class=\"grid_6 leading\">
            <div class=\"portlet\">
                <header>
                    <h2>Statistics</h2>
                </header>
                <section>
                    <div class=\"sidebar-tabs\" style=\"min-height: 186px\">
                        <ul>
                            <li id=\"tab-statistics-visits\"><a href=\"#statistics-visits\">Visits</a></li>
                            <li id=\"tab-statistics-referrers\"><a href=\"#statistics-referrers\">Referrers</a></li>
                            <li id=\"tab-competitors\"><a href=\"#competitors\">Competitors</a></li>
                            <li id=\"tab-unique-product-identifiers\"><a href=\"#unique-product-identifiers\">Unique Product Identifiers</a></li>
                        </ul>
                        ";
        // line 97
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionStatisticsVisits.html.twig")->display(array_merge($context, array("brand" => $this->getContext($context, "brand"))));
        // line 98
        echo "                        ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:sectionStatisticsReferrers.html.twig")->display(array_merge($context, array("brand" => $this->getContext($context, "brand"))));
        // line 99
        echo "                        ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Products:sectionCompetitors.html.twig")->display(array_merge($context, array("product_search" => $this->getContext($context, "product_search"))));
        // line 100
        echo "                        ";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Products:sectionUniqueProductIdentifiers.html.twig")->display(array_merge($context, array("product_search" => $this->getContext($context, "product_search"))));
        // line 101
        echo "                    </div>
                </section>
            </div>
        </div>
        <script type=\"text/javascript\" defer=\"defer\">
        \t
\t\t\t\$(document).ready(function() {
\t\t\t\t
\t\t\t\t";
        // line 110
        echo "\t\t\t\t";
        if (array_key_exists("current_tab", $context)) {
            // line 111
            echo "\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", \"#";
            echo twig_escape_filter($this->env, $this->getContext($context, "current_tab"), "html", null, true);
            echo "\");
\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\".sidebar-tabs\").offset().top - 45},'slow');
\t\t\t\t";
        }
        // line 114
        echo "\t\t\t\t
\t\t\t});
\t\t\t
\t\t</script>
\t</section>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  301 => 101,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 71,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 99,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 152,  216 => 51,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 97,  284 => 195,  270 => 37,  266 => 36,  261 => 77,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 25,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 21,  56 => 16,  115 => 18,  83 => 11,  164 => 50,  140 => 57,  58 => 15,  21 => 4,  61 => 18,  36 => 4,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 36,  176 => 57,  165 => 75,  161 => 58,  152 => 110,  148 => 33,  141 => 50,  134 => 42,  132 => 53,  127 => 53,  123 => 34,  109 => 63,  90 => 32,  54 => 8,  133 => 95,  124 => 21,  111 => 29,  107 => 16,  80 => 60,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 72,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 25,  125 => 123,  119 => 114,  110 => 17,  96 => 33,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 26,  43 => 7,  50 => 6,  25 => 6,  92 => 30,  86 => 31,  79 => 21,  46 => 5,  37 => 3,  33 => 16,  27 => 2,  82 => 30,  72 => 20,  64 => 8,  53 => 17,  49 => 9,  44 => 5,  42 => 13,  34 => 16,  29 => 6,  23 => 3,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 36,  77 => 25,  74 => 27,  57 => 19,  47 => 5,  39 => 8,  32 => 8,  24 => 6,  17 => 1,  135 => 50,  129 => 52,  122 => 122,  116 => 41,  113 => 112,  108 => 117,  104 => 39,  102 => 14,  94 => 33,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 28,  67 => 19,  62 => 11,  59 => 25,  55 => 18,  51 => 7,  48 => 25,  41 => 4,  38 => 3,  35 => 7,  31 => 2,  28 => 10,);
    }
}
