
function wechsel_a(target, url) {
    content_geladen = false;
    content_ready = false;
    P4nBoxHelper.closeall();
    //P4nBoxHelper.startloading();


    if (wechsel_a.arguments.length == 1) {
        url = target;
        target = "main";
    }

    template_progressbar.start();
    RequestHelper.get(url, function (response) {
        jq1112("div[name='" + target + "']").css("opacity","0");
        setTimeout(function() {
            jq1112("div[name='" + target + "']").html(response);
            jq1112("div[name='" + target + "']").css("opacity","1");

            jq1112("div[name='" + target + "']").ready(function () {
            document_ready();
            window_load();
            template_progressbar.end();
        });
        },40);
    }, false, true,true);
}

function a_target() {
    jq1112("a").not(".wechsel_a").not(".template_link").not(".template_iconbutton").not(".template_button").not(".template_submit").each(function () {
        jq1112(this).addClass("wechsel_a");

        var url = jq1112(this).attr("href");
        if (typeof url != typeof undefined && (url.indexOf("mailto") != -1 || url.indexOf("javascript") != -1)) {
            return;
        }

        if (jq1112(this).attr("href") && jq1112(this).attr("href").charAt(0) != "#" && jq1112(this).attr("href") != "javascript:" && jq1112(this).attr("href") != "javascript:;" && jq1112(this).attr("href") != "javascript:void(0);" && jq1112(this).attr("href") != "") {

            var target = "main";
            if (typeof jq1112(this).attr("target") != typeof undefined && jq1112(this).attr("target") != "") {
                target = jq1112(this).attr("target");
                if (target == 'main') {
                    target = "main";
                }
                jq1112(this).attr("target", "");
            }

            var onclick_zusatz = "wechsel_a(\'" + target + "\',\'" + jq1112(this).attr("href") + "\');";
            var onclick = "";
            if (typeof jq1112(this).attr("onclick") != typeof undefined) {
                onclick = jq1112(this).attr("onclick");
            }
            if (onclick.length > 0 && onclick.substr(-1, 1) !== ';') {
                onclick += ';';
            }
            // delete old 'wechsel_a', if exists
            onclick = onclick.replace(/\wechsel_a.*?\;/, '');
            onclick = onclick + onclick_zusatz;

            jq1112(this).attr("href", "javascript:void(0);");
            jq1112(this).attr("onclick", onclick);
        }
    });
}


