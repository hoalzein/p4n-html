$inlineOverlayWrapper = null;

function initInlineOverlay() {
    $inlineOverlayWrapper = $('#inlineOverlay');
    hideInlineOverlay();
    this.initInlineOverlayClickEvent();
    this.initInlineOverlayOutsideClickEvent();
}

function initInlineOverlayOutsideClickEvent()
{
    $(window).unbind("click.inlineOverlayOutside").bind("click.inlineOverlayOutside",function($event) {
        if ($('#inlineOverlay').hasClass('open'))
        {
            hideInlineOverlay(document.getElementById('inlineOverlay'));
        }
    });
}


function initInlineOverlayClickEvent() {
    $inlineOverlayWrapper.unbind("click.inlineOverlay").bind("click.inlineOverlay",function($event) {
        $event.stopPropagation();
    });
}


function initInlineOverlayTrigger(element) {
    let triggerElement = element[0];

    $(element[0]).unbind("click.inlineOverlayTrigger").bind("click.inlineOverlayTrigger",function($event) {
        let inlineOverlayContentId = triggerElement.getAttribute('data-inline-overlay-content-id');
        let inlineOverlayContent = document.querySelectorAll('.inline-overlay-content[data-inline-overlay-content-id="' + inlineOverlayContentId + '"]')[0];

        hideInlineOverlay();
        setTimeout(() => {
            prepareInlineOverlayContent(inlineOverlayContent);
            setTimeout(() => {
                prepareInlineOverlayStyle($event);
                showInlineOverlay();
            }, 25);
        }, 25);
    });
}


function prepareInlineOverlayContent(inlineOverlayContent) {
    $(inlineOverlayContent).clone(true).appendTo($inlineOverlayWrapper);

}


function prepareInlineOverlayStyle($event) {
    // get new content element inside wrapper
    let inlineOverlayContent = $inlineOverlayWrapper[0];

    let safetyOffset = 40;
    let menuHeight = inlineOverlayContent.offsetHeight + safetyOffset;
    let maxMenuHeight = menuHeight + 30; // set max height for performance
    let menuWidth = inlineOverlayContent.offsetWidth + safetyOffset;
    let transformOrigin = '';

    // check right overlap
    if ($event.clientX + menuWidth > window.innerWidth) {
        $inlineOverlayWrapper.css('left', ($event.clientX + window.scrollX - (menuWidth - safetyOffset)) + 'px');
        transformOrigin += 'right';
    } else {
        $inlineOverlayWrapper.css('left', ($event.clientX + window.scrollX) + 'px');
        transformOrigin += 'left';
    }

    // check bottom overlap
    if ($event.clientY + menuHeight > window.innerHeight) {
        // menu opening direction bottom - top
        $inlineOverlayWrapper.css('top', ($event.clientY + window.scrollY - (menuHeight - safetyOffset)) + 'px');
        transformOrigin += ' bottom';
    } else {
        // menu opening direction top - bottom
        $inlineOverlayWrapper.css('top', ($event.clientY + window.scrollY) + 'px');
        transformOrigin += ' top';
    }

    // $inlineOverlayWrapper.css('maxHeight', maxMenuHeight + 'px'); // does not work for current version
    $inlineOverlayWrapper.css('transformOrigin', transformOrigin);

    initRippleEvent();
}


function hideInlineOverlay() {
    $inlineOverlayWrapper.removeClass('open').empty();
}


function showInlineOverlay(inlineOverlayWrapper) {
    $inlineOverlayWrapper.addClass('open');
}