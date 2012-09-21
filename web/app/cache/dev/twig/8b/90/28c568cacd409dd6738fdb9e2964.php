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
        return array (  151 => 68,  145 => 65,  134 => 60,  127 => 56,  120 => 52,  100 => 44,  93 => 40,  79 => 32,  62 => 24,  56 => 21,  36 => 10,  32 => 9,  27 => 4,  38 => 12,  31 => 8,  157 => 50,  150 => 46,  141 => 64,  135 => 38,  129 => 37,  121 => 34,  108 => 30,  95 => 26,  88 => 25,  82 => 22,  76 => 21,  63 => 17,  55 => 20,  44 => 15,  26 => 6,  103 => 29,  91 => 28,  85 => 26,  83 => 25,  78 => 24,  72 => 28,  65 => 20,  59 => 18,  57 => 15,  50 => 18,  48 => 15,  43 => 14,  34 => 9,  29 => 6,  25 => 4,  23 => 3,  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 54,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 35,  117 => 41,  115 => 47,  106 => 43,  97 => 27,  90 => 37,  81 => 33,  68 => 27,  61 => 23,  54 => 19,  47 => 15,  42 => 10,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 51,  110 => 48,  104 => 45,  98 => 24,  92 => 23,  86 => 36,  80 => 21,  74 => 31,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 7,  17 => 1,);
    }
}
