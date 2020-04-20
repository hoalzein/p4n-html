function initAjaxFileUploadEvents() {

    $('.template_ajaxfileinput .drop-zone').on(
        'dragover',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.template_ajaxfileinput .drop-zone').on(
        'dragenter',
        function ($event) {
            $event.preventDefault();
            $event.stopPropagation();
        }
    );

    $('.template_ajaxfileinput .drop-zone').on(
        'drop',
        function ($event) {
            if ($event.originalEvent.dataTransfer && $event.originalEvent.dataTransfer.files.length) {
                $event.preventDefault();
                $event.stopPropagation();

                /*UPLOAD FILES HERE*/
                let fileUploadId = $(this).closest('.template_ajaxfileinput').data('file-upload-id');
                let files = $event.originalEvent.dataTransfer.files;
                uploadFile(fileUploadId, files);
            }
        }
    );

    $('.template_ajaxfileinput .drop-zone').on('click',
        function () {
            let fileUploadId = $(this).closest('.template_ajaxfileinput').data('file-upload-id');
            $('.template_ajaxfileinput[data-file-upload-id="' + fileUploadId + '"]').find('input[type="file"]').trigger('click');
        }
    );

    $('.template_ajaxfileinput input:file').change(function () {
        let fileUploadId = $(this).closest('.template_ajaxfileinput').data('file-upload-id');
        let files = this.files;
        uploadFile(fileUploadId, files);
    });

    $('.template_ajaxfileinput .file-action [data-remove-file]').unbind('click.remove_file').bind('click.remove_file', function() {
        let fileUploadId = $(this).closest('.template_ajaxfileinput').data('file-upload-id');
        let fileName = $(this).data('remove-file');
        removeFile(fileUploadId, fileName);
    });
}


function uploadFile(fileUploadId, fileDataList) {

    $fileInputContainer = $('.template_ajaxfileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    for (let i = 0; i < fileDataList.length; i++) {
        formData.append(i, fileDataList[i]);
    }
    $.ajax({
        url: 'http://localhost/crm/inc/services/AjaxFileUpload/upload.php', // point to server-side PHP script
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

    $fileInputContainer = $('.template_ajaxfileinput[data-file-upload-id="' + fileUploadId + '"]');
    $loadingOverlay = $fileInputContainer.find('.loading');
    $loadingOverlay.addClass('loading-active');

    let formData = new FormData();
    formData.append('fileUploadId', fileUploadId);
    formData.append('fileName', fileName);

    $.ajax({
        url: 'http://localhost/crm/inc/services/AjaxFileUpload/remove.php', // point to server-side PHP script
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