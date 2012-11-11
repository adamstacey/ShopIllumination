(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);
(function($,k,m,i,d){var e=$(i),g="waypoint.reached",b=function(o,n){o.element.trigger(g,n);if(o.options.triggerOnce){o.element[k]("destroy")}},h=function(p,o){if(!o){return -1}var n=o.waypoints.length-1;while(n>=0&&o.waypoints[n].element[0]!==p[0]){n-=1}return n},f=[],l=function(n){$.extend(this,{element:$(n),oldScroll:0,waypoints:[],didScroll:false,didResize:false,doScroll:$.proxy(function(){var q=this.element.scrollTop(),p=q>this.oldScroll,s=this,r=$.grep(this.waypoints,function(u,t){return p?(u.offset>s.oldScroll&&u.offset<=q):(u.offset<=s.oldScroll&&u.offset>q)}),o=r.length;if(!this.oldScroll||!q){$[m]("refresh")}this.oldScroll=q;if(!o){return}if(!p){r.reverse()}$.each(r,function(u,t){if(t.options.continuous||u===o-1){b(t,[p?"down":"up"])}})},this)});$(n).bind("scroll.waypoints",$.proxy(function(){if(!this.didScroll){this.didScroll=true;i.setTimeout($.proxy(function(){this.doScroll();this.didScroll=false},this),$[m].settings.scrollThrottle)}},this)).bind("resize.waypoints",$.proxy(function(){if(!this.didResize){this.didResize=true;i.setTimeout($.proxy(function(){$[m]("refresh");this.didResize=false},this),$[m].settings.resizeThrottle)}},this));e.load($.proxy(function(){this.doScroll()},this))},j=function(n){var o=null;$.each(f,function(p,q){if(q.element[0]===n){o=q;return false}});return o},c={init:function(o,n){this.each(function(){var u=$.fn[k].defaults.context,q,t=$(this);if(n&&n.context){u=n.context}if(!$.isWindow(u)){u=t.closest(u)[0]}q=j(u);if(!q){q=new l(u);f.push(q)}var p=h(t,q),s=p<0?$.fn[k].defaults:q.waypoints[p].options,r=$.extend({},s,n);r.offset=r.offset==="bottom-in-view"?function(){var v=$.isWindow(u)?$[m]("viewportHeight"):$(u).height();return v-$(this).outerHeight()}:r.offset;if(p<0){q.waypoints.push({element:t,offset:null,options:r})}else{q.waypoints[p].options=r}if(o){t.bind(g,o)}if(n&&n.handler){t.bind(g,n.handler)}});$[m]("refresh");return this},remove:function(){return this.each(function(o,p){var n=$(p);$.each(f,function(r,s){var q=h(n,s);if(q>=0){s.waypoints.splice(q,1);if(!s.waypoints.length){s.element.unbind("scroll.waypoints resize.waypoints");f.splice(r,1)}}})})},destroy:function(){return this.unbind(g)[k]("remove")}},a={refresh:function(){$.each(f,function(r,s){var q=$.isWindow(s.element[0]),n=q?0:s.element.offset().top,p=q?$[m]("viewportHeight"):s.element.height(),o=q?0:s.element.scrollTop();$.each(s.waypoints,function(u,x){if(!x){return}var t=x.options.offset,w=x.offset;if(typeof x.options.offset==="function"){t=x.options.offset.apply(x.element)}else{if(typeof x.options.offset==="string"){var v=parseFloat(x.options.offset);t=x.options.offset.indexOf("%")?Math.ceil(p*(v/100)):v}}x.offset=x.element.offset().top-n+o-t;if(x.options.onlyOnScroll){return}if(w!==null&&s.oldScroll>w&&s.oldScroll<=x.offset){b(x,["up"])}else{if(w!==null&&s.oldScroll<w&&s.oldScroll>=x.offset){b(x,["down"])}else{if(!w&&s.element.scrollTop()>x.offset){b(x,["down"])}}}});s.waypoints.sort(function(u,t){return u.offset-t.offset})})},viewportHeight:function(){return(i.innerHeight?i.innerHeight:e.height())},aggregate:function(){var n=$();$.each(f,function(o,p){$.each(p.waypoints,function(q,r){n=n.add(r.element)})});return n}};$.fn[k]=function(n){if(c[n]){return c[n].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof n==="function"||!n){return c.init.apply(this,arguments)}else{if(typeof n==="object"){return c.init.apply(this,[null,n])}else{$.error("Method "+n+" does not exist on jQuery "+k)}}}};$.fn[k].defaults={continuous:true,offset:0,triggerOnce:false,context:i};$[m]=function(n){if(a[n]){return a[n].apply(this)}else{return a.aggregate()}};$[m].settings={resizeThrottle:200,scrollThrottle:100};e.load(function(){$[m]("refresh")})})(jQuery,"waypoint","waypoints",window);
// Set caret position easily in jQuery
// Written by and Copyright of Luke Morton, 2011
// Licensed under MIT
(function ($) {
    // Behind the scenes method deals with browser
    // idiosyncrasies and such
    $.caretTo = function (el, index) {
        if (el.createTextRange) { 
            var range = el.createTextRange(); 
            range.move("character", index); 
            range.select(); 
        } else if (el.selectionStart != null) { 
            el.focus(); 
            el.setSelectionRange(index, index); 
        }
    };
    
    // Another behind the scenes that collects the
    // current caret position for an element
    
    // TODO: Get working with Opera
    $.caretPos = function (el) {
        if ("selection" in document) {
            var range = el.createTextRange();
            try {
                range.setEndPoint("EndToStart", document.selection.createRange());
            } catch (e) {
                // Catch IE failure here, return 0 like
                // other browsers
                return 0;
            }
            return range.text.length;
        } else if (el.selectionStart != null) {
            return el.selectionStart;
        }
    };

    // The following methods are queued under fx for more
    // flexibility when combining with $.fn.delay() and
    // jQuery effects.

    // Set caret to a particular index
    $.fn.caret = function (index, offset) {
        if (typeof(index) === "undefined") {
            return $.caretPos(this.get(0));
        }
        
        return this.queue(function (next) {
            if (isNaN(index)) {
                var i = $(this).val().indexOf(index);
                
                if (offset === true) {
                    i += index.length;
                } else if (typeof(offset) !== "undefined") {
                    i += offset;
                }
                
                $.caretTo(this, i);
            } else {
                $.caretTo(this, index);
            }
            
            next();
        });
    };

    // Set caret to beginning of an element
    $.fn.caretToStart = function () {
        return this.caret(0);
    };

    // Set caret to the end of an element
    $.fn.caretToEnd = function () {
        return this.queue(function (next) {
            $.caretTo(this, $(this).val().length);
            next();
        });
    };
}(jQuery));
// HTML5 placeholder plugin version 0.3
// Enables cross-browser* html5 placeholder for inputs, by first testing
// for a native implementation before building one.
//
// USAGE: 
//$('input[placeholder]').placeholder();
(function($) {
        $.fn.ellipsis = function()
        {
                return this.each(function()
                {
                        var el = $(this);

                        if(el.css("overflow") == "hidden")
                        {
                                var text = el.html();
                                var multiline = el.hasClass('multiline');
                                var t = $(this.cloneNode(true))
                                        .hide()
                                        .css('position', 'absolute')
                                        .css('overflow', 'visible')
                                        .width(multiline ? el.width() : 'auto')
                                        .height(multiline ? 'auto' : el.height())
                                        ;

                                el.after(t);

                                function height() { return t.height() > el.height(); };
                                function width() { return t.width() > el.width(); };

                                var func = multiline ? height : width;

                                while (text.length > 0 && func())
                                {
                                        text = text.substr(0, text.length - 1);
                                        t.html(text + "...");
                                }

                                el.html(t.html());
                                t.remove();
                        }
                });
        };
})(jQuery);
(function ($) {
    $.fn.placeholder = function (options) {
        return this.each(function () {
            if (!("placeholder" in document.createElement(this.tagName.toLowerCase()))) {
                var $this = $(this), 
                placeholder = $this.attr('placeholder');
                $this.val(placeholder).data('color', $this.css('color')).css('color', '#aaa');
                $this
                .focus(function () {
                        if ($.trim($this.val()) === placeholder) {
                            $this.val('').css('color', $this.data('color'));
                        }
                    }) 
                .blur(function () {
                        if (!$.trim($this.val())) {
                            $this.val(placeholder).data('color', $this.css('color')).css('color', '#aaa');
                        }
                    });
                }
            });
        };
    }
    (jQuery)
);

