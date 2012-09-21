<?php

/* WebIlluminationAdminBundle:Designer:script.html.twig */
class __TwigTemplate_0de96843433d1f86e37a730ef5b82b90 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
\t    \t
\twindow.onload = function () {
\t\t\t\t
\t\t// Setup canvas
\t\tvar canvas = Raphael(\"designer_design_";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\", ";
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getContext($context, "design_data"), "canvas_width") - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_left")) - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_right")) - 2), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getContext($context, "design_data"), "canvas_height") - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_top")) - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_bottom")) - 2), "html", null, true);
        echo ");\t
\t\t\t\t\t\t\t\t
\t\t// Event layer
\t\tvar event_layer = canvas.rect(0, 0, ";
        // line 9
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getContext($context, "design_data"), "canvas_width") - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_left")) - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_right")) - 2), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, ((($this->getAttribute($this->getContext($context, "design_data"), "canvas_height") - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_top")) - $this->getAttribute($this->getContext($context, "design_data"), "canvas_margin_bottom")) - 2), "html", null, true);
        echo ");
\t\tevent_layer.attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#FFFFFF\", \"stroke-width\": 0, \"stroke-opacity\": 0});
\t\tevent_layer.node.onclick = function () {
\t\t\tdeselectElements();
\t\t}
\t\t
\t\t// Designer elements
\t\tvar elements = new Array();
\t\tvar element_count = 0;
\t\tvar page_count = 1;
\t\tvar selected_page = 1;
\t\tvar selected_element = -1;
\t\tvar action_timer = \"\";
\t\tvar line_drawing = false;
\t\tvar drawing_started = false;
\t\tvar selected_line_colour = \"\";
\t\tvar selected_line_size = \"\";
\t\tvar temporary_layer = \"\";
\t\t\t\t
\t\t// Font style
\t\t\$(\".designer-font-style-";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").click(function() {
\t\t\tif (\$(this).hasClass(\"active\"))
\t\t\t{
\t\t\t\t\$(this).removeClass(\"active\");
\t\t\t\t\$(this).attr(\"src\", \"/bundles/webilluminationadmin/images/designer/toolbar/\"+\$(this).attr(\"rel\")+\".png\");
\t\t\t} else {
\t\t\t\t\$(this).addClass(\"active\");
\t\t\t\t\$(this).attr(\"src\", \"/bundles/webilluminationadmin/images/designer/toolbar/\"+\$(this).attr(\"rel\")+\"-active.png\");
\t\t\t}
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tupdateText(elements, element_count, canvas);
\t\t\t}
\t\t});
\t\t
\t\t// Change text
\t\t\$(\"#designer_text_";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").change(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tupdateText(elements, element_count, canvas);
\t\t\t}
\t\t});
\t\t
\t\t// Colour picker
\t\t\$(\"#designer_image_border_colour_";
        // line 53
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").ColorPicker({
\t\t\tcolor: \"#000000\",
\t\t\tonShow: function (colpkr) {
\t\t\t\t\$(colpkr).fadeIn(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonHide: function (colpkr) {
\t\t\t\t\$(colpkr).fadeOut(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonChange: function (hsb, hex, rgb) {
\t\t\t\t\$(\"#designer_image_border_colour_";
        // line 64
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#\"+hex);
\t\t\t\tif (selected_element >= 0)
\t\t\t\t{
\t\t\t\t\telements[selected_element]['stroke'] = \"#\"+hex;
\t\t\t\t\telements[selected_element]['border'].attr({\"stroke\": elements[selected_element]['stroke']});
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_stroke_";
        // line 69
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").val(elements[selected_element]['stroke']);
\t\t\t\t}
\t\t\t}
\t\t});
\t\t\$(\"#designer_text_colour_";
        // line 73
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").ColorPicker({
\t\t\tcolor: \"#000000\",
\t\t\tonShow: function (colpkr) {
\t\t\t\t\$(colpkr).fadeIn(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonHide: function (colpkr) {
\t\t\t\t\$(colpkr).fadeOut(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonChange: function (hsb, hex, rgb) {
\t\t\t\t\$(\"#designer_text_colour_";
        // line 84
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#\"+hex);
\t\t\t\tif (selected_element >= 0)
\t\t\t\t{
\t\t\t\t\telements[selected_element]['fill'] = \"#\"+hex;
\t\t\t\t\telements[selected_element]['element'].attr({\"fill\": elements[selected_element]['fill']});
\t\t\t\t\telements[selected_element]['underline'].attr({\"stroke\": elements[selected_element]['fill']});
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_fill_";
        // line 90
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").val(elements[selected_element]['fill']);
\t\t\t\t}
\t\t\t}
\t\t});
\t\t\$(\"#designer_shape_fill_colour_";
        // line 94
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").ColorPicker({
\t\t\tcolor: \"#000000\",
\t\t\tonShow: function (colpkr) {
\t\t\t\t\$(colpkr).fadeIn(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonHide: function (colpkr) {
\t\t\t\t\$(colpkr).fadeOut(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonChange: function (hsb, hex, rgb) {
\t\t\t\t\$(\"#designer_shape_fill_colour_";
        // line 105
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#\"+hex);
\t\t\t\tif (selected_element >= 0)
\t\t\t\t{
\t\t\t\t\telements[selected_element]['fill'] = \"#\"+hex;
\t\t\t\t\telements[selected_element]['element'].attr({\"fill\": elements[selected_element]['fill']});
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_fill_";
        // line 110
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").val(elements[selected_element]['fill']);
\t\t\t\t}
\t\t\t}
\t\t});
\t\t\$(\"#designer_shape_border_colour_";
        // line 114
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").ColorPicker({
\t\t\tcolor: \"#000000\",
\t\t\tonShow: function (colpkr) {
\t\t\t\t\$(colpkr).fadeIn(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonHide: function (colpkr) {
\t\t\t\t\$(colpkr).fadeOut(500);
\t\t\t\treturn false;
\t\t\t},
\t\t\tonChange: function (hsb, hex, rgb) {
\t\t\t\t\$(\"#designer_shape_border_colour_";
        // line 125
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#\"+hex);
\t\t\t\tif (selected_element >= 0)
\t\t\t\t{
\t\t\t\t\telements[selected_element]['stroke'] = \"#\"+hex;
\t\t\t\t\telements[selected_element]['element'].attr({\"stroke\": elements[selected_element]['stroke']});
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_stroke_";
        // line 130
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").val(elements[selected_element]['stroke']);
\t\t\t\t}
\t\t\t}
\t\t});
\t\t
\t\t// Hide colour pickers
\t\t\$(\".colorpicker_submit\").click(function() {
\t\t\t\$(\".colorpicker\").fadeOut(500);
\t\t})
\t\t\t
\t\t// Load toolbars
\t\t\$(\".designer-main-toolbar-icon, .designer-main-toolbar-icon-selected\").click(function() {
\t\t\tif ((\$(this).attr(\"rel\") != \"designer_toolbar_delete_";
        // line 142
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\") && (\$(this).attr(\"rel\") != \"designer_toolbar_create_proof_";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\") && (\$(this).attr(\"rel\") != \"designer_toolbar_sizes_";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\"))
\t\t\t{
\t\t\t\t\$(\".designer-main-toolbar-icon-selected\").removeClass(\"designer-main-toolbar-icon-selected\").addClass(\"designer-main-toolbar-icon\");
\t\t\t\t\$(this).removeClass(\"designer-main-toolbar-icon\").addClass(\"designer-main-toolbar-icon-selected\");
\t\t\t\t\$(\".designer-toolbar\").hide();
\t\t\t\t\$(\"#\"+\$(this).attr(\"rel\")).show();
\t\t\t}
\t\t});
\t\t\t\t
\t\t// Deselect all elements
\t\tfunction deselectElements()
\t\t{
\t\t\tif (!line_drawing)
\t\t\t{
\t\t\t\tselected_element = -1;
\t\t\t\tfor (array_count = 0; array_count < element_count; array_count++)
\t\t\t\t{
\t\t\t\t\telements[array_count]['overlay'].animate({\"stroke-opacity\": 0, \"fill-opacity\": 0, \"opacity\": 0});
\t\t\t\t\telements[array_count]['selected'] = false;
\t\t\t\t}
\t\t\t\t
\t\t\t\t// Images
\t\t\t\t\$(\"#designer_image_stroke_width_";
        // line 164
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#designer_image_stroke_width_";
        // line 165
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option[value='0']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#designer_image_border_colour_";
        // line 166
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#000000\");
\t\t\t\t
\t\t\t\t// Shapes
\t\t\t\t\$(\"#designer_shape_fill_colour_";
        // line 169
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#FFFFFF\");
\t\t\t\t\$(\"#designer_shape_stroke_width_";
        // line 170
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#designer_shape_stroke_width_";
        // line 171
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option[value='1']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#designer_shape_border_colour_";
        // line 172
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#000000\");
\t\t\t\t
\t\t\t\t// Text
\t\t\t\t\$(\"#designer_text_";
        // line 175
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").val(\"\");
\t\t\t\t\$(\"#designer_text_font_";
        // line 176
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#designer_text_font_";
        // line 177
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option[value='arial']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#designer_text_size_";
        // line 178
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#designer_text_size_";
        // line 179
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo " option[value='10\t']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#designer_text_colour_";
        // line 180
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").css(\"background-color\", \"#000000\");
\t\t\t\t\$(\".designer-font-style-";
        // line 181
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").removeClass(\"active\");
\t\t\t\t\$(\".designer-bold-";
        // line 182
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").attr(\"src\", \"/bundles/webilluminationadmin/images/designer/toolbar/bold.png\");
\t\t\t\t\$(\".designer-italic-";
        // line 183
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").attr(\"src\", \"/bundles/webilluminationadmin/images/designer/toolbar/italic.png\");
\t\t\t\t\$(\".designer-underline-";
        // line 184
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\").attr(\"src\", \"/bundles/webilluminationadmin/images/designer/toolbar/underline.png\");
\t\t\t}
\t\t\t
\t\t}
\t\t
\t\t// Create a form element for saving
\t\tfunction addHiddenFormElements(elements, element_id)
\t\t{
\t\t\tvar form = \$(\"#save_form\");
\t\t\tform.append('<fieldset id=\"save_element_group_'+element_id+'_";
        // line 193
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">');
\t\t\tform.append('<input id=\"save_element_id_'+element_id+'_";
        // line 194
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_ids[]\" type=\"hidden\" value=\"'+element_id+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_page_";
        // line 195
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_page\" type=\"hidden\" value=\"'+elements[element_id]['page']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_type_";
        // line 196
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_type\" type=\"hidden\" value=\"'+elements[element_id]['type']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_width_";
        // line 197
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_width\" type=\"hidden\" value=\"'+elements[element_id]['width']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_height_";
        // line 198
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_height\" type=\"hidden\" value=\"'+elements[element_id]['height']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_x_";
        // line 199
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_x\" type=\"hidden\" value=\"'+elements[element_id]['x']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_y_";
        // line 200
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_y\" type=\"hidden\" value=\"'+elements[element_id]['y']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_startx_";
        // line 201
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_startx\" type=\"hidden\" value=\"'+elements[element_id]['startx']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_starty_";
        // line 202
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_starty\" type=\"hidden\" value=\"'+elements[element_id]['starty']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_endx_";
        // line 203
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_endx\" type=\"hidden\" value=\"'+elements[element_id]['endx']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_endy_";
        // line 204
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_endy\" type=\"hidden\" value=\"'+elements[element_id]['endy']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_horizontal_scale_";
        // line 205
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_horizontal_scale\" type=\"hidden\" value=\"'+elements[element_id]['horizontal_scale']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_vertical_scale_";
        // line 206
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_vertical_scale\" type=\"hidden\" value=\"'+elements[element_id]['vertical_scale']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_rotate_";
        // line 207
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_rotate\" type=\"hidden\" value=\"'+elements[element_id]['rotate']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_fill_";
        // line 208
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_fill\" type=\"hidden\" value=\"'+elements[element_id]['fill']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_stroke_";
        // line 209
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_stroke\" type=\"hidden\" value=\"'+elements[element_id]['stroke']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_strokewidth_";
        // line 210
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_strokewidth\" type=\"hidden\" value=\"'+elements[element_id]['strokewidth']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_text_";
        // line 211
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_text\" type=\"hidden\" value=\"'+elements[element_id]['text']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_bold_";
        // line 212
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_text\" type=\"hidden\" value=\"'+elements[element_id]['bold']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_italic_";
        // line 213
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_italic\" type=\"hidden\" value=\"'+elements[element_id]['italic']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_underline_";
        // line 214
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_underline\" type=\"hidden\" value=\"'+elements[element_id]['underline']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_path_";
        // line 215
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_path\" type=\"hidden\" value=\"'+elements[element_id]['path']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_fontfamily_";
        // line 216
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_fontfamily\" type=\"hidden\" value=\"'+elements[element_id]['fontfamily']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_fontsize_";
        // line 217
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_fontsize\" type=\"hidden\" value=\"'+elements[element_id]['fontsize']+'\" />');
\t\t\tform.append('<input id=\"save_element_'+element_id+'_image_";
        // line 218
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" name=\"save_element_'+element_id+'_image\" type=\"hidden\" value=\"'+elements[element_id]['image']+'\" />');
\t\t\tform.append('</fieldset>')
\t\t}
\t\t
\t\t// Add an image
\t\tfunction addImage(image_array, image_id, image_canvas, image_src, image_width, image_height)
\t\t{
\t\t\t// Initialise elements
\t\t\timage_array[image_id] = new Array();
\t\t\timage_array[image_id]['type'] = \"image\";
\t\t\timage_array[image_id]['width'] = image_width;
\t\t\timage_array[image_id]['height'] = image_height;
\t\t\timage_array[image_id]['x'] = 10;
\t\t\timage_array[image_id]['y'] = 10;
\t\t\timage_array[image_id]['startx'] = 10;
\t\t\timage_array[image_id]['starty'] = 10;
\t\t\timage_array[image_id]['endx'] = 10;
\t\t\timage_array[image_id]['endy'] = 10;
\t\t\timage_array[image_id]['horizontal_scale'] = 1;
\t\t\timage_array[image_id]['vertical_scale'] = 1;
\t\t\timage_array[image_id]['rotate'] = 0;
\t\t\timage_array[image_id]['fill'] = false;
\t\t\timage_array[image_id]['stroke'] = \"#000000\";
\t\t\timage_array[image_id]['strokewidth'] = 0;
\t\t\timage_array[image_id]['text'] = '';
\t\t\timage_array[image_id]['bold'] = false;
\t\t\timage_array[image_id]['italic'] = false;
\t\t\timage_array[image_id]['underline'] = false;
\t\t\timage_array[image_id]['path'] = '';
\t\t\timage_array[image_id]['fontfamily'] = false;
\t\t\timage_array[image_id]['fontsize'] = false;
\t\t\timage_array[image_id]['image'] = image_src;
\t\t\timage_array[image_id]['selected'] = false;
\t\t\timage_array[image_id]['movable'] = false;
\t\t\t
\t\t\t// Move
\t\t\timage_array[image_id]['move'] = function (e)
\t\t\t{
\t\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\t\timage_array[image_id]['movable'] = this;
\t\t\t\tthis.pos_x = e.clientX;
\t\t\t\tthis.pos_y = e.clientY;
\t\t\t\tthis.animate({\"fill-opacity\": .2}, 500);
\t\t\t}
\t\t\t
\t\t\t// Create element
\t\t\timage_array[image_id]['element'] = image_canvas.image(image_src, 0, 0, image_width, image_height);
\t\t\timage_array[image_id]['element'].node.id = \"design_image\";
\t\t\timage_array[image_id]['border'] = image_canvas.rect(0, 0, image_width, image_height);
\t\t\timage_array[image_id]['border'].attr({\"stroke\": image_array[image_id]['stroke'], \"stroke-width\": image_array[image_id]['strokewidth'], \"stroke-opacity\": 1});
\t\t\timage_array[image_id]['overlay'] = image_canvas.rect(0, 0, image_width, image_height);
\t\t\timage_array[image_id]['overlay'].attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#39F\", \"stroke-width\": 1, \"stroke-opacity\": 0, \"opacity\": 0});
\t\t\timage_array[image_id]['overlay'].node.style.cursor = \"move\";
\t\t\timage_array[image_id]['overlay'].mousedown(image_array[image_id]['move']);
\t\t\t
\t\t\t
\t\t\t// Select element
\t\t\timage_array[image_id]['overlay'].node.onclick = function ()
\t\t\t{
\t\t\t\tdeselectElements();
\t\t\t\timage_array[image_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\timage_array[image_id]['selected'] = true;
\t\t\t\tselected_element = image_id;
\t\t\t\t\$(\"#image_stroke_width option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#image_stroke_width option[value='\"+image_array[image_id]['strokewidth']+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#image_border_colour\").css(\"background-color\", image_array[image_id]['stroke']);
\t\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\t\$(\".main-toolbar-icon[rel='toolbar_picture']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\t\$(\".toolbar\").hide();
\t\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\t\$(\"#toolbar_picture\").show();
\t\t\t}
\t\t\t
\t\t\t// Create group
\t\t\timage_array[image_id]['group'] = image_canvas.set();
\t\t\timage_array[image_id]['group'].push(image_array[image_id]['element']);
\t\t\timage_array[image_id]['group'].push(image_array[image_id]['border']);
\t\t\timage_array[image_id]['group'].push(image_array[image_id]['overlay']);
\t\t\t
\t\t\t// Initialise element on canvas
\t\t\tdeselectElements();
\t\t\timage_array[image_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\timage_array[image_id]['selected'] = true;
\t\t\tselected_element = image_id;
\t\t\t\$(\"#image_stroke_width option\").removeAttr(\"selected\");
\t\t\t\$(\"#image_stroke_width option[value='\"+image_array[image_id]['strokewidth']+\"']\").attr(\"selected\", \"selected\");
\t\t\t\$(\"#image_border_colour\").css(\"background-color\", image_array[image_id]['stroke']);
\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\$(\".main-toolbar-icon[rel='toolbar_picture']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\$(\".toolbar\").hide();
\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\$(\"#toolbar_picture\").show();
\t\t}
\t\t
\t\t// \t
\t\tfunction addText(text_array, text_id, text_canvas, x, y)
\t\t{
\t\t\t// Initialise elements
\t\t\ttext_array[text_id] = new Array();
\t\t\ttext_array[text_id]['type'] = \"text\";
\t\t\ttext_array[text_id]['width'] = false;
\t\t\ttext_array[text_id]['height'] = false;
\t\t\ttext_array[text_id]['x'] = x;
\t\t\ttext_array[text_id]['y'] = y;
\t\t\ttext_array[text_id]['startx'] = 10;
\t\t\ttext_array[text_id]['starty'] = 10;
\t\t\ttext_array[text_id]['endx'] = 10;
\t\t\ttext_array[text_id]['endy'] = 10;
\t\t\ttext_array[text_id]['horizontal_scale'] = 1;
\t\t\ttext_array[text_id]['vertical_scale'] = 1;
\t\t\ttext_array[text_id]['rotate'] = 0;
\t\t\ttext_array[text_id]['fill'] = \$('#text_colour').css(\"background-color\");
\t\t\ttext_array[text_id]['stroke'] = '#000000';
\t\t\ttext_array[text_id]['strokewidth'] = 0;
\t\t\ttext_array[text_id]['text'] = \$(\"#text\").val();
\t\t\ttext_array[text_id]['bold'] = false;
\t\t\ttext_array[text_id]['italic'] = false;
\t\t\ttext_array[text_id]['underline'] = false;
\t\t\tvar selected_font_family = \$(\"#text_font option:selected\").val();
\t\t\tif (\$(\".bold\").hasClass(\"active\") && (\$(\".bold\").is(\":visible\") == true))
\t\t\t{
\t\t\t\tselected_font_family  = selected_font_family + \"-bold\";
\t\t\t\ttext_array[text_id]['bold'] = true;
\t\t\t}
\t\t\tif (\$(\".italic\").hasClass(\"active\") && (\$(\".italic\").is(\":visible\") == true))
\t\t\t{
\t\t\t\tselected_font_family  = selected_font_family + \"-italic\";
\t\t\t\ttext_array[text_id]['italic'] = true;
\t\t\t}
\t\t\tif (\$(\".underline\").hasClass(\"active\") && (\$(\".underline\").is(\":visible\") == true))
\t\t\t{
\t\t\t\ttext_array[text_id]['underline'] = true;
\t\t\t}
\t\t\ttext_array[text_id]['path'] = '';
\t\t\ttext_array[text_id]['fontfamily'] = selected_font_family;
\t\t\ttext_array[text_id]['fontsize'] = \$(\"#text_size option:selected\").val();
\t\t\ttext_array[text_id]['image'] = '';
\t\t\ttext_array[text_id]['selected'] = false;
\t\t\ttext_array[text_id]['movable'] = false;
\t\t\t\t\t\t\t
\t\t\t// Move
\t\t\ttext_array[text_id]['move'] = function (e)
\t\t\t{
\t\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\t\ttext_array[text_id]['movable'] = this;
\t\t\t\tthis.pos_x = e.clientX;
\t\t\t\tthis.pos_y = e.clientY;
\t\t\t\tthis.animate({\"fill-opacity\": .2}, 500);
\t\t\t}
\t\t\t
\t\t\t// Create element
\t\t\t//text_array[text_id]['element'] =  text_canvas.text(text_array[text_id]['x'], text_array[text_id]['Y'], text_array[text_id]['text']);
\t\t\ttext_array[text_id]['element'] =  text_canvas.print(text_array[text_id]['x'], text_array[text_id]['y'], text_array[text_id]['text'], canvas.getFont(text_array[text_id]['fontfamily'], 900), parseInt(text_array[text_id]['fontsize'])).attr(\"fill\", text_array[text_id]['fill']);
\t\t\t// Get the first letter path
\t\t\ttext_array[text_id]['element'][0].node.id = \"text_\"+text_id+\"_0\";
\t\t\tvar text_path = \$(\"#text_\"+text_id+\"_0\").attr(\"d\");
\t\t\t
\t\t\t// Get the rest of the letters
\t\t\tfor (var letter_count = 1; letter_count < text_array[text_id]['element'].length; letter_count++)
\t\t\t{
\t\t\t\ttext_array[text_id]['element'][letter_count].node.id = \"text_\"+text_id+\"_\"+letter_count;
\t\t\t\ttext_path = text_path.toString() + \"|\" + \$(\"#text_\"+text_id+\"_\"+letter_count).attr(\"d\");
\t\t\t}
\t\t\ttext_array[text_id]['path'] = text_path;
\t\t\ttext_array[text_id]['width'] = text_array[text_id]['element'].getBBox().width;
\t\t\ttext_array[text_id]['height'] = text_array[text_id]['element'].getBBox().height;
\t\t\ttext_array[text_id]['overlay'] = text_canvas.rect(text_array[text_id]['element'].getBBox().x, text_array[text_id]['element'].getBBox().y, text_array[text_id]['width'], text_array[text_id]['height']);
\t\t\ttext_array[text_id]['overlay'].attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#39F\", \"stroke-width\": 1, \"stroke-opacity\": 0, \"opacity\": 0});
\t\t\ttext_array[text_id]['overlay'].node.style.cursor = \"move\";
\t\t\ttext_array[text_id]['overlay'].mousedown(text_array[text_id]['move']);
\t\t\t
\t\t\t// Select element
\t\t\ttext_array[text_id]['overlay'].node.onclick = function ()
\t\t\t{
\t\t\t\tdeselectElements();
\t\t\t\t\$(\"#text\").val(text_array[text_id]['text']);
\t\t\t\t\$('#text_colour').css('background-color', text_array[text_id]['fill']);
\t\t\t\t\$(\"#text_font option[value='\"+text_array[text_id]['fontfamily'].replace(\"-bold\", \"\").replace(\"-italic\", \"\")+\"']\").attr('selected', 'selected');
\t\t\t\t\$(\"#text_size option[value='\"+text_array[text_id]['fontsize']+\"']\").attr('selected', 'selected');
\t\t\t\ttext_array[text_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\ttext_array[text_id]['selected'] = true;
\t\t\t\tselected_element = text_id;
\t\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\t\$(\".main-toolbar-icon[rel='toolbar_text_box']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\t\$(\".toolbar\").hide();
\t\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\t\$(\"#toolbar_text_box\").show();
\t\t\t\tif (text_array[text_id]['bold'])
\t\t\t\t{
\t\t\t\t\t\$(\".bold\").addClass(\"active\");
\t\t\t\t\t\$(\".bold\").attr(\"src\", \"/images/toolbar/bold-active.png\");
\t\t\t\t}
\t\t\t\tif (text_array[text_id]['italic'])
\t\t\t\t{
\t\t\t\t\t\$(\".italic\").addClass(\"active\");
\t\t\t\t\t\$(\".italic\").attr(\"src\", \"/images/toolbar/italic-active.png\");
\t\t\t\t}
\t\t\t\tif (text_array[text_id]['underline'])
\t\t\t\t{
\t\t\t\t\t\$(\".underline\").addClass(\"active\");
\t\t\t\t\t\$(\".underline\").attr(\"src\", \"/images/toolbar/underline-active.png\");
\t\t\t\t}
\t\t\t}
\t\t\t
\t\t\t// Create group
\t\t\ttext_array[text_id]['group'] = text_canvas.set();
\t\t\ttext_array[text_id]['group'].push(text_array[text_id]['element']);
\t\t\ttext_array[text_id]['group'].push(text_array[text_id]['overlay']);
\t\t\tif (\$(\".underline\").hasClass(\"active\") && (\$(\".underline\").is(\":visible\") == true))
\t\t\t{
\t\t\t\ttext_array[text_id]['underline'] = text_canvas.path(\"M\"+(text_array[text_id]['element'].getBBox().x)+\" \"+(text_array[text_id]['element'].getBBox().y + text_array[text_id]['element'].getBBox().height)+\"L\"+(text_array[text_id]['element'].getBBox().x + text_array[text_id]['element'].getBBox().width)+\" \"+(text_array[text_id]['element'].getBBox().y + text_array[text_id]['element'].getBBox().height)+\"\");
\t\t\t\ttext_array[text_id]['underline'].attr(\"stroke\", text_array[text_id]['fill']);
\t\t\t\ttext_array[text_id]['group'].push(text_array[text_id]['underline']);
\t\t\t}
\t\t\t
\t\t\t// Initialise element on canvas
\t\t\tdeselectElements();
\t\t\t\$(\"#text\").val(text_array[text_id]['text']);
\t\t\t\$('#text_colour').css('background-color', text_array[text_id]['fill']);
\t\t\t\$(\"#text_font option[value='\"+text_array[text_id]['fontfamily'].replace(\"-bold\", \"\").replace(\"-italic\", \"\")+\"']\").attr('selected', 'selected');
\t\t\t\$(\"#text_size option[value='\"+text_array[text_id]['fontsize']+\"']\").attr('selected', 'selected');
\t\t\ttext_array[text_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\ttext_array[text_id]['selected'] = true;
\t\t\tselected_element = text_id;
\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\$(\".main-toolbar-icon[rel='toolbar_text_box']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\$(\".toolbar\").hide();
\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\$(\"#toolbar_text_box\").show();
\t\t\tif (text_array[text_id]['bold'])
\t\t\t{
\t\t\t\t\$(\".bold\").addClass(\"active\");
\t\t\t\t\$(\".bold\").attr(\"src\", \"/images/toolbar/bold-active.png\");
\t\t\t}
\t\t\tif (text_array[text_id]['italic'])
\t\t\t{
\t\t\t\t\$(\".italic\").addClass(\"active\");
\t\t\t\t\$(\".italic\").attr(\"src\", \"/images/toolbar/italic-active.png\");
\t\t\t}
\t\t\tif (text_array[text_id]['underline'])
\t\t\t{
\t\t\t\t\$(\".underline\").addClass(\"active\");
\t\t\t\t\$(\".underline\").attr(\"src\", \"/images/toolbar/underline-active.png\");
\t\t\t}
\t\t}
\t\t
\t\tfunction updateText(text_array, text_id, text_canvas)
\t\t{
\t\t\tvar existing_text_id = selected_element;
\t\t\tvar existing_x = elements[selected_element]['x'];
\t\t\tvar existing_y = elements[selected_element]['y'];
\t\t\taddText(text_array, text_id, text_canvas, existing_x, existing_y);
    \t\taddHiddenFormElements(elements, element_count);
\t\t\telement_count++;
\t\t\tif (existing_text_id >= 0)
\t\t\t{
\t\t\t\ttext_array[existing_text_id]['group'].remove();
\t\t\t\t\$(\"#save_element_group_\"+existing_text_id).remove();
\t\t\t\t\$(\"#save_element_id_\"+existing_text_id).remove();
\t\t\t}
\t\t}
\t\t
\t\t// Add ellipse
\t\tfunction addEllipse(ellipse_array, ellipse_id, ellipse_canvas, x, y)
\t\t{
\t\t\t// Initialise elements
\t\t\tellipse_array[ellipse_id] = new Array();
\t\t\tellipse_array[ellipse_id]['type'] = \"ellipse\";
\t\t\tellipse_array[ellipse_id]['width'] = 50;
\t\t\tellipse_array[ellipse_id]['height'] = 50;
\t\t\tellipse_array[ellipse_id]['x'] = x;
\t\t\tellipse_array[ellipse_id]['y'] = y;
\t\t\tellipse_array[ellipse_id]['startx'] = 10;
\t\t\tellipse_array[ellipse_id]['starty'] = 10;
\t\t\tellipse_array[ellipse_id]['endx'] = 10;
\t\t\tellipse_array[ellipse_id]['endy'] = 10;
\t\t\tellipse_array[ellipse_id]['horizontal_scale'] = 1;
\t\t\tellipse_array[ellipse_id]['vertical_scale'] = 1;
\t\t\tellipse_array[ellipse_id]['rotate'] = 0;
\t\t\tellipse_array[ellipse_id]['fill'] = \$(\"#shape_fill_colour\").css(\"background-color\");
\t\t\tellipse_array[ellipse_id]['stroke'] = \$(\"#shape_border_colour\").css(\"background-color\");
\t\t\tellipse_array[ellipse_id]['strokewidth'] = \$(\"#shape_stroke_width\").val();
\t\t\tellipse_array[ellipse_id]['text'] = '';
\t\t\tellipse_array[ellipse_id]['bold'] = false;
\t\t\tellipse_array[ellipse_id]['italic'] = false;
\t\t\tellipse_array[ellipse_id]['underline'] = false;
\t\t\tellipse_array[ellipse_id]['path'] = '';
\t\t\tellipse_array[ellipse_id]['fontfamily'] = false;
\t\t\tellipse_array[ellipse_id]['fontsize'] = false;
\t\t\tellipse_array[ellipse_id]['image'] = '';
\t\t\tellipse_array[ellipse_id]['selected'] = false;
\t\t\tellipse_array[ellipse_id]['movable'] = false;
\t\t\t\t\t\t\t
\t\t\t// Move
\t\t\tellipse_array[ellipse_id]['move'] = function (e)
\t\t\t{
\t\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\t\tellipse_array[ellipse_id]['movable'] = this;
\t\t\t\tthis.pos_x = e.clientX;
\t\t\t\tthis.pos_y = e.clientY;
\t\t\t\tthis.animate({\"fill-opacity\": .2}, 500);
\t\t\t}
\t\t\t
\t\t\t// Create element
\t\t\tellipse_array[ellipse_id]['element'] = ellipse_canvas.ellipse(ellipse_array[ellipse_id]['x'], ellipse_array[ellipse_id]['y'], ellipse_array[ellipse_id]['width'], ellipse_array[ellipse_id]['height']);
\t\t\tellipse_array[ellipse_id]['element'].attr({\"stroke-width\": ellipse_array[ellipse_id]['strokewidth'], \"stroke-opacity\": 1, \"stroke\": ellipse_array[ellipse_id]['stroke'], \"fill\": ellipse_array[ellipse_id]['fill']});
\t\t\tellipse_array[ellipse_id]['width'] = ellipse_array[ellipse_id]['element'].getBBox().width;
\t\t\tellipse_array[ellipse_id]['height'] = ellipse_array[ellipse_id]['element'].getBBox().height;
\t\t\tellipse_array[ellipse_id]['overlay'] = ellipse_canvas.rect(ellipse_array[ellipse_id]['element'].getBBox().x, ellipse_array[ellipse_id]['element'].getBBox().y, ellipse_array[ellipse_id]['width'], ellipse_array[ellipse_id]['height']);
\t\t\tellipse_array[ellipse_id]['overlay'].attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#39F\", \"stroke-width\": 1, \"stroke-opacity\": 0, \"opacity\": 0});
\t\t\tellipse_array[ellipse_id]['overlay'].node.style.cursor = \"move\";
\t\t\tellipse_array[ellipse_id]['overlay'].mousedown(ellipse_array[ellipse_id]['move']);
\t\t\t
\t\t\t// Select element
\t\t\tellipse_array[ellipse_id]['overlay'].node.onclick = function ()
\t\t\t{
\t\t\t\tdeselectElements();
\t\t\t\tellipse_array[ellipse_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\tellipse_array[ellipse_id]['selected'] = true;
\t\t\t\tselected_element = ellipse_id;
\t\t\t\t
\t\t\t\t\$(\"#shape_fill_colour\").css(\"background-color\", ellipse_array[ellipse_id]['fill']);
\t\t\t\t\$(\"#shape_stroke_width option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#shape_stroke_width option[value='\"+ellipse_array[ellipse_id]['strokewidth']+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#shape_border_colour\").css(\"background-color\", ellipse_array[ellipse_id]['stroke']);
\t\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\t\$(\".main-toolbar-icon[rel='toolbar_shape']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\t\$(\".toolbar\").hide();
\t\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\t\$(\"#toolbar_shape\").show();
\t\t\t}
\t\t\t
\t\t\t// Create group
\t\t\tellipse_array[ellipse_id]['group'] = ellipse_canvas.set();
\t\t\tellipse_array[ellipse_id]['group'].push(ellipse_array[ellipse_id]['element']);
\t\t\tellipse_array[ellipse_id]['group'].push(ellipse_array[ellipse_id]['overlay']);
\t\t\t
\t\t\t// Initialise element on canvas
\t\t\tdeselectElements();
\t\t\tellipse_array[ellipse_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\tellipse_array[ellipse_id]['selected'] = true;
\t\t\tselected_element = ellipse_id;
\t\t\t\$(\"#shape_fill_colour\").css(\"background-color\", ellipse_array[ellipse_id]['fill']);
\t\t\t\$(\"#shape_stroke_width option\").removeAttr(\"selected\");
\t\t\t\$(\"#shape_stroke_width option[value='\"+ellipse_array[ellipse_id]['strokewidth']+\"']\").attr(\"selected\", \"selected\");
\t\t\t\$(\"#shape_border_colour\").css(\"background-color\", ellipse_array[ellipse_id]['stroke']);
\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\$(\".main-toolbar-icon[rel='toolbar_shape']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\$(\".toolbar\").hide();
\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\$(\"#toolbar_shape\").show();
\t\t}
\t\t
\t\t// Add rectangle
\t\tfunction addRectangle(rectangle_array, rectangle_id, rectangle_canvas, x, y)
\t\t{
\t\t\t// Initialise elements
\t\t\trectangle_array[rectangle_id] = new Array();
\t\t\trectangle_array[rectangle_id]['type'] = \"rectangle\";
\t\t\trectangle_array[rectangle_id]['width'] = 100;
\t\t\trectangle_array[rectangle_id]['height'] = 100;
\t\t\trectangle_array[rectangle_id]['x'] = x;
\t\t\trectangle_array[rectangle_id]['y'] = y;
\t\t\trectangle_array[rectangle_id]['startx'] = 10;
\t\t\trectangle_array[rectangle_id]['starty'] = 10;
\t\t\trectangle_array[rectangle_id]['endx'] = 10;
\t\t\trectangle_array[rectangle_id]['endy'] = 10;
\t\t\trectangle_array[rectangle_id]['horizontal_scale'] = 1;
\t\t\trectangle_array[rectangle_id]['vertical_scale'] = 1;
\t\t\trectangle_array[rectangle_id]['rotate'] = 0;
\t\t\trectangle_array[rectangle_id]['fill'] = \$(\"#shape_fill_colour\").css(\"background-color\");
\t\t\trectangle_array[rectangle_id]['stroke'] = \$(\"#shape_border_colour\").css(\"background-color\");
\t\t\trectangle_array[rectangle_id]['strokewidth'] = \$(\"#shape_stroke_width\").val();
\t\t\trectangle_array[rectangle_id]['text'] = '';
\t\t\trectangle_array[rectangle_id]['bold'] = false;
\t\t\trectangle_array[rectangle_id]['italic'] = false;
\t\t\trectangle_array[rectangle_id]['underline'] = false;
\t\t\trectangle_array[rectangle_id]['path'] = '';
\t\t\trectangle_array[rectangle_id]['fontfamily'] = false;
\t\t\trectangle_array[rectangle_id]['fontsize'] = false;
\t\t\trectangle_array[rectangle_id]['image'] = '';
\t\t\trectangle_array[rectangle_id]['selected'] = false;
\t\t\trectangle_array[rectangle_id]['movable'] = false;
\t\t\t\t\t\t\t
\t\t\t// Move
\t\t\trectangle_array[rectangle_id]['move'] = function (e)
\t\t\t{
\t\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\t\trectangle_array[rectangle_id]['movable'] = this;
\t\t\t\tthis.pos_x = e.clientX;
\t\t\t\tthis.pos_y = e.clientY;
\t\t\t\tthis.animate({\"fill-opacity\": .2}, 500);
\t\t\t}
\t\t\t
\t\t\t// Create element
\t\t\trectangle_array[rectangle_id]['element'] = rectangle_canvas.rect(rectangle_array[rectangle_id]['x'], rectangle_array[rectangle_id]['y'], rectangle_array[rectangle_id]['width'], rectangle_array[rectangle_id]['height']);
\t\t\trectangle_array[rectangle_id]['element'].attr({\"stroke-width\": rectangle_array[rectangle_id]['strokewidth'], \"stroke-opacity\": 1, \"stroke\": rectangle_array[rectangle_id]['stroke'], \"fill\": rectangle_array[rectangle_id]['fill']});
\t\t\trectangle_array[rectangle_id]['width'] = rectangle_array[rectangle_id]['element'].getBBox().width;
\t\t\trectangle_array[rectangle_id]['height'] = rectangle_array[rectangle_id]['element'].getBBox().height;
\t\t\trectangle_array[rectangle_id]['overlay'] = rectangle_canvas.rect(rectangle_array[rectangle_id]['element'].getBBox().x, rectangle_array[rectangle_id]['element'].getBBox().y, rectangle_array[rectangle_id]['width'], rectangle_array[rectangle_id]['height']);
\t\t\trectangle_array[rectangle_id]['overlay'].attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#39F\", \"stroke-width\": 1, \"stroke-opacity\": 0, \"opacity\": 0});
\t\t\trectangle_array[rectangle_id]['overlay'].node.style.cursor = \"move\";
\t\t\trectangle_array[rectangle_id]['overlay'].mousedown(rectangle_array[rectangle_id]['move']);
\t\t\t
\t\t\t// Select element
\t\t\trectangle_array[rectangle_id]['overlay'].node.onclick = function ()
\t\t\t{
\t\t\t\tdeselectElements();
\t\t\t\trectangle_array[rectangle_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\trectangle_array[rectangle_id]['selected'] = true;
\t\t\t\tselected_element = rectangle_id;
\t\t\t\t
\t\t\t\t\$(\"#shape_fill_colour\").css(\"background-color\", rectangle_array[rectangle_id]['fill']);
\t\t\t\t\$(\"#shape_stroke_width option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#shape_stroke_width option[value='\"+rectangle_array[rectangle_id]['strokewidth']+\"']\").attr(\"selected\", \"selected\");
\t\t\t\t\$(\"#shape_border_colour\").css(\"background-color\", rectangle_array[rectangle_id]['stroke']);
\t\t\t\t\$(\".main-toolbar-icon-selected\").removeClass(\"main-toolbar-icon-selected\").addClass(\"main-toolbar-icon\");
\t\t\t\t\$(\".main-toolbar-icon[rel='toolbar_shape']\").removeClass(\"main-toolbar-icon\").addClass(\"main-toolbar-icon-selected\");
\t\t\t\t\$(\".toolbar\").hide();
\t\t\t\t\$(\"#toolbar_standard\").show();
\t\t\t\t\$(\"#toolbar_shape\").show();
\t\t\t}
\t\t\t
\t\t\t// Create group
\t\t\trectangle_array[rectangle_id]['group'] = rectangle_canvas.set();
\t\t\trectangle_array[rectangle_id]['group'].push(rectangle_array[rectangle_id]['element']);
\t\t\trectangle_array[rectangle_id]['group'].push(rectangle_array[rectangle_id]['overlay']);
\t\t\t
\t\t\t// Initialise element on canvas
\t\t\tdeselectElements();
\t\t\trectangle_array[rectangle_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\trectangle_array[rectangle_id]['selected'] = true;
\t\t\tselected_element = rectangle_id;
\t\t\t
\t\t}
\t\t
\t\t// Add a line
\t\tfunction addLine(line_array, line_id, line_canvas, strokewidth, stroke)
\t\t{
\t\t\tline_array[line_id] = new Array();
\t\t\tline_array[line_id]['selected'] = false;
\t\t\tline_array[line_id]['type'] = \"line\";
\t\t\tline_array[line_id]['rotate'] = 0;
\t\t\tline_array[line_id]['width'] = 0;
\t\t\tline_array[line_id]['height'] = 0;
\t\t\tline_array[line_id]['x'] = 0;
\t\t\tline_array[line_id]['y'] = 0;
\t\t\tline_array[line_id]['startx'] = 10;
\t\t\tline_array[line_id]['starty'] = 10;
\t\t\tline_array[line_id]['endx'] = 10;
\t\t\tline_array[line_id]['endy'] = 10;
\t\t\tline_array[line_id]['horizontal_scale'] = 1;
\t\t\tline_array[line_id]['vertical_scale'] = 1;
\t\t\tline_array[line_id]['rotate'] = 0;
\t\t\tline_array[line_id]['fill'] = false;
\t\t\tline_array[line_id]['stroke'] = stroke;
\t\t\tline_array[line_id]['strokewidth'] = strokewidth;
\t\t\tline_array[line_id]['text'] = '';
\t\t\tline_array[line_id]['bold'] = false;
\t\t\tline_array[line_id]['italic'] = false;
\t\t\tline_array[line_id]['underline'] = false;
\t\t\tline_array[line_id]['path'] = '';
\t\t\tline_array[line_id]['fontfamily'] = false;
\t\t\tline_array[line_id]['fontsize'] = false;
\t\t\tline_array[line_id]['image'] = '';
\t\t\tline_array[line_id]['movable'] = false;
\t\t\tline_array[line_id]['move'] = function (e)
\t\t\t{
\t\t\t\tif (\$.browser['mozilla']) { e.preventDefault(); }
\t\t\t\tline_array[line_id]['movable'] = this;
\t\t\t\tthis.pos_x = e.clientX;
\t\t\t\tthis.pos_y = e.clientY;
\t\t\t\tthis.animate({\"fill-opacity\": .2}, 500);
\t\t\t}
\t\t\tline_array[line_id]['element'] = line_canvas.path({\"stroke\": line_array[line_id]['fill'], \"stroke-width\": line_array[line_id]['strokewidth']});
\t\t\tline_array[line_id]['overlay'] = line_canvas.rect(0, 0, 0, 0);
\t\t\tline_array[line_id]['overlay'].attr({\"fill\": \"#FFFFFF\", \"fill-opacity\": 0, \"stroke\": \"#39F\", \"stroke-width\": 1, \"stroke-opacity\": 0, \"opacity\": 0});
\t\t\tline_array[line_id]['overlay'].node.style.cursor = \"move\";
\t\t\tline_array[line_id]['overlay'].mousedown(line_array[line_id]['move']);
\t\t\tline_array[line_id]['overlay'].node.onclick = function ()
\t\t\t{
\t\t\t\tdeselectElements();
\t\t\t\tline_array[line_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\tline_array[line_id]['selected'] = true;
\t\t\t\t\$('#line_colour').css('background-color', line_array[line_id]['fill']);
\t\t\t\t\$('#line_colour').val(line_array[line_id]['fill']);
\t\t\t\t\$(\"#line_size option[value='\"+line_array[line_id]['strokewidth']+\"']\").attr('selected', 'selected');
\t\t\t\tselected_element = line_id;
\t\t\t}
\t\t\tdeselectElements();
\t\t\tline_array[line_id]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\tline_array[line_id]['selected'] = true;
\t\t\t\$('#line_colour').css('background-color', line_array[line_id]['fill']);
\t\t\t\$('#line_colour').val(line_array[line_id]['fill']);
\t\t\t\$(\"#line_size option[value='\"+line_array[line_id]['strokewidth']+\"']\").attr('selected', 'selected');
\t\t\tselected_element = line_id;
\t\t}
\t\t
\t\t// Mouse down
\t\tdocument.onmousedown = function (e)
\t\t{
\t\t\te = e || window.event;
\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\tif (line_drawing)
\t\t\t{
\t\t\t\t
\t\t\t\taddLine(elements, element_count, canvas, 2, \"#000000\");
\t\t\t\t
\t\t\t\tif (\$.browser.mozilla)
\t\t\t\t{
\t\t\t\t\telements[element_count]['element'].moveTo(e.layerX, e.layerY);
\t\t\t\t\telements[element_count]['startx'] = e.layerX;
\t\t\t\t\telements[element_count]['starty'] = e.layerY;
\t\t\t\t} else {
\t\t\t\t\telements[element_count]['element'].moveTo(e.offsetX, e.offsetY);
\t\t\t\t\telements[element_count]['startx'] = e.offsetX;
\t\t\t\t\telements[element_count]['starty'] = e.offsetY;
\t\t\t\t}
\t\t\t\tdrawing_started = true;
\t\t\t\t
\t\t\t\t// Add the hidden form elements for saving
\t\t\t\t addHiddenFormElements(elements, element_count);
\t\t\t\t\t\t\t\t
\t\t\t\t// Next element
\t\t\t\telement_count++;
\t\t\t}
\t\t};
\t\t
\t\t// Mouse move
\t\tdocument.onmousemove = function (e)
\t\t{
\t\t\te = e || window.event;
\t\t\tif (\$.browser.mozilla) { e.preventDefault(); }
\t\t\tfor (array_count = 0; array_count < element_count; array_count++)
\t\t\t{
\t\t\t\tif (line_drawing)
\t\t\t\t{
\t\t\t\t\tif (drawing_started)
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['element'].remove();
\t\t\t\t\t\telements[selected_element]['element'] = canvas.path({\"stroke\": elements[selected_element]['fill'], \"stroke-width\": elements[selected_element]['strokewidth']});
\t\t\t\t\t\telements[selected_element]['element'].moveTo(elements[selected_element]['startx'], elements[selected_element]['starty']);
\t\t\t      
\t\t\t\t\t\t//var absolute_top = \$(\"#designer-canvas\").position().top + 20 - \$(window).scrollTop() + \$(\"#designer\").position().top + \$(\"div.central-column\").position().top;
\t\t\t\t\t\t//var absolute_left = \$(\"#designer-canvas\").position().left + 211 - \$(window).scrollLeft() + \$(\"#designer\").position().left + \$(\"div.central-column\").position().left;
\t\t\t\t\t\tvar move_x = e.clientX - absolute_left;
\t\t\t\t\t\tvar move_y = e.clientY - absolute_top;
\t\t\t\t\t\t
\t\t\t\t\t\telements[selected_element]['element'].lineTo(move_x, move_y);
\t\t\t\t\t\telements[selected_element]['endx'] = move_x;
\t\t\t\t\t\telements[selected_element]['endy'] = move_y;
\t\t\t\t\t\t\t
\t\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_endx\").val(elements[selected_element]['endx']);
\t\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_endy\").val(elements[selected_element]['endy']);
\t\t\t\t\t}
\t\t\t\t} else {
\t\t\t\t\tfor (array_count = 0; array_count < element_count; array_count++)
\t\t\t\t\t{
\t\t\t\t\t\tif (elements[array_count]['movable'])
\t\t\t\t\t\t{
\t\t\t\t\t\t\telements[array_count]['group'].translate(Math.round(e.clientX - elements[array_count]['movable'].pos_x), Math.round(e.clientY - elements[array_count]['movable'].pos_y));
\t\t\t\t\t\t\tif (elements[array_count]['type'] == \"ellipse\")
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\telements[array_count]['x'] = elements[array_count]['element'].attr(\"cx\");
\t\t\t\t\t\t\t\telements[array_count]['y'] = elements[array_count]['element'].attr(\"cy\");
\t\t\t\t\t\t\t} else if (elements[array_count]['type'] == \"text\") {
\t\t\t\t\t\t\t\telements[array_count]['x'] = elements[array_count]['element'].getBBox().x;
\t\t\t\t\t\t\t\telements[array_count]['y'] = elements[array_count]['element'].getBBox().y;
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\telements[array_count]['x'] = elements[array_count]['element'].attr(\"x\");
\t\t\t\t\t\t\t\telements[array_count]['y'] = elements[array_count]['element'].attr(\"y\");
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\$(\"#save_element_\"+array_count+\"_x\").val(elements[array_count]['x']);
\t\t\t\t\t\t\t\$(\"#save_element_\"+array_count+\"_y\").val(elements[array_count]['y']);
\t\t\t\t\t\t\telements[array_count]['movable'].pos_x = Math.round(e.clientX);
\t\t\t\t\t\t\telements[array_count]['movable'].pos_y = Math.round(e.clientY);
\t\t\t\t\t\t\tif (elements[array_count]['type'] == \"ellipse\")
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tvar central_x = elements[array_count]['x'];
\t\t\t\t\t\t\t\tvar central_y = elements[array_count]['y'];
\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\tvar central_x = (elements[array_count]['element'].getBBox().width / 2) + elements[array_count]['x'];
\t\t\t\t\t\t\t\tvar central_y = (elements[array_count]['element'].getBBox().height / 2) + elements[array_count]['y'];
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\telements[array_count]['group'].attr(\"rotation\", elements[array_count]['rotate']);
\t\t\t\t\t\t\telements[array_count]['group'].rotate(elements[array_count]['rotate'], central_x, central_y);
\t\t\t\t\t\t\t\$(\"#save_element_\"+array_count+\"_rotate\").val(elements[array_count]['rotate']);
\t\t\t\t\t\t\tif (elements[array_count]['type'] == \"text\")
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\tvar text_path = \$(\"#text_\"+array_count+\"_0\").attr(\"d\");
\t\t\t\t\t\t\t\tfor (var letter_count = 1; letter_count < elements[array_count]['element'].length; letter_count++)
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\ttext_path = text_path.toString() + \"|\" + \$(\"#text_\"+array_count+\"_\"+letter_count).attr(\"d\");
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\telements[array_count]['path'] = text_path;
\t\t\t\t\t\t\t\t\$(\"#save_element_\"+array_count+\"_path\").val(elements[array_count]['path']);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}\t
\t\t};
\t\t
\t\t// Mouse up
\t\tdocument.onmouseup = function ()
\t\t{
\t\t\tif (line_drawing)
\t\t\t{
\t\t\t\telements[selected_element]['group'] = canvas.set();
\t\t\t\telements[selected_element]['group'].push(elements[selected_element]['element']);
\t\t\t\telements[selected_element]['group'].push(elements[selected_element]['overlay']);
\t\t\t\telements[selected_element]['fill'] = selected_line_colour;
\t\t\t\telements[selected_element]['strokewidth'] = selected_line_size;
\t\t\t\telements[selected_element]['element'].node.id = \"element_\"+selected_element;
\t\t\t\telements[selected_element]['element'].toFront();
\t\t\t\telements[selected_element]['overlay'].toFront();
\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t\telements[selected_element]['overlay'].attr({\"x\": elements[selected_element]['element'].getBBox().x - 5, \"y\": elements[selected_element]['element'].getBBox().y - 5, \"width\": elements[selected_element]['element'].getBBox().width + 10, \"height\": elements[selected_element]['element'].getBBox().height + 10});
\t\t\t\telements[array_count]['group'].translate(1, 1);
\t\t\t\telements[array_count]['group'].translate(-1, -1);
\t\t\t\telements[array_count]['x'] = Math.round(elements[array_count]['overlay'].attr(\"x\"));
\t\t\t\telements[array_count]['y'] = Math.round(elements[array_count]['overlay'].attr(\"y\"));
\t\t\t\telements[array_count]['group'].attr(\"x\", elements[array_count]['x']);
\t\t\t\telements[array_count]['group'].attr(\"y\", elements[array_count]['y']);
\t\t\t\t\$(\"#save_element_\"+array_count+\"_x\").val(elements[array_count]['x']);
\t\t\t\t\$(\"#save_element_\"+array_count+\"_y\").val(elements[array_count]['y']);
\t\t\t\telements[selected_element]['overlay'].animate({\"stroke-opacity\": 1, \"fill-opacity\": 0, \"opacity\": 1});
\t\t\t\telements[selected_element]['selected'] = true;
\t\t\t\tline_drawing = false;
\t\t\t\tdrawing_started = false;
\t\t\t\ttemporary_layer.remove();
\t\t\t} else {
\t\t\t\tfor (array_count = 0; array_count < element_count; array_count++)
\t\t\t\t{
\t\t\t\t\telements[array_count]['movable'] && elements[array_count]['movable'].animate({\"fill-opacity\": 0}, 500);
\t\t\t\t\telements[array_count]['movable'] = false;
\t\t\t\t}
\t\t\t}\t
\t\t\t
\t\t};
\t\t
\t\t// Delete a element
\t\tfunction deleteElement(element_array, element_id)
\t\t{
\t\t\tif (element_id >= 0)
\t\t\t{
\t\t\t\telement_array[element_id]['group'].remove();
\t\t\t\t\$(\"#save_element_group_\"+element_id).remove();
\t\t\t\t\$(\"#save_element_id_\"+element_id).remove();
\t\t\t\tdeselectElements();
\t\t\t}
\t\t}
\t\t
\t\t// Focus text boxes
    \t\$(\"#text, #canvas_width, #canvas_height, #canvas_margin_top, #canvas_margin_right, #canvas_margin_bottom, #canvas_margin_left\").click(function() {
    \t\t\$(this).select();
    \t});
    \t
    \t// Change canvas size
    \t\$(\"#canvas_width, #canvas_height, #canvas_margin_top, #canvas_margin_right, #canvas_margin_bottom, #canvas_margin_left\").change(function() {
    \t\tvar canvas_margin_top = parseInt(\$(\"#canvas_margin_top\").val());
    \t\tvar canvas_margin_right = parseInt(\$(\"#canvas_margin_right\").val());
    \t\tvar canvas_margin_bottom = parseInt(\$(\"#canvas_margin_bottom\").val());
    \t\tvar canvas_margin_left = parseInt(\$(\"#canvas_margin_left\").val());
    \t\tvar canvas_width = parseInt(\$(\"#canvas_width\").val());
    \t\tif ((canvas_width < ((canvas_margin_left * 2) + (canvas_margin_right * 2))) || isNaN(canvas_width))
    \t\t{
    \t\t\tcanvas_width = (canvas_margin_left * 2) + (canvas_margin_right * 2);
    \t\t\t\$(\"#canvas_width\").val(canvas_width.toString());
    \t\t}
    \t\tvar canvas_height = parseInt(\$(\"#canvas_height\").val());
    \t\tif ((canvas_height < ((canvas_margin_top * 2) + (canvas_margin_bottom * 2))) || isNaN(canvas_height))
    \t\t{
    \t\t\tcanvas_height = (canvas_margin_top * 2) + (canvas_margin_bottom * 2);
    \t\t\t\$(\"#canvas_height\").val(canvas_height.toString());
    \t\t}
    \t\t\$(\"#card\").css(\"width\", canvas_width.toString()+\"px\");
    \t\t\$(\"#card\").css(\"height\", canvas_height.toString()+\"px\");
    \t\tvar card_width = (canvas_width - canvas_margin_right - canvas_margin_left - 2);
    \t\tvar card_height = (canvas_height - canvas_margin_top - canvas_margin_bottom - 2);
    \t\t\$(\"#design\").css(\"width\", card_width.toString()+\"px\");
    \t\t\$(\"#design\").css(\"height\", card_height.toString()+\"px\");
    \t\t\$(\"#design\").css(\"margin\", canvas_margin_top.toString()+\"px \"+canvas_margin_right.toString()+\"px \"+canvas_margin_bottom.toString()+\"px \"+canvas_margin_left.toString()+\"px \");
    \t\tcanvas.setSize(card_width, card_height);
    \t\t\$(\"#canvas_width_hidden\").val(canvas_width.toString());
    \t\t\$(\"#canvas_height_hidden\").val(canvas_height.toString());
    \t\t\$(\"#canvas_margin_top_hidden\").val(canvas_margin_top.toString());
    \t\t\$(\"#canvas_margin_right_hidden\").val(canvas_margin_right.toString());
    \t\t\$(\"#canvas_margin_bottom_hidden\").val(canvas_margin_bottom.toString());
    \t\t\$(\"#canvas_margin_left_hidden\").val(canvas_margin_left.toString());
    \t});
    \t
    \t// Add text
    \t\$(\"#add_text\").click(function() {
    \t\taddText(elements, element_count, canvas, 50, 50);
   \t\t\taddHiddenFormElements(elements, element_count);
\t\t\telement_count++;
    \t});
    \t
    \t// Add ellipse
    \t\$(\".ellipse\").click(function() {
    \t\taddEllipse(elements, element_count, canvas, 100, 100);
    \t\taddHiddenFormElements(elements, element_count);
\t\t\telement_count++;
    \t});
    \t
    \t// Add rectangle
    \t\$(\".rectangle\").click(function() {
    \t\taddRectangle(elements, element_count, canvas, 100, 100);
    \t\taddHiddenFormElements(elements, element_count);
\t\t\telement_count++;
    \t});
    \t
    \t// Add line
\t\t\$(\".line\").click(function() {
\t\t\tline_drawing = true;
\t\t\tselected_line_colour = \$(\"#shape_border_colour\").val();
\t\t\tselected_line_size = \$(\"#shape_stroke_width\").css(\"background-color\");
\t\t\tdeselectElements();
\t\t\ttemporary_layer = canvas.rect(0, 0, 458, 558);
\t\t\ttemporary_layer.attr({\"fill\": \"#FFFFFF\", \"opacity\": 0});
\t\t\t\$('#shape_border_colour').css('background-color', selected_line_colour);
\t\t\t\$(\"#shape_stroke_width option[value='\"+selected_line_size+\"']\").attr(\"selected\", \"selected\");
\t\t});
\t\t
\t\t// Enlarge
\t\t\$(\".enlarge\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] + 0.01;
\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] + 0.01;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t}
\t\t});
\t\t\$(\".enlarge\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] + 0.05;
\t\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] + 0.05;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".enlarge\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Reduce
\t\t\$(\".reduce\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] - 0.01;
\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] - 0.01;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t}
\t\t});
\t\t\$(\".reduce\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] - 0.05;
\t\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] - 0.05;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t\t}, 200); \t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t}
\t\t});
\t\t\$(\".reduce\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Stretch horizontal
\t\t\$(\".stretch-horizontal\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] + 0.02;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t\$(\".stretch-horizontal\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] + 0.1;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".stretch-horizontal\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Shrink horizontal
\t\t\$(\".shrink-horizontal\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] - 0.02;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t\$(\".shrink-horizontal\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] - 0.1;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x + (elements[selected_element]['width'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".shrink-horizontal\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Stretch vertical
\t\t\$(\".stretch-vertical\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] + 0.02;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t}
\t\t});
\t\t\$(\".stretch-vertical\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] + 0.1;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".stretch-vertical\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Shrink vertical
\t\t\$(\".shrink-vertical\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] - 0.02;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t{
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t} else {
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t}
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t}
\t\t});
\t\t\$(\".shrink-vertical\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] - 0.1;
\t\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_height\").val(elements[selected_element]['height']);
\t\t\t\t\tif (elements[selected_element]['type'] == 'ellipse')
\t\t\t\t\t{
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y + (elements[selected_element]['height'] / 2);
\t\t\t\t\t} else {
\t\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t}
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_y\").val(elements[selected_element]['y']);
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".shrink-vertical\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Rotate right
\t\t\$(\".rotate-right\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] + 1);
\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] + 1, central_x, central_y);
\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] + 1;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t\$(\".rotate-right\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] + 5);
\t\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] + 5, central_x, central_y);
\t\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] + 5;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t}, 200); \t\t
\t\t\t}
\t\t});
\t\t\$(\".rotate-right\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Rotate left
\t\t\$(\".rotate-left\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] - 1);
\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] - 1, central_x, central_y);
\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] - 1;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t\$(\".rotate-left\").mousedown(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\taction_timer = setInterval(function() {
\t\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] - 5);
\t\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] - 5, central_x, central_y);
\t\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] - 5;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t\t\t
\t\t\t\t}, 200);
\t\t\t}
\t\t});
\t\t\$(\".rotate-left\").mouseup(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tclearInterval(action_timer);
\t\t\t}
\t\t});
\t\t
\t\t// Rotate right 90
\t\t\$(\".rotate-right-90\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] + 90);
\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] + 90, central_x, central_y);
\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] + 90;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t
\t\t// Rotate left 90
\t\t\$(\".rotate-left-90\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tvar central_x = (elements[selected_element]['element'].getBBox().width / 2) + elements[selected_element]['element'].getBBox().x;
\t\t\t\tvar central_y = (elements[selected_element]['element'].getBBox().height / 2) + elements[selected_element]['element'].getBBox().y;
\t\t\t\telements[selected_element]['group'].attr(\"rotation\", elements[selected_element]['rotate'] - 90);
\t\t\t\telements[selected_element]['group'].rotate(elements[selected_element]['rotate'] - 90, central_x, central_y);
\t\t\t\telements[selected_element]['rotate'] = elements[selected_element]['rotate'] - 90;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_rotate\").val(elements[selected_element]['rotate']);
\t\t\t\telements[selected_element]['width'] = elements[selected_element]['element'].getBBox().width;
\t\t\t\telements[selected_element]['height'] = elements[selected_element]['element'].getBBox().height;
\t\t\t\telements[selected_element]['x'] = elements[selected_element]['element'].getBBox().x;
\t\t\t\telements[selected_element]['y'] = elements[selected_element]['element'].getBBox().y;
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_width\").val(elements[selected_element]['width']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_x\").val(elements[selected_element]['x']);
\t\t\t}
\t\t});
\t\t
\t\t// Flip horizontal
\t\t\$(\".flip-horizontal\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['horizontal_scale'] = elements[selected_element]['horizontal_scale'] * -1;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_horizontal_scale\").val(elements[selected_element]['horizontal_scale']);
\t\t\t}
\t\t});
\t\t
\t\t// Flip vertical
\t\t\$(\".flip-vertical\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['vertical_scale'] = elements[selected_element]['vertical_scale'] * -1;
\t\t\t\telements[selected_element]['group'].scale(elements[selected_element]['horizontal_scale'], elements[selected_element]['vertical_scale']);
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_vertical_scale\").val(elements[selected_element]['vertical_scale']);
\t\t\t}
\t\t});
\t\t
\t\t// Bring to front
\t\t\$(\".bring-to-front\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['group'].toFront();
\t\t\t}
\t\t});
\t\t
\t\t// Send to back
\t\t\$(\".send-to-back\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tfor (array_count = 0; array_count < element_count; array_count++)
\t\t\t\t{
\t\t\t\t\tif (array_count != selected_element)
\t\t\t\t\t{
\t\t\t\t\t\telements[array_count]['group'].toFront();
\t\t\t\t\t}
\t\t\t\t}\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t 
\t\t\t}
\t\t});
\t\t
\t\t// Change stroke width
\t\t\$(\"#image_stroke_width\").change(function () {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['strokewidth'] = \$(this).val();
\t\t\t\telements[selected_element]['border'].attr({\"stroke-width\": elements[selected_element]['strokewidth']});
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_strokewidth\").val(elements[selected_element]['strokewidth']);
\t\t\t}
\t\t});
\t\t\$(\"#shape_stroke_width\").change(function () {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\telements[selected_element]['strokewidth'] = \$(this).val();
\t\t\t\telements[selected_element]['element'].attr({\"stroke-width\": elements[selected_element]['strokewidth']});
\t\t\t\t\$(\"#save_element_\"+selected_element+\"_strokewidth\").val(elements[selected_element]['strokewidth']);
\t\t\t}
\t\t});
\t\t
\t\t// Change text size
\t\t\$(\"#text_size\").change(function () {
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tupdateText(elements, element_count, canvas);
\t\t\t}
\t\t});
\t\t
\t\t// Change text font
\t\t\$(\"#text_font\").change(function () {
\t\t\t// Reset font styles
\t\t\t\$(\".bold\").show();
\t\t\t\$(\".italic\").show();
\t\t\t// Hide italics
\t\t\tif ((\$(this).val() == 'comic-sans-ms') || (\$(this).val() == 'tahoma'))
\t\t\t{
\t\t\t\t\$(\".italic\").hide();\t
\t\t\t}
\t\t\tif (selected_element >= 0)
\t\t\t{
\t\t\t\tupdateText(elements, element_count, canvas);
\t\t\t}
\t\t});
\t\t
\t\t// Delete an element
\t\t\$(\".delete\").click(function() {
\t\t\tif (selected_element >= 0)
\t\t\t{\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t 
\t\t\t\tdeleteElement(elements, selected_element);
\t\t\t\t\$(\"#save_element_group_\"+selected_element).remove();
\t\t\t}
\t\t});
\t
\t};
\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Designer:script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 208,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 202,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 41,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 169,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 216,  392 => 272,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 45,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 49,  56 => 16,  115 => 21,  83 => 24,  164 => 50,  140 => 104,  58 => 6,  21 => 4,  61 => 11,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 88,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 94,  141 => 90,  134 => 99,  132 => 84,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 24,  111 => 69,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 30,  97 => 34,  95 => 17,  88 => 13,  78 => 45,  75 => 15,  71 => 43,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 15,  93 => 61,  91 => 14,  68 => 9,  65 => 8,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 13,  72 => 20,  64 => 12,  53 => 8,  49 => 9,  44 => 5,  42 => 4,  34 => 9,  29 => 2,  23 => 5,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 2,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 60,  185 => 76,  179 => 72,  177 => 114,  171 => 54,  162 => 105,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 64,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 17,  94 => 103,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 9,  67 => 43,  62 => 37,  59 => 29,  55 => 14,  51 => 6,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 2,  28 => 3,);
    }
}
