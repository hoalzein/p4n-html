
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