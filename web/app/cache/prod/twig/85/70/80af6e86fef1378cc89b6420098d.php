<?php

/* WebIlluminationAdminBundle:BrandsOld:add.html.twig */
class __TwigTemplate_857080af6e86fef1378cc89b6420098d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'leftmenu' => array($this, 'block_leftmenu'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Add New Brand | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_javascripts($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 5
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "27960c7_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7_0") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce_jquery.tinymce_1.js");
            // line 6
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        } else {
            // asset "27960c7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_27960c7") : $this->env->getExtension('assets')->getAssetUrl("js/tinymce.js");
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
            echo "\" type=\"text/javascript\"></script>
\t";
        }
        unset($context["asset_url"]);
        // line 7
        echo " 
";
    }

    // line 9
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 10
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 11
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<h2>Add New Brand</h2>
";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    <section class=\"container_6 clearfix\">
    \t<form action=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands_add"), "html", null, true);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form has-validation\">
\t    \t<div class=\"grid_3\"> 
\t\t\t\t<div class=\"portlet\">
\t\t\t\t\t<header>
\t\t                <h2>Brand Information</h2>
\t                </header>
\t                <pre>";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('twig_extensions')->filter_print_r($this->getContext($context, "image")), "html", null, true);
        echo "</pre>
\t\t\t\t\t<section>
\t                    <div class=\"clearfix\">
\t                        <label for=\"form-name\" class=\"form-label\"><em>*</em> Name<small>Enter the brand name</small></label>
\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-name\" name=\"name\" required=\"required\" value=\"\" /></div>
\t                    </div>
\t                    <div class=\"clearfix\">
\t                        <label for=\"form-logo-image\" class=\"form-label\">Logo Image<small>Format: jpg, png or gif</small></label>
\t                        <div class=\"form-input\"><input type=\"file\" id=\"form-logo-image\" name=\"logo-image\" /></div>
\t                    </div>
\t\t\t\t\t\t<div class=\"clearfix\">
\t                        <label for=\"form-request-a-brochure\" class=\"form-label\">Request a Brochure<small>Available through the site?</small></label>
\t                        <div class=\"form-input\"><label><input type=\"radio\" name=\"request-a-brochure\" id=\"form-request-a-brochure-1\" value=\"1\" /> Yes</label> <label><input type=\"radio\" name=\"request-a-brochure\" id=\"form-request-a-brochure-0\" value=\"0\" checked=\"checked\" /> No</label></div>
\t                    </div>
\t                    <div id=\"brochure-web-address-container\" class=\"clearfix\">
\t                        <label for=\"form-brochure-web-address\" class=\"form-label\">Brochure Web Address<small>Include the \"http://\"</small></label>
\t                        <div class=\"form-input\"><input class=\"url\" type=\"url\" id=\"form-brochure-web-address\" name=\"brochure-web-address\" value=\"\" /></div>
\t                    </div>
\t                    <div class=\"clearfix\">
\t                        <label for=\"form-request-a-sample\" class=\"form-label\">Request a Sample<small>Available through the site?</small></label>
\t                        <div class=\"form-input\" id=\"form-request-a-sample-container\"><label><input type=\"radio\" name=\"request-a-sample\" id=\"form-request-a-sample-1\" value=\"1\" /> Yes</label> <label><input type=\"radio\" name=\"request-a-sample\" id=\"form-request-a-sample-0\" value=\"0\" checked=\"checked\" /> No</label></div>
\t                    </div>
\t                    <div id=\"sample-web-address-container\" class=\"clearfix\">
\t                        <label for=\"form-sample-web-address\" class=\"form-label\">Sample Web Address<small>Include the \"http://\"</small></label>
\t                        <div class=\"form-input no-margin-bottom\"><input class=\"url\" type=\"url\" id=\"form-sample-web-address\" name=\"sample-web-address\" value=\"\" /></div>
\t                    </div>
\t                    <div><input type=\"submit\" value=\"Save\" /></div>
\t\t            </section>
\t\t        </div>
\t\t    </div>
\t        <div class=\"grid_3\">
\t            <div class=\"portlet\">
\t                <header>
\t                    <h2>Brand Description</h2>
\t                </header>
\t                <section>
\t                \t<div class=\"clearfix\">
\t                        <div class=\"form-input no-margin-left no-margin-bottom\">
\t                        \t<div class=\"ac\">
\t                                <div class=\"buttonset no-margin-right\">
\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"1\" id=\"tinymce-description-1\" checked=\"checked\" /><label for=\"tinymce-description-1\">Visual</label>
\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-description\" name=\"tinymce-description\" value=\"0\" id=\"tinymce-description-0\" /><label for=\"tinymce-description-0\">HTML</label>
\t                                    <hr class=\"inset\" />
\t                                </div>
\t                                <div class=\"leading\">
\t                                \t<textarea id=\"form-description\" name=\"description\" rows=\"5\" class=\"tinymce-basic\"></textarea>
\t                                </div>
\t                            </div>
\t                        </div>
\t                    </div>
\t                </scetion>
\t            </div>
\t        </div>
\t\t        
\t\t   \t<div class=\"clear\"></div>
\t\t        
\t        <div class=\"grid_6 leading\">
\t            <div class=\"portlet\">
\t                <header>
\t                    <h2>Additional Information</h2>
\t                </header>
\t                <section>
\t                    <div class=\"sidebar-tabs\" style=\"min-height: 405px\">
\t                        <ul>
\t                            <li><a href=\"#seo\">SEO</a></li>
\t                            <li><a href=\"#contact-information\">Contact Information</a></li>
\t                            <li><a href=\"#pricing-discounts\">Pricing &amp; Discounts</a></li>
\t                            <li><a href=\"#suppliers\">Suppliers</a></li>
\t                            <li><a href=\"#warranty-and-guarantee\">Warranty &amp; Guarantee</a></li>
\t                            <li><a href=\"#gallery\">Gallery</a></li>
\t                            <li><a href=\"#attachments\">Attachments</a></li>
\t                            <li><a href=\"#statistics\">Statistics</a></li>
\t                            <li><a href=\"#trends\">Trends</a></li>
\t                            <li><a href=\"#competitors\">Competitors</a></li>
\t                            <li><a href=\"#history\">History</a></li>
\t                        </ul>
\t                        <section id=\"seo\">
\t                            <div class=\"clearfix\">
\t\t                        \t<label for=\"form-url\" class=\"form-label\"><em>*</em> URL<small>The internal web address</small></label>
\t\t\t                        <div class=\"form-input\"><input class=\"seo-url\" type=\"text\" id=\"form-url\" name=\"url\" required=\"required\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-page-title\" class=\"form-label\"><em>*</em> Page Title<small>Title used by the Browser</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-page-title\" name=\"page-title\" required=\"required\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-header\" class=\"form-label\"><em>*</em> Header<small>Main header on the page</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-header\" name=\"header\" required=\"required\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-meta-description\" class=\"form-label\">Meta Description<small>Description used by search engines</small></label>
\t\t\t                        <div class=\"form-input\"><textarea id=\"form-meta-description\" name=\"meta-description\" rows=\"3\"></textarea></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-meta-keywords\" class=\"form-label\">Meta Keywords<small>Keywords used by some search engines</small></label>
\t\t\t                        <div class=\"form-input\"><textarea id=\"form-meta-keywords\" name=\"meta-keywords\" rows=\"2\" class=\"items\"></textarea></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-search-words\" class=\"form-label\">Search Words<small>Alternative words visitors can find this page by</small></label>
\t\t\t                        <div class=\"form-input no-margin-bottom\"><textarea id=\"form-search-words\" name=\"search-words\" rows=\"2\" class=\"items\"></textarea></div>
\t\t\t                    </div>
\t\t                    </section>
\t\t                    <section id=\"contact-information\">
\t                            <div class=\"clearfix\">
\t\t\t                        <label for=\"form-telephone-number\" class=\"form-label\">Telephone Number<small>Support or Care Line</small></label>
\t\t\t                        <div class=\"form-input\"><input class=\"numbers\" type=\"text\" id=\"form-telephone-number\" name=\"telephone-number\" value=\"\" /></div>
\t\t\t                    </div>
\t                            <div class=\"clearfix\">
\t\t\t                        <label for=\"form-fax-number\" class=\"form-label\">Fax Number</label>
\t\t\t                        <div class=\"form-input\"><input class=\"numbers\" type=\"text\" id=\"form-fax-number\" name=\"fax-number\" value=\"\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-web-address\" class=\"form-label\">Web Address<small>Include the \"http://\"</small></label>
\t\t\t                        <div class=\"form-input\"><input class=\"url\" type=\"url\" id=\"form-web-address\" name=\"web-address\" value=\"\" /></div>
\t\t\t                    </div>
\t                            <div class=\"clearfix\">
\t\t\t                        <label for=\"form-address\" class=\"form-label\">Address<small>Postal address</small></label>
\t\t\t                        <div class=\"form-input no-margin-bottom\"><textarea id=\"form-address\" name=\"address\" rows=\"3\"></textarea></div>
\t\t\t                    </div>
\t                        </section>
\t                        <section id=\"pricing-discounts\">
\t                        \t<h3 class=\"ui-widget-header ui-corner-all no-margin-top\">Pricing</h3>
\t                            <div class=\"clearfix\">
\t\t\t                        <label for=\"form-hide-prices\" class=\"form-label\">Hide Prices<small>Hide any prices for this brand?</small></label>
\t\t\t                        <div class=\"form-input\"><label><input type=\"radio\" name=\"hide-prices\" id=\"form-hide-prices-1\" value=\"1\" /> Yes</label> <label><input type=\"radio\" name=\"hide-prices\" id=\"form-hide-prices-0\" value=\"0\" checked=\"checked\" /> No</label></div>
\t\t\t                    </div>
\t\t\t                    <div id=\"show-prices-out-of-hours-container\" class=\"clearfix\">
\t\t\t                        <label for=\"form-show-prices-out-of-hours\" class=\"form-label\">Show Prices Out of Hours<small>Show prices out of hours?</small></label>
\t\t\t                        <div class=\"form-input\"><label><input type=\"radio\" name=\"show-prices-out-of-hours\" id=\"form-show-prices-out-of-hours-1\" value=\"1\" /> Yes</label> <label><input type=\"radio\" name=\"show-prices-out-of-hours\" id=\"form-show-prices-out-of-hours-0\" value=\"0\" checked=\"checked\" /> No</label></div>
\t\t\t                    </div>
\t\t\t                    <h3 class=\"ui-widget-header ui-corner-all\">Discounts</h3>
\t                        </section>
\t                        <section id=\"warranty-and-guarantee\">
\t                        \t<h3 class=\"ui-widget-header ui-corner-all no-margin-top\">Warranty</h3>
\t                            <div class=\"clearfix\">
\t\t\t                        <label for=\"form-warranty\" class=\"form-label\">Warranty<small>Brief warranty description</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-warranty\" name=\"warranty\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-warranty-description\" class=\"form-label\">Warranty Description<small>A description of the warranty</small></label>
\t\t\t                        <div class=\"form-input\">
\t\t\t                        \t<div class=\"ac\">
\t\t\t                                <div class=\"buttonset no-margin-right\">
\t\t\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-warranty-description\" name=\"tinymce-warranty-description\" value=\"1\" id=\"tinymce-warranty-description-1\" checked=\"checked\" /><label for=\"tinymce-warranty-description-1\">Visual</label>
\t\t\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-warranty-description\" name=\"tinymce-warranty-description\" value=\"0\" id=\"tinymce-warranty-description-0\" /><label for=\"tinymce-warranty-description-0\">HTML</label>
\t\t\t                                    <hr class=\"inset\" />
\t\t\t                                </div>
\t\t\t                                <div class=\"leading\">
\t\t\t\t                                <textarea id=\"form-warranty-description\" name=\"warranty-description\" rows=\"3\" class=\"tinymce-basic\"></textarea>
\t\t\t\t                            </div>
\t\t\t                            </div>
\t\t\t                        </div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-warranty-image\" class=\"form-label\">Warranty Image<small>Format: jpg, png or gif</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"file\" id=\"form-warranty-image\" /></div>
\t\t\t                    </div>
\t\t\t                    <h3 class=\"ui-widget-header ui-corner-all\">Guarantee</h3>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-guarantee\" class=\"form-label\">Warranty<small>Brief guarantee description</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-guarantee\" name=\"guarantee\" /></div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"guarantee-description\" class=\"form-label\">Guarantee Description<small>A description of the guarantee</small></label>
\t\t\t                        <div class=\"form-input no-margin-bottom\">
\t\t\t                        \t<div class=\"ac\">
\t\t\t                                <div class=\"buttonset no-margin-right\">
\t\t\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-guarantee-description\" name=\"tinymce-guarantee-description\" value=\"1\" id=\"tinymce-guarantee-description-1\" checked=\"checked\" /><label for=\"tinymce-guarantee-description-1\">Visual</label>
\t\t\t                                    <input type=\"radio\" class=\"show-tinymce\" rel=\"#form-guarantee-description\" name=\"tinymce-guarantee-description\" value=\"0\" id=\"tinymce-guarantee-description-0\" /><label for=\"tinymce-guarantee-description-0\">HTML</label>
\t\t\t                                    <hr class=\"inset\" />
\t\t\t                                </div>
\t\t\t                                <div class=\"leading\">
\t\t\t\t                                <textarea  id=\"form-guarantee-description\" name=\"guarantee-description\" rows=\"3\" class=\"tinymce-basic\"></textarea>
\t\t\t\t                            </div>
\t\t\t                            </div>
\t\t\t                        </div>
\t\t\t                    </div>
\t\t\t                    <div class=\"clearfix\">
\t\t\t                        <label for=\"form-guarantee-image\" class=\"form-label\">Guarantee Image<small>Format: jpg, png or gif</small></label>
\t\t\t                        <div class=\"form-input\"><input type=\"file\" id=\"form-guarantee-image\" /></div>
\t\t\t                    </div>
\t                        </section>
\t                        <section id=\"gallery\">
\t                        \t<div id=\"gallery-image-container-0\">
\t\t                            <div class=\"clearfix\">
\t\t\t\t                        <label for=\"form-gallery-image-1\" class=\"form-label\">Gallery Image<small>Format: jpg, png or gif</small></label>
\t\t\t\t                        <div class=\"form-input\"><input type=\"file\" id=\"form-gallery-image-1\" /></div>
\t\t\t\t                    </div>
\t\t\t\t                    <div class=\"clearfix\">
\t\t\t\t                        <label for=\"logo-alt-text\" class=\"form-label\">Alt Text<small>A description of the image</small></label>
\t\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-logo-alt-text\" name=\"logo-alt-text\" /></div>
\t\t\t\t                    </div>
\t\t\t\t            \t</div>
\t                        </section>
\t                        <section id=\"attachments\">
\t                        \t<div id=\"gallery-image-container-0\">
\t\t                            <div class=\"clearfix\">
\t\t\t\t                        <label for=\"form-gallery-image-1\" class=\"form-label\">Attachment<small>Format: pdf, doc, els, ppt</small></label>
\t\t\t\t                        <div class=\"form-input\"><input type=\"file\" id=\"form-gallery-image-1\" /></div>
\t\t\t\t                    </div>
\t\t\t\t                    <div class=\"clearfix\">
\t\t\t\t                        <label for=\"logo-alt-text\" class=\"form-label\">Description<small>A description of the image</small></label>
\t\t\t\t                        <div class=\"form-input\"><input type=\"text\" id=\"form-logo-alt-text\" name=\"logo-alt-text\" /></div>
\t\t\t\t                    </div>
\t\t\t\t            \t</div>
\t                        </section>
\t                        <section id=\"statistics\">
\t                            <p>A list of statistics will go here.</p>
\t                        </section>
\t                        <section id=\"trends\">
\t                            <p>A list of trends will go here.</p>
\t                        </section>
\t                        <section id=\"competitors\">
\t                            <p>A list of competitors will go here.</p>
\t                        </section>
\t                        <section id=\"suppliers\">
\t                            <p>A list of supplier options will go here.</p>
\t                        </section>
\t                        <section id=\"history\">
\t                            <p>A list of history will go here.</p>
\t                        </section>
\t                    </div>
\t                </section>
\t            </div>
\t        </div>
\t    </form>
\t</section>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
        // line 255
        echo "\t\t\t\$(\".sidebar-tabs\").tabs(\"option\", \"disabled\", [7, 8, 9, 10]);
