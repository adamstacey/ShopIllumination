<?php

/* WebIlluminationShopBundle:Brands:index.html.twig */
class __TwigTemplate_5398ce7049fa8ede5e8cd5eae91d1d04 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "pageTitle"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_metatags($context, array $blocks = array())
    {
        // line 4
        echo "\t<meta name=\"description\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "metaDescription"), "html", null, true);
        echo "\">
\t<meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "metaKeywords"), "html", null, true);
        echo "\">
";
    }

    // line 7
    public function block_slider($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "images")) > 0)) {
            // line 9
            echo "\t\t<div class=\"container_8 clearfix\">
\t\t\t<header>
\t\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t\t";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "brand"), "images"));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 14
                echo "\t\t\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t\t\t";
                // line 15
                if ($this->getAttribute($this->getContext($context, "image"), "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "link"), "html", null, true);
                    echo "\">";
                }
                echo "<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "image"), "largePath")), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "title"), "html", null, true);
                echo "\" />";
                if ($this->getAttribute($this->getContext($context, "image"), "link")) {
                    echo "</a>";
                }
                // line 16
                echo "\t\t\t\t\t\t\t\t<h3 class=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "image", true), "alignment", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "image", true), "alignment"), "left")) : ("left")), "html", null, true);
                echo "\">";
                echo $this->getAttribute($this->getContext($context, "image"), "title");
                echo "</h3>
\t\t\t\t\t\t\t\t";
                // line 17
                if ($this->getAttribute($this->getContext($context, "image"), "description")) {
                    // line 18
                    echo "\t\t\t\t\t\t\t\t\t<p class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "image", true), "alignment", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "image", true), "alignment"), "left")) : ("left")), "html", null, true);
                    echo "\">";
                    echo $this->getAttribute($this->getContext($context, "image"), "description");
                    echo "</p>
\t\t\t\t\t\t\t\t";
                }
                // line 20
                echo "\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($this->getContext($context, "image"), "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "image"), "link"), "html", null, true);
                    echo "\" class=\"button left ui-button-yellow\">More Details</a>";
                }
                // line 21
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 23
            echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"slider-navigation-container\">
\t\t\t\t\t\t<div id=\"slider_gallery_navigation\" class=\"slider-navigation\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</header>
\t\t</div>
\t";
        }
    }

    // line 32
    public function block_body($context, array $blocks = array())
    {
        // line 33
        echo "\t<header>
\t\t<h1>";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "header"), "html", null, true);
        echo "</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_2\">
\t\t\t<div class=\"portlet\">
\t\t\t\t<section>
\t\t\t\t\t<h3 class=\"no-margin-top\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
        echo " Departments</h3>
\t\t\t\t\t";
        // line 41
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "departments")) > 0)) {
            // line 42
            echo "\t\t\t\t\t\t<ul class=\"brand-department\">
\t\t\t\t\t\t\t";
            // line 43
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "brand"), "departments"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
                // line 44
                echo "\t\t\t\t\t\t\t\t<li><a";
                if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                    echo " class=\"no-margin-bottom\"";
                }
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => $this->getAttribute($this->getContext($context, "brand"), "url"), "url" => $this->getAttribute($this->getContext($context, "department"), "url"))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "name"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "productCount"), "html", null, true);
                echo ")</a></li>
\t\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 46
            echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t";
        } else {
            // line 48
            echo "\t\t\t\t\t\t<p>There are currently no dpeartments available for ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo ".</p>
\t\t\t\t\t";
        }
        // line 50
        echo "\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"grid_4\">
\t\t\t<div class=\"portlet\">
\t\t\t\t<section>
\t\t\t\t\t<div class=\"brand-image\">
\t\t\t\t\t\t";
        // line 58
        if ($this->getAttribute($this->getContext($context, "brand"), "logo")) {
            // line 59
            echo "\t\t\t\t\t\t\t<img class=\"border\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "largePath")), "html", null, true);
            echo "\" border=\"0\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "title"), "html", null, true);
            echo "\" width=\"300\" height=\"150\" />
\t\t\t\t\t\t";
        }
        // line 61
        echo "\t\t\t\t\t\t";
        if ($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", true, true)) {
            // line 62
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "addresses", array(), "any", true, true)) {
                // line 63
                echo "\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "addresses"));
                foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                    // line 64
                    echo "\t\t\t\t\t\t\t\t\t<p class=\"brand-address\">
\t\t\t\t\t\t\t\t\t\t<strong>";
                    // line 65
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "displayName"), "html", null, true);
                    echo "</strong><br />
