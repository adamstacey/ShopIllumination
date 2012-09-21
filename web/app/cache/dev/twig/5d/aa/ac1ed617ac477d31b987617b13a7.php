<?php

/* WebIlluminationShopBundle:Products:index.html.twig */
class __TwigTemplate_5daaac1ed617ac477d31b987617b13a7 extends Twig_Template
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
        echo $this->getAttribute($this->getContext($context, "product"), "pageTitle");
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "metaDescription"), "html", null, true);
        echo "\">
\t<meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "metaKeywords"), "html", null, true);
        echo "\">
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "\t<div itemscope itemtype=\"http://schema.org/Product\">
\t\t<header>
\t\t\t<a href=\"";
        // line 10
        if ((($this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "history"), 0) == "index") && ($this->getAttribute($this->getContext($context, "product"), "listingUrl") != ""))) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "product"), "listingUrl"))), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "history"), 0))), "html", null, true);
        }
        echo "\" class=\"margin-left-15 margin-top-20 button ui-button-blue fr\" data-icon-primary=\"ui-icon-arrowthick-1-w\">Go Back</a>
\t\t\t<h1 itemprop=\"name\"";
        // line 11
        if ($this->getAttribute($this->getContext($context, "product"), "tagline")) {
            echo " class=\"no-margin-bottom\"";
        }
        echo ">";
        echo $this->getAttribute($this->getContext($context, "product"), "header");
        echo "</h1>
\t\t\t";
        // line 12
        if ($this->getAttribute($this->getContext($context, "product"), "tagline")) {
            echo "<h2 class=\"tagline\">";
            echo $this->getAttribute($this->getContext($context, "product"), "tagline");
            echo "</h2>";
        }
        // line 13
        echo "\t\t</header>
\t\t<section class=\"container_6 clearfix\" id=\"product-info\">
\t\t\t<div>
\t\t\t\t<div class=\"grid_3\"> 
\t\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div class=\"product-image-container\">
\t\t\t\t\t\t\t\t<button rel=\"#large-image-container\" class=\"action-larger-view button ui-corner-tl ui-corner-none\" data-icon-primary=\"ui-icon-search\">Zoom In</button>
\t\t\t\t\t\t\t\t<img itemprop=\"image\" id=\"product-image\" rel=\"#large-image-container\" data-large-path=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "images"), 0), "largePath"), "html", null, true);
        echo "\" data-large-width=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "images"), 0), "largeWidth"), "html", null, true);
        echo "\" data-large-height=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "images"), 0), "largeHeight"), "html", null, true);
        echo "\" class=\"product-image\" src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "images"), 0), "mediumPath"), "html", null, true);
        echo "\" border=\"0\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "images"), 0), "title"), "html", null, true);
        echo "\" width=\"300\" height=\"300\">
\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"ac product-thumbnail-container\">
\t\t\t\t\t\t\t\t";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "images"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 26
            echo "\t\t\t\t\t\t\t\t\t<img itemprop=\"image\" rel=\"#large-image-container\" class=\"product-thumbnail";
            if ($this->getAttribute($this->getContext($context, "loop"), "first")) {
                echo " selected";
            }
            echo "\" data-large-path=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "largePath"), "html", null, true);
            echo "\" data-large-width=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "largeWidth"), "html", null, true);
            echo "\" data-large-height=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "largeHeight"), "html", null, true);
            echo "\" data-medium-path=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "mediumPath"), "html", null, true);
            echo "\" data-medium-width=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "mediumWidth"), "html", null, true);
            echo "\" data-medium-height=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "mediumHeight"), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "thumbnailPath"), "html", null, true);
            echo "\" border=\"0\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "title"), "html", null, true);
            echo "\" width=\"50\" height=\"50\">
