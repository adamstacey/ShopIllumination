<?php

/* WebIlluminationAdminBundle:BrandsOld:sectionSeo.html.twig */
class __TwigTemplate_6f5e7dec410e69af8da81a01cf5fd744 extends Twig_Template
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
        echo "<section id=\"seo\">
\t<div class=\"info-message ui-status-highlight\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>Search engine optimisation (SEO) is critical to the success of your site. It is strongly recommended that all the information in this section is completed.</p>
\t\t<div class=\"clear\"></div>
\t</div>
\t<div id=\"seo-confirm-reset\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\"> 
\t        <p class=\"small-message\">
\t            <span class=\"ui-icon ui-icon-help\"></span>
\t            <strong>WARNING:</strong> Are you sure you want to reset the SEO for this brand (\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "brand"), "html", null, true);
        echo "\")?
\t        </p>
\t        <p class=\"small-message message-buttons\">
\t        \t<a href=\"Javascript:void(0);\" class=\"button ui-button-delete action-reset-seo\" data-icon-primary=\"ui-icon-refresh\">Confirm Reset</a>
\t        \t<a href=\"Javascript:void(0);\" class=\"button ui-button-default action-cancel-reset-seo\">Cancel</a>
\t        </p>
\t    </div>
\t</div>
    <div class=\"clearfix\">
    \t<label for=\"form-url\" class=\"form-label\">URL<small>The internal web address</small></label>
        <div class=\"form-input\"><input class=\"seo-url\" type=\"text\" id=\"form-url\" name=\"url\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "web_address"), "url"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-page-title\" class=\"form-label\">Page Title<small>Title used by the Browser</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-page-title\" name=\"page-title\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "pageTitle"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-meta-description\" class=\"form-label\">Meta Description<small>Description used by search engines</small></label>
        <div class=\"form-input\"><textarea id=\"form-meta-description\" name=\"meta-description\" rows=\"3\">";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "metaDescription"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-meta-keywords\" class=\"form-label\">Meta Keywords<small>Keywords used by some search engines, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-meta-keywords\" name=\"meta-keywords\" rows=\"2\" class=\"items\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "metaKeywords"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-search-words\" class=\"form-label\">Search Words<small>Alternative search words for this brand, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-search-words\" name=\"search-words\" rows=\"2\" class=\"items\">";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "searchWords"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
        \t<button class=\"button ui-button-default\" data-icon-primary=\"ui-icon-check\">Save</button>
        \t<a class=\"button action-confirm-reset-seo\" href=\"Javascript:void(0);\" data-icon-primary=\"ui-icon-refresh\">Reset SEO</a>
        </div>
    </div>
    <script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t
\t\t\t";
        // line 49
        echo "\t\t\t\$(\".action-confirm-reset-seo\").live('click', function() {
\t\t\t\t\$(\"#seo-confirm-reset\").fadeIn();
\t\t\t});
\t\t\t\$(\".action-reset-seo\").live('click', function() {
\t\t\t\twindow.location = '";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_reset_seo", array("id" => $this->getAttribute($this->getContext($context, "brand_description"), "brandId"))), "html", null, true);
        echo "';
\t\t\t});
\t\t\t\$(\".action-cancel-reset-seo\").live('click', function() {
\t\t\t\t\$(\"#seo-confirm-reset\").fadeOut();
\t\t\t});
\t\t\t
\t\t\t";
        // line 60
        echo "\t\t\t";
        if ((((((($this->getAttribute($this->getContext($context, "web_address"), "url") == "") || ($this->getAttribute($this->getContext($context, "brand_description"), "pageTitle") == "")) || ($this->getAttribute($this->getContext($context, "brand_description"), "header") == "")) || ($this->getAttribute($this->getContext($context, "brand_description"), "metaDescription") == "")) || ($this->getAttribute($this->getContext($context, "brand_description"), "metaKeywords") == "")) || ($this->getAttribute($this->getContext($context, "brand_description"), "searchWords") == ""))) {
            // line 61
            echo "\t\t\t\t\$(\"#tab-seo\").addClass(\"ui-status-error\");
\t\t\t";
        } else {
            // line 63
            echo "\t\t\t\t\$(\"#tab-seo\").addClass(\"ui-status-success\");
\t\t\t";
        }
        // line 65
        echo "\t\t\t\$(\"#form-url, #form-page-title, #form-header, #form-meta-description, #form-meta-keywords, #form-search-words\").change(function() {
\t\t\t\t\$(\"#tab-seo\").removeClass(\"ui-status-success\").removeClass(\"ui-status-highlight\").removeClass(\"ui-status-error\");
\t\t\t\tif ((\$(\"#form-url\").val() == \"\") || (\$(\"#form-page-title\").val() == \"\") || (\$(\"#form-header\").val() == \"\") || (\$(\"#form-meta-description\").val() == \"\") || (\$(\"#form-meta-keywords\").val() == \"\") || (\$(\"#form-search-words\").val() == \"\"))
\t\t\t\t{
\t\t\t\t\t\$(\"#tab-seo\").addClass(\"ui-status-error\");
\t\t\t\t} else {
\t\t\t\t\t\$(\"#tab-seo\").addClass(\"ui-status-success\");
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t});
\t</script>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:sectionSeo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 102,  301 => 101,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 99,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 63,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 87,  198 => 93,  181 => 89,  167 => 50,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 88,  216 => 51,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 97,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 30,  76 => 23,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 118,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 84,  66 => 21,  56 => 29,  115 => 18,  83 => 11,  164 => 100,  140 => 43,  58 => 15,  21 => 4,  61 => 35,  36 => 4,  209 => 85,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 36,  176 => 57,  165 => 75,  161 => 49,  152 => 90,  148 => 33,  141 => 50,  134 => 42,  132 => 53,  127 => 87,  123 => 34,  109 => 63,  90 => 53,  54 => 8,  133 => 95,  124 => 21,  111 => 29,  107 => 35,  80 => 28,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 72,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 119,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 41,  125 => 123,  119 => 114,  110 => 65,  96 => 33,  93 => 74,  91 => 33,  68 => 26,  65 => 12,  63 => 33,  43 => 21,  50 => 30,  25 => 50,  92 => 28,  86 => 29,  79 => 21,  46 => 68,  37 => 3,  33 => 16,  27 => 2,  82 => 30,  72 => 22,  64 => 8,  53 => 31,  49 => 25,  44 => 5,  42 => 21,  34 => 16,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 23,  211 => 106,  204 => 98,  200 => 154,  195 => 73,  193 => 104,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 60,  77 => 25,  74 => 27,  57 => 33,  47 => 20,  39 => 19,  32 => 8,  24 => 7,  17 => 1,  135 => 50,  129 => 52,  122 => 40,  116 => 41,  113 => 36,  108 => 31,  104 => 30,  102 => 61,  94 => 33,  89 => 53,  87 => 25,  84 => 49,  81 => 20,  73 => 18,  70 => 37,  67 => 20,  62 => 17,  59 => 22,  55 => 18,  51 => 70,  48 => 23,  41 => 19,  38 => 3,  35 => 13,  31 => 13,  28 => 6,);
    }
}
