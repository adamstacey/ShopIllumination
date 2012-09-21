<?php

/* WebIlluminationAdminBundle:BrandsOld:index.html.twig */
class __TwigTemplate_24794e633d429332d8f571a78aec342a extends Twig_Template
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
        echo "Brands  | ";
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
    }

    // line 9
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 11
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<h2>Brands</h2>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    <section class=\"container_6 clearfix\">
    \t<div class=\"grid_6\">
    \t\t<table class=\"data-table\" id=\"data-brands\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th width=\"1\" class=\"center\">&nbsp;</th>
\t\t\t\t\t\t<th width=\"1\" class=\"center\">&nbsp;</th>
\t\t\t\t\t\t<th class=\"left\">Brand</th>
\t\t\t\t\t\t<th width=\"1\" class=\"center\">&nbsp;</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            echo "\t
\t\t\t\t\t\t<tr id=\"brand-";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<td width=\"1\" class=\"center select delete\"><input data-id=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"brand-select\" id=\"brand-select-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "description"), "brand"), "html", null, true);
            echo "\" value=\"1\" /></td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"center\">";
            // line 33
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "logo", array(), "any", false, true), "thumbnailPath", array(), "any", true, true)) {
                echo "<img class=\"thumbnail action-image-popup\" data-image-large-path=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "largePath"), "html", null, true);
                echo "\" data-image-size-width=\"300\" data-image-size-height=\"150\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "thumbnailPath"), "html", null, true);
                echo "\" width=\"50\" height=\"25\" border=\"0\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "description"), "brand"), "html", null, true);
                echo "\" />";
            } else {
                echo "&nbsp;";
            }
            echo "</td>
\t\t\t\t\t\t\t<td class=\"left\"><a class=\"link\" href=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_edit", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "description"), "brand"), "html", null, true);
            echo "</a></td>
\t\t\t\t\t\t\t<td class=\"left small\">
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td class=\"left small\">
\t\t\t\t\t\t\t\t";
            // line 39
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactNumbers", array(), "any", true, true)) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactNumbers"));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["number"]) {
                    // line 41
                    echo "\t\t\t\t\t\t\t\t\t\t<em>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "numberType"), "contactNumberType"), "html", null, true);
                    echo "</em><br />
\t\t\t\t\t\t\t\t\t\t";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "number"), "number"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 45
                    echo "\t\t\t\t\t\t\t\t\t\t&nbsp;-&nbsp;
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['number'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 47
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 48
                echo "\t\t\t\t\t\t\t\t\t&nbsp;-&nbsp;
\t\t\t\t\t\t\t\t";
            }
            // line 50
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td class=\"left small\">
\t\t\t\t\t\t\t\t";
            // line 52
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactNumbers", array(), "any", true, true)) {
                // line 53
                echo "\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactNumbers"));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["number"]) {
                    // line 54
                    echo "\t\t\t\t\t\t\t\t\t\t<em>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "numberType"), "contactNumberType"), "html", null, true);
                    echo "</em><br />
\t\t\t\t\t\t\t\t\t\t";
                    // line 55
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "number"), "number"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 58
                    echo "\t\t\t\t\t\t\t\t\t\t&nbsp;-&nbsp;
\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['number'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 60
                echo "\t\t\t\t\t\t\t\t";
            } else {
                // line 61
                echo "\t\t\t\t\t\t\t\t\t&nbsp;-&nbsp;
\t\t\t\t\t\t\t\t";
            }
            // line 63
            echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t<td width=\"1\" class=\"center no-wrap\">
\t\t\t\t\t\t\t\t<div id=\"contact-card";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"), "html", null, true);
            echo "\" class=\"contact-card\">
