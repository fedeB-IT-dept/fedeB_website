var dateTimer1 = new Date("Tue, 24 Apr 2014 18:00:00 GMT+0100");
var dateTimer2 = new Date("Tue, 24 Feb 2014 18:00:00 GMT+0100");
var dateTimer3 = new Date("Tue, 24 Mar 2014 18:00:00 GMT+0100");
var timer1, timer2, timer3, intervalID, date1, date2, totalsec, hzero, mzero, szero;
var finDecompte = "FIN !";

function showCount() {
    timer1 = new Timer(dateTimer1);
    $('.count1').html(timer1.day);
    timer2 = new Timer(dateTimer1);
    $('.count2').html(timer2.hour);
    timer3 = new Timer(dateTimer1);
    $('.count3').html(timer3.minute);
    timer4 = new Timer(dateTimer1);
    $('.count4').html(timer4.second);
    timer5 = new Timer(dateTimer2);
    $('.count5').html(timer5.day);
    timer6 = new Timer(dateTimer3);
    $('.count6').html(timer6.day);
    intervalID = window.setInterval(showCount, 1000);
}

function Timer(date) {
    date1 = new Date();
    date2 = date;
    totalsec = (date2 - date1) / 1000;
    
    var dayModulo = totalsec%(60*60*24);
    var days = (totalsec - dayModulo) / (60*60*24);
    
    var hourModulo = dayModulo%(60*60);
    var hours = (dayModulo - hourModulo) / (60*60);
    if (hours < 10) { hzero = "0"; } else { hzero = ""; }
    
    var minuteModulo = hourModulo%60;
    var minutes = (hourModulo - minuteModulo) / 60;
    if (minutes < 10) { mzero = "0"; } else { mzero = ""; }
    
    var secondModulo = (minuteModulo%1)
    var seconds = (minuteModulo - secondModulo);
    if (seconds < 10) { szero = "0"; } else { szero = ""; }
    
    this.decompte = days + " Jours et " + hzero + "" + hours + ":" + mzero + "" + minutes + ":" + szero + "" + seconds + " !";
    this.day = days; this.hour= hzero + "" + hours; this.minute = mzero + "" + minutes; this.second = szero + seconds;
}