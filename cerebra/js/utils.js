 
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
                if(result.response!=0)
                {
                 //   $('#login_link').remove();
                  //  $('#register_as_new_sa').remove();
                   // $('.login').modal('toggle');
                    /*BootstrapDialog.show({
                        title: 'Hey '+result.name+' 😁',
                        message: 'Successfully logged in!',
                        type: BootstrapDialog.TYPE_SUCCESS,
                        closable: true,
                        draggable: true
                    });*/
                    alert("success");
                }
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
               /*BootstrapDialog.show({
                title: 'Oops!',
                message: 'Some error occured 😪 <br/> Please try after refreshing',
                type: BootstrapDialog.TYPE_DANGER,
                closable: true,
                draggable: true
                });  */   
                alert('failure');          
            }
        });
        $('.progress_loader').hide();
        $('.login_submit').show();
    }
    else
    {
        BootstrapDialog.show({
            title: 'Hey!',
            message: 'Please enter valid credentials 😒',
            type: BootstrapDialog.TYPE_WARNING,
            closable: true,
            draggable: true
        });
        $('.progress_loader').hide();
        $('.login_submit').show();
    }
    e.preventDefault();
});