var menuYloc = null;
var adminCookieExpiry = 365;
var sortableCookie = "sortable-order";
var sortableName = ".sortable";

// perform JavaScript after the document is scriptable.
$(document).ready(function () {
	
	$("input.number").live('keyup', function(e) {
  		$(this).val($(this).val().replace(/[^0-9]/g, ''));
	});
	
	$("input.telephone").live('keyup', function(e) {
  		$(this).val($(this).val().replace(/[^0-9 ]/g, ''));
	});
	
	$("input.email").live('keyup', function(e) {
  		$(this).val($(this).val().toLowerCase());
	});
	
	$(".ellipsis").ellipsis();

	$(".action-scroll-to-bottom").live('click', function() {
		$("html, body").animate({scrollTop: $("#footer").offset().top},'slow');
	});
	/**
     * Setup superfish menu
     */
    if (typeof $("ul.sf-menu").superfish === 'function') {
        $("ul.sf-menu").supersubs({
                minWidth : 15, // minimum width of sub-menus in em units 
                maxWidth : 27, // maximum width of sub-menus in em units 
                extraWidth : 1// extra width can ensure lines don't sometimes turn over 
                // due to slight rounding differences and font-family 
            }).superfish(); // call supersubs first, then superfish, so that subs are 
        // not display:none when measuring. Call before initialising 
        // containing tabs for same reason.
    }
    
    if (typeof prettyPrint === 'function') {
        prettyPrint();
        $('.prettyprint').after('<div class="clear"></div>').hover(function () {
            if ($(this).css('width', 'auto').width() < $(this).parent().width()) {
                $(this).css('width', '100%');
            }
        }, function () {
        });
    }
    // Effects: sliceDownRight,sliceDownLeft,sliceUpRight,sliceUpLeft,sliceUpDown,sliceUpDownLeft,fold,fade,boxRandom,boxRain,boxRainReverse,boxRainGrow,boxRainGrowReverse
    if ($(".slider-gallery").length > 0) {
    	$(".slider-gallery").cycle({
    		speed: 1000,
    		fx:     'scrollRight', 
    		easing: 'easeOutExpo',
    		timeout: 6000,
    		delay: 6000,
    		pause: 1,
    		pager: '#slider_gallery_navigation',
    		random: 0
    	});
    }
     if ($(".slider-products").length > 0) {
    	$(".slider-products").cycle({
    		speed: 1000,
    		fx:     'scrollLeft', 
    		easing: 'easeOutExpo',
    		timeout: 6000,
    		delay: 6000,
    		pause: 1,
    		pager: '#slider_products_navigation',
    		random: 0
    	});
    }
    
     /**
     * Table Sorting, Row Selection and Pagination
     */
    if ($(".display").length > 0) {
        $('.display').dataTable({
                "bJQueryUI" : true,
                "bRetrieve": true, 
                "bDestroy": true,
                "sPaginationType" : "full_numbers"
            });
    }
    
    if ($(".basic-display").length > 0) {
        $('.basic-display').dataTable({
                "bJQueryUI" : true,
                "bSort": false,
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "bRetrieve": true, 
                "bDestroy": true
            }).fnDraw();
    }
	
	initGlobalFunctions();
	
	$(".action-image-popup").live('click', function() {
		loadImagePopup($(this).attr("data-image-large-path"), $(this).attr("alt"), $(this).attr("data-image-size-width"), $(this).attr("data-image-size-height"));
	});
	
	$(".action-delete-image").live('click', function() {
		if (confirm('Are you sure you want to delete this image?'))
		{
			$("#ajax_loading").show();
			var $parent_container = $(this).parent(".image-container");
			$.ajax({
					url: "/system/ajaxDeleteImage/"+$(this).attr("rel"),
					success: function() {
						$parent_container.fadeOut();
						$("#ajax_loading").hide();
					},
					error: function() {
						alert('Sorry, there was a problem deleting this image. Please try again.');
						$("#ajax_loading").hide();
					}
			});
		}
	});
	
	$(".action-delete-multi-image").live('click', function() {
		if (confirm('Are you sure you want to delete this image?'))
		{
			$("#ajax_loading").show();
			var $selected_image = $(this).attr("rel");
			$.ajax({
					url: "/system/ajaxDeleteImage/"+$selected_image,
					success: function() {
						$("#image-f-"+$selected_image).fadeOut(function() {
							$("#image-f-"+$selected_image).remove();
						});
						$("#image-i-"+$selected_image).fadeOut(function() {
							$("#image-i-"+$selected_image).remove();
						});
						$("#ajax_loading").hide();
					},
					error: function() {
						alert('Sorry, there was a problem deleting this image. Please try again.');
						$("#ajax_loading").hide();
					}
			});
		}
	});
	
	$.fx.speeds._default = 1000;
			
	$(".action-fix").live('click', function() {
		$(".sidebar-tabs").tabs("select", $(this).attr("rel"));
		$("html, body").animate({scrollTop: $("#{{ current_tab }}").offset().top},'slow');
	});
	
	$(".sidebar-tabs .ui-tabs-nav li a").click(function() {
		if ($("#form-current-tab"))
		{
			$("#form-current-tab").val($(this).attr("href").replace("#", ""));
		}
	});
	
});

