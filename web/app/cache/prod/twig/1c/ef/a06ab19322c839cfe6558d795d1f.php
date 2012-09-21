<?php

/* WebIlluminationAdminBundle:System:image.html.twig */
class __TwigTemplate_1cefa06ab19322c839cfe6558d795d1f extends Twig_Template
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
        echo "<li class=\"image-container\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" id=\"image-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tbody>
\t\t\t\t";
        // line 5
        if (($this->getContext($context, "objectType") == "product")) {
            // line 6
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td width=\"9\" rowspan=\"2\">
\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"select delete\">
\t\t\t\t\t\t\t<input data-index=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"image-select\" id=\"form-image-select-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"1\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"no-padding-bottom\">
\t\t\t\t\t\t\t<input type=\"text\" class=\"image-title full\" id=\"form-image-title-";
            // line 14
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" placeholder=\"Enter a title\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "title", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "title"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"52\" rowspan=\"2\" class=\"ac\">";
            // line 16
            ob_start();
            // line 17
            echo "\t\t\t\t        \t";
            if ($this->getAttribute($this->getContext($context, "data", true), "thumbnailPath", array(), "any", true, true)) {
                // line 18
                echo "\t\t\t\t\t\t    \t<img id=\"form-image-preview-";
                echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
                echo "\" alt=\"";
                if ($this->getAttribute($this->getContext($context, "data", true), "title", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "title"), "html", null, true);
                }
                echo "\" class=\"thumbnail action-image-popup\"";
                if ($this->getAttribute($this->getContext($context, "data", true), "largePath", array(), "any", true, true)) {
                    echo " data-image-size-width=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largeWidth", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largeWidth"), "html", null, true);
                    }
                    echo "\" data-image-size-height=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largeHeight", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largeHeight"), "html", null, true);
                    }
                    echo "\" data-image-large-path=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largePath", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largePath"), "html", null, true);
                        echo "?version=";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "dmYHis"), "html", null, true);
                    }
                    echo "\"";
                }
                echo " src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "data"), "thumbnailPath")), "html", null, true);
                echo "?version=";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "dmYHis"), "html", null, true);
                echo "\" width=\"50\" border=\"0\" />
\t\t\t\t\t\t    ";
            } else {
                // line 20
                echo "\t\t\t\t\t\t    \t<img id=\"form-image-preview-";
                echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
                echo "\" width=\"50\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/no-image-available.png"), "html", null, true);
                echo "\" border=\"0\" alt=\"No Image Available\" />
