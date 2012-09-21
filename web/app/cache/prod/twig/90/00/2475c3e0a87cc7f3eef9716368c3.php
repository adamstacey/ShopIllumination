<?php

/* WebIlluminationAdminBundle:Orders:viewDeliveryNotes.html.twig */
class __TwigTemplate_90002475c3e0a87cc7f3eef9716368c3 extends Twig_Template
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
        echo "Ride Direct";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "orders"));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 5
            echo "\t\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFFFFF;\" cellpadding=\"0\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td valign=\"top\">
\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td width=\"100%\" valign=\"top\" style=\"padding: 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"300\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\"><img width=\"300\" height=\"50\" alt=\"Ride Direct\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"right\" style=\"line-height: 35px; background: #FFFFFF; font-weight: bold; color: #000000; font-size: 24px; font-family: Arial;\">";
            // line 17
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                echo "COLLECTION";
            } else {
                echo "DELIVERY";
            }
            echo " NOTE: <span style=\"line-height: 35px; font-weight: normal; color: #444444; font-size: 28px; font-family: Arial;\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
            echo "</span></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF; padding: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">";
            // line 26
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                echo "Collection";
            } else {
                echo "Delivery";
            }
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
                echo " Address";
            }
            echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 30
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                // line 31
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: bold; color: #CC0000; text-transform: uppercase; font-size: 18px; font-family: 'Arial Black', Arial;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 33
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: normal; color: #000000; text-transform: uppercase; font-size: 12px; font-family: Arial;\">";
                ob_start();
                // line 34
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 35
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                    // line 36
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 38
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 39
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                    // line 40
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 42
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 43
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                    // line 47
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 49
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                    // line 50
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 52
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 54
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 59
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
                // line 60
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 61
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
                foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                    // line 62
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                    echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 64
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 65
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order</h3>
\t\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"2\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Quantity</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 72
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 73
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
                // line 74
                ob_start();
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 76
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 78
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
                        // line 79
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getContext($context, "selectedOptionLabel") != "")) {
                            // line 80
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                            echo $this->getContext($context, "selectedOptionLabel");
                            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                                echo "<br />";
                            }
                            // line 81
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 82
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                    // line 83
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 84
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 87
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 90
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
                // line 91
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">Ride Direct Privilege Card</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">1</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 98
            echo "\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 10px 0 0 0;\" align=\"left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #000000; padding: 0 0 5px 0; margin: 0; line-height: 100%;\">Thank you for placing your order with Ride Direct.</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 16px; color: #444444; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong>Ride Direct</strong> Sales Team</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">t:</strong> 01332 365 913</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">e:</strong>  <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"mailto:sales@ridedirect.co.uk\">sales@ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">w:</strong> <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"http://www.ridedirect.co.uk/\">www.ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"right\" valign=\"top\" style=\"padding: 10px 0 0 0;\" width=\"85\"><img width=\"85\" height=\"85\" alt=\"Ride Direct QR Code\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/qr-code.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 10px; color: #98A7B3; padding: 10px 0; margin: 10px 0 0 0; line-height: 100%; border-top: 2px dotted #98A7B3;\">Ride Direct is a trading company of Motobrox Sport Ltd. Incorporated in England and Wales. Company Number: 06453317. VAT Number: 924765989. Registered Office: 119a Nun's Street, Derby, Derbyshire DE1 3LS.</p>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t\t<div style=\"page-break-before: always;\"></div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:viewDeliveryNotes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  800 => 335,  791 => 328,  788 => 327,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 313,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 289,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 281,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 270,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 212,  511 => 210,  505 => 207,  501 => 205,  499 => 204,  496 => 203,  493 => 202,  483 => 198,  480 => 197,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 166,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 210,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 146,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 64,  227 => 47,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 719,  778 => 704,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 565,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 100,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 90,  276 => 119,  262 => 99,  235 => 80,  232 => 79,  212 => 77,  207 => 44,  143 => 57,  157 => 69,  366 => 278,  340 => 255,  503 => 130,  488 => 200,  475 => 194,  471 => 418,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 87,  253 => 112,  233 => 50,  226 => 65,  187 => 65,  150 => 46,  260 => 82,  155 => 123,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 66,  258 => 83,  248 => 73,  242 => 89,  239 => 70,  237 => 107,  174 => 78,  182 => 82,  175 => 62,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 123,  491 => 446,  432 => 170,  203 => 74,  114 => 43,  208 => 95,  183 => 73,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 157,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 91,  279 => 120,  275 => 175,  265 => 116,  251 => 111,  199 => 91,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 40,  168 => 60,  149 => 50,  139 => 44,  240 => 109,  230 => 182,  121 => 31,  257 => 222,  249 => 60,  106 => 23,  334 => 31,  294 => 125,  286 => 20,  277 => 119,  255 => 62,  244 => 82,  214 => 76,  198 => 71,  181 => 82,  167 => 74,  160 => 54,  45 => 5,  487 => 200,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 310,  424 => 167,  415 => 165,  392 => 162,  385 => 268,  376 => 261,  367 => 158,  360 => 156,  352 => 246,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 223,  297 => 126,  274 => 188,  256 => 75,  254 => 204,  252 => 112,  231 => 67,  216 => 51,  213 => 97,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 141,  318 => 139,  300 => 128,  296 => 126,  293 => 125,  290 => 79,  284 => 122,  270 => 122,  266 => 85,  261 => 84,  247 => 71,  243 => 110,  238 => 69,  220 => 26,  201 => 43,  194 => 88,  130 => 23,  100 => 22,  85 => 34,  76 => 31,  112 => 35,  101 => 38,  98 => 38,  272 => 118,  269 => 172,  228 => 105,  221 => 77,  197 => 70,  184 => 64,  138 => 34,  118 => 40,  105 => 36,  66 => 21,  56 => 21,  115 => 29,  83 => 27,  164 => 72,  140 => 47,  58 => 17,  21 => 4,  61 => 23,  36 => 4,  209 => 95,  205 => 75,  196 => 72,  192 => 77,  189 => 86,  178 => 63,  176 => 41,  165 => 75,  161 => 53,  152 => 66,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 48,  123 => 46,  109 => 63,  90 => 35,  54 => 8,  133 => 40,  124 => 42,  111 => 38,  107 => 35,  80 => 21,  69 => 30,  60 => 16,  52 => 16,  97 => 38,  95 => 29,  88 => 26,  78 => 32,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 123,  282 => 89,  268 => 84,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 102,  218 => 100,  159 => 54,  154 => 67,  151 => 66,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 45,  110 => 42,  96 => 34,  93 => 33,  91 => 36,  68 => 29,  65 => 42,  63 => 17,  43 => 13,  50 => 13,  25 => 7,  92 => 36,  86 => 22,  79 => 32,  46 => 13,  37 => 4,  33 => 3,  27 => 2,  82 => 22,  72 => 18,  64 => 18,  53 => 32,  49 => 6,  44 => 15,  42 => 7,  34 => 3,  29 => 6,  23 => 3,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 88,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 88,  190 => 76,  188 => 86,  185 => 65,  179 => 48,  177 => 61,  171 => 61,  162 => 36,  158 => 69,  156 => 41,  153 => 52,  146 => 49,  142 => 46,  137 => 46,  131 => 44,  126 => 48,  120 => 45,  117 => 88,  103 => 35,  99 => 19,  77 => 31,  74 => 20,  57 => 16,  47 => 27,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 43,  122 => 46,  116 => 39,  113 => 43,  108 => 30,  104 => 40,  102 => 39,  94 => 21,  89 => 31,  87 => 30,  84 => 34,  81 => 33,  73 => 26,  70 => 30,  67 => 29,  62 => 11,  59 => 37,  55 => 17,  51 => 16,  48 => 23,  41 => 5,  38 => 4,  35 => 3,  31 => 8,  28 => 11,);
    }
}
