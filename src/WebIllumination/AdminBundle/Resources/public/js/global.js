(function($,k,m,i,d){var e=$(i),g="waypoint.reached",b=function(o,n){o.element.trigger(g,n);if(o.options.triggerOnce){o.element[k]("destroy")}},h=function(p,o){if(!o){return -1}var n=o.waypoints.length-1;while(n>=0&&o.waypoints[n].element[0]!==p[0]){n-=1}return n},f=[],l=function(n){$.extend(this,{element:$(n),oldScroll:0,waypoints:[],didScroll:false,didResize:false,doScroll:$.proxy(function(){var q=this.element.scrollTop(),p=q>this.oldScroll,s=this,r=$.grep(this.waypoints,function(u,t){return p?(u.offset>s.oldScroll&&u.offset<=q):(u.offset<=s.oldScroll&&u.offset>q)}),o=r.length;if(!this.oldScroll||!q){$[m]("refresh")}this.oldScroll=q;if(!o){return}if(!p){r.reverse()}$.each(r,function(u,t){if(t.options.continuous||u===o-1){b(t,[p?"down":"up"])}})},this)});$(n).bind("scroll.waypoints",$.proxy(function(){if(!this.didScroll){this.didScroll=true;i.setTimeout($.proxy(function(){this.doScroll();this.didScroll=false},this),$[m].settings.scrollThrottle)}},this)).bind("resize.waypoints",$.proxy(function(){if(!this.didResize){this.didResize=true;i.setTimeout($.proxy(function(){$[m]("refresh");this.didResize=false},this),$[m].settings.resizeThrottle)}},this));e.load($.proxy(function(){this.doScroll()},this))},j=function(n){var o=null;$.each(f,function(p,q){if(q.element[0]===n){o=q;return false}});return o},c={init:function(o,n){this.each(function(){var u=$.fn[k].defaults.context,q,t=$(this);if(n&&n.context){u=n.context}if(!$.isWindow(u)){u=t.closest(u)[0]}q=j(u);if(!q){q=new l(u);f.push(q)}var p=h(t,q),s=p<0?$.fn[k].defaults:q.waypoints[p].options,r=$.extend({},s,n);r.offset=r.offset==="bottom-in-view"?function(){var v=$.isWindow(u)?$[m]("viewportHeight"):$(u).height();return v-$(this).outerHeight()}:r.offset;if(p<0){q.waypoints.push({element:t,offset:null,options:r})}else{q.waypoints[p].options=r}if(o){t.bind(g,o)}if(n&&n.handler){t.bind(g,n.handler)}});$[m]("refresh");return this},remove:function(){return this.each(function(o,p){var n=$(p);$.each(f,function(r,s){var q=h(n,s);if(q>=0){s.waypoints.splice(q,1);if(!s.waypoints.length){s.element.unbind("scroll.waypoints resize.waypoints");f.splice(r,1)}}})})},destroy:function(){return this.unbind(g)[k]("remove")}},a={refresh:function(){$.each(f,function(r,s){var q=$.isWindow(s.element[0]),n=q?0:s.element.offset().top,p=q?$[m]("viewportHeight"):s.element.height(),o=q?0:s.element.scrollTop();$.each(s.waypoints,function(u,x){if(!x){return}var t=x.options.offset,w=x.offset;if(typeof x.options.offset==="function"){t=x.options.offset.apply(x.element)}else{if(typeof x.options.offset==="string"){var v=parseFloat(x.options.offset);t=x.options.offset.indexOf("%")?Math.ceil(p*(v/100)):v}}x.offset=x.element.offset().top-n+o-t;if(x.options.onlyOnScroll){return}if(w!==null&&s.oldScroll>w&&s.oldScroll<=x.offset){b(x,["up"])}else{if(w!==null&&s.oldScroll<w&&s.oldScroll>=x.offset){b(x,["down"])}else{if(!w&&s.element.scrollTop()>x.offset){b(x,["down"])}}}});s.waypoints.sort(function(u,t){return u.offset-t.offset})})},viewportHeight:function(){return(i.innerHeight?i.innerHeight:e.height())},aggregate:function(){var n=$();$.each(f,function(o,p){$.each(p.waypoints,function(q,r){n=n.add(r.element)})});return n}};$.fn[k]=function(n){if(c[n]){return c[n].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof n==="function"||!n){return c.init.apply(this,arguments)}else{if(typeof n==="object"){return c.init.apply(this,[null,n])}else{$.error("Method "+n+" does not exist on jQuery "+k)}}}};$.fn[k].defaults={continuous:true,offset:0,triggerOnce:false,context:i};$[m]=function(n){if(a[n]){return a[n].apply(this)}else{return a.aggregate()}};$[m].settings={resizeThrottle:200,scrollThrottle:100};e.load(function(){$[m]("refresh")})})(jQuery,"waypoint","waypoints",window);
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

// Return a helper with preserved width of cells
var fixWidthHelper = function(e, ui) {
	ui.children().each(function() {
		$(this).width($(this).width());
	});
	return ui;
};

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

function resetMessages()
{
	$("#message-error, #message-notice, #message-success").slideUp();
}

function checkFloatingButtons()
{
	if ($("#float-buttons-content").length > 0)
	{
		$("#float-buttons-content").removeClass("float-buttons-sticky");
		var $floatButtonsContentMaximumOffset = $("#float-buttons-content").offset().top + $("#float-buttons-content").outerHeight() - $(window).scrollTop();
		if ($floatButtonsContentMaximumOffset > $(window).height())
		{
			$("#float-buttons-content").addClass("float-buttons-sticky");
		} else {
			$("#float-buttons-content").removeClass("float-buttons-sticky");
		}
	}
}

function checkMaximumCharcaters($object, $maximumCharacters)
{
	if ($object)
	{
		var $value = $object.val();
		var $returnMessage = '';
		var $charactersLeft = 0;
		if ($value.length <= $maximumCharacters)
		{
			$charactersLeft = $maximumCharacters - $value.length;
			$returnMessage = '<strong>Max Characters:</strong> ' + $maximumCharacters + ' (You have <strong class="green">' + $charactersLeft + '</strong> character';
			if ($charactersLeft != 1)
			{
				$returnMessage = $returnMessage + 's';
			}
			$returnMessage = $returnMessage + ' remaining)';
		} else {
			$charactersLeft = $value.length - $maximumCharacters;
			$returnMessage = '<strong>Max Characters:</strong> ' + $maximumCharacters + ' (You have used <strong class="red">' + $charactersLeft + '</strong> character';
			if ($charactersLeft != 1)
			{
				$returnMessage = $returnMessage + 's';
			}
			$returnMessage = $returnMessage + ' too many)';
		}
		return $returnMessage;
	}
	return '';
}

