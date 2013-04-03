(function(k){var j,i,l=[],h=window;k.fn.tinymce=function(t){var c=this,r,q,d,a,b,e="",f="";if(!c.length){return c}if(!t){return tinyMCE.get(c[0].id)}c.css("visibility","hidden");function s(){var m=[],n=0;if(g){g();g=null}c.each(function(p,y){var o,x=y.id,z=t.oninit;if(!x){y.id=x=tinymce.DOM.uniqueId()}o=new tinymce.Editor(x,t);m.push(o);o.onInit.add(function(){var u,v=z;c.css("visibility","");if(z){if(++n==m.length){if(tinymce.is(v,"string")){u=(v.indexOf(".")===-1)?null:tinymce.resolve(v.replace(/\.\w+$/,""));v=tinymce.resolve(v)}v.apply(u||tinymce,m)}}})});k.each(m,function(p,o){o.render()})}if(!h.tinymce&&!i&&(r=t.script_url)){i=1;d=r.substring(0,r.lastIndexOf("/"));if(/_(src|dev)\.js/g.test(r)){f="_src"}a=r.lastIndexOf("?");if(a!=-1){e=r.substring(a+1)}h.tinyMCEPreInit=h.tinyMCEPreInit||{base:d,suffix:f,query:e};if(r.indexOf("gzip")!=-1){b=t.language||"en";r=r+(/\?/.test(r)?"&":"?")+"js=true&core=true&suffix="+escape(f)+"&themes="+escape(t.theme)+"&plugins="+escape(t.plugins)+"&languages="+b;if(!h.tinyMCE_GZ){tinyMCE_GZ={start:function(){tinymce.suffix=f;function m(n){tinymce.ScriptLoader.markDone(tinyMCE.baseURI.toAbsolute(n))}m("langs/"+b+".js");m("themes/"+t.theme+"/editor_template"+f+".js");m("themes/"+t.theme+"/langs/"+b+".js");k.each(t.plugins.split(","),function(n,o){if(o){m("plugins/"+o+"/editor_plugin"+f+".js");m("plugins/"+o+"/langs/"+b+".js")}})},end:function(){}}}}k.ajax({type:"GET",url:r,dataType:"script",cache:true,success:function(){tinymce.dom.Event.domLoaded=1;i=2;if(t.script_loaded){t.script_loaded()}s();k.each(l,function(n,m){m()})}})}else{if(i===1){l.push(s)}else{s()}}return c};k.extend(k.expr[":"],{tinymce:function(a){return !!(a.id&&"tinyMCE" in window&&tinyMCE.get(a.id))}});function g(){function d(f){if(f==="remove"){this.each(function(p,r){var q=b(r);if(q){q.remove()}})}this.find("span.mceEditor,div.mceEditor").each(function(p,r){var q=tinyMCE.get(r.id.replace(/_parent$/,""));if(q){q.remove()}})}function c(o){var p=this,f;if(o!==j){d.call(p);p.each(function(r,n){var m;if(m=tinyMCE.get(n.id)){m.setContent(o)}})}else{if(p.length>0){if(f=tinyMCE.get(p[0].id)){return f.getContent()}}}}function b(n){var f=null;(n)&&(n.id)&&(h.tinymce)&&(f=tinyMCE.get(n.id));return f}function a(f){return !!((f)&&(f.length)&&(h.tinymce)&&(f.is(":tinymce")))}var e={};k.each(["text","html","val"],function(p,f){var r=e[f]=k.fn[f],q=(f==="text");k.fn[f]=function(m){var t=this;if(!a(t)){return r.apply(t,arguments)}if(m!==j){c.call(t.filter(":tinymce"),m);r.apply(t.not(":tinymce"),arguments);return t}else{var n="";var o=arguments;(q?t:t.eq(0)).each(function(w,x){var s=b(x);n+=s?(q?s.getContent().replace(/<(?:"[^"]*"|'[^']*'|[^'">])*>/g,""):s.getContent({save:true})):r.apply(k(x),o)});return n}}});k.each(["append","prepend"],function(p,q){var r=e[q]=k.fn[q],f=(q==="prepend");k.fn[q]=function(n){var m=this;if(!a(m)){return r.apply(m,arguments)}if(n!==j){m.filter(":tinymce").each(function(o,u){var v=b(u);v&&v.setContent(f?n+v.getContent():v.getContent()+n)});r.apply(m.not(":tinymce"),arguments);return m}}});k.each(["remove","replaceWith","replaceAll","empty"],function(p,f){var o=e[f]=k.fn[f];k.fn[f]=function(){d.call(this,f);return o.apply(this,arguments)}});e.attr=k.fn.attr;k.fn.attr=function(t,v){var s=this,r=arguments;if((!t)||(t!=="value")||(!a(s))){if(v!==j){return e.attr.apply(s,r)}else{return e.attr.apply(s,r)}}if(v!==j){c.call(s.filter(":tinymce"),v);e.attr.apply(s.not(":tinymce"),r);return s}else{var u=s[0],f=b(u);return f?f.getContent({save:true}):e.attr.apply(k(u),r)}}}})(jQuery);