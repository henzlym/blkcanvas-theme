!function(){var e,t={941:function(e,t,n){"use strict";n(806),function(e,t){let n=document.querySelector(".hamburger-menu"),o=document.querySelector(".site-navigation"),r=document.querySelector("header .search-trigger"),a=document.querySelector("header form.search");n.addEventListener("click",(function(){if(document.body.classList.toggle("mobile-nav-open"),o.classList.toggle("active"),o.classList.contains("active")){let e=document.querySelector("header.header"),t=(e.offsetWidth,e.offsetHeight);blkcanvasTheme.isAdminBarShowing&&(t+=document.querySelector("#wpadminbar").offsetHeight),o.style.top=t+"px"}else o.style.top="0px"})),r.addEventListener("click",(function(e){e.preventDefault(),a.classList.toggle("open"),document.body.contains("mobile-nav-open")}))}(window,document)},806:function(){window.addEventListener("load",(function(){window.googletag=window.googletag||{cmd:[]};let e=[{path:"/6355419/Travel/Europe/France/Paris",size:[300,250],div:"box-ad-incontent_1"},{path:"/6355419/Travel/Europe/France",size:[300,250],div:"box-ad-incontent_2"},{path:"/6355419/Travel/Europe/France",size:[300,250],div:"box-ad-sidebar_1"},{path:"/6355419/Travel/Europe",size:[728,90],div:"banner-ad_header"},{path:"/6355419/Travel/Europe",size:[728,90],div:"banner-ad_footer"}];googletag.cmd.push((function(){e.forEach((e=>{googletag.defineSlot(e.path,e.size,e.div).addService(googletag.pubads())})),googletag.pubads().enableSingleRequest(),googletag.enableServices()})),e.forEach((e=>{googletag.cmd.push((function(){googletag.display(e.div)}))}))}))}},n={};function o(e){var r=n[e];if(void 0!==r)return r.exports;var a=n[e]={exports:{}};return t[e](a,a.exports,o),a.exports}o.m=t,e=[],o.O=function(t,n,r,a){if(!n){var i=1/0;for(s=0;s<e.length;s++){n=e[s][0],r=e[s][1],a=e[s][2];for(var c=!0,u=0;u<n.length;u++)(!1&a||i>=a)&&Object.keys(o.O).every((function(e){return o.O[e](n[u])}))?n.splice(u--,1):(c=!1,a<i&&(i=a));if(c){e.splice(s--,1);var l=r();void 0!==l&&(t=l)}}return t}a=a||0;for(var s=e.length;s>0&&e[s-1][2]>a;s--)e[s]=e[s-1];e[s]=[n,r,a]},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={826:0,431:0};o.O.j=function(t){return 0===e[t]};var t=function(t,n){var r,a,i=n[0],c=n[1],u=n[2],l=0;if(i.some((function(t){return 0!==e[t]}))){for(r in c)o.o(c,r)&&(o.m[r]=c[r]);if(u)var s=u(o)}for(t&&t(n);l<i.length;l++)a=i[l],o.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return o.O(s)},n=self.webpackChunkblk_canvas_theme=self.webpackChunkblk_canvas_theme||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var r=o.O(void 0,[431],(function(){return o(941)}));r=o.O(r)}();