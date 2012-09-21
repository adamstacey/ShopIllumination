<?php

/* WebIlluminationAdminBundle:BrandsOld:sectionGeneral.html.twig */
class __TwigTemplate_ea390b476225751c04ee12d76fd8f532 extends Twig_Template
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
        echo "<section id=\"general\">
\t<div class=\"clearfix\">
        <label for=\"form-status\" class=\"form-label\"><em>*</em> Status<small>Is the brand available?</small></label>
        <div class=\"form-input status\" id=\"form-status\"><label><input type=\"radio\" name=\"status\" id=\"form-status-a\" value=\"a\"";
        // line 4
        if (($this->getAttribute($this->getContext($context, "brand"), "status") == "a")) {
            echo " checked=\"checked\"";
        }
        echo " /> Active</label> <label><input type=\"radio\" name=\"status\" id=\"form-status-h\" value=\"h\"";
        if (($this->getAttribute($this->getContext($context, "brand"), "status") == "h")) {
            echo " checked=\"checked\"";
        }
        echo " /> Hidden</label> <label><input type=\"radio\" name=\"status\" id=\"form-status-d\" value=\"d\"";
        if (($this->getAttribute($this->getContext($context, "brand"), "status") == "d")) {
            echo " checked=\"checked\"";
        }
        echo " /> Disabled</label></div>
    </div>
\t<div class=\"clearfix\">
        <label for=\"form-name\" class=\"form-label\"><em>*</em> Name<small>Enter the brand name</small></label>
\t    <div class=\"form-input\"><input type=\"text\" id=\"form-brand-name\" name=\"brand-name\" required=\"required\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "brand"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-header\" class=\"form-label\"><em>*</em> Header<small>Main header on the page</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-header\" name=\"header\" required=\"required\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "header"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-logo-image\" class=\"form-label\">Logo Image<small>Format: jpg, png or gif</small></label>
        <div class=\"form-input\">
        \t<input type=\"file\" id=\"form-logo-image\" name=\"logo-image\" />
        \t";
        // line 18
        if ($this->getAttribute($this->getContext($context, "logo_image", true), "largePath", array(), "any", true, true)) {
            // line 19
            echo "\t        \t<div class=\"image-container\" id=\"logo-image-container\">
\t        \t\t<img class=\"fr action-delete-image\" rel=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "logo_image"), "id"), "html", null, true);
            echo "\" width=\"20\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationadmin/images/navicons/delete-object.png"), "html", null, true);
            echo "\" border=\"0\" />
\t        \t\t<img alt=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand_description"), "brand"), "html", null, true);
            echo "\" class=\"fr thumbnail action-image-popup\" data-image-large-path=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "logo_image"), "largePath"), "html", null, true);
            echo "\" data-image-size-width=\"300\" data-image-size-height=\"150\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "logo_image"), "largePath")), "html", null, true);
            echo "\" width=\"100\" height=\"50\" border=\"0\" />
\t        \t\t<div class=\"clear\"></div>
\t        \t</div>
        \t";
        }
        // line 25
        echo "        </div>
    </div>
