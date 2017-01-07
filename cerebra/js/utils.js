
// handle login
$("#login_form").submit(function(e) { 
    $('.progress_loader').show();
    $('.login_submit').hide();
    var flag = returnCheckForLogin();
    if(flag)
    {
        $.ajax
        ({ 
            url: 'login.php',
            data: $("#login_form").serialize(),
            type: 'post',
            dataType: "json",
            success: function(result)
            {
                if(result == 1)
                {
                    Materialize.toast('Login Successful', 1000);
                    window.location="Practice.php";
                }
                else if(result == 2)
                {
                    Materialize.toast('Login Successful', 1000);
                    window.location="GamePlay.php";
                }
                else if(result == 3)
                {
                    Materialize.toast('Login Successful', 1000);
                    window.location="Summary.php";
                }
                else
                    Materialize.toast('Login Failed', 1000);
                $('.progress_loader').hide();
                $('.login_submit').show();
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                Materialize.toast('Error Logging in', 1000);
                $('.progress_loader').hide();
                $('.login_submit').show(); 
            }
        });

    }
    else
    {
        Materialize.toast('Enter Valid Credentials', 1000);
        $('.progress_loader').hide();
        $('.login_submit').show(); 
    }
    e.preventDefault();
});

// practice round - validation answers
function submitAnswer(e) { 
    $(e).hide();
    $(document.getElementById('pl_'+e.id)).show();
    answer = document.getElementById('answer_'+e.id).value;
    console.log(e.id);
    console.log(answer);
    $.ajax
    ({ 
        url: 'submit.php',
        data: 'key=' + e.id + '&answer=' + answer,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            console.log(result);
            result['data'] = jQuery.parseJSON(result['data']);
            if(result['code']==1)
            {
                Materialize.toast('Right Answer!', 1000);
                document.getElementById('answer_'+e.id).disabled = true;
                $(document.getElementById('pl_'+e.id)).hide();
                $(document.getElementById('clue_'+e.id)).hide();
                $(e).hide();
                document.getElementById("points").innerHTML = result['data']['points'];
                //document.getElementsByClassName("points")[0].append(result['data']['points']);
            }
            else if(result['code']==0)
            {
                Materialize.toast('Dai thappudaa!', 1000);
                $(document.getElementById('pl_'+e.id)).hide();
                $(e).show();
                document.getElementById("points").innerHTML = result['data']['points'];
                //document.getElementsByClassName("points")[0].append(result['data']['points']);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
            $(document.getElementById('pl_'+e.id)).hide();
            $(e).show();
        }
    });
}

function getClue(e) { 
    $(e).hide();
    $(document.getElementById('clue_'+e.id)).show();
    //alert(e.id);
    $.ajax
    ({ 
        url: 'getClue.php',
        data: 'key=' + e.id,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            //alert(result['code']);
            if(result['code']==1)
            {
                Materialize.toast("Hint:" + result['clue'], 5000);
                $(document.getElementById('clue_'+e.id)).hide();
                $(e).show();
            }
            else if(result['code']==2)
            {
                Materialize.toast('You will get your hint only after next set opens', 4000);
                $(document.getElementById('clue_'+e.id)).hide();
                $(e).show();
            }
            else
            {
                Materialize.toast('Some error occured, try again', 1000);
                $(document.getElementById('clue_'+e.id)).hide();
                $(e).show();
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
            $(document.getElementById('clue_'+e.id)).hide();
            $(e).show();
        }
    });

}
function getLeaderboard()
{
    $('#lb').empty();

    $.ajax
    ({ 
        url: 'leaderboard.php',
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            var divtable = document.createElement('table');
            var thead = document.createElement('thead');
            var tr = document.createElement('tr');
            var th1 = document.createElement('th');
            th1.textContent = "Rank";
            //th1.data-field = "rank";
            var th2 = document.createElement('th');
            th2.textContent = "Email-id";
           // th1.data-field = "email";
           var th3 = document.createElement('th');
           th3.textContent = "Points";
            //th1.data-field = "points";

            tr.append(th1);
            tr.append(th2);
            tr.append(th3);
            thead.append(tr);
            divtable.append(thead);

            var tbody = document.createElement('tbody');
            for (var i=0 ; i< result['leaderboard'].length ;i++)
            {
                var tr1 = document.createElement('tr');
                var td11 = document.createElement('td');
                td11.textContent = i+1;
                var td12 = document.createElement('td');
                td12.textContent = result['leaderboard'][i]['emailId'];
                var td13 = document.createElement('td');
                td13.textContent = result['leaderboard'][i]['points'];
                tr1.append(td11);
                tr1.append(td12);
                tr1.append(td13);
                tbody.append(tr1);
            }
            if(result['your_rank'] > 10)
            {
                tr1 = document.createElement('tr');
                td11 = document.createElement('td');
                td11.textContent = 11;
                td12 = document.createElement('td');
                td12.textContent = result['leaderboard'][i]['emailId'];
                td13 = document.createElement('td');
                td13.textContent = "points";
                tr1.append(td11);
                tr1.append(td12);
                tr1.append(td13);
                tbody.append(tr1);
            }
            divtable.append(tbody);
            $("#lb").append(divtable);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
            
        }
    });
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
                    in1.textContent = "SET "+result['state'];
                    
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
                        in7.className = "col s10";
                        in7.style = "font-size:18px; margin-left:5px;"
                    //check
                    in7.textContent = result['data'][i]['question'];

                    in6.append(in7);

                    var in8 = document.createElement('div');
                    in8.className = "input-field col s11";
                    in8.style = "margin-top:0px; margin-left:15px; color:black;";
                    var in9 = document.createElement('div');
                    in9.className = "col s10";
                    var input = document.createElement('input');    
                    //check below 3 statements
                    input.type = "text";
                    input.placeholder = "Your answer";
                    input.id = "answer_"+result['data'][i]['key'];
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
                    in14.id = result['data'][i]['key'];
                    // in14.addEventListener('click', function() {
                    //     submitAnswer(this);
                    // });
                    in14.onclick = function(){submitAnswer(this);}
                    in14.textContent = "SUBMIT";

                    in13.append(in14);  

                    var loader = document.createElement('div');
                    loader.className = "progress_loader";
                    loader.style = "display:none;";              
                    loader.textContent = "Loading...";
                    loader.id = "pl_" + result['data'][i]['key'];

                    in13.append(loader);
                    in12.append(in13);
                    in6.append(in12);

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