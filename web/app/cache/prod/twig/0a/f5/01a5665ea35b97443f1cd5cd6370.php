<?php

/* WebIlluminationAdminBundle:Products:ajaxGetOptions.html.twig */
class __TwigTemplate_0af501a5665ea35b97443f1cd5cd6370 extends Twig_Template
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
        echo "<div class=\"ui-widget info-message\">
\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>Please update the options available below.</p>
\t</div>
</div>
<div id=\"option-success-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-success ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-circle-check\"></span>
        <p><strong>SUCCESS:</strong> <span id=\"option-success-message-text\"></span></p>
    </div>
</div>
<div id=\"option-error-message\" class=\"ui-widget message closeable ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-alert\"></span>
        <p><strong>ERROR:</strong> <span id=\"option-error-message-text\"></span></p>
    </div>
</div>
<div id=\"option-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
        <p>
        \t<button class=\"button action-save-options-and-leave ui-button-green\" data-icon-primary=\"ui-icon-check\">Save</button>
        \t<button data-tab-index=\"\" id=\"option-leave-options-button\" class=\"button ui-button-red action-leave-options\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
        </p>
    </div>
</div>
<div id=\"option-confirm-delete\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\"> 
        <span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the highlighted option?</p>
        <p>
        \t<button data-index=\"\" id=\"option-confirm-delete-button\" class=\"button ui-button-red action-delete-option\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"option-cancel-delete-button\" class=\"button ui-button-blue action-cancel-delete-option\">Cancel</button>
        </p>
    </div>
</div>
<div id=\"option-confirm-deletes\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the selected options?</p>
        <p>
        \t<button data-option-group-id=\"\" id=\"option-confirm-deletes-button\" class=\"button ui-button-red action-delete-options\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button id=\"option-cancel-deletes-button\" class=\"button ui-button-blue action-cancel-delete-options\">Cancel</button>
        </p>
    </div>
</div>
<div id=\"option-group-confirm-delete\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\"> 
        <span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the highlighted option group?</p>
        <p>
        \t<button data-index=\"\" id=\"option-group-confirm-delete-button\" class=\"button ui-button-red action-delete-option-group\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button data-index=\"\" id=\"option-group-cancel-delete-button\" class=\"button ui-button-blue action-cancel-delete-option-group\">Cancel</button>
        </p>
    </div>
</div>
<div id=\"option-group-confirm-deletes\" class=\"ui-widget message ui-helper-hidden\">
    <div class=\"ui-state-error ui-corner-all\">
    \t<span class=\"ui-icon ui-icon-help\"></span>
        <p><strong>WARNING:</strong> Are you sure you want to delete the selected option groups?</p>
        <p>
        \t<button id=\"option-group-confirm-deletes-button\" class=\"button ui-button-red action-delete-option-groups\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
        \t<button id=\"option-group-cancel-deletes-button\" class=\"button ui-button-blue action-cancel-delete-option-groups\">Cancel</button>
        </p>
    </div>
</div>
<div class=\"clearfix\">
    <div class=\"form-input-long\">
\t\t<div class=\"options-container\">
\t\t\t<input type=\"hidden\" id=\"option-group-count\" value=\"";
        // line 72
        if ((twig_length_filter($this->env, $this->getContext($context, "options")) > 1)) {
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "options")), "html", null, true);
        } else {
            echo "1";
        }
        echo "\" />
