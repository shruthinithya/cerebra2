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
	if(TotalSeconds == 1140 || TotalSeconds == 1800 || TotalSeconds == 900)
	{
		getNextLevel();		 
	}
    TotalSeconds -= 1;
    UpdateTimer();
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
    dataType: 'json',
    success: function(result)
    {

     Materialize.toast('Next Set of Questions are open', 4000)   
     var outer = document.createElement("li");

     var in1 = document.createElement("div");
     in1.className = "collapsible-header teal lighten-5";
     in1.style = "padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center";
                    //check
                    in1.textContent = "SET "+result['user']['state'];
                    
                    var in2 = document.createElement('div');
                    in2.className = "collapsible-body";                    
                    
                    var in3 = document.createElement('div');
                    in3.className = "row";                    
                    
                    for(var i = 0; i<result['data'].length;i++)
                    {
                        var in4 = document.createElement('div');
                        in4.className = "col s8 offset-s2";
                        var in5 = document.createElement('div');
                        in5.className = "card hoverable grey lighten-4";
                        var in6 = document.createElement('div');
                        in6.className = "card-content";
                        var in7 = document.createElement('div');
                        in7.className = "col s12";
                        in7.style = "font-size:18px; margin-left:5px;"
                        //check
                        in7.textContent = result['data'][i]['question'];

                        in6.append(in7);

                        var in8 = document.createElement('div');
                        in8.className = "input-field col s11";
                        in8.style = "margin-top:0px; margin-left:15px; color:black;";
                        var in9 = document.createElement('div');
                        in9.className = "col s12 m9";
                        var input = document.createElement('input');    
                        //check below 3 statements
                        input.type = "text";
                        input.placeholder = "Your answer";
                        input.id = "answer_"+result['data'][i]['key'];
                        input.className = "validate";
                        in9.append(input);

                        in8.append(in9);

                        var in10 = document.createElement('div');
                        in10.className = "col s6 m2";
                        var in11 = document.createElement('a');
                        in11.className = "btn-floating btn-large waves-effect waves-light";
                        in11.style = "margin-left:5%; margin-bottom: 1%;"
                        in11.id= result['data'][i]['key'];
                        in11.onclick = function(){submitAnswer(this);}
                        //check
                        var button1 = document.createElement('i');
                        button1.className = "material-icons";
                        button1.textContent = "done";

                        in11.append(button1);
                        in10.append(in11);

                        var pl1 = document.createElement('div');
                        pl1.className = "progress_loader";
                        pl1.id = result['data'][i]['key'];
                        pl1.style = "display:none;"
                        pl1.textContent = "Loading...";

                        in10.append(pl1);

                        in8.append(in10);

                        var in12 = document.createElement('div');
                        in12.className = "col s6 m1";
                        var in13 = document.createElement('a');
                        in13.className = "btn-floating btn-large waves-effect waves-light black-text blue";
                        in13.id = result['data'][i]['key'];
                        in13.onclick = function(){getClue(this);}
                        //check
                        var button2 = document.createElement('i');
                        button2.className = "material-icons";
                        button2.textContent = "done";


                        in13.append(button2);
                        in12.append(in13);

                        var pl2 = document.createElement('div');
                        pl2.className = "progress_loader";
                        pl2.id = "clue_" + result['data'][i]['key'];
                        pl2.style = "display:none;"
                        pl2.textContent = "Loading...";

                        in12.append(pl2);
                        in8.append(in12);
                        
                        in6.append(in8);    
                        
                        var in14 = document.createElement('div');
                        in14.className = "row";
                        in6.append(in14);
                        in5.append(in6);
                        in4.append(in5);
                        in3.append(in4); 
                    }

                in2.append(in3);
                outer.append(in1);
                outer.append(in2);


                document.getElementsByClassName("collapsible popout")[0].append(outer);
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert('error' + errorThrown);          
            }
        });
} 