$(window).load(function(){
	$("#loading").fadeOut(function(){
    	$(this).remove();
    	$("body").removeAttr("style");
    });
    
	var $actionButtonsWidth = 0;
	if ($("td.buttons-container:eq(0) .button").length > 0)
	{
		$("td.buttons-container:eq(0) .button").each(function() {
			$actionButtonsWidth = $actionButtonsWidth + $(this).outerWidth(true) + 1;
		});
	}
	if ($actionButtonsWidth > 0)
	{
		$actionButtonsWidth = $actionButtonsWidth - 2;
		$(".buttons-spacer").width($actionButtonsWidth).attr("width", $actionButtonsWidth);
	}
	
	checkFloatingButtons();
		
	if ($("#update-listing-filter-empty") && $("#listing"))
	{
		if ($("#update-listing-filter-empty").val() < 1)
		{
			$("html, body").animate({scrollTop: $("#listing").offset().top - 20}, 'slow');
		}
	}
	
	if ($("#wrapper section.main-section nav ul li").length > 0)
	{
		var $minimumHeight = 20;
		if ($("#wrapper section.main-section nav ul li").length > 0)
		{
			$("#wrapper section.main-section nav ul li").each(function() {
				$minimumHeight = $minimumHeight + parseInt($(this).outerHeight(true));
			});
		}
		$("#wrapper section.main-section nav").css("min-height", $minimumHeight);
		$("#wrapper section.main-section div.main-content").css("min-height", $("#wrapper section.main-section nav").outerHeight(true));
	}
	
	$(".preview-list table tr:odd:not(.no-row-colour)").addClass("odd");
	$("table.data-table > tbody > tr:odd:not(.no-row-colour)").addClass("odd");
	
	if ($(".tooltip-preview-left").length > 0)
	{
		$(".tooltip-preview-left").each(function() {
			var $tooltipObject = $($(this).attr("data-tooltip-id"));
			var $tooltipHeight = $tooltipObject.outerHeight(true);
			var $tooltipWidth = $tooltipObject.outerWidth(true);
			var $tooltipTriggerPosition = $(this).position();
			var $tooltipTriggerWidth = $(this).outerWidth(true);
			var $tooltipTriggerHeight = $(this).outerHeight(true);
			var $tooltipTop = parseInt($tooltipTriggerPosition.top - (($tooltipHeight - $tooltipTriggerHeight) / 2));
			if (($("#listing").offset().top + $tooltipTop) < ($(window).scrollTop() + 10))
		{
			$tooltipTop = $tooltipTop + (($(window).scrollTop() + 10) - ($("#listing").offset().top + $tooltipTop));
		} else if (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) > ($(window).outerHeight(true) + $(window).scrollTop())) {
			$tooltipTop = $tooltipTop - (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) - ($(window).outerHeight(true) + $(window).scrollTop()));
		}
			var $tooltipLeft = parseInt($tooltipTriggerPosition.left + $tooltipTriggerWidth + 6);
			var $mainSectionWidth = parseInt($(".main-section").outerWidth(true));
			var $maximumWidth = $mainSectionWidth - $tooltipLeft - 200;
			if ($tooltipWidth > $maximumWidth)
			{
				$tooltipObject.css({width: $maximumWidth, top: $tooltipTop, left: $tooltipLeft});
			} else {
				$tooltipObject.css({ top: $tooltipTop, left: $tooltipLeft});
			}
		});
	}
	if ($(".tooltip-preview-right").length > 0)
	{
		$(".tooltip-preview-right").each(function() {
			var $tooltipObject = $($(this).attr("data-tooltip-id"));
			var $tooltipHeight = $tooltipObject.outerHeight(true);
			var $tooltipWidth = $tooltipObject.outerWidth(true);
			var $tooltipTriggerPosition = $(this).position();
			var $tooltipTriggerWidth = $(this).outerWidth(true);
			var $tooltipTriggerHeight = $(this).outerHeight(true);
			var $tooltipTop = parseInt($tooltipTriggerPosition.top - (($tooltipHeight - $tooltipTriggerHeight) / 2));
			if ($tooltipTop < 10)
			{
				$tooltipTop = 10;
			}
			var $tooltipLeft = parseInt($tooltipTriggerPosition.left - $tooltipWidth - 6);
			var $mainSectionWidth = parseInt($(".main-section").outerWidth(true));
			var $maximumWidth = $tooltipTriggerPosition.left - 206;
			if ($tooltipWidth > $maximumWidth)
			{
				$tooltipObject.css({width: $maximumWidth, top: $tooltipTop, left: $tooltipLeft});
			} else {
				$tooltipObject.css({ top: $tooltipTop, left: $tooltipLeft});
			}
		});
	}
	
	if ($(".sidebar-tabs").length > 0)
	{
		$(".sidebar-tabs").each(function() {
			var $panelHeight = 0;
			$(this).find("ul li").each(function() {
				$panelHeight = $panelHeight + parseInt($(this).outerHeight(true));
			});
			$panelHeight = $panelHeight - 15;
			if ($panelHeight > $(this).find("section").outerHeight(true))
			{
				$(this).find("section").height($panelHeight);
			}
		});
	}
	
	if ($("a.auto-click").length > 0)
	{
		$("#ajax_loading").show();
		window.setTimeout(function() {
			$("a.auto-click")[0].click();
			$("#ajax_loading").hide();
		}, 5000);	
	}
});

function resetFromValidation()
{
	$(".has-validation").validator({
        position : 'center right', 
        offset : [0, -250], 
        messageClass : 'form-error', 
        errorInputEvent: 	'blur',
        inputEvent: 	'keyup',
        message : '<div><em/></div>'// em element is the arrow
    }).attr('novalidate', 'novalidate');
}

function addFormRow()
{
	$("#add input, #add textarea, #add select").removeClass("invalid");
	$(".form-error").remove();
	$(".action-select-add").attr("checked", false);
	$(".action-select-add").parent().removeClass("checked");
	$("tr.item-add").removeClass("selected");
	$("#data-add > tbody > tr:first").clone().appendTo("#data-add > tbody");
	$("#data-add > tbody > tr:last input, #data-add > tbody > tr:last textarea, #data-add > tbody > tr:last select").each(function() {
		$(this).removeClass("no-uniform");
		$(this).attr("id", $(this).attr("data-id")+"-"+$("#data-add > tbody > tr").length);
		$(this).attr("name", $(this).attr("data-name")+"["+$("#data-add > tbody > tr").length+"]");
	});
	$("#data-add > tbody > tr:last input[data-add-required='required'], #data-add > tbody > tr:last textarea[data-add-required='required'], #data-add > tbody > tr:last select[data-add-required='required']").removeAttr("data-add-required").attr("required", "required");
	$("#data-add > tbody > tr:last :checkbox, #data-add > tbody > tr:last :radio, #data-add > tbody > tr:last select, #data-add > tbody > tr:last :file").uniform();
	$.uniform.update();
	resetFromValidation();
	$("#data-add > tbody > tr:last").removeClass("ui-helper-hidden");
	$("#data-add > tbody > tr:last").removeAttr("id");
	$("#data-add tr").removeClass("odd");
	$("#data-add tr:odd").addClass("odd");
}

