<?php

/* WebIlluminationAdminBundle:Departments:updateGeneral.html.twig */
class __TwigTemplate_9fa585b44ab308ea32de859e08d97b1d extends Twig_Template
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
        echo "<section id=\"general\" class=\"form\">
\t<h2>General</h2>
\t<div id=\"general-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
\t        <p>
\t        \t<button class=\"button action-update-general-section ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        \t<button class=\"button ui-button-red action-leave-general\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
\t        \t<input type=\"hidden\" value=\"-1\" id=\"general-tab-to-redirect-to\" />
\t        \t<input type=\"hidden\" value=\"0\" id=\"general-requires-update\" />
\t        </p>
\t    </div>
\t    <div class=\"spacer\"></div>
\t</div>
\t<div class=\"clearfix\">
        <label for=\"form-status\" class=\"form-label\"><em>*</em> Status<small>Is the department available?</small></label>
        <div class=\"form-input status\" id=\"form-status\"><label><input type=\"radio\" name=\"status\" id=\"form-status-a\" value=\"a\"";
        // line 18
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "status") == "a")) {
            echo " checked=\"checked\"";
        }
        echo " /> Active</label> <label><input type=\"radio\" name=\"status\" id=\"form-status-h\" value=\"h\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "status") == "h")) {
            echo " checked=\"checked\"";
        }
        echo " /> Hidden</label> <label><input type=\"radio\" name=\"status\" id=\"form-status-d\" value=\"d\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "status") == "d")) {
            echo " checked=\"checked\"";
        }
        echo " /> Disabled</label></div>
    </div>
\t<div class=\"clearfix\">
        <label for=\"form-department\" class=\"form-label\"><em>*</em> Name<small>Enter the department name</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-department\" required=\"required\" data-message=\"Please enter the name of the department.\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "department"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
    \t\t<button class=\"button ui-button-green action-update-general-section\" data-icon-primary=\"ui-icon-check\">Update</button>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateGeneral.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 191,  230 => 182,  121 => 89,  257 => 121,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 45,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 37,  118 => 43,  105 => 22,  66 => 49,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 18,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 59,  161 => 58,  152 => 110,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 90,  111 => 25,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 30,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 43,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 17,  93 => 61,  91 => 105,  68 => 9,  65 => 45,  63 => 36,  43 => 24,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 13,  72 => 20,  64 => 18,  53 => 22,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 61,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 64,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 37,  59 => 21,  55 => 14,  51 => 30,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 14,  28 => 3,);
    }
}
