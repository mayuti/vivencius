(()=>{"use strict";!function(a){const d=a("#the-list").find('[data-plugin="'+superbaddonssettings_g.plugin+'"] span.deactivate a'),e=a(".superbaddons-admindashboard-modal-content .superbaddons-feedback-input input[type=radio]"),s=a("#superbaddons-feedback-text");let n=!1;e.change((function(){"other"==this.value?(s.prop("disabled",!1),s.show()):(s.prop("disabled",!0),s.hide()),n=a(this).data("temp")||!1})),d.on("click",(function(o){o.preventDefault(),(a=>{const d=jQuery(".superbaddons-admindashboard-modal-wrapper"),e=d.find(".superbaddons-admindashboard-modal-overlay"),s=d.find(".superbaddons-admindashboard-modal-close-button"),n=d.find(".superbaddons-admindashboard-modal-confirm-btn"),o=d.find(".superbaddons-admindashboard-modal-cancel-btn"),t=d.find(".superbaddons-admindashboard-modal-ok-btn"),r=d.find(".superbaddons-admindashboard-modal-title"),i=d.find(".superbaddons-admindashboard-modal-content"),c=()=>{n.off(),o.off(),s.off(),e.off(),t.off(),jQuery(window).off("keydown.superbaddons-admin-modal"),d.fadeOut("fast")};((a,l,p,b,u)=>{jQuery(window).on("keydown.superbaddons-admin-modal",(a=>{27==(a.keyCode||a.which)&&c()})),s.click((()=>{c()})),e.click((()=>{c()})),a&&r.text(a),l&&(Array.isArray(l)?(i.text(""),l.map((a=>{const d=jQuery("<div class='superbaddons-admindashboard-modal-content-item'></div>"),e=jQuery("<div class='superbaddons-admindashboard-modal-content-item-title'></div>"),s=jQuery("<div class='superbaddons-admindashboard-modal-content-item-content'></div>"),n=jQuery("<img class='superbaddons-admindashboard-modal-content-item-icon' />");superbaddonssettings_g&&(n.attr("src",a.shared?superbaddonssettings_g.modal.view_logs.icon_shared:superbaddonssettings_g.modal.view_logs.icon_unshared),n.attr("title",a.shared?superbaddonssettings_g.modal.view_logs.shared_title:superbaddonssettings_g.modal.view_logs.unshared_title));const o=new Date(1e3*a.time),t=o.toLocaleDateString()+" "+o.toLocaleTimeString();e.text(t+" (v."+a.version+"): "+a.title),e.prepend(n),s.text(a.stack),d.append(e),d.append(s),i.append(d)}))):i.text(l)),p?(n.show(),o.show(),t.hide(),n.click((async()=>{u?await p():p(),c()}))):(n.hide(),o.hide(),t.show(),t.click((()=>{c()}))),b?o.click((()=>{b(),c()})):o.click((()=>{c()})),d.fadeIn("fast")})(a.title||!1,a.content||!1,a.confirmCallback||!1,a.cancelCallback||!1,a.awaitConfirmCallback||!1)})({awaitConfirmCallback:!0,confirmCallback:async function(){if(n)return location.href=d.attr("href"),!0;const o=a(".superbaddons-admindashboard-modal input, .superbaddons-admindashboard-modal button");return o.prop("disabled",!0),a(".superbaddons-admindashboard-modal-footer .superbaddons-spinner-wrapper").show(),e.filter(":checked").length&&await async function(a,d,e){let s=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"";const n=await fetch(a,{method:"POST",credentials:"same-origin",headers:{"Content-Type":"application/x-www-form-urlencoded;charset=UTF-8","X-WP-Nonce":d},body:"action="+e+s});return 200!==n.status?{success:!1,text:"Unknown error occured. Please contact support if the issue persists."}:n.json()}(superbaddonssettings_g.rest.base+superbaddonssettings_g.rest.namespace+superbaddonssettings_g.rest.routes.settings,superbaddonssettings_g.rest.nonce,"submit_feedback","&spbaddons_reason="+e.filter(":checked").val()+"&spbaddons_other="+s.val()),o.prop("disabled",!1),a(".superbaddons-admindashboard-modal-footer .superbaddons-spinner-wrapper").hide(),location.href=d.attr("href"),!0},cancelCallback:async function(){return location.href=d.attr("href"),!0}})}))}(jQuery)})();