\t\t\t";
        // line 73
        if ((twig_length_filter($this->env, $this->getContext($context, "options")) > 0)) {
            // line 74
            echo "\t\t\t\t<ul class=\"list-fields\" id=\"product-option-groups-container\">
\t\t\t\t\t";
            // line 75
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "options"));
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
            foreach ($context['_seq'] as $context["productOptionGroup"] => $context["productOptions"]) {
                echo "\t
\t\t\t\t\t\t<li class=\"product-option-group-container\" data-index=\"";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" id=\"option-group-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td width=\"9\">
\t\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
                echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"1\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"option-group-id\" id=\"form-option-group-id-";
                // line 84
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t<input data-index=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" type=\"checkbox\" class=\"option-group-select\" id=\"form-option-group-select-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"al\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"no-margin no-padding no-border\">";
                // line 88
                echo twig_escape_filter($this->env, $this->getContext($context, "productOptionGroup"), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"160\">
\t\t\t\t\t\t\t\t\t\t\t<button data-option-group-id=\"";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" data-index=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" class=\"button ui-button-red action-confirm-delete-option-group\" data-icon-primary=\"ui-icon-closethick\">Delete Option Group</button>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"85\" class=\"ar no-padding-right\">
\t\t\t\t\t\t\t\t\t\t\t<button data-option-group-id=\"";
                // line 94
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" id=\"show-hide-options-button-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-blue action-show-hide-options\" data-icon-primary=\"ui-icon-triangle-1-s\">Options</button>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td width=\"5\" class=\"no-padding\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr style=\"width: 100%;\" id=\"product-options-";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"ui-helper-hidden\">
\t\t\t\t\t\t\t\t\t\t<td colspan=\"2\">&nbsp;</td>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"4\" class=\"al no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t\t\t\t\t<div id=\"option-confirm-delete-";
                // line 101
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"ui-widget message ui-helper-hidden\">
\t\t\t\t\t\t\t\t\t\t\t    <div class=\"ui-state-error ui-corner-all\"> 
\t\t\t\t\t\t\t\t\t\t\t        <span class=\"ui-icon ui-icon-help\"></span>
\t\t\t\t\t\t\t\t\t\t\t        <p><strong>WARNING:</strong> Are you sure you want to delete the highlighted option?</p>
\t\t\t\t\t\t\t\t\t\t\t        <p>
\t\t\t\t\t\t\t\t\t\t\t        \t<button data-index=\"\" id=\"option-confirm-delete-button-";
                // line 106
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-red action-delete-option\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</button>
\t\t\t\t\t\t\t\t\t\t\t        \t<button data-index=\"\" id=\"option-cancel-delete-button-";
                // line 107
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-blue action-cancel-delete-option\">Cancel</button>
\t\t\t\t\t\t\t\t\t\t\t        </p>
\t\t\t\t\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"option-count-";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" value=\"";
                if ((twig_length_filter($this->env, $this->getContext($context, "productOptions")) > 1)) {
                    echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "productOptions")), "html", null, true);
                } else {
                    echo "1";
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t<ul class=\"list-fields product-options-container\" id=\"product-options-container-";
                // line 112
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 113
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "productOptions"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["productOption"]) {
                    // line 114
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<li class=\"product-option-container\" data-index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" id=\"option-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"9\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
                    // line 119
                    echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
                    echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" class=\"select delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input data-option-group-id=\"";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "\" data-index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" type=\"checkbox\" class=\"option-select option-select-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "\" id=\"form-option-select-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"1\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"140\" class=\"al no-padding-left no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"form-option-product-option-id-";
                    // line 125
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"full option-product-option-id\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 127
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "productOptionObjects"));
                    foreach ($context['_seq'] as $context["_key"] => $context["productOptionObject"]) {
                        // line 128
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getAttribute($this->getContext($context, "productOptionObject"), "productOptionGroupId") == $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"))) {
                            // line 129
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                            if (($this->getAttribute($this->getContext($context, "productOptionObject"), "id") == $this->getAttribute($this->getContext($context, "productOption"), "productOptionId"))) {
                                echo " selected=\"selected\"";
                            }
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOptionObject"), "id"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOptionObject"), "productOption"), "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 131
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productOptionObject'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 132
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"ac no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"ac option-price\" id=\"form-option-price-";
                    // line 135
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "price"), 2), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"130\" class=\"ac no-padding-top no-padding-bottom\" width=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"form-option-price-type-";
                    // line 138
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"full option-price-type\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                    // line 139
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "a")) {
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"a\">Fixed (&pound;)</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                    // line 140
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "p")) {
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"p\">Percentage (%)</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                    // line 141
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceType") == "r")) {
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"r\">Replace</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"110\" class=\"ac no-padding-top no-padding-bottom\" width=\"100\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select id=\"form-option-price-use-";
                    // line 145
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"full option-price-use\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                    // line 146
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "i")) {
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"i\">Increase (+)</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option";
                    // line 147
                    if (($this->getAttribute($this->getContext($context, "productOption"), "priceUse") == "d")) {
                        echo " selected=\"selected\"";
                    }
                    echo " value=\"d\">Decrease (-)</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"option-id\" id=\"form-option-id-";
                    // line 151
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "id"), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"option-product-option-group-id\" id=\"form-option-product-option-group-id-";
                    // line 152
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"option-display-order\" id=\"form-option-display-order-";
                    // line 153
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
                    // line 154
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"option-requires-update\" id=\"form-option-requires-update-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"0\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button data-option-group-id=\"";
                    // line 155
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "\" data-index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOption"), "productOptionGroupId"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"button ui-button-red action-confirm-delete-option\" data-icon-only=\"true\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productOption'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 162
                echo "\t\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t\t    <div class=\"form-input-long buttons margin-bottom-5\">
