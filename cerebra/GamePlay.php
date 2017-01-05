<?php 
require 'getQuestions.php';
//require 'login.php';
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
		.disabled
		{
			pointer-events:none; 
			opacity:0.6;         
		}

	</style>
	
</head>

<body style="overflow-x: hidden;"s>
	<header>
		<nav class="top-nav teal" style="height:90px;">
			<div class="row">
				<div class="col s3"><a href="http://kurukshetra.org.in/" target="_blank"><img style="height:90px;width:250px; padding-left: 10px;" src="img/k orange white.png"/></a></div>
				<div class="col s6 flow-text" style="text-align:center;font-size:60px;padding-top:15px;font-family:'Merienda One';font-style:italic">CEREBRA</div>
				<!--div id="txt" style="font-size: 30px;"></div-->
				<div class="col s2" id='timer'  style="font-size: 20px;" />
			</div>
			<div class="col s1" style="font-size: 20px;" /><a href="logout.php">Logout</a>
		</div>   
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

					<?php for($i=0;$i<$_SESSION['user']['state'] ; $i++) { ?>
					<li>
						<!-- SET begins -->
						<div class="collapsible-header teal lighten-5" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
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
														<input type="text" placeholder="Your answer" id="answer_<?php echo $_SESSION['questions'][$j]['key'] ?>" class="validate"/>
													</div>
													<div class="col s2  checkanswer">
														<a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" onclick="Materialize.toast('This is your hint', 4000)">
															Hint? 	                       
														</a>
													</div>
													<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
												</div>

												<div class="row"><div class="col s12">
													<a class="btn ansbtn" style="margin-left:5%; margin-bottom: 1%;" id="<?php echo $_SESSION['questions'][$j]['key'] ?>" onclick="submitAnswer(this);">SUBMIT</a>
													<div class="progress_loader" id="pl_<?php echo $_SESSION['questions'][$j]['key'] ?>" style="display:none;">Loading...</div>
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
					?>
<!-- 					<div class="nextLevelQuestions"></div>		
 -->				</ul>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<!-- timer -->
<script type="text/javascript" src="js/timer.js"></script>
<script type="text/javascript">      
	var startTime = new Date('<?php echo $_SESSION['user']['startTime']; ?>');
	var currentTime = new Date('<?php echo $_SESSION['current_time']; ?>');
	var diff = currentTime - startTime;
	console.log(startTime);
	console.log(currentTime);
	console.log(diff);
	
	var timing = Math.ceil(3600-(diff/1000)); 
	console.log(timing);
	window.onload = CreateTimer("timer", timing);
</script>


<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/register.js"></script>



</body>
</html>
