
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
    $.ajax
    ({ 
        url: 'submit.php',
        data: 'key=' + e.id + '&answer=' + answer,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            if(result['code']==1)
            {
                Materialize.toast('Right Answer!', 1000);
                document.getElementById('answer_'+e.id).disabled = true;
                //document.getElementById(e.id).hide();
                $(document.getElementById('pl_'+e.id)).hide();
                $(e).hide();
            }
            else if(result['code']==0)
            {
                Materialize.toast('Dai thappudaa!', 1000);
                $(document.getElementById('pl_'+e.id)).hide();
                $(e).show();
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
                td13.textContent = "points";
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
            document.getElementsByClassName("lb")[0].append(divtable);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
            
        }
    });
    $('ul.tabs').tabs('select_tab', '#lb');
}