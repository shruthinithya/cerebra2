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
	if(TotalSeconds == 2460)
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
                if(result['state'] >= 1)
                {
                	alert(result['state']);
                    /*var outer = document.createElement("li");

                    var in1 = document.createElement("div");
                    in1.className = "collapsible-header teal lighten-5";
                    in1.style = "padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center";
                    //check
                    in1.textContent = "SET "+result['state'];
                    
                    var in2 = document.createElement('div');
                    in2.className = "collapsible-body";                    
                    
                    var in3 = document.createElement('div');
                    in3.className = "row";                    
                    
                    var in4 = document.createElement('div');
                    in4.className = "col s8 offset-s2";
                    var in5 = document.createElement('div');
                    in5.className = "card hoverable grey lighten-4";
                    var in6 = document.createElement('div');
                    in6.className = "card-content";
                    var in7 = document.createElement('div');
                    in7.className = "col s10";
                    in7.style = "font-size:18px; margin-left:5px;"
                    //check
                    in7.textContent = result[''];

                    in6.append(in7);

                    var in8 = document.createElement('div');
                    in8.className = "input-field col s11";
                    in8.style = "margin-top:0px; margin-left:15px; color:black;";
                    var in9 = document.createElement('col s10');
                    var input = document.createElement('input');    
                    //check below 3 statements
                    input.type = "text";
                    input.placeholder = "Your answer";
                    input.id = "answer_"+result['data'][0]['key'];
                    input.className = "validate";
                    in9.append(input);

                    var in10 = document.createElement('div');
                    in10.className = "col s2  checkanswer";
                    var in11 = document.createElement('a');
                    in11.className = "btn-floating btn-large waves-effect waves-light teal lighten-3 black-text";
                    //check
                    in11.onclick = "Materialize.toast('This is your hint', 4000)";
                    in11.textContent = "?";
                    in10.append(in11);

                    in8.append(in9);
                    in8.append(in10);
                    in6.append(in8);

                    var in12 = document.createElement('div');
                    in12.className = "row";
                    var in13 = document.createElement('div');
                    in13.className = "col s12";
                    var in14 = document.createElement('a');
                    in14.className = "btn ansbtn";
                    in14.style = "margin-left:5%; margin-bottom: 1%;";
                    //check below 2 statements
                    in14.id = result['data'][0]['question'];
                    in14.onclick = "submitAnswer(this)";
                    in14.textContent = "SUBMIT";

                    in13.append(in14);  

                    var loader = document.createElement('div');
                    loader.className = "progress_loader";
                    loader.style = "display:none;";              
                    loader.textContent = "Loading...";
                    in13.append(loader);
                    in12.append(in13);
                    in6.append(in12);

                    in5.append(in6);
                    in4.append(in5);
                    in3.append(in4);   
                    in2.append(in3);
                    outer.append(in2);
                    outer.append(in1);

                    document.getElementsByClassName("nextLevelQuestions")[0].append(outer);*/
                }                
                else
                    alert("failure");
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert('error');          
            }
        });
 } 
 /*function fetchingQuestions()
 {
    document.getElementById("menu").innerHTML = '<div class="collapsible-header teal lighten-5" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
       SET <?php echo $i+1 ?>
       </div>
        <div class="collapsible-body">          
      <div class="row">
       <br>
       <?php
      // number of questions in each set
       for($j=0 ; $j<2 ; $j++){
        //foreach ($_SESSION['practice'] as $question) { 
        ?>
        <div class="col s8 offset-s2">
         <div class="card hoverable grey lighten-4">
          <div class="card-content" style="padding-bottom: -15px;">

          <div class="col s10" style="font-size:18px;margin-left:5px"><?php echo $_SESSION['questions'][$j]['question']; ?></div>
            <div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">

            <div class="col s10">
             <input type="text" placeholder="Your answer" id="answer_<?php echo $_SESSION['questions'][$j]['key'] ?>"  type="text" class="validate"/>
            </div>
            <div class="col s2  checkanswer">
             <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint?                           
             </a>
            </div>
            <!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
            </div>
            
            <div class="row"><div class="col s12">
            <a class="btn ansbtn" style="margin-left:75%; margin-bottom: 1%;" id="<?php echo $_SESSION['questions'][$j]['key'] ?>" onclick="submitAnswer(this);">SUBMIT</a>
            <div class="progress_loader" style="display:none;">Loading...</div>
            </div></div>
         </div>
          </div>  
        </div>

        <?php
        }
        ?>

      <div class="col s12">
      <a class="btn-large" style="margin-left:43%; margin-bottom:2%;" onclick="Materialize.toast('Please fill all the answers', 4000)">
       SUBMIT SET
       </a></div>
      </div>
      </div>
      </li>
        <?php
        }
        ?>';
}
 }*/