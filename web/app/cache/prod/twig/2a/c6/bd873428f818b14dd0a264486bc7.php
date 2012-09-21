<?php

/* WebIlluminationAdminBundle:ProductsOld:add.html.twig */
class __TwigTemplate_2ac6bd873428f818b14dd0a264486bc7 extends Twig_Template
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
        return "WebIlluminationAdminBundle:ProductsOld:add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 166,  278 => 120,  250 => 69,  163 => 77,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 171,  319 => 90,  288 => 81,  229 => 67,  206 => 112,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 83,  234 => 79,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 78,  212 => 72,  207 => 44,  143 => 73,  157 => 46,  366 => 278,  340 => 255,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 85,  233 => 132,  226 => 64,  187 => 66,  150 => 44,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 89,  239 => 70,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 42,  208 => 113,  183 => 65,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 147,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 80,  149 => 76,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 63,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 68,  181 => 37,  167 => 50,  160 => 32,  45 => 5,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 120,  231 => 131,  216 => 64,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 165,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 82,  238 => 196,  220 => 74,  201 => 58,  194 => 63,  130 => 29,  100 => 74,  85 => 14,  76 => 11,  112 => 45,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 118,  221 => 176,  197 => 51,  184 => 55,  138 => 70,  118 => 21,  105 => 56,  66 => 35,  56 => 32,  115 => 58,  83 => 49,  164 => 100,  140 => 43,  58 => 6,  21 => 4,  61 => 41,  36 => 3,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 97,  178 => 59,  176 => 86,  165 => 121,  161 => 49,  152 => 90,  148 => 30,  141 => 33,  134 => 68,  132 => 33,  127 => 47,  123 => 46,  109 => 58,  90 => 52,  54 => 13,  133 => 104,  124 => 24,  111 => 57,  107 => 35,  80 => 28,  69 => 33,  60 => 37,  52 => 20,  97 => 38,  95 => 33,  88 => 13,  78 => 19,  75 => 44,  71 => 10,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 257,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 137,  236 => 106,  222 => 62,  218 => 65,  159 => 130,  154 => 111,  151 => 109,  145 => 105,  136 => 103,  128 => 41,  125 => 63,  119 => 32,  110 => 86,  96 => 18,  93 => 17,  91 => 48,  68 => 9,  65 => 8,  63 => 7,  43 => 8,  50 => 7,  25 => 50,  92 => 17,  86 => 46,  79 => 36,  46 => 68,  37 => 3,  33 => 12,  27 => 9,  82 => 13,  72 => 18,  64 => 12,  53 => 14,  49 => 6,  44 => 5,  42 => 18,  34 => 16,  29 => 2,  23 => 3,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 127,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 73,  193 => 104,  190 => 62,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 42,  142 => 56,  137 => 55,  131 => 49,  126 => 91,  120 => 83,  117 => 59,  103 => 69,  99 => 19,  77 => 18,  74 => 27,  57 => 14,  47 => 20,  39 => 4,  32 => 13,  24 => 6,  17 => 1,  135 => 96,  129 => 65,  122 => 40,  116 => 70,  113 => 36,  108 => 25,  104 => 55,  102 => 40,  94 => 25,  89 => 57,  87 => 64,  84 => 22,  81 => 24,  73 => 51,  70 => 9,  67 => 40,  62 => 29,  59 => 40,  55 => 31,  51 => 34,  48 => 13,  41 => 17,  38 => 3,  35 => 17,  31 => 2,  28 => 11,);
    }
}
