
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
