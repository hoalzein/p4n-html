
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


