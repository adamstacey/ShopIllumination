<?php

/* ::adminFlashMessages.html.twig */
class __TwigTemplate_d60b354a01164562eae2f7ca0f9100c8 extends Twig_Template
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
        echo "<section class=\"container_8 clearfix\">
\t<div id=\"flash_messages\" class=\"grid_8\">
\t\t<div id=\"message-notice\" class=\"ui-widget message closeable";
        // line 3
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method"))) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t    <div class=\"ui-state-highlight ui-corner-all\"> 
\t\t    \t<span class=\"ui-icon ui-icon-info\"></span>
\t\t        <p>
\t\t            <strong>NOTICE:</strong> <span class=\"message-text\">";
        // line 7
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
        }
        echo "</span>
\t\t        </p>
\t\t    </div>
\t\t</div>
\t\t<div id=\"message-success\" class=\"ui-widget message closeable";
        // line 11
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "success"), "method"))) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t    <div class=\"ui-state-success ui-corner-all\"> 
\t\t    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
\t\t        <p>\t\t            
\t\t            <strong>SUCCESS:</strong> <span class=\"message-text\">";
        // line 15
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "success"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "success"), "method"), "html", null, true);
        }
        echo "</span>
\t\t        </p>
\t\t    </div>
\t\t</div>
\t\t<div id=\"message-error\" class=\"ui-widget message closeable";
        // line 19
        if ((!$this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method"))) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t    <div class=\"ui-state-error ui-corner-all\"> 
\t\t         <span class=\"ui-icon ui-icon-alert\"></span> 
\t\t        <p>
\t\t            <strong>ERROR:</strong> <span class=\"message-text\">";
        // line 23
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "error"), "method"), "html", null, true);
        }
        echo "</span>
\t\t        </p>
\t\t    </div>
\t\t</div>
\t</div>
</section>

";
    }

    public function getTemplateName()
    {
        return "::adminFlashMessages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 23,  48 => 15,  30 => 7,  34 => 7,  32 => 6,  25 => 4,  21 => 3,  17 => 1,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 60,  318 => 49,  314 => 47,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 38,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 31,  238 => 28,  224 => 27,  220 => 26,  215 => 23,  201 => 22,  197 => 21,  194 => 20,  138 => 18,  133 => 8,  130 => 7,  124 => 6,  119 => 114,  116 => 113,  113 => 112,  110 => 111,  107 => 110,  100 => 106,  96 => 104,  87 => 98,  85 => 97,  82 => 96,  80 => 95,  76 => 93,  71 => 90,  69 => 87,  62 => 83,  57 => 19,  54 => 79,  52 => 78,  43 => 11,  41 => 43,  37 => 8,  35 => 7,  31 => 6,  24 => 1,  99 => 42,  94 => 103,  91 => 40,  70 => 23,  64 => 84,  50 => 8,  47 => 7,  39 => 11,  36 => 3,  29 => 5,);
    }
}
