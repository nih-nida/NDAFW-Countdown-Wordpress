// Function for calculating the time. Parsing the days from milliseconds.
function timeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days
  };
}


// Function for starting the countdown.
function initializeCountdown(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');

  function updateCountdown() {
    var t = timeRemaining(endtime);

    daysSpan.innerHTML = t.days;

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateCountdown();
  var timeinterval = setInterval(updateCountdown, 1000);
}

// Input the deadline to which we are counting down to. Format: yyyy-mm-dd
var deadline = '2016-12-31';

document.addEventListener('DOMContentLoaded', function(){
    initializeCountdown('n4t-ndafw-countdown', deadline);console.log('xxx');
}, false);