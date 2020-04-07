

function template_truncate_destroy($that) {
    $that.html($that.attr("truncated-text"));
    $that.removeAttr("truncated-text");
}