function resetGlobalFunctions()
{
	initGlobalFunctions();
}

function resetMessages()
{
	$("#message-error, #message-notice, #message-success").slideUp();
}

function initGlobalFunctions()
{
        
    /**
     * Buttons
     */
    $('.button').each(function () {
            $(this).button({
                    icons : {
                        primary : $(this).attr('data-icon-primary') ? $(this).attr('data-icon-primary') : null, 
                        secondary : $(this).attr('data-icon-primary') ? $(this).attr('data-icon-secondary') : null
                    }, 
                    text : $(this).attr('data-icon-only') === 'true' ? false : true
                });
        });
    
    
    /**
     * attach calendar to date inputs
     */
    $(":date").datepicker({
        dateFormat : 'dd/mm/yy'
    });
        
    /**
     * Setup the Accordions
     */
    $(".accordion").accordion();
    
    /**
     * Setup the Tabs
     */
    $(".tabs").tabs().find('> .ui-tabs-nav').removeClass('ui-corner-all').addClass('ui-corner-top');
    
    $(".sidebar-tabs").tabs() 
        .addClass('ui-tabs-vertical ui-helper-clearfix') 
        .find('li').removeClass('ui-corner-top').addClass('ui-corner-left') 
        .parents('.sidebar-tabs') 
        .find('.ui-tabs-nav').removeClass('ui-corner-all').addClass('ui-corner-left') 
        .parents('.sidebar-tabs') 
        .find('.ui-tabs-panel').removeClass('ui-corner-bottom').addClass('ui-corner-right');
    
    /**
     * Retrieve portlet state
     */
    var collapsed = [], 
    state = $.cookie && $.cookie('collapsedPortlets') ? $.cookie('collapsedPortlets') : '';
    collapsed = state.split(',');
    
    /**
     * Setup Portlets
     */
    $('.portlet').each(function () {
        var portlet = $(this), 
        id = portlet.attr('id'), 
        isCollapsed = $(this).hasClass('collapsible') && collapsed.includes(id);
        portlet.addClass('ui-widget ui-widget-content ui-corner-all' + (isCollapsed ? ' collapsed' : '')) 
        .find('> header:first') 
        .addClass('ui-widget-header ui-corner-top') 
        .parent() 
        .find('> section:last') 
        .addClass('ui-widget-content ui-corner-bottom') 
        .parent() 
        .filter('.collapsible') 
        .find('> header:first') 
        .append('<a href="#" class="portlet-collapse ui-corner-all" role="button"><span class="' + (isCollapsed ? 'ui-icon ui-icon-circle-plus' : 'ui-icon ui-icon-circle-minus') + '">Expand/Collapse</span></a>') 
        .find('.portlet-collapse').hover(function () {
                $(this).addClass('ui-state-hover');
            }, function () {
                $(this).removeClass('ui-state-hover');
            }) 
        .click(function () {
            if (portlet.hasClass('collapsed')) {
                $('span', this).removeClass('ui-icon-circle-plus').addClass('ui-icon-circle-minus');
                portlet.removeClass('collapsed').find('> section').css('display', 'none').slideDown(500, 'easeOutExpo');
                if (collapsed.includes(id)) {
                    collapsed.remove(id);
                    saveCollapsed(collapsed);
                }
            } else {
                $('span', this).removeClass('ui-icon-circle-minus').addClass('ui-icon-circle-plus');
                $(this).parent().next().slideUp(500, 'easeOutExpo', function () {
                        portlet.addClass('collapsed');
                        if (!collapsed.includes(id)) {
                            collapsed.push(id);
                            saveCollapsed(collapsed);
                        }
                    });
            }
            return false;
        });
    });
    
    /**
     * Textbox Placeholder
     */
    $('input[placeholder]').placeholder();
    
    /**
     * Toolbar Buttons
     */
    $(".buttonset input").addClass('no-uniform');
    $(".buttonset").addClass('ui-corner-all').buttonset();
    
    /**
     * Skin select, file, checkbox and radio input elements
     */
    $(":checkbox:not(.no-uniform), :radio:not(.no-uniform), select:not(.no-uniform), :file:not(.no-uniform)").uniform();
    
    /**
     * Skin Sliders
     */
    $(":range").each(function () {
        var range = this, 
        opts = {
            animate : true, 
            value : $(this).val(), 
            min : $(this).attr('min') ? parseInt($(this).attr('min'), 10) : 0, 
            max : $(this).attr('max') ? parseInt($(this).attr('max'), 10) : 100, 
            step : $(this).attr('step') ? parseInt($(this).attr('step'), 10) : 1, 
            disabled : $(this).is(':disabled'), 
            orientation : $(this).attr('data-orientation') === 'vertical' ? 'vertical' : 'horizontal', 
            range : $(this).attr('data-range') === "true" ? true : ($(this).attr('data-range')in{
                    min : 1, 
                    max : 1
                }
                 ? $(this).attr('data-range') : false), 
            values : $(this).attr('data-values') ? $(this).attr('data-values').split(/,/) : null, 
            slide : function (event, ui) {
                $(range).val(ui.value);
                if ($(range).attr('data-values')) {
                    $(range).attr('data-values', ui.values[0] + ',' + ui.values[1]);
                }
                $(range).change();
            }
        }, 
        slider = $('<div class="slider"></div>').slider(opts);
        $(this).before(slider).hide();
    });
    
    /**
     * setup progress bars
     */
    $(".progress").each(function () {
        var val = parseInt($(this).attr("data-value"), 10);
        $(this).progressbar({
                value : val
            }).filter('[data-show-value=true]').find('div').append('<b>' + val + '%</b>');
    });
    
    /**
     * add close buttons to closeable message boxes
     */
    $(".message.closeable").prepend('<span class="message-close ui-icon ui-icon-circle-close"></span>') 
    .find('.message-close') 
    .click(function () {
        $(this).parent().slideUp();
    });
    
    $("#message-error, #message-notice, #message-success").live('click', function() {
    	$(this).slideUp();
    });
    
    /**
     * html element for the help popup
     */
    $('body').append('<div class="apple_overlay black" id="overlay"><iframe class="contentWrap" style="width: 100%; height: 500px"></iframe></div>');
    
    /**
     * this is the help popup
     */
    $("a.help[rel]").overlay({
        
        effect : 'apple', 
        
        onBeforeLoad : function () {
            
            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");
            
            // load the page specified in the trigger
            wrap.attr('src', this.getTrigger().attr("href"));
        }
        
    });
    
    $("input.seo-url").live('keyup', function() {
    	var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toLowerCase());
		$(this).val($(this).val().replace(/[ ]/g,'-'));
		$(this).val($(this).val().replace(/[^a-z0-9-]/g,''));
    	$(this).caret($currentCaretPosition);
	});
	$("input.uppercase").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toUpperCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.postcode").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toUpperCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.lowercase").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toLowerCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.integer").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
		$(this).val($(this).val().replace(/[^0-9]/g,''));
		$(this).caret($currentCaretPosition);
	});
	$("input.decimal").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
		$(this).val($(this).val().replace(/[^0-9.]/g,''));
		$(this).caret($currentCaretPosition);
	});
	$("input.url").live('keyup', function() {
		var $currentCaretPosition = $(this).caret();
		$(this).val($(this).val().toLowerCase());
		$(this).val($(this).val().replace(/[ ]/g,'-'));
		$(this).val($(this).val().replace(/[^a-z0-9-.?+=&://]/g,''));
		if ($(this).val().substring(0, 7) != 'http://')
		{
			$(this).val('http://'+$(this).val());
		}
		$(this).caret($currentCaretPosition);
	});
    
    /**
     * Form Validators
     */
    // Regular Expression to test whether the value is valid
    $.tools.validator.fn("[type=time]", "Please supply a valid time.", function (input, value) {
        return(/^\d\d:\d\d$/).test(value);
    });
    
    $.tools.validator.fn("[data-equals]", "The value you entered is not equal with the value entered in the $1 field.", function (input) {
        var name = input.attr("data-equals"), 
        field = this.getInputs().filter("[name=" + name + "]");
        return input.val() === field.val() ? true : [name];
    });
    
    $.tools.validator.fn("[minlength]", function (input, value) {
        var min = input.attr("minlength");
        
        return value.length >= min ? true : {
            en : "Please provide at least " + min + " character" + (min > 1 ? "s" : "") +"."
        };
    });
    
    $.tools.validator.fn("[data-validation-type=postcode]", "Enter a valid postcode.", function (input, value) {
    	if (value != '')
    	{
    		value = value.toUpperCase();
        	return(/^(000|GIR ?0AA|(?:[A-PR-UWYZ](?:\d|\d{2}|[A-HK-Y]\d|[A-HK-Y]\d\d|\d[A-HJKSTUW]|[A-HK-Y]\d[ABEHMNPRV-Y])) ?\d[ABD-HJLNP-UW-Z]{2})$/).test(value);
        }
        return true;
    });
    
    $.tools.validator.fn("[data-validation-type=telephone]", "Enter a valid telephone.", function (input, value) {
        if (value != '')
    	{
        	return(/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/).test(value);
        }
        return true;        
    });
    $.tools.validator.fn("[data-validation-type=telephone-gb]", "Enter a valid telephone.", function (input, value) {
        if (value != '')
    	{
        	return(/((\+44\s?\(0\)\s?\d{2,4})|(\+44\s?(01|02|03|07|08)\d{2,3})|(\+44\s?(1|2|3|7|8)\d{2,3})|(\(\+44\)\s?\d{3,4})|(\(\d{5}\))|((01|02|03|07|08)\d{2,3})|(\d{5}))(\s|-|.)(((\d{3,4})(\s|-)(\d{3,4}))|((\d{6,7})))/).test(value);
        }
        return true;        
    });
    
    $.tools.validator.fn("[data-validation-type=telephone-ie]", "Enter a valid telephone.", function (input, value) {
        if (value != '')
    	{
        	return(/|^\s*\(?\s*\d{1,4}\s*\)?\s*[\d\s]{5,10}\s*$|/).test(value);
        }
        return true;        
    });
    
    $.tools.validator.fn("[data-validation-type=mobile]", "Enter a valid mobile.", function (input, value) {
        if (value != '')
    	{
      		return(/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/).test(value);
        }
        return true;
    });
    
    $.tools.validator.localizeFn("[type=time]", {
        en : 'Please supply a valid time.'
    });
    
    $.tools.validator.localize("en", {
		':email'  		: 'The email address you have entered is not valid.',
		':number' 		: 'Please enter a number only.',
		':url' 			: 'Please enter a valid web address. The web address must start with "http://"',
		'[max]'	 		: 'The value you enter must not be bigger than $1.',
		'[min]'	 		: 'The value you enter must not be less than $1.',
		'[required]' 	: 'This field is required. Please enter a value.'
});
    
    /**
     * setup the validators
     */
    $(".has-validation").validator({
        position : 'center right', 
        offset : [0, -250], 
        messageClass : 'form-error', 
        errorInputEvent: 	'blur',
        inputEvent: 	'keyup',
        message : '<div><span class="ui-icon ui-icon-closethick"></span></div>'// em element is the arrow
    }).attr('novalidate', 'novalidate');
    
    
    /**
     * Fieldsets
     */
    $('fieldset.fieldset-buttons > legend').each(function () {
        $(this).css({
            marginLeft : (Math.round($(this).parent().width() / 2) - Math.round($(this).width() / 2)) + "px"
        });
    });
    
    /**
     * Main Content Resized
     */
    $('.main-content').resize(function () {
        (typeof $('.isotope').isotope === 'function') && $('.isotope').isotope();
        $('fieldset.fieldset-buttons > legend').each(function () {
            $(this).css({
                    marginLeft : (Math.round($(this).parent().width() / 2) - Math.round($(this).width() / 2)) + "px"
                });
            });
    });
    
    /**
     * Navigation
     */
    if ($.cookie) {
        if ($.cookie('menuCollapsed') === '1') {
            $('.main-section > nav').addClass('collapsed').find('a.chevron').append('<span class="ui-icon ui-icon-circle-triangle-e"></span>');
            $('.main-content').resize();
        } else if ($.cookie('menuCollapsed') === '0') {
            $('.main-section > nav').removeClass('collapsed').find('a.chevron').append('<span class="ui-icon ui-icon-circle-triangle-w"></span>');
            $('.main-content').resize();
        } else {
			if ($('.main-section > nav').hasClass('collapsed')) {
	            $('.main-section > nav').find('a.chevron').append('<span class="ui-icon ui-icon-circle-triangle-e"></span>');
			} else {
	            $('.main-section > nav').find('a.chevron').append('<span class="ui-icon ui-icon-circle-triangle-e"></span>');
			}
		}
    }
    
    $('.main-section > nav a.chevron').click(function () {
        if ($(this).parent().toggleClass('collapsed').hasClass('collapsed')) {
            $('span', this).removeClass('ui-icon-circle-triangle-w').addClass('ui-icon-circle-triangle-e');
            $.cookie && $.cookie('menuCollapsed', '1', {
                expires : adminCookieExpiry, 
                path : "/"
            });
        } else {
            $('span', this).removeClass('ui-icon-circle-triangle-e').addClass('ui-icon-circle-triangle-w');
            $.cookie && $.cookie('menuCollapsed', '0', {
                expires : adminCookieExpiry, 
                path : "/"
            });
        }
        $('.main-content').resize();
        
        return false;
    });
    
    if ($(sortableName).sortable) {
        $(sortableName).sortable({
            cursor : 'move', 
            revert : 500, 
            opacity : 0.7, 
            appendTo : 'body', 
            handle : 'header', 
            items : '[draggable=true]', 
            placeholder : 'portlet-placeholder grid_2', 
            forcePlaceholderSize : true, 
            update : function (event, ui) {
                $.cookie && $.cookie(sortableCookie, $(this).sortable("toArray"), {
                        expires : adminCookieExpiry, 
                        path : "/"
                    });
            }
        }).disableSelection();
    }
    
    $("textarea.tinymce-basic, textarea.tinymce-advanced").css("width", "100%");
    //$("textarea").autogrow();
    
    if ($("textarea.tinymce-basic").length > 0)
    {
	    $('textarea.tinymce-basic').tinymce({
			script_url : '/bundles/webilluminationadmin/js/tinymce/tiny_mce.js',
			theme : "advanced",
			plugins : "contextmenu,paste,fullscreen,xhtmlxtras,advlist",
	
			theme_advanced_buttons1 : "fullscreen,pasteword,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,
			content_css : "/bundles/webilluminationadmin/css/content.css"
		});
	}
	
	if ($("textarea.tinymce-advanced").length > 0)
    {
		$('textarea.tinymce-advanced').tinymce({
			script_url : '/bundles/webilluminationadmin/js/tinymce/tiny_mce.js',
			theme : "advanced",
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,
			content_css : "/bundles/webilluminationadmin/css/content.css"
		});
	}
	
	$("input.show-tinymce").change(function(){
        if ($(this).val()==='1') {
            $($(this).attr("rel")).tinymce().show();
        } else {
            $($(this).attr("rel")).tinymce().hide();
        }
    });
    
    /**
     * restore the order of sortable widgets
     */
    $.cookie && restoreOrder(sortableName, sortableCookie);
    
    /**
     * restore saved background
     */
    $.cookie && $.cookie('background') && changeBackground($.cookie('background'));
    
    /**
     * restore saved css
     */
    $.cookie && $.cookie('css') && changeUicolor($.cookie("css"));
}

// Loads the image popup
function loadImagePopup(src, alt, width, height)
{
	if (alt == "")
	{
		alt = "Detailed View";
	}
	$("#dialog-image-popup-image").attr("src", src).attr("alt", alt).attr("width", width).attr("height", height);
	$("#dialog-image-popup").dialog({
		autoOpen: false,
		autoResize: true,
		width: "auto",
		height: "auto",
		modal: true,
		show: "fade",
		hide: "fade"
	}).parents('.ui-dialog').find(".ui-dialog-titlebar-close").after('<div/>');
	$("#ui-dialog-title-dialog-image-popup").html(alt);
	$("#dialog-image-popup").dialog("open");
}

/**
 * Restores the sortable order from a cookie
 */
function restoreOrder(sortable, cookieName) {
    var list = $(sortable);
    if (!list) {
        return;
    }
    
    // fetch the saved cookie
    var cookie = $.cookie(cookieName);
    if (!cookie) {
        return;
    }
    
    // create array from cookie
    var IDs = cookie.split(","), 
    
    // fetch current order
    items = list.sortable("toArray"), 
    
    // create associative array from current order
    current = [];
    for (var v = 0; v < items.length; v++) {
        current[items[v]] = items[v];
    }
    
    for (var i = 0, n = IDs.length; i < n; i++) {
        // item id from saved order
        var itemID = IDs[i];
        
        if (itemID in current) {
            // select the item according to the saved order and reappend it to the list
            $(sortable).append($(sortable).children("#" + itemID));
        }
    }
}

function saveCollapsed(collapsed) {
    $.cookie && $.cookie('collapsedPortlets', collapsed, {
        expires : adminCookieExpiry, 
        path : "/"
    });
}

function changeBackground(newBackground) {
    $('body').removeClass($.cookie('background')).addClass(newBackground);
    $.cookie && $.cookie('background', newBackground, {
        expires : adminCookieExpiry, 
        path : "/"
    });
}

function changeUicolor(newcss) {
    $('link.uicolor').attr('href', newcss);
    $.cookie && $.cookie('css', newcss, {
        expires : adminCookieExpiry, 
        path : "/"
    });
}

/**
 * Custom jQuery Tools Overlay Effect, thanks to the great guys at flowplayer.org :)
 */
// create custom animation algorithm for jQuery called "drop" 
$.easing.drop = function (x, t, b, c, d) {
    return - c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
};

// loading animation
$.tools.overlay.addEffect("drop", function (css, done) {
    
    // use Overlay API to gain access to crucial elements
    var conf = this.getConf(), 
    overlay = this.getOverlay();
    
    // determine initial position for the overlay
    if (conf.fixed) {
        css.position = 'fixed';
    } else {
        css.top += $(window).scrollTop();
        css.left += $(window).scrollLeft();
        css.position = 'absolute';
    }
    
    // position the overlay and show it
    overlay.css(css).show();
    
    // begin animating with our custom easing
    overlay.animate({
            top : '+=55', 
            opacity : 1, 
            width : '+=20'
        }, 400, 'drop', done);
    
    /* closing animation */
}, function (done) {
    this.getOverlay().animate({
            top : '-=55', 
            opacity : 0, 
            width : '-=20'
        }, 300, 'drop', function () {
            $(this).hide();
            done.call();
        });
});

/**
 * Utility functions
 */
if (!Array.indexOf) {
    Array.prototype.indexOf = function (obj) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] === obj) {
                return i;
            }
        }
        return - 1;
    };
}
Array.prototype.includes = function (value) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] === value) {
            return true;
        }
    }
    return false;
};
Array.prototype.remove = function (value) {
    var i = this.indexOf(value);
    if (i !== -1) {
        this.splice(i, 1);
    }
};
function ajaxFlashMessage(type, message)
{
	if (type == 'success') {
		$("#flash_messages").html('<div class="ui-widget message closeable"><div class="ui-state-success ui-corner-all"><p><span class="ui-icon ui-icon-circle-check"></span><strong>SUCCESS:</strong> '+message+'</p></div></div>');
	} else if (type == 'error') {
		$("#flash_messages").html('<div class="ui-widget message closeable"><div class="ui-state-error ui-corner-all"><p><span class="ui-icon ui-icon-alert"></span><strong>ERROR:</strong> '+message+'</p></div></div>');
	} else {
		$("#flash_messages").html('<div class="ui-widget message closeable"><div class="ui-state-highlight ui-corner-all"><p><span class="ui-icon ui-icon-info"></span><strong>NOTICE:</strong> '+message+'</p></div></div>');
	}
	$(".message.closeable").prepend('<span class="message-close ui-icon ui-icon-circle-close"></span>').find(".message-close").click(function() {
		$(this).parent().fadeOut(function() {
        	$(this).remove();
        });
    });
}