\t\t\t\t\t\t\t\t\t<div class=\"contact-card-addresses\">
\t\t\t\t\t\t\t\t\t\t";
            // line 67
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactAddresses", array(), "any", true, true)) {
                // line 68
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactAddresses"));
                foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 70
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "displayName")) {
                        echo "<strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "displayName"), "html", null, true);
                        echo "</strong>";
                    }
                    // line 71
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine1")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine1"), "html", null, true);
                    }
                    // line 72
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine2")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine2"), "html", null, true);
                    }
                    // line 73
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine3")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "addressLine3"), "html", null, true);
                    }
                    // line 74
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "townCity")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "townCity"), "html", null, true);
                    }
                    // line 75
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "countyState")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "countyState"), "html", null, true);
                    }
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "postZipCode")) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "address"), "address"), "postZipCode"), "html", null, true);
                    }
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 79
                echo "\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 80
                echo "\t\t\t\t\t\t\t\t\t\t\t<p>No addresses found for this contact.</p>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 82
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"contact-card-numbers\">
\t\t\t\t\t\t\t\t\t\t";
            // line 84
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactNumbers", array(), "any", true, true)) {
                // line 85
                echo "\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 86
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactNumbers"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["number"]) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "numberType"), "contactNumberType"), "html", null, true);
                    echo ":</strong> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "number"), "number"), "number"), "html", null, true);
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "<br />";
                    }
                    // line 88
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['number'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 89
                echo "\t\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 91
                echo "\t\t\t\t\t\t\t\t\t\t\t<p>No contact numbers found for this contact.</p>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 93
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            // line 94
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactEmailAddresses", array(), "any", true, true)) {
                // line 95
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"contact-card-email-addresses\">
\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 97
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactEmailAddresses"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["emailAddress"]) {
                    // line 98
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "emailAddress"), "emailAddressType"), "contactEmailAddressType"), "html", null, true);
                    echo ":</strong> <a target=\"_blank\" href=\"mailto:";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "emailAddress"), "emailAddress"), "email"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "emailAddress"), "emailAddress"), "displayName"), "html", null, true);
                    echo "</a>";
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "<br />";
                    }
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['emailAddress'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 100
                echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 103
            echo "\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "contact", array(), "any", false, true), "contactWebAddresses", array(), "any", true, true)) {
                // line 104
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"contact-card-web-addresses\">
\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 106
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "contact"), "contactWebAddresses"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["webAddress"]) {
                    // line 107
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "webAddress"), "webAddressType"), "contactWebAddressType"), "html", null, true);
                    echo ":</strong> <a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "webAddress"), "webAddress"), "url"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "webAddress"), "webAddress"), "displayName"), "html", null, true);
                    echo "</a>";
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "<br />";
                    }
                    // line 108
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['webAddress'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 109
                echo "\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 112
            echo "\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_edit", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"))), "html", null, true);
            echo "\" class=\"button\" data-icon-primary=\"ui-icon-search\" data-icon-only=\"true\">Preview</a>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_edit", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"))), "html", null, true);
            echo "\" class=\"button\" data-icon-primary=\"ui-icon-contact\" data-icon-only=\"true\">View Contact</a>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 116
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_edit", array("id" => $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"))), "html", null, true);
            echo "\" class=\"button ui-button-default\t\" data-icon-primary=\"ui-icon-pencil\" data-icon-only=\"true\">Update</a>
\t\t\t\t\t\t\t\t<a href=\"Javascript:void(0);\" data-id=\"";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "brand"), "id"), "html", null, true);
            echo "\" class=\"button ui-button-delete action-confirm-delete-brand\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</a>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t    \t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 121
            echo "\t\t\t    \t\t
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 123
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</section>
\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
        // line 130
        echo "\t\t\t\$(\"#data-brands\").dataTable({
\t            \"bJQueryUI\": true,
                \"bRetrieve\": true, 
                \"bDestroy\": true,
                \"sPaginationType\": \"full_numbers\",
\t            \"aoColumns\": [
\t\t            { \"bSortable\": false },
\t\t\t\t\t{ \"bSortable\": false },
\t\t            { \"asSorting\": [ \"desc\", \"asc\", \"asc\" ] },
\t\t\t\t\t{ \"asSorting\": [ \"desc\", \"asc\", \"asc\" ] },
\t\t\t\t\t{ \"asSorting\": [ \"desc\", \"asc\", \"asc\" ] },
\t\t\t\t\t{ \"asSorting\": [ \"desc\", \"asc\", \"asc\" ] },
\t\t\t\t\t{ \"bSortable\": false }
\t\t        ],
\t\t\t\t\"bDestroy\": true
\t        });
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 93,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 52,  150 => 40,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 45,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 171,  114 => 31,  208 => 58,  183 => 50,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 85,  299 => 181,  295 => 99,  283 => 77,  279 => 176,  275 => 175,  265 => 74,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 63,  334 => 31,  294 => 25,  286 => 20,  277 => 76,  255 => 8,  244 => 3,  214 => 87,  198 => 93,  181 => 89,  167 => 50,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 68,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 164,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 30,  76 => 23,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 118,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 32,  105 => 84,  66 => 21,  56 => 29,  115 => 18,  83 => 11,  164 => 100,  140 => 43,  58 => 15,  21 => 4,  61 => 35,  36 => 4,  209 => 85,  205 => 69,  196 => 79,  192 => 61,  189 => 53,  178 => 36,  176 => 47,  165 => 75,  161 => 42,  152 => 90,  148 => 39,  141 => 50,  134 => 42,  132 => 53,  127 => 87,  123 => 34,  109 => 63,  90 => 17,  54 => 8,  133 => 95,  124 => 33,  111 => 29,  107 => 30,  80 => 28,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 72,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 41,  125 => 123,  119 => 114,  110 => 65,  96 => 33,  93 => 18,  91 => 33,  68 => 10,  65 => 9,  63 => 33,  43 => 21,  50 => 30,  25 => 50,  92 => 28,  86 => 29,  79 => 13,  46 => 68,  37 => 3,  33 => 16,  27 => 2,  82 => 14,  72 => 22,  64 => 8,  53 => 31,  49 => 6,  44 => 5,  42 => 21,  34 => 16,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 119,  188 => 70,  185 => 76,  179 => 48,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 60,  77 => 25,  74 => 27,  57 => 33,  47 => 20,  39 => 19,  32 => 8,  24 => 7,  17 => 1,  135 => 50,  129 => 52,  122 => 40,  116 => 41,  113 => 36,  108 => 31,  104 => 30,  102 => 61,  94 => 33,  89 => 53,  87 => 25,  84 => 49,  81 => 20,  73 => 11,  70 => 37,  67 => 20,  62 => 17,  59 => 22,  55 => 18,  51 => 70,  48 => 23,  41 => 19,  38 => 3,  35 => 13,  31 => 13,  28 => 6,);
    }
}
