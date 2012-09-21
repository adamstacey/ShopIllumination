<?php

/* WebIlluminationAdminBundle:Departments:updatePrices.html.twig */
class __TwigTemplate_ef5d9df96a5e55f889ae6e6ac3be873f extends Twig_Template
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
        echo "<section id=\"prices\" class=\"form ui-helper-hidden\">
\t<h2>Prices</h2>
\t<div class=\"clearfix\">
\t\t<div class=\"clearfix\">
\t        <label for=\"form-hide-prices\" class=\"form-label\">Hide Prices<small>Hide prices for this department?</small></label>
\t        <div class=\"form-input\"><label><input type=\"radio\" name=\"hide-prices\" id=\"form-hide-prices-1\" value=\"1\"";
        // line 6
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "hidePrices") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"hide-prices\" id=\"form-hide-prices-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "hidePrices") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t    <div id=\"show-prices-out-of-hours-container\" class=\"";
        // line 8
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "hidePrices") == 0)) {
            echo "ui-helper-hidden ";
        }
        echo "clearfix\">
\t        <label for=\"form-show-prices-out-of-hours\" class=\"form-label\">Show Prices Out of Hours<small>Show prices out of hours?</small></label>
\t        <div class=\"form-input\"><label><input type=\"radio\" name=\"show-prices-out-of-hours\" id=\"form-show-prices-out-of-hours-1\" value=\"1\"";
        // line 10
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "showPricesOutOfHours") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"show-prices-out-of-hours\" id=\"form-show-prices-out-of-hours-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "showPricesOutOfHours") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t\t<div class=\"clearfix\">
\t        <label for=\"form-membership-card-discount-available\" class=\"form-label\">Discount with Membership<small>Discount with membership card?</small></label>
\t        <div class=\"form-input\" id=\"form-membership-card-discount-available\"><label><input type=\"radio\" name=\"membership-card-discount-available\" id=\"form-membership-card-discount-available-1\" value=\"1\"";
        // line 14
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "membershipCardDiscountAvailable") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"membership-card-discount-available\" id=\"form-membership-card-discount-available-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "membershipCardDiscountAvailable") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t    <div id=\"maximum-membership-card-discount-container\" class=\"";
        // line 16
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "membershipCardDiscountAvailable") == 0)) {
            echo "ui-helper-hidden ";
        }
        echo "clearfix\">
\t        <label for=\"form-maximum-membership-card-discount\" class=\"form-label\">Membership Discount (%)<small>Maximum membership discount</small></label>
\t        <div class=\"form-input\"><input type=\"text\" id=\"form-maximum-membership-card-discount\" name=\"maximum-membership-card-discount\" class=\"decimal\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "maximumMembershipCardDiscount"), 2), "html", null, true);
        echo "\" /></div>
\t    </div>
\t    <div class=\"clearfix\">
\t        <div class=\"form-input-long buttons\">
\t        \t<button class=\"button ui-button-green action-update-price-settings-section\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        </div>
\t    </div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updatePrices.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 20,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 61,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 73,  66 => 16,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 46,  123 => 96,  109 => 63,  90 => 30,  54 => 79,  133 => 8,  124 => 90,  111 => 78,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 78,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 12,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 45,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 13,  27 => 9,  82 => 55,  72 => 20,  64 => 18,  53 => 10,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 11,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 57,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 83,  59 => 21,  55 => 14,  51 => 30,  48 => 43,  41 => 11,  38 => 3,  35 => 8,  31 => 42,  28 => 3,);
    }
}
