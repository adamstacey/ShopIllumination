/*!
 * jQuery Cookie Plugin
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2011, Klaus Hartl
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/GPL-2.0
 */
(function(a){a.cookie=function(b,g,k){if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(g))||g===null||g===undefined)){k=a.extend({},k);if(g===null||g===undefined){k.expires=-1}if(typeof k.expires==="number"){var j=k.expires,h=k.expires=new Date();h.setDate(h.getDate()+j)}g=String(g);return(document.cookie=[encodeURIComponent(b),"=",k.raw?g:encodeURIComponent(g),k.expires?"; expires="+k.expires.toUTCString():"",k.path?"; path="+k.path:"",k.domain?"; domain="+k.domain:"",k.secure?"; secure":""].join(""))}k=g||{};var c=k.raw?function(i){return i}:decodeURIComponent;var d=document.cookie.split("; ");for(var f=0,e;e=d[f]&&d[f].split("=");f++){if(c(e[0])===b){return c(e[1]||"")}}return null}})(jQuery);