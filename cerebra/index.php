<?php 
session_start();
if (!isset($_SESSION['user']))
{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Cerebra K'17</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <link rel='stylesheet' href="css/progress_loader.css">
    <!--Let browser know website is optimized for mobile-->
    <link href='//fonts.googleapis.com/css?family=Caesar Dressing' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
      ::-webkit-input-placeholder { /* WebKit browsers */
        color:    white;
        opacity: 0.2 !important;
      }
      ::-webkit-label { /* WebKit browsers */
        color:    red;
        opacity: 0.2 !important;
      }

    </style>
  </head>

  <body>
   <nav class="top-nav teal darken-2">
    <div class="row">
    </div>  
  </nav>
  <div class="container" style="margin-top: 15vh; margin-bottom: 10vh">
    <div class="section">
      <div class="row">
       <div class="col s12 m6 push-m3 l6 push-l3">
        <div class="card">
          <div class="card-content">
            <center><span class="card-title grey-text text-darken-3"><b>Login</b></span></center>
            <form id="login_form" >
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix email" type="text" class="validate" name="email" onblur="validatemail(this)" required>
                  <label for="icon_prefix">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input id="icon_telephone password" type="password" class="validate" name="password" onblur="validatepass(this)" required>
                  <label for="icon_telephone">Password</label>
                </div>
              </div>
              <div class="progress_loader" style="display:none;">Loading...</div>
              <center><input type="submit" class="waves-effect waves-light btn login_submit" style="margin-bottom: 10px;" value="Login" autofocus=""></center>
            </form>
            <center>
             <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">New Particpant? Register</a>
           </center>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- <footer class="page-footer teal darken-2" style="padding-top: 0px">
  <div class="footer-copyright">
    <div class="container">
      © 2014 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>
<?php
}
else
{
  switch ($_SESSION['user']['state']) {
    case 0:
      # go to practice page
    break;

    case 5:
      # go to summary page
    break;
    
    default:
      # go to game play
    break;
  }
}
?>