\t\t\t\t\t\t\t\t\t\t\t    \t<button data-option-group-id=\"";
                // line 165
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-green action-update-options\" data-icon-primary=\"ui-icon-check\">Update</button>
\t\t\t\t\t\t\t\t\t\t\t    \t<button data-option-group-id=\"";
                // line 166
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-red action-confirm-delete-options ui-helper-hidden\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t\t\t\t\t\t    \t<button data-option-group-id=\"";
                // line 167
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-blue action-add-option\" data-icon-primary=\"ui-icon-plusthick\">Add</button>
\t\t\t\t\t\t\t\t\t\t\t    \t<button data-option-group-id=\"";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-blue action-select-all-options\" data-icon-primary=\"ui-icon-radio-on\">Select All</button>
\t\t\t\t\t\t\t\t\t\t\t    \t<button data-option-group-id=\"";
                // line 169
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "productOptions"), 0), "productOptionGroupId"), "html", null, true);
                echo "\" class=\"button ui-button-blue action-unselect-all-options ui-helper-hidden\" data-icon-primary=\"ui-icon-bullet\">Unselect All</button>
\t\t\t\t\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t        </li>
\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['productOptionGroup'], $context['productOptions'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 178
            echo "\t\t\t\t</ul>
\t\t\t";
        } else {
            // line 180
            echo "\t\t\t\t<p class=\"no-margin\">There are currently no options setup for this product. Please add an option group below.</p>
\t\t\t";
        }
        // line 182
        echo "\t\t\t<div class=\"spacer\"></div>
\t\t\t<h3>Add New Option Group</h3>
\t\t\t<table width=\"100%\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"al no-padding-left no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t";
        // line 188
        if ((twig_length_filter($this->env, $this->getContext($context, "productOptionGroupObjects")) > 0)) {
            // line 189
            echo "\t\t\t\t\t\t\t\t<select id=\"form-option-product-option-group-id\" class=\"full option-product-option-group-id\">
\t\t\t\t\t\t\t\t\t<option value=\"\">- Please Select -</option>
\t\t\t\t\t\t\t\t\t";
            // line 191
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "productOptionGroupObjects"));
            foreach ($context['_seq'] as $context["_key"] => $context["productOptionGroupObject"]) {
                // line 192
                echo "\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOptionGroupObject"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "productOptionGroupObject"), "productOptionGroup"), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productOptionGroupObject'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 194
            echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t";
        } else {
            // line 196
            echo "\t\t\t\t\t\t\t\tNo option groups found.
\t\t\t\t\t\t\t";
        }
        // line 198
        echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"10\">&nbsp;</td>
