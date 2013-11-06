/*
 * jQuery Superfish Menu Plugin - v1.7.4
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */

;(function(e){"use strict";var s=function(){var s={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",menuArrowClass:"sf-arrows"},o=function(){var s=/iPhone|iPad|iPod/i.test(navigator.userAgent);return s&&e(window).load(function(){e("body").children().on("click",e.noop)}),s}(),n=function(){var e=document.documentElement.style;return"behavior"in e&&"fill"in e&&/iemobile/i.test(navigator.userAgent)}(),t=function(e,o){var n=s.menuClass;o.cssArrows&&(n+=" "+s.menuArrowClass),e.toggleClass(n)},i=function(o,n){return o.find("li."+n.pathClass).slice(0,n.pathLevels).addClass(n.hoverClass+" "+s.bcClass).filter(function(){return e(this).children(n.popUpSelector).hide().show().length}).removeClass(n.pathClass)},r=function(e){e.children("a").toggleClass(s.anchorClass)},a=function(e){var s=e.css("ms-touch-action");s="pan-y"===s?"auto":"pan-y",e.css("ms-touch-action",s)},l=function(s,t){var i="li:has("+t.popUpSelector+")";e.fn.hoverIntent&&!t.disableHI?s.hoverIntent(u,p,i):s.on("mouseenter.superfish",i,u).on("mouseleave.superfish",i,p);var r="MSPointerDown.superfish";o||(r+=" touchend.superfish"),n&&(r+=" mousedown.superfish"),s.on("focusin.superfish","li",u).on("focusout.superfish","li",p).on(r,"a",t,h)},h=function(s){var o=e(this),n=o.siblings(s.data.popUpSelector);n.length>0&&n.is(":hidden")&&(o.one("click.superfish",!1),"MSPointerDown"===s.type?o.trigger("focus"):e.proxy(u,o.parent("li"))())},u=function(){var s=e(this),o=d(s);clearTimeout(o.sfTimer),s.siblings().superfish("hide").end().superfish("show")},p=function(){var s=e(this),n=d(s);o?e.proxy(f,s,n)():(clearTimeout(n.sfTimer),n.sfTimer=setTimeout(e.proxy(f,s,n),n.delay))},f=function(s){s.retainPath=e.inArray(this[0],s.$path)>-1,this.superfish("hide"),this.parents("."+s.hoverClass).length||(s.onIdle.call(c(this)),s.$path.length&&e.proxy(u,s.$path)())},c=function(e){return e.closest("."+s.menuClass)},d=function(e){return c(e).data("sf-options")};return{hide:function(s){if(this.length){var o=this,n=d(o);if(!n)return this;var t=n.retainPath===!0?n.$path:"",i=o.find("li."+n.hoverClass).add(this).not(t).removeClass(n.hoverClass).children(n.popUpSelector),r=n.speedOut;s&&(i.show(),r=0),n.retainPath=!1,n.onBeforeHide.call(i),i.stop(!0,!0).animate(n.animationOut,r,function(){var s=e(this);n.onHide.call(s)})}return this},show:function(){var e=d(this);if(!e)return this;var s=this.addClass(e.hoverClass),o=s.children(e.popUpSelector);return e.onBeforeShow.call(o),o.stop(!0,!0).animate(e.animation,e.speed,function(){e.onShow.call(o)}),this},destroy:function(){return this.each(function(){var o,n=e(this),i=n.data("sf-options");return i?(o=n.find(i.popUpSelector).parent("li"),clearTimeout(i.sfTimer),t(n,i),r(o),a(n),n.off(".superfish").off(".hoverIntent"),o.children(i.popUpSelector).attr("style",function(e,s){return s.replace(/display[^;]+;?/g,"")}),i.$path.removeClass(i.hoverClass+" "+s.bcClass).addClass(i.pathClass),n.find("."+i.hoverClass).removeClass(i.hoverClass),i.onDestroy.call(n),n.removeData("sf-options"),void 0):!1})},init:function(o){return this.each(function(){var n=e(this);if(n.data("sf-options"))return!1;var h=e.extend({},e.fn.superfish.defaults,o),u=n.find(h.popUpSelector).parent("li");h.$path=i(n,h),n.data("sf-options",h),t(n,h),r(u),a(n),l(n,h),u.not("."+s.bcClass).superfish("hide",!0),h.onInit.call(this)})}}}();e.fn.superfish=function(o){return s[o]?s[o].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof o&&o?e.error("Method "+o+" does not exist on jQuery.fn.superfish"):s.init.apply(this,arguments)},e.fn.superfish.defaults={popUpSelector:"ul,.sf-mega",hoverClass:"sfHover",pathClass:"overrideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},animationOut:{opacity:"hide"},speed:"normal",speedOut:"fast",cssArrows:!0,disableHI:!1,onInit:e.noop,onBeforeShow:e.noop,onShow:e.noop,onBeforeHide:e.noop,onHide:e.noop,onIdle:e.noop,onDestroy:e.noop},e.fn.extend({hideSuperfishUl:s.hide,showSuperfishUl:s.show})})(jQuery);

