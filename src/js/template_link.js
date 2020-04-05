
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