\t\t\t\t\t\t\t\t\t\t";
                    // line 66
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "addressLine1"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t";
                    // line 67
                    if ($this->getAttribute($this->getContext($context, "address"), "addressLine2")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "addressLine2"), "html", null, true);
                        echo "<br />";
                    }
                    // line 68
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getContext($context, "address"), "addressLine3")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "addressLine3"), "html", null, true);
                        echo "<br />";
                    }
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "townCity"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t";
                    // line 70
                    if ($this->getAttribute($this->getContext($context, "address"), "countyState")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "countyState"), "html", null, true);
                        echo "<br />";
                    }
                    // line 71
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "address"), "postZipCode"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 74
                echo "\t\t\t\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "webAddresses", array(), "any", true, true)) {
                // line 76
                echo "\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "webAddresses"));
                foreach ($context['_seq'] as $context["_key"] => $context["webAddress"]) {
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t<p><strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "webAddress"), "contactWebAddressType"), "html", null, true);
                    echo ":</strong> <a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "webAddress"), "url"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "webAddress"), "displayName"), "html", null, true);
                    echo "</a></p>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['webAddress'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 79
                echo "\t\t\t\t\t\t\t";
            }
            // line 80
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "numbers", array(), "any", true, true)) {
                // line 81
                echo "\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "numbers"));
                foreach ($context['_seq'] as $context["_key"] => $context["number"]) {
                    // line 82
                    echo "\t\t\t\t\t\t\t\t\t<p><strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "number"), "contactNumberType"), "html", null, true);
                    echo ":</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "number"), "number"), "html", null, true);
                    echo "</p>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['number'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 84
                echo "\t\t\t\t\t\t\t";
            }
            // line 85
            echo "\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "email_addresses", array(), "any", true, true)) {
                // line 86
                echo "\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "emailAddresss"));
                foreach ($context['_seq'] as $context["_key"] => $context["emailAddress"]) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t<p><strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "emailAddress"), "contactEmailAddressType"), "html", null, true);
                    echo ":</strong> <a target=\"_blank\" href=\"mailto:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "emailAddress"), "email"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "emailAddress"), "displayName"), "html", null, true);
                    echo "</a></p>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['emailAddress'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 89
                echo "\t\t\t\t\t\t\t";
            }
            // line 90
            echo "\t\t\t\t\t\t\t";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "files")) > 0)) {
                // line 91
                echo "\t\t\t\t\t\t\t\t<div class=\"brand-downloads\">
\t\t\t\t\t\t\t\t\t<h3>";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
                echo " Downloads</h3>
\t\t\t\t\t\t\t\t\t";
                // line 93
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "brand"), "files"));
                foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                    // line 94
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"brand-download\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
                    // line 95
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "file"), "path")), "html", null, true);
                    echo "}\"><img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/icons/file-types/pdf.png"), "html", null, true);
                    echo "\" border=\"0\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "file"), "displayName"), "html", null, true);
                    echo "\" height=\"40\" /></a>
\t\t\t\t\t\t\t\t\t\t\t<p><a target=\"_blank\" href=\"";
                    // line 96
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "file"), "path")), "html", null, true);
                    echo "\">";
                    echo $this->getAttribute($this->getContext($context, "file"), "displayName");
                    echo "</a><br />(";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "file"), "fileSize"), "html", null, true);
                    echo ")</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 100
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            }
            // line 102
            echo "\t\t\t\t\t\t";
        }
        // line 103
        echo "\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"brand-description\">
\t\t\t\t\t\t";
        // line 105
        echo $this->getAttribute($this->getContext($context, "brand"), "description");
        echo "
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div class=\"brand-guarantees\">
\t\t\t\t\t\t<h3>";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
        echo " Guarantees</h3>
\t\t\t\t\t\t";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "brand"), "guarantees"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["guarantee"]) {
            // line 112
            echo "\t\t\t\t\t\t\t<div class=\"brand-guarantee\">
\t\t\t\t\t\t\t\t<div class=\"brand-guarantee-year-number\">";
            // line 113
            echo $this->getAttribute($this->getContext($context, "guarantee"), "guaranteeLength");
            echo "</div>
\t\t\t\t\t\t\t\t<div class=\"brand-guarantee-years\">";
            // line 114
            echo $this->getAttribute($this->getContext($context, "guarantee"), "guaranteeTitle");
            echo "</div>
