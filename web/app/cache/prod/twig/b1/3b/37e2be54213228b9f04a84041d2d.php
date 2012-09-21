<?php

/* WebIlluminationAdminBundle:Orders:ajaxGetCustomerNotes.html.twig */
class __TwigTemplate_b13b37e2be54213228b9f04a84041d2d extends Twig_Template
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
        echo "<div id=\"customer-notes-container-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo "\" class=\"clearfix separator\">
\t";
        // line 2
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
            // line 3
            echo "\t\t<table class=\"sub-data-table\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<th class=\"al\">Note</th>
\t\t\t\t<th class=\"ac\">Creator</th>
\t\t\t\t<th class=\"ac\">Notified</th>
\t\t\t\t<th class=\"ac\">Date</th>
\t\t\t\t<th class=\"ac\" width=\"28\">&nbsp;</th>
\t\t\t</tr>
\t\t\t";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 12
                echo "\t\t\t\t<tr id=\"note-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "id"), "html", null, true);
                echo "\">
\t\t\t\t\t<td class=\"al\">";
                // line 13
                echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true));
                echo "</td>
\t\t\t\t\t<td class=\"ac\">";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "creator"), "html", null, true);
                echo "</td>
\t\t\t\t\t<td class=\"ac\">";
                // line 15
                echo ((($this->getAttribute($this->getContext($context, "note"), "notified") > 0)) ? ("Yes") : ("No"));
                echo "</td>
\t\t\t\t\t<td class=\"ac\">";
                // line 16
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "createdAt"), "d/m/Y h:iA"), "html", null, true);
                echo "</td>
\t\t\t\t\t<td class=\"ac\" width=\"28\"><button data-order-id=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "orderId"), "html", null, true);
                echo "\" data-note-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "id"), "html", null, true);
                echo "\" class=\"button ui-button-red action-confirm-delete-note\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button></td>
\t\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 20
            echo "\t\t</table>
\t";
        } else {
            // line 22
            echo "\t\t<p class=\"ac\">There are no customer notes for this order.</p>
\t";
        }
        // line 24
        echo "</div>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#customer-notes-container-";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " :checkbox:not(.no-uniform), #customer-notes-container-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " :radio:not(.no-uniform), #customer-notes-container-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " select:not(.no-uniform), #customer-notes-container-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#customer-notes-container-";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " .button\").each(function () {
            \$(this).button({
            \ticons: {
                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
                }, 
               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
        \t});
        });
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:ajaxGetCustomerNotes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 80,  273 => 86,  263 => 83,  246 => 81,  234 => 78,  217 => 77,  173 => 60,  309 => 113,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 74,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 52,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 64,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 31,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 68,  170 => 59,  210 => 47,  180 => 59,  172 => 60,  168 => 58,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 119,  106 => 23,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 76,  198 => 71,  181 => 89,  167 => 50,  160 => 54,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 22,  85 => 30,  76 => 21,  112 => 35,  101 => 38,  98 => 33,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 25,  105 => 33,  66 => 21,  56 => 21,  115 => 29,  83 => 27,  164 => 63,  140 => 43,  58 => 15,  21 => 4,  61 => 23,  36 => 3,  209 => 75,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 63,  176 => 62,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 55,  123 => 52,  109 => 63,  90 => 37,  54 => 8,  133 => 40,  124 => 54,  111 => 45,  107 => 35,  80 => 34,  69 => 17,  60 => 16,  52 => 16,  97 => 39,  95 => 29,  88 => 26,  78 => 24,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 50,  145 => 47,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 34,  96 => 35,  93 => 28,  91 => 33,  68 => 27,  65 => 12,  63 => 17,  43 => 13,  50 => 13,  25 => 7,  92 => 21,  86 => 19,  79 => 23,  46 => 13,  37 => 3,  33 => 10,  27 => 2,  82 => 22,  72 => 18,  64 => 8,  53 => 10,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 6,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 88,  215 => 78,  211 => 106,  204 => 98,  200 => 71,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 64,  162 => 55,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 48,  103 => 29,  99 => 19,  77 => 14,  74 => 22,  57 => 16,  47 => 14,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 46,  108 => 30,  104 => 45,  102 => 61,  94 => 21,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 21,  70 => 20,  67 => 19,  62 => 11,  59 => 17,  55 => 16,  51 => 15,  48 => 23,  41 => 8,  38 => 12,  35 => 7,  31 => 8,  28 => 11,);
    }
}
