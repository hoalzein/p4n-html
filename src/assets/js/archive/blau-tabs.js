/*! jQuery v1.11.2 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
!function(a,b){"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){var c=[],d=c.slice,e=c.concat,f=c.push,g=c.indexOf,h={},i=h.toString,j=h.hasOwnProperty,k={},l="1.11.2",m=function(a,b){return new m.fn.init(a,b)},n=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,o=/^-ms-/,p=/-([\da-z])/gi,q=function(a,b){return b.toUpperCase()};m.fn=m.prototype={jquery:l,constructor:m,selector:"",length:0,toArray:function(){return d.call(this)},get:function(a){return null!=a?0>a?this[a+this.length]:this[a]:d.call(this)},pushStack:function(a){var b=m.merge(this.constructor(),a);return b.prevObject=this,b.context=this.context,b},each:function(a,b){return m.each(this,a,b)},map:function(a){return this.pushStack(m.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(d.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(0>a?b:0);return this.pushStack(c>=0&&b>c?[this[c]]:[])},end:function(){return this.prevObject||this.constructor(null)},push:f,sort:c.sort,splice:c.splice},m.extend=m.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||m.isFunction(g)||(g={}),h===i&&(g=this,h--);i>h;h++)if(null!=(e=arguments[h]))for(d in e)a=g[d],c=e[d],g!==c&&(j&&c&&(m.isPlainObject(c)||(b=m.isArray(c)))?(b?(b=!1,f=a&&m.isArray(a)?a:[]):f=a&&m.isPlainObject(a)?a:{},g[d]=m.extend(j,f,c)):void 0!==c&&(g[d]=c));return g},m.extend({expando:"jQuery"+(l+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===m.type(a)},isArray:Array.isArray||function(a){return"array"===m.type(a)},isWindow:function(a){return null!=a&&a==a.window},isNumeric:function(a){return!m.isArray(a)&&a-parseFloat(a)+1>=0},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},isPlainObject:function(a){var b;if(!a||"object"!==m.type(a)||a.nodeType||m.isWindow(a))return!1;try{if(a.constructor&&!j.call(a,"constructor")&&!j.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}if(k.ownLast)for(b in a)return j.call(a,b);for(b in a);return void 0===b||j.call(a,b)},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?h[i.call(a)]||"object":typeof a},globalEval:function(b){b&&m.trim(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(o,"ms-").replace(p,q)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b,c){var d,e=0,f=a.length,g=r(a);if(c){if(g){for(;f>e;e++)if(d=b.apply(a[e],c),d===!1)break}else for(e in a)if(d=b.apply(a[e],c),d===!1)break}else if(g){for(;f>e;e++)if(d=b.call(a[e],e,a[e]),d===!1)break}else for(e in a)if(d=b.call(a[e],e,a[e]),d===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(n,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(r(Object(a))?m.merge(c,"string"==typeof a?[a]:a):f.call(c,a)),c},inArray:function(a,b,c){var d;if(b){if(g)return g.call(b,a,c);for(d=b.length,c=c?0>c?Math.max(0,d+c):c:0;d>c;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,b){var c=+b.length,d=0,e=a.length;while(c>d)a[e++]=b[d++];if(c!==c)while(void 0!==b[d])a[e++]=b[d++];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;g>f;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,f=0,g=a.length,h=r(a),i=[];if(h)for(;g>f;f++)d=b(a[f],f,c),null!=d&&i.push(d);else for(f in a)d=b(a[f],f,c),null!=d&&i.push(d);return e.apply([],i)},guid:1,proxy:function(a,b){var c,e,f;return"string"==typeof b&&(f=a[b],b=a,a=f),m.isFunction(a)?(c=d.call(arguments,2),e=function(){return a.apply(b||this,c.concat(d.call(arguments)))},e.guid=a.guid=a.guid||m.guid++,e):void 0},now:function(){return+new Date},support:k}),m.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(a,b){h["[object "+b+"]"]=b.toLowerCase()});function r(a){var b=a.length,c=m.type(a);return"function"===c||m.isWindow(a)?!1:1===a.nodeType&&b?!0:"array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a}var s=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+1*new Date,v=a.document,w=0,x=0,y=hb(),z=hb(),A=hb(),B=function(a,b){return a===b&&(l=!0),0},C=1<<31,D={}.hasOwnProperty,E=[],F=E.pop,G=E.push,H=E.push,I=E.slice,J=function(a,b){for(var c=0,d=a.length;d>c;c++)if(a[c]===b)return c;return-1},K="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",L="[\\x20\\t\\r\\n\\f]",M="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",N=M.replace("w","w#"),O="\\["+L+"*("+M+")(?:"+L+"*([*^$|!~]?=)"+L+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+N+"))|)"+L+"*\\]",P=":("+M+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+O+")*)|.*)\\)|)",Q=new RegExp(L+"+","g"),R=new RegExp("^"+L+"+|((?:^|[^\\\\])(?:\\\\.)*)"+L+"+$","g"),S=new RegExp("^"+L+"*,"+L+"*"),T=new RegExp("^"+L+"*([>+~]|"+L+")"+L+"*"),U=new RegExp("="+L+"*([^\\]'\"]*?)"+L+"*\\]","g"),V=new RegExp(P),W=new RegExp("^"+N+"$"),X={ID:new RegExp("^#("+M+")"),CLASS:new RegExp("^\\.("+M+")"),TAG:new RegExp("^("+M.replace("w","w*")+")"),ATTR:new RegExp("^"+O),PSEUDO:new RegExp("^"+P),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+L+"*(even|odd|(([+-]|)(\\d*)n|)"+L+"*(?:([+-]|)"+L+"*(\\d+)|))"+L+"*\\)|)","i"),bool:new RegExp("^(?:"+K+")$","i"),needsContext:new RegExp("^"+L+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+L+"*((?:-\\d)?\\d*)"+L+"*\\)|)(?=[^-]|$)","i")},Y=/^(?:input|select|textarea|button)$/i,Z=/^h\d$/i,$=/^[^{]+\{\s*\[native \w/,_=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,ab=/[+~]/,bb=/'|\\/g,cb=new RegExp("\\\\([\\da-f]{1,6}"+L+"?|("+L+")|.)","ig"),db=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:0>d?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)},eb=function(){m()};try{H.apply(E=I.call(v.childNodes),v.childNodes),E[v.childNodes.length].nodeType}catch(fb){H={apply:E.length?function(a,b){G.apply(a,I.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function gb(a,b,d,e){var f,h,j,k,l,o,r,s,w,x;if((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,d=d||[],k=b.nodeType,"string"!=typeof a||!a||1!==k&&9!==k&&11!==k)return d;if(!e&&p){if(11!==k&&(f=_.exec(a)))if(j=f[1]){if(9===k){if(h=b.getElementById(j),!h||!h.parentNode)return d;if(h.id===j)return d.push(h),d}else if(b.ownerDocument&&(h=b.ownerDocument.getElementById(j))&&t(b,h)&&h.id===j)return d.push(h),d}else{if(f[2])return H.apply(d,b.getElementsByTagName(a)),d;if((j=f[3])&&c.getElementsByClassName)return H.apply(d,b.getElementsByClassName(j)),d}if(c.qsa&&(!q||!q.test(a))){if(s=r=u,w=b,x=1!==k&&a,1===k&&"object"!==b.nodeName.toLowerCase()){o=g(a),(r=b.getAttribute("id"))?s=r.replace(bb,"\\$&"):b.setAttribute("id",s),s="[id='"+s+"'] ",l=o.length;while(l--)o[l]=s+rb(o[l]);w=ab.test(a)&&pb(b.parentNode)||b,x=o.join(",")}if(x)try{return H.apply(d,w.querySelectorAll(x)),d}catch(y){}finally{r||b.removeAttribute("id")}}}return i(a.replace(R,"$1"),b,d,e)}function hb(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function ib(a){return a[u]=!0,a}function jb(a){var b=n.createElement("div");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function kb(a,b){var c=a.split("|"),e=a.length;while(e--)d.attrHandle[c[e]]=b}function lb(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&(~b.sourceIndex||C)-(~a.sourceIndex||C);if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function mb(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function nb(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function ob(a){return ib(function(b){return b=+b,ib(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function pb(a){return a&&"undefined"!=typeof a.getElementsByTagName&&a}c=gb.support={},f=gb.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return b?"HTML"!==b.nodeName:!1},m=gb.setDocument=function(a){var b,e,g=a?a.ownerDocument||a:v;return g!==n&&9===g.nodeType&&g.documentElement?(n=g,o=g.documentElement,e=g.defaultView,e&&e!==e.top&&(e.addEventListener?e.addEventListener("unload",eb,!1):e.attachEvent&&e.attachEvent("onunload",eb)),p=!f(g),c.attributes=jb(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=jb(function(a){return a.appendChild(g.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=$.test(g.getElementsByClassName),c.getById=jb(function(a){return o.appendChild(a).id=u,!g.getElementsByName||!g.getElementsByName(u).length}),c.getById?(d.find.ID=function(a,b){if("undefined"!=typeof b.getElementById&&p){var c=b.getElementById(a);return c&&c.parentNode?[c]:[]}},d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){return a.getAttribute("id")===b}}):(delete d.find.ID,d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){var c="undefined"!=typeof a.getAttributeNode&&a.getAttributeNode("id");return c&&c.value===b}}),d.find.TAG=c.getElementsByTagName?function(a,b){return"undefined"!=typeof b.getElementsByTagName?b.getElementsByTagName(a):c.qsa?b.querySelectorAll(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){return p?b.getElementsByClassName(a):void 0},r=[],q=[],(c.qsa=$.test(g.querySelectorAll))&&(jb(function(a){o.appendChild(a).innerHTML="<a id='"+u+"'></a><select id='"+u+"-\f]' msallowcapture=''><option selected=''></option></select>",a.querySelectorAll("[msallowcapture^='']").length&&q.push("[*^$]="+L+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+L+"*(?:value|"+K+")"),a.querySelectorAll("[id~="+u+"-]").length||q.push("~="),a.querySelectorAll(":checked").length||q.push(":checked"),a.querySelectorAll("a#"+u+"+*").length||q.push(".#.+[+~]")}),jb(function(a){var b=g.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+L+"*[*^$|!~]?="),a.querySelectorAll(":enabled").length||q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=$.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&jb(function(a){c.disconnectedMatch=s.call(a,"div"),s.call(a,"[s!='']:x"),r.push("!=",P)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=$.test(o.compareDocumentPosition),t=b||$.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===g||a.ownerDocument===v&&t(v,a)?-1:b===g||b.ownerDocument===v&&t(v,b)?1:k?J(k,a)-J(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,e=a.parentNode,f=b.parentNode,h=[a],i=[b];if(!e||!f)return a===g?-1:b===g?1:e?-1:f?1:k?J(k,a)-J(k,b):0;if(e===f)return lb(a,b);c=a;while(c=c.parentNode)h.unshift(c);c=b;while(c=c.parentNode)i.unshift(c);while(h[d]===i[d])d++;return d?lb(h[d],i[d]):h[d]===v?-1:i[d]===v?1:0},g):n},gb.matches=function(a,b){return gb(a,null,null,b)},gb.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(U,"='$1']"),!(!c.matchesSelector||!p||r&&r.test(b)||q&&q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return gb(b,n,null,[a]).length>0},gb.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},gb.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&D.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},gb.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},gb.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=gb.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=gb.selectors={cacheLength:50,createPseudo:ib,match:X,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(cb,db),a[3]=(a[3]||a[4]||a[5]||"").replace(cb,db),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||gb.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&gb.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return X.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&V.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(cb,db).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+L+")"+a+"("+L+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||"undefined"!=typeof a.getAttribute&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=gb.attr(d,a);return null==e?"!="===b:b?(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e.replace(Q," ")+" ").indexOf(c)>-1:"|="===b?e===c||e.slice(0,c.length+1)===c+"-":!1):!0}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h;if(q){if(f){while(p){l=b;while(l=l[p])if(h?l.nodeName.toLowerCase()===r:1===l.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){k=q[u]||(q[u]={}),j=k[a]||[],n=j[0]===w&&j[1],m=j[0]===w&&j[2],l=n&&q.childNodes[n];while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if(1===l.nodeType&&++m&&l===b){k[a]=[w,n,m];break}}else if(s&&(j=(b[u]||(b[u]={}))[a])&&j[0]===w)m=j[1];else while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if((h?l.nodeName.toLowerCase()===r:1===l.nodeType)&&++m&&(s&&((l[u]||(l[u]={}))[a]=[w,m]),l===b))break;return m-=e,m===d||m%d===0&&m/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||gb.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?ib(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=J(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:ib(function(a){var b=[],c=[],d=h(a.replace(R,"$1"));return d[u]?ib(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),b[0]=null,!c.pop()}}),has:ib(function(a){return function(b){return gb(a,b).length>0}}),contains:ib(function(a){return a=a.replace(cb,db),function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:ib(function(a){return W.test(a||"")||gb.error("unsupported lang: "+a),a=a.replace(cb,db).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:function(a){return a.disabled===!1},disabled:function(a){return a.disabled===!0},checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return Z.test(a.nodeName)},input:function(a){return Y.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:ob(function(){return[0]}),last:ob(function(a,b){return[b-1]}),eq:ob(function(a,b,c){return[0>c?c+b:c]}),even:ob(function(a,b){for(var c=0;b>c;c+=2)a.push(c);return a}),odd:ob(function(a,b){for(var c=1;b>c;c+=2)a.push(c);return a}),lt:ob(function(a,b,c){for(var d=0>c?c+b:c;--d>=0;)a.push(d);return a}),gt:ob(function(a,b,c){for(var d=0>c?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=mb(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=nb(b);function qb(){}qb.prototype=d.filters=d.pseudos,d.setFilters=new qb,g=gb.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){(!c||(e=S.exec(h)))&&(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=T.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(R," ")}),h=h.slice(c.length));for(g in d.filter)!(e=X[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?gb.error(a):z(a,i).slice(0)};function rb(a){for(var b=0,c=a.length,d="";c>b;b++)d+=a[b].value;return d}function sb(a,b,c){var d=b.dir,e=c&&"parentNode"===d,f=x++;return b.first?function(b,c,f){while(b=b[d])if(1===b.nodeType||e)return a(b,c,f)}:function(b,c,g){var h,i,j=[w,f];if(g){while(b=b[d])if((1===b.nodeType||e)&&a(b,c,g))return!0}else while(b=b[d])if(1===b.nodeType||e){if(i=b[u]||(b[u]={}),(h=i[d])&&h[0]===w&&h[1]===f)return j[2]=h[2];if(i[d]=j,j[2]=a(b,c,g))return!0}}}function tb(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function ub(a,b,c){for(var d=0,e=b.length;e>d;d++)gb(a,b[d],c);return c}function vb(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;i>h;h++)(f=a[h])&&(!c||c(f,d,e))&&(g.push(f),j&&b.push(h));return g}function wb(a,b,c,d,e,f){return d&&!d[u]&&(d=wb(d)),e&&!e[u]&&(e=wb(e,f)),ib(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||ub(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:vb(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=vb(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?J(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=vb(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):H.apply(g,r)})}function xb(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=sb(function(a){return a===b},h,!0),l=sb(function(a){return J(b,a)>-1},h,!0),m=[function(a,c,d){var e=!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d));return b=null,e}];f>i;i++)if(c=d.relative[a[i].type])m=[sb(tb(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;f>e;e++)if(d.relative[a[e].type])break;return wb(i>1&&tb(m),i>1&&rb(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(R,"$1"),c,e>i&&xb(a.slice(i,e)),f>e&&xb(a=a.slice(e)),f>e&&rb(a))}m.push(c)}return tb(m)}function yb(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,m,o,p=0,q="0",r=f&&[],s=[],t=j,u=f||e&&d.find.TAG("*",k),v=w+=null==t?1:Math.random()||.1,x=u.length;for(k&&(j=g!==n&&g);q!==x&&null!=(l=u[q]);q++){if(e&&l){m=0;while(o=a[m++])if(o(l,g,h)){i.push(l);break}k&&(w=v)}c&&((l=!o&&l)&&p--,f&&r.push(l))}if(p+=q,c&&q!==p){m=0;while(o=b[m++])o(r,s,g,h);if(f){if(p>0)while(q--)r[q]||s[q]||(s[q]=F.call(i));s=vb(s)}H.apply(i,s),k&&!f&&s.length>0&&p+b.length>1&&gb.uniqueSort(i)}return k&&(w=v,j=t),r};return c?ib(f):f}return h=gb.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=xb(b[c]),f[u]?d.push(f):e.push(f);f=A(a,yb(e,d)),f.selector=a}return f},i=gb.select=function(a,b,e,f){var i,j,k,l,m,n="function"==typeof a&&a,o=!f&&g(a=n.selector||a);if(e=e||[],1===o.length){if(j=o[0]=o[0].slice(0),j.length>2&&"ID"===(k=j[0]).type&&c.getById&&9===b.nodeType&&p&&d.relative[j[1].type]){if(b=(d.find.ID(k.matches[0].replace(cb,db),b)||[])[0],!b)return e;n&&(b=b.parentNode),a=a.slice(j.shift().value.length)}i=X.needsContext.test(a)?0:j.length;while(i--){if(k=j[i],d.relative[l=k.type])break;if((m=d.find[l])&&(f=m(k.matches[0].replace(cb,db),ab.test(j[0].type)&&pb(b.parentNode)||b))){if(j.splice(i,1),a=f.length&&rb(j),!a)return H.apply(e,f),e;break}}}return(n||h(a,o))(f,b,!p,e,ab.test(a)&&pb(b.parentNode)||b),e},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=jb(function(a){return 1&a.compareDocumentPosition(n.createElement("div"))}),jb(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||kb("type|href|height|width",function(a,b,c){return c?void 0:a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&jb(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||kb("value",function(a,b,c){return c||"input"!==a.nodeName.toLowerCase()?void 0:a.defaultValue}),jb(function(a){return null==a.getAttribute("disabled")})||kb(K,function(a,b,c){var d;return c?void 0:a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),gb}(a);m.find=s,m.expr=s.selectors,m.expr[":"]=m.expr.pseudos,m.unique=s.uniqueSort,m.text=s.getText,m.isXMLDoc=s.isXML,m.contains=s.contains;var t=m.expr.match.needsContext,u=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,v=/^.[^:#\[\.,]*$/;function w(a,b,c){if(m.isFunction(b))return m.grep(a,function(a,d){return!!b.call(a,d,a)!==c});if(b.nodeType)return m.grep(a,function(a){return a===b!==c});if("string"==typeof b){if(v.test(b))return m.filter(b,a,c);b=m.filter(b,a)}return m.grep(a,function(a){return m.inArray(a,b)>=0!==c})}m.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?m.find.matchesSelector(d,a)?[d]:[]:m.find.matches(a,m.grep(b,function(a){return 1===a.nodeType}))},m.fn.extend({find:function(a){var b,c=[],d=this,e=d.length;if("string"!=typeof a)return this.pushStack(m(a).filter(function(){for(b=0;e>b;b++)if(m.contains(d[b],this))return!0}));for(b=0;e>b;b++)m.find(a,d[b],c);return c=this.pushStack(e>1?m.unique(c):c),c.selector=this.selector?this.selector+" "+a:a,c},filter:function(a){return this.pushStack(w(this,a||[],!1))},not:function(a){return this.pushStack(w(this,a||[],!0))},is:function(a){return!!w(this,"string"==typeof a&&t.test(a)?m(a):a||[],!1).length}});var x,y=a.document,z=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,A=m.fn.init=function(a,b){var c,d;if(!a)return this;if("string"==typeof a){if(c="<"===a.charAt(0)&&">"===a.charAt(a.length-1)&&a.length>=3?[null,a,null]:z.exec(a),!c||!c[1]&&b)return!b||b.jquery?(b||x).find(a):this.constructor(b).find(a);if(c[1]){if(b=b instanceof m?b[0]:b,m.merge(this,m.parseHTML(c[1],b&&b.nodeType?b.ownerDocument||b:y,!0)),u.test(c[1])&&m.isPlainObject(b))for(c in b)m.isFunction(this[c])?this[c](b[c]):this.attr(c,b[c]);return this}if(d=y.getElementById(c[2]),d&&d.parentNode){if(d.id!==c[2])return x.find(a);this.length=1,this[0]=d}return this.context=y,this.selector=a,this}return a.nodeType?(this.context=this[0]=a,this.length=1,this):m.isFunction(a)?"undefined"!=typeof x.ready?x.ready(a):a(m):(void 0!==a.selector&&(this.selector=a.selector,this.context=a.context),m.makeArray(a,this))};A.prototype=m.fn,x=m(y);var B=/^(?:parents|prev(?:Until|All))/,C={children:!0,contents:!0,next:!0,prev:!0};m.extend({dir:function(a,b,c){var d=[],e=a[b];while(e&&9!==e.nodeType&&(void 0===c||1!==e.nodeType||!m(e).is(c)))1===e.nodeType&&d.push(e),e=e[b];return d},sibling:function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c}}),m.fn.extend({has:function(a){var b,c=m(a,this),d=c.length;return this.filter(function(){for(b=0;d>b;b++)if(m.contains(this,c[b]))return!0})},closest:function(a,b){for(var c,d=0,e=this.length,f=[],g=t.test(a)||"string"!=typeof a?m(a,b||this.context):0;e>d;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&m.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?m.unique(f):f)},index:function(a){return a?"string"==typeof a?m.inArray(this[0],m(a)):m.inArray(a.jquery?a[0]:a,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(m.unique(m.merge(this.get(),m(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function D(a,b){do a=a[b];while(a&&1!==a.nodeType);return a}m.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return m.dir(a,"parentNode")},parentsUntil:function(a,b,c){return m.dir(a,"parentNode",c)},next:function(a){return D(a,"nextSibling")},prev:function(a){return D(a,"previousSibling")},nextAll:function(a){return m.dir(a,"nextSibling")},prevAll:function(a){return m.dir(a,"previousSibling")},nextUntil:function(a,b,c){return m.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return m.dir(a,"previousSibling",c)},siblings:function(a){return m.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return m.sibling(a.firstChild)},contents:function(a){return m.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:m.merge([],a.childNodes)}},function(a,b){m.fn[a]=function(c,d){var e=m.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=m.filter(d,e)),this.length>1&&(C[a]||(e=m.unique(e)),B.test(a)&&(e=e.reverse())),this.pushStack(e)}});var E=/\S+/g,F={};function G(a){var b=F[a]={};return m.each(a.match(E)||[],function(a,c){b[c]=!0}),b}m.Callbacks=function(a){a="string"==typeof a?F[a]||G(a):m.extend({},a);var b,c,d,e,f,g,h=[],i=!a.once&&[],j=function(l){for(c=a.memory&&l,d=!0,f=g||0,g=0,e=h.length,b=!0;h&&e>f;f++)if(h[f].apply(l[0],l[1])===!1&&a.stopOnFalse){c=!1;break}b=!1,h&&(i?i.length&&j(i.shift()):c?h=[]:k.disable())},k={add:function(){if(h){var d=h.length;!function f(b){m.each(b,function(b,c){var d=m.type(c);"function"===d?a.unique&&k.has(c)||h.push(c):c&&c.length&&"string"!==d&&f(c)})}(arguments),b?e=h.length:c&&(g=d,j(c))}return this},remove:function(){return h&&m.each(arguments,function(a,c){var d;while((d=m.inArray(c,h,d))>-1)h.splice(d,1),b&&(e>=d&&e--,f>=d&&f--)}),this},has:function(a){return a?m.inArray(a,h)>-1:!(!h||!h.length)},empty:function(){return h=[],e=0,this},disable:function(){return h=i=c=void 0,this},disabled:function(){return!h},lock:function(){return i=void 0,c||k.disable(),this},locked:function(){return!i},fireWith:function(a,c){return!h||d&&!i||(c=c||[],c=[a,c.slice?c.slice():c],b?i.push(c):j(c)),this},fire:function(){return k.fireWith(this,arguments),this},fired:function(){return!!d}};return k},m.extend({Deferred:function(a){var b=[["resolve","done",m.Callbacks("once memory"),"resolved"],["reject","fail",m.Callbacks("once memory"),"rejected"],["notify","progress",m.Callbacks("memory")]],c="pending",d={state:function(){return c},always:function(){return e.done(arguments).fail(arguments),this},then:function(){var a=arguments;return m.Deferred(function(c){m.each(b,function(b,f){var g=m.isFunction(a[b])&&a[b];e[f[1]](function(){var a=g&&g.apply(this,arguments);a&&m.isFunction(a.promise)?a.promise().done(c.resolve).fail(c.reject).progress(c.notify):c[f[0]+"With"](this===d?c.promise():this,g?[a]:arguments)})}),a=null}).promise()},promise:function(a){return null!=a?m.extend(a,d):d}},e={};return d.pipe=d.then,m.each(b,function(a,f){var g=f[2],h=f[3];d[f[1]]=g.add,h&&g.add(function(){c=h},b[1^a][2].disable,b[2][2].lock),e[f[0]]=function(){return e[f[0]+"With"](this===e?d:this,arguments),this},e[f[0]+"With"]=g.fireWith}),d.promise(e),a&&a.call(e,e),e},when:function(a){var b=0,c=d.call(arguments),e=c.length,f=1!==e||a&&m.isFunction(a.promise)?e:0,g=1===f?a:m.Deferred(),h=function(a,b,c){return function(e){b[a]=this,c[a]=arguments.length>1?d.call(arguments):e,c===i?g.notifyWith(b,c):--f||g.resolveWith(b,c)}},i,j,k;if(e>1)for(i=new Array(e),j=new Array(e),k=new Array(e);e>b;b++)c[b]&&m.isFunction(c[b].promise)?c[b].promise().done(h(b,k,c)).fail(g.reject).progress(h(b,j,i)):--f;return f||g.resolveWith(k,c),g.promise()}});var H;m.fn.ready=function(a){return m.ready.promise().done(a),this},m.extend({isReady:!1,readyWait:1,holdReady:function(a){a?m.readyWait++:m.ready(!0)},ready:function(a){if(a===!0?!--m.readyWait:!m.isReady){if(!y.body)return setTimeout(m.ready);m.isReady=!0,a!==!0&&--m.readyWait>0||(H.resolveWith(y,[m]),m.fn.triggerHandler&&(m(y).triggerHandler("ready"),m(y).off("ready")))}}});function I(){y.addEventListener?(y.removeEventListener("DOMContentLoaded",J,!1),a.removeEventListener("load",J,!1)):(y.detachEvent("onreadystatechange",J),a.detachEvent("onload",J))}function J(){(y.addEventListener||"load"===event.type||"complete"===y.readyState)&&(I(),m.ready())}m.ready.promise=function(b){if(!H)if(H=m.Deferred(),"complete"===y.readyState)setTimeout(m.ready);else if(y.addEventListener)y.addEventListener("DOMContentLoaded",J,!1),a.addEventListener("load",J,!1);else{y.attachEvent("onreadystatechange",J),a.attachEvent("onload",J);var c=!1;try{c=null==a.frameElement&&y.documentElement}catch(d){}c&&c.doScroll&&!function e(){if(!m.isReady){try{c.doScroll("left")}catch(a){return setTimeout(e,50)}I(),m.ready()}}()}return H.promise(b)};var K="undefined",L;for(L in m(k))break;k.ownLast="0"!==L,k.inlineBlockNeedsLayout=!1,m(function(){var a,b,c,d;c=y.getElementsByTagName("body")[0],c&&c.style&&(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),typeof b.style.zoom!==K&&(b.style.cssText="display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1",k.inlineBlockNeedsLayout=a=3===b.offsetWidth,a&&(c.style.zoom=1)),c.removeChild(d))}),function(){var a=y.createElement("div");if(null==k.deleteExpando){k.deleteExpando=!0;try{delete a.test}catch(b){k.deleteExpando=!1}}a=null}(),m.acceptData=function(a){var b=m.noData[(a.nodeName+" ").toLowerCase()],c=+a.nodeType||1;return 1!==c&&9!==c?!1:!b||b!==!0&&a.getAttribute("classid")===b};var M=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,N=/([A-Z])/g;function O(a,b,c){if(void 0===c&&1===a.nodeType){var d="data-"+b.replace(N,"-$1").toLowerCase();if(c=a.getAttribute(d),"string"==typeof c){try{c="true"===c?!0:"false"===c?!1:"null"===c?null:+c+""===c?+c:M.test(c)?m.parseJSON(c):c}catch(e){}m.data(a,b,c)}else c=void 0}return c}function P(a){var b;for(b in a)if(("data"!==b||!m.isEmptyObject(a[b]))&&"toJSON"!==b)return!1;
return!0}function Q(a,b,d,e){if(m.acceptData(a)){var f,g,h=m.expando,i=a.nodeType,j=i?m.cache:a,k=i?a[h]:a[h]&&h;if(k&&j[k]&&(e||j[k].data)||void 0!==d||"string"!=typeof b)return k||(k=i?a[h]=c.pop()||m.guid++:h),j[k]||(j[k]=i?{}:{toJSON:m.noop}),("object"==typeof b||"function"==typeof b)&&(e?j[k]=m.extend(j[k],b):j[k].data=m.extend(j[k].data,b)),g=j[k],e||(g.data||(g.data={}),g=g.data),void 0!==d&&(g[m.camelCase(b)]=d),"string"==typeof b?(f=g[b],null==f&&(f=g[m.camelCase(b)])):f=g,f}}function R(a,b,c){if(m.acceptData(a)){var d,e,f=a.nodeType,g=f?m.cache:a,h=f?a[m.expando]:m.expando;if(g[h]){if(b&&(d=c?g[h]:g[h].data)){m.isArray(b)?b=b.concat(m.map(b,m.camelCase)):b in d?b=[b]:(b=m.camelCase(b),b=b in d?[b]:b.split(" ")),e=b.length;while(e--)delete d[b[e]];if(c?!P(d):!m.isEmptyObject(d))return}(c||(delete g[h].data,P(g[h])))&&(f?m.cleanData([a],!0):k.deleteExpando||g!=g.window?delete g[h]:g[h]=null)}}}m.extend({cache:{},noData:{"applet ":!0,"embed ":!0,"object ":"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},hasData:function(a){return a=a.nodeType?m.cache[a[m.expando]]:a[m.expando],!!a&&!P(a)},data:function(a,b,c){return Q(a,b,c)},removeData:function(a,b){return R(a,b)},_data:function(a,b,c){return Q(a,b,c,!0)},_removeData:function(a,b){return R(a,b,!0)}}),m.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=m.data(f),1===f.nodeType&&!m._data(f,"parsedAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=m.camelCase(d.slice(5)),O(f,d,e[d])));m._data(f,"parsedAttrs",!0)}return e}return"object"==typeof a?this.each(function(){m.data(this,a)}):arguments.length>1?this.each(function(){m.data(this,a,b)}):f?O(f,a,m.data(f,a)):void 0},removeData:function(a){return this.each(function(){m.removeData(this,a)})}}),m.extend({queue:function(a,b,c){var d;return a?(b=(b||"fx")+"queue",d=m._data(a,b),c&&(!d||m.isArray(c)?d=m._data(a,b,m.makeArray(c)):d.push(c)),d||[]):void 0},dequeue:function(a,b){b=b||"fx";var c=m.queue(a,b),d=c.length,e=c.shift(),f=m._queueHooks(a,b),g=function(){m.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return m._data(a,c)||m._data(a,c,{empty:m.Callbacks("once memory").add(function(){m._removeData(a,b+"queue"),m._removeData(a,c)})})}}),m.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?m.queue(this[0],a):void 0===b?this:this.each(function(){var c=m.queue(this,a,b);m._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&m.dequeue(this,a)})},dequeue:function(a){return this.each(function(){m.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=m.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=m._data(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var S=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,T=["Top","Right","Bottom","Left"],U=function(a,b){return a=b||a,"none"===m.css(a,"display")||!m.contains(a.ownerDocument,a)},V=m.access=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===m.type(c)){e=!0;for(h in c)m.access(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,m.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(m(a),c)})),b))for(;i>h;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},W=/^(?:checkbox|radio)$/i;!function(){var a=y.createElement("input"),b=y.createElement("div"),c=y.createDocumentFragment();if(b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",k.leadingWhitespace=3===b.firstChild.nodeType,k.tbody=!b.getElementsByTagName("tbody").length,k.htmlSerialize=!!b.getElementsByTagName("link").length,k.html5Clone="<:nav></:nav>"!==y.createElement("nav").cloneNode(!0).outerHTML,a.type="checkbox",a.checked=!0,c.appendChild(a),k.appendChecked=a.checked,b.innerHTML="<textarea>x</textarea>",k.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue,c.appendChild(b),b.innerHTML="<input type='radio' checked='checked' name='t'/>",k.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,k.noCloneEvent=!0,b.attachEvent&&(b.attachEvent("onclick",function(){k.noCloneEvent=!1}),b.cloneNode(!0).click()),null==k.deleteExpando){k.deleteExpando=!0;try{delete b.test}catch(d){k.deleteExpando=!1}}}(),function(){var b,c,d=y.createElement("div");for(b in{submit:!0,change:!0,focusin:!0})c="on"+b,(k[b+"Bubbles"]=c in a)||(d.setAttribute(c,"t"),k[b+"Bubbles"]=d.attributes[c].expando===!1);d=null}();var X=/^(?:input|select|textarea)$/i,Y=/^key/,Z=/^(?:mouse|pointer|contextmenu)|click/,$=/^(?:focusinfocus|focusoutblur)$/,_=/^([^.]*)(?:\.(.+)|)$/;function ab(){return!0}function bb(){return!1}function cb(){try{return y.activeElement}catch(a){}}m.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,n,o,p,q,r=m._data(a);if(r){c.handler&&(i=c,c=i.handler,e=i.selector),c.guid||(c.guid=m.guid++),(g=r.events)||(g=r.events={}),(k=r.handle)||(k=r.handle=function(a){return typeof m===K||a&&m.event.triggered===a.type?void 0:m.event.dispatch.apply(k.elem,arguments)},k.elem=a),b=(b||"").match(E)||[""],h=b.length;while(h--)f=_.exec(b[h])||[],o=q=f[1],p=(f[2]||"").split(".").sort(),o&&(j=m.event.special[o]||{},o=(e?j.delegateType:j.bindType)||o,j=m.event.special[o]||{},l=m.extend({type:o,origType:q,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&m.expr.match.needsContext.test(e),namespace:p.join(".")},i),(n=g[o])||(n=g[o]=[],n.delegateCount=0,j.setup&&j.setup.call(a,d,p,k)!==!1||(a.addEventListener?a.addEventListener(o,k,!1):a.attachEvent&&a.attachEvent("on"+o,k))),j.add&&(j.add.call(a,l),l.handler.guid||(l.handler.guid=c.guid)),e?n.splice(n.delegateCount++,0,l):n.push(l),m.event.global[o]=!0);a=null}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,n,o,p,q,r=m.hasData(a)&&m._data(a);if(r&&(k=r.events)){b=(b||"").match(E)||[""],j=b.length;while(j--)if(h=_.exec(b[j])||[],o=q=h[1],p=(h[2]||"").split(".").sort(),o){l=m.event.special[o]||{},o=(d?l.delegateType:l.bindType)||o,n=k[o]||[],h=h[2]&&new RegExp("(^|\\.)"+p.join("\\.(?:.*\\.|)")+"(\\.|$)"),i=f=n.length;while(f--)g=n[f],!e&&q!==g.origType||c&&c.guid!==g.guid||h&&!h.test(g.namespace)||d&&d!==g.selector&&("**"!==d||!g.selector)||(n.splice(f,1),g.selector&&n.delegateCount--,l.remove&&l.remove.call(a,g));i&&!n.length&&(l.teardown&&l.teardown.call(a,p,r.handle)!==!1||m.removeEvent(a,o,r.handle),delete k[o])}else for(o in k)m.event.remove(a,o+b[j],c,d,!0);m.isEmptyObject(k)&&(delete r.handle,m._removeData(a,"events"))}},trigger:function(b,c,d,e){var f,g,h,i,k,l,n,o=[d||y],p=j.call(b,"type")?b.type:b,q=j.call(b,"namespace")?b.namespace.split("."):[];if(h=l=d=d||y,3!==d.nodeType&&8!==d.nodeType&&!$.test(p+m.event.triggered)&&(p.indexOf(".")>=0&&(q=p.split("."),p=q.shift(),q.sort()),g=p.indexOf(":")<0&&"on"+p,b=b[m.expando]?b:new m.Event(p,"object"==typeof b&&b),b.isTrigger=e?2:3,b.namespace=q.join("."),b.namespace_re=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=d),c=null==c?[b]:m.makeArray(c,[b]),k=m.event.special[p]||{},e||!k.trigger||k.trigger.apply(d,c)!==!1)){if(!e&&!k.noBubble&&!m.isWindow(d)){for(i=k.delegateType||p,$.test(i+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),l=h;l===(d.ownerDocument||y)&&o.push(l.defaultView||l.parentWindow||a)}n=0;while((h=o[n++])&&!b.isPropagationStopped())b.type=n>1?i:k.bindType||p,f=(m._data(h,"events")||{})[b.type]&&m._data(h,"handle"),f&&f.apply(h,c),f=g&&h[g],f&&f.apply&&m.acceptData(h)&&(b.result=f.apply(h,c),b.result===!1&&b.preventDefault());if(b.type=p,!e&&!b.isDefaultPrevented()&&(!k._default||k._default.apply(o.pop(),c)===!1)&&m.acceptData(d)&&g&&d[p]&&!m.isWindow(d)){l=d[g],l&&(d[g]=null),m.event.triggered=p;try{d[p]()}catch(r){}m.event.triggered=void 0,l&&(d[g]=l)}return b.result}},dispatch:function(a){a=m.event.fix(a);var b,c,e,f,g,h=[],i=d.call(arguments),j=(m._data(this,"events")||{})[a.type]||[],k=m.event.special[a.type]||{};if(i[0]=a,a.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,a)!==!1){h=m.event.handlers.call(this,a,j),b=0;while((f=h[b++])&&!a.isPropagationStopped()){a.currentTarget=f.elem,g=0;while((e=f.handlers[g++])&&!a.isImmediatePropagationStopped())(!a.namespace_re||a.namespace_re.test(e.namespace))&&(a.handleObj=e,a.data=e.data,c=((m.event.special[e.origType]||{}).handle||e.handler).apply(f.elem,i),void 0!==c&&(a.result=c)===!1&&(a.preventDefault(),a.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,a),a.result}},handlers:function(a,b){var c,d,e,f,g=[],h=b.delegateCount,i=a.target;if(h&&i.nodeType&&(!a.button||"click"!==a.type))for(;i!=this;i=i.parentNode||this)if(1===i.nodeType&&(i.disabled!==!0||"click"!==a.type)){for(e=[],f=0;h>f;f++)d=b[f],c=d.selector+" ",void 0===e[c]&&(e[c]=d.needsContext?m(c,this).index(i)>=0:m.find(c,this,null,[i]).length),e[c]&&e.push(d);e.length&&g.push({elem:i,handlers:e})}return h<b.length&&g.push({elem:this,handlers:b.slice(h)}),g},fix:function(a){if(a[m.expando])return a;var b,c,d,e=a.type,f=a,g=this.fixHooks[e];g||(this.fixHooks[e]=g=Z.test(e)?this.mouseHooks:Y.test(e)?this.keyHooks:{}),d=g.props?this.props.concat(g.props):this.props,a=new m.Event(f),b=d.length;while(b--)c=d[b],a[c]=f[c];return a.target||(a.target=f.srcElement||y),3===a.target.nodeType&&(a.target=a.target.parentNode),a.metaKey=!!a.metaKey,g.filter?g.filter(a,f):a},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){return null==a.which&&(a.which=null!=b.charCode?b.charCode:b.keyCode),a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,b){var c,d,e,f=b.button,g=b.fromElement;return null==a.pageX&&null!=b.clientX&&(d=a.target.ownerDocument||y,e=d.documentElement,c=d.body,a.pageX=b.clientX+(e&&e.scrollLeft||c&&c.scrollLeft||0)-(e&&e.clientLeft||c&&c.clientLeft||0),a.pageY=b.clientY+(e&&e.scrollTop||c&&c.scrollTop||0)-(e&&e.clientTop||c&&c.clientTop||0)),!a.relatedTarget&&g&&(a.relatedTarget=g===a.target?b.toElement:g),a.which||void 0===f||(a.which=1&f?1:2&f?3:4&f?2:0),a}},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==cb()&&this.focus)try{return this.focus(),!1}catch(a){}},delegateType:"focusin"},blur:{trigger:function(){return this===cb()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return m.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):void 0},_default:function(a){return m.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}},simulate:function(a,b,c,d){var e=m.extend(new m.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?m.event.trigger(e,null,b):m.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},m.removeEvent=y.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){var d="on"+b;a.detachEvent&&(typeof a[d]===K&&(a[d]=null),a.detachEvent(d,c))},m.Event=function(a,b){return this instanceof m.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?ab:bb):this.type=a,b&&m.extend(this,b),this.timeStamp=a&&a.timeStamp||m.now(),void(this[m.expando]=!0)):new m.Event(a,b)},m.Event.prototype={isDefaultPrevented:bb,isPropagationStopped:bb,isImmediatePropagationStopped:bb,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=ab,a&&(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=ab,a&&(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=ab,a&&a.stopImmediatePropagation&&a.stopImmediatePropagation(),this.stopPropagation()}},m.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){m.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return(!e||e!==d&&!m.contains(d,e))&&(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),k.submitBubbles||(m.event.special.submit={setup:function(){return m.nodeName(this,"form")?!1:void m.event.add(this,"click._submit keypress._submit",function(a){var b=a.target,c=m.nodeName(b,"input")||m.nodeName(b,"button")?b.form:void 0;c&&!m._data(c,"submitBubbles")&&(m.event.add(c,"submit._submit",function(a){a._submit_bubble=!0}),m._data(c,"submitBubbles",!0))})},postDispatch:function(a){a._submit_bubble&&(delete a._submit_bubble,this.parentNode&&!a.isTrigger&&m.event.simulate("submit",this.parentNode,a,!0))},teardown:function(){return m.nodeName(this,"form")?!1:void m.event.remove(this,"._submit")}}),k.changeBubbles||(m.event.special.change={setup:function(){return X.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(m.event.add(this,"propertychange._change",function(a){"checked"===a.originalEvent.propertyName&&(this._just_changed=!0)}),m.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1),m.event.simulate("change",this,a,!0)})),!1):void m.event.add(this,"beforeactivate._change",function(a){var b=a.target;X.test(b.nodeName)&&!m._data(b,"changeBubbles")&&(m.event.add(b,"change._change",function(a){!this.parentNode||a.isSimulated||a.isTrigger||m.event.simulate("change",this.parentNode,a,!0)}),m._data(b,"changeBubbles",!0))})},handle:function(a){var b=a.target;return this!==b||a.isSimulated||a.isTrigger||"radio"!==b.type&&"checkbox"!==b.type?a.handleObj.handler.apply(this,arguments):void 0},teardown:function(){return m.event.remove(this,"._change"),!X.test(this.nodeName)}}),k.focusinBubbles||m.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){m.event.simulate(b,a.target,m.event.fix(a),!0)};m.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=m._data(d,b);e||d.addEventListener(a,c,!0),m._data(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=m._data(d,b)-1;e?m._data(d,b,e):(d.removeEventListener(a,c,!0),m._removeData(d,b))}}}),m.fn.extend({on:function(a,b,c,d,e){var f,g;if("object"==typeof a){"string"!=typeof b&&(c=c||b,b=void 0);for(f in a)this.on(f,b,c,a[f],e);return this}if(null==c&&null==d?(d=b,c=b=void 0):null==d&&("string"==typeof b?(d=c,c=void 0):(d=c,c=b,b=void 0)),d===!1)d=bb;else if(!d)return this;return 1===e&&(g=d,d=function(a){return m().off(a),g.apply(this,arguments)},d.guid=g.guid||(g.guid=m.guid++)),this.each(function(){m.event.add(this,a,d,c,b)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,m(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return(b===!1||"function"==typeof b)&&(c=b,b=void 0),c===!1&&(c=bb),this.each(function(){m.event.remove(this,a,c,b)})},trigger:function(a,b){return this.each(function(){m.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];return c?m.event.trigger(a,b,c,!0):void 0}});function db(a){var b=eb.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}var eb="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",fb=/ jQuery\d+="(?:null|\d+)"/g,gb=new RegExp("<(?:"+eb+")[\\s/>]","i"),hb=/^\s+/,ib=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,jb=/<([\w:]+)/,kb=/<tbody/i,lb=/<|&#?\w+;/,mb=/<(?:script|style|link)/i,nb=/checked\s*(?:[^=]|=\s*.checked.)/i,ob=/^$|\/(?:java|ecma)script/i,pb=/^true\/(.*)/,qb=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,rb={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:k.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},sb=db(y),tb=sb.appendChild(y.createElement("div"));rb.optgroup=rb.option,rb.tbody=rb.tfoot=rb.colgroup=rb.caption=rb.thead,rb.th=rb.td;function ub(a,b){var c,d,e=0,f=typeof a.getElementsByTagName!==K?a.getElementsByTagName(b||"*"):typeof a.querySelectorAll!==K?a.querySelectorAll(b||"*"):void 0;if(!f)for(f=[],c=a.childNodes||a;null!=(d=c[e]);e++)!b||m.nodeName(d,b)?f.push(d):m.merge(f,ub(d,b));return void 0===b||b&&m.nodeName(a,b)?m.merge([a],f):f}function vb(a){W.test(a.type)&&(a.defaultChecked=a.checked)}function wb(a,b){return m.nodeName(a,"table")&&m.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function xb(a){return a.type=(null!==m.find.attr(a,"type"))+"/"+a.type,a}function yb(a){var b=pb.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function zb(a,b){for(var c,d=0;null!=(c=a[d]);d++)m._data(c,"globalEval",!b||m._data(b[d],"globalEval"))}function Ab(a,b){if(1===b.nodeType&&m.hasData(a)){var c,d,e,f=m._data(a),g=m._data(b,f),h=f.events;if(h){delete g.handle,g.events={};for(c in h)for(d=0,e=h[c].length;e>d;d++)m.event.add(b,c,h[c][d])}g.data&&(g.data=m.extend({},g.data))}}function Bb(a,b){var c,d,e;if(1===b.nodeType){if(c=b.nodeName.toLowerCase(),!k.noCloneEvent&&b[m.expando]){e=m._data(b);for(d in e.events)m.removeEvent(b,d,e.handle);b.removeAttribute(m.expando)}"script"===c&&b.text!==a.text?(xb(b).text=a.text,yb(b)):"object"===c?(b.parentNode&&(b.outerHTML=a.outerHTML),k.html5Clone&&a.innerHTML&&!m.trim(b.innerHTML)&&(b.innerHTML=a.innerHTML)):"input"===c&&W.test(a.type)?(b.defaultChecked=b.checked=a.checked,b.value!==a.value&&(b.value=a.value)):"option"===c?b.defaultSelected=b.selected=a.defaultSelected:("input"===c||"textarea"===c)&&(b.defaultValue=a.defaultValue)}}m.extend({clone:function(a,b,c){var d,e,f,g,h,i=m.contains(a.ownerDocument,a);if(k.html5Clone||m.isXMLDoc(a)||!gb.test("<"+a.nodeName+">")?f=a.cloneNode(!0):(tb.innerHTML=a.outerHTML,tb.removeChild(f=tb.firstChild)),!(k.noCloneEvent&&k.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||m.isXMLDoc(a)))for(d=ub(f),h=ub(a),g=0;null!=(e=h[g]);++g)d[g]&&Bb(e,d[g]);if(b)if(c)for(h=h||ub(a),d=d||ub(f),g=0;null!=(e=h[g]);g++)Ab(e,d[g]);else Ab(a,f);return d=ub(f,"script"),d.length>0&&zb(d,!i&&ub(a,"script")),d=h=e=null,f},buildFragment:function(a,b,c,d){for(var e,f,g,h,i,j,l,n=a.length,o=db(b),p=[],q=0;n>q;q++)if(f=a[q],f||0===f)if("object"===m.type(f))m.merge(p,f.nodeType?[f]:f);else if(lb.test(f)){h=h||o.appendChild(b.createElement("div")),i=(jb.exec(f)||["",""])[1].toLowerCase(),l=rb[i]||rb._default,h.innerHTML=l[1]+f.replace(ib,"<$1></$2>")+l[2],e=l[0];while(e--)h=h.lastChild;if(!k.leadingWhitespace&&hb.test(f)&&p.push(b.createTextNode(hb.exec(f)[0])),!k.tbody){f="table"!==i||kb.test(f)?"<table>"!==l[1]||kb.test(f)?0:h:h.firstChild,e=f&&f.childNodes.length;while(e--)m.nodeName(j=f.childNodes[e],"tbody")&&!j.childNodes.length&&f.removeChild(j)}m.merge(p,h.childNodes),h.textContent="";while(h.firstChild)h.removeChild(h.firstChild);h=o.lastChild}else p.push(b.createTextNode(f));h&&o.removeChild(h),k.appendChecked||m.grep(ub(p,"input"),vb),q=0;while(f=p[q++])if((!d||-1===m.inArray(f,d))&&(g=m.contains(f.ownerDocument,f),h=ub(o.appendChild(f),"script"),g&&zb(h),c)){e=0;while(f=h[e++])ob.test(f.type||"")&&c.push(f)}return h=null,o},cleanData:function(a,b){for(var d,e,f,g,h=0,i=m.expando,j=m.cache,l=k.deleteExpando,n=m.event.special;null!=(d=a[h]);h++)if((b||m.acceptData(d))&&(f=d[i],g=f&&j[f])){if(g.events)for(e in g.events)n[e]?m.event.remove(d,e):m.removeEvent(d,e,g.handle);j[f]&&(delete j[f],l?delete d[i]:typeof d.removeAttribute!==K?d.removeAttribute(i):d[i]=null,c.push(f))}}}),m.fn.extend({text:function(a){return V(this,function(a){return void 0===a?m.text(this):this.empty().append((this[0]&&this[0].ownerDocument||y).createTextNode(a))},null,a,arguments.length)},append:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=wb(this,a);b.appendChild(a)}})},prepend:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=wb(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},remove:function(a,b){for(var c,d=a?m.filter(a,this):this,e=0;null!=(c=d[e]);e++)b||1!==c.nodeType||m.cleanData(ub(c)),c.parentNode&&(b&&m.contains(c.ownerDocument,c)&&zb(ub(c,"script")),c.parentNode.removeChild(c));return this},empty:function(){for(var a,b=0;null!=(a=this[b]);b++){1===a.nodeType&&m.cleanData(ub(a,!1));while(a.firstChild)a.removeChild(a.firstChild);a.options&&m.nodeName(a,"select")&&(a.options.length=0)}return this},clone:function(a,b){return a=null==a?!1:a,b=null==b?a:b,this.map(function(){return m.clone(this,a,b)})},html:function(a){return V(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a)return 1===b.nodeType?b.innerHTML.replace(fb,""):void 0;if(!("string"!=typeof a||mb.test(a)||!k.htmlSerialize&&gb.test(a)||!k.leadingWhitespace&&hb.test(a)||rb[(jb.exec(a)||["",""])[1].toLowerCase()])){a=a.replace(ib,"<$1></$2>");try{for(;d>c;c++)b=this[c]||{},1===b.nodeType&&(m.cleanData(ub(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=arguments[0];return this.domManip(arguments,function(b){a=this.parentNode,m.cleanData(ub(this)),a&&a.replaceChild(b,this)}),a&&(a.length||a.nodeType)?this:this.remove()},detach:function(a){return this.remove(a,!0)},domManip:function(a,b){a=e.apply([],a);var c,d,f,g,h,i,j=0,l=this.length,n=this,o=l-1,p=a[0],q=m.isFunction(p);if(q||l>1&&"string"==typeof p&&!k.checkClone&&nb.test(p))return this.each(function(c){var d=n.eq(c);q&&(a[0]=p.call(this,c,d.html())),d.domManip(a,b)});if(l&&(i=m.buildFragment(a,this[0].ownerDocument,!1,this),c=i.firstChild,1===i.childNodes.length&&(i=c),c)){for(g=m.map(ub(i,"script"),xb),f=g.length;l>j;j++)d=i,j!==o&&(d=m.clone(d,!0,!0),f&&m.merge(g,ub(d,"script"))),b.call(this[j],d,j);if(f)for(h=g[g.length-1].ownerDocument,m.map(g,yb),j=0;f>j;j++)d=g[j],ob.test(d.type||"")&&!m._data(d,"globalEval")&&m.contains(h,d)&&(d.src?m._evalUrl&&m._evalUrl(d.src):m.globalEval((d.text||d.textContent||d.innerHTML||"").replace(qb,"")));i=c=null}return this}}),m.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){m.fn[a]=function(a){for(var c,d=0,e=[],g=m(a),h=g.length-1;h>=d;d++)c=d===h?this:this.clone(!0),m(g[d])[b](c),f.apply(e,c.get());return this.pushStack(e)}});var Cb,Db={};function Eb(b,c){var d,e=m(c.createElement(b)).appendTo(c.body),f=a.getDefaultComputedStyle&&(d=a.getDefaultComputedStyle(e[0]))?d.display:m.css(e[0],"display");return e.detach(),f}function Fb(a){var b=y,c=Db[a];return c||(c=Eb(a,b),"none"!==c&&c||(Cb=(Cb||m("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement),b=(Cb[0].contentWindow||Cb[0].contentDocument).document,b.write(),b.close(),c=Eb(a,b),Cb.detach()),Db[a]=c),c}!function(){var a;k.shrinkWrapBlocks=function(){if(null!=a)return a;a=!1;var b,c,d;return c=y.getElementsByTagName("body")[0],c&&c.style?(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),typeof b.style.zoom!==K&&(b.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1",b.appendChild(y.createElement("div")).style.width="5px",a=3!==b.offsetWidth),c.removeChild(d),a):void 0}}();var Gb=/^margin/,Hb=new RegExp("^("+S+")(?!px)[a-z%]+$","i"),Ib,Jb,Kb=/^(top|right|bottom|left)$/;a.getComputedStyle?(Ib=function(b){return b.ownerDocument.defaultView.opener?b.ownerDocument.defaultView.getComputedStyle(b,null):a.getComputedStyle(b,null)},Jb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Ib(a),g=c?c.getPropertyValue(b)||c[b]:void 0,c&&(""!==g||m.contains(a.ownerDocument,a)||(g=m.style(a,b)),Hb.test(g)&&Gb.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0===g?g:g+""}):y.documentElement.currentStyle&&(Ib=function(a){return a.currentStyle},Jb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Ib(a),g=c?c[b]:void 0,null==g&&h&&h[b]&&(g=h[b]),Hb.test(g)&&!Kb.test(b)&&(d=h.left,e=a.runtimeStyle,f=e&&e.left,f&&(e.left=a.currentStyle.left),h.left="fontSize"===b?"1em":g,g=h.pixelLeft+"px",h.left=d,f&&(e.left=f)),void 0===g?g:g+""||"auto"});function Lb(a,b){return{get:function(){var c=a();if(null!=c)return c?void delete this.get:(this.get=b).apply(this,arguments)}}}!function(){var b,c,d,e,f,g,h;if(b=y.createElement("div"),b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",d=b.getElementsByTagName("a")[0],c=d&&d.style){c.cssText="float:left;opacity:.5",k.opacity="0.5"===c.opacity,k.cssFloat=!!c.cssFloat,b.style.backgroundClip="content-box",b.cloneNode(!0).style.backgroundClip="",k.clearCloneStyle="content-box"===b.style.backgroundClip,k.boxSizing=""===c.boxSizing||""===c.MozBoxSizing||""===c.WebkitBoxSizing,m.extend(k,{reliableHiddenOffsets:function(){return null==g&&i(),g},boxSizingReliable:function(){return null==f&&i(),f},pixelPosition:function(){return null==e&&i(),e},reliableMarginRight:function(){return null==h&&i(),h}});function i(){var b,c,d,i;c=y.getElementsByTagName("body")[0],c&&c.style&&(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),b.style.cssText="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",e=f=!1,h=!0,a.getComputedStyle&&(e="1%"!==(a.getComputedStyle(b,null)||{}).top,f="4px"===(a.getComputedStyle(b,null)||{width:"4px"}).width,i=b.appendChild(y.createElement("div")),i.style.cssText=b.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",i.style.marginRight=i.style.width="0",b.style.width="1px",h=!parseFloat((a.getComputedStyle(i,null)||{}).marginRight),b.removeChild(i)),b.innerHTML="<table><tr><td></td><td>t</td></tr></table>",i=b.getElementsByTagName("td"),i[0].style.cssText="margin:0;border:0;padding:0;display:none",g=0===i[0].offsetHeight,g&&(i[0].style.display="",i[1].style.display="none",g=0===i[0].offsetHeight),c.removeChild(d))}}}(),m.swap=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};var Mb=/alpha\([^)]*\)/i,Nb=/opacity\s*=\s*([^)]*)/,Ob=/^(none|table(?!-c[ea]).+)/,Pb=new RegExp("^("+S+")(.*)$","i"),Qb=new RegExp("^([+-])=("+S+")","i"),Rb={position:"absolute",visibility:"hidden",display:"block"},Sb={letterSpacing:"0",fontWeight:"400"},Tb=["Webkit","O","Moz","ms"];function Ub(a,b){if(b in a)return b;var c=b.charAt(0).toUpperCase()+b.slice(1),d=b,e=Tb.length;while(e--)if(b=Tb[e]+c,b in a)return b;return d}function Vb(a,b){for(var c,d,e,f=[],g=0,h=a.length;h>g;g++)d=a[g],d.style&&(f[g]=m._data(d,"olddisplay"),c=d.style.display,b?(f[g]||"none"!==c||(d.style.display=""),""===d.style.display&&U(d)&&(f[g]=m._data(d,"olddisplay",Fb(d.nodeName)))):(e=U(d),(c&&"none"!==c||!e)&&m._data(d,"olddisplay",e?c:m.css(d,"display"))));for(g=0;h>g;g++)d=a[g],d.style&&(b&&"none"!==d.style.display&&""!==d.style.display||(d.style.display=b?f[g]||"":"none"));return a}function Wb(a,b,c){var d=Pb.exec(b);return d?Math.max(0,d[1]-(c||0))+(d[2]||"px"):b}function Xb(a,b,c,d,e){for(var f=c===(d?"border":"content")?4:"width"===b?1:0,g=0;4>f;f+=2)"margin"===c&&(g+=m.css(a,c+T[f],!0,e)),d?("content"===c&&(g-=m.css(a,"padding"+T[f],!0,e)),"margin"!==c&&(g-=m.css(a,"border"+T[f]+"Width",!0,e))):(g+=m.css(a,"padding"+T[f],!0,e),"padding"!==c&&(g+=m.css(a,"border"+T[f]+"Width",!0,e)));return g}function Yb(a,b,c){var d=!0,e="width"===b?a.offsetWidth:a.offsetHeight,f=Ib(a),g=k.boxSizing&&"border-box"===m.css(a,"boxSizing",!1,f);if(0>=e||null==e){if(e=Jb(a,b,f),(0>e||null==e)&&(e=a.style[b]),Hb.test(e))return e;d=g&&(k.boxSizingReliable()||e===a.style[b]),e=parseFloat(e)||0}return e+Xb(a,b,c||(g?"border":"content"),d,f)+"px"}m.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Jb(a,"opacity");return""===c?"1":c}}}},cssNumber:{columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":k.cssFloat?"cssFloat":"styleFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=m.camelCase(b),i=a.style;if(b=m.cssProps[h]||(m.cssProps[h]=Ub(i,h)),g=m.cssHooks[b]||m.cssHooks[h],void 0===c)return g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b];if(f=typeof c,"string"===f&&(e=Qb.exec(c))&&(c=(e[1]+1)*e[2]+parseFloat(m.css(a,b)),f="number"),null!=c&&c===c&&("number"!==f||m.cssNumber[h]||(c+="px"),k.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),!(g&&"set"in g&&void 0===(c=g.set(a,c,d)))))try{i[b]=c}catch(j){}}},css:function(a,b,c,d){var e,f,g,h=m.camelCase(b);return b=m.cssProps[h]||(m.cssProps[h]=Ub(a.style,h)),g=m.cssHooks[b]||m.cssHooks[h],g&&"get"in g&&(f=g.get(a,!0,c)),void 0===f&&(f=Jb(a,b,d)),"normal"===f&&b in Sb&&(f=Sb[b]),""===c||c?(e=parseFloat(f),c===!0||m.isNumeric(e)?e||0:f):f}}),m.each(["height","width"],function(a,b){m.cssHooks[b]={get:function(a,c,d){return c?Ob.test(m.css(a,"display"))&&0===a.offsetWidth?m.swap(a,Rb,function(){return Yb(a,b,d)}):Yb(a,b,d):void 0},set:function(a,c,d){var e=d&&Ib(a);return Wb(a,c,d?Xb(a,b,d,k.boxSizing&&"border-box"===m.css(a,"boxSizing",!1,e),e):0)}}}),k.opacity||(m.cssHooks.opacity={get:function(a,b){return Nb.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=m.isNumeric(b)?"alpha(opacity="+100*b+")":"",f=d&&d.filter||c.filter||"";c.zoom=1,(b>=1||""===b)&&""===m.trim(f.replace(Mb,""))&&c.removeAttribute&&(c.removeAttribute("filter"),""===b||d&&!d.filter)||(c.filter=Mb.test(f)?f.replace(Mb,e):f+" "+e)}}),m.cssHooks.marginRight=Lb(k.reliableMarginRight,function(a,b){return b?m.swap(a,{display:"inline-block"},Jb,[a,"marginRight"]):void 0}),m.each({margin:"",padding:"",border:"Width"},function(a,b){m.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];4>d;d++)e[a+T[d]+b]=f[d]||f[d-2]||f[0];return e}},Gb.test(a)||(m.cssHooks[a+b].set=Wb)}),m.fn.extend({css:function(a,b){return V(this,function(a,b,c){var d,e,f={},g=0;if(m.isArray(b)){for(d=Ib(a),e=b.length;e>g;g++)f[b[g]]=m.css(a,b[g],!1,d);return f}return void 0!==c?m.style(a,b,c):m.css(a,b)},a,b,arguments.length>1)},show:function(){return Vb(this,!0)},hide:function(){return Vb(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){U(this)?m(this).show():m(this).hide()})}});function Zb(a,b,c,d,e){return new Zb.prototype.init(a,b,c,d,e)
}m.Tween=Zb,Zb.prototype={constructor:Zb,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||"swing",this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(m.cssNumber[c]?"":"px")},cur:function(){var a=Zb.propHooks[this.prop];return a&&a.get?a.get(this):Zb.propHooks._default.get(this)},run:function(a){var b,c=Zb.propHooks[this.prop];return this.pos=b=this.options.duration?m.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):Zb.propHooks._default.set(this),this}},Zb.prototype.init.prototype=Zb.prototype,Zb.propHooks={_default:{get:function(a){var b;return null==a.elem[a.prop]||a.elem.style&&null!=a.elem.style[a.prop]?(b=m.css(a.elem,a.prop,""),b&&"auto"!==b?b:0):a.elem[a.prop]},set:function(a){m.fx.step[a.prop]?m.fx.step[a.prop](a):a.elem.style&&(null!=a.elem.style[m.cssProps[a.prop]]||m.cssHooks[a.prop])?m.style(a.elem,a.prop,a.now+a.unit):a.elem[a.prop]=a.now}}},Zb.propHooks.scrollTop=Zb.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},m.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2}},m.fx=Zb.prototype.init,m.fx.step={};var $b,_b,ac=/^(?:toggle|show|hide)$/,bc=new RegExp("^(?:([+-])=|)("+S+")([a-z%]*)$","i"),cc=/queueHooks$/,dc=[ic],ec={"*":[function(a,b){var c=this.createTween(a,b),d=c.cur(),e=bc.exec(b),f=e&&e[3]||(m.cssNumber[a]?"":"px"),g=(m.cssNumber[a]||"px"!==f&&+d)&&bc.exec(m.css(c.elem,a)),h=1,i=20;if(g&&g[3]!==f){f=f||g[3],e=e||[],g=+d||1;do h=h||".5",g/=h,m.style(c.elem,a,g+f);while(h!==(h=c.cur()/d)&&1!==h&&--i)}return e&&(g=c.start=+g||+d||0,c.unit=f,c.end=e[1]?g+(e[1]+1)*e[2]:+e[2]),c}]};function fc(){return setTimeout(function(){$b=void 0}),$b=m.now()}function gc(a,b){var c,d={height:a},e=0;for(b=b?1:0;4>e;e+=2-b)c=T[e],d["margin"+c]=d["padding"+c]=a;return b&&(d.opacity=d.width=a),d}function hc(a,b,c){for(var d,e=(ec[b]||[]).concat(ec["*"]),f=0,g=e.length;g>f;f++)if(d=e[f].call(c,b,a))return d}function ic(a,b,c){var d,e,f,g,h,i,j,l,n=this,o={},p=a.style,q=a.nodeType&&U(a),r=m._data(a,"fxshow");c.queue||(h=m._queueHooks(a,"fx"),null==h.unqueued&&(h.unqueued=0,i=h.empty.fire,h.empty.fire=function(){h.unqueued||i()}),h.unqueued++,n.always(function(){n.always(function(){h.unqueued--,m.queue(a,"fx").length||h.empty.fire()})})),1===a.nodeType&&("height"in b||"width"in b)&&(c.overflow=[p.overflow,p.overflowX,p.overflowY],j=m.css(a,"display"),l="none"===j?m._data(a,"olddisplay")||Fb(a.nodeName):j,"inline"===l&&"none"===m.css(a,"float")&&(k.inlineBlockNeedsLayout&&"inline"!==Fb(a.nodeName)?p.zoom=1:p.display="inline-block")),c.overflow&&(p.overflow="hidden",k.shrinkWrapBlocks()||n.always(function(){p.overflow=c.overflow[0],p.overflowX=c.overflow[1],p.overflowY=c.overflow[2]}));for(d in b)if(e=b[d],ac.exec(e)){if(delete b[d],f=f||"toggle"===e,e===(q?"hide":"show")){if("show"!==e||!r||void 0===r[d])continue;q=!0}o[d]=r&&r[d]||m.style(a,d)}else j=void 0;if(m.isEmptyObject(o))"inline"===("none"===j?Fb(a.nodeName):j)&&(p.display=j);else{r?"hidden"in r&&(q=r.hidden):r=m._data(a,"fxshow",{}),f&&(r.hidden=!q),q?m(a).show():n.done(function(){m(a).hide()}),n.done(function(){var b;m._removeData(a,"fxshow");for(b in o)m.style(a,b,o[b])});for(d in o)g=hc(q?r[d]:0,d,n),d in r||(r[d]=g.start,q&&(g.end=g.start,g.start="width"===d||"height"===d?1:0))}}function jc(a,b){var c,d,e,f,g;for(c in a)if(d=m.camelCase(c),e=b[d],f=a[c],m.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=m.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function kc(a,b,c){var d,e,f=0,g=dc.length,h=m.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=$b||fc(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;i>g;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),1>f&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:m.extend({},b),opts:m.extend(!0,{specialEasing:{}},c),originalProperties:b,originalOptions:c,startTime:$b||fc(),duration:c.duration,tweens:[],createTween:function(b,c){var d=m.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;d>c;c++)j.tweens[c].run(1);return b?h.resolveWith(a,[j,b]):h.rejectWith(a,[j,b]),this}}),k=j.props;for(jc(k,j.opts.specialEasing);g>f;f++)if(d=dc[f].call(j,a,k,j.opts))return d;return m.map(k,hc,j),m.isFunction(j.opts.start)&&j.opts.start.call(a,j),m.fx.timer(m.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}m.Animation=m.extend(kc,{tweener:function(a,b){m.isFunction(a)?(b=a,a=["*"]):a=a.split(" ");for(var c,d=0,e=a.length;e>d;d++)c=a[d],ec[c]=ec[c]||[],ec[c].unshift(b)},prefilter:function(a,b){b?dc.unshift(a):dc.push(a)}}),m.speed=function(a,b,c){var d=a&&"object"==typeof a?m.extend({},a):{complete:c||!c&&b||m.isFunction(a)&&a,duration:a,easing:c&&b||b&&!m.isFunction(b)&&b};return d.duration=m.fx.off?0:"number"==typeof d.duration?d.duration:d.duration in m.fx.speeds?m.fx.speeds[d.duration]:m.fx.speeds._default,(null==d.queue||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){m.isFunction(d.old)&&d.old.call(this),d.queue&&m.dequeue(this,d.queue)},d},m.fn.extend({fadeTo:function(a,b,c,d){return this.filter(U).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=m.isEmptyObject(a),f=m.speed(b,c,d),g=function(){var b=kc(this,m.extend({},a),f);(e||m._data(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=m.timers,g=m._data(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&cc.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));(b||!c)&&m.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=m._data(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=m.timers,g=d?d.length:0;for(c.finish=!0,m.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;g>b;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),m.each(["toggle","show","hide"],function(a,b){var c=m.fn[b];m.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(gc(b,!0),a,d,e)}}),m.each({slideDown:gc("show"),slideUp:gc("hide"),slideToggle:gc("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){m.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),m.timers=[],m.fx.tick=function(){var a,b=m.timers,c=0;for($b=m.now();c<b.length;c++)a=b[c],a()||b[c]!==a||b.splice(c--,1);b.length||m.fx.stop(),$b=void 0},m.fx.timer=function(a){m.timers.push(a),a()?m.fx.start():m.timers.pop()},m.fx.interval=13,m.fx.start=function(){_b||(_b=setInterval(m.fx.tick,m.fx.interval))},m.fx.stop=function(){clearInterval(_b),_b=null},m.fx.speeds={slow:600,fast:200,_default:400},m.fn.delay=function(a,b){return a=m.fx?m.fx.speeds[a]||a:a,b=b||"fx",this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},function(){var a,b,c,d,e;b=y.createElement("div"),b.setAttribute("className","t"),b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",d=b.getElementsByTagName("a")[0],c=y.createElement("select"),e=c.appendChild(y.createElement("option")),a=b.getElementsByTagName("input")[0],d.style.cssText="top:1px",k.getSetAttribute="t"!==b.className,k.style=/top/.test(d.getAttribute("style")),k.hrefNormalized="/a"===d.getAttribute("href"),k.checkOn=!!a.value,k.optSelected=e.selected,k.enctype=!!y.createElement("form").enctype,c.disabled=!0,k.optDisabled=!e.disabled,a=y.createElement("input"),a.setAttribute("value",""),k.input=""===a.getAttribute("value"),a.value="t",a.setAttribute("type","radio"),k.radioValue="t"===a.value}();var lc=/\r/g;m.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=m.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,m(this).val()):a,null==e?e="":"number"==typeof e?e+="":m.isArray(e)&&(e=m.map(e,function(a){return null==a?"":a+""})),b=m.valHooks[this.type]||m.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=m.valHooks[e.type]||m.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(lc,""):null==c?"":c)}}}),m.extend({valHooks:{option:{get:function(a){var b=m.find.attr(a,"value");return null!=b?b:m.trim(m.text(a))}},select:{get:function(a){for(var b,c,d=a.options,e=a.selectedIndex,f="select-one"===a.type||0>e,g=f?null:[],h=f?e+1:d.length,i=0>e?h:f?e:0;h>i;i++)if(c=d[i],!(!c.selected&&i!==e||(k.optDisabled?c.disabled:null!==c.getAttribute("disabled"))||c.parentNode.disabled&&m.nodeName(c.parentNode,"optgroup"))){if(b=m(c).val(),f)return b;g.push(b)}return g},set:function(a,b){var c,d,e=a.options,f=m.makeArray(b),g=e.length;while(g--)if(d=e[g],m.inArray(m.valHooks.option.get(d),f)>=0)try{d.selected=c=!0}catch(h){d.scrollHeight}else d.selected=!1;return c||(a.selectedIndex=-1),e}}}}),m.each(["radio","checkbox"],function(){m.valHooks[this]={set:function(a,b){return m.isArray(b)?a.checked=m.inArray(m(a).val(),b)>=0:void 0}},k.checkOn||(m.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var mc,nc,oc=m.expr.attrHandle,pc=/^(?:checked|selected)$/i,qc=k.getSetAttribute,rc=k.input;m.fn.extend({attr:function(a,b){return V(this,m.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){m.removeAttr(this,a)})}}),m.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(a&&3!==f&&8!==f&&2!==f)return typeof a.getAttribute===K?m.prop(a,b,c):(1===f&&m.isXMLDoc(a)||(b=b.toLowerCase(),d=m.attrHooks[b]||(m.expr.match.bool.test(b)?nc:mc)),void 0===c?d&&"get"in d&&null!==(e=d.get(a,b))?e:(e=m.find.attr(a,b),null==e?void 0:e):null!==c?d&&"set"in d&&void 0!==(e=d.set(a,c,b))?e:(a.setAttribute(b,c+""),c):void m.removeAttr(a,b))},removeAttr:function(a,b){var c,d,e=0,f=b&&b.match(E);if(f&&1===a.nodeType)while(c=f[e++])d=m.propFix[c]||c,m.expr.match.bool.test(c)?rc&&qc||!pc.test(c)?a[d]=!1:a[m.camelCase("default-"+c)]=a[d]=!1:m.attr(a,c,""),a.removeAttribute(qc?c:d)},attrHooks:{type:{set:function(a,b){if(!k.radioValue&&"radio"===b&&m.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}}}),nc={set:function(a,b,c){return b===!1?m.removeAttr(a,c):rc&&qc||!pc.test(c)?a.setAttribute(!qc&&m.propFix[c]||c,c):a[m.camelCase("default-"+c)]=a[c]=!0,c}},m.each(m.expr.match.bool.source.match(/\w+/g),function(a,b){var c=oc[b]||m.find.attr;oc[b]=rc&&qc||!pc.test(b)?function(a,b,d){var e,f;return d||(f=oc[b],oc[b]=e,e=null!=c(a,b,d)?b.toLowerCase():null,oc[b]=f),e}:function(a,b,c){return c?void 0:a[m.camelCase("default-"+b)]?b.toLowerCase():null}}),rc&&qc||(m.attrHooks.value={set:function(a,b,c){return m.nodeName(a,"input")?void(a.defaultValue=b):mc&&mc.set(a,b,c)}}),qc||(mc={set:function(a,b,c){var d=a.getAttributeNode(c);return d||a.setAttributeNode(d=a.ownerDocument.createAttribute(c)),d.value=b+="","value"===c||b===a.getAttribute(c)?b:void 0}},oc.id=oc.name=oc.coords=function(a,b,c){var d;return c?void 0:(d=a.getAttributeNode(b))&&""!==d.value?d.value:null},m.valHooks.button={get:function(a,b){var c=a.getAttributeNode(b);return c&&c.specified?c.value:void 0},set:mc.set},m.attrHooks.contenteditable={set:function(a,b,c){mc.set(a,""===b?!1:b,c)}},m.each(["width","height"],function(a,b){m.attrHooks[b]={set:function(a,c){return""===c?(a.setAttribute(b,"auto"),c):void 0}}})),k.style||(m.attrHooks.style={get:function(a){return a.style.cssText||void 0},set:function(a,b){return a.style.cssText=b+""}});var sc=/^(?:input|select|textarea|button|object)$/i,tc=/^(?:a|area)$/i;m.fn.extend({prop:function(a,b){return V(this,m.prop,a,b,arguments.length>1)},removeProp:function(a){return a=m.propFix[a]||a,this.each(function(){try{this[a]=void 0,delete this[a]}catch(b){}})}}),m.extend({propFix:{"for":"htmlFor","class":"className"},prop:function(a,b,c){var d,e,f,g=a.nodeType;if(a&&3!==g&&8!==g&&2!==g)return f=1!==g||!m.isXMLDoc(a),f&&(b=m.propFix[b]||b,e=m.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=m.find.attr(a,"tabindex");return b?parseInt(b,10):sc.test(a.nodeName)||tc.test(a.nodeName)&&a.href?0:-1}}}}),k.hrefNormalized||m.each(["href","src"],function(a,b){m.propHooks[b]={get:function(a){return a.getAttribute(b,4)}}}),k.optSelected||(m.propHooks.selected={get:function(a){var b=a.parentNode;return b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex),null}}),m.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){m.propFix[this.toLowerCase()]=this}),k.enctype||(m.propFix.enctype="encoding");var uc=/[\t\r\n\f]/g;m.fn.extend({addClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j="string"==typeof a&&a;if(m.isFunction(a))return this.each(function(b){m(this).addClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(E)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(uc," "):" ")){f=0;while(e=b[f++])d.indexOf(" "+e+" ")<0&&(d+=e+" ");g=m.trim(d),c.className!==g&&(c.className=g)}return this},removeClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j=0===arguments.length||"string"==typeof a&&a;if(m.isFunction(a))return this.each(function(b){m(this).removeClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(E)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(uc," "):"")){f=0;while(e=b[f++])while(d.indexOf(" "+e+" ")>=0)d=d.replace(" "+e+" "," ");g=a?m.trim(d):"",c.className!==g&&(c.className=g)}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):this.each(m.isFunction(a)?function(c){m(this).toggleClass(a.call(this,c,this.className,b),b)}:function(){if("string"===c){var b,d=0,e=m(this),f=a.match(E)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else(c===K||"boolean"===c)&&(this.className&&m._data(this,"__className__",this.className),this.className=this.className||a===!1?"":m._data(this,"__className__")||"")})},hasClass:function(a){for(var b=" "+a+" ",c=0,d=this.length;d>c;c++)if(1===this[c].nodeType&&(" "+this[c].className+" ").replace(uc," ").indexOf(b)>=0)return!0;return!1}}),m.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){m.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),m.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}});var vc=m.now(),wc=/\?/,xc=/(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;m.parseJSON=function(b){if(a.JSON&&a.JSON.parse)return a.JSON.parse(b+"");var c,d=null,e=m.trim(b+"");return e&&!m.trim(e.replace(xc,function(a,b,e,f){return c&&b&&(d=0),0===d?a:(c=e||b,d+=!f-!e,"")}))?Function("return "+e)():m.error("Invalid JSON: "+b)},m.parseXML=function(b){var c,d;if(!b||"string"!=typeof b)return null;try{a.DOMParser?(d=new DOMParser,c=d.parseFromString(b,"text/xml")):(c=new ActiveXObject("Microsoft.XMLDOM"),c.async="false",c.loadXML(b))}catch(e){c=void 0}return c&&c.documentElement&&!c.getElementsByTagName("parsererror").length||m.error("Invalid XML: "+b),c};var yc,zc,Ac=/#.*$/,Bc=/([?&])_=[^&]*/,Cc=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Dc=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Ec=/^(?:GET|HEAD)$/,Fc=/^\/\//,Gc=/^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,Hc={},Ic={},Jc="*/".concat("*");try{zc=location.href}catch(Kc){zc=y.createElement("a"),zc.href="",zc=zc.href}yc=Gc.exec(zc.toLowerCase())||[];function Lc(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(E)||[];if(m.isFunction(c))while(d=f[e++])"+"===d.charAt(0)?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Mc(a,b,c,d){var e={},f=a===Ic;function g(h){var i;return e[h]=!0,m.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Nc(a,b){var c,d,e=m.ajaxSettings.flatOptions||{};for(d in b)void 0!==b[d]&&((e[d]?a:c||(c={}))[d]=b[d]);return c&&m.extend(!0,a,c),a}function Oc(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===e&&(e=a.mimeType||b.getResponseHeader("Content-Type"));if(e)for(g in h)if(h[g]&&h[g].test(e)){i.unshift(g);break}if(i[0]in c)f=i[0];else{for(g in c){if(!i[0]||a.converters[g+" "+i[0]]){f=g;break}d||(d=g)}f=f||d}return f?(f!==i[0]&&i.unshift(f),c[f]):void 0}function Pc(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}m.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:zc,type:"GET",isLocal:Dc.test(yc[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Jc,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":m.parseJSON,"text xml":m.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Nc(Nc(a,m.ajaxSettings),b):Nc(m.ajaxSettings,a)},ajaxPrefilter:Lc(Hc),ajaxTransport:Lc(Ic),ajax:function(a,b){"object"==typeof a&&(b=a,a=void 0),b=b||{};var c,d,e,f,g,h,i,j,k=m.ajaxSetup({},b),l=k.context||k,n=k.context&&(l.nodeType||l.jquery)?m(l):m.event,o=m.Deferred(),p=m.Callbacks("once memory"),q=k.statusCode||{},r={},s={},t=0,u="canceled",v={readyState:0,getResponseHeader:function(a){var b;if(2===t){if(!j){j={};while(b=Cc.exec(f))j[b[1].toLowerCase()]=b[2]}b=j[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return 2===t?f:null},setRequestHeader:function(a,b){var c=a.toLowerCase();return t||(a=s[c]=s[c]||a,r[a]=b),this},overrideMimeType:function(a){return t||(k.mimeType=a),this},statusCode:function(a){var b;if(a)if(2>t)for(b in a)q[b]=[q[b],a[b]];else v.always(a[v.status]);return this},abort:function(a){var b=a||u;return i&&i.abort(b),x(0,b),this}};if(o.promise(v).complete=p.add,v.success=v.done,v.error=v.fail,k.url=((a||k.url||zc)+"").replace(Ac,"").replace(Fc,yc[1]+"//"),k.type=b.method||b.type||k.method||k.type,k.dataTypes=m.trim(k.dataType||"*").toLowerCase().match(E)||[""],null==k.crossDomain&&(c=Gc.exec(k.url.toLowerCase()),k.crossDomain=!(!c||c[1]===yc[1]&&c[2]===yc[2]&&(c[3]||("http:"===c[1]?"80":"443"))===(yc[3]||("http:"===yc[1]?"80":"443")))),k.data&&k.processData&&"string"!=typeof k.data&&(k.data=m.param(k.data,k.traditional)),Mc(Hc,k,b,v),2===t)return v;h=m.event&&k.global,h&&0===m.active++&&m.event.trigger("ajaxStart"),k.type=k.type.toUpperCase(),k.hasContent=!Ec.test(k.type),e=k.url,k.hasContent||(k.data&&(e=k.url+=(wc.test(e)?"&":"?")+k.data,delete k.data),k.cache===!1&&(k.url=Bc.test(e)?e.replace(Bc,"$1_="+vc++):e+(wc.test(e)?"&":"?")+"_="+vc++)),k.ifModified&&(m.lastModified[e]&&v.setRequestHeader("If-Modified-Since",m.lastModified[e]),m.etag[e]&&v.setRequestHeader("If-None-Match",m.etag[e])),(k.data&&k.hasContent&&k.contentType!==!1||b.contentType)&&v.setRequestHeader("Content-Type",k.contentType),v.setRequestHeader("Accept",k.dataTypes[0]&&k.accepts[k.dataTypes[0]]?k.accepts[k.dataTypes[0]]+("*"!==k.dataTypes[0]?", "+Jc+"; q=0.01":""):k.accepts["*"]);for(d in k.headers)v.setRequestHeader(d,k.headers[d]);if(k.beforeSend&&(k.beforeSend.call(l,v,k)===!1||2===t))return v.abort();u="abort";for(d in{success:1,error:1,complete:1})v[d](k[d]);if(i=Mc(Ic,k,b,v)){v.readyState=1,h&&n.trigger("ajaxSend",[v,k]),k.async&&k.timeout>0&&(g=setTimeout(function(){v.abort("timeout")},k.timeout));try{t=1,i.send(r,x)}catch(w){if(!(2>t))throw w;x(-1,w)}}else x(-1,"No Transport");function x(a,b,c,d){var j,r,s,u,w,x=b;2!==t&&(t=2,g&&clearTimeout(g),i=void 0,f=d||"",v.readyState=a>0?4:0,j=a>=200&&300>a||304===a,c&&(u=Oc(k,v,c)),u=Pc(k,u,v,j),j?(k.ifModified&&(w=v.getResponseHeader("Last-Modified"),w&&(m.lastModified[e]=w),w=v.getResponseHeader("etag"),w&&(m.etag[e]=w)),204===a||"HEAD"===k.type?x="nocontent":304===a?x="notmodified":(x=u.state,r=u.data,s=u.error,j=!s)):(s=x,(a||!x)&&(x="error",0>a&&(a=0))),v.status=a,v.statusText=(b||x)+"",j?o.resolveWith(l,[r,x,v]):o.rejectWith(l,[v,x,s]),v.statusCode(q),q=void 0,h&&n.trigger(j?"ajaxSuccess":"ajaxError",[v,k,j?r:s]),p.fireWith(l,[v,x]),h&&(n.trigger("ajaxComplete",[v,k]),--m.active||m.event.trigger("ajaxStop")))}return v},getJSON:function(a,b,c){return m.get(a,b,c,"json")},getScript:function(a,b){return m.get(a,void 0,b,"script")}}),m.each(["get","post"],function(a,b){m[b]=function(a,c,d,e){return m.isFunction(c)&&(e=e||d,d=c,c=void 0),m.ajax({url:a,type:b,dataType:e,data:c,success:d})}}),m._evalUrl=function(a){return m.ajax({url:a,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})},m.fn.extend({wrapAll:function(a){if(m.isFunction(a))return this.each(function(b){m(this).wrapAll(a.call(this,b))});if(this[0]){var b=m(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&1===a.firstChild.nodeType)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){return this.each(m.isFunction(a)?function(b){m(this).wrapInner(a.call(this,b))}:function(){var b=m(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=m.isFunction(a);return this.each(function(c){m(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){m.nodeName(this,"body")||m(this).replaceWith(this.childNodes)}).end()}}),m.expr.filters.hidden=function(a){return a.offsetWidth<=0&&a.offsetHeight<=0||!k.reliableHiddenOffsets()&&"none"===(a.style&&a.style.display||m.css(a,"display"))},m.expr.filters.visible=function(a){return!m.expr.filters.hidden(a)};var Qc=/%20/g,Rc=/\[\]$/,Sc=/\r?\n/g,Tc=/^(?:submit|button|image|reset|file)$/i,Uc=/^(?:input|select|textarea|keygen)/i;function Vc(a,b,c,d){var e;if(m.isArray(b))m.each(b,function(b,e){c||Rc.test(a)?d(a,e):Vc(a+"["+("object"==typeof e?b:"")+"]",e,c,d)});else if(c||"object"!==m.type(b))d(a,b);else for(e in b)Vc(a+"["+e+"]",b[e],c,d)}m.param=function(a,b){var c,d=[],e=function(a,b){b=m.isFunction(b)?b():null==b?"":b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};if(void 0===b&&(b=m.ajaxSettings&&m.ajaxSettings.traditional),m.isArray(a)||a.jquery&&!m.isPlainObject(a))m.each(a,function(){e(this.name,this.value)});else for(c in a)Vc(c,a[c],b,e);return d.join("&").replace(Qc,"+")},m.fn.extend({serialize:function(){return m.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=m.prop(this,"elements");return a?m.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!m(this).is(":disabled")&&Uc.test(this.nodeName)&&!Tc.test(a)&&(this.checked||!W.test(a))}).map(function(a,b){var c=m(this).val();return null==c?null:m.isArray(c)?m.map(c,function(a){return{name:b.name,value:a.replace(Sc,"\r\n")}}):{name:b.name,value:c.replace(Sc,"\r\n")}}).get()}}),m.ajaxSettings.xhr=void 0!==a.ActiveXObject?function(){return!this.isLocal&&/^(get|post|head|put|delete|options)$/i.test(this.type)&&Zc()||$c()}:Zc;var Wc=0,Xc={},Yc=m.ajaxSettings.xhr();a.attachEvent&&a.attachEvent("onunload",function(){for(var a in Xc)Xc[a](void 0,!0)}),k.cors=!!Yc&&"withCredentials"in Yc,Yc=k.ajax=!!Yc,Yc&&m.ajaxTransport(function(a){if(!a.crossDomain||k.cors){var b;return{send:function(c,d){var e,f=a.xhr(),g=++Wc;if(f.open(a.type,a.url,a.async,a.username,a.password),a.xhrFields)for(e in a.xhrFields)f[e]=a.xhrFields[e];a.mimeType&&f.overrideMimeType&&f.overrideMimeType(a.mimeType),a.crossDomain||c["X-Requested-With"]||(c["X-Requested-With"]="XMLHttpRequest");for(e in c)void 0!==c[e]&&f.setRequestHeader(e,c[e]+"");f.send(a.hasContent&&a.data||null),b=function(c,e){var h,i,j;if(b&&(e||4===f.readyState))if(delete Xc[g],b=void 0,f.onreadystatechange=m.noop,e)4!==f.readyState&&f.abort();else{j={},h=f.status,"string"==typeof f.responseText&&(j.text=f.responseText);try{i=f.statusText}catch(k){i=""}h||!a.isLocal||a.crossDomain?1223===h&&(h=204):h=j.text?200:404}j&&d(h,i,j,f.getAllResponseHeaders())},a.async?4===f.readyState?setTimeout(b):f.onreadystatechange=Xc[g]=b:b()},abort:function(){b&&b(void 0,!0)}}}});function Zc(){try{return new a.XMLHttpRequest}catch(b){}}function $c(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}m.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(a){return m.globalEval(a),a}}}),m.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),m.ajaxTransport("script",function(a){if(a.crossDomain){var b,c=y.head||m("head")[0]||y.documentElement;return{send:function(d,e){b=y.createElement("script"),b.async=!0,a.scriptCharset&&(b.charset=a.scriptCharset),b.src=a.url,b.onload=b.onreadystatechange=function(a,c){(c||!b.readyState||/loaded|complete/.test(b.readyState))&&(b.onload=b.onreadystatechange=null,b.parentNode&&b.parentNode.removeChild(b),b=null,c||e(200,"success"))},c.insertBefore(b,c.firstChild)},abort:function(){b&&b.onload(void 0,!0)}}}});var _c=[],ad=/(=)\?(?=&|$)|\?\?/;m.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=_c.pop()||m.expando+"_"+vc++;return this[a]=!0,a}}),m.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(ad.test(b.url)?"url":"string"==typeof b.data&&!(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&ad.test(b.data)&&"data");return h||"jsonp"===b.dataTypes[0]?(e=b.jsonpCallback=m.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(ad,"$1"+e):b.jsonp!==!1&&(b.url+=(wc.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||m.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,_c.push(e)),g&&m.isFunction(f)&&f(g[0]),g=f=void 0}),"script"):void 0}),m.parseHTML=function(a,b,c){if(!a||"string"!=typeof a)return null;"boolean"==typeof b&&(c=b,b=!1),b=b||y;var d=u.exec(a),e=!c&&[];return d?[b.createElement(d[1])]:(d=m.buildFragment([a],b,e),e&&e.length&&m(e).remove(),m.merge([],d.childNodes))};var bd=m.fn.load;m.fn.load=function(a,b,c){if("string"!=typeof a&&bd)return bd.apply(this,arguments);var d,e,f,g=this,h=a.indexOf(" ");return h>=0&&(d=m.trim(a.slice(h,a.length)),a=a.slice(0,h)),m.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(f="POST"),g.length>0&&m.ajax({url:a,type:f,dataType:"html",data:b}).done(function(a){e=arguments,g.html(d?m("<div>").append(m.parseHTML(a)).find(d):a)}).complete(c&&function(a,b){g.each(c,e||[a.responseText,b,a])}),this},m.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){m.fn[b]=function(a){return this.on(b,a)}}),m.expr.filters.animated=function(a){return m.grep(m.timers,function(b){return a===b.elem}).length};var cd=a.document.documentElement;function dd(a){return m.isWindow(a)?a:9===a.nodeType?a.defaultView||a.parentWindow:!1}m.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=m.css(a,"position"),l=m(a),n={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=m.css(a,"top"),i=m.css(a,"left"),j=("absolute"===k||"fixed"===k)&&m.inArray("auto",[f,i])>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),m.isFunction(b)&&(b=b.call(a,c,h)),null!=b.top&&(n.top=b.top-h.top+g),null!=b.left&&(n.left=b.left-h.left+e),"using"in b?b.using.call(a,n):l.css(n)}},m.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){m.offset.setOffset(this,a,b)});var b,c,d={top:0,left:0},e=this[0],f=e&&e.ownerDocument;if(f)return b=f.documentElement,m.contains(b,e)?(typeof e.getBoundingClientRect!==K&&(d=e.getBoundingClientRect()),c=dd(f),{top:d.top+(c.pageYOffset||b.scrollTop)-(b.clientTop||0),left:d.left+(c.pageXOffset||b.scrollLeft)-(b.clientLeft||0)}):d},position:function(){if(this[0]){var a,b,c={top:0,left:0},d=this[0];return"fixed"===m.css(d,"position")?b=d.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),m.nodeName(a[0],"html")||(c=a.offset()),c.top+=m.css(a[0],"borderTopWidth",!0),c.left+=m.css(a[0],"borderLeftWidth",!0)),{top:b.top-c.top-m.css(d,"marginTop",!0),left:b.left-c.left-m.css(d,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||cd;while(a&&!m.nodeName(a,"html")&&"static"===m.css(a,"position"))a=a.offsetParent;return a||cd})}}),m.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c=/Y/.test(b);m.fn[a]=function(d){return V(this,function(a,d,e){var f=dd(a);return void 0===e?f?b in f?f[b]:f.document.documentElement[d]:a[d]:void(f?f.scrollTo(c?m(f).scrollLeft():e,c?e:m(f).scrollTop()):a[d]=e)},a,d,arguments.length,null)}}),m.each(["top","left"],function(a,b){m.cssHooks[b]=Lb(k.pixelPosition,function(a,c){return c?(c=Jb(a,b),Hb.test(c)?m(a).position()[b]+"px":c):void 0})}),m.each({Height:"height",Width:"width"},function(a,b){m.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){m.fn[d]=function(d,e){var f=arguments.length&&(c||"boolean"!=typeof d),g=c||(d===!0||e===!0?"margin":"border");return V(this,function(b,c,d){var e;return m.isWindow(b)?b.document.documentElement["client"+a]:9===b.nodeType?(e=b.documentElement,Math.max(b.body["scroll"+a],e["scroll"+a],b.body["offset"+a],e["offset"+a],e["client"+a])):void 0===d?m.css(b,c,g):m.style(b,c,d,g)},b,f?d:void 0,f,null)}})}),m.fn.size=function(){return this.length},m.fn.andSelf=m.fn.addBack,"function"==typeof define&&define.amd&&define("jquery",[],function(){return m});var ed=a.jQuery,fd=a.$;return m.noConflict=function(b){return a.$===m&&(a.$=fd),b&&a.jQuery===m&&(a.jQuery=ed),m},typeof b===K&&(a.jQuery=a.$=m),m});

/*! jQuery Migrate v1.2.1 | (c) 2005, 2013 jQuery Foundation, Inc. and other contributors | jquery.org/license */
jQuery.migrateMute===void 0&&(jQuery.migrateMute=!0),function(e,t,n){function r(n){var r=t.console;i[n]||(i[n]=!0,e.migrateWarnings.push(n),r&&r.warn&&!e.migrateMute&&(r.warn("JQMIGRATE: "+n),e.migrateTrace&&r.trace&&r.trace()))}function a(t,a,i,o){if(Object.defineProperty)try{return Object.defineProperty(t,a,{configurable:!0,enumerable:!0,get:function(){return r(o),i},set:function(e){r(o),i=e}}),n}catch(s){}e._definePropertyBroken=!0,t[a]=i}var i={};e.migrateWarnings=[],!e.migrateMute&&t.console&&t.console.log&&t.console.log("JQMIGRATE: Logging is active"),e.migrateTrace===n&&(e.migrateTrace=!0),e.migrateReset=function(){i={},e.migrateWarnings.length=0},"BackCompat"===document.compatMode&&r("jQuery is not compatible with Quirks Mode");var o=e("<input/>",{size:1}).attr("size")&&e.attrFn,s=e.attr,u=e.attrHooks.value&&e.attrHooks.value.get||function(){return null},c=e.attrHooks.value&&e.attrHooks.value.set||function(){return n},l=/^(?:input|button)$/i,d=/^[238]$/,p=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,f=/^(?:checked|selected)$/i;a(e,"attrFn",o||{},"jQuery.attrFn is deprecated"),e.attr=function(t,a,i,u){var c=a.toLowerCase(),g=t&&t.nodeType;return u&&(4>s.length&&r("jQuery.fn.attr( props, pass ) is deprecated"),t&&!d.test(g)&&(o?a in o:e.isFunction(e.fn[a])))?e(t)[a](i):("type"===a&&i!==n&&l.test(t.nodeName)&&t.parentNode&&r("Can't change the 'type' of an input or button in IE 6/7/8"),!e.attrHooks[c]&&p.test(c)&&(e.attrHooks[c]={get:function(t,r){var a,i=e.prop(t,r);return i===!0||"boolean"!=typeof i&&(a=t.getAttributeNode(r))&&a.nodeValue!==!1?r.toLowerCase():n},set:function(t,n,r){var a;return n===!1?e.removeAttr(t,r):(a=e.propFix[r]||r,a in t&&(t[a]=!0),t.setAttribute(r,r.toLowerCase())),r}},f.test(c)&&r("jQuery.fn.attr('"+c+"') may use property instead of attribute")),s.call(e,t,a,i))},e.attrHooks.value={get:function(e,t){var n=(e.nodeName||"").toLowerCase();return"button"===n?u.apply(this,arguments):("input"!==n&&"option"!==n&&r("jQuery.fn.attr('value') no longer gets properties"),t in e?e.value:null)},set:function(e,t){var a=(e.nodeName||"").toLowerCase();return"button"===a?c.apply(this,arguments):("input"!==a&&"option"!==a&&r("jQuery.fn.attr('value', val) no longer sets properties"),e.value=t,n)}};var g,h,v=e.fn.init,m=e.parseJSON,y=/^([^<]*)(<[\w\W]+>)([^>]*)$/;e.fn.init=function(t,n,a){var i;return t&&"string"==typeof t&&!e.isPlainObject(n)&&(i=y.exec(e.trim(t)))&&i[0]&&("<"!==t.charAt(0)&&r("$(html) HTML strings must start with '<' character"),i[3]&&r("$(html) HTML text after last tag is ignored"),"#"===i[0].charAt(0)&&(r("HTML string cannot start with a '#' character"),e.error("JQMIGRATE: Invalid selector string (XSS)")),n&&n.context&&(n=n.context),e.parseHTML)?v.call(this,e.parseHTML(i[2],n,!0),n,a):v.apply(this,arguments)},e.fn.init.prototype=e.fn,e.parseJSON=function(e){return e||null===e?m.apply(this,arguments):(r("jQuery.parseJSON requires a valid JSON string"),null)},e.uaMatch=function(e){e=e.toLowerCase();var t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||0>e.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0"}},e.browser||(g=e.uaMatch(navigator.userAgent),h={},g.browser&&(h[g.browser]=!0,h.version=g.version),h.chrome?h.webkit=!0:h.webkit&&(h.safari=!0),e.browser=h),a(e,"browser",e.browser,"jQuery.browser is deprecated"),e.sub=function(){function t(e,n){return new t.fn.init(e,n)}e.extend(!0,t,this),t.superclass=this,t.fn=t.prototype=this(),t.fn.constructor=t,t.sub=this.sub,t.fn.init=function(r,a){return a&&a instanceof e&&!(a instanceof t)&&(a=t(a)),e.fn.init.call(this,r,a,n)},t.fn.init.prototype=t.fn;var n=t(document);return r("jQuery.sub() is deprecated"),t},e.ajaxSetup({converters:{"text json":e.parseJSON}});var b=e.fn.data;e.fn.data=function(t){var a,i,o=this[0];return!o||"events"!==t||1!==arguments.length||(a=e.data(o,t),i=e._data(o,t),a!==n&&a!==i||i===n)?b.apply(this,arguments):(r("Use of jQuery.fn.data('events') is deprecated"),i)};var j=/\/(java|ecma)script/i,w=e.fn.andSelf||e.fn.addBack;e.fn.andSelf=function(){return r("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"),w.apply(this,arguments)},e.clean||(e.clean=function(t,a,i,o){a=a||document,a=!a.nodeType&&a[0]||a,a=a.ownerDocument||a,r("jQuery.clean() is deprecated");var s,u,c,l,d=[];if(e.merge(d,e.buildFragment(t,a).childNodes),i)for(c=function(e){return!e.type||j.test(e.type)?o?o.push(e.parentNode?e.parentNode.removeChild(e):e):i.appendChild(e):n},s=0;null!=(u=d[s]);s++)e.nodeName(u,"script")&&c(u)||(i.appendChild(u),u.getElementsByTagName!==n&&(l=e.grep(e.merge([],u.getElementsByTagName("script")),c),d.splice.apply(d,[s+1,0].concat(l)),s+=l.length));return d});var Q=e.event.add,x=e.event.remove,k=e.event.trigger,N=e.fn.toggle,T=e.fn.live,M=e.fn.die,S="ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",C=RegExp("\\b(?:"+S+")\\b"),H=/(?:^|\s)hover(\.\S+|)\b/,A=function(t){return"string"!=typeof t||e.event.special.hover?t:(H.test(t)&&r("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'"),t&&t.replace(H,"mouseenter$1 mouseleave$1"))};e.event.props&&"attrChange"!==e.event.props[0]&&e.event.props.unshift("attrChange","attrName","relatedNode","srcElement"),e.event.dispatch&&a(e.event,"handle",e.event.dispatch,"jQuery.event.handle is undocumented and deprecated"),e.event.add=function(e,t,n,a,i){e!==document&&C.test(t)&&r("AJAX events should be attached to document: "+t),Q.call(this,e,A(t||""),n,a,i)},e.event.remove=function(e,t,n,r,a){x.call(this,e,A(t)||"",n,r,a)},e.fn.error=function(){var e=Array.prototype.slice.call(arguments,0);return r("jQuery.fn.error() is deprecated"),e.splice(0,0,"error"),arguments.length?this.bind.apply(this,e):(this.triggerHandler.apply(this,e),this)},e.fn.toggle=function(t,n){if(!e.isFunction(t)||!e.isFunction(n))return N.apply(this,arguments);r("jQuery.fn.toggle(handler, handler...) is deprecated");var a=arguments,i=t.guid||e.guid++,o=0,s=function(n){var r=(e._data(this,"lastToggle"+t.guid)||0)%o;return e._data(this,"lastToggle"+t.guid,r+1),n.preventDefault(),a[r].apply(this,arguments)||!1};for(s.guid=i;a.length>o;)a[o++].guid=i;return this.click(s)},e.fn.live=function(t,n,a){return r("jQuery.fn.live() is deprecated"),T?T.apply(this,arguments):(e(this.context).on(t,this.selector,n,a),this)},e.fn.die=function(t,n){return r("jQuery.fn.die() is deprecated"),M?M.apply(this,arguments):(e(this.context).off(t,this.selector||"**",n),this)},e.event.trigger=function(e,t,n,a){return n||C.test(e)||r("Global events are undocumented and deprecated"),k.call(this,e,t,n||document,a)},e.each(S.split("|"),function(t,n){e.event.special[n]={setup:function(){var t=this;return t!==document&&(e.event.add(document,n+"."+e.guid,function(){e.event.trigger(n,null,t,!0)}),e._data(this,n,e.guid++)),!1},teardown:function(){return this!==document&&e.event.remove(document,n+"."+e._data(this,n)),!1}}})}(jQuery,window);

var jq1112=jQuery;

/*  jquery.layout 1.4.4 */
!function($){var min=Math.min,max=Math.max,round=Math.floor,isStr=function(e){return"string"===$.type(e)},runPluginCallbacks=function(Instance,a_fn){function g(e){return e}if($.isArray(a_fn))for(var i=0,c=a_fn.length;c>i;i++){var fn=a_fn[i];try{isStr(fn)&&(fn=eval(fn)),$.isFunction(fn)&&g(fn)(Instance)}catch(ex){}}};$.layout={version:"1.4.4",revision:1.0404,browser:{},effects:{slide:{all:{duration:"fast"},north:{direction:"up"},south:{direction:"down"},east:{direction:"right"},west:{direction:"left"}},drop:{all:{duration:"slow"},north:{direction:"up"},south:{direction:"down"},east:{direction:"right"},west:{direction:"left"}},scale:{all:{duration:"fast"}},blind:{},clip:{},explode:{},fade:{},fold:{},puff:{},size:{all:{easing:"swing"}}},config:{optionRootKeys:"effects,panes,north,south,west,east,center".split(","),allPanes:"north,south,west,east,center".split(","),borderPanes:"north,south,west,east".split(","),oppositeEdge:{north:"south",south:"north",east:"west",west:"east"},offscreenCSS:{left:"-99999px",right:"auto"},offscreenReset:"offscreenReset",hidden:{visibility:"hidden"},visible:{visibility:"visible"},resizers:{cssReq:{position:"absolute",padding:0,margin:0,fontSize:"1px",textAlign:"left",overflow:"hidden"},cssDemo:{background:"#DDD",border:"none"}},togglers:{cssReq:{position:"absolute",display:"block",padding:0,margin:0,overflow:"hidden",textAlign:"center",fontSize:"1px",cursor:"pointer",zIndex:1},cssDemo:{background:"#AAA"}},content:{cssReq:{position:"relative"},cssDemo:{overflow:"auto",padding:"10px"},cssDemoPane:{overflow:"hidden",padding:0}},panes:{cssReq:{position:"absolute",margin:0},cssDemo:{padding:"10px",background:"#FFF",border:"1px solid #BBB",overflow:"auto"}},north:{side:"top",sizeType:"Height",dir:"horz",cssReq:{top:0,bottom:"auto",left:0,right:0,width:"auto"}},south:{side:"bottom",sizeType:"Height",dir:"horz",cssReq:{top:"auto",bottom:0,left:0,right:0,width:"auto"}},east:{side:"right",sizeType:"Width",dir:"vert",cssReq:{left:"auto",right:0,top:"auto",bottom:"auto",height:"auto"}},west:{side:"left",sizeType:"Width",dir:"vert",cssReq:{left:0,right:"auto",top:"auto",bottom:"auto",height:"auto"}},center:{dir:"center",cssReq:{left:"auto",right:"auto",top:"auto",bottom:"auto",height:"auto",width:"auto"}}},callbacks:{},getParentPaneElem:function(e){var t=$(e),i=t.data("layout")||t.data("parentLayout");if(i){var s=i.container;if(s.data("layoutPane"))return s;var n=s.closest("."+$.layout.defaults.panes.paneClass);if(n.data("layoutPane"))return n}return null},getParentPaneInstance:function(e){var t=$.layout.getParentPaneElem(e);return t?t.data("layoutPane"):null},getParentLayoutInstance:function(e){var t=$.layout.getParentPaneElem(e);return t?t.data("parentLayout"):null},getEventObject:function(e){return"object"==typeof e&&e.stopPropagation?e:null},parsePaneName:function(e){var t=$.layout.getEventObject(e),i=e;return t&&(t.stopPropagation(),i=$(this).data("layoutEdge")),i&&!/^(west|east|north|south|center)$/.test(i)&&($.layout.msg('LAYOUT ERROR - Invalid pane-name: "'+i+'"'),i="error"),i},plugins:{draggable:!!$.fn.draggable,effects:{core:!!$.effects,slide:$.effects&&($.effects.slide||$.effects.effect&&$.effects.effect.slide)}},onCreate:[],onLoad:[],onReady:[],onDestroy:[],onUnload:[],afterOpen:[],afterClose:[],scrollbarWidth:function(){return window.scrollbarWidth||$.layout.getScrollbarSize("width")},scrollbarHeight:function(){return window.scrollbarHeight||$.layout.getScrollbarSize("height")},getScrollbarSize:function(e){var t=$('<div style="position: absolute; top: -10000px; left: -10000px; width: 100px; height: 100px; border: 0; overflow: scroll;"></div>').appendTo("body"),i={width:t.outerWidth-t[0].clientWidth,height:100-t[0].clientHeight};return t.remove(),window.scrollbarWidth=i.width,window.scrollbarHeight=i.height,e.match(/^(width|height)$/)?i[e]:i},disableTextSelection:function(){var e=$(document),t="textSelectionDisabled",i="textSelectionInitialized";$.fn.disableSelection&&(e.data(i)||e.on("mouseup",$.layout.enableTextSelection).data(i,!0),e.data(t)||e.disableSelection().data(t,!0))},enableTextSelection:function(){var e=$(document),t="textSelectionDisabled";$.fn.enableSelection&&e.data(t)&&e.enableSelection().data(t,!1)},showInvisibly:function(e,t){if(e&&e.length&&(t||"none"===e.css("display"))){var i=e[0].style,s={display:i.display||"",visibility:i.visibility||""};return e.css({display:"block",visibility:"hidden"}),s}return{}},getElementDimensions:function(e,t){var i,s,n,o={css:{},inset:{}},a=o.css,r={bottom:0},l=$.layout.cssNum,d=Math.round,c=e.offset();return o.offsetLeft=c.left,o.offsetTop=c.top,t||(t={}),$.each("Left,Right,Top,Bottom".split(","),function(l,d){i=a["border"+d]=$.layout.borderWidth(e,d),s=a["padding"+d]=$.layout.cssNum(e,"padding"+d),n=d.toLowerCase(),o.inset[n]=t[n]>=0?t[n]:s,r[n]=o.inset[n]+i}),a.width=d(e.width()),a.height=d(e.height()),a.top=l(e,"top",!0),a.bottom=l(e,"bottom",!0),a.left=l(e,"left",!0),a.right=l(e,"right",!0),o.outerWidth=d(e.outerWidth()),o.outerHeight=d(e.outerHeight()),o.innerWidth=max(0,o.outerWidth-r.left-r.right),o.innerHeight=max(0,o.outerHeight-r.top-r.bottom),o.layoutWidth=d(e.innerWidth()),o.layoutHeight=d(e.innerHeight()),o},getElementStyles:function(e,t){var i,s,n,o,a,r,l={},d=e[0].style,c=t.split(","),u="Top,Bottom,Left,Right".split(","),p="Color,Style,Width".split(",");for(o=0;o<c.length;o++)if(i=c[o],i.match(/(border|padding|margin)$/))for(a=0;4>a;a++)if(s=u[a],"border"===i)for(r=0;3>r;r++)n=p[r],l[i+s+n]=d[i+s+n];else l[i+s]=d[i+s];else l[i]=d[i];return l},cssWidth:function(e,t){if(0>=t)return 0;var i=$.layout.browser,s=i.boxModel?i.boxSizing?e.css("boxSizing"):"content-box":"border-box",n=$.layout.borderWidth,o=$.layout.cssNum,a=t;return"border-box"!==s&&(a-=n(e,"Left")+n(e,"Right")),"content-box"===s&&(a-=o(e,"paddingLeft")+o(e,"paddingRight")),max(0,a)},cssHeight:function(e,t){if(0>=t)return 0;var i=$.layout.browser,s=i.boxModel?i.boxSizing?e.css("boxSizing"):"content-box":"border-box",n=$.layout.borderWidth,o=$.layout.cssNum,a=t;return"border-box"!==s&&(a-=n(e,"Top")+n(e,"Bottom")),"content-box"===s&&(a-=o(e,"paddingTop")+o(e,"paddingBottom")),max(0,a)},cssNum:function(e,t,i){e.jquery||(e=$(e));var s=$.layout.showInvisibly(e),n=$.css(e[0],t,!0),o=i&&"auto"==n?n:Math.round(parseFloat(n)||0);return e.css(s),o},borderWidth:function(e,t){e.jquery&&(e=e[0]);var i="border"+t.substr(0,1).toUpperCase()+t.substr(1);return"none"===$.css(e,i+"Style",!0)?0:Math.round(parseFloat($.css(e,i+"Width",!0))||0)},isMouseOverElem:function(e,t){var i=$(t||this),s=i.offset(),n=s.top,o=s.left,a=o+i.outerWidth(),r=n+i.outerHeight(),l=e.pageX,d=e.pageY;return $.layout.browser.msie&&0>l&&0>d||l>=o&&a>=l&&d>=n&&r>=d},msg:function(e,t,i,s){function n(){var e=$.support.fixedPosition?"fixed":"absolute",t=$('<div id="layoutLogger" style="position: '+e+'; top: 5px; z-index: 999999; max-width: 25%; overflow: hidden; border: 1px solid #000; border-radius: 5px; background: #FBFBFB; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"><div style="font-size: 13px; font-weight: bold; padding: 5px 10px; background: #F6F6F6; border-radius: 5px 5px 0 0; cursor: move;"><span style="float: right; padding-left: 7px; cursor: pointer;" title="Remove Console" onclick="$(this).closest(\'#layoutLogger\').remove()">X</span>Layout console.log</div><ul style="font-size: 13px; font-weight: none; list-style: none; margin: 0; padding: 0 0 2px;"></ul></div>').appendTo("body");return t.css("left",$(window).width()-t.outerWidth()-5),$.ui.draggable&&t.draggable({handle:":first-child"}),t}if($.isPlainObject(e)&&window.debugData){"string"==typeof t?(s=i,i=t):"object"==typeof i&&(s=i,i=null);var o=i||"log( <object> )",a=$.extend({sort:!1,returnHTML:!1,display:!1},s);t===!0||a.display?debugData(e,o,a):window.console&&console.log(debugData(e,o,a))}else if(t)alert(e);else if(window.console)console.log(e);else{var r="#layoutLogger",l=$(r);l.length||(l=n()),l.children("ul").append('<li style="padding: 4px 10px; margin: 0; border-top: 1px solid #CCC;">'+e.replace(/\</g,"&lt;").replace(/\>/g,"&gt;")+"</li>")}}},function(){var e=navigator.userAgent.toLowerCase(),t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||e.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[],i=t[1]||"",s=t[2]||0,n="msie"===i,o=document.compatMode,a=$.support,r=void 0!==a.boxSizing?a.boxSizing:a.boxSizingReliable,l=!n||!o||"CSS1Compat"===o||a.boxModel||!1,d=$.layout.browser={version:s,safari:"webkit"===i,webkit:"chrome"===i,msie:n,isIE6:n&&6==s,boxModel:l,boxSizing:!!("function"==typeof r?r():r)};i&&(d[i]=!0),l||o||$(function(){d.boxModel=a.boxModel})}(),$.layout.defaults={name:"",containerClass:"ui-layout-container",inset:null,scrollToBookmarkOnLoad:!0,resizeWithWindow:!0,resizeWithWindowDelay:200,resizeWithWindowMaxDelay:0,maskPanesEarly:!1,onresizeall_start:null,onresizeall_end:null,onload_start:null,onload_end:null,onunload_start:null,onunload_end:null,initPanes:!0,showErrorMessages:!0,showDebugMessages:!1,zIndex:null,zIndexes:{pane_normal:0,content_mask:1,resizer_normal:2,pane_sliding:100,pane_animate:1e3,resizer_drag:1e4},errors:{pane:"pane",selector:"selector",addButtonError:"Error Adding Button\nInvalid ",containerMissing:"UI Layout Initialization Error\nThe specified layout-container does not exist.",centerPaneMissing:"UI Layout Initialization Error\nThe center-pane element does not exist.\nThe center-pane is a required element.",noContainerHeight:"UI Layout Initialization Warning\nThe layout-container \"CONTAINER\" has no height.\nTherefore the layout is 0-height and hence 'invisible'!",callbackError:"UI Layout Callback Error\nThe EVENT callback is not a valid function."},panes:{applyDemoStyles:!1,closable:!0,resizable:!0,slidable:!0,initClosed:!1,initHidden:!1,contentSelector:".ui-layout-content",contentIgnoreSelector:".ui-layout-ignore",findNestedContent:!1,paneClass:"ui-layout-pane",resizerClass:"ui-layout-resizer",togglerClass:"ui-layout-toggler",buttonClass:"ui-layout-button",minSize:0,maxSize:0,spacing_open:6,spacing_closed:6,togglerLength_open:50,togglerLength_closed:50,togglerAlign_open:"center",togglerAlign_closed:"center",togglerContent_open:"",togglerContent_closed:"",resizerDblClickToggle:!0,autoResize:!0,autoReopen:!0,resizerDragOpacity:1,maskContents:!1,maskObjects:!1,maskZindex:null,resizingGrid:!1,livePaneResizing:!1,liveContentResizing:!1,liveResizingTolerance:1,sliderCursor:"pointer",slideTrigger_open:"click",slideTrigger_close:"mouseleave",slideDelay_open:300,slideDelay_close:300,hideTogglerOnSlide:!1,preventQuickSlideClose:$.layout.browser.webkit,preventPrematureSlideClose:!1,tips:{Open:"Open",Close:"Close",Resize:"Resize",Slide:"Slide Open",Pin:"Pin",Unpin:"Un-Pin",noRoomToOpen:"Not enough room to show this panel.",minSizeWarning:"Panel has reached its minimum size",maxSizeWarning:"Panel has reached its maximum size"},showOverflowOnHover:!1,enableCursorHotkey:!0,customHotkeyModifier:"SHIFT",fxName:"slide",fxSpeed:null,fxSettings:{},fxOpacityFix:!0,animatePaneSizing:!1,children:null,containerSelector:"",initChildren:!0,destroyChildren:!0,resizeChildren:!0,triggerEventsOnLoad:!1,triggerEventsDuringLiveResize:!0,onshow_start:null,onshow_end:null,onhide_start:null,onhide_end:null,onopen_start:null,onopen_end:null,onclose_start:null,onclose_end:null,onresize_start:null,onresize_end:null,onsizecontent_start:null,onsizecontent_end:null,onswap_start:null,onswap_end:null,ondrag_start:null,ondrag_end:null},north:{paneSelector:".ui-layout-north",size:"auto",resizerCursor:"n-resize",customHotkey:""},south:{paneSelector:".ui-layout-south",size:"auto",resizerCursor:"s-resize",customHotkey:""},east:{paneSelector:".ui-layout-east",size:200,resizerCursor:"e-resize",customHotkey:""},west:{paneSelector:".ui-layout-west",size:223,resizerCursor:"w-resize",customHotkey:""},center:{paneSelector:".ui-layout-center",minWidth:0,minHeight:0}},$.layout.optionsMap={layout:"name,instanceKey,stateManagement,effects,inset,zIndexes,errors,zIndex,scrollToBookmarkOnLoad,showErrorMessages,maskPanesEarly,outset,resizeWithWindow,resizeWithWindowDelay,resizeWithWindowMaxDelay,onresizeall,onresizeall_start,onresizeall_end,onload,onload_start,onload_end,onunload,onunload_start,onunload_end".split(","),center:"paneClass,contentSelector,contentIgnoreSelector,findNestedContent,applyDemoStyles,triggerEventsOnLoad,showOverflowOnHover,maskContents,maskObjects,liveContentResizing,containerSelector,children,initChildren,resizeChildren,destroyChildren,onresize,onresize_start,onresize_end,onsizecontent,onsizecontent_start,onsizecontent_end".split(","),noDefault:"paneSelector,resizerCursor,customHotkey".split(",")},$.layout.transformData=function(e,t){var i,s,n,o,a,r,l,d=t?{panes:{},center:{}}:{};if("object"!=typeof e)return d;for(s in e)for(i=d,a=e[s],n=s.split("__"),l=n.length-1,r=0;l>=r;r++)o=n[r],r===l?i[o]=$.isPlainObject(a)?$.layout.transformData(a):a:(i[o]||(i[o]={}),i=i[o]);return d},$.layout.backwardCompatibility={map:{applyDefaultStyles:"applyDemoStyles",childOptions:"children",initChildLayout:"initChildren",destroyChildLayout:"destroyChildren",resizeChildLayout:"resizeChildren",resizeNestedLayout:"resizeChildren",resizeWhileDragging:"livePaneResizing",resizeContentWhileDragging:"liveContentResizing",triggerEventsWhileDragging:"triggerEventsDuringLiveResize",maskIframesOnResize:"maskContents",useStateCookie:"stateManagement.enabled","cookie.autoLoad":"stateManagement.autoLoad","cookie.autoSave":"stateManagement.autoSave","cookie.keys":"stateManagement.stateKeys","cookie.name":"stateManagement.cookie.name","cookie.domain":"stateManagement.cookie.domain","cookie.path":"stateManagement.cookie.path","cookie.expires":"stateManagement.cookie.expires","cookie.secure":"stateManagement.cookie.secure",noRoomToOpenTip:"tips.noRoomToOpen",togglerTip_open:"tips.Close",togglerTip_closed:"tips.Open",resizerTip:"tips.Resize",sliderTip:"tips.Slide"},renameOptions:function(e){function t(t,i){for(var s,n=t.split("."),o=n.length-1,a={branch:e,key:n[o]},r=0;o>r;r++)s=n[r],a.branch=void 0==a.branch[s]?i?a.branch[s]={}:{}:a.branch[s];return a}var i,s,n,o=$.layout.backwardCompatibility.map;for(var a in o)i=t(a),n=i.branch[i.key],void 0!==n&&(s=t(o[a],!0),s.branch[s.key]=n,delete i.branch[i.key])},renameAllOptions:function(e){var t=$.layout.backwardCompatibility.renameOptions;return t(e),e.defaults&&("object"!=typeof e.panes&&(e.panes={}),$.extend(!0,e.panes,e.defaults),delete e.defaults),e.panes&&t(e.panes),$.each($.layout.config.allPanes,function(i,s){e[s]&&t(e[s])}),e}},$.fn.layout=function(opts){function keyDown(e){if(!e)return!0;var t=e.keyCode;if(33>t)return!0;var i,s,n,o,a={38:"north",40:"south",37:"west",39:"east"},r=(e.altKey,e.shiftKey),l=e.ctrlKey,d=l&&t>=37&&40>=t;return d&&options[a[t]].enableCursorHotkey?o=a[t]:(l||r)&&$.each(_c.borderPanes,function(e,a){return i=options[a],s=i.customHotkey,n=i.customHotkeyModifier,(r&&"SHIFT"==n||l&&"CTRL"==n||l&&r)&&s&&t===(isNaN(s)||9>=s?s.toUpperCase().charCodeAt(0):s)?(o=a,!1):void 0}),o&&$Ps[o]&&options[o].closable&&!state[o].isHidden?(toggle(o),e.stopPropagation(),e.returnValue=!1,!1):!0}function allowOverflow(e){if(isInitialized()){this&&this.tagName&&(e=this);var t;if(isStr(e)?t=$Ps[e]:$(e).data("layoutRole")?t=$(e):$(e).parents().each(function(){return $(this).data("layoutRole")?(t=$(this),!1):void 0}),t&&t.length){var i=t.data("layoutEdge"),s=state[i];if(s.cssSaved&&resetOverflow(i),s.isSliding||s.isResizing||s.isClosed)return void(s.cssSaved=!1);var n={zIndex:options.zIndexes.resizer_normal+1},o={},a=t.css("overflow"),r=t.css("overflowX"),l=t.css("overflowY");"visible"!=a&&(o.overflow=a,n.overflow="visible"),r&&!r.match(/(visible|auto)/)&&(o.overflowX=r,n.overflowX="visible"),l&&!l.match(/(visible|auto)/)&&(o.overflowY=r,n.overflowY="visible"),s.cssSaved=o,t.css(n),$.each(_c.allPanes,function(e,t){t!=i&&resetOverflow(t)})}}}function resetOverflow(e){if(isInitialized()){this&&this.tagName&&(e=this);var t;if(isStr(e)?t=$Ps[e]:$(e).data("layoutRole")?t=$(e):$(e).parents().each(function(){return $(this).data("layoutRole")?(t=$(this),!1):void 0}),t&&t.length){var i=t.data("layoutEdge"),s=state[i],n=s.cssSaved||{};s.isSliding||s.isResizing||t.css("zIndex",options.zIndexes.pane_normal),t.css(n),s.cssSaved=!1}}}var browser=$.layout.browser,_c=$.layout.config,cssW=$.layout.cssWidth,cssH=$.layout.cssHeight,elDims=$.layout.getElementDimensions,styles=$.layout.getElementStyles,evtObj=$.layout.getEventObject,evtPane=$.layout.parsePaneName,options=$.extend(!0,{},$.layout.defaults),effects=options.effects=$.extend(!0,{},$.layout.effects),state={id:"layout"+$.now(),initialized:!1,paneResizing:!1,panesSliding:{},container:{innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0,layoutWidth:0,layoutHeight:0},north:{childIdx:0},south:{childIdx:0},east:{childIdx:0},west:{childIdx:0},center:{childIdx:0}},children={north:null,south:null,east:null,west:null,center:null},timer={data:{},set:function(e,t,i){timer.clear(e),timer.data[e]=setTimeout(t,i)},clear:function(e){var t=timer.data;t[e]&&(clearTimeout(t[e]),delete t[e])}},_log=function(e,t,i){var s=options;return(s.showErrorMessages&&!i||i&&s.showDebugMessages)&&$.layout.msg(s.name+" / "+e,t!==!1),!1},_runCallbacks=function(evtName,pane,skipBoundEvents){function g(e){return e}var hasPane=pane&&isStr(pane),s=hasPane?state[pane]:state,o=hasPane?options[pane]:options,lName=options.name,lng=evtName+(evtName.match(/_/)?"":"_end"),shrt=lng.match(/_end$/)?lng.substr(0,lng.length-4):"",fn=o[lng]||o[shrt],retVal="NC",args=[],$P=hasPane?$Ps[pane]:0;if(hasPane&&!$P)return retVal;if(hasPane||"boolean"!==$.type(pane)||(skipBoundEvents=pane,pane=""),fn)try{isStr(fn)&&(fn.match(/,/)?(args=fn.split(","),fn=eval(args[0])):fn=eval(fn)),$.isFunction(fn)&&(retVal=args.length?g(fn)(args[1]):hasPane?g(fn)(pane,$Ps[pane],s,o,lName):g(fn)(Instance,s,o,lName))}catch(ex){_log(options.errors.callbackError.replace(/EVENT/,$.trim((pane||"")+" "+lng)),!1),"string"===$.type(ex)&&string.length&&_log("Exception:  "+ex,!1)}return skipBoundEvents||retVal===!1||(hasPane?(o=options[pane],s=state[pane],$P.triggerHandler("layoutpane"+lng,[pane,$P,s,o,lName]),shrt&&$P.triggerHandler("layoutpane"+shrt,[pane,$P,s,o,lName])):($N.triggerHandler("layout"+lng,[Instance,s,o,lName]),shrt&&$N.triggerHandler("layout"+shrt,[Instance,s,o,lName]))),hasPane&&"onresize_end"===evtName&&resizeChildren(pane+"",!0),retVal},_fixIframe=function(e){if(!browser.mozilla){var t=$Ps[e];"IFRAME"===state[e].tagName?t.css(_c.hidden).css(_c.visible):t.find("IFRAME").css(_c.hidden).css(_c.visible)}},cssSize=function(e,t){var i="horz"==_c[e].dir?cssH:cssW;return i($Ps[e],t)},cssMinDims=function(e){var t=$Ps[e],i=_c[e].dir,s={minWidth:1001-cssW(t,1e3),minHeight:1001-cssH(t,1e3)};return"horz"===i&&(s.minSize=s.minHeight),"vert"===i&&(s.minSize=s.minWidth),s},setOuterWidth=function(e,t,i){var s,n=e;isStr(e)?n=$Ps[e]:e.jquery||(n=$(e)),s=cssW(n,t),n.css({width:s}),s>0?i&&n.data("autoHidden")&&n.innerHeight()>0&&(n.show().data("autoHidden",!1),browser.mozilla||n.css(_c.hidden).css(_c.visible)):i&&!n.data("autoHidden")&&n.hide().data("autoHidden",!0)},setOuterHeight=function(e,t,i){var s,n=e;isStr(e)?n=$Ps[e]:e.jquery||(n=$(e)),s=cssH(n,t),n.css({height:s,visibility:"visible"}),s>0&&n.innerWidth()>0?i&&n.data("autoHidden")&&(n.show().data("autoHidden",!1),browser.mozilla||n.css(_c.hidden).css(_c.visible)):i&&!n.data("autoHidden")&&n.hide().data("autoHidden",!0)},_parseSize=function(e,t,i){if(i||(i=_c[e].dir),isStr(t)&&t.match(/%/)&&(t="100%"===t?-1:parseInt(t,10)/100),0===t)return 0;if(t>=1)return parseInt(t,10);var s=options,n=0;if("horz"==i?n=sC.innerHeight-($Ps.north?s.north.spacing_open:0)-($Ps.south?s.south.spacing_open:0):"vert"==i&&(n=sC.innerWidth-($Ps.west?s.west.spacing_open:0)-($Ps.east?s.east.spacing_open:0)),-1===t)return n;if(t>0)return round(n*t);if("center"==e)return 0;var o="horz"===i?"height":"width",a=$Ps[e],r="height"===o?$Cs[e]:!1,l=$.layout.showInvisibly(a),d=a.css(o),c=r?r.css(o):0;return a.css(o,"auto"),r&&r.css(o,"auto"),t="height"===o?a.outerHeight():a.outerWidth(),a.css(o,d).css(l),r&&r.css(o,c),t},getPaneSize=function(e,t){var i=$Ps[e],s=options[e],n=state[e],o=t?s.spacing_open:0,a=t?s.spacing_closed:0;return!i||n.isHidden?0:n.isClosed||n.isSliding&&t?a:"horz"===_c[e].dir?i.outerHeight()+o:i.outerWidth()+o},setSizeLimits=function(e,t){if(isInitialized()){var i=options[e],s=state[e],n=_c[e],o=n.dir,a=(n.sizeType.toLowerCase(),void 0!=t?t:s.isSliding),r=($Ps[e],i.spacing_open),l=_c.oppositeEdge[e],d=state[l],c=$Ps[l],u=!c||d.isVisible===!1||d.isSliding?0:"horz"==o?c.outerHeight():c.outerWidth(),p=(!c||d.isHidden?0:options[l][d.isClosed!==!1?"spacing_closed":"spacing_open"])||0,g="horz"==o?sC.innerHeight:sC.innerWidth,h=cssMinDims("center"),f="horz"==o?max(options.center.minHeight,h.minHeight):max(options.center.minWidth,h.minWidth),m=g-r-(a?0:_parseSize("center",f,o)+u+p),b=s.minSize=max(_parseSize(e,i.minSize),cssMinDims(e).minSize),v=s.maxSize=min(i.maxSize?_parseSize(e,i.maxSize):1e5,m),y=s.resizerPosition={},z=sC.inset.top,$=sC.inset.left,C=sC.innerWidth,w=sC.innerHeight,S=i.spacing_open;switch(e){case"north":y.min=z+b,y.max=z+v;break;case"west":y.min=$+b,y.max=$+v;break;case"south":y.min=z+w-v-S,y.max=z+w-b-S;break;case"east":y.min=$+C-v-S,y.max=$+C-b-S}}},calcNewCenterPaneDims=function(){var e={top:getPaneSize("north",!0),bottom:getPaneSize("south",!0),left:getPaneSize("west",!0),right:getPaneSize("east",!0),width:0,height:0};return e.width=sC.innerWidth-e.left-e.right,e.height=sC.innerHeight-e.bottom-e.top,e.top+=sC.inset.top,e.bottom+=sC.inset.bottom,e.left+=sC.inset.left,e.right+=sC.inset.right,e},getHoverClasses=function(e,t){var i=$(e),s=i.data("layoutRole"),n=i.data("layoutEdge"),o=options[n],a=o[s+"Class"],r="-"+n,l="-open",d="-closed",c="-sliding",u="-hover ",p=i.hasClass(a+d)?d:l,g=p===d?l:d,h=a+u+(a+r+u)+(a+p+u)+(a+r+p+u);return t&&(h+=a+g+u+(a+r+g+u)),"resizer"==s&&i.hasClass(a+c)&&(h+=a+c+u+(a+r+c+u)),$.trim(h)},addHover=function(e,t){var i=$(t||this);e&&"toggler"===i.data("layoutRole")&&e.stopPropagation(),i.addClass(getHoverClasses(i))},removeHover=function(e,t){var i=$(t||this);i.removeClass(getHoverClasses(i,!0))},onResizerEnter=function(){{var e=$(this).data("layoutEdge"),t=state[e];$(document)}t.isResizing||state.paneResizing||options.maskPanesEarly&&showMasks(e,{resizing:!0})},onResizerLeave=function(e,t){{var i=t||this,s=$(i).data("layoutEdge"),n=s+"ResizerLeave";$(document)}timer.clear(s+"_openSlider"),timer.clear(n),t?options.maskPanesEarly&&!state.paneResizing&&hideMasks():timer.set(n,function(){onResizerLeave(e,i)},200)},_create=function(){initOptions();var e=options,t=state;return t.creatingLayout=!0,runPluginCallbacks(Instance,$.layout.onCreate),!1===_runCallbacks("onload_start")?"cancel":(_initContainer(),initHotkeys(),$(window).bind("unload."+sID,unload),runPluginCallbacks(Instance,$.layout.onLoad),e.initPanes&&_initLayoutElements(),delete t.creatingLayout,state.initialized)},isInitialized=function(){return state.initialized||state.creatingLayout?!0:_initLayoutElements()},_initLayoutElements=function(e){var t=options;if(!$N.is(":visible"))return!e&&browser.webkit&&"BODY"===$N[0].tagName&&setTimeout(function(){_initLayoutElements(!0)},50),!1;if(!getPane("center").length)return _log(t.errors.centerPaneMissing);if(state.creatingLayout=!0,$.extend(sC,elDims($N,t.inset)),initPanes(),t.scrollToBookmarkOnLoad){var i=self.location;i.hash&&i.replace(i.hash)}return Instance.hasParentLayout?t.resizeWithWindow=!1:t.resizeWithWindow&&$(window).bind("resize."+sID,windowResize),delete state.creatingLayout,state.initialized=!0,runPluginCallbacks(Instance,$.layout.onReady),_runCallbacks("onload_end"),!0},createChildren=function(e,t){var i=evtPane.call(this,e),s=$Ps[i];if(s){var n=$Cs[i],o=state[i],a=options[i],r=options.stateManagement||{},l=t?a.children=t:a.children;if($.isPlainObject(l))l=[l];else if(!l||!$.isArray(l))return;$.each(l,function(e,t){if($.isPlainObject(t)){var a=t.containerSelector?s.find(t.containerSelector):n||s;a.each(function(){var e=$(this),s=e.data("layout");if(!s){if(setInstanceKey({container:e,options:t},o),r.includeChildren&&state.stateData[i]){var n=state.stateData[i].children||{},a=n[t.instanceKey],l=t.stateManagement||(t.stateManagement={autoLoad:!0});l.autoLoad===!0&&a&&(l.autoSave=!1,l.includeChildren=!0,l.autoLoad=$.extend(!0,{},a))}s=e.layout(t),s&&refreshChildren(i,s)}})}})}},setInstanceKey=function(e,t){var i=e.container,s=e.options,n=s.stateManagement,o=s.instanceKey||i.data("layoutInstanceKey");return o||(o=(n&&n.cookie?n.cookie.name:"")||s.name),o=o?o.replace(/[^\w-]/gi,"_").replace(/_{2,}/g,"_"):"layout"+ ++t.childIdx,s.instanceKey=o,i.data("layoutInstanceKey",o),o},refreshChildren=function(e,t){var i,s=$Ps[e],n=children[e],o=state[e];$.isPlainObject(n)&&($.each(n,function(e,t){t.destroyed&&delete n[e]}),$.isEmptyObject(n)&&(n=children[e]=null)),t||n||(t=s.data("layout")),t&&(t.hasParentLayout=!0,i=t.options,setInstanceKey(t,o),n||(n=children[e]={}),n[i.instanceKey]=t.container.data("layout")),Instance[e].children=children[e],t||createChildren(e)},windowResize=function(){var e=options,t=Number(e.resizeWithWindowDelay);10>t&&(t=100),timer.clear("winResize"),timer.set("winResize",function(){timer.clear("winResize"),timer.clear("winResizeRepeater");var t=elDims($N,e.inset);(t.innerWidth!==sC.innerWidth||t.innerHeight!==sC.innerHeight)&&resizeAll()},t),timer.data.winResizeRepeater||setWindowResizeRepeater()},setWindowResizeRepeater=function(){var e=Number(options.resizeWithWindowMaxDelay);e>0&&timer.set("winResizeRepeater",function(){setWindowResizeRepeater(),resizeAll()},e)},unload=function(){_runCallbacks("onunload_start"),runPluginCallbacks(Instance,$.layout.onUnload),_runCallbacks("onunload_end")},_initContainer=function(){var e,t,i=$N[0],s=$("html"),n=sC.tagName=i.tagName,o=sC.id=i.id,a=sC.className=i.className,r=options,l=r.name,d="position,margin,padding,border",c="layoutCSS",u={},p="hidden",g=$N.data("parentLayout"),h=$N.data("layoutEdge"),f=g&&h,m=$.layout.cssNum;sC.selector=$N.selector.split(".slice")[0],sC.ref=(r.name?r.name+" layout / ":"")+n+(o?"#"+o:a?".["+a+"]":""),sC.isBody="BODY"===n,f||sC.isBody||(e=$N.closest("."+$.layout.defaults.panes.paneClass),g=e.data("parentLayout"),h=e.data("layoutEdge"),f=g&&h),$N.data({layout:Instance,layoutContainer:sID}).addClass(r.containerClass);var b={destroy:"",initPanes:"",resizeAll:"resizeAll",resize:"resizeAll"};for(l in b)$N.bind("layout"+l.toLowerCase()+"."+sID,Instance[b[l]||l]);f&&(Instance.hasParentLayout=!0,g.refreshChildren(h,Instance)),$N.data(c)||(sC.isBody?($N.data(c,$.extend(styles($N,d),{height:$N.css("height"),overflow:$N.css("overflow"),overflowX:$N.css("overflowX"),overflowY:$N.css("overflowY")})),s.data(c,$.extend(styles(s,"padding"),{height:"auto",overflow:s.css("overflow"),overflowX:s.css("overflowX"),overflowY:s.css("overflowY")}))):$N.data(c,styles($N,d+",top,bottom,left,right,width,height,overflow,overflowX,overflowY")));try{if(u={overflow:p,overflowX:p,overflowY:p},$N.css(u),r.inset&&!$.isPlainObject(r.inset)&&(t=parseInt(r.inset,10)||0,r.inset={top:t,bottom:t,left:t,right:t}),sC.isBody)r.outset?$.isPlainObject(r.outset)||(t=parseInt(r.outset,10)||0,r.outset={top:t,bottom:t,left:t,right:t}):r.outset={top:m(s,"paddingTop"),bottom:m(s,"paddingBottom"),left:m(s,"paddingLeft"),right:m(s,"paddingRight")},s.css(u).css({height:"100%",border:"none",padding:0,margin:0}),browser.isIE6?($N.css({width:"100%",height:"100%",border:"none",padding:0,margin:0,position:"relative"}),r.inset||(r.inset=elDims($N).inset)):($N.css({width:"auto",height:"auto",margin:0,position:"absolute"}),$N.css(r.outset)),$.extend(sC,elDims($N,r.inset));else{var v=$N.css("position");v&&v.match(/(fixed|absolute|relative)/)||$N.css("position","relative"),$N.is(":visible")&&($.extend(sC,elDims($N,r.inset)),sC.innerHeight<1&&_log(r.errors.noContainerHeight.replace(/CONTAINER/,sC.ref)))}m($N,"minWidth")&&$N.parent().css("overflowX","auto"),m($N,"minHeight")&&$N.parent().css("overflowY","auto")}catch(y){}},initHotkeys=function(e){e=e?e.split(","):_c.borderPanes,$.each(e,function(e,t){var i=options[t];return i.enableCursorHotkey||i.customHotkey?($(document).bind("keydown."+sID,keyDown),!1):void 0})},initOptions=function(){function e(e){var t=options[e],i=options.panes;t.fxSettings||(t.fxSettings={}),i.fxSettings||(i.fxSettings={}),$.each(["_open","_close","_size"],function(s,n){var o="fxName"+n,a="fxSpeed"+n,r="fxSettings"+n,l=t[o]=t[o]||i[o]||t.fxName||i.fxName||"none",d=$.effects&&($.effects[l]||$.effects.effect&&$.effects.effect[l]);"none"!==l&&options.effects[l]&&d||(l=t[o]="none");var c=options.effects[l]||{},u=c.all||null,p=c[e]||null;t[a]=t[a]||i[a]||t.fxSpeed||i.fxSpeed||null,t[r]=$.extend(!0,{},u,p,i.fxSettings,t.fxSettings,i[r],t[r])}),delete t.fxName,delete t.fxSpeed,delete t.fxSettings}var t,i,s,n,o,a,r;if(opts=$.layout.transformData(opts,!0),opts=$.layout.backwardCompatibility.renameAllOptions(opts),!$.isEmptyObject(opts.panes)){for(t=$.layout.optionsMap.noDefault,o=0,a=t.length;a>o;o++)s=t[o],delete opts.panes[s];for(t=$.layout.optionsMap.layout,o=0,a=t.length;a>o;o++)s=t[o],delete opts.panes[s]}t=$.layout.optionsMap.layout;var l=$.layout.config.optionRootKeys;for(s in opts)n=opts[s],$.inArray(s,l)<0&&$.inArray(s,t)<0&&(opts.panes[s]||(opts.panes[s]=$.isPlainObject(n)?$.extend(!0,{},n):n),delete opts[s]);$.extend(!0,options,opts),$.each(_c.allPanes,function(n,o){if(_c[o]=$.extend(!0,{},_c.panes,_c[o]),i=options.panes,r=options[o],"center"===o)for(t=$.layout.optionsMap.center,n=0,a=t.length;a>n;n++)s=t[n],opts.center[s]||!opts.panes[s]&&r[s]||(r[s]=i[s]);else r=options[o]=$.extend(!0,{},i,r),e(o),r.resizerClass||(r.resizerClass="ui-layout-resizer"),r.togglerClass||(r.togglerClass="ui-layout-toggler");r.paneClass||(r.paneClass="ui-layout-pane")});var d=opts.zIndex,c=options.zIndexes;d>0&&(c.pane_normal=d,c.content_mask=max(d+1,c.content_mask),c.resizer_normal=max(d+2,c.resizer_normal)),delete options.panes},getPane=function(e){var t=options[e].paneSelector;if("#"===t.substr(0,1))return $N.find(t).eq(0);var i=$N.children(t).eq(0);return i.length?i:$N.children("form:first").children(t).eq(0)},initPanes=function(e){evtPane(e),$.each(_c.allPanes,function(e,t){addPane(t,!0)}),initHandles(),$.each(_c.borderPanes,function(e,t){$Ps[t]&&state[t].isVisible&&(setSizeLimits(t),makePaneFit(t))}),sizeMidPanes("center"),$.each(_c.allPanes,function(e,t){afterInitPane(t)})},addPane=function(e,t){if(t||isInitialized()){var i,s,n,o=options[e],a=state[e],r=_c[e],l=r.dir,d=(a.fx,o.spacing_open||0,"center"===e),c={},u=$Ps[e];if(u?removePane(e,!1,!0,!1):$Cs[e]=!1,u=$Ps[e]=getPane(e),!u.length)return void($Ps[e]=!1);if(!u.data("layoutCSS")){var p="position,top,left,bottom,right,width,height,overflow,zIndex,display,backgroundColor,padding,margin,border";u.data("layoutCSS",styles(u,p))}Instance[e]={name:e,pane:$Ps[e],content:$Cs[e],options:options[e],state:state[e],children:children[e]},u.data({parentLayout:Instance,layoutPane:Instance[e],layoutEdge:e,layoutRole:"pane"}).css(r.cssReq).css("zIndex",options.zIndexes.pane_normal).css(o.applyDemoStyles?r.cssDemo:{}).addClass(o.paneClass+" "+o.paneClass+"-"+e).bind("mouseenter."+sID,addHover).bind("mouseleave."+sID,removeHover);var g,h={hide:"",show:"",toggle:"",close:"",open:"",slideOpen:"",slideClose:"",slideToggle:"",size:"sizePane",sizePane:"sizePane",sizeContent:"",sizeHandles:"",enableClosable:"",disableClosable:"",enableSlideable:"",disableSlideable:"",enableResizable:"",disableResizable:"",swapPanes:"swapPanes",swap:"swapPanes",move:"swapPanes",removePane:"removePane",remove:"removePane",createChildren:"",resizeChildren:"",resizeAll:"resizeAll",resizeLayout:"resizeAll"};for(g in h)u.bind("layoutpane"+g.toLowerCase()+"."+sID,Instance[h[g]||g]);initContent(e,!1),d||(i=a.size=_parseSize(e,o.size),s=_parseSize(e,o.minSize)||1,n=_parseSize(e,o.maxSize)||1e5,i>0&&(i=max(min(i,n),s)),a.autoResize=o.autoResize,a.isClosed=!1,a.isSliding=!1,a.isResizing=!1,a.isHidden=!1,a.pins||(a.pins=[])),a.tagName=u[0].tagName,a.edge=e,a.noRoom=!1,a.isVisible=!0,setPanePosition(e),"horz"===l?c.height=cssH(u,i):"vert"===l&&(c.width=cssW(u,i)),u.css(c),"horz"!=l&&sizeMidPanes(e,!0),state.initialized&&(initHandles(e),initHotkeys(e)),o.initClosed&&o.closable&&!o.initHidden?close(e,!0,!0):o.initHidden||o.initClosed?hide(e):a.noRoom||u.css("display","block"),u.css("visibility","visible"),o.showOverflowOnHover&&u.hover(allowOverflow,resetOverflow),state.initialized&&afterInitPane(e)
}},afterInitPane=function(e){var t=$Ps[e],i=state[e],s=options[e];t&&(t.data("layout")&&refreshChildren(e,t.data("layout")),i.isVisible&&(state.initialized?resizeAll():sizeContent(e),s.triggerEventsOnLoad?_runCallbacks("onresize_end",e):resizeChildren(e,!0)),s.initChildren&&s.children&&createChildren(e))},setPanePosition=function(e){e=e?e.split(","):_c.borderPanes,$.each(e,function(e,t){var i=$Ps[t],s=$Rs[t],n=(options[t],state[t]),o=_c[t].side,a={};if(i){switch(t){case"north":a.top=sC.inset.top,a.left=sC.inset.left,a.right=sC.inset.right;break;case"south":a.bottom=sC.inset.bottom,a.left=sC.inset.left,a.right=sC.inset.right;break;case"west":a.left=sC.inset.left;break;case"east":a.right=sC.inset.right;break;case"center":}i.css(a),s&&n.isClosed?s.css(o,sC.inset[o]):s&&!n.isHidden&&s.css(o,sC.inset[o]+getPaneSize(t))}})},initHandles=function(e){e=e?e.split(","):_c.borderPanes,$.each(e,function(e,t){var i=$Ps[t];if($Rs[t]=!1,$Ts[t]=!1,i){var s=options[t],n=state[t],o=(_c[t],"#"===s.paneSelector.substr(0,1)?s.paneSelector.substr(1):""),a=s.resizerClass,r=s.togglerClass,l=(n.isVisible?s.spacing_open:s.spacing_closed,"-"+t),d=(n.isVisible?"-open":"-closed",Instance[t]),c=d.resizer=$Rs[t]=$("<div></div>"),u=d.toggler=s.closable?$Ts[t]=$("<div></div>"):!1;!n.isVisible&&s.slidable&&c.attr("title",s.tips.Slide).css("cursor",s.sliderCursor),c.attr("id",o?o+"-resizer":"").data({parentLayout:Instance,layoutPane:Instance[t],layoutEdge:t,layoutRole:"resizer"}).css(_c.resizers.cssReq).css("zIndex",options.zIndexes.resizer_normal).css(s.applyDemoStyles?_c.resizers.cssDemo:{}).addClass(a+" "+a+l).hover(addHover,removeHover).hover(onResizerEnter,onResizerLeave).mousedown($.layout.disableTextSelection).mouseup($.layout.enableTextSelection).appendTo($N),$.fn.disableSelection&&c.disableSelection(),s.resizerDblClickToggle&&c.bind("dblclick."+sID,toggle),u&&(u.attr("id",o?o+"-toggler":"").data({parentLayout:Instance,layoutPane:Instance[t],layoutEdge:t,layoutRole:"toggler"}).css(_c.togglers.cssReq).css(s.applyDemoStyles?_c.togglers.cssDemo:{}).addClass(r+" "+r+l).hover(addHover,removeHover).bind("mouseenter",onResizerEnter).appendTo(c),s.togglerContent_open&&$("<span>"+s.togglerContent_open+"</span>").data({layoutEdge:t,layoutRole:"togglerContent"}).data("layoutRole","togglerContent").data("layoutEdge",t).addClass("content content-open").css("display","none").appendTo(u),s.togglerContent_closed&&$("<span>"+s.togglerContent_closed+"</span>").data({layoutEdge:t,layoutRole:"togglerContent"}).addClass("content content-closed").css("display","none").appendTo(u),enableClosable(t)),initResizable(t),n.isVisible?setAsOpen(t):(setAsClosed(t),bindStartSlidingEvents(t,!0))}}),sizeHandles()},initContent=function(e,t){if(isInitialized()){var i,s=options[e],n=s.contentSelector,o=Instance[e],a=$Ps[e];n&&(i=o.content=$Cs[e]=s.findNestedContent?a.find(n).eq(0):a.children(n).eq(0)),i&&i.length?(i.data("layoutRole","content"),i.data("layoutCSS")||i.data("layoutCSS",styles(i,"height")),i.css(_c.content.cssReq),s.applyDemoStyles&&(i.css(_c.content.cssDemo),a.css(_c.content.cssDemoPane)),a.css("overflowX").match(/(scroll|auto)/)&&a.css("overflow","hidden"),state[e].content={},t!==!1&&sizeContent(e)):o.content=$Cs[e]=!1}},initResizable=function(e){var t=$.layout.plugins.draggable;e=e?e.split(","):_c.borderPanes,$.each(e,function(e,s){var n=options[s];if(!t||!$Ps[s]||!n.resizable)return n.resizable=!1,!0;var o,a,r=state[s],l=options.zIndexes,d=_c[s],c="horz"==d.dir?"top":"left",u=($Ps[s],$Rs[s]),p=n.resizerClass,g=0,h=p+"-drag",f=p+"-"+s+"-drag",m=p+"-dragging",b=p+"-"+s+"-dragging",v=p+"-dragging-limit",y=p+"-"+s+"-dragging-limit",z=!1;r.isClosed||u.attr("title",n.tips.Resize).css("cursor",n.resizerCursor),u.draggable({containment:$N[0],axis:"horz"==d.dir?"y":"x",delay:0,distance:1,grid:n.resizingGrid,helper:"clone",opacity:n.resizerDragOpacity,addClasses:!1,zIndex:l.resizer_drag,start:function(e,t){return n=options[s],r=state[s],a=n.livePaneResizing,!1===_runCallbacks("ondrag_start",s)?!1:(r.isResizing=!0,state.paneResizing=s,timer.clear(s+"_closeSlider"),setSizeLimits(s),o=r.resizerPosition,g=t.position[c],u.addClass(h+" "+f),z=!1,void showMasks(s,{resizing:!0}))},drag:function(e,t){z||(t.helper.addClass(m+" "+b).css({right:"auto",bottom:"auto"}).children().css("visibility","hidden"),z=!0,r.isSliding&&$Ps[s].css("zIndex",l.pane_sliding));var d=0;t.position[c]<o.min?(t.position[c]=o.min,d=-1):t.position[c]>o.max&&(t.position[c]=o.max,d=1),d?(t.helper.addClass(v+" "+y),window.defaultStatus=d>0&&s.match(/(north|west)/)||0>d&&s.match(/(south|east)/)?n.tips.maxSizeWarning:n.tips.minSizeWarning):(t.helper.removeClass(v+" "+y),window.defaultStatus=""),a&&Math.abs(t.position[c]-g)>=n.liveResizingTolerance&&(g=t.position[c],i(e,t,s))},stop:function(e,t){$("body").enableSelection(),window.defaultStatus="",u.removeClass(h+" "+f),r.isResizing=!1,state.paneResizing=!1,i(e,t,s,!0)}})});var i=function(e,t,i,s){var n,o=t.position,a=_c[i],r=options[i],l=state[i];switch(i){case"north":n=o.top;break;case"west":n=o.left;break;case"south":n=sC.layoutHeight-o.top-r.spacing_open;break;case"east":n=sC.layoutWidth-o.left-r.spacing_open}var d=n-sC.inset[a.side];if(s)!1!==_runCallbacks("ondrag_end",i)&&manualSizePane(i,d,!1,!0),hideMasks(!0),l.isSliding&&showMasks(i,{resizing:!0});else{if(Math.abs(d-l.size)<r.liveResizingTolerance)return;manualSizePane(i,d,!1,!0),sizeMasks()}}},sizeMask=function(){var e=$(this),t=e.data("layoutMask"),i=state[t];"IFRAME"==i.tagName&&i.isVisible&&e.css({top:i.offsetTop,left:i.offsetLeft,width:i.outerWidth,height:i.outerHeight})},sizeMasks=function(){$Ms.each(sizeMask)},showMasks=function(e,t){var i,s,n=_c[e],o=["center"],a=options.zIndexes,r=$.extend({objectsOnly:!1,animation:!1,resizing:!0,sliding:state[e].isSliding},t);r.resizing&&o.push(e),r.sliding&&o.push(_c.oppositeEdge[e]),"horz"===n.dir&&(o.push("west"),o.push("east")),$.each(o,function(e,t){s=state[t],i=options[t],s.isVisible&&(i.maskObjects||!r.objectsOnly&&i.maskContents)&&getMasks(t).each(function(){sizeMask.call(this),this.style.zIndex=s.isSliding?a.pane_sliding+1:a.pane_normal+1,this.style.display="block"})})},hideMasks=function(e){if(e||!state.paneResizing)$Ms.hide();else if(!e&&!$.isEmptyObject(state.panesSliding))for(var t,i,s=$Ms.length-1;s>=0;s--)i=$Ms.eq(s),t=i.data("layoutMask"),options[t].maskObjects||i.hide()},getMasks=function(e){for(var t,i=$([]),s=0,n=$Ms.length;n>s;s++)t=$Ms.eq(s),t.data("layoutMask")===e&&(i=i.add(t));return i.length?i:createMasks(e)},createMasks=function(e){var t,i,s,n,o,a=$Ps[e],r=state[e],l=options[e],d=options.zIndexes;if(!l.maskContents&&!l.maskObjects)return $([]);for(o=0;o<(l.maskObjects?2:1);o++)t=l.maskObjects&&0==o,i=document.createElement(t?"iframe":"div"),s=$(i).data("layoutMask",e),i.className="ui-layout-mask ui-layout-mask-"+e,n=i.style,n.background="#FFF",n.position="absolute",n.display="block",t?(i.src="about:blank",i.frameborder=0,n.border=0,n.opacity=0,n.filter="Alpha(Opacity='0')"):(n.opacity=.001,n.filter="Alpha(Opacity='1')"),"IFRAME"==r.tagName?(n.zIndex=d.pane_normal+1,$N.append(i)):(s.addClass("ui-layout-mask-inside-pane"),n.zIndex=l.maskZindex||d.content_mask,n.top=0,n.left=0,n.width="100%",n.height="100%",a.append(i)),$Ms=$Ms.add(i);return $Ms},destroy=function(e,t){$(window).unbind("."+sID),$(document).unbind("."+sID),"object"==typeof e?evtPane(e):t=e,$N.clearQueue().removeData("layout").removeData("layoutContainer").removeClass(options.containerClass).unbind("."+sID),$Ms.remove(),$.each(_c.allPanes,function(e,i){removePane(i,!1,!0,t)});var i="layoutCSS";$N.data(i)&&!$N.data("layoutRole")&&$N.css($N.data(i)).removeData(i),"BODY"===sC.tagName&&($N=$("html")).data(i)&&$N.css($N.data(i)).removeData(i),runPluginCallbacks(Instance,$.layout.onDestroy),unload();for(var s in Instance)s.match(/^(container|options)$/)||delete Instance[s];return Instance.destroyed=!0,Instance},removePane=function(e,t,i,s){if(isInitialized()){var n=evtPane.call(this,e),o=$Ps[n],a=$Cs[n],r=$Rs[n],l=$Ts[n];o&&$.isEmptyObject(o.data())&&(o=!1),a&&$.isEmptyObject(a.data())&&(a=!1),r&&$.isEmptyObject(r.data())&&(r=!1),l&&$.isEmptyObject(l.data())&&(l=!1),o&&o.stop(!0,!0);var d=options[n],c=state[n],u="layout",p="layoutCSS",g=children[n],h=$.isPlainObject(g)&&!$.isEmptyObject(g),f=void 0!==s?s:d.destroyChildren;if(h&&f&&($.each(g,function(e,t){t.destroyed||t.destroy(!0),t.destroyed&&delete g[e]}),$.isEmptyObject(g)&&(g=children[n]=null,h=!1)),o&&t&&!h)o.remove();else if(o&&o[0]){var m=d.paneClass,b=m+"-"+n,v="-open",y="-sliding",z="-closed",C=[m,m+v,m+z,m+y,b,b+v,b+z,b+y];$.merge(C,getHoverClasses(o,!0)),o.removeClass(C.join(" ")).removeData("parentLayout").removeData("layoutPane").removeData("layoutRole").removeData("layoutEdge").removeData("autoHidden").unbind("."+sID),h&&a?(a.width(a.width()),$.each(g,function(e,t){t.resizeAll()})):a&&a.css(a.data(p)).removeData(p).removeData("layoutRole"),o.data(u)||o.css(o.data(p)).removeData(p)}l&&l.remove(),r&&r.remove(),Instance[n]=$Ps[n]=$Cs[n]=$Rs[n]=$Ts[n]=!1,c={removed:!0},i||resizeAll()}},_hidePane=function(e){var t=$Ps[e],i=options[e],s=t[0].style;i.useOffscreenClose?(t.data(_c.offscreenReset)||t.data(_c.offscreenReset,{left:s.left,right:s.right}),t.css(_c.offscreenCSS)):t.hide().removeData(_c.offscreenReset)},_showPane=function(e){var t=$Ps[e],i=options[e],s=_c.offscreenCSS,n=t.data(_c.offscreenReset),o=t[0].style;t.show().removeData(_c.offscreenReset),i.useOffscreenClose&&n&&(o.left==s.left&&(o.left=n.left),o.right==s.right&&(o.right=n.right))},hide=function(e,t){if(isInitialized()){var i=evtPane.call(this,e),s=options[i],n=state[i],o=$Ps[i],a=$Rs[i];"center"!==i&&o&&!n.isHidden&&(state.initialized&&!1===_runCallbacks("onhide_start",i)||(n.isSliding=!1,delete state.panesSliding[i],a&&a.hide(),!state.initialized||n.isClosed?(n.isClosed=!0,n.isHidden=!0,n.isVisible=!1,state.initialized||_hidePane(i),sizeMidPanes("horz"===_c[i].dir?"":"center"),(state.initialized||s.triggerEventsOnLoad)&&_runCallbacks("onhide_end",i)):(n.isHiding=!0,close(i,!1,t))))}},show=function(e,t,i,s){if(isInitialized()){{var n=evtPane.call(this,e),o=(options[n],state[n]),a=$Ps[n];$Rs[n]}"center"!==n&&a&&o.isHidden&&!1!==_runCallbacks("onshow_start",n)&&(o.isShowing=!0,o.isSliding=!1,delete state.panesSliding[n],t===!1?close(n,!0):open(n,!1,i,s))}},toggle=function(e,t){if(isInitialized()){var i=evtObj(e),s=evtPane.call(this,e),n=state[s];i&&i.stopImmediatePropagation(),n.isHidden?show(s):n.isClosed?open(s,!!t):close(s)}},_closePane=function(e,t){var i=($Ps[e],state[e]);_hidePane(e),i.isClosed=!0,i.isVisible=!1,t&&setAsClosed(e)},close=function(e,t,i,s){function n(){p.isMoving=!1,bindStartSlidingEvents(o,!0);var e=_c.oppositeEdge[o];state[e].noRoom&&(setSizeLimits(e),makePaneFit(e)),s||!state.initialized&&!u.triggerEventsOnLoad||(r||_runCallbacks("onclose_end",o),r&&_runCallbacks("onshow_end",o),l&&_runCallbacks("onhide_end",o))}var o=evtPane.call(this,e);if("center"!==o){if(!state.initialized&&$Ps[o])return void _closePane(o,!0);if(isInitialized()){{var a,r,l,d,c=$Ps[o],u=($Rs[o],$Ts[o],options[o]),p=state[o];_c[o]}$N.queue(function(e){if(!c||!u.closable&&!p.isShowing&&!p.isHiding||!t&&p.isClosed&&!p.isShowing)return e();var s=!p.isShowing&&!1===_runCallbacks("onclose_start",o);return r=p.isShowing,l=p.isHiding,d=p.isSliding,delete p.isShowing,delete p.isHiding,s?e():(a=!i&&!p.isClosed&&"none"!=u.fxName_close,p.isMoving=!0,p.isClosed=!0,p.isVisible=!1,l?p.isHidden=!0:r&&(p.isHidden=!1),p.isSliding?bindStopSlidingEvents(o,!1):sizeMidPanes("horz"===_c[o].dir?"":"center",!1),setAsClosed(o),void(a?(lockPaneForFX(o,!0),c.hide(u.fxName_close,u.fxSettings_close,u.fxSpeed_close,function(){lockPaneForFX(o,!1),p.isClosed&&n(),e()})):(_hidePane(o),n(),e())))})}}},setAsClosed=function(e){if($Rs[e]){var t=($Ps[e],$Rs[e]),i=$Ts[e],s=options[e],n=state[e],o=_c[e].side,a=s.resizerClass,r=s.togglerClass,l="-"+e,d="-open",c="-sliding",u="-closed";t.css(o,sC.inset[o]).removeClass(a+d+" "+a+l+d).removeClass(a+c+" "+a+l+c).addClass(a+u+" "+a+l+u),n.isHidden&&t.hide(),s.resizable&&$.layout.plugins.draggable&&t.draggable("disable").removeClass("ui-state-disabled").css("cursor","default").attr("title",""),i&&(i.removeClass(r+d+" "+r+l+d).addClass(r+u+" "+r+l+u).attr("title",s.tips.Open),i.children(".content-open").hide(),i.children(".content-closed").css("display","block")),syncPinBtns(e,!1),state.initialized&&sizeHandles()}},open=function(e,t,i,s){function n(){c.isMoving=!1,_fixIframe(r),c.isSliding||sizeMidPanes("vert"==_c[r].dir?"center":"",!1),setAsOpen(r)}if(isInitialized()){{var o,a,r=evtPane.call(this,e),l=$Ps[r],d=($Rs[r],$Ts[r],options[r]),c=state[r];_c[r]}"center"!==r&&$N.queue(function(e){if(!l||!d.resizable&&!d.closable&&!c.isShowing||c.isVisible&&!c.isSliding)return e();if(c.isHidden&&!c.isShowing)return e(),void show(r,!0);c.autoResize&&c.size!=d.size?sizePane(r,d.size,!0,!0,!0):setSizeLimits(r,t);var u=_runCallbacks("onopen_start",r);return"abort"===u?e():("NC"!==u&&setSizeLimits(r,t),c.minSize>c.maxSize?(syncPinBtns(r,!1),!s&&d.tips.noRoomToOpen&&alert(d.tips.noRoomToOpen),e()):(t?bindStopSlidingEvents(r,!0):c.isSliding?bindStopSlidingEvents(r,!1):d.slidable&&bindStartSlidingEvents(r,!1),c.noRoom=!1,makePaneFit(r),a=c.isShowing,delete c.isShowing,o=!i&&c.isClosed&&"none"!=d.fxName_open,c.isMoving=!0,c.isVisible=!0,c.isClosed=!1,a&&(c.isHidden=!1),void(o?(lockPaneForFX(r,!0),l.show(d.fxName_open,d.fxSettings_open,d.fxSpeed_open,function(){lockPaneForFX(r,!1),c.isVisible&&n(),e()})):(_showPane(r),n(),e()))))})}},setAsOpen=function(e,t){var i=$Ps[e],s=$Rs[e],n=$Ts[e],o=options[e],a=state[e],r=_c[e].side,l=o.resizerClass,d=o.togglerClass,c="-"+e,u="-open",p="-closed",g="-sliding";s.css(r,sC.inset[r]+getPaneSize(e)).removeClass(l+p+" "+l+c+p).addClass(l+u+" "+l+c+u),a.isSliding?s.addClass(l+g+" "+l+c+g):s.removeClass(l+g+" "+l+c+g),removeHover(0,s),o.resizable&&$.layout.plugins.draggable?s.draggable("enable").css("cursor",o.resizerCursor).attr("title",o.tips.Resize):a.isSliding||s.css("cursor","default"),n&&(n.removeClass(d+p+" "+d+c+p).addClass(d+u+" "+d+c+u).attr("title",o.tips.Close),removeHover(0,n),n.children(".content-closed").hide(),n.children(".content-open").css("display","block")),syncPinBtns(e,!a.isSliding),$.extend(a,elDims(i)),state.initialized&&(sizeHandles(),sizeContent(e,!0)),!t&&(state.initialized||o.triggerEventsOnLoad)&&i.is(":visible")&&(_runCallbacks("onopen_end",e),a.isShowing&&_runCallbacks("onshow_end",e),state.initialized&&_runCallbacks("onresize_end",e))},slideOpen=function(e){function t(){n.isClosed?n.isMoving||open(s,!0):bindStopSlidingEvents(s,!0)}if(isInitialized()){var i=evtObj(e),s=evtPane.call(this,e),n=state[s],o=options[s].slideDelay_open;"center"!==s&&(i&&i.stopImmediatePropagation(),n.isClosed&&i&&"mouseenter"===i.type&&o>0?timer.set(s+"_openSlider",t,o):t())}},slideClose=function(e){function t(){o.isClosed?bindStopSlidingEvents(s,!1):o.isMoving||close(s)}if(isInitialized()){var i=evtObj(e),s=evtPane.call(this,e),n=options[s],o=state[s],a=o.isMoving?1e3:300;if("center"!==s&&!o.isClosed&&!o.isResizing)if("click"===n.slideTrigger_close)t();else{if(n.preventQuickSlideClose&&o.isMoving)return;if(n.preventPrematureSlideClose&&i&&$.layout.isMouseOverElem(i,$Ps[s]))return;i?timer.set(s+"_closeSlider",t,max(n.slideDelay_close,a)):t()}}},slideToggle=function(e){var t=evtPane.call(this,e);toggle(t,!0)},lockPaneForFX=function(e,t){var i=$Ps[e],s=state[e],n=options[e],o=options.zIndexes;t?(showMasks(e,{animation:!0,objectsOnly:!0}),i.css({zIndex:o.pane_animate}),"south"==e?i.css({top:sC.inset.top+sC.innerHeight-i.outerHeight()}):"east"==e&&i.css({left:sC.inset.left+sC.innerWidth-i.outerWidth()})):(hideMasks(),i.css({zIndex:s.isSliding?o.pane_sliding:o.pane_normal}),"south"==e?i.css({top:"auto"}):"east"!=e||i.css("left").match(/\-99999/)||i.css({left:"auto"}),browser.msie&&n.fxOpacityFix&&"slide"!=n.fxName_open&&i.css("filter")&&1==i.css("opacity")&&i[0].style.removeAttribute("filter"))},bindStartSlidingEvents=function(e,t){var i=options[e],s=($Ps[e],$Rs[e]),n=i.slideTrigger_open.toLowerCase();!s||t&&!i.slidable||(n.match(/mouseover/)?n=i.slideTrigger_open="mouseenter":n.match(/(click|dblclick|mouseenter)/)||(n=i.slideTrigger_open="click"),i.resizerDblClickToggle&&n.match(/click/)&&s[t?"unbind":"bind"]("dblclick."+sID,toggle),s[t?"bind":"unbind"](n+"."+sID,slideOpen).css("cursor",t?i.sliderCursor:"default").attr("title",t?i.tips.Slide:""))},bindStopSlidingEvents=function(e,t){function i(t){timer.clear(e+"_closeSlider"),t.stopPropagation()}var s=options[e],n=state[e],o=(_c[e],options.zIndexes),a=s.slideTrigger_close.toLowerCase(),r=t?"bind":"unbind",l=$Ps[e],d=$Rs[e];timer.clear(e+"_closeSlider"),t?(n.isSliding=!0,state.panesSliding[e]=!0,bindStartSlidingEvents(e,!1)):(n.isSliding=!1,delete state.panesSliding[e]),l.css("zIndex",t?o.pane_sliding:o.pane_normal),d.css("zIndex",t?o.pane_sliding+2:o.resizer_normal),a.match(/(click|mouseleave)/)||(a=s.slideTrigger_close="mouseleave"),d[r](a,slideClose),"mouseleave"===a&&(l[r]("mouseleave."+sID,slideClose),d[r]("mouseenter."+sID,i),l[r]("mouseenter."+sID,i)),t?"click"!==a||s.resizable||(d.css("cursor",t?s.sliderCursor:"default"),d.attr("title",t?s.tips.Close:"")):timer.clear(e+"_closeSlider")},makePaneFit=function(e,t,i,s){var n=options[e],o=state[e],a=_c[e],r=$Ps[e],l=$Rs[e],d="vert"===a.dir,c=!1;if(("center"===e||d&&o.noVerticalRoom)&&(c=o.maxHeight>=0,c&&o.noRoom?(_showPane(e),l&&l.show(),o.isVisible=!0,o.noRoom=!1,d&&(o.noVerticalRoom=!1),_fixIframe(e)):c||o.noRoom||(_hidePane(e),l&&l.hide(),o.isVisible=!1,o.noRoom=!0)),"center"===e);else if(o.minSize<=o.maxSize){if(c=!0,o.size>o.maxSize)sizePane(e,o.maxSize,i,!0,s);else if(o.size<o.minSize)sizePane(e,o.minSize,i,!0,s);else if(l&&o.isVisible&&r.is(":visible")){var u=o.size+sC.inset[a.side];$.layout.cssNum(l,a.side)!=u&&l.css(a.side,u)}o.noRoom&&(o.wasOpen&&n.closable?n.autoReopen?open(e,!1,!0,!0):o.noRoom=!1:show(e,o.wasOpen,!0,!0))}else o.noRoom||(o.noRoom=!0,o.wasOpen=!o.isClosed&&!o.isSliding,o.isClosed||(n.closable?close(e,!0,!0):hide(e,!0)))},manualSizePane=function(e,t,i,s,n){if(isInitialized()){var o=evtPane.call(this,e),a=options[o],r=state[o],l=n||a.livePaneResizing&&!r.isResizing;"center"!==o&&(r.autoResize=!1,sizePane(o,t,i,s,l))}},sizePane=function(e,t,i,s,n){function o(){for(var e="width"===h?u.outerWidth():u.outerHeight(),s=[{pane:l,count:1,target:t,actual:e,correct:t===e,attempt:t,cssSize:r}],o=s[0],d={},m="Inaccurate size after resizing the "+l+"-pane.";!(o.correct||(d={pane:l,count:o.count+1,target:t},d.attempt=o.actual>t?max(0,o.attempt-(o.actual-t)):max(0,o.attempt+(t-o.actual)),d.cssSize=cssSize(l,d.attempt),u.css(h,d.cssSize),d.actual="width"==h?u.outerWidth():u.outerHeight(),d.correct=t===d.actual,1===s.length&&(_log(m,!1,!0),_log(o,!1,!0)),_log(d,!1,!0),s.length>3));)s.push(d),o=s[s.length-1];c.size=t,$.extend(c,elDims(u)),c.isVisible&&u.is(":visible")&&(p&&p.css(g,t+sC.inset[g]),sizeContent(l)),!i&&!f&&state.initialized&&c.isVisible&&_runCallbacks("onresize_end",l),i||(c.isSliding||sizeMidPanes("horz"==_c[l].dir?"":"center",f,n),sizeHandles());var b=_c.oppositeEdge[l];a>t&&state[b].noRoom&&(setSizeLimits(b),makePaneFit(b,!1,i)),s.length>1&&_log(m+"\nSee the Error Console for details.",!0,!0)}if(isInitialized()){var a,r,l=evtPane.call(this,e),d=options[l],c=state[l],u=$Ps[l],p=$Rs[l],g=_c[l].side,h=_c[l].sizeType.toLowerCase(),f=c.isResizing&&!d.triggerEventsDuringLiveResize,m=s!==!0&&d.animatePaneSizing;"center"!==l&&$N.queue(function(e){if(setSizeLimits(l),a=c.size,t=_parseSize(l,t),t=max(t,_parseSize(l,d.minSize)),t=min(t,c.maxSize),t<c.minSize)return e(),void makePaneFit(l,!1,i);if(!n&&t===a)return e();if(c.newSize=t,!i&&state.initialized&&c.isVisible&&_runCallbacks("onresize_start",l),r=cssSize(l,t),m&&u.is(":visible")){var s=$.layout.effects.size[l]||$.layout.effects.size.all,p=d.fxSettings_size.easing||s.easing,g=options.zIndexes,f={};f[h]=r+"px",c.isMoving=!0,u.css({zIndex:g.pane_animate}).show().animate(f,d.fxSpeed_size,p,function(){u.css({zIndex:c.isSliding?g.pane_sliding:g.pane_normal}),c.isMoving=!1,delete c.newSize,o(),e()})}else u.css(h,r),delete c.newSize,u.is(":visible")?o():c.size=t,e()})}},sizeMidPanes=function(e,t,i){e=(e?e:"east,west,center").split(","),$.each(e,function(e,s){if($Ps[s]){var n=options[s],o=state[s],a=$Ps[s],r=($Rs[s],!0),l={},d=$.layout.showInvisibly(a),c=calcNewCenterPaneDims();if($.extend(o,elDims(a)),"center"===s){if(!i&&o.isVisible&&c.width===o.outerWidth&&c.height===o.outerHeight)return a.css(d),!0;if($.extend(o,cssMinDims(s),{maxWidth:c.width,maxHeight:c.height}),l=c,o.newWidth=l.width,o.newHeight=l.height,l.width=cssW(a,l.width),l.height=cssH(a,l.height),r=l.width>=0&&l.height>=0,!state.initialized&&n.minWidth>c.width){var u=n.minWidth-o.outerWidth,p=options.east.minSize||0,g=options.west.minSize||0,h=state.east.size,f=state.west.size,m=h,b=f;if(u>0&&state.east.isVisible&&h>p&&(m=max(h-p,h-u),u-=h-m),u>0&&state.west.isVisible&&f>g&&(b=max(f-g,f-u),u-=f-b),0===u)return h&&h!=p&&sizePane("east",m,!0,!0,i),f&&f!=g&&sizePane("west",b,!0,!0,i),sizeMidPanes("center",t,i),void a.css(d)}}else{if(o.isVisible&&!o.noVerticalRoom&&$.extend(o,elDims(a),cssMinDims(s)),!i&&!o.noVerticalRoom&&c.height===o.outerHeight)return a.css(d),!0;l.top=c.top,l.bottom=c.bottom,o.newSize=c.height,l.height=cssH(a,c.height),o.maxHeight=l.height,r=o.maxHeight>=0,r||(o.noVerticalRoom=!0)}if(r?(!t&&state.initialized&&_runCallbacks("onresize_start",s),a.css(l),"center"!==s&&sizeHandles(s),!o.noRoom||o.isClosed||o.isHidden||makePaneFit(s),o.isVisible&&($.extend(o,elDims(a)),state.initialized&&sizeContent(s))):!o.noRoom&&o.isVisible&&makePaneFit(s),a.css(d),delete o.newSize,delete o.newWidth,delete o.newHeight,!o.isVisible)return!0;if("center"===s){var v=browser.isIE6||!browser.boxModel;$Ps.north&&(v||"IFRAME"==state.north.tagName)&&$Ps.north.css("width",cssW($Ps.north,sC.innerWidth)),$Ps.south&&(v||"IFRAME"==state.south.tagName)&&$Ps.south.css("width",cssW($Ps.south,sC.innerWidth))}!t&&state.initialized&&_runCallbacks("onresize_end",s)}})},resizeAll=function(e){var t=sC.innerWidth,i=sC.innerHeight;if(evtPane(e),$N.is(":visible")){if(!state.initialized)return void _initLayoutElements();if(e===!0&&$.isPlainObject(options.outset)&&$N.css(options.outset),$.extend(sC,elDims($N,options.inset)),sC.outerHeight){if(e===!0&&setPanePosition(),!1===_runCallbacks("onresizeall_start"))return!1;{var s,n,o;sC.innerHeight<i,sC.innerWidth<t}$.each(["south","north","east","west"],function(e,t){$Ps[t]&&(n=options[t],o=state[t],o.autoResize&&o.size!=n.size?sizePane(t,n.size,!0,!0,!0):(setSizeLimits(t),makePaneFit(t,!1,!0,!0)))}),sizeMidPanes("",!0,!0),sizeHandles(),$.each(_c.allPanes,function(e,t){s=$Ps[t],s&&state[t].isVisible&&_runCallbacks("onresize_end",t)}),_runCallbacks("onresizeall_end")}}},resizeChildren=function(e,t){var i=evtPane.call(this,e);if(options[i].resizeChildren){t||refreshChildren(i);var s=children[i];$.isPlainObject(s)&&$.each(s,function(e,t){t.destroyed||t.resizeAll()})}},sizeContent=function(e,t){if(isInitialized()){var i=evtPane.call(this,e);i=i?i.split(","):_c.allPanes,$.each(i,function(e,i){function s(e){return max(l.css.paddingBottom,parseInt(e.css("marginBottom"),10)||0)}function n(){var e=options[i].contentIgnoreSelector,t=a.nextAll().not(".ui-layout-mask").not(e||":lt(0)"),n=t.filter(":visible"),o=n.filter(":last");d={top:a[0].offsetTop,height:a.outerHeight(),numFooters:t.length,hiddenFooters:t.length-n.length,spaceBelow:0},d.spaceAbove=d.top,d.bottom=d.top+d.height,d.spaceBelow=o.length?o[0].offsetTop+o.outerHeight()-d.bottom+s(o):s(a)}var o=$Ps[i],a=$Cs[i],r=options[i],l=state[i],d=l.content;if(!o||!a||!o.is(":visible"))return!0;if((a.length||(initContent(i,!1),a))&&!1!==_runCallbacks("onsizecontent_start",i)){(!l.isMoving&&!l.isResizing||r.liveContentResizing||t||void 0==d.top)&&(n(),d.hiddenFooters>0&&"hidden"===o.css("overflow")&&(o.css("overflow","visible"),n(),o.css("overflow","hidden")));var c=l.innerHeight-(d.spaceAbove-l.css.paddingTop)-(d.spaceBelow-l.css.paddingBottom);a.is(":visible")&&d.height==c||(setOuterHeight(a,c,!0),d.height=c),state.initialized&&_runCallbacks("onsizecontent_end",i)}})}},sizeHandles=function(e){var t=evtPane.call(this,e);t=t?t.split(","):_c.borderPanes,$.each(t,function(e,t){var i,s=options[t],n=state[t],o=$Ps[t],a=$Rs[t],r=$Ts[t];if(o&&a){var l,d,c,u=_c[t].dir,p=n.isClosed?"_closed":"_open",g=s["spacing"+p],h=s["togglerAlign"+p],f=s["togglerLength"+p];if(0===g)return void a.hide();if(n.noRoom||n.isHidden||a.show(),"horz"===u?(l=sC.innerWidth,n.resizerLength=l,d=$.layout.cssNum(o,"left"),a.css({width:cssW(a,l),height:cssH(a,g),left:d>-9999?d:sC.inset.left})):(l=o.outerHeight(),n.resizerLength=l,a.css({height:cssH(a,l),width:cssW(a,g),top:sC.inset.top+getPaneSize("north",!0)})),removeHover(s,a),r){if(0===f||n.isSliding&&s.hideTogglerOnSlide)return void r.hide();if(r.show(),!(f>0)||"100%"===f||f>l)f=l,c=0;else if(isStr(h))switch(h){case"top":case"left":c=0;break;case"bottom":case"right":c=l-f;break;case"middle":case"center":default:c=round((l-f)/2)}else{var m=parseInt(h,10);c=h>=0?m:l-f+m}if("horz"===u){var b=cssW(r,f);r.css({width:b,height:cssH(r,g),left:c,top:0}),r.children(".content").each(function(){i=$(this),i.css("marginLeft",round((b-i.outerWidth())/2))})}else{var v=cssH(r,f);r.css({height:v,width:cssW(r,g),top:c,left:0}),r.children(".content").each(function(){i=$(this),i.css("marginTop",round((v-i.outerHeight())/2))})}removeHover(0,r)}state.initialized||!s.initHidden&&!n.isHidden||(a.hide(),r&&r.hide())}})},enableClosable=function(e){if(isInitialized()){var t=evtPane.call(this,e),i=$Ts[t],s=options[t];i&&(s.closable=!0,i.bind("click."+sID,function(e){e.stopPropagation(),toggle(t)}).css("visibility","visible").css("cursor","pointer").attr("title",state[t].isClosed?s.tips.Open:s.tips.Close).show())}},disableClosable=function(e,t){if(isInitialized()){var i=evtPane.call(this,e),s=$Ts[i];s&&(options[i].closable=!1,state[i].isClosed&&open(i,!1,!0),s.unbind("."+sID).css("visibility",t?"hidden":"visible").css("cursor","default").attr("title",""))}},enableSlidable=function(e){if(isInitialized()){var t=evtPane.call(this,e),i=$Rs[t];i&&i.data("draggable")&&(options[t].slidable=!0,state[t].isClosed&&bindStartSlidingEvents(t,!0))}},disableSlidable=function(e){if(isInitialized()){var t=evtPane.call(this,e),i=$Rs[t];i&&(options[t].slidable=!1,state[t].isSliding?close(t,!1,!0):(bindStartSlidingEvents(t,!1),i.css("cursor","default").attr("title",""),removeHover(null,i[0])))}},enableResizable=function(e){if(isInitialized()){var t=evtPane.call(this,e),i=$Rs[t],s=options[t];i&&i.data("draggable")&&(s.resizable=!0,i.draggable("enable"),state[t].isClosed||i.css("cursor",s.resizerCursor).attr("title",s.tips.Resize))}},disableResizable=function(e){if(isInitialized()){var t=evtPane.call(this,e),i=$Rs[t];i&&i.data("draggable")&&(options[t].resizable=!1,i.draggable("disable").css("cursor","default").attr("title",""),removeHover(null,i[0]))}},swapPanes=function(e,t){function i(e){var t=$Ps[e],i=$Cs[e];return t?{pane:e,P:t?t[0]:!1,C:i?i[0]:!1,state:$.extend(!0,{},state[e]),options:$.extend(!0,{},options[e])}:!1}function s(e,t){if(e){var i,s,n=e.P,o=e.C,a=e.pane,l=_c[t],d=$.extend(!0,{},state[t]),c=options[t],u={resizerCursor:c.resizerCursor};$.each("fxName,fxSpeed,fxSettings".split(","),function(e,t){u[t+"_open"]=c[t+"_open"],u[t+"_close"]=c[t+"_close"],u[t+"_size"]=c[t+"_size"]}),$Ps[t]=$(n).data({layoutPane:Instance[t],layoutEdge:t}).css(_c.hidden).css(l.cssReq),$Cs[t]=o?$(o):!1,options[t]=$.extend(!0,{},e.options,u),state[t]=$.extend(!0,{},e.state),i=new RegExp(c.paneClass+"-"+a,"g"),n.className=n.className.replace(i,c.paneClass+"-"+t),initHandles(t),l.dir!=_c[a].dir?(s=r[t]||0,setSizeLimits(t),s=max(s,state[t].minSize),manualSizePane(t,s,!0,!0)):$Rs[t].css(l.side,sC.inset[l.side]+(state[t].isVisible?getPaneSize(t):0)),e.state.isVisible&&!d.isVisible?setAsOpen(t,!0):(setAsClosed(t),bindStartSlidingEvents(t,!0)),e=null}}if(isInitialized()){var n=evtPane.call(this,e);if(state[n].edge=t,state[t].edge=n,!1===_runCallbacks("onswap_start",n)||!1===_runCallbacks("onswap_start",t))return state[n].edge=n,void(state[t].edge=t);var o=i(n),a=i(t),r={};r[n]=o?o.state.size:0,r[t]=a?a.state.size:0,$Ps[n]=!1,$Ps[t]=!1,state[n]={},state[t]={},$Ts[n]&&$Ts[n].remove(),$Ts[t]&&$Ts[t].remove(),$Rs[n]&&$Rs[n].remove(),$Rs[t]&&$Rs[t].remove(),$Rs[n]=$Rs[t]=$Ts[n]=$Ts[t]=!1,s(o,t),s(a,n),o=a=r=null,$Ps[n]&&$Ps[n].css(_c.visible),$Ps[t]&&$Ps[t].css(_c.visible),resizeAll(),_runCallbacks("onswap_end",n),_runCallbacks("onswap_end",t)}},syncPinBtns=function(e,t){$.layout.plugins.buttons&&$.each(state[e].pins,function(i,s){$.layout.buttons.setPinState(Instance,$(s),e,t)})},$N=$(this).eq(0);if(!$N.length)return _log(options.errors.containerMissing);if($N.data("layoutContainer")&&$N.data("layout"))return $N.data("layout");var $Ps={},$Cs={},$Rs={},$Ts={},$Ms=$([]),sC=state.container,sID=state.id,Instance={options:options,state:state,container:$N,panes:$Ps,contents:$Cs,resizers:$Rs,togglers:$Ts,hide:hide,show:show,toggle:toggle,open:open,close:close,slideOpen:slideOpen,slideClose:slideClose,slideToggle:slideToggle,setSizeLimits:setSizeLimits,_sizePane:sizePane,sizePane:manualSizePane,sizeContent:sizeContent,swapPanes:swapPanes,showMasks:showMasks,hideMasks:hideMasks,initContent:initContent,addPane:addPane,removePane:removePane,createChildren:createChildren,refreshChildren:refreshChildren,enableClosable:enableClosable,disableClosable:disableClosable,enableSlidable:enableSlidable,disableSlidable:disableSlidable,enableResizable:enableResizable,disableResizable:disableResizable,allowOverflow:allowOverflow,resetOverflow:resetOverflow,destroy:destroy,initPanes:isInitialized,resizeAll:resizeAll,runCallbacks:_runCallbacks,hasParentLayout:!1,children:children,north:!1,south:!1,west:!1,east:!1,center:!1};return"cancel"===_create()?null:Instance}}(jQuery),function(e){e.layout&&(e.ui||(e.ui={}),e.ui.cookie={acceptsCookies:!!navigator.cookieEnabled,read:function(t){var i,s,n,o=document.cookie,a=o?o.split(";"):[];for(n=0;i=a[n];n++)if(s=e.trim(i).split("="),s[0]==t)return decodeURIComponent(s[1]);return null},write:function(t,i,s){var n="",o="",a=!1,r=s||{},l=r.expires||null,d=e.type(l);"date"===d?o=l:"string"===d&&l>0&&(l=parseInt(l,10),d="number"),"number"===d&&(o=new Date,l>0?o.setDate(o.getDate()+l):(o.setFullYear(1970),a=!0)),o&&(n+=";expires="+o.toUTCString()),r.path&&(n+=";path="+r.path),r.domain&&(n+=";domain="+r.domain),r.secure&&(n+=";secure"),document.cookie=t+"="+(a?"":encodeURIComponent(i))+n},clear:function(t){e.ui.cookie.write(t,"",{expires:-1})}},e.cookie||(e.cookie=function(t,i,s){var n=e.ui.cookie;if(null===i)n.clear(t);else{if(void 0===i)return n.read(t);n.write(t,i,s)}}),e.layout.plugins.stateManagement=!0,e.layout.defaults.stateManagement={enabled:!1,autoSave:!0,autoLoad:!0,animateLoad:!0,includeChildren:!0,stateKeys:"north.size,south.size,east.size,west.size,north.isClosed,south.isClosed,east.isClosed,west.isClosed,north.isHidden,south.isHidden,east.isHidden,west.isHidden",cookie:{name:"",domain:"",path:"",expires:"",secure:!1}},e.layout.optionsMap.layout.push("stateManagement"),e.layout.config.optionRootKeys.push("stateManagement"),e.layout.state={saveCookie:function(t,i,s){var n=t.options,o=n.stateManagement,a=e.extend(!0,{},o.cookie,s||null),r=t.state.stateData=t.readState(i||o.stateKeys);return e.ui.cookie.write(a.name||n.name||"Layout",e.layout.state.encodeJSON(r),a),e.extend(!0,{},r)},deleteCookie:function(t){var i=t.options;e.ui.cookie.clear(i.stateManagement.cookie.name||i.name||"Layout")},readCookie:function(t){var i=t.options,s=e.ui.cookie.read(i.stateManagement.cookie.name||i.name||"Layout");return s?e.layout.state.decodeJSON(s):{}},loadCookie:function(t){var i=e.layout.state.readCookie(t);return i&&!e.isEmptyObject(i)&&(t.state.stateData=e.extend(!0,{},i),t.loadState(i)),i},loadState:function(t,i,n){if(e.isPlainObject(i)&&!e.isEmptyObject(i)){i=t.state.stateData=e.layout.transformData(i);
var o=t.options.stateManagement;if(n=e.extend({animateLoad:!1,includeChildren:o.includeChildren},n),t.state.initialized){var a,r,l,d,c,u=!n.animateLoad;if(e.each(e.layout.config.borderPanes,function(n,o){a=i[o],e.isPlainObject(a)&&(s=a.size,r=a.initClosed,l=a.initHidden,ar=a.autoResize,d=t.state[o],c=d.isVisible,ar&&(d.autoResize=ar),c||t._sizePane(o,s,!1,!1,!1),l===!0?t.hide(o,u):r===!0?t.close(o,!1,u):r===!1?t.open(o,!1,u):l===!1&&t.show(o,!1,u),c&&t._sizePane(o,s,!1,!1,u))}),n.includeChildren){var p,g;e.each(t.children,function(t,s){p=i[t]?i[t].children:0,p&&s&&e.each(s,function(e,t){g=p[e],t&&g&&t.loadState(g)})})}}else{var a=e.extend(!0,{},i);e.each(e.layout.config.allPanes,function(e,t){a[t]&&delete a[t].children}),e.extend(!0,t.options,a)}}},readState:function(t,i){"string"===e.type(i)&&(i={keys:i}),i||(i={});var s,n,o,a,r,l,d,c=t.options.stateManagement,u=i.includeChildren,p=void 0!==u?u:c.includeChildren,g=i.stateKeys||c.stateKeys,h={isClosed:"initClosed",isHidden:"initHidden"},f=t.state,m=e.layout.config.allPanes,b={};e.isArray(g)&&(g=g.join(",")),g=g.replace(/__/g,".").split(",");for(var v=0,y=g.length;y>v;v++)s=g[v].split("."),n=s[0],o=s[1],e.inArray(n,m)<0||(a=f[n][o],void 0!=a&&("isClosed"==o&&f[n].isSliding&&(a=!0),(b[n]||(b[n]={}))[h[o]?h[o]:o]=a));return p&&e.each(m,function(i,s){l=t.children[s],r=f.stateData[s],e.isPlainObject(l)&&!e.isEmptyObject(l)&&(d=b[s]||(b[s]={}),d.children||(d.children={}),e.each(l,function(t,i){i.state.initialized?d.children[t]=e.layout.state.readState(i):r&&r.children&&r.children[t]&&(d.children[t]=e.extend(!0,{},r.children[t]))}))}),b},encodeJSON:function(t){function i(t){var i,s,n,o=[],a=0,r=e.isArray(t);for(i in t)s=t[i],n=typeof s,"string"==n?s='"'+s+'"':"object"==n&&(s=parse(s)),o[a++]=(r?"":'"'+i+'":')+s;return(r?"[":"{")+o.join(",")+(r?"]":"}")}var s=window.JSON||{};return(s.stringify||i)(t)},decodeJSON:function(t){try{return e.parseJSON?e.parseJSON(t):window.eval("("+t+")")||{}}catch(i){return{}}},_create:function(t){var i=e.layout.state,s=t.options,n=s.stateManagement;if(e.extend(t,{readCookie:function(){return i.readCookie(t)},deleteCookie:function(){i.deleteCookie(t)},saveCookie:function(e,s){return i.saveCookie(t,e,s)},loadCookie:function(){return i.loadCookie(t)},loadState:function(e,s){i.loadState(t,e,s)},readState:function(e){return i.readState(t,e)},encodeJSON:i.encodeJSON,decodeJSON:i.decodeJSON}),t.state.stateData={},n.autoLoad)if(e.isPlainObject(n.autoLoad))e.isEmptyObject(n.autoLoad)||t.loadState(n.autoLoad);else if(n.enabled)if(e.isFunction(n.autoLoad)){var o={};try{o=n.autoLoad(t,t.state,t.options,t.options.name||"")}catch(a){}o&&e.isPlainObject(o)&&!e.isEmptyObject(o)&&t.loadState(o)}else t.loadCookie()},_unload:function(t){var i=t.options.stateManagement;if(i.enabled&&i.autoSave)if(e.isFunction(i.autoSave))try{i.autoSave(t,t.state,t.options,t.options.name||"")}catch(s){}else t.saveCookie()}},e.layout.onCreate.push(e.layout.state._create),e.layout.onUnload.push(e.layout.state._unload))}(jQuery),function(e){e.layout&&(e.layout.plugins.buttons=!0,e.layout.defaults.autoBindCustomButtons=!1,e.layout.optionsMap.layout.push("autoBindCustomButtons"),e.layout.buttons={config:{borderPanes:"north,south,west,east"},init:function(t){var i,s="ui-layout-button-",n=t.options.name||"";e.each("toggle,open,close,pin,toggle-slide,open-slide".split(","),function(o,a){e.each(e.layout.buttons.config.borderPanes.split(","),function(o,r){e("."+s+a+"-"+r).each(function(){i=e(this).data("layoutName")||e(this).attr("layoutName"),(void 0==i||i===n)&&t.bindButton(this,a,r)})})})},get:function(t,i,s,n){var o=e(i),a=t.options;if(o.length&&e.layout.buttons.config.borderPanes.indexOf(s)>=0){var r=a[s].buttonClass+"-"+n;o.addClass(r+" "+r+"-"+s).data("layoutName",a.name)}return o},bind:function(t,i,s,n){var o=e.layout.buttons;switch(s.toLowerCase()){case"toggle":o.addToggle(t,i,n);break;case"open":o.addOpen(t,i,n);break;case"close":o.addClose(t,i,n);break;case"pin":o.addPin(t,i,n);break;case"toggle-slide":o.addToggle(t,i,n,!0);break;case"open-slide":o.addOpen(t,i,n,!0)}return t},addToggle:function(t,i,s,n){return e.layout.buttons.get(t,i,s,"toggle").click(function(e){t.toggle(s,!!n),e.stopPropagation()}),t},addOpen:function(t,i,s,n){return e.layout.buttons.get(t,i,s,"open").attr("title",t.options[s].tips.Open).click(function(e){t.open(s,!!n),e.stopPropagation()}),t},addClose:function(t,i,s){return e.layout.buttons.get(t,i,s,"close").attr("title",t.options[s].tips.Close).click(function(e){t.close(s),e.stopPropagation()}),t},addPin:function(t,i,s){var n=e.layout.buttons.get(t,i,s,"pin");if(n.length){var o=t.state[s];n.click(function(i){e.layout.buttons.setPinState(t,e(this),s,o.isSliding||o.isClosed),o.isSliding||o.isClosed?t.open(s):t.close(s),i.stopPropagation()}),e.layout.buttons.setPinState(t,n,s,!o.isClosed&&!o.isSliding),o.pins.push(i)}return t},setPinState:function(e,t,i,s){var n=t.attr("pin");if(!n||s!==("down"==n)){var o=e.options[i],a=o.tips,r=o.buttonClass+"-pin",l=r+"-"+i,d=r+"-up "+l+"-up",c=r+"-down "+l+"-down";t.attr("pin",s?"down":"up").attr("title",s?a.Unpin:a.Pin).removeClass(s?d:c).addClass(s?c:d)}},syncPinBtns:function(t,i,s){e.each(state[i].pins,function(n,o){e.layout.buttons.setPinState(t,e(o),i,s)})},_load:function(t){e.extend(t,{bindButton:function(i,s,n){return e.layout.buttons.bind(t,i,s,n)},addToggleBtn:function(i,s,n){return e.layout.buttons.addToggle(t,i,s,n)},addOpenBtn:function(i,s,n){return e.layout.buttons.addOpen(t,i,s,n)},addCloseBtn:function(i,s){return e.layout.buttons.addClose(t,i,s)},addPinBtn:function(i,s){return e.layout.buttons.addPin(t,i,s)}});for(var i=0;4>i;i++){var s=e.layout.buttons.config.borderPanes[i];t.state[s].pins=[]}t.options.autoBindCustomButtons&&e.layout.buttons.init(t)},_unload:function(){}},e.layout.onLoad.push(e.layout.buttons._load))}(jQuery),function(e){e.layout.plugins.browserZoom=!0,e.layout.defaults.browserZoomCheckInterval=1e3,e.layout.optionsMap.layout.push("browserZoomCheckInterval"),e.layout.browserZoom={_init:function(t){e.layout.browserZoom.ratio()!==!1&&e.layout.browserZoom._setTimer(t)},_setTimer:function(t){if(!t.destroyed){var i=t.options,s=t.state,n=t.hasParentLayout?5e3:Math.max(i.browserZoomCheckInterval,100);setTimeout(function(){if(!t.destroyed&&i.resizeWithWindow){var n=e.layout.browserZoom.ratio();n!==s.browserZoom&&(s.browserZoom=n,t.resizeAll()),e.layout.browserZoom._setTimer(t)}},n)}},ratio:function(){function t(e,t){return(parseInt(e,10)/parseInt(t,10)*100).toFixed()}var i,s,n,o=window,a=screen,r=document,l=r.documentElement||r.body,d=e.layout.browser,c=d.version;return!d.msie||c>8?!1:a.deviceXDPI&&a.systemXDPI?t(a.deviceXDPI,a.systemXDPI):d.webkit&&(i=r.body.getBoundingClientRect)?t(i.left-i.right,r.body.offsetWidth):d.webkit&&(s=o.outerWidth)?t(s,o.innerWidth):(s=a.width)&&(n=l.clientWidth)?t(s,n):!1}},e.layout.onReady.push(e.layout.browserZoom._init)}(jQuery),function(e){e.effects&&(e.layout.defaults.panes.useOffscreenClose=!1,e.layout.plugins&&(e.layout.plugins.effects.slideOffscreen=!0),e.layout.effects.slideOffscreen=e.extend(!0,{},e.layout.effects.slide),e.effects.slideOffscreen=function(t){return this.queue(function(){var i=e.effects,s=t.options,n=e(this),o=n.data("layoutEdge"),a=n.data("parentLayout").state,r=a[o].size,l=this.style,d=i.setMode(n,s.mode||"show"),c="show"==d,u=s.direction||"left",p="up"==u||"down"==u?"top":"left",g="up"==u||"left"==u,h=e.layout.config.offscreenCSS||{},f=e.layout.config.offscreenReset,m="offscreenResetTop",b={};b[p]=(c?g?"+=":"-=":g?"-=":"+=")+r,c?(n.data(m,{top:l.top,bottom:l.bottom}),g?n.css(p,isNaN(r)?"-"+r:-r):n.css("right"===u?{left:a.container.layoutWidth,right:"auto"}:{top:a.container.layoutHeight,bottom:"auto"}),"top"===p&&n.css(n.data(f)||{})):(n.data(m,{top:l.top,bottom:l.bottom}),n.data(f,{left:l.left,right:l.right})),n.show().animate(b,{queue:!1,duration:t.duration,easing:s.easing,complete:function(){n.data(m)&&n.css(n.data(m)).removeData(m),c?n.css(n.data(f)||{}).removeData(f):n.css(h),t.callback&&t.callback.apply(this,arguments),n.dequeue()}})})})}(jQuery);
        
                           
                                    
/*! jQuery UI - v1.11.2 - 2014-11-09
* http://jqueryui.com
* Includes: core.js, widget.js, mouse.js, position.js, draggable.js, droppable.js, resizable.js, selectable.js, sortable.js, accordion.js, autocomplete.js, button.js, datepicker.js, dialog.js, menu.js, progressbar.js, selectmenu.js, slider.js, spinner.js, tabs.js, tooltip.js, effect.js, effect-blind.js, effect-bounce.js, effect-clip.js, effect-drop.js, effect-explode.js, effect-fade.js, effect-fold.js, effect-highlight.js, effect-puff.js, effect-pulsate.js, effect-scale.js, effect-shake.js, effect-size.js, effect-slide.js, effect-transfer.js
* Copyright 2014 jQuery Foundation and other contributors; Licensed MIT */

(function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)})(function(e){function t(t,s){var n,a,o,r=t.nodeName.toLowerCase();return"area"===r?(n=t.parentNode,a=n.name,t.href&&a&&"map"===n.nodeName.toLowerCase()?(o=e("img[usemap='#"+a+"']")[0],!!o&&i(o)):!1):(/input|select|textarea|button|object/.test(r)?!t.disabled:"a"===r?t.href||s:s)&&i(t)}function i(t){return e.expr.filters.visible(t)&&!e(t).parents().addBack().filter(function(){return"hidden"===e.css(this,"visibility")}).length}function s(e){for(var t,i;e.length&&e[0]!==document;){if(t=e.css("position"),("absolute"===t||"relative"===t||"fixed"===t)&&(i=parseInt(e.css("zIndex"),10),!isNaN(i)&&0!==i))return i;e=e.parent()}return 0}function n(){this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},e.extend(this._defaults,this.regional[""]),this.regional.en=e.extend(!0,{},this.regional[""]),this.regional["en-US"]=e.extend(!0,{},this.regional.en),this.dpDiv=a(e("<div id='"+this._mainDivId+"' class='ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>"))}function a(t){var i="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return t.delegate(i,"mouseout",function(){e(this).removeClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).removeClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).removeClass("ui-datepicker-next-hover")}).delegate(i,"mouseover",o)}function o(){e.datepicker._isDisabledDatepicker(v.inline?v.dpDiv.parent()[0]:v.input[0])||(e(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),e(this).addClass("ui-state-hover"),-1!==this.className.indexOf("ui-datepicker-prev")&&e(this).addClass("ui-datepicker-prev-hover"),-1!==this.className.indexOf("ui-datepicker-next")&&e(this).addClass("ui-datepicker-next-hover"))}function r(t,i){e.extend(t,i);for(var s in i)null==i[s]&&(t[s]=i[s]);return t}function h(e){return function(){var t=this.element.val();e.apply(this,arguments),this._refresh(),t!==this.element.val()&&this._trigger("change")}}e.ui=e.ui||{},e.extend(e.ui,{version:"1.11.2",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),e.fn.extend({scrollParent:function(t){var i=this.css("position"),s="absolute"===i,n=t?/(auto|scroll|hidden)/:/(auto|scroll)/,a=this.parents().filter(function(){var t=e(this);return s&&"static"===t.css("position")?!1:n.test(t.css("overflow")+t.css("overflow-y")+t.css("overflow-x"))}).eq(0);return"fixed"!==i&&a.length?a:e(this[0].ownerDocument||document)},uniqueId:function(){var e=0;return function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++e)})}}(),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&e(this).removeAttr("id")})}}),e.extend(e.expr[":"],{data:e.expr.createPseudo?e.expr.createPseudo(function(t){return function(i){return!!e.data(i,t)}}):function(t,i,s){return!!e.data(t,s[3])},focusable:function(i){return t(i,!isNaN(e.attr(i,"tabindex")))},tabbable:function(i){var s=e.attr(i,"tabindex"),n=isNaN(s);return(n||s>=0)&&t(i,!n)}}),e("<a>").outerWidth(1).jquery||e.each(["Width","Height"],function(t,i){function s(t,i,s,a){return e.each(n,function(){i-=parseFloat(e.css(t,"padding"+this))||0,s&&(i-=parseFloat(e.css(t,"border"+this+"Width"))||0),a&&(i-=parseFloat(e.css(t,"margin"+this))||0)}),i}var n="Width"===i?["Left","Right"]:["Top","Bottom"],a=i.toLowerCase(),o={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+i]=function(t){return void 0===t?o["inner"+i].call(this):this.each(function(){e(this).css(a,s(this,t)+"px")})},e.fn["outer"+i]=function(t,n){return"number"!=typeof t?o["outer"+i].call(this,t):this.each(function(){e(this).css(a,s(this,t,!0,n)+"px")})}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(e.fn.removeData=function(t){return function(i){return arguments.length?t.call(this,e.camelCase(i)):t.call(this)}}(e.fn.removeData)),e.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),e.fn.extend({focus:function(t){return function(i,s){return"number"==typeof i?this.each(function(){var t=this;setTimeout(function(){e(t).focus(),s&&s.call(t)},i)}):t.apply(this,arguments)}}(e.fn.focus),disableSelection:function(){var e="onselectstart"in document.createElement("div")?"selectstart":"mousedown";return function(){return this.bind(e+".ui-disableSelection",function(e){e.preventDefault()})}}(),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(t){if(void 0!==t)return this.css("zIndex",t);if(this.length)for(var i,s,n=e(this[0]);n.length&&n[0]!==document;){if(i=n.css("position"),("absolute"===i||"relative"===i||"fixed"===i)&&(s=parseInt(n.css("zIndex"),10),!isNaN(s)&&0!==s))return s;n=n.parent()}return 0}}),e.ui.plugin={add:function(t,i,s){var n,a=e.ui[t].prototype;for(n in s)a.plugins[n]=a.plugins[n]||[],a.plugins[n].push([i,s[n]])},call:function(e,t,i,s){var n,a=e.plugins[t];if(a&&(s||e.element[0].parentNode&&11!==e.element[0].parentNode.nodeType))for(n=0;a.length>n;n++)e.options[a[n][0]]&&a[n][1].apply(e.element,i)}};var l=0,u=Array.prototype.slice;e.cleanData=function(t){return function(i){var s,n,a;for(a=0;null!=(n=i[a]);a++)try{s=e._data(n,"events"),s&&s.remove&&e(n).triggerHandler("remove")}catch(o){}t(i)}}(e.cleanData),e.widget=function(t,i,s){var n,a,o,r,h={},l=t.split(".")[0];return t=t.split(".")[1],n=l+"-"+t,s||(s=i,i=e.Widget),e.expr[":"][n.toLowerCase()]=function(t){return!!e.data(t,n)},e[l]=e[l]||{},a=e[l][t],o=e[l][t]=function(e,t){return this._createWidget?(arguments.length&&this._createWidget(e,t),void 0):new o(e,t)},e.extend(o,a,{version:s.version,_proto:e.extend({},s),_childConstructors:[]}),r=new i,r.options=e.widget.extend({},r.options),e.each(s,function(t,s){return e.isFunction(s)?(h[t]=function(){var e=function(){return i.prototype[t].apply(this,arguments)},n=function(e){return i.prototype[t].apply(this,e)};return function(){var t,i=this._super,a=this._superApply;return this._super=e,this._superApply=n,t=s.apply(this,arguments),this._super=i,this._superApply=a,t}}(),void 0):(h[t]=s,void 0)}),o.prototype=e.widget.extend(r,{widgetEventPrefix:a?r.widgetEventPrefix||t:t},h,{constructor:o,namespace:l,widgetName:t,widgetFullName:n}),a?(e.each(a._childConstructors,function(t,i){var s=i.prototype;e.widget(s.namespace+"."+s.widgetName,o,i._proto)}),delete a._childConstructors):i._childConstructors.push(o),e.widget.bridge(t,o),o},e.widget.extend=function(t){for(var i,s,n=u.call(arguments,1),a=0,o=n.length;o>a;a++)for(i in n[a])s=n[a][i],n[a].hasOwnProperty(i)&&void 0!==s&&(t[i]=e.isPlainObject(s)?e.isPlainObject(t[i])?e.widget.extend({},t[i],s):e.widget.extend({},s):s);return t},e.widget.bridge=function(t,i){var s=i.prototype.widgetFullName||t;e.fn[t]=function(n){var a="string"==typeof n,o=u.call(arguments,1),r=this;return n=!a&&o.length?e.widget.extend.apply(null,[n].concat(o)):n,a?this.each(function(){var i,a=e.data(this,s);return"instance"===n?(r=a,!1):a?e.isFunction(a[n])&&"_"!==n.charAt(0)?(i=a[n].apply(a,o),i!==a&&void 0!==i?(r=i&&i.jquery?r.pushStack(i.get()):i,!1):void 0):e.error("no such method '"+n+"' for "+t+" widget instance"):e.error("cannot call methods on "+t+" prior to initialization; "+"attempted to call method '"+n+"'")}):this.each(function(){var t=e.data(this,s);t?(t.option(n||{}),t._init&&t._init()):e.data(this,s,new i(n,this))}),r}},e.Widget=function(){},e.Widget._childConstructors=[],e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:!1,create:null},_createWidget:function(t,i){i=e(i||this.defaultElement||this)[0],this.element=e(i),this.uuid=l++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=e(),this.hoverable=e(),this.focusable=e(),i!==this&&(e.data(i,this.widgetFullName,this),this._on(!0,this.element,{remove:function(e){e.target===i&&this.destroy()}}),this.document=e(i.style?i.ownerDocument:i.document||i),this.window=e(this.document[0].defaultView||this.document[0].parentWindow)),this.options=e.widget.extend({},this.options,this._getCreateOptions(),t),this._create(),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:e.noop,_getCreateEventData:e.noop,_create:e.noop,_init:e.noop,destroy:function(){this._destroy(),this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(e.camelCase(this.widgetFullName)),this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled "+"ui-state-disabled"),this.bindings.unbind(this.eventNamespace),this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus")},_destroy:e.noop,widget:function(){return this.element},option:function(t,i){var s,n,a,o=t;if(0===arguments.length)return e.widget.extend({},this.options);if("string"==typeof t)if(o={},s=t.split("."),t=s.shift(),s.length){for(n=o[t]=e.widget.extend({},this.options[t]),a=0;s.length-1>a;a++)n[s[a]]=n[s[a]]||{},n=n[s[a]];if(t=s.pop(),1===arguments.length)return void 0===n[t]?null:n[t];n[t]=i}else{if(1===arguments.length)return void 0===this.options[t]?null:this.options[t];o[t]=i}return this._setOptions(o),this},_setOptions:function(e){var t;for(t in e)this._setOption(t,e[t]);return this},_setOption:function(e,t){return this.options[e]=t,"disabled"===e&&(this.widget().toggleClass(this.widgetFullName+"-disabled",!!t),t&&(this.hoverable.removeClass("ui-state-hover"),this.focusable.removeClass("ui-state-focus"))),this},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_on:function(t,i,s){var n,a=this;"boolean"!=typeof t&&(s=i,i=t,t=!1),s?(i=n=e(i),this.bindings=this.bindings.add(i)):(s=i,i=this.element,n=this.widget()),e.each(s,function(s,o){function r(){return t||a.options.disabled!==!0&&!e(this).hasClass("ui-state-disabled")?("string"==typeof o?a[o]:o).apply(a,arguments):void 0}"string"!=typeof o&&(r.guid=o.guid=o.guid||r.guid||e.guid++);var h=s.match(/^([\w:-]*)\s*(.*)$/),l=h[1]+a.eventNamespace,u=h[2];u?n.delegate(u,l,r):i.bind(l,r)})},_off:function(t,i){i=(i||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,t.unbind(i).undelegate(i),this.bindings=e(this.bindings.not(t).get()),this.focusable=e(this.focusable.not(t).get()),this.hoverable=e(this.hoverable.not(t).get())},_delay:function(e,t){function i(){return("string"==typeof e?s[e]:e).apply(s,arguments)}var s=this;return setTimeout(i,t||0)},_hoverable:function(t){this.hoverable=this.hoverable.add(t),this._on(t,{mouseenter:function(t){e(t.currentTarget).addClass("ui-state-hover")},mouseleave:function(t){e(t.currentTarget).removeClass("ui-state-hover")}})},_focusable:function(t){this.focusable=this.focusable.add(t),this._on(t,{focusin:function(t){e(t.currentTarget).addClass("ui-state-focus")},focusout:function(t){e(t.currentTarget).removeClass("ui-state-focus")}})},_trigger:function(t,i,s){var n,a,o=this.options[t];if(s=s||{},i=e.Event(i),i.type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase(),i.target=this.element[0],a=i.originalEvent)for(n in a)n in i||(i[n]=a[n]);return this.element.trigger(i,s),!(e.isFunction(o)&&o.apply(this.element[0],[i].concat(s))===!1||i.isDefaultPrevented())}},e.each({show:"fadeIn",hide:"fadeOut"},function(t,i){e.Widget.prototype["_"+t]=function(s,n,a){"string"==typeof n&&(n={effect:n});var o,r=n?n===!0||"number"==typeof n?i:n.effect||i:t;n=n||{},"number"==typeof n&&(n={duration:n}),o=!e.isEmptyObject(n),n.complete=a,n.delay&&s.delay(n.delay),o&&e.effects&&e.effects.effect[r]?s[t](n):r!==t&&s[r]?s[r](n.duration,n.easing,a):s.queue(function(i){e(this)[t](),a&&a.call(s[0]),i()})}}),e.widget;var d=!1;e(document).mouseup(function(){d=!1}),e.widget("ui.mouse",{version:"1.11.2",options:{cancel:"input,textarea,button,select,option",distance:1,delay:0},_mouseInit:function(){var t=this;this.element.bind("mousedown."+this.widgetName,function(e){return t._mouseDown(e)}).bind("click."+this.widgetName,function(i){return!0===e.data(i.target,t.widgetName+".preventClickEvent")?(e.removeData(i.target,t.widgetName+".preventClickEvent"),i.stopImmediatePropagation(),!1):void 0}),this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName),this._mouseMoveDelegate&&this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(t){if(!d){this._mouseMoved=!1,this._mouseStarted&&this._mouseUp(t),this._mouseDownEvent=t;var i=this,s=1===t.which,n="string"==typeof this.options.cancel&&t.target.nodeName?e(t.target).closest(this.options.cancel).length:!1;return s&&!n&&this._mouseCapture(t)?(this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){i.mouseDelayMet=!0},this.options.delay)),this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(t)!==!1,!this._mouseStarted)?(t.preventDefault(),!0):(!0===e.data(t.target,this.widgetName+".preventClickEvent")&&e.removeData(t.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(e){return i._mouseMove(e)},this._mouseUpDelegate=function(e){return i._mouseUp(e)},this.document.bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate),t.preventDefault(),d=!0,!0)):!0}},_mouseMove:function(t){if(this._mouseMoved){if(e.ui.ie&&(!document.documentMode||9>document.documentMode)&&!t.button)return this._mouseUp(t);if(!t.which)return this._mouseUp(t)}return(t.which||t.button)&&(this._mouseMoved=!0),this._mouseStarted?(this._mouseDrag(t),t.preventDefault()):(this._mouseDistanceMet(t)&&this._mouseDelayMet(t)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,t)!==!1,this._mouseStarted?this._mouseDrag(t):this._mouseUp(t)),!this._mouseStarted)},_mouseUp:function(t){return this.document.unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,t.target===this._mouseDownEvent.target&&e.data(t.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(t)),d=!1,!1},_mouseDistanceMet:function(e){return Math.max(Math.abs(this._mouseDownEvent.pageX-e.pageX),Math.abs(this._mouseDownEvent.pageY-e.pageY))>=this.options.distance},_mouseDelayMet:function(){return this.mouseDelayMet},_mouseStart:function(){},_mouseDrag:function(){},_mouseStop:function(){},_mouseCapture:function(){return!0}}),function(){function t(e,t,i){return[parseFloat(e[0])*(p.test(e[0])?t/100:1),parseFloat(e[1])*(p.test(e[1])?i/100:1)]}function i(t,i){return parseInt(e.css(t,i),10)||0}function s(t){var i=t[0];return 9===i.nodeType?{width:t.width(),height:t.height(),offset:{top:0,left:0}}:e.isWindow(i)?{width:t.width(),height:t.height(),offset:{top:t.scrollTop(),left:t.scrollLeft()}}:i.preventDefault?{width:0,height:0,offset:{top:i.pageY,left:i.pageX}}:{width:t.outerWidth(),height:t.outerHeight(),offset:t.offset()}}e.ui=e.ui||{};var n,a,o=Math.max,r=Math.abs,h=Math.round,l=/left|center|right/,u=/top|center|bottom/,d=/[\+\-]\d+(\.[\d]+)?%?/,c=/^\w+/,p=/%$/,f=e.fn.position;e.position={scrollbarWidth:function(){if(void 0!==n)return n;var t,i,s=e("<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),a=s.children()[0];return e("body").append(s),t=a.offsetWidth,s.css("overflow","scroll"),i=a.offsetWidth,t===i&&(i=s[0].clientWidth),s.remove(),n=t-i},getScrollInfo:function(t){var i=t.isWindow||t.isDocument?"":t.element.css("overflow-x"),s=t.isWindow||t.isDocument?"":t.element.css("overflow-y"),n="scroll"===i||"auto"===i&&t.width<t.element[0].scrollWidth,a="scroll"===s||"auto"===s&&t.height<t.element[0].scrollHeight;return{width:a?e.position.scrollbarWidth():0,height:n?e.position.scrollbarWidth():0}},getWithinInfo:function(t){var i=e(t||window),s=e.isWindow(i[0]),n=!!i[0]&&9===i[0].nodeType;return{element:i,isWindow:s,isDocument:n,offset:i.offset()||{left:0,top:0},scrollLeft:i.scrollLeft(),scrollTop:i.scrollTop(),width:s||n?i.width():i.outerWidth(),height:s||n?i.height():i.outerHeight()}}},e.fn.position=function(n){if(!n||!n.of)return f.apply(this,arguments);n=e.extend({},n);var p,m,g,v,y,b,_=e(n.of),x=e.position.getWithinInfo(n.within),w=e.position.getScrollInfo(x),k=(n.collision||"flip").split(" "),T={};return b=s(_),_[0].preventDefault&&(n.at="left top"),m=b.width,g=b.height,v=b.offset,y=e.extend({},v),e.each(["my","at"],function(){var e,t,i=(n[this]||"").split(" ");1===i.length&&(i=l.test(i[0])?i.concat(["center"]):u.test(i[0])?["center"].concat(i):["center","center"]),i[0]=l.test(i[0])?i[0]:"center",i[1]=u.test(i[1])?i[1]:"center",e=d.exec(i[0]),t=d.exec(i[1]),T[this]=[e?e[0]:0,t?t[0]:0],n[this]=[c.exec(i[0])[0],c.exec(i[1])[0]]}),1===k.length&&(k[1]=k[0]),"right"===n.at[0]?y.left+=m:"center"===n.at[0]&&(y.left+=m/2),"bottom"===n.at[1]?y.top+=g:"center"===n.at[1]&&(y.top+=g/2),p=t(T.at,m,g),y.left+=p[0],y.top+=p[1],this.each(function(){var s,l,u=e(this),d=u.outerWidth(),c=u.outerHeight(),f=i(this,"marginLeft"),b=i(this,"marginTop"),D=d+f+i(this,"marginRight")+w.width,S=c+b+i(this,"marginBottom")+w.height,M=e.extend({},y),C=t(T.my,u.outerWidth(),u.outerHeight());"right"===n.my[0]?M.left-=d:"center"===n.my[0]&&(M.left-=d/2),"bottom"===n.my[1]?M.top-=c:"center"===n.my[1]&&(M.top-=c/2),M.left+=C[0],M.top+=C[1],a||(M.left=h(M.left),M.top=h(M.top)),s={marginLeft:f,marginTop:b},e.each(["left","top"],function(t,i){e.ui.position[k[t]]&&e.ui.position[k[t]][i](M,{targetWidth:m,targetHeight:g,elemWidth:d,elemHeight:c,collisionPosition:s,collisionWidth:D,collisionHeight:S,offset:[p[0]+C[0],p[1]+C[1]],my:n.my,at:n.at,within:x,elem:u})}),n.using&&(l=function(e){var t=v.left-M.left,i=t+m-d,s=v.top-M.top,a=s+g-c,h={target:{element:_,left:v.left,top:v.top,width:m,height:g},element:{element:u,left:M.left,top:M.top,width:d,height:c},horizontal:0>i?"left":t>0?"right":"center",vertical:0>a?"top":s>0?"bottom":"middle"};d>m&&m>r(t+i)&&(h.horizontal="center"),c>g&&g>r(s+a)&&(h.vertical="middle"),h.important=o(r(t),r(i))>o(r(s),r(a))?"horizontal":"vertical",n.using.call(this,e,h)}),u.offset(e.extend(M,{using:l}))})},e.ui.position={fit:{left:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollLeft:s.offset.left,a=s.width,r=e.left-t.collisionPosition.marginLeft,h=n-r,l=r+t.collisionWidth-a-n;t.collisionWidth>a?h>0&&0>=l?(i=e.left+h+t.collisionWidth-a-n,e.left+=h-i):e.left=l>0&&0>=h?n:h>l?n+a-t.collisionWidth:n:h>0?e.left+=h:l>0?e.left-=l:e.left=o(e.left-r,e.left)},top:function(e,t){var i,s=t.within,n=s.isWindow?s.scrollTop:s.offset.top,a=t.within.height,r=e.top-t.collisionPosition.marginTop,h=n-r,l=r+t.collisionHeight-a-n;t.collisionHeight>a?h>0&&0>=l?(i=e.top+h+t.collisionHeight-a-n,e.top+=h-i):e.top=l>0&&0>=h?n:h>l?n+a-t.collisionHeight:n:h>0?e.top+=h:l>0?e.top-=l:e.top=o(e.top-r,e.top)}},flip:{left:function(e,t){var i,s,n=t.within,a=n.offset.left+n.scrollLeft,o=n.width,h=n.isWindow?n.scrollLeft:n.offset.left,l=e.left-t.collisionPosition.marginLeft,u=l-h,d=l+t.collisionWidth-o-h,c="left"===t.my[0]?-t.elemWidth:"right"===t.my[0]?t.elemWidth:0,p="left"===t.at[0]?t.targetWidth:"right"===t.at[0]?-t.targetWidth:0,f=-2*t.offset[0];0>u?(i=e.left+c+p+f+t.collisionWidth-o-a,(0>i||r(u)>i)&&(e.left+=c+p+f)):d>0&&(s=e.left-t.collisionPosition.marginLeft+c+p+f-h,(s>0||d>r(s))&&(e.left+=c+p+f))},top:function(e,t){var i,s,n=t.within,a=n.offset.top+n.scrollTop,o=n.height,h=n.isWindow?n.scrollTop:n.offset.top,l=e.top-t.collisionPosition.marginTop,u=l-h,d=l+t.collisionHeight-o-h,c="top"===t.my[1],p=c?-t.elemHeight:"bottom"===t.my[1]?t.elemHeight:0,f="top"===t.at[1]?t.targetHeight:"bottom"===t.at[1]?-t.targetHeight:0,m=-2*t.offset[1];0>u?(s=e.top+p+f+m+t.collisionHeight-o-a,e.top+p+f+m>u&&(0>s||r(u)>s)&&(e.top+=p+f+m)):d>0&&(i=e.top-t.collisionPosition.marginTop+p+f+m-h,e.top+p+f+m>d&&(i>0||d>r(i))&&(e.top+=p+f+m))}},flipfit:{left:function(){e.ui.position.flip.left.apply(this,arguments),e.ui.position.fit.left.apply(this,arguments)},top:function(){e.ui.position.flip.top.apply(this,arguments),e.ui.position.fit.top.apply(this,arguments)}}},function(){var t,i,s,n,o,r=document.getElementsByTagName("body")[0],h=document.createElement("div");t=document.createElement(r?"div":"body"),s={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"},r&&e.extend(s,{position:"absolute",left:"-1000px",top:"-1000px"});for(o in s)t.style[o]=s[o];t.appendChild(h),i=r||document.documentElement,i.insertBefore(t,i.firstChild),h.style.cssText="position: absolute; left: 10.7432222px;",n=e(h).offset().left,a=n>10&&11>n,t.innerHTML="",i.removeChild(t)}()}(),e.ui.position,e.widget("ui.draggable",e.ui.mouse,{version:"1.11.2",widgetEventPrefix:"drag",options:{addClasses:!0,appendTo:"parent",axis:!1,connectToSortable:!1,containment:!1,cursor:"auto",cursorAt:!1,grid:!1,handle:!1,helper:"original",iframeFix:!1,opacity:!1,refreshPositions:!1,revert:!1,revertDuration:500,scope:"default",scroll:!0,scrollSensitivity:20,scrollSpeed:20,snap:!1,snapMode:"both",snapTolerance:20,stack:!1,zIndex:!1,drag:null,start:null,stop:null},_create:function(){"original"===this.options.helper&&this._setPositionRelative(),this.options.addClasses&&this.element.addClass("ui-draggable"),this.options.disabled&&this.element.addClass("ui-draggable-disabled"),this._setHandleClassName(),this._mouseInit()},_setOption:function(e,t){this._super(e,t),"handle"===e&&(this._removeHandleClassName(),this._setHandleClassName())},_destroy:function(){return(this.helper||this.element).is(".ui-draggable-dragging")?(this.destroyOnClear=!0,void 0):(this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"),this._removeHandleClassName(),this._mouseDestroy(),void 0)},_mouseCapture:function(t){var i=this.options;return this._blurActiveElement(t),this.helper||i.disabled||e(t.target).closest(".ui-resizable-handle").length>0?!1:(this.handle=this._getHandle(t),this.handle?(this._blockFrames(i.iframeFix===!0?"iframe":i.iframeFix),!0):!1)},_blockFrames:function(t){this.iframeBlocks=this.document.find(t).map(function(){var t=e(this);return e("<div>").css("position","absolute").appendTo(t.parent()).outerWidth(t.outerWidth()).outerHeight(t.outerHeight()).offset(t.offset())[0]})},_unblockFrames:function(){this.iframeBlocks&&(this.iframeBlocks.remove(),delete this.iframeBlocks)},_blurActiveElement:function(t){var i=this.document[0];if(this.handleElement.is(t.target))try{i.activeElement&&"body"!==i.activeElement.nodeName.toLowerCase()&&e(i.activeElement).blur()}catch(s){}},_mouseStart:function(t){var i=this.options;return this.helper=this._createHelper(t),this.helper.addClass("ui-draggable-dragging"),this._cacheHelperProportions(),e.ui.ddmanager&&(e.ui.ddmanager.current=this),this._cacheMargins(),this.cssPosition=this.helper.css("position"),this.scrollParent=this.helper.scrollParent(!0),this.offsetParent=this.helper.offsetParent(),this.hasFixedAncestor=this.helper.parents().filter(function(){return"fixed"===e(this).css("position")}).length>0,this.positionAbs=this.element.offset(),this._refreshOffsets(t),this.originalPosition=this.position=this._generatePosition(t,!1),this.originalPageX=t.pageX,this.originalPageY=t.pageY,i.cursorAt&&this._adjustOffsetFromHelper(i.cursorAt),this._setContainment(),this._trigger("start",t)===!1?(this._clear(),!1):(this._cacheHelperProportions(),e.ui.ddmanager&&!i.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t),this._normalizeRightBottom(),this._mouseDrag(t,!0),e.ui.ddmanager&&e.ui.ddmanager.dragStart(this,t),!0)},_refreshOffsets:function(e){this.offset={top:this.positionAbs.top-this.margins.top,left:this.positionAbs.left-this.margins.left,scroll:!1,parent:this._getParentOffset(),relative:this._getRelativeOffset()},this.offset.click={left:e.pageX-this.offset.left,top:e.pageY-this.offset.top}},_mouseDrag:function(t,i){if(this.hasFixedAncestor&&(this.offset.parent=this._getParentOffset()),this.position=this._generatePosition(t,!0),this.positionAbs=this._convertPositionTo("absolute"),!i){var s=this._uiHash();if(this._trigger("drag",t,s)===!1)return this._mouseUp({}),!1;this.position=s.position}return this.helper[0].style.left=this.position.left+"px",this.helper[0].style.top=this.position.top+"px",e.ui.ddmanager&&e.ui.ddmanager.drag(this,t),!1},_mouseStop:function(t){var i=this,s=!1;return e.ui.ddmanager&&!this.options.dropBehaviour&&(s=e.ui.ddmanager.drop(this,t)),this.dropped&&(s=this.dropped,this.dropped=!1),"invalid"===this.options.revert&&!s||"valid"===this.options.revert&&s||this.options.revert===!0||e.isFunction(this.options.revert)&&this.options.revert.call(this.element,s)?e(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){i._trigger("stop",t)!==!1&&i._clear()}):this._trigger("stop",t)!==!1&&this._clear(),!1},_mouseUp:function(t){return this._unblockFrames(),e.ui.ddmanager&&e.ui.ddmanager.dragStop(this,t),this.handleElement.is(t.target)&&this.element.focus(),e.ui.mouse.prototype._mouseUp.call(this,t)},cancel:function(){return this.helper.is(".ui-draggable-dragging")?this._mouseUp({}):this._clear(),this},_getHandle:function(t){return this.options.handle?!!e(t.target).closest(this.element.find(this.options.handle)).length:!0},_setHandleClassName:function(){this.handleElement=this.options.handle?this.element.find(this.options.handle):this.element,this.handleElement.addClass("ui-draggable-handle")},_removeHandleClassName:function(){this.handleElement.removeClass("ui-draggable-handle")},_createHelper:function(t){var i=this.options,s=e.isFunction(i.helper),n=s?e(i.helper.apply(this.element[0],[t])):"clone"===i.helper?this.element.clone().removeAttr("id"):this.element;return n.parents("body").length||n.appendTo("parent"===i.appendTo?this.element[0].parentNode:i.appendTo),s&&n[0]===this.element[0]&&this._setPositionRelative(),n[0]===this.element[0]||/(fixed|absolute)/.test(n.css("position"))||n.css("position","absolute"),n},_setPositionRelative:function(){/^(?:r|a|f)/.test(this.element.css("position"))||(this.element[0].style.position="relative")},_adjustOffsetFromHelper:function(t){"string"==typeof t&&(t=t.split(" ")),e.isArray(t)&&(t={left:+t[0],top:+t[1]||0}),"left"in t&&(this.offset.click.left=t.left+this.margins.left),"right"in t&&(this.offset.click.left=this.helperProportions.width-t.right+this.margins.left),"top"in t&&(this.offset.click.top=t.top+this.margins.top),"bottom"in t&&(this.offset.click.top=this.helperProportions.height-t.bottom+this.margins.top)},_isRootNode:function(e){return/(html|body)/i.test(e.tagName)||e===this.document[0]},_getParentOffset:function(){var t=this.offsetParent.offset(),i=this.document[0];return"absolute"===this.cssPosition&&this.scrollParent[0]!==i&&e.contains(this.scrollParent[0],this.offsetParent[0])&&(t.left+=this.scrollParent.scrollLeft(),t.top+=this.scrollParent.scrollTop()),this._isRootNode(this.offsetParent[0])&&(t={top:0,left:0}),{top:t.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:t.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"!==this.cssPosition)return{top:0,left:0};var e=this.element.position(),t=this._isRootNode(this.scrollParent[0]);return{top:e.top-(parseInt(this.helper.css("top"),10)||0)+(t?0:this.scrollParent.scrollTop()),left:e.left-(parseInt(this.helper.css("left"),10)||0)+(t?0:this.scrollParent.scrollLeft())}},_cacheMargins:function(){this.margins={left:parseInt(this.element.css("marginLeft"),10)||0,top:parseInt(this.element.css("marginTop"),10)||0,right:parseInt(this.element.css("marginRight"),10)||0,bottom:parseInt(this.element.css("marginBottom"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var t,i,s,n=this.options,a=this.document[0];return this.relativeContainer=null,n.containment?"window"===n.containment?(this.containment=[e(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,e(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,e(window).scrollLeft()+e(window).width()-this.helperProportions.width-this.margins.left,e(window).scrollTop()+(e(window).height()||a.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):"document"===n.containment?(this.containment=[0,0,e(a).width()-this.helperProportions.width-this.margins.left,(e(a).height()||a.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top],void 0):n.containment.constructor===Array?(this.containment=n.containment,void 0):("parent"===n.containment&&(n.containment=this.helper[0].parentNode),i=e(n.containment),s=i[0],s&&(t=/(scroll|auto)/.test(i.css("overflow")),this.containment=[(parseInt(i.css("borderLeftWidth"),10)||0)+(parseInt(i.css("paddingLeft"),10)||0),(parseInt(i.css("borderTopWidth"),10)||0)+(parseInt(i.css("paddingTop"),10)||0),(t?Math.max(s.scrollWidth,s.offsetWidth):s.offsetWidth)-(parseInt(i.css("borderRightWidth"),10)||0)-(parseInt(i.css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(t?Math.max(s.scrollHeight,s.offsetHeight):s.offsetHeight)-(parseInt(i.css("borderBottomWidth"),10)||0)-(parseInt(i.css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom],this.relativeContainer=i),void 0):(this.containment=null,void 0)},_convertPositionTo:function(e,t){t||(t=this.position);var i="absolute"===e?1:-1,s=this._isRootNode(this.scrollParent[0]);return{top:t.top+this.offset.relative.top*i+this.offset.parent.top*i-("fixed"===this.cssPosition?-this.offset.scroll.top:s?0:this.offset.scroll.top)*i,left:t.left+this.offset.relative.left*i+this.offset.parent.left*i-("fixed"===this.cssPosition?-this.offset.scroll.left:s?0:this.offset.scroll.left)*i}},_generatePosition:function(e,t){var i,s,n,a,o=this.options,r=this._isRootNode(this.scrollParent[0]),h=e.pageX,l=e.pageY;return r&&this.offset.scroll||(this.offset.scroll={top:this.scrollParent.scrollTop(),left:this.scrollParent.scrollLeft()}),t&&(this.containment&&(this.relativeContainer?(s=this.relativeContainer.offset(),i=[this.containment[0]+s.left,this.containment[1]+s.top,this.containment[2]+s.left,this.containment[3]+s.top]):i=this.containment,e.pageX-this.offset.click.left<i[0]&&(h=i[0]+this.offset.click.left),e.pageY-this.offset.click.top<i[1]&&(l=i[1]+this.offset.click.top),e.pageX-this.offset.click.left>i[2]&&(h=i[2]+this.offset.click.left),e.pageY-this.offset.click.top>i[3]&&(l=i[3]+this.offset.click.top)),o.grid&&(n=o.grid[1]?this.originalPageY+Math.round((l-this.originalPageY)/o.grid[1])*o.grid[1]:this.originalPageY,l=i?n-this.offset.click.top>=i[1]||n-this.offset.click.top>i[3]?n:n-this.offset.click.top>=i[1]?n-o.grid[1]:n+o.grid[1]:n,a=o.grid[0]?this.originalPageX+Math.round((h-this.originalPageX)/o.grid[0])*o.grid[0]:this.originalPageX,h=i?a-this.offset.click.left>=i[0]||a-this.offset.click.left>i[2]?a:a-this.offset.click.left>=i[0]?a-o.grid[0]:a+o.grid[0]:a),"y"===o.axis&&(h=this.originalPageX),"x"===o.axis&&(l=this.originalPageY)),{top:l-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.offset.scroll.top:r?0:this.offset.scroll.top),left:h-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.offset.scroll.left:r?0:this.offset.scroll.left)}
},_clear:function(){this.helper.removeClass("ui-draggable-dragging"),this.helper[0]===this.element[0]||this.cancelHelperRemoval||this.helper.remove(),this.helper=null,this.cancelHelperRemoval=!1,this.destroyOnClear&&this.destroy()},_normalizeRightBottom:function(){"y"!==this.options.axis&&"auto"!==this.helper.css("right")&&(this.helper.width(this.helper.width()),this.helper.css("right","auto")),"x"!==this.options.axis&&"auto"!==this.helper.css("bottom")&&(this.helper.height(this.helper.height()),this.helper.css("bottom","auto"))},_trigger:function(t,i,s){return s=s||this._uiHash(),e.ui.plugin.call(this,t,[i,s,this],!0),/^(drag|start|stop)/.test(t)&&(this.positionAbs=this._convertPositionTo("absolute"),s.offset=this.positionAbs),e.Widget.prototype._trigger.call(this,t,i,s)},plugins:{},_uiHash:function(){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}}}),e.ui.plugin.add("draggable","connectToSortable",{start:function(t,i,s){var n=e.extend({},i,{item:s.element});s.sortables=[],e(s.options.connectToSortable).each(function(){var i=e(this).sortable("instance");i&&!i.options.disabled&&(s.sortables.push(i),i.refreshPositions(),i._trigger("activate",t,n))})},stop:function(t,i,s){var n=e.extend({},i,{item:s.element});s.cancelHelperRemoval=!1,e.each(s.sortables,function(){var e=this;e.isOver?(e.isOver=0,s.cancelHelperRemoval=!0,e.cancelHelperRemoval=!1,e._storedCSS={position:e.placeholder.css("position"),top:e.placeholder.css("top"),left:e.placeholder.css("left")},e._mouseStop(t),e.options.helper=e.options._helper):(e.cancelHelperRemoval=!0,e._trigger("deactivate",t,n))})},drag:function(t,i,s){e.each(s.sortables,function(){var n=!1,a=this;a.positionAbs=s.positionAbs,a.helperProportions=s.helperProportions,a.offset.click=s.offset.click,a._intersectsWith(a.containerCache)&&(n=!0,e.each(s.sortables,function(){return this.positionAbs=s.positionAbs,this.helperProportions=s.helperProportions,this.offset.click=s.offset.click,this!==a&&this._intersectsWith(this.containerCache)&&e.contains(a.element[0],this.element[0])&&(n=!1),n})),n?(a.isOver||(a.isOver=1,a.currentItem=i.helper.appendTo(a.element).data("ui-sortable-item",!0),a.options._helper=a.options.helper,a.options.helper=function(){return i.helper[0]},t.target=a.currentItem[0],a._mouseCapture(t,!0),a._mouseStart(t,!0,!0),a.offset.click.top=s.offset.click.top,a.offset.click.left=s.offset.click.left,a.offset.parent.left-=s.offset.parent.left-a.offset.parent.left,a.offset.parent.top-=s.offset.parent.top-a.offset.parent.top,s._trigger("toSortable",t),s.dropped=a.element,e.each(s.sortables,function(){this.refreshPositions()}),s.currentItem=s.element,a.fromOutside=s),a.currentItem&&(a._mouseDrag(t),i.position=a.position)):a.isOver&&(a.isOver=0,a.cancelHelperRemoval=!0,a.options._revert=a.options.revert,a.options.revert=!1,a._trigger("out",t,a._uiHash(a)),a._mouseStop(t,!0),a.options.revert=a.options._revert,a.options.helper=a.options._helper,a.placeholder&&a.placeholder.remove(),s._refreshOffsets(t),i.position=s._generatePosition(t,!0),s._trigger("fromSortable",t),s.dropped=!1,e.each(s.sortables,function(){this.refreshPositions()}))})}}),e.ui.plugin.add("draggable","cursor",{start:function(t,i,s){var n=e("body"),a=s.options;n.css("cursor")&&(a._cursor=n.css("cursor")),n.css("cursor",a.cursor)},stop:function(t,i,s){var n=s.options;n._cursor&&e("body").css("cursor",n._cursor)}}),e.ui.plugin.add("draggable","opacity",{start:function(t,i,s){var n=e(i.helper),a=s.options;n.css("opacity")&&(a._opacity=n.css("opacity")),n.css("opacity",a.opacity)},stop:function(t,i,s){var n=s.options;n._opacity&&e(i.helper).css("opacity",n._opacity)}}),e.ui.plugin.add("draggable","scroll",{start:function(e,t,i){i.scrollParentNotHidden||(i.scrollParentNotHidden=i.helper.scrollParent(!1)),i.scrollParentNotHidden[0]!==i.document[0]&&"HTML"!==i.scrollParentNotHidden[0].tagName&&(i.overflowOffset=i.scrollParentNotHidden.offset())},drag:function(t,i,s){var n=s.options,a=!1,o=s.scrollParentNotHidden[0],r=s.document[0];o!==r&&"HTML"!==o.tagName?(n.axis&&"x"===n.axis||(s.overflowOffset.top+o.offsetHeight-t.pageY<n.scrollSensitivity?o.scrollTop=a=o.scrollTop+n.scrollSpeed:t.pageY-s.overflowOffset.top<n.scrollSensitivity&&(o.scrollTop=a=o.scrollTop-n.scrollSpeed)),n.axis&&"y"===n.axis||(s.overflowOffset.left+o.offsetWidth-t.pageX<n.scrollSensitivity?o.scrollLeft=a=o.scrollLeft+n.scrollSpeed:t.pageX-s.overflowOffset.left<n.scrollSensitivity&&(o.scrollLeft=a=o.scrollLeft-n.scrollSpeed))):(n.axis&&"x"===n.axis||(t.pageY-e(r).scrollTop()<n.scrollSensitivity?a=e(r).scrollTop(e(r).scrollTop()-n.scrollSpeed):e(window).height()-(t.pageY-e(r).scrollTop())<n.scrollSensitivity&&(a=e(r).scrollTop(e(r).scrollTop()+n.scrollSpeed))),n.axis&&"y"===n.axis||(t.pageX-e(r).scrollLeft()<n.scrollSensitivity?a=e(r).scrollLeft(e(r).scrollLeft()-n.scrollSpeed):e(window).width()-(t.pageX-e(r).scrollLeft())<n.scrollSensitivity&&(a=e(r).scrollLeft(e(r).scrollLeft()+n.scrollSpeed)))),a!==!1&&e.ui.ddmanager&&!n.dropBehaviour&&e.ui.ddmanager.prepareOffsets(s,t)}}),e.ui.plugin.add("draggable","snap",{start:function(t,i,s){var n=s.options;s.snapElements=[],e(n.snap.constructor!==String?n.snap.items||":data(ui-draggable)":n.snap).each(function(){var t=e(this),i=t.offset();this!==s.element[0]&&s.snapElements.push({item:this,width:t.outerWidth(),height:t.outerHeight(),top:i.top,left:i.left})})},drag:function(t,i,s){var n,a,o,r,h,l,u,d,c,p,f=s.options,m=f.snapTolerance,g=i.offset.left,v=g+s.helperProportions.width,y=i.offset.top,b=y+s.helperProportions.height;for(c=s.snapElements.length-1;c>=0;c--)h=s.snapElements[c].left-s.margins.left,l=h+s.snapElements[c].width,u=s.snapElements[c].top-s.margins.top,d=u+s.snapElements[c].height,h-m>v||g>l+m||u-m>b||y>d+m||!e.contains(s.snapElements[c].item.ownerDocument,s.snapElements[c].item)?(s.snapElements[c].snapping&&s.options.snap.release&&s.options.snap.release.call(s.element,t,e.extend(s._uiHash(),{snapItem:s.snapElements[c].item})),s.snapElements[c].snapping=!1):("inner"!==f.snapMode&&(n=m>=Math.abs(u-b),a=m>=Math.abs(d-y),o=m>=Math.abs(h-v),r=m>=Math.abs(l-g),n&&(i.position.top=s._convertPositionTo("relative",{top:u-s.helperProportions.height,left:0}).top),a&&(i.position.top=s._convertPositionTo("relative",{top:d,left:0}).top),o&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h-s.helperProportions.width}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l}).left)),p=n||a||o||r,"outer"!==f.snapMode&&(n=m>=Math.abs(u-y),a=m>=Math.abs(d-b),o=m>=Math.abs(h-g),r=m>=Math.abs(l-v),n&&(i.position.top=s._convertPositionTo("relative",{top:u,left:0}).top),a&&(i.position.top=s._convertPositionTo("relative",{top:d-s.helperProportions.height,left:0}).top),o&&(i.position.left=s._convertPositionTo("relative",{top:0,left:h}).left),r&&(i.position.left=s._convertPositionTo("relative",{top:0,left:l-s.helperProportions.width}).left)),!s.snapElements[c].snapping&&(n||a||o||r||p)&&s.options.snap.snap&&s.options.snap.snap.call(s.element,t,e.extend(s._uiHash(),{snapItem:s.snapElements[c].item})),s.snapElements[c].snapping=n||a||o||r||p)}}),e.ui.plugin.add("draggable","stack",{start:function(t,i,s){var n,a=s.options,o=e.makeArray(e(a.stack)).sort(function(t,i){return(parseInt(e(t).css("zIndex"),10)||0)-(parseInt(e(i).css("zIndex"),10)||0)});o.length&&(n=parseInt(e(o[0]).css("zIndex"),10)||0,e(o).each(function(t){e(this).css("zIndex",n+t)}),this.css("zIndex",n+o.length))}}),e.ui.plugin.add("draggable","zIndex",{start:function(t,i,s){var n=e(i.helper),a=s.options;n.css("zIndex")&&(a._zIndex=n.css("zIndex")),n.css("zIndex",a.zIndex)},stop:function(t,i,s){var n=s.options;n._zIndex&&e(i.helper).css("zIndex",n._zIndex)}}),e.ui.draggable,e.widget("ui.droppable",{version:"1.11.2",widgetEventPrefix:"drop",options:{accept:"*",activeClass:!1,addClasses:!0,greedy:!1,hoverClass:!1,scope:"default",tolerance:"intersect",activate:null,deactivate:null,drop:null,out:null,over:null},_create:function(){var t,i=this.options,s=i.accept;this.isover=!1,this.isout=!0,this.accept=e.isFunction(s)?s:function(e){return e.is(s)},this.proportions=function(){return arguments.length?(t=arguments[0],void 0):t?t:t={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight}},this._addToManager(i.scope),i.addClasses&&this.element.addClass("ui-droppable")},_addToManager:function(t){e.ui.ddmanager.droppables[t]=e.ui.ddmanager.droppables[t]||[],e.ui.ddmanager.droppables[t].push(this)},_splice:function(e){for(var t=0;e.length>t;t++)e[t]===this&&e.splice(t,1)},_destroy:function(){var t=e.ui.ddmanager.droppables[this.options.scope];this._splice(t),this.element.removeClass("ui-droppable ui-droppable-disabled")},_setOption:function(t,i){if("accept"===t)this.accept=e.isFunction(i)?i:function(e){return e.is(i)};else if("scope"===t){var s=e.ui.ddmanager.droppables[this.options.scope];this._splice(s),this._addToManager(i)}this._super(t,i)},_activate:function(t){var i=e.ui.ddmanager.current;this.options.activeClass&&this.element.addClass(this.options.activeClass),i&&this._trigger("activate",t,this.ui(i))},_deactivate:function(t){var i=e.ui.ddmanager.current;this.options.activeClass&&this.element.removeClass(this.options.activeClass),i&&this._trigger("deactivate",t,this.ui(i))},_over:function(t){var i=e.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this.options.hoverClass&&this.element.addClass(this.options.hoverClass),this._trigger("over",t,this.ui(i)))},_out:function(t){var i=e.ui.ddmanager.current;i&&(i.currentItem||i.element)[0]!==this.element[0]&&this.accept.call(this.element[0],i.currentItem||i.element)&&(this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("out",t,this.ui(i)))},_drop:function(t,i){var s=i||e.ui.ddmanager.current,n=!1;return s&&(s.currentItem||s.element)[0]!==this.element[0]?(this.element.find(":data(ui-droppable)").not(".ui-draggable-dragging").each(function(){var i=e(this).droppable("instance");return i.options.greedy&&!i.options.disabled&&i.options.scope===s.options.scope&&i.accept.call(i.element[0],s.currentItem||s.element)&&e.ui.intersect(s,e.extend(i,{offset:i.element.offset()}),i.options.tolerance,t)?(n=!0,!1):void 0}),n?!1:this.accept.call(this.element[0],s.currentItem||s.element)?(this.options.activeClass&&this.element.removeClass(this.options.activeClass),this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("drop",t,this.ui(s)),this.element):!1):!1},ui:function(e){return{draggable:e.currentItem||e.element,helper:e.helper,position:e.position,offset:e.positionAbs}}}),e.ui.intersect=function(){function e(e,t,i){return e>=t&&t+i>e}return function(t,i,s,n){if(!i.offset)return!1;var a=(t.positionAbs||t.position.absolute).left+t.margins.left,o=(t.positionAbs||t.position.absolute).top+t.margins.top,r=a+t.helperProportions.width,h=o+t.helperProportions.height,l=i.offset.left,u=i.offset.top,d=l+i.proportions().width,c=u+i.proportions().height;switch(s){case"fit":return a>=l&&d>=r&&o>=u&&c>=h;case"intersect":return a+t.helperProportions.width/2>l&&d>r-t.helperProportions.width/2&&o+t.helperProportions.height/2>u&&c>h-t.helperProportions.height/2;case"pointer":return e(n.pageY,u,i.proportions().height)&&e(n.pageX,l,i.proportions().width);case"touch":return(o>=u&&c>=o||h>=u&&c>=h||u>o&&h>c)&&(a>=l&&d>=a||r>=l&&d>=r||l>a&&r>d);default:return!1}}}(),e.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(t,i){var s,n,a=e.ui.ddmanager.droppables[t.options.scope]||[],o=i?i.type:null,r=(t.currentItem||t.element).find(":data(ui-droppable)").addBack();e:for(s=0;a.length>s;s++)if(!(a[s].options.disabled||t&&!a[s].accept.call(a[s].element[0],t.currentItem||t.element))){for(n=0;r.length>n;n++)if(r[n]===a[s].element[0]){a[s].proportions().height=0;continue e}a[s].visible="none"!==a[s].element.css("display"),a[s].visible&&("mousedown"===o&&a[s]._activate.call(a[s],i),a[s].offset=a[s].element.offset(),a[s].proportions({width:a[s].element[0].offsetWidth,height:a[s].element[0].offsetHeight}))}},drop:function(t,i){var s=!1;return e.each((e.ui.ddmanager.droppables[t.options.scope]||[]).slice(),function(){this.options&&(!this.options.disabled&&this.visible&&e.ui.intersect(t,this,this.options.tolerance,i)&&(s=this._drop.call(this,i)||s),!this.options.disabled&&this.visible&&this.accept.call(this.element[0],t.currentItem||t.element)&&(this.isout=!0,this.isover=!1,this._deactivate.call(this,i)))}),s},dragStart:function(t,i){t.element.parentsUntil("body").bind("scroll.droppable",function(){t.options.refreshPositions||e.ui.ddmanager.prepareOffsets(t,i)})},drag:function(t,i){t.options.refreshPositions&&e.ui.ddmanager.prepareOffsets(t,i),e.each(e.ui.ddmanager.droppables[t.options.scope]||[],function(){if(!this.options.disabled&&!this.greedyChild&&this.visible){var s,n,a,o=e.ui.intersect(t,this,this.options.tolerance,i),r=!o&&this.isover?"isout":o&&!this.isover?"isover":null;r&&(this.options.greedy&&(n=this.options.scope,a=this.element.parents(":data(ui-droppable)").filter(function(){return e(this).droppable("instance").options.scope===n}),a.length&&(s=e(a[0]).droppable("instance"),s.greedyChild="isover"===r)),s&&"isover"===r&&(s.isover=!1,s.isout=!0,s._out.call(s,i)),this[r]=!0,this["isout"===r?"isover":"isout"]=!1,this["isover"===r?"_over":"_out"].call(this,i),s&&"isout"===r&&(s.isout=!1,s.isover=!0,s._over.call(s,i)))}})},dragStop:function(t,i){t.element.parentsUntil("body").unbind("scroll.droppable"),t.options.refreshPositions||e.ui.ddmanager.prepareOffsets(t,i)}},e.ui.droppable,e.widget("ui.resizable",e.ui.mouse,{version:"1.11.2",widgetEventPrefix:"resize",options:{alsoResize:!1,animate:!1,animateDuration:"slow",animateEasing:"swing",aspectRatio:!1,autoHide:!1,containment:!1,ghost:!1,grid:!1,handles:"e,s,se",helper:!1,maxHeight:null,maxWidth:null,minHeight:10,minWidth:10,zIndex:90,resize:null,start:null,stop:null},_num:function(e){return parseInt(e,10)||0},_isNumber:function(e){return!isNaN(parseInt(e,10))},_hasScroll:function(t,i){if("hidden"===e(t).css("overflow"))return!1;var s=i&&"left"===i?"scrollLeft":"scrollTop",n=!1;return t[s]>0?!0:(t[s]=1,n=t[s]>0,t[s]=0,n)},_create:function(){var t,i,s,n,a,o=this,r=this.options;if(this.element.addClass("ui-resizable"),e.extend(this,{_aspectRatio:!!r.aspectRatio,aspectRatio:r.aspectRatio,originalElement:this.element,_proportionallyResizeElements:[],_helper:r.helper||r.ghost||r.animate?r.helper||"ui-resizable-helper":null}),this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i)&&(this.element.wrap(e("<div class='ui-wrapper' style='overflow: hidden;'></div>").css({position:this.element.css("position"),width:this.element.outerWidth(),height:this.element.outerHeight(),top:this.element.css("top"),left:this.element.css("left")})),this.element=this.element.parent().data("ui-resizable",this.element.resizable("instance")),this.elementIsWrapper=!0,this.element.css({marginLeft:this.originalElement.css("marginLeft"),marginTop:this.originalElement.css("marginTop"),marginRight:this.originalElement.css("marginRight"),marginBottom:this.originalElement.css("marginBottom")}),this.originalElement.css({marginLeft:0,marginTop:0,marginRight:0,marginBottom:0}),this.originalResizeStyle=this.originalElement.css("resize"),this.originalElement.css("resize","none"),this._proportionallyResizeElements.push(this.originalElement.css({position:"static",zoom:1,display:"block"})),this.originalElement.css({margin:this.originalElement.css("margin")}),this._proportionallyResize()),this.handles=r.handles||(e(".ui-resizable-handle",this.element).length?{n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w",se:".ui-resizable-se",sw:".ui-resizable-sw",ne:".ui-resizable-ne",nw:".ui-resizable-nw"}:"e,s,se"),this.handles.constructor===String)for("all"===this.handles&&(this.handles="n,e,s,w,se,sw,ne,nw"),t=this.handles.split(","),this.handles={},i=0;t.length>i;i++)s=e.trim(t[i]),a="ui-resizable-"+s,n=e("<div class='ui-resizable-handle "+a+"'></div>"),n.css({zIndex:r.zIndex}),"se"===s&&n.addClass("ui-icon ui-icon-gripsmall-diagonal-se"),this.handles[s]=".ui-resizable-"+s,this.element.append(n);this._renderAxis=function(t){var i,s,n,a;t=t||this.element;for(i in this.handles)this.handles[i].constructor===String&&(this.handles[i]=this.element.children(this.handles[i]).first().show()),this.elementIsWrapper&&this.originalElement[0].nodeName.match(/textarea|input|select|button/i)&&(s=e(this.handles[i],this.element),a=/sw|ne|nw|se|n|s/.test(i)?s.outerHeight():s.outerWidth(),n=["padding",/ne|nw|n/.test(i)?"Top":/se|sw|s/.test(i)?"Bottom":/^e$/.test(i)?"Right":"Left"].join(""),t.css(n,a),this._proportionallyResize()),e(this.handles[i]).length},this._renderAxis(this.element),this._handles=e(".ui-resizable-handle",this.element).disableSelection(),this._handles.mouseover(function(){o.resizing||(this.className&&(n=this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)),o.axis=n&&n[1]?n[1]:"se")}),r.autoHide&&(this._handles.hide(),e(this.element).addClass("ui-resizable-autohide").mouseenter(function(){r.disabled||(e(this).removeClass("ui-resizable-autohide"),o._handles.show())}).mouseleave(function(){r.disabled||o.resizing||(e(this).addClass("ui-resizable-autohide"),o._handles.hide())})),this._mouseInit()},_destroy:function(){this._mouseDestroy();var t,i=function(t){e(t).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove()};return this.elementIsWrapper&&(i(this.element),t=this.element,this.originalElement.css({position:t.css("position"),width:t.outerWidth(),height:t.outerHeight(),top:t.css("top"),left:t.css("left")}).insertAfter(t),t.remove()),this.originalElement.css("resize",this.originalResizeStyle),i(this.originalElement),this},_mouseCapture:function(t){var i,s,n=!1;for(i in this.handles)s=e(this.handles[i])[0],(s===t.target||e.contains(s,t.target))&&(n=!0);return!this.options.disabled&&n},_mouseStart:function(t){var i,s,n,a=this.options,o=this.element;return this.resizing=!0,this._renderProxy(),i=this._num(this.helper.css("left")),s=this._num(this.helper.css("top")),a.containment&&(i+=e(a.containment).scrollLeft()||0,s+=e(a.containment).scrollTop()||0),this.offset=this.helper.offset(),this.position={left:i,top:s},this.size=this._helper?{width:this.helper.width(),height:this.helper.height()}:{width:o.width(),height:o.height()},this.originalSize=this._helper?{width:o.outerWidth(),height:o.outerHeight()}:{width:o.width(),height:o.height()},this.sizeDiff={width:o.outerWidth()-o.width(),height:o.outerHeight()-o.height()},this.originalPosition={left:i,top:s},this.originalMousePosition={left:t.pageX,top:t.pageY},this.aspectRatio="number"==typeof a.aspectRatio?a.aspectRatio:this.originalSize.width/this.originalSize.height||1,n=e(".ui-resizable-"+this.axis).css("cursor"),e("body").css("cursor","auto"===n?this.axis+"-resize":n),o.addClass("ui-resizable-resizing"),this._propagate("start",t),!0},_mouseDrag:function(t){var i,s,n=this.originalMousePosition,a=this.axis,o=t.pageX-n.left||0,r=t.pageY-n.top||0,h=this._change[a];return this._updatePrevProperties(),h?(i=h.apply(this,[t,o,r]),this._updateVirtualBoundaries(t.shiftKey),(this._aspectRatio||t.shiftKey)&&(i=this._updateRatio(i,t)),i=this._respectSize(i,t),this._updateCache(i),this._propagate("resize",t),s=this._applyChanges(),!this._helper&&this._proportionallyResizeElements.length&&this._proportionallyResize(),e.isEmptyObject(s)||(this._updatePrevProperties(),this._trigger("resize",t,this.ui()),this._applyChanges()),!1):!1},_mouseStop:function(t){this.resizing=!1;var i,s,n,a,o,r,h,l=this.options,u=this;return this._helper&&(i=this._proportionallyResizeElements,s=i.length&&/textarea/i.test(i[0].nodeName),n=s&&this._hasScroll(i[0],"left")?0:u.sizeDiff.height,a=s?0:u.sizeDiff.width,o={width:u.helper.width()-a,height:u.helper.height()-n},r=parseInt(u.element.css("left"),10)+(u.position.left-u.originalPosition.left)||null,h=parseInt(u.element.css("top"),10)+(u.position.top-u.originalPosition.top)||null,l.animate||this.element.css(e.extend(o,{top:h,left:r})),u.helper.height(u.size.height),u.helper.width(u.size.width),this._helper&&!l.animate&&this._proportionallyResize()),e("body").css("cursor","auto"),this.element.removeClass("ui-resizable-resizing"),this._propagate("stop",t),this._helper&&this.helper.remove(),!1},_updatePrevProperties:function(){this.prevPosition={top:this.position.top,left:this.position.left},this.prevSize={width:this.size.width,height:this.size.height}},_applyChanges:function(){var e={};return this.position.top!==this.prevPosition.top&&(e.top=this.position.top+"px"),this.position.left!==this.prevPosition.left&&(e.left=this.position.left+"px"),this.size.width!==this.prevSize.width&&(e.width=this.size.width+"px"),this.size.height!==this.prevSize.height&&(e.height=this.size.height+"px"),this.helper.css(e),e},_updateVirtualBoundaries:function(e){var t,i,s,n,a,o=this.options;a={minWidth:this._isNumber(o.minWidth)?o.minWidth:0,maxWidth:this._isNumber(o.maxWidth)?o.maxWidth:1/0,minHeight:this._isNumber(o.minHeight)?o.minHeight:0,maxHeight:this._isNumber(o.maxHeight)?o.maxHeight:1/0},(this._aspectRatio||e)&&(t=a.minHeight*this.aspectRatio,s=a.minWidth/this.aspectRatio,i=a.maxHeight*this.aspectRatio,n=a.maxWidth/this.aspectRatio,t>a.minWidth&&(a.minWidth=t),s>a.minHeight&&(a.minHeight=s),a.maxWidth>i&&(a.maxWidth=i),a.maxHeight>n&&(a.maxHeight=n)),this._vBoundaries=a},_updateCache:function(e){this.offset=this.helper.offset(),this._isNumber(e.left)&&(this.position.left=e.left),this._isNumber(e.top)&&(this.position.top=e.top),this._isNumber(e.height)&&(this.size.height=e.height),this._isNumber(e.width)&&(this.size.width=e.width)},_updateRatio:function(e){var t=this.position,i=this.size,s=this.axis;return this._isNumber(e.height)?e.width=e.height*this.aspectRatio:this._isNumber(e.width)&&(e.height=e.width/this.aspectRatio),"sw"===s&&(e.left=t.left+(i.width-e.width),e.top=null),"nw"===s&&(e.top=t.top+(i.height-e.height),e.left=t.left+(i.width-e.width)),e},_respectSize:function(e){var t=this._vBoundaries,i=this.axis,s=this._isNumber(e.width)&&t.maxWidth&&t.maxWidth<e.width,n=this._isNumber(e.height)&&t.maxHeight&&t.maxHeight<e.height,a=this._isNumber(e.width)&&t.minWidth&&t.minWidth>e.width,o=this._isNumber(e.height)&&t.minHeight&&t.minHeight>e.height,r=this.originalPosition.left+this.originalSize.width,h=this.position.top+this.size.height,l=/sw|nw|w/.test(i),u=/nw|ne|n/.test(i);return a&&(e.width=t.minWidth),o&&(e.height=t.minHeight),s&&(e.width=t.maxWidth),n&&(e.height=t.maxHeight),a&&l&&(e.left=r-t.minWidth),s&&l&&(e.left=r-t.maxWidth),o&&u&&(e.top=h-t.minHeight),n&&u&&(e.top=h-t.maxHeight),e.width||e.height||e.left||!e.top?e.width||e.height||e.top||!e.left||(e.left=null):e.top=null,e},_getPaddingPlusBorderDimensions:function(e){for(var t=0,i=[],s=[e.css("borderTopWidth"),e.css("borderRightWidth"),e.css("borderBottomWidth"),e.css("borderLeftWidth")],n=[e.css("paddingTop"),e.css("paddingRight"),e.css("paddingBottom"),e.css("paddingLeft")];4>t;t++)i[t]=parseInt(s[t],10)||0,i[t]+=parseInt(n[t],10)||0;return{height:i[0]+i[2],width:i[1]+i[3]}},_proportionallyResize:function(){if(this._proportionallyResizeElements.length)for(var e,t=0,i=this.helper||this.element;this._proportionallyResizeElements.length>t;t++)e=this._proportionallyResizeElements[t],this.outerDimensions||(this.outerDimensions=this._getPaddingPlusBorderDimensions(e)),e.css({height:i.height()-this.outerDimensions.height||0,width:i.width()-this.outerDimensions.width||0})},_renderProxy:function(){var t=this.element,i=this.options;this.elementOffset=t.offset(),this._helper?(this.helper=this.helper||e("<div style='overflow:hidden;'></div>"),this.helper.addClass(this._helper).css({width:this.element.outerWidth()-1,height:this.element.outerHeight()-1,position:"absolute",left:this.elementOffset.left+"px",top:this.elementOffset.top+"px",zIndex:++i.zIndex}),this.helper.appendTo("body").disableSelection()):this.helper=this.element},_change:{e:function(e,t){return{width:this.originalSize.width+t}},w:function(e,t){var i=this.originalSize,s=this.originalPosition;return{left:s.left+t,width:i.width-t}},n:function(e,t,i){var s=this.originalSize,n=this.originalPosition;return{top:n.top+i,height:s.height-i}},s:function(e,t,i){return{height:this.originalSize.height+i}},se:function(t,i,s){return e.extend(this._change.s.apply(this,arguments),this._change.e.apply(this,[t,i,s]))},sw:function(t,i,s){return e.extend(this._change.s.apply(this,arguments),this._change.w.apply(this,[t,i,s]))},ne:function(t,i,s){return e.extend(this._change.n.apply(this,arguments),this._change.e.apply(this,[t,i,s]))},nw:function(t,i,s){return e.extend(this._change.n.apply(this,arguments),this._change.w.apply(this,[t,i,s]))}},_propagate:function(t,i){e.ui.plugin.call(this,t,[i,this.ui()]),"resize"!==t&&this._trigger(t,i,this.ui())},plugins:{},ui:function(){return{originalElement:this.originalElement,element:this.element,helper:this.helper,position:this.position,size:this.size,originalSize:this.originalSize,originalPosition:this.originalPosition}}}),e.ui.plugin.add("resizable","animate",{stop:function(t){var i=e(this).resizable("instance"),s=i.options,n=i._proportionallyResizeElements,a=n.length&&/textarea/i.test(n[0].nodeName),o=a&&i._hasScroll(n[0],"left")?0:i.sizeDiff.height,r=a?0:i.sizeDiff.width,h={width:i.size.width-r,height:i.size.height-o},l=parseInt(i.element.css("left"),10)+(i.position.left-i.originalPosition.left)||null,u=parseInt(i.element.css("top"),10)+(i.position.top-i.originalPosition.top)||null;i.element.animate(e.extend(h,u&&l?{top:u,left:l}:{}),{duration:s.animateDuration,easing:s.animateEasing,step:function(){var s={width:parseInt(i.element.css("width"),10),height:parseInt(i.element.css("height"),10),top:parseInt(i.element.css("top"),10),left:parseInt(i.element.css("left"),10)};n&&n.length&&e(n[0]).css({width:s.width,height:s.height}),i._updateCache(s),i._propagate("resize",t)}})}}),e.ui.plugin.add("resizable","containment",{start:function(){var t,i,s,n,a,o,r,h=e(this).resizable("instance"),l=h.options,u=h.element,d=l.containment,c=d instanceof e?d.get(0):/parent/.test(d)?u.parent().get(0):d;c&&(h.containerElement=e(c),/document/.test(d)||d===document?(h.containerOffset={left:0,top:0},h.containerPosition={left:0,top:0},h.parentData={element:e(document),left:0,top:0,width:e(document).width(),height:e(document).height()||document.body.parentNode.scrollHeight}):(t=e(c),i=[],e(["Top","Right","Left","Bottom"]).each(function(e,s){i[e]=h._num(t.css("padding"+s))}),h.containerOffset=t.offset(),h.containerPosition=t.position(),h.containerSize={height:t.innerHeight()-i[3],width:t.innerWidth()-i[1]},s=h.containerOffset,n=h.containerSize.height,a=h.containerSize.width,o=h._hasScroll(c,"left")?c.scrollWidth:a,r=h._hasScroll(c)?c.scrollHeight:n,h.parentData={element:c,left:s.left,top:s.top,width:o,height:r}))},resize:function(t){var i,s,n,a,o=e(this).resizable("instance"),r=o.options,h=o.containerOffset,l=o.position,u=o._aspectRatio||t.shiftKey,d={top:0,left:0},c=o.containerElement,p=!0;c[0]!==document&&/static/.test(c.css("position"))&&(d=h),l.left<(o._helper?h.left:0)&&(o.size.width=o.size.width+(o._helper?o.position.left-h.left:o.position.left-d.left),u&&(o.size.height=o.size.width/o.aspectRatio,p=!1),o.position.left=r.helper?h.left:0),l.top<(o._helper?h.top:0)&&(o.size.height=o.size.height+(o._helper?o.position.top-h.top:o.position.top),u&&(o.size.width=o.size.height*o.aspectRatio,p=!1),o.position.top=o._helper?h.top:0),n=o.containerElement.get(0)===o.element.parent().get(0),a=/relative|absolute/.test(o.containerElement.css("position")),n&&a?(o.offset.left=o.parentData.left+o.position.left,o.offset.top=o.parentData.top+o.position.top):(o.offset.left=o.element.offset().left,o.offset.top=o.element.offset().top),i=Math.abs(o.sizeDiff.width+(o._helper?o.offset.left-d.left:o.offset.left-h.left)),s=Math.abs(o.sizeDiff.height+(o._helper?o.offset.top-d.top:o.offset.top-h.top)),i+o.size.width>=o.parentData.width&&(o.size.width=o.parentData.width-i,u&&(o.size.height=o.size.width/o.aspectRatio,p=!1)),s+o.size.height>=o.parentData.height&&(o.size.height=o.parentData.height-s,u&&(o.size.width=o.size.height*o.aspectRatio,p=!1)),p||(o.position.left=o.prevPosition.left,o.position.top=o.prevPosition.top,o.size.width=o.prevSize.width,o.size.height=o.prevSize.height)},stop:function(){var t=e(this).resizable("instance"),i=t.options,s=t.containerOffset,n=t.containerPosition,a=t.containerElement,o=e(t.helper),r=o.offset(),h=o.outerWidth()-t.sizeDiff.width,l=o.outerHeight()-t.sizeDiff.height;t._helper&&!i.animate&&/relative/.test(a.css("position"))&&e(this).css({left:r.left-n.left-s.left,width:h,height:l}),t._helper&&!i.animate&&/static/.test(a.css("position"))&&e(this).css({left:r.left-n.left-s.left,width:h,height:l})}}),e.ui.plugin.add("resizable","alsoResize",{start:function(){var t=e(this).resizable("instance"),i=t.options,s=function(t){e(t).each(function(){var t=e(this);t.data("ui-resizable-alsoresize",{width:parseInt(t.width(),10),height:parseInt(t.height(),10),left:parseInt(t.css("left"),10),top:parseInt(t.css("top"),10)})})};"object"!=typeof i.alsoResize||i.alsoResize.parentNode?s(i.alsoResize):i.alsoResize.length?(i.alsoResize=i.alsoResize[0],s(i.alsoResize)):e.each(i.alsoResize,function(e){s(e)})},resize:function(t,i){var s=e(this).resizable("instance"),n=s.options,a=s.originalSize,o=s.originalPosition,r={height:s.size.height-a.height||0,width:s.size.width-a.width||0,top:s.position.top-o.top||0,left:s.position.left-o.left||0},h=function(t,s){e(t).each(function(){var t=e(this),n=e(this).data("ui-resizable-alsoresize"),a={},o=s&&s.length?s:t.parents(i.originalElement[0]).length?["width","height"]:["width","height","top","left"];e.each(o,function(e,t){var i=(n[t]||0)+(r[t]||0);i&&i>=0&&(a[t]=i||null)}),t.css(a)})};"object"!=typeof n.alsoResize||n.alsoResize.nodeType?h(n.alsoResize):e.each(n.alsoResize,function(e,t){h(e,t)})},stop:function(){e(this).removeData("resizable-alsoresize")}}),e.ui.plugin.add("resizable","ghost",{start:function(){var t=e(this).resizable("instance"),i=t.options,s=t.size;t.ghost=t.originalElement.clone(),t.ghost.css({opacity:.25,display:"block",position:"relative",height:s.height,width:s.width,margin:0,left:0,top:0}).addClass("ui-resizable-ghost").addClass("string"==typeof i.ghost?i.ghost:""),t.ghost.appendTo(t.helper)},resize:function(){var t=e(this).resizable("instance");t.ghost&&t.ghost.css({position:"relative",height:t.size.height,width:t.size.width})},stop:function(){var t=e(this).resizable("instance");t.ghost&&t.helper&&t.helper.get(0).removeChild(t.ghost.get(0))}}),e.ui.plugin.add("resizable","grid",{resize:function(){var t,i=e(this).resizable("instance"),s=i.options,n=i.size,a=i.originalSize,o=i.originalPosition,r=i.axis,h="number"==typeof s.grid?[s.grid,s.grid]:s.grid,l=h[0]||1,u=h[1]||1,d=Math.round((n.width-a.width)/l)*l,c=Math.round((n.height-a.height)/u)*u,p=a.width+d,f=a.height+c,m=s.maxWidth&&p>s.maxWidth,g=s.maxHeight&&f>s.maxHeight,v=s.minWidth&&s.minWidth>p,y=s.minHeight&&s.minHeight>f;s.grid=h,v&&(p+=l),y&&(f+=u),m&&(p-=l),g&&(f-=u),/^(se|s|e)$/.test(r)?(i.size.width=p,i.size.height=f):/^(ne)$/.test(r)?(i.size.width=p,i.size.height=f,i.position.top=o.top-c):/^(sw)$/.test(r)?(i.size.width=p,i.size.height=f,i.position.left=o.left-d):((0>=f-u||0>=p-l)&&(t=i._getPaddingPlusBorderDimensions(this)),f-u>0?(i.size.height=f,i.position.top=o.top-c):(f=u-t.height,i.size.height=f,i.position.top=o.top+a.height-f),p-l>0?(i.size.width=p,i.position.left=o.left-d):(p=u-t.height,i.size.width=p,i.position.left=o.left+a.width-p))}}),e.ui.resizable,e.widget("ui.selectable",e.ui.mouse,{version:"1.11.2",options:{appendTo:"body",autoRefresh:!0,distance:0,filter:"*",tolerance:"touch",selected:null,selecting:null,start:null,stop:null,unselected:null,unselecting:null},_create:function(){var t,i=this;
this.element.addClass("ui-selectable"),this.dragged=!1,this.refresh=function(){t=e(i.options.filter,i.element[0]),t.addClass("ui-selectee"),t.each(function(){var t=e(this),i=t.offset();e.data(this,"selectable-item",{element:this,$element:t,left:i.left,top:i.top,right:i.left+t.outerWidth(),bottom:i.top+t.outerHeight(),startselected:!1,selected:t.hasClass("ui-selected"),selecting:t.hasClass("ui-selecting"),unselecting:t.hasClass("ui-unselecting")})})},this.refresh(),this.selectees=t.addClass("ui-selectee"),this._mouseInit(),this.helper=e("<div class='ui-selectable-helper'></div>")},_destroy:function(){this.selectees.removeClass("ui-selectee").removeData("selectable-item"),this.element.removeClass("ui-selectable ui-selectable-disabled"),this._mouseDestroy()},_mouseStart:function(t){var i=this,s=this.options;this.opos=[t.pageX,t.pageY],this.options.disabled||(this.selectees=e(s.filter,this.element[0]),this._trigger("start",t),e(s.appendTo).append(this.helper),this.helper.css({left:t.pageX,top:t.pageY,width:0,height:0}),s.autoRefresh&&this.refresh(),this.selectees.filter(".ui-selected").each(function(){var s=e.data(this,"selectable-item");s.startselected=!0,t.metaKey||t.ctrlKey||(s.$element.removeClass("ui-selected"),s.selected=!1,s.$element.addClass("ui-unselecting"),s.unselecting=!0,i._trigger("unselecting",t,{unselecting:s.element}))}),e(t.target).parents().addBack().each(function(){var s,n=e.data(this,"selectable-item");return n?(s=!t.metaKey&&!t.ctrlKey||!n.$element.hasClass("ui-selected"),n.$element.removeClass(s?"ui-unselecting":"ui-selected").addClass(s?"ui-selecting":"ui-unselecting"),n.unselecting=!s,n.selecting=s,n.selected=s,s?i._trigger("selecting",t,{selecting:n.element}):i._trigger("unselecting",t,{unselecting:n.element}),!1):void 0}))},_mouseDrag:function(t){if(this.dragged=!0,!this.options.disabled){var i,s=this,n=this.options,a=this.opos[0],o=this.opos[1],r=t.pageX,h=t.pageY;return a>r&&(i=r,r=a,a=i),o>h&&(i=h,h=o,o=i),this.helper.css({left:a,top:o,width:r-a,height:h-o}),this.selectees.each(function(){var i=e.data(this,"selectable-item"),l=!1;i&&i.element!==s.element[0]&&("touch"===n.tolerance?l=!(i.left>r||a>i.right||i.top>h||o>i.bottom):"fit"===n.tolerance&&(l=i.left>a&&r>i.right&&i.top>o&&h>i.bottom),l?(i.selected&&(i.$element.removeClass("ui-selected"),i.selected=!1),i.unselecting&&(i.$element.removeClass("ui-unselecting"),i.unselecting=!1),i.selecting||(i.$element.addClass("ui-selecting"),i.selecting=!0,s._trigger("selecting",t,{selecting:i.element}))):(i.selecting&&((t.metaKey||t.ctrlKey)&&i.startselected?(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.$element.addClass("ui-selected"),i.selected=!0):(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.startselected&&(i.$element.addClass("ui-unselecting"),i.unselecting=!0),s._trigger("unselecting",t,{unselecting:i.element}))),i.selected&&(t.metaKey||t.ctrlKey||i.startselected||(i.$element.removeClass("ui-selected"),i.selected=!1,i.$element.addClass("ui-unselecting"),i.unselecting=!0,s._trigger("unselecting",t,{unselecting:i.element})))))}),!1}},_mouseStop:function(t){var i=this;return this.dragged=!1,e(".ui-unselecting",this.element[0]).each(function(){var s=e.data(this,"selectable-item");s.$element.removeClass("ui-unselecting"),s.unselecting=!1,s.startselected=!1,i._trigger("unselected",t,{unselected:s.element})}),e(".ui-selecting",this.element[0]).each(function(){var s=e.data(this,"selectable-item");s.$element.removeClass("ui-selecting").addClass("ui-selected"),s.selecting=!1,s.selected=!0,s.startselected=!0,i._trigger("selected",t,{selected:s.element})}),this._trigger("stop",t),this.helper.remove(),!1}}),e.widget("ui.sortable",e.ui.mouse,{version:"1.11.2",widgetEventPrefix:"sort",ready:!1,options:{appendTo:"parent",axis:!1,connectWith:!1,containment:!1,cursor:"auto",cursorAt:!1,dropOnEmpty:!0,forcePlaceholderSize:!1,forceHelperSize:!1,grid:!1,handle:!1,helper:"original",items:"> *",opacity:!1,placeholder:!1,revert:!1,scroll:!0,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1e3,activate:null,beforeStop:null,change:null,deactivate:null,out:null,over:null,receive:null,remove:null,sort:null,start:null,stop:null,update:null},_isOverAxis:function(e,t,i){return e>=t&&t+i>e},_isFloating:function(e){return/left|right/.test(e.css("float"))||/inline|table-cell/.test(e.css("display"))},_create:function(){var e=this.options;this.containerCache={},this.element.addClass("ui-sortable"),this.refresh(),this.floating=this.items.length?"x"===e.axis||this._isFloating(this.items[0].item):!1,this.offset=this.element.offset(),this._mouseInit(),this._setHandleClassName(),this.ready=!0},_setOption:function(e,t){this._super(e,t),"handle"===e&&this._setHandleClassName()},_setHandleClassName:function(){this.element.find(".ui-sortable-handle").removeClass("ui-sortable-handle"),e.each(this.items,function(){(this.instance.options.handle?this.item.find(this.instance.options.handle):this.item).addClass("ui-sortable-handle")})},_destroy:function(){this.element.removeClass("ui-sortable ui-sortable-disabled").find(".ui-sortable-handle").removeClass("ui-sortable-handle"),this._mouseDestroy();for(var e=this.items.length-1;e>=0;e--)this.items[e].item.removeData(this.widgetName+"-item");return this},_mouseCapture:function(t,i){var s=null,n=!1,a=this;return this.reverting?!1:this.options.disabled||"static"===this.options.type?!1:(this._refreshItems(t),e(t.target).parents().each(function(){return e.data(this,a.widgetName+"-item")===a?(s=e(this),!1):void 0}),e.data(t.target,a.widgetName+"-item")===a&&(s=e(t.target)),s?!this.options.handle||i||(e(this.options.handle,s).find("*").addBack().each(function(){this===t.target&&(n=!0)}),n)?(this.currentItem=s,this._removeCurrentsFromItems(),!0):!1:!1)},_mouseStart:function(t,i,s){var n,a,o=this.options;if(this.currentContainer=this,this.refreshPositions(),this.helper=this._createHelper(t),this._cacheHelperProportions(),this._cacheMargins(),this.scrollParent=this.helper.scrollParent(),this.offset=this.currentItem.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},e.extend(this.offset,{click:{left:t.pageX-this.offset.left,top:t.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.helper.css("position","absolute"),this.cssPosition=this.helper.css("position"),this.originalPosition=this._generatePosition(t),this.originalPageX=t.pageX,this.originalPageY=t.pageY,o.cursorAt&&this._adjustOffsetFromHelper(o.cursorAt),this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]},this.helper[0]!==this.currentItem[0]&&this.currentItem.hide(),this._createPlaceholder(),o.containment&&this._setContainment(),o.cursor&&"auto"!==o.cursor&&(a=this.document.find("body"),this.storedCursor=a.css("cursor"),a.css("cursor",o.cursor),this.storedStylesheet=e("<style>*{ cursor: "+o.cursor+" !important; }</style>").appendTo(a)),o.opacity&&(this.helper.css("opacity")&&(this._storedOpacity=this.helper.css("opacity")),this.helper.css("opacity",o.opacity)),o.zIndex&&(this.helper.css("zIndex")&&(this._storedZIndex=this.helper.css("zIndex")),this.helper.css("zIndex",o.zIndex)),this.scrollParent[0]!==document&&"HTML"!==this.scrollParent[0].tagName&&(this.overflowOffset=this.scrollParent.offset()),this._trigger("start",t,this._uiHash()),this._preserveHelperProportions||this._cacheHelperProportions(),!s)for(n=this.containers.length-1;n>=0;n--)this.containers[n]._trigger("activate",t,this._uiHash(this));return e.ui.ddmanager&&(e.ui.ddmanager.current=this),e.ui.ddmanager&&!o.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t),this.dragging=!0,this.helper.addClass("ui-sortable-helper"),this._mouseDrag(t),!0},_mouseDrag:function(t){var i,s,n,a,o=this.options,r=!1;for(this.position=this._generatePosition(t),this.positionAbs=this._convertPositionTo("absolute"),this.lastPositionAbs||(this.lastPositionAbs=this.positionAbs),this.options.scroll&&(this.scrollParent[0]!==document&&"HTML"!==this.scrollParent[0].tagName?(this.overflowOffset.top+this.scrollParent[0].offsetHeight-t.pageY<o.scrollSensitivity?this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop+o.scrollSpeed:t.pageY-this.overflowOffset.top<o.scrollSensitivity&&(this.scrollParent[0].scrollTop=r=this.scrollParent[0].scrollTop-o.scrollSpeed),this.overflowOffset.left+this.scrollParent[0].offsetWidth-t.pageX<o.scrollSensitivity?this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft+o.scrollSpeed:t.pageX-this.overflowOffset.left<o.scrollSensitivity&&(this.scrollParent[0].scrollLeft=r=this.scrollParent[0].scrollLeft-o.scrollSpeed)):(t.pageY-e(document).scrollTop()<o.scrollSensitivity?r=e(document).scrollTop(e(document).scrollTop()-o.scrollSpeed):e(window).height()-(t.pageY-e(document).scrollTop())<o.scrollSensitivity&&(r=e(document).scrollTop(e(document).scrollTop()+o.scrollSpeed)),t.pageX-e(document).scrollLeft()<o.scrollSensitivity?r=e(document).scrollLeft(e(document).scrollLeft()-o.scrollSpeed):e(window).width()-(t.pageX-e(document).scrollLeft())<o.scrollSensitivity&&(r=e(document).scrollLeft(e(document).scrollLeft()+o.scrollSpeed))),r!==!1&&e.ui.ddmanager&&!o.dropBehaviour&&e.ui.ddmanager.prepareOffsets(this,t)),this.positionAbs=this._convertPositionTo("absolute"),this.options.axis&&"y"===this.options.axis||(this.helper[0].style.left=this.position.left+"px"),this.options.axis&&"x"===this.options.axis||(this.helper[0].style.top=this.position.top+"px"),i=this.items.length-1;i>=0;i--)if(s=this.items[i],n=s.item[0],a=this._intersectsWithPointer(s),a&&s.instance===this.currentContainer&&n!==this.currentItem[0]&&this.placeholder[1===a?"next":"prev"]()[0]!==n&&!e.contains(this.placeholder[0],n)&&("semi-dynamic"===this.options.type?!e.contains(this.element[0],n):!0)){if(this.direction=1===a?"down":"up","pointer"!==this.options.tolerance&&!this._intersectsWithSides(s))break;this._rearrange(t,s),this._trigger("change",t,this._uiHash());break}return this._contactContainers(t),e.ui.ddmanager&&e.ui.ddmanager.drag(this,t),this._trigger("sort",t,this._uiHash()),this.lastPositionAbs=this.positionAbs,!1},_mouseStop:function(t,i){if(t){if(e.ui.ddmanager&&!this.options.dropBehaviour&&e.ui.ddmanager.drop(this,t),this.options.revert){var s=this,n=this.placeholder.offset(),a=this.options.axis,o={};a&&"x"!==a||(o.left=n.left-this.offset.parent.left-this.margins.left+(this.offsetParent[0]===document.body?0:this.offsetParent[0].scrollLeft)),a&&"y"!==a||(o.top=n.top-this.offset.parent.top-this.margins.top+(this.offsetParent[0]===document.body?0:this.offsetParent[0].scrollTop)),this.reverting=!0,e(this.helper).animate(o,parseInt(this.options.revert,10)||500,function(){s._clear(t)})}else this._clear(t,i);return!1}},cancel:function(){if(this.dragging){this._mouseUp({target:null}),"original"===this.options.helper?this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper"):this.currentItem.show();for(var t=this.containers.length-1;t>=0;t--)this.containers[t]._trigger("deactivate",null,this._uiHash(this)),this.containers[t].containerCache.over&&(this.containers[t]._trigger("out",null,this._uiHash(this)),this.containers[t].containerCache.over=0)}return this.placeholder&&(this.placeholder[0].parentNode&&this.placeholder[0].parentNode.removeChild(this.placeholder[0]),"original"!==this.options.helper&&this.helper&&this.helper[0].parentNode&&this.helper.remove(),e.extend(this,{helper:null,dragging:!1,reverting:!1,_noFinalSort:null}),this.domPosition.prev?e(this.domPosition.prev).after(this.currentItem):e(this.domPosition.parent).prepend(this.currentItem)),this},serialize:function(t){var i=this._getItemsAsjQuery(t&&t.connected),s=[];return t=t||{},e(i).each(function(){var i=(e(t.item||this).attr(t.attribute||"id")||"").match(t.expression||/(.+)[\-=_](.+)/);i&&s.push((t.key||i[1]+"[]")+"="+(t.key&&t.expression?i[1]:i[2]))}),!s.length&&t.key&&s.push(t.key+"="),s.join("&")},toArray:function(t){var i=this._getItemsAsjQuery(t&&t.connected),s=[];return t=t||{},i.each(function(){s.push(e(t.item||this).attr(t.attribute||"id")||"")}),s},_intersectsWith:function(e){var t=this.positionAbs.left,i=t+this.helperProportions.width,s=this.positionAbs.top,n=s+this.helperProportions.height,a=e.left,o=a+e.width,r=e.top,h=r+e.height,l=this.offset.click.top,u=this.offset.click.left,d="x"===this.options.axis||s+l>r&&h>s+l,c="y"===this.options.axis||t+u>a&&o>t+u,p=d&&c;return"pointer"===this.options.tolerance||this.options.forcePointerForContainers||"pointer"!==this.options.tolerance&&this.helperProportions[this.floating?"width":"height"]>e[this.floating?"width":"height"]?p:t+this.helperProportions.width/2>a&&o>i-this.helperProportions.width/2&&s+this.helperProportions.height/2>r&&h>n-this.helperProportions.height/2},_intersectsWithPointer:function(e){var t="x"===this.options.axis||this._isOverAxis(this.positionAbs.top+this.offset.click.top,e.top,e.height),i="y"===this.options.axis||this._isOverAxis(this.positionAbs.left+this.offset.click.left,e.left,e.width),s=t&&i,n=this._getDragVerticalDirection(),a=this._getDragHorizontalDirection();return s?this.floating?a&&"right"===a||"down"===n?2:1:n&&("down"===n?2:1):!1},_intersectsWithSides:function(e){var t=this._isOverAxis(this.positionAbs.top+this.offset.click.top,e.top+e.height/2,e.height),i=this._isOverAxis(this.positionAbs.left+this.offset.click.left,e.left+e.width/2,e.width),s=this._getDragVerticalDirection(),n=this._getDragHorizontalDirection();return this.floating&&n?"right"===n&&i||"left"===n&&!i:s&&("down"===s&&t||"up"===s&&!t)},_getDragVerticalDirection:function(){var e=this.positionAbs.top-this.lastPositionAbs.top;return 0!==e&&(e>0?"down":"up")},_getDragHorizontalDirection:function(){var e=this.positionAbs.left-this.lastPositionAbs.left;return 0!==e&&(e>0?"right":"left")},refresh:function(e){return this._refreshItems(e),this._setHandleClassName(),this.refreshPositions(),this},_connectWith:function(){var e=this.options;return e.connectWith.constructor===String?[e.connectWith]:e.connectWith},_getItemsAsjQuery:function(t){function i(){r.push(this)}var s,n,a,o,r=[],h=[],l=this._connectWith();if(l&&t)for(s=l.length-1;s>=0;s--)for(a=e(l[s]),n=a.length-1;n>=0;n--)o=e.data(a[n],this.widgetFullName),o&&o!==this&&!o.options.disabled&&h.push([e.isFunction(o.options.items)?o.options.items.call(o.element):e(o.options.items,o.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),o]);for(h.push([e.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):e(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]),s=h.length-1;s>=0;s--)h[s][0].each(i);return e(r)},_removeCurrentsFromItems:function(){var t=this.currentItem.find(":data("+this.widgetName+"-item)");this.items=e.grep(this.items,function(e){for(var i=0;t.length>i;i++)if(t[i]===e.item[0])return!1;return!0})},_refreshItems:function(t){this.items=[],this.containers=[this];var i,s,n,a,o,r,h,l,u=this.items,d=[[e.isFunction(this.options.items)?this.options.items.call(this.element[0],t,{item:this.currentItem}):e(this.options.items,this.element),this]],c=this._connectWith();if(c&&this.ready)for(i=c.length-1;i>=0;i--)for(n=e(c[i]),s=n.length-1;s>=0;s--)a=e.data(n[s],this.widgetFullName),a&&a!==this&&!a.options.disabled&&(d.push([e.isFunction(a.options.items)?a.options.items.call(a.element[0],t,{item:this.currentItem}):e(a.options.items,a.element),a]),this.containers.push(a));for(i=d.length-1;i>=0;i--)for(o=d[i][1],r=d[i][0],s=0,l=r.length;l>s;s++)h=e(r[s]),h.data(this.widgetName+"-item",o),u.push({item:h,instance:o,width:0,height:0,left:0,top:0})},refreshPositions:function(t){this.offsetParent&&this.helper&&(this.offset.parent=this._getParentOffset());var i,s,n,a;for(i=this.items.length-1;i>=0;i--)s=this.items[i],s.instance!==this.currentContainer&&this.currentContainer&&s.item[0]!==this.currentItem[0]||(n=this.options.toleranceElement?e(this.options.toleranceElement,s.item):s.item,t||(s.width=n.outerWidth(),s.height=n.outerHeight()),a=n.offset(),s.left=a.left,s.top=a.top);if(this.options.custom&&this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this);else for(i=this.containers.length-1;i>=0;i--)a=this.containers[i].element.offset(),this.containers[i].containerCache.left=a.left,this.containers[i].containerCache.top=a.top,this.containers[i].containerCache.width=this.containers[i].element.outerWidth(),this.containers[i].containerCache.height=this.containers[i].element.outerHeight();return this},_createPlaceholder:function(t){t=t||this;var i,s=t.options;s.placeholder&&s.placeholder.constructor!==String||(i=s.placeholder,s.placeholder={element:function(){var s=t.currentItem[0].nodeName.toLowerCase(),n=e("<"+s+">",t.document[0]).addClass(i||t.currentItem[0].className+" ui-sortable-placeholder").removeClass("ui-sortable-helper");return"tr"===s?t.currentItem.children().each(function(){e("<td>&#160;</td>",t.document[0]).attr("colspan",e(this).attr("colspan")||1).appendTo(n)}):"img"===s&&n.attr("src",t.currentItem.attr("src")),i||n.css("visibility","hidden"),n},update:function(e,n){(!i||s.forcePlaceholderSize)&&(n.height()||n.height(t.currentItem.innerHeight()-parseInt(t.currentItem.css("paddingTop")||0,10)-parseInt(t.currentItem.css("paddingBottom")||0,10)),n.width()||n.width(t.currentItem.innerWidth()-parseInt(t.currentItem.css("paddingLeft")||0,10)-parseInt(t.currentItem.css("paddingRight")||0,10)))}}),t.placeholder=e(s.placeholder.element.call(t.element,t.currentItem)),t.currentItem.after(t.placeholder),s.placeholder.update(t,t.placeholder)},_contactContainers:function(t){var i,s,n,a,o,r,h,l,u,d,c=null,p=null;for(i=this.containers.length-1;i>=0;i--)if(!e.contains(this.currentItem[0],this.containers[i].element[0]))if(this._intersectsWith(this.containers[i].containerCache)){if(c&&e.contains(this.containers[i].element[0],c.element[0]))continue;c=this.containers[i],p=i}else this.containers[i].containerCache.over&&(this.containers[i]._trigger("out",t,this._uiHash(this)),this.containers[i].containerCache.over=0);if(c)if(1===this.containers.length)this.containers[p].containerCache.over||(this.containers[p]._trigger("over",t,this._uiHash(this)),this.containers[p].containerCache.over=1);else{for(n=1e4,a=null,u=c.floating||this._isFloating(this.currentItem),o=u?"left":"top",r=u?"width":"height",d=u?"clientX":"clientY",s=this.items.length-1;s>=0;s--)e.contains(this.containers[p].element[0],this.items[s].item[0])&&this.items[s].item[0]!==this.currentItem[0]&&(h=this.items[s].item.offset()[o],l=!1,t[d]-h>this.items[s][r]/2&&(l=!0),n>Math.abs(t[d]-h)&&(n=Math.abs(t[d]-h),a=this.items[s],this.direction=l?"up":"down"));if(!a&&!this.options.dropOnEmpty)return;if(this.currentContainer===this.containers[p])return this.currentContainer.containerCache.over||(this.containers[p]._trigger("over",t,this._uiHash()),this.currentContainer.containerCache.over=1),void 0;a?this._rearrange(t,a,null,!0):this._rearrange(t,null,this.containers[p].element,!0),this._trigger("change",t,this._uiHash()),this.containers[p]._trigger("change",t,this._uiHash(this)),this.currentContainer=this.containers[p],this.options.placeholder.update(this.currentContainer,this.placeholder),this.containers[p]._trigger("over",t,this._uiHash(this)),this.containers[p].containerCache.over=1}},_createHelper:function(t){var i=this.options,s=e.isFunction(i.helper)?e(i.helper.apply(this.element[0],[t,this.currentItem])):"clone"===i.helper?this.currentItem.clone():this.currentItem;return s.parents("body").length||e("parent"!==i.appendTo?i.appendTo:this.currentItem[0].parentNode)[0].appendChild(s[0]),s[0]===this.currentItem[0]&&(this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}),(!s[0].style.width||i.forceHelperSize)&&s.width(this.currentItem.width()),(!s[0].style.height||i.forceHelperSize)&&s.height(this.currentItem.height()),s},_adjustOffsetFromHelper:function(t){"string"==typeof t&&(t=t.split(" ")),e.isArray(t)&&(t={left:+t[0],top:+t[1]||0}),"left"in t&&(this.offset.click.left=t.left+this.margins.left),"right"in t&&(this.offset.click.left=this.helperProportions.width-t.right+this.margins.left),"top"in t&&(this.offset.click.top=t.top+this.margins.top),"bottom"in t&&(this.offset.click.top=this.helperProportions.height-t.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var t=this.offsetParent.offset();return"absolute"===this.cssPosition&&this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])&&(t.left+=this.scrollParent.scrollLeft(),t.top+=this.scrollParent.scrollTop()),(this.offsetParent[0]===document.body||this.offsetParent[0].tagName&&"html"===this.offsetParent[0].tagName.toLowerCase()&&e.ui.ie)&&(t={top:0,left:0}),{top:t.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:t.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if("relative"===this.cssPosition){var e=this.currentItem.position();return{top:e.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:e.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.currentItem.css("marginLeft"),10)||0,top:parseInt(this.currentItem.css("marginTop"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var t,i,s,n=this.options;"parent"===n.containment&&(n.containment=this.helper[0].parentNode),("document"===n.containment||"window"===n.containment)&&(this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,e("document"===n.containment?document:window).width()-this.helperProportions.width-this.margins.left,(e("document"===n.containment?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]),/^(document|window|parent)$/.test(n.containment)||(t=e(n.containment)[0],i=e(n.containment).offset(),s="hidden"!==e(t).css("overflow"),this.containment=[i.left+(parseInt(e(t).css("borderLeftWidth"),10)||0)+(parseInt(e(t).css("paddingLeft"),10)||0)-this.margins.left,i.top+(parseInt(e(t).css("borderTopWidth"),10)||0)+(parseInt(e(t).css("paddingTop"),10)||0)-this.margins.top,i.left+(s?Math.max(t.scrollWidth,t.offsetWidth):t.offsetWidth)-(parseInt(e(t).css("borderLeftWidth"),10)||0)-(parseInt(e(t).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,i.top+(s?Math.max(t.scrollHeight,t.offsetHeight):t.offsetHeight)-(parseInt(e(t).css("borderTopWidth"),10)||0)-(parseInt(e(t).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top])},_convertPositionTo:function(t,i){i||(i=this.position);var s="absolute"===t?1:-1,n="absolute"!==this.cssPosition||this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,a=/(html|body)/i.test(n[0].tagName);return{top:i.top+this.offset.relative.top*s+this.offset.parent.top*s-("fixed"===this.cssPosition?-this.scrollParent.scrollTop():a?0:n.scrollTop())*s,left:i.left+this.offset.relative.left*s+this.offset.parent.left*s-("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():a?0:n.scrollLeft())*s}},_generatePosition:function(t){var i,s,n=this.options,a=t.pageX,o=t.pageY,r="absolute"!==this.cssPosition||this.scrollParent[0]!==document&&e.contains(this.scrollParent[0],this.offsetParent[0])?this.scrollParent:this.offsetParent,h=/(html|body)/i.test(r[0].tagName);return"relative"!==this.cssPosition||this.scrollParent[0]!==document&&this.scrollParent[0]!==this.offsetParent[0]||(this.offset.relative=this._getRelativeOffset()),this.originalPosition&&(this.containment&&(t.pageX-this.offset.click.left<this.containment[0]&&(a=this.containment[0]+this.offset.click.left),t.pageY-this.offset.click.top<this.containment[1]&&(o=this.containment[1]+this.offset.click.top),t.pageX-this.offset.click.left>this.containment[2]&&(a=this.containment[2]+this.offset.click.left),t.pageY-this.offset.click.top>this.containment[3]&&(o=this.containment[3]+this.offset.click.top)),n.grid&&(i=this.originalPageY+Math.round((o-this.originalPageY)/n.grid[1])*n.grid[1],o=this.containment?i-this.offset.click.top>=this.containment[1]&&i-this.offset.click.top<=this.containment[3]?i:i-this.offset.click.top>=this.containment[1]?i-n.grid[1]:i+n.grid[1]:i,s=this.originalPageX+Math.round((a-this.originalPageX)/n.grid[0])*n.grid[0],a=this.containment?s-this.offset.click.left>=this.containment[0]&&s-this.offset.click.left<=this.containment[2]?s:s-this.offset.click.left>=this.containment[0]?s-n.grid[0]:s+n.grid[0]:s)),{top:o-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+("fixed"===this.cssPosition?-this.scrollParent.scrollTop():h?0:r.scrollTop()),left:a-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+("fixed"===this.cssPosition?-this.scrollParent.scrollLeft():h?0:r.scrollLeft())}},_rearrange:function(e,t,i,s){i?i[0].appendChild(this.placeholder[0]):t.item[0].parentNode.insertBefore(this.placeholder[0],"down"===this.direction?t.item[0]:t.item[0].nextSibling),this.counter=this.counter?++this.counter:1;var n=this.counter;this._delay(function(){n===this.counter&&this.refreshPositions(!s)})},_clear:function(e,t){function i(e,t,i){return function(s){i._trigger(e,s,t._uiHash(t))}}this.reverting=!1;var s,n=[];if(!this._noFinalSort&&this.currentItem.parent().length&&this.placeholder.before(this.currentItem),this._noFinalSort=null,this.helper[0]===this.currentItem[0]){for(s in this._storedCSS)("auto"===this._storedCSS[s]||"static"===this._storedCSS[s])&&(this._storedCSS[s]="");this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")}else this.currentItem.show();for(this.fromOutside&&!t&&n.push(function(e){this._trigger("receive",e,this._uiHash(this.fromOutside))}),!this.fromOutside&&this.domPosition.prev===this.currentItem.prev().not(".ui-sortable-helper")[0]&&this.domPosition.parent===this.currentItem.parent()[0]||t||n.push(function(e){this._trigger("update",e,this._uiHash())}),this!==this.currentContainer&&(t||(n.push(function(e){this._trigger("remove",e,this._uiHash())}),n.push(function(e){return function(t){e._trigger("receive",t,this._uiHash(this))}}.call(this,this.currentContainer)),n.push(function(e){return function(t){e._trigger("update",t,this._uiHash(this))}}.call(this,this.currentContainer)))),s=this.containers.length-1;s>=0;s--)t||n.push(i("deactivate",this,this.containers[s])),this.containers[s].containerCache.over&&(n.push(i("out",this,this.containers[s])),this.containers[s].containerCache.over=0);if(this.storedCursor&&(this.document.find("body").css("cursor",this.storedCursor),this.storedStylesheet.remove()),this._storedOpacity&&this.helper.css("opacity",this._storedOpacity),this._storedZIndex&&this.helper.css("zIndex","auto"===this._storedZIndex?"":this._storedZIndex),this.dragging=!1,t||this._trigger("beforeStop",e,this._uiHash()),this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.cancelHelperRemoval||(this.helper[0]!==this.currentItem[0]&&this.helper.remove(),this.helper=null),!t){for(s=0;n.length>s;s++)n[s].call(this,e);this._trigger("stop",e,this._uiHash())}return this.fromOutside=!1,!this.cancelHelperRemoval},_trigger:function(){e.Widget.prototype._trigger.apply(this,arguments)===!1&&this.cancel()},_uiHash:function(t){var i=t||this;return{helper:i.helper,placeholder:i.placeholder||e([]),position:i.position,originalPosition:i.originalPosition,offset:i.positionAbs,item:i.currentItem,sender:t?t.element:null}}}),e.widget("ui.accordion",{version:"1.11.2",options:{active:0,animate:{},collapsible:!1,event:"click",header:"> li > :first-child,> :not(li):even",heightStyle:"auto",icons:{activeHeader:"ui-icon-triangle-1-s",header:"ui-icon-triangle-1-e"},activate:null,beforeActivate:null},hideProps:{borderTopWidth:"hide",borderBottomWidth:"hide",paddingTop:"hide",paddingBottom:"hide",height:"hide"},showProps:{borderTopWidth:"show",borderBottomWidth:"show",paddingTop:"show",paddingBottom:"show",height:"show"},_create:function(){var t=this.options;this.prevShow=this.prevHide=e(),this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role","tablist"),t.collapsible||t.active!==!1&&null!=t.active||(t.active=0),this._processPanels(),0>t.active&&(t.active+=this.headers.length),this._refresh()},_getCreateEventData:function(){return{header:this.active,panel:this.active.length?this.active.next():e()}},_createIcons:function(){var t=this.options.icons;t&&(e("<span>").addClass("ui-accordion-header-icon ui-icon "+t.header).prependTo(this.headers),this.active.children(".ui-accordion-header-icon").removeClass(t.header).addClass(t.activeHeader),this.headers.addClass("ui-accordion-icons"))},_destroyIcons:function(){this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()},_destroy:function(){var e;this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"),this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").removeUniqueId(),this._destroyIcons(),e=this.headers.next().removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").css("display","").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeUniqueId(),"content"!==this.options.heightStyle&&e.css("height","")},_setOption:function(e,t){return"active"===e?(this._activate(t),void 0):("event"===e&&(this.options.event&&this._off(this.headers,this.options.event),this._setupEvents(t)),this._super(e,t),"collapsible"!==e||t||this.options.active!==!1||this._activate(0),"icons"===e&&(this._destroyIcons(),t&&this._createIcons()),"disabled"===e&&(this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this.headers.add(this.headers.next()).toggleClass("ui-state-disabled",!!t)),void 0)},_keydown:function(t){if(!t.altKey&&!t.ctrlKey){var i=e.ui.keyCode,s=this.headers.length,n=this.headers.index(t.target),a=!1;switch(t.keyCode){case i.RIGHT:case i.DOWN:a=this.headers[(n+1)%s];break;case i.LEFT:case i.UP:a=this.headers[(n-1+s)%s];break;case i.SPACE:case i.ENTER:this._eventHandler(t);break;case i.HOME:a=this.headers[0];break;case i.END:a=this.headers[s-1]}a&&(e(t.target).attr("tabIndex",-1),e(a).attr("tabIndex",0),a.focus(),t.preventDefault())}},_panelKeyDown:function(t){t.keyCode===e.ui.keyCode.UP&&t.ctrlKey&&e(t.currentTarget).prev().focus()},refresh:function(){var t=this.options;this._processPanels(),t.active===!1&&t.collapsible===!0||!this.headers.length?(t.active=!1,this.active=e()):t.active===!1?this._activate(0):this.active.length&&!e.contains(this.element[0],this.active[0])?this.headers.length===this.headers.find(".ui-state-disabled").length?(t.active=!1,this.active=e()):this._activate(Math.max(0,t.active-1)):t.active=this.headers.index(this.active),this._destroyIcons(),this._refresh()},_processPanels:function(){var e=this.headers,t=this.panels;this.headers=this.element.find(this.options.header).addClass("ui-accordion-header ui-state-default ui-corner-all"),this.panels=this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide(),t&&(this._off(e.not(this.headers)),this._off(t.not(this.panels)))},_refresh:function(){var t,i=this.options,s=i.heightStyle,n=this.element.parent();this.active=this._findActive(i.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"),this.active.next().addClass("ui-accordion-content-active").show(),this.headers.attr("role","tab").each(function(){var t=e(this),i=t.uniqueId().attr("id"),s=t.next(),n=s.uniqueId().attr("id");
t.attr("aria-controls",n),s.attr("aria-labelledby",i)}).next().attr("role","tabpanel"),this.headers.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}).next().attr({"aria-hidden":"true"}).hide(),this.active.length?this.active.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}).next().attr({"aria-hidden":"false"}):this.headers.eq(0).attr("tabIndex",0),this._createIcons(),this._setupEvents(i.event),"fill"===s?(t=n.height(),this.element.siblings(":visible").each(function(){var i=e(this),s=i.css("position");"absolute"!==s&&"fixed"!==s&&(t-=i.outerHeight(!0))}),this.headers.each(function(){t-=e(this).outerHeight(!0)}),this.headers.next().each(function(){e(this).height(Math.max(0,t-e(this).innerHeight()+e(this).height()))}).css("overflow","auto")):"auto"===s&&(t=0,this.headers.next().each(function(){t=Math.max(t,e(this).css("height","").height())}).height(t))},_activate:function(t){var i=this._findActive(t)[0];i!==this.active[0]&&(i=i||this.active[0],this._eventHandler({target:i,currentTarget:i,preventDefault:e.noop}))},_findActive:function(t){return"number"==typeof t?this.headers.eq(t):e()},_setupEvents:function(t){var i={keydown:"_keydown"};t&&e.each(t.split(" "),function(e,t){i[t]="_eventHandler"}),this._off(this.headers.add(this.headers.next())),this._on(this.headers,i),this._on(this.headers.next(),{keydown:"_panelKeyDown"}),this._hoverable(this.headers),this._focusable(this.headers)},_eventHandler:function(t){var i=this.options,s=this.active,n=e(t.currentTarget),a=n[0]===s[0],o=a&&i.collapsible,r=o?e():n.next(),h=s.next(),l={oldHeader:s,oldPanel:h,newHeader:o?e():n,newPanel:r};t.preventDefault(),a&&!i.collapsible||this._trigger("beforeActivate",t,l)===!1||(i.active=o?!1:this.headers.index(n),this.active=a?e():n,this._toggle(l),s.removeClass("ui-accordion-header-active ui-state-active"),i.icons&&s.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header),a||(n.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"),i.icons&&n.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader),n.next().addClass("ui-accordion-content-active")))},_toggle:function(t){var i=t.newPanel,s=this.prevShow.length?this.prevShow:t.oldPanel;this.prevShow.add(this.prevHide).stop(!0,!0),this.prevShow=i,this.prevHide=s,this.options.animate?this._animate(i,s,t):(s.hide(),i.show(),this._toggleComplete(t)),s.attr({"aria-hidden":"true"}),s.prev().attr("aria-selected","false"),i.length&&s.length?s.prev().attr({tabIndex:-1,"aria-expanded":"false"}):i.length&&this.headers.filter(function(){return 0===e(this).attr("tabIndex")}).attr("tabIndex",-1),i.attr("aria-hidden","false").prev().attr({"aria-selected":"true",tabIndex:0,"aria-expanded":"true"})},_animate:function(e,t,i){var s,n,a,o=this,r=0,h=e.length&&(!t.length||e.index()<t.index()),l=this.options.animate||{},u=h&&l.down||l,d=function(){o._toggleComplete(i)};return"number"==typeof u&&(a=u),"string"==typeof u&&(n=u),n=n||u.easing||l.easing,a=a||u.duration||l.duration,t.length?e.length?(s=e.show().outerHeight(),t.animate(this.hideProps,{duration:a,easing:n,step:function(e,t){t.now=Math.round(e)}}),e.hide().animate(this.showProps,{duration:a,easing:n,complete:d,step:function(e,i){i.now=Math.round(e),"height"!==i.prop?r+=i.now:"content"!==o.options.heightStyle&&(i.now=Math.round(s-t.outerHeight()-r),r=0)}}),void 0):t.animate(this.hideProps,a,n,d):e.animate(this.showProps,a,n,d)},_toggleComplete:function(e){var t=e.oldPanel;t.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"),t.length&&(t.parent()[0].className=t.parent()[0].className),this._trigger("activate",null,e)}}),e.widget("ui.menu",{version:"1.11.2",defaultElement:"<ul>",delay:300,options:{icons:{submenu:"ui-icon-carat-1-e"},items:"> *",menus:"ul",position:{my:"left-1 top",at:"right top"},role:"menu",blur:null,focus:null,select:null},_create:function(){this.activeMenu=this.element,this.mouseHandled=!1,this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content").toggleClass("ui-menu-icons",!!this.element.find(".ui-icon").length).attr({role:this.options.role,tabIndex:0}),this.options.disabled&&this.element.addClass("ui-state-disabled").attr("aria-disabled","true"),this._on({"mousedown .ui-menu-item":function(e){e.preventDefault()},"click .ui-menu-item":function(t){var i=e(t.target);!this.mouseHandled&&i.not(".ui-state-disabled").length&&(this.select(t),t.isPropagationStopped()||(this.mouseHandled=!0),i.has(".ui-menu").length?this.expand(t):!this.element.is(":focus")&&e(this.document[0].activeElement).closest(".ui-menu").length&&(this.element.trigger("focus",[!0]),this.active&&1===this.active.parents(".ui-menu").length&&clearTimeout(this.timer)))},"mouseenter .ui-menu-item":function(t){if(!this.previousFilter){var i=e(t.currentTarget);i.siblings(".ui-state-active").removeClass("ui-state-active"),this.focus(t,i)}},mouseleave:"collapseAll","mouseleave .ui-menu":"collapseAll",focus:function(e,t){var i=this.active||this.element.find(this.options.items).eq(0);t||this.focus(e,i)},blur:function(t){this._delay(function(){e.contains(this.element[0],this.document[0].activeElement)||this.collapseAll(t)})},keydown:"_keydown"}),this.refresh(),this._on(this.document,{click:function(e){this._closeOnDocumentClick(e)&&this.collapseAll(e),this.mouseHandled=!1}})},_destroy:function(){this.element.removeAttr("aria-activedescendant").find(".ui-menu").addBack().removeClass("ui-menu ui-widget ui-widget-content ui-menu-icons ui-front").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show(),this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").removeUniqueId().removeClass("ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function(){var t=e(this);t.data("ui-menu-submenu-carat")&&t.remove()}),this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")},_keydown:function(t){var i,s,n,a,o=!0;switch(t.keyCode){case e.ui.keyCode.PAGE_UP:this.previousPage(t);break;case e.ui.keyCode.PAGE_DOWN:this.nextPage(t);break;case e.ui.keyCode.HOME:this._move("first","first",t);break;case e.ui.keyCode.END:this._move("last","last",t);break;case e.ui.keyCode.UP:this.previous(t);break;case e.ui.keyCode.DOWN:this.next(t);break;case e.ui.keyCode.LEFT:this.collapse(t);break;case e.ui.keyCode.RIGHT:this.active&&!this.active.is(".ui-state-disabled")&&this.expand(t);break;case e.ui.keyCode.ENTER:case e.ui.keyCode.SPACE:this._activate(t);break;case e.ui.keyCode.ESCAPE:this.collapse(t);break;default:o=!1,s=this.previousFilter||"",n=String.fromCharCode(t.keyCode),a=!1,clearTimeout(this.filterTimer),n===s?a=!0:n=s+n,i=this._filterMenuItems(n),i=a&&-1!==i.index(this.active.next())?this.active.nextAll(".ui-menu-item"):i,i.length||(n=String.fromCharCode(t.keyCode),i=this._filterMenuItems(n)),i.length?(this.focus(t,i),this.previousFilter=n,this.filterTimer=this._delay(function(){delete this.previousFilter},1e3)):delete this.previousFilter}o&&t.preventDefault()},_activate:function(e){this.active.is(".ui-state-disabled")||(this.active.is("[aria-haspopup='true']")?this.expand(e):this.select(e))},refresh:function(){var t,i,s=this,n=this.options.icons.submenu,a=this.element.find(this.options.menus);this.element.toggleClass("ui-menu-icons",!!this.element.find(".ui-icon").length),a.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-front").hide().attr({role:this.options.role,"aria-hidden":"true","aria-expanded":"false"}).each(function(){var t=e(this),i=t.parent(),s=e("<span>").addClass("ui-menu-icon ui-icon "+n).data("ui-menu-submenu-carat",!0);i.attr("aria-haspopup","true").prepend(s),t.attr("aria-labelledby",i.attr("id"))}),t=a.add(this.element),i=t.find(this.options.items),i.not(".ui-menu-item").each(function(){var t=e(this);s._isDivider(t)&&t.addClass("ui-widget-content ui-menu-divider")}),i.not(".ui-menu-item, .ui-menu-divider").addClass("ui-menu-item").uniqueId().attr({tabIndex:-1,role:this._itemRole()}),i.filter(".ui-state-disabled").attr("aria-disabled","true"),this.active&&!e.contains(this.element[0],this.active[0])&&this.blur()},_itemRole:function(){return{menu:"menuitem",listbox:"option"}[this.options.role]},_setOption:function(e,t){"icons"===e&&this.element.find(".ui-menu-icon").removeClass(this.options.icons.submenu).addClass(t.submenu),"disabled"===e&&this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this._super(e,t)},focus:function(e,t){var i,s;this.blur(e,e&&"focus"===e.type),this._scrollIntoView(t),this.active=t.first(),s=this.active.addClass("ui-state-focus").removeClass("ui-state-active"),this.options.role&&this.element.attr("aria-activedescendant",s.attr("id")),this.active.parent().closest(".ui-menu-item").addClass("ui-state-active"),e&&"keydown"===e.type?this._close():this.timer=this._delay(function(){this._close()},this.delay),i=t.children(".ui-menu"),i.length&&e&&/^mouse/.test(e.type)&&this._startOpening(i),this.activeMenu=t.parent(),this._trigger("focus",e,{item:t})},_scrollIntoView:function(t){var i,s,n,a,o,r;this._hasScroll()&&(i=parseFloat(e.css(this.activeMenu[0],"borderTopWidth"))||0,s=parseFloat(e.css(this.activeMenu[0],"paddingTop"))||0,n=t.offset().top-this.activeMenu.offset().top-i-s,a=this.activeMenu.scrollTop(),o=this.activeMenu.height(),r=t.outerHeight(),0>n?this.activeMenu.scrollTop(a+n):n+r>o&&this.activeMenu.scrollTop(a+n-o+r))},blur:function(e,t){t||clearTimeout(this.timer),this.active&&(this.active.removeClass("ui-state-focus"),this.active=null,this._trigger("blur",e,{item:this.active}))},_startOpening:function(e){clearTimeout(this.timer),"true"===e.attr("aria-hidden")&&(this.timer=this._delay(function(){this._close(),this._open(e)},this.delay))},_open:function(t){var i=e.extend({of:this.active},this.options.position);clearTimeout(this.timer),this.element.find(".ui-menu").not(t.parents(".ui-menu")).hide().attr("aria-hidden","true"),t.show().removeAttr("aria-hidden").attr("aria-expanded","true").position(i)},collapseAll:function(t,i){clearTimeout(this.timer),this.timer=this._delay(function(){var s=i?this.element:e(t&&t.target).closest(this.element.find(".ui-menu"));s.length||(s=this.element),this._close(s),this.blur(t),this.activeMenu=s},this.delay)},_close:function(e){e||(e=this.active?this.active.parent():this.element),e.find(".ui-menu").hide().attr("aria-hidden","true").attr("aria-expanded","false").end().find(".ui-state-active").not(".ui-state-focus").removeClass("ui-state-active")},_closeOnDocumentClick:function(t){return!e(t.target).closest(".ui-menu").length},_isDivider:function(e){return!/[^\-\u2014\u2013\s]/.test(e.text())},collapse:function(e){var t=this.active&&this.active.parent().closest(".ui-menu-item",this.element);t&&t.length&&(this._close(),this.focus(e,t))},expand:function(e){var t=this.active&&this.active.children(".ui-menu ").find(this.options.items).first();t&&t.length&&(this._open(t.parent()),this._delay(function(){this.focus(e,t)}))},next:function(e){this._move("next","first",e)},previous:function(e){this._move("prev","last",e)},isFirstItem:function(){return this.active&&!this.active.prevAll(".ui-menu-item").length},isLastItem:function(){return this.active&&!this.active.nextAll(".ui-menu-item").length},_move:function(e,t,i){var s;this.active&&(s="first"===e||"last"===e?this.active["first"===e?"prevAll":"nextAll"](".ui-menu-item").eq(-1):this.active[e+"All"](".ui-menu-item").eq(0)),s&&s.length&&this.active||(s=this.activeMenu.find(this.options.items)[t]()),this.focus(i,s)},nextPage:function(t){var i,s,n;return this.active?(this.isLastItem()||(this._hasScroll()?(s=this.active.offset().top,n=this.element.height(),this.active.nextAll(".ui-menu-item").each(function(){return i=e(this),0>i.offset().top-s-n}),this.focus(t,i)):this.focus(t,this.activeMenu.find(this.options.items)[this.active?"last":"first"]())),void 0):(this.next(t),void 0)},previousPage:function(t){var i,s,n;return this.active?(this.isFirstItem()||(this._hasScroll()?(s=this.active.offset().top,n=this.element.height(),this.active.prevAll(".ui-menu-item").each(function(){return i=e(this),i.offset().top-s+n>0}),this.focus(t,i)):this.focus(t,this.activeMenu.find(this.options.items).first())),void 0):(this.next(t),void 0)},_hasScroll:function(){return this.element.outerHeight()<this.element.prop("scrollHeight")},select:function(t){this.active=this.active||e(t.target).closest(".ui-menu-item");var i={item:this.active};this.active.has(".ui-menu").length||this.collapseAll(t,!0),this._trigger("select",t,i)},_filterMenuItems:function(t){var i=t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&"),s=RegExp("^"+i,"i");return this.activeMenu.find(this.options.items).filter(".ui-menu-item").filter(function(){return s.test(e.trim(e(this).text()))})}}),e.widget("ui.autocomplete",{version:"1.11.2",defaultElement:"<input>",options:{appendTo:null,autoFocus:!1,delay:300,minLength:1,position:{my:"left top",at:"left bottom",collision:"none"},source:null,change:null,close:null,focus:null,open:null,response:null,search:null,select:null},requestIndex:0,pending:0,_create:function(){var t,i,s,n=this.element[0].nodeName.toLowerCase(),a="textarea"===n,o="input"===n;this.isMultiLine=a?!0:o?!1:this.element.prop("isContentEditable"),this.valueMethod=this.element[a||o?"val":"text"],this.isNewMenu=!0,this.element.addClass("ui-autocomplete-input").attr("autocomplete","off"),this._on(this.element,{keydown:function(n){if(this.element.prop("readOnly"))return t=!0,s=!0,i=!0,void 0;t=!1,s=!1,i=!1;var a=e.ui.keyCode;switch(n.keyCode){case a.PAGE_UP:t=!0,this._move("previousPage",n);break;case a.PAGE_DOWN:t=!0,this._move("nextPage",n);break;case a.UP:t=!0,this._keyEvent("previous",n);break;case a.DOWN:t=!0,this._keyEvent("next",n);break;case a.ENTER:this.menu.active&&(t=!0,n.preventDefault(),this.menu.select(n));break;case a.TAB:this.menu.active&&this.menu.select(n);break;case a.ESCAPE:this.menu.element.is(":visible")&&(this.isMultiLine||this._value(this.term),this.close(n),n.preventDefault());break;default:i=!0,this._searchTimeout(n)}},keypress:function(s){if(t)return t=!1,(!this.isMultiLine||this.menu.element.is(":visible"))&&s.preventDefault(),void 0;if(!i){var n=e.ui.keyCode;switch(s.keyCode){case n.PAGE_UP:this._move("previousPage",s);break;case n.PAGE_DOWN:this._move("nextPage",s);break;case n.UP:this._keyEvent("previous",s);break;case n.DOWN:this._keyEvent("next",s)}}},input:function(e){return s?(s=!1,e.preventDefault(),void 0):(this._searchTimeout(e),void 0)},focus:function(){this.selectedItem=null,this.previous=this._value()},blur:function(e){return this.cancelBlur?(delete this.cancelBlur,void 0):(clearTimeout(this.searching),this.close(e),this._change(e),void 0)}}),this._initSource(),this.menu=e("<ul>").addClass("ui-autocomplete ui-front").appendTo(this._appendTo()).menu({role:null}).hide().menu("instance"),this._on(this.menu.element,{mousedown:function(t){t.preventDefault(),this.cancelBlur=!0,this._delay(function(){delete this.cancelBlur});var i=this.menu.element[0];e(t.target).closest(".ui-menu-item").length||this._delay(function(){var t=this;this.document.one("mousedown",function(s){s.target===t.element[0]||s.target===i||e.contains(i,s.target)||t.close()})})},menufocus:function(t,i){var s,n;return this.isNewMenu&&(this.isNewMenu=!1,t.originalEvent&&/^mouse/.test(t.originalEvent.type))?(this.menu.blur(),this.document.one("mousemove",function(){e(t.target).trigger(t.originalEvent)}),void 0):(n=i.item.data("ui-autocomplete-item"),!1!==this._trigger("focus",t,{item:n})&&t.originalEvent&&/^key/.test(t.originalEvent.type)&&this._value(n.value),s=i.item.attr("aria-label")||n.value,s&&e.trim(s).length&&(this.liveRegion.children().hide(),e("<div>").text(s).appendTo(this.liveRegion)),void 0)},menuselect:function(e,t){var i=t.item.data("ui-autocomplete-item"),s=this.previous;this.element[0]!==this.document[0].activeElement&&(this.element.focus(),this.previous=s,this._delay(function(){this.previous=s,this.selectedItem=i})),!1!==this._trigger("select",e,{item:i})&&this._value(i.value),this.term=this._value(),this.close(e),this.selectedItem=i}}),this.liveRegion=e("<span>",{role:"status","aria-live":"assertive","aria-relevant":"additions"}).addClass("ui-helper-hidden-accessible").appendTo(this.document[0].body),this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")}})},_destroy:function(){clearTimeout(this.searching),this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete"),this.menu.element.remove(),this.liveRegion.remove()},_setOption:function(e,t){this._super(e,t),"source"===e&&this._initSource(),"appendTo"===e&&this.menu.element.appendTo(this._appendTo()),"disabled"===e&&t&&this.xhr&&this.xhr.abort()},_appendTo:function(){var t=this.options.appendTo;return t&&(t=t.jquery||t.nodeType?e(t):this.document.find(t).eq(0)),t&&t[0]||(t=this.element.closest(".ui-front")),t.length||(t=this.document[0].body),t},_initSource:function(){var t,i,s=this;e.isArray(this.options.source)?(t=this.options.source,this.source=function(i,s){s(e.ui.autocomplete.filter(t,i.term))}):"string"==typeof this.options.source?(i=this.options.source,this.source=function(t,n){s.xhr&&s.xhr.abort(),s.xhr=e.ajax({url:i,data:t,dataType:"json",success:function(e){n(e)},error:function(){n([])}})}):this.source=this.options.source},_searchTimeout:function(e){clearTimeout(this.searching),this.searching=this._delay(function(){var t=this.term===this._value(),i=this.menu.element.is(":visible"),s=e.altKey||e.ctrlKey||e.metaKey||e.shiftKey;(!t||t&&!i&&!s)&&(this.selectedItem=null,this.search(null,e))},this.options.delay)},search:function(e,t){return e=null!=e?e:this._value(),this.term=this._value(),e.length<this.options.minLength?this.close(t):this._trigger("search",t)!==!1?this._search(e):void 0},_search:function(e){this.pending++,this.element.addClass("ui-autocomplete-loading"),this.cancelSearch=!1,this.source({term:e},this._response())},_response:function(){var t=++this.requestIndex;return e.proxy(function(e){t===this.requestIndex&&this.__response(e),this.pending--,this.pending||this.element.removeClass("ui-autocomplete-loading")},this)},__response:function(e){e&&(e=this._normalize(e)),this._trigger("response",null,{content:e}),!this.options.disabled&&e&&e.length&&!this.cancelSearch?(this._suggest(e),this._trigger("open")):this._close()},close:function(e){this.cancelSearch=!0,this._close(e)},_close:function(e){this.menu.element.is(":visible")&&(this.menu.element.hide(),this.menu.blur(),this.isNewMenu=!0,this._trigger("close",e))},_change:function(e){this.previous!==this._value()&&this._trigger("change",e,{item:this.selectedItem})},_normalize:function(t){return t.length&&t[0].label&&t[0].value?t:e.map(t,function(t){return"string"==typeof t?{label:t,value:t}:e.extend({},t,{label:t.label||t.value,value:t.value||t.label})})},_suggest:function(t){var i=this.menu.element.empty();this._renderMenu(i,t),this.isNewMenu=!0,this.menu.refresh(),i.show(),this._resizeMenu(),i.position(e.extend({of:this.element},this.options.position)),this.options.autoFocus&&this.menu.next()},_resizeMenu:function(){var e=this.menu.element;e.outerWidth(Math.max(e.width("").outerWidth()+1,this.element.outerWidth()))},_renderMenu:function(t,i){var s=this;e.each(i,function(e,i){s._renderItemData(t,i)})},_renderItemData:function(e,t){return this._renderItem(e,t).data("ui-autocomplete-item",t)},_renderItem:function(t,i){return e("<li>").text(i.label).appendTo(t)},_move:function(e,t){return this.menu.element.is(":visible")?this.menu.isFirstItem()&&/^previous/.test(e)||this.menu.isLastItem()&&/^next/.test(e)?(this.isMultiLine||this._value(this.term),this.menu.blur(),void 0):(this.menu[e](t),void 0):(this.search(null,t),void 0)},widget:function(){return this.menu.element},_value:function(){return this.valueMethod.apply(this.element,arguments)},_keyEvent:function(e,t){(!this.isMultiLine||this.menu.element.is(":visible"))&&(this._move(e,t),t.preventDefault())}}),e.extend(e.ui.autocomplete,{escapeRegex:function(e){return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&")},filter:function(t,i){var s=RegExp(e.ui.autocomplete.escapeRegex(i),"i");return e.grep(t,function(e){return s.test(e.label||e.value||e)})}}),e.widget("ui.autocomplete",e.ui.autocomplete,{options:{messages:{noResults:"No search results.",results:function(e){return e+(e>1?" results are":" result is")+" available, use up and down arrow keys to navigate."}}},__response:function(t){var i;this._superApply(arguments),this.options.disabled||this.cancelSearch||(i=t&&t.length?this.options.messages.results(t.length):this.options.messages.noResults,this.liveRegion.children().hide(),e("<div>").text(i).appendTo(this.liveRegion))}}),e.ui.autocomplete;var c,p="ui-button ui-widget ui-state-default ui-corner-all",f="ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only",m=function(){var t=e(this);setTimeout(function(){t.find(":ui-button").button("refresh")},1)},g=function(t){var i=t.name,s=t.form,n=e([]);return i&&(i=i.replace(/'/g,"\\'"),n=s?e(s).find("[name='"+i+"'][type=radio]"):e("[name='"+i+"'][type=radio]",t.ownerDocument).filter(function(){return!this.form})),n};e.widget("ui.button",{version:"1.11.2",defaultElement:"<button>",options:{disabled:null,text:!0,label:null,icons:{primary:null,secondary:null}},_create:function(){this.element.closest("form").unbind("reset"+this.eventNamespace).bind("reset"+this.eventNamespace,m),"boolean"!=typeof this.options.disabled?this.options.disabled=!!this.element.prop("disabled"):this.element.prop("disabled",this.options.disabled),this._determineButtonType(),this.hasTitle=!!this.buttonElement.attr("title");var t=this,i=this.options,s="checkbox"===this.type||"radio"===this.type,n=s?"":"ui-state-active";null===i.label&&(i.label="input"===this.type?this.buttonElement.val():this.buttonElement.html()),this._hoverable(this.buttonElement),this.buttonElement.addClass(p).attr("role","button").bind("mouseenter"+this.eventNamespace,function(){i.disabled||this===c&&e(this).addClass("ui-state-active")}).bind("mouseleave"+this.eventNamespace,function(){i.disabled||e(this).removeClass(n)}).bind("click"+this.eventNamespace,function(e){i.disabled&&(e.preventDefault(),e.stopImmediatePropagation())}),this._on({focus:function(){this.buttonElement.addClass("ui-state-focus")},blur:function(){this.buttonElement.removeClass("ui-state-focus")}}),s&&this.element.bind("change"+this.eventNamespace,function(){t.refresh()}),"checkbox"===this.type?this.buttonElement.bind("click"+this.eventNamespace,function(){return i.disabled?!1:void 0}):"radio"===this.type?this.buttonElement.bind("click"+this.eventNamespace,function(){if(i.disabled)return!1;e(this).addClass("ui-state-active"),t.buttonElement.attr("aria-pressed","true");var s=t.element[0];g(s).not(s).map(function(){return e(this).button("widget")[0]}).removeClass("ui-state-active").attr("aria-pressed","false")}):(this.buttonElement.bind("mousedown"+this.eventNamespace,function(){return i.disabled?!1:(e(this).addClass("ui-state-active"),c=this,t.document.one("mouseup",function(){c=null}),void 0)}).bind("mouseup"+this.eventNamespace,function(){return i.disabled?!1:(e(this).removeClass("ui-state-active"),void 0)}).bind("keydown"+this.eventNamespace,function(t){return i.disabled?!1:((t.keyCode===e.ui.keyCode.SPACE||t.keyCode===e.ui.keyCode.ENTER)&&e(this).addClass("ui-state-active"),void 0)}).bind("keyup"+this.eventNamespace+" blur"+this.eventNamespace,function(){e(this).removeClass("ui-state-active")}),this.buttonElement.is("a")&&this.buttonElement.keyup(function(t){t.keyCode===e.ui.keyCode.SPACE&&e(this).click()})),this._setOption("disabled",i.disabled),this._resetButton()},_determineButtonType:function(){var e,t,i;this.type=this.element.is("[type=checkbox]")?"checkbox":this.element.is("[type=radio]")?"radio":this.element.is("input")?"input":"button","checkbox"===this.type||"radio"===this.type?(e=this.element.parents().last(),t="label[for='"+this.element.attr("id")+"']",this.buttonElement=e.find(t),this.buttonElement.length||(e=e.length?e.siblings():this.element.siblings(),this.buttonElement=e.filter(t),this.buttonElement.length||(this.buttonElement=e.find(t))),this.element.addClass("ui-helper-hidden-accessible"),i=this.element.is(":checked"),i&&this.buttonElement.addClass("ui-state-active"),this.buttonElement.prop("aria-pressed",i)):this.buttonElement=this.element},widget:function(){return this.buttonElement},_destroy:function(){this.element.removeClass("ui-helper-hidden-accessible"),this.buttonElement.removeClass(p+" ui-state-active "+f).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()),this.hasTitle||this.buttonElement.removeAttr("title")},_setOption:function(e,t){return this._super(e,t),"disabled"===e?(this.widget().toggleClass("ui-state-disabled",!!t),this.element.prop("disabled",!!t),t&&("checkbox"===this.type||"radio"===this.type?this.buttonElement.removeClass("ui-state-focus"):this.buttonElement.removeClass("ui-state-focus ui-state-active")),void 0):(this._resetButton(),void 0)},refresh:function(){var t=this.element.is("input, button")?this.element.is(":disabled"):this.element.hasClass("ui-button-disabled");t!==this.options.disabled&&this._setOption("disabled",t),"radio"===this.type?g(this.element[0]).each(function(){e(this).is(":checked")?e(this).button("widget").addClass("ui-state-active").attr("aria-pressed","true"):e(this).button("widget").removeClass("ui-state-active").attr("aria-pressed","false")}):"checkbox"===this.type&&(this.element.is(":checked")?this.buttonElement.addClass("ui-state-active").attr("aria-pressed","true"):this.buttonElement.removeClass("ui-state-active").attr("aria-pressed","false"))},_resetButton:function(){if("input"===this.type)return this.options.label&&this.element.val(this.options.label),void 0;var t=this.buttonElement.removeClass(f),i=e("<span></span>",this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(t.empty()).text(),s=this.options.icons,n=s.primary&&s.secondary,a=[];s.primary||s.secondary?(this.options.text&&a.push("ui-button-text-icon"+(n?"s":s.primary?"-primary":"-secondary")),s.primary&&t.prepend("<span class='ui-button-icon-primary ui-icon "+s.primary+"'></span>"),s.secondary&&t.append("<span class='ui-button-icon-secondary ui-icon "+s.secondary+"'></span>"),this.options.text||(a.push(n?"ui-button-icons-only":"ui-button-icon-only"),this.hasTitle||t.attr("title",e.trim(i)))):a.push("ui-button-text-only"),t.addClass(a.join(" "))}}),e.widget("ui.buttonset",{version:"1.11.2",options:{items:"button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(ui-button)"},_create:function(){this.element.addClass("ui-buttonset")},_init:function(){this.refresh()},_setOption:function(e,t){"disabled"===e&&this.buttons.button("option",e,t),this._super(e,t)},refresh:function(){var t="rtl"===this.element.css("direction"),i=this.element.find(this.options.items),s=i.filter(":ui-button");i.not(":ui-button").button(),s.button("refresh"),this.buttons=i.map(function(){return e(this).button("widget")[0]}).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(t?"ui-corner-right":"ui-corner-left").end().filter(":last").addClass(t?"ui-corner-left":"ui-corner-right").end().end()},_destroy:function(){this.element.removeClass("ui-buttonset"),this.buttons.map(function(){return e(this).button("widget")[0]}).removeClass("ui-corner-left ui-corner-right").end().button("destroy")}}),e.ui.button,e.extend(e.ui,{datepicker:{version:"1.11.2"}});var v;e.extend(n.prototype,{markerClassName:"hasDatepicker",maxRows:4,_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(e){return r(this._defaults,e||{}),this},_attachDatepicker:function(t,i){var s,n,a;s=t.nodeName.toLowerCase(),n="div"===s||"span"===s,t.id||(this.uuid+=1,t.id="dp"+this.uuid),a=this._newInst(e(t),n),a.settings=e.extend({},i||{}),"input"===s?this._connectDatepicker(t,a):n&&this._inlineDatepicker(t,a)},_newInst:function(t,i){var s=t[0].id.replace(/([^A-Za-z0-9_\-])/g,"\\\\$1");return{id:s,input:t,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:i,dpDiv:i?a(e("<div class='"+this._inlineClass+" ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all'></div>")):this.dpDiv}},_connectDatepicker:function(t,i){var s=e(t);i.append=e([]),i.trigger=e([]),s.hasClass(this.markerClassName)||(this._attachments(s,i),s.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp),this._autoSize(i),e.data(t,"datepicker",i),i.settings.disabled&&this._disableDatepicker(t))},_attachments:function(t,i){var s,n,a,o=this._get(i,"appendText"),r=this._get(i,"isRTL");i.append&&i.append.remove(),o&&(i.append=e("<span class='"+this._appendClass+"'>"+o+"</span>"),t[r?"before":"after"](i.append)),t.unbind("focus",this._showDatepicker),i.trigger&&i.trigger.remove(),s=this._get(i,"showOn"),("focus"===s||"both"===s)&&t.focus(this._showDatepicker),("button"===s||"both"===s)&&(n=this._get(i,"buttonText"),a=this._get(i,"buttonImage"),i.trigger=e(this._get(i,"buttonImageOnly")?e("<img/>").addClass(this._triggerClass).attr({src:a,alt:n,title:n}):e("<button type='button'></button>").addClass(this._triggerClass).html(a?e("<img/>").attr({src:a,alt:n,title:n}):n)),t[r?"before":"after"](i.trigger),i.trigger.click(function(){return e.datepicker._datepickerShowing&&e.datepicker._lastInput===t[0]?e.datepicker._hideDatepicker():e.datepicker._datepickerShowing&&e.datepicker._lastInput!==t[0]?(e.datepicker._hideDatepicker(),e.datepicker._showDatepicker(t[0])):e.datepicker._showDatepicker(t[0]),!1}))},_autoSize:function(e){if(this._get(e,"autoSize")&&!e.inline){var t,i,s,n,a=new Date(2009,11,20),o=this._get(e,"dateFormat");o.match(/[DM]/)&&(t=function(e){for(i=0,s=0,n=0;e.length>n;n++)e[n].length>i&&(i=e[n].length,s=n);return s},a.setMonth(t(this._get(e,o.match(/MM/)?"monthNames":"monthNamesShort"))),a.setDate(t(this._get(e,o.match(/DD/)?"dayNames":"dayNamesShort"))+20-a.getDay())),e.input.attr("size",this._formatDate(e,a).length)}},_inlineDatepicker:function(t,i){var s=e(t);s.hasClass(this.markerClassName)||(s.addClass(this.markerClassName).append(i.dpDiv),e.data(t,"datepicker",i),this._setDate(i,this._getDefaultDate(i),!0),this._updateDatepicker(i),this._updateAlternate(i),i.settings.disabled&&this._disableDatepicker(t),i.dpDiv.css("display","block"))},_dialogDatepicker:function(t,i,s,n,a){var o,h,l,u,d,c=this._dialogInst;return c||(this.uuid+=1,o="dp"+this.uuid,this._dialogInput=e("<input type='text' id='"+o+"' style='position: absolute; top: -100px; width: 0px;'/>"),this._dialogInput.keydown(this._doKeyDown),e("body").append(this._dialogInput),c=this._dialogInst=this._newInst(this._dialogInput,!1),c.settings={},e.data(this._dialogInput[0],"datepicker",c)),r(c.settings,n||{}),i=i&&i.constructor===Date?this._formatDate(c,i):i,this._dialogInput.val(i),this._pos=a?a.length?a:[a.pageX,a.pageY]:null,this._pos||(h=document.documentElement.clientWidth,l=document.documentElement.clientHeight,u=document.documentElement.scrollLeft||document.body.scrollLeft,d=document.documentElement.scrollTop||document.body.scrollTop,this._pos=[h/2-100+u,l/2-150+d]),this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),c.settings.onSelect=s,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),e.blockUI&&e.blockUI(this.dpDiv),e.data(this._dialogInput[0],"datepicker",c),this},_destroyDatepicker:function(t){var i,s=e(t),n=e.data(t,"datepicker");s.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),e.removeData(t,"datepicker"),"input"===i?(n.append.remove(),n.trigger.remove(),s.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)):("div"===i||"span"===i)&&s.removeClass(this.markerClassName).empty())
},_enableDatepicker:function(t){var i,s,n=e(t),a=e.data(t,"datepicker");n.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!1,a.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().removeClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!1)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}))},_disableDatepicker:function(t){var i,s,n=e(t),a=e.data(t,"datepicker");n.hasClass(this.markerClassName)&&(i=t.nodeName.toLowerCase(),"input"===i?(t.disabled=!0,a.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"})):("div"===i||"span"===i)&&(s=n.children("."+this._inlineClass),s.children().addClass("ui-state-disabled"),s.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",!0)),this._disabledInputs=e.map(this._disabledInputs,function(e){return e===t?null:e}),this._disabledInputs[this._disabledInputs.length]=t)},_isDisabledDatepicker:function(e){if(!e)return!1;for(var t=0;this._disabledInputs.length>t;t++)if(this._disabledInputs[t]===e)return!0;return!1},_getInst:function(t){try{return e.data(t,"datepicker")}catch(i){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(t,i,s){var n,a,o,h,l=this._getInst(t);return 2===arguments.length&&"string"==typeof i?"defaults"===i?e.extend({},e.datepicker._defaults):l?"all"===i?e.extend({},l.settings):this._get(l,i):null:(n=i||{},"string"==typeof i&&(n={},n[i]=s),l&&(this._curInst===l&&this._hideDatepicker(),a=this._getDateDatepicker(t,!0),o=this._getMinMaxDate(l,"min"),h=this._getMinMaxDate(l,"max"),r(l.settings,n),null!==o&&void 0!==n.dateFormat&&void 0===n.minDate&&(l.settings.minDate=this._formatDate(l,o)),null!==h&&void 0!==n.dateFormat&&void 0===n.maxDate&&(l.settings.maxDate=this._formatDate(l,h)),"disabled"in n&&(n.disabled?this._disableDatepicker(t):this._enableDatepicker(t)),this._attachments(e(t),l),this._autoSize(l),this._setDate(l,a),this._updateAlternate(l),this._updateDatepicker(l)),void 0)},_changeDatepicker:function(e,t,i){this._optionDatepicker(e,t,i)},_refreshDatepicker:function(e){var t=this._getInst(e);t&&this._updateDatepicker(t)},_setDateDatepicker:function(e,t){var i=this._getInst(e);i&&(this._setDate(i,t),this._updateDatepicker(i),this._updateAlternate(i))},_getDateDatepicker:function(e,t){var i=this._getInst(e);return i&&!i.inline&&this._setDateFromField(i,t),i?this._getDate(i):null},_doKeyDown:function(t){var i,s,n,a=e.datepicker._getInst(t.target),o=!0,r=a.dpDiv.is(".ui-datepicker-rtl");if(a._keyEvent=!0,e.datepicker._datepickerShowing)switch(t.keyCode){case 9:e.datepicker._hideDatepicker(),o=!1;break;case 13:return n=e("td."+e.datepicker._dayOverClass+":not(."+e.datepicker._currentClass+")",a.dpDiv),n[0]&&e.datepicker._selectDay(t.target,a.selectedMonth,a.selectedYear,n[0]),i=e.datepicker._get(a,"onSelect"),i?(s=e.datepicker._formatDate(a),i.apply(a.input?a.input[0]:null,[s,a])):e.datepicker._hideDatepicker(),!1;case 27:e.datepicker._hideDatepicker();break;case 33:e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(a,"stepBigMonths"):-e.datepicker._get(a,"stepMonths"),"M");break;case 34:e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(a,"stepBigMonths"):+e.datepicker._get(a,"stepMonths"),"M");break;case 35:(t.ctrlKey||t.metaKey)&&e.datepicker._clearDate(t.target),o=t.ctrlKey||t.metaKey;break;case 36:(t.ctrlKey||t.metaKey)&&e.datepicker._gotoToday(t.target),o=t.ctrlKey||t.metaKey;break;case 37:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,r?1:-1,"D"),o=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?-e.datepicker._get(a,"stepBigMonths"):-e.datepicker._get(a,"stepMonths"),"M");break;case 38:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,-7,"D"),o=t.ctrlKey||t.metaKey;break;case 39:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,r?-1:1,"D"),o=t.ctrlKey||t.metaKey,t.originalEvent.altKey&&e.datepicker._adjustDate(t.target,t.ctrlKey?+e.datepicker._get(a,"stepBigMonths"):+e.datepicker._get(a,"stepMonths"),"M");break;case 40:(t.ctrlKey||t.metaKey)&&e.datepicker._adjustDate(t.target,7,"D"),o=t.ctrlKey||t.metaKey;break;default:o=!1}else 36===t.keyCode&&t.ctrlKey?e.datepicker._showDatepicker(this):o=!1;o&&(t.preventDefault(),t.stopPropagation())},_doKeyPress:function(t){var i,s,n=e.datepicker._getInst(t.target);return e.datepicker._get(n,"constrainInput")?(i=e.datepicker._possibleChars(e.datepicker._get(n,"dateFormat")),s=String.fromCharCode(null==t.charCode?t.keyCode:t.charCode),t.ctrlKey||t.metaKey||" ">s||!i||i.indexOf(s)>-1):void 0},_doKeyUp:function(t){var i,s=e.datepicker._getInst(t.target);if(s.input.val()!==s.lastVal)try{i=e.datepicker.parseDate(e.datepicker._get(s,"dateFormat"),s.input?s.input.val():null,e.datepicker._getFormatConfig(s)),i&&(e.datepicker._setDateFromField(s),e.datepicker._updateAlternate(s),e.datepicker._updateDatepicker(s))}catch(n){}return!0},_showDatepicker:function(t){if(t=t.target||t,"input"!==t.nodeName.toLowerCase()&&(t=e("input",t.parentNode)[0]),!e.datepicker._isDisabledDatepicker(t)&&e.datepicker._lastInput!==t){var i,n,a,o,h,l,u;i=e.datepicker._getInst(t),e.datepicker._curInst&&e.datepicker._curInst!==i&&(e.datepicker._curInst.dpDiv.stop(!0,!0),i&&e.datepicker._datepickerShowing&&e.datepicker._hideDatepicker(e.datepicker._curInst.input[0])),n=e.datepicker._get(i,"beforeShow"),a=n?n.apply(t,[t,i]):{},a!==!1&&(r(i.settings,a),i.lastVal=null,e.datepicker._lastInput=t,e.datepicker._setDateFromField(i),e.datepicker._inDialog&&(t.value=""),e.datepicker._pos||(e.datepicker._pos=e.datepicker._findPos(t),e.datepicker._pos[1]+=t.offsetHeight),o=!1,e(t).parents().each(function(){return o|="fixed"===e(this).css("position"),!o}),h={left:e.datepicker._pos[0],top:e.datepicker._pos[1]},e.datepicker._pos=null,i.dpDiv.empty(),i.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),e.datepicker._updateDatepicker(i),h=e.datepicker._checkOffset(i,h,o),i.dpDiv.css({position:e.datepicker._inDialog&&e.blockUI?"static":o?"fixed":"absolute",display:"none",left:h.left+"px",top:h.top+"px"}),i.inline||(l=e.datepicker._get(i,"showAnim"),u=e.datepicker._get(i,"duration"),i.dpDiv.css("z-index",s(e(t))+1),e.datepicker._datepickerShowing=!0,e.effects&&e.effects.effect[l]?i.dpDiv.show(l,e.datepicker._get(i,"showOptions"),u):i.dpDiv[l||"show"](l?u:null),e.datepicker._shouldFocusInput(i)&&i.input.focus(),e.datepicker._curInst=i))}},_updateDatepicker:function(t){this.maxRows=4,v=t,t.dpDiv.empty().append(this._generateHTML(t)),this._attachHandlers(t);var i,s=this._getNumberOfMonths(t),n=s[1],a=17,r=t.dpDiv.find("."+this._dayOverClass+" a");r.length>0&&o.apply(r.get(0)),t.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),n>1&&t.dpDiv.addClass("ui-datepicker-multi-"+n).css("width",a*n+"em"),t.dpDiv[(1!==s[0]||1!==s[1]?"add":"remove")+"Class"]("ui-datepicker-multi"),t.dpDiv[(this._get(t,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),t===e.datepicker._curInst&&e.datepicker._datepickerShowing&&e.datepicker._shouldFocusInput(t)&&t.input.focus(),t.yearshtml&&(i=t.yearshtml,setTimeout(function(){i===t.yearshtml&&t.yearshtml&&t.dpDiv.find("select.ui-datepicker-year:first").replaceWith(t.yearshtml),i=t.yearshtml=null},0))},_shouldFocusInput:function(e){return e.input&&e.input.is(":visible")&&!e.input.is(":disabled")&&!e.input.is(":focus")},_checkOffset:function(t,i,s){var n=t.dpDiv.outerWidth(),a=t.dpDiv.outerHeight(),o=t.input?t.input.outerWidth():0,r=t.input?t.input.outerHeight():0,h=document.documentElement.clientWidth+(s?0:e(document).scrollLeft()),l=document.documentElement.clientHeight+(s?0:e(document).scrollTop());return i.left-=this._get(t,"isRTL")?n-o:0,i.left-=s&&i.left===t.input.offset().left?e(document).scrollLeft():0,i.top-=s&&i.top===t.input.offset().top+r?e(document).scrollTop():0,i.left-=Math.min(i.left,i.left+n>h&&h>n?Math.abs(i.left+n-h):0),i.top-=Math.min(i.top,i.top+a>l&&l>a?Math.abs(a+r):0),i},_findPos:function(t){for(var i,s=this._getInst(t),n=this._get(s,"isRTL");t&&("hidden"===t.type||1!==t.nodeType||e.expr.filters.hidden(t));)t=t[n?"previousSibling":"nextSibling"];return i=e(t).offset(),[i.left,i.top]},_hideDatepicker:function(t){var i,s,n,a,o=this._curInst;!o||t&&o!==e.data(t,"datepicker")||this._datepickerShowing&&(i=this._get(o,"showAnim"),s=this._get(o,"duration"),n=function(){e.datepicker._tidyDialog(o)},e.effects&&(e.effects.effect[i]||e.effects[i])?o.dpDiv.hide(i,e.datepicker._get(o,"showOptions"),s,n):o.dpDiv["slideDown"===i?"slideUp":"fadeIn"===i?"fadeOut":"hide"](i?s:null,n),i||n(),this._datepickerShowing=!1,a=this._get(o,"onClose"),a&&a.apply(o.input?o.input[0]:null,[o.input?o.input.val():"",o]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),e.blockUI&&(e.unblockUI(),e("body").append(this.dpDiv))),this._inDialog=!1)},_tidyDialog:function(e){e.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")},_checkExternalClick:function(t){if(e.datepicker._curInst){var i=e(t.target),s=e.datepicker._getInst(i[0]);(i[0].id!==e.datepicker._mainDivId&&0===i.parents("#"+e.datepicker._mainDivId).length&&!i.hasClass(e.datepicker.markerClassName)&&!i.closest("."+e.datepicker._triggerClass).length&&e.datepicker._datepickerShowing&&(!e.datepicker._inDialog||!e.blockUI)||i.hasClass(e.datepicker.markerClassName)&&e.datepicker._curInst!==s)&&e.datepicker._hideDatepicker()}},_adjustDate:function(t,i,s){var n=e(t),a=this._getInst(n[0]);this._isDisabledDatepicker(n[0])||(this._adjustInstDate(a,i+("M"===s?this._get(a,"showCurrentAtPos"):0),s),this._updateDatepicker(a))},_gotoToday:function(t){var i,s=e(t),n=this._getInst(s[0]);this._get(n,"gotoCurrent")&&n.currentDay?(n.selectedDay=n.currentDay,n.drawMonth=n.selectedMonth=n.currentMonth,n.drawYear=n.selectedYear=n.currentYear):(i=new Date,n.selectedDay=i.getDate(),n.drawMonth=n.selectedMonth=i.getMonth(),n.drawYear=n.selectedYear=i.getFullYear()),this._notifyChange(n),this._adjustDate(s)},_selectMonthYear:function(t,i,s){var n=e(t),a=this._getInst(n[0]);a["selected"+("M"===s?"Month":"Year")]=a["draw"+("M"===s?"Month":"Year")]=parseInt(i.options[i.selectedIndex].value,10),this._notifyChange(a),this._adjustDate(n)},_selectDay:function(t,i,s,n){var a,o=e(t);e(n).hasClass(this._unselectableClass)||this._isDisabledDatepicker(o[0])||(a=this._getInst(o[0]),a.selectedDay=a.currentDay=e("a",n).html(),a.selectedMonth=a.currentMonth=i,a.selectedYear=a.currentYear=s,this._selectDate(t,this._formatDate(a,a.currentDay,a.currentMonth,a.currentYear)))},_clearDate:function(t){var i=e(t);this._selectDate(i,"")},_selectDate:function(t,i){var s,n=e(t),a=this._getInst(n[0]);i=null!=i?i:this._formatDate(a),a.input&&a.input.val(i),this._updateAlternate(a),s=this._get(a,"onSelect"),s?s.apply(a.input?a.input[0]:null,[i,a]):a.input&&a.input.trigger("change"),a.inline?this._updateDatepicker(a):(this._hideDatepicker(),this._lastInput=a.input[0],"object"!=typeof a.input[0]&&a.input.focus(),this._lastInput=null)},_updateAlternate:function(t){var i,s,n,a=this._get(t,"altField");a&&(i=this._get(t,"altFormat")||this._get(t,"dateFormat"),s=this._getDate(t),n=this.formatDate(i,s,this._getFormatConfig(t)),e(a).each(function(){e(this).val(n)}))},noWeekends:function(e){var t=e.getDay();return[t>0&&6>t,""]},iso8601Week:function(e){var t,i=new Date(e.getTime());return i.setDate(i.getDate()+4-(i.getDay()||7)),t=i.getTime(),i.setMonth(0),i.setDate(1),Math.floor(Math.round((t-i)/864e5)/7)+1},parseDate:function(t,i,s){if(null==t||null==i)throw"Invalid arguments";if(i="object"==typeof i?""+i:i+"",""===i)return null;var n,a,o,r,h=0,l=(s?s.shortYearCutoff:null)||this._defaults.shortYearCutoff,u="string"!=typeof l?l:(new Date).getFullYear()%100+parseInt(l,10),d=(s?s.dayNamesShort:null)||this._defaults.dayNamesShort,c=(s?s.dayNames:null)||this._defaults.dayNames,p=(s?s.monthNamesShort:null)||this._defaults.monthNamesShort,f=(s?s.monthNames:null)||this._defaults.monthNames,m=-1,g=-1,v=-1,y=-1,b=!1,_=function(e){var i=t.length>n+1&&t.charAt(n+1)===e;return i&&n++,i},x=function(e){var t=_(e),s="@"===e?14:"!"===e?20:"y"===e&&t?4:"o"===e?3:2,n="y"===e?s:1,a=RegExp("^\\d{"+n+","+s+"}"),o=i.substring(h).match(a);if(!o)throw"Missing number at position "+h;return h+=o[0].length,parseInt(o[0],10)},w=function(t,s,n){var a=-1,o=e.map(_(t)?n:s,function(e,t){return[[t,e]]}).sort(function(e,t){return-(e[1].length-t[1].length)});if(e.each(o,function(e,t){var s=t[1];return i.substr(h,s.length).toLowerCase()===s.toLowerCase()?(a=t[0],h+=s.length,!1):void 0}),-1!==a)return a+1;throw"Unknown name at position "+h},k=function(){if(i.charAt(h)!==t.charAt(n))throw"Unexpected literal at position "+h;h++};for(n=0;t.length>n;n++)if(b)"'"!==t.charAt(n)||_("'")?k():b=!1;else switch(t.charAt(n)){case"d":v=x("d");break;case"D":w("D",d,c);break;case"o":y=x("o");break;case"m":g=x("m");break;case"M":g=w("M",p,f);break;case"y":m=x("y");break;case"@":r=new Date(x("@")),m=r.getFullYear(),g=r.getMonth()+1,v=r.getDate();break;case"!":r=new Date((x("!")-this._ticksTo1970)/1e4),m=r.getFullYear(),g=r.getMonth()+1,v=r.getDate();break;case"'":_("'")?k():b=!0;break;default:k()}if(i.length>h&&(o=i.substr(h),!/^\s+/.test(o)))throw"Extra/unparsed characters found in date: "+o;if(-1===m?m=(new Date).getFullYear():100>m&&(m+=(new Date).getFullYear()-(new Date).getFullYear()%100+(u>=m?0:-100)),y>-1)for(g=1,v=y;;){if(a=this._getDaysInMonth(m,g-1),a>=v)break;g++,v-=a}if(r=this._daylightSavingAdjust(new Date(m,g-1,v)),r.getFullYear()!==m||r.getMonth()+1!==g||r.getDate()!==v)throw"Invalid date";return r},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:1e7*60*60*24*(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925)),formatDate:function(e,t,i){if(!t)return"";var s,n=(i?i.dayNamesShort:null)||this._defaults.dayNamesShort,a=(i?i.dayNames:null)||this._defaults.dayNames,o=(i?i.monthNamesShort:null)||this._defaults.monthNamesShort,r=(i?i.monthNames:null)||this._defaults.monthNames,h=function(t){var i=e.length>s+1&&e.charAt(s+1)===t;return i&&s++,i},l=function(e,t,i){var s=""+t;if(h(e))for(;i>s.length;)s="0"+s;return s},u=function(e,t,i,s){return h(e)?s[t]:i[t]},d="",c=!1;if(t)for(s=0;e.length>s;s++)if(c)"'"!==e.charAt(s)||h("'")?d+=e.charAt(s):c=!1;else switch(e.charAt(s)){case"d":d+=l("d",t.getDate(),2);break;case"D":d+=u("D",t.getDay(),n,a);break;case"o":d+=l("o",Math.round((new Date(t.getFullYear(),t.getMonth(),t.getDate()).getTime()-new Date(t.getFullYear(),0,0).getTime())/864e5),3);break;case"m":d+=l("m",t.getMonth()+1,2);break;case"M":d+=u("M",t.getMonth(),o,r);break;case"y":d+=h("y")?t.getFullYear():(10>t.getYear()%100?"0":"")+t.getYear()%100;break;case"@":d+=t.getTime();break;case"!":d+=1e4*t.getTime()+this._ticksTo1970;break;case"'":h("'")?d+="'":c=!0;break;default:d+=e.charAt(s)}return d},_possibleChars:function(e){var t,i="",s=!1,n=function(i){var s=e.length>t+1&&e.charAt(t+1)===i;return s&&t++,s};for(t=0;e.length>t;t++)if(s)"'"!==e.charAt(t)||n("'")?i+=e.charAt(t):s=!1;else switch(e.charAt(t)){case"d":case"m":case"y":case"@":i+="0123456789";break;case"D":case"M":return null;case"'":n("'")?i+="'":s=!0;break;default:i+=e.charAt(t)}return i},_get:function(e,t){return void 0!==e.settings[t]?e.settings[t]:this._defaults[t]},_setDateFromField:function(e,t){if(e.input.val()!==e.lastVal){var i=this._get(e,"dateFormat"),s=e.lastVal=e.input?e.input.val():null,n=this._getDefaultDate(e),a=n,o=this._getFormatConfig(e);try{a=this.parseDate(i,s,o)||n}catch(r){s=t?"":s}e.selectedDay=a.getDate(),e.drawMonth=e.selectedMonth=a.getMonth(),e.drawYear=e.selectedYear=a.getFullYear(),e.currentDay=s?a.getDate():0,e.currentMonth=s?a.getMonth():0,e.currentYear=s?a.getFullYear():0,this._adjustInstDate(e)}},_getDefaultDate:function(e){return this._restrictMinMax(e,this._determineDate(e,this._get(e,"defaultDate"),new Date))},_determineDate:function(t,i,s){var n=function(e){var t=new Date;return t.setDate(t.getDate()+e),t},a=function(i){try{return e.datepicker.parseDate(e.datepicker._get(t,"dateFormat"),i,e.datepicker._getFormatConfig(t))}catch(s){}for(var n=(i.toLowerCase().match(/^c/)?e.datepicker._getDate(t):null)||new Date,a=n.getFullYear(),o=n.getMonth(),r=n.getDate(),h=/([+\-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,l=h.exec(i);l;){switch(l[2]||"d"){case"d":case"D":r+=parseInt(l[1],10);break;case"w":case"W":r+=7*parseInt(l[1],10);break;case"m":case"M":o+=parseInt(l[1],10),r=Math.min(r,e.datepicker._getDaysInMonth(a,o));break;case"y":case"Y":a+=parseInt(l[1],10),r=Math.min(r,e.datepicker._getDaysInMonth(a,o))}l=h.exec(i)}return new Date(a,o,r)},o=null==i||""===i?s:"string"==typeof i?a(i):"number"==typeof i?isNaN(i)?s:n(i):new Date(i.getTime());return o=o&&"Invalid Date"==""+o?s:o,o&&(o.setHours(0),o.setMinutes(0),o.setSeconds(0),o.setMilliseconds(0)),this._daylightSavingAdjust(o)},_daylightSavingAdjust:function(e){return e?(e.setHours(e.getHours()>12?e.getHours()+2:0),e):null},_setDate:function(e,t,i){var s=!t,n=e.selectedMonth,a=e.selectedYear,o=this._restrictMinMax(e,this._determineDate(e,t,new Date));e.selectedDay=e.currentDay=o.getDate(),e.drawMonth=e.selectedMonth=e.currentMonth=o.getMonth(),e.drawYear=e.selectedYear=e.currentYear=o.getFullYear(),n===e.selectedMonth&&a===e.selectedYear||i||this._notifyChange(e),this._adjustInstDate(e),e.input&&e.input.val(s?"":this._formatDate(e))},_getDate:function(e){var t=!e.currentYear||e.input&&""===e.input.val()?null:this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return t},_attachHandlers:function(t){var i=this._get(t,"stepMonths"),s="#"+t.id.replace(/\\\\/g,"\\");t.dpDiv.find("[data-handler]").map(function(){var t={prev:function(){e.datepicker._adjustDate(s,-i,"M")},next:function(){e.datepicker._adjustDate(s,+i,"M")},hide:function(){e.datepicker._hideDatepicker()},today:function(){e.datepicker._gotoToday(s)},selectDay:function(){return e.datepicker._selectDay(s,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return e.datepicker._selectMonthYear(s,this,"M"),!1},selectYear:function(){return e.datepicker._selectMonthYear(s,this,"Y"),!1}};e(this).bind(this.getAttribute("data-event"),t[this.getAttribute("data-handler")])})},_generateHTML:function(e){var t,i,s,n,a,o,r,h,l,u,d,c,p,f,m,g,v,y,b,_,x,w,k,T,D,S,M,C,N,A,P,I,z,H,F,E,O,j,W,L=new Date,R=this._daylightSavingAdjust(new Date(L.getFullYear(),L.getMonth(),L.getDate())),Y=this._get(e,"isRTL"),B=this._get(e,"showButtonPanel"),J=this._get(e,"hideIfNoPrevNext"),q=this._get(e,"navigationAsDateFormat"),K=this._getNumberOfMonths(e),V=this._get(e,"showCurrentAtPos"),U=this._get(e,"stepMonths"),Q=1!==K[0]||1!==K[1],G=this._daylightSavingAdjust(e.currentDay?new Date(e.currentYear,e.currentMonth,e.currentDay):new Date(9999,9,9)),X=this._getMinMaxDate(e,"min"),$=this._getMinMaxDate(e,"max"),Z=e.drawMonth-V,et=e.drawYear;if(0>Z&&(Z+=12,et--),$)for(t=this._daylightSavingAdjust(new Date($.getFullYear(),$.getMonth()-K[0]*K[1]+1,$.getDate())),t=X&&X>t?X:t;this._daylightSavingAdjust(new Date(et,Z,1))>t;)Z--,0>Z&&(Z=11,et--);for(e.drawMonth=Z,e.drawYear=et,i=this._get(e,"prevText"),i=q?this.formatDate(i,this._daylightSavingAdjust(new Date(et,Z-U,1)),this._getFormatConfig(e)):i,s=this._canAdjustMonth(e,-1,et,Z)?"<a class='ui-datepicker-prev ui-corner-all' data-handler='prev' data-event='click' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>":J?"":"<a class='ui-datepicker-prev ui-corner-all ui-state-disabled' title='"+i+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"e":"w")+"'>"+i+"</span></a>",n=this._get(e,"nextText"),n=q?this.formatDate(n,this._daylightSavingAdjust(new Date(et,Z+U,1)),this._getFormatConfig(e)):n,a=this._canAdjustMonth(e,1,et,Z)?"<a class='ui-datepicker-next ui-corner-all' data-handler='next' data-event='click' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+n+"</span></a>":J?"":"<a class='ui-datepicker-next ui-corner-all ui-state-disabled' title='"+n+"'><span class='ui-icon ui-icon-circle-triangle-"+(Y?"w":"e")+"'>"+n+"</span></a>",o=this._get(e,"currentText"),r=this._get(e,"gotoCurrent")&&e.currentDay?G:R,o=q?this.formatDate(o,r,this._getFormatConfig(e)):o,h=e.inline?"":"<button type='button' class='ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all' data-handler='hide' data-event='click'>"+this._get(e,"closeText")+"</button>",l=B?"<div class='ui-datepicker-buttonpane ui-widget-content'>"+(Y?h:"")+(this._isInRange(e,r)?"<button type='button' class='ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all' data-handler='today' data-event='click'>"+o+"</button>":"")+(Y?"":h)+"</div>":"",u=parseInt(this._get(e,"firstDay"),10),u=isNaN(u)?0:u,d=this._get(e,"showWeek"),c=this._get(e,"dayNames"),p=this._get(e,"dayNamesMin"),f=this._get(e,"monthNames"),m=this._get(e,"monthNamesShort"),g=this._get(e,"beforeShowDay"),v=this._get(e,"showOtherMonths"),y=this._get(e,"selectOtherMonths"),b=this._getDefaultDate(e),_="",w=0;K[0]>w;w++){for(k="",this.maxRows=4,T=0;K[1]>T;T++){if(D=this._daylightSavingAdjust(new Date(et,Z,e.selectedDay)),S=" ui-corner-all",M="",Q){if(M+="<div class='ui-datepicker-group",K[1]>1)switch(T){case 0:M+=" ui-datepicker-group-first",S=" ui-corner-"+(Y?"right":"left");break;case K[1]-1:M+=" ui-datepicker-group-last",S=" ui-corner-"+(Y?"left":"right");break;default:M+=" ui-datepicker-group-middle",S=""}M+="'>"}for(M+="<div class='ui-datepicker-header ui-widget-header ui-helper-clearfix"+S+"'>"+(/all|left/.test(S)&&0===w?Y?a:s:"")+(/all|right/.test(S)&&0===w?Y?s:a:"")+this._generateMonthYearHeader(e,Z,et,X,$,w>0||T>0,f,m)+"</div><table class='ui-datepicker-calendar'><thead>"+"<tr>",C=d?"<th class='ui-datepicker-week-col'>"+this._get(e,"weekHeader")+"</th>":"",x=0;7>x;x++)N=(x+u)%7,C+="<th scope='col'"+((x+u+6)%7>=5?" class='ui-datepicker-week-end'":"")+">"+"<span title='"+c[N]+"'>"+p[N]+"</span></th>";for(M+=C+"</tr></thead><tbody>",A=this._getDaysInMonth(et,Z),et===e.selectedYear&&Z===e.selectedMonth&&(e.selectedDay=Math.min(e.selectedDay,A)),P=(this._getFirstDayOfMonth(et,Z)-u+7)%7,I=Math.ceil((P+A)/7),z=Q?this.maxRows>I?this.maxRows:I:I,this.maxRows=z,H=this._daylightSavingAdjust(new Date(et,Z,1-P)),F=0;z>F;F++){for(M+="<tr>",E=d?"<td class='ui-datepicker-week-col'>"+this._get(e,"calculateWeek")(H)+"</td>":"",x=0;7>x;x++)O=g?g.apply(e.input?e.input[0]:null,[H]):[!0,""],j=H.getMonth()!==Z,W=j&&!y||!O[0]||X&&X>H||$&&H>$,E+="<td class='"+((x+u+6)%7>=5?" ui-datepicker-week-end":"")+(j?" ui-datepicker-other-month":"")+(H.getTime()===D.getTime()&&Z===e.selectedMonth&&e._keyEvent||b.getTime()===H.getTime()&&b.getTime()===D.getTime()?" "+this._dayOverClass:"")+(W?" "+this._unselectableClass+" ui-state-disabled":"")+(j&&!v?"":" "+O[1]+(H.getTime()===G.getTime()?" "+this._currentClass:"")+(H.getTime()===R.getTime()?" ui-datepicker-today":""))+"'"+(j&&!v||!O[2]?"":" title='"+O[2].replace(/'/g,"&#39;")+"'")+(W?"":" data-handler='selectDay' data-event='click' data-month='"+H.getMonth()+"' data-year='"+H.getFullYear()+"'")+">"+(j&&!v?"&#xa0;":W?"<span class='ui-state-default'>"+H.getDate()+"</span>":"<a class='ui-state-default"+(H.getTime()===R.getTime()?" ui-state-highlight":"")+(H.getTime()===G.getTime()?" ui-state-active":"")+(j?" ui-priority-secondary":"")+"' href='#'>"+H.getDate()+"</a>")+"</td>",H.setDate(H.getDate()+1),H=this._daylightSavingAdjust(H);M+=E+"</tr>"}Z++,Z>11&&(Z=0,et++),M+="</tbody></table>"+(Q?"</div>"+(K[0]>0&&T===K[1]-1?"<div class='ui-datepicker-row-break'></div>":""):""),k+=M}_+=k}return _+=l,e._keyEvent=!1,_},_generateMonthYearHeader:function(e,t,i,s,n,a,o,r){var h,l,u,d,c,p,f,m,g=this._get(e,"changeMonth"),v=this._get(e,"changeYear"),y=this._get(e,"showMonthAfterYear"),b="<div class='ui-datepicker-title'>",_="";if(a||!g)_+="<span class='ui-datepicker-month'>"+o[t]+"</span>";else{for(h=s&&s.getFullYear()===i,l=n&&n.getFullYear()===i,_+="<select class='ui-datepicker-month' data-handler='selectMonth' data-event='change'>",u=0;12>u;u++)(!h||u>=s.getMonth())&&(!l||n.getMonth()>=u)&&(_+="<option value='"+u+"'"+(u===t?" selected='selected'":"")+">"+r[u]+"</option>");_+="</select>"}if(y||(b+=_+(!a&&g&&v?"":"&#xa0;")),!e.yearshtml)if(e.yearshtml="",a||!v)b+="<span class='ui-datepicker-year'>"+i+"</span>";else{for(d=this._get(e,"yearRange").split(":"),c=(new Date).getFullYear(),p=function(e){var t=e.match(/c[+\-].*/)?i+parseInt(e.substring(1),10):e.match(/[+\-].*/)?c+parseInt(e,10):parseInt(e,10);return isNaN(t)?c:t},f=p(d[0]),m=Math.max(f,p(d[1]||"")),f=s?Math.max(f,s.getFullYear()):f,m=n?Math.min(m,n.getFullYear()):m,e.yearshtml+="<select class='ui-datepicker-year' data-handler='selectYear' data-event='change'>";m>=f;f++)e.yearshtml+="<option value='"+f+"'"+(f===i?" selected='selected'":"")+">"+f+"</option>";e.yearshtml+="</select>",b+=e.yearshtml,e.yearshtml=null}return b+=this._get(e,"yearSuffix"),y&&(b+=(!a&&g&&v?"":"&#xa0;")+_),b+="</div>"},_adjustInstDate:function(e,t,i){var s=e.drawYear+("Y"===i?t:0),n=e.drawMonth+("M"===i?t:0),a=Math.min(e.selectedDay,this._getDaysInMonth(s,n))+("D"===i?t:0),o=this._restrictMinMax(e,this._daylightSavingAdjust(new Date(s,n,a)));e.selectedDay=o.getDate(),e.drawMonth=e.selectedMonth=o.getMonth(),e.drawYear=e.selectedYear=o.getFullYear(),("M"===i||"Y"===i)&&this._notifyChange(e)},_restrictMinMax:function(e,t){var i=this._getMinMaxDate(e,"min"),s=this._getMinMaxDate(e,"max"),n=i&&i>t?i:t;return s&&n>s?s:n},_notifyChange:function(e){var t=this._get(e,"onChangeMonthYear");t&&t.apply(e.input?e.input[0]:null,[e.selectedYear,e.selectedMonth+1,e])},_getNumberOfMonths:function(e){var t=this._get(e,"numberOfMonths");return null==t?[1,1]:"number"==typeof t?[1,t]:t},_getMinMaxDate:function(e,t){return this._determineDate(e,this._get(e,t+"Date"),null)},_getDaysInMonth:function(e,t){return 32-this._daylightSavingAdjust(new Date(e,t,32)).getDate()},_getFirstDayOfMonth:function(e,t){return new Date(e,t,1).getDay()},_canAdjustMonth:function(e,t,i,s){var n=this._getNumberOfMonths(e),a=this._daylightSavingAdjust(new Date(i,s+(0>t?t:n[0]*n[1]),1));return 0>t&&a.setDate(this._getDaysInMonth(a.getFullYear(),a.getMonth())),this._isInRange(e,a)},_isInRange:function(e,t){var i,s,n=this._getMinMaxDate(e,"min"),a=this._getMinMaxDate(e,"max"),o=null,r=null,h=this._get(e,"yearRange");return h&&(i=h.split(":"),s=(new Date).getFullYear(),o=parseInt(i[0],10),r=parseInt(i[1],10),i[0].match(/[+\-].*/)&&(o+=s),i[1].match(/[+\-].*/)&&(r+=s)),(!n||t.getTime()>=n.getTime())&&(!a||t.getTime()<=a.getTime())&&(!o||t.getFullYear()>=o)&&(!r||r>=t.getFullYear())},_getFormatConfig:function(e){var t=this._get(e,"shortYearCutoff");return t="string"!=typeof t?t:(new Date).getFullYear()%100+parseInt(t,10),{shortYearCutoff:t,dayNamesShort:this._get(e,"dayNamesShort"),dayNames:this._get(e,"dayNames"),monthNamesShort:this._get(e,"monthNamesShort"),monthNames:this._get(e,"monthNames")}},_formatDate:function(e,t,i,s){t||(e.currentDay=e.selectedDay,e.currentMonth=e.selectedMonth,e.currentYear=e.selectedYear);var n=t?"object"==typeof t?t:this._daylightSavingAdjust(new Date(s,i,t)):this._daylightSavingAdjust(new Date(e.currentYear,e.currentMonth,e.currentDay));return this.formatDate(this._get(e,"dateFormat"),n,this._getFormatConfig(e))}}),e.fn.datepicker=function(t){if(!this.length)return this;e.datepicker.initialized||(e(document).mousedown(e.datepicker._checkExternalClick),e.datepicker.initialized=!0),0===e("#"+e.datepicker._mainDivId).length&&e("body").append(e.datepicker.dpDiv);var i=Array.prototype.slice.call(arguments,1);return"string"!=typeof t||"isDisabled"!==t&&"getDate"!==t&&"widget"!==t?"option"===t&&2===arguments.length&&"string"==typeof arguments[1]?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i)):this.each(function(){"string"==typeof t?e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this].concat(i)):e.datepicker._attachDatepicker(this,t)}):e.datepicker["_"+t+"Datepicker"].apply(e.datepicker,[this[0]].concat(i))},e.datepicker=new n,e.datepicker.initialized=!1,e.datepicker.uuid=(new Date).getTime(),e.datepicker.version="1.11.2",e.datepicker,e.widget("ui.dialog",{version:"1.11.2",options:{appendTo:"body",autoOpen:!0,buttons:[],closeOnEscape:!0,closeText:"Close",dialogClass:"",draggable:!0,hide:null,height:"auto",maxHeight:null,maxWidth:null,minHeight:150,minWidth:150,modal:!1,position:{my:"center",at:"center",of:window,collision:"fit",using:function(t){var i=e(this).css(t).offset().top;0>i&&e(this).css("top",t.top-i)}},resizable:!0,show:null,title:null,width:300,beforeClose:null,close:null,drag:null,dragStart:null,dragStop:null,focus:null,open:null,resize:null,resizeStart:null,resizeStop:null},sizeRelatedOptions:{buttons:!0,height:!0,maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0,width:!0},resizableRelatedOptions:{maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0},_create:function(){this.originalCss={display:this.element[0].style.display,width:this.element[0].style.width,minHeight:this.element[0].style.minHeight,maxHeight:this.element[0].style.maxHeight,height:this.element[0].style.height},this.originalPosition={parent:this.element.parent(),index:this.element.parent().children().index(this.element)},this.originalTitle=this.element.attr("title"),this.options.title=this.options.title||this.originalTitle,this._createWrapper(),this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(this.uiDialog),this._createTitlebar(),this._createButtonPane(),this.options.draggable&&e.fn.draggable&&this._makeDraggable(),this.options.resizable&&e.fn.resizable&&this._makeResizable(),this._isOpen=!1,this._trackFocus()},_init:function(){this.options.autoOpen&&this.open()},_appendTo:function(){var t=this.options.appendTo;return t&&(t.jquery||t.nodeType)?e(t):this.document.find(t||"body").eq(0)},_destroy:function(){var e,t=this.originalPosition;this._destroyOverlay(),this.element.removeUniqueId().removeClass("ui-dialog-content ui-widget-content").css(this.originalCss).detach(),this.uiDialog.stop(!0,!0).remove(),this.originalTitle&&this.element.attr("title",this.originalTitle),e=t.parent.children().eq(t.index),e.length&&e[0]!==this.element[0]?e.before(this.element):t.parent.append(this.element)},widget:function(){return this.uiDialog},disable:e.noop,enable:e.noop,close:function(t){var i,s=this;if(this._isOpen&&this._trigger("beforeClose",t)!==!1){if(this._isOpen=!1,this._focusedElement=null,this._destroyOverlay(),this._untrackInstance(),!this.opener.filter(":focusable").focus().length)try{i=this.document[0].activeElement,i&&"body"!==i.nodeName.toLowerCase()&&e(i).blur()}catch(n){}this._hide(this.uiDialog,this.options.hide,function(){s._trigger("close",t)})}},isOpen:function(){return this._isOpen},moveToTop:function(){this._moveToTop()},_moveToTop:function(t,i){var s=!1,n=this.uiDialog.siblings(".ui-front:visible").map(function(){return+e(this).css("z-index")}).get(),a=Math.max.apply(null,n);return a>=+this.uiDialog.css("z-index")&&(this.uiDialog.css("z-index",a+1),s=!0),s&&!i&&this._trigger("focus",t),s},open:function(){var t=this;return this._isOpen?(this._moveToTop()&&this._focusTabbable(),void 0):(this._isOpen=!0,this.opener=e(this.document[0].activeElement),this._size(),this._position(),this._createOverlay(),this._moveToTop(null,!0),this.overlay&&this.overlay.css("z-index",this.uiDialog.css("z-index")-1),this._show(this.uiDialog,this.options.show,function(){t._focusTabbable(),t._trigger("focus")}),this._makeFocusTarget(),this._trigger("open"),void 0)},_focusTabbable:function(){var e=this._focusedElement;
e||(e=this.element.find("[autofocus]")),e.length||(e=this.element.find(":tabbable")),e.length||(e=this.uiDialogButtonPane.find(":tabbable")),e.length||(e=this.uiDialogTitlebarClose.filter(":tabbable")),e.length||(e=this.uiDialog),e.eq(0).focus()},_keepFocus:function(t){function i(){var t=this.document[0].activeElement,i=this.uiDialog[0]===t||e.contains(this.uiDialog[0],t);i||this._focusTabbable()}t.preventDefault(),i.call(this),this._delay(i)},_createWrapper:function(){this.uiDialog=e("<div>").addClass("ui-dialog ui-widget ui-widget-content ui-corner-all ui-front "+this.options.dialogClass).hide().attr({tabIndex:-1,role:"dialog"}).appendTo(this._appendTo()),this._on(this.uiDialog,{keydown:function(t){if(this.options.closeOnEscape&&!t.isDefaultPrevented()&&t.keyCode&&t.keyCode===e.ui.keyCode.ESCAPE)return t.preventDefault(),this.close(t),void 0;if(t.keyCode===e.ui.keyCode.TAB&&!t.isDefaultPrevented()){var i=this.uiDialog.find(":tabbable"),s=i.filter(":first"),n=i.filter(":last");t.target!==n[0]&&t.target!==this.uiDialog[0]||t.shiftKey?t.target!==s[0]&&t.target!==this.uiDialog[0]||!t.shiftKey||(this._delay(function(){n.focus()}),t.preventDefault()):(this._delay(function(){s.focus()}),t.preventDefault())}},mousedown:function(e){this._moveToTop(e)&&this._focusTabbable()}}),this.element.find("[aria-describedby]").length||this.uiDialog.attr({"aria-describedby":this.element.uniqueId().attr("id")})},_createTitlebar:function(){var t;this.uiDialogTitlebar=e("<div>").addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(this.uiDialog),this._on(this.uiDialogTitlebar,{mousedown:function(t){e(t.target).closest(".ui-dialog-titlebar-close")||this.uiDialog.focus()}}),this.uiDialogTitlebarClose=e("<button type='button'></button>").button({label:this.options.closeText,icons:{primary:"ui-icon-closethick"},text:!1}).addClass("ui-dialog-titlebar-close").appendTo(this.uiDialogTitlebar),this._on(this.uiDialogTitlebarClose,{click:function(e){e.preventDefault(),this.close(e)}}),t=e("<span>").uniqueId().addClass("ui-dialog-title").prependTo(this.uiDialogTitlebar),this._title(t),this.uiDialog.attr({"aria-labelledby":t.attr("id")})},_title:function(e){this.options.title||e.html("&#160;"),e.text(this.options.title)},_createButtonPane:function(){this.uiDialogButtonPane=e("<div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"),this.uiButtonSet=e("<div>").addClass("ui-dialog-buttonset").appendTo(this.uiDialogButtonPane),this._createButtons()},_createButtons:function(){var t=this,i=this.options.buttons;return this.uiDialogButtonPane.remove(),this.uiButtonSet.empty(),e.isEmptyObject(i)||e.isArray(i)&&!i.length?(this.uiDialog.removeClass("ui-dialog-buttons"),void 0):(e.each(i,function(i,s){var n,a;s=e.isFunction(s)?{click:s,text:i}:s,s=e.extend({type:"button"},s),n=s.click,s.click=function(){n.apply(t.element[0],arguments)},a={icons:s.icons,text:s.showText},delete s.icons,delete s.showText,e("<button></button>",s).button(a).appendTo(t.uiButtonSet)}),this.uiDialog.addClass("ui-dialog-buttons"),this.uiDialogButtonPane.appendTo(this.uiDialog),void 0)},_makeDraggable:function(){function t(e){return{position:e.position,offset:e.offset}}var i=this,s=this.options;this.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(s,n){e(this).addClass("ui-dialog-dragging"),i._blockFrames(),i._trigger("dragStart",s,t(n))},drag:function(e,s){i._trigger("drag",e,t(s))},stop:function(n,a){var o=a.offset.left-i.document.scrollLeft(),r=a.offset.top-i.document.scrollTop();s.position={my:"left top",at:"left"+(o>=0?"+":"")+o+" "+"top"+(r>=0?"+":"")+r,of:i.window},e(this).removeClass("ui-dialog-dragging"),i._unblockFrames(),i._trigger("dragStop",n,t(a))}})},_makeResizable:function(){function t(e){return{originalPosition:e.originalPosition,originalSize:e.originalSize,position:e.position,size:e.size}}var i=this,s=this.options,n=s.resizable,a=this.uiDialog.css("position"),o="string"==typeof n?n:"n,e,s,w,se,sw,ne,nw";this.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:this.element,maxWidth:s.maxWidth,maxHeight:s.maxHeight,minWidth:s.minWidth,minHeight:this._minHeight(),handles:o,start:function(s,n){e(this).addClass("ui-dialog-resizing"),i._blockFrames(),i._trigger("resizeStart",s,t(n))},resize:function(e,s){i._trigger("resize",e,t(s))},stop:function(n,a){var o=i.uiDialog.offset(),r=o.left-i.document.scrollLeft(),h=o.top-i.document.scrollTop();s.height=i.uiDialog.height(),s.width=i.uiDialog.width(),s.position={my:"left top",at:"left"+(r>=0?"+":"")+r+" "+"top"+(h>=0?"+":"")+h,of:i.window},e(this).removeClass("ui-dialog-resizing"),i._unblockFrames(),i._trigger("resizeStop",n,t(a))}}).css("position",a)},_trackFocus:function(){this._on(this.widget(),{focusin:function(t){this._makeFocusTarget(),this._focusedElement=e(t.target)}})},_makeFocusTarget:function(){this._untrackInstance(),this._trackingInstances().unshift(this)},_untrackInstance:function(){var t=this._trackingInstances(),i=e.inArray(this,t);-1!==i&&t.splice(i,1)},_trackingInstances:function(){var e=this.document.data("ui-dialog-instances");return e||(e=[],this.document.data("ui-dialog-instances",e)),e},_minHeight:function(){var e=this.options;return"auto"===e.height?e.minHeight:Math.min(e.minHeight,e.height)},_position:function(){var e=this.uiDialog.is(":visible");e||this.uiDialog.show(),this.uiDialog.position(this.options.position),e||this.uiDialog.hide()},_setOptions:function(t){var i=this,s=!1,n={};e.each(t,function(e,t){i._setOption(e,t),e in i.sizeRelatedOptions&&(s=!0),e in i.resizableRelatedOptions&&(n[e]=t)}),s&&(this._size(),this._position()),this.uiDialog.is(":data(ui-resizable)")&&this.uiDialog.resizable("option",n)},_setOption:function(e,t){var i,s,n=this.uiDialog;"dialogClass"===e&&n.removeClass(this.options.dialogClass).addClass(t),"disabled"!==e&&(this._super(e,t),"appendTo"===e&&this.uiDialog.appendTo(this._appendTo()),"buttons"===e&&this._createButtons(),"closeText"===e&&this.uiDialogTitlebarClose.button({label:""+t}),"draggable"===e&&(i=n.is(":data(ui-draggable)"),i&&!t&&n.draggable("destroy"),!i&&t&&this._makeDraggable()),"position"===e&&this._position(),"resizable"===e&&(s=n.is(":data(ui-resizable)"),s&&!t&&n.resizable("destroy"),s&&"string"==typeof t&&n.resizable("option","handles",t),s||t===!1||this._makeResizable()),"title"===e&&this._title(this.uiDialogTitlebar.find(".ui-dialog-title")))},_size:function(){var e,t,i,s=this.options;this.element.show().css({width:"auto",minHeight:0,maxHeight:"none",height:0}),s.minWidth>s.width&&(s.width=s.minWidth),e=this.uiDialog.css({height:"auto",width:s.width}).outerHeight(),t=Math.max(0,s.minHeight-e),i="number"==typeof s.maxHeight?Math.max(0,s.maxHeight-e):"none","auto"===s.height?this.element.css({minHeight:t,maxHeight:i,height:"auto"}):this.element.height(Math.max(0,s.height-e)),this.uiDialog.is(":data(ui-resizable)")&&this.uiDialog.resizable("option","minHeight",this._minHeight())},_blockFrames:function(){this.iframeBlocks=this.document.find("iframe").map(function(){var t=e(this);return e("<div>").css({position:"absolute",width:t.outerWidth(),height:t.outerHeight()}).appendTo(t.parent()).offset(t.offset())[0]})},_unblockFrames:function(){this.iframeBlocks&&(this.iframeBlocks.remove(),delete this.iframeBlocks)},_allowInteraction:function(t){return e(t.target).closest(".ui-dialog").length?!0:!!e(t.target).closest(".ui-datepicker").length},_createOverlay:function(){if(this.options.modal){var t=!0;this._delay(function(){t=!1}),this.document.data("ui-dialog-overlays")||this._on(this.document,{focusin:function(e){t||this._allowInteraction(e)||(e.preventDefault(),this._trackingInstances()[0]._focusTabbable())}}),this.overlay=e("<div>").addClass("ui-widget-overlay ui-front").appendTo(this._appendTo()),this._on(this.overlay,{mousedown:"_keepFocus"}),this.document.data("ui-dialog-overlays",(this.document.data("ui-dialog-overlays")||0)+1)}},_destroyOverlay:function(){if(this.options.modal&&this.overlay){var e=this.document.data("ui-dialog-overlays")-1;e?this.document.data("ui-dialog-overlays",e):this.document.unbind("focusin").removeData("ui-dialog-overlays"),this.overlay.remove(),this.overlay=null}}}),e.widget("ui.progressbar",{version:"1.11.2",options:{max:100,value:0,change:null,complete:null},min:0,_create:function(){this.oldValue=this.options.value=this._constrainedValue(),this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({role:"progressbar","aria-valuemin":this.min}),this.valueDiv=e("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element),this._refreshValue()},_destroy:function(){this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"),this.valueDiv.remove()},value:function(e){return void 0===e?this.options.value:(this.options.value=this._constrainedValue(e),this._refreshValue(),void 0)},_constrainedValue:function(e){return void 0===e&&(e=this.options.value),this.indeterminate=e===!1,"number"!=typeof e&&(e=0),this.indeterminate?!1:Math.min(this.options.max,Math.max(this.min,e))},_setOptions:function(e){var t=e.value;delete e.value,this._super(e),this.options.value=this._constrainedValue(t),this._refreshValue()},_setOption:function(e,t){"max"===e&&(t=Math.max(this.min,t)),"disabled"===e&&this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this._super(e,t)},_percentage:function(){return this.indeterminate?100:100*(this.options.value-this.min)/(this.options.max-this.min)},_refreshValue:function(){var t=this.options.value,i=this._percentage();this.valueDiv.toggle(this.indeterminate||t>this.min).toggleClass("ui-corner-right",t===this.options.max).width(i.toFixed(0)+"%"),this.element.toggleClass("ui-progressbar-indeterminate",this.indeterminate),this.indeterminate?(this.element.removeAttr("aria-valuenow"),this.overlayDiv||(this.overlayDiv=e("<div class='ui-progressbar-overlay'></div>").appendTo(this.valueDiv))):(this.element.attr({"aria-valuemax":this.options.max,"aria-valuenow":t}),this.overlayDiv&&(this.overlayDiv.remove(),this.overlayDiv=null)),this.oldValue!==t&&(this.oldValue=t,this._trigger("change")),t===this.options.max&&this._trigger("complete")}}),e.widget("ui.selectmenu",{version:"1.11.2",defaultElement:"<select>",options:{appendTo:null,disabled:null,icons:{button:"ui-icon-triangle-1-s"},position:{my:"left top",at:"left bottom",collision:"none"},width:null,change:null,close:null,focus:null,open:null,select:null},_create:function(){var e=this.element.uniqueId().attr("id");this.ids={element:e,button:e+"-button",menu:e+"-menu"},this._drawButton(),this._drawMenu(),this.options.disabled&&this.disable()},_drawButton:function(){var t=this,i=this.element.attr("tabindex");this.label=e("label[for='"+this.ids.element+"']").attr("for",this.ids.button),this._on(this.label,{click:function(e){this.button.focus(),e.preventDefault()}}),this.element.hide(),this.button=e("<span>",{"class":"ui-selectmenu-button ui-widget ui-state-default ui-corner-all",tabindex:i||this.options.disabled?-1:0,id:this.ids.button,role:"combobox","aria-expanded":"false","aria-autocomplete":"list","aria-owns":this.ids.menu,"aria-haspopup":"true"}).insertAfter(this.element),e("<span>",{"class":"ui-icon "+this.options.icons.button}).prependTo(this.button),this.buttonText=e("<span>",{"class":"ui-selectmenu-text"}).appendTo(this.button),this._setText(this.buttonText,this.element.find("option:selected").text()),this._resizeButton(),this._on(this.button,this._buttonEvents),this.button.one("focusin",function(){t.menuItems||t._refreshMenu()}),this._hoverable(this.button),this._focusable(this.button)},_drawMenu:function(){var t=this;this.menu=e("<ul>",{"aria-hidden":"true","aria-labelledby":this.ids.button,id:this.ids.menu}),this.menuWrap=e("<div>",{"class":"ui-selectmenu-menu ui-front"}).append(this.menu).appendTo(this._appendTo()),this.menuInstance=this.menu.menu({role:"listbox",select:function(e,i){e.preventDefault(),t._setSelection(),t._select(i.item.data("ui-selectmenu-item"),e)},focus:function(e,i){var s=i.item.data("ui-selectmenu-item");null!=t.focusIndex&&s.index!==t.focusIndex&&(t._trigger("focus",e,{item:s}),t.isOpen||t._select(s,e)),t.focusIndex=s.index,t.button.attr("aria-activedescendant",t.menuItems.eq(s.index).attr("id"))}}).menu("instance"),this.menu.addClass("ui-corner-bottom").removeClass("ui-corner-all"),this.menuInstance._off(this.menu,"mouseleave"),this.menuInstance._closeOnDocumentClick=function(){return!1},this.menuInstance._isDivider=function(){return!1}},refresh:function(){this._refreshMenu(),this._setText(this.buttonText,this._getSelectedItem().text()),this.options.width||this._resizeButton()},_refreshMenu:function(){this.menu.empty();var e,t=this.element.find("option");t.length&&(this._parseOptions(t),this._renderMenu(this.menu,this.items),this.menuInstance.refresh(),this.menuItems=this.menu.find("li").not(".ui-selectmenu-optgroup"),e=this._getSelectedItem(),this.menuInstance.focus(null,e),this._setAria(e.data("ui-selectmenu-item")),this._setOption("disabled",this.element.prop("disabled")))},open:function(e){this.options.disabled||(this.menuItems?(this.menu.find(".ui-state-focus").removeClass("ui-state-focus"),this.menuInstance.focus(null,this._getSelectedItem())):this._refreshMenu(),this.isOpen=!0,this._toggleAttr(),this._resizeMenu(),this._position(),this._on(this.document,this._documentClick),this._trigger("open",e))},_position:function(){this.menuWrap.position(e.extend({of:this.button},this.options.position))},close:function(e){this.isOpen&&(this.isOpen=!1,this._toggleAttr(),this.range=null,this._off(this.document),this._trigger("close",e))},widget:function(){return this.button},menuWidget:function(){return this.menu},_renderMenu:function(t,i){var s=this,n="";e.each(i,function(i,a){a.optgroup!==n&&(e("<li>",{"class":"ui-selectmenu-optgroup ui-menu-divider"+(a.element.parent("optgroup").prop("disabled")?" ui-state-disabled":""),text:a.optgroup}).appendTo(t),n=a.optgroup),s._renderItemData(t,a)})},_renderItemData:function(e,t){return this._renderItem(e,t).data("ui-selectmenu-item",t)},_renderItem:function(t,i){var s=e("<li>");return i.disabled&&s.addClass("ui-state-disabled"),this._setText(s,i.label),s.appendTo(t)},_setText:function(e,t){t?e.text(t):e.html("&#160;")},_move:function(e,t){var i,s,n=".ui-menu-item";this.isOpen?i=this.menuItems.eq(this.focusIndex):(i=this.menuItems.eq(this.element[0].selectedIndex),n+=":not(.ui-state-disabled)"),s="first"===e||"last"===e?i["first"===e?"prevAll":"nextAll"](n).eq(-1):i[e+"All"](n).eq(0),s.length&&this.menuInstance.focus(t,s)},_getSelectedItem:function(){return this.menuItems.eq(this.element[0].selectedIndex)},_toggle:function(e){this[this.isOpen?"close":"open"](e)},_setSelection:function(){var e;this.range&&(window.getSelection?(e=window.getSelection(),e.removeAllRanges(),e.addRange(this.range)):this.range.select(),this.button.focus())},_documentClick:{mousedown:function(t){this.isOpen&&(e(t.target).closest(".ui-selectmenu-menu, #"+this.ids.button).length||this.close(t))}},_buttonEvents:{mousedown:function(){var e;window.getSelection?(e=window.getSelection(),e.rangeCount&&(this.range=e.getRangeAt(0))):this.range=document.selection.createRange()},click:function(e){this._setSelection(),this._toggle(e)},keydown:function(t){var i=!0;switch(t.keyCode){case e.ui.keyCode.TAB:case e.ui.keyCode.ESCAPE:this.close(t),i=!1;break;case e.ui.keyCode.ENTER:this.isOpen&&this._selectFocusedItem(t);break;case e.ui.keyCode.UP:t.altKey?this._toggle(t):this._move("prev",t);break;case e.ui.keyCode.DOWN:t.altKey?this._toggle(t):this._move("next",t);break;case e.ui.keyCode.SPACE:this.isOpen?this._selectFocusedItem(t):this._toggle(t);break;case e.ui.keyCode.LEFT:this._move("prev",t);break;case e.ui.keyCode.RIGHT:this._move("next",t);break;case e.ui.keyCode.HOME:case e.ui.keyCode.PAGE_UP:this._move("first",t);break;case e.ui.keyCode.END:case e.ui.keyCode.PAGE_DOWN:this._move("last",t);break;default:this.menu.trigger(t),i=!1}i&&t.preventDefault()}},_selectFocusedItem:function(e){var t=this.menuItems.eq(this.focusIndex);t.hasClass("ui-state-disabled")||this._select(t.data("ui-selectmenu-item"),e)},_select:function(e,t){var i=this.element[0].selectedIndex;this.element[0].selectedIndex=e.index,this._setText(this.buttonText,e.label),this._setAria(e),this._trigger("select",t,{item:e}),e.index!==i&&this._trigger("change",t,{item:e}),this.close(t)},_setAria:function(e){var t=this.menuItems.eq(e.index).attr("id");this.button.attr({"aria-labelledby":t,"aria-activedescendant":t}),this.menu.attr("aria-activedescendant",t)},_setOption:function(e,t){"icons"===e&&this.button.find("span.ui-icon").removeClass(this.options.icons.button).addClass(t.button),this._super(e,t),"appendTo"===e&&this.menuWrap.appendTo(this._appendTo()),"disabled"===e&&(this.menuInstance.option("disabled",t),this.button.toggleClass("ui-state-disabled",t).attr("aria-disabled",t),this.element.prop("disabled",t),t?(this.button.attr("tabindex",-1),this.close()):this.button.attr("tabindex",0)),"width"===e&&this._resizeButton()},_appendTo:function(){var t=this.options.appendTo;return t&&(t=t.jquery||t.nodeType?e(t):this.document.find(t).eq(0)),t&&t[0]||(t=this.element.closest(".ui-front")),t.length||(t=this.document[0].body),t},_toggleAttr:function(){this.button.toggleClass("ui-corner-top",this.isOpen).toggleClass("ui-corner-all",!this.isOpen).attr("aria-expanded",this.isOpen),this.menuWrap.toggleClass("ui-selectmenu-open",this.isOpen),this.menu.attr("aria-hidden",!this.isOpen)},_resizeButton:function(){var e=this.options.width;e||(e=this.element.show().outerWidth(),this.element.hide()),this.button.outerWidth(e)},_resizeMenu:function(){this.menu.outerWidth(Math.max(this.button.outerWidth(),this.menu.width("").outerWidth()+1))},_getCreateOptions:function(){return{disabled:this.element.prop("disabled")}},_parseOptions:function(t){var i=[];t.each(function(t,s){var n=e(s),a=n.parent("optgroup");i.push({element:n,index:t,value:n.attr("value"),label:n.text(),optgroup:a.attr("label")||"",disabled:a.prop("disabled")||n.prop("disabled")})}),this.items=i},_destroy:function(){this.menuWrap.remove(),this.button.remove(),this.element.show(),this.element.removeUniqueId(),this.label.attr("for",this.ids.element)}}),e.widget("ui.slider",e.ui.mouse,{version:"1.11.2",widgetEventPrefix:"slide",options:{animate:!1,distance:0,max:100,min:0,orientation:"horizontal",range:!1,step:1,value:0,values:null,change:null,slide:null,start:null,stop:null},numPages:5,_create:function(){this._keySliding=!1,this._mouseSliding=!1,this._animateOff=!0,this._handleIndex=null,this._detectOrientation(),this._mouseInit(),this._calculateNewMax(),this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget"+" ui-widget-content"+" ui-corner-all"),this._refresh(),this._setOption("disabled",this.options.disabled),this._animateOff=!1},_refresh:function(){this._createRange(),this._createHandles(),this._setupEvents(),this._refreshValue()},_createHandles:function(){var t,i,s=this.options,n=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),a="<span class='ui-slider-handle ui-state-default ui-corner-all' tabindex='0'></span>",o=[];for(i=s.values&&s.values.length||1,n.length>i&&(n.slice(i).remove(),n=n.slice(0,i)),t=n.length;i>t;t++)o.push(a);this.handles=n.add(e(o.join("")).appendTo(this.element)),this.handle=this.handles.eq(0),this.handles.each(function(t){e(this).data("ui-slider-handle-index",t)})},_createRange:function(){var t=this.options,i="";t.range?(t.range===!0&&(t.values?t.values.length&&2!==t.values.length?t.values=[t.values[0],t.values[0]]:e.isArray(t.values)&&(t.values=t.values.slice(0)):t.values=[this._valueMin(),this._valueMin()]),this.range&&this.range.length?this.range.removeClass("ui-slider-range-min ui-slider-range-max").css({left:"",bottom:""}):(this.range=e("<div></div>").appendTo(this.element),i="ui-slider-range ui-widget-header ui-corner-all"),this.range.addClass(i+("min"===t.range||"max"===t.range?" ui-slider-range-"+t.range:""))):(this.range&&this.range.remove(),this.range=null)},_setupEvents:function(){this._off(this.handles),this._on(this.handles,this._handleEvents),this._hoverable(this.handles),this._focusable(this.handles)},_destroy:function(){this.handles.remove(),this.range&&this.range.remove(),this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-widget ui-widget-content ui-corner-all"),this._mouseDestroy()},_mouseCapture:function(t){var i,s,n,a,o,r,h,l,u=this,d=this.options;return d.disabled?!1:(this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()},this.elementOffset=this.element.offset(),i={x:t.pageX,y:t.pageY},s=this._normValueFromMouse(i),n=this._valueMax()-this._valueMin()+1,this.handles.each(function(t){var i=Math.abs(s-u.values(t));(n>i||n===i&&(t===u._lastChangedValue||u.values(t)===d.min))&&(n=i,a=e(this),o=t)}),r=this._start(t,o),r===!1?!1:(this._mouseSliding=!0,this._handleIndex=o,a.addClass("ui-state-active").focus(),h=a.offset(),l=!e(t.target).parents().addBack().is(".ui-slider-handle"),this._clickOffset=l?{left:0,top:0}:{left:t.pageX-h.left-a.width()/2,top:t.pageY-h.top-a.height()/2-(parseInt(a.css("borderTopWidth"),10)||0)-(parseInt(a.css("borderBottomWidth"),10)||0)+(parseInt(a.css("marginTop"),10)||0)},this.handles.hasClass("ui-state-hover")||this._slide(t,o,s),this._animateOff=!0,!0))},_mouseStart:function(){return!0},_mouseDrag:function(e){var t={x:e.pageX,y:e.pageY},i=this._normValueFromMouse(t);return this._slide(e,this._handleIndex,i),!1},_mouseStop:function(e){return this.handles.removeClass("ui-state-active"),this._mouseSliding=!1,this._stop(e,this._handleIndex),this._change(e,this._handleIndex),this._handleIndex=null,this._clickOffset=null,this._animateOff=!1,!1},_detectOrientation:function(){this.orientation="vertical"===this.options.orientation?"vertical":"horizontal"},_normValueFromMouse:function(e){var t,i,s,n,a;return"horizontal"===this.orientation?(t=this.elementSize.width,i=e.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)):(t=this.elementSize.height,i=e.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)),s=i/t,s>1&&(s=1),0>s&&(s=0),"vertical"===this.orientation&&(s=1-s),n=this._valueMax()-this._valueMin(),a=this._valueMin()+s*n,this._trimAlignValue(a)},_start:function(e,t){var i={handle:this.handles[t],value:this.value()};return this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("start",e,i)},_slide:function(e,t,i){var s,n,a;this.options.values&&this.options.values.length?(s=this.values(t?0:1),2===this.options.values.length&&this.options.range===!0&&(0===t&&i>s||1===t&&s>i)&&(i=s),i!==this.values(t)&&(n=this.values(),n[t]=i,a=this._trigger("slide",e,{handle:this.handles[t],value:i,values:n}),s=this.values(t?0:1),a!==!1&&this.values(t,i))):i!==this.value()&&(a=this._trigger("slide",e,{handle:this.handles[t],value:i}),a!==!1&&this.value(i))},_stop:function(e,t){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._trigger("stop",e,i)},_change:function(e,t){if(!this._keySliding&&!this._mouseSliding){var i={handle:this.handles[t],value:this.value()};this.options.values&&this.options.values.length&&(i.value=this.values(t),i.values=this.values()),this._lastChangedValue=t,this._trigger("change",e,i)}},value:function(e){return arguments.length?(this.options.value=this._trimAlignValue(e),this._refreshValue(),this._change(null,0),void 0):this._value()},values:function(t,i){var s,n,a;if(arguments.length>1)return this.options.values[t]=this._trimAlignValue(i),this._refreshValue(),this._change(null,t),void 0;if(!arguments.length)return this._values();if(!e.isArray(arguments[0]))return this.options.values&&this.options.values.length?this._values(t):this.value();for(s=this.options.values,n=arguments[0],a=0;s.length>a;a+=1)s[a]=this._trimAlignValue(n[a]),this._change(null,a);this._refreshValue()},_setOption:function(t,i){var s,n=0;switch("range"===t&&this.options.range===!0&&("min"===i?(this.options.value=this._values(0),this.options.values=null):"max"===i&&(this.options.value=this._values(this.options.values.length-1),this.options.values=null)),e.isArray(this.options.values)&&(n=this.options.values.length),"disabled"===t&&this.element.toggleClass("ui-state-disabled",!!i),this._super(t,i),t){case"orientation":this._detectOrientation(),this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation),this._refreshValue(),this.handles.css("horizontal"===i?"bottom":"left","");break;case"value":this._animateOff=!0,this._refreshValue(),this._change(null,0),this._animateOff=!1;break;case"values":for(this._animateOff=!0,this._refreshValue(),s=0;n>s;s+=1)this._change(null,s);this._animateOff=!1;break;case"step":case"min":case"max":this._animateOff=!0,this._calculateNewMax(),this._refreshValue(),this._animateOff=!1;break;case"range":this._animateOff=!0,this._refresh(),this._animateOff=!1}},_value:function(){var e=this.options.value;return e=this._trimAlignValue(e)},_values:function(e){var t,i,s;if(arguments.length)return t=this.options.values[e],t=this._trimAlignValue(t);if(this.options.values&&this.options.values.length){for(i=this.options.values.slice(),s=0;i.length>s;s+=1)i[s]=this._trimAlignValue(i[s]);return i}return[]},_trimAlignValue:function(e){if(this._valueMin()>=e)return this._valueMin();if(e>=this._valueMax())return this._valueMax();var t=this.options.step>0?this.options.step:1,i=(e-this._valueMin())%t,s=e-i;return 2*Math.abs(i)>=t&&(s+=i>0?t:-t),parseFloat(s.toFixed(5))},_calculateNewMax:function(){var e=(this.options.max-this._valueMin())%this.options.step;this.max=this.options.max-e},_valueMin:function(){return this.options.min},_valueMax:function(){return this.max},_refreshValue:function(){var t,i,s,n,a,o=this.options.range,r=this.options,h=this,l=this._animateOff?!1:r.animate,u={};this.options.values&&this.options.values.length?this.handles.each(function(s){i=100*((h.values(s)-h._valueMin())/(h._valueMax()-h._valueMin())),u["horizontal"===h.orientation?"left":"bottom"]=i+"%",e(this).stop(1,1)[l?"animate":"css"](u,r.animate),h.options.range===!0&&("horizontal"===h.orientation?(0===s&&h.range.stop(1,1)[l?"animate":"css"]({left:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({width:i-t+"%"},{queue:!1,duration:r.animate})):(0===s&&h.range.stop(1,1)[l?"animate":"css"]({bottom:i+"%"},r.animate),1===s&&h.range[l?"animate":"css"]({height:i-t+"%"},{queue:!1,duration:r.animate}))),t=i}):(s=this.value(),n=this._valueMin(),a=this._valueMax(),i=a!==n?100*((s-n)/(a-n)):0,u["horizontal"===this.orientation?"left":"bottom"]=i+"%",this.handle.stop(1,1)[l?"animate":"css"](u,r.animate),"min"===o&&"horizontal"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({width:i+"%"},r.animate),"max"===o&&"horizontal"===this.orientation&&this.range[l?"animate":"css"]({width:100-i+"%"},{queue:!1,duration:r.animate}),"min"===o&&"vertical"===this.orientation&&this.range.stop(1,1)[l?"animate":"css"]({height:i+"%"},r.animate),"max"===o&&"vertical"===this.orientation&&this.range[l?"animate":"css"]({height:100-i+"%"},{queue:!1,duration:r.animate}))},_handleEvents:{keydown:function(t){var i,s,n,a,o=e(t.target).data("ui-slider-handle-index");switch(t.keyCode){case e.ui.keyCode.HOME:case e.ui.keyCode.END:case e.ui.keyCode.PAGE_UP:case e.ui.keyCode.PAGE_DOWN:case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(t.preventDefault(),!this._keySliding&&(this._keySliding=!0,e(t.target).addClass("ui-state-active"),i=this._start(t,o),i===!1))return}switch(a=this.options.step,s=n=this.options.values&&this.options.values.length?this.values(o):this.value(),t.keyCode){case e.ui.keyCode.HOME:n=this._valueMin();break;case e.ui.keyCode.END:n=this._valueMax();break;case e.ui.keyCode.PAGE_UP:n=this._trimAlignValue(s+(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.PAGE_DOWN:n=this._trimAlignValue(s-(this._valueMax()-this._valueMin())/this.numPages);break;case e.ui.keyCode.UP:case e.ui.keyCode.RIGHT:if(s===this._valueMax())return;n=this._trimAlignValue(s+a);break;case e.ui.keyCode.DOWN:case e.ui.keyCode.LEFT:if(s===this._valueMin())return;n=this._trimAlignValue(s-a)}this._slide(t,o,n)},keyup:function(t){var i=e(t.target).data("ui-slider-handle-index");this._keySliding&&(this._keySliding=!1,this._stop(t,i),this._change(t,i),e(t.target).removeClass("ui-state-active"))}}}),e.widget("ui.spinner",{version:"1.11.2",defaultElement:"<input>",widgetEventPrefix:"spin",options:{culture:null,icons:{down:"ui-icon-triangle-1-s",up:"ui-icon-triangle-1-n"},incremental:!0,max:null,min:null,numberFormat:null,page:10,step:1,change:null,spin:null,start:null,stop:null},_create:function(){this._setOption("max",this.options.max),this._setOption("min",this.options.min),this._setOption("step",this.options.step),""!==this.value()&&this._value(this.element.val(),!0),this._draw(),this._on(this._events),this._refresh(),this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")}})},_getCreateOptions:function(){var t={},i=this.element;return e.each(["min","max","step"],function(e,s){var n=i.attr(s);void 0!==n&&n.length&&(t[s]=n)}),t},_events:{keydown:function(e){this._start(e)&&this._keydown(e)&&e.preventDefault()},keyup:"_stop",focus:function(){this.previous=this.element.val()},blur:function(e){return this.cancelBlur?(delete this.cancelBlur,void 0):(this._stop(),this._refresh(),this.previous!==this.element.val()&&this._trigger("change",e),void 0)},mousewheel:function(e,t){if(t){if(!this.spinning&&!this._start(e))return!1;this._spin((t>0?1:-1)*this.options.step,e),clearTimeout(this.mousewheelTimer),this.mousewheelTimer=this._delay(function(){this.spinning&&this._stop(e)},100),e.preventDefault()}},"mousedown .ui-spinner-button":function(t){function i(){var e=this.element[0]===this.document[0].activeElement;e||(this.element.focus(),this.previous=s,this._delay(function(){this.previous=s}))}var s;s=this.element[0]===this.document[0].activeElement?this.previous:this.element.val(),t.preventDefault(),i.call(this),this.cancelBlur=!0,this._delay(function(){delete this.cancelBlur,i.call(this)}),this._start(t)!==!1&&this._repeat(null,e(t.currentTarget).hasClass("ui-spinner-up")?1:-1,t)},"mouseup .ui-spinner-button":"_stop","mouseenter .ui-spinner-button":function(t){return e(t.currentTarget).hasClass("ui-state-active")?this._start(t)===!1?!1:(this._repeat(null,e(t.currentTarget).hasClass("ui-spinner-up")?1:-1,t),void 0):void 0},"mouseleave .ui-spinner-button":"_stop"},_draw:function(){var e=this.uiSpinner=this.element.addClass("ui-spinner-input").attr("autocomplete","off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml());this.element.attr("role","spinbutton"),this.buttons=e.find(".ui-spinner-button").attr("tabIndex",-1).button().removeClass("ui-corner-all"),this.buttons.height()>Math.ceil(.5*e.height())&&e.height()>0&&e.height(e.height()),this.options.disabled&&this.disable()},_keydown:function(t){var i=this.options,s=e.ui.keyCode;switch(t.keyCode){case s.UP:return this._repeat(null,1,t),!0;case s.DOWN:return this._repeat(null,-1,t),!0;case s.PAGE_UP:return this._repeat(null,i.page,t),!0;case s.PAGE_DOWN:return this._repeat(null,-i.page,t),!0}return!1},_uiSpinnerHtml:function(){return"<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>"},_buttonHtml:function(){return"<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon "+this.options.icons.up+"'>&#9650;</span>"+"</a>"+"<a class='ui-spinner-button ui-spinner-down ui-corner-br'>"+"<span class='ui-icon "+this.options.icons.down+"'>&#9660;</span>"+"</a>"
},_start:function(e){return this.spinning||this._trigger("start",e)!==!1?(this.counter||(this.counter=1),this.spinning=!0,!0):!1},_repeat:function(e,t,i){e=e||500,clearTimeout(this.timer),this.timer=this._delay(function(){this._repeat(40,t,i)},e),this._spin(t*this.options.step,i)},_spin:function(e,t){var i=this.value()||0;this.counter||(this.counter=1),i=this._adjustValue(i+e*this._increment(this.counter)),this.spinning&&this._trigger("spin",t,{value:i})===!1||(this._value(i),this.counter++)},_increment:function(t){var i=this.options.incremental;return i?e.isFunction(i)?i(t):Math.floor(t*t*t/5e4-t*t/500+17*t/200+1):1},_precision:function(){var e=this._precisionOf(this.options.step);return null!==this.options.min&&(e=Math.max(e,this._precisionOf(this.options.min))),e},_precisionOf:function(e){var t=""+e,i=t.indexOf(".");return-1===i?0:t.length-i-1},_adjustValue:function(e){var t,i,s=this.options;return t=null!==s.min?s.min:0,i=e-t,i=Math.round(i/s.step)*s.step,e=t+i,e=parseFloat(e.toFixed(this._precision())),null!==s.max&&e>s.max?s.max:null!==s.min&&s.min>e?s.min:e},_stop:function(e){this.spinning&&(clearTimeout(this.timer),clearTimeout(this.mousewheelTimer),this.counter=0,this.spinning=!1,this._trigger("stop",e))},_setOption:function(e,t){if("culture"===e||"numberFormat"===e){var i=this._parse(this.element.val());return this.options[e]=t,this.element.val(this._format(i)),void 0}("max"===e||"min"===e||"step"===e)&&"string"==typeof t&&(t=this._parse(t)),"icons"===e&&(this.buttons.first().find(".ui-icon").removeClass(this.options.icons.up).addClass(t.up),this.buttons.last().find(".ui-icon").removeClass(this.options.icons.down).addClass(t.down)),this._super(e,t),"disabled"===e&&(this.widget().toggleClass("ui-state-disabled",!!t),this.element.prop("disabled",!!t),this.buttons.button(t?"disable":"enable"))},_setOptions:h(function(e){this._super(e)}),_parse:function(e){return"string"==typeof e&&""!==e&&(e=window.Globalize&&this.options.numberFormat?Globalize.parseFloat(e,10,this.options.culture):+e),""===e||isNaN(e)?null:e},_format:function(e){return""===e?"":window.Globalize&&this.options.numberFormat?Globalize.format(e,this.options.numberFormat,this.options.culture):e},_refresh:function(){this.element.attr({"aria-valuemin":this.options.min,"aria-valuemax":this.options.max,"aria-valuenow":this._parse(this.element.val())})},isValid:function(){var e=this.value();return null===e?!1:e===this._adjustValue(e)},_value:function(e,t){var i;""!==e&&(i=this._parse(e),null!==i&&(t||(i=this._adjustValue(i)),e=this._format(i))),this.element.val(e),this._refresh()},_destroy:function(){this.element.removeClass("ui-spinner-input").prop("disabled",!1).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"),this.uiSpinner.replaceWith(this.element)},stepUp:h(function(e){this._stepUp(e)}),_stepUp:function(e){this._start()&&(this._spin((e||1)*this.options.step),this._stop())},stepDown:h(function(e){this._stepDown(e)}),_stepDown:function(e){this._start()&&(this._spin((e||1)*-this.options.step),this._stop())},pageUp:h(function(e){this._stepUp((e||1)*this.options.page)}),pageDown:h(function(e){this._stepDown((e||1)*this.options.page)}),value:function(e){return arguments.length?(h(this._value).call(this,e),void 0):this._parse(this.element.val())},widget:function(){return this.uiSpinner}}),e.widget("ui.tabs",{version:"1.11.2",delay:300,options:{active:null,collapsible:!1,event:"click",heightStyle:"content",hide:null,show:null,activate:null,beforeActivate:null,beforeLoad:null,load:null},_isLocal:function(){var e=/#.*$/;return function(t){var i,s;t=t.cloneNode(!1),i=t.href.replace(e,""),s=location.href.replace(e,"");try{i=decodeURIComponent(i)}catch(n){}try{s=decodeURIComponent(s)}catch(n){}return t.hash.length>1&&i===s}}(),_create:function(){var t=this,i=this.options;this.running=!1,this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible",i.collapsible),this._processTabs(),i.active=this._initialActive(),e.isArray(i.disabled)&&(i.disabled=e.unique(i.disabled.concat(e.map(this.tabs.filter(".ui-state-disabled"),function(e){return t.tabs.index(e)}))).sort()),this.active=this.options.active!==!1&&this.anchors.length?this._findActive(i.active):e(),this._refresh(),this.active.length&&this.load(i.active)},_initialActive:function(){var t=this.options.active,i=this.options.collapsible,s=location.hash.substring(1);return null===t&&(s&&this.tabs.each(function(i,n){return e(n).attr("aria-controls")===s?(t=i,!1):void 0}),null===t&&(t=this.tabs.index(this.tabs.filter(".ui-tabs-active"))),(null===t||-1===t)&&(t=this.tabs.length?0:!1)),t!==!1&&(t=this.tabs.index(this.tabs.eq(t)),-1===t&&(t=i?!1:0)),!i&&t===!1&&this.anchors.length&&(t=0),t},_getCreateEventData:function(){return{tab:this.active,panel:this.active.length?this._getPanelForTab(this.active):e()}},_tabKeydown:function(t){var i=e(this.document[0].activeElement).closest("li"),s=this.tabs.index(i),n=!0;if(!this._handlePageNav(t)){switch(t.keyCode){case e.ui.keyCode.RIGHT:case e.ui.keyCode.DOWN:s++;break;case e.ui.keyCode.UP:case e.ui.keyCode.LEFT:n=!1,s--;break;case e.ui.keyCode.END:s=this.anchors.length-1;break;case e.ui.keyCode.HOME:s=0;break;case e.ui.keyCode.SPACE:return t.preventDefault(),clearTimeout(this.activating),this._activate(s),void 0;case e.ui.keyCode.ENTER:return t.preventDefault(),clearTimeout(this.activating),this._activate(s===this.options.active?!1:s),void 0;default:return}t.preventDefault(),clearTimeout(this.activating),s=this._focusNextTab(s,n),t.ctrlKey||(i.attr("aria-selected","false"),this.tabs.eq(s).attr("aria-selected","true"),this.activating=this._delay(function(){this.option("active",s)},this.delay))}},_panelKeydown:function(t){this._handlePageNav(t)||t.ctrlKey&&t.keyCode===e.ui.keyCode.UP&&(t.preventDefault(),this.active.focus())},_handlePageNav:function(t){return t.altKey&&t.keyCode===e.ui.keyCode.PAGE_UP?(this._activate(this._focusNextTab(this.options.active-1,!1)),!0):t.altKey&&t.keyCode===e.ui.keyCode.PAGE_DOWN?(this._activate(this._focusNextTab(this.options.active+1,!0)),!0):void 0},_findNextTab:function(t,i){function s(){return t>n&&(t=0),0>t&&(t=n),t}for(var n=this.tabs.length-1;-1!==e.inArray(s(),this.options.disabled);)t=i?t+1:t-1;return t},_focusNextTab:function(e,t){return e=this._findNextTab(e,t),this.tabs.eq(e).focus(),e},_setOption:function(e,t){return"active"===e?(this._activate(t),void 0):"disabled"===e?(this._setupDisabled(t),void 0):(this._super(e,t),"collapsible"===e&&(this.element.toggleClass("ui-tabs-collapsible",t),t||this.options.active!==!1||this._activate(0)),"event"===e&&this._setupEvents(t),"heightStyle"===e&&this._setupHeightStyle(t),void 0)},_sanitizeSelector:function(e){return e?e.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g,"\\$&"):""},refresh:function(){var t=this.options,i=this.tablist.children(":has(a[href])");t.disabled=e.map(i.filter(".ui-state-disabled"),function(e){return i.index(e)}),this._processTabs(),t.active!==!1&&this.anchors.length?this.active.length&&!e.contains(this.tablist[0],this.active[0])?this.tabs.length===t.disabled.length?(t.active=!1,this.active=e()):this._activate(this._findNextTab(Math.max(0,t.active-1),!1)):t.active=this.tabs.index(this.active):(t.active=!1,this.active=e()),this._refresh()},_refresh:function(){this._setupDisabled(this.options.disabled),this._setupEvents(this.options.event),this._setupHeightStyle(this.options.heightStyle),this.tabs.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}),this.panels.not(this._getPanelForTab(this.active)).hide().attr({"aria-hidden":"true"}),this.active.length?(this.active.addClass("ui-tabs-active ui-state-active").attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}),this._getPanelForTab(this.active).show().attr({"aria-hidden":"false"})):this.tabs.eq(0).attr("tabIndex",0)},_processTabs:function(){var t=this,i=this.tabs,s=this.anchors,n=this.panels;this.tablist=this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role","tablist").delegate("> li","mousedown"+this.eventNamespace,function(t){e(this).is(".ui-state-disabled")&&t.preventDefault()}).delegate(".ui-tabs-anchor","focus"+this.eventNamespace,function(){e(this).closest("li").is(".ui-state-disabled")&&this.blur()}),this.tabs=this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({role:"tab",tabIndex:-1}),this.anchors=this.tabs.map(function(){return e("a",this)[0]}).addClass("ui-tabs-anchor").attr({role:"presentation",tabIndex:-1}),this.panels=e(),this.anchors.each(function(i,s){var n,a,o,r=e(s).uniqueId().attr("id"),h=e(s).closest("li"),l=h.attr("aria-controls");t._isLocal(s)?(n=s.hash,o=n.substring(1),a=t.element.find(t._sanitizeSelector(n))):(o=h.attr("aria-controls")||e({}).uniqueId()[0].id,n="#"+o,a=t.element.find(n),a.length||(a=t._createPanel(o),a.insertAfter(t.panels[i-1]||t.tablist)),a.attr("aria-live","polite")),a.length&&(t.panels=t.panels.add(a)),l&&h.data("ui-tabs-aria-controls",l),h.attr({"aria-controls":o,"aria-labelledby":r}),a.attr("aria-labelledby",r)}),this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role","tabpanel"),i&&(this._off(i.not(this.tabs)),this._off(s.not(this.anchors)),this._off(n.not(this.panels)))},_getList:function(){return this.tablist||this.element.find("ol,ul").eq(0)},_createPanel:function(t){return e("<div>").attr("id",t).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy",!0)},_setupDisabled:function(t){e.isArray(t)&&(t.length?t.length===this.anchors.length&&(t=!0):t=!1);for(var i,s=0;i=this.tabs[s];s++)t===!0||-1!==e.inArray(s,t)?e(i).addClass("ui-state-disabled").attr("aria-disabled","true"):e(i).removeClass("ui-state-disabled").removeAttr("aria-disabled");this.options.disabled=t},_setupEvents:function(t){var i={};t&&e.each(t.split(" "),function(e,t){i[t]="_eventHandler"}),this._off(this.anchors.add(this.tabs).add(this.panels)),this._on(!0,this.anchors,{click:function(e){e.preventDefault()}}),this._on(this.anchors,i),this._on(this.tabs,{keydown:"_tabKeydown"}),this._on(this.panels,{keydown:"_panelKeydown"}),this._focusable(this.tabs),this._hoverable(this.tabs)},_setupHeightStyle:function(t){var i,s=this.element.parent();"fill"===t?(i=s.height(),i-=this.element.outerHeight()-this.element.height(),this.element.siblings(":visible").each(function(){var t=e(this),s=t.css("position");"absolute"!==s&&"fixed"!==s&&(i-=t.outerHeight(!0))}),this.element.children().not(this.panels).each(function(){i-=e(this).outerHeight(!0)}),this.panels.each(function(){e(this).height(Math.max(0,i-e(this).innerHeight()+e(this).height()))}).css("overflow","auto")):"auto"===t&&(i=0,this.panels.each(function(){i=Math.max(i,e(this).height("").height())}).height(i))},_eventHandler:function(t){var i=this.options,s=this.active,n=e(t.currentTarget),a=n.closest("li"),o=a[0]===s[0],r=o&&i.collapsible,h=r?e():this._getPanelForTab(a),l=s.length?this._getPanelForTab(s):e(),u={oldTab:s,oldPanel:l,newTab:r?e():a,newPanel:h};t.preventDefault(),a.hasClass("ui-state-disabled")||a.hasClass("ui-tabs-loading")||this.running||o&&!i.collapsible||this._trigger("beforeActivate",t,u)===!1||(i.active=r?!1:this.tabs.index(a),this.active=o?e():a,this.xhr&&this.xhr.abort(),l.length||h.length||e.error("jQuery UI Tabs: Mismatching fragment identifier."),h.length&&this.load(this.tabs.index(a),t),this._toggle(t,u))},_toggle:function(t,i){function s(){a.running=!1,a._trigger("activate",t,i)}function n(){i.newTab.closest("li").addClass("ui-tabs-active ui-state-active"),o.length&&a.options.show?a._show(o,a.options.show,s):(o.show(),s())}var a=this,o=i.newPanel,r=i.oldPanel;this.running=!0,r.length&&this.options.hide?this._hide(r,this.options.hide,function(){i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),n()}):(i.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active"),r.hide(),n()),r.attr("aria-hidden","true"),i.oldTab.attr({"aria-selected":"false","aria-expanded":"false"}),o.length&&r.length?i.oldTab.attr("tabIndex",-1):o.length&&this.tabs.filter(function(){return 0===e(this).attr("tabIndex")}).attr("tabIndex",-1),o.attr("aria-hidden","false"),i.newTab.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0})},_activate:function(t){var i,s=this._findActive(t);s[0]!==this.active[0]&&(s.length||(s=this.active),i=s.find(".ui-tabs-anchor")[0],this._eventHandler({target:i,currentTarget:i,preventDefault:e.noop}))},_findActive:function(t){return t===!1?e():this.tabs.eq(t)},_getIndex:function(e){return"string"==typeof e&&(e=this.anchors.index(this.anchors.filter("[href$='"+e+"']"))),e},_destroy:function(){this.xhr&&this.xhr.abort(),this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible"),this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role"),this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeUniqueId(),this.tablist.unbind(this.eventNamespace),this.tabs.add(this.panels).each(function(){e.data(this,"ui-tabs-destroy")?e(this).remove():e(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")}),this.tabs.each(function(){var t=e(this),i=t.data("ui-tabs-aria-controls");i?t.attr("aria-controls",i).removeData("ui-tabs-aria-controls"):t.removeAttr("aria-controls")}),this.panels.show(),"content"!==this.options.heightStyle&&this.panels.css("height","")},enable:function(t){var i=this.options.disabled;i!==!1&&(void 0===t?i=!1:(t=this._getIndex(t),i=e.isArray(i)?e.map(i,function(e){return e!==t?e:null}):e.map(this.tabs,function(e,i){return i!==t?i:null})),this._setupDisabled(i))},disable:function(t){var i=this.options.disabled;if(i!==!0){if(void 0===t)i=!0;else{if(t=this._getIndex(t),-1!==e.inArray(t,i))return;i=e.isArray(i)?e.merge([t],i).sort():[t]}this._setupDisabled(i)}},load:function(t,i){t=this._getIndex(t);var s=this,n=this.tabs.eq(t),a=n.find(".ui-tabs-anchor"),o=this._getPanelForTab(n),r={tab:n,panel:o};this._isLocal(a[0])||(this.xhr=e.ajax(this._ajaxSettings(a,i,r)),this.xhr&&"canceled"!==this.xhr.statusText&&(n.addClass("ui-tabs-loading"),o.attr("aria-busy","true"),this.xhr.success(function(e){setTimeout(function(){o.html(e),s._trigger("load",i,r)},1)}).complete(function(e,t){setTimeout(function(){"abort"===t&&s.panels.stop(!1,!0),n.removeClass("ui-tabs-loading"),o.removeAttr("aria-busy"),e===s.xhr&&delete s.xhr},1)})))},_ajaxSettings:function(t,i,s){var n=this;return{url:t.attr("href"),beforeSend:function(t,a){return n._trigger("beforeLoad",i,e.extend({jqXHR:t,ajaxSettings:a},s))}}},_getPanelForTab:function(t){var i=e(t).attr("aria-controls");return this.element.find(this._sanitizeSelector("#"+i))}}),e.widget("ui.tooltip",{version:"1.11.2",options:{content:function(){var t=e(this).attr("title")||"";return e("<a>").text(t).html()},hide:!0,items:"[title]:not([disabled])",position:{my:"left top+15",at:"left bottom",collision:"flipfit flip"},show:!0,tooltipClass:null,track:!1,close:null,open:null},_addDescribedBy:function(t,i){var s=(t.attr("aria-describedby")||"").split(/\s+/);s.push(i),t.data("ui-tooltip-id",i).attr("aria-describedby",e.trim(s.join(" ")))},_removeDescribedBy:function(t){var i=t.data("ui-tooltip-id"),s=(t.attr("aria-describedby")||"").split(/\s+/),n=e.inArray(i,s);-1!==n&&s.splice(n,1),t.removeData("ui-tooltip-id"),s=e.trim(s.join(" ")),s?t.attr("aria-describedby",s):t.removeAttr("aria-describedby")},_create:function(){this._on({mouseover:"open",focusin:"open"}),this.tooltips={},this.parents={},this.options.disabled&&this._disable(),this.liveRegion=e("<div>").attr({role:"log","aria-live":"assertive","aria-relevant":"additions"}).addClass("ui-helper-hidden-accessible").appendTo(this.document[0].body)},_setOption:function(t,i){var s=this;return"disabled"===t?(this[i?"_disable":"_enable"](),this.options[t]=i,void 0):(this._super(t,i),"content"===t&&e.each(this.tooltips,function(e,t){s._updateContent(t.element)}),void 0)},_disable:function(){var t=this;e.each(this.tooltips,function(i,s){var n=e.Event("blur");n.target=n.currentTarget=s.element[0],t.close(n,!0)}),this.element.find(this.options.items).addBack().each(function(){var t=e(this);t.is("[title]")&&t.data("ui-tooltip-title",t.attr("title")).removeAttr("title")})},_enable:function(){this.element.find(this.options.items).addBack().each(function(){var t=e(this);t.data("ui-tooltip-title")&&t.attr("title",t.data("ui-tooltip-title"))})},open:function(t){var i=this,s=e(t?t.target:this.element).closest(this.options.items);s.length&&!s.data("ui-tooltip-id")&&(s.attr("title")&&s.data("ui-tooltip-title",s.attr("title")),s.data("ui-tooltip-open",!0),t&&"mouseover"===t.type&&s.parents().each(function(){var t,s=e(this);s.data("ui-tooltip-open")&&(t=e.Event("blur"),t.target=t.currentTarget=this,i.close(t,!0)),s.attr("title")&&(s.uniqueId(),i.parents[this.id]={element:this,title:s.attr("title")},s.attr("title",""))}),this._updateContent(s,t))},_updateContent:function(e,t){var i,s=this.options.content,n=this,a=t?t.type:null;return"string"==typeof s?this._open(t,e,s):(i=s.call(e[0],function(i){e.data("ui-tooltip-open")&&n._delay(function(){t&&(t.type=a),this._open(t,e,i)})}),i&&this._open(t,e,i),void 0)},_open:function(t,i,s){function n(e){u.of=e,o.is(":hidden")||o.position(u)}var a,o,r,h,l,u=e.extend({},this.options.position);if(s){if(a=this._find(i))return a.tooltip.find(".ui-tooltip-content").html(s),void 0;i.is("[title]")&&(t&&"mouseover"===t.type?i.attr("title",""):i.removeAttr("title")),a=this._tooltip(i),o=a.tooltip,this._addDescribedBy(i,o.attr("id")),o.find(".ui-tooltip-content").html(s),this.liveRegion.children().hide(),s.clone?(l=s.clone(),l.removeAttr("id").find("[id]").removeAttr("id")):l=s,e("<div>").html(l).appendTo(this.liveRegion),this.options.track&&t&&/^mouse/.test(t.type)?(this._on(this.document,{mousemove:n}),n(t)):o.position(e.extend({of:i},this.options.position)),o.hide(),this._show(o,this.options.show),this.options.show&&this.options.show.delay&&(h=this.delayedShow=setInterval(function(){o.is(":visible")&&(n(u.of),clearInterval(h))},e.fx.interval)),this._trigger("open",t,{tooltip:o}),r={keyup:function(t){if(t.keyCode===e.ui.keyCode.ESCAPE){var s=e.Event(t);s.currentTarget=i[0],this.close(s,!0)}}},i[0]!==this.element[0]&&(r.remove=function(){this._removeTooltip(o)}),t&&"mouseover"!==t.type||(r.mouseleave="close"),t&&"focusin"!==t.type||(r.focusout="close"),this._on(!0,i,r)}},close:function(t){var i,s=this,n=e(t?t.currentTarget:this.element),a=this._find(n);a&&(i=a.tooltip,a.closing||(clearInterval(this.delayedShow),n.data("ui-tooltip-title")&&!n.attr("title")&&n.attr("title",n.data("ui-tooltip-title")),this._removeDescribedBy(n),a.hiding=!0,i.stop(!0),this._hide(i,this.options.hide,function(){s._removeTooltip(e(this))}),n.removeData("ui-tooltip-open"),this._off(n,"mouseleave focusout keyup"),n[0]!==this.element[0]&&this._off(n,"remove"),this._off(this.document,"mousemove"),t&&"mouseleave"===t.type&&e.each(this.parents,function(t,i){e(i.element).attr("title",i.title),delete s.parents[t]}),a.closing=!0,this._trigger("close",t,{tooltip:i}),a.hiding||(a.closing=!1)))},_tooltip:function(t){var i=e("<div>").attr("role","tooltip").addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content "+(this.options.tooltipClass||"")),s=i.uniqueId().attr("id");return e("<div>").addClass("ui-tooltip-content").appendTo(i),i.appendTo(this.document[0].body),this.tooltips[s]={element:t,tooltip:i}},_find:function(e){var t=e.data("ui-tooltip-id");return t?this.tooltips[t]:null},_removeTooltip:function(e){e.remove(),delete this.tooltips[e.attr("id")]},_destroy:function(){var t=this;e.each(this.tooltips,function(i,s){var n=e.Event("blur"),a=s.element;n.target=n.currentTarget=a[0],t.close(n,!0),e("#"+i).remove(),a.data("ui-tooltip-title")&&(a.attr("title")||a.attr("title",a.data("ui-tooltip-title")),a.removeData("ui-tooltip-title"))}),this.liveRegion.remove()}});var y="ui-effects-",b=e;e.effects={effect:{}},function(e,t){function i(e,t,i){var s=d[t.type]||{};return null==e?i||!t.def?null:t.def:(e=s.floor?~~e:parseFloat(e),isNaN(e)?t.def:s.mod?(e+s.mod)%s.mod:0>e?0:e>s.max?s.max:e)}function s(i){var s=l(),n=s._rgba=[];return i=i.toLowerCase(),f(h,function(e,a){var o,r=a.re.exec(i),h=r&&a.parse(r),l=a.space||"rgba";return h?(o=s[l](h),s[u[l].cache]=o[u[l].cache],n=s._rgba=o._rgba,!1):t}),n.length?("0,0,0,0"===n.join()&&e.extend(n,a.transparent),s):a[i]}function n(e,t,i){return i=(i+1)%1,1>6*i?e+6*(t-e)*i:1>2*i?t:2>3*i?e+6*(t-e)*(2/3-i):e}var a,o="backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor",r=/^([\-+])=\s*(\d+\.?\d*)/,h=[{re:/rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(e){return[e[1],e[2],e[3],e[4]]}},{re:/rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,parse:function(e){return[2.55*e[1],2.55*e[2],2.55*e[3],e[4]]}},{re:/#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,parse:function(e){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}},{re:/#([a-f0-9])([a-f0-9])([a-f0-9])/,parse:function(e){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}},{re:/hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d?(?:\.\d+)?)\s*)?\)/,space:"hsla",parse:function(e){return[e[1],e[2]/100,e[3]/100,e[4]]}}],l=e.Color=function(t,i,s,n){return new e.Color.fn.parse(t,i,s,n)},u={rgba:{props:{red:{idx:0,type:"byte"},green:{idx:1,type:"byte"},blue:{idx:2,type:"byte"}}},hsla:{props:{hue:{idx:0,type:"degrees"},saturation:{idx:1,type:"percent"},lightness:{idx:2,type:"percent"}}}},d={"byte":{floor:!0,max:255},percent:{max:1},degrees:{mod:360,floor:!0}},c=l.support={},p=e("<p>")[0],f=e.each;p.style.cssText="background-color:rgba(1,1,1,.5)",c.rgba=p.style.backgroundColor.indexOf("rgba")>-1,f(u,function(e,t){t.cache="_"+e,t.props.alpha={idx:3,type:"percent",def:1}}),l.fn=e.extend(l.prototype,{parse:function(n,o,r,h){if(n===t)return this._rgba=[null,null,null,null],this;(n.jquery||n.nodeType)&&(n=e(n).css(o),o=t);var d=this,c=e.type(n),p=this._rgba=[];return o!==t&&(n=[n,o,r,h],c="array"),"string"===c?this.parse(s(n)||a._default):"array"===c?(f(u.rgba.props,function(e,t){p[t.idx]=i(n[t.idx],t)}),this):"object"===c?(n instanceof l?f(u,function(e,t){n[t.cache]&&(d[t.cache]=n[t.cache].slice())}):f(u,function(t,s){var a=s.cache;f(s.props,function(e,t){if(!d[a]&&s.to){if("alpha"===e||null==n[e])return;d[a]=s.to(d._rgba)}d[a][t.idx]=i(n[e],t,!0)}),d[a]&&0>e.inArray(null,d[a].slice(0,3))&&(d[a][3]=1,s.from&&(d._rgba=s.from(d[a])))}),this):t},is:function(e){var i=l(e),s=!0,n=this;return f(u,function(e,a){var o,r=i[a.cache];return r&&(o=n[a.cache]||a.to&&a.to(n._rgba)||[],f(a.props,function(e,i){return null!=r[i.idx]?s=r[i.idx]===o[i.idx]:t})),s}),s},_space:function(){var e=[],t=this;return f(u,function(i,s){t[s.cache]&&e.push(i)}),e.pop()},transition:function(e,t){var s=l(e),n=s._space(),a=u[n],o=0===this.alpha()?l("transparent"):this,r=o[a.cache]||a.to(o._rgba),h=r.slice();return s=s[a.cache],f(a.props,function(e,n){var a=n.idx,o=r[a],l=s[a],u=d[n.type]||{};null!==l&&(null===o?h[a]=l:(u.mod&&(l-o>u.mod/2?o+=u.mod:o-l>u.mod/2&&(o-=u.mod)),h[a]=i((l-o)*t+o,n)))}),this[n](h)},blend:function(t){if(1===this._rgba[3])return this;var i=this._rgba.slice(),s=i.pop(),n=l(t)._rgba;return l(e.map(i,function(e,t){return(1-s)*n[t]+s*e}))},toRgbaString:function(){var t="rgba(",i=e.map(this._rgba,function(e,t){return null==e?t>2?1:0:e});return 1===i[3]&&(i.pop(),t="rgb("),t+i.join()+")"},toHslaString:function(){var t="hsla(",i=e.map(this.hsla(),function(e,t){return null==e&&(e=t>2?1:0),t&&3>t&&(e=Math.round(100*e)+"%"),e});return 1===i[3]&&(i.pop(),t="hsl("),t+i.join()+")"},toHexString:function(t){var i=this._rgba.slice(),s=i.pop();return t&&i.push(~~(255*s)),"#"+e.map(i,function(e){return e=(e||0).toString(16),1===e.length?"0"+e:e}).join("")},toString:function(){return 0===this._rgba[3]?"transparent":this.toRgbaString()}}),l.fn.parse.prototype=l.fn,u.hsla.to=function(e){if(null==e[0]||null==e[1]||null==e[2])return[null,null,null,e[3]];var t,i,s=e[0]/255,n=e[1]/255,a=e[2]/255,o=e[3],r=Math.max(s,n,a),h=Math.min(s,n,a),l=r-h,u=r+h,d=.5*u;return t=h===r?0:s===r?60*(n-a)/l+360:n===r?60*(a-s)/l+120:60*(s-n)/l+240,i=0===l?0:.5>=d?l/u:l/(2-u),[Math.round(t)%360,i,d,null==o?1:o]},u.hsla.from=function(e){if(null==e[0]||null==e[1]||null==e[2])return[null,null,null,e[3]];var t=e[0]/360,i=e[1],s=e[2],a=e[3],o=.5>=s?s*(1+i):s+i-s*i,r=2*s-o;return[Math.round(255*n(r,o,t+1/3)),Math.round(255*n(r,o,t)),Math.round(255*n(r,o,t-1/3)),a]},f(u,function(s,n){var a=n.props,o=n.cache,h=n.to,u=n.from;l.fn[s]=function(s){if(h&&!this[o]&&(this[o]=h(this._rgba)),s===t)return this[o].slice();var n,r=e.type(s),d="array"===r||"object"===r?s:arguments,c=this[o].slice();return f(a,function(e,t){var s=d["object"===r?e:t.idx];null==s&&(s=c[t.idx]),c[t.idx]=i(s,t)}),u?(n=l(u(c)),n[o]=c,n):l(c)},f(a,function(t,i){l.fn[t]||(l.fn[t]=function(n){var a,o=e.type(n),h="alpha"===t?this._hsla?"hsla":"rgba":s,l=this[h](),u=l[i.idx];return"undefined"===o?u:("function"===o&&(n=n.call(this,u),o=e.type(n)),null==n&&i.empty?this:("string"===o&&(a=r.exec(n),a&&(n=u+parseFloat(a[2])*("+"===a[1]?1:-1))),l[i.idx]=n,this[h](l)))})})}),l.hook=function(t){var i=t.split(" ");f(i,function(t,i){e.cssHooks[i]={set:function(t,n){var a,o,r="";if("transparent"!==n&&("string"!==e.type(n)||(a=s(n)))){if(n=l(a||n),!c.rgba&&1!==n._rgba[3]){for(o="backgroundColor"===i?t.parentNode:t;(""===r||"transparent"===r)&&o&&o.style;)try{r=e.css(o,"backgroundColor"),o=o.parentNode}catch(h){}n=n.blend(r&&"transparent"!==r?r:"_default")}n=n.toRgbaString()}try{t.style[i]=n}catch(h){}}},e.fx.step[i]=function(t){t.colorInit||(t.start=l(t.elem,i),t.end=l(t.end),t.colorInit=!0),e.cssHooks[i].set(t.elem,t.start.transition(t.end,t.pos))}})},l.hook(o),e.cssHooks.borderColor={expand:function(e){var t={};return f(["Top","Right","Bottom","Left"],function(i,s){t["border"+s+"Color"]=e}),t}},a=e.Color.names={aqua:"#00ffff",black:"#000000",blue:"#0000ff",fuchsia:"#ff00ff",gray:"#808080",green:"#008000",lime:"#00ff00",maroon:"#800000",navy:"#000080",olive:"#808000",purple:"#800080",red:"#ff0000",silver:"#c0c0c0",teal:"#008080",white:"#ffffff",yellow:"#ffff00",transparent:[null,null,null,0],_default:"#ffffff"}}(b),function(){function t(t){var i,s,n=t.ownerDocument.defaultView?t.ownerDocument.defaultView.getComputedStyle(t,null):t.currentStyle,a={};if(n&&n.length&&n[0]&&n[n[0]])for(s=n.length;s--;)i=n[s],"string"==typeof n[i]&&(a[e.camelCase(i)]=n[i]);else for(i in n)"string"==typeof n[i]&&(a[i]=n[i]);return a}function i(t,i){var s,a,o={};for(s in i)a=i[s],t[s]!==a&&(n[s]||(e.fx.step[s]||!isNaN(parseFloat(a)))&&(o[s]=a));return o}var s=["add","remove","toggle"],n={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};e.each(["borderLeftStyle","borderRightStyle","borderBottomStyle","borderTopStyle"],function(t,i){e.fx.step[i]=function(e){("none"!==e.end&&!e.setAttr||1===e.pos&&!e.setAttr)&&(b.style(e.elem,i,e.end),e.setAttr=!0)}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e.effects.animateClass=function(n,a,o,r){var h=e.speed(a,o,r);return this.queue(function(){var a,o=e(this),r=o.attr("class")||"",l=h.children?o.find("*").addBack():o;l=l.map(function(){var i=e(this);return{el:i,start:t(this)}}),a=function(){e.each(s,function(e,t){n[t]&&o[t+"Class"](n[t])})},a(),l=l.map(function(){return this.end=t(this.el[0]),this.diff=i(this.start,this.end),this}),o.attr("class",r),l=l.map(function(){var t=this,i=e.Deferred(),s=e.extend({},h,{queue:!1,complete:function(){i.resolve(t)}});return this.el.animate(this.diff,s),i.promise()}),e.when.apply(e,l.get()).done(function(){a(),e.each(arguments,function(){var t=this.el;e.each(this.diff,function(e){t.css(e,"")})}),h.complete.call(o[0])})})},e.fn.extend({addClass:function(t){return function(i,s,n,a){return s?e.effects.animateClass.call(this,{add:i},s,n,a):t.apply(this,arguments)}}(e.fn.addClass),removeClass:function(t){return function(i,s,n,a){return arguments.length>1?e.effects.animateClass.call(this,{remove:i},s,n,a):t.apply(this,arguments)}}(e.fn.removeClass),toggleClass:function(t){return function(i,s,n,a,o){return"boolean"==typeof s||void 0===s?n?e.effects.animateClass.call(this,s?{add:i}:{remove:i},n,a,o):t.apply(this,arguments):e.effects.animateClass.call(this,{toggle:i},s,n,a)}}(e.fn.toggleClass),switchClass:function(t,i,s,n,a){return e.effects.animateClass.call(this,{add:i,remove:t},s,n,a)}})}(),function(){function t(t,i,s,n){return e.isPlainObject(t)&&(i=t,t=t.effect),t={effect:t},null==i&&(i={}),e.isFunction(i)&&(n=i,s=null,i={}),("number"==typeof i||e.fx.speeds[i])&&(n=s,s=i,i={}),e.isFunction(s)&&(n=s,s=null),i&&e.extend(t,i),s=s||i.duration,t.duration=e.fx.off?0:"number"==typeof s?s:s in e.fx.speeds?e.fx.speeds[s]:e.fx.speeds._default,t.complete=n||i.complete,t}function i(t){return!t||"number"==typeof t||e.fx.speeds[t]?!0:"string"!=typeof t||e.effects.effect[t]?e.isFunction(t)?!0:"object"!=typeof t||t.effect?!1:!0:!0}e.extend(e.effects,{version:"1.11.2",save:function(e,t){for(var i=0;t.length>i;i++)null!==t[i]&&e.data(y+t[i],e[0].style[t[i]])},restore:function(e,t){var i,s;for(s=0;t.length>s;s++)null!==t[s]&&(i=e.data(y+t[s]),void 0===i&&(i=""),e.css(t[s],i))},setMode:function(e,t){return"toggle"===t&&(t=e.is(":hidden")?"show":"hide"),t},getBaseline:function(e,t){var i,s;switch(e[0]){case"top":i=0;break;case"middle":i=.5;break;case"bottom":i=1;break;default:i=e[0]/t.height}switch(e[1]){case"left":s=0;break;case"center":s=.5;break;case"right":s=1;break;default:s=e[1]/t.width}return{x:s,y:i}},createWrapper:function(t){if(t.parent().is(".ui-effects-wrapper"))return t.parent();var i={width:t.outerWidth(!0),height:t.outerHeight(!0),"float":t.css("float")},s=e("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),n={width:t.width(),height:t.height()},a=document.activeElement;try{a.id}catch(o){a=document.body}return t.wrap(s),(t[0]===a||e.contains(t[0],a))&&e(a).focus(),s=t.parent(),"static"===t.css("position")?(s.css({position:"relative"}),t.css({position:"relative"})):(e.extend(i,{position:t.css("position"),zIndex:t.css("z-index")}),e.each(["top","left","bottom","right"],function(e,s){i[s]=t.css(s),isNaN(parseInt(i[s],10))&&(i[s]="auto")}),t.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),t.css(n),s.css(i).show()},removeWrapper:function(t){var i=document.activeElement;return t.parent().is(".ui-effects-wrapper")&&(t.parent().replaceWith(t),(t[0]===i||e.contains(t[0],i))&&e(i).focus()),t},setTransition:function(t,i,s,n){return n=n||{},e.each(i,function(e,i){var a=t.cssUnit(i);a[0]>0&&(n[i]=a[0]*s+a[1])}),n}}),e.fn.extend({effect:function(){function i(t){function i(){e.isFunction(a)&&a.call(n[0]),e.isFunction(t)&&t()}var n=e(this),a=s.complete,r=s.mode;(n.is(":hidden")?"hide"===r:"show"===r)?(n[r](),i()):o.call(n[0],s,i)}var s=t.apply(this,arguments),n=s.mode,a=s.queue,o=e.effects.effect[s.effect];return e.fx.off||!o?n?this[n](s.duration,s.complete):this.each(function(){s.complete&&s.complete.call(this)}):a===!1?this.each(i):this.queue(a||"fx",i)},show:function(e){return function(s){if(i(s))return e.apply(this,arguments);var n=t.apply(this,arguments);return n.mode="show",this.effect.call(this,n)}}(e.fn.show),hide:function(e){return function(s){if(i(s))return e.apply(this,arguments);
var n=t.apply(this,arguments);return n.mode="hide",this.effect.call(this,n)}}(e.fn.hide),toggle:function(e){return function(s){if(i(s)||"boolean"==typeof s)return e.apply(this,arguments);var n=t.apply(this,arguments);return n.mode="toggle",this.effect.call(this,n)}}(e.fn.toggle),cssUnit:function(t){var i=this.css(t),s=[];return e.each(["em","px","%","pt"],function(e,t){i.indexOf(t)>0&&(s=[parseFloat(i),t])}),s}})}(),function(){var t={};e.each(["Quad","Cubic","Quart","Quint","Expo"],function(e,i){t[i]=function(t){return Math.pow(t,e+2)}}),e.extend(t,{Sine:function(e){return 1-Math.cos(e*Math.PI/2)},Circ:function(e){return 1-Math.sqrt(1-e*e)},Elastic:function(e){return 0===e||1===e?e:-Math.pow(2,8*(e-1))*Math.sin((80*(e-1)-7.5)*Math.PI/15)},Back:function(e){return e*e*(3*e-2)},Bounce:function(e){for(var t,i=4;((t=Math.pow(2,--i))-1)/11>e;);return 1/Math.pow(4,3-i)-7.5625*Math.pow((3*t-2)/22-e,2)}}),e.each(t,function(t,i){e.easing["easeIn"+t]=i,e.easing["easeOut"+t]=function(e){return 1-i(1-e)},e.easing["easeInOut"+t]=function(e){return.5>e?i(2*e)/2:1-i(-2*e+2)/2}})}(),e.effects,e.effects.effect.blind=function(t,i){var s,n,a,o=e(this),r=/up|down|vertical/,h=/up|left|vertical|horizontal/,l=["position","top","bottom","left","right","height","width"],u=e.effects.setMode(o,t.mode||"hide"),d=t.direction||"up",c=r.test(d),p=c?"height":"width",f=c?"top":"left",m=h.test(d),g={},v="show"===u;o.parent().is(".ui-effects-wrapper")?e.effects.save(o.parent(),l):e.effects.save(o,l),o.show(),s=e.effects.createWrapper(o).css({overflow:"hidden"}),n=s[p](),a=parseFloat(s.css(f))||0,g[p]=v?n:0,m||(o.css(c?"bottom":"right",0).css(c?"top":"left","auto").css({position:"absolute"}),g[f]=v?a:n+a),v&&(s.css(p,0),m||s.css(f,a+n)),s.animate(g,{duration:t.duration,easing:t.easing,queue:!1,complete:function(){"hide"===u&&o.hide(),e.effects.restore(o,l),e.effects.removeWrapper(o),i()}})},e.effects.effect.bounce=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","height","width"],h=e.effects.setMode(o,t.mode||"effect"),l="hide"===h,u="show"===h,d=t.direction||"up",c=t.distance,p=t.times||5,f=2*p+(u||l?1:0),m=t.duration/f,g=t.easing,v="up"===d||"down"===d?"top":"left",y="up"===d||"left"===d,b=o.queue(),_=b.length;for((u||l)&&r.push("opacity"),e.effects.save(o,r),o.show(),e.effects.createWrapper(o),c||(c=o["top"===v?"outerHeight":"outerWidth"]()/3),u&&(a={opacity:1},a[v]=0,o.css("opacity",0).css(v,y?2*-c:2*c).animate(a,m,g)),l&&(c/=Math.pow(2,p-1)),a={},a[v]=0,s=0;p>s;s++)n={},n[v]=(y?"-=":"+=")+c,o.animate(n,m,g).animate(a,m,g),c=l?2*c:c/2;l&&(n={opacity:0},n[v]=(y?"-=":"+=")+c,o.animate(n,m,g)),o.queue(function(){l&&o.hide(),e.effects.restore(o,r),e.effects.removeWrapper(o),i()}),_>1&&b.splice.apply(b,[1,0].concat(b.splice(_,f+1))),o.dequeue()},e.effects.effect.clip=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","height","width"],h=e.effects.setMode(o,t.mode||"hide"),l="show"===h,u=t.direction||"vertical",d="vertical"===u,c=d?"height":"width",p=d?"top":"left",f={};e.effects.save(o,r),o.show(),s=e.effects.createWrapper(o).css({overflow:"hidden"}),n="IMG"===o[0].tagName?s:o,a=n[c](),l&&(n.css(c,0),n.css(p,a/2)),f[c]=l?a:0,f[p]=l?0:a/2,n.animate(f,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){l||o.hide(),e.effects.restore(o,r),e.effects.removeWrapper(o),i()}})},e.effects.effect.drop=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","opacity","height","width"],o=e.effects.setMode(n,t.mode||"hide"),r="show"===o,h=t.direction||"left",l="up"===h||"down"===h?"top":"left",u="up"===h||"left"===h?"pos":"neg",d={opacity:r?1:0};e.effects.save(n,a),n.show(),e.effects.createWrapper(n),s=t.distance||n["top"===l?"outerHeight":"outerWidth"](!0)/2,r&&n.css("opacity",0).css(l,"pos"===u?-s:s),d[l]=(r?"pos"===u?"+=":"-=":"pos"===u?"-=":"+=")+s,n.animate(d,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}})},e.effects.effect.explode=function(t,i){function s(){b.push(this),b.length===d*c&&n()}function n(){p.css({visibility:"visible"}),e(b).remove(),m||p.hide(),i()}var a,o,r,h,l,u,d=t.pieces?Math.round(Math.sqrt(t.pieces)):3,c=d,p=e(this),f=e.effects.setMode(p,t.mode||"hide"),m="show"===f,g=p.show().css("visibility","hidden").offset(),v=Math.ceil(p.outerWidth()/c),y=Math.ceil(p.outerHeight()/d),b=[];for(a=0;d>a;a++)for(h=g.top+a*y,u=a-(d-1)/2,o=0;c>o;o++)r=g.left+o*v,l=o-(c-1)/2,p.clone().appendTo("body").wrap("<div></div>").css({position:"absolute",visibility:"visible",left:-o*v,top:-a*y}).parent().addClass("ui-effects-explode").css({position:"absolute",overflow:"hidden",width:v,height:y,left:r+(m?l*v:0),top:h+(m?u*y:0),opacity:m?0:1}).animate({left:r+(m?0:l*v),top:h+(m?0:u*y),opacity:m?1:0},t.duration||500,t.easing,s)},e.effects.effect.fade=function(t,i){var s=e(this),n=e.effects.setMode(s,t.mode||"toggle");s.animate({opacity:n},{queue:!1,duration:t.duration,easing:t.easing,complete:i})},e.effects.effect.fold=function(t,i){var s,n,a=e(this),o=["position","top","bottom","left","right","height","width"],r=e.effects.setMode(a,t.mode||"hide"),h="show"===r,l="hide"===r,u=t.size||15,d=/([0-9]+)%/.exec(u),c=!!t.horizFirst,p=h!==c,f=p?["width","height"]:["height","width"],m=t.duration/2,g={},v={};e.effects.save(a,o),a.show(),s=e.effects.createWrapper(a).css({overflow:"hidden"}),n=p?[s.width(),s.height()]:[s.height(),s.width()],d&&(u=parseInt(d[1],10)/100*n[l?0:1]),h&&s.css(c?{height:0,width:u}:{height:u,width:0}),g[f[0]]=h?n[0]:u,v[f[1]]=h?n[1]:0,s.animate(g,m,t.easing).animate(v,m,t.easing,function(){l&&a.hide(),e.effects.restore(a,o),e.effects.removeWrapper(a),i()})},e.effects.effect.highlight=function(t,i){var s=e(this),n=["backgroundImage","backgroundColor","opacity"],a=e.effects.setMode(s,t.mode||"show"),o={backgroundColor:s.css("backgroundColor")};"hide"===a&&(o.opacity=0),e.effects.save(s,n),s.show().css({backgroundImage:"none",backgroundColor:t.color||"#ffff99"}).animate(o,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===a&&s.hide(),e.effects.restore(s,n),i()}})},e.effects.effect.size=function(t,i){var s,n,a,o=e(this),r=["position","top","bottom","left","right","width","height","overflow","opacity"],h=["position","top","bottom","left","right","overflow","opacity"],l=["width","height","overflow"],u=["fontSize"],d=["borderTopWidth","borderBottomWidth","paddingTop","paddingBottom"],c=["borderLeftWidth","borderRightWidth","paddingLeft","paddingRight"],p=e.effects.setMode(o,t.mode||"effect"),f=t.restore||"effect"!==p,m=t.scale||"both",g=t.origin||["middle","center"],v=o.css("position"),y=f?r:h,b={height:0,width:0,outerHeight:0,outerWidth:0};"show"===p&&o.show(),s={height:o.height(),width:o.width(),outerHeight:o.outerHeight(),outerWidth:o.outerWidth()},"toggle"===t.mode&&"show"===p?(o.from=t.to||b,o.to=t.from||s):(o.from=t.from||("show"===p?b:s),o.to=t.to||("hide"===p?b:s)),a={from:{y:o.from.height/s.height,x:o.from.width/s.width},to:{y:o.to.height/s.height,x:o.to.width/s.width}},("box"===m||"both"===m)&&(a.from.y!==a.to.y&&(y=y.concat(d),o.from=e.effects.setTransition(o,d,a.from.y,o.from),o.to=e.effects.setTransition(o,d,a.to.y,o.to)),a.from.x!==a.to.x&&(y=y.concat(c),o.from=e.effects.setTransition(o,c,a.from.x,o.from),o.to=e.effects.setTransition(o,c,a.to.x,o.to))),("content"===m||"both"===m)&&a.from.y!==a.to.y&&(y=y.concat(u).concat(l),o.from=e.effects.setTransition(o,u,a.from.y,o.from),o.to=e.effects.setTransition(o,u,a.to.y,o.to)),e.effects.save(o,y),o.show(),e.effects.createWrapper(o),o.css("overflow","hidden").css(o.from),g&&(n=e.effects.getBaseline(g,s),o.from.top=(s.outerHeight-o.outerHeight())*n.y,o.from.left=(s.outerWidth-o.outerWidth())*n.x,o.to.top=(s.outerHeight-o.to.outerHeight)*n.y,o.to.left=(s.outerWidth-o.to.outerWidth)*n.x),o.css(o.from),("content"===m||"both"===m)&&(d=d.concat(["marginTop","marginBottom"]).concat(u),c=c.concat(["marginLeft","marginRight"]),l=r.concat(d).concat(c),o.find("*[width]").each(function(){var i=e(this),s={height:i.height(),width:i.width(),outerHeight:i.outerHeight(),outerWidth:i.outerWidth()};f&&e.effects.save(i,l),i.from={height:s.height*a.from.y,width:s.width*a.from.x,outerHeight:s.outerHeight*a.from.y,outerWidth:s.outerWidth*a.from.x},i.to={height:s.height*a.to.y,width:s.width*a.to.x,outerHeight:s.height*a.to.y,outerWidth:s.width*a.to.x},a.from.y!==a.to.y&&(i.from=e.effects.setTransition(i,d,a.from.y,i.from),i.to=e.effects.setTransition(i,d,a.to.y,i.to)),a.from.x!==a.to.x&&(i.from=e.effects.setTransition(i,c,a.from.x,i.from),i.to=e.effects.setTransition(i,c,a.to.x,i.to)),i.css(i.from),i.animate(i.to,t.duration,t.easing,function(){f&&e.effects.restore(i,l)})})),o.animate(o.to,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){0===o.to.opacity&&o.css("opacity",o.from.opacity),"hide"===p&&o.hide(),e.effects.restore(o,y),f||("static"===v?o.css({position:"relative",top:o.to.top,left:o.to.left}):e.each(["top","left"],function(e,t){o.css(t,function(t,i){var s=parseInt(i,10),n=e?o.to.left:o.to.top;return"auto"===i?n+"px":s+n+"px"})})),e.effects.removeWrapper(o),i()}})},e.effects.effect.scale=function(t,i){var s=e(this),n=e.extend(!0,{},t),a=e.effects.setMode(s,t.mode||"effect"),o=parseInt(t.percent,10)||(0===parseInt(t.percent,10)?0:"hide"===a?0:100),r=t.direction||"both",h=t.origin,l={height:s.height(),width:s.width(),outerHeight:s.outerHeight(),outerWidth:s.outerWidth()},u={y:"horizontal"!==r?o/100:1,x:"vertical"!==r?o/100:1};n.effect="size",n.queue=!1,n.complete=i,"effect"!==a&&(n.origin=h||["middle","center"],n.restore=!0),n.from=t.from||("show"===a?{height:0,width:0,outerHeight:0,outerWidth:0}:l),n.to={height:l.height*u.y,width:l.width*u.x,outerHeight:l.outerHeight*u.y,outerWidth:l.outerWidth*u.x},n.fade&&("show"===a&&(n.from.opacity=0,n.to.opacity=1),"hide"===a&&(n.from.opacity=1,n.to.opacity=0)),s.effect(n)},e.effects.effect.puff=function(t,i){var s=e(this),n=e.effects.setMode(s,t.mode||"hide"),a="hide"===n,o=parseInt(t.percent,10)||150,r=o/100,h={height:s.height(),width:s.width(),outerHeight:s.outerHeight(),outerWidth:s.outerWidth()};e.extend(t,{effect:"scale",queue:!1,fade:!0,mode:n,complete:i,percent:a?o:100,from:a?h:{height:h.height*r,width:h.width*r,outerHeight:h.outerHeight*r,outerWidth:h.outerWidth*r}}),s.effect(t)},e.effects.effect.pulsate=function(t,i){var s,n=e(this),a=e.effects.setMode(n,t.mode||"show"),o="show"===a,r="hide"===a,h=o||"hide"===a,l=2*(t.times||5)+(h?1:0),u=t.duration/l,d=0,c=n.queue(),p=c.length;for((o||!n.is(":visible"))&&(n.css("opacity",0).show(),d=1),s=1;l>s;s++)n.animate({opacity:d},u,t.easing),d=1-d;n.animate({opacity:d},u,t.easing),n.queue(function(){r&&n.hide(),i()}),p>1&&c.splice.apply(c,[1,0].concat(c.splice(p,l+1))),n.dequeue()},e.effects.effect.shake=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","height","width"],o=e.effects.setMode(n,t.mode||"effect"),r=t.direction||"left",h=t.distance||20,l=t.times||3,u=2*l+1,d=Math.round(t.duration/u),c="up"===r||"down"===r?"top":"left",p="up"===r||"left"===r,f={},m={},g={},v=n.queue(),y=v.length;for(e.effects.save(n,a),n.show(),e.effects.createWrapper(n),f[c]=(p?"-=":"+=")+h,m[c]=(p?"+=":"-=")+2*h,g[c]=(p?"-=":"+=")+2*h,n.animate(f,d,t.easing),s=1;l>s;s++)n.animate(m,d,t.easing).animate(g,d,t.easing);n.animate(m,d,t.easing).animate(f,d/2,t.easing).queue(function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}),y>1&&v.splice.apply(v,[1,0].concat(v.splice(y,u+1))),n.dequeue()},e.effects.effect.slide=function(t,i){var s,n=e(this),a=["position","top","bottom","left","right","width","height"],o=e.effects.setMode(n,t.mode||"show"),r="show"===o,h=t.direction||"left",l="up"===h||"down"===h?"top":"left",u="up"===h||"left"===h,d={};e.effects.save(n,a),n.show(),s=t.distance||n["top"===l?"outerHeight":"outerWidth"](!0),e.effects.createWrapper(n).css({overflow:"hidden"}),r&&n.css(l,u?isNaN(s)?"-"+s:-s:s),d[l]=(r?u?"+=":"-=":u?"-=":"+=")+s,n.animate(d,{queue:!1,duration:t.duration,easing:t.easing,complete:function(){"hide"===o&&n.hide(),e.effects.restore(n,a),e.effects.removeWrapper(n),i()}})},e.effects.effect.transfer=function(t,i){var s=e(this),n=e(t.to),a="fixed"===n.css("position"),o=e("body"),r=a?o.scrollTop():0,h=a?o.scrollLeft():0,l=n.offset(),u={top:l.top-r,left:l.left-h,height:n.innerHeight(),width:n.innerWidth()},d=s.offset(),c=e("<div class='ui-effects-transfer'></div>").appendTo(document.body).addClass(t.className).css({top:d.top-r,left:d.left-h,height:s.innerHeight(),width:s.innerWidth(),position:a?"fixed":"absolute"}).animate(u,t.duration,t.easing,function(){c.remove(),i()})}});

 /* jQuery Superfish Menu Plugin */
!function(e){"use strict";var s=function(){var s={bcClass:"sf-breadcrumb",menuClass:"sf-js-enabled",anchorClass:"sf-with-ul",menuArrowClass:"sf-arrows"},o=function(){var s=/iPhone|iPad|iPod/i.test(navigator.userAgent);return s&&e(window).load(function(){e("body").children().on("click",e.noop)}),s}(),n=function(){var e=document.documentElement.style;return"behavior"in e&&"fill"in e&&/iemobile/i.test(navigator.userAgent)}(),t=function(e,o){var n=s.menuClass;o.cssArrows&&(n+=" "+s.menuArrowClass),e.toggleClass(n)},i=function(o,n){return o.find("li."+n.pathClass).slice(0,n.pathLevels).addClass(n.hoverClass+" "+s.bcClass).filter(function(){return e(this).children(n.popUpSelector).hide().show().length}).removeClass(n.pathClass)},r=function(e){e.children("a").toggleClass(s.anchorClass)},a=function(e){var s=e.css("ms-touch-action");s="pan-y"===s?"auto":"pan-y",e.css("ms-touch-action",s)},l=function(s,t){var i="li:has("+t.popUpSelector+")";e.fn.hoverIntent&&!t.disableHI?s.hoverIntent(u,p,i):s.on("mouseenter.superfish",i,u).on("mouseleave.superfish",i,p);var r="MSPointerDown.superfish";o||(r+=" touchend.superfish"),n&&(r+=" mousedown.superfish"),s.on("focusin.superfish","li",u).on("focusout.superfish","li",p).on(r,"a",t,h)},h=function(s){var o=e(this),n=o.siblings(s.data.popUpSelector);n.length>0&&n.is(":hidden")&&(o.one("click.superfish",!1),"MSPointerDown"===s.type?o.trigger("focus"):e.proxy(u,o.parent("li"))())},u=function(){var s=e(this),o=d(s);clearTimeout(o.sfTimer),s.siblings().superfish("hide").end().superfish("show")},p=function(){var s=e(this),n=d(s);o?e.proxy(f,s,n)():(clearTimeout(n.sfTimer),n.sfTimer=setTimeout(e.proxy(f,s,n),n.delay))},f=function(s){s.retainPath=e.inArray(this[0],s.$path)>-1,this.superfish("hide"),this.parents("."+s.hoverClass).length||(s.onIdle.call(c(this)),s.$path.length&&e.proxy(u,s.$path)())},c=function(e){return e.closest("."+s.menuClass)},d=function(e){return c(e).data("sf-options")};return{hide:function(s){if(this.length){var o=this,n=d(o);if(!n)return this;var t=n.retainPath===!0?n.$path:"",i=o.find("li."+n.hoverClass).add(this).not(t).removeClass(n.hoverClass).children(n.popUpSelector),r=n.speedOut;s&&(i.show(),r=0),n.retainPath=!1,n.onBeforeHide.call(i),i.stop(!0,!0).animate(n.animationOut,r,function(){var s=e(this);n.onHide.call(s)})}return this},show:function(){var e=d(this);if(!e)return this;var s=this.addClass(e.hoverClass),o=s.children(e.popUpSelector);return e.onBeforeShow.call(o),o.stop(!0,!0).animate(e.animation,e.speed,function(){e.onShow.call(o)}),this},destroy:function(){return this.each(function(){var o,n=e(this),i=n.data("sf-options");return i?(o=n.find(i.popUpSelector).parent("li"),clearTimeout(i.sfTimer),t(n,i),r(o),a(n),n.off(".superfish").off(".hoverIntent"),o.children(i.popUpSelector).attr("style",function(e,s){return s.replace(/display[^;]+;?/g,"")}),i.$path.removeClass(i.hoverClass+" "+s.bcClass).addClass(i.pathClass),n.find("."+i.hoverClass).removeClass(i.hoverClass),i.onDestroy.call(n),void n.removeData("sf-options")):!1})},init:function(o){return this.each(function(){var n=e(this);if(n.data("sf-options"))return!1;var h=e.extend({},e.fn.superfish.defaults,o),u=n.find(h.popUpSelector).parent("li");h.$path=i(n,h),n.data("sf-options",h),t(n,h),r(u),a(n),l(n,h),u.not("."+s.bcClass).superfish("hide",!0),h.onInit.call(this)})}}}();e.fn.superfish=function(o){return s[o]?s[o].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof o&&o?e.error("Method "+o+" does not exist on jQuery.fn.superfish"):s.init.apply(this,arguments)},e.fn.superfish.defaults={popUpSelector:"ul,.sf-mega",hoverClass:"sfHover",pathClass:"overrideThisToUse",pathLevels:1,delay:800,animation:{opacity:"show"},animationOut:{opacity:"hide"},speed:"normal",speedOut:"fast",cssArrows:!0,disableHI:!1,onInit:e.noop,onBeforeShow:e.noop,onShow:e.noop,onBeforeHide:e.noop,onHide:e.noop,onIdle:e.noop,onDestroy:e.noop},e.fn.extend({hideSuperfishUl:s.hide,showSuperfishUl:s.show})}(jQuery);

/*! http://mths.be/placeholder v2.1.1 by @mathias */
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e("object"==typeof module&&module.exports?require("jquery"):jQuery)}(function(e){function t(t){var a={},l=/^jQuery\d+$/;return e.each(t.attributes,function(e,t){t.specified&&!l.test(t.name)&&(a[t.name]=t.value)}),a}function a(t,a){var l=this,o=e(l);if(l.value==o.attr("placeholder")&&o.hasClass(p.customClass))if(o.data("placeholder-password")){if(o=o.hide().nextAll('input[type="password"]:first').show().attr("id",o.removeAttr("id").data("placeholder-id")),t===!0)return o[0].value=a;o.focus()}else l.value="",o.removeClass(p.customClass),l==r()&&l.select()}function l(){var l,r=this,o=e(r),n=this.id;if(""===r.value){if("password"===r.type){if(!o.data("placeholder-textinput")){try{l=o.clone().attr({type:"text"})}catch(s){l=e("<input>").attr(e.extend(t(this),{type:"text"}))}l.removeAttr("name").data({"placeholder-password":o,"placeholder-id":n}).bind("focus.placeholder",a),o.data({"placeholder-textinput":l,"placeholder-id":n}).before(l)}o=o.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id",n).show()}o.addClass(p.customClass),o[0].value=o.attr("placeholder")}else o.removeClass(p.customClass)}function r(){try{return document.activeElement}catch(e){}}var o,n,s="[object OperaMini]"==Object.prototype.toString.call(window.operamini),c="placeholder"in document.createElement("input")&&!s,u="placeholder"in document.createElement("textarea")&&!s,d=e.valHooks,i=e.propHooks;if(c&&u)n=e.fn.placeholder=function(){return this},n.input=n.textarea=!0;else{var p={};n=e.fn.placeholder=function(t){var r={customClass:"placeholder"};p=e.extend({},r,t);var o=this;return o.filter((c?"textarea":":input")+"[placeholder]").not("."+p.customClass).bind({"focus.placeholder":a,"blur.placeholder":l}).data("placeholder-enabled",!0).trigger("blur.placeholder"),o},n.input=c,n.textarea=u,o={get:function(t){var a=e(t),l=a.data("placeholder-password");return l?l[0].value:a.data("placeholder-enabled")&&a.hasClass(p.customClass)?"":t.value},set:function(t,o){var n=e(t),s=n.data("placeholder-password");return s?s[0].value=o:n.data("placeholder-enabled")?(""===o?(t.value=o,t!=r()&&l.call(t)):n.hasClass(p.customClass)?a.call(t,!0,o)||(t.value=o):t.value=o,n):t.value=o}},c||(d.input=o,i.value=o),u||(d.textarea=o,i.value=o),e(function(){e(document).delegate("form","submit.placeholder",function(){var t=e("."+p.customClass,this).each(a);setTimeout(function(){t.each(l)},10)})}),e(window).bind("beforeunload.placeholder",function(){e("."+p.customClass).each(function(){this.value=""})})}});


/*!
 * jQuery Mousewheel 3.1.13
 *
 * Copyright 2015 jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a:a(jQuery)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})});


/*!
 * jScrollPane - v2.0.23 - 2016-01-28
 * http://jscrollpane.kelvinluck.com/
 *
 * Copyright (c) 2014 Kelvin Luck
 * Dual licensed under the MIT or GPL licenses.
 */
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){a.fn.jScrollPane=function(b){function c(b,c){function d(c){var f,h,j,k,l,o,p=!1,q=!1;if(N=c,void 0===O)l=b.scrollTop(),o=b.scrollLeft(),b.css({overflow:"hidden",padding:0}),P=b.innerWidth()+rb,Q=b.innerHeight(),b.width(P),O=a('<div class="jspPane" />').css("padding",qb).append(b.children()),R=a('<div class="jspContainer" />').css({width:P+"px",height:Q+"px"}).append(O).appendTo(b);else{if(b.css("width",""),p=N.stickToBottom&&A(),q=N.stickToRight&&B(),k=b.innerWidth()+rb!=P||b.outerHeight()!=Q,k&&(P=b.innerWidth()+rb,Q=b.innerHeight(),R.css({width:P+"px",height:Q+"px"})),!k&&sb==S&&O.outerHeight()==T)return void b.width(P);sb=S,O.css("width",""),b.width(P),R.find(">.jspVerticalBar,>.jspHorizontalBar").remove().end()}O.css("overflow","auto"),S=c.contentWidth?c.contentWidth:O[0].scrollWidth,T=O[0].scrollHeight,O.css("overflow",""),U=S/P,V=T/Q,W=V>1,X=U>1,X||W?(b.addClass("jspScrollable"),f=N.maintainPosition&&($||bb),f&&(h=y(),j=z()),e(),g(),i(),f&&(w(q?S-P:h,!1),v(p?T-Q:j,!1)),F(),C(),L(),N.enableKeyboardNavigation&&H(),N.clickOnTrack&&m(),J(),N.hijackInternalLinks&&K()):(b.removeClass("jspScrollable"),O.css({top:0,left:0,width:R.width()-rb}),D(),G(),I(),n()),N.autoReinitialise&&!pb?pb=setInterval(function(){d(N)},N.autoReinitialiseDelay):!N.autoReinitialise&&pb&&clearInterval(pb),l&&b.scrollTop(0)&&v(l,!1),o&&b.scrollLeft(0)&&w(o,!1),b.trigger("jsp-initialised",[X||W])}function e(){W&&(R.append(a('<div class="jspVerticalBar" />').append(a('<div class="jspCap jspCapTop" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragTop" />'),a('<div class="jspDragBottom" />'))),a('<div class="jspCap jspCapBottom" />'))),cb=R.find(">.jspVerticalBar"),db=cb.find(">.jspTrack"),Y=db.find(">.jspDrag"),N.showArrows&&(hb=a('<a class="jspArrow jspArrowUp" />').bind("mousedown.jsp",k(0,-1)).bind("click.jsp",E),ib=a('<a class="jspArrow jspArrowDown" />').bind("mousedown.jsp",k(0,1)).bind("click.jsp",E),N.arrowScrollOnHover&&(hb.bind("mouseover.jsp",k(0,-1,hb)),ib.bind("mouseover.jsp",k(0,1,ib))),j(db,N.verticalArrowPositions,hb,ib)),fb=Q,R.find(">.jspVerticalBar>.jspCap:visible,>.jspVerticalBar>.jspArrow").each(function(){fb-=a(this).outerHeight()}),Y.hover(function(){Y.addClass("jspHover")},function(){Y.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",E),Y.addClass("jspActive");var c=b.pageY-Y.position().top;return a("html").bind("mousemove.jsp",function(a){p(a.pageY-c,!1)}).bind("mouseup.jsp mouseleave.jsp",o),!1}),f())}function f(){db.height(fb+"px"),$=0,eb=N.verticalGutter+db.outerWidth(),O.width(P-eb-rb);try{0===cb.position().left&&O.css("margin-left",eb+"px")}catch(a){}}function g(){X&&(R.append(a('<div class="jspHorizontalBar" />').append(a('<div class="jspCap jspCapLeft" />'),a('<div class="jspTrack" />').append(a('<div class="jspDrag" />').append(a('<div class="jspDragLeft" />'),a('<div class="jspDragRight" />'))),a('<div class="jspCap jspCapRight" />'))),jb=R.find(">.jspHorizontalBar"),kb=jb.find(">.jspTrack"),_=kb.find(">.jspDrag"),N.showArrows&&(nb=a('<a class="jspArrow jspArrowLeft" />').bind("mousedown.jsp",k(-1,0)).bind("click.jsp",E),ob=a('<a class="jspArrow jspArrowRight" />').bind("mousedown.jsp",k(1,0)).bind("click.jsp",E),N.arrowScrollOnHover&&(nb.bind("mouseover.jsp",k(-1,0,nb)),ob.bind("mouseover.jsp",k(1,0,ob))),j(kb,N.horizontalArrowPositions,nb,ob)),_.hover(function(){_.addClass("jspHover")},function(){_.removeClass("jspHover")}).bind("mousedown.jsp",function(b){a("html").bind("dragstart.jsp selectstart.jsp",E),_.addClass("jspActive");var c=b.pageX-_.position().left;return a("html").bind("mousemove.jsp",function(a){r(a.pageX-c,!1)}).bind("mouseup.jsp mouseleave.jsp",o),!1}),lb=R.innerWidth(),h())}function h(){R.find(">.jspHorizontalBar>.jspCap:visible,>.jspHorizontalBar>.jspArrow").each(function(){lb-=a(this).outerWidth()}),kb.width(lb+"px"),bb=0}function i(){if(X&&W){var b=kb.outerHeight(),c=db.outerWidth();fb-=b,a(jb).find(">.jspCap:visible,>.jspArrow").each(function(){lb+=a(this).outerWidth()}),lb-=c,Q-=c,P-=b,kb.parent().append(a('<div class="jspCorner" />').css("width",b+"px")),f(),h()}X&&O.width(R.outerWidth()-rb+"px"),T=O.outerHeight(),V=T/Q,X&&(mb=Math.ceil(1/U*lb),mb>N.horizontalDragMaxWidth?mb=N.horizontalDragMaxWidth:mb<N.horizontalDragMinWidth&&(mb=N.horizontalDragMinWidth),_.width(mb+"px"),ab=lb-mb,s(bb)),W&&(gb=Math.ceil(1/V*fb),gb>N.verticalDragMaxHeight?gb=N.verticalDragMaxHeight:gb<N.verticalDragMinHeight&&(gb=N.verticalDragMinHeight),Y.height(gb+"px"),Z=fb-gb,q($))}function j(a,b,c,d){var e,f="before",g="after";"os"==b&&(b=/Mac/.test(navigator.platform)?"after":"split"),b==f?g=b:b==g&&(f=b,e=c,c=d,d=e),a[f](c)[g](d)}function k(a,b,c){return function(){return l(a,b,this,c),this.blur(),!1}}function l(b,c,d,e){d=a(d).addClass("jspActive");var f,g,h=!0,i=function(){0!==b&&tb.scrollByX(b*N.arrowButtonSpeed),0!==c&&tb.scrollByY(c*N.arrowButtonSpeed),g=setTimeout(i,h?N.initialDelay:N.arrowRepeatFreq),h=!1};i(),f=e?"mouseout.jsp":"mouseup.jsp",e=e||a("html"),e.bind(f,function(){d.removeClass("jspActive"),g&&clearTimeout(g),g=null,e.unbind(f)})}function m(){n(),W&&db.bind("mousedown.jsp",function(b){if(void 0===b.originalTarget||b.originalTarget==b.currentTarget){var c,d=a(this),e=d.offset(),f=b.pageY-e.top-$,g=!0,h=function(){var a=d.offset(),e=b.pageY-a.top-gb/2,j=Q*N.scrollPagePercent,k=Z*j/(T-Q);if(0>f)$-k>e?tb.scrollByY(-j):p(e);else{if(!(f>0))return void i();e>$+k?tb.scrollByY(j):p(e)}c=setTimeout(h,g?N.initialDelay:N.trackClickRepeatFreq),g=!1},i=function(){c&&clearTimeout(c),c=null,a(document).unbind("mouseup.jsp",i)};return h(),a(document).bind("mouseup.jsp",i),!1}}),X&&kb.bind("mousedown.jsp",function(b){if(void 0===b.originalTarget||b.originalTarget==b.currentTarget){var c,d=a(this),e=d.offset(),f=b.pageX-e.left-bb,g=!0,h=function(){var a=d.offset(),e=b.pageX-a.left-mb/2,j=P*N.scrollPagePercent,k=ab*j/(S-P);if(0>f)bb-k>e?tb.scrollByX(-j):r(e);else{if(!(f>0))return void i();e>bb+k?tb.scrollByX(j):r(e)}c=setTimeout(h,g?N.initialDelay:N.trackClickRepeatFreq),g=!1},i=function(){c&&clearTimeout(c),c=null,a(document).unbind("mouseup.jsp",i)};return h(),a(document).bind("mouseup.jsp",i),!1}})}function n(){kb&&kb.unbind("mousedown.jsp"),db&&db.unbind("mousedown.jsp")}function o(){a("html").unbind("dragstart.jsp selectstart.jsp mousemove.jsp mouseup.jsp mouseleave.jsp"),Y&&Y.removeClass("jspActive"),_&&_.removeClass("jspActive")}function p(c,d){if(W){0>c?c=0:c>Z&&(c=Z);var e=new a.Event("jsp-will-scroll-y");if(b.trigger(e,[c]),!e.isDefaultPrevented()){var f=c||0,g=0===f,h=f==Z,i=c/Z,j=-i*(T-Q);void 0===d&&(d=N.animateScroll),d?tb.animate(Y,"top",c,q,function(){b.trigger("jsp-user-scroll-y",[-j,g,h])}):(Y.css("top",c),q(c),b.trigger("jsp-user-scroll-y",[-j,g,h]))}}}function q(a){void 0===a&&(a=Y.position().top),R.scrollTop(0),$=a||0;var c=0===$,d=$==Z,e=a/Z,f=-e*(T-Q);(ub!=c||wb!=d)&&(ub=c,wb=d,b.trigger("jsp-arrow-change",[ub,wb,vb,xb])),t(c,d),O.css("top",f),b.trigger("jsp-scroll-y",[-f,c,d]).trigger("scroll")}function r(c,d){if(X){0>c?c=0:c>ab&&(c=ab);var e=new a.Event("jsp-will-scroll-x");if(b.trigger(e,[c]),!e.isDefaultPrevented()){var f=c||0,g=0===f,h=f==ab,i=c/ab,j=-i*(S-P);void 0===d&&(d=N.animateScroll),d?tb.animate(_,"left",c,s,function(){b.trigger("jsp-user-scroll-x",[-j,g,h])}):(_.css("left",c),s(c),b.trigger("jsp-user-scroll-x",[-j,g,h]))}}}function s(a){void 0===a&&(a=_.position().left),R.scrollTop(0),bb=a||0;var c=0===bb,d=bb==ab,e=a/ab,f=-e*(S-P);(vb!=c||xb!=d)&&(vb=c,xb=d,b.trigger("jsp-arrow-change",[ub,wb,vb,xb])),u(c,d),O.css("left",f),b.trigger("jsp-scroll-x",[-f,c,d]).trigger("scroll")}function t(a,b){N.showArrows&&(hb[a?"addClass":"removeClass"]("jspDisabled"),ib[b?"addClass":"removeClass"]("jspDisabled"))}function u(a,b){N.showArrows&&(nb[a?"addClass":"removeClass"]("jspDisabled"),ob[b?"addClass":"removeClass"]("jspDisabled"))}function v(a,b){var c=a/(T-Q);p(c*Z,b)}function w(a,b){var c=a/(S-P);r(c*ab,b)}function x(b,c,d){var e,f,g,h,i,j,k,l,m,n=0,o=0;try{e=a(b)}catch(p){return}for(f=e.outerHeight(),g=e.outerWidth(),R.scrollTop(0),R.scrollLeft(0);!e.is(".jspPane");)if(n+=e.position().top,o+=e.position().left,e=e.offsetParent(),/^body|html$/i.test(e[0].nodeName))return;h=z(),j=h+Q,h>n||c?l=n-N.horizontalGutter:n+f>j&&(l=n-Q+f+N.horizontalGutter),isNaN(l)||v(l,d),i=y(),k=i+P,i>o||c?m=o-N.horizontalGutter:o+g>k&&(m=o-P+g+N.horizontalGutter),isNaN(m)||w(m,d)}function y(){return-O.position().left}function z(){return-O.position().top}function A(){var a=T-Q;return a>20&&a-z()<10}function B(){var a=S-P;return a>20&&a-y()<10}function C(){R.unbind(zb).bind(zb,function(a,b,c,d){bb||(bb=0),$||($=0);var e=bb,f=$,g=a.deltaFactor||N.mouseWheelSpeed;return tb.scrollBy(c*g,-d*g,!1),e==bb&&f==$})}function D(){R.unbind(zb)}function E(){return!1}function F(){O.find(":input,a").unbind("focus.jsp").bind("focus.jsp",function(a){x(a.target,!1)})}function G(){O.find(":input,a").unbind("focus.jsp")}function H(){function c(){var a=bb,b=$;switch(d){case 40:tb.scrollByY(N.keyboardSpeed,!1);break;case 38:tb.scrollByY(-N.keyboardSpeed,!1);break;case 34:case 32:tb.scrollByY(Q*N.scrollPagePercent,!1);break;case 33:tb.scrollByY(-Q*N.scrollPagePercent,!1);break;case 39:tb.scrollByX(N.keyboardSpeed,!1);break;case 37:tb.scrollByX(-N.keyboardSpeed,!1)}return e=a!=bb||b!=$}var d,e,f=[];X&&f.push(jb[0]),W&&f.push(cb[0]),O.bind("focus.jsp",function(){b.focus()}),b.attr("tabindex",0).unbind("keydown.jsp keypress.jsp").bind("keydown.jsp",function(b){if(b.target===this||f.length&&a(b.target).closest(f).length){var g=bb,h=$;switch(b.keyCode){case 40:case 38:case 34:case 32:case 33:case 39:case 37:d=b.keyCode,c();break;case 35:v(T-Q),d=null;break;case 36:v(0),d=null}return e=b.keyCode==d&&g!=bb||h!=$,!e}}).bind("keypress.jsp",function(b){return b.keyCode==d&&c(),b.target===this||f.length&&a(b.target).closest(f).length?!e:void 0}),N.hideFocus?(b.css("outline","none"),"hideFocus"in R[0]&&b.attr("hideFocus",!0)):(b.css("outline",""),"hideFocus"in R[0]&&b.attr("hideFocus",!1))}function I(){b.attr("tabindex","-1").removeAttr("tabindex").unbind("keydown.jsp keypress.jsp"),O.unbind(".jsp")}function J(){if(location.hash&&location.hash.length>1){var b,c,d=escape(location.hash.substr(1));try{b=a("#"+d+', a[name="'+d+'"]')}catch(e){return}b.length&&O.find(d)&&(0===R.scrollTop()?c=setInterval(function(){R.scrollTop()>0&&(x(b,!0),a(document).scrollTop(R.position().top),clearInterval(c))},50):(x(b,!0),a(document).scrollTop(R.position().top)))}}function K(){a(document.body).data("jspHijack")||(a(document.body).data("jspHijack",!0),a(document.body).delegate('a[href*="#"]',"click",function(b){var c,d,e,f,g,h,i=this.href.substr(0,this.href.indexOf("#")),j=location.href;if(-1!==location.href.indexOf("#")&&(j=location.href.substr(0,location.href.indexOf("#"))),i===j){c=escape(this.href.substr(this.href.indexOf("#")+1));try{d=a("#"+c+', a[name="'+c+'"]')}catch(k){return}d.length&&(e=d.closest(".jspScrollable"),f=e.data("jsp"),f.scrollToElement(d,!0),e[0].scrollIntoView&&(g=a(window).scrollTop(),h=d.offset().top,(g>h||h>g+a(window).height())&&e[0].scrollIntoView()),b.preventDefault())}}))}function L(){var a,b,c,d,e,f=!1;R.unbind("touchstart.jsp touchmove.jsp touchend.jsp click.jsp-touchclick").bind("touchstart.jsp",function(g){var h=g.originalEvent.touches[0];a=y(),b=z(),c=h.pageX,d=h.pageY,e=!1,f=!0}).bind("touchmove.jsp",function(g){if(f){var h=g.originalEvent.touches[0],i=bb,j=$;return tb.scrollTo(a+c-h.pageX,b+d-h.pageY),e=e||Math.abs(c-h.pageX)>5||Math.abs(d-h.pageY)>5,i==bb&&j==$}}).bind("touchend.jsp",function(){f=!1}).bind("click.jsp-touchclick",function(){return e?(e=!1,!1):void 0})}function M(){var a=z(),c=y();b.removeClass("jspScrollable").unbind(".jsp"),O.unbind(".jsp"),b.replaceWith(yb.append(O.children())),yb.scrollTop(a),yb.scrollLeft(c),pb&&clearInterval(pb)}var N,O,P,Q,R,S,T,U,V,W,X,Y,Z,$,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb,tb=this,ub=!0,vb=!0,wb=!1,xb=!1,yb=b.clone(!1,!1).empty(),zb=a.fn.mwheelIntent?"mwheelIntent.jsp":"mousewheel.jsp";"border-box"===b.css("box-sizing")?(qb=0,rb=0):(qb=b.css("paddingTop")+" "+b.css("paddingRight")+" "+b.css("paddingBottom")+" "+b.css("paddingLeft"),rb=(parseInt(b.css("paddingLeft"),10)||0)+(parseInt(b.css("paddingRight"),10)||0)),a.extend(tb,{reinitialise:function(b){b=a.extend({},N,b),d(b)},scrollToElement:function(a,b,c){x(a,b,c)},scrollTo:function(a,b,c){w(a,c),v(b,c)},scrollToX:function(a,b){w(a,b)},scrollToY:function(a,b){v(a,b)},scrollToPercentX:function(a,b){w(a*(S-P),b)},scrollToPercentY:function(a,b){v(a*(T-Q),b)},scrollBy:function(a,b,c){tb.scrollByX(a,c),tb.scrollByY(b,c)},scrollByX:function(a,b){var c=y()+Math[0>a?"floor":"ceil"](a),d=c/(S-P);r(d*ab,b)},scrollByY:function(a,b){var c=z()+Math[0>a?"floor":"ceil"](a),d=c/(T-Q);p(d*Z,b)},positionDragX:function(a,b){r(a,b)},positionDragY:function(a,b){p(a,b)},animate:function(a,b,c,d,e){var f={};f[b]=c,a.animate(f,{duration:N.animateDuration,easing:N.animateEase,queue:!1,step:d,complete:e})},getContentPositionX:function(){return y()},getContentPositionY:function(){return z()},getContentWidth:function(){return S},getContentHeight:function(){return T},getPercentScrolledX:function(){return y()/(S-P)},getPercentScrolledY:function(){return z()/(T-Q)},getIsScrollableH:function(){return X},getIsScrollableV:function(){return W},getContentPane:function(){return O},scrollToBottom:function(a){p(Z,a)},hijackInternalLinks:a.noop,destroy:function(){M()}}),d(c)}return b=a.extend({},a.fn.jScrollPane.defaults,b),a.each(["arrowButtonSpeed","trackClickSpeed","keyboardSpeed"],function(){b[this]=b[this]||b.speed}),this.each(function(){var d=a(this),e=d.data("jsp");e?e.reinitialise(b):(a("script",d).filter('[type="text/javascript"],:not([type])').remove(),e=new c(d,b),d.data("jsp",e))})},a.fn.jScrollPane.defaults={showArrows:!1,maintainPosition:!0,stickToBottom:!1,stickToRight:!1,clickOnTrack:!0,autoReinitialise:!1,autoReinitialiseDelay:500,verticalDragMinHeight:0,verticalDragMaxHeight:99999,horizontalDragMinWidth:0,horizontalDragMaxWidth:99999,contentWidth:void 0,animateScroll:!1,animateDuration:300,animateEase:"linear",hijackInternalLinks:!1,verticalGutter:4,horizontalGutter:4,mouseWheelSpeed:3,arrowButtonSpeed:0,arrowRepeatFreq:50,arrowScrollOnHover:!1,trackClickSpeed:0,trackClickRepeatFreq:70,verticalArrowPositions:"split",horizontalArrowPositions:"split",enableKeyboardNavigation:!0,hideFocus:!1,keyboardSpeed:0,initialDelay:300,speed:30,scrollPagePercent:.8}});

/**
 * Copyright (c) 2007 Ariel Flesler - aflesler ? gmail • com | https://github.com/flesler
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 2.1.2
 */
;(function(f){"use strict";"function"===typeof define&&define.amd?define(["jquery"],f):"undefined"!==typeof module&&module.exports?module.exports=f(require("jquery")):f(jQuery)})(function($){"use strict";function n(a){return!a.nodeName||-1!==$.inArray(a.nodeName.toLowerCase(),["iframe","#document","html","body"])}function h(a){return $.isFunction(a)||$.isPlainObject(a)?a:{top:a,left:a}}var p=$.scrollTo=function(a,d,b){return $(window).scrollTo(a,d,b)};p.defaults={axis:"xy",duration:0,limit:!0};$.fn.scrollTo=function(a,d,b){"object"=== typeof d&&(b=d,d=0);"function"===typeof b&&(b={onAfter:b});"max"===a&&(a=9E9);b=$.extend({},p.defaults,b);d=d||b.duration;var u=b.queue&&1<b.axis.length;u&&(d/=2);b.offset=h(b.offset);b.over=h(b.over);return this.each(function(){function k(a){var k=$.extend({},b,{queue:!0,duration:d,complete:a&&function(){a.call(q,e,b)}});r.animate(f,k)}if(null!==a){var l=n(this),q=l?this.contentWindow||window:this,r=$(q),e=a,f={},t;switch(typeof e){case "number":case "string":if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(e)){e= h(e);break}e=l?$(e):$(e,q);case "object":if(e.length===0)return;if(e.is||e.style)t=(e=$(e)).offset()}var v=$.isFunction(b.offset)&&b.offset(q,e)||b.offset;$.each(b.axis.split(""),function(a,c){var d="x"===c?"Left":"Top",m=d.toLowerCase(),g="scroll"+d,h=r[g](),n=p.max(q,c);t?(f[g]=t[m]+(l?0:h-r.offset()[m]),b.margin&&(f[g]-=parseInt(e.css("margin"+d),10)||0,f[g]-=parseInt(e.css("border"+d+"Width"),10)||0),f[g]+=v[m]||0,b.over[m]&&(f[g]+=e["x"===c?"width":"height"]()*b.over[m])):(d=e[m],f[g]=d.slice&& "%"===d.slice(-1)?parseFloat(d)/100*n:d);b.limit&&/^\d+$/.test(f[g])&&(f[g]=0>=f[g]?0:Math.min(f[g],n));!a&&1<b.axis.length&&(h===f[g]?f={}:u&&(k(b.onAfterFirst),f={}))});k(b.onAfter)}})};p.max=function(a,d){var b="x"===d?"Width":"Height",h="scroll"+b;if(!n(a))return a[h]-$(a)[b.toLowerCase()]();var b="client"+b,k=a.ownerDocument||a.document,l=k.documentElement,k=k.body;return Math.max(l[h],k[h])-Math.min(l[b],k[b])};$.Tween.propHooks.scrollLeft=$.Tween.propHooks.scrollTop={get:function(a){return $(a.elem)[a.prop]()}, set:function(a){var d=this.get(a);if(a.options.interrupt&&a._last&&a._last!==d)return $(a.elem).stop();var b=Math.round(a.now);d!==b&&($(a.elem)[a.prop](b),a._last=this.get(a))}};return p});
            
var global_storage=false;
function storageAvailable(type) {
	try {
		var storage = window[type],
			x = '__storage_test__';
		storage.setItem(x, x);
		storage.removeItem(x);
		return true;
	}
	catch(e) {
		return false;
	}
}
if (storageAvailable('localStorage')) {
	global_storage=true;
}

function StorageHelperSet(key,value) {
    if (global_storage===true) {
        var storage = window['localStorage'];
        storage.setItem(key, value);
    }
}

function StorageHelperGet(key) {
    if (global_storage===true) {
        var storage = window['localStorage'];
        var result=storage.getItem(key);
        return result;
    }
}
function StorageHelperRemove(key) {
    if (global_storage===true) {
        var storage = window['localStorage'];
        storage.removeItem(key);
    }
}

String.prototype.replaceAll = function( token, newToken, ignoreCase ) {
    var _token;
    var str = this + "";
    var i = -1;

    if ( typeof token === "string" ) {

        if ( ignoreCase ) {

            _token = token.toLowerCase();

            while( (
                i = str.toLowerCase().indexOf(
                    _token, i >= 0 ? i + newToken.length : 0
                ) ) !== -1
            ) {
                str = str.substring( 0, i ) +
                    newToken +
                    str.substring( i + token.length );
            }

        } else {
            return this.split( token ).join( newToken );
        }

    }
return str;
};

function StorageHelperLoadJsFile(f) {
   // StorageHelperRemove(f);
    var file=StorageHelperGet(f);
    if (file) {
        document.write("<script type=\'text/javascript\'>"+file+"</script>");
    } else {
       //  alert("neu"+" "+f);
        var xmlhttp;
        try { xmlhttp = new XMLHttpRequest(); } catch (error) {
        try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (error) {}
        }

        xmlhttp.open("GET",f, false);
        xmlhttp.setRequestHeader("Content-Type", "text/javascript");
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                if (xmlhttp.responseText!="") {
                    var response=xmlhttp.responseText;
                            response = response.replace(/\/\*[\s\S]*?\*\//g, "");
                           // alert(response);
                    document.write("<script type=\'text/javascript\'>"+response+"</script>");
                    StorageHelperSet(f,response);
                }
            }
        }
        xmlhttp.send(null); 
    }
}
/**/

function StorageHelperLoadCssFile(f) {
   
  // StorageHelperRemove(f);
    var file=StorageHelperGet(f);
    if (file) {
        document.write("<style type=\'text/css\'>"+file+"</style>");
    } else {

        var xmlhttp;
        try { xmlhttp = new XMLHttpRequest(); } catch (error) {
        try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); } catch (error) {}
        }

        xmlhttp.open("GET","_cssrequest.php?href="+f, false);
        xmlhttp.setRequestHeader("Content-Type", "text/css");
        xmlhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                if (xmlhttp.responseText!="") {
                    var response=xmlhttp.responseText;
                    document.write("<style type=\'text/css\'>"+response+"</style>");
                    StorageHelperSet(f,response);
                }
            }
        }
        xmlhttp.send(null); 
    }
}

var StorageHelper= {
    set: function(key,value) {
        try {
            var storage = window['localStorage'];
            storage.setItem(key, value);
        } catch(e) {}
    },
    get: function(key) {
        try {
            var storage = window['localStorage'];
            var result=storage.getItem(key);
            return result;
        } catch(e) {}
    },
    remove: function (key) {
        try {
            var storage = window['localStorage'];
            storage.removeItem(key);
        } catch(e) {}
    }
}

if (!window.console) window.console = {};
if (!window.console.log) window.console.log = function () { };

var window_height=0;
try {
   window_height = window.innerHeight
    || document.documentElement.clientHeight
    || document.body.clientHeight;
} catch(e) {
    window_height = 0;
}

jq1112.browser.device = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));

function window_content_height() {
    var h;
    if (!design_70) {
        h=jq1112("html").height();
    } else {
        h=(jq1112(window).height()-jq1112("div[name='menu']").height()-jq1112("div[name='tabs']").height());
    }
    return h;
}
function window_menu_height() {
    var h;
    if (!design_70) {
        h=0;
    } else {
        h=jq1112("div[name='menu']").height();
    }
    return h;
}
function triggerEvent(el, type){
if ('createEvent' in document) {
        // modern browsers, IE9+
        var e = document.createEvent('HTMLEvents');
        e.initEvent(type, false, true);
        el.dispatchEvent(e);
    } else {
        // IE 8
        var e = document.createEventObject();
        e.eventType = type;
        el.fireEvent('on'+e.eventType, e);
    }
}

function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };

  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

function dateiauswahl(evt) {
    var files = evt.target.files; // FileList object
    var output = document.createElement("ul");
    var li=null;
    for (var i = 0, f; f = files[i]; i++) {
        li = document.createElement("li");
        li.innerHTML=f.name+" ("+f.size+" bytes) ";
        output.appendChild(li);
    }
  
    var ele=evt.target;
    var a = document.createElement("a");
    a.href="javascript:void(0);";
    a.onclick=function() {
        ele.parentElement.nextSibling.nextSibling.innerHTML="";
        try {
            ele.value = null;
        } catch(ex) { }
        if (ele.value) {
          ele.parentNode.replaceChild(ele.cloneNode(true), ele);
        }
    }
    a.innerHTML=lang_anhaenge+" "+lang_loeschen;
     
    ele.parentElement.nextSibling.nextSibling.innerHTML="";
    ele.parentElement.nextSibling.nextSibling.appendChild(output);
    ele.parentElement.nextSibling.nextSibling.appendChild(a);
}

jq1112.fn.resized = function (callback, timeout) {
    jq1112(this).resize(function () {
        var $this = jq1112(this);
        if ($this.data('resizeTimeout')) {
            clearTimeout($this.data('resizeTimeout'));
        }
        $this.data('resizeTimeout', setTimeout(callback, timeout));
    });
};


function escapeP4n_60(s, kein_sql) {
    if (!kein_sql) {
        s = s.replace(/\_/g, "intstrihc");
    } else {
        s = s.replace(/\'/g, "nafuhrungs");
        s = s.replace(String.fromCharCode(92), "bockslsh");
    }
    if (s==="") {
        return s;
    }
    return "p4nn4p"+encodeURIComponent(s);
}


function p4n_changeIcon(doc,a,iconclass) { 
    var spans=doc.getElementsByTagName("span"); 
    for (var i = 0; i < spans.length; i++) { 
        if (typeof spans[i] == "object" && spans[i].getAttribute("name") && spans[i].getAttribute("name")==a) { 
            spans[i].className=iconclass; 
        }
    }
}


function handle_smstextarea_changed(ele) {
    if (typeof ele != typeof undefined && ele) {
        var text=ele.value;
        if (text!="") {
            text=text.replace(/[\n\r]{1,2}/g," ");
            ele.value=text;
        }
    }
}

function init_smstextarea() {
    var textarea=null;
    jq1112(".javas_smstextarea").each(function (i) {
        textarea=jq1112(this);
        handle_smstextarea_changed(jq1112(this)[0]);
        textarea.data("initial_value", jq1112(this).val());
        
        textarea.keyup(function() {
            if (jq1112(this).val() != jq1112(this).data("initial_value")) {
                handle_smstextarea_changed(jq1112(this)[0]);
            }
        });
        textarea.bind("change paste", function() {
            handle_smstextarea_changed(jq1112(this)[0]);
        });
    });
}

//var keys = {37: 1, 38: 1, 39: 1, 40: 1};
var keys = {38: 1, 40: 1};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}
 
function disableScroll() {
  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
  document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}


if (!design_70) {
    var topmain;
    try { topmain=top.main } catch(e) {
        topmain=document;
        parent=document;
    }

    var topmenu;
    try { topmenu=top.menu } catch(e) {
        topmenu=null
    }

    var toptabs;
    try { toptabs=top.tabs } catch(e) {
        toptabs=null
    }
} else {
    var topmain=top;
    var topmenu=top;
    var toptabs=top;
}


if (!design_70) jq1112.fx.off = true;

jq1112.fn.hasHorizontalScrollBar = function() {
        return this.get(0) ? this.get(0).scrollWidth > this.innerWidth() : false;
}
jq1112.fn.hasVerticalScrollBar = function() {
        return this.get(0) ? this.get(0).scrollHeight > this.innerHeight() : false;
}



jq1112.fn.sizeChanged = function (handleFunction) {
    var element = this;
    var lastWidth = element.width();
    var lastHeight = element.height();

    setInterval(function () {
        if (lastWidth === element.width()&&lastHeight === element.height())
            return;
        if (typeof (handleFunction) == 'function') {
            handleFunction({ width: lastWidth, height: lastHeight },
                           { width: element.width(), height: element.height() });
            lastWidth = element.width();
            lastHeight = element.height();
        }
    }, 100);


    return element;
};



function p4nwindow_load_warten() {};

jq1112.fn.extend({
    unwrapInner: function(selector) {
        return this.each(function() {
            var t = this,
                c = jq1112(t).children(selector);
            if (c.length === 1) {
                c.contents().appendTo(t);
                c.remove();
            }
        });
    }
});

String.prototype.replaceAll = function(search, replace, ignoreCase) {
  if (ignoreCase) {
    var result = [];
    var _string = this.toLowerCase();
    var _search = search.toLowerCase();
    var start = 0, match, length = _search.length;
    while ((match = _string.indexOf(_search, start)) >= 0) {
      result.push(this.slice(start, match));
      start = match + length;
    }
    result.push(this.slice(start));
  } else {
    result = this.split(search);
  }
  return result.join(replace);
}

function fileUploadBtn(f) {
     try {jq1112(f).parent().find(".btn-upload").trigger("click");} catch(e) {}
}
  
function scrollbarWidth() {
    var div = jq1112('<div style="width:50px;height:50px;overflow-y:scroll;position:absolute;display:block;"><div style="height:100px;display:block;"></div></div>');
    // Append our div, do our calculation and then remove it
    jq1112('body').append(div);
    var w1 = jq1112(div).width();
   // jq1112(div).css('overflow-y', 'scroll');
    var w2 = jq1112(div).find("div").innerWidth();
  //  jq1112(div).find("div").css("border","1px solid red");
    jq1112(div).remove();
    return parseInt(w1 - w2);
}

function scrollbarHeight() {
    var div = jq1112('<div style="width:50px;height:50px;overflow-y:scroll;position:absolute;display:block;"><div style="height:100px;display:block;"></div></div>');
    // Append our div, do our calculation and then remove it
    jq1112('body').append(div);
    var w1 = jq1112(div).height();
   // jq1112(div).css('overflow-y', 'scroll');
    var w2 = jq1112(div).find("div").innerHeight();
  //  jq1112(div).find("div").css("border","1px solid red");
    jq1112(div).remove();
    return parseInt(w1 - w2);
}

var FrameHelper= {
    doIt: function() {
            var top_width = jq1112("html",topmenu.document).width();
            var content_width =jq1112("html",topmain.document).width();

            var paddT = jq1112("body",topmain.document).innerWidth() - jq1112("body",topmain.document).width();
            paddT=paddT/2;

            if (top_width>content_width) {
                jq1112("body",topmenu.document).css({paddingRight:paddT+(top_width-content_width)});
            }
    }
}

var IframeModulHelper={
    init: function(id) {
        var h = jq1112("#"+id).contents().height();
        jq1112("#"+id).css({height:h});
        jq1112(window).resize(function () {
            var h = jq1112("#"+id).contents().height();
            jq1112("#"+id).css({height:h});
        });
    }
}  
            
function hexc(colorval) {
    if (typeof colorval !== typeof undefined && colorval) {
        var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        delete(parts[0]);
        for (var i = 1; i <= 3; ++i) {
            parts[i] = parseInt(parts[i]).toString(16);
            if (parts[i].length == 1) parts[i] = '0' + parts[i];
        }
        return '#' + parts.join('');
    } else {
        return "#414242";
    }  
}

var P4nBoxHelper = {
    zaehler: 0,
    singleArr:new Array(),
    strict:false,
    menu:false,
    loading_active:false,
    block:false,
    resize:null,
    iframe: function (id,href,autosize,width,height) {
         if (!autosize || autosize == "") {
            autosize = false;
        }
        if (!width || width == "") {
            width = "90%";
        }
        if (!height || height == "") {
            height = "90%";
        }
        P4nBoxHelper.init({
            iframeid:id+"_iframe",
            target:"body",
            href:href,
            autosize:autosize,
            width:width,
            height:height,
            type:"iframe",
            id: id
        });
    },
    requestPost: function (ziel,post,callback,width,height,autosize,id) {
        
        if (typeof callback == typeof undefined || !callback || callback == "") {
            callback = null;
        }
        if (typeof width == typeof undefined || !width || width == "") {
            width = "90%";
        }
        if (typeof height == typeof undefined || !height || height == "") {
            height = "90%";
        }
        var single=false;
        if (typeof id == typeof undefined || !id || id == "") {
            id = "";
        } else {
            single=true;
        }
        if (typeof autosize == typeof undefined || !autosize || autosize == "") {
            autosize = false;
        }
        if (typeof post == typeof undefined || !post || post == "") {
            post="";
        }
        P4nBoxHelper.init({
            target:"body",
            href:ziel,
            post:post,
            autosize:autosize,
            width:width,
            height:height,
            type:"post",
            id: id,
            single:single
        });
    },
    requestGet: function (ziel,callback,width,height,autosize,id) {
        if (typeof callback == typeof undefined || !callback || callback == "") {
            callback = null;
        }
        if (typeof width == typeof undefined || !width || width == "") {
            width = "90%";
        }
        if (typeof height == typeof undefined || !height || height == "") {
            height = "90%";
        }
        var single=false;
        if (typeof id == typeof undefined || !id || id == "") {
            id = "";
        } else {
            single=true;
        }
        if (typeof autosize == typeof undefined || !autosize || autosize == "") {
            autosize = false;
        }
        P4nBoxHelper.init({
            target:"body",
            href:ziel,
            autosize:autosize,
            width:width,
            height:height,
            type:"get",
            id: id,
            single:single
        });
    },
    init: function (P) {
        if (typeof P.buttons == typeof undefined) {
            P.buttons="";
        }
        if (typeof P.noclosebtn == typeof undefined) {
            P.noclosebtn=false;
        }
        if (
            typeof P.close_onlydisplay != 'undefined' && P.close_onlydisplay
            && typeof P.id != 'undefined' && P.id && P.id != ""
            && jq1112("#"+P.id).length>0
        ) 
        {
            jq1112("#"+P.id).css("display","block");
            P4nBoxHelper.setOverlay_strict(P); 
            if (typeof P.callback == 'function') {
                P.callback();
            }
            return;
        }
        if (P4nBoxHelper.block==false) {
            P4nBoxHelper.block=true;

            if (typeof P.from != typeof undefined && P.from=="menu") {
                P.focused=jq1112(topmenu.document.activeElement);
            } else {
                P.focused=jq1112(document.activeElement);
            }
            
            if (!P.width || P.width == "") {
                P.width = "800px";
            }
            if (!P.height || P.height == "") {
                P.height = "550px";
            }
            if (!P.autosize || P.autosize == "") {
                P.autosize = false;
            }
            P.autosizeh=false;
            if (P.height=="autosize") {
                P.autosizeh = true;
            }
            P.autosizew = false;
            if (P.width=="autosize") {
                P.autosizew = true;
            }
            if (P.width=="autosize" && P.height=="autosize") {
                P.autosizew = false;
                P.autosizeh = false;
                P.autosize = true;
            }
            if (typeof P.id != 'undefined' && P.id && P.id != "") {
            } else {
                 P.id = "P4nBox" + P4nBoxHelper.zaehler;
            }

            /*P.single*/
            if (typeof P.single !== typeof undefined) {
                if (typeof P4nBoxHelper.singleArr[P.id] !== typeof undefined) {
                    var obj=P4nBoxHelper.singleArr[P.id];
                    obj.maxWidth=null;
                    obj.maxHeight=null;
                    P4nBoxHelper.calcDimension(obj,false);
                    P4nBoxHelper.calcPosition(obj);

                    if (P.type == "post" || P.type == "POST" || P.type == "Post") {
                        var obj = jq1112("#" + P.id + "_inner");
                        RequestHelper.post(P.href, P.post, function (response) {
                            obj.html(response);
                            try {P.focused.focus().val(P.focused.attr('value'));} catch(e) {}
                            if (typeof P.callback == 'function') {
                                P.callback();
                            }
                        });
                    }
                    if (P.type == "get" || P.type == "GET" || P.type == "Get") {
                        var obj = jq1112("#" + P.id + "_inner");
                        RequestHelper.get(P.href, function (response) {
                            obj.html(response);
                            try {P.focused.focus().val(P.focused.attr('value'));} catch(e) {}
                            if (typeof P.callback == 'function') {
                                P.callback();
                            }
                        });
                    }
                    if (P.type == "iframe") {
                        var obj = jq1112("#" + P.iframeid);
                        var isTouch = document.createTouch !== undefined;
                        obj.one('load', function () {
                            if (!isTouch) {
                                obj.bind('load.fb', P4nBoxHelper.update(P));
                            }
                            P4nBoxHelper.finish(P);
                            if (typeof P.callback == 'function') {
                                P.callback();
                            }
                        });
                        P4nBoxHelper.setLoading();
                        obj.attr("src", P.href);
                    } else {
                        P4nBoxHelper.removeLoading();
                        P4nBoxHelper.removeLoadingText();
                    }
                    P4nBoxHelper.block=false;
                    return;
                }
            }

            P4nBoxHelper.zaehler++;
            P4nBoxHelper.zaehler++;
            P4nBoxHelper.start(P);

            if (P.type == "iframe") {
                var obj = jq1112("#" + P.iframeid);
                var isTouch = document.createTouch !== undefined;
                obj.one('load', function () {
                    if (!isTouch) {
                        obj.bind('load.fb', P4nBoxHelper.update(P));
                    }
                    P4nBoxHelper.finish(P);
                    if (typeof P.callback == 'function') {
                        P.callback();
                    }
                });
                P.href=RequestHelper.newWert(P.href,"options_overflow","0",false);
                P.href=RequestHelper.newWert(P.href,"options_padding","0",false);
                P.href=RequestHelper.newWert(P.href,"options_menu","0",false);
                obj.attr("src", P.href);
            }
            if (P.type == "obj") {
                P4nBoxHelper.clonetoBox(P);
                P4nBoxHelper.finish(P);
                if (typeof P.callback == 'function') {
                    P.callback();
                }
            }
            if (P.type == "innerObj") {
                P4nBoxHelper.cloneInnertoBox(P);
                P4nBoxHelper.finish(P);
                if (typeof P.callback == 'function') {
                    P.callback(P.id);
                }
            }
            if (P.type == "html") {
                var obj = jq1112("#" + P.id + "_inner");
                obj.html(P.html);

                P4nBoxHelper.finish(P);
                if (typeof Pcallback == 'function') {
                    Pcallback();
                }
            }
            if (P.type == "post" || P.type == "POST" || P.type == "Post") {
                var obj = jq1112("#" + P.id + "_inner");
                RequestHelper.post(P.href, P.post, function (response) {
                    obj.html(response);
                    P4nBoxHelper.finish(P);
                    if (typeof P.callback == 'function') {
                        P.callback();
                    }
                });
            }
            if (P.type == "get" || P.type == "GET" || P.type == "Get") {
                var obj = jq1112("#" + P.id + "_inner");
                RequestHelper.get(P.href, function (response) {
                    obj.html(response);
                    P4nBoxHelper.finish(P);
                    if (typeof P.callback == 'function') {
                        P.callback();
                    }
                });
            }
            if (typeof P.single !== typeof undefined) {
                P4nBoxHelper.singleArr[P.id]=P;
            }
        }
        P4nBoxHelper.block=false;
    },
    start: function (P) {
        P4nBoxHelper.setLoading();
        if (typeof P.close_onlydisplay != 'undefined' && P.close_onlydisplay) {
            P4nBoxHelper.setOverlay_strict(P);
        } else {
            P4nBoxHelper.setOverlay();
        }
        P4nBoxHelper.setHtml(P);
    },
    startloading: function(overlay, html) {
        OverlibHelper.closeall();
        FavoritenHelper.close();
        if (typeof InfoPanel=="object") {InfoPanel.closeall();}
        MenuHelper.closeall();
        if (typeof overlay != typeof undefined && overlay==true) {
        P4nBoxHelper.setOverlay(true);
        }
        if (typeof html != typeof undefined && html!="") {
            P4nBoxHelper.setLoadingText(html);
        } else {
            P4nBoxHelper.setLoading();
        }
    },
    stoploading: function() {
        if (P4nBoxHelper.strict==true) {
            
        } else {
            P4nBoxHelper.removeOverlay();
            P4nBoxHelper.removeLoading();
            P4nBoxHelper.removeLoadingText();
        }
    },
    finish: function (P) {
        if (typeof P.beforeShow == 'function') {
            P.beforeShow();
        }
        P4nBoxHelper.calcDimension(P,true);
        P4nBoxHelper.calcPosition(P);
        P4nBoxHelper.initClose(P);
        P4nBoxHelper.update(P);
        P4nBoxHelper.removeLoading();
        P4nBoxHelper.removeLoadingText();
        if (P.autosize || P.autosizeh || P.autosizew) {
            P4nBoxHelper.calcDimension(P,false);
            P4nBoxHelper.calcPosition(P);
        }
        P4nBoxHelper.zoomIn(P);
        UpdateHelper.loadDatepicker();
        if (typeof P.afterShow == 'function') {
            P.afterShow();
        }
        //UpdateHelper.loadOverlib();
        try {P.focused.focus().val(P.focused.attr('value'));} catch(e) {}
    },
    document: function () {
        var vars = {
            width: jq1112(window).width(),
            height: jq1112(window).height(),
            scrolltop: jq1112(document).scrollTop(),
            scrollleft: jq1112(document).scrollLeft()
        };
        return vars;
    },
    calcPosition: function (P) {
        var document = P4nBoxHelper.document();
        var obj = jq1112("#" + P.id);

        var obj_width = obj.outerWidth();
        var obj_height = obj.outerHeight();

        var left = (document.width / 2) - (obj_width / 2) + document.scrollleft;
        var top = (document.height / 2) - (obj_height / 2) + document.scrolltop;

        left = (left < 0) ? 0 : left;
        top = (top < 0) ? 0 : top;

        obj.css({left: left, top: top});
    },
    calcDimension: function (P,first) {
        var document = P4nBoxHelper.document();
        var obj = jq1112("#" + P.id);
        var obj_inner = jq1112("#" + P.id + "_inner");
        
        
        if (P.autosizeh) {
            obj.css({"height":"auto","top":"0px"});
            obj_inner.css({"height":"auto"});
            
            if (document.height<obj.outerHeight()) {
                obj.css({"height": "100%"});
                obj_inner.css({"height": "100%"});
                obj.find(".fancybox-skin").css({height: "100%"});
                obj.find(".fancybox-outer").css({height: "100%"});
            } else {
                obj.css({"height": parseInt(obj.outerHeight())});
                obj_inner.css({"height": parseInt(obj_inner.height())});
            }
        }
        if (P.autosizew) {
            obj.css({"width":"auto","left":"0px"});
            obj_inner.css({"width":"auto"});
            
            if (typeof global_ie9 !== typeof undefined && global_ie9==true) {
                obj.css("width","+=17px");
            }
            
            if (document.width<obj.outerWidth()) {
                obj.css({"width": "100%"});
                obj_inner.css({"width": "100%"});
            }
   
        } 
        
        if (P.autosize) {
            obj.css({"width":"auto","left":"0px","height":"auto","top":"0px"});
            obj_inner.css({"width":"auto","height":"auto"});
            
            if (typeof global_ie9 !== typeof undefined && global_ie9==true) {
                obj.css("width","+=17px");
            }
            
            if (document.width<obj.outerWidth()) {
                obj.css({"width": "100%"});
                obj_inner.css({"width": "100%"});
            }
            
            if (document.height<obj.outerHeight()) {
                obj.css({"height": "100%"});
                obj_inner.css({"height": "100%"});
                obj.find(".fancybox-skin").css({height: "100%"});
                obj.find(".fancybox-outer").css({height: "100%"});
            } else {
                obj.css({"height": parseInt(obj.outerHeight())});
                obj_inner.css({"height": parseInt(obj_inner.height())});
            }
            
            return;
        } 
   

        obj.find(".fancybox-skin").css({height: "auto"});
        obj.find(".fancybox-outer").css({height: "auto"});
        
        // if first false
        /*if ((typeof first == "undefined" || !first || first==false || first==null) && (P.autosize)) {
            first=false;
            obj.css({width: "auto", height: "auto"});
            obj_inner.css({width: "auto", height: "auto"});
            if (P.type == "iframe") {
                var scollbw=scrollbarWidth();
                P.width=obj_inner.find("iframe").contents().width()+scollbw;
                P.height=obj_inner.find("iframe").contents().height();
            } else {
                P.width=obj_inner.width();
                P.height=obj_inner.height();
            }
            P.width=(P.width)+"px";
            P.height=(P.height)+"px";
        }*/

        var width = "auto";
        var height = "auto";
        var weinheit="";
        var heinheit="";
      
        //if (!P.autosize) {
            /*width*/
        if (!P.autosizew) {
            einheit = P4nBoxHelper.einheit(P.width);
            if (einheit.art === "px") {
                width = einheit.wert;
                
                P.maxWidth=parseInt(P.maxWidth);
                P.minWidth=parseInt(P.minWidth);
                if ((P.maxWidth && P.maxWidth!="") && (width > P.maxWidth)) {
                    width = P.maxWidth;
                }
                if ((P.minWidth && P.minWidth!="") && (width < P.minWidth)) {
                    width = P.minWidth;
                }
                
                width=parseInt(width)+40+30;
                
                if (width > document.width) {
                    width = "100%";
                    weinheit="%";
                } else {
                   width += "px";
                    weinheit="px"; 
                }
            }
            if (einheit.art === "%") {
                 width =P.width;
                 weinheit="%";
            }
        }
        var abstand2=0;
        if (P.buttons!="") {
            abstand2=30;
        }
            
        /*height*/
        if (!P.autosizeh) {
        var einheit = P4nBoxHelper.einheit(P.height);
        if (einheit.art === "px") {
            height = einheit.wert;

            P.maxHeight=parseInt(P.maxHeight);
            P.minHeight=parseInt(P.minHeight);
            if ((P.maxHeight && P.maxHeight!="") && (height > P.maxHeight)) {
                height = P.maxHeight;
            }
            if ((P.minHeight && P.minHeight!="") && (height < P.minHeight)) {
                height = P.minHeight;
            }

            height=parseInt(height)+40+30+abstand2;

            if (height > document.height) {
                height = "100%";
                heinheit="%";
            } else {
                height += "px";
                heinheit="px";
            }
        }
        if (einheit.art === "%") {
             height =P.height;
             heinheit="%";
        }
        }

        if (!P.autosizew) {
        if (weinheit=="px") {
            if (typeof global_ie9 !== typeof undefined && global_ie9==true && width!="auto" && width!="") {
                width=parseInt(width.replace("px",""))+17;
            }
            width=width+"";
            obj.css({"width": (parseInt(width.replace("px","")))});
            obj_inner.css({"width": (parseInt(width.replace("px",""))-30-40)});
        }
        }
        if (!P.autosizeh) {
        if (heinheit=="px") {
            if (typeof global_ie9 !== typeof undefined && global_ie9==true && height!="auto" && height!="") {
                //height=parseInt(height.replace("px",""))+17;
            }
            height=height+"";
            obj.css({"height": parseInt(height.replace("px",""))});
            obj_inner.css({"height": (parseInt(height.replace("px",""))-30-40-abstand2)});
        }
        }
        if (!P.autosizew) {
        if (weinheit=="%") {
            obj.css({"width": width, "height":height});
            obj_inner.css({width:"100%", height: "100%"});
            obj.find(".fancybox-skin").css({height: "100%"});
            obj.find(".fancybox-outer").css({height: "100%"});
        }
        }
        if (!P.autosizeh) {
        if (heinheit=="%") {
            obj.css({"height":height});
            obj_inner.css({height: "100%"});
            obj.find(".fancybox-skin").css({height: "100%"});
            obj.find(".fancybox-outer").css({height: "100%"});
        }
        }   
        
    },
    einheit: function (str) {
        str = str.toString();
        if (str.substr(str.length - 2, str.length) === "px") {
            return {
                art: "px",
                wert: str.substr(0, str.length - 2)
            }
        }
        if (str.substr(str.length - 1, str.length) === "%") {
            return {
                art: "%",
                wert: str.substr(0, str.length - 1)
            }
        }
        return {
            art: "px",
            wert: parseInt(str)
        }
    },
    setHtml: function (P) {
        var klasse = "fancybox-type-inline";
        var content = "";
        var scroll="scroll";
        if (P.type == "iframe") {
            scroll="auto";
            klasse = "fancybox-type-iframe";
            content = "<iframe src='about:blank' scrolling='auto' id='" + P.iframeid + "' name='" + P.iframeid + "' class='fancybox-iframe' vspace='0' hspace='0' webkitallowfullscreen='' mozallowfullscreen='' allowfullscreen='' frameborder='0' allowtransparency='true'></iframe>";
        }
        
        if (typeof P.close_onlydisplay != 'undefined' && P.close_onlydisplay) {
            klasse+=" fancybox-strict ";
        }
        
        var html = "\n\
        <div id='" + P.id + "' style='z-index:"+(8030+P4nBoxHelper.zaehler+1)+";height: auto; position: absolute; opacity: 0; overflow: visible;' class='fancybox-wrap fancybox-desktop " + klasse + " fancybox-opened' tabindex='-1'>\n\
            <div style='width: auto; height: auto;' class='fancybox-skin'>\n\
                <div class='fancybox-outer "+(P.buttons!=""?"fancybox-outer2":"")+"'>\n\
                    <div id='" + P.id + "_inner' style=' "+(P.noscroll?"overflow: none;":" overflow: auto; overflow-y:"+scroll+"; ")+"' class='fancybox-inner'>" + content+ "</div>\n\
                </div>\n\
                <a title='Close' class='fancybox-item fancybox-close' href='javascript:;' style='"+(P.noclosebtn?"visibility:hidden;":"")+"'></a>\n\
                 "+(P.buttons!=""?"<div class='fancybox-buttons'>"+P.buttons+"</div>":"")+"\n\
            </div>\n\
        </div>\n\
        ";
        
        jq1112(P.target).append(html);
        if (typeof P.onclickclose !== typeof undefined && P.onclickclose==true) {
            jq1112("#"+P.id+"_inner").click(function() {P4nBoxHelper.close(P.id);});
        }
        jq1112(document).keyup(function (event) {
            try {
                if(event.keyCode == 27) {
                    jq1112("#" + P.id).find(".fancybox-close").click();
                }
            } catch(e) {}
        });
        P4nBoxHelper.close=function(cid) {
            if (typeof cid != typeof undefined && cid!="") {
                jq1112("#" + cid).find(".fancybox-close").click();
            } else {
                jq1112("#" + P.id).find(".fancybox-close").click();
            }
        }
    },
    initClose: function (P) {
        var obj = jq1112("#" + P.id);
        obj.find(".fancybox-close").unbind("click").click(function () {
            if (typeof P.beforeClose == 'function') {
                P.beforeClose();
            }
            if (typeof P.close_onlydisplay != typeof undefined && P.close_onlydisplay == true) {
                jq1112("#"+P.id).css("display","none");
                try {$(document).unbind('keyup');} catch(e) {}
                P4nBoxHelper.removeOverlay_strict(P);
                P4nBoxHelper.removeLoading();
                P4nBoxHelper.removeLoadingText();
                return;
            }      
            if (typeof P4nBoxHelper.singleArr[P.id] !== typeof undefined) {
                delete P4nBoxHelper.singleArr[P.id];
            }
            P4nBoxHelper.zaehler--;
            P4nBoxHelper.zaehler--;
            try {$(document).unbind('keyup');} catch(e) {}
            P4nBoxHelper.zoomOut(P);
            P4nBoxHelper.removeOverlay();
            P4nBoxHelper.removeLoading();
            P4nBoxHelper.removeLoadingText();
        });
    },
    close:function(id) {
         jq1112("#" + id).find(".fancybox-close").click();
    },
    closeall:function() {
         jq1112("html").find(".fancybox-close").click();
    },
    update: function (P) {
        jq1112(document).scroll(function () {
            P4nBoxHelper.calcPosition(P);
        });
        jq1112(window).resize(function () {
            P4nBoxHelper.calcDimension(P);
            P4nBoxHelper.calcPosition(P);
        });
        P4nBoxHelper.resize=function() {
            P4nBoxHelper.calcDimension(P);
            P4nBoxHelper.calcPosition(P);
        }
    },
    setOverlay: function (a) {
        if (jq1112(".fancybox-overlay").not(".fancybox-strict").length > 0) {
            var z=P4nBoxHelper.zaehler
            if (typeof a != typeof undefined && a==true) {
                z=(z+2);
            }
            
            jq1112(".fancybox-overlay").not(".fancybox-strict").css({"zIndex":(8030+z)});
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                jq1112(".fancybox-overlay",topmenu.document).not(".fancybox-strict").css({"zIndex":(8030+z)});
            }
        } else {
            jq1112("body").append("<div style='z-index:"+(8030+P4nBoxHelper.zaehler)+";display: block; width: 100%; height:100%;' class='fancybox-overlay fancybox-overlay-fixed'></div>");
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                jq1112("body",topmenu.document).append("<div style='z-index:"+(8030+P4nBoxHelper.zaehler)+";display: block; width: 100%; height:100%;' class='fancybox-overlay fancybox-overlay-fixed'></div>");
            } 
        }
    },
    setOverlay_strict: function (P) {
        if (jq1112("#"+P.id+"_overlay").length > 0) {
            jq1112("#"+P.id+"_overlay").css({"display":"block"});
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                jq1112("#"+P.id+"_overlay",topmenu.document).css({"display":"block"});
            }
        } else {
            jq1112("body").append("<div id='" + P.id + "_overlay' style='z-index:"+(8030+P4nBoxHelper.zaehler)+";display: block; width: 100%; height:100%;' class='fancybox-strict fancybox-overlay fancybox-overlay-fixed'></div>");
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                jq1112("body",topmenu.document).append("<div id='" + P.id + "_overlay' style='z-index:"+(8030+P4nBoxHelper.zaehler)+";display: block; width: 100%; height:100%;' class='fancybox-strict fancybox-overlay fancybox-overlay-fixed'></div>");
            } 
        }
    },
    removeOverlay: function () {
        if (jq1112(".fancybox-wrap").not(".fancybox-strict").length > 0) {
            jq1112(".fancybox-overlay").not(".fancybox-strict").css({"zIndex":(8030+P4nBoxHelper.zaehler)});
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                P4nBoxHelper.menu=false;
                jq1112(".fancybox-overlay",topmenu.document).not(".fancybox-strict").css({"zIndex":(8030+P4nBoxHelper.zaehler)});
            }
        } else {
            if (jq1112(".fancybox-overlay").not(".fancybox-strict").length > 0) {
                jq1112(".fancybox-overlay").not(".fancybox-strict").remove();
                if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                    P4nBoxHelper.menu=false;
                    jq1112(".fancybox-overlay",topmenu.document).not(".fancybox-strict").remove();
                }
            }
        }
    },
    removeOverlay_strict: function (P) {
        if (jq1112("#"+P.id+"_overlay").length > 0) {
            jq1112("#"+P.id+"_overlay").css("display","none");
            if (P4nBoxHelper.menu==true && topmenu && topmenu.document) {
                P4nBoxHelper.menu=false;
                jq1112("#"+P.id+"_overlay",topmenu.document).css("display","none");
            }
        }
    },
    setLoading: function (a) {
       P4nBoxHelper.loading_active=true;
        if (jq1112("#fancybox-loading").length > 0 || jq1112("#fancybox-loading-text").length > 0) {
        } else {
            jq1112("body").append("<div id='fancybox-loading'><div></div></div>");
        }
    },
    setLoadingText: function (html) {
       P4nBoxHelper.loading_active=true;
        if (jq1112("#fancybox-loading-text").length > 0) {
            P4nBoxHelper.updateLoadingText(html);
        } else {
            jq1112("body").append("<div id='fancybox-loading-text'><center><div></div></center>"+html+"</div>");
            P4nBoxHelper.calcLoadingText();
        }
    },
    updateLoadingText: function (html) {
       P4nBoxHelper.loading_active=true;
        if (jq1112("#fancybox-loading-text").length > 0) {
            jq1112("#fancybox-loading-text").html("<center><div></div></center>"+html);
            P4nBoxHelper.calcLoadingText();
        }
    },
    calcLoadingText: function() {
        var div=jq1112("#fancybox-loading-text");
        var w=div.width()/2;
        var h=div.width()/2;
        var left=(jq1112(window).width()/2)-w;
        var top=(jq1112(window).height()/2)-h;
        div.css({left:left,top:top});
    },
    removeLoading: function () {
        P4nBoxHelper.loading_active=false;
        if (jq1112("#fancybox-loading").length > 0) {
            jq1112("#fancybox-loading").remove();
        }
    },
    removeLoadingText: function () {
        P4nBoxHelper.loading_active=false;
        if (jq1112("#fancybox-loading-text").length > 0) {
            jq1112("#fancybox-loading-text").remove();
        }
    },
    clone: function (P) {
        var Obj=(typeof P.href== typeof object)?P.href:jq1112(P.href);
        if (Obj.length > 0 && jq1112("#" + P.id + "_inner").length > 0) {
            Obj.detach().appendTo("#" + P.id + "_inner");
        }
    },
    clonetoBox: function (P) {
        var Obj=(typeof P.href== typeof object)?P.href:jq1112(P.href);
        if (typeof P.iframeid != "undefined" && P.iframeid!="") {
            Obj=jq1112(P.iframeid).contents().find(P.href);
        }
        if (Obj.length > 0 && jq1112("#" + P.id + "_inner").length > 0) {
            Obj.after("<div id='" + P.id + "_temp'></div>");
            var newObject = jq1112.extend(true, {}, Obj);
            jq1112("#" + P.id + "_inner").append(newObject);
            
        }
    },
    clonetoContent: function (P) {
        var Obj=(typeof P.href== typeof object)?P.href:jq1112(P.href);
        if (typeof P.iframeid != "undefined" && P.iframeid!="") {
            Obj=jq1112(P.iframeid).contents().find(P.href);
        }
        if (jq1112("#" + P.id + "_temp").length > 0 && jq1112("#" + P.id + "_inner").length > 0) {
            var newObject = jq1112.extend(true, {}, jq1112("#" + P.id + "_inner"));
            jq1112("#" + P.id + "_temp").append(newObject);
            Obj.unwrap().unwrap();
        }
    },
    cloneInnertoBox: function (P) {
        var Obj=(typeof P.href== typeof object)?P.href:jq1112(P.href);
        if (typeof P.iframeid != "undefined" && P.iframeid!="") {
            Obj=jq1112(P.iframeid).contents().find(P.href);
        }
        if (Obj.length > 0 && jq1112("#" + P.id + "_inner").length > 0) {
            Obj.wrapInner( "<div class='cloneInnertoBox'></div>");
            var newObject = jq1112.extend(true, {},Obj.find(".cloneInnertoBox"));
            jq1112("#" + P.id + "_inner").append(newObject);
            jq1112("#" + P.id + "_inner").unwrapInner(".cloneInnertoBox");
        }
    },
    cloneInnertoContent: function (P) {
        var Obj=(typeof P.href== typeof object)?P.href:jq1112(P.href);
        if (typeof P.iframeid != "undefined" && P.iframeid!="") {
            Obj=jq1112(P.iframeid).contents().find(P.href);
        }
        if (Obj.length > 0 && jq1112("#" + P.id + "_inner").length > 0) {
            jq1112("#" + P.id + "_inner").wrapInner( "<div class='cloneInnertoContent'></div>");
            var newObject = jq1112.extend(true, {}, jq1112( "#" + P.id + "_inner" ).find(".cloneInnertoContent"));
            Obj.append(newObject);
            Obj.unwrapInner(".cloneInnertoContent"); 
        }
    },
    zoomIn: function (P) {
        var obj = jq1112("#" + P.id);
        var startPos = {opacity: 0.1};
        var endPos = {opacity: 1};
        obj.css(startPos).animate(endPos, {
            duration: 250,
            easing: 'swing',
            step: null,
            complete: P4nBoxHelper._afterZoomIn(P)
        });
    },
    _afterZoomIn: function (P) {
        var obj = jq1112("#" + P.id);
    },
    zoomOut: function (P) {
        OverlibHelper.closeall();
        var obj = jq1112("#" + P.id);
        var startPos = {opacity: 1};
        var endPos = {opacity: 0};
        obj.css(startPos).animate(endPos, {
            duration: 250,
            easing: 'swing',
            step: null,
            complete: P4nBoxHelper._afterZoomOut(P)
        });
    },
    _afterZoomOut: function (P) {
        if (typeof P.afterClose == 'function') {
            P.afterClose();
        }
        if (P.type == "obj") {
            P4nBoxHelper.clonetoContent(P);
        }
        if (P.type == "innerObj") {
            P4nBoxHelper.cloneInnertoContent(P);
        }
        var obj = jq1112("#" + P.id);
        obj.remove();
    }
}

var UpdateHelper = {
    update: function () {
        DatepickerHelper.create();
    },
    loadDatepicker: function () {
        DatepickerHelper.create();
    },
    loadOverlib: function () {
       // OverlibHelper.create();
    }
}

var JavascriptLoader = {
    speicher: [],
    request: [],
    MenuHelper_create: true,
    MenuHelper_small: true,
    DatepickerHelper_create: true,
   // OverlibHelper_create: true,
    push: function (wert) {
        this.speicher.push(wert);
    },
    doit: function (a) {
        if (RequestHelper.running == true) {
            setTimeout(function () {
                try {JavascriptLoader.doit(a);} catch(e) {}
            }, 10);
        } else {
            a();
        }
    },
    get: function () {
        for (var i = 0; i < this.speicher.length; i++) {
            var a = this.speicher[i];
            this.doit(a);
        }
    }
}

var myVar=null;
var KarteiHelper= {
    a:false,
    menu_width:0,
    title_width:0,
    filter_width:0,
    target1:"",
    target2:"",
    targetgesamt:"",
    abstand:(30),
    rech:function() { 
        var gesamt=jq1112(KarteiHelper.targetgesamt).width();
        KarteiHelper.title_width=jq1112(KarteiHelper.target1).outerWidth();
        
        var rech=0;
        if (KarteiHelper.target2.indexOf(".") !== -1) {
            jq1112(KarteiHelper.target2).each(function() {
                rech=rech+parseInt(jq1112(this).outerWidth());
            });
        } else {
            rech=jq1112(KarteiHelper.target2).outerWidth()
        }
        
        KarteiHelper.filter_width=rech;
        
        KarteiHelper.menu_width=jq1112(".table-menu").width();
        if ( (KarteiHelper.menu_width+KarteiHelper.title_width+KarteiHelper.filter_width)> gesamt ) {
               return true;
        }
        return false;
    },
    create: function(id) {
        KarteiHelper.destroyMobile(id);
        if (KarteiHelper.rech()) {
            KarteiHelper.destroyNormal(id);
        } else {
            KarteiHelper.destroyMobile(id);
        }
        
       jq1112(window).resize(function () {
            var c=jq1112("#"+id);
            c.css("visibility","hidden");
             KarteiHelper.destroyMobile(id);
            if (KarteiHelper.rech()) {
                KarteiHelper.destroyNormal(id);
            } else {
                KarteiHelper.destroyMobile(id);
            }
            c.css("visibility","visible");
        });
        
    },
    destroyNormal:function(id) {
        var c=jq1112("#"+id);
        if (c.hasClass("accordion-wrap")) {} else {
            c.parent().css("position","relative");
            
            var linktext=c.find(".karten_a").html();
            if (!linktext || linktext=="") {
                linktext=c.find(".active").html();
            }
            
            c.prepend('<p class="group">'+linktext+'<span class="icon icon-paragraph" style="float:right;"></span></p>');
            c.removeAttr('class').addClass('menu-mobile-wrap');
            c.find("ul:first").removeAttr('class').addClass('menu-mobile');
            var width=c.find("ul:first").width();
            c.css("width",(width+15));
 
            c.find(".karten_a").parent().css("display","none");
 
            jq1112("#"+id+" .menu-mobile, #"+id+" .menu-mobile li a,#"+id+" p").mouseover(function(){
                KarteiHelper.a=true;
                c.find('.menu-mobile').slideDown(200);
            }).mouseout(function() {
                 KarteiHelper.a=false;
                setTimeout(function() {
                    if (KarteiHelper.a==false) {
                        c.find('.menu-mobile').slideUp(200);
                    }
                },200);
            });
            
        }
    },
    destroyMobile:function(id) {
        var c=jq1112("#"+id);
        if (c.hasClass("menu-mobile-wrap")) {
            c.find(".karten_a").parent().css("display","");
            c.find('.menu-mobile').css("display","");
            c.parent().css({"position":""});
            c.css({width:""});
            c.find(".group:first").remove();
            c.removeAttr('class').addClass('table-menu group');
            c.find("ul:first").removeAttr('class').addClass('group');
            c.unbind("click");
            jq1112("body").unbind("click");
        }
    }
}

var MenuAccordionHelper= {
    init:function(id) {
        jq1112('.menu-accordion .menu-accordion-has-submenu a').click(function(){
            if(jq1112(this).parent().find('> .menu-accordion-sub-menu').is(':visible')) {
                jq1112(this).parent().find('> .menu-accordion-sub-menu').slideUp(300);
                jq1112(this).next().find(".icon-pfeiloben").attr('class','icon icon-pfeilunten');
            } else {
                jq1112(this).parent().find('> .menu-accordion-sub-menu').slideDown(300);
               jq1112(this).next().find(".icon-pfeilunten").attr('class','icon icon-pfeiloben');
            }
        });
        jq1112('.menu-accordion .menu-accordion-has-submenu span').click(function(){
            if(jq1112(this).parent().find('> .menu-accordion-sub-menu').is(':visible')) {
                jq1112(this).parent().find('> .menu-accordion-sub-menu').slideUp(300);
                jq1112(this).find(".icon-pfeiloben").attr('class','icon icon-pfeilunten');
            } else {
                jq1112(this).parent().find('> .menu-accordion-sub-menu').slideDown(300);
               jq1112(this).find(".icon-pfeilunten").attr('class','icon icon-pfeiloben');
            }
        });
    }
}

var ContentAccordion= {
    init:function() {
        jq1112('.cacc').each(function(){
            
        });
    }
}

var ContentAccordionHelper = {
    getStorage: function(key,nr) {
        var key=StorageHelper.get(key);
        var link1_id="CACC_link1_"+nr;
        var link2_id="CACC_link2_"+nr;

        var filter_id="CACC_filter_"+nr;
        if (key && key==="yes") {
           jq1112("#"+filter_id).css({display:""});
           jq1112("#"+link1_id).css({display:""});
           jq1112("#"+link2_id).css({display:"none"});
        }
        if (key && key==="no") {
           jq1112("#"+filter_id).css({display:"none"});
           jq1112("#"+link1_id).css({display:"none"});
           jq1112("#"+link2_id).css({display:""});
        }
    }
}

var MenuHelper = {
    a:false,
    headerpos:41,
    closeall: function() {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        jq1112("#submenu .aktive").removeClass("aktive");
        if (top && topmenu && topmenu.document) {
            jq1112("#menu .aktive", topmenu.document).removeClass("aktive");
        }
        
        try {
        topmenu.clearInterval(topmenu.menu_js_timers);
        topmenu.menu_js_timers=null;
        } catch(e_closeall) {}
        //jq1112("html",topmain.document).unbind('click.menuhelperoutside');
    },
    create: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        MenuHelper.createNormal();
    },
    aktuellesmenu:-1,
    rech:function(t) {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        if (jq1112(t).find(".aktive ul > li").length > 0) {
            jq1112(t).find(".aktive ul > li").off("mouseover").on("mouseover",function() {
                MenuHelper.a=true;
                jq1112(this).parent().find(".aktive").removeClass("aktive");
                jq1112(this).addClass("aktive");
                MenuHelper.rech(jq1112(this));
            });
        }
        if (topmenu.StatusBarHelper.ismobile!=true) {
            //jq1112("#header2",topmain.document).css("left",(43+jq1112(window).scrollLeft()));
        } else {
           // jq1112("#header2",topmain.document).css("left",(20+jq1112(window).scrollLeft()));
        }
    },
    mouseover: function(id) {
        MenuHelper.a=true;
        OverlibHelper.closeall();
        FavoritenHelper.close();
        jq1112("#sub" + id).addClass("aktive");
        jq1112("#" + id, topmenu.document).addClass("aktive");
        MenuHelper.rech("#submenu");
    },
    createNormal: function() {
        if (typeof topmain=="undefined") {
            return;
        }
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        if (topmenu!= null && jq1112("#menu",topmenu.document).length>0) {
            jq1112(window).scroll(function(){
                clearTimeout(jq1112.data(this, 'scrollTimer'));
              jq1112.data(this, 'scrollTimer', setTimeout(function() {
                    var offset = jq1112("#header2").offset();
                    if (typeof offset != "undefined" && offset.top>jq1112(window).scrollTop()) {
                        var scroll = jq1112(window).scrollTop();
                        if (scroll) {} else {scroll=0;}
                        jq1112("#header2").css("top",(scroll-MenuHelper.headerpos));
                    }
                }, (!design_70?150:1)));
            });
          
 
            jq1112("#submenu .mainmenu").off("mouseover").on("mouseover",function () {
                var id=jq1112(this).attr("id");
                if (!design_70) {
                    MenuHelper.mouseover(id);
                }
                
            });
            
            topmenu.menu();
            
            
            
           /* jq1112("html",topmain.document).click(function (event) {
                if (jq1112(event.target).parent().parent().attr('id') == "menu") {
                    return;
                } else {
                    jq1112("#menu .aktive", topmain.document).removeClass("aktive");
                    jq1112("#menu .aktive", topmenu.document).removeClass("aktive");
                }
            });*/
            
            jq1112("html",topmain.document).on('click.menuhelperoutside', function (e) {
                if (
                    (jq1112(e.target).closest("#header2").length === 0) && 
                     (jq1112(e.target).closest("#menu").length === 0)
                ) {
                    jq1112("#submenu .aktive", topmain.document).removeClass("aktive");
                    jq1112("#menu .aktive", topmenu.document).removeClass("aktive");
                }
            });
            
            
            var breite=
            jq1112("#header-icons2", topmenu.document).width()+
            jq1112("#favoritenlink", topmenu.document).width()+
            jq1112("#header-icons", topmenu.document).width()+
            jq1112("#header-controls", topmenu.document).width()+
            jq1112("#menu", topmenu.document).width();
          
            var breite2=jq1112("#menuorder", topmenu.document).width();
         
            if (breite>breite2) {
                if (topmenu.StatusBarHelper.ismobile!=true) {
                    MenuHelper.createNormalSmall();
                    eraseCookie("mobile_menu");
                    createCookie("mobile_menu",1,false);
                }
            } else {
                if (topmenu.StatusBarHelper.ismobile!=false) {
                    MenuHelper.destroyNormalSmall();
                    eraseCookie("mobile_menu");
                    createCookie("mobile_menu",0,false);
                }
            }

            
        } else {
            setTimeout(function() {MenuHelper.createNormal();},1000);
        }
    },
    destroyNormalSmall: function() {
        //if (jq1112("#menuorder", topmenu.document).hasClass("aktive")) {
          //  jq1112("#menuorder", topmenu.document).removeClass("aktive");
            topmenu.StatusBarHelper.ismobile=false;
            var headericons2 = jq1112.extend(true, {}, jq1112("#header-icons2", topmenu.document));
            var headericons = jq1112.extend(true, {}, jq1112("#header-icons", topmenu.document));
            var headercontrols = jq1112.extend(true, {}, jq1112("#header-controls", topmenu.document));
            //var favoritenlink = jq1112.extend(true, {}, jq1112("#favoritenlink", topmenu.document));
            var menu = jq1112.extend(true, {}, jq1112("#menufav", topmenu.document));

            jq1112("#menuorder", topmenu.document).append(headericons2);
            jq1112("#menuorder", topmenu.document).append(menu);
           // jq1112("#menufav", topmenu.document).append(favoritenlink);
            jq1112("#menuorder", topmenu.document).append(headericons);
            jq1112("#menuorder", topmenu.document).append(headercontrols);

            jq1112("body",topmenu.document).css({"padding-top":""});
            jq1112("#menu",topmenu.document).css({"position":"","top":"","left":""});
            jq1112("#header2",topmain.document).css({"left":""});

            jq1112(".header-icons",topmenu.document).css({"marginTop":""});

            if (typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.TabHelper != typeof undefined) {
                toptabs.TabHelper.height_menu="50";
                toptabs.TabHelper.height_statusbar="0";
                toptabs.TabHelper.setRows();
            } else {
                jq1112("#mainframeset", top.document).attr("rows","50,*,0");
            }
            jq1112("#menufav",topmenu.document).css({"position":"","top":"","left":""});
       // }
    },
    createNormalSmall: function() {
            jq1112("#menuorder", topmenu.document).addClass("aktive");
            topmenu.StatusBarHelper.ismobile=true;
            var headericons2 = jq1112.extend(true, {}, jq1112("#header-icons2", topmenu.document));
            jq1112("#menuorder2", topmenu.document).append(headericons2);
            var headericons = jq1112.extend(true, {}, jq1112("#header-icons", topmenu.document));
            jq1112("#menuorder2", topmenu.document).append(headericons);
            var headercontrols = jq1112.extend(true, {}, jq1112("#header-controls", topmenu.document));
            jq1112("#menuorder2", topmenu.document).append(headercontrols);

            jq1112("body",topmenu.document).css({"padding-top":"4px"});
           // jq1112("#menu",topmenu.document).css({"position":"absolute","top":"30px","left":"20px"});
            jq1112("#header2",topmain.document).css({"left":"20px"});

            jq1112(".header-icons",topmenu.document).css({"marginTop":"1px"});
            if (typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.TabHelper != typeof undefined) {
                toptabs.TabHelper.height_menu="70";
                toptabs.TabHelper.height_statusbar="0";
                toptabs.TabHelper.setRows();
            } else {
                jq1112("#mainframeset", top.document).attr("rows","70,*,0");
            }
            jq1112("#menufav",topmenu.document).css({"position":"absolute","top":"30px","left":"20px"});
    },
    destroyNormal:function() {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        jq1112("#menu .aktive").removeClass("aktive");
        jq1112("#menu .aktive", topmenu.document).removeClass("aktive");
        jq1112("#menu a.has-submenu, #menu ul.sub-menu", topmenu.document).unbind("mouseover").unbind("mouseout");
        jq1112("#menu a.has-submenu, #menu ul.sub-menu", topmain.document).unbind("mouseover").unbind("mouseout");
        MenuHelper.createMobile();
    },
    createMobile: function() {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        if (jq1112("#menu-mobile-wrap",topmenu.document).length>0) {} else {
            jq1112("#menu", topmenu.document).wrap('<div id="menu-mobile-wrap"/>');
            jq1112("#menu-mobile-wrap", topmenu.document).prepend('<p class="group">Menu<i><span class="icon icon-paragraph"></span></i></p>');
            jq1112("body",topmenu.document).css({paddingTop:"2px"});
            jq1112("#menu-mobile-wrap",topmenu.document).after("<div id='menu-mobile-wrap_temp'></div>");
            var newObject = jq1112.extend(true, {}, jq1112("#menu-mobile-wrap",topmenu.document));
            jq1112("body",topmenu.document).append(newObject);
            jq1112("#menu", topmenu.document).attr("class","");
            jq1112("#menu", topmenu.document).attr("id","menu-mobile");
            
        }
        if (jq1112("#menu-mobile-wrap").length>0) {} else { 
            jq1112('#menu-mobile-wrap p', topmenu.document).click(function(){
                if(jq1112('#menu-mobile-wrap p',parent.main.document).parent().find('#menu-mobile').is(':visible')) {
                  jq1112('#menu-mobile',parent.main.document).slideUp(300);
                } else {
                  jq1112('#menu-mobile',parent.main.document).slideDown(300);
                }
            });
            jq1112("body",topmain.document).css({paddingTop:"10px"});
            jq1112("#header2").css({left:"0px",padding:"0px",position:"relative",top:"0px",zIndex:"1001",width:"100%",marginTop:"-53px",visibility:"visible"});
            jq1112("#menu").find(".has-submenu").append('<span><i><span class="icon icon-pfeilunten"></span></i></span>');
            jq1112("#menu", topmain.document).wrap('<div id="menu-mobile-wrap" />');
            jq1112("#menu-mobile-wrap", topmain.document).prepend('<p class="group">Menu<i><span class="icon icon-paragraph"></span></i></p>');
            jq1112("#menu").attr("class","");
            jq1112("#menu").attr("id","menu-mobile");
            jq1112('#menu-mobile .has-submenu').click(function(){
                if(jq1112(this).parent().find('> .sub-menu').is(':visible')) {
                    jq1112(this).parent().find('> .sub-menu').slideUp(300);
                    jq1112(this).find(".icon-pfeiloben").attr('class','icon icon-pfeilunten');
                } else {
                    jq1112(this).parent().find('> .sub-menu').slideDown(300);
                   jq1112(this).find(".icon-pfeilunten").attr('src','icon icon-pfeiloben');
                }
            });
        }
    },
    destroyMobile: function() {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        if (jq1112("#menu-mobile-wrap",topmenu.document).length>0) {
            jq1112('#menu-mobile-wrap p', topmenu.document).unbind("click");
            jq1112("body",topmenu.document).css({paddingTop:"30px"});
            var newObject = jq1112.extend(true, {}, jq1112("#menu-mobile-wrap",topmenu.document));
            jq1112("#menu-mobile-wrap_temp",topmenu.document).append(newObject);
            jq1112("#menu-mobile-wrap",topmenu.document).unwrap();
            jq1112("#menu-mobile-wrap .group:first", topmenu.document).remove();
            jq1112("#menu-mobile", topmenu.document).attr("id","menu");
            jq1112("#menu", topmenu.document).attr("class","sf-menu");
            jq1112("#menu", topmenu.document).unwrap();
            jq1112("#menu .sub-menu", topmenu.document).removeAttr("style");
        }
        if (jq1112("#menu-mobile-wrap").length>0) {
            jq1112('#menu-mobile .has-submenu').unbind("click");
            jq1112("body",topmain.document).css({paddingTop:"0px"});
            jq1112("#header2, #menu-mobile").removeAttr("style");
            jq1112("#menu-mobile-wrap .group:first").remove();
            jq1112("#menu-mobile").attr("id","menu");
            jq1112("#menu").attr("class","sf-menu");
            jq1112("#menu").unwrap();
            jq1112("#menu .has-submenu").find("span:first").remove();
            jq1112("#menu .sub-menu").removeAttr("style");
        }
        MenuHelper.createNormal();
    }
}

function divBoxScrollH(row,start,leftmax) {
    var oneColHasHScroll=false;
    var klasse=0;
    var colattr="";
    var i=1;
    var col=null;
    row.find(".col").each(function () {
        if (jq1112(this).hasHorizontalScrollBar()) {
            oneColHasHScroll=true;
        }
    });

    col=row.find(".col").first();
    colattr=col.attr("class");
    if (typeof colattr !== typeof undefined && colattr!="") {
        for (i=1;i<10;i++) {
            if (colattr.indexOf("col-"+i)!==-1) {
                klasse=i;
            }
        }
    }
   
    if (oneColHasHScroll) {
        if (klasse>0) {
            row.find(".col")
                .removeClass("col-"+klasse)
                .addClass("col-"+(parseInt(klasse)-1))
                .addClass(((start)?"original-"+klasse:""));
            divBoxScrollH(row,false,leftmax);
        }
    } else {
        divBoxWidth(row,leftmax);
    }
    if (parseInt(klasse)==1) {
        row.find(".col_inner").css({"height": ""});
        row.find(".col").css({"padding-right":"0px"});
        row.find(".top0").css({"padding-right":"0px"});
    }
}

function divBoxReset(row) {
    /* RESET */
    var klasse=0;
    var original_klasse=0;
    var colattr="";
    var col=null;
    var i=0;
    
    row.find(".col_inner").css({"height":""});
    row.find(".col").css({"height":"","width":"","padding-right":""});
    col=row.find(".col").first();
    if (typeof col !== typeof undefined && col.length>0) {
        colattr=col.attr("class");
    }
    if (typeof colattr !== typeof undefined && colattr!="") {
        for (i=1;i<10;i++) {
            if (colattr.indexOf("original-"+i)!==-1) {
                original_klasse=i;
            }
        }
        for (i=1;i<10;i++) {
            if (colattr.indexOf("col-"+i)!==-1) {
                klasse=i;
            }
        }
        if (original_klasse>0) {
            row.find(".col")
               .removeClass("col-"+klasse)
               .addClass("col-"+original_klasse);
        } 
    }
    return klasse;
}

function divBoxWidth(row,leftmax) {
    /* WIDTH */
    var anzahl=0;
    var anzahl2=0;
    var lastdiv=null;
    var merketop=0;
    var pos=0;
    var col=null;

    anzahl=parseInt(row.find(".col").length)-1;

    var temp=false;
    row.find(".col").each(function () {
        col = jq1112(this);
        col.css({"padding-right":""});
        pos = col.position().top;

        if (anzahl2==anzahl) {
            temp=true;
            if (parseInt(col.position().left)>=leftmax) {
                col.css({"padding-right":"0px"});
            } else {
                col.css({"padding-right":""});
            }
        }
        if (anzahl2==0) {
            merketop=pos;
        }

        if ((parseInt(pos)!=parseInt(merketop)) && temp==false) {
            merketop=pos;
            if (lastdiv.length>0) {
                lastdiv.css({"padding-right":"0px"});
            }
        }
        lastdiv=col;
        anzahl2++;
    });
}

function DivBox() {
    var height = 0;
    var h = 0;
    var divbox=null;
    var divboxattr=null;
    var klasse=0;
    
    var leftmax=0;
    jq1112(".divbox").find(".row").each(function () {
        var row=jq1112(this);
        row.find(".col").each(function () {
            var col = jq1112(this);
            if (parseInt(col.position().left)>leftmax) {
                leftmax=parseInt(col.position().left);
            }
        });
    });
    
    jq1112(".divbox").each(function () {
        
        divbox=jq1112(this);
        if (typeof divbox !== typeof undefined && divbox.length>0) {
            var w=divbox.width();
       
            divbox.find(".row").each(function () {
                klasse=0;
                var row=jq1112(this);

                klasse=divBoxReset(row);

                if (divbox.hasClass("autoheight")) {
                    divbox.find(".autoheight-target").css("height","0px");
                }
                
                /* AUTO HEIGHT pro row */
                height=0;
                row.find(".col_inner").each(function () {
                    h = jq1112(this).height();
                    if (h > height) {
                        height = h;
                    }
                });
                row.find(".col_inner").css({"height": height});

                
                divBoxWidth(row,leftmax);
                divBoxScrollH(row,true,leftmax);

            });
        }
    });
}

function mobilechange4to2() {
    var newObject = null;
     var newObject2 = null;
     var td1=null;
     var td2=null;
     var neu=null;
    jq1112(".tablemobile").each(function () {
        jq1112(this).find("tr").each(function () {
            //jq1112(this).find("td,th").each(function () {
            //});
            td1=jq1112(this).find("td,th").eq(2);
            td2=jq1112(this).find("td,th").eq(3);
            if (td1.attr("colspan")==2 && td1.children().length <= 0) {
                    td1.addClass("mobilechange4to2");
            } else {
                newObject = jq1112.extend(true, {},td1);
                newObject2 = jq1112.extend(true, {},td2);
                jq1112(this).after("<tr></tr>");
                neu=jq1112(this).next();
                neu.attr("class",jq1112(this).attr("class"));
                neu.append(newObject).append(newObject2);
            }
        });
    });
}
    
function Modern_DivHeightAuto() {
    var div=jq1112(".autoheight");
    var height=0;
    var h=0;
    
    var source=div;
    var target=div;
    if (div.find(".autoheight-source")) {
        source=div.find(".autoheight-source");
        target=div.find(".autoheight-target");
    }

    if (div.length>0) {
        source.each(function () {
            target.css({"height":""});

            jq1112(this).each(function () {
                h = jq1112(this).height();
                if (h > height) {
                    height = h;
                }
            });
        });
        target.css({"height": height});
    }
}

function Modern_DivWidthtAuto() {
    var div=jq1112(".autowidth");
    var width=0;
    var w=0;
    if (div.length>0 ) {
        div.each(function () {
            var div2=jq1112(this);
            div2.css({"width":""});

            div2.each(function () {
                w = jq1112(this).height();
                if (w > width) {
                    width = w;
                }
            });
        });
        div.css({"width": width});
    }
}

var FavoritenHelper = {
    favoritenlink: null,
    favmenu: null,
    favoritendiv: null,
    favoritenimg: null,
    favadd: null,
    a:false,
    init: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        if (topmain && topmain.document && topmenu != null && jq1112("#menu",topmenu.document).length>0) {
            this.favoritenlink = jq1112("#favoritenlink", topmenu.document).find("a");
            this.favoritenimg = jq1112("#favoritenlink", topmenu.document).find(".icon");
            this.favoritendiv = jq1112("#favoritenlink", topmenu.document).find(".div");
            this.favmenu = jq1112("#favmenu", topmain.document);
            this.favadd = jq1112("#favadd", topmain.document);
            
           jq1112(window).scroll(function(){
            clearTimeout(jq1112.data(this, 'scrollTimer2'));
            jq1112.data(this, 'scrollTimer2', setTimeout(function() {
                var offset = jq1112("#favmenu").offset();
                if (typeof offset != "undefined" && offset.top>jq1112(window).scrollTop()) {
                    var scroll = jq1112(window).scrollTop();
                    if (scroll) {} else {scroll=0;}
                    jq1112("#favmenu").css("top",(scroll-2));
                }
            }, 150));
            });

            topmenu.favlink();
            
            this.favadd.click(function () {
                FavoritenHelper.add();
            });
        } else {
            setTimeout(function() {
                FavoritenHelper.init();
            },1000);
        }
    },
    position: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        var p = jq1112("#favoritenlink", topmenu.document);
        var position = p.position();
        this.favmenu.css("left", position.left+(topmenu.StatusBarHelper.ismobile==true?20:0));
    },
    open: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        jq1112("html", topmain.document).on('click.favlinkoutside', function (e) {
            if (
                (jq1112(e.target).closest("#favmenu").length === 0)
            ) {
                FavoritenHelper.close();
            }
        });
        this.favmenu.css("display", "block");
        this.favoritendiv.css("display", "block");
        this.favoritenimg.removeClass("icon-menu_bueroklammer").addClass("icon-menu_bueroklammer_hover");
        this.favoritendiv.css("width", this.favmenu.width() + "px");
        this.favoritenlink.css("background", "#5286ba");
        
    },
    close: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        try {
        jq1112("html",topmain.document).unbind('click.favlinkoutside');
        this.favmenu.css("display", "none");
        this.favoritendiv.css("display", "none");
        this.favoritenimg.removeClass("icon-menu_bueroklammer_hover").addClass("icon-menu_bueroklammer");
        this.favoritenlink.css("background", "none");
        } catch(e) {}
    },
    add: function () {
        if (typeof document!="undefined" && typeof topmain!="undefined" && typeof topmain.document != "undefined" && document != topmain.document) {
            return;
        }
        RequestHelper.post("favoriten.php", "action=add_favoriten&neu=" + top.global_basename + "", function (response) {
            jq1112("#favmenu").replaceWith(response);
            FavoritenHelper.init();
            FavoritenHelper.close();
        });
    }
}

var P4nTokenHelper = {
    addp4ntoken: function (ziel, post) {
        if (typeof p4ntoken == "undefined") {
            p4ntoken = "";
        }
        return RequestHelper.newWert(ziel,"p4ntoken",p4ntoken,post);
    },
    getNewToken: function (response) {
        if (typeof p4ntoken == "undefined") {
            p4ntoken = "";
        }
        if (typeof getNewToken == "function") {
            p4ntoken = getNewToken(response);
        }
    }
}

var PostHelper = {
   add: function (ziel, post) {
        if (ziel.match(/requestnote/)) {
        } else {
            if (ziel.match(/\?/) || post == true) {
                ziel += "&requestnote=1";
            } else {
                ziel += "?requestnote=1";
            }
        }
        ziel = ziel.replace("&&", "&");
        return ziel;
    }, 
}

var RequestHelper = {
    running: false,
    addrequestnote: function (ziel, post) {
        if (ziel.match(/requestnote/)) {
        } else {
            if (ziel.match(/\?/) || post == true) {
                ziel += "&requestnote=1";
            } else {
                ziel += "?requestnote=1";
            }
        }
        ziel = ziel.replace("&&", "&");
        return ziel;
    },
    post: function (z, w, c, ev, async,p) {
        if (typeof async != typeof undefined) {} else {
            async=false;
        }
        if (typeof ev != typeof undefined && (ev==true || ev==false)) {} else {
            ev=true;
        }
        if (typeof p != typeof undefined) {} else {
            p=false;
        }
        this.running = true;
  
        if (typeof w=="object") {
            
            RequestHelper2("POST", z, w, c, ev, async,p);
        } else {
            w=RequestHelper.newWert(w,"requestnote","1",true);
            w=P4nTokenHelper.addp4ntoken(w, true);
            RequestHelper2("POST", z, w, c, ev, async,p);
        }
    },
    get: function (z, c, ev, async,p) {
        if (typeof async != typeof undefined) {} else {
            async=false;
        }
        if (typeof ev != typeof undefined && (ev==true || ev==false)) {} else {
            ev=true;
        }
        if (typeof p != typeof undefined) {} else {
            p=false;
        }
        this.running = true;
        z=RequestHelper.newWert(z,"requestnote","1",false);
        z=P4nTokenHelper.addp4ntoken(z, false);
        RequestHelper2("GET", z, "", c, ev, async,p);
    },
    newWert: function(url,key,val,post) {
        if (url.match("/"+key+"/")) {
        } else {
            if (url.match(/\?/) || post==true) {
                url += "&"+key+"="+val;
            } else {
                url += "?"+key+"="+val;
            }
        }
        url = url.replace("&&", "&");
        return url;
    }
}

function RequestHelper2(art, z, w, c, ev, async,p) {
    var showlayer = true;
    var hidelayer = true;
    var showloading = true;
    var hideloading = true;

    if (typeof async != typeof undefined) {} else {
        async=false;
    }
    if (typeof ev != typeof undefined && (ev==true || ev==false)) {} else {
        ev=true;
    }
    if (typeof p != typeof undefined) {} else {
        p=false;
    }
    
    if (art == "GET") {
        if (z.indexOf("fancybox_showlayer=0") !== -1) {
            showlayer = false;
        }
        if (z.indexOf("fancybox_hidelayer=0") !== -1) {
            hidelayer = false;
        }
        if (z.indexOf("fancybox_showloading=0") !== -1) {
            showloading = false;
        }
        if (z.indexOf("fancybox_hideloading=0") !== -1) {
            hideloading = false;
        }
    }

    //if (showlayer === true && topmain) {
    //    topmain.P4nBoxHelper.setLoading();
    //}
    //if (showloading === true && topmain) {
      //  topmain.FancyBoxHelper.showloading();
    //}


    var xhr = null;
    try {
        xhr = new XMLHttpRequest();
    } catch (error) {
        try {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (error) {
            return false;
        }
    }
    

    xhr.open(art, z, async);
    if (art == "POST") {
        if (!design_70 || p==false) {
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded" + ";charset=" + global_encoding);
        }
    }
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onreadystatechange = function () {
         
         if (xhr.readyState == 2) {
             if (p) template_progressbar.setprogress(25);
         }
         if (xhr.readyState == 3) {
             if (p) template_progressbar.setprogress(50);
         }
         
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (p) template_progressbar.setprogress(75);
            P4nTokenHelper.getNewToken(xhr.getResponseHeader("p4ntoken"));
            if (typeof (c) == "function") {
                c(xhr.responseText);
                try {UpdateHelper.loadDatepicker();} catch(e) {}
            }
            if (xhr.responseText != "" && ev==true) {
                evalScript(xhr.responseText);
            }
            if (typeof select_suche_multi_init == "function") {
                select_suche_multi_init();
            }
            RequestHelper.running = false;
        }
    };
    if (design_70) {
        xhr.onprogress = function(e) {
            // var complete = (e.loaded / e.total * 100 | 0);
            if (e.lengthComputable) {
                var complete = ((e.loaded / e.total) * 100);
                if (p) template_progressbar.setprogress(complete);
               // progressBar.max = e.total;
               // progressBar.value = e.loaded;
            }
        };
        xhr.onloadstart = function(e) {
             if (!e.lengthComputable) {

             }
        };
        xhr.onloadend = function(e) {
        };
        xhr.load = function(e) {
        };
    }
    var send = ((art == "POST") ? w : null);
    xhr.send(send);
}

var EncodingHelper = {
    unserialize:function (data) {
  //  discuss at: http://locutus.io/php/unserialize/
  // original by: Arpad Ray (mailto:arpad@php.net)
  // improved by: Pedro Tainha (http://www.pedrotainha.com)
  // improved by: Kevin van Zonneveld (http://kvz.io)
  // improved by: Kevin van Zonneveld (http://kvz.io)
  // improved by: Chris
  // improved by: James
  // improved by: Le Torbi
  // improved by: Eli Skeggs
  // bugfixed by: dptr1988
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  // bugfixed by: philippsimon (https://github.com/philippsimon/)
  //  revised by: d3x
  //    input by: Brett Zamir (http://brett-zamir.me)
  //    input by: Martin (http://www.erlenwiese.de/)
  //    input by: kilops
  //    input by: Jaroslaw Czarniak
  //    input by: lovasoa (https://github.com/lovasoa/)
  //      note 1: We feel the main purpose of this function should be
  //      note 1: to ease the transport of data between php & js
  //      note 1: Aiming for PHP-compatibility, we have to translate objects to arrays
  //   example 1: unserialize('a:3:{i:0;s:5:"Kevin";i:1;s:3:"van";i:2;s:9:"Zonneveld";}')
  //   returns 1: ['Kevin', 'van', 'Zonneveld']
  //   example 2: unserialize('a:2:{s:9:"firstName";s:5:"Kevin";s:7:"midName";s:3:"van";}')
  //   returns 2: {firstName: 'Kevin', midName: 'van'}
  //   example 3: unserialize('a:3:{s:2:"ü";s:2:"ü";s:3:"?";s:3:"?";s:4:"?";s:4:"?";}')
  //   returns 3: {'ü': 'ü', '?': '?', '?': '?'}
  var $global = (typeof window !== 'undefined' ? window : global)
  var utf8Overhead = function (str) {
    var s = str.length
    for (var i = str.length - 1; i >= 0; i--) {
      var code = str.charCodeAt(i)
      if (code > 0x7f && code <= 0x7ff) {
        s++
      } else if (code > 0x7ff && code <= 0xffff) {
        s += 2
      }
      // trail surrogate
      if (code >= 0xDC00 && code <= 0xDFFF) {
        i--
      }
    }
    return s - 1
  }
  var error = function (type,
    msg, filename, line) {
    throw new $global[type](msg, filename, line)
  }
  var readUntil = function (data, offset, stopchr) {
    var i = 2
    var buf = []
    var chr = data.slice(offset, offset + 1)
    while (chr !== stopchr) {
      if ((i + offset) > data.length) {
        error('Error', 'Invalid')
      }
      buf.push(chr)
      chr = data.slice(offset + (i - 1), offset + i)
      i += 1
    }
    return [buf.length, buf.join('')]
  }
  var readChrs = function (data, offset, length) {
    var i, chr, buf
    buf = []
    for (i = 0; i < length; i++) {
      chr = data.slice(offset + (i - 1), offset + i)
      buf.push(chr)
      length -= utf8Overhead(chr)
    }
    return [buf.length, buf.join('')]
  }
  function _unserialize (data, offset) {
    var dtype
    var dataoffset
    var keyandchrs
    var keys
    var contig
    var length
    var array
    var readdata
    var readData
    var ccount
    var stringlength
    var i
    var key
    var kprops
    var kchrs
    var vprops
    var vchrs
    var value
    var chrs = 0
    var typeconvert = function (x) {
      return x
    }
    if (!offset) {
      offset = 0
    }
    dtype = (data.slice(offset, offset + 1)).toLowerCase()
    dataoffset = offset + 2
    switch (dtype) {
      case 'i':
        typeconvert = function (x) {
          return parseInt(x, 10)
        }
        readData = readUntil(data, dataoffset, ';')
        chrs = readData[0]
        readdata = readData[1]
        dataoffset += chrs + 1
        break
      case 'b':
        typeconvert = function (x) {
          return parseInt(x, 10) !== 0
        }
        readData = readUntil(data, dataoffset, ';')
        chrs = readData[0]
        readdata = readData[1]
        dataoffset += chrs + 1
        break
      case 'd':
        typeconvert = function (x) {
          return parseFloat(x)
        }
        readData = readUntil(data, dataoffset, ';')
        chrs = readData[0]
        readdata = readData[1]
        dataoffset += chrs + 1
        break
      case 'n':
        readdata = null
        break
      case 's':
        ccount = readUntil(data, dataoffset, ':')
        chrs = ccount[0]
        stringlength = ccount[1]
        dataoffset += chrs + 2
        readData = readChrs(data, dataoffset + 1, parseInt(stringlength, 10))
        chrs = readData[0]
        readdata = readData[1]
        dataoffset += chrs + 2
        if (chrs !== parseInt(stringlength, 10) && chrs !== readdata.length) {
          error('SyntaxError', 'String length mismatch')
        }
        break
      case 'a':
        readdata = {}
        keyandchrs = readUntil(data, dataoffset, ':')
        chrs = keyandchrs[0]
        keys = keyandchrs[1]
        dataoffset += chrs + 2
        length = parseInt(keys, 10)
        contig = true
        for (i = 0; i < length; i++) {
          kprops = _unserialize(data, dataoffset)
          kchrs = kprops[1]
          key = kprops[2]
          dataoffset += kchrs
          vprops = _unserialize(data, dataoffset)
          vchrs = vprops[1]
          value = vprops[2]
          dataoffset += vchrs
          if (key !== i) {
            contig = false
          }
          readdata[key] = value
        }
        if (contig) {
          array = new Array(length)
          for (i = 0; i < length; i++) {
            array[i] = readdata[i]
          }
          readdata = array
        }
        dataoffset += 1
        break
      default:
        error('SyntaxError', 'Unknown / Unhandled data type(s): ' + dtype)
        break
    }
    return [dtype, dataoffset - offset, typeconvert(readdata)]
  }
  return _unserialize((data + ''), 0)[2]
},
    serialize: function(mixedValue) {
  //  discuss at: http://locutus.io/php/serialize/
  // original by: Arpad Ray (mailto:arpad@php.net)
  // improved by: Dino
  // improved by: Le Torbi (http://www.letorbi.de/)
  // improved by: Kevin van Zonneveld (http://kvz.io/)
  // bugfixed by: Andrej Pavlovic
  // bugfixed by: Garagoth
  // bugfixed by: Russell Walker (http://www.nbill.co.uk/)
  // bugfixed by: Jamie Beck (http://www.terabit.ca/)
  // bugfixed by: Kevin van Zonneveld (http://kvz.io/)
  // bugfixed by: Ben (http://benblume.co.uk/)
  // bugfixed by: Codestar (http://codestarlive.com/)
  //    input by: DtTvB (http://dt.in.th/2008-09-16.string-length-in-bytes.html)
  //    input by: Martin (http://www.erlenwiese.de/)
  //      note 1: We feel the main purpose of this function should be to ease
  //      note 1: the transport of data between php & js
  //      note 1: Aiming for PHP-compatibility, we have to translate objects to arrays
  //   example 1: serialize(['Kevin', 'van', 'Zonneveld'])
  //   returns 1: 'a:3:{i:0;s:5:"Kevin";i:1;s:3:"van";i:2;s:9:"Zonneveld";}'
  //   example 2: serialize({firstName: 'Kevin', midName: 'van'})
  //   returns 2: 'a:2:{s:9:"firstName";s:5:"Kevin";s:7:"midName";s:3:"van";}'
  var val, key, okey
  var ktype = ''
  var vals = ''
  var count = 0
  var _utf8Size = function (str) {
    var size = 0
    var i = 0
    var l = str.length
    var code = ''
    for (i = 0; i < l; i++) {
      code = str.charCodeAt(i)
      if (code < 0x0080) {
        size += 1
      } else if (code < 0x0800) {
        size += 2
      } else {
        size += 3
      }
    }
    return size
  }
  var _getType = function (inp) {
    var match
    var key
    var cons
    var types
    var type = typeof inp
    if (type === 'object' && !inp) {
      return 'null'
    }
    if (type === 'object') {
      if (!inp.constructor) {
        return 'object'
      }
      cons = inp.constructor.toString()
      match = cons.match(/(\w+)\(/)
      if (match) {
        cons = match[1].toLowerCase()
      }
      types = ['boolean', 'number', 'string', 'array']
      for (key in types) {
        if (cons === types[key]) {
          type = types[key]
          break
        }
      }
    }
    return type
  }
  var type = _getType(mixedValue)
  switch (type) {
    case 'function':
      val = ''
      break
    case 'boolean':
      val = 'b:' + (mixedValue ? '1' : '0')
      break
    case 'number':
      val = (Math.round(mixedValue) === mixedValue ? 'i' : 'd') + ':' + mixedValue
      break
    case 'string':
      val = 's:' + _utf8Size(mixedValue) + ':"' + mixedValue + '"'
      break
    case 'array':
    case 'object':
      val = 'a'
      /*
      if (type === 'object') {
        var objname = mixedValue.constructor.toString().match(/(\w+)\(\)/);
        if (objname === undefined) {
          return;
        }
        objname[1] = serialize(objname[1]);
        val = 'O' + objname[1].substring(1, objname[1].length - 1);
      }
      */
      for (key in mixedValue) {
        if (mixedValue.hasOwnProperty(key)) {
          ktype = _getType(mixedValue[key])
          if (ktype === 'function') {
            continue
          }
          okey = (key.match(/^[0-9]+$/) ? parseInt(key, 10) : key)
          vals += EncodingHelper.serialize(okey) + EncodingHelper.serialize(mixedValue[key])
          count++
        }
      }
      val += ':' + count + ':{' + vals + '}'
      break
    case 'undefined':
    default:
      // Fall-through
      // if the JS object has a property which contains a null value,
      // the string cannot be unserialized by PHP
      val = 'N'
      break
  }
  if (type !== 'object' && type !== 'array') {
    val += ';'
  }
  return val
},
    base64_decode: function (data) {
        var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
        var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
                ac = 0,
                dec = '',
                tmp_arr = [];

        if (!data) {
            return data;
        }
        data += '';
        do { // unpack four hexets into three octets using index points in b64
            h1 = b64.indexOf(data.charAt(i++));
            h2 = b64.indexOf(data.charAt(i++));
            h3 = b64.indexOf(data.charAt(i++));
            h4 = b64.indexOf(data.charAt(i++));

            bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

            o1 = bits >> 16 & 0xff;
            o2 = bits >> 8 & 0xff;
            o3 = bits & 0xff;

            if (h3 == 64) {
                tmp_arr[ac++] = String.fromCharCode(o1);
            } else if (h4 == 64) {
                tmp_arr[ac++] = String.fromCharCode(o1, o2);
            } else {
                tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
            }
        } while (i < data.length);

        dec = tmp_arr.join('');

        return dec.replace(/\0+$/, '');
    },
    base64_encode: function (data) {
        var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
        var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
                ac = 0,
                enc = '',
                tmp_arr = [];
        if (!data) {
            return data;
        }
        do {
            o1 = data.charCodeAt(i++);
            o2 = data.charCodeAt(i++);
            o3 = data.charCodeAt(i++);
            bits = o1 << 16 | o2 << 8 | o3;
            h1 = bits >> 18 & 0x3f;
            h2 = bits >> 12 & 0x3f;
            h3 = bits >> 6 & 0x3f;
            h4 = bits & 0x3f;
            tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
        } while (i < data.length);
        enc = tmp_arr.join('');
        var r = data.length % 3;
        return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
    }
}

var OverlibHelper = {
    closeall: function () {
        try {
            jq1112("#overDiv").css({"visibility":"hidden"});
        } catch(e) {}
    }
}



jq1112.datepicker.ownOptions={};

jq1112.datepicker._updateDatepicker_original = jq1112.datepicker._updateDatepicker;
jq1112.datepicker._updateDatepicker = function(inst) {
    jq1112.datepicker._updateDatepicker_original(inst);
    var afterShow = this._get(inst, 'afterShow');
    if (afterShow)
        afterShow.apply((inst.input ? inst.input[0] : null));  // trigger custom callback
}

jq1112.datepicker._selectDate_original = jq1112.datepicker._selectDate;
jq1112.datepicker._selectDate = function(t, i){
    var ownoptions=jq1112.datepicker.ownOptions[t];
    if (typeof ownoptions != typeof undefined && typeof ownoptions.termindichte != typeof undefined && ownoptions.termindichte==true) {
        return false;
    } else {
        jq1112.datepicker._selectDate_original(t,i);
    }
}



var DatepickerHelper = {
    init: function() {
        if (typeof global_DatepickerHelper_regional_arr != typeof undefined) {
            jq1112.datepicker.regional["own"] = global_DatepickerHelper_regional_arr;
            jq1112.datepicker.setDefaults(jq1112.datepicker.regional["own"]);
            jq1112.datepicker.regional["own"];
        } else {
            jq1112.datepicker.regional["de"] = {
                clearText: "löschen", clearStatus: "aktuelles Datum löschen",
                closeText: "schließen", closeStatus: "ohne Änderungen schließen",
                prevText: "zurück", prevStatus: "letzten Monat zeigen",
                nextText: "Vor", nextStatus: "nächsten Monat zeigen",
                currentText: "heute", currentStatus: "",
                monthNames: ["Januar", "Februar", "März", "April", "Mai", "Juni",
                    "Juli", "August", "September", "Oktober", "November", "Dezember"],
                monthNamesShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun",
                    "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
                monthStatus: "anderen Monat anzeigen", yearStatus: "anderes Jahr anzeigen",
                weekHeader: "KW", weekStatus: "Kalenderwoche",
                dayNames: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"],
                dayNamesShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayNamesMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                dayStatus: "Setze DD als ersten Wochentag", dateStatus: "Wähle D, M d",
                dateFormat: "dd.mm.yy", firstDay: 1,
                initStatus: "Wähle ein Datum", isRTL: false
            };
            jq1112.datepicker.setDefaults(jq1112.datepicker.regional["de"]);
            jq1112.datepicker.regional[global_DatepickerHelper_regional];
        }
    },
    remove: function(element) {
        if (element && element!='') {} else {element=".datepicker";}
        jq1112(element).datepicker( "destroy" );
    },
    create: function (element, params) {
        DatepickerHelper.init();
        var dp_element=jq1112(element);
        
        if (typeof params != typeof undefined) {
            jq1112.datepicker.ownOptions[element]=params;
            var ownoptions=jq1112.datepicker.ownOptions[element];
        }
        var options={
            dateFormat: "dd.mm.yy",
            showOtherMonths: true,
            selectOtherMonths: false,
            changeMonth: true,
            changeYear: true,
            showOn: "both",
            buttonImageOnly: false,
            showWeek: true,
            selectWeek: true,
            firstDay: 1,
            afterShow: function () {
                if (typeof ownoptions != typeof undefined && typeof ownoptions.termindichte != typeof undefined && ownoptions.termindichte==true) {
                    var link="kalender_neu.php?uid="+ownoptions.uid+"&stid="+ownoptions.stid+"&zusatz="+ownoptions.zusatz;
                    var ui_state_default=null;
                    var ui_state_default_parent=null;
                    var html="";
                    dp_element.find('.ui-state-default').each(function() {
                        ui_state_default=jq1112(this);
                        ui_state_default_parent=ui_state_default.parent();
                        if (!ui_state_default_parent.hasClass("ui-state-disabled")) {
                            var heute=new Date(ui_state_default_parent.attr("data-year"),parseInt(ui_state_default_parent.attr("data-month")),parseInt(ui_state_default.text()));
                            ui_state_default.attr("onclick","location.href=\'"+(link+"&day="+(DatepickerHelper.date_to_ts(heute)))+"\'; return false;");
                            ui_state_default.wrap('<div class="inner"></div>');
                            html='&nbsp;<a onmouseover="window.status=\'\';return true;" onmouseout="window.status=\'\';return true;" href="javascript:" onclick="location.href=\''+link+'&neu=1&neudatum='+DatepickerHelper.format_date(DatepickerHelper.date_to_ts(heute))+'\'"><span class="icon icon-termin_neu" border="0" alt="">&nbsp;</span></a>';
                            ui_state_default.parent().append(html);
                        } else {
                            ui_state_default.wrap('<div class="inner"></div>');
                            ui_state_default.remove();
                        }
                    });
                    
                    var datumformated="";
                    dp_element.find('.ui-datepicker-week-col')
                    .unbind('click')
                    .unbind('mouseenter')
                    .unbind('mouseleave')
                    .click(function (event) {
                        var date = dp_element.datepicker('getDate');
                        var kw = parseInt(jq1112(event.target).text(), 10),
                            jahr = dp_element.find('.ui-datepicker-year').find(":selected").text();
                        // Auf KW 52 des vorherigen Jahres geklickt, nicht KW 52 dieses Jahres anzeigen
                        if (kw >= 52 && date.getMonth() == 0) {
                            jahr -= 1;
                            // KW 1 des naechsten Jahres geklickt, nicht auf KW 1 dieses Jahres springen
                        } else if (kw == 1 && date.getMonth() == 11) {
                            jahr += 1;
                        }
                        var datum = DatepickerHelper.kw_to_date(jahr, kw);
                        datumformated=DatepickerHelper.format_date(DatepickerHelper.date_to_ts(datum));
                        location.href=link+"&wdatum="+datumformated;
                    }).css('cursor', 'pointer');

                    DatepickerHelper.termindichte(element);
                }
            },
            beforeShow: function () {
                if (typeof ownoptions != typeof undefined && typeof ownoptions.beforeShow != typeof undefined && typeof ownoptions.beforeShow=="function") {
                    ownoptions.beforeShow();
                }
            },
            beforeShowDay:function(date) {
                if (typeof ownoptions != typeof undefined && typeof ownoptions.termindichte != typeof undefined && ownoptions.termindichte==true) { 
                    return [true, "" ]; 
                } else {
                    var len = 0;
                    if (typeof global_feiertage_loaded != typeof undefined && global_feiertage_loaded) {
                        for (var o in global_feiertage) {
                            len++;
                        }
                        if (len > 0) {
                            var month = ('0' + (date.getMonth() + 1)).slice(-2);
                            var day = ('0' + date.getDate()).slice(-2);
                            var year = date.getFullYear();
                            var formated_date = day + '.' + month + '.' + year;
                            var is_feiertag=false;
                            var text="";
                            for (var key in global_feiertage) {
                                    if (formated_date==key) {
                                        is_feiertag=true;
                                        text=global_feiertage[key];
                                    }
                            }
                            if (is_feiertag) {
                                return [true, 'feiertagrot', text];
                            }
                        }
                    }
                    return [true, "" ];
                }
            },
            onSelect: function (date, inst) {
                if (typeof ownoptions != typeof undefined && typeof ownoptions.onselect != typeof undefined && typeof ownoptions.onselect=="function") {
                    ownoptions.onselect(date, inst);
                    
                }
                if (crm_version>62) {
                    jq1112(this).trigger("onkeyup");
                }
            },
            onChangeMonthYear: function (year, month, inst) {
                if (typeof ownoptions != typeof undefined && typeof ownoptions.termindichte != typeof undefined && ownoptions.termindichte==true) {
                    dp_element.datepicker('setDate', new Date(year, month - 1, inst.selectedDay));
                }
                if (typeof ownoptions != typeof undefined && typeof ownoptions.onChangeMonthYear == 'function' ) {
                    
                    ownoptions.onChangeMonthYear();
                }
            }
        };
        if (element && element!='') {} else {element=".datepicker";}
        DatepickerHelper.stile(element,options);
    },
    probefahrt: function(id,t,m,Y,tfieldId1, tfieldId2) {
        DatepickerHelper.init();
        
        var options={
            dateFormat: "dd.mm.yy",
            showOtherMonths: true,
            selectOtherMonths: false,
            changeMonth: false,
            changeYear: false,
            showOn: "both",
            buttonImageOnly: false,
            showWeek: true,
            selectWeek: true,
            firstDay: 1,
            onSelect: function(dateText, inst) { 
                tfieldId1.value=dateText;
                tfieldId2.value=dateText;
            }
        };
        DatepickerHelper.stile("#"+id,options);
        jq1112("#"+id).datepicker('setDate', t+"."+m+"."+Y);
        jq1112("#"+id).addClass("noPrevNext");
    },
    stile: function(element,options) {
        if (typeof jq1112.datepicker.ownOptions != typeof undefined) {
            var ownoptions=jq1112.datepicker.ownOptions[element];
        }
        var element2=null;
        if (typeof ownoptions != typeof undefined && typeof ownoptions.termindichte != typeof undefined && ownoptions.termindichte==true) {} else {
            if (modernstil!="") {
                element2=".heading .th "+element;
                options.buttonImage="inc/Modern/images/stil/blau/header_icon-calendar.png?1575465871";
                jq1112(element2).each(function() {
                    if (!jq1112(this).hasClass("hasDatepicker")) {
                        jq1112(this).datepicker(options);
                    }
                });
                element2=".th "+element;
                options.buttonImage="inc/Modern/images/stil/blau/th_icon-calendar.png?1575465871";
                jq1112(element2).each(function() {
                    if (!jq1112(this).hasClass("hasDatepicker")) {
                        jq1112(this).datepicker(options);
                    }
                });
                element2=".td "+element;
                options.buttonImage="inc/Modern/images/stil/blau/td_icon-calendar.png?1575465871";
                jq1112(element2).each(function() {
                    if (!jq1112(this).hasClass("hasDatepicker")) {
                        jq1112(this).datepicker(options);
                    }
                });
            }
        }
        options.buttonImage="inc/Modern/images/stil/blau/all_icon-calendar.png?1575465871";
        jq1112(element).each(function() {
            if (!jq1112(this).hasClass("hasDatepicker")) {
                jq1112(this).datepicker(options);
            }
        });
       
    },
    dotermindichte: function(ele,response) {
        var res_termine = response.termine;
        var res_colors = response.colors;
        var res_feiertage = response.feiertage;
        
        jq1112.each(res_termine, function (timestamp, termine) {
                timestamp = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(timestamp));
                var tagnummer = DatepickerHelper.ts_to_date(timestamp).getDate();
                var monatnummer = DatepickerHelper.ts_to_date(timestamp).getMonth() + 1;
                var jahrnummer = DatepickerHelper.ts_to_date(timestamp).getFullYear();
                var datum = ((tagnummer < 10) ? "0" + tagnummer : tagnummer) + "." + ((monatnummer < 10) ? "0" + monatnummer : monatnummer) + "." + jahrnummer;
                jq1112(ele).find('.ui-datepicker-calendar tbody td a').each(function (i, e) {
                    if (jq1112(e).text() == tagnummer) {
                        jq1112.each(termine, function (j, termin) {
                            termin.start = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.start));
                            termin.end = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.end));
                            termin.beginn2 = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.beginn2));
                            termin.ende2 = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.ende2));
                            termin.serie.beginn = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.serie.beginn));
                            termin.serie.ende = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.serie.ende));
                            termin.unique_start = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.unique_start));
                            termin.unique_ende = DatepickerHelper.date_to_ts(DatepickerHelper.zeitzone_plus(termin.unique_ende));
                        });

                        var colors = res_colors,
                            anzahl_termine = termine.length;
                        var color = anzahl_termine >= colors.length ? colors[colors.length - 1] : colors[anzahl_termine];
                        var feiertage = res_feiertage[datum];
                        var feiertagname = "";
                        if (feiertage && feiertage.name && feiertage.sichtbar_kalender == 1) {
                            var feiertaggesetzlich = "";
                            if (feiertage.feiertag_gesetzlich == 1) {
                                feiertaggesetzlich = 'red';
                            }
                            if (color != colors[colors.length - 1] && color != colors[colors.length - 2]) {
                                jq1112(e).addClass('feiertagrot');
                            } else {
                                jq1112(e).addClass('feiertagweiss');
                            }
                            feiertagname = '<span class="feiertag ' + feiertaggesetzlich + '" title="' + feiertage.name + '">' + feiertage.name + '</span>';
                        }

                        jq1112(e).parent().removeClass('color');
                        jq1112(e).parent().removeClass('grundcolor');

                        if (color == '#E0E0D0') {
                            jq1112(e).parent().addClass('grundcolor');
                                jq1112(e).parent().css('background', "");
                        } else {
                            jq1112(e).parent().addClass('color');
                            jq1112(e).parent().css('background', color);  
                            if (color == '#FFFF00') {
                               jq1112(e).parent().css('color', "#414141"); 
                            }
                        }

                        // Mouseover mit Terminanzahl und Uebersicht
                        var text=DatepickerHelper.map(termine, function (i, termin) {
                                        return DatepickerHelper.termin_infotext(termin);
                                    }).join('</td></tr><tr><td style="border-bottom:0px;border-right:0px;border-left:0px;">');
                        text=(text!=''?'<tr><td style="border:0px;">'+text+'</td></tr>':'');

                        DatepickerHelper.add_ol({
                            node: e,
                            text: '<table class="hori2 table-nostyle" style="font-size: 1.0em; border:0px"><tr><th class="td-border-bottom" style="'+(text==''?'border-bottom:0px;':'')+'border-top:0px;border-right:0px;border-left:0px;">' + DatepickerHelper.format_date(timestamp) + ' - ' + anzahl_termine + ' ' + lang_termin_e + (anzahl_termine > 0 ? '' : '') + '<br>' + feiertagname + '</th></tr>'+text+'</table>'
                        });
                        //jq1112("#pimkalendertest").parent().find(".load-spinner").css("display","none");
                    }
                });
        });
    },
    termindichte: function(element) {
        var ownoptions=jq1112.datepicker.ownOptions[element];
        if (typeof ownoptions != typeof undefined && typeof ownoptions.json != typeof undefined) {
            var response=ownoptions.json;
            delete jq1112.datepicker.ownOptions[element].json;
            DatepickerHelper.dotermindichte(element,response);
        } else {
            //jq1112("#pimkalendertest").parent().find(".load-spinner").css("display","block");
            var date = DatepickerHelper.date_to_ts(jq1112(element).datepicker( 'getDate' ));
            var current_calendar = {
                //active:true, 
                id:ownoptions.uid, 
                //name:"mustermann, max",
               // schreibrecht:true,
                //type:"benutzer"
            }; 

            jq1112.ajax({
                url: "kalender_neu.php",
                dataType: "json",
                type: "POST",
                async: false,
                headers: {"X-Requested-With": "XMLHttpRequest"},
                data: {
                    action: 'termindichte',
                    date: date,
                    calendars: [current_calendar],
                    async: false//,
                    //TT: Braucht man doch nicht. Es wird dort schon encode gemacht, sonst doppelt encode:"json"
                },
                success: function (response) {
                    DatepickerHelper.dotermindichte(element,response);
                }
            });
        }
    },
    add_ol: function (args) {
        var text = args.text.replace(/\n/g, '<br>');
        var anzahlbr = DatepickerHelper.substr_count(text, '<br>');
        if (anzahlbr < 20) {
            jq1112(args.node).parent().mouseout(nd);
        }
        jq1112(args.node).parent().mouseover(function() {
            if (anzahlbr >= 20) {
                if (DatepickerHelper.substr_count(text, 'class=ovfl') == 0) {
                    text = "<div class=ovfl>"+text+"</div>";
                }
                if (DatepickerHelper.substr_count(text, 'class=modernowfl') == 0) {
                    text = "<div class=modernowfl>"+text+"</div>";
                }
                return overlib(text, CAPTION, ' ', STICKY, SCROLL, TEXTPADDING, 0, WIDTH, 500, CLOSETEXT,
                    lang_schliessen, DELAY, ol_delay, HAUTO, VAUTO, FGCLASS, 'olclass2 table-nostyle', BGCLASS, 'olclass table-nostyle', CGCLASS, 'olclass table-nostyle', CAPTIONFONTCLASS, 'olclasscf table-nostyle', WRAP);
            }
            else {
                if (DatepickerHelper.substr_count(text, 'class=modernowfl') == 0) {
                    text = "<div class=modernowfl>"+text+"</div>";
                }
                return overlib(text, WIDTH, 500, DELAY, ol_delay,
                    HAUTO, VAUTO, FGCLASS, 'olclass2 table-nostyle', BGCLASS, 'olclass table-nostyle', CGCLASS, 'olclass table-nostyle',
                    CAPTIONFONTCLASS, 'olclasscf table-nostyle', WRAP);
            }
        });
    },
    termin_infotext: function (data) {
        var icon_serie = (data.serie.is_serie ? '<img src=\'bilder/serie.gif\'/> ' : '');
        var von = (data.multiday ? DatepickerHelper.format_datetime(data.beginn2) : DatepickerHelper.format_time(data.start));

        var bis = DatepickerHelper.format_time(data.end);
        if (data.multiday) {
            if (data.ende2 == 0) {
                var tempdatum = new Date(data.beginn2 * 1000).getTime() / 1000;
                tempdatum = tempdatum + (data.dauer_min * 60);
                bis = DatepickerHelper.format_time(tempdatum);
            } else {
                bis = DatepickerHelper.format_datetime(data.ende2);
            }
        }
        var trenner = ' - ';
        if (bis.length == 0) {
            trenner = '';
        }
        return '<b>' + icon_serie + (data.ganztag == 1 ? lang_ganztagsereignis : von + trenner + bis) + '</b><br/>' +    
            '<b>' + data.header + '</b><br/>' +
            (data.text ? '<span>'+data.text + '</span><br/><br/>' : '') +
            (data.ort && data.kategorie!=lang_auslieferung ? '<i>' + lang_ort + '</i>: <b>' + data.ort.replace(/\n/gi, ", ") + '</b><br/> ' : '') +
            (data.mandant && typeof lang_mandant!=="undefined" ? '<i>' + lang_mandant + '</i>: <b>' + data.mandant + '</b><br/> ' : '') +
            (data.kategorie ?'<i>' + lang_kategorie + '</i>: <b>' + data.kategorie + (data.kategorie==lang_auslieferung && data.ort ? ' / ' + data.ort.replace(/\n/gi, ", ") : '') + '</b><br/>' : '') +
            //(data.zusatzdaten ? data.zusatzdaten + '<br/>' : '') +
            (data.produkt_bezeichnung ?'<i>' + lang_fahrzeug + '</i>: <b>' + data.produkt_bezeichnung + '</b><br/>' : '') +
            (data.gruppe_id > 0 ?'<i>' + lang_gruppe + '</i>: <b>' + gruppen_kalender_map[data.betreuer][data.gruppe_id] + '</b><br/>' : '') +
            (data.kampagne > 0 ?'<i>' + lang_kampagne + '</i>: <b>' + kampagnen_texte["" + data.kampagne] + '</b><br/>' : '') +
            (data.einladungen ?
            '<i>' + lang_einladungen + '</i>:<br/>' + DatepickerHelper.map(data.einladungen, function (i, benutzer_id) {
                var zeichen = '&middot; ';
                if (data.einladungen_zusagen) {
                    if (data.einladungen_zusagen[i] === '1') {
                        zeichen = '&#43; ';
                    } else if (data.einladungen_zusagen[i] === '-1') {
                        zeichen = '&#45; ';
                    }
                }
                return '<b>' + zeichen + user_name(benutzer_id) + '</b>';//&#43; &#45; &middot;
            }).join('<br/>') + '<br/>' : '') + (data.zusatzdaten ? data.zusatzdaten + '<br/>' : '');
    },
    date_to_ts: function (date) {
        return Math.floor(date.getTime() / 1000);
    },
    zeitzone_plus: function (date) {
        var d = DatepickerHelper.date_to_utc(date);
        var heute_data = new Date();

        var targetdate = new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours(), d.getMinutes(), d.getSeconds());
        return targetdate;
    },
    ts_to_date: function(timestamp) {
        return new Date(timestamp * 1000);
    },
    date_to_utc: function(date) {
        var current_date = new Date(date * 1000);
        return current_date;
    },
    format_date: function(timestamp) {
        var d = new Date(timestamp * 1000);
        var dy = d.getDate(), m = d.getMonth() + 1, y = d.getFullYear();
        return (dy < 10 ? '0' + dy : dy) + '.' + (m < 10 ? '0' + m : m) + '.' + y;
    },
    format_time: function (timestamp) {
        var d = new Date(timestamp * 1000);
        var h = d.getHours(), m = d.getMinutes();
        return (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);
    },
    format_datetime: function(timestamp) {
        return DatepickerHelper.format_date(timestamp) + ' ' + DatepickerHelper.format_time(timestamp);
    },
    map: function(collection, cb) {
        var result = [];
        jq1112.each(collection, function (i, e) {
            result.push(cb(i, e));
        });
        return result;
    },
    substr_count: function(haystack, needle, offset, length) {
        var pos = 0,
            cnt = 0;
        haystack += '';
        needle += '';
        if (isNaN(offset)) {
            offset = 0;
        }
        if (isNaN(length)) {
            length = 0;
        }
        offset--;
        while ((offset = haystack.indexOf(needle, offset + 1)) != -1) {
            if (length > 0 && (offset + needle.length) > length) {
                return false;
            } else {
                cnt++;
            }
        }
        return cnt;
    },
    kw_to_date: function(year, kw) {
        if (kw < 1 || isNaN(kw)) {
            return;
        }
        // fuck the police
        var date = kw >= 52 ? new Date(year, 11, 1) : new Date(year, 0, 1);
        while (jq1112.datepicker.iso8601Week(date) != kw) {
            date.setDate(date.getDate() + 1);
        }
        return date;
    },
    // Deutsches Datum -> Date objekt
    de_to_date: function(date) {
        if (date.length <= 10) {
            var zeit = DatepickerHelper.new_date().getHours();
            date += " " + zeit + ":00:00";
        }
        // Deutsches Datum+Zeit
        var d = date.split(' ')[0].split('.'),
            z = date.split(' ')[1].split(':');

        var j = parseInt(d[2], 10),
            m = parseInt(d[1], 10) - 1,
            t = parseInt(d[0], 10),
            h = z[0] ? parseInt(z[0], 10) : 0,
            i = z[1] ? parseInt(z[1], 10) : 0,
            s = z[2] ? parseInt(z[2], 10) : 0;
        return new Date(j, m, t, h, i, s);
    },
    // Deutsches Datum -> timestamp
     parse_date:function(date) {
         date=DatepickerHelper.de_to_date(date);
        return Math.floor(date.getTime() / 1000);
    },
    new_date: function() {
        var d = new Date();
        return DatepickerHelper.zeitzone_plus(DatepickerHelper.date_to_ts(d));
    }
};

function evalScript(scripts){
		try{
			if(typeof scripts != typeof undefined && scripts != ''){
				var script = "";
                                //sucht nach den tags
				scripts = scripts.replace(/<script[^>]*>([\s\S]*?)<\/script>/gi, function(){
				if (scripts !== null) //bindet die gefundenen inhalte an ne var
					script += arguments[1] + '\n';
 					return '';
				});
				if(script) (window.execScript) ? window.execScript(script) : window.setTimeout(script, 0);
			}
			return false;
		}
		catch(e){
		}
	}

var TableFilterHelper = {
    zaehler:0,
    breite:200,
    window_width:0,
    window_height:0,
    bodypadding:0,
    getStorage: function(key,nr) {
        var key=StorageHelper.get(key);
        var link1_id="TFH_link1_"+nr;
        var link2_id="TFH_link2_"+nr;

        var filter_id="TFH_filter_"+nr;
        if (key && key==="yes") {
           jq1112("#"+filter_id).css({display:""});
           jq1112("#"+link1_id).css({display:"block"});
           jq1112("#"+link2_id).css({display:"none"});
        }
        if (key && key==="no") {
           jq1112("#"+filter_id).css({display:"none"});
           jq1112("#"+link1_id).css({display:"none"});
           jq1112("#"+link2_id).css({display:"block"});
        }
    }
}

var IframeHelper= {
    autoHeight: function(iframeid) {
        setTimeout(function() {
        try {
            //var height=jq1112(iframeid).contents().find("body").height();
            //jq1112(iframeid).css("height", (height));
            //jq1112(iframeid).attr("scrolling","no");
        } catch(e) {}
        IframeHelper.autoHeight(iframeid);
        },2000);
    }
   
}

var LayoutHelper = {
    top_show: false,
    left_show: false,
    right_show: false,
    left_overlay: false,
    right_overlay: false,
    left_iframe: false,
    right_iframe: false,
    panel_width: 200,
    icon_abstand: 0,
    topicon_show: false,
    lefticon_show: false,
    righticon_show: false,
    top: null,
    top_height:0,
    top_icon: null,
    left: null,
    left_icon: null,
    center: null,
    right: null,
    right_icon: null,
    all: null,
    window_height: 0,
    window_width: 0,
    bodypadding: 0,
    autoheight: false,
    overflow: 'auto',
    left_margin:0,
    right_margin:0,
    top_id:"",

    getCenterWidth: function () {
        var window_breite = jq1112("#crm_body").width();
        var abzug = 0;
        if (this.right_overlay) {
            abzug = abzug + 400;
        }
        if (this.left_overlay) {
            abzug = abzug + 400;
        }
        if (this.right_show && this.left_show) {
            return (window_breite - (this.panel_width * 2) + abzug);
        } else if ((this.right_show && !this.left_show) || (!this.right_show && this.left_show)) {
            return (window_breite - this.panel_width + abzug);
        }
        return null;
    },
    showlefticon: function (c) {
        jq1112("#layout_left_icon").css("display", "block");
        this.show("", "", false, false, "lefticon");
        jq1112("#layout_left_icon").click(function () {
            if (typeof (c) == "function") {
                c();
            }
        });
    },
    showrighticon: function (c) {
        jq1112("#layout_right_icon").css("display", "block");
        this.show("", "", false, false, "righticon");
        jq1112("#layout_right_icon").click(function () {
            if (typeof (c) == "function") {
                c();
            }
        });
    },
    calc: function () {
        this.window_width = parseInt(jq1112(window).width());
        this.window_height = parseInt(jq1112(window).height());
        
        var top_abstand=0;
        if (moderncolor_menu_shadow=="true") {
            top_abstand=15;
        }
        if (typeof moderncolor_body_padding_top != typeof undefined && moderncolor_body_padding_top=="true") {
            top_abstand=20;
        }
        if (design_70) {
            top_abstand=window_menu_height();
        }
        
        var top_left = 0;
        var top_width=0;
        var top_height=0;
        if (this.top_show) {
            top_left = this.bodypadding;
            top_width = this.window_width-(2*this.bodypadding);
            if (this.top_height==0) {
                if (this.top_id!="") {
     
                    top_height=jq1112("#"+this.top_id).height();
                }
            } else {
                top_height=this.top_height;
            }
        } 
    
        this.top.css({"width": top_width, "left": top_left, "height":top_height, "top":(top_abstand)});

      
        var left_left = this.bodypadding;
        var left_width = 0;
        if (this.left_show) {
            if (this.panel_width=="auto") {
                this.left.css({"width": "auto"});
                this.panel_width = this.left.width();
            }
            left_width = this.panel_width;
        }
        this.left.css({"width": left_width, "left": left_left, "top":(top_height+top_abstand)});

        var lefticon_left = this.bodypadding + left_width;
        if (left_width > 0) {
            //30+222-10
            lefticon_left = this.bodypadding + left_width - this.icon_abstand;
        }
        var lefticon_width = 0;
        if (this.lefticon_show) {
            lefticon_width = 36;
        }
        this.left_icon.css({"width": lefticon_width, "left": lefticon_left});


        var right_right = this.bodypadding;
        var right_width = 0;
        if (this.right_show) {
            if (this.panel_width=="auto") {
                this.right.css({"width": "auto"});
                this.panel_width = this.right.width();
            }
            right_width = this.panel_width;
        }
        this.right.css({"width": right_width, "right": right_right});

        var righticon_left = this.bodypadding + right_width;
        if (right_width > 0) {
            //30+222-10
            righticon_left = this.bodypadding + right_width - this.icon_abstand;
        }
        var righticon_width = 0;
        if (this.righticon_show) {
            righticon_width = 36;
        }
        this.right_icon.css({"width": righticon_width, "right": righticon_left});



        var center_left = this.bodypadding;
        var center_width = this.window_width - (this.bodypadding * 2);

      
        if (this.lefticon_show) {
            center_left = center_left  - (this.icon_abstand * 2);
            center_width = center_width  + (this.icon_abstand * 2);
        }
        if (this.left_margin>0) {
            center_left = center_left + this.left_margin;
            center_width = center_width - this.left_margin;
        }
        if (left_width > 0) {
            center_left = center_left + left_width;
            center_width = center_width - left_width;
        }
      
        if (this.right_margin>0) {
            center_width = center_width - this.right_margin;
        }

        if (this.righticon_show) {
            center_width = center_width - righticon_width + (this.icon_abstand * 2);
        }

        if (right_width > 0) {
            center_width = center_width - right_width;
        }


        this.center.css({"width": center_width, "left": center_left, "top":(top_height+top_abstand)});

        var rechheight = (this.window_height-top_height-top_abstand);
        if (this.autoheight) {
            rechheight="auto";
        }

        this.all.css({
            "height": rechheight
        });
    },
    init: function (c) {
        this.top = jq1112("#layout_top");
        this.left = jq1112("#layout_left");
        this.left_icon = jq1112("#layout_left_icon");
        this.center = jq1112("#layout_center");
        this.right = jq1112("#layout_right");
        this.right_icon = jq1112("#layout_right_icon");
        this.all = jq1112("#layout_left,#layout_center,#layout_right,#layout_left_icon,#layout_right_icon");
        if (design_70) {
           this.window_height = parseInt(jq1112(window).height()); 
        } else {
           this.window_height = parseInt(jq1112("#main", top.document).height());
        }
        
        this.window_width = parseInt(jq1112(window).width());

        this.bodypadding = parseInt(jq1112("body").css("padding-left").split("px").join(""));

        if (this.autoheight) {
            this.top.css({/*"overflow-y": "auto",*/"position": "absolute", "top": 0});
            this.left.css({"overflow-y": "auto"});
            this.center.css({"overflow-y": "auto"});
            this.right.css({"overflow-y": "auto"});
            this.all.css({"position": "absolute", "top": 0});
        } else {
            this.top.css({/*"overflow-y": "auto",*/"position": "absolute", "height": 0, "top": 0});
            this.left.css({"overflow-y": "auto"});
            this.center.css({"overflow-y": this.overflow});
            this.right.css({"overflow-y": this.overflow});
            this.all.css({"position": "absolute", "height": this.window_height, "top": (design_70?window_menu_height():0)});
        }
        this.top.css({"width": (this.window_width-(2*this.bodypadding)),height:0, "z-index": 1});
        this.left.css({"width": 0, "z-index": 1});
        this.left_icon.css({"width": 0, "z-index": 2, "overflow": "auto", "display": "block"});
        this.center.css({"width":"100%","z-index": 0});
        this.right.css({"width": 0, "z-index": 3});
        this.right_icon.css({"width": 0, "z-index": 4, "overflow": "auto", "display": "block"});
       this.calc();
        if (typeof (c) == "function") {
            c();
        }
        
        var t=this
        jq1112(window).resize(function () {
            t.calc();
        });
        
        
    },
    init_leftIcon: function (content, c) {
        this.lefticon_show = true;
        this.calc();
        if (this.left_show) {
            LayoutHelper.left_icon.find("span").addClass("open");
        }
        this.left_icon.click(function () {
            if (!LayoutHelper.left_icon.find("span").hasClass("open")) {
                LayoutHelper.left_icon.find("span").addClass("open");
                LayoutHelper.expandleftIcon();
                if (content != "") {
                    LayoutHelper.left.html(content);
                }
            } else {
                LayoutHelper.left_icon.find("span").removeClass("open");
                LayoutHelper.closeleftIcon();
            }
            if (typeof (c) == "function") {
                c();
            }

        });
    },
    init_rightIcon: function (content, c) {
        this.righticon_show = true;
        this.calc();
        if (this.right_show) {
            LayoutHelper.right_icon.find("span").addClass("open");
        }
        this.right_icon.click(function () {
            if (!LayoutHelper.right_icon.find("span").hasClass("open")) {
                LayoutHelper.right_icon.find("span").addClass("open");
                LayoutHelper.expandrightIcon();
                if (content != "") {
                    LayoutHelper.right.html(content);
                }
            } else {
                LayoutHelper.right_icon.find("span").removeClass("open");
                LayoutHelper.closerightIcon();
            }
            if (typeof (c) == "function") {
                c();
            }
        });
    },
    expandleftIcon: function () {
        this.left_show = true;
        this.calc();
    },
    expandrightIcon: function () {
        this.right_show = true;
        this.calc();
    },
    closeleftIcon: function () {
        this.left_show = false;
        this.calc();
    },
    closerightIcon: function () {
        this.right_show = false;
        this.calc();
    },
    close: function () {
        var left = jq1112("#layout_left");
        var center = jq1112("#layout_center");
        var right = jq1112("#layout_right");

        var side = "";
        if (typeof arguments[0] != 'undefined') {
            side = arguments[0];
        }

        if (side == "right") {
            if (!this.right_overlay) {
                center.animate({width: "+=" + this.panel_width + "px"}, 200, function () {
                    right.html("");
                });
            }
            right.animate({right: "-" + this.panel_width + "px"}, 200, function () {
                LayoutHelper.uninit();
            });

            this.right_show = false;
            this.right_overlay = false;
            this.right_iframe = false;
        }

        if (side == "left") {
            if (!this.left_overlay) {
                center.animate({width: "+=" + (this.panel_width) + "px"}, 200, function () {
                    left.html("");
                });
            }
            left.animate({left: "-" + this.panel_width + "px"}, 200, function () {
                LayoutHelper.uninit();
            });

            this.left_show = false;
            this.left_overlay = false;
            this.left_iframe = false;
        }

    },
    uninit: function () {
        if (!this.right_show && !this.left_show) {
            var left = jq1112("#layout_left");
            var center = jq1112("#layout_center");
            var right = jq1112("#layout_right");

            left.css("position", "").css("width", "").css("height", "").css("z-index", "").css("display", "").css("left", "").css("overflow", "");
            center.css("position", "").css("width", "").css("height", "").css("z-index", "").css("display", "").css("overflow", "");
            right.css("position", "").css("width", "").css("height", "").css("z-index", "").css("display", "").css("right", "").css("overflow", "");
        }
    }
}

var KeyTimerHelper= {
    init: function(eins, t, c) {
        var searchValue1 = jq1112(eins).attr("value");
        setTimeout(
            function(){
                if(
                (searchValue1 == jq1112(eins).attr("value") && searchValue1 != null)
                ) {
                    if (typeof c == "function") {
                        c();
                    }

                }
            }
        ,t);
    }
}

var KeyTimer2Helper= {
    init: function(eins,zwei, t, c) {
        var searchValue1 = jq1112(eins).attr("value");
        var searchValue2 = jq1112(zwei).attr("value");
        setTimeout(
            function(){
                if(
                (searchValue1 == jq1112(eins).attr("value") && searchValue1 != null && searchValue1 != "") &&
                (searchValue2 == jq1112(zwei).attr("value") && searchValue2 != null && searchValue2 != "")
                ) {
                    if (typeof c == "function") {
                        c();
                    }

                }
            }
        ,t);
    }
}

var RangeSliderHelper = {
    init: function(von,bis,target,min,max,startval,endval,step,c) {
        if (endval=="") {
            endval=max;
        }

    
        jq1112( target ).slider({
            range: true,
            min: min,
            max: max,
            step:step,
            values: [ startval, endval ],
            slide: function( event, ui ) {
                jq1112(von).val(ui.values[ 0 ]);
                jq1112(bis).val(ui.values[ 1 ]);
                KeyTimer2Helper.init(von,bis,600,c);
            }
        });
       // jq1112(von).val(jq1112(target).slider("values", 0));
       // jq1112(bis).val(jq1112(target).slider("values", 1));
       

       
       
        jq1112(von).keyup(function () {
            if ($(von).val()=="") {
                jq1112(target).slider("values", 0, min);
            } else {
                jq1112(target).slider("values", 0, $(von).val());
            }
            KeyTimerHelper.init(von, 600, function () {
                if (typeof c == "function") {
                    c();
                }
            });
        });
         
        jq1112(bis).keyup(function () {
            if ($(bis).val()=="") {
                jq1112(target).slider("values", 1, max);
            } else {
                jq1112(target).slider("values", 1, $(bis).val());
            }
            KeyTimerHelper.init(bis, 600, function () {
                if (typeof c == "function") {
                    c();
                }
            });
        });
    }
}

function vollstaendigkeitsanzeige(elemid, headerid, prozentwert) {
    jq1112("#" + elemid).progressbar({
        value: prozentwert
    });
    var progressbarValue = jq1112("#" + elemid).find(".ui-progressbar-value");

    var gesamt = prozentwert;
    if (gesamt <= 1) {
        progressbarValue.css({"background": '#fff'});
    }
    if (gesamt < 25 && gesamt > 2) {
        progressbarValue.css({"background": '#e72222'});
    }
    if (gesamt >= 25) {
        progressbarValue.css({"background": '#e78422'});
    }
    if (gesamt >= 50) {
        progressbarValue.css({"background": '#e7e522'});
    }
    if (gesamt >= 75) {
        progressbarValue.css({"background": '#3c9228'});
    }
    progressbarValue.css({"border": "1px solid #D8D7D7","display":"block"});
}

function uiProgressbar(elemid, prozentwert, farbwert, disabled, text) {
    jq1112("#" + elemid).progressbar({
        value: prozentwert
    });
    
    jq1112("#" + elemid).css("border","1px solid #000").css("position","relative");
    var progressbarValue = jq1112("#" + elemid).find(".ui-progressbar-value");
    
    progressbarValue.css({"background": farbwert,"display":"block", "border-right":(prozentwert>0?"1px solid #000":"")});
    
    if (typeof disabled != typeof undefined && disabled==true) {
        jq1112("#" + elemid).progressbar( "option", "disabled", true );
    }
    if (typeof text != typeof undefined && text!="") {
        jq1112("#" + elemid).append('<div style="position:absolute; top:0px; left:0px; width:100%; height:100%;text-align:center;font-family:Arial;font-size:12px !important;font-weight:bold;">'+text+'</div>');
    }
}

function user_name(user_id) {
    // user_id_map ist ein globales array und wird beim seitenaufruf gefuellt
    if (typeof user_id_map !="undefined" && user_id_map) {
    return user_id_map[user_id];
     } else {
         return '';
     }
}

window.getElementsByClassName = function(className) {
    var muster = new RegExp("(^| )" + className + "($| )");
    var alles = document.getElementsByTagName("*");
    var gefunden = new Array();
    var i;
    for (i = 0; i < alles.length; i++) {
        if (alles[i] && alles[i].className && alles[i].className != "") {
            if (alles[i].className.match(muster)) {
                gefunden[gefunden.length] = alles[i];
            }
        }
    }
    return gefunden;
}


var global_stop_notification=false;

var InfoPanel = {
    animation_duration:300,
    width:350,
    speicher:{},
    speicher_zaehler:0,
    interval:[],
    checkopen:false,
    blockit:false,
    contentMouseover:false,
    timer1:null,
    timer2:null,
    refresh_block:false,
    geladen:false,
    create: function() {
        var InfoPanelContent=jq1112((design_70?"#InfoPanelContent2":"#InfoPanelContent"), topmenu.document);
        if (InfoPanelContent.length) {
            if (design_70) {
                InfoPanel.geladen=true;
            } else {
                InfoPanelContent.css({width:InfoPanel.width,right:"-"+InfoPanel.width+"px"});
            }
            var sp=null;
            //for (var i=0;i<InfoPanel.speicher.length;i++) {
            var i;
            for (i in InfoPanel.speicher) {
                sp=InfoPanel.speicher[i];
                if (sp.category && sp.category!="") {
                    InfoPanelContent.find("#infopanel_inner").append("<div id='infopanel_category_"+i+"' class='infopanel_modul infopanel_category' style='overflow: hidden; "+(i==0?"margin-top:0px;":"")+"'>"+sp.category+"</div>");
                    InfoPanelContent.find("#infopanel_category_"+i).wrap("<p></p>");
                } else if (sp.html && sp.html!="") {
                    InfoPanelContent.find("#infopanel_inner").append("<div id='"+sp.id+"' class='infopanel_modul "+sp.klasse+" "+sp.bg+"' style='overflow: hidden;'>"+sp.html+"</div>");
                    InfoPanelContent.find("#"+sp.id).wrap("<p></p>");
                    if (sp.javascript && sp.javascript!="") {
                        var s = document.createElement("script");
                        s.type = "text/javascript";
                        s.innerHTML = sp.javascript;
                        jq1112("#"+sp.id).append(s);
                    }
                } else {
                    InfoPanelContent.find("#infopanel_inner").append("<div id='"+sp.id+"' class='infopanel_modul "+sp.klasse+" "+sp.bg+"' style='overflow: hidden;'></div>");
                    InfoPanelContent.find("#"+sp.id).wrap("<p></p>");
                    
                    //InfoPanel.refresh(i,false); 
                    
                    /*if (sp.timetorefresh && sp.timetorefresh>0) {
                        clearInterval(InfoPanel.interval[i]);
                        InfoPanel.interval[i]=setInterval(function(a){
                            InfoPanel.refresh(a,false);
                        }, sp.timetorefresh, i);
                    }*/
                    InfoPanel.refresh(i); 
                } 
            }
            if (!design_70 && typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.document != typeof undefined) {
                var InfoPanelContent3=jq1112("#InfoPanelContent3", toptabs.document);
                if (InfoPanelContent3.length) {
                    InfoPanelContent3.css({width:InfoPanel.width,right:"-"+InfoPanel.width+"px"});
                }
            }
        }
    },
    enableButton:function() {
        if (
            (!design_70 && 
            topmenu &&
            topmenu.menu_geladen &&
            jq1112("#InfoPanelContent", topmenu.document).length && 
            jq1112("#InfoPanelButton").length &&
            jq1112("#InfoPanelContent2").length
            ) || 
            (design_70 && 
            jq1112("#InfoPanelContent2", topmenu.document).length
            )
        ) {
            jq1112("#InfoPanelButton").css("display","block");
            jq1112("#InfoPanelButton").click(function() {
                if (InfoPanel.blockit==false) {
                    InfoPanel.blockit=true;
                    if (InfoPanel.checkopen==false) {
                        InfoPanel.openall();
                    } else if (InfoPanel.checkopen==true) {
                        InfoPanel.closeall();
                    }
                }
            });
        }  else {
            setTimeout(function () { InfoPanel.enableButton(); },600);
        }
    },
    refresh:function(i,single) {
        //if (topmenu && typeof topmenu.StatusBarHelper != typeof undefined && typeof topmenu.StatusBarHelper.getfocusele == "function") {
            //topmenu.StatusBarHelper.getfocusele();
        //}
        var sp=InfoPanel.speicher[i];
        
        var go=false;
        if (
            topmenu &&
            ((!design_70 && topmenu.menu_geladen) || design_70) &&
            topmain &&
            topmain.content_geladen &&
            topmain.P4nBoxHelper.loading_active==false
        ) {
            go=true;
        }
        
        if (go==false) {
            if (sp.timetorefresh && sp.timetorefresh>0) {
                clearTimeout(InfoPanel.interval[i]);
                InfoPanel.interval[i]=setTimeout(function(){
                    InfoPanel.refresh(i);
                }, 600);
            }
            return;
        }
        
       // var is_container=false;
        var is_single=false;
        var is_request=false;
        var is_post=false;
        //var has_request_change=false;
        
        /*if  (typeof sp.container != typeof undefined && sp.container!="") {
            is_container=true;
        }*/
        if  (typeof single != typeof undefined && single==true) {
            is_single=true;
        }
        if  (typeof sp.url != typeof undefined && sp.url!="") {
            is_request=true;
            if (typeof sp.post != typeof undefined && sp.post!="") {
                is_post=true;
            }
        }
        

        var InfoPanelContent=jq1112((design_70?"#InfoPanelContent2":"#InfoPanelContent"), topmenu.document);
        var sp_obj=InfoPanelContent.find("#"+sp.id);
       // var height="";
        /*var original_url=sp.url;
        var original_post=sp.post;
        var original_onrequest=sp.onrequest;
        var original_afterrequest=sp.afterrequest;*/
        
       /* if  (is_container && is_single) {
            var j;
            for (j in topmenu.InfoPanel.speicher) {
                var sp2=topmenu.InfoPanel.speicher[j];
                if (sp2.container==sp.container) {
                    if (typeof sp2.url != typeof undefined && sp2.url!="") {
                        has_request_change=true;
                        sp.url=sp2.url;
                        is_request=true;
                        if (typeof sp2.post != typeof undefined && sp2.post!="") {
                            sp.post=sp2.post;
                            is_post=true;
                        }
                        if (typeof sp2.onrequest == typeof 'function') {
                            sp.onrequest=sp2.onrequest;
                        }
                        if (typeof sp2.afterrequest == typeof 'function') {
                            sp.afterrequest=sp2.afterrequest;
                        }
                    }
                }
            }
        }*/
        
       // if  (!is_container) {
          //  height=sp_obj.height();
           // sp_obj.css("height",height);
       // }
        
        if (!is_request) {
            sp_obj.html("");
            //if (topmenu && typeof topmenu.StatusBarHelper != typeof undefined && typeof topmenu.StatusBarHelper.dofocus == "function") {
                //topmenu.StatusBarHelper.dofocus();
            //}
        } else {
            if (is_post) {
                RequestHelper.post(sp.url,sp.post, function (response) {
                    sp_obj.html(response);
                    if (typeof sp.onrequest == 'function') {
                        sp.onrequest();
                    }
                    //if (topmenu && typeof topmenu.StatusBarHelper != typeof undefined && typeof topmenu.StatusBarHelper.dofocus == "function") {
                       // topmenu.StatusBarHelper.dofocus();
                    //}
                }, false, true);
            } else {
                RequestHelper.get(sp.url, function (response) {
                    /*if (is_container) {
                        var j2;
                        var z=0;
                        var myArr=JSON.parse(response);
                        for (j2 in topmenu.InfoPanel.speicher) {
                            sp2=topmenu.InfoPanel.speicher[j2];
                            if (sp2.container==sp.container) {
                                InfoPanelContent.find("#"+sp2.id).html(myArr[z]);
                                InfoPanel.speicher[j2].neu=true;
                                z++;
                            }
                        }
                    } else {*/
                        sp_obj.html(response);
                    //}
                    if (typeof sp.onrequest == 'function') {
                        sp.onrequest();
                    }
                    //if (topmenu && typeof topmenu.StatusBarHelper != typeof undefined && typeof topmenu.StatusBarHelper.dofocus == "function") {
                      //  topmenu.StatusBarHelper.dofocus();
                    //}
                }, false, true);
            }
        }
        if (typeof sp.onrefresh == 'function') {
            sp.onrefresh();
        }

       // if  (!is_container) {
           // sp_obj.css("height","auto");
       // }
        /*
        if  (has_request_change) {
            sp.url=original_url;
            sp.post=original_post;
            sp.onrequest=original_onrequest;
            sp.afterrequest=original_afterrequest;
        }*/
        
      //  if (!is_container) {
        InfoPanel.speicher[i].neu=true;
        
        //if (topmenu && typeof topmenu.StatusBarHelper != typeof undefined && typeof topmenu.StatusBarHelper.dofocus == "function") {
            //topmenu.StatusBarHelper.dofocus();
        //}
        
        if (is_single) {
        } else {
            if (sp.timetorefresh && sp.timetorefresh>0) {
                clearTimeout(InfoPanel.interval[i]);
                InfoPanel.interval[i]=setTimeout(function(){
                    InfoPanel.refresh(i);
                }, sp.timetorefresh);
            }
        }
    },
    add:function(a) {
        var k="speicher_zaehler_"+InfoPanel.speicher_zaehler;
        if (typeof a.id != typeof undefined) {
            k=a.id;
        }
        InfoPanel.speicher[k]=a;
        InfoPanel.speicher_zaehler++;
    },
    addcategory:function(name) {
        var a=new Array();
        a.category=name;
        var k="speicher_zaehler_"+InfoPanel.speicher_zaehler;
        if (typeof a.id != typeof undefined) {
            k=a.id;
        }
        InfoPanel.speicher[k]=a;
        InfoPanel.speicher_zaehler++;
    },
    checkdiff:function() {},
    cloneContent:function(initial,sp) {
        var InfoPanelContent=jq1112("#InfoPanelContent", topmenu.document);
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        var InfoPanelContent2_inner=InfoPanelContent2.find("#infopanel_inner");
        
        if (!design_70) {
            InfoPanelContent2_inner.jScrollPane();
        }
        var htmlobj=InfoPanelContent2_inner.find(((initial==true)?".jspPane":"#"+sp.id));
        htmlobj.css("height",htmlobj.height());
 
        htmlobj.html("");
        if (initial==true) {
            htmlobj.append(InfoPanelContent.find("#infopanel_inner").children("*").clone(true));
        } else {
            var html=InfoPanelContent.find("#infopanel_inner").find("#"+sp.id).html();
            if (html!="") {
                htmlobj.append(InfoPanelContent.find("#infopanel_inner").find("#"+sp.id).children("*").clone(true));
            }
        }
    
        evalScript(htmlobj.html());
  
        htmlobj.css("height","auto");
        if (!design_70) {
            InfoPanelContent2_inner.jScrollPane();
            jq1112(window).on('resize.infopanelresize', function (e) {
                jq1112("#infopanel_inner").jScrollPane();
            });
        }
        if (initial==true) {
            var sp=null;
            //for (var i=0;i<topmenu.InfoPanel.speicher.length;i++) {
            var i;
            for (i in topmenu.InfoPanel.speicher) {
                sp=topmenu.InfoPanel.speicher[i];
                var afterrefresh=sp.afterrefresh;
                if (typeof afterrefresh == "function") {
                    afterrefresh();
                }
            }
        } else {
            var afterrefresh=sp.afterrefresh;
            if (typeof afterrefresh == "function") {
                afterrefresh();
            }
        }
    },
    refreshScrollbar:function() {
        if (design_70) {
            return;
        }
        var InfoPanelContent2=jq1112("#InfoPanelContent2",topmain.document);
        InfoPanelContent2.find("#infopanel_inner").jScrollPane();
    },
    reset: function() {
        if (top && topmenu && topmenu.InfoPanel && topmenu.InfoPanel.speicher) {
            //for (var i=0;i<topmenu.InfoPanel.speicher.length;i++) {
            var i;
            for (i in topmenu.InfoPanel.speicher) {
                topmenu.InfoPanel.speicher[i].neu=true;
            } 
        }
        global_stop_notification=false;
        if (!design_70) jq1112.fx.off=true;
        InfoPanel.blockit=false;
        InfoPanel.timer2=null;
        InfoPanel.checkdiff=function() {};
        InfoPanel.checkopen=false;
        InfoPanel.contentMouseover=false;
        
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        var jspPane=InfoPanelContent2.find("#infopanel_inner").find(".jspPane");
        if (jspPane.length) {
            if (!design_70) {
                InfoPanelContent2.find("#infopanel_inner").find(".jspPane").html("");
            }
        }
        if (typeof enableScroll=='function') {
            enableScroll();
        }
    },
    openall: function() {
        InfoPanel.checkopen=true;
        if (topmain && topmenu && topmain && typeof topmenu.InfoPanel=="object" && typeof topmain.InfoPanel=="object" && typeof topmain.InfoPanel=="object") {
            topmain.InfoPanel.open2();
            if (!design_70) {
                topmenu.InfoPanel.open();
            }
        }
    },
    closeall: function() {
        if (topmain && topmenu && topmain && typeof topmenu.InfoPanel=="object" && typeof topmain.InfoPanel=="object" && typeof topmain.InfoPanel=="object") {
            topmain.InfoPanel.close2();
            if (!design_70) {
                topmenu.InfoPanel.close(); 
            }
        }
        InfoPanel.reset();
    },
    closeallstrict: function() {
        if (topmenu && typeof topmenu.document != typeof undefined) {
            var InfoPanelContent=jq1112("#InfoPanelContent",topmenu.document);
            if (!design_70) {
                InfoPanelContent.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
            }
        }
        if (typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.document != typeof undefined) {
            var InfoPanelContent3=jq1112("#InfoPanelContent3",toptabs.document);
            if (InfoPanelContent3.length) {
                if (!design_70) {
                    InfoPanelContent3.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
                }
            }
        }
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        var InfoPanelButton=jq1112("#InfoPanelButton");
        if (!design_70) {
            InfoPanelContent2.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
            InfoPanelContent2.find("#infopanel_inner").html("");
        }
        InfoPanelButton.css({"right":"0px","display":"none"});
        InfoPanelButton.find(".icon-pfeilrechts").attr("class","icon icon-pfeillinks infopanel_button_icon");
        InfoPanel.reset();
    },
    closeallstrict2: function() {
        if (topmenu && typeof topmenu.document != typeof undefined) {
            var InfoPanelContent=jq1112("#InfoPanelContent",topmenu.document);
            if (!design_70) {
                InfoPanelContent.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
            }
        }
        if (typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.document != typeof undefined) {
            var InfoPanelContent3=jq1112("#InfoPanelContent3",toptabs.document);
            if (InfoPanelContent3.length) {
                if (!design_70) {
                    InfoPanelContent3.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
                }
            }
        }
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        var InfoPanelButton=jq1112("#InfoPanelButton");
        if (!design_70) {
           InfoPanelContent2.css({"visibility":"hidden","right":"-"+InfoPanel.width+"px"});
            InfoPanelContent2.find("#infopanel_inner").find(".jspPane").html("");
        }
        InfoPanelButton.css({"right":"0px"});
        InfoPanelButton.find(".icon-pfeilrechts").attr("class","icon icon-pfeillinks infopanel_button_icon");
        InfoPanel.reset();
    },
    _to: function(f,z) 
    {
        clearTimeout(InfoPanel.timer1);
        InfoPanel.timer1=null;
        if (z<f.length) {
            var sp=f[z];
            InfoPanel.cloneContent(false,sp);
            z++;
            InfoPanel.timer1=setTimeout(function() {InfoPanel._to(f,z)}, 10);
        } else {
            InfoPanel.refresh_block=false;
        }
    },
    open2: function () {
        
        if (!design_70) jq1112.fx.off=false;
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        global_stop_notification=true;
       // if (!("Notification" in window)) {} else {
        //Notification.close();
       // }
        if (!design_70) {
            InfoPanelContent2.css({width:InfoPanel.width,right:"-"+InfoPanel.width+"px"});
        }
        InfoPanelContent2.mouseover(function() {
            InfoPanel.contentMouseover=true;
            disableScroll();
        });
        InfoPanelContent2.mouseout(function() {
            InfoPanel.contentMouseover=false;
            enableScroll();
        });
        
        jq1112("html",topmain.document).on('click.infopaneloutside', function (e) {
            if (
                (jq1112(e.target).closest("#InfoPanelContent2").length === 0) &&
                (jq1112(e.target).closest("#InfoPanelButton").length === 0) &&
                (jq1112(e.target).closest("#InfoPanelContent",topmenu.document).length === 0 || design_70) &&
                (jq1112(e.target).closest(".fancybox-wrap",topmain.document).length === 0) &&
                (jq1112(e.target).closest(".fancybox-overlay",topmain.document).length === 0)
            ) {
                if (topmain && topmenu && topmain && typeof topmenu.InfoPanel=="object" && typeof topmain.InfoPanel=="object" && typeof topmain.InfoPanel=="object") {
                    topmain.InfoPanel.closeall();
                }
                jq1112("html",topmain.document).unbind('click.infopaneloutside');
            }
        });
        jq1112("html",topmenu.document).on('click.infopaneloutside', function (e) {
            if (
                (jq1112(e.target).closest("#InfoPanelContent2",topmain.document).length === 0) &&
                (jq1112(e.target).closest("#InfoPanelButton",topmain.document).length === 0) &&
                (jq1112(e.target).closest("#InfoPanelContent",topmenu.document).length === 0) &&
                (jq1112(e.target).closest(".fancybox-overlay",topmenu.document).length === 0)
                
            ) {
                topmenu.InfoPanel.closeall();
                jq1112("html",topmenu.document).unbind('click.infopaneloutside');
            }
        });
        
        InfoPanel.checkdiff=function() {
            clearTimeout(InfoPanel.timer2);
            var jspPane=InfoPanelContent2.find("#infopanel_inner").find(".jspPane");
            if (jspPane.length === 0 || jspPane.html()=="") {
                var html1="";
                var html2="";
                var sp=null;
                var content_vorhanden=false;
                //for (var i=0;i<topmenu.InfoPanel.speicher.length;i++) {
                var i;
                for (i in topmenu.InfoPanel.speicher) {
                    sp=topmenu.InfoPanel.speicher[i];
                    html1=jq1112("#"+sp.id,topmenu.document).html();
                    html2=jq1112("#"+sp.id,topmain.document).html();
                    if (sp.neu  || (html1!="" && html2=="") ) {
                        content_vorhanden=true;
                        topmenu.InfoPanel.speicher[i].neu=false;
                    }
                }
                if (content_vorhanden) {
                    window.setTimeout(function() {
                        InfoPanel.cloneContent(true,{});
                    },1);
                }
            }
            if (InfoPanel.contentMouseover==false && jspPane.length && jspPane.html()!="") {
                var html1="";
                var html2="";
                var sp=null;
                var speicher2=new Array();
                var zaehler=0;
                //for (var i=0;i<topmenu.InfoPanel.speicher.length;i++) {
                var i;
                for (i in topmenu.InfoPanel.speicher) {
                    sp=topmenu.InfoPanel.speicher[i];
                    if (typeof sp.id != typeof undefined && typeof sp.timetorefresh != typeof undefined && sp.timetorefresh>0) {
                        html1=jq1112("#"+sp.id,topmenu.document).html();
                        html2=jq1112("#"+sp.id,topmain.document).html();
                        if ((sp.neu && html1!="") || (html1!="" && html2=="")) {
                            topmenu.InfoPanel.speicher[i].neu=false;
                            speicher2[zaehler]=sp;
                            zaehler++;
                        }
                    }
                }
                if (speicher2.length > 0 && InfoPanel.refresh_block==false) {
                    InfoPanel.refresh_block=true;
                    InfoPanel._to(speicher2,0);
                }
            }
            InfoPanel.timer2=setTimeout(function() {
                if (!design_70) {
                    InfoPanel.checkdiff();
                }
            },1000); 
        };
        if (!design_70) {
            InfoPanel.checkdiff();
        }
        InfoPanelContent2.css("visibility","visible");
        
        if (InfoPanelContent2.length) {
            InfoPanelContent2.animate({
              right: "0px"
            }, InfoPanel.animation_duration, function() {
                if (!design_70) jq1112.fx.off=true;
                InfoPanel.blockit=false;
                if (!design_70) {
                    jq1112("#infopanel_inner").jScrollPane();
                }
            });
            jq1112("#InfoPanelButton").animate({
              right: "+"+InfoPanel.width+"px"
            }, InfoPanel.animation_duration, function() {
                jq1112("#InfoPanelButton").find(".icon-pfeillinks").attr("class","icon icon-pfeilrechts infopanel_button_icon");
                if (!design_70) jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });
        }
    },
    open: function () {
        var InfoPanelContent=jq1112("#InfoPanelContent", topmenu.document);
        if (InfoPanelContent.length) {
            if (!design_70) jq1112.fx.off=false;
            InfoPanelContent.css("visibility","visible");
            InfoPanelContent.animate({
              right: "0px"
            }, InfoPanel.animation_duration, function() {
                if (!design_70) jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });
        }
        
        if (!design_70 && typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.document != typeof undefined) {
            var InfoPanelContent3=jq1112("#InfoPanelContent3", toptabs.document);
            if (InfoPanelContent3.length) {
                InfoPanelContent3.css({width:InfoPanel.width,right:"-"+InfoPanel.width+"px"});
                if (!design_70) jq1112.fx.off=false;
                InfoPanelContent3.css("visibility","visible");
                InfoPanelContent3.animate({
                  right: "0px"
                }, InfoPanel.animation_duration, function() {
                    if (!design_70) jq1112.fx.off=true;
                    InfoPanel.blockit=false;
                });
            }
        }
    },
    close2: function () {
        var InfoPanelContent2=jq1112("#InfoPanelContent2");
        if (InfoPanelContent2.length) {
            if (!design_70)jq1112.fx.off=false;
            if (!design_70) {
                InfoPanelContent2.animate({
              right: "-"+InfoPanel.width+"px"
            }, InfoPanel.animation_duration, function() {
                InfoPanelContent2.css("visibility","hidden");
                InfoPanelContent2.find("#infopanel_inner").find(".jspPane").html("");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });
            jq1112("#InfoPanelButton").animate({
              right: "0px"
            }, InfoPanel.animation_duration, function() {
                jq1112("#InfoPanelButton").find(".icon-pfeilrechts").attr("class","icon icon-pfeillinks infopanel_button_icon");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            }); 
            } else {
            InfoPanelContent2.animate({
    //          right: "-"+InfoPanel.width+"px"
            }, InfoPanel.animation_duration, function() {
              //  InfoPanelContent2.css("visibility","hidden");
              //  InfoPanelContent2.find("#infopanel_inner").find(".jspPane").html("");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });
            jq1112("#InfoPanelButton").animate({
       //       right: "0px"
            }, InfoPanel.animation_duration, function() {
                jq1112("#InfoPanelButton").find(".icon-pfeilrechts").attr("class","icon icon-pfeillinks infopanel_button_icon");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            }); 
        }
        }
    },
    close: function () {
        var InfoPanelContent=jq1112("#InfoPanelContent", topmenu.document);
        if (InfoPanelContent.length) {
            if (!design_70)jq1112.fx.off=false;
            if (!design_70) {
              InfoPanelContent.animate({
              right: "-"+InfoPanel.width+"px"
            }, InfoPanel.animation_duration, function() {
                InfoPanelContent.css("visibility","hidden");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });  
            } else {
            if (!design_70)jq1112.fx.off=false;
            InfoPanelContent.animate({
     //         right: "-"+InfoPanel.width+"px"
            }, InfoPanel.animation_duration, function() {
            //    InfoPanelContent.css("visibility","hidden");
                if (!design_70)jq1112.fx.off=true;
                InfoPanel.blockit=false;
            });
            }
        }
        if (!design_70 && typeof cfg_tabs != typeof undefined && cfg_tabs==true && toptabs && typeof toptabs.document != typeof undefined) {
            var InfoPanelContent3=jq1112("#InfoPanelContent3", toptabs.document);
            if (InfoPanelContent3.length) {
                if (!design_70)jq1112.fx.off=false;
                InfoPanelContent3.animate({
                  right: "-"+InfoPanel.width+"px"
                }, InfoPanel.animation_duration, function() {
                    InfoPanelContent3.css("visibility","hidden");
                    if (!design_70)jq1112.fx.off=true;
                    InfoPanel.blockit=false;
                });
            }
        }
    }
}



function notification_call(betreff,beschreibung,id,callback) {
    var options={
        body: beschreibung,
       // icon: 'inc/Modern/images/logo.png',
      //  requireInteraction: false,
        tag: id
    }

    if (!("Notification" in window)) {
    } else if (Notification.permission === "granted") {
        var noti = new Notification(betreff, options);
        var noti_click=false;
        noti.onclick = function(event) {
            if (noti_click==false) {
                noti_click=true;
                event.preventDefault(); // prevent the browser from focusing the Notification's tab
                if (typeof callback == "function") {
                    callback();
                }
            }
        }
    } else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            // If the user accepts, let's create a notification
            if (permission === "granted") {
                var noti = new Notification(betreff, options);
            }
        });
    }
}

function notification_array(f,z)
{
    if (z<f.length) {
        var sp=f[z];
        notification_call(sp.betreff,sp.beschreibung,sp.id,sp.callback);
        z++;
        InfoPanel.timer1=setTimeout(function() {notification_array(f,z);}, 250);
    } else {

    }
}

function notification(betreff,beschreibung,id,callback) {
   // if (topmain.global_stop_notification==false) {
        if( typeof betreff === 'string' ) {
           notification_call(betreff,beschreibung,id,callback);
        } else {
           var sp={};
           var f=new Array();
           for (var i=0; i<betreff.length;i++) {
               sp={};
               sp.betreff=betreff[i];
               sp.beschreibung=beschreibung[i];
               sp.id=id[i];
               sp.callback=callback[i];
               f[i]=sp;
           }
           notification_array(f,0);
        }
    //}
}

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}


var cacheselect_array=new Array();
var cacheselect_bw_array=new Array();
var cacheselect_array_key=new Array();

function cacheselect(cachebez,selectname, suchfeld) {
    var arr=new Array();
    var arr2=new Array();
    var i,j,temp,bw,option,temp2;
    var html="";

    for (i=0; i<cachebez.length;i++) {
        if (cachebez[i]!="") {
            if (typeof cacheselect_array["cacheselect_"+cachebez[i]] != typeof undefined) {
                temp=cacheselect_array["cacheselect_"+cachebez[i]];
                temp2=cacheselect_array_key["cacheselect_"+cachebez[i]];
                for (j=0; j<temp2.length;j++) {
                    if (arr2.indexOf(temp2[j]) === -1) {
                        arr2.push(temp2[j]);
                        arr.push(temp[j]);
                    } else {
                        for (var j2=0; j2<arr2.length; j2++) {
                            if (arr2[j2]==temp2[j]) {
                                arr2[j2]=temp2[j];
                                arr[j2]=temp[j];
                            }
                        }
                    }
                }
                /*for (j in temp) {
                    arr[j]=temp[j];
                }
                for (j in temp2) {
                    arr2[j]=temp2[j];
                }*/
            }
        }
    }

    var jq_select=jq1112("select[name='"+selectname+"']");
    var jq_seleted_val=jq_select.find("option:selected").val();

    if (cacheselect_bw_array[selectname]) {
        bw=cacheselect_bw_array[selectname];
        for (i in bw) {
            if (i && (typeof bw[i] === "string" || typeof bw[i] === "number" || bw[i]=="")) {
                if (jq_seleted_val==i) {
                     html+='<option selected="selected" value="'+i+'">'+bw[i]+'</option>';
                } else {
                     html+='<option value="'+i+'">'+bw[i]+'</option>';
                }
            }
        }
    }

    for (i in arr) {
        if (i && (typeof arr[i] === "string" || typeof arr[i] === "number" || arr[i]=="")) {
            //option = document.createElement('option');
            //option.text = arr[i];
            //option.value = i;
            if (arr[i] === 'OPTGROUP')  {
                html+='<optgroup label="'+arr2[i]+'"></optgroup>';
            } else {
                if (jq_seleted_val==arr2[i]) {
                    //option.setAttribute("selected","selected");
                     html+='<option selected="selected" value="'+arr2[i]+'">'+arr[i]+'</option>';
                } else {
                     html+='<option value="'+arr2[i]+'">'+arr[i]+'</option>';
                }
            }
        }
    }
    jq_select.html(html);
    jq_select.prev().remove();
    jq_select.removeAttr("onfocus");
    
    if (suchfeld) {
        jq_select.addClass("select-js-all").addClass("select-js");
        if (typeof select_js_all == "function") {
            select_js_all();
        }
    }
}


function init_waypoints() {
    if (typeof Waypoint == 'function') {
        jq1112(".display_waypoints").waypoint({
            handler: function(direction) {
                jq1112(this.element).removeClass("display_waypoints");
                this.destroy();
            },
            offset: "top-in-view"
        });
    } else {
        jq1112(".display_waypoints").removeClass("display_waypoints");
    }
}


function link2_post_tab() {
    jq1112(".link2_post_tab,.oltext_post_tab").each(function() {
        var form = jq1112(this).closest('form'); 
        jq1112(this).click(function() {
            if (toptabs && typeof toptabs.TabHelper != typeof undefined && topmain && topmain.document) {
                toptabs.TabHelper.close();
                toptabs.TabHelper.siteToTab("about:blank",true,form[0]); 
                return false;
            }   
        });
    });
} 

function linkToTab(target) {
    if (toptabs && typeof toptabs.TabHelper != typeof undefined && topmain && topmain.document && (document == topmain.document || topmain.nl_main)) {
        toptabs.TabHelper.close();
        toptabs.TabHelper.siteToTab(target,true); 
        return false;
    }   
}

function objReplace(ele,url,data_string, otherTarget, async) {
    ele=jq1112( ele );
    if (otherTarget!="") {
        otherTarget=jq1112(otherTarget);
    }
    if (ele.length>0) {
        if (typeof ele.val() != typeof undefined) {
            if (data_string != "") {
                data_string = data_string + "&this_value=" + ele.val();
            } else {
                data_string = "?this_value=" + ele.val();
            }
        }
        RequestHelper.post(url, data_string, function (response) {
            if (otherTarget=="") {
                ele.replaceWith( response );
            } else {
                otherTarget.replaceWith( response );
            }
        }, true, async);
    }
}
                                                 
                  
function getFloatWidth(ele) {
    //return parseInt(window.getComputedStyle(ele).width.split("px").join(""));
    return parseInt(ele.outerWidth());
}             
   
function getFloatHeight(ele) {
    //return parseInt(window.getComputedStyle(ele).height.split("px").join(""));
    return parseInt(ele.outerHeight());
}    

function froze_head_reset() {
    //jq1112( document ).unbind("my")
    jq1112(".table-jsfixed-clone").remove();
    var z=0;
    jq1112(".table-jsfixed").each(function() {
        var doc=jq1112(this).attr("data-jsfixed-target");
        var doc2=doc;
        if (typeof doc != typeof undefined && doc!=null && doc && doc!="") {
        } else {
            doc=document;
            doc2="document";
        }
        
        var main_table=jq1112(this);
        
        var thz=0;
        main_table.find("tr").eq(0).find("th").each(function() {
            main_table.find("tr").eq(0).find("th").eq(thz).css("width","");
            thz++;
        }); 
        main_table.css("width","");
        
        jq1112( document ).unbind("scroll.froze_head"+doc2);
        jq1112( doc ).unbind("scroll.froze_head"+doc2);
        z++;
    });
}

function froze_head(tag) {
    if (crm_version>61) {} else { return; }
    froze_head_reset();
    
    //console.log("froze_head");
    if (typeof tag != typeof undefined && tag!="") {} else {
        tag=".table-jsfixed";
    }

    var z=0;
    jq1112(tag).each(function() {
     
        var a2=0;
        var l2=0;
        var scroll=0;
        
        var main_table=jq1112(this);
        
        var doc=main_table.attr("data-jsfixed-target");
        var doc2=doc;
        if (typeof doc != typeof undefined && doc!=null && doc && doc!="") {
        } else {
            doc=document;
            doc2="document";
        }
        
        //jq1112(doc).scrollTop( 0 );
  
        var head_table=main_table.clone(true);
        head_table.removeClass("table-jsfixed").addClass("table-jsfixed-clone");
        head_table.html("");

        var firstTR = main_table.find("tr").eq(0);
        if (jq1112(firstTR).hasClass("heading")) {
            firstTR = main_table.find("tr").eq(1);
        }
        head_table.append(firstTR.clone(true));
        //head_table.find("tr").eq(0).find("th").each(function() {
          //  jq1112(this).html("<div style='display:block;'>"+jq1112(this).html()+"</div>");
        //});
        
      
        head_table.insertBefore(main_table);
        head_table.wrap("<div style='position:fixed; width:100%; z-index:1; overflow-x:hidden;'></div>");
        var head=head_table.parent();
        head.addClass("table-jsfixed-clone");
        
        

        
        var thz=0;
        firstTR.find("th").each(function() {
            //main_table_tr0.find("th").eq(thz).css("width",w);
            head_table.find("tr").eq(0).find("th").eq(thz).css("width",jq1112(this).outerWidth());
            thz++;
        }); 
       

        head_table.css({"width":getFloatWidth(main_table),"height":getFloatHeight(head_table),"position":"relative"});
        main_table.css("width",getFloatWidth(main_table));
        head.css({"height":getFloatHeight(head_table),"display":"none"});
        
       
        var a=main_table.offset().top+jq1112(doc).scrollTop();
        var l=main_table.offset().left+jq1112(doc).scrollLeft();


        if (jq1112(doc).hasVerticalScrollBar()) {
            head.css("width",(jq1112(doc).width()-scrollbarWidth()));
        } else {
            head.css("width",jq1112(doc).width());
        }

        jq1112(doc).unbind("scoll.froze_head"+doc2).bind("scroll.froze_head"+doc2, { main_table: main_table,head_table:head_table,a:a,l:l,head:head  },function(event) {
            var scroll=jq1112(this).scrollTop();
            var scroll2=jq1112(this).scrollLeft();

            var main_table=event.data.main_table;
            var head_table=event.data.head_table;
            var head=event.data.head;
            var a2=event.data.a;
            var l2=event.data.l;

            var a=main_table.offset().top;
            var l=main_table.offset().left;




            var abfang_top=0;
            var abfang_left=0;
            var doc_ask=0;

            if (doc!=document) {

                doc_ask=jq1112(this).offset().top;
                abfang_top=jq1112(document).scrollTop();
                abfang_left=jq1112(document).scrollLeft();
            }

           //console.log("a"+a+" scroll:"+scroll+" a2:"+a2+" doc_ask:"+doc_ask+" height"+(doc_ask-scroll)+" "+(((-1*a)-scroll)<=getFloatHeight(main_table)-40)+" "+((-1*a)-scroll)+" "+(getFloatHeight(main_table)-40)+" ");

           //console.log((main_table.offset().top-scroll)+" <= "+doc_ask);

            if ((main_table.offset().top-scroll)<doc_ask && (scroll-(a2-doc_ask))<(getFloatHeight(main_table)-40)) {
                head.css({"top":(doc_ask-abfang_top),left:((l2-(scroll2+(l-l2)))-abfang_left),"z-index":"1","display":"block","position":"fixed"});
                head_table.css({left:(l-l2)});
            } else {
                head.css({"top":doc_ask,left:l,"z-index":"1","display":"none","position":"fixed"});
            }

        });

        if (doc!=document) {
            jq1112( document ).unbind("scroll.froze_head"+doc2).bind("scroll.froze_head"+doc2,function() {    	
                jq1112(doc).triggerHandler("scroll.froze_head"+doc2);
            });
        }
        jq1112(document).triggerHandler("scroll.froze_head"+doc2);
        jq1112(document).unbind("froze_head").bind('froze_head',function() {
           froze_head(); 
        });
    });
    
}



function froze_left() {
    if (crm_version>62) {} else { return; }
    
    jq1112(".table-jsfixed-left").each(function() {
        
        var main_table=jq1112(this);
        var main_table_scroll=main_table.parent();
        
        
        if (jq1112(this).hasClass("table-jsfixed-left-done")) {
            main_table_scroll.parent().find(".table-jsfixed-left-clone").remove();
            main_table.removeClass("table-jsfixed-left-done");
            main_table_scroll.unwrap();
            main_table_scroll.css({"z-index":"","position":""});
        }
        
        
        main_table.addClass("table-jsfixed-left-done");
        
        var head_table=jq1112("<table></table>");
        var attributes = main_table.prop("attributes");
        jq1112.each(attributes, function() {
            head_table.attr(this.name, this.value);
        });
        head_table.removeClass("table-scroll").addClass("table-nohover").removeAttr("id").addClass("table-width-auto").removeClass("table-jsfixed-left-done");
        
 
        main_table_scroll.css({"z-index":"0","position":"relative"});
        main_table_scroll.wrap("<div style='position:relative;'></div>");
        
        jq1112("> tbody > tr > th:first-child,> tbody > tr > td:first-child", this).each(function() {
            var td=jq1112(this).clone();
            var tr=jq1112("<tr></tr>");
            
            var attributes = jq1112(this).parent().prop("attributes");
            jq1112.each(attributes, function() {
                tr.attr(this.name, this.value);
            });
            
            td.css("width",jq1112(this).outerWidth());
            td.css("height",jq1112(this).outerHeight());
            tr.append(td);
            head_table.append(tr);
        });
        head_table.insertAfter(main_table_scroll);
        head_table.wrap("<div class='table-jsfixed-left-clone' style='position:absolute; width:auto; z-index:1; top:0px; left:0px;'></div>");
        
        main_table.parent().sizeChanged(function(){ 
            if (typeof froze_left == "function" && jq1112(".table-jsfixed-left").length>0) {
                froze_left();
            }
        });
    });
}


/*
function objReplaceScroll(ele,url,data_string, otherTarget, eventName) {
    jq1112( document ).unbind("scroll."+eventName).bind("scroll."+eventName,{ele:ele,url:url,data_string:data_string,otherTarget:otherTarget,eventName:eventName},function(event) { 
        var ele=event.data.ele;
        var url=event.data.url;
        var data_string=event.data.data_string;
        var otherTarget=event.data.otherTarget;
        var eventName=event.data.eventName;
        
        ele=jq1112( ele );
        if (otherTarget!="") {
            otherTarget=jq1112(otherTarget);
        }
        if (ele.length>0) {
            if ((jq1112(window).outerHeight()+jq1112(document).scrollTop()+200) > ele.offset().top) {
                ele.removeClass("scrollLoad");
                P4nBoxHelper.startloading();
                RequestHelper.post(url, data_string, function (response) {
                    if (otherTarget=="") {
                        ele.replaceWith( response );
                    } else {
                        otherTarget.replaceWith( response );
                    }
                    ele.remove();
                    P4nBoxHelper.stoploading();
                });
            }
        }
    });
    jq1112(document).triggerHandler("scroll."+eventName);
}
*/

function objReplaceScroll() {
    jq1112(".objReplaceScroll").each(function() {
        var ele=jq1112(this);
        if ((jq1112(window).outerHeight()+jq1112(document).scrollTop()+200) > jq1112(this).offset().top) {
            ele.removeClass("objReplaceScroll");
            P4nBoxHelper.startloading();
            RequestHelper.post(ele.attr("data-url"),ele.attr("data-href"), function (response) {
                //var html=jq1112(response);
                
                var otherTarget=ele.attr("data-other-target");
                if (typeof otherTarget != typeof undefined && otherTarget!="") {
                    ele=jq1112(otherTarget);
                }
                
                ele.replaceWith(response);
                ele.remove();
                P4nBoxHelper.stoploading();
            }, true, ele.attr("data-async"));
        }
    });
}

 /*jq1112(".moderntable").each(function() {
       if ((jq1112(this).offset().top-jq1112(document).scrollTop()+getFloatHeight(jq1112(this)))<0) {
           jq1112(this).css("visibility","hidden");
       } else {
           jq1112(this).css("visibility","");
       }
    });*/

