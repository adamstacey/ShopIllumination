<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:ajaxGetListing.html.twig */
class __TwigTemplate_4601f8ccdb0e83be53c8e96b90718f35 extends Twig_Template
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
        echo "<table class=\"data-table\" id=\"data\" width=\"100%\">
\t<thead>
\t\t<tr>
\t\t\t<th width=\"19\" class=\"ac\"><input type=\"checkbox\" class=\"action-select-all\" value=\"1\" /></th>
\t\t\t<th width=\"22\" class=\"ac\">VIP</th>
\t\t\t<th class=\"ac\">Name</th>
\t\t\t<th class=\"ac\">Membership Number</th>
\t\t\t<th class=\"ac\">Contact Details</th>
\t\t\t<th class=\"ac\">Age</th>
\t\t\t<th class=\"ac\">Day</th>
\t\t\t<th class=\"ac\">Bike Make, Model and CC</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "practiceDayRegistrations"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["practiceDayRegistration"]) {
            echo "\t
\t\t\t<tr class=\"practice-day-registration";
            // line 17
            if (($this->getAttribute($this->getContext($context, "practiceDayRegistration"), "vip") > 0)) {
                echo " green";
            }
            echo "\" id=\"practice-day-registration-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"practice-day-registration-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\" value=\"1\" autocomplete=\"off\" /></td>
\t\t\t\t<td width=\"22\" class=\"ac small\">";
            // line 19
            if (($this->getAttribute($this->getContext($context, "practiceDayRegistration"), "vip") > 0)) {
                echo "<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-check no-margin no-float\"></span>";
            } else {
                echo "&nbsp;";
            }
            echo "</td>
\t\t\t\t<td class=\"ac small\"><strong>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "name"), "html", null, true);
            echo "</strong></td>
\t\t\t\t<td class=\"ac small\">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "membershipNumber"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\"><a href=\"mailto:";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "emailAddress"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "emailAddress"), "html", null, true);
            echo "</a><br />";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "contactNumber"), "html", null, true);
            echo "<br />";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "postZipCode"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "age"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "day"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "bike"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac no-wrap\">
\t\t\t\t\t<img class=\"action-buttons-spacer\" src=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"1\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete-practice-day-registration\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<button data-id=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl action-view-practice-day-registration button\" data-icon-primary=\"ui-icon-gear\" data-icon-only=\"true\">Practice Day Registration</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"10\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 41
            $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingPracticeDayRegistration.html.twig")->display(array_merge($context, array("practiceDayRegistration" => $this->getContext($context, "practiceDayRegistration"))));
            // line 42
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingConfirmDelete.html.twig")->display(array_merge($context, array("practiceDayRegistration" => $this->getContext($context, "practiceDayRegistration"))));
            // line 43
            echo "\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['practiceDayRegistration'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 47
        echo "\t</tbody>
</table>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#data :checkbox:not(.no-uniform), #data :radio:not(.no-uniform), #data select:not(.no-uniform), #data :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#data .button\").each(function () {
            \$(this).button({
            \ticons: {
                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
                }, 
               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
        \t});
        \tvar \$dataNotification = \$(this).attr(\"data-notification\");
        \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
        \t{
        \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
        \t}
        });
        \$(\".message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find('.message-close').click(function () {
\t    \t\$(this).parent().fadeOut();
\t    });
\t    
\t    ";
        // line 71
        echo "\t\tvar \$actionButtonsWidth = 0;
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-confirm-delete-practice-day-registration:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-action-view-practice-day-registration:eq(0)\").outerWidth(true);
\t\t\$(\".action-buttons-spacer\").width(\$actionButtonsWidth).attr(\"width\", \$actionButtonsWidth);
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 34,  240 => 191,  230 => 182,  121 => 33,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 25,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 45,  56 => 16,  115 => 30,  83 => 22,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 18,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 42,  132 => 41,  127 => 53,  123 => 34,  109 => 63,  90 => 31,  54 => 8,  133 => 95,  124 => 52,  111 => 29,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 24,  95 => 33,  88 => 13,  78 => 27,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 35,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 21,  46 => 26,  37 => 3,  33 => 10,  27 => 11,  82 => 59,  72 => 20,  64 => 16,  53 => 17,  49 => 9,  44 => 5,  42 => 13,  34 => 16,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 64,  99 => 36,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 47,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 103,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 17,  67 => 19,  62 => 11,  59 => 29,  55 => 14,  51 => 7,  48 => 25,  41 => 8,  38 => 19,  35 => 7,  31 => 2,  28 => 10,);
    }
}
