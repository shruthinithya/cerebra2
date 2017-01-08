<?php 
session_start();
if (isset($_SESSION['user']))
{

  if ($_SESSION['user']['state'] == 5)
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
     <nav class="top-nav teal darken-2" style="height: 80px">
      <div class="nav-wrapper">
        <a href="//kurukshetra.org.in" class="left"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
        <a class="brand-logo right" href="logout.php" style="padding-top: 10px" >
          <i class="large material-icons">power_settings_new</i>
        </a>    

      </div>
    </nav>

    <div class="container" style="margin-top: 15vh; margin-bottom: 10vh; min-width: 200px">
      <h4 class='center-align'>Leaderboard</h4>
      <div id="lb" class="col s12" align="center" style="padding-top: 40px">
        <div class="progress_loader" id="lbloader" style="display:none;">Loading...</div>
        <div id="leaderboard"></div>
      </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/register.js"></script>

    <script>
      $(document).ready(function() {
        getLeaderboard();

      });
    </script>

    <script type="text/javascript">
      var updates = ["Dalal Bull Main Run starts on Jan 9, 6pm.", "Sherlock Event is on Jan 18.", "ROS Event is on Jan 20.", "OLPC Event is on Jan 22.", "Kurukshetra Hackathon is on Feb 3, 6pm.", "TDP submission is open for Contraptions.", "TDP submission is open for Robowars.", "TDP submission is open for Godspeed."];
      setInterval(function(){
        var index =  Math.floor(Math.random() * (2 - 0 + 1)) + 0;
        Materialize.toast(updates[index], 1000);

      }, 10000);

    </script>

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

    default:
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