\t\t\t\t\t\t\t\t<div class=\"brand-guarantee-description-background\"></div>
\t\t\t\t\t\t\t\t<div class=\"brand-guarantee-description\">";
            // line 116
            echo $this->getAttribute($this->getContext($context, "guarantee"), "guaranteeType");
            echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 119
            echo "\t\t\t\t\t\t\t<p>There is not a standard guarantee for ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo ". Please refer to the individual products for information on specific guarantees.</p>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guarantee'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 121
        echo "\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t<p class=\"small\">The guarantees above are standard guarantees. Some products may have specific guarantees. Check product for details.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t   \t";
        // line 129
        if ((($this->getAttribute($this->getContext($context, "brand"), "about") || $this->getAttribute($this->getContext($context, "brand"), "history")) || $this->getAttribute($this->getContext($context, "brand"), "moreInformation"))) {
            // line 130
            echo "\t\t   \t<div class=\"grid_6 leading\">
\t            <div class=\"portlet\">
\t                <header>
\t                    <h2>More About ";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "header"), "html", null, true);
            echo "</h2>
\t                </header>
\t                <section>
\t                    <div class=\"sidebar-tabs\" style=\"min-height: 112px\">
\t                        <ul>
\t                        \t";
            // line 138
            if ($this->getAttribute($this->getContext($context, "brand"), "about")) {
                echo "<li id=\"tab-about\"><a href=\"#about\">About Us</a></li>";
            }
            // line 139
            echo "\t                            ";
            if ($this->getAttribute($this->getContext($context, "brand"), "history")) {
                echo "<li id=\"tab-history\"><a href=\"#history\">History</a></li>";
            }
            // line 140
            echo "\t                            ";
            if ($this->getAttribute($this->getContext($context, "brand"), "moreInformation")) {
                echo "<li id=\"tab-more-information\"><a href=\"#more-information\">More Information</a></li>";
            }
            // line 141
            echo "\t                        </ul>
\t                        ";
            // line 142
            if ($this->getAttribute($this->getContext($context, "brand"), "about")) {
                // line 143
                echo "\t\t                        <div id=\"about\">
\t\t                        \t";
                // line 144
                echo $this->getAttribute($this->getContext($context, "brand"), "about");
                echo "
\t\t                        </div>
\t\t                    ";
            }
            // line 147
            echo "\t\t                    ";
            if ($this->getAttribute($this->getContext($context, "brand"), "history")) {
                // line 148
                echo "\t\t                        <div id=\"history\">
\t\t                        \t";
                // line 149
                echo $this->getAttribute($this->getContext($context, "brand"), "history");
                echo "
\t\t                        </div>
\t\t                    ";
            }
            // line 152
            echo "\t\t                    ";
            if ($this->getAttribute($this->getContext($context, "brand"), "moreInformation")) {
                // line 153
                echo "\t\t                        <div id=\"more_information\">
\t\t                        \t";
                // line 154
                echo $this->getAttribute($this->getContext($context, "brand"), "moreInformation");
                echo "
\t\t                        </div>
\t\t                    ";
            }
            // line 157
            echo "\t                    </div>
\t                </section>
\t            </div>
\t        </div>
\t        <div class=\"clear\"></div>
\t\t";
        }
        // line 163
        echo "\t</section>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Brands:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  530 => 163,  522 => 157,  516 => 154,  513 => 153,  510 => 152,  504 => 149,  501 => 148,  498 => 147,  492 => 144,  489 => 143,  487 => 142,  484 => 141,  479 => 140,  474 => 139,  470 => 138,  462 => 133,  457 => 130,  455 => 129,  445 => 121,  436 => 119,  428 => 116,  423 => 114,  419 => 113,  416 => 112,  411 => 111,  407 => 110,  399 => 105,  395 => 103,  392 => 102,  388 => 100,  374 => 96,  366 => 95,  363 => 94,  359 => 93,  355 => 92,  352 => 91,  349 => 90,  346 => 89,  333 => 87,  328 => 86,  325 => 85,  322 => 84,  311 => 82,  306 => 81,  303 => 80,  300 => 79,  287 => 77,  282 => 76,  279 => 75,  276 => 74,  266 => 71,  261 => 70,  256 => 69,  250 => 68,  245 => 67,  241 => 66,  237 => 65,  234 => 64,  229 => 63,  226 => 62,  223 => 61,  215 => 59,  213 => 58,  203 => 50,  197 => 48,  193 => 46,  168 => 44,  151 => 43,  148 => 42,  146 => 41,  142 => 40,  133 => 34,  130 => 33,  127 => 32,  115 => 23,  108 => 21,  101 => 20,  93 => 18,  91 => 17,  84 => 16,  70 => 15,  67 => 14,  63 => 13,  57 => 9,  54 => 8,  51 => 7,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
