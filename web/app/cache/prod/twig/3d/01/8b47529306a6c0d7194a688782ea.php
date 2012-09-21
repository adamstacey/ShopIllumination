<?php

/* WebIlluminationAdminBundle:BrandsOld:sectionStatisticsKeywordPerformance.html.twig */
class __TwigTemplate_3d018b47529306a6c0d7194a688782ea extends Twig_Template
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
        echo "<section id=\"statistics-suggested-keywords\">
    <div class=\"info-message ui-status-highlight\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>It is important to know what visitors are currently searching for in the search engines, so the keywords used in your content can reflect this.</p>
\t\t<div class=\"clear\"></div>
\t</div>
\t";
        // line 7
        if ((twig_length_filter($this->env, $this->getContext($context, "suggested_keywords")) > 0)) {
            // line 8
            echo "\t\t<table class=\"display\" id=\"data-suggested-keywords\"> 
\t\t    <thead> 
\t\t        <tr> 
\t\t            <th class=\"left\">Keyword</th> 
\t\t            <th class=\"center\">Average Monthly Searches</th>
\t\t            <th class=\"center\">Global Monthly Searches</th>
\t\t            <th class=\"center\">Competition</th> 
\t\t        </tr> 
\t\t    </thead> 
\t\t    <tbody>
\t\t    \t";
            // line 18
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "suggested_keywords"));
            foreach ($context['_seq'] as $context["_key"] => $context["keyword"]) {
                // line 19
                echo "\t\t    \t\t<tr>
\t\t    \t\t\t<td class=\"left\">";
                // line 20
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "keyword", true), "keyword", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "keyword", true), "keyword"), "-")) : ("-")), "html", null, true);
                echo "</td>
\t\t    \t\t\t<td class=\"center\">";
                // line 21
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "keyword", true), "average_monthly_searches", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "keyword", true), "average_monthly_searches"), "0")) : ("0")), "html", null, true);
                echo "</td>
\t\t    \t\t\t<td class=\"center\">";
                // line 22
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "keyword", true), "global_monthly_searches", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "keyword", true), "global_monthly_searches"), "0")) : ("0")), "html", null, true);
                echo "</td>
\t\t    \t\t\t<td class=\"center\">";
                // line 23
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "keyword", true), "competition", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "keyword", true), "competition"), "0")) : ("0")), "html", null, true);
                echo "%</td>
\t\t    \t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['keyword'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "\t\t    </tbody> 
\t\t</table>
\t";
        } else {
            // line 29
            echo "\t    <div class=\"product-warning ui-status-error no-margin-bottom\">
\t\t\t<span class=\"product-warning-icon ui-icon ui-icon-circle-close\"></span>
\t\t\t<p>Sorry, we could not find any suggested keywords on the Internet that match keyword phrase.</p>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t";
        }
        // line 34
        echo "\t
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
        // line 37
        if ((twig_length_filter($this->env, $this->getContext($context, "suggested_keywords")) > 0)) {
            // line 38
            echo "\t\t\t\t\$('#data-suggested-keywords').dataTable().fnSort([[1,'desc']]);
\t\t\t";
        }
        // line 40
        echo "\t\t});
\t</script>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:sectionStatisticsKeywordPerformance.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 93,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 52,  150 => 40,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 45,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 171,  114 => 31,  208 => 58,  183 => 50,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 85,  299 => 181,  295 => 99,  283 => 77,  279 => 176,  275 => 175,  265 => 74,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 63,  334 => 31,  294 => 25,  286 => 20,  277 => 76,  255 => 8,  244 => 3,  214 => 87,  198 => 93,  181 => 89,  167 => 50,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 68,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 164,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 37,  76 => 23,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 118,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 32,  105 => 84,  66 => 21,  56 => 29,  115 => 18,  83 => 11,  164 => 100,  140 => 43,  58 => 23,  21 => 4,  61 => 35,  36 => 4,  209 => 85,  205 => 69,  196 => 79,  192 => 61,  189 => 53,  178 => 36,  176 => 47,  165 => 75,  161 => 42,  152 => 90,  148 => 39,  141 => 50,  134 => 42,  132 => 53,  127 => 87,  123 => 34,  109 => 63,  90 => 17,  54 => 22,  133 => 95,  124 => 33,  111 => 29,  107 => 30,  80 => 34,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 72,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 41,  125 => 123,  119 => 114,  110 => 65,  96 => 33,  93 => 18,  91 => 40,  68 => 10,  65 => 9,  63 => 33,  43 => 19,  50 => 21,  25 => 7,  92 => 28,  86 => 29,  79 => 13,  46 => 20,  37 => 17,  33 => 16,  27 => 8,  82 => 14,  72 => 29,  64 => 8,  53 => 31,  49 => 6,  44 => 5,  42 => 21,  34 => 16,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 119,  188 => 70,  185 => 76,  179 => 48,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 60,  77 => 25,  74 => 27,  57 => 33,  47 => 20,  39 => 18,  32 => 13,  24 => 7,  17 => 1,  135 => 50,  129 => 52,  122 => 40,  116 => 41,  113 => 36,  108 => 31,  104 => 30,  102 => 61,  94 => 33,  89 => 53,  87 => 38,  84 => 49,  81 => 20,  73 => 11,  70 => 37,  67 => 26,  62 => 17,  59 => 22,  55 => 18,  51 => 70,  48 => 23,  41 => 19,  38 => 3,  35 => 13,  31 => 13,  28 => 11,);
    }
}
