<?php

/* WebIlluminationShopBundle:System:mainMenu.html.twig */
class __TwigTemplate_068cb3177d27c5a21753a9d122527b79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"main-menu clearfix\">
\t<nav class=\"container_8\">
\t    <a data-department-id=\"brands\" class=\"button sub-department-link ui-button-dark-grey ui-corner-none ui-corner-tl ui-corner-tr main-menu-button fr\" href=\"Javascript:void(0);\">Brands</a>
\t    <ul class=\"sf-menu clearfix\">
\t    \t";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
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
            // line 6
            echo "\t\t\t\t<li><a data-department-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" class=\"sub-department-link";
            if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                echo " special";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "department"), "url"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "department"), "menuTitle");
            echo "</a></li>
\t\t\t";
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
        // line 8
        echo "\t    </ul>
\t    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 10
            echo "\t    \t";
            if ($this->getAttribute($this->getContext($context, "department", true), "departments", array(), "any", true, true)) {
                // line 11
                echo "\t    \t\t<div id=\"sub-department-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
                echo "\" class=\"sub-departments\">
\t    \t\t\t";
                // line 12
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "department"), "departments"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["subDepartment"]) {
                    // line 13
                    echo "\t    \t\t\t\t<div class=\"sub-department";
                    if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                        echo " sub-department-last";
                    }
                    echo "\">
\t\t    \t\t\t\t<h4><a href=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "subDepartment"), "url"))), "html", null, true);
                    echo "\">";
                    echo $this->getAttribute($this->getContext($context, "subDepartment"), "menuTitle");
                    echo "</a></h4>
\t\t    \t\t\t\t";
                    // line 15
                    if ($this->getAttribute($this->getContext($context, "subDepartment", true), "departments", array(), "any", true, true)) {
                        // line 16
                        echo "\t\t    \t\t\t\t\t<ul>
\t\t\t    \t\t\t\t\t";
                        // line 17
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "subDepartment"), "departments"));
                        foreach ($context['_seq'] as $context["_key"] => $context["subSubDepartment"]) {
                            // line 18
                            echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "subSubDepartment"), "url"))), "html", null, true);
                            echo "\">";
                            echo $this->getAttribute($this->getContext($context, "subSubDepartment"), "menuTitle");
                            echo "</a></li>
\t\t\t    \t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subSubDepartment'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 20
                        echo "\t\t    \t\t\t\t\t</ul>
\t\t    \t\t\t\t";
                    }
                    // line 21
                    echo "\t
\t\t    \t\t\t</div>
\t\t    \t\t\t";
                    // line 23
                    if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                        // line 24
                        echo "\t\t    \t\t\t\t<div class=\"clear\"></div>
\t\t    \t\t\t";
                    }
                    // line 25
                    echo "\t
\t    \t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subDepartment'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 27
                echo "\t    \t\t\t<div class=\"clear\"></div>
\t    \t\t</div>
\t    \t";
            }
            // line 29
            echo "\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "\t\t<div id=\"sub-department-brands\" class=\"sub-departments brands padding-top-10 padding-bottom-10\">
\t\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 33
            echo "\t\t\t\t<div class=\"brand ";
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 1)) {
                echo " brand-first";
            }
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                echo " brand-last";
            }
            echo "\">
    \t\t\t\t<h4>
    \t\t\t\t\t";
            // line 35
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "logo", array(), "any", false, true), "thumbnailPath", array(), "any", true, true)) {
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "brand"), "url"))), "html", null, true);
                echo "\"><img class=\"fl\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "thumbnailPath")), "html", null, true);
                echo "\" border=\"0\" alt=\"";
                echo $this->getAttribute($this->getContext($context, "brand"), "brand");
                echo "\" width=\"48\" height=\"23\" /></a>";
            }
            // line 36
            echo "    \t\t\t\t\t<a class=\"text\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "brand"), "url"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "brand"), "brand");
            echo "</a>
    \t\t\t\t</h4>
    \t\t\t</div>
    \t\t\t";
            // line 39
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                // line 40
                echo "    \t\t\t\t<div class=\"clear\"></div>
    \t\t\t";
            }
            // line 42
            echo "\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t</nav>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:System:mainMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 25,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 14,  97 => 13,  80 => 12,  75 => 11,  72 => 10,  28 => 5,  21 => 3,  42 => 9,  37 => 8,  32 => 6,  27 => 5,  20 => 2,  64 => 23,  62 => 22,  59 => 21,  52 => 17,  49 => 16,  47 => 11,  41 => 14,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 27,  154 => 14,  151 => 13,  145 => 10,  142 => 9,  136 => 8,  131 => 125,  128 => 124,  122 => 122,  119 => 18,  108 => 117,  93 => 106,  91 => 105,  70 => 86,  65 => 8,  63 => 83,  57 => 20,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 10,  25 => 4,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 92,  129 => 89,  125 => 123,  116 => 120,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 9,  60 => 15,  54 => 12,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
