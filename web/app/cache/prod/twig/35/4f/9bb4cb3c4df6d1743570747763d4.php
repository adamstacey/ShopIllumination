<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:listingAdd.html.twig */
class __TwigTemplate_354f9bb4cb3c4df6d1743570747763d4 extends Twig_Template
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
        echo "<div id=\"add\" class=\"form no-padding-bottom listing-filter ui-helper-hidden\">
\t<h4>Add New Practice Day Registration</h4>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\"><label><span class=\"required\">*</span> VIP</label></td>
\t\t\t\t<td>
\t\t\t\t\t<label><input type=\"radio\" class=\"add-vip\" name=\"vip\" value=\"1\" /> Yes</label>
\t\t\t\t\t<label><input type=\"radio\" class=\"add-vip\" name=\"vip\" value=\"0\" /> No</label>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-name\"><span class=\"required\">*</span> Name</label></td>
\t\t\t\t<td width=\"15%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"text\" id=\"practice-day-registration-name\" data-message=\"Please enter a name.\" required=\"required\" class=\"no-margin full\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-membership-number\"><span class=\"required\">*</span> Membership Number</label></td>
\t\t\t\t<td width=\"15%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"text\" id=\"practice-day-registration-membership-number\" data-message=\"Please enter a membership number.\" required=\"required\" class=\"no-margin integer full\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"10%\" class=\"label\"><label for=\"practice-day-registration-age\"><span class=\"required\">*</span> Age</label></td>
\t\t\t\t<td width=\"20%\" class=\"no-padding\">
\t\t\t\t\t<select id=\"practice-day-registration-age\" data-message=\"Please select an age range.\" required=\"required\" class=\"no-margin integer full\">
\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t<option value=\"Adult (18+)\">Adult (18+)</option>
\t\t\t\t\t\t<option value=\"Youth (17 or under)\">Youth (17 or under)</option>
\t\t\t\t\t\t<option value=\"Kid (6 and over)\">Kid (6 and over)</option>
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-email-address\"><span class=\"required\">*</span> Email Address</label></td>
\t\t\t\t<td width=\"15%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"email\" id=\"practice-day-registration-email-address\" data-message=\"Please enter a valid email address.\" required=\"required\" class=\"no-margin lowercase full\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-contact-number\"><span class=\"required\">*</span> Contact Number</label></td>
\t\t\t\t<td width=\"15%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"text\" id=\"practice-day-registration-contact-number\" data-message=\"Please enter a contact number.\" required=\"required\" class=\"no-margin full\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"10%\" class=\"label\"><label for=\"practice-day-registration-post-zip-code\"><span class=\"required\">*</span> Post Code</label></td>
\t\t\t\t<td width=\"20%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"text\" id=\"practice-day-registration-post-zip-code\" data-message=\"Please enter a valid post code.\" required=\"required\" class=\"no-margin full\" value=\"\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-bike\"><span class=\"required\">*</span> Bike Make, Model and CC</label></td>
\t\t\t\t<td width=\"40%\" class=\"no-padding\">
\t\t\t\t\t<input type=\"text\" id=\"practice-day-registration-bike\" data-message=\"Please enter your bike make, model and CC.\" required=\"required\" class=\"no-margin full\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"10%\" class=\"label\"><label for=\"practice-day-registration-day\"><span class=\"required\">*</span> Day</label></td>
\t\t\t\t<td width=\"30%\">
\t\t\t\t\t<select id=\"practice-day-registration-day\" data-message=\"Please select a day.\" required=\"required\" class=\"no-margin integer full\">
\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t<option value=\"Saturday 3rd\">Saturday 3rd</option>
\t\t\t\t\t\t<option value=\"Sunday 4th\">Sunday 4th</option>
\t\t\t\t\t</select>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"20%\" class=\"label\"><label for=\"practice-day-registration-notes\">Notes</label></td>
\t\t\t\t<td width=\"80%\" class=\"no-padding\">
\t\t\t\t\t<textarea id=\"practice-day-registration-notes\" class=\"no-margin full\"></textarea>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ac\">
\t\t<button class=\"button bottom-button ui-button-green action-add-practice-day-registration\" data-icon-primary=\"ui-icon-tag\">Add New Practice Day Registration</button>
\t\t<button class=\"button bottom-button ui-button-blue action-cancel-add-practice-day-registration\">Cancel</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:listingAdd.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 34,  240 => 191,  230 => 182,  121 => 33,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 25,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 27,  56 => 16,  115 => 30,  83 => 22,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 18,  36 => 4,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 42,  132 => 41,  127 => 53,  123 => 34,  109 => 63,  90 => 32,  54 => 8,  133 => 95,  124 => 52,  111 => 29,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 24,  95 => 33,  88 => 13,  78 => 29,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 35,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 26,  43 => 7,  50 => 5,  25 => 6,  92 => 30,  86 => 31,  79 => 21,  46 => 26,  37 => 3,  33 => 3,  27 => 2,  82 => 30,  72 => 20,  64 => 16,  53 => 17,  49 => 9,  44 => 5,  42 => 13,  34 => 16,  29 => 6,  23 => 3,  19 => 1,  40 => 4,  20 => 3,  30 => 7,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 36,  99 => 36,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 8,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 47,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 33,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 28,  67 => 19,  62 => 11,  59 => 25,  55 => 14,  51 => 7,  48 => 25,  41 => 8,  38 => 19,  35 => 7,  31 => 2,  28 => 10,);
    }
}
