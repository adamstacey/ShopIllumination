(function(b){b.uniform={options:{selectClass:"selector",radioClass:"radio",checkboxClass:"checker",fileClass:"uploader",filenameClass:"filename",fileBtnClass:"action",fileDefaultText:"No file selected",fileBtnText:"Choose File",checkedClass:"checked",focusClass:"focus",disabledClass:"disabled",buttonClass:"button",activeClass:"active",hoverClass:"hover",useID:true,idPrefix:"uniform",resetSelector:false,autoHide:true},elements:[]};if(b.browser.msie&&b.browser.version<7){b.support.selectOpacity=false}else{b.support.selectOpacity=true}b.fn.uniform=function(p){p=b.extend(b.uniform.options,p);var r=this;if(p.resetSelector!=false){b(p.resetSelector).mouseup(function(){function c(){b.uniform.update(r)}setTimeout(c,10)})}function m(c){$el=b(c);$el.addClass($el.attr("type"));l(c)}function q(c){b(c).addClass("uniform");l(c)}function s(f){var g=b(f);var d=b("<div>"),c=b("<span>");d.addClass(p.buttonClass);if(p.useID&&g.attr("id")!=""){d.attr("id",p.idPrefix+"-"+g.attr("id"))}var e;if(g.is("a")||g.is("button")){e=g.html()}else{if(g.is(":submit")||g.is(":reset")||g.is("input[type=button]")){e=g.attr("value")}}e=e==""?g.is(":reset")?"Reset":"Submit":e;c.html(e);g.css("opacity",0);g.wrap(d);g.wrap(c);d=g.closest("div");c=g.closest("span");if(g.is(":disabled")){d.addClass(p.disabledClass)}d.bind({"mouseenter.uniform":function(){d.addClass(p.hoverClass)},"mouseleave.uniform":function(){d.removeClass(p.hoverClass);d.removeClass(p.activeClass)},"mousedown.uniform touchbegin.uniform":function(){d.addClass(p.activeClass)},"mouseup.uniform touchend.uniform":function(){d.removeClass(p.activeClass)},"click.uniform touchend.uniform":function(i){if(b(i.target).is("span")||b(i.target).is("div")){if(f[0].dispatchEvent){var h=document.createEvent("MouseEvents");h.initEvent("click",true,true);f[0].dispatchEvent(h)}else{f[0].click()}}}});f.bind({"focus.uniform":function(){d.addClass(p.focusClass)},"blur.uniform":function(){d.removeClass(p.focusClass)}});b.uniform.noSelect(d);l(f)}function n(f){var g=b(f);var d=b("<div />"),c=b("<span />");if(!g.css("display")=="none"&&p.autoHide){d.hide()}d.addClass(p.selectClass);if(p.useID&&f.attr("id")!=""){d.attr("id",p.idPrefix+"-"+f.attr("id"))}var e=f.find(":selected:first");if(e.length==0){e=f.find("option:first")}c.html(e.html());f.css("opacity",0);f.wrap(d);f.before(c);d=f.parent("div");c=f.siblings("span");f.bind({"change.uniform":function(){c.html(f.find(":selected").html());d.removeClass(p.activeClass)},"focus.uniform":function(){d.addClass(p.focusClass)},"blur.uniform":function(){d.removeClass(p.focusClass);d.removeClass(p.activeClass)},"mousedown.uniform touchbegin.uniform":function(){d.addClass(p.activeClass)},"mouseup.uniform touchend.uniform":function(){d.removeClass(p.activeClass)},"click.uniform touchend.uniform":function(){d.removeClass(p.activeClass)},"mouseenter.uniform":function(){d.addClass(p.hoverClass)},"mouseleave.uniform":function(){d.removeClass(p.hoverClass);d.removeClass(p.activeClass)},"keyup.uniform":function(){c.html(f.find(":selected").html())}});if(b(f).attr("disabled")){d.addClass(p.disabledClass)}b.uniform.noSelect(c);l(f)}function a(e){var f=b(e);var d=b("<div />"),c=b("<span />");if(!f.css("display")=="none"&&p.autoHide){d.hide()}d.addClass(p.checkboxClass);if(p.useID&&e.attr("id")!=""){d.attr("id",p.idPrefix+"-"+e.attr("id"))}b(e).wrap(d);b(e).wrap(c);c=e.parent();d=c.parent();b(e).css("opacity",0).bind({"focus.uniform":function(){d.addClass(p.focusClass)},"blur.uniform":function(){d.removeClass(p.focusClass)},"click.uniform touchend.uniform":function(){if(!b(e).attr("checked")){c.removeClass(p.checkedClass)}else{c.addClass(p.checkedClass)}},"mousedown.uniform touchbegin.uniform":function(){d.addClass(p.activeClass)},"mouseup.uniform touchend.uniform":function(){d.removeClass(p.activeClass)},"mouseenter.uniform":function(){d.addClass(p.hoverClass)},"mouseleave.uniform":function(){d.removeClass(p.hoverClass);d.removeClass(p.activeClass)}});if(b(e).attr("checked")){c.addClass(p.checkedClass)}if(b(e).attr("disabled")){d.addClass(p.disabledClass)}l(e)}function o(e){var f=b(e);var d=b("<div />"),c=b("<span />");if(!f.css("display")=="none"&&p.autoHide){d.hide()}d.addClass(p.radioClass);if(p.useID&&e.attr("id")!=""){d.attr("id",p.idPrefix+"-"+e.attr("id"))}b(e).wrap(d);b(e).wrap(c);c=e.parent();d=c.parent();b(e).css("opacity",0).bind({"focus.uniform":function(){d.addClass(p.focusClass)},"blur.uniform":function(){d.removeClass(p.focusClass)},"click.uniform touchend.uniform":function(){if(!b(e).attr("checked")){c.removeClass(p.checkedClass)}else{var g=p.radioClass.split(" ")[0];b("."+g+" span."+p.checkedClass+":has([name='"+b(e).attr("name")+"'])").removeClass(p.checkedClass);c.addClass(p.checkedClass)}},"mousedown.uniform touchend.uniform":function(){if(!b(e).is(":disabled")){d.addClass(p.activeClass)}},"mouseup.uniform touchbegin.uniform":function(){d.removeClass(p.activeClass)},"mouseenter.uniform touchend.uniform":function(){d.addClass(p.hoverClass)},"mouseleave.uniform":function(){d.removeClass(p.hoverClass);d.removeClass(p.activeClass)}});if(b(e).attr("checked")){c.addClass(p.checkedClass)}if(b(e).attr("disabled")){d.addClass(p.disabledClass)}l(e)}function t(g){var f=b(g);var i=b("<div />"),d=b("<span>"+p.fileDefaultText+"</span>"),h=b("<span>"+p.fileBtnText+"</span>");if(!f.css("display")=="none"&&p.autoHide){i.hide()}i.addClass(p.fileClass);d.addClass(p.filenameClass);h.addClass(p.fileBtnClass);if(p.useID&&f.attr("id")!=""){i.attr("id",p.idPrefix+"-"+f.attr("id"))}f.wrap(i);f.after(h);f.after(d);i=f.closest("div");d=f.siblings("."+p.filenameClass);h=f.siblings("."+p.fileBtnClass);if(!f.attr("size")){var c=i.width();f.attr("size",c/10)}var e=function(){var j=f.val();if(j===""){j=p.fileDefaultText}else{j=j.split(/[\/\\]+/);j=j[(j.length-1)]}d.html(j)};e();f.css("opacity",0).bind({"focus.uniform":function(){i.addClass(p.focusClass)},"blur.uniform":function(){i.removeClass(p.focusClass)},"mousedown.uniform":function(){if(!b(g).is(":disabled")){i.addClass(p.activeClass)}},"mouseup.uniform":function(){i.removeClass(p.activeClass)},"mouseenter.uniform":function(){i.addClass(p.hoverClass)},"mouseleave.uniform":function(){i.removeClass(p.hoverClass);i.removeClass(p.activeClass)}});if(b.browser.msie){f.bind("click.uniform.ie7",function(){setTimeout(e,0)})}else{f.bind("change.uniform",e)}if(f.attr("disabled")){i.addClass(p.disabledClass)}b.uniform.noSelect(d);b.uniform.noSelect(h);l(g)}b.uniform.restore=function(c){if(c==undefined){c=b(b.uniform.elements)}b(c).each(function(){if(b(this).is(":checkbox")){b(this).unwrap().unwrap()}else{if(b(this).is("select")){b(this).siblings("span").remove();b(this).unwrap()}else{if(b(this).is(":radio")){b(this).unwrap().unwrap()}else{if(b(this).is(":file")){b(this).siblings("span").remove();b(this).unwrap()}else{if(b(this).is("button, :submit, :reset, a, input[type='button']")){b(this).unwrap().unwrap()}}}}}b(this).unbind(".uniform");b(this).css("opacity","1");var d=b.inArray(b(c),b.uniform.elements);b.uniform.elements.splice(d,1)})};function l(c){c=b(c).get();if(c.length>1){b.each(c,function(e,d){b.uniform.elements.push(d)})}else{b.uniform.elements.push(c)}}b.uniform.noSelect=function(c){function d(){return false}b(c).each(function(){this.onselectstart=this.ondragstart=d;b(this).mousedown(d).css({MozUserSelect:"none"})})};b.uniform.update=function(c){if(c==undefined){c=b(b.uniform.elements)}c=b(c);c.each(function(){var f=b(this);if(f.is("select")){var g=f.siblings("span");var d=f.parent("div");d.removeClass(p.hoverClass+" "+p.focusClass+" "+p.activeClass);g.html(f.find(":selected").html());if(f.is(":disabled")){d.addClass(p.disabledClass)}else{d.removeClass(p.disabledClass)}}else{if(f.is(":checkbox")){var g=f.closest("span");var d=f.closest("div");d.removeClass(p.hoverClass+" "+p.focusClass+" "+p.activeClass);g.removeClass(p.checkedClass);if(f.is(":checked")){g.addClass(p.checkedClass)}if(f.is(":disabled")){d.addClass(p.disabledClass)}else{d.removeClass(p.disabledClass)}}else{if(f.is(":radio")){var g=f.closest("span");var d=f.closest("div");d.removeClass(p.hoverClass+" "+p.focusClass+" "+p.activeClass);g.removeClass(p.checkedClass);if(f.is(":checked")){g.addClass(p.checkedClass)}if(f.is(":disabled")){d.addClass(p.disabledClass)}else{d.removeClass(p.disabledClass)}}else{if(f.is(":file")){var d=f.parent("div");var e=f.siblings(p.filenameClass);btnTag=f.siblings(p.fileBtnClass);d.removeClass(p.hoverClass+" "+p.focusClass+" "+p.activeClass);e.html(f.val());if(f.is(":disabled")){d.addClass(p.disabledClass)}else{d.removeClass(p.disabledClass)}}else{if(f.is(":submit")||f.is(":reset")||f.is("button")||f.is("a")||c.is("input[type=button]")){var d=f.closest("div");d.removeClass(p.hoverClass+" "+p.focusClass+" "+p.activeClass);if(f.is(":disabled")){d.addClass(p.disabledClass)}else{d.removeClass(p.disabledClass)}}}}}}})};return this.each(function(){if(b.support.selectOpacity){var c=b(this);if(c.is("select")){if(c.attr("multiple")!=true){if(c.attr("size")==undefined||c.attr("size")<=1){n(c)}}}else{if(c.is(":checkbox")){a(c)}else{if(c.is(":radio")){o(c)}else{if(c.is(":file")){t(c)}else{if(c.is(":text, :password, input[type='email']")){m(c)}else{if(c.is("textarea")){q(c)}else{if(c.is("a")||c.is(":submit")||c.is(":reset")||c.is("button")||c.is("input[type=button]")){s(c)}}}}}}}}})}})(jQuery);