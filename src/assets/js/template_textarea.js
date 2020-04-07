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