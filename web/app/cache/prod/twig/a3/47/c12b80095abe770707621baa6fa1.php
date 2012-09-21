<?php

/* WebIlluminationAdminBundle:Brands:listingContacts.html.twig */
class __TwigTemplate_a347c12b80095abe770707621baa6fa1 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"contacts-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
        echo "\">
\t";
        // line 2
        if ($this->getAttribute($this->getContext($context, "item", true), "contacts", array(), "any", true, true)) {
            // line 3
            echo "\t\t";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "contacts")) > 0)) {
                // line 4
                echo "\t\t\t<div class=\"padding-5\">
\t\t\t\t";
                // line 5
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "item"), "contacts"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                    // line 6
                    echo "\t\t\t\t\t<h5";
                    if ($this->getAttribute($this->getContext($context, "loop"), "first")) {
                        echo " class=\"no-margin-top\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "displayName"), "html", null, true);
                    echo "</h5>
\t\t\t\t\t<div class=\"margin-top-5 sidebar-tabs\">
\t\t                <ul>
\t\t                    <li id=\"tab-contact-numbers-";
                    // line 9
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\"><a href=\"#contact-numbers-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">Contact Numbers</a></li>
\t\t                    <li id=\"tab-addresses-";
                    // line 10
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\"><a href=\"#addresses-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">Addresses</a></li>
\t\t                    <li id=\"tab-email-addresses-";
                    // line 11
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\"><a href=\"#email-addresses-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">Email Addresses</a></li>
\t\t                    <li id=\"tab-web-addresses-";
                    // line 12
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\"><a href=\"#web-addresses-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">Web Addresses</a></li>
\t\t                </ul> 
\t\t                <section id=\"contact-numbers-";
                    // line 14
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">
\t\t                \t";
                    // line 15
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "contactNumbers")) > 0)) {
                        // line 16
                        echo "\t\t                \t\t<table width=\"100%\">
\t\t                \t\t\t";
                        // line 17
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "contact"), "contactNumbers"));
                        foreach ($context['_seq'] as $context["_key"] => $context["contactNumber"]) {
                            // line 18
                            echo "\t\t                \t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"label\" width=\"40%\"><label>";
                            // line 19
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactNumber"), "contactNumberType"), "html", null, true);
                            echo ":</label></td>
\t\t\t\t\t\t\t\t\t\t\t<td width=\"60%\">";
                            // line 20
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactNumber"), "displayName"), "html", null, true);
                            echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t                \t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contactNumber'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 23
                        echo "\t\t                \t\t</table>
\t\t                \t";
                    } else {
                        // line 25
                        echo "\t\t                \t\t<p>There are no contact numbers setup for <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "displayName"), "html", null, true);
                        echo "</strong>.</p>
\t\t                \t";
                    }
                    // line 27
                    echo "\t\t                </section>
\t\t                <section id=\"addresses-";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">
\t\t                \t";
                    // line 29
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "contactAddresses")) > 0)) {
                        // line 30
                        echo "\t\t                \t\t<table width=\"100%\">
\t\t                \t\t\t";
                        // line 31
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "contact"), "contactAddresses"));
                        foreach ($context['_seq'] as $context["_key"] => $context["contactAddress"]) {
                            // line 32
                            echo "\t\t                \t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"label\" width=\"40%\"><label>";
                            // line 33
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "contactAddressType"), "html", null, true);
                            echo ":</label></td>
