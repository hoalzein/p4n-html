datePickerElement = null;

function initDatePicker($this) {
    // pickadate api documentation https://amsul.ca/pickadate.js/api/#method-get-value
    $element = $($this).pickadate({
        container: '#datePickerOutlet',
        format: 'dd.mm.yyyy',
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

    var picker = $element.pickadate('picker');

    showDatePickerWrapper();

    picker.on({
        open: function () {
            //console.log('open');
        },
        start: function () {
            //console.log('start');
        },
        close: function () {
            //console.log('close');
            hideDatePickerWrapper();
        },
        render: function () {
            //console.log('render');
        },
        stop: function () {
            //console.log('stop');
        },
        set: function (context) {
            onDateSelected(picker);
        }
    });

    initHighlightedDate(picker);
}


function onDateSelected(picker) {
    let selectedDate = picker.get('select');
    if (selectedDate) {
        updateDateForDatePickerLeftSide(selectedDate);
    }
}


function initHighlightedDate(picker)
{
    let highlightedDate = picker.get('highlight');
    if (highlightedDate) {
        //updateDateForDatePickerLeftSide(highlightedDate);
    }
}

/*
function updateDateForDatePickerLeftSide(dateData) {
    $('#datePickerWrapper').find('.text-year').text(dateData.year);
    $('#datePickerWrapper').find('.text-day-name').text(customDatePickerLang[datePickerlangCode].days[dateData.day]);
    $('#datePickerWrapper').find('.text-date').text(dateData.date);
    $('#datePickerWrapper').find('.text-month').text(customDatePickerLang[datePickerlangCode].month[dateData.month]);
}
*/


function initDatumInputEvent() {
    $('.has-datepicker').unbind("click.datumInput").bind("click.datumInput", function ($event) {
        initDatePicker(this);
    });

    $(window).resize(()=>{
        hideDatePickerWrapper();
    });
}


function showDatePickerWrapper()
{
    setTimeout(()=>{
        $('#datePickerWrapper').addClass('open').closest('.page-overlay').addClass('show');
        $('body').addClass('no-scroll');
    },50);
}


function hideDatePickerWrapper()
{
    $('#datePickerWrapper').removeClass('open').closest('.page-overlay').removeClass('show');
    $('body').removeClass('no-scroll');
}


datePickerlangCode = 'de';
customDatePickerLang = {
    de: {
        days: {
            0: 'Sonntag',
            1: 'Montag',
            2: 'Dienstag',
            3: 'Mittwoch',
            4: 'Donnerstag',
            5: 'Freitag',
            6: 'Sonnabend',
        },
        month: {
            0: 'Jan',
            1: 'Feb',
            2: 'Mär',
            3: 'Apr',
            4: 'Mai',
            5: 'Jun',
            6: 'Jul',
            7: 'Aug',
            8: 'Sep',
            9: 'Okt',
            10: 'Nov',
            11: 'Dez',
        }
    },
    en: {
        days: {
            0: 'Sun',
            1: 'Mon',
            2: 'Tue',
            3: 'Wed',
            4: 'Thu',
            5: 'Fri',
            6: 'Sat',
        },
        month: {
            0: 'Jan',
            1: 'Feb',
            2: 'Mar',
            3: 'Apr',
            4: 'May',
            5: 'Jun',
            6: 'Jul',
            7: 'Aug',
            8: 'Sep',
            9: 'Oct',
            10: 'Nov',
            11: 'Dec',
        }
    }
};