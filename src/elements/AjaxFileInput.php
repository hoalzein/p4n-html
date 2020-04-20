<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper as ObjectHelper;
use hoalzein\Prof4Net\Html\Elements\Elements;

class AjaxFileInput extends Elements {

    use RequiredField;
    use ValidationField;
    use ObjectHelper;

    public $form_element = true;
    public $value = '';
    public $label = '';
    public $wrapper_class = '';
    public $readonly = '';
    public $existingFileDataList = [];
    public $ajaxFileUploadController;
    public $fileUploadId = '';
    public $uploadErrorList = [];

    public function __construct($fileUploadId, $uploadErrorList = []) {
        $this->fileUploadId = $fileUploadId;
        $this->ajaxFileUploadController = new AjaxFileUpload_Controller($fileUploadId);
        $this->ajaxFileUploadController->initExistingFiles();
        $this->existingFileDataList = $this->ajaxFileUploadController->getExistingFileList();

        $this->uploadErrorList = $uploadErrorList;

        $this->setLabel($this->ajaxFileUploadController->getLabel());
        parent::__construct($this->label);
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getUploadFileCountAvailable() {
        return $this->ajaxFileUploadController->getMaxFileCount() - count($this->fileUploadDataList);
    }

}
