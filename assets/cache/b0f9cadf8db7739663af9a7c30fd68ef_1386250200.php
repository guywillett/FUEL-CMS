<?php
ob_start();
ob_start ("ob_gzhandler");

?>/**
* Bootstrap.js v2.3.0 by @fat & @mdo
* Copyright 2012 Twitter, Inc.
* http://www.apache.org/licenses/LICENSE-2.0.txt
*/
!function(e){"use strict";e(function(){e.support.transition=function(){var e=function(){var e=document.createElement("bootstrap"),t={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"},n;for(n in t)if(e.style[n]!==undefined)return t[n]}();return e&&{end:e}}()})}(window.jQuery),!function(e){"use strict";var t='[data-dismiss="alert"]',n=function(n){e(n).on("click",t,this.close)};n.prototype.close=function(t){function s(){i.trigger("closed").remove()}var n=e(this),r=n.attr("data-target"),i;r||(r=n.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,"")),i=e(r),t&&t.preventDefault(),i.length||(i=n.hasClass("alert")?n:n.parent()),i.trigger(t=e.Event("close"));if(t.isDefaultPrevented())return;i.removeClass("in"),e.support.transition&&i.hasClass("fade")?i.on(e.support.transition.end,s):s()};var r=e.fn.alert;e.fn.alert=function(t){return this.each(function(){var r=e(this),i=r.data("alert");i||r.data("alert",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.alert.Constructor=n,e.fn.alert.noConflict=function(){return e.fn.alert=r,this},e(document).on("click.alert.data-api",t,n.prototype.close)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.button.defaults,n)};t.prototype.setState=function(e){var t="disabled",n=this.$element,r=n.data(),i=n.is("input")?"val":"html";e+="Text",r.resetText||n.data("resetText",n[i]()),n[i](r[e]||this.options[e]),setTimeout(function(){e=="loadingText"?n.addClass(t).attr(t,t):n.removeClass(t).removeAttr(t)},0)},t.prototype.toggle=function(){var e=this.$element.closest('[data-toggle="buttons-radio"]');e&&e.find(".active").removeClass("active"),this.$element.toggleClass("active")};var n=e.fn.button;e.fn.button=function(n){return this.each(function(){var r=e(this),i=r.data("button"),s=typeof n=="object"&&n;i||r.data("button",i=new t(this,s)),n=="toggle"?i.toggle():n&&i.setState(n)})},e.fn.button.defaults={loadingText:"loading..."},e.fn.button.Constructor=t,e.fn.button.noConflict=function(){return e.fn.button=n,this},e(document).on("click.button.data-api","[data-toggle^=button]",function(t){var n=e(t.target);n.hasClass("btn")||(n=n.closest(".btn")),n.button("toggle")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=n,this.options.pause=="hover"&&this.$element.on("mouseenter",e.proxy(this.pause,this)).on("mouseleave",e.proxy(this.cycle,this))};t.prototype={cycle:function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(e.proxy(this.next,this),this.options.interval)),this},getActiveIndex:function(){return this.$active=this.$element.find(".item.active"),this.$items=this.$active.parent().children(),this.$items.index(this.$active)},to:function(t){var n=this.getActiveIndex(),r=this;if(t>this.$items.length-1||t<0)return;return this.sliding?this.$element.one("slid",function(){r.to(t)}):n==t?this.pause().cycle():this.slide(t>n?"next":"prev",e(this.$items[t]))},pause:function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&e.support.transition.end&&(this.$element.trigger(e.support.transition.end),this.cycle()),clearInterval(this.interval),this.interval=null,this},next:function(){if(this.sliding)return;return this.slide("next")},prev:function(){if(this.sliding)return;return this.slide("prev")},slide:function(t,n){var r=this.$element.find(".item.active"),i=n||r[t](),s=this.interval,o=t=="next"?"left":"right",u=t=="next"?"first":"last",a=this,f;this.sliding=!0,s&&this.pause(),i=i.length?i:this.$element.find(".item")[u](),f=e.Event("slide",{relatedTarget:i[0],direction:o});if(i.hasClass("active"))return;this.$indicators.length&&(this.$indicators.find(".active").removeClass("active"),this.$element.one("slid",function(){var t=e(a.$indicators.children()[a.getActiveIndex()]);t&&t.addClass("active")}));if(e.support.transition&&this.$element.hasClass("slide")){this.$element.trigger(f);if(f.isDefaultPrevented())return;i.addClass(t),i[0].offsetWidth,r.addClass(o),i.addClass(o),this.$element.one(e.support.transition.end,function(){i.removeClass([t,o].join(" ")).addClass("active"),r.removeClass(["active",o].join(" ")),a.sliding=!1,setTimeout(function(){a.$element.trigger("slid")},0)})}else{this.$element.trigger(f);if(f.isDefaultPrevented())return;r.removeClass("active"),i.addClass("active"),this.sliding=!1,this.$element.trigger("slid")}return s&&this.cycle(),this}};var n=e.fn.carousel;e.fn.carousel=function(n){return this.each(function(){var r=e(this),i=r.data("carousel"),s=e.extend({},e.fn.carousel.defaults,typeof n=="object"&&n),o=typeof n=="string"?n:s.slide;i||r.data("carousel",i=new t(this,s)),typeof n=="number"?i.to(n):o?i[o]():s.interval&&i.pause().cycle()})},e.fn.carousel.defaults={interval:5e3,pause:"hover"},e.fn.carousel.Constructor=t,e.fn.carousel.noConflict=function(){return e.fn.carousel=n,this},e(document).on("click.carousel.data-api","[data-slide], [data-slide-to]",function(t){var n=e(this),r,i=e(n.attr("data-target")||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,"")),s=e.extend({},i.data(),n.data()),o;i.carousel(s),(o=n.attr("data-slide-to"))&&i.data("carousel").pause().to(o).cycle(),t.preventDefault()})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.collapse.defaults,n),this.options.parent&&(this.$parent=e(this.options.parent)),this.options.toggle&&this.toggle()};t.prototype={constructor:t,dimension:function(){var e=this.$element.hasClass("width");return e?"width":"height"},show:function(){var t,n,r,i;if(this.transitioning||this.$element.hasClass("in"))return;t=this.dimension(),n=e.camelCase(["scroll",t].join("-")),r=this.$parent&&this.$parent.find("> .accordion-group > .in");if(r&&r.length){i=r.data("collapse");if(i&&i.transitioning)return;r.collapse("hide"),i||r.data("collapse",null)}this.$element[t](0),this.transition("addClass",e.Event("show"),"shown"),e.support.transition&&this.$element[t](this.$element[0][n])},hide:function(){var t;if(this.transitioning||!this.$element.hasClass("in"))return;t=this.dimension(),this.reset(this.$element[t]()),this.transition("removeClass",e.Event("hide"),"hidden"),this.$element[t](0)},reset:function(e){var t=this.dimension();return this.$element.removeClass("collapse")[t](e||"auto")[0].offsetWidth,this.$element[e!==null?"addClass":"removeClass"]("collapse"),this},transition:function(t,n,r){var i=this,s=function(){n.type=="show"&&i.reset(),i.transitioning=0,i.$element.trigger(r)};this.$element.trigger(n);if(n.isDefaultPrevented())return;this.transitioning=1,this.$element[t]("in"),e.support.transition&&this.$element.hasClass("collapse")?this.$element.one(e.support.transition.end,s):s()},toggle:function(){this[this.$element.hasClass("in")?"hide":"show"]()}};var n=e.fn.collapse;e.fn.collapse=function(n){return this.each(function(){var r=e(this),i=r.data("collapse"),s=e.extend({},e.fn.collapse.defaults,r.data(),typeof n=="object"&&n);i||r.data("collapse",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.collapse.defaults={toggle:!0},e.fn.collapse.Constructor=t,e.fn.collapse.noConflict=function(){return e.fn.collapse=n,this},e(document).on("click.collapse.data-api","[data-toggle=collapse]",function(t){var n=e(this),r,i=n.attr("data-target")||t.preventDefault()||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,""),s=e(i).data("collapse")?"toggle":n.data();n[e(i).hasClass("in")?"addClass":"removeClass"]("collapsed"),e(i).collapse(s)})}(window.jQuery),!function(e){"use strict";function r(){e(t).each(function(){i(e(this)).removeClass("open")})}function i(t){var n=t.attr("data-target"),r;n||(n=t.attr("href"),n=n&&/#/.test(n)&&n.replace(/.*(?=#[^\s]*$)/,"")),r=n&&e(n);if(!r||!r.length)r=t.parent();return r}var t="[data-toggle=dropdown]",n=function(t){var n=e(t).on("click.dropdown.data-api",this.toggle);e("html").on("click.dropdown.data-api",function(){n.parent().removeClass("open")})};n.prototype={constructor:n,toggle:function(t){var n=e(this),s,o;if(n.is(".disabled, :disabled"))return;return s=i(n),o=s.hasClass("open"),r(),o||s.toggleClass("open"),n.focus(),!1},keydown:function(n){var r,s,o,u,a,f;if(!/(38|40|27)/.test(n.keyCode))return;r=e(this),n.preventDefault(),n.stopPropagation();if(r.is(".disabled, :disabled"))return;u=i(r),a=u.hasClass("open");if(!a||a&&n.keyCode==27)return n.which==27&&u.find(t).focus(),r.click();s=e("[role=menu] li:not(.divider):visible a",u);if(!s.length)return;f=s.index(s.filter(":focus")),n.keyCode==38&&f>0&&f--,n.keyCode==40&&f<s.length-1&&f++,~f||(f=0),s.eq(f).focus()}};var s=e.fn.dropdown;e.fn.dropdown=function(t){return this.each(function(){var r=e(this),i=r.data("dropdown");i||r.data("dropdown",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.dropdown.Constructor=n,e.fn.dropdown.noConflict=function(){return e.fn.dropdown=s,this},e(document).on("click.dropdown.data-api",r).on("click.dropdown.data-api",".dropdown form",function(e){e.stopPropagation()}).on(".dropdown-menu",function(e){e.stopPropagation()}).on("click.dropdown.data-api",t,n.prototype.toggle).on("keydown.dropdown.data-api",t+", [role=menu]",n.prototype.keydown)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=n,this.$element=e(t).delegate('[data-dismiss="modal"]',"click.dismiss.modal",e.proxy(this.hide,this)),this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};t.prototype={constructor:t,toggle:function(){return this[this.isShown?"hide":"show"]()},show:function(){var t=this,n=e.Event("show");this.$element.trigger(n);if(this.isShown||n.isDefaultPrevented())return;this.isShown=!0,this.escape(),this.backdrop(function(){var n=e.support.transition&&t.$element.hasClass("fade");t.$element.parent().length||t.$element.appendTo(document.body),t.$element.show(),n&&t.$element[0].offsetWidth,t.$element.addClass("in").attr("aria-hidden",!1),t.enforceFocus(),n?t.$element.one(e.support.transition.end,function(){t.$element.focus().trigger("shown")}):t.$element.focus().trigger("shown")})},hide:function(t){t&&t.preventDefault();var n=this;t=e.Event("hide"),this.$element.trigger(t);if(!this.isShown||t.isDefaultPrevented())return;this.isShown=!1,this.escape(),e(document).off("focusin.modal"),this.$element.removeClass("in").attr("aria-hidden",!0),e.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var t=this;e(document).on("focusin.modal",function(e){t.$element[0]!==e.target&&!t.$element.has(e.target).length&&t.$element.focus()})},escape:function(){var e=this;this.isShown&&this.options.keyboard?this.$element.on("keyup.dismiss.modal",function(t){t.which==27&&e.hide()}):this.isShown||this.$element.off("keyup.dismiss.modal")},hideWithTransition:function(){var t=this,n=setTimeout(function(){t.$element.off(e.support.transition.end),t.hideModal()},500);this.$element.one(e.support.transition.end,function(){clearTimeout(n),t.hideModal()})},hideModal:function(){var e=this;this.$element.hide(),this.backdrop(function(){e.removeBackdrop(),e.$element.trigger("hidden")})},removeBackdrop:function(){this.$backdrop.remove(),this.$backdrop=null},backdrop:function(t){var n=this,r=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var i=e.support.transition&&r;this.$backdrop=e('<div class="modal-backdrop '+r+'" />').appendTo(document.body),this.$backdrop.click(this.options.backdrop=="static"?e.proxy(this.$element[0].focus,this.$element[0]):e.proxy(this.hide,this)),i&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in");if(!t)return;i?this.$backdrop.one(e.support.transition.end,t):t()}else!this.isShown&&this.$backdrop?(this.$backdrop.removeClass("in"),e.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(e.support.transition.end,t):t()):t&&t()}};var n=e.fn.modal;e.fn.modal=function(n){return this.each(function(){var r=e(this),i=r.data("modal"),s=e.extend({},e.fn.modal.defaults,r.data(),typeof n=="object"&&n);i||r.data("modal",i=new t(this,s)),typeof n=="string"?i[n]():s.show&&i.show()})},e.fn.modal.defaults={backdrop:!0,keyboard:!0,show:!0},e.fn.modal.Constructor=t,e.fn.modal.noConflict=function(){return e.fn.modal=n,this},e(document).on("click.modal.data-api",'[data-toggle="modal"]',function(t){var n=e(this),r=n.attr("href"),i=e(n.attr("data-target")||r&&r.replace(/.*(?=#[^\s]+$)/,"")),s=i.data("modal")?"toggle":e.extend({remote:!/#/.test(r)&&r},i.data(),n.data());t.preventDefault(),i.modal(s).one("hide",function(){n.focus()})})}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("tooltip",e,t)};t.prototype={constructor:t,init:function(t,n,r){var i,s,o,u,a;this.type=t,this.$element=e(n),this.options=this.getOptions(r),this.enabled=!0,o=this.options.trigger.split(" ");for(a=o.length;a--;)u=o[a],u=="click"?this.$element.on("click."+this.type,this.options.selector,e.proxy(this.toggle,this)):u!="manual"&&(i=u=="hover"?"mouseenter":"focus",s=u=="hover"?"mouseleave":"blur",this.$element.on(i+"."+this.type,this.options.selector,e.proxy(this.enter,this)),this.$element.on(s+"."+this.type,this.options.selector,e.proxy(this.leave,this)));this.options.selector?this._options=e.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(t){return t=e.extend({},e.fn[this.type].defaults,this.$element.data(),t),t.delay&&typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),t},enter:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);if(!n.options.delay||!n.options.delay.show)return n.show();clearTimeout(this.timeout),n.hoverState="in",this.timeout=setTimeout(function(){n.hoverState=="in"&&n.show()},n.options.delay.show)},leave:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);this.timeout&&clearTimeout(this.timeout);if(!n.options.delay||!n.options.delay.hide)return n.hide();n.hoverState="out",this.timeout=setTimeout(function(){n.hoverState=="out"&&n.hide()},n.options.delay.hide)},show:function(){var t,n,r,i,s,o,u=e.Event("show");if(this.hasContent()&&this.enabled){this.$element.trigger(u);if(u.isDefaultPrevented())return;t=this.tip(),this.setContent(),this.options.animation&&t.addClass("fade"),s=typeof this.options.placement=="function"?this.options.placement.call(this,t[0],this.$element[0]):this.options.placement,t.detach().css({top:0,left:0,display:"block"}),this.options.container?t.appendTo(this.options.container):t.insertAfter(this.$element),n=this.getPosition(),r=t[0].offsetWidth,i=t[0].offsetHeight;switch(s){case"bottom":o={top:n.top+n.height,left:n.left+n.width/2-r/2};break;case"top":o={top:n.top-i,left:n.left+n.width/2-r/2};break;case"left":o={top:n.top+n.height/2-i/2,left:n.left-r};break;case"right":o={top:n.top+n.height/2-i/2,left:n.left+n.width}}this.applyPlacement(o,s),this.$element.trigger("shown")}},applyPlacement:function(e,t){var n=this.tip(),r=n[0].offsetWidth,i=n[0].offsetHeight,s,o,u,a;n.offset(e).addClass(t).addClass("in"),s=n[0].offsetWidth,o=n[0].offsetHeight,t=="top"&&o!=i&&(e.top=e.top+i-o,a=!0),t=="bottom"||t=="top"?(u=0,e.left<0&&(u=e.left*-2,e.left=0,n.offset(e),s=n[0].offsetWidth,o=n[0].offsetHeight),this.replaceArrow(u-r+s,s,"left")):this.replaceArrow(o-i,o,"top"),a&&n.offset(e)},replaceArrow:function(e,t,n){this.arrow().css(n,e?50*(1-e/t)+"%":"")},setContent:function(){var e=this.tip(),t=this.getTitle();e.find(".tooltip-inner")[this.options.html?"html":"text"](t),e.removeClass("fade in top bottom left right")},hide:function(){function i(){var t=setTimeout(function(){n.off(e.support.transition.end).detach()},500);n.one(e.support.transition.end,function(){clearTimeout(t),n.detach()})}var t=this,n=this.tip(),r=e.Event("hide");this.$element.trigger(r);if(r.isDefaultPrevented())return;return n.removeClass("in"),e.support.transition&&this.$tip.hasClass("fade")?i():n.detach(),this.$element.trigger("hidden"),this},fixTitle:function(){var e=this.$element;(e.attr("title")||typeof e.attr("data-original-title")!="string")&&e.attr("data-original-title",e.attr("title")||"").attr("title","")},hasContent:function(){return this.getTitle()},getPosition:function(){var t=this.$element[0];return e.extend({},typeof t.getBoundingClientRect=="function"?t.getBoundingClientRect():{width:t.offsetWidth,height:t.offsetHeight},this.$element.offset())},getTitle:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-original-title")||(typeof n.title=="function"?n.title.call(t[0]):n.title),e},tip:function(){return this.$tip=this.$tip||e(this.options.template)},arrow:function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(t){var n=t?e(t.currentTarget)[this.type](this._options).data(this.type):this;n.tip().hasClass("in")?n.hide():n.show()},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}};var n=e.fn.tooltip;e.fn.tooltip=function(n){return this.each(function(){var r=e(this),i=r.data("tooltip"),s=typeof n=="object"&&n;i||r.data("tooltip",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.tooltip.Constructor=t,e.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1},e.fn.tooltip.noConflict=function(){return e.fn.tooltip=n,this}}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("popover",e,t)};t.prototype=e.extend({},e.fn.tooltip.Constructor.prototype,{constructor:t,setContent:function(){var e=this.tip(),t=this.getTitle(),n=this.getContent();e.find(".popover-title")[this.options.html?"html":"text"](t),e.find(".popover-content")[this.options.html?"html":"text"](n),e.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,t=this.$element,n=this.options;return e=(typeof n.content=="function"?n.content.call(t[0]):n.content)||t.attr("data-content"),e},tip:function(){return this.$tip||(this.$tip=e(this.options.template)),this.$tip},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}});var n=e.fn.popover;e.fn.popover=function(n){return this.each(function(){var r=e(this),i=r.data("popover"),s=typeof n=="object"&&n;i||r.data("popover",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.popover.Constructor=t,e.fn.popover.defaults=e.extend({},e.fn.tooltip.defaults,{placement:"right",trigger:"click",content:"",template:'<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),e.fn.popover.noConflict=function(){return e.fn.popover=n,this}}(window.jQuery),!function(e){"use strict";function t(t,n){var r=e.proxy(this.process,this),i=e(t).is("body")?e(window):e(t),s;this.options=e.extend({},e.fn.scrollspy.defaults,n),this.$scrollElement=i.on("scroll.scroll-spy.data-api",r),this.selector=(this.options.target||(s=e(t).attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,"")||"")+" .nav li > a",this.$body=e("body"),this.refresh(),this.process()}t.prototype={constructor:t,refresh:function(){var t=this,n;this.offsets=e([]),this.targets=e([]),n=this.$body.find(this.selector).map(function(){var n=e(this),r=n.data("target")||n.attr("href"),i=/^#\w/.test(r)&&e(r);return i&&i.length&&[[i.position().top+(!e.isWindow(t.$scrollElement.get(0))&&t.$scrollElement.scrollTop()),r]]||null}).sort(function(e,t){return e[0]-t[0]}).each(function(){t.offsets.push(this[0]),t.targets.push(this[1])})},process:function(){var e=this.$scrollElement.scrollTop()+this.options.offset,t=this.$scrollElement[0].scrollHeight||this.$body[0].scrollHeight,n=t-this.$scrollElement.height(),r=this.offsets,i=this.targets,s=this.activeTarget,o;if(e>=n)return s!=(o=i.last()[0])&&this.activate(o);for(o=r.length;o--;)s!=i[o]&&e>=r[o]&&(!r[o+1]||e<=r[o+1])&&this.activate(i[o])},activate:function(t){var n,r;this.activeTarget=t,e(this.selector).parent(".active").removeClass("active"),r=this.selector+'[data-target="'+t+'"],'+this.selector+'[href="'+t+'"]',n=e(r).parent("li").addClass("active"),n.parent(".dropdown-menu").length&&(n=n.closest("li.dropdown").addClass("active")),n.trigger("activate")}};var n=e.fn.scrollspy;e.fn.scrollspy=function(n){return this.each(function(){var r=e(this),i=r.data("scrollspy"),s=typeof n=="object"&&n;i||r.data("scrollspy",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.scrollspy.Constructor=t,e.fn.scrollspy.defaults={offset:10},e.fn.scrollspy.noConflict=function(){return e.fn.scrollspy=n,this},e(window).on("load",function(){e('[data-spy="scroll"]').each(function(){var t=e(this);t.scrollspy(t.data())})})}(window.jQuery),!function(e){"use strict";var t=function(t){this.element=e(t)};t.prototype={constructor:t,show:function(){var t=this.element,n=t.closest("ul:not(.dropdown-menu)"),r=t.attr("data-target"),i,s,o;r||(r=t.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,""));if(t.parent("li").hasClass("active"))return;i=n.find(".active:last a")[0],o=e.Event("show",{relatedTarget:i}),t.trigger(o);if(o.isDefaultPrevented())return;s=e(r),this.activate(t.parent("li"),n),this.activate(s,s.parent(),function(){t.trigger({type:"shown",relatedTarget:i})})},activate:function(t,n,r){function o(){i.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"),t.addClass("active"),s?(t[0].offsetWidth,t.addClass("in")):t.removeClass("fade"),t.parent(".dropdown-menu")&&t.closest("li.dropdown").addClass("active"),r&&r()}var i=n.find("> .active"),s=r&&e.support.transition&&i.hasClass("fade");s?i.one(e.support.transition.end,o):o(),i.removeClass("in")}};var n=e.fn.tab;e.fn.tab=function(n){return this.each(function(){var r=e(this),i=r.data("tab");i||r.data("tab",i=new t(this)),typeof n=="string"&&i[n]()})},e.fn.tab.Constructor=t,e.fn.tab.noConflict=function(){return e.fn.tab=n,this},e(document).on("click.tab.data-api",'[data-toggle="tab"], [data-toggle="pill"]',function(t){t.preventDefault(),e(this).tab("show")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.typeahead.defaults,n),this.matcher=this.options.matcher||this.matcher,this.sorter=this.options.sorter||this.sorter,this.highlighter=this.options.highlighter||this.highlighter,this.updater=this.options.updater||this.updater,this.source=this.options.source,this.$menu=e(this.options.menu),this.shown=!1,this.listen()};t.prototype={constructor:t,select:function(){var e=this.$menu.find(".active").attr("data-value");return this.$element.val(this.updater(e)).change(),this.hide()},updater:function(e){return e},show:function(){var t=e.extend({},this.$element.position(),{height:this.$element[0].offsetHeight});return this.$menu.insertAfter(this.$element).css({top:t.top+t.height,left:t.left}).show(),this.shown=!0,this},hide:function(){return this.$menu.hide(),this.shown=!1,this},lookup:function(t){var n;return this.query=this.$element.val(),!this.query||this.query.length<this.options.minLength?this.shown?this.hide():this:(n=e.isFunction(this.source)?this.source(this.query,e.proxy(this.process,this)):this.source,n?this.process(n):this)},process:function(t){var n=this;return t=e.grep(t,function(e){return n.matcher(e)}),t=this.sorter(t),t.length?this.render(t.slice(0,this.options.items)).show():this.shown?this.hide():this},matcher:function(e){return~e.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(e){var t=[],n=[],r=[],i;while(i=e.shift())i.toLowerCase().indexOf(this.query.toLowerCase())?~i.indexOf(this.query)?n.push(i):r.push(i):t.push(i);return t.concat(n,r)},highlighter:function(e){var t=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&");return e.replace(new RegExp("("+t+")","ig"),function(e,t){return"<strong>"+t+"</strong>"})},render:function(t){var n=this;return t=e(t).map(function(t,r){return t=e(n.options.item).attr("data-value",r),t.find("a").html(n.highlighter(r)),t[0]}),t.first().addClass("active"),this.$menu.html(t),this},next:function(t){var n=this.$menu.find(".active").removeClass("active"),r=n.next();r.length||(r=e(this.$menu.find("li")[0])),r.addClass("active")},prev:function(e){var t=this.$menu.find(".active").removeClass("active"),n=t.prev();n.length||(n=this.$menu.find("li").last()),n.addClass("active")},listen:function(){this.$element.on("focus",e.proxy(this.focus,this)).on("blur",e.proxy(this.blur,this)).on("keypress",e.proxy(this.keypress,this)).on("keyup",e.proxy(this.keyup,this)),this.eventSupported("keydown")&&this.$element.on("keydown",e.proxy(this.keydown,this)),this.$menu.on("click",e.proxy(this.click,this)).on("mouseenter","li",e.proxy(this.mouseenter,this)).on("mouseleave","li",e.proxy(this.mouseleave,this))},eventSupported:function(e){var t=e in this.$element;return t||(this.$element.setAttribute(e,"return;"),t=typeof this.$element[e]=="function"),t},move:function(e){if(!this.shown)return;switch(e.keyCode){case 9:case 13:case 27:e.preventDefault();break;case 38:e.preventDefault(),this.prev();break;case 40:e.preventDefault(),this.next()}e.stopPropagation()},keydown:function(t){this.suppressKeyPressRepeat=~e.inArray(t.keyCode,[40,38,9,13,27]),this.move(t)},keypress:function(e){if(this.suppressKeyPressRepeat)return;this.move(e)},keyup:function(e){switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown)return;this.select();break;case 27:if(!this.shown)return;this.hide();break;default:this.lookup()}e.stopPropagation(),e.preventDefault()},focus:function(e){this.focused=!0},blur:function(e){this.focused=!1,!this.mousedover&&this.shown&&this.hide()},click:function(e){e.stopPropagation(),e.preventDefault(),this.select(),this.$element.focus()},mouseenter:function(t){this.mousedover=!0,this.$menu.find(".active").removeClass("active"),e(t.currentTarget).addClass("active")},mouseleave:function(e){this.mousedover=!1,!this.focused&&this.shown&&this.hide()}};var n=e.fn.typeahead;e.fn.typeahead=function(n){return this.each(function(){var r=e(this),i=r.data("typeahead"),s=typeof n=="object"&&n;i||r.data("typeahead",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu"></ul>',item:'<li><a href="#"></a></li>',minLength:1},e.fn.typeahead.Constructor=t,e.fn.typeahead.noConflict=function(){return e.fn.typeahead=n,this},e(document).on("focus.typeahead.data-api",'[data-provide="typeahead"]',function(t){var n=e(this);if(n.data("typeahead"))return;n.typeahead(n.data())})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=e.extend({},e.fn.affix.defaults,n),this.$window=e(window).on("scroll.affix.data-api",e.proxy(this.checkPosition,this)).on("click.affix.data-api",e.proxy(function(){setTimeout(e.proxy(this.checkPosition,this),1)},this)),this.$element=e(t),this.checkPosition()};t.prototype.checkPosition=function(){if(!this.$element.is(":visible"))return;var t=e(document).height(),n=this.$window.scrollTop(),r=this.$element.offset(),i=this.options.offset,s=i.bottom,o=i.top,u="affix affix-top affix-bottom",a;typeof i!="object"&&(s=o=i),typeof o=="function"&&(o=i.top()),typeof s=="function"&&(s=i.bottom()),a=this.unpin!=null&&n+this.unpin<=r.top?!1:s!=null&&r.top+this.$element.height()>=t-s?"bottom":o!=null&&n<=o?"top":!1;if(this.affixed===a)return;this.affixed=a,this.unpin=a=="bottom"?r.top-n:null,this.$element.removeClass(u).addClass("affix"+(a?"-"+a:""))};var n=e.fn.affix;e.fn.affix=function(n){return this.each(function(){var r=e(this),i=r.data("affix"),s=typeof n=="object"&&n;i||r.data("affix",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.affix.Constructor=t,e.fn.affix.defaults={offset:0},e.fn.affix.noConflict=function(){return e.fn.affix=n,this},e(window).on("load",function(){e('[data-spy="affix"]').each(function(){var t=e(this),n=t.data();n.offset=n.offset||{},n.offsetBottom&&(n.offset.bottom=n.offsetBottom),n.offsetTop&&(n.offset.top=n.offsetTop),t.affix(n)})})}(window.jQuery);
jQuery.easing.jswing = jQuery.easing.swing;
jQuery.extend(jQuery.easing, {
   def: "easeOutQuad",
   swing: function (e, f, a, h, g) {
       return jQuery.easing[jQuery.easing.def](e, f, a, h, g)
   },
   easeInQuad: function (e, f, a, h, g) {
       return h * (f /= g) * f + a
   },
   easeOutQuad: function (e, f, a, h, g) {
       return -h * (f /= g) * (f - 2) + a
   },
   easeInOutQuad: function (e, f, a, h, g) {
       if ((f /= g / 2) < 1) {
           return h / 2 * f * f + a
       }
       return -h / 2 * ((--f) * (f - 2) - 1) + a
   },
   easeInCubic: function (e, f, a, h, g) {
       return h * (f /= g) * f * f + a
   },
   easeOutCubic: function (e, f, a, h, g) {
       return h * ((f = f / g - 1) * f * f + 1) + a
   },
   easeInOutCubic: function (e, f, a, h, g) {
       if ((f /= g / 2) < 1) {
           return h / 2 * f * f * f + a
       }
       return h / 2 * ((f -= 2) * f * f + 2) + a
   },
   easeInQuart: function (e, f, a, h, g) {
       return h * (f /= g) * f * f * f + a
   },
   easeOutQuart: function (e, f, a, h, g) {
       return -h * ((f = f / g - 1) * f * f * f - 1) + a
   },
   easeInOutQuart: function (e, f, a, h, g) {
       if ((f /= g / 2) < 1) {
           return h / 2 * f * f * f * f + a
       }
       return -h / 2 * ((f -= 2) * f * f * f - 2) + a
   },
   easeInQuint: function (e, f, a, h, g) {
       return h * (f /= g) * f * f * f * f + a
   },
   easeOutQuint: function (e, f, a, h, g) {
       return h * ((f = f / g - 1) * f * f * f * f + 1) + a
   },
   easeInOutQuint: function (e, f, a, h, g) {
       if ((f /= g / 2) < 1) {
           return h / 2 * f * f * f * f * f + a
       }
       return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
   },
   easeInSine: function (e, f, a, h, g) {
       return -h * Math.cos(f / g * (Math.PI / 2)) + h + a
   },
   easeOutSine: function (e, f, a, h, g) {
       return h * Math.sin(f / g * (Math.PI / 2)) + a
   },
   easeInOutSine: function (e, f, a, h, g) {
       return -h / 2 * (Math.cos(Math.PI * f / g) - 1) + a
   },
   easeInExpo: function (e, f, a, h, g) {
       return (f == 0) ? a : h * Math.pow(2, 10 * (f / g - 1)) + a
   },
   easeOutExpo: function (e, f, a, h, g) {
       return (f == g) ? a + h : h * (-Math.pow(2, -10 * f / g) + 1) + a
   },
   easeInOutExpo: function (e, f, a, h, g) {
       if (f == 0) {
           return a
       }
       if (f == g) {
           return a + h
       }
       if ((f /= g / 2) < 1) {
           return h / 2 * Math.pow(2, 10 * (f - 1)) + a
       }
       return h / 2 * (-Math.pow(2, -10 * --f) + 2) + a
   },
   easeInCirc: function (e, f, a, h, g) {
       return -h * (Math.sqrt(1 - (f /= g) * f) - 1) + a
   },
   easeOutCirc: function (e, f, a, h, g) {
       return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
   },
   easeInOutCirc: function (e, f, a, h, g) {
       if ((f /= g / 2) < 1) {
           return -h / 2 * (Math.sqrt(1 - f * f) - 1) + a
       }
       return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
   },
   easeInElastic: function (f, h, e, l, k) {
       var i = 1.70158;
       var j = 0;
       var g = l;
       if (h == 0) {
           return e
       }
       if ((h /= k) == 1) {
           return e + l
       }
       if (!j) {
           j = k * 0.3
       }
       if (g < Math.abs(l)) {
           g = l;
           var i = j / 4
       } else {
           var i = j / (2 * Math.PI) * Math.asin(l / g)
       }
       return -(g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
   },
   easeOutElastic: function (f, h, e, l, k) {
       var i = 1.70158;
       var j = 0;
       var g = l;
       if (h == 0) {
           return e
       }
       if ((h /= k) == 1) {
           return e + l
       }
       if (!j) {
           j = k * 0.3
       }
       if (g < Math.abs(l)) {
           g = l;
           var i = j / 4
       } else {
           var i = j / (2 * Math.PI) * Math.asin(l / g)
       }
       return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e
   },
   easeInOutElastic: function (f, h, e, l, k) {
       var i = 1.70158;
       var j = 0;
       var g = l;
       if (h == 0) {
           return e
       }
       if ((h /= k / 2) == 2) {
           return e + l
       }
       if (!j) {
           j = k * (0.3 * 1.5)
       }
       if (g < Math.abs(l)) {
           g = l;
           var i = j / 4
       } else {
           var i = j / (2 * Math.PI) * Math.asin(l / g)
       }
       if (h < 1) {
           return -0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
       }
       return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e
   },
   easeInBack: function (e, f, a, i, h, g) {
       if (g == undefined) {
           g = 1.70158
       }
       return i * (f /= h) * f * ((g + 1) * f - g) + a
   },
   easeOutBack: function (e, f, a, i, h, g) {
       if (g == undefined) {
           g = 0.70158
       }
       return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
   },
   easeInOutBack: function (e, f, a, i, h, g) {
       if (g == undefined) {
           g = 1.70158
       }
       if ((f /= h / 2) < 1) {
           return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
       }
       return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
   },
   easeInBounce: function (e, f, a, h, g) {
       return h - jQuery.easing.easeOutBounce(e, g - f, 0, h, g) + a
   },
   easeOutBounce: function (e, f, a, h, g) {
       if ((f /= g) < (1 / 2.75)) {
           return h * (7.5625 * f * f) + a
       } else {
           if (f < (2 / 2.75)) {
               return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
           } else {
               if (f < (2.5 / 2.75)) {
                   return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
               } else {
                   return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
               }
           }
       }
   },
   easeInOutBounce: function (e, f, a, h, g) {
       if (f < g / 2) {
           return jQuery.easing.easeInBounce(e, f * 2, 0, h, g) * 0.5 + a
       }
       return jQuery.easing.easeOutBounce(e, f * 2 - g, 0, h, g) * 0.5 + h * 0.5 + a
   }
});
var center = $(window).width() / 2;
$(document).ready(function () {
   function d() {
       $(".slide.active img").each(function () {
           var g = parseInt($(this).attr("class").split(" ")[1].replace("left", ""));
           var i = g + center;
           var h = parseInt($(this).attr("class").split(" ")[3].replace("t", ""));
           var f = parseInt($(this).attr("class").split(" ")[4].replace("z", ""));
           if ($(this).hasClass("fade")) {
               $(this).css({
                   left: i,
                   top: h,
                   "z-index": f
               })
           } else {
               $(this).css({
                   left: i,
                   top: h,
                   "z-index": f
               }).show()
           }
       });
       setTimeout(function () {
           $(".slide.active img.fade,.slide.active .info").fadeIn(600, "easeInOutQuad", function () {
               $("#feature_slider").removeClass()
           })
       }, 800)
   }
   function c() {
       $("#feature_slider").addClass("disabled").append('<ul id="pagination" /><a href="" id="slide-left" /><a href="" id="slide-right" />');
       $("#feature_slider article").each(function () {
           $("#pagination").append('<li><a href="#' + $(this).attr("id") + '">' + $(this).index() + "</a></li>")
       });
       $("#pagination li:first").addClass("active");
       $("#pagination").css({
           left: ($(window).width() - $("#pagination li").length * 14) / 2
       });
       var h = 0;
       function j() {
           $(".slide.active img").each(function () {
               var l = parseInt($(this).attr("class").split(" ")[1].replace("left", ""));
               var q = l + center;
               // var p = parseInt($(this).attr("class").split(" ")[2].replace("st", ""));
               var p = 400;
               var n = parseInt($(this).attr("class").split(" ")[2].replace("sp", ""));
               var o = parseInt($(this).attr("class").split(" ")[3].replace("t", ""));
               var k = parseInt($(this).attr("class").split(" ")[4].replace("z", ""));
               if ($(this).hasClass("fade")) {
                   $(this).css({
                       left: q,
                       top: o,
                       "z-index": k
                   })
               } else {
                   if ($("#feature_slider").hasClass("scrollLeft")) {
                       var m = -$(this).width() - p
                   } else {
                       var m = $(window).width() + p
                   }
                   $(this).css({
                       left: m,
                       top: o,
                       "z-index": k
                   }).show();
                   $(this).animate({
                       left: q
                   }, n, "easeOutQuad")
               }
           });
           setTimeout(function () {
               $(".slide.active img.fade,.slide.active .info").fadeIn(600, "easeInOutQuad", function () {
                   $("#feature_slider").removeClass()
               })
           }, 600)
       }
       function g() {
           $(".slide.active").removeClass("active").addClass("previous");
           $(".slide.previous img").not(".fade").each(function () {
               // var l = parseInt($(this).attr("class").split(" ")[2].replace("st", ""));
               var l = 400;
               var k = parseInt($(this).attr("class").split(" ")[2].replace("sp", ""));
               if ($("#feature_slider").hasClass("scrollLeft")) {
                   $(this).animate({
                       left: $(window).width() + l
                   }, k, "easeInQuad")
               } else {
                   $(this).animate({
                       left: -$(this).width() - l
                   }, k, "easeInQuad")
               }
           });
           // speed of transitions
           $(".slide.previous img.fade,.slide.previous .info").fadeOut(600, "easeInQuad", function () {
               $(".slide.next").removeClass("next").addClass("active").fadeIn(500, "easeInOutQuad", function () {
                   $(".slide.previous").removeClass("previous").fadeOut(500, "easeInOutQuad");
                   j()
               })
           })
       }
       $(".slide:first").addClass("active").fadeIn(500, "easeInOutQuad", function () {
           $("#slide-left, #slide-right, #pagination").fadeIn(200, "easeInOutQuad", function () {
               j()
           })
       });
       $("#pagination li").not("active").click(function () {
           clearInterval(f);
           if ($(this).index() < $("#pagination li.active").index()) {
               $("#feature_slider").addClass("scrollLeft")
           }
           if (!$("#feature_slider").hasClass("disabled")) {
               $("#feature_slider").addClass("disabled");
               $("#pagination li.active").removeClass();
               $(this).addClass("active");
               $($(this).find("a").attr("href")).addClass("next");
               g()
           }
           return false
       });
       $("#slide-left").click(function () {
           clearInterval(f);
           if (!$("#feature_slider").hasClass("disabled")) {
               $("#feature_slider").addClass("disabled");
               if ($("#pagination li:first").hasClass("active")) {
                   $("#pagination li.active").removeClass();
                   $("#pagination li:last").addClass("active");
                   $("#feature_slider article:last").addClass("next")
               } else {
                   $("#pagination li.active").removeClass().prev().addClass("active");
                   $("#feature_slider article.active").prev().addClass("next")
               }
               $("#feature_slider").addClass("scrollLeft");
               g()
           }
           return false
       });
       function i() {
           if (!$("#feature_slider").hasClass("disabled")) {
               $("#feature_slider").addClass("disabled");
               if ($("#pagination li:last").hasClass("active")) {
                   $("#pagination li.active").removeClass();
                   $("#pagination li:first").addClass("active");
                   $("#feature_slider article:first").addClass("next")
               } else {
                   $("#pagination li.active").removeClass().next().addClass("active");
                   $("#feature_slider article.active").next().addClass("next")
               }
               g()
           }
       }
       $("#slide-right").click(function () {
           clearInterval(f);
           i();
           return false
       });
       var f = setInterval(function () {
           i()
       }, 5000)
   }
   c();
   $(window).resize(function () {
       $("#pagination").css({
           left: ($(window).width() - $("#pagination li").length * 14) / 2
       });
       center = $(window).width() / 2;
       d()
   });
});
var onepage = function( options )
{
var self = this,
active = null,
clicking = false,
scrolling = false;
self.collectMenus = [];
self.collectPages = [];
self.options = {
'offsetHeader' : 0,
'targetMenus' : [],
'targetPages' : [],
'detectByHash' : true,
'detectByScroll' : true,
'detectByResize' : true,
'beforeScroll' : function( menu, page, $this ){},
'afterScroll' : function( menu, page, $this ){}
}
self._init = function( options )
{
if( typeof options == 'object')
{
for( var option in options )
{
if( self.options[option] !== undefined )
{
if( option == 'beforeScroll' && typeof options[option] !== 'function' )
{
options[option] = function(){};
}
if( option == 'afterScroll' && typeof options[option] !== 'function' )
{
options[option] = function(){};
}
self.options[option] = options[option];
}
}
}
self.ready(function(){
self.binding();
if( self.options.detectByScroll == true) 
{
self.scrolling();
}
if( self.options.detectByResize == true) 
{
self.resize();
}
});
}
self.binding = function() 
{
if( self.options.targetMenus.length > 0 )
{
for( var index in self.options.targetMenus )
{
if(self.collectMenus[index] == undefined )
{
self.collectMenus[index] = [];
}
$(self.options.targetMenus[index].get).each(function( i, $this){
var name = self.humanizeHash($($this).attr(self.options.targetMenus[index].target));
self.collectMenus[index].push({'name' : name, 'get' : $this});
});
}
} else {
alert('Target Menu not defined, filling Collection Menus not completed');
}
if( self.options.targetPages.length > 0 )
{
for( index in self.options.targetPages )
{
if(self.collectPages[index] == undefined )
{
self.collectPages[index] = [];
}
$(self.options.targetPages[index].get).each(function(i, $this){
var name = self.humanizeHash($($this).attr(self.options.targetPages[index].target));
self.collectPages[index].push({'name' : name, 'get' : $this});
});
}
} else {
alert('Target Pages not defined, filling Collection Pages not completed');
}
if( self.collectMenus.length > 0 && self.collectPages.length > 0 )
{
self.multiple();
} else {
alert('Collection menu/pages not filled, Binding not completed');
}
return self;
}
self.rebinding = function()
{
self.collectMenus = [];
self.collectPages = [];
self.binding();
}
self.multiple = function() 
{
var menu = self.collectMenus,
pages = self.collectPages,
name = self.humanizeHash(window.location.hash);
for(var c in menu)
{
$(menu[c]).each(function(i, attr)
{
var $this = attr.get;
$($this).click(function( e )
{
e.preventDefault();
clicking = true;
if( $("html:not(:animated), body:not(:animated)").length == 0 )
{
return false;
}
var page = null;
for(p in pages[c])
{
if( pages[c][p].name == attr.name )
{
page = $(pages[c][p].get);
}
}
if( page === null )
{
alert('Page not found');
return false;
}
self.options.beforeScroll(attr, page, $this);
if ( ! $($this).hasClass('active') ) 
{
active = attr.name;
self.setMenu(menu[c], active);
$("html:not(:animated)").animate({
scrollTop: page.offset().top - self.options.offsetHeader
}, 1000);
$("body:not(:animated)").animate({
scrollTop: page.offset().top - self.options.offsetHeader
}, 1000, function(){
self.options.afterScroll(attr, page, $this);
});
clicking = false;
}
return false;
});
if( self.options.detectByHash === true && name !== null )
{
if(attr.name == name)
{
active = attr.name;
self.setMenu(menu[c], active);
for(var p in pages[c])
{
if( pages[c][p].name == attr.name )
{
page = $(pages[c][p].get);
}
}
var page = null;
for(var p in pages[c])
{
if( pages[c][p].name == attr.name )
{
page = $(pages[c][p].get);
}
}
if( page === null )
{
alert('Page not found');
return false;
}
self.options.beforeScroll(attr, page, $this);
active = attr.name;
self.setMenu(menu[c], active);
$("html:not(:animated)").animate({
scrollTop: page.offset().top - self.options.offsetHeader
}, 1000);
$("body:not(:animated)").animate({
scrollTop: page.offset().top - self.options.offsetHeader
}, 1000, function(){
self.options.afterScroll(attr, page, $this);
});
}
}
});
}
return self;
}
self.single = function( collections ) 
{
return false;
}
self.setMenu = function( menus, active )
{
for(var c in menus)
{
if( menus[c].name == active )
{
$(menus[c].get).addClass('active');
if( self.options.detectByHash === true )
{
self.addHash(menus[c].name)
}
} else {
$(menus[c].get).removeClass('active');
}
}
return false;
}
self.scrolling = function()
{
var menus = self.reorderScrollMenus(self.collectMenus),
pages = self.reorderScrollPages(self.collectPages),
page = null,
menu = null,
scrollTop = $(window).scrollTop(),
newScrollTop = 0,
current = 0;
$(window).scroll(function(){
if(clicking === true )
{
return false;
}
scrollTop = $(window).scrollTop();
scrolling = true;
if(page == null || page[0] !== active)
{
for(var p in pages)
{
if(pages[p][0] == active )
{
page = pages[p];
current = parseInt(p);
}
}
}
if(menu == null || menu.name !== active)
{
for(var m in menus)
{
if(menus[m].name == active)
{
menu = menus[m];
self.options.beforeScroll(menu, pages[current], menu.get);
}
}
}
if( newScrollTop < scrollTop || newScrollTop == 0 )
{
if( pages[(current+1)] !== undefined && (pages[(current+1)][1] - self.options.offsetHeader) <= newScrollTop )
{
current++;
active = pages[current][0];
for(m in menus)
{
if(menus[m].name == active )
{
self.options.afterScroll(menus[m], pages[current], menus[m].get);
self.setMenu(menus, active);
}
}
} 
}
else
{
if( (current-1) >= 0 && (pages[(current-1)][1] - self.options.offsetHeader) >= newScrollTop || (current-1) >= 0 && (pages[(current)][1] - self.options.offsetHeader) >= newScrollTop )
{
current--;
active = pages[current][0];
for(m in menus)
{
if(menus[m].name == active )
{
self.options.afterScroll(menus[m], pages[current], menus[m].get);
self.setMenu(menus, active);
}
}
} 
}
newScrollTop = scrollTop;
});
}
self.resize = function()
{
var clearTime = null,
current = 0;
$(window).resize(function(){
if( clearTime != null )
{
clearTimeout(clearTime);
clearTime = null;
}
clearTime = setTimeout(function(){
if( ! scrolling ) 
{
var pages = self.reorderScrollPages(self.collectPages);
var menus = self.reorderScrollMenus(self.collectMenus);
var page = null;
var menu = null;
for(var p in pages)
{
if(pages[p][0] == active )
{
page = pages[p];
current = parseInt(p);
}
}
for(var m in menus)
{
if(menus[m].name == active )
{
menu = menus[m];
}
}
self.options.beforeScroll(menu, page, menu.get);
$("html:not(:animated)").animate({
scrollTop: pages[current][1] - self.options.offsetHeader
}, 1000);
$("body:not(:animated)").animate({
scrollTop: pages[current][1] - self.options.offsetHeader
}, 1000, function(){
self.options.afterScroll(menu, page, menu.get);
});
}
}, 1000);
scrolling = false;
});
}
self.reorderScrollPages = function( pages ) 
{
var sortable = [];
for( var i in pages)
{
for( var c in pages[i] )
{
sortable.push([ pages[i][c].name, $(pages[i][c].get).offset().top ])
}
}
sortable.sort(function(a, b) {return a[1] - b[1]});
return sortable;
}
self.reorderScrollMenus = function( menu ) 
{
var sortable = [];
for( var i in menu)
{
for( var c in menu[i] )
{
sortable.push(menu[i][c])
}
}
return sortable;
}
self.humanizeHash = function( url )
{
if( url == undefined )
{
return url;
}
var hash = url.split('#');
if( hash[1] !== undefined )
{
if( hash[1].substr(0, 1) == '/')
{
hash = hash[1].substr(1);
} else {
hash = hash[1];
}
} else {
hash = url;
}
return hash; 
}
self.addHash = function( hash )
{
window.location.hash = '/' + hash;
}
self.ready = function ( callback )
{
var body = document.body;
if(body && body.readyState == 'loaded') 
{
callback();
} else {
if (window.addEventListener)
{  
window.addEventListener('load', callback, false);
} else {
window.attachEvent('onload', callback);
}
}
}
self._init( options );
}
<?php
ob_end_flush();
header("Content-type: text/javascript; charset: UTF-8");
header("Cache-Control: must-revalidate");
$offset = 3600;
$exp = "Expires: ".gmdate("D, d M Y H:i:s",time() + $offset)." GMT";
header($exp);
$size = "Content-Length: ".ob_get_length();
header($size);
ob_end_flush();
?>
