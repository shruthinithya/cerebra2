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

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:#424242;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:#424242;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:#424242;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color: #424242;
}

.btn, .btn-floating
{
	position: absolute; 
	z-index: auto;
}

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
	
	<div class="row" style="padding-bottom:40px;">
     <ul class="tabs" style="overflow-x: hidden;">
		    <li class="tab col s12 l4"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
            <li class="tab col s12 l4"><a href="#forum" style="font-size:18px" >Forum</a></li>
            <li class="tab col s12 l4"><a href="#lb" style="font-size:18px" >Leaderboard</a></li>
     </ul>
     <div id="game" class="col s12" align="center">
      <ul class="collapsible popout" data-collapsible="accordion" style="width:100%; display: inline-block; text-align: left">
       <li>
	   <!-- SET 1 begins -->
       <div class="collapsible-header teal lighten-5" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
	   SET 1</div>
	   	<div class="collapsible-body">
		 
		
		<!-- qs starts -->
	  <div class="row">
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 1</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
	
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 2</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer"/>
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 3</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		<div class="row">
	  <div class="col s12">
	  <a class="btn-large" style="margin-left:43%; margin-bottom:2%;" onclick="Materialize.toast('Please fill all the answers', 4000)">
	   SUBMIT SET 1
	   </a></div>
	  </div>
	  </div>
	  
	  
       </li> 
	   <!-- SET 1 ends -->
	   <!-- SET 2 begins -->
      <li>
	  <div class="collapsible-header teal lighten-4" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
	   SET 2</div>
	   	<div class="collapsible-body">
		 
		
		<!-- qs starts -->
	  <div class="row">
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 1</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
	
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 2</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 3</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		
		<div class="row">
	  <div class="col s12">
	  <a class="btn-large" style="margin-left:43%; margin-bottom:2%;" onclick="Materialize.toast('Please fill all the answers', 4000)">
	   SUBMIT SET 2
	   </a></div>
	  </div>
	  </div>
	  
	  </li>	
	  <!-- SET 2 ends -->
	  <!-- SET 3 begins -->
	  <li>
	  <div class="collapsible-header teal lighten-5" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
	   SET 3</div>
	   	<div class="collapsible-body">
		 
		
		<!-- qs starts -->
	  <div class="row">
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 1</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
	
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 2</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		
		<!-- qs starts -->
	   
	   <br>
		<div class="col s8 offset-s2">
		 <div class="card hoverable grey lighten-4">
		  <div class="card-content">
		  <div class="row">
		  <div class="row"><div class="col s10" style="font-size:18px;margin-left:5px">Question 3</div>
			<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">
			<div class="row">
			<div class="col s10">
			 <input type="text" placeholder="Your answer" />
			</div>
			<div class="col s2  checkanswer">
			 <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
               Hint? 	                       
             </a>
			</div>
			</div>
			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
			</div>
			
			<div class="row"><div class="col s12">
			<a class="btn" style="margin-left:75%; margin-bottom: 1%;" onclick="Materialize.toast('Right answer!', 4000)">SUBMIT</a>
			</div></div>
		  </div>
		  </div> 
		 </div>
		  </div>  
	    </div>
		<!-- qs ends -->
		<div class="row">
	  <div class="col s12">
	  <a class="btn-large" style="margin-left:43%; margin-bottom:2%;" onclick="Materialize.toast('Please fill all the answers', 4000)">
	   SUBMIT SET 3
	   </a></div>
	  </div>
	  </div>
	  </li>
	  <!-- SET 3 ends -->
	  </ul>
	</div>
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
		<script>
		
		</script>
		 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
	</body>
</html>