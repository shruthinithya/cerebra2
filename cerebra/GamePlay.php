<?php 
require 'getQuestions.php';
if (isset($_SESSION['user']))
{

	if ($_SESSION['user']['state'] > 0 && $_SESSION['user']['state'] < 5)
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
				.btn-floating.btn-large
				{
					width:36px;
					height:36px;
				}
				.btn-floating.btn-large i
				{
					line-height : 16px;
				}
				.blue
				{
					background-color: #2314ac !important;
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
				
			</style>
			
		</head>

		<body style="overflow-x: hidden;">
			<nav class="top-nav teal darken-2" style="height: 80px">
				<div class="nav-wrapper">
					<a href="//kurukshetra.org.in" class="left"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
					<a class="brand-logo right" href="logout.php" style="padding-top: 10px" >
						<i class="large material-icons">power_settings_new</i>
					</a>    

				</div>
			</nav>

			<main>
				<div class="container" style="padding-top: 20px">
					<div class="row">
						<div class="col s12 hoverable">
							<p class="flow-text center-align">
								<a>Main Level</a>&nbsp;
								<a id="timer"></a>&nbsp;
								<a>Score&nbsp;</a><a id="points"><?php echo $_SESSION['user']['points'] ?></a></p>

							</div>				
						</div>
						<div class="row" style="padding-top:20px;">
							<ul class="tabs" >
								<li class="tab col s12 l4"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
								<li class="tab col s12 l4"><a href="#lb" style="font-size:18px" onclick="getLeaderboard();">Leaderboard</a></li>
								<li class="tab col s12 l4"><a href="#htp" style="font-size:18px">How To Play</a></li>

							</ul>

							<div id="game" class="col s12" align="center" style="padding-top: 40px">
								<ul class="collapsible popout" data-collapsible="accordion" style="width:100%; display: inline-block; text-align: left">

									<?php 
									$j = 0; $count =  0;
									for($i=0;$i<$_SESSION['user']['state'] ; $i++) { ?>
									<li>
										<!-- SET begins -->
										<div class="collapsible-header grey lighten-4 z-depth-2" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
											SET <?php echo $i+1 ?>
										</div>
										<div class="collapsible-body z-depth-2">		 	
											<div class="row">
												<br>
												<?php								
	  // number of questions in each set
												for($k=0;$k<(sizeof($_SESSION['questions'])/$_SESSION['user']['state']);$k++)
												{
									//echo $j ; 
													if(!in_array($_SESSION['questions'][$j]['key'],$_SESSION['questions_answered']))
													{									 
														$count = 1;
														?>
														<div class="col s8 offset-s2">
															<div class="card hoverable grey lighten-4">
																<div class="card-content" style="padding-bottom: -15px;">

																	<div class="col s12" style="font-size:18px;margin-left:5px"><?php echo $_SESSION['questions'][$j]['question']; ?></div>

																	<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">

																	<div class="col s12 m9">
																		<input type="text" placeholder="Your answer" id="answer_<?php echo $_SESSION['questions'][$j]['key'] ?>" class="validate"/>
																	</div>
																	<div class="col s6 m2">
																		<a class="btn-floating btn-large waves-effect waves-light" style="margin-left:5%; margin-bottom: 1%;" id="<?php echo $_SESSION['questions'][$j]['key'] ?>" onclick="submitAnswer(this);"><i class="material-icons">done</i></a>
																		<div class="progress_loader" id="pl_<?php echo $_SESSION['questions'][$j]['key'] ?>" style="display:none;">Loading...</div>
																	</div>
																	<?php if ($i < 3) {?>
																		<div class="col s6 m1">
																			<a id="<?php echo $_SESSION['questions'][$j]['key'] ?>" class="btn-floating btn-large waves-effect waves-light black-text blue" onclick="getClue(this);">
																				<i class="material-icons">lightbulb_outline</i></a>      
																				<div class="progress_loader" id="clue_<?php echo $_SESSION['questions'][$j]['key'] ?>" style="display:none;">Loading...</div>                
																			</div>
																			<?php } ?>

																			<!-- <label class="active grey-text text-darken-2" for="first_name2" style="font-size:18px;">Question 1</label>-->
																		</div>

																		<div class="row">

																		</div>
																	</div>
																</div>  
															</div>

															<?php
														}
														$j++;
													}
													if($count == 0)
													{
														?>
														<p class="flow-text center-align"> You have answered all questions in this set 😎  </p>
														<?php
													}
													?>

												</div>
											</div>
										</li>
										<?php
									}
									?>
								</ul>
							</div>
							<div id="lb" class="col s12" align="center" style="padding-top: 40px">

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/utils.js"></script>


	<!-- timer -->
	<script type="text/javascript" src="js/countdown.min.js"></script>
	<script type="text/javascript">   
		$(document).ready(function() {
		// var startTime = new Date('<?php echo $_SESSION['user']['startTime']; ?>');
		// var currentTime = new Date('<?php echo $_SESSION['current_time']; ?>');
		// var diff = currentTime - startTime;
		// console.log(startTime);
		// console.log(currentTime);
		// console.log(diff);
		// var timing = Math.ceil(3600-(diff/1000)); 
		// console.log(timing);
		// CreateTimer("timer", timing);
		var startTime = new Date('<?php echo $_SESSION['user']['startTime']; ?>');
		var endTime = new Date(startTime.getFullYear(), startTime.getMonth(), startTime.getDate(), startTime.getHours()+1, startTime.getMinutes(), startTime.getSeconds(), startTime.getMilliseconds());
		setInterval(function(){
			var seconds = countdown(null, endTime).seconds;
			$('#timer')[0].innerHTML = countdown(null, endTime).hours + ':' + countdown(null, endTime).minutes + ':' + ((seconds < 10) ? "0" + seconds : + seconds);
		}, 1000);
		setInterval(function(){			
			var diff = Math.round(countdown( null , endTime).value/1000);
			if(diff == 2700 || diff == 1800 || diff == 900)
			{
				getNextLevel();		 
			}
			else if(diff == 120)
			{
				Materialize.toast("Last 2 minutes. Submit your answers! 😮", 1000);
			}
			else if(diff == 0)
			{
				location.reload();
			}
		}, 1000);
	});
</script>


<script type="text/javascript" src="js/register.js"></script>



</body>

</html>
<?php
}
else
{
	switch ($_SESSION['user']['state']) {
		case 5:
		header("Location: summary.php");
		break;

		case 0:
		header("Location: practice.php");
		break;
	}
}
}
else
{
	header("Location: index.php");

}
?>
