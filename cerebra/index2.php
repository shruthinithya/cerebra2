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
.page-footer {
   position:fixed;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
.img-div { height:100%; width:100%;}
img { max-width:100% }

      </style>
    </head>

    <body style="overflow-x: hidden;">
	<header>
      <nav class="top-nav teal" style="height:90px;">
      <div class="row">
           <div class="col s3"><a href="http://kurukshetra.org.in/" target="_blank"><img style="height:90px;width:250px; padding-left: 10px;" src="img/k orange white.png"/></a></div>
		   <div class="col s6 flow-text" style="text-align:center;font-size:60px;padding-top:15px;font-family:'Merienda One';font-style:italic">CEREBRA</div>
		 </div>  
      </nav>
      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
	  
	  </div>
    </header>
	<main>
		<div class="container">
		<div class="row">
	  <div class="col s8">
	   <br>
	   <div class="card grey lighten-4">
	   <div class="card-content">
	   <center><span class="card-title grey-text text-darken-3"><b>Login</b></span></center>
	    <form id="login_form" method="post" action="#" >
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
     <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">New Particpant? Register</a>
    </center>
	</div>
	</div>
	</div>
	</div>
	</div>
	</main>
	<div class="footer flow-text teal">
    	<footer class="page-footer teal" style="height:60px;padding-top:5px">          
        <div class="footer-copyright teal">
		  
		<div class="row center"> 
		  <div class="col s1"><img style="height:50px;width:100px; padding-left:0px;" src="img/logo 1.png"/></div>
  		  <div class="col s1 offset-s1"><img style="height:40px;width:100px; padding-left: 0px;" src="img/logo 2.png"/></div>
		  <div class="col s4 offset-s1 center"><span class="flow-text" style="font-size:16px;color:white">Copyright 2016 @ CEG Tech Forum. All rights reserved.</span></div>
		  <div class="col s1 offset-s1"><img style="height:40px;width:80px; padding-left: 0px;" src="img/logo 3.png"/></div>
		  <div class="col s1 offset-s1"><img style="height:40px;width:100px; padding-left: 0px;" src="img/logo 4.png"/></div>
		</div>
		</div>
        </footer>
        </div>
		 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
	</body>
</html>