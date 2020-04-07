$(document).ready(()=>{
    initRippleEvent();
});


function initRippleEvent() {
    let rippleElementList = document.getElementsByClassName('has-ripple-effect');
    for (let element of rippleElementList) {
        initRippleEventForElement(element);
    }
}


// call this function, when an element is dynamically loaded (ajax, ...)
function initRippleEventForElement(element) {
    $(element).unbind('click.rippleEffect').bind('click.rippleEffect', ($event) => {
        initRippleEventAnimation($event);
    });
}


function initRippleEventAnimation($event) {
    let element = $event.target;
    // find current or closest parent element with ripple effect class
    let i = 7;
    while (i >= 0) {
        if (element.classList.contains('has-ripple-effect')) {
            break;
        }
        element = element.parentElement;
        i--;
    }

    // get effect position (click position, element position)
    let positionData = element.getBoundingClientRect();
    let x = $event.pageX - positionData.x - window.scrollX;
    let y = $event.pageY - positionData.y - window.scrollY;


    // animation
    let duration = 1000;
    let animationFrame, animationStart;

    let animationStep = function (timestamp) {
        if (!animationStart) {
            animationStart = timestamp;
        }
        let frame = timestamp - animationStart;
        if (frame < duration) {
            let easing = (frame / duration) * (2 - (frame / duration));

            let circle = 'circle 300px at ' + x + 'px ' + y + 'px';
            let color = 'rgba(0, 0, 0, ' + (0.3 * (1 - easing)) + ')';
            let stop = 90 * easing + '%';

            element.style.backgroundImage = 'radial-gradient(' + circle + ', ' + color + ' ' + stop + ', transparent ' + stop + ')';

            animationFrame = window.requestAnimationFrame(animationStep);
        } else {
            element.style.backgroundImage = 'none';
            window.cancelAnimationFrame(animationFrame);
        }

    };

    animationFrame = window.requestAnimationFrame(animationStep);
}