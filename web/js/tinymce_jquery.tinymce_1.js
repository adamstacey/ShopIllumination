(function(i){var j,h,g=[],l=window;i.fn.tinymce=function(e){var t=this,f,s,b,r,c,d="",a="";if(!t.length){return t}if(!e){return tinyMCE.get(t[0].id)}t.css("visibility","hidden");function q(){var n=[],m=0;if(k){k();k=null}t.each(function(p,y){var z,o=y.id,x=e.oninit;if(!o){y.id=o=tinymce.DOM.uniqueId()}z=new tinymce.Editor(o,e);n.push(z);z.onInit.add(function(){var u,v=x;t.css("visibility","");if(x){if(++m==n.length){if(tinymce.is(v,"string")){u=(v.indexOf(".")===-1)?null:tinymce.resolve(v.replace(/\.\w+$/,""));v=tinymce.resolve(v)}v.apply(u||tinymce,n)}}})});i.each(n,function(o,p){p.render()})}if(!l.tinymce&&!h&&(f=e.script_url)){h=1;b=f.substring(0,f.lastIndexOf("/"));if(/_(src|dev)\.js/g.test(f)){a="_src"}r=f.lastIndexOf("?");if(r!=-1){d=f.substring(r+1)}l.tinyMCEPreInit=l.tinyMCEPreInit||{base:b,suffix:a,query:d};if(f.indexOf("gzip")!=-1){c=e.language||"en";f=f+(/\?/.test(f)?"&":"?")+"js=true&core=true&suffix="+escape(a)+"&themes="+escape(e.theme)+"&plugins="+escape(e.plugins)+"&languages="+c;if(!l.tinyMCE_GZ){tinyMCE_GZ={start:function(){tinymce.suffix=a;function m(n){tinymce.ScriptLoader.markDone(tinyMCE.baseURI.toAbsolute(n))}m("langs/"+c+".js");m("themes/"+e.theme+"/editor_template"+a+".js");m("themes/"+e.theme+"/langs/"+c+".js");i.each(e.plugins.split(","),function(o,n){if(n){m("plugins/"+n+"/editor_plugin"+a+".js");m("plugins/"+n+"/langs/"+c+".js")}})},end:function(){}}}}i.ajax({type:"GET",url:f,dataType:"script",cache:true,success:function(){tinymce.dom.Event.domLoaded=1;h=2;if(e.script_loaded){e.script_loaded()}q();i.each(g,function(n,m){m()})}})}else{if(h===1){g.push(q)}else{q()}}return t};i.extend(i.expr[":"],{tinymce:function(a){return !!(a.id&&"tinyMCE" in window&&tinyMCE.get(a.id))}});function k(){function e(f){if(f==="remove"){this.each(function(p,q){var r=c(q);if(r){r.remove()}})}this.find("span.mceEditor,div.mceEditor").each(function(p,q){var r=tinyMCE.get(q.id.replace(/_parent$/,""));if(r){r.remove()}})}function b(f){var p=this,o;if(f!==j){e.call(p);p.each(function(r,n){var m;if(m=tinyMCE.get(n.id)){m.setContent(f)}})}else{if(p.length>0){if(o=tinyMCE.get(p[0].id)){return o.getContent()}}}}function c(n){var f=null;(n)&&(n.id)&&(l.tinymce)&&(f=tinyMCE.get(n.id));return f}function d(f){return !!((f)&&(f.length)&&(l.tinymce)&&(f.is(":tinymce")))}var a={};i.each(["text","html","val"],function(f,q){var p=a[q]=i.fn[q],r=(q==="text");i.fn[q]=function(t){var o=this;if(!d(o)){return p.apply(o,arguments)}if(t!==j){b.call(o.filter(":tinymce"),t);p.apply(o.not(":tinymce"),arguments);return o}else{var n="";var m=arguments;(r?o:o.eq(0)).each(function(x,w){var s=c(w);n+=s?(r?s.getContent().replace(/<(?:"[^"]*"|'[^']*'|[^'">])*>/g,""):s.getContent({save:true})):p.apply(i(w),m)});return n}}});i.each(["append","prepend"],function(f,r){var p=a[r]=i.fn[r],q=(r==="prepend");i.fn[r]=function(m){var n=this;if(!d(n)){return p.apply(n,arguments)}if(m!==j){n.filter(":tinymce").each(function(v,o){var u=c(o);u&&u.setContent(q?m+u.getContent():u.getContent()+m)});p.apply(n.not(":tinymce"),arguments);return n}}});i.each(["remove","replaceWith","replaceAll","empty"],function(p,o){var f=a[o]=i.fn[o];i.fn[o]=function(){e.call(this,o);return f.apply(this,arguments)}});a.attr=i.fn.attr;i.fn.attr=function(r,u){var t=this,f=arguments;if((!r)||(r!=="value")||(!d(t))){if(u!==j){return a.attr.apply(t,f)}else{return a.attr.apply(t,f)}}if(u!==j){b.call(t.filter(":tinymce"),u);a.attr.apply(t.not(":tinymce"),f);return t}else{var v=t[0],s=c(v);return s?s.getContent({save:true}):a.attr.apply(i(v),f)}}}})(jQuery);