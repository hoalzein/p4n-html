timePickerElement = null;

function initTimePicker($this) {
    // pickadate api documentation https://amsul.ca/pickadate.js/api/#method-get-value
    $element = $($this).pickatime({
        container: '#timePickerOutlet',
        format: 'HH:i',
        labelMonthNext: '',
        labelMonthPrev: '',
        labelMonthSelect: '',
        labelYearSelect: '',
        selectMonths: true,
        selectYears: true,
        firstDay: 1,
        closeOnSelect: true,
        today: 'heute',
        clear: 'zurücksetzen',
        close: 'schließen',
    });

    var picker = $element.pickatime('picker');

    showTimePickerWrapper();

    picker.on({
        open: function () {
            //console.log('open');
        },
        start: function () {
            //console.log('start');
        },
        close: function () {
            //console.log('close');
            hideTimePickerWrapper();
        },
        render: function () {
            //console.log('render');
        },
        stop: function () {
            //console.log('stop');
        },
        set: function (context) {
            onTimeSelected(picker);
        }
    });

    initHighlightedTime(picker);
}


function onTimeSelected(picker) {
    let selectedTime = picker.get('select');
    if (selectedTime) {
        updateTimeForTimePickerLeftSide(selectedTime);
    }
}


function initHighlightedTime(picker)
{
    let highlightedTime = picker.get('highlight');
    if (highlightedTime) {
        //updateTimeForTimePickerLeftSide(highlightedTime);
    }
}

/*
function updateTimeForTimePickerLeftSide(timeData) {
    $('#timePickerWrapper').find('.text-time').text(timePad(timeData.hour,2) + ':' + timePad(timeData.mins,2));
}
*/

function initTimeInputEvent() {
    $('.has-timepicker').unbind("click.zeitInput").bind("click.zeitInput", function ($event) {
        initTimePicker(this);
    });

    $(window).resize(()=>{
        hideTimePickerWrapper();
    });
}


function showTimePickerWrapper()
{
    setTimeout(()=>{
        $('#timePickerWrapper').addClass('open').closest('.page-overlay').addClass('show');
        $('body').addClass('no-scroll');
    },0);
}


function hideTimePickerWrapper()
{
    $('#timePickerWrapper').removeClass('open').closest('.page-overlay').removeClass('show');
    $('body').removeClass('no-scroll');
}


function timePad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}