\t\t\t\t\t\t\t\t\t\t\t<td width=\"60%\">";
                            // line 34
                            ob_start();
                            // line 35
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if ((($this->getAttribute($this->getContext($context, "contactAddress"), "firstName") != "") || ($this->getAttribute($this->getContext($context, "contactAddress"), "lastName") != ""))) {
                                // line 36
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "firstName"), "html", null, true);
                                echo " ";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "lastName"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 38
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "organisationName") != "")) {
                                // line 39
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "organisationName"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 41
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "addressLine1") != "")) {
                                // line 42
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "addressLine1"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 44
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "addressLine2") != "")) {
                                // line 45
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "addressLine2"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 47
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "addressLine3") != "")) {
                                // line 48
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "addressLine3"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 50
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "townCity") != "")) {
                                // line 51
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "townCity"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 53
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "countyState") != "")) {
                                // line 54
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "countyState"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 56
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            if (($this->getAttribute($this->getContext($context, "contactAddress"), "postZipCode") != "")) {
                                // line 57
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactAddress"), "postZipCode"), "html", null, true);
                                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 59
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                            echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t                \t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contactAddress'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 62
                        echo "\t\t                \t\t</table>
\t\t                \t";
                    } else {
                        // line 64
                        echo "\t\t                \t\t<p>There are no addresses setup for <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "displayName"), "html", null, true);
                        echo "</strong>.</p>
\t\t                \t";
                    }
                    // line 66
                    echo "\t\t                </section>
\t\t                <section id=\"email-addresses-";
                    // line 67
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">
\t\t                \t";
                    // line 68
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "contactEmailAddresses")) > 0)) {
                        // line 69
                        echo "\t\t                \t\t<table width=\"100%\">
\t\t                \t\t\t";
                        // line 70
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "contact"), "contactEmailAddresses"));
                        foreach ($context['_seq'] as $context["_key"] => $context["contactEmailAddress"]) {
                            // line 71
                            echo "\t\t                \t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"label\" width=\"40%\"><label>";
                            // line 72
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactEmailAddress"), "contactEmailAddressType"), "html", null, true);
                            echo ":</label></td>
\t\t\t\t\t\t\t\t\t\t\t<td width=\"60%\"><a href=\"mailto:";
                            // line 73
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactEmailAddress"), "email"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactEmailAddress"), "displayName"), "html", null, true);
                            echo "</a></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t                \t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contactEmailAddress'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 76
                        echo "\t\t                \t\t</table>
\t\t                \t";
                    } else {
                        // line 78
                        echo "\t\t                \t\t<p>There are no email addresses setup for <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "displayName"), "html", null, true);
                        echo "</strong>.</p>
\t\t                \t";
                    }
                    // line 80
                    echo "\t\t                </section>
\t\t                <section id=\"web-addresses-";
                    // line 81
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "id"), "html", null, true);
                    echo "\">
\t\t                \t";
                    // line 82
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "contactWebAddresses")) > 0)) {
                        // line 83
                        echo "\t\t                \t\t<table width=\"100%\">
\t\t                \t\t\t";
                        // line 84
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "contact"), "contactWebAddresses"));
                        foreach ($context['_seq'] as $context["_key"] => $context["contactWebAddress"]) {
                            // line 85
                            echo "\t\t                \t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"label\" width=\"40%\"><label>";
                            // line 86
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactWebAddress"), "contactWebAddressType"), "html", null, true);
                            echo ":</label></td>
\t\t\t\t\t\t\t\t\t\t\t<td width=\"60%\"><a target=\"_blank\" href=\"";
                            // line 87
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactWebAddress"), "url"), "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactWebAddress"), "displayName"), "html", null, true);
                            echo "</a></td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t                \t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contactWebAddress'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 90
                        echo "\t\t                \t\t</table>
\t\t                \t";
                    } else {
                        // line 92
                        echo "\t\t                \t\t<p>There are no web addresses setup for <strong>";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "displayName"), "html", null, true);
                        echo "</strong>.</p>
\t\t                \t";
                    }
                    // line 94
                    echo "\t\t                </section>
\t\t            </div>
\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 97
                echo "\t\t\t</div>
\t\t\t";
            } else {
                // line 99
                echo "\t\t\t\t<h5 class=\"no-margin-top\">No Contacts</h5>
\t\t\t\t<p class=\"padding-top-5\">There are currently no contacts setup for ";
                // line 100
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "brand"), "html", null, true);
                echo ".</p>
