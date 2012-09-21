<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:view.html.twig */
class __TwigTemplate_78e066ca0d76c7ad2de92aca94b4d3a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::email.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::email.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Ride Direct Practice Day";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFF;\" cellpadding=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td valign=\"top\" style=\"padding: 5px 0;\">
\t\t\t\t<table cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\" width=\"900\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"900\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 20px;\" width=\"860\">
\t\t\t\t\t\t\t\t\t\t<p style=\"padding: 0; margin: 0; text-align: center;\"><img width=\"500\" height=\"150\" alt=\"Committed to Giving Riders More\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo-and-slogan.gif\" /></p>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 10px 0 10px 0; margin: 0; line-height: 120%;\"><strong>Registrants for the Ride Direct Practice Day on Saturday 3rd March 2012.</strong></p>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"860\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Name</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Membership No.</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Number</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Post Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Age</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Bike</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" width=\"250\"><strong>Notes</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr> 
\t\t\t\t\t\t\t\t\t\t\t";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "practiceDayRegistrations"));
        foreach ($context['_seq'] as $context["_key"] => $context["practiceDayRegistration"]) {
            // line 26
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "name"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 28
            if (($this->getAttribute($this->getContext($context, "practiceDayRegistration"), "membershipNumber") > 1)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "membershipNumber"), "html", null, true);
            } else {
                echo "-";
            }
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 29
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "contactNumber", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "contactNumber"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 30
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "postZipCode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "postZipCode"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "practiceDayRegistration"), "age"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"center\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            // line 32
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "bike", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "bike"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"middle\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\" width=\"250\">";
            // line 33
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "notes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "practiceDayRegistration", true), "notes"), " ")) : (" ")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['practiceDayRegistration'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t</table>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 34,  240 => 191,  230 => 182,  121 => 33,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 25,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 27,  56 => 16,  115 => 30,  83 => 22,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 18,  36 => 4,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 42,  132 => 41,  127 => 53,  123 => 34,  109 => 63,  90 => 32,  54 => 8,  133 => 95,  124 => 52,  111 => 29,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 24,  95 => 33,  88 => 13,  78 => 29,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 35,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 26,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 31,  79 => 21,  46 => 26,  37 => 3,  33 => 3,  27 => 2,  82 => 30,  72 => 20,  64 => 16,  53 => 17,  49 => 9,  44 => 5,  42 => 13,  34 => 16,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 36,  99 => 36,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 47,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 33,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 28,  67 => 19,  62 => 11,  59 => 25,  55 => 14,  51 => 7,  48 => 25,  41 => 8,  38 => 19,  35 => 7,  31 => 2,  28 => 10,);
    }
}
