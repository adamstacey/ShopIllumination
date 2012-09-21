<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:listingFilter.html.twig */
class __TwigTemplate_68e77861f467a27f71964bc3c421fe4a extends Twig_Template
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
        echo "<div id=\"listing-filter\" class=\"no-padding-bottom listing-filter ui-helper-hidden\">
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"25%\"><label for=\"filter-name\">Name</label></td>
\t\t\t\t<td width=\"25%\"><input type=\"text\" id=\"filter-name\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"25%\"><label for=\"filter-membership-number\">Membership Number</label></td>
\t\t\t\t<td width=\"25%\"><input type=\"text\" id=\"filter-membership-number\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"filter-email-address\">Email Address</label></td>
\t\t\t\t<td width=\"20%\"><input type=\"text\" id=\"filter-email-address\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"filter-contact-number\">Contact Number</label></td>
\t\t\t\t<td width=\"20%\"><input type=\"text\" id=\"filter-contact-number\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"filter-post-zip-code\">Post Code</label></td>
\t\t\t\t<td width=\"15%\"><input type=\"text\" id=\"filter-post-zip-code\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"15%\"><label>Age</label></td>
\t\t\t\t<td width=\"20%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-age\" value=\"Adult (18+)\" />Adult (18+)</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-age\" value=\"Youth (17 or under)\" />Youth (17 or under)</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-age\" value=\"Kid (6 and over)\" />Kid (6 and over)</div>
\t\t\t\t\t<input type=\"hidden\" id=\"filter-age\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label>Day</label></td>
\t\t\t\t<td width=\"20%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-day\" value=\"Saturday 3rd\" />Saturday 3rd</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-day\" value=\"Sunday 4th\" />Sunday 4th</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-day\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label>VIP</label></td>
\t\t\t\t<td width=\"15%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-vip\" value=\"1\" />Yes</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input type=\"checkbox\" class=\"filter-vip\" value=\"0\" />No</div>
\t\t\t\t\t<input type=\"hidden\" id=\"filter-vip\" value=\"\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ac\">
\t\t<button class=\"button bottom-button ui-button-green action-update-your-results\" data-icon-primary=\"ui-icon-refresh\">Update Your Results</button>
\t\t<button class=\"button bottom-button ui-button-red action-clear-filters\" data-icon-primary=\"ui-icon-closethick\">Clear Filters</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:listingFilter.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 208,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 202,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 41,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 169,  249 => 119,  106 => 36,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 216,  392 => 272,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 14,  76 => 18,  112 => 37,  101 => 75,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 23,  56 => 16,  115 => 21,  83 => 29,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 11,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 99,  132 => 84,  127 => 92,  123 => 34,  109 => 63,  90 => 31,  54 => 79,  133 => 95,  124 => 44,  111 => 69,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 34,  95 => 33,  88 => 13,  78 => 27,  75 => 15,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 15,  93 => 61,  91 => 14,  68 => 9,  65 => 8,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 11,  33 => 10,  27 => 11,  82 => 13,  72 => 20,  64 => 16,  53 => 8,  49 => 9,  44 => 5,  42 => 13,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 70,  185 => 76,  179 => 72,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 64,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 17,  94 => 103,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 17,  67 => 43,  62 => 37,  59 => 29,  55 => 14,  51 => 6,  48 => 25,  41 => 8,  38 => 3,  35 => 7,  31 => 2,  28 => 5,);
    }
}
