(()=>{var e={767:e=>{e.exports=function(e){var s,t,o,n,r,a,i,d,c=this;function u(){switch(_Options.position){case"bl":return"js-snackbar-container--bottom-left";case"tl":return"js-snackbar-container--top-left";case"tr":return"js-snackbar-container--top-right";case"tc":case"tm":return"js-snackbar-container--top-center";case"bc":case"bm":return"js-snackbar-container--bottom-center";default:return"js-snackbar-container--bottom-right"}}this.Open=function(){var e=function(){const e=window.getComputedStyle(r);return n.scrollHeight+parseFloat(e.getPropertyValue("padding-top"))+parseFloat(e.getPropertyValue("padding-bottom"))}();t.style.height=e+"px",t.style.opacity=1,t.style.marginTop="5px",t.style.marginBottom="5px",t.addEventListener("transitioned",(function(){t.removeEventListener("transitioned",arguments.callee),t.style.height=null}))},this.Close=function(){s&&clearInterval(s);var e=t.scrollHeight,n=t.style.transition;t.style.transition="",requestAnimationFrame((function(){t.style.height=e+"px",t.style.opacity=1,t.style.marginTop="0px",t.style.marginBottom="0px",t.style.transition=n,requestAnimationFrame((function(){t.style.height="0px",t.style.opacity=0}))})),setTimeout((function(){o.removeChild(t)}),1e3)},_Options={message:e?.message??"Operation performed successfully.",dismissible:e?.dismissible??!0,timeout:e?.timeout??5e3,status:e?.status?e.status.toLowerCase().trim():"",actions:e?.actions??[],fixed:e?.fixed??!1,position:e?.position??"br",container:e?.container??document.body,width:e?.width,speed:e?.speed,icon:e?.icon},void 0===(d="string"==typeof _Options.container?document.querySelector(_Options.container):_Options.container)&&(console.warn("SnackBar: Could not find target container "+_Options.container),d=document.body),o=function(e){for(var s,t=u(),o=0;o<e.children.length;o++)if(1===(s=e.children.item(o)).nodeType&&s.classList.length>0&&s.classList.contains("js-snackbar-container")&&s.classList.contains(t))return s;return function(e){var s=document.createElement("div");return s.classList.add("js-snackbar-container"),_Options.fixed&&s.classList.add("js-snackbar-container--fixed"),e.appendChild(s),s}(e)}(d),function(){o.classList.add(u());var e="js-snackbar-container--fixed";_Options.fixed?o.classList.add(e):o.classList.remove(e)}(),a=function(){var e,s=document.createElement("div");return s.classList.add("js-snackbar__wrapper"),s.style.height="0px",s.style.opacity="0",s.style.marginTop="0px",s.style.marginBottom="0px",e=s,_Options.width&&(e.style.width=_Options.width),function(e){const{speed:s}=_Options;switch(typeof s){case"number":e.style.transitionDuration=s+"ms";break;case"string":e.style.transitionDuration=s}}(s),s}(),i=function(){var e,s=document.createElement("div");return s.classList.add("js-snackbar","js-snackbar--show"),function(e){if(_Options.status){var s=document.createElement("span");s.classList.add("js-snackbar__status"),t(s),o(s),e.appendChild(s)}function t(e){switch(_Options.status){case"success":case"green":e.classList.add("js-snackbar--success");break;case"warning":case"alert":case"orange":e.classList.add("js-snackbar--warning");break;case"danger":case"error":case"red":e.classList.add("js-snackbar--danger");break;default:e.classList.add("js-snackbar--info")}}function o(e){if(_Options.icon){var s=document.createElement("span");switch(s.classList.add("js-snackbar__icon"),_Options.icon){case"exclamation":case"warn":case"danger":s.innerText="!";break;case"info":case"question":case"question-mark":s.innerText="?";break;case"plus":case"add":s.innerText="+";break;default:_Options.icon.length>1&&console.warn("Invalid icon character provided: ",_Options.icon),s.innerText=_Options.icon.substr(0,1)}e.appendChild(s)}}}(s),e=s,(r=document.createElement("div")).classList.add("js-snackbar__message-wrapper"),(n=document.createElement("span")).classList.add("js-snackbar__message"),n.innerHTML=_Options.message,r.appendChild(n),e.appendChild(r),function(e){if("object"==typeof _Options.actions)for(var s=0;s<_Options.actions.length;s++)t(e,_Options.actions[s]);function t(e,s){var t=document.createElement("span");t.classList.add("js-snackbar__action"),t.textContent=s.text,"function"==typeof s.function?!0===s.dismiss?t.onclick=function(){s.function(),c.Close()}:t.onclick=s.function:t.onclick=c.Close,e.appendChild(t)}}(s),function(e){if(_Options.dismissible){var s=document.createElement("span");s.classList.add("js-snackbar__close"),s.innerText="×",s.onclick=c.Close,e.appendChild(s)}}(s),s}(),a.appendChild(i),t=a,o.appendChild(t),!1!==_Options.timeout&&_Options.timeout>0&&(s=setTimeout(c.Close,_Options.timeout)),c.Open()}}},s={};function t(o){var n=s[o];if(void 0!==n)return n.exports;var r=s[o]={exports:{}};return e[o](r,r.exports,t),r.exports}t.n=e=>{var s=e&&e.__esModule?()=>e.default:()=>e;return t.d(s,{a:s}),s},t.d=(e,s)=>{for(var o in s)t.o(s,o)&&!t.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:s[o]})},t.o=(e,s)=>Object.prototype.hasOwnProperty.call(e,s),(()=>{"use strict";const e=jQuery("#tmpl-superb-addons-troubleshooting-step").text(),s={States:{Success:"success",Error:"error"},CurrentStep:-1,SuccessfulSteps:0,Resolves:0,AvailableSteps:[{id:"spbaddons-process-step-wordpress-version-check",title:superbaddonstroubleshooting_g.steps.wordpressversion.title,text:superbaddonstroubleshooting_g.steps.wordpressversion.text,errorText:superbaddonstroubleshooting_g.steps.wordpressversion.errorText,successText:superbaddonstroubleshooting_g.steps.wordpressversion.successText,route:"wordpressversion",terminates:!1,resolver:!1},{id:"spbaddons-process-step-elementor-version-check",title:superbaddonstroubleshooting_g.steps.elementorversion.title,text:superbaddonstroubleshooting_g.steps.elementorversion.text,errorText:superbaddonstroubleshooting_g.steps.elementorversion.errorText,successText:superbaddonstroubleshooting_g.steps.elementorversion.successText,route:"elementorversion",terminates:!1,resolver:!1},{id:"spbaddons-process-step-api-connection-check",title:superbaddonstroubleshooting_g.steps.connection.title,text:superbaddonstroubleshooting_g.steps.connection.text,errorText:superbaddonstroubleshooting_g.steps.connection.errorText,successText:superbaddonstroubleshooting_g.steps.connection.successText,route:"connection",terminates:!1,resolver:{id:"spbaddons-process-step-api-domainshift",title:superbaddonstroubleshooting_g.steps.domainshift.title,text:superbaddonstroubleshooting_g.steps.domainshift.text,errorText:superbaddonstroubleshooting_g.steps.domainshift.errorText,successText:superbaddonstroubleshooting_g.steps.domainshift.successText,route:"domainshift",terminates:!0,resolver:!1}},{id:"spbaddons-process-step-api-service-check",title:superbaddonstroubleshooting_g.steps.service.title,text:superbaddonstroubleshooting_g.steps.service.text,errorText:superbaddonstroubleshooting_g.steps.service.errorText,successText:superbaddonstroubleshooting_g.steps.service.successText,route:"service",terminates:!0,resolver:!1},{id:"spbaddons-process-step-license-key-check",title:superbaddonstroubleshooting_g.steps.keycheck.title,text:superbaddonstroubleshooting_g.steps.keycheck.text,errorText:superbaddonstroubleshooting_g.steps.keycheck.errorText,successText:superbaddonstroubleshooting_g.steps.keycheck.successText,route:"keycheck",terminates:!1,resolver:{id:"spbaddons-process-step-api-key-verify",title:superbaddonstroubleshooting_g.steps.keyverify.title,text:superbaddonstroubleshooting_g.steps.keyverify.text,errorText:superbaddonstroubleshooting_g.steps.keyverify.errorText,successText:superbaddonstroubleshooting_g.steps.keyverify.successText,route:"keyverify",terminates:!0,resolver:!1}},{id:"spbaddons-process-step-cache-clear",title:superbaddonstroubleshooting_g.steps.cacheclear.title,text:superbaddonstroubleshooting_g.steps.cacheclear.text,errorText:superbaddonstroubleshooting_g.steps.cacheclear.errorText,successText:superbaddonstroubleshooting_g.steps.cacheclear.successText,route:"cacheclear",terminates:!1,resolver:!1,runOnlyOnZeroResolves:!0}],GetCurrentStep:function(){return this.AvailableSteps[this.CurrentStep]},GetNextStep:function(){return!(this.AvailableSteps.length<=this.CurrentStep)&&this.AvailableSteps[++this.CurrentStep]}},o=async function(e){let t=arguments.length>1&&void 0!==arguments[1]&&arguments[1];if(!e)return void d();if(e.runOnlyOnZeroResolves&&s.Resolves>0)return s.SuccessfulSteps++,void o(s.GetNextStep());n(e),await async function(e){return new Promise((e=>setTimeout(e,1e3)))}();const c=await i(e.route);let u=!1;if(c.success&&(u=!0),c.text&&(e.successText=c.text,e.errorText=c.text),a(e,u),!u){if(!1!==e.resolver&&!0!==c.ignoreResolver)return void o(e.resolver,!0);if(e.terminates)return void d()}u&&(t&&(s.Resolves++,r(s.GetCurrentStep())),s.SuccessfulSteps++),o(s.GetNextStep())},n=s=>{let t=jQuery(e);t.find(".spbaddons-troubleshooting-step-text").text(s.text+"..."),t.find(".spbaddons-troubleshooting-step-title").text(s.title),t.addClass(s.id),jQuery(".spbaddons-troubleshooting-steps").append(t)},r=e=>{const s="."+e.id;jQuery(s).css("opacity","0.5"),jQuery(s).addClass("spbaddons-troubleshooting-step-resolved")},a=(e,s)=>{const t="."+e.id;jQuery(t).find(".spbaddons-troubleshooting-step-spinner").hide(),s?(jQuery(t).find(".spbaddons-troubleshooting-step-checkmark").show(),jQuery(t).find(".spbaddons-troubleshooting-step-text").text(e.successText)):(jQuery(t).find(".spbaddons-troubleshooting-step-error").show(),jQuery(t).find(".spbaddons-troubleshooting-step-text").text(e.errorText))},i=async e=>{const s=await fetch(superbaddonstroubleshooting_g.rest.base+superbaddonstroubleshooting_g.rest.namespace+superbaddonstroubleshooting_g.rest.routes.troubleshooting,{method:"POST",credentials:"same-origin",headers:{"Content-Type":"application/x-www-form-urlencoded;charset=UTF-8","X-WP-Nonce":superbaddonstroubleshooting_g.rest.nonce},body:"action="+e});return 200!==s.status?{success:!1,text:"Unknown error occured. Please contact support if the issue persists."}:s.json()},d=()=>s.Resolves>0&&s.AvailableSteps.length<=s.SuccessfulSteps?(jQuery(".spbaddons-troubleshooting-result-resolved").show(),void jQuery(".spbaddons-troubleshooting-result-wrapper").slideDown()):s.AvailableSteps.length<=s.SuccessfulSteps?(jQuery(".spbaddons-troubleshooting-result-success").show(),void jQuery(".spbaddons-troubleshooting-result-wrapper").slideDown()):(jQuery(".spbaddons-troubleshooting-result-error").show(),void jQuery(".spbaddons-troubleshooting-result-wrapper").slideDown()),c=e=>{const s=jQuery(".superbaddons-admindashboard-modal-wrapper"),t=s.find(".superbaddons-admindashboard-modal-overlay"),o=s.find(".superbaddons-admindashboard-modal-close-button"),n=s.find(".superbaddons-admindashboard-modal-confirm-btn"),r=s.find(".superbaddons-admindashboard-modal-cancel-btn"),a=s.find(".superbaddons-admindashboard-modal-ok-btn"),i=s.find(".superbaddons-admindashboard-modal-title"),d=s.find(".superbaddons-admindashboard-modal-content"),c=s.find(".superbaddons-admindashboard-modal-header-spinner"),u=s.find(".superbaddons-admindashboard-modal-footer"),l=s.find(".superbaddons-element-separator"),p=e.title||!1,b=e.content||!1,h=e.confirmCallback||!1,g=e.cancelCallback||!1,m=e.awaitConfirmCallback||!1,f=e.stopCloseOnConfirm||!1,v=e.preventClosing||!1,x=e.isLoader||!1,y=function(){let e=arguments.length>0&&void 0!==arguments[0]&&arguments[0];n.off(),r.off(),o.off(),t.off(),a.off(),jQuery(window).off("keydown.superbaddons-admin-modal"),e?s.hide():s.fadeOut("fast")};return((e,p,b,h,g,m,v)=>{if(m||(jQuery(window).on("keydown.superbaddons-admin-modal",(e=>{27==(e.keyCode||e.which)&&y()})),o.click((()=>{y()})),t.click((()=>{y()}))),v)return c.show(),i.hide(),u.hide(),o.hide(),l.hide(),d.text(p),void s.fadeIn("fast");c.hide(),u.show(),i.show(),o.show(),l.show(),e&&i.text(e),p&&(Array.isArray(p)?(d.text(""),p.map((e=>{const s=jQuery("<div class='superbaddons-admindashboard-modal-content-item'></div>"),t=jQuery("<div class='superbaddons-admindashboard-modal-content-item-title'></div>"),o=jQuery("<div class='superbaddons-admindashboard-modal-content-item-content'></div>"),n=jQuery("<img class='superbaddons-admindashboard-modal-content-item-icon' />");superbaddonssettings_g&&(n.attr("src",e.shared?superbaddonssettings_g.modal.view_logs.icon_shared:superbaddonssettings_g.modal.view_logs.icon_unshared),n.attr("title",e.shared?superbaddonssettings_g.modal.view_logs.shared_title:superbaddonssettings_g.modal.view_logs.unshared_title));const r=new Date(1e3*e.time),a=r.toLocaleDateString()+" "+r.toLocaleTimeString();t.text(a+" (v."+e.version+"): "+e.title),t.prepend(n),o.text(e.stack),s.append(t),s.append(o),d.append(s)}))):d.text(p)),b?(n.show(),r.show(),a.hide(),n.click((async()=>{g?await b():b(),f||y()}))):(n.hide(),r.hide(),a.show(),a.click((()=>{f||y()}))),h?r.click((()=>{h(),y()})):r.click((()=>{y()})),s.fadeIn("fast")})(p,b,h,g,m,v,x),y};var u=t(767),l=t.n(u);const{__:p}=wp.i18n;var b;(b=jQuery)("#spbaddons-troubleshooting-submit-btn").on("click",(function(){b(this).remove(),o(s.GetNextStep())})),b(".superbaddons-admindashboard-linkbox-wrapper .superbaddons-start-tutorial-link-gutenberg .superbaddons-element-colorlink").on("click",(function(e){e.preventDefault();const s=c({preventClosing:!0,isLoader:!0,content:p("Starting Tutorial...","superbaddons")});setTimeout((()=>{s(!0),window.open(b(this).attr("href"),"_blank")}),1500)})),b(".superbaddons-admindashboard-linkbox-wrapper #superbaddons-tour-elementor .superbaddons-element-colorlink").on("click",(async function(e){e.preventDefault();const s=c({preventClosing:!0,isLoader:!0,content:p("Starting Tutorial...","superbaddons")}),t=await async function(e,s,t){let o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"";const n=await fetch(e,{method:"POST",credentials:"same-origin",headers:{"Content-Type":"application/x-www-form-urlencoded;charset=UTF-8","X-WP-Nonce":s},body:"action="+t+o});return 200!==n.status?{success:!1,text:"Unknown error occured. Please contact support if the issue persists."}:n.json()}(superbaddonstroubleshooting_g.rest.base+superbaddonstroubleshooting_g.rest.namespace+superbaddonstroubleshooting_g.rest.routes.tutorial,superbaddonstroubleshooting_g.rest.nonce,"elementor-tour");if(!t.success)return s(),void l()({message:p("Couldn't start tutorial. Please contact support if the issue persists.","superbaddons"),timeout:5e3,position:"bl",status:"error",icon:"danger",fixed:!0,container:".superbaddons-wrap-inner"});b(this).attr("href",t.url),s(!0),window.open(b(this).attr("href"),"_blank")}))})()})();