\t\t\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 28
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t        </div>
\t\t\t    </div>
\t\t\t    <div class=\"grid_3\"> 
\t\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Product Options</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<div id=\"product-price-loading\" class=\"loading-container ui-helper-hidden\">
\t\t\t\t\t\t\t\t\t<p><img src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t\t\t\t<p>Updating Prices&hellip;</p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"product-price\">
\t\t\t\t\t\t\t\t\t";
        // line 44
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:price.html.twig")->display(array_merge($context, array("url" => "", "productCode" => $this->getAttribute($this->getContext($context, "product"), "productCode"), "recommendedRetailPrice" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "prices"), 0), "recommendedRetailPrice"), "listPrice" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "prices"), 0), "listPrice"), "savings" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "prices"), 0), "savings"), "membershipCardPrice" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "product"), "prices"), 0), "membershipCardPrice"), "hidePrice" => $this->getAttribute($this->getContext($context, "product"), "hidePrice"))));
        // line 45
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "productOptions"));
        foreach ($context['_seq'] as $context["productOptionGroup"] => $context["productOptions"]) {
            // line 47
            echo "\t\t\t\t\t\t\t\t\t<div class=\"product-option-group-container\">
\t\t\t\t\t\t\t\t\t\t<label>";
            // line 48
            echo twig_escape_filter($this->env, $this->getContext($context, "productOptionGroup"), "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t<select class=\"product-option-group\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 50
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "productOptions"));
            foreach ($context['_seq'] as $context["_key"] => $context["productOption"]) {
                // line 51
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOption"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 52
                if (($this->getAttribute($this->getContext($context, "productOption"), "price") > 0)) {
                    // line 53
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "a")) {
                        // line 54
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "i")) {
                            // line 55
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(+ &pound;";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                            echo ")
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "d")) {
                            // line 57
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(- &pound;";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                            echo ")
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 59
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "p")) {
                        // line 60
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "i")) {
                            // line 61
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(+ ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                            echo "%)
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        } elseif (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "d")) {
                            // line 63
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(- ";
                            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                            echo "%)
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 65
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "r")) {
                        // line 66
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t(&pound;";
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                        echo ")
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 68
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 69
                echo "\t\t\t\t\t\t\t\t\t\t\t\t</option>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productOption'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 71
            echo "\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['productOptionGroup'], $context['productOptions'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 75
        echo "\t\t\t\t\t\t\t\t<div class=\"ar buy-now\">
\t\t\t\t\t\t\t\t\t";
        // line 76
        if (($this->getAttribute($this->getContext($context, "product"), "availableForPurchase") == 1)) {
            // line 77
            echo "\t\t\t\t\t\t\t\t\t\tQuantity:
\t\t\t\t\t\t\t\t\t\t<input id=\"quantity-";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" class=\"quantity\" width=\"10\" type=\"text\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t<button data-product-id=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" class=\"action-add-to-basket button ui-button-green\">Add to Basket</button>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"\" id=\"selected-options-";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 82
            echo "\t\t\t\t\t\t\t\t\t\t<input id=\"quantity-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" class=\"quantity\" type=\"hidden\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
            echo "\" data-product-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" class=\"button ui-button-green\">Contact Us To Buy</a>
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"\" id=\"selected-options-";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t";
        }
        // line 86
        echo "\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t        </div>
\t\t\t    </div>
\t\t\t    <div class=\"grid_3 leading\"> 
\t\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Delivery Options</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<section>
\t\t\t\t\t\t\t<div class=\"delivery-option\">
\t\t\t\t\t\t\t\t<img class=\"fl\" src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/icons/delivery-box.png"), "html", null, true);
        echo "\" width=\"44\" height=\"30\" border=\"0\" alt=\"Delivery Option\" />
\t\t\t\t\t\t\t\t<p class=\"delivery-headline\"><span class=\"delivery-cost-green\">FREE DELIVERY</span> - <span class=\"delivery-times\">1-5 Working Days</span></p>
\t\t\t\t\t\t\t\t<p class=\"delivery-info\">On all orders where you spend over £30</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"delivery-option no-margin\">
\t\t\t\t\t\t\t\t<img class=\"fl\" src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/icons/delivery-box.png"), "html", null, true);
        echo "\" width=\"44\" height=\"30\" border=\"0\" alt=\"Delivery Option\" />
