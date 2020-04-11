<?php

namespace hoalzein\Prof4Net\Html;

use Illuminate\Support\Facades\Facade;

class P4NHtmlFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'p4n-html';
    }

}
