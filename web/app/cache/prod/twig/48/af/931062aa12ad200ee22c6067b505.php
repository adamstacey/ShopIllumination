<?php

/* WebIlluminationAdminBundle:Departments:updateDescriptionScript.js.twig */
class __TwigTemplate_48af931062aa12ad200ee22c6067b505 extends Twig_Template
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
        echo "\$(\".action-update-description-section\").live('click', function() {
\tvar updateDescriptionValidator = \$(\"#description :input\").validator({
\t\tposition : 'bottom left', 
\t\toffset : [0, 0], 
\t\tmessageClass : 'form-error', 
   \t\tmessage : '<div><em/></div>'
\t});
\tif (updateDescriptionValidator.data(\"validator\").checkValidity())
\t{
    \t\$.ajax({
\t\t\ttype: \"POST\",
\t\t\tdataType: \"json\",
\t\t\turl: \"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update_description_section")), "html", null, true);
        echo "\",
\t\t\tbeforeSend: function() {
\t\t\t\tresetInteractions();
\t\t\t\t\$(\"#ajax_loading\").show();
\t\t\t},
\t\t\tdata: {
\t\t\t\tid: ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "department"), "id"), "html", null, true);
        echo ",
\t\t\t\tdescription: \$(\"#form-description\").val(),
    \t\t\tshortDescription: \$(\"#form-short-description\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\tfinishInteractions();
\t\t    },
\t\t\tsuccess: function(data) {
\t\t\t\tif (data.response == 'success')
\t\t\t\t{
\t\t\t\t\t\$(\"#form-short-description\").val(data.shortDescription);
\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " was successfully updated.\");
\t\t\t\t} else {
\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t}
\t\t\t\tfinishInteractions();
\t\t\t\tif (\$(\"#description-tab-to-redirect-to\").val() > -1)
\t\t\t\t{
\t\t\t\t\t\$(\"#description-requires-update\").val(0);
\t\t\t\t\t\$(\"#description-confirm-leave\").hide();
\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#description-tab-to-redirect-to\").val()));
\t\t\t\t\t\$(\"#description-tab-to-redirect-to\").val(-1);
\t\t\t\t} else {
\t\t\t\t\t\$(\"#description-requires-update\").val(0);
\t\t\t\t\t\$(\"#description-tab-to-redirect-to\").val(-1);
\t\t\t\t}
\t\t\t}
\t\t});
\t}
});

";
        // line 53
        echo "\$(\".action-check-description\").live('click', function() {
\tresetInteractions();
\tif (\$(\"#form-short-description\").val() != \"\")
\t{
\t\tvar editor = tinyMCE.get(\"form-description\");
\t\tif (editor.getContent() != \"\")
\t\t{
\t\t\t\$(\"#description-confirm-overwrite-button\").removeClass(\"action-get-description action-get-short-description\").addClass(\"action-get-description\");
\t\t\t\$(\"#description-confirm-overwrite\").fadeIn();
\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#description-confirm-overwrite\").offset().top - 50}, 'slow');
\t\t} else {
\t\t\tgetDescription();
\t\t}
\t}
});

";
        // line 70
        echo "\$(\".action-check-short-description\").live('click', function() {
\tresetInteractions();
\tvar editor = tinyMCE.get(\"form-description\");
\tif (editor.getContent() != \"\")
\t{\t
\t\tif (\$('#form-short-description').val() != \"\")
\t\t{
\t\t\t\$(\"#description-confirm-overwrite-button\").removeClass(\"action-get-description action-get-short-description\").addClass(\"action-get-short-description\");
\t\t\t\$(\"#description-confirm-overwrite\").fadeIn();
\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#description-confirm-overwrite\").offset().top - 50}, 'slow');
\t\t} else {
\t\t\tgetShortDescription();
\t\t}
\t}
});

";
        // line 87
        echo "\$(\".action-cancel-description-overwrite\").live('click', function() {
\tresetInteractions();
});

";
        // line 92
        echo "\$(\".action-get-description\").live('click', function() {
\tresetInteractions();
\tgetDescription();
});

";
        // line 98
        echo "\$(\".action-get-short-description\").live('click', function() {
\tresetInteractions();
\tgetShortDescription();
});

";
        // line 104
        echo "\$(\"#description input, #description select, #description textarea\").live(\"change\", function() {
\t\$(\"#description-requires-update\").val(1);
});

";
        // line 109
        echo "\$(\".sidebar-tabs\").bind(\"tabsselect\", function(event, ui) {
\tvar editor = tinyMCE.get(\"form-description\");
\tif (editor.isDirty())
\t{
\t\t\$(\"#description-requires-update\").val(1);
\t}
\tif (\$(\"#description-requires-update\").val() > 0)
\t{
\t\t\$(\"#description-tab-to-redirect-to\").val(ui.index);
\t\t\$(\"#description-confirm-leave\").fadeIn();
\t\t\$(\"html, body\").animate({scrollTop: \$(\"#description\").offset().top + 35},'slow');
\t\treturn false;
\t}
\treturn true;
});

";
        // line 126
        echo "\$(\".action-leave-description\").live('click', function() {
\tvar editor = tinyMCE.get(\"form-description\");
\teditor.isNotDirty = 1;
\t\$(\"#description-requires-update\").val(0);
\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#description-tab-to-redirect-to\").val()));
\t\$(\"#description-tab-to-redirect-to\").val(-1);
\t\$(\"#description-confirm-leave\").hide();
\t\$(\"html, body\").animate({scrollTop: \$(\"#description\").offset().top + 35},'slow');
});";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:updateDescriptionScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 126,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  90 => 32,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 85,  65 => 84,  63 => 34,  43 => 47,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 2,  82 => 27,  72 => 16,  64 => 12,  53 => 8,  49 => 11,  44 => 5,  42 => 7,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 20,  20 => 2,  30 => 12,  26 => 3,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 125,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 25,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 11,  24 => 6,  17 => 2,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 24,  102 => 70,  94 => 33,  89 => 20,  87 => 28,  84 => 53,  81 => 26,  73 => 19,  70 => 86,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
