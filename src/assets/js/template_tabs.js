

function templateTabsResize($that) {
    var active_link = $that.find(".active");
    var indicator = active_link.closest(".tabs").find(".indicator");


    var top = active_link.position().top;
    var h = active_link.outerHeight();

    var left = active_link.position().left;
    var w = active_link.outerWidth();


    indicator.css("width", w + "px");
    indicator.css("top", (h + top - 2) + "px");

    indicator.animate({
        left: left
    }, 150, function () {


    });
}

function templateTabsInit($that) {


    $that.find(".tabs a").each(function () {
        $(this).unbind("click.templateTabs").bind("click.templateTabs", function () {

            $(this).closest(".tabs").find(".active").removeClass("active");
            $(".tab-content").html("");
            $(".tab-content").css("display", "none")

            /*   $(this).closest(".tabs").find(".active").each(function() {
             $("div[name='"+$(this).attr("data-href")+"']").html("");
             $("div[name='"+$(this).attr("data-href")+"']").css("display","none")
             $(this).removeClass("active");
             });
             */

            $(this).addClass("active");
            $("div[name='" + $(this).attr("data-href") + "']").css("display", "");

            templateTabsResize($that);
        });
    });

    jq1112(window).resized(
            function () {
                templateTabsResize($that);

            }, 100
            );


}



function redirectToTabs() {

    jq1112("a[href!='']").each(function () {
        var target = $(this).attr("target");
        if (target != "main") {
        } else {
            if (requestResponseToContent_checkLink($(this).attr("href"))) {
                if (typeof $that.attr("target") != typeof undefined && $that.attr("target") != "") {
                } else {
                    $(this).attr("target", target);
                }
            }
        }
    });

}