<?php

/* WebIlluminationAdminBundle:Orders:listingNotes.html.twig */
class __TwigTemplate_8b9028c568cacd409dd6738fdb9e2964 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-notes-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<div id=\"notes-confirm-delete-";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-highlight ui-corner-all\"> 
\t    \t<div class=\"fl no-margin no-padding\">
\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the highlighted note?</p>
\t    \t</div>
\t        <div class=\"fr no-margin no-padding\">
\t        \t<a href=\"Javascript:void(0);\" data-note-id=\"\" data-order-id=\"\" id=\"notes-confirm-delete-button-";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-note\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t        \t<a href=\"Javascript:void(0);\" data-note-id=\"\" data-order-id=\"\" id=\"notes-cancel-delete-button-";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete-note\">Cancel</a>
\t        </div>
\t        <div class=\"clear\"></div>
\t    </div>
\t</div>
\t<div id=\"notes-success-message-";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-helper-hidden ui-widget message closeable\">
\t    <div class=\"ui-state-success ui-corner-all no-margin\">
\t    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
\t        <p class=\"small-message\"><strong>SUCCESS:</strong> <span id=\"notes-success-message-text-";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\"></span></p>
\t    </div>
\t</div>
\t<div id=\"notes-error-message-";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-helper-hidden ui-widget message closeable\">
\t    <div class=\"ui-state-error ui-corner-all no-margin\">
\t    \t<span class=\"ui-icon ui-icon-alert\"></span>
\t        <p class=\"small-message\"><strong>ERROR:</strong> <span id=\"notes-error-message-text-";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\"></span></p>
\t    </div>
\t</div>
\t<h5 class=\"no-margin-top\">Customer Notes<button data-id=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-corner-none ui-corner-tr button ui-button-green action-view-add-customer-note\" data-icon-primary=\"ui-icon-plusthick\" data-icon-only=\"true\">Add</button></h5>
\t<div class=\"ui-helper-hidden\" id=\"add-customer-note-";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>New Customer Note:</label></td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\"><textarea id=\"note-customer-note-";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"no-margin full\"></textarea></td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Notify Customer?</label></td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\"><input id=\"note-notify-customer-";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" type=\"checkbox\" value=\"1\" /></td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\">&nbsp;</td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\"><button data-id=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button no-float ui-button-green action-add-customer-note\" data-icon-primary=\"ui-icon-comment\">Add Customer Note</button></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div id=\"customer-notes-loading-";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"loading-container\">
\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t<p class=\"ac\">Loading&hellip;</p>
\t</div>
\t<div class=\"sub-table-data-container\" id=\"customer-notes-";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t\t<p class=\"ac\">There are no customer notes for this order.</p>
\t</div>
\t<h5>Staff Notes<button data-id=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-corner-none ui-corner-tr button ui-button-green action-view-add-staff-note\" data-icon-primary=\"ui-icon-plusthick\" data-icon-only=\"true\">Add</button></h5>
\t<div class=\"ui-helper-hidden\" id=\"add-staff-note-";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>New Staff Note:</label></td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\"><textarea id=\"note-staff-note-";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"no-margin full\"></textarea></td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\">&nbsp;</td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\"><button data-id=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button no-float ui-button-green action-add-staff-note\" data-icon-primary=\"ui-icon-comment\">Add Staff Note</button></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div id=\"staff-notes-loading-";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"loading-container\">
\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t<p class=\"ac\">Loading&hellip;</p>
\t</div>
\t<div class=\"sub-table-data-container\" id=\"staff-notes-";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t\t<p class=\"ac\">There are no staff notes for this order.</p>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingNotes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  309 => 113,  285 => 105,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 84,  207 => 81,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 75,  150 => 46,  260 => 98,  155 => 48,  223 => 116,  186 => 103,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 91,  174 => 35,  182 => 37,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 79,  114 => 31,  208 => 58,  183 => 73,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 55,  240 => 191,  230 => 182,  121 => 34,  257 => 222,  249 => 119,  106 => 43,  334 => 31,  294 => 25,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 85,  198 => 93,  181 => 89,  167 => 50,  160 => 61,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 68,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 164,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 44,  85 => 14,  76 => 21,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 32,  105 => 84,  66 => 21,  56 => 21,  115 => 47,  83 => 11,  164 => 63,  140 => 43,  58 => 6,  21 => 4,  61 => 23,  36 => 10,  209 => 85,  205 => 69,  196 => 79,  192 => 77,  189 => 53,  178 => 36,  176 => 47,  165 => 75,  161 => 42,  152 => 90,  148 => 59,  141 => 64,  134 => 60,  132 => 53,  127 => 56,  123 => 52,  109 => 63,  90 => 37,  54 => 19,  133 => 95,  124 => 33,  111 => 29,  107 => 30,  80 => 34,  69 => 20,  60 => 20,  52 => 16,  97 => 39,  95 => 26,  88 => 26,  78 => 25,  75 => 72,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 68,  145 => 65,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 48,  96 => 18,  93 => 40,  91 => 40,  68 => 27,  65 => 18,  63 => 17,  43 => 14,  50 => 18,  25 => 7,  92 => 28,  86 => 36,  79 => 32,  46 => 13,  37 => 11,  33 => 10,  27 => 8,  82 => 22,  72 => 28,  64 => 8,  53 => 31,  49 => 6,  44 => 15,  42 => 13,  34 => 3,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 7,  26 => 6,  22 => 2,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 76,  179 => 48,  177 => 71,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 52,  117 => 48,  103 => 29,  99 => 19,  77 => 25,  74 => 31,  57 => 15,  47 => 15,  39 => 19,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 36,  108 => 30,  104 => 45,  102 => 61,  94 => 33,  89 => 53,  87 => 38,  84 => 49,  81 => 33,  73 => 22,  70 => 19,  67 => 26,  62 => 24,  59 => 22,  55 => 20,  51 => 70,  48 => 23,  41 => 24,  38 => 12,  35 => 9,  31 => 8,  28 => 11,);
    }
}
