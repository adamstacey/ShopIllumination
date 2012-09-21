<?php

/* ::shopFlashMessages.html.twig */
class __TwigTemplate_8724754d78a59238eeac24cfdc5bfb20 extends Twig_Template
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
        echo "<div id=\"flash-messages\">
\t<div id=\"message-notice\" class=\"ui-widget message ui-corner-bottom closeable ui-helper-hidden\">
    \t<span class=\"ui-icon ui-icon-info\"></span>
        <p>
            <strong>NOTICE:</strong> <span id=\"message-notice-text\">";
        // line 5
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
        }
        echo "</span>
        </p>
\t</div>
\t<div id=\"message-success\" class=\"ui-widget message ui-corner-bottom closeable ui-helper-hidden\">
    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
        <p>\t\t            
            <strong>SUCCESS:</strong> <span id=\"message-success-text\">";
        // line 11
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "success"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "success"), "method"), "html", null, true);
        }
        echo "</span>
        </p>
\t</div>
\t<div id=\"message-error\" class=\"ui-widget message ui-corner-bottom closeable ui-helper-hidden\">
        <span class=\"ui-icon ui-icon-alert\"></span> 
        <p>
            <strong>ERROR:</strong> <span id=\"message-error-text\">";
        // line 17
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "error"), "method"), "html", null, true);
        }
        echo "</span>
        </p>
\t</div>
</div>
";
        // line 21
        if ((($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method") || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "success"), "method"))) {
            // line 22
            echo "\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
            // line 24
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
                // line 25
                echo "\t\t\t\t\$(\"#message-notice\").slideDown(function() {
\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t});
\t\t\t";
            }
            // line 29
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "success"), "method")) {
                // line 30
                echo "\t\t\t\t\$(\"#message-success\").slideDown(function() {
\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t});
\t\t\t";
            }
            // line 34
            echo "\t\t\t";
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method")) {
                // line 35
                echo "\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t});
\t\t\t";
            }
            // line 39
            echo "\t\t});
\t</script>
";
        }
    }

    public function getTemplateName()
    {
        return "::shopFlashMessages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 39,  77 => 34,  71 => 30,  56 => 22,  133 => 58,  109 => 43,  99 => 39,  89 => 35,  85 => 34,  76 => 28,  53 => 14,  45 => 17,  33 => 9,  48 => 11,  44 => 10,  22 => 4,  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 62,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 41,  97 => 13,  80 => 35,  75 => 11,  72 => 10,  28 => 5,  21 => 3,  42 => 9,  37 => 10,  32 => 6,  27 => 5,  20 => 2,  64 => 22,  62 => 25,  59 => 21,  52 => 17,  49 => 13,  47 => 11,  41 => 11,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 27,  154 => 68,  151 => 66,  145 => 10,  142 => 61,  136 => 8,  131 => 125,  128 => 124,  122 => 50,  119 => 18,  108 => 117,  93 => 36,  91 => 105,  70 => 25,  65 => 8,  63 => 83,  57 => 17,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 11,  25 => 7,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 60,  129 => 89,  125 => 123,  116 => 47,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 29,  60 => 24,  54 => 21,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
