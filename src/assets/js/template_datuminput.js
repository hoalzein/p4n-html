
function template_datuminput_required_($that) {
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

function template_datuminput_required($that) {
    var input=$that.find("input");
    $that.addClass("required");
    input.unbind("blur.required").bind("blur.required",function (e) {
        template_datuminput_required_($that);
    });
    input.unbind("change.required").bind("change.required",function (e) {
        template_datuminput_required_($that);
    });
}
