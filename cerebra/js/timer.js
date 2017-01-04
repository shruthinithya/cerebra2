var Timer;
var TotalSeconds;


function CreateTimer(TimerID, Time) {
Timer = document.getElementById(TimerID);
TotalSeconds = Time;

UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function Tick() {
	if(TotalSeconds <=0)
	{
		alert("Time up!")
		window.location="logout.php";
	}
	if(TotalSeconds == 2700)
	{
		getNextLevel();		 
	}
TotalSeconds -= 1;
UpdateTimer()
window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
var Seconds = TotalSeconds;

var Days = Math.floor(Seconds / 86400);
Seconds -= Days * 86400;

var Hours = Math.floor(Seconds / 3600);
Seconds -= Hours * (3600);

var Minutes = Math.floor(Seconds / 60);
Seconds -= Minutes * (60);


var TimeStr = ((Days > 0) ? Days + " days " : "") + LeadingZero(Hours) + ":" + LeadingZero(Minutes) + ":" + LeadingZero(Seconds)


Timer.innerHTML = TimeStr;
}
function LeadingZero(Time) {

return (Time < 10) ? "0" + Time : + Time;
}
function getNextLevel() {
 	$.ajax
        ({ 
            url: 'getNextLevel.php',
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result['state'] > 1)
                {
                	alert(result['state']);
                 
                }
                else if(result == 2)
                {
                    alert("success");
                    window.location="practice.php";
                }
                else
                    alert("failure");
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert('error');          
            }
        });
 } 