function updateResults()
{
	$("#ajax_loading").show();
	$("#update-listing-date-from").val($("#filter-date-from").val());
	$("#update-listing-date-from-formatted").val($("#filter-date-from-formatted").val());
	$("#update-listing-date-to").val($("#filter-date-to").val());
	$("#update-listing-date-to-formatted").val($("#filter-date-to-formatted").val());
	$(".filter-text-box").each(function() {
		$("#"+$(this).attr("data-update-object")).val($(this).val());
	});
	$("#listing-filter td.checkboxes").each(function() {
		$(this).find("input[type='checkbox']:eq(0)").each(function() {
			var $checkBoxValues = new Array();
			$("#listing-filter input[type='checkbox'][data-update-object='"+$(this).attr("data-update-object")+"']").each(function(index) {
				if ($(this).is(":checked"))
				{
					$checkBoxValues[$checkBoxValues.length] = $(this).attr("data-filter-value");
				}
			});
			if ($checkBoxValues.length > 0)
			{
				$("#"+$(this).attr("data-update-object")).val("|"+$checkBoxValues.join("|")+"|");
			} else {
				$("#"+$(this).attr("data-update-object")).val("");
			}			
		});
	});
	$("#update-listing-current-page").val("1");
	$("#update-listing-filter-empty").val("0");
	$("#form-update-listing").submit();
}

function updateFlatSortableList($flatSortableListObjectName)
{
	var $flatSortableListObject = $("#flat-sortable-list-"+$flatSortableListObjectName);
	var $flatSortableListValuesObject = $("input.flat-sortable-list-values[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']");
	var $selectObject = $("select.flat-sortable-list-parts[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']");
	var $freeTextObject = $("input.free-text[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']");
	var $values = new Array();
	if ($flatSortableListObject.find("li").length > 0)
	{
		$flatSortableListObject.find("li").each(function() {
			if ($(this).attr("data-value"))
			{
				$values[$values.length] = $(this).attr("data-value");
			}
		});
		$flatSortableListValuesObject.val($values.join("^"));
	}
	$freeTextObject.val("");
	$freeTextObject.attr("disabled", "disabled");
	$selectObject.find("option:selected").removeAttr("selected");
	$selectObject.find("option:first").attr("selected", "selected");
	$selectObject.parent().find("span:first").html($selectObject.find("option:first").text());
}