\t\t\t\t\t\t\t\t<p class=\"delivery-headline\"><span class=\"delivery-cost-red\">&pound;3.99</span> - <span class=\"delivery-times\">1-5 Working Days</span></p>
\t\t\t\t\t\t\t\t<p class=\"delivery-info\">On all orders where you spend less than £30</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t        </div>
\t\t\t    </div>
\t\t\t</div>
\t\t\t";
        // line 112
        if (($this->getAttribute($this->getContext($context, "product"), "description") || (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productFeatures")) > 0))) {
            // line 113
            echo "\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t<div class=\"grid_6 leading\">
\t\t            <div class=\"portlet\">
\t\t                <header>
\t\t                    <h2>Product Information</h2>
\t\t                </header>
\t\t                <section>
\t\t                    <div class=\"sidebar-tabs\">
\t\t                        <ul>
\t\t                            ";
            // line 122
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productFeatures")) > 0)) {
                echo "<li id=\"tab-features\"><a href=\"#features\">Features</a></li>";
            }
            // line 123
            echo "\t\t                            ";
            if ($this->getAttribute($this->getContext($context, "product"), "description")) {
                echo "<li id=\"tab-description\"><a href=\"#description\">Description</a></li>";
            }
            // line 124
            echo "\t\t                        </ul>
\t\t                        ";
            // line 125
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productFeatures")) > 0)) {
                // line 126
                echo "\t\t\t                        <section id=\"features\" class=\"form ui-helper-hidden\">
\t\t\t                        \t<dl>
\t\t\t                        \t\t";
                // line 128
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "productFeatures"));
                foreach ($context['_seq'] as $context["_key"] => $context["productFeature"]) {
                    // line 129
                    echo "\t\t\t                        \t\t\t<dt>";
                    echo $this->getAttribute($this->getAttribute($this->getContext($context, "productFeature"), 0), "productFeatureGroup");
                    echo "</dt>
    \t\t\t\t\t\t\t\t\t\t\t\t<dd>";
                    // line 130
                    echo $this->getAttribute($this->getAttribute($this->getContext($context, "productFeature"), 0), "productFeature");
                    echo "</dd>
\t\t\t                        \t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productFeature'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 132
                echo "\t\t\t\t\t\t\t\t\t\t</dl>
\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t                        </section>
\t\t\t                    ";
            }
            // line 136
            echo "\t\t                        ";
            if ($this->getAttribute($this->getContext($context, "product"), "description")) {
                // line 137
                echo "\t\t\t                        <section id=\"description\" class=\"form ui-helper-hidden\">
\t\t\t                        \t<div itemprop=\"description\" class=\"product-description\">";
                // line 138
                echo $this->getAttribute($this->getContext($context, "product"), "description");
                echo "</div>
\t\t\t                        </section>
\t\t\t                    ";
            }
            // line 141
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 145
        echo "\t\t  
\t\t   \t<div class=\"clear\"></div>
\t\t   \t";
        // line 147
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "relatedProducts")) > 0)) {
            // line 148
            echo "\t\t\t   \t<div class=\"grid_6 leading\">
\t\t\t   \t\t<div class=\"portlet\">
\t\t\t\t\t\t<header>
\t\t\t\t\t\t\t<h2>Related Products</h2>
\t\t\t\t\t\t</header>
\t\t\t\t\t\t<section class=\"no-padding-bottom no-padding-right\">
\t\t\t\t\t\t\t";
            // line 154
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "relatedProducts"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["relatedProduct"]) {
                // line 155
                echo "\t\t\t\t\t\t\t\t";
                $this->env->loadTemplate("WebIlluminationShopBundle:Products:productListing.html.twig")->display(array_merge($context, array("product" => $this->getContext($context, "relatedProduct"))));
                // line 156
                echo "\t\t\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relatedProduct'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 157
            echo "\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</section>
\t\t\t        </div>
\t\t\t    </div>
\t\t\t    <div class=\"clear\"></div>
\t\t\t";
        }
        // line 163
        echo "\t\t</section>
\t</div>
";
    }

    // line 166
    public function block_javascripts($context, array $blocks = array())
    {
        // line 167
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 168
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:indexScript.js.twig")->display(array_merge($context, array("product" => $this->getContext($context, "product"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  486 => 168,  481 => 167,  478 => 166,  472 => 163,  464 => 157,  450 => 156,  447 => 155,  430 => 154,  422 => 148,  420 => 147,  416 => 145,  409 => 141,  403 => 138,  400 => 137,  397 => 136,  391 => 132,  383 => 130,  378 => 129,  374 => 128,  370 => 126,  368 => 125,  365 => 124,  360 => 123,  356 => 122,  345 => 113,  343 => 112,  332 => 104,  324 => 99,  309 => 86,  304 => 84,  298 => 83,  293 => 82,  288 => 80,  284 => 79,  280 => 78,  277 => 77,  275 => 76,  272 => 75,  263 => 71,  256 => 69,  253 => 68,  247 => 66,  244 => 65,  238 => 63,  232 => 61,  229 => 60,  226 => 59,  220 => 57,  214 => 55,  211 => 54,  208 => 53,  206 => 52,  199 => 51,  195 => 50,  190 => 48,  187 => 47,  183 => 46,  180 => 45,  178 => 44,  171 => 40,  157 => 28,  122 => 26,  105 => 25,  90 => 21,  80 => 13,  74 => 12,  66 => 11,  58 => 10,  54 => 8,  51 => 7,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
