


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