\t<div class=\"clearfix\">
        <label for=\"form-request-a-brochure\" class=\"form-label\">Request a Brochure<small>Available through the site?</small></label>
        <div class=\"form-input\"><label><input type=\"radio\" name=\"request-a-brochure\" id=\"form-request-a-brochure-1\" value=\"1\"";
        // line 29
        if (($this->getAttribute($this->getContext($context, "brand"), "requestABrochure") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"request-a-brochure\" id=\"form-request-a-brochure-0\" value=\"0\"";
        if (($this->getAttribute($this->getContext($context, "brand"), "requestABrochure") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
    </div>
    <div id=\"brochure-web-address-container\" class=\"clearfix\">
        <label for=\"form-brochure-web-address\" class=\"form-label\">Brochure Web Address<small>Include the \"http://\"</small></label>
        <div class=\"form-input\"><input class=\"url\" type=\"url\" id=\"form-brochure-web-address\" name=\"brochure-web-address\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brochureWebAddress"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-request-a-sample\" class=\"form-label\">Request a Sample<small>Available through the site?</small></label>
        <div class=\"form-input\" id=\"form-request-a-sample-container\"><label><input type=\"radio\" name=\"request-a-sample\" id=\"form-request-a-sample-1\" value=\"1\"";
        // line 37
        if (($this->getAttribute($this->getContext($context, "brand"), "requestASample") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"request-a-sample\" id=\"form-request-a-sample-0\" value=\"0\"";
        if (($this->getAttribute($this->getContext($context, "brand"), "requestASample") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
    </div>
    <div id=\"sample-web-address-container\" class=\"clearfix\">
        <label for=\"form-sample-web-address\" class=\"form-label\">Sample Web Address<small>Include the \"http://\"</small></label>
        <div class=\"form-input\"><input class=\"url\" type=\"url\" id=\"form-sample-web-address\" name=\"sample-web-address\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "sampleWebAddress"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
    \t\t<button class=\"button ui-button-default\" data-icon-primary=\"ui-icon-check\">Save</button>
        </div>
    </div>
    <script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t
\t\t\t";
        // line 52
        echo "\t\t\t";
        if (($this->getAttribute($this->getContext($context, "brand"), "status") == "a")) {
            // line 53
            echo "\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-success\");
\t\t\t";
        } elseif (($this->getAttribute($this->getContext($context, "brand"), "status") == "h")) {
            // line 55
            echo "\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-highlight\");
\t\t\t";
        } else {
            // line 57
            echo "\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-error\");
\t\t\t";
        }
        // line 59
        echo "\t\t\t\$(\"input[name='status']\").change(function() {
\t\t\t\t\$(\"#form-status, #tab-general\").removeClass(\"ui-status-success\").removeClass(\"ui-status-highlight\").removeClass(\"ui-status-error\");
\t\t\t\tif (\$(\"#form-status-a\").is(\":checked\"))
\t\t\t\t{
\t\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-success\");
\t\t\t\t} else if (\$(\"#form-status-h\").is(\":checked\")) {
\t\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-highlight\");
\t\t\t\t} else {
\t\t\t\t\t\$(\"#form-status, #tab-general\").addClass(\"ui-status-error\");
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\t";
        // line 72
        echo "\t\t\t";
        if (($this->getAttribute($this->getContext($context, "brand"), "requestABrochure") == 0)) {
            echo "\t\t\t
\t\t        \$(\"#brochure-web-address-container\").hide();
\t\t    ";
        }
        // line 75
        echo "\t\t\t\$(\"input[name=request-a-brochure]\").change(function() {
\t\t        if (\$(this).val()==='1') {
\t\t            \$(\"#brochure-web-address-container\").show();
\t\t        } else {
\t\t            \$(\"#brochure-web-address-container\").hide();
\t\t        }
\t\t    });
\t\t    
\t\t    ";
        // line 84
        echo "\t\t    ";
        if (($this->getAttribute($this->getContext($context, "brand"), "requestASample") == 0)) {
            echo "\t\t\t
\t\t        \$(\"#sample-web-address-container\").hide();
\t\t    ";
        }
        // line 87
        echo "\t\t\t\$(\"input[name=request-a-sample]\").change(function() {
\t\t        if (\$(this).val()==='1') {
\t\t            \$(\"#sample-web-address-container\").show();
\t\t        } else {
\t\t            \$(\"#sample-web-address-container\").hide();
\t\t        }
\t\t    });
\t\t\t
\t\t});
\t</script>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:sectionGeneral.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 87,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 34,  240 => 191,  230 => 182,  121 => 33,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 25,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 21,  56 => 16,  115 => 30,  83 => 29,  164 => 50,  140 => 57,  58 => 15,  21 => 4,  61 => 18,  36 => 4,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 75,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 42,  132 => 53,  127 => 53,  123 => 34,  109 => 63,  90 => 32,  54 => 8,  133 => 95,  124 => 52,  111 => 29,  107 => 110,  80 => 60,  69 => 87,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 13,  78 => 29,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 55,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 33,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 26,  43 => 7,  50 => 5,  25 => 6,  92 => 30,  86 => 31,  79 => 21,  46 => 12,  37 => 3,  33 => 3,  27 => 2,  82 => 30,  72 => 20,  64 => 16,  53 => 17,  49 => 9,  44 => 5,  42 => 13,  34 => 16,  29 => 6,  23 => 3,  19 => 1,  40 => 4,  20 => 3,  30 => 7,  26 => 2,  22 => 4,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 36,  77 => 25,  74 => 27,  57 => 19,  47 => 5,  39 => 8,  32 => 8,  24 => 6,  17 => 1,  135 => 50,  129 => 52,  122 => 122,  116 => 41,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 33,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 28,  67 => 19,  62 => 11,  59 => 25,  55 => 18,  51 => 7,  48 => 25,  41 => 8,  38 => 19,  35 => 7,  31 => 2,  28 => 10,);
    }
}
