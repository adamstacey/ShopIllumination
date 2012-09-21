<?php

/* WebIlluminationAdminBundle:Departments:updateDescription.html.twig */
class __TwigTemplate_4d77f8049b54c5c75d9d9cdadcb4df4b extends Twig_Template
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
        echo "<section id=\"description\" class=\"form ui-helper-hidden\">
\t<h2>Description</h2>
\t<div id=\"description-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
\t        <p>
\t        \t<button class=\"button action-update-description-section ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        \t<button class=\"button ui-button-red action-leave-description\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
\t        \t<input type=\"hidden\" value=\"-1\" id=\"description-tab-to-redirect-to\" />
\t        \t<input type=\"hidden\" value=\"0\" id=\"description-requires-update\" />
\t        </p>
\t    </div>
\t    <div class=\"spacer\"></div>
\t</div>
\t<div class=\"ui-widget info-message\">
\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p>The description is what sells the department and it is important that you explain how a potential customer will benefit from buying from you.</p>
\t\t</div>
\t</div>
\t<div id=\"description-confirm-overwrite\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> Your current description will be replaced. Do you want to continue?</p>
\t        <p>
\t        \t<button id=\"description-confirm-overwrite-button\" class=\"button ui-button-green\" data-icon-primary=\"ui-icon-check\">Continue</button>
\t        \t<button class=\"button ui-button-red action-cancel-description-overwrite\" data-icon-primary=\"ui-icon-closethick\">Cancel</button>
\t        </p>
\t    </div>
\t</div>
\t<h3>Description</h3>
\t<div class=\"clearfix\">
        <div class=\"form-input-long\">
        \t<div class=\"ac\">
                <div class=\"buttonset no-margin-right\">
                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"1\" id=\"tinymce-description-1\" checked=\"checked\" /><label for=\"tinymce-description-1\">Visual</label>
                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"0\" id=\"tinymce-description-0\" /><label for=\"tinymce-description-0\">HTML</label>
                    <hr class=\"inset\" />
                </div>
                <div class=\"leading\">
                    <textarea id=\"form-description\" name=\"description\" rows=\"3\" class=\"tinymce-basic\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "description"), "html", null, true);
        echo "</textarea>
                </div>
            </div>
        </div>
    </div>
    <h3>Short Description</h3>
    <div class=\"clearfix\">
        <div class=\"form-input-long no-margin-bottom\"><textarea id=\"form-short-description\" name=\"short-description\" rows=\"3\">";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "shortDescription"), "html", null, true);
        echo "</textarea></div>
    </div> 
    <div class=\"clearfix\">
        <div class=\"form-input-long buttons no-margin-bottom\">
        \t<button class=\"button ui-button-green action-update-description-section\" data-icon-primary=\"ui-icon-check\">Save</button>
        \t<button class=\"button ui-button-blue action-check-description\" data-icon-primary=\"ui-icon-document\">Build Description</button>
        \t<button class=\"button ui-button-blue action-check-short-description\" data-icon-primary=\"ui-icon-document\">Build Short Description</button>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateDescription.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 12,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 61,  98 => 33,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 62,  66 => 11,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 14,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 63,  90 => 30,  54 => 79,  133 => 8,  124 => 66,  111 => 47,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 78,  97 => 34,  95 => 21,  88 => 24,  78 => 56,  75 => 15,  71 => 90,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 24,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 45,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 9,  27 => 9,  82 => 60,  72 => 20,  64 => 18,  53 => 15,  49 => 13,  44 => 25,  42 => 24,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 40,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 13,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 49,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 43,  41 => 11,  38 => 3,  35 => 7,  31 => 42,  28 => 3,);
    }
}