\t\t\t\t        \t";
            }
            // line 22
            echo "\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t<td width=\"1\" rowspan=\"2\" class=\"ac\">
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-display-order\" id=\"form-image-display-order-";
            // line 24
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"image-requires-update\" id=\"form-image-requires-update-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"0\" />
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-id\" id=\"form-image-id-";
            // line 26
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "id", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "id"), "html", null, true);
            } else {
                echo "0";
            }
            echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-description\" id=\"form-image-description-";
            // line 27
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "description", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "description"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-link\" id=\"form-image-link-";
            // line 28
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "link", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "link"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-alignment\" id=\"form-image-alignment-";
            // line 29
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "alignment", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "alignment"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t\t<button data-index=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"button ui-button-red action-confirm-delete-image\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t</td>\t\t\t\t\t\t\t\t
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"no-padding-top\">
\t\t\t\t\t\t\t<div class=\"image-file-upload\" id=\"image-file-upload-";
            // line 35
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></div>
\t\t\t\t\t\t\t<div class=\"image-file-uploading ui-helper-hidden\" id=\"image-file-uploading-";
            // line 36
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<img class=\"fl\" alt=\"Loading\" width=\"16\" height=\"11\" src=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-file-loader.gif"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t<p>Please wait, uploading file&hellip;</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"image-upload-success-";
            // line 40
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"ui-widget image-upload-success image-upload-message ui-helper-hidden\">
\t\t\t\t\t\t\t    <div class=\"ui-state-success no-margin ui-corner-all\"> 
\t\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-circle-check\"></span>
\t\t\t\t\t\t\t            <span class=\"image-upload-success-text\" id=\"image-upload-success-text-";
            // line 44
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></span>
\t\t\t\t\t\t\t            <img class=\"fr action-cancel-image-upload action-cancel-image-upload-";
            // line 45
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t        </p>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"image-upload-error-";
            // line 49
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"ui-widget image-upload-error image-upload-message ui-helper-hidden\">
\t\t\t\t\t\t\t    <div class=\"ui-state-error no-margin ui-corner-all\"> 
\t\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-alert\"></span>
\t\t\t\t\t\t\t            <span class=\"image-upload-error-text\" id=\"image-upload-error-text-";
            // line 53
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></span>
\t\t\t\t\t\t\t            <img class=\"fr action-cancel-image-upload action-cancel-image-upload-";
            // line 54
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t        </p>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"hidden\" id=\"form-image-file-";
            // line 58
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"image-file\" />\t\t
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        } else {
            // line 62
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td width=\"9\" rowspan=\"4\">
\t\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
            echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"1\" rowspan=\"4\" class=\"select delete\">
\t\t\t\t\t\t\t<input data-index=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"image-select\" id=\"form-image-select-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"1\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td colspan=\"2\" class=\"no-padding-bottom\">
\t\t\t\t\t\t\t<input type=\"text\" class=\"image-title full\" id=\"form-image-title-";
            // line 70
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" placeholder=\"Enter a title\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "title", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "title"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"78\" rowspan=\"3\" class=\"ac\">";
            // line 72
            ob_start();
            // line 73
            echo "\t\t\t\t        \t";
            if ($this->getAttribute($this->getContext($context, "data", true), "thumbnailPath", array(), "any", true, true)) {
                // line 74
                echo "\t\t\t\t\t\t    \t<img id=\"form-image-preview-";
                echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
                echo "\" alt=\"";
                if ($this->getAttribute($this->getContext($context, "data", true), "title", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "title"), "html", null, true);
                }
                echo "\" class=\"thumbnail action-image-popup\"";
                if ($this->getAttribute($this->getContext($context, "data", true), "largePath", array(), "any", true, true)) {
                    echo " data-image-size-width=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largeWidth", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largeWidth"), "html", null, true);
                    }
                    echo "\" data-image-size-height=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largeHeight", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largeHeight"), "html", null, true);
                    }
                    echo "\" data-image-large-path=\"";
                    if ($this->getAttribute($this->getContext($context, "data", true), "largePath", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "largePath"), "html", null, true);
                        echo "?version=";
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "dmYHis"), "html", null, true);
                    }
                    echo "\"";
                }
                echo " src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "data"), "thumbnailPath")), "html", null, true);
                echo "?version=";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "dmYHis"), "html", null, true);
                echo "\" width=\"76\" border=\"0\" />
\t\t\t\t\t\t    ";
            } else {
                // line 76
                echo "\t\t\t\t\t\t    \t<img id=\"form-image-preview-";
                echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
                echo "\" width=\"76\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/no-image-available.png"), "html", null, true);
                echo "\" border=\"0\" alt=\"No Image Available\" />
\t\t\t\t        \t";
            }
            // line 78
            echo "\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"2\" class=\"no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t<input type=\"text\" class=\"image-description full\" id=\"form-image-description-";
            // line 82
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" placeholder=\"Enter a description\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "description", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "description"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"2\" class=\"no-padding-top no-padding-bottom\">
\t\t\t\t\t\t\t<input type=\"url\" data-message=\"Please enter a valid web address that starts with http://\" class=\"image-link url full\" id=\"form-image-link-";
            // line 87
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" placeholder=\"Enter a link\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "link", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "link"), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"no-padding-top\">
\t\t\t\t\t\t\t<div class=\"image-file-upload\" id=\"image-file-upload-";
            // line 92
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></div>
\t\t\t\t\t\t\t<div class=\"image-file-uploading ui-helper-hidden\" id=\"image-file-uploading-";
            // line 93
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<img class=\"fl\" alt=\"Loading\" width=\"16\" height=\"11\" src=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-file-loader.gif"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t<p>Please wait, uploading file&hellip;</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"image-upload-success-";
            // line 97
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"ui-widget image-upload-success image-upload-message ui-helper-hidden\">
\t\t\t\t\t\t\t    <div class=\"ui-state-success no-margin ui-corner-all\"> 
\t\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-circle-check\"></span>
\t\t\t\t\t\t\t            <span class=\"image-upload-success-text\" id=\"image-upload-success-text-";
            // line 101
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></span>
\t\t\t\t\t\t\t            <img class=\"fr action-cancel-image-upload action-cancel-image-upload-";
            // line 102
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t        </p>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div id=\"image-upload-error-";
            // line 106
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"ui-widget image-upload-error image-upload-message ui-helper-hidden\">
\t\t\t\t\t\t\t    <div class=\"ui-state-error no-margin ui-corner-all\"> 
\t\t\t\t\t\t\t        <p class=\"no-margin\">
\t\t\t\t\t\t\t            <span class=\"ui-icon ui-icon-alert\"></span>
\t\t\t\t\t\t\t            <span class=\"image-upload-error-text\" id=\"image-upload-error-text-";
            // line 110
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\"></span>
\t\t\t\t\t\t\t            <img class=\"fr action-cancel-image-upload action-cancel-image-upload-";
            // line 111
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" alt=\"Cancel\" width=\"14\" height=\"14\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/close-small.png"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t        </p>
\t\t\t\t\t\t\t    </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"hidden\" id=\"form-image-file-";
            // line 115
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"image-file\" />\t\t
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"120\" class=\"no-padding-top no-padding-left\">
\t\t\t\t\t\t\t<select autocomplete=\"off\" class=\"image-alignment full\" id=\"form-image-alignment-";
            // line 118
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\">
\t\t\t\t        \t\t<option value=\"\">No Alignment</option>
\t\t\t\t        \t\t<option value=\"left\"";
            // line 120
            if ($this->getAttribute($this->getContext($context, "data", true), "alignment", array(), "any", true, true)) {
                if (($this->getAttribute($this->getContext($context, "data"), "alignment") == "left")) {
                    echo " selected=\"selected\"";
                }
            }
            echo ">Left Align</option>