/*
 * Supposition v0.3a - an optional enhancer for Superfish jQuery menu widget
 *
 * Copyright (c) 2013 Joel Birch - based on work by Jesse Klaasse - credit goes largely to him.
 * Special thanks to Karl Swedberg for valuable input.
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 */

;(function($){

    $.fn.supposition = function(){
        var $w = $(window), /*do this once instead of every onBeforeShow call*/
            _offset = function(dir) {
                return window[dir == 'y' ? 'pageYOffset' : 'pageXOffset']
                    || document.documentElement && document.documentElement[dir=='y' ? 'scrollTop' : 'scrollLeft']
                    || document.body[dir=='y' ? 'scrollTop' : 'scrollLeft'];
            },
            onInit = function(){
                /* I haven't touched this bit - needs work as there are still z-index issues */
                $topNav = $('li',this);
                var cZ=parseInt($topNav.css('z-index')) + $topNav.length;
                $topNav.each(function() {
                    $(this).css({zIndex:--cZ});
                });
            },
            onHide = function(){
                this.css({marginTop:'',marginLeft:''});
            },
            onBeforeShow = function(){
                this.each(function(){
                    var $u = $(this);
                    $u.css('display','block');
                    var menuWidth = $u.width(),
                        parentWidth = $u.parents('ul').width(),
                        totalRight = $w.width() + _offset('x'),
                        menuRight = $u.offset().left + menuWidth;
                    if (menuRight > totalRight) {
                        $u.css('margin-left', ($u.parents('ul').length == 1 ? totalRight - menuRight : -(menuWidth + parentWidth)) + 'px');
                    }

//                    var windowHeight = $w.height(),
//                        offsetTop = $u.offset().top,
//                        menuHeight = $u.height(),
//                        baseline = windowHeight + _offset('y');
//                    var expandUp = (offsetTop + menuHeight > baseline);
//                    if (expandUp) {
//                        $u.css('margin-top',baseline - (menuHeight + offsetTop));
//                    }
                    $u.css('display','none');
                });
            };

        return this.each(function() {
            var $this = $(this),
                o = $this.data('sf-options'); /* get this menu's options */

            /* if callbacks already set, store them */
            var _onInit = o.onInit,
                _onBeforeShow = o.onBeforeShow,
                _onHide = o.onHide;

            $.extend($this.data('sf-options'),{
                onInit: function() {
                    onInit.call(this); /* fire our Supposition callback */
                    _onInit.call(this); /* fire stored callbacks */
                },
                onBeforeShow: function() {
                    onBeforeShow.call(this); /* fire our Supposition callback */
                    _onBeforeShow.call(this); /* fire stored callbacks */
                },
                onHide: function() {
                    onHide.call(this); /* fire our Supposition callback */
                    _onHide.call(this); /* fire stored callbacks */
                }
            });
        });
    };

})(jQuery);