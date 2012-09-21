<?php

/* WebIlluminationAdminBundle:Departments:addScript.js.twig */
class __TwigTemplate_c53af8b22d856cab2fa2b7cbf605f54a extends Twig_Template
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
\t\$(document).ready(function() {
\t\t
\t\t";
        // line 5
        echo "\t\tvar brands = [
\t\t\t";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "brands"));
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
            // line 7
            echo "\t\t\t\t{
\t\t\t\t\tvalue: \"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\",
\t\t\t\t\tlabel: \"";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo "\"
\t\t\t\t}";
            // line 10
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 11
            echo "\t\t\t";
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
        // line 12
        echo "\t\t];
\t\t
\t\t";
        // line 15
        echo "\t\tvar departments = [
\t\t\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "departments"));
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
            // line 17
            echo "\t\t\t\t{
\t\t\t\t\tvalue: \"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\",
\t\t\t\t\tlabel: \"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo "\"
\t\t\t\t}";
            // line 20
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 21
            echo "\t\t\t";
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
        // line 22
        echo "\t\t];
\t\t
\t\t";
        // line 25
        echo "\t\t\$(\"#search-brand\").autocomplete({
\t\t\tsource: brands,
\t\t\tfocus: function(event, ui) {
\t\t\t\t\$(\"#form-brand-id\").val(ui.item.label);
\t\t\t\t\$(\"#uniform-form-brand-id span\").html(\$(\"#form-brand-id option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\$(\"#form-brand-id option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#form-brand-id option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\treturn false;
\t\t\t},
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\"#search-brand\").val(\"\");
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t\$(\"#search-department\").autocomplete({
\t\t\tsource: departments,
\t\t\tfocus: function(event, ui) {
\t\t\t\t\$(\"#form-department-id\").val(ui.item.label);
\t\t\t\t\$(\"#uniform-form-department-id span\").html(\$(\"#form-department-id option[value='\"+ui.item.value+\"']\").text());
\t\t\t\t\$(\"#form-department-id option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#form-department-id option[value='\"+ui.item.value+\"']\").attr(\"selected\", \"selected\");
\t\t\t\treturn false;
\t\t\t},
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\"#search-department\").val(\"\");
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 55
        echo "\t\t\$(\"#form-add\").validator({
\t\t\tposition : 'bottom left', 
\t\t\toffset : [0, 0], 
\t\t\tmessageClass : 'form-error', 
    \t\tmessage : '<div><em/></div>'
\t\t});
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:addScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 20,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 22,  76 => 21,  112 => 40,  101 => 61,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 62,  66 => 11,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 63,  90 => 30,  54 => 79,  133 => 8,  124 => 22,  111 => 47,  107 => 110,  80 => 22,  69 => 87,  60 => 42,  52 => 78,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 12,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 104,  93 => 33,  91 => 105,  68 => 19,  65 => 45,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 13,  27 => 9,  82 => 60,  72 => 20,  64 => 18,  53 => 10,  49 => 9,  44 => 25,  42 => 7,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 109,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 34,  77 => 18,  74 => 27,  57 => 11,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 49,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 43,  41 => 11,  38 => 3,  35 => 7,  31 => 42,  28 => 3,);
    }
}