function form_target() {
    jq1112("input[type='submit']").not(".wechsel_form").not(".template_submit").each(function () {

        jq1112(this).addClass("wechsel_form");
        var form_ele = jq1112(this).closest("form");

        jq1112(this).click(function (e) {
            
            e.preventDefault();
            template_progressbar.start();

            var target = "main";
            if (typeof form_ele.attr("target") != typeof undefined && form_ele.attr("target") != "") {
                target = form_ele.attr("target");
                form_ele.attr("target", "");
            }

            var post = form_ele.serialize();
            post += "&" + jq1112(this).attr("name") + "=" + encodeURIComponent(jq1112(this).val()) + "&run_utf8_decode=1";

            var url = form_ele.attr("action");

            var variant = "GET";
            if (form_ele.attr("method") == "GET" || form_ele.attr("method") == "get") {


                if (url.match(/\?/)) {
                    url += "&" + post;
                } else {
                    url += "?" + post;
                }
                url = url.replace("&&", "&");

                RequestHelper.get(url, function (response) {
                    jq1112("div[name='" + target + "']").html(response);
                    jq1112("div[name='" + target + "']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                }, true, true,true); 
            } else {
                RequestHelper.post(url, post, function (response) {
                    jq1112("div[name='" + target + "']").html(response);
                    jq1112("div[name='" + target + "']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                }, true, true,false);
            }


            return;


        });
    })
}


var ps_leftside_nav;
var ps_schnelluebersicht_nav;

function scrollbars() {
    if ($(".sidenav-main .sidenav").length > 0) {
        if (!$(".sidenav-main .sidenav").hasClass("native-scroll")) {
            ps_leftside_nav = new PerfectScrollbar(".sidenav-main .sidenav", {
                wheelSpeed: 2,
                wheelPropagation: false,
                minScrollbarLength: 20
            });
        }
    }


    $(".sidenav-main .navbar-toggler").unbind("click").bind("click", function () {
        if ($("body").hasClass("sidenav-main-locked")) {
            $(".sidenav-main").addClass("nav-collapsed");
            $(".sidenav-main").removeClass("nav-lock");
            $("body").removeClass("sidenav-main-locked");
            $(this).find("i").text("radio_button_unchecked");
        } else {
            $(".sidenav-main").removeClass("nav-collapsed");
            $(".sidenav-main").addClass("nav-lock");
            $("body").addClass("sidenav-main-locked");
            $(this).find("i").text("radio_button_checked");
        }
        setTimeout(function () {
            $(window).trigger('resize');
        }, 400);
    });

    $(".sidenav-main, .sidenav-main .brand-sidebar").mouseenter(function () {
        if (!$(".sidenav-main").hasClass("nav-lock")) {
            $(".sidenav-main")
                .addClass("nav-expanded")
                .removeClass("nav-collapsed");
        }
    });

    $(".sidenav-main, .sidenav-main .brand-sidebar").mouseleave(function () {
        if (!$(".sidenav-main").hasClass("nav-lock")) {
            $(".sidenav-main")
                .addClass("nav-collapsed")
                .removeClass("nav-expanded");
        }
    });


    $(".collapsible-header").unbind("click").bind("click", function () {

        var li = $(this).parent();

        if (!li.hasClass("active")) {
            //open

            $(".sidenav-main .sidenav > li.active").each(function () {
                $(this).find("> .collapsible-header").trigger("click");
            });


            li.addClass("active");
            li.addClass("open");
            var body = li.find("> .collapsible-body");
            body.css("display", "block");
            var toH = body.height();
            body.css("height", "0px");
            body.animate({
                height: toH
            }, 300, function () {
                $(this).height('auto');
         
                ps_leftside_nav.update();
            });
        } else {
            //close
            li.removeClass("active");

            var body = li.find("> .collapsible-body");
            body.animate({
                height: "0px"
            }, 300, function () {
                $(this).height('auto');
                $(this).css("display", "");
          
                ps_leftside_nav.update();
            });
        }

    });


    $("#mobile_search_icon").unbind("click").bind("click", function () {
        $("#menu_suche").css("display", "block");
        $("#menu_suche input[type=text]").focus();
    });
    $("#mobile_search_icon_close").unbind("click").bind("click", function () {
        $("#menu_suche").css("display", "none");
    });


    $("#schnellsuche-trigger").unbind("click").bind("click", function () {
    

        var that = $(".sidenav-right");
        var overlay = $(".sidenav-overlay");
        if (that.hasClass("sichtbar")) {
            that.removeClass("sichtbar");
            that.css("transform", "");

            overlay.css("display", "block");
            overlay.animate({
                opacity: 0
            }, 150, function () {
                overlay.css("display", "none");
      
            });


            $("html", topmain.document).unbind('click.sidenavrighthelperoutside');
        } else {
            that.addClass("sichtbar");
            that.css("transform", "translateX(0)");

            overlay.css("display", "block");
            overlay.animate({
                opacity: 1
            }, 150, function () {
         
            });


            $("html", topmain.document).bind('click.sidenavrighthelperoutside', function (e) {
                if (
                    ($(e.target).closest(".sidenav-right").length === 0) &&
                    ($(e.target).closest("div[name=menu]").length === 0)
                ) {
                    $("#schnellsuche-trigger").trigger("click");
                }
            });
        }
    });

    $(".sidenav-trigger").unbind("click").bind("click", function () {
   

        var that = $(".sidenav-main .sidenav");
        var overlay = $(".sidenav-overlay");
        if (that.hasClass("sichtbar")) {
            that.removeClass("sichtbar");
            that.css("transform", "");

            overlay.css("display", "block");
            overlay.animate({
                opacity: 0
            }, 150, function () {
                overlay.css("display", "none");
       
            });


            $("html", topmain.document).unbind('click.sidenavhelperoutside');
        } else {
            that.addClass("sichtbar");
            that.css("transform", "translateX(0)");

            overlay.css("display", "block");
            overlay.animate({
                opacity: 1
            }, 150, function () {
       
            });


            $("html", topmain.document).bind('click.sidenavhelperoutside', function (e) {
                if (
                    ($(e.target).closest(".sidenav-main").length === 0) &&
                    ($(e.target).closest("div[name=menu]").length === 0)
                ) {
                    $(".sidenav-trigger").trigger("click");
                }
            });
        }
    });


    /*schnelluebersicht*/
    if ($(".sidenav-right #infopanel_inner").length > 0) {
        if (!$(".sidenav-right #infopanel_inner").hasClass("native-scroll")) {
            ps_schnelluebersicht_nav = new PerfectScrollbar(".sidenav-right #infopanel_inner", {
                wheelSpeed: 2,
                wheelPropagation: false,
                minScrollbarLength: 20
            });
        }
    }
}


jq1112(window).resize(function () {
    $("#overDiv").css("left", "0px");
});



function runFunctionsByDataTag(dataTag, removeTagAfterProceeding=true)
{
    $("*["+dataTag+"]").each(function() {    
        var func,res,attr;
        var that=$(this);
        attr=$(this).attr(dataTag);
        if (attr!="") {
            res=attr.split(",");
            for (var i=0; i<res.length;i++) {
                var func=eval(res[i]);
                if (typeof func == "function") {
                    func(that);
                }
            }
        }
        if (removeTagAfterProceeding)
        {
            $(this).removeAttr(dataTag);
        }
    });
}
/*!
 * perfect-scrollbar v1.5.0
 * Copyright 2020 Hyunje Jun, MDBootstrap and Contributors
 * Licensed under MIT
 */

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = global || self, global.PerfectScrollbar = factory());
}(this, (function () { 'use strict';

  function get(element) {
    return getComputedStyle(element);
  }

  function set(element, obj) {
    for (var key in obj) {
      var val = obj[key];
      if (typeof val === 'number') {
        val = val + "px";
      }
      element.style[key] = val;
    }
    return element;
  }

  function div(className) {
    var div = document.createElement('div');
    div.className = className;
    return div;
  }

  var elMatches =
    typeof Element !== 'undefined' &&
    (Element.prototype.matches ||
      Element.prototype.webkitMatchesSelector ||
      Element.prototype.mozMatchesSelector ||
      Element.prototype.msMatchesSelector);

  function matches(element, query) {
    if (!elMatches) {
      throw new Error('No element matching method supported');
    }

    return elMatches.call(element, query);
  }

  function remove(element) {
    if (element.remove) {
      element.remove();
    } else {
      if (element.parentNode) {
        element.parentNode.removeChild(element);
      }
    }
  }

  function queryChildren(element, selector) {
    return Array.prototype.filter.call(element.children, function (child) { return matches(child, selector); }
    );
  }

  var cls = {
    main: 'ps',
    rtl: 'ps__rtl',
    element: {
      thumb: function (x) { return ("ps__thumb-" + x); },
      rail: function (x) { return ("ps__rail-" + x); },
      consuming: 'ps__child--consume',
    },
    state: {
      focus: 'ps--focus',
      clicking: 'ps--clicking',
      active: function (x) { return ("ps--active-" + x); },
      scrolling: function (x) { return ("ps--scrolling-" + x); },
    },
  };

  /*
   * Helper methods
   */
  var scrollingClassTimeout = { x: null, y: null };

  function addScrollingClass(i, x) {
    var classList = i.element.classList;
    var className = cls.state.scrolling(x);

    if (classList.contains(className)) {
      clearTimeout(scrollingClassTimeout[x]);
    } else {
      classList.add(className);
    }
  }

  function removeScrollingClass(i, x) {
    scrollingClassTimeout[x] = setTimeout(
      function () { return i.isAlive && i.element.classList.remove(cls.state.scrolling(x)); },
      i.settings.scrollingThreshold
    );
  }

  function setScrollingClassInstantly(i, x) {
    addScrollingClass(i, x);
    removeScrollingClass(i, x);
  }

  var EventElement = function EventElement(element) {
    this.element = element;
    this.handlers = {};
  };

  var prototypeAccessors = { isEmpty: { configurable: true } };

  EventElement.prototype.bind = function bind (eventName, handler) {
    if (typeof this.handlers[eventName] === 'undefined') {
      this.handlers[eventName] = [];
    }
    this.handlers[eventName].push(handler);
    this.element.addEventListener(eventName, handler, false);
  };

  EventElement.prototype.unbind = function unbind (eventName, target) {
      var this$1 = this;

    this.handlers[eventName] = this.handlers[eventName].filter(function (handler) {
      if (target && handler !== target) {
        return true;
      }
      this$1.element.removeEventListener(eventName, handler, false);
      return false;
    });
  };

  EventElement.prototype.unbindAll = function unbindAll () {
    for (var name in this.handlers) {
      this.unbind(name);
    }
  };

  prototypeAccessors.isEmpty.get = function () {
      var this$1 = this;

    return Object.keys(this.handlers).every(
      function (key) { return this$1.handlers[key].length === 0; }
    );
  };

  Object.defineProperties( EventElement.prototype, prototypeAccessors );

  var EventManager = function EventManager() {
    this.eventElements = [];
  };

  EventManager.prototype.eventElement = function eventElement (element) {
    var ee = this.eventElements.filter(function (ee) { return ee.element === element; })[0];
    if (!ee) {
      ee = new EventElement(element);
      this.eventElements.push(ee);
    }
    return ee;
  };

  EventManager.prototype.bind = function bind (element, eventName, handler) {
    this.eventElement(element).bind(eventName, handler);
  };

  EventManager.prototype.unbind = function unbind (element, eventName, handler) {
    var ee = this.eventElement(element);
    ee.unbind(eventName, handler);

    if (ee.isEmpty) {
      // remove
      this.eventElements.splice(this.eventElements.indexOf(ee), 1);
    }
  };

  EventManager.prototype.unbindAll = function unbindAll () {
    this.eventElements.forEach(function (e) { return e.unbindAll(); });
    this.eventElements = [];
  };

  EventManager.prototype.once = function once (element, eventName, handler) {
    var ee = this.eventElement(element);
    var onceHandler = function (evt) {
      ee.unbind(eventName, onceHandler);
      handler(evt);
    };
    ee.bind(eventName, onceHandler);
  };

  function createEvent(name) {
    if (typeof window.CustomEvent === 'function') {
      return new CustomEvent(name);
    } else {
      var evt = document.createEvent('CustomEvent');
      evt.initCustomEvent(name, false, false, undefined);
      return evt;
    }
  }

  function processScrollDiff(
    i,
    axis,
    diff,
    useScrollingClass,
    forceFireReachEvent
  ) {
    if ( useScrollingClass === void 0 ) useScrollingClass = true;
    if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

    var fields;
    if (axis === 'top') {
      fields = [
        'contentHeight',
        'containerHeight',
        'scrollTop',
        'y',
        'up',
        'down' ];
    } else if (axis === 'left') {
      fields = [
        'contentWidth',
        'containerWidth',
        'scrollLeft',
        'x',
        'left',
        'right' ];
    } else {
      throw new Error('A proper axis should be provided');
    }

    processScrollDiff$1(i, diff, fields, useScrollingClass, forceFireReachEvent);
  }

  function processScrollDiff$1(
    i,
    diff,
    ref,
    useScrollingClass,
    forceFireReachEvent
  ) {
    var contentHeight = ref[0];
    var containerHeight = ref[1];
    var scrollTop = ref[2];
    var y = ref[3];
    var up = ref[4];
    var down = ref[5];
    if ( useScrollingClass === void 0 ) useScrollingClass = true;
    if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

    var element = i.element;

    // reset reach
    i.reach[y] = null;

    // 1 for subpixel rounding
    if (element[scrollTop] < 1) {
      i.reach[y] = 'start';
    }

    // 1 for subpixel rounding
    if (element[scrollTop] > i[contentHeight] - i[containerHeight] - 1) {
      i.reach[y] = 'end';
    }

    if (diff) {
      element.dispatchEvent(createEvent(("ps-scroll-" + y)));

      if (diff < 0) {
        element.dispatchEvent(createEvent(("ps-scroll-" + up)));
      } else if (diff > 0) {
        element.dispatchEvent(createEvent(("ps-scroll-" + down)));
      }

      if (useScrollingClass) {
        setScrollingClassInstantly(i, y);
      }
    }

    if (i.reach[y] && (diff || forceFireReachEvent)) {
      element.dispatchEvent(createEvent(("ps-" + y + "-reach-" + (i.reach[y]))));
    }
  }

  function toInt(x) {
    return parseInt(x, 10) || 0;
  }

  function isEditable(el) {
    return (
      matches(el, 'input,[contenteditable]') ||
      matches(el, 'select,[contenteditable]') ||
      matches(el, 'textarea,[contenteditable]') ||
      matches(el, 'button,[contenteditable]')
    );
  }

  function outerWidth(element) {
    var styles = get(element);
    return (
      toInt(styles.width) +
      toInt(styles.paddingLeft) +
      toInt(styles.paddingRight) +
      toInt(styles.borderLeftWidth) +
      toInt(styles.borderRightWidth)
    );
  }

  var env = {
    isWebKit:
      typeof document !== 'undefined' &&
      'WebkitAppearance' in document.documentElement.style,
    supportsTouch:
      typeof window !== 'undefined' &&
      ('ontouchstart' in window ||
        ('maxTouchPoints' in window.navigator &&
          window.navigator.maxTouchPoints > 0) ||
        (window.DocumentTouch && document instanceof window.DocumentTouch)),
    supportsIePointer:
      typeof navigator !== 'undefined' && navigator.msMaxTouchPoints,
    isChrome:
      typeof navigator !== 'undefined' &&
      /Chrome/i.test(navigator && navigator.userAgent),
  };

  function updateGeometry(i) {
    var element = i.element;
    var roundedScrollTop = Math.floor(element.scrollTop);
    var rect = element.getBoundingClientRect();

    i.containerWidth = Math.ceil(rect.width);
    i.containerHeight = Math.ceil(rect.height);
    i.contentWidth = element.scrollWidth;
    i.contentHeight = element.scrollHeight;

    if (!element.contains(i.scrollbarXRail)) {
      // clean up and append
      queryChildren(element, cls.element.rail('x')).forEach(function (el) { return remove(el); }
      );
      element.appendChild(i.scrollbarXRail);
    }
    if (!element.contains(i.scrollbarYRail)) {
      // clean up and append
      queryChildren(element, cls.element.rail('y')).forEach(function (el) { return remove(el); }
      );
      element.appendChild(i.scrollbarYRail);
    }

    if (
      !i.settings.suppressScrollX &&
      i.containerWidth + i.settings.scrollXMarginOffset < i.contentWidth
    ) {
      i.scrollbarXActive = true;
      i.railXWidth = i.containerWidth - i.railXMarginWidth;
      i.railXRatio = i.containerWidth / i.railXWidth;
      i.scrollbarXWidth = getThumbSize(
        i,
        toInt((i.railXWidth * i.containerWidth) / i.contentWidth)
      );
      i.scrollbarXLeft = toInt(
        ((i.negativeScrollAdjustment + element.scrollLeft) *
          (i.railXWidth - i.scrollbarXWidth)) /
          (i.contentWidth - i.containerWidth)
      );
    } else {
      i.scrollbarXActive = false;
    }

    if (
      !i.settings.suppressScrollY &&
      i.containerHeight + i.settings.scrollYMarginOffset < i.contentHeight
    ) {
      i.scrollbarYActive = true;
      i.railYHeight = i.containerHeight - i.railYMarginHeight;
      i.railYRatio = i.containerHeight / i.railYHeight;
      i.scrollbarYHeight = getThumbSize(
        i,
        toInt((i.railYHeight * i.containerHeight) / i.contentHeight)
      );
      i.scrollbarYTop = toInt(
        (roundedScrollTop * (i.railYHeight - i.scrollbarYHeight)) /
          (i.contentHeight - i.containerHeight)
      );
    } else {
      i.scrollbarYActive = false;
    }

    if (i.scrollbarXLeft >= i.railXWidth - i.scrollbarXWidth) {
      i.scrollbarXLeft = i.railXWidth - i.scrollbarXWidth;
    }
    if (i.scrollbarYTop >= i.railYHeight - i.scrollbarYHeight) {
      i.scrollbarYTop = i.railYHeight - i.scrollbarYHeight;
    }

    updateCss(element, i);

    if (i.scrollbarXActive) {
      element.classList.add(cls.state.active('x'));
    } else {
      element.classList.remove(cls.state.active('x'));
      i.scrollbarXWidth = 0;
      i.scrollbarXLeft = 0;
      element.scrollLeft = i.isRtl === true ? i.contentWidth : 0;
    }
    if (i.scrollbarYActive) {
      element.classList.add(cls.state.active('y'));
    } else {
      element.classList.remove(cls.state.active('y'));
      i.scrollbarYHeight = 0;
      i.scrollbarYTop = 0;
      element.scrollTop = 0;
    }
  }

  function getThumbSize(i, thumbSize) {
    if (i.settings.minScrollbarLength) {
      thumbSize = Math.max(thumbSize, i.settings.minScrollbarLength);
    }
    if (i.settings.maxScrollbarLength) {
      thumbSize = Math.min(thumbSize, i.settings.maxScrollbarLength);
    }
    return thumbSize;
  }

  function updateCss(element, i) {
    var xRailOffset = { width: i.railXWidth };
    var roundedScrollTop = Math.floor(element.scrollTop);

    if (i.isRtl) {
      xRailOffset.left =
        i.negativeScrollAdjustment +
        element.scrollLeft +
        i.containerWidth -
        i.contentWidth;
    } else {
      xRailOffset.left = element.scrollLeft;
    }
    if (i.isScrollbarXUsingBottom) {
      xRailOffset.bottom = i.scrollbarXBottom - roundedScrollTop;
    } else {
      xRailOffset.top = i.scrollbarXTop + roundedScrollTop;
    }
    set(i.scrollbarXRail, xRailOffset);

    var yRailOffset = { top: roundedScrollTop, height: i.railYHeight };
    if (i.isScrollbarYUsingRight) {
      if (i.isRtl) {
        yRailOffset.right =
          i.contentWidth -
          (i.negativeScrollAdjustment + element.scrollLeft) -
          i.scrollbarYRight -
          i.scrollbarYOuterWidth -
          9;
      } else {
        yRailOffset.right = i.scrollbarYRight - element.scrollLeft;
      }
    } else {
      if (i.isRtl) {
        yRailOffset.left =
          i.negativeScrollAdjustment +
          element.scrollLeft +
          i.containerWidth * 2 -
          i.contentWidth -
          i.scrollbarYLeft -
          i.scrollbarYOuterWidth;
      } else {
        yRailOffset.left = i.scrollbarYLeft + element.scrollLeft;
      }
    }
    set(i.scrollbarYRail, yRailOffset);

    set(i.scrollbarX, {
      left: i.scrollbarXLeft,
      width: i.scrollbarXWidth - i.railBorderXWidth,
    });
    set(i.scrollbarY, {
      top: i.scrollbarYTop,
      height: i.scrollbarYHeight - i.railBorderYWidth,
    });
  }

  function clickRail(i) {
    var element = i.element;

    i.event.bind(i.scrollbarY, 'mousedown', function (e) { return e.stopPropagation(); });
    i.event.bind(i.scrollbarYRail, 'mousedown', function (e) {
      var positionTop =
        e.pageY -
        window.pageYOffset -
        i.scrollbarYRail.getBoundingClientRect().top;
      var direction = positionTop > i.scrollbarYTop ? 1 : -1;

      i.element.scrollTop += direction * i.containerHeight;
      updateGeometry(i);

      e.stopPropagation();
    });

    i.event.bind(i.scrollbarX, 'mousedown', function (e) { return e.stopPropagation(); });
    i.event.bind(i.scrollbarXRail, 'mousedown', function (e) {
      var positionLeft =
        e.pageX -
        window.pageXOffset -
        i.scrollbarXRail.getBoundingClientRect().left;
      var direction = positionLeft > i.scrollbarXLeft ? 1 : -1;

      i.element.scrollLeft += direction * i.containerWidth;
      updateGeometry(i);

      e.stopPropagation();
    });
  }

  function dragThumb(i) {
    bindMouseScrollHandler(i, [
      'containerWidth',
      'contentWidth',
      'pageX',
      'railXWidth',
      'scrollbarX',
      'scrollbarXWidth',
      'scrollLeft',
      'x',
      'scrollbarXRail' ]);
    bindMouseScrollHandler(i, [
      'containerHeight',
      'contentHeight',
      'pageY',
      'railYHeight',
      'scrollbarY',
      'scrollbarYHeight',
      'scrollTop',
      'y',
      'scrollbarYRail' ]);
  }

  function bindMouseScrollHandler(
    i,
    ref
  ) {
    var containerHeight = ref[0];
    var contentHeight = ref[1];
    var pageY = ref[2];
    var railYHeight = ref[3];
    var scrollbarY = ref[4];
    var scrollbarYHeight = ref[5];
    var scrollTop = ref[6];
    var y = ref[7];
    var scrollbarYRail = ref[8];

    var element = i.element;

    var startingScrollTop = null;
    var startingMousePageY = null;
    var scrollBy = null;

    function mouseMoveHandler(e) {
      if (e.touches && e.touches[0]) {
        e[pageY] = e.touches[0].pageY;
      }
      element[scrollTop] =
        startingScrollTop + scrollBy * (e[pageY] - startingMousePageY);
      addScrollingClass(i, y);
      updateGeometry(i);

      e.stopPropagation();
      e.preventDefault();
    }

    function mouseUpHandler() {
      removeScrollingClass(i, y);
      i[scrollbarYRail].classList.remove(cls.state.clicking);
      i.event.unbind(i.ownerDocument, 'mousemove', mouseMoveHandler);
    }

    function bindMoves(e, touchMode) {
      startingScrollTop = element[scrollTop];
      if (touchMode && e.touches) {
        e[pageY] = e.touches[0].pageY;
      }
      startingMousePageY = e[pageY];
      scrollBy =
        (i[contentHeight] - i[containerHeight]) /
        (i[railYHeight] - i[scrollbarYHeight]);
      if (!touchMode) {
        i.event.bind(i.ownerDocument, 'mousemove', mouseMoveHandler);
        i.event.once(i.ownerDocument, 'mouseup', mouseUpHandler);
        e.preventDefault();
      } else {
        i.event.bind(i.ownerDocument, 'touchmove', mouseMoveHandler);
      }

      i[scrollbarYRail].classList.add(cls.state.clicking);

      e.stopPropagation();
    }

    i.event.bind(i[scrollbarY], 'mousedown', function (e) {
      bindMoves(e);
    });
    i.event.bind(i[scrollbarY], 'touchstart', function (e) {
      bindMoves(e, true);
    });
  }

  function keyboard(i) {
    var element = i.element;

    var elementHovered = function () { return matches(element, ':hover'); };
    var scrollbarFocused = function () { return matches(i.scrollbarX, ':focus') || matches(i.scrollbarY, ':focus'); };

    function shouldPreventDefault(deltaX, deltaY) {
      var scrollTop = Math.floor(element.scrollTop);
      if (deltaX === 0) {
        if (!i.scrollbarYActive) {
          return false;
        }
        if (
          (scrollTop === 0 && deltaY > 0) ||
          (scrollTop >= i.contentHeight - i.containerHeight && deltaY < 0)
        ) {
          return !i.settings.wheelPropagation;
        }
      }

      var scrollLeft = element.scrollLeft;
      if (deltaY === 0) {
        if (!i.scrollbarXActive) {
          return false;
        }
        if (
          (scrollLeft === 0 && deltaX < 0) ||
          (scrollLeft >= i.contentWidth - i.containerWidth && deltaX > 0)
        ) {
          return !i.settings.wheelPropagation;
        }
      }
      return true;
    }

    i.event.bind(i.ownerDocument, 'keydown', function (e) {
      if (
        (e.isDefaultPrevented && e.isDefaultPrevented()) ||
        e.defaultPrevented
      ) {
        return;
      }

      if (!elementHovered() && !scrollbarFocused()) {
        return;
      }

      var activeElement = document.activeElement
        ? document.activeElement
        : i.ownerDocument.activeElement;
      if (activeElement) {
        if (activeElement.tagName === 'IFRAME') {
          activeElement = activeElement.contentDocument.activeElement;
        } else {
          // go deeper if element is a webcomponent
          while (activeElement.shadowRoot) {
            activeElement = activeElement.shadowRoot.activeElement;
          }
        }
        if (isEditable(activeElement)) {
          return;
        }
      }

      var deltaX = 0;
      var deltaY = 0;

      switch (e.which) {
        case 37: // left
          if (e.metaKey) {
            deltaX = -i.contentWidth;
          } else if (e.altKey) {
            deltaX = -i.containerWidth;
          } else {
            deltaX = -30;
          }
          break;
        case 38: // up
          if (e.metaKey) {
            deltaY = i.contentHeight;
          } else if (e.altKey) {
            deltaY = i.containerHeight;
          } else {
            deltaY = 30;
          }
          break;
        case 39: // right
          if (e.metaKey) {
            deltaX = i.contentWidth;
          } else if (e.altKey) {
            deltaX = i.containerWidth;
          } else {
            deltaX = 30;
          }
          break;
        case 40: // down
          if (e.metaKey) {
            deltaY = -i.contentHeight;
          } else if (e.altKey) {
            deltaY = -i.containerHeight;
          } else {
            deltaY = -30;
          }
          break;
        case 32: // space bar
          if (e.shiftKey) {
            deltaY = i.containerHeight;
          } else {
            deltaY = -i.containerHeight;
          }
          break;
        case 33: // page up
          deltaY = i.containerHeight;
          break;
        case 34: // page down
          deltaY = -i.containerHeight;
          break;
        case 36: // home
          deltaY = i.contentHeight;
          break;
        case 35: // end
          deltaY = -i.contentHeight;
          break;
        default:
          return;
      }

      if (i.settings.suppressScrollX && deltaX !== 0) {
        return;
      }
      if (i.settings.suppressScrollY && deltaY !== 0) {
        return;
      }

      element.scrollTop -= deltaY;
      element.scrollLeft += deltaX;
      updateGeometry(i);

      if (shouldPreventDefault(deltaX, deltaY)) {
        e.preventDefault();
      }
    });
  }

  function wheel(i) {
    var element = i.element;

    function shouldPreventDefault(deltaX, deltaY) {
      var roundedScrollTop = Math.floor(element.scrollTop);
      var isTop = element.scrollTop === 0;
      var isBottom =
        roundedScrollTop + element.offsetHeight === element.scrollHeight;
      var isLeft = element.scrollLeft === 0;
      var isRight =
        element.scrollLeft + element.offsetWidth === element.scrollWidth;

      var hitsBound;

      // pick axis with primary direction
      if (Math.abs(deltaY) > Math.abs(deltaX)) {
        hitsBound = isTop || isBottom;
      } else {
        hitsBound = isLeft || isRight;
      }

      return hitsBound ? !i.settings.wheelPropagation : true;
    }

    function getDeltaFromEvent(e) {
      var deltaX = e.deltaX;
      var deltaY = -1 * e.deltaY;

      if (typeof deltaX === 'undefined' || typeof deltaY === 'undefined') {
        // OS X Safari
        deltaX = (-1 * e.wheelDeltaX) / 6;
        deltaY = e.wheelDeltaY / 6;
      }

      if (e.deltaMode && e.deltaMode === 1) {
        // Firefox in deltaMode 1: Line scrolling
        deltaX *= 10;
        deltaY *= 10;
      }

      if (deltaX !== deltaX && deltaY !== deltaY /* NaN checks */) {
        // IE in some mouse drivers
        deltaX = 0;
        deltaY = e.wheelDelta;
      }

      if (e.shiftKey) {
        // reverse axis with shift key
        return [-deltaY, -deltaX];
      }
      return [deltaX, deltaY];
    }

    function shouldBeConsumedByChild(target, deltaX, deltaY) {
      // FIXME: this is a workaround for <select> issue in FF and IE #571
      if (!env.isWebKit && element.querySelector('select:focus')) {
        return true;
      }

      if (!element.contains(target)) {
        return false;
      }

      var cursor = target;

      while (cursor && cursor !== element) {
        if (cursor.classList.contains(cls.element.consuming)) {
          return true;
        }

        var style = get(cursor);

        // if deltaY && vertical scrollable
        if (deltaY && style.overflowY.match(/(scroll|auto)/)) {
          var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
          if (maxScrollTop > 0) {
            if (
              (cursor.scrollTop > 0 && deltaY < 0) ||
              (cursor.scrollTop < maxScrollTop && deltaY > 0)
            ) {
              return true;
            }
          }
        }
        // if deltaX && horizontal scrollable
        if (deltaX && style.overflowX.match(/(scroll|auto)/)) {
          var maxScrollLeft = cursor.scrollWidth - cursor.clientWidth;
          if (maxScrollLeft > 0) {
            if (
              (cursor.scrollLeft > 0 && deltaX < 0) ||
              (cursor.scrollLeft < maxScrollLeft && deltaX > 0)
            ) {
              return true;
            }
          }
        }

        cursor = cursor.parentNode;
      }

      return false;
    }

    function mousewheelHandler(e) {
      var ref = getDeltaFromEvent(e);
      var deltaX = ref[0];
      var deltaY = ref[1];

      if (shouldBeConsumedByChild(e.target, deltaX, deltaY)) {
        return;
      }

      var shouldPrevent = false;
      if (!i.settings.useBothWheelAxes) {
        // deltaX will only be used for horizontal scrolling and deltaY will
        // only be used for vertical scrolling - this is the default
        element.scrollTop -= deltaY * i.settings.wheelSpeed;
        element.scrollLeft += deltaX * i.settings.wheelSpeed;
      } else if (i.scrollbarYActive && !i.scrollbarXActive) {
        // only vertical scrollbar is active and useBothWheelAxes option is
        // active, so let's scroll vertical bar using both mouse wheel axes
        if (deltaY) {
          element.scrollTop -= deltaY * i.settings.wheelSpeed;
        } else {
          element.scrollTop += deltaX * i.settings.wheelSpeed;
        }
        shouldPrevent = true;
      } else if (i.scrollbarXActive && !i.scrollbarYActive) {
        // useBothWheelAxes and only horizontal bar is active, so use both
        // wheel axes for horizontal bar
        if (deltaX) {
          element.scrollLeft += deltaX * i.settings.wheelSpeed;
        } else {
          element.scrollLeft -= deltaY * i.settings.wheelSpeed;
        }
        shouldPrevent = true;
      }

      updateGeometry(i);

      shouldPrevent = shouldPrevent || shouldPreventDefault(deltaX, deltaY);
      if (shouldPrevent && !e.ctrlKey) {
        e.stopPropagation();
        e.preventDefault();
      }
    }

    if (typeof window.onwheel !== 'undefined') {
      i.event.bind(element, 'wheel', mousewheelHandler);
    } else if (typeof window.onmousewheel !== 'undefined') {
      i.event.bind(element, 'mousewheel', mousewheelHandler);
    }
  }

  function touch(i) {
    if (!env.supportsTouch && !env.supportsIePointer) {
      return;
    }

    var element = i.element;

    function shouldPrevent(deltaX, deltaY) {
      var scrollTop = Math.floor(element.scrollTop);
      var scrollLeft = element.scrollLeft;
      var magnitudeX = Math.abs(deltaX);
      var magnitudeY = Math.abs(deltaY);

      if (magnitudeY > magnitudeX) {
        // user is perhaps trying to swipe up/down the page

        if (
          (deltaY < 0 && scrollTop === i.contentHeight - i.containerHeight) ||
          (deltaY > 0 && scrollTop === 0)
        ) {
          // set prevent for mobile Chrome refresh
          return window.scrollY === 0 && deltaY > 0 && env.isChrome;
        }
      } else if (magnitudeX > magnitudeY) {
        // user is perhaps trying to swipe left/right across the page

        if (
          (deltaX < 0 && scrollLeft === i.contentWidth - i.containerWidth) ||
          (deltaX > 0 && scrollLeft === 0)
        ) {
          return true;
        }
      }

      return true;
    }

    function applyTouchMove(differenceX, differenceY) {
      element.scrollTop -= differenceY;
      element.scrollLeft -= differenceX;

      updateGeometry(i);
    }

    var startOffset = {};
    var startTime = 0;
    var speed = {};
    var easingLoop = null;

    function getTouch(e) {
      if (e.targetTouches) {
        return e.targetTouches[0];
      } else {
        // Maybe IE pointer
        return e;
      }
    }

    function shouldHandle(e) {
      if (e.pointerType && e.pointerType === 'pen' && e.buttons === 0) {
        return false;
      }
      if (e.targetTouches && e.targetTouches.length === 1) {
        return true;
      }
      if (
        e.pointerType &&
        e.pointerType !== 'mouse' &&
        e.pointerType !== e.MSPOINTER_TYPE_MOUSE
      ) {
        return true;
      }
      return false;
    }

    function touchStart(e) {
      if (!shouldHandle(e)) {
        return;
      }

      var touch = getTouch(e);

      startOffset.pageX = touch.pageX;
      startOffset.pageY = touch.pageY;

      startTime = new Date().getTime();

      if (easingLoop !== null) {
        clearInterval(easingLoop);
      }
    }

    function shouldBeConsumedByChild(target, deltaX, deltaY) {
      if (!element.contains(target)) {
        return false;
      }

      var cursor = target;

      while (cursor && cursor !== element) {
        if (cursor.classList.contains(cls.element.consuming)) {
          return true;
        }

        var style = get(cursor);

        // if deltaY && vertical scrollable
        if (deltaY && style.overflowY.match(/(scroll|auto)/)) {
          var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
          if (maxScrollTop > 0) {
            if (
              (cursor.scrollTop > 0 && deltaY < 0) ||
              (cursor.scrollTop < maxScrollTop && deltaY > 0)
            ) {
              return true;
            }
          }
        }
        // if deltaX && horizontal scrollable
        if (deltaX && style.overflowX.match(/(scroll|auto)/)) {
          var maxScrollLeft = cursor.scrollWidth - cursor.clientWidth;
          if (maxScrollLeft > 0) {
            if (
              (cursor.scrollLeft > 0 && deltaX < 0) ||
              (cursor.scrollLeft < maxScrollLeft && deltaX > 0)
            ) {
              return true;
            }
          }
        }

        cursor = cursor.parentNode;
      }

      return false;
    }

    function touchMove(e) {
      if (shouldHandle(e)) {
        var touch = getTouch(e);

        var currentOffset = { pageX: touch.pageX, pageY: touch.pageY };

        var differenceX = currentOffset.pageX - startOffset.pageX;
        var differenceY = currentOffset.pageY - startOffset.pageY;

        if (shouldBeConsumedByChild(e.target, differenceX, differenceY)) {
          return;
        }

        applyTouchMove(differenceX, differenceY);
        startOffset = currentOffset;

        var currentTime = new Date().getTime();

        var timeGap = currentTime - startTime;
        if (timeGap > 0) {
          speed.x = differenceX / timeGap;
          speed.y = differenceY / timeGap;
          startTime = currentTime;
        }

        if (shouldPrevent(differenceX, differenceY)) {
          e.preventDefault();
        }
      }
    }
    function touchEnd() {
      if (i.settings.swipeEasing) {
        clearInterval(easingLoop);
        easingLoop = setInterval(function() {
          if (i.isInitialized) {
            clearInterval(easingLoop);
            return;
          }

          if (!speed.x && !speed.y) {
            clearInterval(easingLoop);
            return;
          }

          if (Math.abs(speed.x) < 0.01 && Math.abs(speed.y) < 0.01) {
            clearInterval(easingLoop);
            return;
          }

          applyTouchMove(speed.x * 30, speed.y * 30);

          speed.x *= 0.8;
          speed.y *= 0.8;
        }, 10);
      }
    }

    if (env.supportsTouch) {
      i.event.bind(element, 'touchstart', touchStart);
      i.event.bind(element, 'touchmove', touchMove);
      i.event.bind(element, 'touchend', touchEnd);
    } else if (env.supportsIePointer) {
      if (window.PointerEvent) {
        i.event.bind(element, 'pointerdown', touchStart);
        i.event.bind(element, 'pointermove', touchMove);
        i.event.bind(element, 'pointerup', touchEnd);
      } else if (window.MSPointerEvent) {
        i.event.bind(element, 'MSPointerDown', touchStart);
        i.event.bind(element, 'MSPointerMove', touchMove);
        i.event.bind(element, 'MSPointerUp', touchEnd);
      }
    }
  }

  var defaultSettings = function () { return ({
    handlers: ['click-rail', 'drag-thumb', 'keyboard', 'wheel', 'touch'],
    maxScrollbarLength: null,
    minScrollbarLength: null,
    scrollingThreshold: 1000,
    scrollXMarginOffset: 0,
    scrollYMarginOffset: 0,
    suppressScrollX: false,
    suppressScrollY: false,
    swipeEasing: true,
    useBothWheelAxes: false,
    wheelPropagation: true,
    wheelSpeed: 1,
  }); };

  var handlers = {
    'click-rail': clickRail,
    'drag-thumb': dragThumb,
    keyboard: keyboard,
    wheel: wheel,
    touch: touch,
  };

  var PerfectScrollbar = function PerfectScrollbar(element, userSettings) {
    var this$1 = this;
    if ( userSettings === void 0 ) userSettings = {};

    if (typeof element === 'string') {
      element = document.querySelector(element);
    }

    if (!element || !element.nodeName) {
      throw new Error('no element is specified to initialize PerfectScrollbar');
    }

    this.element = element;

    element.classList.add(cls.main);

    this.settings = defaultSettings();
    for (var key in userSettings) {
      this.settings[key] = userSettings[key];
    }

    this.containerWidth = null;
    this.containerHeight = null;
    this.contentWidth = null;
    this.contentHeight = null;

    var focus = function () { return element.classList.add(cls.state.focus); };
    var blur = function () { return element.classList.remove(cls.state.focus); };

    this.isRtl = get(element).direction === 'rtl';
    if (this.isRtl === true) {
      element.classList.add(cls.rtl);
    }
    this.isNegativeScroll = (function () {
      var originalScrollLeft = element.scrollLeft;
      var result = null;
      element.scrollLeft = -1;
      result = element.scrollLeft < 0;
      element.scrollLeft = originalScrollLeft;
      return result;
    })();
    this.negativeScrollAdjustment = this.isNegativeScroll
      ? element.scrollWidth - element.clientWidth
      : 0;
    this.event = new EventManager();
    this.ownerDocument = element.ownerDocument || document;

    this.scrollbarXRail = div(cls.element.rail('x'));
    element.appendChild(this.scrollbarXRail);
    this.scrollbarX = div(cls.element.thumb('x'));
    this.scrollbarXRail.appendChild(this.scrollbarX);
    this.scrollbarX.setAttribute('tabindex', 0);
    this.event.bind(this.scrollbarX, 'focus', focus);
    this.event.bind(this.scrollbarX, 'blur', blur);
    this.scrollbarXActive = null;
    this.scrollbarXWidth = null;
    this.scrollbarXLeft = null;
    var railXStyle = get(this.scrollbarXRail);
    this.scrollbarXBottom = parseInt(railXStyle.bottom, 10);
    if (isNaN(this.scrollbarXBottom)) {
      this.isScrollbarXUsingBottom = false;
      this.scrollbarXTop = toInt(railXStyle.top);
    } else {
      this.isScrollbarXUsingBottom = true;
    }
    this.railBorderXWidth =
      toInt(railXStyle.borderLeftWidth) + toInt(railXStyle.borderRightWidth);
    // Set rail to display:block to calculate margins
    set(this.scrollbarXRail, { display: 'block' });
    this.railXMarginWidth =
      toInt(railXStyle.marginLeft) + toInt(railXStyle.marginRight);
    set(this.scrollbarXRail, { display: '' });
    this.railXWidth = null;
    this.railXRatio = null;

    this.scrollbarYRail = div(cls.element.rail('y'));
    element.appendChild(this.scrollbarYRail);
    this.scrollbarY = div(cls.element.thumb('y'));
    this.scrollbarYRail.appendChild(this.scrollbarY);
    this.scrollbarY.setAttribute('tabindex', 0);
    this.event.bind(this.scrollbarY, 'focus', focus);
    this.event.bind(this.scrollbarY, 'blur', blur);
    this.scrollbarYActive = null;
    this.scrollbarYHeight = null;
    this.scrollbarYTop = null;
    var railYStyle = get(this.scrollbarYRail);
    this.scrollbarYRight = parseInt(railYStyle.right, 10);
    if (isNaN(this.scrollbarYRight)) {
      this.isScrollbarYUsingRight = false;
      this.scrollbarYLeft = toInt(railYStyle.left);
    } else {
      this.isScrollbarYUsingRight = true;
    }
    this.scrollbarYOuterWidth = this.isRtl ? outerWidth(this.scrollbarY) : null;
    this.railBorderYWidth =
      toInt(railYStyle.borderTopWidth) + toInt(railYStyle.borderBottomWidth);
    set(this.scrollbarYRail, { display: 'block' });
    this.railYMarginHeight =
      toInt(railYStyle.marginTop) + toInt(railYStyle.marginBottom);
    set(this.scrollbarYRail, { display: '' });
    this.railYHeight = null;
    this.railYRatio = null;

    this.reach = {
      x:
        element.scrollLeft <= 0
          ? 'start'
          : element.scrollLeft >= this.contentWidth - this.containerWidth
          ? 'end'
          : null,
      y:
        element.scrollTop <= 0
          ? 'start'
          : element.scrollTop >= this.contentHeight - this.containerHeight
          ? 'end'
          : null,
    };

    this.isAlive = true;

    this.settings.handlers.forEach(function (handlerName) { return handlers[handlerName](this$1); });

    this.lastScrollTop = Math.floor(element.scrollTop); // for onScroll only
    this.lastScrollLeft = element.scrollLeft; // for onScroll only
    this.event.bind(this.element, 'scroll', function (e) { return this$1.onScroll(e); });
    updateGeometry(this);
  };

  PerfectScrollbar.prototype.update = function update () {
    if (!this.isAlive) {
      return;
    }

    // Recalcuate negative scrollLeft adjustment
    this.negativeScrollAdjustment = this.isNegativeScroll
      ? this.element.scrollWidth - this.element.clientWidth
      : 0;

    // Recalculate rail margins
    set(this.scrollbarXRail, { display: 'block' });
    set(this.scrollbarYRail, { display: 'block' });
    this.railXMarginWidth =
      toInt(get(this.scrollbarXRail).marginLeft) +
      toInt(get(this.scrollbarXRail).marginRight);
    this.railYMarginHeight =
      toInt(get(this.scrollbarYRail).marginTop) +
      toInt(get(this.scrollbarYRail).marginBottom);

    // Hide scrollbars not to affect scrollWidth and scrollHeight
    set(this.scrollbarXRail, { display: 'none' });
    set(this.scrollbarYRail, { display: 'none' });

    updateGeometry(this);

    processScrollDiff(this, 'top', 0, false, true);
    processScrollDiff(this, 'left', 0, false, true);

    set(this.scrollbarXRail, { display: '' });
    set(this.scrollbarYRail, { display: '' });
  };

  PerfectScrollbar.prototype.onScroll = function onScroll (e) {
    if (!this.isAlive) {
      return;
    }

    updateGeometry(this);
    processScrollDiff(this, 'top', this.element.scrollTop - this.lastScrollTop);
    processScrollDiff(
      this,
      'left',
      this.element.scrollLeft - this.lastScrollLeft
    );

    this.lastScrollTop = Math.floor(this.element.scrollTop);
    this.lastScrollLeft = this.element.scrollLeft;
  };

  PerfectScrollbar.prototype.destroy = function destroy () {
    if (!this.isAlive) {
      return;
    }

    this.event.unbindAll();
    remove(this.scrollbarX);
    remove(this.scrollbarY);
    remove(this.scrollbarXRail);
    remove(this.scrollbarYRail);
    this.removePsClasses();

    // unset elements
    this.element = null;
    this.scrollbarX = null;
    this.scrollbarY = null;
    this.scrollbarXRail = null;
    this.scrollbarYRail = null;

    this.isAlive = false;
  };

  PerfectScrollbar.prototype.removePsClasses = function removePsClasses () {
    this.element.className = this.element.className
      .split(' ')
      .filter(function (name) { return !name.match(/^ps([-_].+|)$/); })
      .join(' ');
  };

  return PerfectScrollbar;

})));
//# sourceMappingURL=perfect-scrollbar.js.map
/*!
 * pickadate.js v3.6.4, 2019/05/25
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */

(function ( factory ) {

    // AMD.
    if ( typeof define == 'function' && define.amd )
        define( 'picker', ['jquery'], factory )

    // Node.js/browserify.
    else if ( typeof exports == 'object' )
        module.exports = factory( require('jquery') )

    // Browser globals.
    else if ( typeof window == 'object' )
        window.Picker = factory( jQuery )

    else this.Picker = factory( jQuery )

}(function( $ ) {

    var $window = $( window )
    var $document = $( document )
    var $html = $( document.documentElement )
    var supportsTransitions = document.documentElement.style.transition != null


    /**
     * The picker constructor that creates a blank picker.
     */
    function PickerConstructor( ELEMENT, NAME, COMPONENT, OPTIONS ) {

        // If there’s no element, return the picker constructor.
        if ( !ELEMENT ) return PickerConstructor


        var
            IS_DEFAULT_THEME = false,


            // The state of the picker.
            STATE = {
                id: ELEMENT.id || 'P' + Math.abs( ~~(Math.random() * new Date()) ),
                handlingOpen: false,
            },


            // Merge the defaults and options passed.
            SETTINGS = COMPONENT ? $.extend( true, {}, COMPONENT.defaults, OPTIONS ) : OPTIONS || {},


            // Merge the default classes with the settings classes.
            CLASSES = $.extend( {}, PickerConstructor.klasses(), SETTINGS.klass ),


            // The element node wrapper into a jQuery object.
            $ELEMENT = $( ELEMENT ),


            // Pseudo picker constructor.
            PickerInstance = function() {
                return this.start()
            },


            // The picker prototype.
            P = PickerInstance.prototype = {

                constructor: PickerInstance,

                $node: $ELEMENT,


                /**
                 * Initialize everything
                 */
                start: function() {

                    // If it’s already started, do nothing.
                    if ( STATE && STATE.start ) return P


                    // Update the picker states.
                    STATE.methods = {}
                    STATE.start = true
                    STATE.open = false
                    STATE.type = ELEMENT.type


                    // Confirm focus state, convert into text input to remove UA stylings,
                    // and set as readonly to prevent keyboard popup.
                    ELEMENT.autofocus = ELEMENT == getActiveElement()
                    ELEMENT.readOnly = !SETTINGS.editable
                    SETTINGS.id = ELEMENT.id = ELEMENT.id || STATE.id
                    if ( ELEMENT.type != 'text' ) {
                        ELEMENT.type = 'text'
                    }

                    // Create a new picker component with the settings.
                    P.component = new COMPONENT(P, SETTINGS)


                    // Create the picker root and then prepare it.
                    P.$root = $( '<div class="' + CLASSES.picker + '" id="' + ELEMENT.id + '_root" />' )
                    prepareElementRoot()


                    // Create the picker holder and then prepare it.
                    P.$holder = $( createWrappedComponent() ).appendTo( P.$root )
                    prepareElementHolder()


                    // If there’s a format for the hidden input element, create the element.
                    if ( SETTINGS.formatSubmit ) {
                        prepareElementHidden()
                    }


                    // Prepare the input element.
                    prepareElement()


                    // Insert the hidden input as specified in the settings.
                    if ( SETTINGS.containerHidden ) $( SETTINGS.containerHidden ).append( P._hidden )
                    else $ELEMENT.after( P._hidden )


                    // Insert the root as specified in the settings.
                    if ( SETTINGS.container ) $( SETTINGS.container ).append( P.$root )
                    else $ELEMENT.after( P.$root )


                    // Bind the default component and settings events.
                    P.on({
                        start: P.component.onStart,
                        render: P.component.onRender,
                        stop: P.component.onStop,
                        open: P.component.onOpen,
                        close: P.component.onClose,
                        set: P.component.onSet
                    }).on({
                        start: SETTINGS.onStart,
                        render: SETTINGS.onRender,
                        stop: SETTINGS.onStop,
                        open: SETTINGS.onOpen,
                        close: SETTINGS.onClose,
                        set: SETTINGS.onSet
                    })


                    // Once we’re all set, check the theme in use.
                    IS_DEFAULT_THEME = isUsingDefaultTheme( P.$holder[0] )


                    // If the element has autofocus, open the picker.
                    if ( ELEMENT.autofocus ) {
                        P.open()
                    }


                    // Trigger queued the “start” and “render” events.
                    return P.trigger( 'start' ).trigger( 'render' )
                }, //start


                /**
                 * Render a new picker
                 */
                render: function( entireComponent ) {

                    // Insert a new component holder in the root or box.
                    if ( entireComponent ) {
                        P.$holder = $( createWrappedComponent() )
                        prepareElementHolder()
                        P.$root.html( P.$holder )
                    }
                    else P.$root.find( '.' + CLASSES.box ).html( P.component.nodes( STATE.open ) )

                    // Trigger the queued “render” events.
                    return P.trigger( 'render' )
                }, //render


                /**
                 * Destroy everything
                 */
                stop: function() {

                    // If it’s already stopped, do nothing.
                    if ( !STATE.start ) return P

                    // Then close the picker.
                    P.close()

                    // Remove the hidden field.
                    if ( P._hidden ) {
                        P._hidden.parentNode.removeChild( P._hidden )
                    }

                    // Remove the root.
                    P.$root.remove()

                    // Remove the input class, remove the stored data, and unbind
                    // the events (after a tick for IE - see `P.close`).
                    $ELEMENT.removeClass( CLASSES.input ).removeData( NAME )
                    setTimeout( function() {
                        $ELEMENT.off( '.' + STATE.id )
                    }, 0)

                    // Restore the element state
                    ELEMENT.type = STATE.type
                    ELEMENT.readOnly = false

                    // Trigger the queued “stop” events.
                    P.trigger( 'stop' )

                    // Reset the picker states.
                    STATE.methods = {}
                    STATE.start = false

                    return P
                }, //stop


                /**
                 * Open up the picker
                 */
                open: function( dontGiveFocus ) {

                    // If it’s already open, do nothing.
                    if ( STATE.open ) return P

                    // Add the “active” class.
                    $ELEMENT.addClass( CLASSES.active )

                    // * A Firefox bug, when `html` has `overflow:hidden`, results in
                    //   killing transitions :(. So add the “opened” state on the next tick.
                    //   Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=625289
                    setTimeout( function() {

                        // Add the “opened” class to the picker root.
                        P.$root.addClass( CLASSES.opened )
                        aria( P.$root[0], 'hidden', false )

                    }, 0 )

                    // If we have to give focus, bind the element and doc events.
                    if ( dontGiveFocus !== false ) {

                        // Set it as open.
                        STATE.open = true

                        // Prevent the page from scrolling.
                        if ( IS_DEFAULT_THEME ) {
                            $('body').
                            css( 'overflow', 'hidden' ).
                            css( 'padding-right', '+=' + getScrollbarWidth() )
                        }

                        // Pass focus to the root element’s jQuery object.
                        focusPickerOnceOpened()

                        // Bind the document events.
                        $document.on( 'click.' + STATE.id + ' focusin.' + STATE.id, function( event ) {
                            // If the picker is currently midway through processing
                            // the opening sequence of events then don't handle clicks
                            // on any part of the DOM. This is caused by a bug in Chrome 73
                            // where a click event is being generated with the incorrect
                            // path in it.
                            // In short, if someone does a click that finishes after the
                            // new element is created then the path contains only the
                            // parent element and not the input element itself.
                            if (STATE.handlingOpen) {
                                return;
                            }

                            var target = getRealEventTarget( event, ELEMENT )

                            // If the target of the event is not the element, close the picker picker.
                            // * Don’t worry about clicks or focusins on the root because those don’t bubble up.
                            //   Also, for Firefox, a click on an `option` element bubbles up directly
                            //   to the doc. So make sure the target wasn't the doc.
                            // * In Firefox stopPropagation() doesn’t prevent right-click events from bubbling,
                            //   which causes the picker to unexpectedly close when right-clicking it. So make
                            //   sure the event wasn’t a right-click.
                            // * In Chrome 62 and up, password autofill causes a simulated focusin event which
                            //   closes the picker.
                            if ( ! event.isSimulated && target != ELEMENT && target != document && event.which != 3 ) {

                                // If the target was the holder that covers the screen,
                                // keep the element focused to maintain tabindex.
                                P.close( target === P.$holder[0] )
                            }

                        }).on( 'keydown.' + STATE.id, function( event ) {

                            var
                                // Get the keycode.
                                keycode = event.keyCode,

                                // Translate that to a selection change.
                                keycodeToMove = P.component.key[ keycode ],

                                // Grab the target.
                                target = getRealEventTarget( event, ELEMENT )


                            // On escape, close the picker and give focus.
                            if ( keycode == 27 ) {
                                P.close( true )
                            }


                            // Check if there is a key movement or “enter” keypress on the element.
                            else if ( target == P.$holder[0] && ( keycodeToMove || keycode == 13 ) ) {

                                // Prevent the default action to stop page movement.
                                event.preventDefault()

                                // Trigger the key movement action.
                                if ( keycodeToMove ) {
                                    PickerConstructor._.trigger( P.component.key.go, P, [ PickerConstructor._.trigger( keycodeToMove ) ] )
                                }

                                // On “enter”, if the highlighted item isn’t disabled, set the value and close.
                                else if ( !P.$root.find( '.' + CLASSES.highlighted ).hasClass( CLASSES.disabled ) ) {
                                    P.set( 'select', P.component.item.highlight )
                                    if ( SETTINGS.closeOnSelect ) {
                                        P.close( true )
                                    }
                                }
                            }


                                // If the target is within the root and “enter” is pressed,
                            // prevent the default action and trigger a click on the target instead.
                            else if ( $.contains( P.$root[0], target ) && keycode == 13 ) {
                                event.preventDefault()
                                target.click()
                            }
                        })
                    }

                    // Trigger the queued “open” events.
                    return P.trigger( 'open' )
                }, //open


                /**
                 * Close the picker
                 */
                close: function( giveFocus ) {

                    // If we need to give focus, do it before changing states.
                    if ( giveFocus ) {
                        if ( SETTINGS.editable ) {
                            ELEMENT.focus()
                        }
                        else {
                            // ....ah yes! It would’ve been incomplete without a crazy workaround for IE :|
                            // The focus is triggered *after* the close has completed - causing it
                            // to open again. So unbind and rebind the event at the next tick.
                            P.$holder.off( 'focus.toOpen' ).focus()
                            setTimeout( function() {
                                P.$holder.on( 'focus.toOpen', handleFocusToOpenEvent )
                            }, 0 )
                        }
                    }

                    // Remove the “active” class.
                    $ELEMENT.removeClass( CLASSES.active )

                    // * A Firefox bug, when `html` has `overflow:hidden`, results in
                    //   killing transitions :(. So remove the “opened” state on the next tick.
                    //   Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=625289
                    setTimeout( function() {

                        // Remove the “opened” and “focused” class from the picker root.
                        P.$root.removeClass( CLASSES.opened + ' ' + CLASSES.focused )
                        aria( P.$root[0], 'hidden', true )

                    }, 0 )

                    // If it’s already closed, do nothing more.
                    if ( !STATE.open ) return P

                    // Set it as closed.
                    STATE.open = false

                    // Allow the page to scroll.
                    if ( IS_DEFAULT_THEME ) {
                        $('body').
                        css( 'overflow', '' ).
                        css( 'padding-right', '-=' + getScrollbarWidth() )
                    }

                    // Unbind the document events.
                    $document.off( '.' + STATE.id )

                    // Trigger the queued “close” events.
                    return P.trigger( 'close' )
                }, //close


                /**
                 * Clear the values
                 */
                clear: function( options ) {
                    return P.set( 'clear', null, options )
                }, //clear


                /**
                 * Set something
                 */
                set: function( thing, value, options ) {

                    var thingItem, thingValue,
                        thingIsObject = $.isPlainObject( thing ),
                        thingObject = thingIsObject ? thing : {}

                    // Make sure we have usable options.
                    options = thingIsObject && $.isPlainObject( value ) ? value : options || {}

                    if ( thing ) {

                        // If the thing isn’t an object, make it one.
                        if ( !thingIsObject ) {
                            thingObject[ thing ] = value
                        }

                        // Go through the things of items to set.
                        for ( thingItem in thingObject ) {

                            // Grab the value of the thing.
                            thingValue = thingObject[ thingItem ]

                            // First, if the item exists and there’s a value, set it.
                            if ( thingItem in P.component.item ) {
                                if ( thingValue === undefined ) thingValue = null
                                P.component.set( thingItem, thingValue, options )
                            }

                            // Then, check to update the element value and broadcast a change.
                            if ( ( thingItem == 'select' || thingItem == 'clear' ) && SETTINGS.updateInput ) {
                                $ELEMENT.
                                val( thingItem == 'clear' ? '' : P.get( thingItem, SETTINGS.format ) ).
                                trigger( 'change' )
                            }
                        }

                        // Render a new picker.
                        P.render()
                    }

                    // When the method isn’t muted, trigger queued “set” events and pass the `thingObject`.
                    return options.muted ? P : P.trigger( 'set', thingObject )
                }, //set


                /**
                 * Get something
                 */
                get: function( thing, format ) {

                    // Make sure there’s something to get.
                    thing = thing || 'value'

                    // If a picker state exists, return that.
                    if ( STATE[ thing ] != null ) {
                        return STATE[ thing ]
                    }

                    // Return the submission value, if that.
                    if ( thing == 'valueSubmit' ) {
                        if ( P._hidden ) {
                            return P._hidden.value
                        }
                        thing = 'value'
                    }

                    // Return the value, if that.
                    if ( thing == 'value' ) {
                        return ELEMENT.value
                    }

                    // Check if a component item exists, return that.
                    if ( thing in P.component.item ) {
                        if ( typeof format == 'string' ) {
                            var thingValue = P.component.get( thing )
                            return thingValue ?
                                PickerConstructor._.trigger(
                                    P.component.formats.toString,
                                    P.component,
                                    [ format, thingValue ]
                                ) : ''
                        }
                        return P.component.get( thing )
                    }
                }, //get



                /**
                 * Bind events on the things.
                 */
                on: function( thing, method, internal ) {

                    var thingName, thingMethod,
                        thingIsObject = $.isPlainObject( thing ),
                        thingObject = thingIsObject ? thing : {}

                    if ( thing ) {

                        // If the thing isn’t an object, make it one.
                        if ( !thingIsObject ) {
                            thingObject[ thing ] = method
                        }

                        // Go through the things to bind to.
                        for ( thingName in thingObject ) {

                            // Grab the method of the thing.
                            thingMethod = thingObject[ thingName ]

                            // If it was an internal binding, prefix it.
                            if ( internal ) {
                                thingName = '_' + thingName
                            }

                            // Make sure the thing methods collection exists.
                            STATE.methods[ thingName ] = STATE.methods[ thingName ] || []

                            // Add the method to the relative method collection.
                            STATE.methods[ thingName ].push( thingMethod )
                        }
                    }

                    return P
                }, //on



                /**
                 * Unbind events on the things.
                 */
                off: function() {
                    var i, thingName,
                        names = arguments;
                    for ( i = 0, namesCount = names.length; i < namesCount; i += 1 ) {
                        thingName = names[i]
                        if ( thingName in STATE.methods ) {
                            delete STATE.methods[thingName]
                        }
                    }
                    return P
                },


                /**
                 * Fire off method events.
                 */
                trigger: function( name, data ) {
                    var _trigger = function( name ) {
                        var methodList = STATE.methods[ name ]
                        if ( methodList ) {
                            methodList.map( function( method ) {
                                PickerConstructor._.trigger( method, P, [ data ] )
                            })
                        }
                    }
                    _trigger( '_' + name )
                    _trigger( name )
                    return P
                } //trigger
            } //PickerInstance.prototype


        /**
         * Wrap the picker holder components together.
         */
        function createWrappedComponent() {

            // Create a picker wrapper holder
            return PickerConstructor._.node( 'div',

                // Create a picker wrapper node
                PickerConstructor._.node( 'div',

                    // Create a picker frame
                    PickerConstructor._.node( 'div',

                        // Create a picker box node
                        PickerConstructor._.node( 'div',

                            // Create the components nodes.
                            P.component.nodes( STATE.open ),

                            // The picker box class
                            CLASSES.box
                        ),

                        // Picker wrap class
                        CLASSES.wrap
                    ),

                    // Picker frame class
                    CLASSES.frame
                ),

                // Picker holder class
                CLASSES.holder,

                'tabindex="-1"'
            ) //endreturn
        } //createWrappedComponent

        /**
         * Prepare the input element with all bindings.
         */
        function prepareElement() {

            $ELEMENT.

                // Store the picker data by component name.
                data(NAME, P).

                // Add the “input” class name.
                addClass(CLASSES.input).

                // If there’s a `data-value`, update the value of the element.
                val( $ELEMENT.data('value') ?
                    P.get('select', SETTINGS.format) :
                    ELEMENT.value
                ).

                // On focus/click, open the picker.
                on( 'focus.' + STATE.id + ' click.' + STATE.id,
                    function(event) {
                        event.preventDefault()
                        P.open()
                    }
                )

                // Mousedown handler to capture when the user starts interacting
                // with the picker. This is used in working around a bug in Chrome 73.
                .on('mousedown', function() {
                    STATE.handlingOpen = true;
                    var handler = function() {
                        // By default mouseup events are fired before a click event.
                        // By using a timeout we can force the mouseup to be handled
                        // after the corresponding click event is handled.
                        setTimeout(function() {
                            $(document).off('mouseup', handler);
                            STATE.handlingOpen = false;
                        }, 0);
                    };
                    $(document).on('mouseup', handler);
                });


            // Only bind keydown events if the element isn’t editable.
            if ( !SETTINGS.editable ) {

                $ELEMENT.

                    // Handle keyboard event based on the picker being opened or not.
                    on( 'keydown.' + STATE.id, handleKeydownEvent )
            }


            // Update the aria attributes.
            aria(ELEMENT, {
                haspopup: true,
                readonly: false,
                owns: ELEMENT.id + '_root'
            })
        }


        /**
         * Prepare the root picker element with all bindings.
         */
        function prepareElementRoot() {
            aria( P.$root[0], 'hidden', true )
        }


        /**
         * Prepare the holder picker element with all bindings.
         */
        function prepareElementHolder() {

            P.$holder.

            on({

                // For iOS8.
                keydown: handleKeydownEvent,

                'focus.toOpen': handleFocusToOpenEvent,

                blur: function() {
                    // Remove the “target” class.
                    $ELEMENT.removeClass( CLASSES.target )
                },

                // When something within the holder is focused, stop from bubbling
                // to the doc and remove the “focused” state from the root.
                focusin: function( event ) {
                    P.$root.removeClass( CLASSES.focused )
                    event.stopPropagation()
                },

                // When something within the holder is clicked, stop it
                // from bubbling to the doc.
                'mousedown click': function( event ) {

                    var target = getRealEventTarget( event, ELEMENT )

                    // Make sure the target isn’t the root holder so it can bubble up.
                    if ( target != P.$holder[0] ) {

                        event.stopPropagation()

                        // * For mousedown events, cancel the default action in order to
                        //   prevent cases where focus is shifted onto external elements
                        //   when using things like jQuery mobile or MagnificPopup (ref: #249 & #120).
                        //   Also, for Firefox, don’t prevent action on the `option` element.
                        if ( event.type == 'mousedown' && !$( target ).is( 'input, select, textarea, button, option' )) {

                            event.preventDefault()

                            // Re-focus onto the holder so that users can click away
                            // from elements focused within the picker.
                            P.$holder.eq(0).focus()
                        }
                    }
                }

            }).

                // If there’s a click on an actionable element, carry out the actions.
                on( 'click', '[data-pick], [data-nav], [data-clear], [data-close]', function() {

                    var $target = $( this ),
                        targetData = $target.data(),
                        targetDisabled = $target.hasClass( CLASSES.navDisabled ) || $target.hasClass( CLASSES.disabled ),

                        // * For IE, non-focusable elements can be active elements as well
                        //   (http://stackoverflow.com/a/2684561).
                        activeElement = getActiveElement()
                    activeElement = activeElement && ( (activeElement.type || activeElement.href ) ? activeElement : null);

                    // If it’s disabled or nothing inside is actively focused, re-focus the element.
                    if ( targetDisabled || activeElement && !$.contains( P.$root[0], activeElement ) ) {
                        P.$holder.eq(0).focus()
                    }

                    // If something is superficially changed, update the `highlight` based on the `nav`.
                    if ( !targetDisabled && targetData.nav ) {
                        P.set( 'highlight', P.component.item.highlight, { nav: targetData.nav } )
                    }

                    // If something is picked, set `select` then close with focus.
                    else if ( !targetDisabled && 'pick' in targetData ) {
                        P.set( 'select', targetData.pick )
                        if ( SETTINGS.closeOnSelect ) {
                            P.close( true )
                        }
                    }

                    // If a “clear” button is pressed, empty the values and close with focus.
                    else if ( targetData.clear ) {
                        P.clear()
                        if ( SETTINGS.closeOnClear ) {
                            P.close( true )
                        }
                    }

                    else if ( targetData.close ) {
                        P.close( true )
                    }

                }) //P.$holder

        }


        /**
         * Prepare the hidden input element along with all bindings.
         */
        function prepareElementHidden() {

            var name

            if ( SETTINGS.hiddenName === true ) {
                name = ELEMENT.name
                ELEMENT.name = ''
            }
            else {
                name = [
                    typeof SETTINGS.hiddenPrefix == 'string' ? SETTINGS.hiddenPrefix : '',
                    typeof SETTINGS.hiddenSuffix == 'string' ? SETTINGS.hiddenSuffix : '_submit'
                ]
                name = name[0] + ELEMENT.name + name[1]
            }

            P._hidden = $(
                '<input ' +
                'type=hidden ' +

                // Create the name using the original input’s with a prefix and suffix.
                'name="' + name + '"' +

                // If the element has a value, set the hidden value as well.
                (
                    $ELEMENT.data('value') || ELEMENT.value ?
                        ' value="' + P.get('select', SETTINGS.formatSubmit) + '"' :
                        ''
                ) +
                '>'
            )[0]

            $ELEMENT.

                // If the value changes, update the hidden input with the correct format.
                on('change.' + STATE.id, function() {
                    P._hidden.value = ELEMENT.value ?
                        P.get('select', SETTINGS.formatSubmit) :
                        ''
                })
        }


        // Wait for transitions to end before focusing the holder. Otherwise, while
        // using the `container` option, the view jumps to the container.
        function focusPickerOnceOpened() {

            if (IS_DEFAULT_THEME && supportsTransitions) {
                P.$holder.find('.' + CLASSES.frame).one('transitionend', function() {
                    P.$holder.eq(0).focus()
                })
            }
            else {
                setTimeout(function() {
                    P.$holder.eq(0).focus()
                }, 0)
            }
        }


        function handleFocusToOpenEvent(event) {

            // Stop the event from propagating to the doc.
            event.stopPropagation()

            // Add the “target” class.
            $ELEMENT.addClass( CLASSES.target )

            // Add the “focused” class to the root.
            P.$root.addClass( CLASSES.focused )

            // And then finally open the picker.
            P.open()
        }


        // For iOS8.
        function handleKeydownEvent( event ) {

            var keycode = event.keyCode,

                // Check if one of the delete keys was pressed.
                isKeycodeDelete = /^(8|46)$/.test(keycode)

            // For some reason IE clears the input value on “escape”.
            if ( keycode == 27 ) {
                P.close( true )
                return false
            }

            // Check if `space` or `delete` was pressed or the picker is closed with a key movement.
            if ( keycode == 32 || isKeycodeDelete || !STATE.open && P.component.key[keycode] ) {

                // Prevent it from moving the page and bubbling to doc.
                event.preventDefault()
                event.stopPropagation()

                // If `delete` was pressed, clear the values and close the picker.
                // Otherwise open the picker.
                if ( isKeycodeDelete ) { P.clear().close() }
                else { P.open() }
            }
        }


        // Return a new picker instance.
        return new PickerInstance()
    } //PickerConstructor



    /**
     * The default classes and prefix to use for the HTML classes.
     */
    PickerConstructor.klasses = function( prefix ) {
        prefix = prefix || 'picker'
        return {

            picker: prefix,
            opened: prefix + '--opened',
            focused: prefix + '--focused',

            input: prefix + '__input',
            active: prefix + '__input--active',
            target: prefix + '__input--target',

            holder: prefix + '__holder',

            frame: prefix + '__frame',
            wrap: prefix + '__wrap',

            box: prefix + '__box'
        }
    } //PickerConstructor.klasses



    /**
     * Check if the default theme is being used.
     */
    function isUsingDefaultTheme( element ) {

        var theme,
            prop = 'position'

        // For IE.
        if ( element.currentStyle ) {
            theme = element.currentStyle[prop]
        }

        // For normal browsers.
        else if ( window.getComputedStyle ) {
            theme = getComputedStyle( element )[prop]
        }

        return theme == 'fixed'
    }



    /**
     * Get the width of the browser’s scrollbar.
     * Taken from: https://github.com/VodkaBears/Remodal/blob/master/src/jquery.remodal.js
     */
    function getScrollbarWidth() {

        if ( $html.height() <= $window.height() ) {
            return 0
        }

        var $outer = $( '<div style="visibility:hidden;width:100px" />' ).
        appendTo( 'body' )

        // Get the width without scrollbars.
        var widthWithoutScroll = $outer[0].offsetWidth

        // Force adding scrollbars.
        $outer.css( 'overflow', 'scroll' )

        // Add the inner div.
        var $inner = $( '<div style="width:100%" />' ).appendTo( $outer )

        // Get the width with scrollbars.
        var widthWithScroll = $inner[0].offsetWidth

        // Remove the divs.
        $outer.remove()

        // Return the difference between the widths.
        return widthWithoutScroll - widthWithScroll
    }



    /**
     * Get the target element from the event.
     * If ELEMENT is supplied and present in the event path (ELEMENT is ancestor of the target),
     * returns ELEMENT instead
     */
    function getRealEventTarget( event, ELEMENT ) {

        var path = []

        if ( event.path ) {
            path = event.path
        }

        if ( event.originalEvent && event.originalEvent.path ) {
            path = event.originalEvent.path
        }

        if ( path && path.length > 0 ) {
            if ( ELEMENT && path.indexOf( ELEMENT ) >= 0 ) {
                return ELEMENT
            } else {
                return path[0]
            }
        }

        return event.target
    }

    /**
     * PickerConstructor helper methods.
     */
    PickerConstructor._ = {

        /**
         * Create a group of nodes. Expects:
         * `
         {
            min:    {Integer},
            max:    {Integer},
            i:      {Integer},
            node:   {String},
            item:   {Function}
        }
         * `
         */
        group: function( groupObject ) {

            var
                // Scope for the looped object
                loopObjectScope,

                // Create the nodes list
                nodesList = '',

                // The counter starts from the `min`
                counter = PickerConstructor._.trigger( groupObject.min, groupObject )


            // Loop from the `min` to `max`, incrementing by `i`
            for ( ; counter <= PickerConstructor._.trigger( groupObject.max, groupObject, [ counter ] ); counter += groupObject.i ) {

                // Trigger the `item` function within scope of the object
                loopObjectScope = PickerConstructor._.trigger( groupObject.item, groupObject, [ counter ] )

                // Splice the subgroup and create nodes out of the sub nodes
                nodesList += PickerConstructor._.node(
                    groupObject.node,
                    loopObjectScope[ 0 ],   // the node
                    loopObjectScope[ 1 ],   // the classes
                    loopObjectScope[ 2 ]    // the attributes
                )
            }

            // Return the list of nodes
            return nodesList
        }, //group


        /**
         * Create a dom node string
         */
        node: function( wrapper, item, klass, attribute ) {

            // If the item is false-y, just return an empty string
            if ( !item ) return ''

            // If the item is an array, do a join
            item = $.isArray( item ) ? item.join( '' ) : item

            // Check for the class
            klass = klass ? ' class="' + klass + '"' : ''

            // Check for any attributes
            attribute = attribute ? ' ' + attribute : ''

            // Return the wrapped item
            return '<' + wrapper + klass + attribute + '>' + item + '</' + wrapper + '>'
        }, //node


        /**
         * Lead numbers below 10 with a zero.
         */
        lead: function( number ) {
            return ( number < 10 ? '0': '' ) + number
        },


        /**
         * Trigger a function otherwise return the value.
         */
        trigger: function( callback, scope, args ) {
            return typeof callback == 'function' ? callback.apply( scope, args || [] ) : callback
        },


        /**
         * If the second character is a digit, length is 2 otherwise 1.
         */
        digits: function( string ) {
            return ( /\d/ ).test( string[ 1 ] ) ? 2 : 1
        },


        /**
         * Tell if something is a date object.
         */
        isDate: function( value ) {
            return {}.toString.call( value ).indexOf( 'Date' ) > -1 && this.isInteger( value.getDate() )
        },


        /**
         * Tell if something is an integer.
         */
        isInteger: function( value ) {
            return {}.toString.call( value ).indexOf( 'Number' ) > -1 && value % 1 === 0
        },


        /**
         * Create ARIA attribute strings.
         */
        ariaAttr: ariaAttr
    } //PickerConstructor._



    /**
     * Extend the picker with a component and defaults.
     */
    PickerConstructor.extend = function( name, Component ) {

        // Extend jQuery.
        $.fn[ name ] = function( options, action ) {

            // Grab the component data.
            var componentData = this.data( name )

            // If the picker is requested, return the data object.
            if ( options == 'picker' ) {
                return componentData
            }

            // If the component data exists and `options` is a string, carry out the action.
            if ( componentData && typeof options == 'string' ) {
                return PickerConstructor._.trigger( componentData[ options ], componentData, [ action ] )
            }

            // Otherwise go through each matched element and if the component
            // doesn’t exist, create a new picker using `this` element
            // and merging the defaults and options with a deep copy.
            return this.each( function() {
                var $this = $( this )
                if ( !$this.data( name ) ) {
                    new PickerConstructor( this, name, Component, options )
                }
            })
        }

        // Set the defaults.
        $.fn[ name ].defaults = Component.defaults
    } //PickerConstructor.extend



    function aria(element, attribute, value) {
        if ( $.isPlainObject(attribute) ) {
            for ( var key in attribute ) {
                ariaSet(element, key, attribute[key])
            }
        }
        else {
            ariaSet(element, attribute, value)
        }
    }
    function ariaSet(element, attribute, value) {
        element.setAttribute(
            (attribute == 'role' ? '' : 'aria-') + attribute,
            value
        )
    }
    function ariaAttr(attribute, data) {
        if ( !$.isPlainObject(attribute) ) {
            attribute = { attribute: data }
        }
        data = ''
        for ( var key in attribute ) {
            var attr = (key == 'role' ? '' : 'aria-') + key,
                attrVal = attribute[key]
            data += attrVal == null ? '' : attr + '="' + attribute[key] + '"'
        }
        return data
    }

// IE8 bug throws an error for activeElements within iframes.
    function getActiveElement() {
        try {
            return document.activeElement
        } catch ( err ) { }
    }



// Expose the picker constructor.
    return PickerConstructor


}));
/*!
 * Date picker for pickadate.js v3.6.4
 * http://amsul.github.io/pickadate.js/date.htm
 */

(function ( factory ) {

    // AMD.
    if ( typeof define == 'function' && define.amd )
        define( ['./picker', 'jquery'], factory )

    // Node.js/browserify.
    else if ( typeof exports == 'object' )
        module.exports = factory( require('./picker.js'), require('jquery') )

    // Browser globals.
    else factory( Picker, jQuery )

}(function( Picker, $ ) {


    /**
     * Globals and constants
     */
    var DAYS_IN_WEEK = 7,
        WEEKS_IN_CALENDAR = 6,
        _ = Picker._



    /**
     * The date picker constructor
     */
    function DatePicker( picker, settings ) {

        var calendar = this,
            element = picker.$node[ 0 ],
            elementValue = element.value,
            elementDataValue = picker.$node.data( 'value' ),
            valueString = elementDataValue || elementValue,
            formatString = elementDataValue ? settings.formatSubmit : settings.format,
            isRTL = function() {

                return element.currentStyle ?

                    // For IE.
                    element.currentStyle.direction == 'rtl' :

                    // For normal browsers.
                    getComputedStyle( picker.$root[0] ).direction == 'rtl'
            }

        calendar.settings = settings
        calendar.$node = picker.$node

        // The queue of methods that will be used to build item objects.
        calendar.queue = {
            min: 'measure create',
            max: 'measure create',
            now: 'now create',
            select: 'parse create validate',
            highlight: 'parse navigate create validate',
            view: 'parse create validate viewset',
            disable: 'deactivate',
            enable: 'activate'
        }

        // The component's item object.
        calendar.item = {}

        calendar.item.clear = null
        calendar.item.disable = ( settings.disable || [] ).slice( 0 )
        calendar.item.enable = -(function( collectionDisabled ) {
            return collectionDisabled[ 0 ] === true ? collectionDisabled.shift() : -1
        })( calendar.item.disable )

        calendar.
        set( 'min', settings.min ).
        set( 'max', settings.max ).
        set( 'now' )

        // When there’s a value, set the `select`, which in turn
        // also sets the `highlight` and `view`.
        if ( valueString ) {
            calendar.set( 'select', valueString, {
                format: formatString,
                defaultValue: true
            })
        }

        // If there’s no value, default to highlighting “today”.
        else {
            calendar.
            set( 'select', null ).
            set( 'highlight', calendar.item.now )
        }


        // The keycode to movement mapping.
        calendar.key = {
            40: 7, // Down
            38: -7, // Up
            39: function() { return isRTL() ? -1 : 1 }, // Right
            37: function() { return isRTL() ? 1 : -1 }, // Left
            go: function( timeChange ) {
                var highlightedObject = calendar.item.highlight,
                    targetDate = new Date( highlightedObject.year, highlightedObject.month, highlightedObject.date + timeChange )
                calendar.set(
                    'highlight',
                    targetDate,
                    { interval: timeChange }
                )
                this.render()
            }
        }


        // Bind some picker events.
        picker.
        on( 'render', function() {
            picker.$root.find( '.' + settings.klass.selectMonth ).on( 'change', function() {
                var value = this.value
                if ( value ) {
                    picker.set( 'highlight', [ picker.get( 'view' ).year, value, picker.get( 'highlight' ).date ] )
                    picker.$root.find( '.' + settings.klass.selectMonth ).trigger( 'focus' )
                }
            })
            picker.$root.find( '.' + settings.klass.selectYear ).on( 'change', function() {
                var value = this.value
                if ( value ) {
                    picker.set( 'highlight', [ value, picker.get( 'view' ).month, picker.get( 'highlight' ).date ] )
                    picker.$root.find( '.' + settings.klass.selectYear ).trigger( 'focus' )
                }
            })
        }, 1 ).
        on( 'open', function() {
            var includeToday = ''
            if ( calendar.disabled( calendar.get('now') ) ) {
                includeToday = ':not(.' + settings.klass.buttonToday + ')'
            }
            picker.$root.find( 'button' + includeToday + ', select' ).attr( 'disabled', false )
        }, 1 ).
        on( 'close', function() {
            picker.$root.find( 'button, select' ).attr( 'disabled', true )
        }, 1 )

    } //DatePicker


    /**
     * Set a datepicker item object.
     */
    DatePicker.prototype.set = function( type, value, options ) {

        var calendar = this,
            calendarItem = calendar.item

        // If the value is `null` just set it immediately.
        if ( value === null ) {
            if ( type == 'clear' ) type = 'select'
            calendarItem[ type ] = value
            return calendar
        }

        // Otherwise go through the queue of methods, and invoke the functions.
        // Update this as the time unit, and set the final value as this item.
        // * In the case of `enable`, keep the queue but set `disable` instead.
        //   And in the case of `flip`, keep the queue but set `enable` instead.
        calendarItem[ ( type == 'enable' ? 'disable' : type == 'flip' ? 'enable' : type ) ] = calendar.queue[ type ].split( ' ' ).map( function( method ) {
            value = calendar[ method ]( type, value, options )
            return value
        }).pop()

        // Check if we need to cascade through more updates.
        if ( type == 'select' ) {
            calendar.set( 'highlight', calendarItem.select, options )
        }
        else if ( type == 'highlight' ) {
            calendar.set( 'view', calendarItem.highlight, options )
        }
        else if ( type.match( /^(flip|min|max|disable|enable)$/ ) ) {
            if ( calendarItem.select && calendar.disabled( calendarItem.select ) ) {
                calendar.set( 'select', calendarItem.select, options )
            }
            if ( calendarItem.highlight && calendar.disabled( calendarItem.highlight ) ) {
                calendar.set( 'highlight', calendarItem.highlight, options )
            }
        }

        return calendar
    } //DatePicker.prototype.set


    /**
     * Get a datepicker item object.
     */
    DatePicker.prototype.get = function( type ) {
        return this.item[ type ]
    } //DatePicker.prototype.get


    /**
     * Create a picker date object.
     */
    DatePicker.prototype.create = function( type, value, options ) {

        var isInfiniteValue,
            calendar = this

        // If there’s no value, use the type as the value.
        value = value === undefined ? type : value


        // If it’s infinity, update the value.
        if ( value == -Infinity || value == Infinity ) {
            isInfiniteValue = value
        }

        // If it’s an object, use the native date object.
        else if ( $.isPlainObject( value ) && _.isInteger( value.pick ) ) {
            value = value.obj
        }

            // If it’s an array, convert it into a date and make sure
        // that it’s a valid date – otherwise default to today.
        else if ( $.isArray( value ) ) {
            value = new Date( value[ 0 ], value[ 1 ], value[ 2 ] )
            value = _.isDate( value ) ? value : calendar.create().obj
        }

        // If it’s a number or date object, make a normalized date.
        else if ( _.isInteger( value ) || _.isDate( value ) ) {
            value = calendar.normalize( new Date( value ), options )
        }

        // If it’s a literal true or any other case, set it to now.
        else /*if ( value === true )*/ {
            value = calendar.now( type, value, options )
        }

        // Return the compiled object.
        return {
            year: isInfiniteValue || value.getFullYear(),
            month: isInfiniteValue || value.getMonth(),
            date: isInfiniteValue || value.getDate(),
            day: isInfiniteValue || value.getDay(),
            obj: isInfiniteValue || value,
            pick: isInfiniteValue || value.getTime()
        }
    } //DatePicker.prototype.create


    /**
     * Create a range limit object using an array, date object,
     * literal “true”, or integer relative to another time.
     */
    DatePicker.prototype.createRange = function( from, to ) {

        var calendar = this,
            createDate = function( date ) {
                if ( date === true || $.isArray( date ) || _.isDate( date ) ) {
                    return calendar.create( date )
                }
                return date
            }

        // Create objects if possible.
        if ( !_.isInteger( from ) ) {
            from = createDate( from )
        }
        if ( !_.isInteger( to ) ) {
            to = createDate( to )
        }

        // Create relative dates.
        if ( _.isInteger( from ) && $.isPlainObject( to ) ) {
            from = [ to.year, to.month, to.date + from ];
        }
        else if ( _.isInteger( to ) && $.isPlainObject( from ) ) {
            to = [ from.year, from.month, from.date + to ];
        }

        return {
            from: createDate( from ),
            to: createDate( to )
        }
    } //DatePicker.prototype.createRange


    /**
     * Check if a date unit falls within a date range object.
     */
    DatePicker.prototype.withinRange = function( range, dateUnit ) {
        range = this.createRange(range.from, range.to)
        return dateUnit.pick >= range.from.pick && dateUnit.pick <= range.to.pick
    }


    /**
     * Check if two date range objects overlap.
     */
    DatePicker.prototype.overlapRanges = function( one, two ) {

        var calendar = this

        // Convert the ranges into comparable dates.
        one = calendar.createRange( one.from, one.to )
        two = calendar.createRange( two.from, two.to )

        return calendar.withinRange( one, two.from ) || calendar.withinRange( one, two.to ) ||
            calendar.withinRange( two, one.from ) || calendar.withinRange( two, one.to )
    }


    /**
     * Get the date today.
     */
    DatePicker.prototype.now = function( type, value, options ) {
        value = new Date()
        if ( options && options.rel ) {
            value.setDate( value.getDate() + options.rel )
        }
        return this.normalize( value, options )
    }


    /**
     * Navigate to next/prev month.
     */
    DatePicker.prototype.navigate = function( type, value, options ) {

        var targetDateObject,
            targetYear,
            targetMonth,
            targetDate,
            isTargetArray = $.isArray( value ),
            isTargetObject = $.isPlainObject( value ),
            viewsetObject = this.item.view/*,
        safety = 100*/


        if ( isTargetArray || isTargetObject ) {

            if ( isTargetObject ) {
                targetYear = value.year
                targetMonth = value.month
                targetDate = value.date
            }
            else {
                targetYear = +value[0]
                targetMonth = +value[1]
                targetDate = +value[2]
            }

            // If we’re navigating months but the view is in a different
            // month, navigate to the view’s year and month.
            if ( options && options.nav && viewsetObject && viewsetObject.month !== targetMonth ) {
                targetYear = viewsetObject.year
                targetMonth = viewsetObject.month
            }

            // Figure out the expected target year and month.
            targetDateObject = new Date( targetYear, targetMonth + ( options && options.nav ? options.nav : 0 ), 1 )
            targetYear = targetDateObject.getFullYear()
            targetMonth = targetDateObject.getMonth()

            // If the month we’re going to doesn’t have enough days,
            // keep decreasing the date until we reach the month’s last date.
            while ( /*safety &&*/ new Date( targetYear, targetMonth, targetDate ).getMonth() !== targetMonth ) {
                targetDate -= 1
                /*safety -= 1
                if ( !safety ) {
                    throw 'Fell into an infinite loop while navigating to ' + new Date( targetYear, targetMonth, targetDate ) + '.'
                }*/
            }

            value = [ targetYear, targetMonth, targetDate ]
        }

        return value
    } //DatePicker.prototype.navigate


    /**
     * Normalize a date by setting the hours to midnight.
     */
    DatePicker.prototype.normalize = function( value/*, options*/ ) {
        value.setHours( 0, 0, 0, 0 )
        return value
    }


    /**
     * Measure the range of dates.
     */
    DatePicker.prototype.measure = function( type, value/*, options*/ ) {

        var calendar = this

        // If it's an integer, get a date relative to today.
        if ( _.isInteger( value ) ) {
            value = calendar.now( type, value, { rel: value } )
        }

        // If it’s anything false-y, remove the limits.
        else if ( !value ) {
            value = type == 'min' ? -Infinity : Infinity
        }

        // If it’s a string, parse it.
        else if ( typeof value == 'string' ) {
            value = calendar.parse( type, value )
        }

        return value
    } ///DatePicker.prototype.measure


    /**
     * Create a viewset object based on navigation.
     */
    DatePicker.prototype.viewset = function( type, dateObject/*, options*/ ) {
        return this.create([ dateObject.year, dateObject.month, 1 ])
    }


    /**
     * Validate a date as enabled and shift if needed.
     */
    DatePicker.prototype.validate = function( type, dateObject, options ) {

        var calendar = this,

            // Keep a reference to the original date.
            originalDateObject = dateObject,

            // Make sure we have an interval.
            interval = options && options.interval ? options.interval : 1,

            // Check if the calendar enabled dates are inverted.
            isFlippedBase = calendar.item.enable === -1,

            // Check if we have any enabled dates after/before now.
            hasEnabledBeforeTarget, hasEnabledAfterTarget,

            // The min & max limits.
            minLimitObject = calendar.item.min,
            maxLimitObject = calendar.item.max,

            // Check if we’ve reached the limit during shifting.
            reachedMin, reachedMax,

            // Check if the calendar is inverted and at least one weekday is enabled.
            hasEnabledWeekdays = isFlippedBase && calendar.item.disable.filter( function( value ) {

                // If there’s a date, check where it is relative to the target.
                if ( $.isArray( value ) ) {
                    var dateTime = calendar.create( value ).pick
                    if ( dateTime < dateObject.pick ) hasEnabledBeforeTarget = true
                    else if ( dateTime > dateObject.pick ) hasEnabledAfterTarget = true
                }

                // Return only integers for enabled weekdays.
                return _.isInteger( value )
            }).length/*,

        safety = 100*/



        // Cases to validate for:
        // [1] Not inverted and date disabled.
        // [2] Inverted and some dates enabled.
        // [3] Not inverted and out of range.
        //
        // Cases to **not** validate for:
        // • Navigating months.
        // • Not inverted and date enabled.
        // • Inverted and all dates disabled.
        // • ..and anything else.
        if ( !options || (!options.nav && !options.defaultValue) ) if (
            /* 1 */ ( !isFlippedBase && calendar.disabled( dateObject ) ) ||
            /* 2 */ ( isFlippedBase && calendar.disabled( dateObject ) && ( hasEnabledWeekdays || hasEnabledBeforeTarget || hasEnabledAfterTarget ) ) ||
            /* 3 */ ( !isFlippedBase && (dateObject.pick <= minLimitObject.pick || dateObject.pick >= maxLimitObject.pick) )
        ) {


            // When inverted, flip the direction if there aren’t any enabled weekdays
            // and there are no enabled dates in the direction of the interval.
            if ( isFlippedBase && !hasEnabledWeekdays && ( ( !hasEnabledAfterTarget && interval > 0 ) || ( !hasEnabledBeforeTarget && interval < 0 ) ) ) {
                interval *= -1
            }


            // Keep looping until we reach an enabled date.
            while ( /*safety &&*/ calendar.disabled( dateObject ) ) {

                /*safety -= 1
                if ( !safety ) {
                    throw 'Fell into an infinite loop while validating ' + dateObject.obj + '.'
                }*/


                // If we’ve looped into the next/prev month with a large interval, return to the original date and flatten the interval.
                if ( Math.abs( interval ) > 1 && ( dateObject.month < originalDateObject.month || dateObject.month > originalDateObject.month ) ) {
                    dateObject = originalDateObject
                    interval = interval > 0 ? 1 : -1
                }


                // If we’ve reached the min/max limit, reverse the direction, flatten the interval and set it to the limit.
                if ( dateObject.pick <= minLimitObject.pick ) {
                    reachedMin = true
                    interval = 1
                    dateObject = calendar.create([
                        minLimitObject.year,
                        minLimitObject.month,
                        minLimitObject.date + (dateObject.pick === minLimitObject.pick ? 0 : -1)
                    ])
                }
                else if ( dateObject.pick >= maxLimitObject.pick ) {
                    reachedMax = true
                    interval = -1
                    dateObject = calendar.create([
                        maxLimitObject.year,
                        maxLimitObject.month,
                        maxLimitObject.date + (dateObject.pick === maxLimitObject.pick ? 0 : 1)
                    ])
                }


                // If we’ve reached both limits, just break out of the loop.
                if ( reachedMin && reachedMax ) {
                    break
                }


                // Finally, create the shifted date using the interval and keep looping.
                dateObject = calendar.create([ dateObject.year, dateObject.month, dateObject.date + interval ])
            }

        } //endif


        // Return the date object settled on.
        return dateObject
    } //DatePicker.prototype.validate


    /**
     * Check if a date is disabled.
     */
    DatePicker.prototype.disabled = function( dateToVerify ) {

        var
            calendar = this,

            // Filter through the disabled dates to check if this is one.
            isDisabledMatch = calendar.item.disable.filter( function( dateToDisable ) {

                // If the date is a number, match the weekday with 0index and `firstDay` check.
                if ( _.isInteger( dateToDisable ) ) {
                    return dateToVerify.day === ( calendar.settings.firstDay ? dateToDisable : dateToDisable - 1 ) % 7
                }

                // If it’s an array or a native JS date, create and match the exact date.
                if ( $.isArray( dateToDisable ) || _.isDate( dateToDisable ) ) {
                    return dateToVerify.pick === calendar.create( dateToDisable ).pick
                }

                // If it’s an object, match a date within the “from” and “to” range.
                if ( $.isPlainObject( dateToDisable ) ) {
                    return calendar.withinRange( dateToDisable, dateToVerify )
                }
            })

        // If this date matches a disabled date, confirm it’s not inverted.
        isDisabledMatch = isDisabledMatch.length && !isDisabledMatch.filter(function( dateToDisable ) {
            return $.isArray( dateToDisable ) && dateToDisable[3] == 'inverted' ||
                $.isPlainObject( dateToDisable ) && dateToDisable.inverted
        }).length

        // Check the calendar “enabled” flag and respectively flip the
        // disabled state. Then also check if it’s beyond the min/max limits.
        return calendar.item.enable === -1 ? !isDisabledMatch : isDisabledMatch ||
            dateToVerify.pick < calendar.item.min.pick ||
            dateToVerify.pick > calendar.item.max.pick

    } //DatePicker.prototype.disabled


    /**
     * Parse a string into a usable type.
     */
    DatePicker.prototype.parse = function( type, value, options ) {

        var calendar = this,
            parsingObject = {}

        // If it’s already parsed, we’re good.
        if ( !value || typeof value != 'string' ) {
            return value
        }

        // We need a `.format` to parse the value with.
        if ( !( options && options.format ) ) {
            options = options || {}
            options.format = calendar.settings.format
        }

        // Convert the format into an array and then map through it.
        calendar.formats.toArray( options.format ).map( function( label ) {

            var
                // Grab the formatting label.
                formattingLabel = calendar.formats[ label ],

                // The format length is from the formatting label function or the
                // label length without the escaping exclamation (!) mark.
                formatLength = formattingLabel ? _.trigger( formattingLabel, calendar, [ value, parsingObject ] ) : label.replace( /^!/, '' ).length

            // If there's a format label, split the value up to the format length.
            // Then add it to the parsing object with appropriate label.
            if ( formattingLabel ) {
                parsingObject[ label ] = value.substr( 0, formatLength )
            }

            // Update the value as the substring from format length to end.
            value = value.substr( formatLength )
        })

        // Compensate for month 0index.
        return [
            parsingObject.yyyy || parsingObject.yy,
            +( parsingObject.mm || parsingObject.m ) - 1,
            parsingObject.dd || parsingObject.d
        ]
    } //DatePicker.prototype.parse


    /**
     * Various formats to display the object in.
     */
    DatePicker.prototype.formats = (function() {

        // Return the length of the first word in a collection.
        function getWordLengthFromCollection( string, collection, dateObject ) {

            // Grab the first word from the string.
            // Regex pattern from http://stackoverflow.com/q/150033
            var word = string.match( /[^\x00-\x7F]+|[a-zA-Z0-9_\u0080-\u00FF]+/ )[ 0 ]

            // If there's no month index, add it to the date object
            if ( !dateObject.mm && !dateObject.m ) {
                dateObject.m = collection.indexOf( word ) + 1
            }

            // Return the length of the word.
            return word.length
        }

        // Get the length of the first word in a string.
        function getFirstWordLength( string ) {
            return string.match( /[a-zA-Z0-9_\u0080-\u00FF]+/ )[ 0 ].length
        }

        return {

            d: function( string, dateObject ) {

                // If there's string, then get the digits length.
                // Otherwise return the selected date.
                return string ? _.digits( string ) : dateObject.date
            },
            dd: function( string, dateObject ) {

                // If there's a string, then the length is always 2.
                // Otherwise return the selected date with a leading zero.
                return string ? 2 : _.lead( dateObject.date )
            },
            ddd: function( string, dateObject ) {

                // If there's a string, then get the length of the first word.
                // Otherwise return the short selected weekday.
                return string ? getFirstWordLength( string ) : this.settings.weekdaysShort[ dateObject.day ]
            },
            dddd: function( string, dateObject ) {

                // If there's a string, then get the length of the first word.
                // Otherwise return the full selected weekday.
                return string ? getFirstWordLength( string ) : this.settings.weekdaysFull[ dateObject.day ]
            },
            m: function( string, dateObject ) {

                // If there's a string, then get the length of the digits
                // Otherwise return the selected month with 0index compensation.
                return string ? _.digits( string ) : dateObject.month + 1
            },
            mm: function( string, dateObject ) {

                // If there's a string, then the length is always 2.
                // Otherwise return the selected month with 0index and leading zero.
                return string ? 2 : _.lead( dateObject.month + 1 )
            },
            mmm: function( string, dateObject ) {

                var collection = this.settings.monthsShort

                // If there's a string, get length of the relevant month from the short
                // months collection. Otherwise return the selected month from that collection.
                return string ? getWordLengthFromCollection( string, collection, dateObject ) : collection[ dateObject.month ]
            },
            mmmm: function( string, dateObject ) {

                var collection = this.settings.monthsFull

                // If there's a string, get length of the relevant month from the full
                // months collection. Otherwise return the selected month from that collection.
                return string ? getWordLengthFromCollection( string, collection, dateObject ) : collection[ dateObject.month ]
            },
            yy: function( string, dateObject ) {

                // If there's a string, then the length is always 2.
                // Otherwise return the selected year by slicing out the first 2 digits.
                return string ? 2 : ( '' + dateObject.year ).slice( 2 )
            },
            yyyy: function( string, dateObject ) {

                // If there's a string, then the length is always 4.
                // Otherwise return the selected year.
                return string ? 4 : dateObject.year
            },

            // Create an array by splitting the formatting string passed.
            toArray: function( formatString ) { return formatString.split( /(d{1,4}|m{1,4}|y{4}|yy|!.)/g ) },

            // Format an object into a string using the formatting options.
            toString: function ( formatString, itemObject ) {
                var calendar = this
                return calendar.formats.toArray( formatString ).map( function( label ) {
                    return _.trigger( calendar.formats[ label ], calendar, [ 0, itemObject ] ) || label.replace( /^!/, '' )
                }).join( '' )
            }
        }
    })() //DatePicker.prototype.formats




    /**
     * Check if two date units are the exact.
     */
    DatePicker.prototype.isDateExact = function( one, two ) {

        var calendar = this

        // When we’re working with weekdays, do a direct comparison.
        if (
            ( _.isInteger( one ) && _.isInteger( two ) ) ||
            ( typeof one == 'boolean' && typeof two == 'boolean' )
        ) {
            return one === two
        }

        // When we’re working with date representations, compare the “pick” value.
        if (
            ( _.isDate( one ) || $.isArray( one ) ) &&
            ( _.isDate( two ) || $.isArray( two ) )
        ) {
            return calendar.create( one ).pick === calendar.create( two ).pick
        }

        // When we’re working with range objects, compare the “from” and “to”.
        if ( $.isPlainObject( one ) && $.isPlainObject( two ) ) {
            return calendar.isDateExact( one.from, two.from ) && calendar.isDateExact( one.to, two.to )
        }

        return false
    }


    /**
     * Check if two date units overlap.
     */
    DatePicker.prototype.isDateOverlap = function( one, two ) {

        var calendar = this,
            firstDay = calendar.settings.firstDay ? 1 : 0

        // When we’re working with a weekday index, compare the days.
        if ( _.isInteger( one ) && ( _.isDate( two ) || $.isArray( two ) ) ) {
            one = one % 7 + firstDay
            return one === calendar.create( two ).day + 1
        }
        if ( _.isInteger( two ) && ( _.isDate( one ) || $.isArray( one ) ) ) {
            two = two % 7 + firstDay
            return two === calendar.create( one ).day + 1
        }

        // When we’re working with range objects, check if the ranges overlap.
        if ( $.isPlainObject( one ) && $.isPlainObject( two ) ) {
            return calendar.overlapRanges( one, two )
        }

        return false
    }


    /**
     * Flip the “enabled” state.
     */
    DatePicker.prototype.flipEnable = function(val) {
        var itemObject = this.item
        itemObject.enable = val || (itemObject.enable == -1 ? 1 : -1)
    }


    /**
     * Mark a collection of dates as “disabled”.
     */
    DatePicker.prototype.deactivate = function( type, datesToDisable ) {

        var calendar = this,
            disabledItems = calendar.item.disable.slice(0)


        // If we’re flipping, that’s all we need to do.
        if ( datesToDisable == 'flip' ) {
            calendar.flipEnable()
        }

        else if ( datesToDisable === false ) {
            calendar.flipEnable(1)
            disabledItems = []
        }

        else if ( datesToDisable === true ) {
            calendar.flipEnable(-1)
            disabledItems = []
        }

        // Otherwise go through the dates to disable.
        else {

            datesToDisable.map(function( unitToDisable ) {

                var matchFound

                // When we have disabled items, check for matches.
                // If something is matched, immediately break out.
                for ( var index = 0; index < disabledItems.length; index += 1 ) {
                    if ( calendar.isDateExact( unitToDisable, disabledItems[index] ) ) {
                        matchFound = true
                        break
                    }
                }

                // If nothing was found, add the validated unit to the collection.
                if ( !matchFound ) {
                    if (
                        _.isInteger( unitToDisable ) ||
                        _.isDate( unitToDisable ) ||
                        $.isArray( unitToDisable ) ||
                        ( $.isPlainObject( unitToDisable ) && unitToDisable.from && unitToDisable.to )
                    ) {
                        disabledItems.push( unitToDisable )
                    }
                }
            })
        }

        // Return the updated collection.
        return disabledItems
    } //DatePicker.prototype.deactivate


    /**
     * Mark a collection of dates as “enabled”.
     */
    DatePicker.prototype.activate = function( type, datesToEnable ) {

        var calendar = this,
            disabledItems = calendar.item.disable,
            disabledItemsCount = disabledItems.length

        // If we’re flipping, that’s all we need to do.
        if ( datesToEnable == 'flip' ) {
            calendar.flipEnable()
        }

        else if ( datesToEnable === true ) {
            calendar.flipEnable(1)
            disabledItems = []
        }

        else if ( datesToEnable === false ) {
            calendar.flipEnable(-1)
            disabledItems = []
        }

        // Otherwise go through the disabled dates.
        else {

            datesToEnable.map(function( unitToEnable ) {

                var matchFound,
                    disabledUnit,
                    index,
                    isExactRange

                // Go through the disabled items and try to find a match.
                for ( index = 0; index < disabledItemsCount; index += 1 ) {

                    disabledUnit = disabledItems[index]

                    // When an exact match is found, remove it from the collection.
                    if ( calendar.isDateExact( disabledUnit, unitToEnable ) ) {
                        matchFound = disabledItems[index] = null
                        isExactRange = true
                        break
                    }

                    // When an overlapped match is found, add the “inverted” state to it.
                    else if ( calendar.isDateOverlap( disabledUnit, unitToEnable ) ) {
                        if ( $.isPlainObject( unitToEnable ) ) {
                            unitToEnable.inverted = true
                            matchFound = unitToEnable
                        }
                        else if ( $.isArray( unitToEnable ) ) {
                            matchFound = unitToEnable
                            if ( !matchFound[3] ) matchFound.push( 'inverted' )
                        }
                        else if ( _.isDate( unitToEnable ) ) {
                            matchFound = [ unitToEnable.getFullYear(), unitToEnable.getMonth(), unitToEnable.getDate(), 'inverted' ]
                        }
                        break
                    }
                }

                // If a match was found, remove a previous duplicate entry.
                if ( matchFound ) for ( index = 0; index < disabledItemsCount; index += 1 ) {
                    if ( calendar.isDateExact( disabledItems[index], unitToEnable ) ) {
                        disabledItems[index] = null
                        break
                    }
                }

                // In the event that we’re dealing with an exact range of dates,
                // make sure there are no “inverted” dates because of it.
                if ( isExactRange ) for ( index = 0; index < disabledItemsCount; index += 1 ) {
                    if ( calendar.isDateOverlap( disabledItems[index], unitToEnable ) ) {
                        disabledItems[index] = null
                        break
                    }
                }

                // If something is still matched, add it into the collection.
                if ( matchFound ) {
                    disabledItems.push( matchFound )
                }
            })
        }

        // Return the updated collection.
        return disabledItems.filter(function( val ) { return val != null })
    } //DatePicker.prototype.activate


    /**
     * Create a string for the nodes in the picker.
     */
    DatePicker.prototype.nodes = function( isOpen ) {

        var
            calendar = this,
            settings = calendar.settings,
            calendarItem = calendar.item,
            nowObject = calendarItem.now,
            selectedObject = calendarItem.select,
            highlightedObject = calendarItem.highlight,
            viewsetObject = calendarItem.view,
            disabledCollection = calendarItem.disable,
            minLimitObject = calendarItem.min,
            maxLimitObject = calendarItem.max,


            // Create the calendar table head using a copy of weekday labels collection.
            // * We do a copy so we don't mutate the original array.
            tableHead = (function( collection, fullCollection ) {

                // If the first day should be Monday, move Sunday to the end.
                if ( settings.firstDay ) {
                    collection.push( collection.shift() )
                    fullCollection.push( fullCollection.shift() )
                }

                // Create and return the table head group.
                return _.node(
                    'thead',
                    _.node(
                        'tr',
                        _.group({
                            min: 0,
                            max: DAYS_IN_WEEK - 1,
                            i: 1,
                            node: 'th',
                            item: function( counter ) {
                                return [
                                    collection[ counter ],
                                    settings.klass.weekdays,
                                    'scope=col title="' + fullCollection[ counter ] + '"'
                                ]
                            }
                        })
                    )
                ) //endreturn
            })( ( settings.showWeekdaysFull ? settings.weekdaysFull : settings.weekdaysShort ).slice( 0 ), settings.weekdaysFull.slice( 0 ) ), //tableHead


            // Create the nav for next/prev month.
            createMonthNav = function( next ) {

                // Otherwise, return the created month tag.
                return _.node(
                    'div',
                    ' ',
                    settings.klass[ 'nav' + ( next ? 'Next' : 'Prev' ) ] + (

                        // If the focused month is outside the range, disabled the button.
                        ( next && viewsetObject.year >= maxLimitObject.year && viewsetObject.month >= maxLimitObject.month ) ||
                        ( !next && viewsetObject.year <= minLimitObject.year && viewsetObject.month <= minLimitObject.month ) ?
                            ' ' + settings.klass.navDisabled : ''
                    ),
                    'data-nav=' + ( next || -1 ) + ' ' + 'tabindex="0" ' +
                    _.ariaAttr({
                        role: 'button',
                        controls: calendar.$node[0].id + '_table'
                    }) + ' ' +
                    'title="' + (next ? settings.labelMonthNext : settings.labelMonthPrev ) + '"'
                ) //endreturn
            }, //createMonthNav


            // Create the month label.
            createMonthLabel = function() {

                var monthsCollection = settings.showMonthsShort ? settings.monthsShort : settings.monthsFull

                // If there are months to select, add a dropdown menu.
                if ( settings.selectMonths ) {

                    return _.node( 'select',
                        _.group({
                            min: 0,
                            max: 11,
                            i: 1,
                            node: 'option',
                            item: function( loopedMonth ) {

                                return [

                                    // The looped month and no classes.
                                    monthsCollection[ loopedMonth ], 0,

                                    // Set the value and selected index.
                                    'value=' + loopedMonth +
                                    ( viewsetObject.month == loopedMonth ? ' selected' : '' ) +
                                    (
                                        (
                                            ( viewsetObject.year == minLimitObject.year && loopedMonth < minLimitObject.month ) ||
                                            ( viewsetObject.year == maxLimitObject.year && loopedMonth > maxLimitObject.month )
                                        ) ?
                                            ' disabled' : ''
                                    )
                                ]
                            }
                        }),
                        settings.klass.selectMonth,
                        ( isOpen ? '' : 'disabled' ) + ' ' +
                        _.ariaAttr({ controls: calendar.$node[0].id + '_table' }) + ' ' +
                        'title="' + settings.labelMonthSelect + '"'
                    )
                }

                // If there's a need for a month selector
                return _.node( 'div', monthsCollection[ viewsetObject.month ], settings.klass.month )
            }, //createMonthLabel


            // Create the year label.
            createYearLabel = function() {

                var focusedYear = viewsetObject.year,

                    // If years selector is set to a literal "true", set it to 5. Otherwise
                    // divide in half to get half before and half after focused year.
                    numberYears = settings.selectYears === true ? 5 : ~~( settings.selectYears / 2 )

                // If there are years to select, add a dropdown menu.
                if ( numberYears ) {

                    var
                        minYear = minLimitObject.year,
                        maxYear = maxLimitObject.year,
                        lowestYear = focusedYear - numberYears,
                        highestYear = focusedYear + numberYears

                    // If the min year is greater than the lowest year, increase the highest year
                    // by the difference and set the lowest year to the min year.
                    if ( minYear > lowestYear ) {
                        highestYear += minYear - lowestYear
                        lowestYear = minYear
                    }

                    // If the max year is less than the highest year, decrease the lowest year
                    // by the lower of the two: available and needed years. Then set the
                    // highest year to the max year.
                    if ( maxYear < highestYear ) {

                        var availableYears = lowestYear - minYear,
                            neededYears = highestYear - maxYear

                        lowestYear -= availableYears > neededYears ? neededYears : availableYears
                        highestYear = maxYear
                    }

                    return _.node( 'select',
                        _.group({
                            min: lowestYear,
                            max: highestYear,
                            i: 1,
                            node: 'option',
                            item: function( loopedYear ) {
                                return [

                                    // The looped year and no classes.
                                    loopedYear, 0,

                                    // Set the value and selected index.
                                    'value=' + loopedYear + ( focusedYear == loopedYear ? ' selected' : '' )
                                ]
                            }
                        }),
                        settings.klass.selectYear,
                        ( isOpen ? '' : 'disabled' ) + ' ' + _.ariaAttr({ controls: calendar.$node[0].id + '_table' }) + ' ' +
                        'title="' + settings.labelYearSelect + '"'
                    )
                }

                // Otherwise just return the year focused
                return _.node( 'div', focusedYear, settings.klass.year )
            } //createYearLabel


        // Create and return the entire calendar.
        return _.node(
            'div',
            ( settings.selectYears ? createYearLabel() + createMonthLabel() : createMonthLabel() + createYearLabel() ) +
            createMonthNav() + createMonthNav( 1 ),
            settings.klass.header
            ) + _.node(
            'table',
            tableHead +
            _.node(
                'tbody',
                _.group({
                    min: 0,
                    max: WEEKS_IN_CALENDAR - 1,
                    i: 1,
                    node: 'tr',
                    item: function( rowCounter ) {

                        // If Monday is the first day and the month starts on Sunday, shift the date back a week.
                        var shiftDateBy = settings.firstDay && calendar.create([ viewsetObject.year, viewsetObject.month, 1 ]).day === 0 ? -7 : 0

                        return [
                            _.group({
                                min: DAYS_IN_WEEK * rowCounter - viewsetObject.day + shiftDateBy + 1, // Add 1 for weekday 0index
                                max: function() {
                                    return this.min + DAYS_IN_WEEK - 1
                                },
                                i: 1,
                                node: 'td',
                                item: function( targetDate ) {

                                    // Convert the time date from a relative date to a target date.
                                    targetDate = calendar.create([ viewsetObject.year, viewsetObject.month, targetDate + ( settings.firstDay ? 1 : 0 ) ])

                                    var isSelected = selectedObject && selectedObject.pick == targetDate.pick,
                                        isHighlighted = highlightedObject && highlightedObject.pick == targetDate.pick,
                                        isDisabled = disabledCollection && calendar.disabled( targetDate ) || targetDate.pick < minLimitObject.pick || targetDate.pick > maxLimitObject.pick,
                                        formattedDate = _.trigger( calendar.formats.toString, calendar, [ settings.format, targetDate ] ),
                                        calendarNodeUniqueId = settings.id + '_' + targetDate.pick

                                    return [
                                        _.node(
                                            'div',
                                            targetDate.date,
                                            (function( klasses ) {

                                                // Add the `infocus` or `outfocus` classes based on month in view.
                                                klasses.push( viewsetObject.month == targetDate.month ? settings.klass.infocus : settings.klass.outfocus )

                                                // Add the `today` class if needed.
                                                if ( nowObject.pick == targetDate.pick ) {
                                                    klasses.push( settings.klass.now )
                                                }

                                                // Add the `selected` class if something's selected and the time matches.
                                                if ( isSelected ) {
                                                    klasses.push( settings.klass.selected )
                                                }

                                                // Add the `highlighted` class if something's highlighted and the time matches.
                                                if ( isHighlighted ) {
                                                    klasses.push( settings.klass.highlighted )
                                                }

                                                // Add the `disabled` class if something's disabled and the object matches.
                                                if ( isDisabled ) {
                                                    klasses.push( settings.klass.disabled )
                                                }

                                                return klasses.join( ' ' )
                                            })([ settings.klass.day ]),
                                            'data-pick=' + targetDate.pick + ' id=' + calendarNodeUniqueId + ' tabindex="0" ' + _.ariaAttr({
                                                role: 'gridcell',
                                                label: formattedDate,
                                                selected: isSelected && calendar.$node.val() === formattedDate ? true : null,
                                                activedescendant: isHighlighted ? targetDate.pick : null,
                                                disabled: isDisabled ? true : null
                                            })
                                        ),
                                        ''
                                    ] //endreturn
                                }
                            })
                        ] //endreturn
                    }
                })
            ),
            settings.klass.table,
            'id="' + calendar.$node[0].id + '_table' + '" ' + _.ariaAttr({
                role: 'grid',
                controls: calendar.$node[0].id,
                readonly: true
            })
            ) +

            // * For Firefox forms to submit, make sure to set the buttons’ `type` attributes as “button”.
            _.node(
                'div',
                _.node( 'button', settings.today, settings.klass.buttonToday,
                    'type=button data-pick=' + nowObject.pick +
                    ( isOpen && !calendar.disabled(nowObject) ? '' : ' disabled' ) + ' ' +
                    _.ariaAttr({ controls: calendar.$node[0].id }) ) +
                _.node( 'button', settings.clear, settings.klass.buttonClear,
                    'type=button data-clear=1' +
                    ( isOpen ? '' : ' disabled' ) + ' ' +
                    _.ariaAttr({ controls: calendar.$node[0].id }) ) +
                _.node('button', settings.close, settings.klass.buttonClose,
                    'type=button data-close=true ' +
                    ( isOpen ? '' : ' disabled' ) + ' ' +
                    _.ariaAttr({ controls: calendar.$node[0].id }) ),
                settings.klass.footer
            ) //endreturn
    } //DatePicker.prototype.nodes




    /**
     * The date picker defaults.
     */
    DatePicker.defaults = (function( prefix ) {

        return {

            // The title label to use for the month nav buttons
            labelMonthNext: 'Next month',
            labelMonthPrev: 'Previous month',

            // The title label to use for the dropdown selectors
            labelMonthSelect: 'Select a month',
            labelYearSelect: 'Select a year',

            // Months and weekdays
            monthsFull: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
            monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
            weekdaysFull: [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
            weekdaysShort: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],

            // Today and clear
            today: 'Today',
            clear: 'Clear',
            close: 'Close',

            // Picker close behavior
            closeOnSelect: true,
            closeOnClear: true,

            // Update input value on select/clear
            updateInput: true,

            // The format to show on the `input` element
            format: 'd mmmm, yyyy',

            // Classes
            klass: {

                table: prefix + 'table',

                header: prefix + 'header',

                navPrev: prefix + 'nav--prev',
                navNext: prefix + 'nav--next',
                navDisabled: prefix + 'nav--disabled',

                month: prefix + 'month',
                year: prefix + 'year',

                selectMonth: prefix + 'select--month',
                selectYear: prefix + 'select--year',

                weekdays: prefix + 'weekday',

                day: prefix + 'day',
                disabled: prefix + 'day--disabled',
                selected: prefix + 'day--selected',
                highlighted: prefix + 'day--highlighted',
                now: prefix + 'day--today',
                infocus: prefix + 'day--infocus',
                outfocus: prefix + 'day--outfocus',

                footer: prefix + 'footer',

                buttonClear: prefix + 'button--clear',
                buttonToday: prefix + 'button--today',
                buttonClose: prefix + 'button--close'
            }
        }
    })( Picker.klasses().picker + '__' )





    /**
     * Extend the picker to add the date picker.
     */
    Picker.extend( 'pickadate', DatePicker )


}));



/*!
 * Time picker for pickadate.js v3.6.4
 * http://amsul.github.io/pickadate.js/time.htm
 */

(function ( factory ) {

    // AMD.
    if ( typeof define == 'function' && define.amd )
        define( ['./picker', 'jquery'], factory )

    // Node.js/browserify.
    else if ( typeof exports == 'object' )
        module.exports = factory( require('./picker.js'), require('jquery') )

    // Browser globals.
    else factory( Picker, jQuery )

}(function( Picker, $ ) {


    /**
     * Globals and constants
     */
    var HOURS_IN_DAY = 24,
        MINUTES_IN_HOUR = 60,
        HOURS_TO_NOON = 12,
        MINUTES_IN_DAY = HOURS_IN_DAY * MINUTES_IN_HOUR,
        _ = Picker._



    /**
     * The time picker constructor
     */
    function TimePicker( picker, settings ) {

        var clock = this,
            elementValue = picker.$node[ 0 ].value,
            elementDataValue = picker.$node.data( 'value' ),
            valueString = elementDataValue || elementValue,
            formatString = elementDataValue ? settings.formatSubmit : settings.format

        clock.settings = settings
        clock.$node = picker.$node

        // The queue of methods that will be used to build item objects.
        clock.queue = {
            interval: 'i',
            min: 'measure create',
            max: 'measure create',
            now: 'now create',
            select: 'parse create validate',
            highlight: 'parse create validate',
            view: 'parse create validate',
            disable: 'deactivate',
            enable: 'activate'
        }

        // The component's item object.
        clock.item = {}

        clock.item.clear = null
        clock.item.interval = settings.interval || 30
        clock.item.disable = ( settings.disable || [] ).slice( 0 )
        clock.item.enable = -(function( collectionDisabled ) {
            return collectionDisabled[ 0 ] === true ? collectionDisabled.shift() : -1
        })( clock.item.disable )

        clock.
        set( 'min', settings.min ).
        set( 'max', settings.max ).
        set( 'now' )

        // When there’s a value, set the `select`, which in turn
        // also sets the `highlight` and `view`.
        if ( valueString ) {
            clock.set( 'select', valueString, {
                format: formatString
            })
        }

        // If there’s no value, default to highlighting “today”.
        else {
            clock.
            set( 'select', null ).
            set( 'highlight', clock.item.now )
        }

        // The keycode to movement mapping.
        clock.key = {
            40: 1, // Down
            38: -1, // Up
            39: 1, // Right
            37: -1, // Left
            go: function( timeChange ) {
                clock.set(
                    'highlight',
                    clock.item.highlight.pick + timeChange * clock.item.interval,
                    { interval: timeChange * clock.item.interval }
                )
                this.render()
            }
        }


        // Bind some picker events.
        picker.
        on( 'render', function() {
            var $pickerHolder = picker.$root.children(),
                $viewset = $pickerHolder.find( '.' + settings.klass.viewset ),
                vendors = function( prop ) {
                    return ['webkit', 'moz', 'ms', 'o', ''].map(function( vendor ) {
                        return ( vendor ? '-' + vendor + '-' : '' ) + prop
                    })
                },
                animations = function( $el, state ) {
                    vendors( 'transform' ).map(function( prop ) {
                        $el.css( prop, state )
                    })
                    vendors( 'transition' ).map(function( prop ) {
                        $el.css( prop, state )
                    })
                }
            if ( $viewset.length ) {
                animations( $pickerHolder, 'none' )
                $pickerHolder[ 0 ].scrollTop = ~~$viewset.position().top - ( $viewset[ 0 ].clientHeight * 2 )
                animations( $pickerHolder, '' )
            }
        }, 1 ).
        on( 'open', function() {
            picker.$root.find( 'button' ).attr( 'disabled', false )
        }, 1 ).
        on( 'close', function() {
            picker.$root.find( 'button' ).attr( 'disabled', true )
        }, 1 )

    } //TimePicker


    /**
     * Set a timepicker item object.
     */
    TimePicker.prototype.set = function( type, value, options ) {

        var clock = this,
            clockItem = clock.item

        // If the value is `null` just set it immediately.
        if ( value === null ) {
            if ( type == 'clear' ) type = 'select'
            clockItem[ type ] = value
            return clock
        }

        // Otherwise go through the queue of methods, and invoke the functions.
        // Update this as the time unit, and set the final value as this item.
        // * In the case of `enable`, keep the queue but set `disable` instead.
        //   And in the case of `flip`, keep the queue but set `enable` instead.
        clockItem[ ( type == 'enable' ? 'disable' : type == 'flip' ? 'enable' : type ) ] = clock.queue[ type ].split( ' ' ).map( function( method ) {
            value = clock[ method ]( type, value, options )
            return value
        }).pop()

        // Check if we need to cascade through more updates.
        if ( type == 'select' ) {
            clock.set( 'highlight', clockItem.select, options )
        }
        else if ( type == 'highlight' ) {
            clock.set( 'view', clockItem.highlight, options )
        }
        else if ( type == 'interval' ) {
            clock.
            set( 'min', clockItem.min, options ).
            set( 'max', clockItem.max, options )
        }
        else if ( type.match( /^(flip|min|max|disable|enable)$/ ) ) {
            if ( clockItem.select && clock.disabled( clockItem.select ) ) {
                clock.set( 'select', value, options )
            }
            if ( clockItem.highlight && clock.disabled( clockItem.highlight ) ) {
                clock.set( 'highlight', value, options )
            }
            if ( type == 'min' ) {
                clock.set( 'max', clockItem.max, options )
            }
        }

        return clock
    } //TimePicker.prototype.set


    /**
     * Get a timepicker item object.
     */
    TimePicker.prototype.get = function( type ) {
        return this.item[ type ]
    } //TimePicker.prototype.get


    /**
     * Create a picker time object.
     */
    TimePicker.prototype.create = function( type, value, options ) {

        var clock = this

        // If there’s no value, use the type as the value.
        value = value === undefined ? type : value

        // If it’s a date object, convert it into an array.
        if ( _.isDate( value ) ) {
            value = [ value.getHours(), value.getMinutes() ]
        }

        // If it’s an object, use the “pick” value.
        if ( $.isPlainObject( value ) && _.isInteger( value.pick ) ) {
            value = value.pick
        }

        // If it’s an array, convert it into minutes.
        else if ( $.isArray( value ) ) {
            value = +value[ 0 ] * MINUTES_IN_HOUR + (+value[ 1 ])
        }

        // If no valid value is passed, set it to “now”.
        else if ( !_.isInteger( value ) ) {
            value = clock.now( type, value, options )
        }

        // If we’re setting the max, make sure it’s greater than the min.
        if ( type == 'max' && value < clock.item.min.pick ) {
            value += MINUTES_IN_DAY
        }

        // If the value doesn’t fall directly on the interval,
        // add one interval to indicate it as “passed”.
        if ( type != 'min' && type != 'max' && (value - clock.item.min.pick) % clock.item.interval !== 0 ) {
            value += clock.item.interval
        }

        // Normalize it into a “reachable” interval.
        value = clock.normalize( type, value, options )

        // Return the compiled object.
        return {

            // Divide to get hours from minutes.
            hour: ~~( HOURS_IN_DAY + value / MINUTES_IN_HOUR ) % HOURS_IN_DAY,

            // The remainder is the minutes.
            mins: ( MINUTES_IN_HOUR + value % MINUTES_IN_HOUR ) % MINUTES_IN_HOUR,

            // The time in total minutes.
            time: ( MINUTES_IN_DAY + value ) % MINUTES_IN_DAY,

            // Reference to the “relative” value to pick.
            pick: value % MINUTES_IN_DAY
        }
    } //TimePicker.prototype.create


    /**
     * Create a range limit object using an array, date object,
     * literal “true”, or integer relative to another time.
     */
    TimePicker.prototype.createRange = function( from, to ) {

        var clock = this,
            createTime = function( time ) {
                if ( time === true || $.isArray( time ) || _.isDate( time ) ) {
                    return clock.create( time )
                }
                return time
            }

        // Create objects if possible.
        if ( !_.isInteger( from ) ) {
            from = createTime( from )
        }
        if ( !_.isInteger( to ) ) {
            to = createTime( to )
        }

        // Create relative times.
        if ( _.isInteger( from ) && $.isPlainObject( to ) ) {
            from = [ to.hour, to.mins + ( from * clock.settings.interval ) ];
        }
        else if ( _.isInteger( to ) && $.isPlainObject( from ) ) {
            to = [ from.hour, from.mins + ( to * clock.settings.interval ) ];
        }

        return {
            from: createTime( from ),
            to: createTime( to )
        }
    } //TimePicker.prototype.createRange


    /**
     * Check if a time unit falls within a time range object.
     */
    TimePicker.prototype.withinRange = function( range, timeUnit ) {
        range = this.createRange(range.from, range.to)
        return timeUnit.pick >= range.from.pick && timeUnit.pick <= range.to.pick
    }


    /**
     * Check if two time range objects overlap.
     */
    TimePicker.prototype.overlapRanges = function( one, two ) {

        var clock = this

        // Convert the ranges into comparable times.
        one = clock.createRange( one.from, one.to )
        two = clock.createRange( two.from, two.to )

        return clock.withinRange( one, two.from ) || clock.withinRange( one, two.to ) ||
            clock.withinRange( two, one.from ) || clock.withinRange( two, one.to )
    }


    /**
     * Get the time relative to now.
     */
    TimePicker.prototype.now = function( type, value/*, options*/ ) {

        var interval = this.item.interval,
            date = new Date(),
            nowMinutes = date.getHours() * MINUTES_IN_HOUR + date.getMinutes(),
            isValueInteger = _.isInteger( value ),
            isBelowInterval

        // Make sure “now” falls within the interval range.
        nowMinutes -= nowMinutes % interval

        // Check if the difference is less than the interval itself.
        isBelowInterval = value < 0 && interval * value + nowMinutes <= -interval

        // Add an interval because the time has “passed”.
        nowMinutes += type == 'min' && isBelowInterval ? 0 : interval

        // If the value is a number, adjust by that many intervals.
        if ( isValueInteger ) {
            nowMinutes += interval * (
                isBelowInterval && type != 'max' ?
                    value + 1 :
                    value
            )
        }

        // Return the final calculation.
        return nowMinutes
    } //TimePicker.prototype.now


    /**
     * Normalize minutes to be “reachable” based on the min and interval.
     */
    TimePicker.prototype.normalize = function( type, value/*, options*/ ) {

        var interval = this.item.interval,
            minTime = this.item.min && this.item.min.pick || 0

        // If setting min time, don’t shift anything.
        // Otherwise get the value and min difference and then
        // normalize the difference with the interval.
        value -= type == 'min' ? 0 : ( value - minTime ) % interval

        // Return the adjusted value.
        return value
    } //TimePicker.prototype.normalize


    /**
     * Measure the range of minutes.
     */
    TimePicker.prototype.measure = function( type, value, options ) {

        var clock = this

        // If it’s anything false-y, set it to the default.
        if ( !value ) {
            value = type == 'min' ? [ 0, 0 ] : [ HOURS_IN_DAY - 1, MINUTES_IN_HOUR - 1 ]
        }

        // If it’s a string, parse it.
        if ( typeof value == 'string' ) {
            value = clock.parse( type, value )
        }

        // If it’s a literal true, or an integer, make it relative to now.
        else if ( value === true || _.isInteger( value ) ) {
            value = clock.now( type, value, options )
        }

        // If it’s an object already, just normalize it.
        else if ( $.isPlainObject( value ) && _.isInteger( value.pick ) ) {
            value = clock.normalize( type, value.pick, options )
        }

        return value
    } ///TimePicker.prototype.measure


    /**
     * Validate an object as enabled.
     */
    TimePicker.prototype.validate = function( type, timeObject, options ) {

        var clock = this,
            interval = options && options.interval ? options.interval : clock.item.interval

        // Check if the object is disabled.
        if ( clock.disabled( timeObject ) ) {

            // Shift with the interval until we reach an enabled time.
            timeObject = clock.shift( timeObject, interval )
        }

        // Scope the object into range.
        timeObject = clock.scope( timeObject )

        // Do a second check to see if we landed on a disabled min/max.
        // In that case, shift using the opposite interval as before.
        if ( clock.disabled( timeObject ) ) {
            timeObject = clock.shift( timeObject, interval * -1 )
        }

        // Return the final object.
        return timeObject
    } //TimePicker.prototype.validate


    /**
     * Check if an object is disabled.
     */
    TimePicker.prototype.disabled = function( timeToVerify ) {

        var clock = this,

            // Filter through the disabled times to check if this is one.
            isDisabledMatch = clock.item.disable.filter( function( timeToDisable ) {

                // If the time is a number, match the hours.
                if ( _.isInteger( timeToDisable ) ) {
                    return timeToVerify.hour == timeToDisable
                }

                // If it’s an array, create the object and match the times.
                if ( $.isArray( timeToDisable ) || _.isDate( timeToDisable ) ) {
                    return timeToVerify.pick == clock.create( timeToDisable ).pick
                }

                // If it’s an object, match a time within the “from” and “to” range.
                if ( $.isPlainObject( timeToDisable ) ) {
                    return clock.withinRange( timeToDisable, timeToVerify )
                }
            })

        // If this time matches a disabled time, confirm it’s not inverted.
        isDisabledMatch = isDisabledMatch.length && !isDisabledMatch.filter(function( timeToDisable ) {
            return $.isArray( timeToDisable ) && timeToDisable[2] == 'inverted' ||
                $.isPlainObject( timeToDisable ) && timeToDisable.inverted
        }).length

        // If the clock is "enabled" flag is flipped, flip the condition.
        return clock.item.enable === -1 ? !isDisabledMatch : isDisabledMatch ||
            timeToVerify.pick < clock.item.min.pick ||
            timeToVerify.pick > clock.item.max.pick
    } //TimePicker.prototype.disabled


    /**
     * Shift an object by an interval until we reach an enabled object.
     */
    TimePicker.prototype.shift = function( timeObject, interval ) {

        var clock = this,
            minLimit = clock.item.min.pick,
            maxLimit = clock.item.max.pick/*,
        safety = 1000*/

        interval = interval || clock.item.interval

        // Keep looping as long as the time is disabled.
        while ( /*safety &&*/ clock.disabled( timeObject ) ) {

            /*safety -= 1
            if ( !safety ) {
                throw 'Fell into an infinite loop while shifting to ' + timeObject.hour + ':' + timeObject.mins + '.'
            }*/

            // Increase/decrease the time by the interval and keep looping.
            timeObject = clock.create( timeObject.pick += interval )

            // If we've looped beyond the limits, break out of the loop.
            if ( timeObject.pick <= minLimit || timeObject.pick >= maxLimit ) {
                break
            }
        }

        // Return the final object.
        return timeObject
    } //TimePicker.prototype.shift


    /**
     * Scope an object to be within range of min and max.
     */
    TimePicker.prototype.scope = function( timeObject ) {
        var minLimit = this.item.min.pick,
            maxLimit = this.item.max.pick
        return this.create( timeObject.pick > maxLimit ? maxLimit : timeObject.pick < minLimit ? minLimit : timeObject )
    } //TimePicker.prototype.scope


    /**
     * Parse a string into a usable type.
     */
    TimePicker.prototype.parse = function( type, value, options ) {

        var hour, minutes, isPM, item, parseValue,
            clock = this,
            parsingObject = {}

        // If it’s already parsed, we’re good.
        if ( !value || typeof value != 'string' ) {
            return value
        }

        // We need a `.format` to parse the value with.
        if ( !( options && options.format ) ) {
            options = options || {}
            options.format = clock.settings.format
        }

        // Convert the format into an array and then map through it.
        clock.formats.toArray( options.format ).map( function( label ) {

            var
                substring,

                // Grab the formatting label.
                formattingLabel = clock.formats[ label ],

                // The format length is from the formatting label function or the
                // label length without the escaping exclamation (!) mark.
                formatLength = formattingLabel ?
                    _.trigger( formattingLabel, clock, [ value, parsingObject ] ) :
                    label.replace( /^!/, '' ).length

            // If there's a format label, split the value up to the format length.
            // Then add it to the parsing object with appropriate label.
            if ( formattingLabel ) {
                substring = value.substr( 0, formatLength )
                parsingObject[ label ] = substring.match(/^\d+$/) ? +substring : substring
            }

            // Update the time value as the substring from format length to end.
            value = value.substr( formatLength )
        })

        // Grab the hour and minutes from the parsing object.
        for ( item in parsingObject ) {
            parseValue = parsingObject[item]
            if ( _.isInteger(parseValue) ) {
                if ( item.match(/^(h|hh)$/i) ) {
                    hour = parseValue
                    if ( item == 'h' || item == 'hh' ) {
                        hour %= 12
                    }
                }
                else if ( item == 'i' ) {
                    minutes = parseValue
                }
            }
            else if ( item.match(/^a$/i) && parseValue.match(/^p/i) && ('h' in parsingObject || 'hh' in parsingObject) ) {
                isPM = true
            }
        }

        // Calculate it in minutes and return.
        return (isPM ? hour + 12 : hour) * MINUTES_IN_HOUR + minutes
    } //TimePicker.prototype.parse


    /**
     * Various formats to display the object in.
     */
    TimePicker.prototype.formats = {

        h: function( string, timeObject ) {

            // If there's string, then get the digits length.
            // Otherwise return the selected hour in "standard" format.
            return string ? _.digits( string ) : timeObject.hour % HOURS_TO_NOON || HOURS_TO_NOON
        },
        hh: function( string, timeObject ) {

            // If there's a string, then the length is always 2.
            // Otherwise return the selected hour in "standard" format with a leading zero.
            return string ? 2 : _.lead( timeObject.hour % HOURS_TO_NOON || HOURS_TO_NOON )
        },
        H: function( string, timeObject ) {

            // If there's string, then get the digits length.
            // Otherwise return the selected hour in "military" format as a string.
            return string ? _.digits( string ) : '' + ( timeObject.hour % 24 )
        },
        HH: function( string, timeObject ) {

            // If there's string, then get the digits length.
            // Otherwise return the selected hour in "military" format with a leading zero.
            return string ? _.digits( string ) : _.lead( timeObject.hour % 24 )
        },
        i: function( string, timeObject ) {

            // If there's a string, then the length is always 2.
            // Otherwise return the selected minutes.
            return string ? 2 : _.lead( timeObject.mins )
        },
        a: function( string, timeObject ) {

            // If there's a string, then the length is always 4.
            // Otherwise check if it's more than "noon" and return either am/pm.
            return string ? 4 : MINUTES_IN_DAY / 2 > timeObject.time % MINUTES_IN_DAY ? 'a.m.' : 'p.m.'
        },
        A: function( string, timeObject ) {

            // If there's a string, then the length is always 2.
            // Otherwise check if it's more than "noon" and return either am/pm.
            return string ? 2 : MINUTES_IN_DAY / 2 > timeObject.time % MINUTES_IN_DAY ? 'AM' : 'PM'
        },

        // Create an array by splitting the formatting string passed.
        toArray: function( formatString ) { return formatString.split( /(h{1,2}|H{1,2}|i|a|A|!.)/g ) },

        // Format an object into a string using the formatting options.
        toString: function ( formatString, itemObject ) {
            var clock = this
            return clock.formats.toArray( formatString ).map( function( label ) {
                return _.trigger( clock.formats[ label ], clock, [ 0, itemObject ] ) || label.replace( /^!/, '' )
            }).join( '' )
        }
    } //TimePicker.prototype.formats




    /**
     * Check if two time units are the exact.
     */
    TimePicker.prototype.isTimeExact = function( one, two ) {

        var clock = this

        // When we’re working with minutes, do a direct comparison.
        if (
            ( _.isInteger( one ) && _.isInteger( two ) ) ||
            ( typeof one == 'boolean' && typeof two == 'boolean' )
        ) {
            return one === two
        }

        // When we’re working with time representations, compare the “pick” value.
        if (
            ( _.isDate( one ) || $.isArray( one ) ) &&
            ( _.isDate( two ) || $.isArray( two ) )
        ) {
            return clock.create( one ).pick === clock.create( two ).pick
        }

        // When we’re working with range objects, compare the “from” and “to”.
        if ( $.isPlainObject( one ) && $.isPlainObject( two ) ) {
            return clock.isTimeExact( one.from, two.from ) && clock.isTimeExact( one.to, two.to )
        }

        return false
    }


    /**
     * Check if two time units overlap.
     */
    TimePicker.prototype.isTimeOverlap = function( one, two ) {

        var clock = this

        // When we’re working with an integer, compare the hours.
        if ( _.isInteger( one ) && ( _.isDate( two ) || $.isArray( two ) ) ) {
            return one === clock.create( two ).hour
        }
        if ( _.isInteger( two ) && ( _.isDate( one ) || $.isArray( one ) ) ) {
            return two === clock.create( one ).hour
        }

        // When we’re working with range objects, check if the ranges overlap.
        if ( $.isPlainObject( one ) && $.isPlainObject( two ) ) {
            return clock.overlapRanges( one, two )
        }

        return false
    }


    /**
     * Flip the “enabled” state.
     */
    TimePicker.prototype.flipEnable = function(val) {
        var itemObject = this.item
        itemObject.enable = val || (itemObject.enable == -1 ? 1 : -1)
    }


    /**
     * Mark a collection of times as “disabled”.
     */
    TimePicker.prototype.deactivate = function( type, timesToDisable ) {

        var clock = this,
            disabledItems = clock.item.disable.slice(0)


        // If we’re flipping, that’s all we need to do.
        if ( timesToDisable == 'flip' ) {
            clock.flipEnable()
        }

        else if ( timesToDisable === false ) {
            clock.flipEnable(1)
            disabledItems = []
        }

        else if ( timesToDisable === true ) {
            clock.flipEnable(-1)
            disabledItems = []
        }

        // Otherwise go through the times to disable.
        else {

            timesToDisable.map(function( unitToDisable ) {

                var matchFound

                // When we have disabled items, check for matches.
                // If something is matched, immediately break out.
                for ( var index = 0; index < disabledItems.length; index += 1 ) {
                    if ( clock.isTimeExact( unitToDisable, disabledItems[index] ) ) {
                        matchFound = true
                        break
                    }
                }

                // If nothing was found, add the validated unit to the collection.
                if ( !matchFound ) {
                    if (
                        _.isInteger( unitToDisable ) ||
                        _.isDate( unitToDisable ) ||
                        $.isArray( unitToDisable ) ||
                        ( $.isPlainObject( unitToDisable ) && unitToDisable.from && unitToDisable.to )
                    ) {
                        disabledItems.push( unitToDisable )
                    }
                }
            })
        }

        // Return the updated collection.
        return disabledItems
    } //TimePicker.prototype.deactivate


    /**
     * Mark a collection of times as “enabled”.
     */
    TimePicker.prototype.activate = function( type, timesToEnable ) {

        var clock = this,
            disabledItems = clock.item.disable,
            disabledItemsCount = disabledItems.length

        // If we’re flipping, that’s all we need to do.
        if ( timesToEnable == 'flip' ) {
            clock.flipEnable()
        }

        else if ( timesToEnable === true ) {
            clock.flipEnable(1)
            disabledItems = []
        }

        else if ( timesToEnable === false ) {
            clock.flipEnable(-1)
            disabledItems = []
        }

        // Otherwise go through the disabled times.
        else {

            timesToEnable.map(function( unitToEnable ) {

                var matchFound,
                    disabledUnit,
                    index,
                    isRangeMatched

                // Go through the disabled items and try to find a match.
                for ( index = 0; index < disabledItemsCount; index += 1 ) {

                    disabledUnit = disabledItems[index]

                    // When an exact match is found, remove it from the collection.
                    if ( clock.isTimeExact( disabledUnit, unitToEnable ) ) {
                        matchFound = disabledItems[index] = null
                        isRangeMatched = true
                        break
                    }

                    // When an overlapped match is found, add the “inverted” state to it.
                    else if ( clock.isTimeOverlap( disabledUnit, unitToEnable ) ) {
                        if ( $.isPlainObject( unitToEnable ) ) {
                            unitToEnable.inverted = true
                            matchFound = unitToEnable
                        }
                        else if ( $.isArray( unitToEnable ) ) {
                            matchFound = unitToEnable
                            if ( !matchFound[2] ) matchFound.push( 'inverted' )
                        }
                        else if ( _.isDate( unitToEnable ) ) {
                            matchFound = [ unitToEnable.getFullYear(), unitToEnable.getMonth(), unitToEnable.getDate(), 'inverted' ]
                        }
                        break
                    }
                }

                // If a match was found, remove a previous duplicate entry.
                if ( matchFound ) for ( index = 0; index < disabledItemsCount; index += 1 ) {
                    if ( clock.isTimeExact( disabledItems[index], unitToEnable ) ) {
                        disabledItems[index] = null
                        break
                    }
                }

                // In the event that we’re dealing with an overlap of range times,
                // make sure there are no “inverted” times because of it.
                if ( isRangeMatched ) for ( index = 0; index < disabledItemsCount; index += 1 ) {
                    if ( clock.isTimeOverlap( disabledItems[index], unitToEnable ) ) {
                        disabledItems[index] = null
                        break
                    }
                }

                // If something is still matched, add it into the collection.
                if ( matchFound ) {
                    disabledItems.push( matchFound )
                }
            })
        }

        // Return the updated collection.
        return disabledItems.filter(function( val ) { return val != null })
    } //TimePicker.prototype.activate


    /**
     * The division to use for the range intervals.
     */
    TimePicker.prototype.i = function( type, value/*, options*/ ) {
        return _.isInteger( value ) && value > 0 ? value : this.item.interval
    }


    /**
     * Create a string for the nodes in the picker.
     */
    TimePicker.prototype.nodes = function( isOpen ) {

        var
            clock = this,
            settings = clock.settings,
            selectedObject = clock.item.select,
            highlightedObject = clock.item.highlight,
            viewsetObject = clock.item.view,
            disabledCollection = clock.item.disable

        return _.node(
            'ul',
            _.group({
                min: clock.item.min.pick,
                max: clock.item.max.pick,
                i: clock.item.interval,
                node: 'li',
                item: function( loopedTime ) {
                    loopedTime = clock.create( loopedTime )
                    var timeMinutes = loopedTime.pick,
                        isSelected = selectedObject && selectedObject.pick == timeMinutes,
                        isHighlighted = highlightedObject && highlightedObject.pick == timeMinutes,
                        isDisabled = disabledCollection && clock.disabled( loopedTime ),
                        formattedTime = _.trigger( clock.formats.toString, clock, [ settings.format, loopedTime ] )
                    return [
                        _.trigger( clock.formats.toString, clock, [ _.trigger( settings.formatLabel, clock, [ loopedTime ] ) || settings.format, loopedTime ] ),
                        (function( klasses ) {

                            if ( isSelected ) {
                                klasses.push( settings.klass.selected )
                            }

                            if ( isHighlighted ) {
                                klasses.push( settings.klass.highlighted )
                            }

                            if ( viewsetObject && viewsetObject.pick == timeMinutes ) {
                                klasses.push( settings.klass.viewset )
                            }

                            if ( isDisabled ) {
                                klasses.push( settings.klass.disabled )
                            }

                            return klasses.join( ' ' )
                        })( [ settings.klass.listItem ] ),
                        'data-pick=' + loopedTime.pick + ' ' + _.ariaAttr({
                            role: 'option',
                            label: formattedTime,
                            selected: isSelected && clock.$node.val() === formattedTime ? true : null,
                            activedescendant: isHighlighted ? true : null,
                            disabled: isDisabled ? true : null
                        })
                    ]
                }
            }) +

            // * For Firefox forms to submit, make sure to set the button’s `type` attribute as “button”.
            _.node(
                'li',
                _.node(
                    'button',
                    settings.clear,
                    settings.klass.buttonClear,
                    'type=button data-clear=1' + ( isOpen ? '' : ' disabled' ) + ' ' +
                    _.ariaAttr({ controls: clock.$node[0].id })
                ),
                'picker__list-item-footer', _.ariaAttr({ role: 'presentation' })
            ),
            settings.klass.list,
            _.ariaAttr({ role: 'listbox', controls: clock.$node[0].id })
        )
    } //TimePicker.prototype.nodes







    /**
     * Extend the picker to add the component with the defaults.
     */
    TimePicker.defaults = (function( prefix ) {

        return {

            // Clear
            clear: 'Clear',

            // The format to show on the `input` element
            format: 'h:i A',

            // The interval between each time
            interval: 30,

            // Picker close behavior
            closeOnSelect: true,
            closeOnClear: true,

            // Update input value on select/clear
            updateInput: true,

            // Classes
            klass: {

                picker: prefix + ' ' + prefix + '--time',
                holder: prefix + '__holder',

                list: prefix + '__list',
                listItem: prefix + '__list-item',

                disabled: prefix + '__list-item--disabled',
                selected: prefix + '__list-item--selected',
                highlighted: prefix + '__list-item--highlighted',
                viewset: prefix + '__list-item--viewset',
                now: prefix + '__list-item--now',

                buttonClear: prefix + '__button--clear'
            }
        }
    })( Picker.klasses().picker )





    /**
     * Extend the picker to add the time picker.
     */
    Picker.extend( 'pickatime', TimePicker )


}));



$(document).ready(()=>{
    initRippleEvent();
});


function initRippleEvent() {
    let rippleElementList = document.getElementsByClassName('has-ripple-effect');
    for (let element of rippleElementList) {
        initRippleEventForElement(element);
    }
}


// call this function, when an element is dynamically loaded (ajax, ...)
function initRippleEventForElement(element) {
    $(element).unbind('click.rippleEffect').bind('click.rippleEffect', ($event) => {
        initRippleEventAnimation($event);
    });
}


function initRippleEventAnimation($event) {
    let element = $event.target;
    // find current or closest parent element with ripple effect class
    let i = 7;
    while (i >= 0) {
        if (element.classList.contains('has-ripple-effect')) {
            break;
        }
        element = element.parentElement;
        i--;
    }

    // get effect position (click position, element position)
    let positionData = element.getBoundingClientRect();
    let x = $event.pageX - positionData.x - window.scrollX;
    let y = $event.pageY - positionData.y - window.scrollY;


    // animation
    let duration = 1000;
    let animationFrame, animationStart;

    let animationStep = function (timestamp) {
        if (!animationStart) {
            animationStart = timestamp;
        }
        let frame = timestamp - animationStart;
        if (frame < duration) {
            let easing = (frame / duration) * (2 - (frame / duration));

            let circle = 'circle 300px at ' + x + 'px ' + y + 'px';
            let color = 'rgba(0, 0, 0, ' + (0.3 * (1 - easing)) + ')';
            let stop = 90 * easing + '%';

            element.style.backgroundImage = 'radial-gradient(' + circle + ', ' + color + ' ' + stop + ', transparent ' + stop + ')';

            animationFrame = window.requestAnimationFrame(animationStep);
        } else {
            element.style.backgroundImage = 'none';
            window.cancelAnimationFrame(animationFrame);
        }

    };

    animationFrame = window.requestAnimationFrame(animationStep);
}/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


datePickerElement = null;

function initDatePicker($this) {
    // pickadate api documentation https://amsul.ca/pickadate.js/api/#method-get-value
    $element = $($this).pickadate({
        container: '#datePickerOutlet',
        format: 'dd.mm.yyyy',
        labelMonthNext: '',
        labelMonthPrev: '',
        labelMonthSelect: '',
        labelYearSelect: '',
        selectMonths: true,
        selectYears: true,
        firstDay: 1,
        closeOnSelect: true,
        today: 'heute',
        clear: 'zurücksetzen',
        close: 'schließen',
    });

    var picker = $element.pickadate('picker');

    showDatePickerWrapper();

    picker.on({
        open: function () {
            //console.log('open');
        },
        start: function () {
            //console.log('start');
        },
        close: function () {
            //console.log('close');
            hideDatePickerWrapper();
        },
        render: function () {
            //console.log('render');
        },
        stop: function () {
            //console.log('stop');
        },
        set: function (context) {
            onDateSelected(picker);
        }
    });

    initHighlightedDate(picker);
}


function onDateSelected(picker) {
    let selectedDate = picker.get('select');
    if (selectedDate) {
        updateDateForDatePickerLeftSide(selectedDate);
    }
}


function initHighlightedDate(picker)
{
    let highlightedDate = picker.get('highlight');
    if (highlightedDate) {
        //updateDateForDatePickerLeftSide(highlightedDate);
    }
}

/*
function updateDateForDatePickerLeftSide(dateData) {
    $('#datePickerWrapper').find('.text-year').text(dateData.year);
    $('#datePickerWrapper').find('.text-day-name').text(customDatePickerLang[datePickerlangCode].days[dateData.day]);
    $('#datePickerWrapper').find('.text-date').text(dateData.date);
    $('#datePickerWrapper').find('.text-month').text(customDatePickerLang[datePickerlangCode].month[dateData.month]);
}
*/


function initDatumInputEvent() {
    $('.has-datepicker').unbind("click.datumInput").bind("click.datumInput", function ($event) {
        initDatePicker(this);
    });

    $(window).resize(()=>{
        hideDatePickerWrapper();
    });
}


function showDatePickerWrapper()
{
    setTimeout(()=>{
        $('#datePickerWrapper').addClass('open').closest('.page-overlay').addClass('show');
        $('body').addClass('no-scroll');
    },50);
}


function hideDatePickerWrapper()
{
    $('#datePickerWrapper').removeClass('open').closest('.page-overlay').removeClass('show');
    $('body').removeClass('no-scroll');
}


datePickerlangCode = 'de';
customDatePickerLang = {
    de: {
        days: {
            0: 'Sonntag',
            1: 'Montag',
            2: 'Dienstag',
            3: 'Mittwoch',
            4: 'Donnerstag',
            5: 'Freitag',
            6: 'Sonnabend',
        },
        month: {
            0: 'Jan',
            1: 'Feb',
            2: 'Mär',
            3: 'Apr',
            4: 'Mai',
            5: 'Jun',
            6: 'Jul',
            7: 'Aug',
            8: 'Sep',
            9: 'Okt',
            10: 'Nov',
            11: 'Dez',
        }
    },
    en: {
        days: {
            0: 'Sun',
            1: 'Mon',
            2: 'Tue',
            3: 'Wed',
            4: 'Thu',
            5: 'Fri',
            6: 'Sat',
        },
        month: {
            0: 'Jan',
            1: 'Feb',
            2: 'Mar',
            3: 'Apr',
            4: 'May',
            5: 'Jun',
            6: 'Jul',
            7: 'Aug',
            8: 'Sep',
            9: 'Oct',
            10: 'Nov',
            11: 'Dec',
        }
    }
};function template_fileinput_focusEffect($that) {
    var input = $that.find("input");
    input.unbind("focus.focusEffect").bind("focus.focusEffect", function (e) {
        $that.addClass("focusEffect");
    });
    input.unbind("blur.focusEffect").bind("blur.focusEffect", function (e) {
        $that.removeClass("focusEffect");
    });
}


function template_fileinput_required_($that) {
    var input = $that.find("input");
    var check = true;
    if (input.val() == "") {
        $that.addClass("required-invalid");
        check = false;
    } else {
        $that.removeClass("required-invalid");
    }
    return check;
}

function template_fileinput_required($that) {
    var input = $that.find("input");
    $that.addClass("required");
    input.unbind("blur.required").bind("blur.required", function (e) {
        template_textinput_required_($that);
    });
    input.unbind("keyup.required").bind("keyup.required", function (e) {
        template_textinput_required_($that);
    });
}


function initFileUploadEvents() {
    console.log('#initFileDropZone');

    $('.drop-zone').on(
        'dragover',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.drop-zone').on(
        'dragenter',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.drop-zone').on(
        'drop',
        function ($event) {
            if ($event.originalEvent.dataTransfer && $event.originalEvent.dataTransfer.files.length) {
                $event.preventDefault();
                $event.stopPropagation();

                /*UPLOAD FILES HERE*/
                let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
                let files = $event.originalEvent.dataTransfer.files;
                uploadFile(fileUploadId, files);
            }
        }
    );

    $('.drop-zone').on('click',
        function () {
            let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
            $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"] > input').trigger('click');
        }
    );

    $('.template_fileinput input:file').change(function () {
        let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
        let files = this.files;
        uploadFile(fileUploadId, files);
    });

    $('.template_fileinput .file-action [data-remove-file]').unbind('click.remove_file').bind('click.remove_file', function() {
        let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
        let fileName = $(this).data('remove-file');
        removeFile(fileUploadId, fileName);
    });
}


function uploadFile(fileUploadId, fileDataList) {

    $fileInputContainer = $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    for (let i = 0; i < fileDataList.length; i++) {
        formData.append(i, fileDataList[i]);
    }
    $.ajax({
        url: 'http://localhost/crm/inc/services/FileUpload/upload.php', // point to server-side PHP script
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (responseHtml) {
            $fileInputContainer.replaceWith(responseHtml);
            $loadingOverlay.removeClass('loading-active');
            document_ready();
        }
    });
}


function removeFile(fileUploadId, fileName) {

    $fileInputContainer = $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    formData.append('fileName', fileName);

    $.ajax({
        url: 'http://localhost/crm/inc/services/FileUpload/remove.php', // point to server-side PHP script
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (responseHtml) {
            $fileInputContainer.replaceWith(responseHtml);
            $loadingOverlay.removeClass('loading-active');
            document_ready();
        }
    });
}
function allRequiredFields() {
    var check=true;
    var test=true;
    $("form .template_textinput.required").each(function() {
        test=template_textinput_required_($(this));
        if (test==false) {
            check=false;
        }
    });
    $("form .template_textarea.required").each(function() {
        test=template_textarea_required_($(this));
        if (test==false) {
            check=false;
        }
    })
    return check;
}


function formRequest($that) {
    var form_ele = $that.closest("form");

        $that.click(function (e) {
            
            e.preventDefault();
            template_progressbar.start();
            
            var check_required=allRequiredFields();
            if (check_required==false) {
                jq1112("body,html").scrollTop(0);
                return false;
            }

            var target = "main";
            if (typeof form_ele.attr("target") != typeof undefined && form_ele.attr("target") != "") {
                target = form_ele.attr("target");
                form_ele.attr("target", "");
            }


            var data = new FormData();
            //Form data
            var form_data = form_ele.serializeArray();
            $.each(form_data, function (key, input) {
               
                if (input.value=="on") {
                    input.value=1;
                }

                data.append(input.name, input.value);
            });

           

            data.append($that.attr("name"),$that.attr("value"));
            data.append("run_utf8_decode","1");
            

            var post = form_ele.serialize();
            post += "&" + $that.attr("name") + "=" + encodeURIComponent($that.attr("value")) + "&run_utf8_decode=1";
             //File data
            $('input[type="file"]',form_ele).each(function() {
               var name=$(this).attr("name"); 
               var file_data = $(this)[0].files;
               for (var i = 0; i < file_data.length; i++) {
                data.append(name+"[]", file_data[i]);
                }
            });

            var url = form_ele.attr("action");

            var variant = "GET";
            if (form_ele.attr("method") == "GET" || form_ele.attr("method") == "get") {


                if (url.match(/\?/)) {
                    url += "&" + post;
                } else {
                    url += "?" + post;
                }
                url = url.replace("&&", "&");

                RequestHelper.get(url, function (response) {
                    jq1112("div[name='" + target + "']").css("opacity","0");
                    setTimeout(function() {
                        jq1112("div[name='" + target + "']").html(response);
                        jq1112("div[name='" + target + "']").css("opacity","1");
                        
                        jq1112("div[name='" + target + "']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                    },40);
                }, true, true,true);
            } else {
                RequestHelper.post(url, data, function (response) {
                    
                   jq1112("div[name='" + target + "']").css("opacity","0");
                    setTimeout(function() {
                        jq1112("div[name='" + target + "']").html(response);
                        jq1112("div[name='" + target + "']").css("opacity","1");
                        
                        jq1112("div[name='" + target + "']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                    },40);
                }, true, true,true);
            }


            return;

        });
};
$inlineOverlayWrapper = null;

function initInlineOverlay() {
    $inlineOverlayWrapper = $('#inlineOverlay');
    hideInlineOverlay();
    this.initInlineOverlayClickEvent();
    this.initInlineOverlayOutsideClickEvent();
}

function initInlineOverlayOutsideClickEvent()
{
    $(window).unbind("click.inlineOverlayOutside").bind("click.inlineOverlayOutside",function($event) {
        if ($('#inlineOverlay').hasClass('open'))
        {
            hideInlineOverlay(document.getElementById('inlineOverlay'));
        }
    });
}


function initInlineOverlayClickEvent() {
    $inlineOverlayWrapper.unbind("click.inlineOverlay").bind("click.inlineOverlay",function($event) {
        $event.stopPropagation();
    });
}


function initInlineOverlayTrigger(element) {
    let triggerElement = element[0];

    $(element[0]).unbind("click.inlineOverlayTrigger").bind("click.inlineOverlayTrigger",function($event) {
        let inlineOverlayContentId = triggerElement.getAttribute('data-inline-overlay-content-id');
        let inlineOverlayContent = document.querySelectorAll('.inline-overlay-content[data-inline-overlay-content-id="' + inlineOverlayContentId + '"]')[0];

        hideInlineOverlay();
        setTimeout(() => {
            prepareInlineOverlayContent(inlineOverlayContent);
            setTimeout(() => {
                prepareInlineOverlayStyle($event);
                showInlineOverlay();
            }, 25);
        }, 25);
    });
}


function prepareInlineOverlayContent(inlineOverlayContent) {
    $(inlineOverlayContent).clone(true).appendTo($inlineOverlayWrapper);

}


function prepareInlineOverlayStyle($event) {
    // get new content element inside wrapper
    let inlineOverlayContent = $inlineOverlayWrapper[0];

    let safetyOffset = 40;
    let menuHeight = inlineOverlayContent.offsetHeight + safetyOffset;
    let maxMenuHeight = menuHeight + 30; // set max height for performance
    let menuWidth = inlineOverlayContent.offsetWidth + safetyOffset;
    let transformOrigin = '';

    // check right overlap
    if ($event.clientX + menuWidth > window.innerWidth) {
        $inlineOverlayWrapper.css('left', ($event.clientX + window.scrollX - (menuWidth - safetyOffset)) + 'px');
        transformOrigin += 'right';
    } else {
        $inlineOverlayWrapper.css('left', ($event.clientX + window.scrollX) + 'px');
        transformOrigin += 'left';
    }

    // check bottom overlap
    if ($event.clientY + menuHeight > window.innerHeight) {
        // menu opening direction bottom - top
        $inlineOverlayWrapper.css('top', ($event.clientY + window.scrollY - (menuHeight - safetyOffset)) + 'px');
        transformOrigin += ' bottom';
    } else {
        // menu opening direction top - bottom
        $inlineOverlayWrapper.css('top', ($event.clientY + window.scrollY) + 'px');
        transformOrigin += ' top';
    }

    // $inlineOverlayWrapper.css('maxHeight', maxMenuHeight + 'px'); // does not work for current version
    $inlineOverlayWrapper.css('transformOrigin', transformOrigin);

    initRippleEvent();
}


function hideInlineOverlay() {
    $inlineOverlayWrapper.removeClass('open').empty();
}


function showInlineOverlay(inlineOverlayWrapper) {
    $inlineOverlayWrapper.addClass('open');
}
function requestResponseToContent($that) {
    
    var url = $that.attr("href");
    if (typeof url != typeof undefined && (url.indexOf("mailto") != -1 || url.indexOf("javascript") != -1)) {
        return;
    }

    if ($that.attr("href") && $that.attr("href").charAt(0) != "#" && $that.attr("href") != "javascript:" && $that.attr("href") != "javascript:;" && $that.attr("href") != "javascript:void(0);" && $that.attr("href") != "") {
        
        var target = "main";
        if (typeof $that.attr("target") != typeof undefined && $that.attr("target") != "") {

            target = $that.attr("target");
            $that.attr("target", "");
        }

        $that.unbind("click.changeTarget").bind("click.changeTarget",function() {
            template_progressbar.start();
            RequestHelper.get(url, function (response) {

                    jq1112("div[name='" + target + "']").css("opacity","0");
                    setTimeout(function() {
                        jq1112("div[name='" + target + "']").html(response);
                        jq1112("div[name='" + target + "']").css("opacity","1");
                        
                        jq1112("div[name='" + target + "']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                    },40);

            }, true, true,true);
        });
        $that.attr("href", "javascript:void(0);");
    }
}

function modern_template_link_formSubmit($that) {
    
}


var template_progressbar = {
    value:0,
    max:100,
    bar:null,
    
    start:function() {
        this.bar=jq1112("#main_template_progressbar div:first-child");
        this.bar.css({"width":"5%","display":""});
     //   console.log("template_progressbar start");
    },
    setprogress:function(w) {
        this.bar.css({"width":w+"%"});
     //   console.log("template_progressbar "+w);
    },
    end:function() {
        this.bar.css("width","100%");
     //   console.log("template_progressbar end");
        setTimeout(function() { 
            template_progressbar.bar.css("display","none");
            template_progressbar.bar.css("width","0%");
        },1000);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function tableSort($that) {
    $(".sorts a", $that).each(function () {
        $(this).unbind("click").bind("click", function () {
            tableContentClose();
            var direction = $(this).attr("data-sort");
            var name = $(this).closest("td,th").attr("data-name");
            //var $rows = $that.find('tr').not(".drow-header");
            var $table = $(this).closest(".dtable");

            // close expanded rows
            $table.find('.drow.opener').removeClass("opener");
            $table.find('.drow.opened').remove();

            var $rows = $('tbody > tr', $table).not(".drow-header");

            // toggle to next value
            switch (direction)
            {
                case 'asc':
                    direction = 'desc';
                    break;

                case 'desc':
                    direction = 'none';
                    break;

                case 'none':
                    direction = 'asc';
                    break;
            }

            $('.sort.sort-toggle').attr('data-sort', 'none'); // reset all other
            $(this).attr("data-sort", direction);

            $rows.sort(function (a, b) {
                var keyA, keyB, sortDirection;

                switch (direction)
                {
                    case 'none': // use row id
                        keyA = $(a).attr('data-row-zaehler');
                        keyB = $(b).attr('data-row-zaehler');
                        sortDirection = 'asc';
                        break;

                    default: // use cell value
                        keyA = $("*[data-name='" + name + "'] .searchable", a).text().toLowerCase();
                        keyB = $("*[data-name='" + name + "'] .searchable", b).text().toLowerCase();
                        sortDirection = direction;
                }

                switch (sortDirection)
                {
                    case 'asc':
                        return keyA > keyB ? 1 : -1;

                    case 'desc':
                        return keyA < keyB ? 1 : -1;
                }
            });

            $.each($rows, function (index, row) {
                $table.append(row);
            });
        });
    })
}


function tableFilterChange($that) {
    var $content = $that;
    $(".filter-list select", $content).each(function () {
        var name = $(this).attr("name");
        var select_val = $(this).val();

        if (select_val == -1) {
        } else {
            var $row = $(".dtable .drow", $content).not(".drow-header");
            var sammle=[];
            $row.each(function (index ) {
                $(this).find("*[data-name='" + name + "'] .td").each(function ( ) {
                    $(this).find(".filterable").each(function ( ) {
                        var ex=select_val.split("#####");
                        if (ex.indexOf($(this).text())!=-1) {
                            sammle[index]=index;
                        }
                    });
                });
            });
            $row.each(function (index ) {
                if (sammle.indexOf(index)!=-1) {} else {
                     $(this).css("display", "none");
                    $(this).addClass("filter_notfound");
                }
            });
           
        }
    });
    $(window).trigger('resize');
}


function tableFilter($that) {
    var $content = $that;
    $(".filter-list select", $content).each(function () {
        $(this).unbind("change").bind("change", function () {
            tableContentClose();
            $(".dtable .drow", $content).not(".search_notfound").css("display", "");
            $(".dtable .drow", $content).removeClass("filter_notfound");
            tableFilterChange($that);
            if ($(this).val() == "-1") {
                $(this).removeClass("changed");
            } else {
                $(this).addClass("changed");
            }
        });
    });
}


function tableFilterTrigger($that) {
    var $content = $that.closest(".template_table");

    // $(".dtable",$content).addClass("fadeOut");

    $($that).unbind("click").bind("click", function () {
        // $(".dtable",$content).addClass("fadeOut");

        if ($(window).width() <= 900) {


            var that = $(".filter-list", $content);



            var overlay = $(".filter-overlay", $content);
            if (that.hasClass("sichtbar")) {
                that.removeClass("sichtbar");
                that.css("transform", "");

                overlay.css("display", "block");
                overlay.animate({
                    opacity: 0
                }, 150, function () {
                    overlay.css("display", "none");

                });



                $("html", topmain.document).unbind('click.filterhelperoutside');
            } else {
                var ps_filter_nav = new PerfectScrollbar(".filter-list", {
                    wheelSpeed: 2,
                    wheelPropagation: false,
                    minScrollbarLength: 20
                });
                that.addClass("sichtbar");
                that.css("transform", "translateX(0)");

                overlay.css("display", "block");
                overlay.animate({
                    opacity: 1
                }, 150, function () {

                });


                $("html", topmain.document).unbind("click.filterhelperoutside").bind('click.filterhelperoutside', function (e) {
                    if (
                            ($(e.target).closest("div[name=menu]").length === 0) &&
                            ($(e.target).closest(".filter-trigger").length === 0) &&
                            ($(e.target).closest(".filter-list").length === 0)
                            ) {
                        $that.trigger("click");
                    }
                });
            }
        } else {

            if (!$content.hasClass("filter_open")) {
                $content.addClass("filter_open");
            } else {
                $content.removeClass("filter_open");
            }
            setTimeout(function () {
                $(window).trigger('resize');
            }, 300);

        }
    });
}

var tableWidth_collapsed_trigger=false;
function tableWidth($that) {
    
    var table = $that;
    var table_width = table.width();
    var table_inner = table.find("> .dtable");
    var table_inner_width = table_inner.width();

    var first_row = table_inner.find("tbody > .drow:first-child");
    var collapse_element = first_row.find(".drow2").not(".collapsed").not(".mit_priority").not(".collapsed-more").last();

    var priority = [];


    if (table_inner_width > table_width && collapse_element.length > 0) {

        collapse_element.css("display", "none").addClass("collapsed");

        table_inner.find(".drow").each(function () {
            $(this).find(".drow2").eq(collapse_element.index()).css("display", "none").addClass("collapsed");
        });
        tableWidth_collapsed_trigger=true;
        tableWidth($that);
        return;
    }
    if (table_inner_width > table_width && collapse_element.length <= 0) {

        var last_higher = 0;
        var last_higher_element = null;
        first_row.find(".drow2").not(".collapsed").not(".collapsed-more").each(function () {
            var priority = $(this).attr("data-priority");
            //console.log("priority "+priority);
            if (parseInt(priority) > parseInt(last_higher)) {
                last_higher = priority;
                last_higher_element = $(this);
            }
        });
        //console.log("last_higher "+last_higher);
        last_higher_element.css("display", "none").addClass("collapsed");
        table_inner.find(".drow").each(function () {
            $(this).find(".drow2").eq(last_higher_element.index()).css("display", "none").addClass("collapsed");
        });
        tableWidth_collapsed_trigger=true;
        tableWidth($that);
        return;
    }

    setTimeout(function () {
        if (tableWidth_collapsed_trigger==false) {
            $that.find(".collapsed_trigger").css("display","none");
        }
        table_inner.removeClass("fadeOut");
       
    }, 100);
}


function tableWidthInit($that) {
    tableWidth_collapsed_trigger=false;
    $that.find("> .dtable").addClass("fadeOut");
    $that.find(".collapsed_trigger").css("display","");
    var table = $that;
    table.find(".collapsed").css("display", "").removeClass("collapsed");
    if ($(window).outerWidth() < 992) {
        return;
    }
    tableWidth($that);
    jq1112(window).resized(
        function () {
            tableContentClose();
            $that.find(".collapsed_trigger").css("display","");
            tableWidth_collapsed_trigger=false;
            $that.find("> .dtable").addClass("fadeOut");
            tableWidthInit($that);
        }, 100
   );
}


function tableContentClose() {
    $(".content_expand").closest(".drow").each(function() {
        var ele=$(this);
        ele.removeClass("opener");
        ele.next(".opened").remove();
        ele.next(".opened").remove();
        ele.find(".content_expand i").html("add_circle_outline");
    }); 
}

function tableContentExpand(ele) {
    ele = ele.closest(".drow");

    if (!ele.hasClass("opener")) {
        var collapse_element = ele.find(".collapsed").not(".collapsed-more");
        var table_inner = ele.closest(".dtable");
        var first_row = table_inner.find("tbody > .drow:first-child");
        var html = "<div class='dtable_inner'>";
        collapse_element.each(function () {
            var that = $(this);

     
           
            
   

            html += "<div class='drow_inner'><div class='dcol_inner'>" + first_row.find(".drow2").eq($(this).index()).find(".dcol").html() + "</div><div class='dcol_inner'>" + that.find(".dcol").eq(1).html() + "</div></div>";
        })
        html += "</div></div>";

        ele.addClass("opener");
        
        
        var inner_table=$("<tr class='drow opened'><td colspan='100'>" + html + "</td></tr>");
        $(".template_tooltip.remove_on_tablecontentexpand",inner_table).each(function() {
            template_tooltip_destroy($(this));
        });
        $(".template_text.remove_on_tablecontentexpand",inner_table).each(function() {
            template_truncate_destroy($(this));
        });
        
        inner_table.insertAfter(ele);
        $("<tr class='drow opened' style='display: none'><td></td></tr>").insertAfter(ele);

        ele.find(".content_expand i").html("remove_circle_outline");
    } else {
        ele.removeClass("opener");
        ele.next(".opened").remove();
        ele.next(".opened").remove();
        ele.find(".content_expand i").html("add_circle_outline");
    }

    runFunctionsByDataTag('data-on-document-changed', false);
}


function tableContentExpandInit($that) {
    var $content = $that;

    $(".content_expand", $content).unbind("click").bind("click", function () {
        tableContentExpand($(this));
    });
}






function tableSearch($that) {
    var $content = $that;

    $(".table-search input", $content).unbind("keyup").bind("keyup", function (event) {
        if (event.which == 40 || event.which == 38) {
        } else {
            tableContentClose();
            var searchtext = $(this).val();

            var such2 = searchtext;
            such2 = such2.replace("Ã¤", "ae").replace("Ã¶", "oe").replace("Ã¼", "ue");
            such2 = such2.replace("Ã„", "Ae").replace("Ã–", "Oe").replace("Ãœ", "Ue");

            var such3 = searchtext;
            such3 = such3.replace("ae", "Ã¤").replace("oe", "Ã¶").replace("ue", "Ã¼");
            such3 = such3.replace("Ae", "Ã„").replace("Oe", "Ã–").replace("Ue", "Ãœ");

            if (searchtext == "") {
                $(".dtable .drow", $content).not(".drow-header").each(function () {
                    var $row = $(this);
                    $(".searchable", $row).each(function () {
                        jq1112(this).html(jq1112(this).html()
                                .split("<!--highlight1--><span class='found'>").join("")
                                .split('<!--highlight1--><span class="found">').join("")
                                .split("</span><!--highlight2-->").join("")
                                );
                    });
                    $row.removeClass("search_notfound");
                    $row.not(".filter_notfound").css("display", "");
                });
                return;
            }


            var regex = new RegExp(searchtext + "", 'i');
            var regex2 = new RegExp(such2 + "", 'i');
            var regex3 = new RegExp(such3 + "", 'i');

            $(".dtable .drow", $content).not(".drow-header").each(function () {
                var $row = $(this);
                var etwas_gefunden = false;
                $(".searchable", $row).each(function () {
                    if ($(this).closest(".th").length===0) {
                        
                    
                    var text = $(this).text();
                    
                    if ($(this).attr("truncated-text") && $(this).attr("truncated-text")!='') {
                        text = $(this).attr("truncated-text");
                    }
                    
                    var results = text.match(regex);
                    var results2 = text.match(regex2);
                    var results3 = text.match(regex3);


                    if ((results != null && results.length > 0 && results[0] != "") || (results2 != null && results2.length > 0 && results2[0] != "") || (results3 != null && results3.length > 0 && results3[0] != "")) {
                        if (results != null && results.length > 0 && results[0] != "") {
                            var result2 = text.replace(results[0], "<!--highlight1--><span class='found'>" + results[0] + "</span><!--highlight2-->");
                        }

                        if (results2 != null && results2.length > 0 && results2[0] != "") {
                            var result2 = text.replace(results2[0], "<!--highlight1--><span class='found'>" + results2[0] + "</span><!--highlight2-->");
                        }

                        if (results3 != null && results3.length > 0 && results3[0] != "") {
                            var result2 = text.replace(results3[0], "<!--highlight1--><span class='found'>" + results3[0] + "</span><!--highlight2-->");
                        }
                        etwas_gefunden = true;
                        
                        
                        if ($(this).attr("truncated-text") && $(this).attr("truncated-text")!='') {
                        } else {
                        
                        $(this).html(result2);
                    }
                    } else {
                        $(this).html($(this).html()
                                .split("<!--highlight1--><span class='found'>").join("")
                                .split('<!--highlight1--><span class="found">').join("")
                                .split("</span><!--highlight2-->").join("")
                                );
                    }
                    }
                });
                if (etwas_gefunden) {
                    $row.removeClass("search_notfound");
                    $row.not(".filter_notfound").css("display", "");
                } else {
                    $(this).css("display", "none").addClass("search_notfound");
                }
            })
        }
    });
}



var currentlyScrolling = false;

var SCROLL_AREA_TOP_HEIGHT = 56; // Distance from window's top and bottom edge.
var SCROLL_AREA_BOTTOM_HEIGHT = 34; // Distance from window's top and bottom edge.


function tableSortable($that) {


    //$(document).scrollTop( {scrolltop} );

   
    $that.find(".dtable > tbody").sortable({
        axis: "y",
        //     cursorAt: { top: -30 },
        placeholder: "ui-state-highlight",
        items: "tr:not(.notsortaable)",
        scroll: true,
        //    scrollSensitivity: 450,
        revert: false,
        forcePlaceholderSize: false,
        forceHelperSize: false,
        //    helper: "clone",
        opacity: 1,
        tolerance: 'pointer',
        handle: ".sortable_move",
        distance: 0,
        create: function (event, ui) {
             
        },
        update: function (event, ui) {
            var richtung = '';
            var target = -1;


            if (parseInt(ui.item.prev().attr('data-row-zaehler')) > parseInt(ui.item.attr('data-row-zaehler'))) {
                richtung = "&unten=" + ui.item.attr('data-row-id');
                target = ui.item.prev().attr('data-row-id');
            } else {
                richtung = "&oben=" + ui.item.attr('data-row-id');
                target = ui.item.next().attr('data-row-id');
            }


            var url = $that.find(".sortable_href").attr("data-href");
            url = url + richtung + "&target=" + target;


            template_progressbar.start();
            RequestHelper.get(url, function (response) {



                jq1112("div[name='main']").css("opacity", "0");
                setTimeout(function () {
                    jq1112("div[name='main']").html(response);
                    jq1112("div[name='main']").css("opacity", "1");

                    jq1112("div[name='main']").ready(function () {
                        document_ready();
                        window_load();
                        template_progressbar.end();
                    });
                }, 40);

            }, true, true, true);
            
            $that.find("*[oldcss]").each(function() {
                $(this).attr("style",$(this).attr("oldcss"));
            });
           // $that.find(".dtable > tbody").sortable( "refreshPositions" );
            // window.location.href = "admin_telefonreport.php?" + richtung + "&sortrang=1&target=" + target + "&parent_id=" + $("input[name='parent_id']").val() + "&fragen=" + $("input[name='fragen']").val() + "&scrollTop=" + $(document).scrollTop();
        },
        sort: function (event, ui) {
            // $(".ui-state-highlight").html("<td colspan='100'></td>");
         
           
            // autoScroll();
          
            if (currentlyScrolling) {
                return;
            }

            var windowHeight = $(window).height();
            var mouseYPosition = event.clientY;
            var mouseYPosition = (ui.item.offset().top);
//console.log((mouseYPosition-jq1112(document).scrollTop())+" "+(SCROLL_AREA_TOP_HEIGHT)+" "+($that.find(".dtable > tbody .notsortaable").offset().top+$that.find(".dtable > tbody .notsortaable").height()));

            if ((mouseYPosition - jq1112(document).scrollTop()) < SCROLL_AREA_TOP_HEIGHT) {
                currentlyScrolling = true;

                $('html, body').animate({
                    scrollTop: "-=" + ui.item.height() + "px" // Scroll up half of window height.
                },
                        800, // 400ms animation.
                        function () {
                            currentlyScrolling = false;
                        });

            } else if ((mouseYPosition + ui.item.height() - jq1112(document).scrollTop()) > (windowHeight - SCROLL_AREA_BOTTOM_HEIGHT)) {

                currentlyScrolling = true;

                $('html, body').animate({
                    scrollTop: "+=" + ui.item.height() + "px" // Scroll down half of window height.
                },
                        800, // 400ms animation.
                        function () {
                            currentlyScrolling = false;
                        });

            }
     

        },
        start: function (event, ui) {
            $(".ui-state-highlight").css("display","none");
            ui.item.css("position","relative");


           // ui.item.attr("oldcss",(typeof ui.item.attr("style") != typeof undefined?ui.item.attr("style"):" "));
            ui.item.css("width",ui.item.closest("table").outerWidth());
            ui.item.css("height",ui.item.height());
            
            
            $that.find(".dtable > tbody > tr:first-child").each(function() {
               $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("width",$(this).outerWidth());
            });
            $that.find(".dtable > tbody > tr:first-child").find(".drow2").each(function() {
                $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("width",$(this).outerWidth());
            });
            ui.item.find(".drow2").each(function() {
                $(this).attr("oldcss",(typeof $(this).attr("style") != typeof undefined?$(this).attr("style"):" "));
                $(this).css("height",$(this).outerHeight());
                $(this).css("width",$(this).outerWidth());
            });
            
            
            
            
            $(".ui-state-highlight").css("width", ui.item.closest("table").outerWidth());
            $(".ui-state-highlight").css("height", ui.item.height());
            $(".ui-state-highlight").html("<td colspan='1000'></td>");
             ui.item.css("position","absolute");
             $(".ui-state-highlight").css("display","");
        },
        stop: function (event, ui) {
       
            $that.find("*[oldcss]").each(function() {
                $(this).attr("style",$(this).attr("oldcss"));
            });
           // $that.find(".dtable > tbody").sortable( "refresh" );
           // ui.item.find(".dcol").css("border","");
        }
    });
    $that.find(".dtable > tbody").disableSelection();
}










                  
function template_table_getFloatWidth(ele) {
    //return parseInt(window.getComputedStyle(ele).width.split("px").join(""));
    return parseInt(ele.outerWidth());
}             
   
function template_table_getFloatHeight(ele) {
    //return parseInt(window.getComputedStyle(ele).height.split("px").join(""));
    return parseInt(ele.outerHeight());
}    

function template_table_froze_head_reset() {
    
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

function frozeHead(tag) {

    return;
    if (crm_version>61) {} else { return; }
    template_table_froze_head_reset();
  
    
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
       

        head_table.css({"width":template_table_getFloatWidth(main_table),"height":template_table_getFloatHeight(head_table),"position":"relative"});
        main_table.css("width",template_table_getFloatWidth(main_table));
        head.css({"height":template_table_getFloatHeight(head_table),"display":"none"});
        
       
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
            var doc_ask=56;

            if (doc!=document) {

                doc_ask=jq1112(this).offset().top;
                abfang_top=jq1112(document).scrollTop();
                abfang_left=jq1112(document).scrollLeft();
            }

           //console.log("a"+a+" scroll:"+scroll+" a2:"+a2+" doc_ask:"+doc_ask+" height"+(doc_ask-scroll)+" "+(((-1*a)-scroll)<=getFloatHeight(main_table)-40)+" "+((-1*a)-scroll)+" "+(getFloatHeight(main_table)-40)+" ");

 

            if ((main_table.offset().top-scroll)<doc_ask && (scroll-(a2-doc_ask))<(template_table_getFloatHeight(main_table)-40)) {
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



function template_textinput_focusEffect($that) {
    var input=$that.find("input");
    input.unbind("focus.focusEffect").bind("focus.focusEffect",function (e) {
        $that.addClass("focusEffect");
    });
    input.unbind("blur.focusEffect").bind("blur.focusEffect",function (e) {
        $that.removeClass("focusEffect");
    });
}

function template_textinput_required_($that) {
    var input=$that.find("input");
    var check=true;
    if (input.val()=="") {
        $that.addClass("required-invalid");
        check=false;
    } else {
        $that.removeClass("required-invalid");
    }
    return check;
}

function template_textinput_required($that) {
    var input=$that.find("input");
    $that.addClass("required");
    input.unbind("blur.required").bind("blur.required",function (e) {
        template_textinput_required_($that);
    });
    input.unbind("keyup.required").bind("keyup.required",function (e) {
        template_textinput_required_($that);
    });
}

timePickerElement = null;

function initTimePicker($this) {
    // pickadate api documentation https://amsul.ca/pickadate.js/api/#method-get-value
    $element = $($this).pickatime({
        container: '#timePickerOutlet',
        format: 'HH:i',
        labelMonthNext: '',
        labelMonthPrev: '',
        labelMonthSelect: '',
        labelYearSelect: '',
        selectMonths: true,
        selectYears: true,
        firstDay: 1,
        closeOnSelect: true,
        today: 'heute',
        clear: 'zurücksetzen',
        close: 'schließen',
    });

    var picker = $element.pickatime('picker');

    showTimePickerWrapper();

    picker.on({
        open: function () {
            //console.log('open');
        },
        start: function () {
            //console.log('start');
        },
        close: function () {
            //console.log('close');
            hideTimePickerWrapper();
        },
        render: function () {
            //console.log('render');
        },
        stop: function () {
            //console.log('stop');
        },
        set: function (context) {
            onTimeSelected(picker);
        }
    });

    initHighlightedTime(picker);
}


function onTimeSelected(picker) {
    let selectedTime = picker.get('select');
    if (selectedTime) {
        updateTimeForTimePickerLeftSide(selectedTime);
    }
}


function initHighlightedTime(picker)
{
    let highlightedTime = picker.get('highlight');
    if (highlightedTime) {
        //updateTimeForTimePickerLeftSide(highlightedTime);
    }
}

/*
function updateTimeForTimePickerLeftSide(timeData) {
    $('#timePickerWrapper').find('.text-time').text(timePad(timeData.hour,2) + ':' + timePad(timeData.mins,2));
}
*/

function initTimeInputEvent() {
    $('.has-timepicker').unbind("click.zeitInput").bind("click.zeitInput", function ($event) {
        initTimePicker(this);
    });

    $(window).resize(()=>{
        hideTimePickerWrapper();
    });
}


function showTimePickerWrapper()
{
    setTimeout(()=>{
        $('#timePickerWrapper').addClass('open').closest('.page-overlay').addClass('show');
        $('body').addClass('no-scroll');
    },0);
}


function hideTimePickerWrapper()
{
    $('#timePickerWrapper').removeClass('open').closest('.page-overlay').removeClass('show');
    $('body').removeClass('no-scroll');
}


function timePad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}
function template_textarea_focusEffect($that) {
    var input=$that.find("textarea");
    input.unbind("focus.focusEffect").bind("focus.focusEffect",function (e) {
        $that.addClass("focusEffect");
    });
    input.unbind("blur.focusEffect").bind("blur.focusEffect",function (e) {
        $that.removeClass("focusEffect");
    });
}


function template_textarea_required_($that) {
    var input=$that.find("textarea");
    var check=true;
    if (input.val()=="") {
        $that.addClass("required-invalid");
        check=false;
    } else {
        $that.removeClass("required-invalid");
    }
    return check;
}

function template_textarea_required($that) {
    var input=$that.find("textarea");
    $that.addClass("required");
    input.unbind("blur.required").bind("blur.required",function (e) {
        template_textarea_required_($that);
    });
    input.unbind("keyup.required").bind("keyup.required",function (e) {
        template_textarea_required_($that);
    });
}



function template_textarea_autosize($that) {
    var textarea = $that.find("textarea");
    textarea.unbind('change.autosize keyup.autosize keydown.autosize paste.autosize cut.autosize').bind('change.autosize keyup.autosize keydown.autosize paste.autosize cut.autosize', function () {
        $(this).height(0);
        var p1=parseInt($(this).css("paddingTop").split("px").join(""));
        var p2=parseInt($(this).css("paddingBottom").split("px").join(""));
      //  console.log(p1+" "+p2);
      //  console.log($(this).outerHeight()+" "+this.scrollHeight+" "+(this.scrollHeight-p1-p2));
     //   while ($(this).outerHeight() < this.scrollHeight) {
            $(this).height(this.scrollHeight-p1-p2-1);
       // }
    });
    textarea.trigger("change.autosize");
}
function template_tooltip_init($that) {
   var newObject = jq1112.extend(true, {}, $that.find(".tooltip"));

    $that.unbind("mouseover.tooltip").bind("mouseover.tooltip", function () {
        $("div[name='main']").append(newObject);
        var top = $that.offset().top + $that.outerHeight() - 10;
        var left = $that.offset().left;
        newObject.css({"top": top, "left": left})
        newObject.addClass("tooltip-bottom");
    });

    $that.unbind("mouseout.tooltip").bind("mouseout.tooltip", function (e) {
        if ((!$(e.target).hasClass("tooltip") && $(e.target).closest(".tooltip").length === 0)) {
            newObject.removeClass("tooltip-bottom");
            var newObject2 = jq1112.extend(true, {}, newObject);
            $that.append(newObject2);
        }
    });


    $that.unbind("click.tooltip").bind("click.tooltip", function () {
        if (!$that.hasClass("tooltip-clicked")) {
            $that.addClass("tooltip-clicked");
            $that.unbind("mouseout.tooltip");
            $(document).unbind("click.tooltip").bind("click.tooltip", function (e) {
                if (!$(e.target).hasClass("tooltip") && $(e.target).closest(".tooltip").length === 0 && $(e.target).closest(".template_tooltip").length === 0) {
                    $that.trigger("click.tooltip");
                }
            })
        } else {
            $that.removeClass("tooltip-clicked");
            $that.unbind("mouseout.tooltip").bind("mouseout.tooltip", function (e) {
                if ((!$(e.target).hasClass("tooltip") && $(e.target).closest(".tooltip").length === 0)) {
                    newObject.removeClass("tooltip-bottom");
                    var newObject2 = jq1112.extend(true, {}, newObject);
                    $that.append(newObject2);
                }
            });
            $(document).unbind("click.tooltip")
            $that.trigger("mouseout.tooltip");
        }
    });


}


function template_tooltip_destroy($that) {
    $that.unbind();
    $that.find(".tooltip").remove();
    $that.replaceWith($that.html());
}




function template_truncate_destroy($that) {
    $that.html($that.attr("truncated-text"));
    $that.removeAttr("truncated-text");
}


function template_request_post(url,werte,c) {
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
    
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded" + ";charset=" + global_encoding);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onreadystatechange = function () {

         if (xhr.readyState == 2) {
             template_progressbar.setprogress(25);
         }
         if (xhr.readyState == 3) {
             template_progressbar.setprogress(50);
         }

        if (xhr.readyState == 4 && xhr.status == 200) {
            template_progressbar.setprogress(75);
            P4nTokenHelper.getNewToken(xhr.getResponseHeader("p4ntoken"));
            if (typeof (c) == "function") {
                c(xhr.responseText);
            }
            if (xhr.responseText != "") {
                evalScript(xhr.responseText);
            }
        }
    };

    var send = werte;
    xhr.send(send);
    
}


function template_request_init(url,data,method,callback) {
    if (method=="POST") {
        template_request_post(url,data,callback);
    }
}

function template_request($that) {
    $that=$that.find("select");
    var target=$that.attr("request-target");
    var method=$that.attr("request-method");
    var url=$that.attr("request-url");
    var data=$that.attr("request-data");
    
    
    $that.removeAttr("request-target");
    $that.removeAttr("request-method");
    $that.removeAttr("request-url");
    $that.removeAttr("request-data");
    
    var md5code=md5(target+" "+method+" "+url+" "+data);

    $that.unbind("change."+md5code).bind("change."+md5code, function() {
        var data2=data.split("[value]").join($that.val());
        template_request_init(url,data2,method, function(response) {
            console.log(target);
           console.log($(target));
            $(target).html(response);
        });
        
    });
    
   
}


function md5(str) {
  var xl;

  var rotateLeft = function(lValue, iShiftBits) {
    return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
  };

  var addUnsigned = function(lX, lY) {
    var lX4, lY4, lX8, lY8, lResult;
    lX8 = (lX & 0x80000000);
    lY8 = (lY & 0x80000000);
    lX4 = (lX & 0x40000000);
    lY4 = (lY & 0x40000000);
    lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
    if (lX4 & lY4) {
      return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
    }
    if (lX4 | lY4) {
      if (lResult & 0x40000000) {
        return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
      } else {
        return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
      }
    } else {
      return (lResult ^ lX8 ^ lY8);
    }
  };

  var _F = function(x, y, z) {
    return (x & y) | ((~x) & z);
  };
  var _G = function(x, y, z) {
    return (x & z) | (y & (~z));
  };
  var _H = function(x, y, z) {
    return (x ^ y ^ z);
  };
  var _I = function(x, y, z) {
    return (y ^ (x | (~z)));
  };

  var _FF = function(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_F(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _GG = function(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_G(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _HH = function(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_H(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var _II = function(a, b, c, d, x, s, ac) {
    a = addUnsigned(a, addUnsigned(addUnsigned(_I(b, c, d), x), ac));
    return addUnsigned(rotateLeft(a, s), b);
  };

  var convertToWordArray = function(str) {
    var lWordCount;
    var lMessageLength = str.length;
    var lNumberOfWords_temp1 = lMessageLength + 8;
    var lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;
    var lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
    var lWordArray = new Array(lNumberOfWords - 1);
    var lBytePosition = 0;
    var lByteCount = 0;
    while (lByteCount < lMessageLength) {
      lWordCount = (lByteCount - (lByteCount % 4)) / 4;
      lBytePosition = (lByteCount % 4) * 8;
      lWordArray[lWordCount] = (lWordArray[lWordCount] | (str.charCodeAt(lByteCount) << lBytePosition));
      lByteCount++;
    }
    lWordCount = (lByteCount - (lByteCount % 4)) / 4;
    lBytePosition = (lByteCount % 4) * 8;
    lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
    lWordArray[lNumberOfWords - 2] = lMessageLength << 3;     lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
    return lWordArray;
  };

  var wordToHex = function(lValue) {
    var wordToHexValue = '',
      wordToHexValue_temp = '',
      lByte, lCount;
    for (lCount = 0; lCount <= 3; lCount++) {       lByte = (lValue >>> (lCount * 8)) & 255;
      wordToHexValue_temp = '0' + lByte.toString(16);
      wordToHexValue = wordToHexValue + wordToHexValue_temp.substr(wordToHexValue_temp.length - 2, 2);
    }
    return wordToHexValue;
  };

  var utf8_encode = function(string) {
      string = (string+'').replace(/\r\n/g, "\n").replace(/\r/g, "\n");

      var utftext = "";
      var start, end;
      var stringl = 0;

      start = end = 0;
      stringl = string.length;
      for (var n = 0; n < stringl; n++) {
          var c1 = string.charCodeAt(n);
          var enc = null;

          if (c1 < 128) {               end++;           } else if((c1 > 127) && (c1 < 2048)) {               enc = String.fromCharCode((c1 >> 6) | 192) + String.fromCharCode((c1 & 63) | 128);
          } else {
              enc = String.fromCharCode((c1 >> 12) | 224) + String.fromCharCode(((c1 >> 6) & 63) | 128) + String.fromCharCode((c1 & 63) | 128);
          }
          if (enc != null) {
              if (end > start) {
                  utftext += string.substring(start, end);
              }
              utftext += enc;
              start = end = n+1;
          }
      }

      if (end > start) {
          utftext += string.substring(start, string.length);
      }

      return utftext;
  }

  var x = [],
    k, AA, BB, CC, DD, a, b, c, d, S11 = 7,
    S12 = 12,
    S13 = 17,
    S14 = 22,
    S21 = 5,
    S22 = 9,
    S23 = 14,
    S24 = 20,
    S31 = 4,
    S32 = 11,
    S33 = 16,
    S34 = 23,
    S41 = 6,
    S42 = 10,
    S43 = 15,
    S44 = 21;

  str = utf8_encode(str);
  x = convertToWordArray(str);
  a = 0x67452301;
  b = 0xEFCDAB89;
  c = 0x98BADCFE;
  d = 0x10325476;

  xl = x.length;
  for (k = 0; k < xl; k += 16) {
    AA = a;
    BB = b;
    CC = c;
    DD = d;
    a = _FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
    d = _FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
    c = _FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
    b = _FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
    a = _FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
    d = _FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
    c = _FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
    b = _FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
    a = _FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
    d = _FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
    c = _FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
    b = _FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
    a = _FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
    d = _FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
    c = _FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
    b = _FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
    a = _GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
    d = _GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
    c = _GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
    b = _GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
    a = _GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
    d = _GG(d, a, b, c, x[k + 10], S22, 0x2441453);
    c = _GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
    b = _GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
    a = _GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
    d = _GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
    c = _GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
    b = _GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
    a = _GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
    d = _GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
    c = _GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
    b = _GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
    a = _HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
    d = _HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
    c = _HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
    b = _HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
    a = _HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
    d = _HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
    c = _HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
    b = _HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
    a = _HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
    d = _HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
    c = _HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
    b = _HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
    a = _HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
    d = _HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
    c = _HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
    b = _HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
    a = _II(a, b, c, d, x[k + 0], S41, 0xF4292244);
    d = _II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
    c = _II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
    b = _II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
    a = _II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
    d = _II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
    c = _II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
    b = _II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
    a = _II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
    d = _II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
    c = _II(c, d, a, b, x[k + 6], S43, 0xA3014314);
    b = _II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
    a = _II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
    d = _II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
    c = _II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
    b = _II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
    a = addUnsigned(a, AA);
    b = addUnsigned(b, BB);
    c = addUnsigned(c, CC);
    d = addUnsigned(d, DD);
  }

  var temp = wordToHex(a) + wordToHex(b) + wordToHex(c) + wordToHex(d);

  return temp.toLowerCase();
}