\t\t\t";
        // line 257
        echo "\t        \$(\"#brochure-web-address-container\").hide();
\t\t\t\$(\"input[name=request-a-brochure]\").change(function() {
\t\t        if (\$(this).val()==='1') {
\t\t            \$(\"#brochure-web-address-container\").show();
\t\t        } else {
\t\t            \$(\"#brochure-web-address-container\").hide();
\t\t        }
\t\t    });
\t\t    ";
        // line 266
        echo "\t        \$(\"#sample-web-address-container\").hide();
\t        \$(\"#form-request-a-sample-container\").addClass('no-margin-bottom');
\t\t\t\$(\"input[name=request-a-sample]\").change(function() {
\t\t        if (\$(this).val()==='1') {
\t\t            \$(\"#sample-web-address-container\").show();
\t\t            \$(\"#form-request-a-sample-container\").removeClass('no-margin-bottom');
\t\t        } else {
\t\t            \$(\"#sample-web-address-container\").hide();
\t\t            \$(\"#form-request-a-sample-container\").addClass('no-margin-bottom');
\t\t        }
\t\t    });
\t\t    ";
        // line 278
        echo "\t\t    \$(\"#show-prices-out-of-hours-container\").hide();
\t\t    \$(\"input[name=hide-prices]\").change(function() {
\t\t        if (\$(this).val()==='1') {
\t\t            \$(\"#show-prices-out-of-hours-container\").show();
\t\t        } else {
\t\t            \$(\"#show-prices-out-of-hours-container\").hide();
\t\t        }
\t\t    });
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 52,  150 => 40,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 45,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 171,  114 => 31,  208 => 58,  183 => 50,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 85,  299 => 181,  295 => 99,  283 => 77,  279 => 176,  275 => 175,  265 => 74,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 59,  172 => 56,  168 => 55,  149 => 47,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 63,  334 => 31,  294 => 25,  286 => 20,  277 => 76,  255 => 8,  244 => 3,  214 => 87,  198 => 93,  181 => 89,  167 => 50,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 68,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 164,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 14,  76 => 11,  112 => 37,  101 => 34,  98 => 29,  272 => 85,  269 => 172,  228 => 118,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 32,  105 => 84,  66 => 21,  56 => 29,  115 => 18,  83 => 11,  164 => 100,  140 => 43,  58 => 23,  21 => 4,  61 => 35,  36 => 4,  209 => 85,  205 => 69,  196 => 79,  192 => 61,  189 => 53,  178 => 36,  176 => 47,  165 => 75,  161 => 42,  152 => 90,  148 => 39,  141 => 50,  134 => 42,  132 => 53,  127 => 87,  123 => 34,  109 => 63,  90 => 17,  54 => 22,  133 => 95,  124 => 33,  111 => 29,  107 => 30,  80 => 34,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 72,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 41,  125 => 123,  119 => 114,  110 => 65,  96 => 18,  93 => 17,  91 => 40,  68 => 9,  65 => 9,  63 => 7,  43 => 19,  50 => 21,  25 => 7,  92 => 28,  86 => 29,  79 => 13,  46 => 20,  37 => 3,  33 => 16,  27 => 8,  82 => 13,  72 => 29,  64 => 8,  53 => 31,  49 => 6,  44 => 5,  42 => 21,  34 => 16,  29 => 11,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 119,  188 => 70,  185 => 76,  179 => 48,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 19,  77 => 25,  74 => 27,  57 => 33,  47 => 20,  39 => 18,  32 => 13,  24 => 7,  17 => 1,  135 => 50,  129 => 52,  122 => 40,  116 => 41,  113 => 36,  108 => 25,  104 => 30,  102 => 61,  94 => 33,  89 => 53,  87 => 38,  84 => 49,  81 => 20,  73 => 11,  70 => 37,  67 => 26,  62 => 17,  59 => 22,  55 => 18,  51 => 70,  48 => 23,  41 => 24,  38 => 3,  35 => 13,  31 => 13,  28 => 11,);
    }
}
