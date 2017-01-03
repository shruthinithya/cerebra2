<?php 
session_start();
require 'utils.php';
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
.page-footer {
   position:fixed;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
      </style>
    </head>

    <body background="img/bg1.jpg" style="overflow-x: hidden;">
    <!--body bgcolor="#1a0a4b" background-size="100%"-->
      <div class="row">
        <div class="col s12">
         <img style="height: auto;width:20%;" src="img/k orange white.png"/>        
        </div>
      </div>
        <div class="row" style="background-color: #fff;width: 50%;">
    <form id="login_form" method="post" class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="icon_prefix email" type="text" class="validate" onblur="validatemail(this)" required>
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">vpn_key</i>
          <input id="icon_telephone password" type="password" class="validate" onblur="validatepass(this)" required>
          <label for="icon_telephone">Password</label>
        </div>
      </div>
      <div class="progress_loader" style="display:none;">Loading...</div>
      <center><input type="submit" class="waves-effect waves-light btn login_submit" style="margin-bottom: 10px;" value="Login"></center>      
    </form>
    <center>
      <!--a href="index.html" class="waves-effect waves-light btn" style="margin-bottom: 10px;">LOGIN</a-->
      <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">New Particpant? Register</a>
      </center>
  </div>
      <div class="footer">
      <footer class="page-footer" style="background-color: transparent; height: 70px;">          
        <div class="footer-copyright" style="background-color: rgba(255,255,255,1);">
        <div class="row">
          <div class="col s6">
            <div class="container" style="color: black;">

              Copyright 2016 @ CEG Tech Forum. All rights reserved.
            </div>
          </div>
          <div class="col s6" style="padding-left: 20%">           
              <img style="height: auto;width:400px; padding-top: 4px;" src="img/logo1.png"/>            
                <!--a class="grey-text text-lighten-4 right" target="_blank" href="http://kurukshetra.org.in">kurukshetra.org.in</a-->
          </div>
          </div>
        </div>
        </footer>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
        

      <!--Import jQuery before materialize.js-->
      

      
    </body>
  </html>