// perform JavaScript after the document is scriptable.
$(document).ready(function () {
	
	$("#ajax_loading").hide();
	
	if ($(".floating-buttons-toolbar"))
	{
		$("body").css("padding-bottom", $(".floating-buttons-toolbar").outerHeight(true)+"px");
	}
	
	
	$("nav li").each(function () {
	    var $dataNotification = $(this).attr("data-notification");
	    if (($(this).attr("data-notification") != "") && ($(this).attr("data-notification") != undefined))
	    {
	    	$(this).append('<div class="button-notification">'+$(this).attr("data-notification")+'</div>');
	    }
    });
	
	$.waypoints.settings.scrollThrottle = 20;
	if ($("#float-buttons"))
	{
		$("#float-buttons").waypoint(function(event, direction) {
		    $("#float-buttons-content").toggleClass("float-buttons-sticky", direction === "up");
		}, {offset: function() {
		      return $.waypoints("viewportHeight") - $(this).outerHeight();
		}});
	}
	
	$(".form-element .info-message-icon, .form-element .info-message-icon-left, .form-element .info-message-icon-right").live('mouseenter', function() {
		var $helpMessage = $(this).attr("data-help-container");
		$("#form-help-"+$helpMessage).slideDown();
	});
	$(".form-help").live('mouseleave', function() {
		$(this).slideUp();
	});
	
	$("form:not(.has-validation)").submit(function() {
		$("#ajax_loading").show();
	});
	
	if ($("#update-listing-pagination"))
	{
		var $pagination = parseInt($("#update-listing-pagination").val());
		if ($pagination > 5)
		{
			var $currentPage = parseInt($("#update-listing-current-page").val());
			var $pageNumbersDisplayed = 1;
			var $pageNumbersToDisplay = 5;
			$("li.page-navigation").hide();
			$("li.page-navigation[data-page='"+$currentPage.toString()+"']").show();
			for (var $pageRound = 1; $pageRound < 6; $pageRound++)
			{
				var $previousPage = $currentPage - $pageRound;
				var $nextPage = $currentPage + $pageRound;
				if ($("li.page-navigation[data-page='"+$previousPage.toString()+"']").length > 0)
				{
					if ($pageNumbersDisplayed < $pageNumbersToDisplay)
					{
						$("li.page-navigation[data-page='"+$previousPage.toString()+"']").show();
						$pageNumbersDisplayed++;
					}
				}
				if ($("li.page-navigation[data-page='"+$nextPage.toString()+"']").length > 0)
				{
					if ($pageNumbersDisplayed < $pageNumbersToDisplay)
					{
						$("li.page-navigation[data-page='"+$nextPage.toString()+"']").show();
						$pageNumbersDisplayed++;
					}
				}
			}
		}
	}
	$(".page-navigation").live('click', function() {
		$("#ajax_loading").show();
		$("#update-listing-current-page").val(parseInt($(this).attr("data-page")));
		$("#form-update-listing").submit();
	});
	$("#listing-sort-order").live('change', function() {
		$("#ajax_loading").show();
		$("#update-listing-sort-order").val($(this).val());
		$("#update-listing-current-page").val("1");
		$("#form-update-listing").submit();
	});
	$("#listing-max-results").live('change', function() {
		$("#ajax_loading").show();
		$("#update-listing-max-results").val(parseInt($(this).val()));
		$("#update-listing-current-page").val("1");
		$("#form-update-listing").submit();
	});
	
	$("select.filter-listing").live('change', function() {
		$("#ajax_loading").show();
		var $listingObjectName = $(this).attr("data-listing-object");
		var $listingObject = $("#listing-"+$listingObjectName);
		var $listingTitle = $(this).attr("data-listing-title");
		var $listingTitleObject = $("#listing-title-"+$listingObjectName);
		var $filterName = $(this).attr("data-filter");
		var $filterValue = $(this).val();
		$listingObject.find("tbody:eq(0) > tr").each(function() {
			var $rowObject = $(this);
			$rowObject.show();
			var $rowHidden = false;
			var $valueFound = false;
			if ($filterValue)
			{
				if ($rowObject.attr("data-"+$filterName) != $filterValue)
				{
					$rowHidden = true;
				}
			}
			if (!$rowHidden)
			{
				if ($listingObject.find(".quick-filter:eq(0)").length > 0)
				{
					var $quickFilterValue = $listingObject.find(".quick-filter:eq(0)").val();
					$(this).find(".filterable").each(function() {
						$searchValue = $(this).html();
						if ($searchValue.toLowerCase().indexOf($quickFilterValue.toLowerCase()) > -1)
						{
							$valueFound = true;
						}
					});
				} else {
					$valueFound = true;
				}
			}
			if (!$valueFound)
			{
				$(this).hide();
			}
		});
		if ($listingTitle && $listingTitleObject)
		{
			$listingTitleObject.html($listingTitle+" ("+$listingObject.find("tbody:eq(0) > tr:visible").length+")");
		}
		$(".action-select-all").attr("checked", false);
		$(".action-select-all").parent().removeClass("checked");
		$("table.data-table > tbody:eq(0) > tr").removeClass("odd");
		$("table.data-table > tbody:eq(0) > tr:visible:odd").addClass("odd");
		if ($("#wrapper section.main-section nav").outerHeight(true) > $("#wrapper section.main-section div.main-content").outerHeight(true))
		{
			$("#wrapper section.main-section div.main-content").css("min-height", $("#wrapper section.main-section nav").outerHeight(true));
		} else {
			$("#wrapper section.main-section div.main-content").css("min-height", "");
		}
		checkFloatingButtons();
		$("#ajax_loading").hide();
	});
	
	$("select.quick-link").live('change', function(event) {
		window.location = $(this).val();
	});
		
	$(".quick-filter").live('keypress', function(event) {
		var $keyCode = event.keyCode || event.which;
		if ($keyCode == 13)
		{
			$("#ajax_loading").show();
			event.preventDefault();
			var $listingObjectName = $(this).attr("data-listing-object");
			var $listingObject = $("#listing-"+$listingObjectName);
			var $listingTitle = $(this).attr("data-listing-title");
			var $listingTitleObject = $("#listing-title-"+$(this).attr("data-listing-object"));
			var $filterValue = $(this).val();
			$listingObject.find("tbody:eq(0) > tr").each(function() {
				var $rowObject = $(this);
				$rowObject.show();
				var $rowHidden = false;
				var $valueFound = false;
				$("select.filter-listing").each(function() {
					if ($listingObjectName == $(this).attr("data-listing-object"))
					{
						if ($(this).val())
						{
							if ($rowObject.attr("data-"+$(this).attr("data-filter")) != $(this).val())
							{
								$rowHidden = true;
							}
						}
					}
				});
				if (!$rowHidden)
				{
					$(this).find(".filterable").each(function() {
						$searchValue = $(this).html();
						if ($searchValue.toLowerCase().indexOf($filterValue.toLowerCase()) > -1)
						{
							$valueFound = true;
						}
					});
				}
				if (!$valueFound)
				{
					$(this).hide();
				}
			});
			if ($listingTitle && $listingTitleObject)
			{
				$listingTitleObject.html($listingTitle+" ("+$listingObject.find("tbody:eq(0) > tr:visible").length+")");
			}
			$(".action-select-all").attr("checked", false);
			$(".action-select-all").parent().removeClass("checked");
			$("table.data-table > tbody:eq(0) > tr").removeClass("odd");
			$("table.data-table > tbody:eq(0) > tr:visible:odd").addClass("odd");
			if ($("#wrapper section.main-section nav").outerHeight(true) > $("#wrapper section.main-section div.main-content").outerHeight(true))
			{
				$("#wrapper section.main-section div.main-content").css("min-height", $("#wrapper section.main-section nav").outerHeight(true));
			} else {
				$("#wrapper section.main-section div.main-content").css("min-height", "");
			}
			checkFloatingButtons();
			$("#ajax_loading").hide();
			return false;
		}
		return true;
	});
	
	$(".action-increase-quantity").live('click', function() {
		var $quantityObject = $("#"+$(this).attr("data-quantity-object"));
		var $newQuantity = parseInt($quantityObject.val()) + 1;
		$quantityObject.val($newQuantity);
	});
	
	$(".action-decrease-quantity").live('click', function() {
		var $quantityObject = $("#"+$(this).attr("data-quantity-object"));
		var $newQuantity = parseInt($quantityObject.val()) - 1;
		if ($newQuantity < 1)
		{
			$newQuantity = 1;
		}
		$quantityObject.val($newQuantity);
	});
	
	$("button.apply-to-all").live('click', function() {
		$("select.apply-to-all").each(function() {
			if ($(this).val() != '')
			{
				var $listingObject = $("#listing-"+$(this).attr("data-listing-object"));
				var $applyToAllClass = $(this).attr("data-item-class");
				var $applyToAllValue = $(this).val();
				var $applyToAllText = $(this).find("option[value='"+$applyToAllValue+"']").text();
				$listingObject.find("select."+$applyToAllClass).each(function() {
					$(this).val($applyToAllValue);
					$(this).find("option").removeAttr("selected");
					$(this).find("option[value='"+$applyToAllValue+"']").attr("selected", "selected");
					$(this).prev().html($applyToAllText);
					$(this).change();
				});
			}
		});
	});
	
	$(".action-quick-search").live('click', function() {
		$("#ajax_loading").show();
		if ($("#form-quick-search").val())
		{
			$("#update-listing-current-page").val("1");
			$("#update-listing-search").val($("#form-quick-search").val());
			$("#form-update-listing").submit();
		} else {
			$("#update-listing-search").val("");
			$("#filter-date-from").val("");
			$("#filter-date-from-formatted").val("");
			$("#filter-date-to").val("");
			$("#filter-date-to-formatted").val("");
			$(".filter-text-box").each(function() {
				$(this).val("");
			});
			$("#listing-filter input[type='checkbox']").removeAttr("checked").parent().removeClass("checked");
			updateResults();
		}
	});
	$(".action-clear-quick-search").live('click', function() {
		$("#update-listing-search").val("");
		$("#filter-date-from").val("");
		$("#filter-date-from-formatted").val("");
		$("#filter-date-to").val("");
		$("#filter-date-to-formatted").val("");
		$(".filter-text-box").each(function() {
			$(this).val("");
		});
		$("#listing-filter input[type='checkbox']").removeAttr("checked").parent().removeClass("checked");
		updateResults();
	});
	
	
	
	
	$("#form-quick-search").live('keypress', function(event) {
		var $keyCode = event.keyCode || event.which;
		if ($keyCode == 13)
		{
			$("#ajax_loading").show();
			if ($("#form-quick-search").val())
			{
				$("#update-listing-current-page").val("1");
				$("#update-listing-search").val($("#form-quick-search").val());
				$("#form-update-listing").submit();
			} else {
				$("#update-listing-search").val("");
				$("#filter-date-from").val("");
				$("#filter-date-from-formatted").val("");
				$("#filter-date-to").val("");
				$("#filter-date-to-formatted").val("");
				$(".filter-text-box").each(function() {
					$(this).val("");
				});
				$("#listing-filter input[type='checkbox']").removeAttr("checked").parent().removeClass("checked");
				updateResults();
			}
		}
	});
	
	$("a.extra-action, button.extra-action").live('click', function() {
		$("#ajax_loading").show();
		var $formAction = $(this).attr('data-form-action');
		if ($formAction != '')
		{
			$("#form-update").attr("action", $formAction);
		}
		var $formTarget = $(this).attr('data-form-target');
		if ($formTarget != '')
		{
			$("#form-update").attr("target", $formTarget);
		}
		$("#form-extra-action").val($(this).attr("data-extra-action"));
		$("#form-update").submit();
	});
	
	$("select.extra-action").live('change', function() {
		$("#ajax_loading").show();
		var $optionObject = $(this).find("option[value='"+$(this).val()+"']");
		var $formAction = $optionObject.attr('data-form-action');
		if ($formAction != '')
		{
			$("#form-update").attr("action", $formAction);
		}
		var $formTarget = $optionObject.attr('data-form-target');
		if ($formTarget != '')
		{
			$("#form-update").attr("target", $formTarget);
		}
		$("#form-extra-action").val($(this).val());
		$(this).find("option").removeAttr("selected");
		$(this).prev().html($(this).find("option[value='']").text());
		$(this).find("option:eq(0)").attr("selected", "selected");
		$("#form-update").submit();
	});
	
	
	$(".maximum-characters").each(function() {
		var $object = $(this);
		var $maximumCharacters = $(this).attr("data-maximum-characters");
		var $maximumCharactersObject = $("#"+$(this).attr("data-maximum-characters-object"));
		$maximumCharactersObject.html(checkMaximumCharcaters($object, $maximumCharacters));
	});
	$(".maximum-characters").live('keyup', function() {
		var $object = $(this);
		var $maximumCharacters = $(this).attr("data-maximum-characters");
		var $maximumCharactersObject = $("#"+$(this).attr("data-maximum-characters-object"));
		$maximumCharactersObject.html(checkMaximumCharcaters($object, $maximumCharacters));
	});
	
	$("#form-update table.data-table td input, #form-update table.data-table td textarea, #form-update table.data-table td select").live('change', function() {
		if (!$(this).hasClass("action-select"))
		{
			var $itemId = $(this).attr("data-id");
			$("tr#item-"+$itemId).addClass("selected");
			$("tr#item-"+$itemId+" td.select input.action-select").attr("checked", "checked");
			$("tr#item-"+$itemId+" td.select div.checker span").addClass("checked");
		}
	});
	$("#form-update table.data-table td .action-increase-quantity, #form-update table.data-table td .action-decrease-quantity, #form-update table.data-table td :checkbox, #form-update table.data-table td :radio, #form-update table.data-table td :file").live('click', function() {
		if (!$(this).hasClass("action-select"))
		{
			var $itemId = $(this).attr("data-id");
			$("tr#item-"+$itemId).addClass("selected");
			$("tr#item-"+$itemId+" td.select input.action-select").attr("checked", "checked");
			$("tr#item-"+$itemId+" td.select div.checker span").addClass("checked");
		}
	});
	
	$("#form-update table.data-table td input").live('keypress', function(event) {
		var $keyCode = event.keyCode || event.which;
		if ($keyCode == 13)
		{
			event.preventDefault();
		}
	});
	
	$(".flat-sortable-list img").live('mousedown', function(event) {
		event.preventDefault();
		return false;
	});
	$(".flat-sortable-list ul").sortable({
		helper: fixWidthHelper,
		update: function(event, ui) {
			updateFlatSortableList(ui.item.attr("data-flat-sortable-list-object"));
		}
   	}).disableSelection();
	
	$("input.free-text").live('keypress', function(event) {
		var $flatSortableListObjectName = $(this).attr("data-flat-sortable-list-object")
		var $keyCode = event.keyCode || event.which;
		if ($keyCode == 13)
		{
			event.preventDefault();
			$("button.action-add-flat-sortable-list-item[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']").click();
		}
	});
	$(".action-delete-flat-sortable-list-item").live('click', function() {
		var $flatSortableListObjectName = $(this).parent().attr("data-flat-sortable-list-object");
		$(this).parent().remove();
		updateFlatSortableList($flatSortableListObjectName);
		
	});
	$(".flat-sortable-list-parts").live('change', function() {
		var $freeTextObject = $("input.free-text[data-flat-sortable-list-object='"+$(this).attr("data-flat-sortable-list-object")+"']");
		if ($(this).val() == 'freeText')
		{
			$freeTextObject.removeAttr("disabled");
			if ($(this).find("option:selected").text() != 'Free Text')
			{
				$freeTextObject.val($(this).find("option:selected").text());
			}
			$freeTextObject.focus();
		} else {
			$freeTextObject.val("");
			$freeTextObject.attr("disabled", "disabled");
		}
	});
	$(".action-add-flat-sortable-list-item").live('click', function() {
		var $flatSortableListObjectName = $(this).attr("data-flat-sortable-list-object");
		var $flatSortableListObjectFieldName = $flatSortableListObjectName.replace('-template', '');
		var $flatSortableListObject = $("#flat-sortable-list-"+$flatSortableListObjectName);
		var $selectObject = $("select.flat-sortable-list-parts[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']");
		var $freeTextObject = $("input.free-text[data-flat-sortable-list-object='"+$flatSortableListObjectName+"']");
		var $nextItemNumber = $flatSortableListObject.find("li").length + 1;
		if ($selectObject.val() != "")
		{
			var $appendObject = '';
			if ($selectObject.val() == 'freeText')
			{
				$appendObject = '<li data-flat-sortable-list-object="' + $flatSortableListObjectName + '" id="flat-sortable-list-'+$flatSortableListObjectFieldName+'-item-' + $nextItemNumber + '" data-value="freeText|' + $freeTextObject.val() + '">Free Text: "' + $freeTextObject.val() + '"<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
			} else {
				$appendObject = '<li data-flat-sortable-list-object="' + $flatSortableListObjectName + '" id="flat-sortable-list-'+$flatSortableListObjectFieldName+'-item-' + $nextItemNumber + '" data-value="' + $selectObject.val() + '">' + $selectObject.find("option[value='"+$selectObject.val()+"']").text() + '<a class="action-delete-flat-sortable-list-item button ui-button-red ui-corner-right icon-set-white" data-icon-primary="ui-icon-circle-cross" data-icon-only="true">Delete</a></li>';
			}
			$flatSortableListObject.append($appendObject);
			if ($("#flat-sortable-list-"+$flatSortableListObjectFieldName+"-item-"+$nextItemNumber+" .button").length > 0)
			{
				$("#flat-sortable-list-"+$flatSortableListObjectFieldName+"-item-"+$nextItemNumber+" .button").each(function () {
		            $(this).button({
		            	icons: {
		                	primary: $(this).attr('data-icon-primary') ? $(this).attr('data-icon-primary') : null, 
		                    secondary: $(this).attr('data-icon-primary') ? $(this).attr('data-icon-secondary') : null
		                }, 
		                text: $(this).attr('data-icon-only') === 'true' ? false : true
		            });
		        });
	        }
			updateFlatSortableList($flatSortableListObjectName);
		}
	});
	
	
	$("#add .action-multiple-delete-add").live('click', function() {
		if ($("#add .action-select-add:checked").length > 0)
		{
			$("#add .action-select-add:checked").each(function() {
				$(this).parent().parent().parent().parent().remove();
			});
		}
		if ($("#data-add tbody tr").length < 2)
		{
			addFormRow();
		}
		$(".action-select-all-add").attr("checked", false);
		$(".action-select-all-add").parent().removeClass("checked");
		$("#data-add tr").removeClass("odd");
		$("#data-add tr:odd").addClass("odd");
	});
	
	
	var fixHelper = function(e, ui) {
		ui.children().each(function() {
			$(this).width($(this).width());
		});
		return ui;
	};
	$("table.sortable tbody").sortable({
		helper: fixHelper,
		update: function(event, ui) {
			$("#ajax_loading").show();
			var $displayOrderCount = 0;
			if ($("table.sortable tbody tr").length > 0)
			{
				$("table.sortable tbody tr").each(function() {
					var $displayOrderObject = $(this).find(".listing-display-order");
					if ($displayOrderObject.val() != $displayOrderCount)
					{
			    		$(this).removeClass("selected").addClass("selected");
			    		$(this).find("td.select div.checker span").removeClass("checked").addClass("checked");
			    		$(this).find("td.select div.checker span input").attr("checked", "checked");
					}
					$displayOrderObject.val($displayOrderCount);
					$displayOrderCount++;
				});
			}
			$("table.sortable tbody tr").removeClass("odd");
			$("table.sortable tbody tr:odd").addClass("odd");
			$("#ajax_loading").hide();
		}
	}).disableSelection();
	
	
	$(".update-filter").live('click', function() {
		$("#ajax_loading").show();
		$("#form-update-listing input[type='hidden']").val("");
		$("#"+$(this).attr("data-update-object")).val("|"+$(this).attr("data-filter-value")+"|");
		$("#update-listing-sort-order").val($("#listing-sort-order").val());
		$("#update-listing-max-results").val(parseInt($("#listing-max-results").val()));		
		$("#update-listing-current-page").val("1");
		$("#update-listing-filter-empty").val("1");
		$("#form-update-listing").submit();
	});
	
	$(".tooltip-preview-left").live('mouseover', function() {
		var $tooltipObject = $($(this).attr("data-tooltip-id"));
		var $tooltipHeight = $tooltipObject.outerHeight(true);
		var $tooltipWidth = $tooltipObject.outerWidth(true);
		var $tooltipTriggerPosition = $(this).position();
		var $tooltipTriggerWidth = $(this).outerWidth(true);
		var $tooltipTriggerHeight = $(this).outerHeight(true);
		var $tooltipTop = parseInt($tooltipTriggerPosition.top - (($tooltipHeight - $tooltipTriggerHeight) / 2));
		if (($("#listing").offset().top + $tooltipTop) < ($(window).scrollTop() + 10))
		{
			$tooltipTop = $tooltipTop + (($(window).scrollTop() + 10) - ($("#listing").offset().top + $tooltipTop));
		} else if (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) > ($(window).outerHeight(true) + $(window).scrollTop())) {
			$tooltipTop = $tooltipTop - (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) - ($(window).outerHeight(true) + $(window).scrollTop()));
		}
		var $tooltipLeft = parseInt($tooltipTriggerPosition.left + $tooltipTriggerWidth + 6);
		var $mainSectionWidth = parseInt($(".main-section").outerWidth(true));
		var $maximumWidth = $mainSectionWidth - $tooltipLeft - 200;
		if ($tooltipWidth > $maximumWidth)
		{
			$tooltipObject.css({width: $maximumWidth, top: $tooltipTop, left: $tooltipLeft});
		} else {
			$tooltipObject.css({ top: $tooltipTop, left: $tooltipLeft});
		}
		$tooltipObject.show();
	});
	$(".tooltip-preview-right").live('mouseover', function() {
		var $tooltipObject = $($(this).attr("data-tooltip-id"));
		var $tooltipHeight = $tooltipObject.outerHeight(true);
		var $tooltipWidth = $tooltipObject.outerWidth(true);
		var $tooltipTriggerPosition = $(this).position();
		var $tooltipTriggerWidth = $(this).outerWidth(true);
		var $tooltipTriggerHeight = $(this).outerHeight(true);
		var $tooltipTop = parseInt($tooltipTriggerPosition.top - (($tooltipHeight - $tooltipTriggerHeight) / 2));
		if (($("#listing").offset().top + $tooltipTop) < ($(window).scrollTop() + 10))
		{
			$tooltipTop = $tooltipTop + (($(window).scrollTop() + 10) - ($("#listing").offset().top + $tooltipTop));
		} else if (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) > ($(window).outerHeight(true) + $(window).scrollTop())) {
			$tooltipTop = $tooltipTop - (($("#listing").offset().top + $tooltipTop + $tooltipHeight + 10) - ($(window).outerHeight(true) + $(window).scrollTop()));
		}
		var $tooltipLeft = parseInt($tooltipTriggerPosition.left - $tooltipWidth - 6);
		var $mainSectionWidth = parseInt($(".main-section").outerWidth(true));
		var $maximumWidth = $tooltipTriggerPosition.left - 206;
		if ($tooltipWidth > $maximumWidth)
		{
			$tooltipObject.css({width: $maximumWidth, top: $tooltipTop, left: $tooltipLeft});
		} else {
			$tooltipObject.css({ top: $tooltipTop, left: $tooltipLeft});
		}
		$tooltipObject.show();
	});
	$(".tooltip-preview-left, .tooltip-preview-right").live('mouseout', function() {
		$(".tooltip").hide();
	});
	
	$(".range-slider").each(function() {
		var $object = $(this);
		var $min = parseInt($object.attr('data-min'));
		if ($min < 1)
		{	
			$min = 1;
		}
		var $fromValue = parseInt($object.attr('data-from-value'));
		if ($fromValue < 1)
		{	
			$fromValue = $min;
		}
		var $max = parseInt($object.attr('data-max'));
		if ($max < 1)
		{	
			$max = 10000;
		}
		var $toValue = parseInt($object.attr('data-to-value'));
		if ($toValue < 1)
		{	
			$toValue = $max;
		}
		var $fromObject = $($object.attr('data-from-object'));
		var $toObject = $($object.attr('data-to-object'));
		if ($fromObject && $toObject && ($object.hasClass("filter")))
		{
		    $object.slider({
				range: true,
				min: $min,
				max: $max,
				values: [$fromValue, $toValue],
				slide: function(event, ui) {
					$fromObject.val(ui.values[0]);
					$toObject.val(ui.values[1]);
				},
				change: function(event, ui) {
					updateResults();
				}
			});
		} else if ($object.hasClass("filter")) {
			$object.slider({
				range: true,
				min: $min,
				max: $max,
				values: [$fromValue, $toValue],
				change: function(event, ui) {
					updateResults();
				}
			});
		} else if ($fromObject && $toObject) {
			$object.slider({
				range: true,
				min: $min,
				max: $max,
				values: [$fromValue, $toValue],
				slide: function(event, ui) {
					$fromObject.val(ui.values[0]);
					$toObject.val(ui.values[1]);
				}
			});
		} else {
			$object.slider({
				range: true,
				min: $min,
				max: $max,
				values: [$fromValue, $toValue]
			});
		}
	});

	$(".date-picker").each(function() {
		var $object = $(this);
		var $altField = $(this).attr('data-alt-field');
		if ((typeof $altField !== 'undefined') && ($altField !== false) && ($object.hasClass("filter-text-box")))
		{
		    $object.datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd/mm/yy",
				altField: $altField,
				altFormat: "yy-mm-dd",
				onSelect: function(dateText, inst) {
					updateResults();
				}
			});
		} else if ($object.hasClass("filter-text-box")) {
			$object.datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd/mm/yy",
				onSelect: function(dateText, inst) {
					updateResults();
				}
			});
		} else if ((typeof $altField !== 'undefined') && ($altField !== false)) {
			$object.datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd/mm/yy",
				altField: $altField,
				altFormat: "yy-mm-dd"
			});
		} else {
			$object.datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd/mm/yy"
			});
		}
	});

	$(".filter-text-box").live('keypress', function(event) {
		var $keyCode = event.keyCode || event.which;
		if ($keyCode == 13)
		{
			updateResults();
		}
	});
	$("#listing-filter input[type='checkbox']").live('click', function() {
		updateResults();
	});
	
	$(".action-update-your-results").live('click', function() {
		updateResults();
	});
	$(".action-clear-filters").live('click', function() {
		$("#ajax_loading").show();
		$("#update-listing-search").val("");
		$("#filter-date-from").val("");
		$("#filter-date-from-formatted").val("");
		$("#filter-date-to").val("");
		$("#filter-date-to-formatted").val("");
		if ($(".filter-text-box").length > 0)
		{
			$(".filter-text-box").each(function() {
				$(this).val("");
			});
		}
		$("#listing-filter input[type='checkbox']").removeAttr("checked").parent().removeClass("checked");
		updateResults();
	});
	
	$(".action-show-hide-filter").live('click', function() {
		if ($("#listing-filter").is(":hidden"))
		{
			$("#listing-filter").show();
			if ($("#filter-button > span.ui-button-icon-primary").hasClass("ui-icon-triangle-1-s"))
			{
				$("#filter-button > span.ui-button-icon-primary").removeClass("ui-icon-triangle-1-s").addClass("ui-icon-triangle-1-n");
			}
			if ($("#filter-button > span.ui-button-icon-primary").hasClass("ui-icon-arrow-down"))
			{
				$("#filter-button > span.ui-button-icon-primary").removeClass("ui-icon-arrow-down").addClass("ui-icon-arrow-up");
			}
		} else {
			$("#listing-filter").hide();
			if ($("#filter-button > span.ui-button-icon-primary").hasClass("ui-icon-triangle-1-n"))
			{
				$("#filter-button > span.ui-button-icon-primary").removeClass("ui-icon-triangle-1-n").addClass("ui-icon-triangle-1-s");
			}
			if ($("#filter-button > span.ui-button-icon-primary").hasClass("ui-icon-arrow-up"))
			{
				$("#filter-button > span.ui-button-icon-primary").removeClass("ui-icon-arrow-up").addClass("ui-icon-arrow-down");
			}
		}
	});
	
	

	$(".action-confirm-multiple-delete").live('click', function(event) {
		event.preventDefault();
		if ($("#confirm-multiple-delete"))
		{
			$("#confirm-multiple-delete").show();
			$("html, body").animate({scrollTop: $("#confirm-multiple-delete").offset().top - 20}, 'slow');
		}
	});
	$(".action-cancel-multiple-delete").live('click', function() {
		$("#form-delete").val("0");
		$("#confirm-multiple-delete").hide();
	});
	$(".action-multiple-delete").live('click', function() {
		$("#form-delete").val("1");
		$("#form-update").submit();
	});
	
	$(".action-add").live('click', function(event) {
		if ($("#add"))
		{
			addFormRow();
			$("#add").show();
			$("html, body").animate({scrollTop: $("#add").offset().top - 20}, 'slow');
		}
	});
	$(".action-close-add").live('click', function(event) {
		$("div.form-error").hide();
		$("#add").hide();
		if ($("#add .action-select-add:not(:eq(0))").length > 0)
		{
			$("#add .action-select-add:not(:eq(0))").each(function() {
				$(this).parent().parent().parent().parent().remove();
			});
		}
		$("html, body").animate({scrollTop: 0}, 'slow');
	});
		
	$("#button-add-another").live('click', function() {
		$("#form-add-another").val("1");
		return true;
	});
	$("#button-add").live('click', function() {
		$("#form-add-another").val("0");
		return true;
	});
	
	$("#button-update-go-back").live('click', function() {
		$("#form-go-back").val("1");
		return true;
	});
	$("#button-update").live('click', function() {
		$("#form-go-back").val("0");
		return true;
	});
	
	$("#add #button-listing-add-go-back").live('click', function() {
		$("#form-go-back").val("1");
		$("#form-update").submit();
		return true;
	});
	$("#add #button-listing-add").live('click', function() {
		$("#form-go-back").val("0");
		$("#form-update").submit();
		return true;
	});
	
	$("#add .action-add-another").live('click', function() {
		addFormRow();
 	});
	
	$(".action-select-all").live('click', function() {
		var $selectClass = "";
		if ($(this).attr("data-select"))
		{
			$selectClass = "-" + $(this).attr("data-select");
		}
		if ($(".action-select-all").is(":checked"))
		{
			$(".action-select"+$selectClass+":not(:hidden)").attr("checked", "checked");
			$(".action-select"+$selectClass+":not(:hidden)").parent().addClass("checked");
			$(".action-select"+$selectClass+":not(:hidden)").parent().parent().parent().parent().addClass("selected");
		} else {
			$(".action-select"+$selectClass+":not(:hidden)").attr("checked", false);
			$(".action-select"+$selectClass+":not(:hidden)").parent().removeClass("checked");
			$(".action-select"+$selectClass+":not(:hidden)").parent().parent().parent().parent().removeClass("selected");
		}
	});
    $(".action-select").live('click', function() {
    	var $id = $(this).attr("data-id");
    	if ($(this).is(":checked"))
    	{
    		$("#item-"+$id).addClass("selected");
    	} else {
    		$("#item-"+$id).removeClass("selected");
    	}
    	if ($(".action-select:not(:checked)").length < 1)
    	{
	    	$(".action-select-all").attr("checked", "checked");
			$(".action-select-all").parent().addClass("checked");
    	} else {
	    	$(".action-select-all").attr("checked", false);
			$(".action-select-all").parent().removeClass("checked");
    	}
    });
    
    $(".action-select-all-add").live('click', function() {
		if ($(".action-select-all-add").is(":checked"))
		{
			$(".action-select-add:not(.no-uniform)").attr("checked", "checked");
			$(".action-select-add:not(.no-uniform)").parent().addClass("checked");
			$("tr.item-add").addClass("selected");
		} else {
			$(".action-select-add:not(.no-uniform)").attr("checked", false);
			$(".action-select-add:not(.no-uniform)").parent().removeClass("checked");
			$("tr.item-add").removeClass("selected");
		}
	});
    $(".action-select-add").live('click', function() {
    	var $id = $(this).attr("data-id");
    	if ($(this).is(":checked"))
    	{
    		$("#item-"+$id).addClass("selected");
    	} else {
    		$("#item-"+$id).removeClass("selected");
    	}
    	if ($(".action-select-add:not(:checked)").length < 2)
    	{
	    	$(".action-select-all-add").attr("checked", "checked");
			$(".action-select-all-add").parent().addClass("checked");
    	} else {
	    	$(".action-select-all-add").attr("checked", false);
			$(".action-select-all-add").parent().removeClass("checked");
    	}
    });
    
    $(".action-go-back").live('click', function() {
		 window.history.back();
    });
		
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
    
    $(".close-message").live('click', function() {
		$(".message").fadeOut();
	});
    
    if (typeof prettyPrint === 'function') {
        prettyPrint();
        $('.prettyprint').after('<div class="clear"></div>').hover(function () {
            if ($(this).css('width', 'auto').width() < $(this).parent().width()) {
                $(this).css('width', '100%');
            }
        }, function () {
        });
    }
    
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
	
	$.fx.speeds._default = 1000;
				
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
            var $dataNotification = $(this).attr("data-notification");
	    	if (($(this).attr("data-notification") != "") && ($(this).attr("data-notification") != undefined))
	    	{
	    		$(this).prepend('<div class="button-notification">'+$(this).attr("data-notification")+'</div>');
	    	}
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
    $(".accordion").accordion({
    	autoHeight: false
    });
    
    /**
     * Setup the Tabs
     */
    $(".tabs").tabs({
    	show: function() {
	    	checkFloatingButtons();
    	}
    }).find('> .ui-tabs-nav').removeClass('ui-corner-all').addClass('ui-corner-top');
    
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
        $(this).parent().fadeOut();
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
    
    $("input.seo-url").live('keypress keyup focus', function() {
    	var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toLowerCase());
		$(this).val($(this).val().replace(/[ ]/g,'-'));
		$(this).val($(this).val().replace(/[^a-z0-9-//]/g,''));
    	$(this).caret($currentCaretPosition);
	});
	$("input.uppercase").live('keypress keyup focus', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toUpperCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.postcode").live('keypress keyup focus', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toUpperCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.lowercase").live('keypress keyup focus', function() {
		var $currentCaretPosition = $(this).caret();
    	$(this).val($(this).val().toLowerCase());
    	$(this).caret($currentCaretPosition);
	});
	$("input.integer").live('keypress keyup focus', function() {
		var $currentCaretPosition = $(this).caret();
		$(this).val($(this).val().replace(/[^0-9]/g,''));
		$(this).caret($currentCaretPosition);
	});
	$("input.decimal").live('keypress keyup focus', function() {
		var $currentCaretPosition = $(this).caret();
		$(this).val($(this).val().replace(/[^0-9.]/g,''));
		$(this).caret($currentCaretPosition);
	});
	$("input.url").live('keypress keyup focus', function() {
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
    $("form.has-validation").validator({
        position : 'center right', 
        offset : [0, -250], 
        messageClass : 'form-error', 
        errorInputEvent: 	'blur',
        inputEvent: 	'keyup',
        message : '<div><em/></div>'// em element is the arrow
    }).attr('novalidate', 'novalidate').submit(function(event) {
	    if (!event.isDefaultPrevented())
	    {
	    	if ($("form.has-validation input.form-difference-check").length > 0)
	    	{
		    	$("form.has-validation input.form-difference-check").each(function() {
			    	if ($(this).val() == $("#"+$(this).attr("data-object-to-check")).val())
			    	{
			    		$("#"+$(this).attr("data-object-to-check")).remove();
				    	$(this).remove();
			    	}
		    	});
		    }
	    	return true;
	    } else {
		    $("#ajax_loading").show();
	    }
    });
    
    /**
     * Animate search form in top-menu
     */
    $("#quick-search").focus(function () {
        $(this).parent().animate({
            width : '400px'
        }, 500, 'easeOutExpo');
    }).blur(function () {
        var base = this;
        setTimeout(function () {
            if ($(base)[0] !== document.activeElement) {
                $(base).parent().animate({
					width : '200px'
				}, 500, 'easeOutExpo');
            }
        }, 500);
    });
    
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
        $.waypoints('refresh');
        if ($("#float-buttons"))
		{
	        if ($("#float-buttons .float-buttons").hasClass("float-buttons-sticky"))
	        {
	        	$("#float-buttons .float-buttons").hide();
	        	var $tfloatButtonsTimer = setTimeout(function() {
		        	$("#float-buttons .float-buttons").show(0, function() {
		        		if ($("#float-buttons").hasClass("padding-15"))
		        		{
			        		$("#float-buttons .float-buttons").offset({ left: ($("#float-buttons").offset().left + 15), top: ($("#float-buttons .float-buttons").offset().top) });
		        		} else {
				        	$("#float-buttons .float-buttons").offset({ left: ($("#float-buttons").offset().left), top: ($("#float-buttons .float-buttons").offset().top) });
				        }
		        	});
	        	}, 800);
	        }
	    }
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
    $("textarea.tinymce-basic").css("height", "100px");
    //$("textarea").autogrow();
    if ($("textarea.tinymce-basic").length > 0)
    {
	    $('textarea.tinymce-basic').tinymce({
			script_url : '/bundles/webilluminationadmin/js/tinymce/tiny_mce.js',
			theme : "advanced",
			plugins : "contextmenu,paste,fullscreen,xhtmlxtras,spellchecker",
			theme_advanced_buttons1 : "bold,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,|,spellchecker",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,
			theme_advanced_path : false,
			content_css : "/bundles/webilluminationadmin/css/content.css"
		});
	}
	if ($("textarea.tinymce-advanced").length > 0)
    {
		$('textarea.tinymce-advanced').tinymce({
			script_url : '/bundles/webilluminationadmin/js/tinymce/tiny_mce.js',
			theme : "advanced",
			plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,spellchecker",
	
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,spellchecker",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_resizing : true,
			theme_advanced_path : false,
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
