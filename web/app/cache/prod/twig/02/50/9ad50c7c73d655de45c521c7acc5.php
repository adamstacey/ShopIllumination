<?php

/* WebIlluminationAdminBundle:VoucherCodes:indexScript.js.twig */
class __TwigTemplate_02509ad50c7c73d655de45c521c7acc5 extends Twig_Template
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
        echo "<script type=\"text/javascript\" defer=\"defer\">
\t";
        // line 3
        echo "\tvar \$listingCountLoaded = false;
\tvar \$listingLoaded = false;
\tvar \$listingPaginationLoaded = false;
\t
\t";
        // line 8
        echo "\tvar brands = [
\t\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 10
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo "\"
\t\t\t}";
            // line 13
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 14
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "\t];
\t
\t";
        // line 18
        echo "\tvar departments = [
\t\t";
        // line 19
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 20
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo "\"
\t\t\t}";
            // line 23
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 24
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 25
        echo "\t];
\t
\t";
        // line 28
        echo "\tvar products = [
\t\t";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 30
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "\"
\t\t\t}";
            // line 33
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 34
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 35
        echo "\t];
\t
\t\$(document).ready(function() {
\t\t
\t\t";
        // line 40
        echo "\t\t\$(\".action-view-add-voucher-code\").live('click', function() {
\t\t\t\$(\"#voucher-code-add\").slideDown(function() {
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#voucher-code-add\").offset().top - 50},'slow');
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 47
        echo "\t\t\$(\".action-cancel-add-voucher-code\").live('click', function() {
\t\t\t\$(\".form-error\").hide();
\t\t\t\$(\"input, textarea, select\").removeClass(\"invalid\");
\t\t\t\$(\"#voucher-code-add\").slideUp(function() {
\t\t\t\t\$(\"#voucher-code-code\").val(\"\");
\t\t\t\t\$(\"#voucher-code-description\").val(\"\");
\t\t\t\t\$(\"#voucher-code-minimum-order-value\").val(\"0.00\");
\t\t\t\t\$(\"#voucher-code-discount-type option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#voucher-code-discount-type option:first\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#uniform-voucher-code-discount-type span\").html(\$(\"#voucher-code-discount-type option:first\").text());
\t\t\t\t\$(\"#voucher-code-discount-use option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#voucher-code-discount-use option:first\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#uniform-voucher-code-discount-use span\").html(\$(\"#voucher-code-discount-use option:first\").text());
\t\t\t\t\$(\"#voucher-code-discount-use\").val(\"0\");
\t\t\t\t\$(\"#voucher-code-number-of-uses\").val(\"0\");
\t\t\t\t\$(\"#voucher-code-valid-from-date\").val(\"";
        // line 62
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#voucher-code-expiry-date\").val(\"";
        // line 63
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#voucher-code-valid-from-date-formatted\").val(\"";
        // line 64
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#voucher-code-expiry-date-formatted\").val(\"";
        // line 65
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#voucher-code-discount-use-container\").hide();
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 71
        echo "        \$(\".action-add-voucher-code\").live('click', function() {
        \tvar addVoucherCodeValidator = \$(\"#voucher-code-add :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (addVoucherCodeValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"POST\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_add_voucher_code"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tcode: \$(\"#voucher-code-code\").val(),
\t\t\t\t\t\tdescription: \$(\"#voucher-code-description\").val(),
\t\t\t\t\t\tminimumOrderValue: \$(\"#voucher-code-minimum-order-value\").val(),
\t\t\t\t\t\tdiscountType: \$(\"#voucher-code-discount-type\").val(),
\t\t\t\t\t\tdiscountUse: \$(\"#voucher-code-discount-use\").val(),
\t\t\t\t\t\tnumberOfUses: \$(\"#voucher-code-number-of-uses\").val(),
\t\t\t\t\t\tvalidFromDate: \$(\"#voucher-code-valid-from-date-formatted\").val(),
\t\t\t\t\t\texpiryDate: \$(\"#voucher-code-expiry-date-formatted\").val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the voucher code. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the voucher code. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#voucher-code-add\").slideUp(function() {
\t\t\t\t\t\t\t\t\$(\"#voucher-code-code\").val(\"\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-description\").val(\"\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-minimum-order-value\").val(\"0.00\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-type option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-type option:first\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\t\t\$(\"#uniform-voucher-code-discount-type span\").html(\$(\"#voucher-code-discount-type option:first\").text());
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-use option\").removeAttr(\"selected\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-use option:first\").attr(\"selected\", \"selected\");
\t\t\t\t\t\t\t\t\$(\"#uniform-voucher-code-discount-use span\").html(\$(\"#voucher-code-discount-use option:first\").text());
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-use\").val(\"0\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-number-of-uses\").val(\"0\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-valid-from-date\").val(\"";
        // line 122
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-expiry-date\").val(\"";
        // line 123
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-valid-from-date-formatted\").val(\"";
        // line 124
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-expiry-date-formatted\").val(\"";
        // line 125
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#voucher-code-discount-use-container\").hide();
\t\t\t\t\t\t\t});
\t\t\t\t      \t\tloadResults();
    \t\t\t\t\t\t\$(\"#message-success-text\").html('The voucher code was successfully added.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
\t\t
        ";
        // line 140
        echo "        \$(\".action-view-voucher-code\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'voucher-code', \$(\"tr#voucher-code-\"+\$(this).attr(\"data-id\")+\" button.action-view-voucher-code\"));
        });
        
        ";
        // line 145
        echo "        \$(\".action-save-voucher-code\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar saveVoucherCodeValidator = \$(\"#voucher-code-voucher-code-\"+\$id+\" :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (saveVoucherCodeValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"POST\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_save_voucher_code"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tid: \$id,
\t\t\t\t\t\tcode: \$(\"#voucher-code-code-\"+\$id).val(),
\t\t\t\t\t\tdescription: \$(\"#voucher-code-description-\"+\$id).val(),
\t\t\t\t\t\tminimumOrderValue: \$(\"#voucher-code-minimum-order-value-\"+\$id).val(),
\t\t\t\t\t\tdiscountType: \$(\"#voucher-code-discount-type-\"+\$id).val(),
\t\t\t\t\t\tdiscountUse: \$(\"#voucher-code-discount-use-\"+\$id).val(),
\t\t\t\t\t\tnumberOfUses: \$(\"#voucher-code-number-of-uses-\"+\$id).val(),
\t\t\t\t\t\tvalidFromDate: \$(\"#voucher-code-valid-from-date-formatted-\"+\$id).val(),
\t\t\t\t\t\texpiryDate: \$(\"#voucher-code-expiry-date-formatted-\"+\$id).val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#voucher-code-error-message-text-\"+\$id).html('Sorry, there was a problem saving the voucher code. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#voucher-code-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#voucher-code-error-message-text-\"+\$id).html('Sorry, there was a problem saving the voucher code. Make sure you have filled in all fields and try again.');
\t\t\t\t      \t\t\$(\"#voucher-code-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t      \t\tloadResults();
\t\t\t\t      \t\t\$.mask.close();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id).hide();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\t\t\t\t\$(\"#message-success-text\").html('The voucher code was successfully saved.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
        
        ";
        // line 199
        echo "        \$(\".action-view-discounts\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tloadBrandDiscounts(\$id);
        \tloadDepartmentDiscounts(\$id);
        \tloadProductDiscounts(\$id);
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'discounts', \$(\"tr#voucher-code-\"+\$id+\" button.action-view-discounts\"));
        });
        
        ";
        // line 208
        echo "        \$(\".action-save-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 214
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_save_discount"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$id,
\t\t    \t\tdiscount: \$(\"#discounts-discount-\"+\$id).val()
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$id).html('Sorry, there was a problem saving the discount. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#discounts-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$id).html('Sorry, there was a problem saving the discount. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#discounts-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$id).html('The discount was successfully saved.');
\t\t\t      \t\t\$(\"#discounts-success-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        
        ";
        // line 240
        echo "        \$(\".action-view-add-brand-discount\").live('click', function() {
        \t\$addBrandDiscountObject = \$(\"#add-brand-discount-\"+\$(this).attr(\"data-id\"));
        \tif (\$addBrandDiscountObject.is(\":hidden\"))
        \t{
        \t\t\$addBrandDiscountObject.slideDown();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
        \t} else {
        \t\t\$addBrandDiscountObject.slideUp();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
        \t}
        });
        \$(\".action-add-brand-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-id\");
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 257
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_add_brand_discount"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$voucherCodeId,
\t    \t\t\tbrandId: \$(\"#discounts-brand-id-\"+\$voucherCodeId).val(),
\t\t    \t\tdiscount: \$(\"#discounts-brand-discount-\"+\$voucherCodeId).val()
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the brand discount. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the brand discount. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\tloadBrandDiscounts(\$voucherCodeId);
\t\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The brand discount was successfully added.');
\t\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#discounts-brand-id-\"+\$voucherCodeId).val(\$(\"options:first\", \$(\"#discounts-brand-id-\"+\$voucherCodeId)).val());
\t\t\t      \t\t\$(\"#discounts-brand-discount-\"+\$voucherCodeId).val(\"0.00\");
\t\t\t      \t\t\$(\"#add-brand-discount-\"+\$voucherCodeId).slideUp();
\t        \t\t\t\$(\"#voucher-code-discounts-\"+\$voucherCodeId+\" button.action-view-add-brand-discount span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        
        ";
        // line 289
        echo "        \$(\".action-confirm-delete-brand-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$brandId = \$(this).attr(\"data-brand-id\");
        \t\$(\"#brand-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-brand-id\", \$brandId);
        \t\$(\"#brand-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-brand-id\", \$brandId);
        \t\$(\"tr#more-information-\"+\$voucherCodeId+\" .selected\").removeClass(\"selected\");
        \t\$(\"#brand-discount-\"+\$brandId).addClass(\"selected\");
        \t\$(\"#brand-discount-confirm-delete-\"+\$voucherCodeId).fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#brand-discount-confirm-delete-\"+\$voucherCodeId).offset().top - 50},'slow');
        });
        \$(\".action-cancel-delete-brand-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$brandId = \$(this).attr(\"data-brand-id\");
        \t\$(\"#brand-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-brand-id\", \"\");
        \t\$(\"#brand-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-brand-id\", \"\");
        \t\$(\"#brand-discount-\"+\$brandId).removeClass(\"selected\");
        \t\$(\"#brand-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
        });
        \$(\".action-delete-brand-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$brandId = \$(this).attr(\"data-brand-id\");
        \t\$(\"#brand-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"#brand-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-brand-id\", \"\");
        \t\$(\"#brand-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-brand-id\", \"\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 316
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_delete_brand_discount"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$voucherCodeId,
\t\t      \t\tbrandId: \$brandId
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem deleting the brand discount. Please try again.');
\t\t\t      \t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t      \t\$(\"#brand-discount-confirm-delete-\"+\$voucherCodeId).hide();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tloadBrandDiscounts(\$voucherCodeId);
\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The brand discount was successfully deleted.');
\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
        ";
        // line 341
        echo "        \$(\".action-view-add-department-discount\").live('click', function() {
        \t\$addDepartmentDiscountObject = \$(\"#add-department-discount-\"+\$(this).attr(\"data-id\"));
        \tif (\$addDepartmentDiscountObject.is(\":hidden\"))
        \t{
        \t\t\$addDepartmentDiscountObject.slideDown();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
        \t} else {
        \t\t\$addDepartmentDiscountObject.slideUp();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
        \t}
        });
        \$(\".action-add-department-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-id\");
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_add_department_discount"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$voucherCodeId,
\t    \t\t\tdepartmentId: \$(\"#discounts-department-id-\"+\$voucherCodeId).val(),
\t\t    \t\tdiscount: \$(\"#discounts-department-discount-\"+\$voucherCodeId).val()
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the department discount. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the department discount. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\tloadDepartmentDiscounts(\$voucherCodeId);
\t\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The department discount was successfully added.');
\t\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#discounts-department-id-\"+\$voucherCodeId).val(\$(\"options:first\", \$(\"#discounts-department-id-\"+\$voucherCodeId)).val());
\t\t\t      \t\t\$(\"#discounts-department-discount-\"+\$voucherCodeId).val(\"0.00\");
\t\t\t      \t\t\$(\"#add-department-discount-\"+\$voucherCodeId).slideUp();
\t        \t\t\t\$(\"#voucher-code-discounts-\"+\$voucherCodeId+\" button.action-view-add-department-discount span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        
        ";
        // line 390
        echo "        \$(\".action-confirm-delete-department-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$departmentId = \$(this).attr(\"data-department-id\");
        \t\$(\"#department-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-department-id\", \$departmentId);
        \t\$(\"#department-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-department-id\", \$departmentId);
        \t\$(\"tr#more-information-\"+\$voucherCodeId+\" .selected\").removeClass(\"selected\");
        \t\$(\"#department-discount-\"+\$departmentId).addClass(\"selected\");
        \t\$(\"#department-discount-confirm-delete-\"+\$voucherCodeId).fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#department-discount-confirm-delete-\"+\$voucherCodeId).offset().top - 50},'slow');
        });
        \$(\".action-cancel-delete-department-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$departmentId = \$(this).attr(\"data-department-id\");
        \t\$(\"#department-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-department-id\", \"\");
        \t\$(\"#department-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-department-id\", \"\");
        \t\$(\"#department-discount-\"+\$departmentId).removeClass(\"selected\");
        \t\$(\"#department-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
        });
        \$(\".action-delete-department-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$departmentId = \$(this).attr(\"data-department-id\");
        \t\$(\"#department-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"#department-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-department-id\", \"\");
        \t\$(\"#department-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-department-id\", \"\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 417
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_delete_department_discount"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$voucherCodeId,
\t\t      \t\tdepartmentId: \$departmentId
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem deleting the department discount. Please try again.');
\t\t\t      \t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t      \t\$(\"#department-discount-confirm-delete-\"+\$voucherCodeId).hide();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tloadDepartmentDiscounts(\$voucherCodeId);
\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The department discount was successfully deleted.');
\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
        ";
        // line 442
        echo "        \$(\".action-view-add-product-discount\").live('click', function() {
        \t\$addProductDiscountObject = \$(\"#add-product-discount-\"+\$(this).attr(\"data-id\"));
        \tif (\$addProductDiscountObject.is(\":hidden\"))
        \t{
        \t\t\$addProductDiscountObject.slideDown();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
        \t} else {
        \t\t\$addProductDiscountObject.slideUp();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
        \t}
        });
        \$(\".action-add-product-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-id\");
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 459
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_add_product_discount"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$voucherCodeId,
\t    \t\t\tproductId: \$(\"#discounts-product-id-\"+\$voucherCodeId).val(),
\t\t    \t\tdiscount: \$(\"#discounts-product-discount-\"+\$voucherCodeId).val()
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the product discount. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem adding the product discount. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\tloadProductDiscounts(\$voucherCodeId);
\t\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The product discount was successfully added.');
\t\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
\t\t\t\t\t\t\$(\"#discounts-product-id-\"+\$voucherCodeId).val(\$(\"options:first\", \$(\"#discounts-product-id-\"+\$voucherCodeId)).val());
\t\t\t      \t\t\$(\"#discounts-product-discount-\"+\$voucherCodeId).val(\"0.00\");
\t\t\t      \t\t\$(\"#add-product-discount-\"+\$voucherCodeId).slideUp();
\t        \t\t\t\$(\"#voucher-code-discounts-\"+\$voucherCodeId+\" button.action-view-add-product-discount span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        
        ";
        // line 491
        echo "        \$(\".action-confirm-delete-product-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$productId = \$(this).attr(\"data-product-id\");
        \t\$(\"#product-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-product-id\", \$productId);
        \t\$(\"#product-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \$voucherCodeId).attr(\"data-product-id\", \$productId);
        \t\$(\"tr#more-information-\"+\$voucherCodeId+\" .selected\").removeClass(\"selected\");
        \t\$(\"#product-discount-\"+\$productId).addClass(\"selected\");
        \t\$(\"#product-discount-confirm-delete-\"+\$voucherCodeId).fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#product-discount-confirm-delete-\"+\$voucherCodeId).offset().top - 50},'slow');
        });
        \$(\".action-cancel-delete-product-discount\").live('click', function() {
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$productId = \$(this).attr(\"data-product-id\");
        \t\$(\"#product-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-product-id\", \"\");
        \t\$(\"#product-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-product-id\", \"\");
        \t\$(\"#product-discount-\"+\$productId).removeClass(\"selected\");
        \t\$(\"#product-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
        });
        \$(\".action-delete-product-discount\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$voucherCodeId = \$(this).attr(\"data-voucher-code-id\");
        \tvar \$productId = \$(this).attr(\"data-product-id\");
        \t\$(\"#product-discount-confirm-delete-\"+\$voucherCodeId).hide();
        \t\$(\"#product-discount-confirm-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-product-id\", \"\");
        \t\$(\"#product-discount-cancel-delete-button-\"+\$voucherCodeId).attr(\"data-voucher-code-id\", \"\").attr(\"data-product-id\", \"\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 518
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_delete_product_discount"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$voucherCodeId,
\t\t      \t\tproductId: \$productId
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#discounts-error-message-text-\"+\$voucherCodeId).html('Sorry, there was a problem deleting the product discount. Please try again.');
\t\t\t      \t\$(\"#discounts-error-message-\"+\$voucherCodeId).fadeIn();
\t\t\t      \t\$(\"#product-discount-confirm-delete-\"+\$voucherCodeId).hide();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tloadProductDiscounts(\$voucherCodeId);
\t\t\t\t\t\$(\"#discounts-success-message-text-\"+\$voucherCodeId).html('The product discount was successfully deleted.');
\t\t      \t\t\$(\"#discounts-success-message-\"+\$voucherCodeId).fadeIn();
        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"tr#voucher-code-\"+\$voucherCodeId+\" button.action-view-discounts\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
        ";
        // line 543
        echo "        \$(\".action-view-report\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'customer', \$(\"tr#voucher-code-\"+\$(this).attr(\"data-id\")+\" button.action-view-report\"));
        });
                
        ";
        // line 548
        echo "        \$(\".action-confirm-delete-voucher-code\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#voucher-code-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete-voucher-code\"));
        });
        \$(\".action-confirm-delete-voucher-codes\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#voucher-code-confirm-delete-voucher-codes\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#voucher-code-confirm-delete-voucher-codes\").offset().top - 50},'slow');
\t    \t}
        });
        \$(\".action-cancel-delete-voucher-codes\").live('click', function() {
        \t\$(\"#voucher-code-confirm-delete-voucher-codes\").fadeOut();
        });
        \$(\".action-delete-voucher-codes\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#order-confirm-delete-orders\").hide();
\t\t\t\tvar \$numberOfOrdersToDelete = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfOrdersDeleted = 0;
\t\t\t\tif (\$numberOfOrdersToDelete > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 575
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_delete_order"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfOrdersDeleted = \$numberOfOrdersDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the selected orders. Please try again.');
\t\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t\t      \tif (\$numberOfOrdersDeleted >= \$numberOfOrdersToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfOrdersDeleted = \$numberOfOrdersDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-success-text\").html('The orders were successfully deleted.');
\t\t\t\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t\t\t\t\t\tif (\$numberOfOrdersDeleted >= \$numberOfOrdersToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t} else {
\t\t\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any orders to delete.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, bo dy\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        \$(\".action-delete-voucher-code\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 619
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_delete_order"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the order. Please try again.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\t\$(\"#form-current-page\").val('1');
\t\t      \t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\t\t\$(\"tr.order td\").removeAttr(\"style\");
\t\t\t\t\t\$(\"tr.order button\").removeClass(\"ui-button-blue\");
\t\t\t\t\t\$.mask.close();
\t\t\t\t\tloadResults();
\t\t\t\t\t\$(\"#message-success-text\").html('The order has been successfully deleted.');
\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
    
\t\t";
        // line 648
        echo "\t\t\$(\".voucher-code-active\").live('click', function() {
\t\t\tvar \$actives = new Array();
\t\t\t\$(\".voucher-code-active:checked\").each(function(index) {
\t\t\t\t\$actives[\$actives.length] = \$(this).attr(\"data-active\");
\t\t\t});
\t\t\t\$(\"#form-actives\").val(\$actives.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t\$(\".voucher-code-discount-type\").live('click', function() {
\t\t\tvar \$discountTypes = new Array();
\t\t\t\$(\".voucher-code-discount-type:checked\").each(function(index) {
\t\t\t\t\$discountTypes[\$discountTypes.length] = \$(this).attr(\"data-discount-type\");
\t\t\t});
\t\t\t\$(\"#form-discount-types\").val(\$discountTypes.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t\$(\".voucher-code-discount-use\").live('click', function() {
\t\t\tvar \$discountUses = new Array();
\t\t\t\$(\".voucher-code-discount-use:checked\").each(function(index) {
\t\t\t\t\$discountUses[\$discountUses.length] = \$(this).attr(\"data-discount-use\");
\t\t\t});
\t\t\t\$(\"#form-discount-uses\").val(\$discountUses.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 674
        echo "\t\t\$(\".action-select-all\").live('click', function() {
\t\t\tif (\$(\".action-select-all\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\".action-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\".action-select\").parent().addClass(\"checked\");
\t\t\t\t\$(\"tr.voucher-code\").addClass(\"selected\");
\t\t\t} else {
\t\t\t\t\$(\".action-select\").attr(\"checked\", false);
\t\t\t\t\$(\".action-select\").parent().removeClass(\"checked\");
\t\t\t\t\$(\"tr.voucher-code\").removeClass(\"selected\");
\t\t\t}
\t\t});
        \$(\".action-select\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tif (\$(this).is(\":checked\"))
        \t{
        \t\t\$(\"#voucher-code-\"+\$id).addClass(\"selected\");
        \t} else {
        \t\t\$(\"#voucher-code-\"+\$id).removeClass(\"selected\");
        \t}
        });
\t\t\$(\".action-order-status\").live('change', function() {
\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$(\"#voucher-code-id-\"+\$id).attr(\"checked\", \"checked\");
\t\t\t\$(\"#voucher-code-id-\"+\$id).parent().addClass(\"checked\");
\t\t\t\$(\"tr#voucher-code-\"+\$id).addClass(\"selected\");
\t\t});
\t\t\t\t
\t\t";
        // line 703
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.voucher-code td\").removeAttr(\"style\");
\t\t\t\$(\"tr.voucher-code button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 711
        echo "\t\t\$(\"#form-valid-from-date-from\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-valid-from-date-from-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-valid-from-date-to\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-valid-from-date-to-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-expiry-date-from\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-expiry-date-from-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-expiry-date-to\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-expiry-date-to-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#voucher-code-valid-from-date\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#voucher-code-valid-from-date-formatted\",
\t\t\taltFormat: \"yy-mm-dd\"
\t\t});
\t\t\$(\"#voucher-code-expiry-date\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#voucher-code-expiry-date-formatted\",
\t\t\taltFormat: \"yy-mm-dd\"
\t\t});
\t\t
\t\t";
        // line 771
        echo "\t\t\$(\"#voucher-code-discount-use\").live('change', function() {
\t\t\tif (\$(this).val() == 'f')
\t\t\t{
\t\t\t\t\$(\"#voucher-code-discount-use-container\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\"#voucher-code-discount-use-container\").fadeOut();
\t\t\t}
\t\t});
\t
\t\t";
        // line 781
        echo "\t\t\$(\"#minimum-order-value-range\").slider({
\t\t\trange: true,
\t\t\tmin: 0,
\t\t\tmax: 5000,
\t\t\tvalues: [0, 5000],
\t\t\tslide: function(event, ui) {
\t\t\t\t\$(\"#minimum-order-value-range-amount\").html(\"&pound;\"+ui.values[0]+\" - &pound;\"+ui.values[1]);
\t\t\t},
\t\t\tchange: function(event, ui) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#minimum-order-value-range-amount\").html(\"&pound;\"+\$(\"#minimum-order-value-range\").slider(\"values\", 0)+\" - &pound;\"+\$(\"#minimum-order-value-range\").slider(\"values\", 1));
\t\t
\t\t";
        // line 797
        echo "\t\t\$(\".action-filter-results\").live('click', function() {
\t\t\tif (\$(\"#listing-filter\").is(\":hidden\"))
\t\t\t{
\t\t\t\t\$(\"#listing-filter\").slideDown();
\t\t\t\t\$(\"#filter-results-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-s\").addClass(\"ui-icon-triangle-1-n\");
\t\t\t} else {
\t\t\t\t\$(\"#listing-filter\").slideUp();
\t\t\t\t\$(\"#filter-results-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t}
\t\t});
\t\t\t\t\t
\t\t";
        // line 809
        echo "\t\t\$(\".action-update-your-results\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t\$(\"#form-voucher-code, #form-actives, #form-discount-types, #form-discount-uses, #form-valid-from-date-from-formatted, #form-valid-from-date-to-formatted, #form-expiry-date-from-formatted, #form-expiry-date-to-formatted\").live('change', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t\$(\"#form-current-page\").val('1');
\t\tloadResults();
\t\t
\t\t\$(\"#form-sort-order, #form-max-results\").live('change', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 827
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t});
\t
\t";
        // line 834
        echo "\tfunction loadBrandDiscounts(\$id)
\t{
\t\t\$(\"#brand-discounts-\"+\$id).hide().html(\"\");
    \t\$(\"#brand-discounts-loading-\"+\$id).show();
    \t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 840
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_brand_discounts"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tid: \$id
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#brand-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#brand-discounts-\"+\$id).html('<p class=\"ac\">There are no brand discounts setup.</p>').fadeIn();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#brand-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#brand-discounts-\"+\$id).html(data).fadeIn();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 856
        echo "\tfunction loadDepartmentDiscounts(\$id)
\t{
\t\t\$(\"#department-discounts-\"+\$id).hide().html(\"\");
    \t\$(\"#department-discounts-loading-\"+\$id).show();
    \t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 862
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_department_discounts"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tid: \$id
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#department-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#department-discounts-\"+\$id).html('<p class=\"ac\">There are no department discounts setup.</p>').fadeIn();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#department-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#department-discounts-\"+\$id).html(data).fadeIn();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 878
        echo "\tfunction loadProductDiscounts(\$id)
\t{
\t\t\$(\"#product-discounts-\"+\$id).hide().html(\"\");
    \t\$(\"#product-discounts-loading-\"+\$id).show();
    \t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 884
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_product_discounts"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tid: \$id
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#product-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#product-discounts-\"+\$id).html('<p class=\"ac\">There are no product discounts setup.</p>').fadeIn();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#product-discounts-loading-\"+\$id).hide();
\t\t\t\t\$(\"#product-discounts-\"+\$id).html(data).fadeIn();
\t\t\t}
\t\t});
\t}
\t\t
\t";
        // line 900
        echo "\tfunction showMoreInformation(\$id, \$moreInformation, \$button)
\t{
\t\t\$(\".form-error\").hide();
    \t\$(\"tr#voucher-code-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
    \tif (\$(\"#voucher-code-\"+\$moreInformation+\"-\"+\$id).is(\":hidden\"))
    \t{
    \t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\$(\"#more-information-\"+\$id).show();
    \t\t\$(\"#voucher-code-\"+\$moreInformation+\"-\"+\$id).fadeIn();
    \t\t\$(\"#more-information-\"+\$id+\" td, #voucher-code-\"+\$id+\" td\").expose({
    \t\t\tcolor: \"#042F4F\",
    \t\t\tloadSpeed: 2000,
    \t\t\topacity: \"0.6\",
    \t\t\tonClose: function() {
    \t\t\t\t\$(\".form-error\").hide();
    \t\t\t\t\$(\".more-information, .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"#more-information-\"+\$id).fadeOut();
    \t\t\t\t\$(\"#voucher-code-\"+\$id+\" td\").removeAttr(\"style\");
    \t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"tr#voucher-code-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
    \t\t\t}
    \t\t});
    \t\tif (!\$button.hasClass(\"ui-button-red\"))
    \t\t{
    \t\t\t\$button.addClass(\"ui-button-blue\");
    \t\t}
    \t} else {
    \t\t\$.mask.close();
    \t\t\$(\"#more-information-\"+\$id).fadeOut();
    \t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
    \t}
    \t\$(\"html, body\").animate({scrollTop: \$button.offset().top - 50},'slow');
\t}
\t
\t";
        // line 935
        echo "\tfunction loadResults()
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$listingCountLoaded = false;
\t\t\$listingLoaded = false;
\t\t\$listingPaginationLoaded = false;
\t\tloadListingCount();
\t\tloadListing();
\t\tloadListingPagination();
\t}
\t
\t";
        // line 947
        echo "\tfunction checkResultsLoaded()
\t{
\t\tif (\$listingCountLoaded && \$listingLoaded && \$listingPaginationLoaded)
\t\t{
\t\t\t\$(\"#ajax_loading\").hide();
\t\t}
\t}
\t
\t";
        // line 956
        echo "\tfunction loadListingCount()
\t{
\t\t\$(\"#listing-count\").html('<img src=\"";
        // line 958
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\tdataType: \"json\",
\t\t\turl: \"";
        // line 962
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_listing_count"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tvoucherCode: \$(\"#form-voucher-code\").val(),
\t    \t\tactive: \$(\"#form-actives\").val(),
\t    \t\tdiscountType: \$(\"#form-form-discount-types\").val(),
\t    \t\tdiscountUse: \$(\"#form-discount-uses\").val(),
\t    \t\tminimumOrderValueFrom: \$(\"#minimum-order-value-range\").slider(\"values\", 0),
    \t\t\tminimumOrderValueTo: \$(\"#minimum-order-value-range\").slider(\"values\", 1),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-count\").html('No Voucher Codes Found');
\t\t\t\t\$listingCountLoaded = true;
\t\t\t\tcheckResultsLoaded();
\t      \t},
\t\t\tsuccess: function(data) {
\t\t\t\tif (data.response == 'success')
    \t    \t{
        \t\t\tvar \$listingCount = parseInt(data.listingCount);
        \t\t\tif ((\$listingCount > 1) || (\$listingCount < 1))
        \t\t\t{
        \t\t\t\tif (\$listingCount < 1)
\t        \t\t\t{
    \t    \t\t\t\t\$(\"#listing-count\").html('No Voucher Codes Found');
        \t\t\t\t} else {
\t        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' Voucher Codes');
\t        \t\t\t}
\t        \t\t} else {
    \t    \t\t\t\$(\"#listing-count\").html('Found 1 Voucher Code');
        \t\t\t}\t
\t        \t} else {
    \t    \t\t\$(\"#listing-count\").html('No Voucher Codes Found');
        \t\t}
        \t\t\$listingCountLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 1005
        echo "\tfunction loadListing()
\t{
\t\tif (\$(\"#listing\").height() > 0)
\t\t{
\t\t\t\$(\"#listing-loading\").height(\$(\"#listing\").height() - 12);
\t\t}
\t\t\$(\"#listing-loading\").show();
\t\t\$(\"#listing\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 1015
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_listing"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tvoucherCode: \$(\"#form-voucher-code\").val(),
\t    \t\tactive: \$(\"#form-actives\").val(),
\t    \t\tdiscountType: \$(\"#form-form-discount-types\").val(),
\t    \t\tdiscountUse: \$(\"#form-discount-uses\").val(),
\t    \t\tminimumOrderValueFrom: \$(\"#minimum-order-value-range\").slider(\"values\", 0),
    \t\t\tminimumOrderValueTo: \$(\"#minimum-order-value-range\").slider(\"values\", 1),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val(),
\t    \t\tsortOrder: \$(\"#form-sort-order\").val(),
\t    \t\tpage: \$(\"#form-current-page\").val(),
   \t\t\t\tmaxResults: \$(\"#form-max-results\").val()
   \t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-loading\").hide();
\t\t\t\t\$(\"#listing\").html('<p class=\"ac\">Sorry, no results were found.</p>').fadeIn();
\t\t\t\t\$listingLoaded = true;
\t\t\t\tcheckResultsLoaded();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#listing-loading\").hide();
\t\t\t\t\$(\"#listing\").html(data).fadeIn();
        \t\t\$listingLoaded = true;
        \t\tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 1047
        echo "\tfunction loadListingPagination()
\t{
\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 1052
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_voucher_codes_ajax_get_listing_pagination"), "html", null, true);
        echo "\",
\t\t\tdata: {
   \t\t\t\tvoucherCode: \$(\"#form-voucher-code\").val(),
\t    \t\tactive: \$(\"#form-actives\").val(),
\t    \t\tdiscountType: \$(\"#form-form-discount-types\").val(),
\t    \t\tdiscountUse: \$(\"#form-discount-uses\").val(),
\t    \t\tminimumOrderValueFrom: \$(\"#minimum-order-value-range\").slider(\"values\", 0),
    \t\t\tminimumOrderValueTo: \$(\"#minimum-order-value-range\").slider(\"values\", 1),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val(),
\t    \t\tpage: \$(\"#form-current-page\").val(),
   \t\t\t\tmaxResults: \$(\"#form-max-results\").val()
   \t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\t\t\$listingPaginationLoaded = true;
\t\t\t\tcheckResultsLoaded();
\t      \t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").html(data).fadeIn();
\t        \t\$listingPaginationLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:VoucherCodes:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 141,  316 => 166,  278 => 120,  250 => 113,  163 => 33,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 175,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 120,  246 => 83,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 71,  212 => 62,  207 => 44,  143 => 73,  157 => 46,  366 => 159,  340 => 160,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 85,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 85,  242 => 108,  239 => 87,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 390,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 24,  208 => 92,  183 => 63,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 81,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 80,  149 => 76,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 85,  181 => 35,  167 => 34,  160 => 32,  45 => 5,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 94,  231 => 83,  216 => 63,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 125,  296 => 124,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 66,  130 => 29,  100 => 74,  85 => 30,  76 => 18,  112 => 45,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 100,  221 => 176,  197 => 51,  184 => 55,  138 => 70,  118 => 21,  105 => 34,  66 => 24,  56 => 32,  115 => 58,  83 => 30,  164 => 52,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 97,  178 => 59,  176 => 86,  165 => 121,  161 => 49,  152 => 30,  148 => 64,  141 => 33,  134 => 42,  132 => 28,  127 => 53,  123 => 46,  109 => 58,  90 => 52,  54 => 8,  133 => 104,  124 => 52,  111 => 35,  107 => 35,  80 => 28,  69 => 33,  60 => 37,  52 => 20,  97 => 38,  95 => 33,  88 => 20,  78 => 57,  75 => 15,  71 => 26,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 214,  343 => 257,  339 => 144,  335 => 143,  321 => 112,  317 => 140,  314 => 87,  311 => 133,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 99,  245 => 90,  241 => 137,  236 => 106,  222 => 76,  218 => 96,  159 => 32,  154 => 111,  151 => 109,  145 => 105,  136 => 103,  128 => 25,  125 => 63,  119 => 38,  110 => 23,  96 => 35,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 7,  43 => 8,  50 => 5,  25 => 50,  92 => 37,  86 => 46,  79 => 18,  46 => 10,  37 => 3,  33 => 3,  27 => 2,  82 => 19,  72 => 31,  64 => 16,  53 => 12,  49 => 11,  44 => 5,  42 => 13,  34 => 3,  29 => 9,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 65,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 47,  193 => 104,  190 => 62,  188 => 65,  185 => 47,  179 => 45,  177 => 78,  171 => 75,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 42,  142 => 60,  137 => 55,  131 => 58,  126 => 91,  120 => 83,  117 => 59,  103 => 69,  99 => 20,  77 => 18,  74 => 56,  57 => 13,  47 => 9,  39 => 10,  32 => 9,  24 => 3,  17 => 1,  135 => 29,  129 => 65,  122 => 55,  116 => 47,  113 => 36,  108 => 25,  104 => 39,  102 => 21,  94 => 25,  89 => 62,  87 => 31,  84 => 22,  81 => 24,  73 => 51,  70 => 17,  67 => 40,  62 => 11,  59 => 40,  55 => 31,  51 => 7,  48 => 13,  41 => 8,  38 => 3,  35 => 7,  31 => 2,  28 => 5,);
    }
}
