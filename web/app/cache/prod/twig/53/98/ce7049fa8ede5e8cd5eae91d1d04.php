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
        return array (  530 => 163,  504 => 149,  498 => 147,  492 => 144,  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 129,  435 => 367,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 152,  472 => 182,  456 => 382,  440 => 195,  377 => 312,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 89,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 121,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 96,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 369,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 143,  486 => 191,  473 => 428,  470 => 138,  466 => 424,  457 => 130,  451 => 182,  436 => 119,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 157,  515 => 211,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 139,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 144,  328 => 86,  325 => 85,  316 => 166,  278 => 120,  250 => 68,  163 => 104,  523 => 216,  516 => 154,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 141,  462 => 133,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 63,  206 => 88,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 157,  273 => 214,  263 => 107,  246 => 100,  234 => 64,  217 => 69,  173 => 100,  309 => 188,  285 => 80,  280 => 235,  276 => 74,  262 => 118,  235 => 189,  232 => 175,  212 => 36,  207 => 152,  143 => 71,  157 => 97,  366 => 95,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 112,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 90,  345 => 307,  306 => 81,  271 => 129,  253 => 212,  233 => 204,  226 => 62,  187 => 61,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 32,  182 => 72,  175 => 55,  144 => 25,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 63,  208 => 92,  183 => 101,  166 => 119,  423 => 114,  419 => 113,  411 => 111,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 94,  359 => 93,  355 => 92,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 80,  299 => 152,  295 => 87,  283 => 249,  279 => 75,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 33,  170 => 107,  210 => 93,  180 => 55,  172 => 99,  168 => 44,  149 => 96,  139 => 85,  240 => 99,  230 => 116,  121 => 41,  257 => 195,  249 => 74,  106 => 82,  334 => 283,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 5,  487 => 142,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 320,  352 => 91,  338 => 267,  333 => 87,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 69,  254 => 74,  252 => 101,  231 => 127,  216 => 95,  213 => 58,  202 => 35,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 116,  414 => 354,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 84,  318 => 165,  300 => 79,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 71,  261 => 70,  247 => 191,  243 => 174,  238 => 107,  220 => 79,  201 => 113,  194 => 148,  130 => 33,  100 => 43,  85 => 34,  76 => 33,  112 => 16,  101 => 20,  98 => 44,  272 => 118,  269 => 108,  228 => 126,  221 => 39,  197 => 48,  184 => 60,  138 => 80,  118 => 92,  105 => 23,  66 => 17,  56 => 13,  115 => 23,  83 => 19,  164 => 29,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 66,  192 => 120,  189 => 119,  178 => 145,  176 => 110,  165 => 101,  161 => 100,  152 => 88,  148 => 42,  141 => 93,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 41,  54 => 8,  133 => 34,  124 => 42,  111 => 64,  107 => 25,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 22,  88 => 34,  78 => 30,  75 => 17,  71 => 22,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 174,  287 => 77,  282 => 76,  268 => 128,  264 => 112,  259 => 123,  245 => 67,  241 => 66,  236 => 187,  222 => 158,  218 => 105,  159 => 91,  154 => 43,  151 => 43,  145 => 77,  136 => 100,  128 => 30,  125 => 88,  119 => 28,  110 => 52,  96 => 30,  93 => 18,  91 => 17,  68 => 21,  65 => 8,  63 => 13,  43 => 12,  50 => 15,  25 => 8,  92 => 70,  86 => 25,  79 => 18,  46 => 7,  37 => 3,  33 => 3,  27 => 2,  82 => 31,  72 => 37,  64 => 16,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 6,  19 => 2,  40 => 4,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 65,  215 => 59,  211 => 178,  204 => 61,  200 => 104,  195 => 54,  193 => 46,  190 => 92,  188 => 57,  185 => 108,  179 => 100,  177 => 105,  171 => 31,  162 => 62,  158 => 132,  156 => 90,  153 => 97,  146 => 41,  142 => 40,  137 => 86,  131 => 31,  126 => 92,  120 => 69,  117 => 50,  103 => 24,  99 => 23,  77 => 54,  74 => 29,  57 => 9,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 32,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 21,  104 => 58,  102 => 17,  94 => 21,  89 => 38,  87 => 36,  84 => 16,  81 => 27,  73 => 28,  70 => 15,  67 => 14,  62 => 25,  59 => 13,  55 => 12,  51 => 7,  48 => 8,  41 => 7,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