\t\t\t\t\t\t<td width=\"146\">
\t\t\t\t\t\t\t<button class=\"button ui-button-blue action-add-option-group\" data-icon-primary=\"ui-icon-plusthick\">Add Option Group</button>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>
\t</div>
</div>
<div id=\"option-group-buttons\" class=\"clearfix ui-helper-hidden\">
    <div class=\"form-input-long buttons no-margin-bottom\">
    \t<button class=\"button ui-button-red action-confirm-delete-option-groups ui-helper-hidden\" data-icon-primary=\"ui-icon-closethick\">Delete Selected Option Groups</button>
    \t<button class=\"button ui-button-blue action-select-all-option-groups\" data-icon-primary=\"ui-icon-radio-on\">Select All</button>
    \t<button class=\"button ui-button-blue action-unselect-all-option-groups ui-helper-hidden\" data-icon-primary=\"ui-icon-bullet\">Unselect All</button>
    \t<input type=\"hidden\" value=\"-1\" id=\"options-tab-to-redirect-to\" />
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:ajaxGetOptions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 119,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 169,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 196,  501 => 194,  499 => 204,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 123,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 156,  342 => 145,  329 => 142,  326 => 276,  319 => 138,  288 => 172,  229 => 85,  206 => 70,  147 => 71,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 69,  173 => 58,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 41,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 256,  271 => 104,  253 => 203,  233 => 204,  226 => 64,  187 => 40,  150 => 112,  260 => 91,  155 => 31,  223 => 179,  186 => 103,  169 => 127,  301 => 85,  298 => 180,  292 => 243,  267 => 109,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 65,  182 => 91,  175 => 98,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 53,  114 => 20,  208 => 92,  183 => 151,  166 => 94,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 213,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 227,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 187,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 143,  210 => 112,  180 => 55,  172 => 53,  168 => 52,  149 => 47,  139 => 50,  240 => 202,  230 => 93,  121 => 28,  257 => 225,  249 => 74,  106 => 20,  334 => 269,  294 => 131,  286 => 171,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 62,  181 => 101,  167 => 127,  160 => 50,  45 => 8,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 339,  367 => 149,  360 => 320,  352 => 225,  338 => 235,  333 => 141,  327 => 140,  324 => 289,  320 => 168,  297 => 261,  274 => 126,  256 => 86,  254 => 74,  252 => 122,  231 => 114,  216 => 178,  213 => 175,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 120,  270 => 122,  266 => 220,  261 => 228,  247 => 88,  243 => 211,  238 => 107,  220 => 79,  201 => 160,  194 => 59,  130 => 95,  100 => 74,  85 => 14,  76 => 58,  112 => 30,  101 => 68,  98 => 73,  272 => 118,  269 => 237,  228 => 197,  221 => 93,  197 => 169,  184 => 56,  138 => 84,  118 => 92,  105 => 26,  66 => 40,  56 => 13,  115 => 82,  83 => 20,  164 => 51,  140 => 39,  58 => 6,  21 => 5,  61 => 14,  36 => 18,  209 => 173,  205 => 63,  196 => 59,  192 => 58,  189 => 106,  178 => 145,  176 => 54,  165 => 127,  161 => 61,  152 => 88,  148 => 57,  141 => 34,  134 => 114,  132 => 81,  127 => 30,  123 => 23,  109 => 45,  90 => 72,  54 => 12,  133 => 104,  124 => 32,  111 => 27,  107 => 39,  80 => 48,  69 => 22,  60 => 26,  52 => 6,  97 => 25,  95 => 37,  88 => 13,  78 => 16,  75 => 28,  71 => 10,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 174,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 89,  236 => 187,  222 => 70,  218 => 105,  159 => 55,  154 => 128,  151 => 126,  145 => 77,  136 => 100,  128 => 47,  125 => 106,  119 => 41,  110 => 19,  96 => 15,  93 => 35,  91 => 24,  68 => 16,  65 => 8,  63 => 22,  43 => 4,  50 => 5,  25 => 7,  92 => 35,  86 => 61,  79 => 18,  46 => 20,  37 => 21,  33 => 14,  27 => 9,  82 => 33,  72 => 31,  64 => 15,  53 => 37,  49 => 28,  44 => 25,  42 => 4,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 20,  20 => 3,  30 => 12,  26 => 9,  22 => 5,  224 => 65,  215 => 173,  211 => 101,  204 => 61,  200 => 111,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 149,  179 => 92,  177 => 59,  171 => 50,  162 => 83,  158 => 91,  156 => 49,  153 => 47,  146 => 122,  142 => 35,  137 => 38,  131 => 58,  126 => 92,  120 => 22,  117 => 84,  103 => 75,  99 => 18,  77 => 18,  74 => 19,  57 => 34,  47 => 5,  39 => 3,  32 => 6,  24 => 6,  17 => 1,  135 => 53,  129 => 34,  122 => 76,  116 => 27,  113 => 40,  108 => 26,  104 => 28,  102 => 17,  94 => 32,  89 => 68,  87 => 22,  84 => 11,  81 => 61,  73 => 26,  70 => 9,  67 => 49,  62 => 45,  59 => 18,  55 => 34,  51 => 6,  48 => 5,  41 => 23,  38 => 9,  35 => 15,  31 => 2,  28 => 11,);
    }
}
