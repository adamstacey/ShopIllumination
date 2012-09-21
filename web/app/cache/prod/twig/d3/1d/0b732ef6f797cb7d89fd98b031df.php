<?php

/* WebIlluminationAdminBundle:Orders:viewDeliveryNote.html.twig */
class __TwigTemplate_d31d0b732ef6f797cb7d89fd98b031df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::print.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::print.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Ride Direct ";
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            echo "Collection";
        } else {
            echo "Delivery";
        }
        echo ": ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFFFFF;\" cellpadding=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td valign=\"top\">
\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"100%\" valign=\"top\" style=\"padding: 20px;\">
\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"300\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\"><img width=\"300\" height=\"50\" alt=\"Ride Direct\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"right\" style=\"line-height: 35px; background: #FFFFFF; font-weight: bold; color: #000000; font-size: 24px; font-family: Arial;\">";
        // line 16
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            echo "COLLECTION";
        } else {
            echo "DELIVERY";
        }
        echo " NOTE: <span style=\"line-height: 35px; font-weight: normal; color: #444444; font-size: 28px; font-family: Arial;\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF; padding: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">";
        // line 25
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            echo "Collection";
        } else {
            echo "Delivery";
        }
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
            echo " Address";
        }
        echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 29
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 30
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: bold; color: #CC0000; text-transform: uppercase; font-size: 18px; font-family: 'Arial Black', Arial;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 32
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: normal; color: #000000; text-transform: uppercase; font-size: 12px; font-family: Arial;\">";
            ob_start();
            // line 33
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 34
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 35
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 37
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 38
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 39
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 41
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 42
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 43
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 45
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                // line 46
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 48
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                // line 49
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 51
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 53
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t";
        // line 58
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
            // line 59
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 60
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 61
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 63
            echo "\t\t\t\t\t\t\t\t\t\t";
        }
        // line 64
        echo "\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order</h3>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"2\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Quantity</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 72
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
            // line 73
            ob_start();
            // line 74
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 75
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                // line 76
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 77
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["selectedOptionLabel"]) {
                    // line 78
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getContext($context, "selectedOptionLabel") != "")) {
                        // line 79
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                        echo $this->getContext($context, "selectedOptionLabel");
                        if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                            echo "<br />";
                        }
                        // line 80
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 81
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedOptionLabel'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 82
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 83
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 89
        echo "\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
            // line 90
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">Ride Direct Privilege Card</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">1</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 97
        echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 10px 0 0 0;\" align=\"left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #000000; padding: 0 0 5px 0; margin: 0; line-height: 100%;\">Thank you for placing your order with Ride Direct.</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 16px; color: #444444; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong>Ride Direct</strong> Sales Team</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">t:</strong> 01332 365 913</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">e:</strong>  <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"mailto:sales@ridedirect.co.uk\">sales@ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">w:</strong> <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"http://www.ridedirect.co.uk/\">www.ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"right\" valign=\"top\" style=\"padding: 10px 0 0 0;\" width=\"85\"><img width=\"85\" height=\"85\" alt=\"Ride Direct QR Code\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/qr-code.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 10px; color: #98A7B3; padding: 10px 0; margin: 10px 0 0 0; line-height: 100%; border-top: 2px dotted #98A7B3;\">Ride Direct is a trading company of Motobrox Sport Ltd. Incorporated in England and Wales. Company Number: 06453317. VAT Number: 924765989. Registered Office: 119a Nun's Street, Derby, Derbyshire DE1 3LS.</p>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t</table>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:viewDeliveryNote.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 86,  263 => 83,  246 => 81,  234 => 78,  217 => 77,  173 => 60,  309 => 113,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 74,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 75,  150 => 46,  260 => 82,  155 => 51,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 37,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 79,  114 => 31,  208 => 58,  183 => 73,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 125,  170 => 59,  210 => 47,  180 => 59,  172 => 56,  168 => 58,  149 => 47,  139 => 45,  240 => 191,  230 => 182,  121 => 34,  257 => 222,  249 => 119,  106 => 43,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 76,  198 => 71,  181 => 89,  167 => 50,  160 => 61,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 44,  85 => 14,  76 => 21,  112 => 37,  101 => 34,  98 => 33,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 21,  184 => 59,  138 => 34,  118 => 38,  105 => 34,  66 => 21,  56 => 21,  115 => 47,  83 => 11,  164 => 63,  140 => 43,  58 => 6,  21 => 4,  61 => 23,  36 => 10,  209 => 85,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 36,  176 => 47,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 64,  134 => 60,  132 => 53,  127 => 56,  123 => 52,  109 => 63,  90 => 37,  54 => 19,  133 => 43,  124 => 33,  111 => 29,  107 => 35,  80 => 34,  69 => 20,  60 => 20,  52 => 16,  97 => 39,  95 => 32,  88 => 26,  78 => 25,  75 => 25,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 49,  145 => 65,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 48,  96 => 18,  93 => 40,  91 => 30,  68 => 27,  65 => 18,  63 => 17,  43 => 4,  50 => 18,  25 => 7,  92 => 28,  86 => 36,  79 => 32,  46 => 13,  37 => 11,  33 => 10,  27 => 2,  82 => 22,  72 => 28,  64 => 8,  53 => 31,  49 => 6,  44 => 15,  42 => 13,  34 => 3,  29 => 11,  23 => 5,  19 => 1,  40 => 3,  20 => 3,  30 => 7,  26 => 6,  22 => 2,  224 => 88,  215 => 60,  211 => 106,  204 => 98,  200 => 55,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 76,  179 => 48,  177 => 61,  171 => 64,  162 => 105,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 48,  103 => 29,  99 => 19,  77 => 25,  74 => 31,  57 => 16,  47 => 15,  39 => 19,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 37,  108 => 30,  104 => 45,  102 => 61,  94 => 33,  89 => 29,  87 => 38,  84 => 49,  81 => 33,  73 => 22,  70 => 19,  67 => 26,  62 => 24,  59 => 22,  55 => 20,  51 => 70,  48 => 23,  41 => 24,  38 => 12,  35 => 9,  31 => 8,  28 => 11,);
    }
}
