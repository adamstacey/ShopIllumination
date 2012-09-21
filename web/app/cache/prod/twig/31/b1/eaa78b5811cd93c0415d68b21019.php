<?php

/* WebIlluminationAdminBundle:Departments:updateSeo.html.twig */
class __TwigTemplate_31b1eaa78b5811cd93c0415d68b21019 extends Twig_Template
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
        echo "<section id=\"seo\" class=\"form ui-helper-hidden\">
\t<h2>Search Engine Optimisation (SEO)</h2>
\t<div id=\"seo-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
\t        <p>
\t        \t<button class=\"button action-update-seo-section ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        \t<button class=\"button ui-button-red action-leave-seo\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
\t        \t<input type=\"hidden\" value=\"-1\" id=\"seo-tab-to-redirect-to\" />
\t        \t<input type=\"hidden\" value=\"0\" id=\"seo-requires-update\" />
\t        </p>
\t    </div>
\t    <div class=\"spacer\"></div>
\t</div>
\t<div class=\"ui-widget info-message\">
\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p>Search engine optimisation (SEO) is critical to the success of your site. It is strongly recommended that all the information in this section is completed.</p>
\t\t</div>
\t</div>
    <div class=\"clearfix\">
        <label for=\"form-page-title\" class=\"form-label\">Page Title<small><span class=\"red\">VERY IMPORTANT</span><br />Title used by the Browser</small></label>
        <div class=\"form-input\"><textarea class=\"maximum-characters\" data-maximum-characters=\"70\" data-maximum-characters-object=\"form-page-title-maximum-characters\" id=\"form-page-title\" name=\"page-title\" rows=\"2\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "pageTitle"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-page-title-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-header\" class=\"form-label\">Header<small><span class=\"red\">VERY IMPORTANT</span><br />Main header on the page</small></label>
        <div class=\"form-input\"><textarea id=\"form-header\" name=\"header\" rows=\"2\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "header"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-meta-description\" class=\"form-label\">Meta Description<small><span class=\"red\">VERY IMPORTANT</span><br />Your \"Advert\" in organic search results. Need to include keywords but primarily needs to entice people to click through by using a call to action with benefits (e.g. lowest price, in stock, free delivery, etc).</small></label>
        <div class=\"form-input\"><textarea class=\"maximum-characters\" data-maximum-characters=\"160\" data-maximum-characters-object=\"form-meta-description-maximum-characters\" id=\"form-meta-description\" name=\"meta-description\" rows=\"7\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "metaDescription"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-meta-description-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-search-words\" class=\"form-label\">Search Words<small>Alternative words this department can be found by, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-search-words\" name=\"search-words\" rows=\"2\" class=\"items\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "searchWords"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
    \t<label for=\"form-url\" class=\"form-label\">Internal Web Address<small>Use 7 keywords maximum. Focus on the brand and departments.</small></label>
        <div class=\"form-input\"><textarea class=\"seo-url\" id=\"form-url\" name=\"url\" rows=\"2\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "url"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
        \t<input type=\"hidden\" id=\"form-meta-keywords\" name=\"meta-keywords\" class=\"items\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "metaKeywords"), "html", null, true);
        echo "\" />
        \t<button class=\"button ui-button-green action-update-seo-section\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button class=\"button ui-button-blue action-reset-seo\" data-icon-primary=\"ui-icon-refresh\">Reset Seo</button>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateSeo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 32,  115 => 89,  83 => 60,  164 => 126,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 32,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 25,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 11,  82 => 27,  72 => 16,  64 => 12,  53 => 34,  49 => 28,  44 => 5,  42 => 24,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 20,  20 => 2,  30 => 12,  26 => 6,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 125,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 44,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 9,  24 => 6,  17 => 1,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 79,  102 => 70,  94 => 70,  89 => 20,  87 => 28,  84 => 53,  81 => 26,  73 => 19,  70 => 40,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
