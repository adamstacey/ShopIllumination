<?php

/* WebIlluminationAdminBundle:Orders:listingFilter.html.twig */
class __TwigTemplate_7d4832a8e838d8607b32dbc09523ab6e extends Twig_Template
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
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-order-number\">Order No:</label></td>
\t\t\t\t<td width=\"14%\"><input type=\"text\" id=\"form-order-number\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"form-customer\">Customer:</label></td>
\t\t\t\t<td width=\"22%\"><input type=\"text\" id=\"form-customer\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"form-email-address\">Email Address:</label></td>
\t\t\t\t<td width=\"22%\"><input type=\"text\" id=\"form-email-address\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-order-number\">Order Total:</label></td>
\t\t\t\t<td width=\"89%\">
\t\t\t\t\t<p class=\"no-margin price-range ac\" id=\"total-range-amount\"></p>
\t\t\t\t\t<div id=\"total-range\" class=\"price-range-slider\"></div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-status\">Order Status:</label></td>
\t\t\t\t<td width=\"21%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Cancelled\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Cancelled</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Open Payment\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Open Payment</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Processing Your Order\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Processing Your Order</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Back Ordered\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Back Ordered</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Part Shipped\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Part Shipped</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Payment Failed\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Payment Failed</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Payment Received\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Payment Received</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Refunded\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Refunded</div>
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-status=\"Order Completed\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Order Completed</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-statuses\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-payment-type\">Payment Type:</label></td>
\t\t\t\t<td width=\"22%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"Google Wallet\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />Google Wallet</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"PayPal\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />PayPal</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"PayPal through SagePay\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />PayPal through SagePay</div>
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-payment-type=\"SagePay\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />SagePay</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-payment-types\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-delivery-type\">Delivery Type:</label></td>
\t\t\t\t<td width=\"21%\">
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-delivery-type=\"Standard Delivery\" type=\"checkbox\" class=\"order-delivery-type\" value=\"1\" />Standard Delivery</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-delivery-types\" value=\"\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label for=\"form-date-from\">Date From:</label></td>
\t\t\t\t<td width=\"30%\"><input type=\"text\" id=\"form-date-from\" value=\"\" /><input type=\"hidden\" id=\"form-date-from-formatted\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"20%\"><label for=\"form-date-to\">Date To:</label></td>
\t\t\t\t<td width=\"30%\"><input type=\"text\" id=\"form-date-to\" value=\"\" /><input type=\"hidden\" id=\"form-date-to-formatted\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ac\">
\t\t<button class=\"button bottom-button ui-button-green action-update-your-results\" data-icon-primary=\"ui-icon-refresh\">Update Your Results</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingFilter.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  219 => 80,  273 => 86,  263 => 83,  246 => 81,  234 => 78,  217 => 77,  173 => 60,  309 => 113,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 74,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 52,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 64,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 31,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 68,  170 => 59,  210 => 47,  180 => 59,  172 => 60,  168 => 58,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 119,  106 => 23,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 76,  198 => 71,  181 => 89,  167 => 50,  160 => 54,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 22,  85 => 25,  76 => 21,  112 => 35,  101 => 31,  98 => 33,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 25,  105 => 33,  66 => 21,  56 => 21,  115 => 29,  83 => 15,  164 => 63,  140 => 43,  58 => 15,  21 => 4,  61 => 23,  36 => 3,  209 => 75,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 63,  176 => 62,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 45,  134 => 60,  132 => 53,  127 => 56,  123 => 52,  109 => 63,  90 => 37,  54 => 14,  133 => 40,  124 => 33,  111 => 29,  107 => 35,  80 => 34,  69 => 17,  60 => 16,  52 => 16,  97 => 39,  95 => 29,  88 => 26,  78 => 25,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 50,  145 => 47,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 34,  96 => 22,  93 => 40,  91 => 27,  68 => 27,  65 => 12,  63 => 17,  43 => 14,  50 => 13,  25 => 7,  92 => 21,  86 => 19,  79 => 23,  46 => 13,  37 => 3,  33 => 10,  27 => 2,  82 => 22,  72 => 18,  64 => 8,  53 => 10,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 6,  23 => 5,  19 => 1,  40 => 13,  20 => 3,  30 => 9,  26 => 8,  22 => 2,  224 => 88,  215 => 78,  211 => 106,  204 => 98,  200 => 71,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 64,  162 => 55,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 48,  103 => 29,  99 => 19,  77 => 14,  74 => 31,  57 => 16,  47 => 9,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 37,  108 => 30,  104 => 45,  102 => 61,  94 => 21,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 21,  70 => 19,  67 => 19,  62 => 24,  59 => 11,  55 => 20,  51 => 70,  48 => 23,  41 => 8,  38 => 12,  35 => 7,  31 => 8,  28 => 11,);
    }
}
