
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
                document.getElementById(e.id).className = "btn disabled";
                $(document.getElementById('pl_'+e.id)).hide();
                $(e).show();
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
    $(document.getElementById('pl_'+e.id)).show();
    alert(e.id);
    $.ajax
    ({ 
        url: 'getClue.php',
        data: 'key=' + e.id,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            alert(result['code']);
            if(result['code']==1)
            {
                Materialize.toast(result['clue'], 5000);
                $(document.getElementById('pl_'+e.id)).hide();
                $(e).show();
            }
            else if(result['code']==2)
            {
                Materialize.toast('You will get your hint only after next set opens', 1000);
            }
            else
                Materialize.toast('asasd', 1000);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert('error');          
            $(document.getElementById('pl_'+e.id)).hide();
            $(e).show();
        }
    });

}
function getLeaderboard()
{
    alert('sa');
    $('ul.tabs').tabs('select_tab', '#lb');
}