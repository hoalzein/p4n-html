function template_fileinput_focusEffect($that) {
    var input = $that.find("input");
    input.unbind("focus.focusEffect").bind("focus.focusEffect", function (e) {
        $that.addClass("focusEffect");
    });
    input.unbind("blur.focusEffect").bind("blur.focusEffect", function (e) {
        $that.removeClass("focusEffect");
    });
}


function template_fileinput_required_($that) {
    var input = $that.find("input");
    var check = true;
    if (input.val() == "") {
        $that.addClass("required-invalid");
        check = false;
    } else {
        $that.removeClass("required-invalid");
    }
    return check;
}

function template_fileinput_required($that) {
    var input = $that.find("input");
    $that.addClass("required");
    input.unbind("blur.required").bind("blur.required", function (e) {
        template_textinput_required_($that);
    });
    input.unbind("keyup.required").bind("keyup.required", function (e) {
        template_textinput_required_($that);
    });
}


function initFileUploadEvents() {
    console.log('#initFileDropZone');

    $('.drop-zone').on(
        'dragover',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.drop-zone').on(
        'dragenter',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.drop-zone').on(
        'drop',
        function ($event) {
            if ($event.originalEvent.dataTransfer && $event.originalEvent.dataTransfer.files.length) {
                $event.preventDefault();
                $event.stopPropagation();

                /*UPLOAD FILES HERE*/
                let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
                let files = $event.originalEvent.dataTransfer.files;
                uploadFile(fileUploadId, files);
            }
        }
    );

    $('.drop-zone').on('click',
        function () {
            let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
            $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"] > input').trigger('click');
        }
    );

    $('.template_fileinput input:file').change(function () {
        let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
        let files = this.files;
        uploadFile(fileUploadId, files);
    });

    $('.template_fileinput .file-action [data-remove-file]').unbind('click.remove_file').bind('click.remove_file', function() {
        let fileUploadId = $(this).closest('.template_fileinput').data('file-upload-id');
        let fileName = $(this).data('remove-file');
        removeFile(fileUploadId, fileName);
    });
}


function uploadFile(fileUploadId, fileDataList) {

    $fileInputContainer = $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    for (let i = 0; i < fileDataList.length; i++) {
        formData.append(i, fileDataList[i]);
    }
    $.ajax({
        url: 'http://localhost/crm/inc/services/FileUpload/upload.php', // point to server-side PHP script
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (responseHtml) {
            $fileInputContainer.replaceWith(responseHtml);
            $loadingOverlay.removeClass('loading-active');
            document_ready();
        }
    });
}


function removeFile(fileUploadId, fileName) {

    $fileInputContainer = $('.template_fileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    formData.append('fileName', fileName);

    $.ajax({
        url: 'http://localhost/crm/inc/services/FileUpload/remove.php', // point to server-side PHP script
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (responseHtml) {
            $fileInputContainer.replaceWith(responseHtml);
            $loadingOverlay.removeClass('loading-active');
            document_ready();
        }
    });
}