\t\t\t\t        \t\t<option value=\"right\"";
            // line 121
            if ($this->getAttribute($this->getContext($context, "data", true), "alignment", array(), "any", true, true)) {
                if (($this->getAttribute($this->getContext($context, "data"), "alignment") == "right")) {
                    echo " selected=\"selected\"";
                }
            }
            echo ">Right Align</option>
\t\t\t\t        \t</select>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td width=\"78\" class=\"ac no-padding-top\">
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-display-order\" id=\"form-image-display-order-";
            // line 125
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" data-index=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"image-requires-update\" id=\"form-image-requires-update-";
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"0\" />
\t\t\t\t\t\t\t<input type=\"hidden\" class=\"image-id\" id=\"form-image-id-";
            // line 127
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" value=\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "id", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "id"), "html", null, true);
            } else {
                echo "0";
            }
            echo "\" />
\t\t\t\t\t\t\t<button data-index=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
            echo "\" class=\"button ui-button-red action-confirm-delete-image\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        // line 132
        echo "\t\t\t</tbody>
\t\t</table>
\t\t<script type=\"text/javascript\">
\t\t\t\$(document).ready(function() {
\t\t\t\t";
        // line 137
        echo "\t\t\t\t\$(\".action-cancel-image-upload-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").live('click', function() {
\t\t\t\t\t\$(\"#image-upload-error-";
        // line 138
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #image-upload-success-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #image-file-uploading-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t\t\t\t\t\$(\"#image-file-upload-";
        // line 139
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " .qq-upload-list\").html(\"\");
\t\t\t\t\t\$(\"#image-file-upload-";
        // line 140
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " span.filename\").html(\"No file selected\");
\t\t\t\t\t\$(\"#form-image-file-";
        // line 141
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"\");
\t\t\t\t\t\$(\"#image-file-upload-";
        // line 142
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t\t\t\t});
\t\t\t\t
\t\t\t\t";
        // line 146
        echo "\t\t\t\tvar imageUploader";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " = new qq.FileUploader({
\t\t\t\t    element: document.getElementById('image-file-upload-";
        // line 147
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "'),
\t\t\t\t    action: '";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_upload_file"), "html", null, true);
        echo "',
\t\t\t\t    onSubmit: function(id, fileName) {
\t\t\t\t    \t\$(\"#form-image-file-";
        // line 150
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"\");
\t\t\t\t    \t\$(\"#image-file-upload-";
        // line 151
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t\t\t\t    \tvar fileExtensions = fileName.toLowerCase().split(\".\");
\t        \t\t\tvar fileExtension = fileExtensions[(fileExtensions.length - 1)];
\t        \t\t\tif ((fileExtension == 'jpg') || (fileExtension == 'jpeg') || (fileExtension == 'png') || (fileExtension == 'gif'))
\t        \t\t\t{
\t        \t\t\t\t\$(\"#image-file-uploading-";
        // line 156
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t} else {
\t        \t\t\t\t\$(\"#image-upload-error-text-";
        // line 158
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(\"jpg, png and gif files only.\");
\t        \t\t\t\t\$(\"#image-upload-error-";
        // line 159
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t\treturn false;
\t\t\t\t\t    }
\t\t\t\t    },
\t        \t\tonComplete: function(id, fileName, responseJSON) {
\t        \t\t\t\$(\"#image-file-upload-";
        // line 164
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #image-file-uploading-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #image-upload-error-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo ", #image-upload-success-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").hide();
\t        \t\t\tif (responseJSON.response == 'success')
\t        \t\t\t{
\t        \t\t\t\t\$(\"#form-image-requires-update-";
        // line 167
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(\"1\");
\t        \t\t\t\t\$(\"#image-upload-success-text-";
        // line 168
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(\"File Uploaded: \"+responseJSON.fileSize);
\t        \t\t\t\t\$(\"#form-image-file-";
        // line 169
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").val(responseJSON.fileName);
\t        \t\t\t\t\$(\"#image-upload-success-";
        // line 170
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t} else {
\t        \t\t\t\t\$(\"#image-upload-error-text-";
        // line 172
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").html(responseJSON.message);
\t        \t\t\t\t\$(\"#image-upload-error-";
        // line 173
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\").fadeIn();
\t        \t\t\t}
\t        \t\t}
\t\t\t\t});
\t\t\t\t
\t\t\t\t\$(\"#image-file-upload-";
        // line 178
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo " :file:not(.no-uniform)\").uniform();
\t\t\t});
\t\t</script>
\t</div>
</li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 93,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 127,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 641,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 421,  476 => 146,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 139,  288 => 123,  229 => 105,  206 => 54,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 147,  219 => 178,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 235,  276 => 119,  262 => 115,  235 => 80,  232 => 67,  212 => 174,  207 => 44,  143 => 57,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 118,  253 => 110,  233 => 105,  226 => 64,  187 => 65,  150 => 65,  260 => 82,  155 => 67,  223 => 102,  186 => 45,  169 => 37,  301 => 128,  298 => 100,  292 => 98,  267 => 224,  258 => 114,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 78,  182 => 44,  175 => 40,  144 => 119,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 92,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 111,  363 => 157,  359 => 154,  355 => 201,  351 => 102,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 119,  265 => 116,  251 => 73,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 53,  168 => 52,  149 => 50,  139 => 41,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 40,  334 => 94,  294 => 78,  286 => 76,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 50,  45 => 9,  487 => 199,  481 => 147,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 53,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 126,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 56,  85 => 26,  76 => 31,  112 => 25,  101 => 22,  98 => 75,  272 => 118,  269 => 117,  228 => 105,  221 => 77,  197 => 89,  184 => 64,  138 => 27,  118 => 59,  105 => 38,  66 => 16,  56 => 16,  115 => 58,  83 => 18,  164 => 51,  140 => 74,  58 => 17,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 72,  192 => 87,  189 => 86,  178 => 79,  176 => 41,  165 => 36,  161 => 35,  152 => 125,  148 => 43,  141 => 45,  134 => 60,  132 => 102,  127 => 48,  123 => 39,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 60,  111 => 38,  107 => 24,  80 => 55,  69 => 30,  60 => 16,  52 => 16,  97 => 55,  95 => 37,  88 => 21,  78 => 32,  75 => 55,  71 => 53,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 67,  402 => 164,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 62,  218 => 100,  159 => 54,  154 => 124,  151 => 66,  145 => 29,  136 => 103,  128 => 29,  125 => 98,  119 => 26,  110 => 42,  96 => 34,  93 => 20,  91 => 36,  68 => 29,  65 => 23,  63 => 17,  43 => 6,  50 => 18,  25 => 4,  92 => 36,  86 => 22,  79 => 29,  46 => 13,  37 => 4,  33 => 8,  27 => 5,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 11,  44 => 15,  42 => 19,  34 => 3,  29 => 6,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 13,  26 => 2,  22 => 2,  224 => 101,  215 => 58,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 76,  188 => 153,  185 => 83,  179 => 48,  177 => 61,  171 => 136,  162 => 36,  158 => 125,  156 => 49,  153 => 30,  146 => 64,  142 => 42,  137 => 28,  131 => 44,  126 => 40,  120 => 45,  117 => 92,  103 => 33,  99 => 19,  77 => 21,  74 => 20,  57 => 17,  47 => 14,  39 => 11,  32 => 9,  24 => 4,  17 => 1,  135 => 38,  129 => 27,  122 => 26,  116 => 58,  113 => 25,  108 => 41,  104 => 24,  102 => 57,  94 => 21,  89 => 67,  87 => 30,  84 => 34,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 15,  59 => 18,  55 => 13,  51 => 13,  48 => 15,  41 => 23,  38 => 18,  35 => 5,  31 => 4,  28 => 11,);
    }
}
