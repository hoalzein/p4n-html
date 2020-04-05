<?php
namespace hoalzein\Prof4Net\Html\Elements;

use hoalzein\Prof4Net\Html\Elements\Elements;

class InlineOverlay extends Elements
{
    public function __construct()
    {
        parent::__construct('');
    }
    
    public static function init()
    {
        return new self(...func_get_args());
    }


    public static function prepareInlineOverlay($triggerElement, $contentElement, $inlineOverlayContentId )
    {
        self::prepareTriggerElement($triggerElement, $inlineOverlayContentId);
        self::prepareContent($contentElement, $inlineOverlayContentId);
    }


    /*
     * @param | inlineOverlayContentId | must be unique for the whole page
     */
    private static function prepareTriggerElement($element, $inlineOverlayContentId)
    {
        $element->addCustomClass('inline-overlay-content-reference');
        $element->addCustomAttr('data-on-document-ready', 'initInlineOverlayTrigger');
        $element->addCustomAttr('data-inline-overlay-content-id', $inlineOverlayContentId);
    }


    /*
     * @param | inlineOverlayContentId | must be unique for the whole page
     */
    private static function prepareContent($element, $inlineOverlayContentId)
    {
        $element->addCustomClass('inline-overlay-content');
        $element->addCustomAttr('data-inline-overlay-content-id', $inlineOverlayContentId);
    }

}