<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_93be19e6936dbe24a66858b2a196d140 extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 231,  257 => 225,  230 => 200,  117 => 90,  78 => 55,  86 => 39,  77 => 34,  71 => 30,  56 => 36,  133 => 58,  109 => 43,  99 => 39,  89 => 35,  85 => 60,  76 => 28,  53 => 14,  45 => 17,  33 => 9,  48 => 11,  44 => 10,  22 => 4,  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 62,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 41,  97 => 13,  80 => 35,  75 => 11,  72 => 10,  28 => 5,  21 => 4,  42 => 23,  37 => 10,  32 => 6,  27 => 6,  20 => 2,  64 => 22,  62 => 25,  59 => 21,  52 => 17,  49 => 13,  47 => 11,  41 => 11,  31 => 13,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 187,  159 => 27,  154 => 68,  151 => 66,  145 => 10,  142 => 61,  136 => 8,  131 => 125,  128 => 124,  122 => 50,  119 => 18,  108 => 117,  93 => 36,  91 => 105,  70 => 25,  65 => 44,  63 => 83,  57 => 17,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 11,  25 => 5,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 60,  129 => 89,  125 => 123,  116 => 47,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 52,  68 => 29,  60 => 24,  54 => 21,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
