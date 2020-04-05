<?php

namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\RequiredField;
use hoalzein\Prof4Net\Html\Elements\Traits\Form\ValidationField;
use hoalzein\Prof4Net\Html\Elements\Traits\Object\Helper;
use Prof4net\FileUpload\Controller;

class FileInput extends Elements {

    use RequiredField;
    use ValidationField;
    use Helper;

    public $form_element = true;
    public $value = '';
    public $label = '';
    public $wrapper_class = '';
    public $readonly = '';
    public $existingFileDataList = [];
    public $fileUploadController;
    public $fileUploadId = '';
    public $uploadErrorList = [];

    //$name, $value='', $size='', $other=''
    public function __construct($fileUploadId, $uploadErrorList = []) {
        $this->fileUploadId = $fileUploadId;
        $this->fileUploadController = new Controller($fileUploadId);
        $this->fileUploadController->initExistingFiles();
        $this->existingFileDataList = $this->fileUploadController->getExistingFileList();

        $this->uploadErrorList = $uploadErrorList;

        $this->setLabel($this->fileUploadController->getLabel());
        parent::__construct($this->label);
    }

    public static function init() {
        return new self(...func_get_args());
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function getUploadFileCountAvailable() {
        return $this->fileUploadController->getMaxFileCount() - count($this->fileUploadDataList);
    }

}
