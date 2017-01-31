$(function () {
    $inputTimer = $('#input-timer');
    $alertTimer = $('#alert-timer');
    startTimer();
});

var hours, minutes, seconds, milliseconds;
var $inputTimer, $alertTimer;

function startTimer() {
    var currentValue = $inputTimer.val();

    // read and parse the initial value
    var parts = currentValue.split('.');
    // 000
    milliseconds = parseInt(parts[1]);
    // hh:mm:ss
    parts = parts[0].split(':');
    hours = parseInt(parts[0]);
    minutes = parseInt(parts[1]);
    seconds = parseInt(parts[2]);

    // start timer interval
    setInterval(tickFunction, 10);
    // if the value is less than 10, the value 10 is used
}

function tickFunction() {
    milliseconds += 10;
    if (milliseconds==1000) {
        milliseconds = 0;

        ++seconds;
        if (seconds==60) {
            seconds = 0;

            ++minutes;
            if (minutes==60) {
                minutes = 0;

                ++hours;
            }
        }
    }

    updateInputTimer();
}

function updateInputTimer() {
    var formatTimer = twoDigits(hours) + ':' + twoDigits(minutes) + ':' + twoDigits(seconds) + '.' + milliseconds;
    $inputTimer.val(formatTimer);
    $alertTimer.text(formatTimer);
}

function twoDigits(value) {
    if (value<=9) return '0' + value;
    return value;
}