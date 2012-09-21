<?php

/* WebIlluminationAdminBundle:Departments:updatePricesScript.js.twig */
class __TwigTemplate_9f42069df4c61027236bfe8ae1fdc98d extends Twig_Template
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
        // line 2
        echo "\$(\"input[name=hide-prices]\").change(function() {
    if (\$(this).val() === '1') {
        \$(\"#show-prices-out-of-hours-container\").fadeIn();
    } else {
        \$(\"#show-prices-out-of-hours-container\").fadeOut();
    }
});

";
        // line 11
        echo "\$(\"input[name=membership-card-discount-available]\").change(function() {
    if (\$(this).val() === '1') {
        \$(\"#maximum-membership-card-discount-container\").fadeIn();
    } else {
        \$(\"#maximum-membership-card-discount-container\").fadeOut();
    }
});

";
        // line 20
        echo "\$(\".action-update-price-settings-section\").live('click', function() {
\t\$.ajax({
\t\ttype: \"POST\",
\t\tdataType: \"json\",
\t\turl: \"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update_price_settings_section")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\$(\"#ajax_loading\").show();
\t\t},
\t\tdata: {
\t\t\tid: ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"), "html", null, true);
        echo ",
\t\t\thidePrices: \$(\"input[name='hide-prices']:checked\").val(),
\t\t\tshowPricesOutOfHours: \$(\"input[name='show-prices-out-of-hours']:checked\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"input[name='membership-card-discount-available']:checked\").val(),
\t\t\tmaximumMembershipCardDiscount: \$(\"#form-maximum-membership-card-discount\").val()
\t\t},
\t\terror: function(data) {
\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\tfinishInteractions();
\t    },
\t\tsuccess: function(data) {
\t\t\tif (data.response == 'success')
\t\t\t{
\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " was updated.\");
\t\t\t} else {
\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t}
\t\t\tfinishInteractions();
\t\t}
\t});
});

\$(\".sidebar-tabs\").bind(\"tabsselect\", function(event, ui) {
\tif (\$(\"input.price-requires-update[value='1']\").length > 0)
\t{
\t\t\$(\"#prices .message\").hide();
\t\t\$(\".form-error\").remove();
\t\t\$(\"#price-leave-prices-button\").attr(\"data-tab-index\", ui.index);
\t\t\$(\"#prices-tab-to-redirect-to\").val(ui.index);
\t\t\$(\"#price-confirm-leave\").fadeIn();
\t\t\$(\"html, body\").animate({scrollTop: \$(\"#prices\").offset().top + 35},'slow');
\t\treturn false;
\t}
\treturn true;
});

\$(\".action-leave-prices\").live('click', function() {
\t\$(\"input.price-requires-update\").val(\"0\");
\t\$(\"input.price-id[value='0']\").each(function(index) {
\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\$(\"#price-\"+\$elementIndex).remove();
\t});
\t\$(\"#prices .message\").hide();
\t\$(\".form-error\").remove();
\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(this).attr(\"data-tab-index\")));
\t\$(\"html, body\").animate({scrollTop: \$(\"#prices\").offset().top + 35},'slow');
});";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updatePricesScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 191,  230 => 182,  121 => 89,  257 => 121,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 45,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 37,  118 => 43,  105 => 22,  66 => 49,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 59,  161 => 58,  152 => 110,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 90,  111 => 25,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 30,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 43,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 17,  93 => 61,  91 => 105,  68 => 9,  65 => 45,  63 => 36,  43 => 24,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 13,  72 => 20,  64 => 18,  53 => 37,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 61,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 2,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 64,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 37,  59 => 21,  55 => 14,  51 => 30,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 14,  28 => 3,);
    }
}