\t\t\t";
            }
            // line 102
            echo "\t";
        } else {
            // line 103
            echo "\t\t<h5 class=\"no-margin-top\">No Contacts</h5>
\t\t<p class=\"padding-top-5\">There are currently no contacts setup for ";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "brand"), "html", null, true);
            echo ".</p>
\t";
        }
        // line 106
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Brands:listingContacts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 246,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 69,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 92,  319 => 90,  288 => 81,  229 => 67,  206 => 54,  147 => 35,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 194,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 77,  235 => 64,  232 => 67,  212 => 56,  207 => 44,  143 => 114,  157 => 45,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 70,  233 => 78,  226 => 64,  187 => 65,  150 => 36,  260 => 72,  155 => 39,  223 => 79,  186 => 63,  169 => 48,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 31,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 88,  208 => 60,  183 => 49,  166 => 45,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 107,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 75,  199 => 90,  191 => 157,  170 => 42,  210 => 72,  180 => 152,  172 => 45,  168 => 52,  149 => 62,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 71,  249 => 74,  106 => 24,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 73,  198 => 161,  181 => 82,  167 => 41,  160 => 41,  45 => 11,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 258,  297 => 84,  274 => 80,  256 => 211,  254 => 74,  252 => 112,  231 => 62,  216 => 64,  213 => 175,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 110,  238 => 196,  220 => 26,  201 => 58,  194 => 50,  130 => 29,  100 => 68,  85 => 30,  76 => 12,  112 => 23,  101 => 34,  98 => 19,  272 => 118,  269 => 237,  228 => 105,  221 => 59,  197 => 51,  184 => 55,  138 => 32,  118 => 26,  105 => 35,  66 => 20,  56 => 32,  115 => 58,  83 => 14,  164 => 50,  140 => 33,  58 => 9,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 57,  192 => 67,  189 => 54,  178 => 61,  176 => 44,  165 => 76,  161 => 39,  152 => 126,  148 => 32,  141 => 33,  134 => 31,  132 => 37,  127 => 53,  123 => 46,  109 => 30,  90 => 26,  54 => 13,  133 => 100,  124 => 97,  111 => 32,  107 => 38,  80 => 24,  69 => 12,  60 => 14,  52 => 34,  97 => 38,  95 => 71,  88 => 65,  78 => 23,  75 => 55,  71 => 19,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 84,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 66,  236 => 195,  222 => 62,  218 => 65,  159 => 130,  154 => 42,  151 => 41,  145 => 34,  136 => 103,  128 => 27,  125 => 28,  119 => 33,  110 => 38,  96 => 18,  93 => 33,  91 => 33,  68 => 46,  65 => 12,  63 => 22,  43 => 19,  50 => 14,  25 => 4,  92 => 17,  86 => 17,  79 => 27,  46 => 20,  37 => 3,  33 => 13,  27 => 4,  82 => 16,  72 => 51,  64 => 10,  53 => 21,  49 => 28,  44 => 10,  42 => 24,  34 => 9,  29 => 11,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 5,  26 => 8,  22 => 2,  224 => 66,  215 => 57,  211 => 106,  204 => 98,  200 => 73,  195 => 159,  193 => 57,  190 => 98,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 128,  153 => 30,  146 => 110,  142 => 56,  137 => 55,  131 => 30,  126 => 28,  120 => 95,  117 => 46,  103 => 20,  99 => 19,  77 => 18,  74 => 15,  57 => 15,  47 => 6,  39 => 18,  32 => 6,  24 => 3,  17 => 1,  135 => 107,  129 => 29,  122 => 27,  116 => 25,  113 => 24,  108 => 84,  104 => 20,  102 => 23,  94 => 27,  89 => 16,  87 => 15,  84 => 30,  81 => 24,  73 => 26,  70 => 11,  67 => 23,  62 => 40,  59 => 18,  55 => 16,  51 => 15,  48 => 12,  41 => 4,  38 => 3,  35 => 15,  31 => 13,  28 => 9,);
    }
}
