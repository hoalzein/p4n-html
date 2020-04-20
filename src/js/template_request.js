

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


