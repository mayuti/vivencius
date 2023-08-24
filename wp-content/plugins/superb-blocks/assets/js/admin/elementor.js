(()=>{var e={767:e=>{e.exports=function(e){var t,a,r,n,s,i,o,p,l=this;function d(){switch(_Options.position){case"bl":return"js-snackbar-container--bottom-left";case"tl":return"js-snackbar-container--top-left";case"tr":return"js-snackbar-container--top-right";case"tc":case"tm":return"js-snackbar-container--top-center";case"bc":case"bm":return"js-snackbar-container--bottom-center";default:return"js-snackbar-container--bottom-right"}}this.Open=function(){var e=function(){const e=window.getComputedStyle(s);return n.scrollHeight+parseFloat(e.getPropertyValue("padding-top"))+parseFloat(e.getPropertyValue("padding-bottom"))}();a.style.height=e+"px",a.style.opacity=1,a.style.marginTop="5px",a.style.marginBottom="5px",a.addEventListener("transitioned",(function(){a.removeEventListener("transitioned",arguments.callee),a.style.height=null}))},this.Close=function(){t&&clearInterval(t);var e=a.scrollHeight,n=a.style.transition;a.style.transition="",requestAnimationFrame((function(){a.style.height=e+"px",a.style.opacity=1,a.style.marginTop="0px",a.style.marginBottom="0px",a.style.transition=n,requestAnimationFrame((function(){a.style.height="0px",a.style.opacity=0}))})),setTimeout((function(){r.removeChild(a)}),1e3)},_Options={message:e?.message??"Operation performed successfully.",dismissible:e?.dismissible??!0,timeout:e?.timeout??5e3,status:e?.status?e.status.toLowerCase().trim():"",actions:e?.actions??[],fixed:e?.fixed??!1,position:e?.position??"br",container:e?.container??document.body,width:e?.width,speed:e?.speed,icon:e?.icon},void 0===(p="string"==typeof _Options.container?document.querySelector(_Options.container):_Options.container)&&(console.warn("SnackBar: Could not find target container "+_Options.container),p=document.body),r=function(e){for(var t,a=d(),r=0;r<e.children.length;r++)if(1===(t=e.children.item(r)).nodeType&&t.classList.length>0&&t.classList.contains("js-snackbar-container")&&t.classList.contains(a))return t;return function(e){var t=document.createElement("div");return t.classList.add("js-snackbar-container"),_Options.fixed&&t.classList.add("js-snackbar-container--fixed"),e.appendChild(t),t}(e)}(p),function(){r.classList.add(d());var e="js-snackbar-container--fixed";_Options.fixed?r.classList.add(e):r.classList.remove(e)}(),i=function(){var e,t=document.createElement("div");return t.classList.add("js-snackbar__wrapper"),t.style.height="0px",t.style.opacity="0",t.style.marginTop="0px",t.style.marginBottom="0px",e=t,_Options.width&&(e.style.width=_Options.width),function(e){const{speed:t}=_Options;switch(typeof t){case"number":e.style.transitionDuration=t+"ms";break;case"string":e.style.transitionDuration=t}}(t),t}(),o=function(){var e,t=document.createElement("div");return t.classList.add("js-snackbar","js-snackbar--show"),function(e){if(_Options.status){var t=document.createElement("span");t.classList.add("js-snackbar__status"),a(t),r(t),e.appendChild(t)}function a(e){switch(_Options.status){case"success":case"green":e.classList.add("js-snackbar--success");break;case"warning":case"alert":case"orange":e.classList.add("js-snackbar--warning");break;case"danger":case"error":case"red":e.classList.add("js-snackbar--danger");break;default:e.classList.add("js-snackbar--info")}}function r(e){if(_Options.icon){var t=document.createElement("span");switch(t.classList.add("js-snackbar__icon"),_Options.icon){case"exclamation":case"warn":case"danger":t.innerText="!";break;case"info":case"question":case"question-mark":t.innerText="?";break;case"plus":case"add":t.innerText="+";break;default:_Options.icon.length>1&&console.warn("Invalid icon character provided: ",_Options.icon),t.innerText=_Options.icon.substr(0,1)}e.appendChild(t)}}}(t),e=t,(s=document.createElement("div")).classList.add("js-snackbar__message-wrapper"),(n=document.createElement("span")).classList.add("js-snackbar__message"),n.innerHTML=_Options.message,s.appendChild(n),e.appendChild(s),function(e){if("object"==typeof _Options.actions)for(var t=0;t<_Options.actions.length;t++)a(e,_Options.actions[t]);function a(e,t){var a=document.createElement("span");a.classList.add("js-snackbar__action"),a.textContent=t.text,"function"==typeof t.function?!0===t.dismiss?a.onclick=function(){t.function(),l.Close()}:a.onclick=t.function:a.onclick=l.Close,e.appendChild(a)}}(t),function(e){if(_Options.dismissible){var t=document.createElement("span");t.classList.add("js-snackbar__close"),t.innerText="×",t.onclick=l.Close,e.appendChild(t)}}(t),t}(),i.appendChild(o),a=i,r.appendChild(a),!1!==_Options.timeout&&_Options.timeout>0&&(t=setTimeout(l.Close,_Options.timeout)),l.Open()}}},t={};function a(r){var n=t[r];if(void 0!==n)return n.exports;var s=t[r]={exports:{}};return e[r](s,s.exports,a),s.exports}a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var r in t)a.o(t,r)&&!a.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";const e={currentInsertPosition:{index:0,obj:!1},itemData:!1,selected:{templateStyle:!1,templateCategory:!1},premium:!1,search:!1},t="gutenberg",r="site-editor",n="elementor",s="dashboard",i="keydown.superbaddons.escapetoclose",o=(e,t)=>{jQuery(t).off(i),jQuery(t).on(i,(t=>{p(e,t)}))},p=(e,t)=>{27==(t.keyCode||t.which)&&(console.log("Escape key pressed"),e.CloseModalOrFrame())};var l=a(767),d=a.n(l);function c(e,t,a){!function(e,t){if(t.has(e))throw new TypeError("Cannot initialize the same private elements twice on an object")}(e,t),t.set(e,a)}function u(e,t){return function(e,t){return t.get?t.get.call(e):t.value}(e,m(e,t,"get"))}function b(e,t,a){return function(e,t,a){if(t.set)t.set.call(e,a);else{if(!t.writable)throw new TypeError("attempted to set read only private field");t.value=a}}(e,m(e,t,"set"),a),a}function m(e,t,a){if(!t.has(e))throw new TypeError("attempted to "+a+" private field on non-instance");return t.get(e)}var y=new WeakMap,h=new WeakMap,f=new WeakMap,g=new WeakMap,w=new WeakMap,v=new WeakMap,k=new WeakMap,L=new WeakMap,G=new WeakMap,j=new WeakMap,_=new WeakMap;const W=new class{constructor(){c(this,y,{writable:!0,value:void 0}),c(this,h,{writable:!0,value:void 0}),c(this,f,{writable:!0,value:!1}),c(this,g,{writable:!0,value:!1}),c(this,w,{writable:!0,value:!1}),c(this,v,{writable:!0,value:{}}),c(this,k,{writable:!0,value:{Insert:"insert",List:"list"}}),c(this,L,{writable:!0,value:!1}),c(this,G,{writable:!0,value:!1}),c(this,j,{writable:!0,value:!1}),c(this,_,{writable:!0,value:!1})}Initialize(e,a){switch(e){case t:case r:case n:case s:b(this,f,e);break;default:return void console.error("Invalid Library Location: "+e)}b(this,g,a),b(this,y,jQuery("#tmpl-superbaddons-superb-library-page").text()),b(this,h,jQuery("#tmpl-superbaddons-superb-library-item").text());const i=this;switch(u(this,f)){case s:b(this,G,jQuery("#spbaddons-admindashboard-library-wrapper")),i.LibraryButtonClickHandler(!1);break;case n:b(this,G,jQuery("body"));break;case t:b(this,G,jQuery("#editor"));break;case r:b(this,G,jQuery("#site-editor"))}(e=>{switch(e.GetLocation()){case s:case t:case r:o(e,window);break;case n:o(e,window),o(e,window.elementor.$previewContents)}})(i)}CloseModalOrFrame(){const e=this;(e.IsModalOpen()||e.IsFrameOpen())&&(e.IsModalOpen()?e.DisplayPreviewFrame(!1):e.IsFrameOpen()&&e.GetLocation()!==s&&e.DisplayLibraryFrame(!1))}GetItemName(e){return e.style?e.title+" - "+e.style.title:e.title}GetActions(){return u(this,g)}GetLocationBody(){return u(this,G)}GetLocation(){return u(this,f)}IsModalOpen(){return u(this,j)}IsFrameOpen(){return u(this,_)}GetLibraryPageTemplate(){return u(this,y)}GetLibraryItemTemplate(){return u(this,h)}GetWrapper(){return u(this,L)}SetCurrentTab(e){b(this,w,e)}GetCurrentTab(){return u(this,w)}SetTabMenuData(e){e.routes&&e.routes.list?u(this,v)[e.id]=e:console.error("Invalid Menu Item Routes on Menu Item: "+e.id)}GetRoute(e){return u(this,v)[this.GetCurrentTab()].routes[e]}GetTabTitle(){return u(this,v)[this.GetCurrentTab()].title}LibraryButtonClickHandler(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const t=this,a=t.GetLocationBody();if(e&&e(),t.GetWrapper())return t.DisplayLibraryFrame(),void t.DisplayLibraryLoader(!1);if(b(t,L,jQuery(t.GetLibraryPageTemplate())),a.append(t.GetWrapper()),t.DisplayLibraryFrame(),t.GetWrapper().find(".superb-addons-template-library-close-btn, .superb-addons-template-library-wrapper-overlay").on("click",(function(){t.DisplayLibraryFrame(!1)})),!superblayoutlibrary_g.menu_items||superblayoutlibrary_g.menu_items.length<=0)return void console.error("No Menu Items Set in Localized Data");const r="#superb-addons-template-library-header-menu .superb-addons-template-library-header-menu-item",n=t.GetWrapper().find(r);superblayoutlibrary_g.menu_items.forEach((e=>{const a=n.clone();a.data("id",e.id),t.SetTabMenuData(e),a.text(e.title),e.hidden&&a.css("display","none"),t.GetWrapper().find("#superb-addons-template-library-header-menu").append(a)})),n.remove();const s="superb-addons-template-library-header-menu-item-active";t.GetWrapper().find(r).on("click",(function(){jQuery(this).hasClass(s)||(t.GetWrapper().find(r).removeClass(s),jQuery(this).addClass(s),t.SwitchLibraryTab(jQuery(this).data("id")))})),t.GetWrapper().find(r).first().trigger("click")}SwitchLibraryTab(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.DisplayLibraryLoader();const t=this;e&&t.SetCurrentTab(e),jQuery.get({url:superblayoutlibrary_g.rest.base+superblayoutlibrary_g.rest.namespace+t.GetRoute(u(t,k).List),beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",superblayoutlibrary_g.rest.nonce)}}).done((function(e){t.DisplayLibrarySearchElements(),t.HandleDOMUpdate(e)})).fail((function(){t.ClearDOMItemList(),t.DisplayLibrarySearchElements(!1),t.SnackListError()})).always((function(){t.GetWrapper().find(".superb-addons-template-library-footer-excerpt span").text(t.GetTabTitle().toLowerCase()),t.DisplayLibraryLoader(!1),t.ResetContentListHeightCalculation(t)}))}ResetContentListHeightCalculation(e){const t=e.GetWrapper().find(".superb-addons-template-library-page-header").outerHeight()+e.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").outerHeight()+e.GetWrapper().find("#superb-addons-template-library-header-menu").outerHeight();e.GetWrapper().find(".superb-addons-template-library-page-content-list").css("height","calc(100% - "+t+"px)")}DisplayLibrarySearchElements(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?this.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").hide():this.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").show()}DisplayPreviewFrame(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(b(this,j,!1),this.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeOut("fast")):(b(this,j,!0),this.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeIn("fast"))}LoadPreviewFrame(t,a){const r=this,n=r.GetItemName(t),i=t.preview,o=t.demo,p=r.GetWrapper().find(".superb-addons-template-library-preview-image-wrapper .superbaddons-spinner-wrapper");p.show();const l=r.GetWrapper().find("#superb-addons-template-library-preview");l.css("opacity","0");const d=r.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-insert-btn");d.off();const c=r.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-preview-btn");r.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-premium-btn"),r.GetWrapper().find(".superb-addons-template-library-preview-wrapper").off(),r.GetWrapper().find("#superb-addons-template-library-preview").off(),r.GetWrapper().find("#superb-addons-template-library-preview-close-button").off(),r.GetWrapper().find("#superb-addons-template-library-preview-close-button, .superb-addons-template-library-preview-overlay").on("click",(function(){r.DisplayPreviewFrame(!1)})),r.GetWrapper().find(".superb-addons-template-library-preview-title").text(n),""===o?(r.GetWrapper().find(".superb-addons-template-library-preview-left-livepreview-explain").hide(),c.hide()):(r.GetWrapper().find(".superb-addons-template-library-preview-left-livepreview-explain").show(),c.show()),c.attr("href",o);const u=r.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-free-element"),b=r.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-premium-element"),m=r.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-premium-element-badge");"premium"!==t.package?(u.show(),b.hide(),m.hide(),d.on("click",(function(){a.trigger("click")})),r.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-library-item-available-badge").show()):(m.show(),e.premium?(u.show(),b.hide()):(u.hide(),r.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-library-item-available-badge").hide(),b.show())),r.GetWrapper().find("#superb-addons-template-library-preview").on("load",(function(){p.hide(),l.css("opacity","1")})),r.GetWrapper().find("#superb-addons-template-library-preview").attr("src",i),r.GetLocation()!==s?r.GetWrapper().find(".superbaddons-library-item-available-badge").remove():r.GetWrapper().find(".superbaddons-item-free-element").remove(),r.DisplayPreviewFrame()}DisplayLibraryLoader(){const e=this;arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(this.DisplayPreviewFrame(!1),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-loading").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-template-library-page-content-inner").fadeIn("fast")):(this.DisplayPreviewFrame(!1),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-template-library-page-content-inner").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-loading").fadeIn("fast"))}DisplayLibraryFrame(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(b(this,_,!1),this.GetWrapper().fadeOut("fast")):(b(this,_,!0),this.GetWrapper().fadeIn("fast"))}HandleDOMUpdate(t){const a=this,r=a.GetWrapper().find("#superb-addons-template-library-page-category-select");r.off(),r.text(""),t.categories&&t.categories.length>0?(r.append("<option></option>"),t.categories.forEach((function(e){const t=jQuery("<option></option>");t.text(e.title),t.attr("value",e.id),r.append(t)})),r.select2({placeholder:superblayoutlibrary_g.category_placeholder,allowClear:!0}),r.on("change",(function(){""!==jQuery(this).val()?jQuery(this).addClass("superb-addons-select-has-selection"):jQuery(this).removeClass("superb-addons-select-has-selection"),e.selected.templateCategory=jQuery(this).val(),a.HandleDOMTemplateElementsUpdate()}))):r.hide();const n=a.GetWrapper().find("#superb-addons-template-library-page-style-select");n.off(),n.text("");let s=!1;t.styles&&t.styles.length>0?(n.append("<option></option>"),t.styles.forEach((function(e){const t=jQuery("<option></option>");t.text(e.title),t.attr("value",e.id),n.append(t)})),s=n.find("option:nth-of-type(2)"),n.val(s.val()),n.addClass("superb-addons-select-has-selection"),n.select2({placeholder:superblayoutlibrary_g.style_placeholder,allowClear:!0}),n.on("change",(function(){""!==jQuery(this).val()?jQuery(this).addClass("superb-addons-select-has-selection"):jQuery(this).removeClass("superb-addons-select-has-selection"),e.selected.templateStyle=jQuery(this).val(),a.HandleDOMTemplateElementsUpdate()}))):n.hide();const i=a.GetWrapper().find("#superb-addons-template-library-page-search-input");i.off(),i.on("input",(function(){if(jQuery(this).val().length>0){jQuery(this).parent().addClass("superb-addons-search-has-input");let t=jQuery(this).val();t=t.split(" "),e.search="(?=.*"+t.join(")(?=.*")+")",a.HandleDOMTemplateElementsUpdate()}else jQuery(this).parent().removeClass("superb-addons-search-has-input"),e.search?(e.search=!1,a.HandleDOMTemplateElementsUpdate()):e.search=!1})),e.premium=t.premium,e.itemData=t.items,e.selected.templateStyle=!!s&&s.val(),this.HandleDOMTemplateElementsUpdate()}ClearDOMItemList(){this.GetWrapper().find(".superb-addons-template-library-page-content-inner-list").text("")}HandleDOMTemplateElementsUpdate(){const t=this;t.ClearDOMItemList();const a=e.itemData,r=e.selected.templateStyle,n=e.selected.templateCategory,i=e.search;a.forEach((function(a){const o=a.style?a.title+" "+a.style.title:a.title;if(i&&i.length>=3&&o.search(new RegExp(".*?"+i,"i")))return;if(r&&""!==r&&r!==a.style.id)return;if(n&&a.categories.some((e=>e.id!==n)))return;const p=jQuery(t.GetLibraryItemTemplate()),l="premium"!==a.package,d=p.find(".superb-addons-template-library-preview-image-img-actual"),c=p.find(".superb-addons-template-library-preview-image-img-placeholder");if(d.on("load",(function(){c.remove()})),c.fadeIn("slow"),d.attr("src",a.thumb),l&&p.find(".superbaddons-item-premium-element-badge").remove(),l||e.premium){p.find(".superbaddons-item-premium-element").remove();var u=p.find(".superb-addons-template-library-template-item-insert-btn");u.data("id",a.id),u.data("package",a.package),u.on("click",(function(){t.InsertButtonClickHandler(jQuery(this))})),t.GetLocation()===s&&p.find(".superbaddons-item-free-element").remove()}else p.find(".superbaddons-item-free-element").remove(),t.GetLocation()===s&&p.find(".superbaddons-library-item-available-badge").remove();t.GetLocation()!==s&&p.find(".superbaddons-library-item-available-badge").remove(),p.find(".superb-addons-template-library-template-item-name").text(t.GetItemName(a)),p.find(".superb-addons-template-library-template-item-preview-btn").on("click",(function(e){t.LoadPreviewFrame(a,u)})),jQuery(".superb-addons-template-library-page-content-inner-list").append(p)}))}InsertButtonClickHandler(t){const a=this;a.DisplayLibraryLoader();const r=t.data("id"),n=t.data("package");jQuery.get({url:superblayoutlibrary_g.rest.base+superblayoutlibrary_g.rest.namespace+a.GetRoute(u(a,k).Insert)+"?id="+r+"&package="+n,beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",superblayoutlibrary_g.rest.nonce)}}).done((function(t){if(t.access_failed)return t.premium!==e.premium?(e.premium=t.premium,a.SnackInsertError(),void a.SwitchLibraryTab()):(a.SnackInsertError(),void a.DisplayLibraryLoader(!1));t.premium!==e.premium&&(e.premium=t.premium,a.SwitchLibraryTab());const r=a.GetActions();r&&r.Insert?r.Insert(t):console.error("Missing Library Insert Action"),a.DisplayLibraryFrame(!1)})).fail((function(){a.SnackInsertError(),a.DisplayLibraryLoader(!1)}))}SnackInsertError(){this.DangerSnackBar(superblayoutlibrary_g.snacks.insert_error)}SnackListError(){this.DangerSnackBar(superblayoutlibrary_g.snacks.list_error)}DangerSnackBar(e){d()({message:e,timeout:8e3,position:"bl",status:"error",icon:"danger",fixed:!0,container:".superb-addons-template-library-page-frame"})}},C=function(){let e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];const t=jQuery(".superbaddons-spinner-wrapper"),a=jQuery("#superbaddons-install-elementor-wrapper .superbaddons-element-button");e?(a.hide(),t.show()):(a.show(),t.hide())};jQuery(document).ready((function(e){jQuery("#superbaddons-install-elementor-wrapper").length<=0||(jQuery("#superbaddons-install-elementor-wrapper .superbaddons-element-button").attr("href",null),jQuery("#superbaddons-install-elementor-wrapper .superbaddons-element-button").parent().append(jQuery(".superbaddons-spinner-wrapper")),jQuery("#superbaddons-install-elementor-wrapper .superbaddons-element-button").on("click",(function(){(async()=>{C();const e=await async function(e,t,a){let r=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"";const n=await fetch(e,{method:"POST",credentials:"same-origin",headers:{"Content-Type":"application/x-www-form-urlencoded;charset=UTF-8","X-WP-Nonce":t},body:"action="+a+r});return 200!==n.status?{success:!1,text:"Unknown error occured. Please contact support if the issue persists."}:n.json()}(superblayoutlibrary_g.rest.base+superblayoutlibrary_g.rest.namespace+superblayoutlibrary_g.rest.routes.settings,superblayoutlibrary_g.rest.nonce,"getelementor");if(!e.success)return C(!1),void d()({message:e.text,timeout:8e3,position:"bl",status:"error",fixed:!0,icon:"danger",container:"#wpcontent"});location.reload()})()}))),e("#superbaddons-elementor-is-active-wrapper").length<=0||W.Initialize(s)}))})()})();