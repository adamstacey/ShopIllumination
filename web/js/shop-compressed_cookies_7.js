/*!
 * jQuery Cookie Plugin
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2011, Klaus Hartl
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.opensource.org/licenses/GPL-2.0
 */
(function(a){a.cookie=function(k,b,g){if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(b))||b===null||b===undefined)){g=a.extend({},g);if(b===null||b===undefined){g.expires=-1}if(typeof g.expires==="number"){var d=g.expires,e=g.expires=new Date();e.setDate(e.getDate()+d)}b=String(b);return(document.cookie=[encodeURIComponent(k),"=",g.raw?b:encodeURIComponent(b),g.expires?"; expires="+g.expires.toUTCString():"",g.path?"; path="+g.path:"",g.domain?"; domain="+g.domain:"",g.secure?"; secure":""].join(""))}g=b||{};var h=g.raw?function(i){return i}:decodeURIComponent;var f=document.cookie.split("; ");for(var c=0,j;j=f[c]&&f[c].split("=");c++){if(h(j[0])===k){return h(j[1]||"")}}return null}})(jQuery);