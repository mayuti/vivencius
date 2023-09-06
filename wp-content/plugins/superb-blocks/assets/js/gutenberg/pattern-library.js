(()=>{var e={44:()=>{var e;e=(0,wp.element.createElement)(wp.primitives.SVG,{width:20,height:20,viewBox:"0 0 20 20"},React.createElement("g",null,React.createElement("path",{d:"M1.34082 2.23464C1.34082 1.00048 2.3413 0 3.57546 0H10.7263C11.9605 0 12.9609 1.00048 12.9609 2.23464V14.4134C12.9609 15.6476 11.9605 16.648 10.7263 16.648H3.57546C2.3413 16.648 1.34082 15.6476 1.34082 14.4134V2.23464Z",fill:"url(#paint0_linear_127_6093)"}),React.createElement("path",{d:"M7.15088 5.58718C7.15088 4.35302 8.15136 3.35254 9.38552 3.35254H16.5364C17.7705 3.35254 18.771 4.35302 18.771 5.58718V17.7659C18.771 19.0001 17.7705 20.0006 16.5364 20.0006H9.38552C8.15136 20.0006 7.15088 19.0001 7.15088 17.7659V5.58718Z",fill:"url(#paint1_linear_127_6093)"}),React.createElement("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M12.9609 3.35254V14.414C12.9609 15.6481 11.9605 16.6486 10.7263 16.6486H7.15088V5.58718C7.15088 4.35302 8.15136 3.35254 9.38552 3.35254H12.9609Z",fill:"#3300FF"}),React.createElement("defs",null,React.createElement("linearGradient",{id:"paint0_linear_127_6093",x1:"2.34641",y1:"16.648",x2:"11.7877",y2:"-2.27071e-07",gradientUnits:"userSpaceOnUse"},React.createElement("stop",{"stop-color":"#7000FF"}),React.createElement("stop",{offset:"1","stop-color":"#FA00FF"})),React.createElement("linearGradient",{id:"paint1_linear_127_6093",x1:"8.37993",y1:"20.0006",x2:"17.933",y2:"3.68774",gradientUnits:"userSpaceOnUse"},React.createElement("stop",{"stop-color":"#4312E2"}),React.createElement("stop",{offset:"1","stop-color":"#00D1FF"}))))),wp.blocks.updateCategory("superb-addons-blocks",{icon:e})},767:e=>{e.exports=function(e){var t,r,a,n,i,s,o,p,l=this;function d(){switch(_Options.position){case"bl":return"js-snackbar-container--bottom-left";case"tl":return"js-snackbar-container--top-left";case"tr":return"js-snackbar-container--top-right";case"tc":case"tm":return"js-snackbar-container--top-center";case"bc":case"bm":return"js-snackbar-container--bottom-center";default:return"js-snackbar-container--bottom-right"}}this.Open=function(){var e=function(){const e=window.getComputedStyle(i);return n.scrollHeight+parseFloat(e.getPropertyValue("padding-top"))+parseFloat(e.getPropertyValue("padding-bottom"))}();r.style.height=e+"px",r.style.opacity=1,r.style.marginTop="5px",r.style.marginBottom="5px",r.addEventListener("transitioned",(function(){r.removeEventListener("transitioned",arguments.callee),r.style.height=null}))},this.Close=function(){t&&clearInterval(t);var e=r.scrollHeight,n=r.style.transition;r.style.transition="",requestAnimationFrame((function(){r.style.height=e+"px",r.style.opacity=1,r.style.marginTop="0px",r.style.marginBottom="0px",r.style.transition=n,requestAnimationFrame((function(){r.style.height="0px",r.style.opacity=0}))})),setTimeout((function(){a.removeChild(r)}),1e3)},_Options={message:e?.message??"Operation performed successfully.",dismissible:e?.dismissible??!0,timeout:e?.timeout??5e3,status:e?.status?e.status.toLowerCase().trim():"",actions:e?.actions??[],fixed:e?.fixed??!1,position:e?.position??"br",container:e?.container??document.body,width:e?.width,speed:e?.speed,icon:e?.icon},void 0===(p="string"==typeof _Options.container?document.querySelector(_Options.container):_Options.container)&&(console.warn("SnackBar: Could not find target container "+_Options.container),p=document.body),a=function(e){for(var t,r=d(),a=0;a<e.children.length;a++)if(1===(t=e.children.item(a)).nodeType&&t.classList.length>0&&t.classList.contains("js-snackbar-container")&&t.classList.contains(r))return t;return function(e){var t=document.createElement("div");return t.classList.add("js-snackbar-container"),_Options.fixed&&t.classList.add("js-snackbar-container--fixed"),e.appendChild(t),t}(e)}(p),function(){a.classList.add(d());var e="js-snackbar-container--fixed";_Options.fixed?a.classList.add(e):a.classList.remove(e)}(),s=function(){var e,t=document.createElement("div");return t.classList.add("js-snackbar__wrapper"),t.style.height="0px",t.style.opacity="0",t.style.marginTop="0px",t.style.marginBottom="0px",e=t,_Options.width&&(e.style.width=_Options.width),function(e){const{speed:t}=_Options;switch(typeof t){case"number":e.style.transitionDuration=t+"ms";break;case"string":e.style.transitionDuration=t}}(t),t}(),o=function(){var e,t=document.createElement("div");return t.classList.add("js-snackbar","js-snackbar--show"),function(e){if(_Options.status){var t=document.createElement("span");t.classList.add("js-snackbar__status"),r(t),a(t),e.appendChild(t)}function r(e){switch(_Options.status){case"success":case"green":e.classList.add("js-snackbar--success");break;case"warning":case"alert":case"orange":e.classList.add("js-snackbar--warning");break;case"danger":case"error":case"red":e.classList.add("js-snackbar--danger");break;default:e.classList.add("js-snackbar--info")}}function a(e){if(_Options.icon){var t=document.createElement("span");switch(t.classList.add("js-snackbar__icon"),_Options.icon){case"exclamation":case"warn":case"danger":t.innerText="!";break;case"info":case"question":case"question-mark":t.innerText="?";break;case"plus":case"add":t.innerText="+";break;default:_Options.icon.length>1&&console.warn("Invalid icon character provided: ",_Options.icon),t.innerText=_Options.icon.substr(0,1)}e.appendChild(t)}}}(t),e=t,(i=document.createElement("div")).classList.add("js-snackbar__message-wrapper"),(n=document.createElement("span")).classList.add("js-snackbar__message"),n.innerHTML=_Options.message,i.appendChild(n),e.appendChild(i),function(e){if("object"==typeof _Options.actions)for(var t=0;t<_Options.actions.length;t++)r(e,_Options.actions[t]);function r(e,t){var r=document.createElement("span");r.classList.add("js-snackbar__action"),r.textContent=t.text,"function"==typeof t.function?!0===t.dismiss?r.onclick=function(){t.function(),l.Close()}:r.onclick=t.function:r.onclick=l.Close,e.appendChild(r)}}(t),function(e){if(_Options.dismissible){var t=document.createElement("span");t.classList.add("js-snackbar__close"),t.innerText="×",t.onclick=l.Close,e.appendChild(t)}}(t),t}(),s.appendChild(o),r=s,a.appendChild(r),!1!==_Options.timeout&&_Options.timeout>0&&(t=setTimeout(l.Close,_Options.timeout)),l.Open()}}},t={};function r(a){var n=t[a];if(void 0!==n)return n.exports;var i=t[a]={exports:{}};return e[a](i,i.exports,r),i.exports}r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var a in t)r.o(t,a)&&!r.o(e,a)&&Object.defineProperty(e,a,{enumerable:!0,get:t[a]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";r(44);const e={currentInsertPosition:{index:0,obj:!1},itemData:!1,selected:{templateStyle:!1,templateCategory:!1},premium:!1,search:!1},t="gutenberg",a="site-editor",n="elementor",i="dashboard",s="keydown.superbaddons.escapetoclose",o=(e,t)=>{jQuery(t).off(s),jQuery(t).on(s,(t=>{p(e,t)}))},p=(e,t)=>{27==(t.keyCode||t.which)&&e.CloseModalOrFrame()};var l=r(767),d=r.n(l);const c="superbaddons-library-loaded",u=e=>{document.dispatchEvent(new Event(e))};function b(e,t,r){!function(e,t){if(t.has(e))throw new TypeError("Cannot initialize the same private elements twice on an object")}(e,t),t.set(e,r)}function m(e,t){return function(e,t){return t.get?t.get.call(e):t.value}(e,h(e,t,"get"))}function y(e,t,r){return function(e,t,r){if(t.set)t.set.call(e,r);else{if(!t.writable)throw new TypeError("attempted to set read only private field");t.value=r}}(e,h(e,t,"set"),r),r}function h(e,t,r){if(!t.has(e))throw new TypeError("attempted to "+r+" private field on non-instance");return t.get(e)}var f=new WeakMap,g=new WeakMap,v=new WeakMap,w=new WeakMap,k=new WeakMap,L=new WeakMap,_=new WeakMap,G=new WeakMap,C=new WeakMap,I=new WeakMap,W=new WeakMap;const j=new class{constructor(){b(this,f,{writable:!0,value:void 0}),b(this,g,{writable:!0,value:void 0}),b(this,v,{writable:!0,value:!1}),b(this,w,{writable:!0,value:!1}),b(this,k,{writable:!0,value:!1}),b(this,L,{writable:!0,value:{}}),b(this,_,{writable:!0,value:{Insert:"insert",List:"list"}}),b(this,G,{writable:!0,value:!1}),b(this,C,{writable:!0,value:!1}),b(this,I,{writable:!0,value:!1}),b(this,W,{writable:!0,value:!1})}Initialize(e,r){switch(e){case t:case a:case n:case i:y(this,v,e);break;default:return void console.error("Invalid Library Location: "+e)}y(this,w,r),y(this,f,jQuery("#tmpl-superbaddons-superb-library-page").text()),y(this,g,jQuery("#tmpl-superbaddons-superb-library-item").text());const s=this;switch(m(this,v)){case i:y(this,C,jQuery("#spbaddons-admindashboard-library-wrapper")),s.LibraryButtonClickHandler(!1);break;case n:y(this,C,jQuery("body"));break;case t:y(this,C,jQuery("#editor"));break;case a:y(this,C,jQuery("#site-editor"))}(e=>{switch(e.GetLocation()){case i:case t:case a:o(e,window);break;case n:o(e,window),o(e,window.elementor.$previewContents)}})(s),u("superbaddons-library-initialized")}CloseModalOrFrame(){const e=this;(e.IsModalOpen()||e.IsFrameOpen())&&(e.IsModalOpen()?e.DisplayPreviewFrame(!1):e.IsFrameOpen()&&e.GetLocation()!==i&&e.DisplayLibraryFrame(!1))}GetItemName(e){return e.style?e.title+" - "+e.style.title:e.title}GetActions(){return m(this,w)}GetLocationBody(){return m(this,C)}GetLocation(){return m(this,v)}IsModalOpen(){return m(this,I)}IsFrameOpen(){return m(this,W)}GetLibraryPageTemplate(){return m(this,f)}GetLibraryItemTemplate(){return m(this,g)}GetWrapper(){return m(this,G)}SetCurrentTab(e){y(this,k,e)}GetCurrentTab(){return m(this,k)}SetTabMenuData(e){e.routes&&e.routes.list?m(this,L)[e.id]=e:console.error("Invalid Menu Item Routes on Menu Item: "+e.id)}GetRoute(e){return m(this,L)[this.GetCurrentTab()].routes[e]}GetTabTitle(){return m(this,L)[this.GetCurrentTab()].title}LibraryButtonClickHandler(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];const t=this,r=t.GetLocationBody();if(e&&e(),t.GetWrapper())return t.DisplayLibraryFrame(),t.DisplayLibraryLoader(!1),void u(c);if(y(t,G,jQuery(t.GetLibraryPageTemplate())),r.append(t.GetWrapper()),t.DisplayLibraryFrame(),t.GetWrapper().find(".superb-addons-template-library-close-btn, .superb-addons-template-library-wrapper-overlay").on("click",(function(){t.DisplayLibraryFrame(!1)})),!superblayoutlibrary_g.menu_items||superblayoutlibrary_g.menu_items.length<=0)return void console.error("No Menu Items Set in Localized Data");const a="#superb-addons-template-library-header-menu .superb-addons-template-library-header-menu-item",n=t.GetWrapper().find(a);superblayoutlibrary_g.menu_items.forEach((e=>{const r=n.clone();r.data("id",e.id),t.SetTabMenuData(e),r.text(e.title),e.hidden&&r.css("display","none"),t.GetWrapper().find("#superb-addons-template-library-header-menu").append(r)})),n.remove();const i="superb-addons-template-library-header-menu-item-active";t.GetWrapper().find(a).on("click",(function(){jQuery(this).hasClass(i)||(t.GetWrapper().find(a).removeClass(i),jQuery(this).addClass(i),t.SwitchLibraryTab(jQuery(this).data("id")))})),t.GetWrapper().find(a).first().trigger("click")}SwitchLibraryTab(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];this.DisplayLibraryLoader();const t=this;e&&t.SetCurrentTab(e),jQuery.get({url:superblayoutlibrary_g.rest.base+superblayoutlibrary_g.rest.namespace+t.GetRoute(m(t,_).List),beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",superblayoutlibrary_g.rest.nonce)}}).done((function(e){t.DisplayLibrarySearchElements(),t.HandleDOMUpdate(e)})).fail((function(){t.ClearDOMItemList(),t.DisplayLibrarySearchElements(!1),t.SnackListError()})).always((function(){t.GetWrapper().find(".superb-addons-template-library-footer-excerpt span").text(t.GetTabTitle().toLowerCase()),t.DisplayLibraryLoader(!1),t.ResetContentListHeightCalculation(t),u(c)}))}ResetContentListHeightCalculation(e){const t=e.GetWrapper().find(".superb-addons-template-library-page-header").outerHeight()+e.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").outerHeight()+e.GetWrapper().find("#superb-addons-template-library-header-menu").outerHeight();e.GetWrapper().find(".superb-addons-template-library-page-content-list").css("height","calc(100% - "+t+"px)")}DisplayLibrarySearchElements(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?this.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").hide():this.GetWrapper().find(".superb-addons-template-library-page-content-inner-menu").show()}DisplayPreviewFrame(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(y(this,I,!1),this.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeOut("fast")):(y(this,I,!0),this.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeIn("fast"))}LoadPreviewFrame(t,r){const a=this,n=a.GetItemName(t),s=t.preview,o=t.demo,p=a.GetWrapper().find(".superb-addons-template-library-preview-image-wrapper .superbaddons-spinner-wrapper");p.show();const l=a.GetWrapper().find("#superb-addons-template-library-preview");l.css("opacity","0");const d=a.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-insert-btn");d.off();const c=a.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-preview-btn");a.GetWrapper().find(".superb-addons-template-library-preview-top .superb-addons-template-library-template-item-premium-btn"),a.GetWrapper().find(".superb-addons-template-library-preview-wrapper").off(),a.GetWrapper().find("#superb-addons-template-library-preview").off(),a.GetWrapper().find("#superb-addons-template-library-preview-close-button").off(),a.GetWrapper().find("#superb-addons-template-library-preview-close-button, .superb-addons-template-library-preview-overlay").on("click",(function(){a.DisplayPreviewFrame(!1)})),a.GetWrapper().find(".superb-addons-template-library-preview-title").text(n),""===o?(a.GetWrapper().find(".superb-addons-template-library-preview-left-livepreview-explain").hide(),c.hide()):(a.GetWrapper().find(".superb-addons-template-library-preview-left-livepreview-explain").show(),c.show()),c.attr("href",o);const u=a.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-free-element"),b=a.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-premium-element"),m=a.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-item-premium-element-badge");"premium"!==t.package?(u.show(),b.hide(),m.hide(),d.on("click",(function(){r.trigger("click")})),a.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-library-item-available-badge").show()):(m.show(),e.premium?(u.show(),b.hide()):(u.hide(),a.GetWrapper().find(".superb-addons-template-library-preview-modal .superbaddons-library-item-available-badge").hide(),b.show())),a.GetWrapper().find("#superb-addons-template-library-preview").on("load",(function(){p.hide(),l.css("opacity","1")})),a.GetWrapper().find("#superb-addons-template-library-preview").attr("src",s),a.GetLocation()!==i?a.GetWrapper().find(".superbaddons-library-item-available-badge").remove():a.GetWrapper().find(".superbaddons-item-free-element").remove(),a.DisplayPreviewFrame()}DisplayLibraryLoader(){const e=this;arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(this.DisplayPreviewFrame(!1),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-loading").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-template-library-page-content-inner").fadeIn("fast")):(this.DisplayPreviewFrame(!1),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-template-library-page-content-inner").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-preview-wrapper").fadeOut("fast"),e.GetWrapper().find(".superb-addons-template-library-page-content .superb-addons-loading").fadeIn("fast"))}DisplayLibraryFrame(){arguments.length>0&&void 0!==arguments[0]&&!arguments[0]?(y(this,W,!1),this.GetWrapper().fadeOut("fast"),u("superbaddons-library-closed")):(y(this,W,!0),this.GetWrapper().fadeIn("fast"),u("superbaddons-library-opened"))}HandleDOMUpdate(t){const r=this,a=r.GetWrapper().find("#superb-addons-template-library-page-category-select");a.off(),a.text(""),t.categories&&t.categories.length>0?(a.append("<option></option>"),t.categories.forEach((function(e){const t=jQuery("<option></option>");t.text(e.title),t.attr("value",e.id),a.append(t)})),a.select2({placeholder:superblayoutlibrary_g.category_placeholder,allowClear:!0}),a.on("change",(function(){""!==jQuery(this).val()?jQuery(this).addClass("superb-addons-select-has-selection"):jQuery(this).removeClass("superb-addons-select-has-selection"),e.selected.templateCategory=jQuery(this).val(),r.HandleDOMTemplateElementsUpdate()}))):a.hide();const n=r.GetWrapper().find("#superb-addons-template-library-page-style-select");n.off(),n.text("");let i=!1;t.styles&&t.styles.length>0?(n.append("<option></option>"),t.styles.forEach((function(e){const t=jQuery("<option></option>");t.text(e.title),t.attr("value",e.id),n.append(t)})),i=n.find("option:nth-of-type(2)"),n.val(i.val()),n.addClass("superb-addons-select-has-selection"),n.select2({placeholder:superblayoutlibrary_g.style_placeholder,allowClear:!0}),n.on("change",(function(){""!==jQuery(this).val()?jQuery(this).addClass("superb-addons-select-has-selection"):jQuery(this).removeClass("superb-addons-select-has-selection"),e.selected.templateStyle=jQuery(this).val(),r.HandleDOMTemplateElementsUpdate()}))):n.hide();const s=r.GetWrapper().find("#superb-addons-template-library-page-search-input");s.off(),s.on("input",(function(){if(jQuery(this).val().length>0){jQuery(this).parent().addClass("superb-addons-search-has-input");let t=jQuery(this).val();t=t.split(" "),e.search="(?=.*"+t.join(")(?=.*")+")",r.HandleDOMTemplateElementsUpdate()}else jQuery(this).parent().removeClass("superb-addons-search-has-input"),e.search?(e.search=!1,r.HandleDOMTemplateElementsUpdate()):e.search=!1})),e.premium=t.premium,e.itemData=t.items,e.selected.templateStyle=!!i&&i.val(),this.HandleDOMTemplateElementsUpdate()}ClearDOMItemList(){this.GetWrapper().find(".superb-addons-template-library-page-content-inner-list").text("")}HandleDOMTemplateElementsUpdate(){const t=this;t.ClearDOMItemList();const r=e.itemData,a=e.selected.templateStyle,n=e.selected.templateCategory,s=e.search;r.forEach((function(r){const o=r.style?r.title+" "+r.style.title:r.title;if(s&&s.length>=3&&o.search(new RegExp(".*?"+s,"i")))return;if(a&&""!==a&&a!==r.style.id)return;if(n&&r.categories.some((e=>e.id!==n)))return;const p=jQuery(t.GetLibraryItemTemplate()),l="premium"!==r.package,d=p.find(".superb-addons-template-library-preview-image-img-actual"),c=p.find(".superb-addons-template-library-preview-image-img-placeholder");if(d.on("load",(function(){c.remove()})),c.fadeIn("slow"),d.attr("src",r.thumb),l&&p.find(".superbaddons-item-premium-element-badge").remove(),l||e.premium){p.find(".superbaddons-item-premium-element").remove();var u=p.find(".superb-addons-template-library-template-item-insert-btn");u.data("id",r.id),u.data("package",r.package),u.on("click",(function(){t.InsertButtonClickHandler(jQuery(this))})),t.GetLocation()===i&&p.find(".superbaddons-item-free-element").remove()}else p.find(".superbaddons-item-free-element").remove(),t.GetLocation()===i&&p.find(".superbaddons-library-item-available-badge").remove();t.GetLocation()!==i&&p.find(".superbaddons-library-item-available-badge").remove(),p.find(".superb-addons-template-library-template-item-name").text(t.GetItemName(r)),p.find(".superb-addons-template-library-template-item-preview-btn").on("click",(function(e){t.LoadPreviewFrame(r,u)})),jQuery(".superb-addons-template-library-page-content-inner-list").append(p)}))}InsertButtonClickHandler(t){const r=this;r.DisplayLibraryLoader();const a=t.data("id"),n=t.data("package");jQuery.get({url:superblayoutlibrary_g.rest.base+superblayoutlibrary_g.rest.namespace+r.GetRoute(m(r,_).Insert)+"?id="+a+"&package="+n,beforeSend:function(e){e.setRequestHeader("X-WP-Nonce",superblayoutlibrary_g.rest.nonce)}}).done((function(t){if(t.access_failed)return t.premium!==e.premium?(e.premium=t.premium,r.SnackInsertError(),void r.SwitchLibraryTab()):(r.SnackInsertError(),void r.DisplayLibraryLoader(!1));t.premium!==e.premium&&(e.premium=t.premium,r.SwitchLibraryTab());const a=r.GetActions();a&&a.Insert?(a.Insert(t),u("superbaddons-library-inserted")):console.error("Missing Library Insert Action"),r.DisplayLibraryFrame(!1)})).fail((function(){r.SnackInsertError(),r.DisplayLibraryLoader(!1)}))}SnackInsertError(){this.DangerSnackBar(superblayoutlibrary_g.snacks.insert_error)}SnackListError(){this.DangerSnackBar(superblayoutlibrary_g.snacks.list_error)}DangerSnackBar(e){d()({message:e,timeout:8e3,position:"bl",status:"error",icon:"danger",fixed:!0,container:".superb-addons-template-library-page-frame"})}},E=new class{constructor(){}Initialize(){this.Gutenberg=jQuery("#editor"),this.SiteEditor=jQuery("#site-editor"),this.IsFSE=this.SiteEditor.length>0&&0===this.Gutenberg.length,this.Editor=this.IsFSE?this.SiteEditor:this.Gutenberg,this.InitVariables(),this.InsertLibraryButtons(),j.Initialize(this.IsFSE?a:t,{Insert:this.InsertAction})}InsertAction(e){const t=wp.blocks.rawHandler({HTML:e.content}),r=wp.data.select("core/block-editor").getBlockInsertionPoint();r&&r.index?wp.data.dispatch("core/block-editor").insertBlocks(t,r.index,r.rootClientId):wp.data.dispatch("core/block-editor").insertBlocks(t)}InitVariables(){this.InitToolbarButtonVariables(),this.InitPatternsTabButtonVariables(),this.InitAppenderButtonVariables()}InitToolbarButtonVariables(){this.LibraryButtonWrapper=jQuery(jQuery("#tmpl-gutenberg-superb-library-button").html()),this.LibraryButton=this.LibraryButtonWrapper.find(".superbaddons-element-button"),this.LibraryButton.on("click",this.LibraryButtonClick)}InitPatternsTabButtonVariables(){this.LibraryButtonPatternTabWrapper=jQuery(jQuery("#tmpl-gutenberg-superb-library-button-patternstab").html()),this.LibraryButtonPatternTab=this.LibraryButtonPatternTabWrapper.find(".components-button"),this.LibraryButtonPatternTab.on("click",this.LibraryButtonClick)}InitAppenderButtonVariables(){this.LibraryAppenderButtonWrapper=jQuery(jQuery("#tmpl-gutenberg-superb-library-appender-button").html()),this.LibraryAppenderButton=this.LibraryAppenderButtonWrapper.find(".superb-addons-gutenberg-library-button-appender")}InsertLibraryButtons(){const e=this;wp.data.subscribe((function(){setTimeout((function(){e.InsertToolbarButton(e),e.InsertPatternsTabButton(e),e.InsertAppenderButtonInline(e),e.HandleIframeEditorCanvas(e)}),1)}))}InsertToolbarButton(e){e.Editor.find(".superb-addons-gutenberg-library-button-wrapper").length||(e.IsFSE?e.Editor.find(".edit-site-header-edit-mode__start").append(e.LibraryButtonWrapper):e.Editor.find(".edit-post-header-toolbar").append(e.LibraryButtonWrapper))}InsertAppenderButtonInline(e){const t=(arguments.length>1&&void 0!==arguments[1]&&arguments[1]||e.Editor).find(".components-dropdown.block-editor-inserter");t.length&&t.each((function(){const t=jQuery(this);if(t.find(".superb-addons-gutenberg-library-button-appender").length)return;const r=e.LibraryAppenderButtonWrapper.clone();r.on("click",e.LibraryButtonClick),t.append(r)}))}HandleIframeEditorCanvas(e){if(!e.IsFSE)return;const t=window.frames["editor-canvas"];if(!t||!t.document)return;const r=jQuery(t.document).find(".block-list-appender");0!==r.length&&(r.hasClass("superb-addons-escapeevent-attached")||(r.addClass("superb-addons-escapeevent-attached"),o(j,t)),e.InsertAppenderButtonInline(e,r))}InsertPatternsTabButton(e){if(e.IsFSE){const t=e.Editor.find(".edit-site-header-edit-mode__inserter-toggle");if(!t.length)return;t.off("click.superbaddons-watcher"),t.on("click.superbaddons-watcher",(function(){jQuery(this).hasClass("is-pressed")||e.AppendExplorePatternsButton(e,e.Editor)}))}const t=e.Editor.find(".block-editor-inserter__tabs");if(!t.length)return;const r=t.find(".components-button.components-tab-panel__tabs-item");r.length&&(r.off("click.superbaddons-watcher"),r.on("click.superbaddons-watcher",(function(){e.AppendExplorePatternsButton(e,t)})))}AppendExplorePatternsButton(e,t){setTimeout((function(){const r=t.find(".block-editor-inserter__block-patterns-tabs");r.length&&!r.find(".superb-addons-gutenberg-library-button-wrapper").length&&r.children().last().before(e.LibraryButtonPatternTabWrapper)}),1)}LibraryButtonClick(){j.LibraryButtonClickHandler()}};jQuery((function(){E.Initialize()}))})()})();