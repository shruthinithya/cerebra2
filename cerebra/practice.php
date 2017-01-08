<?php 
require 'prerun.php';
if (isset($_SESSION['user']))
{
  if ($_SESSION['user']['state'] == 0)
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

    <div class="container">
    <div class="col s12">
              <p class="flow-text center-align">
              <a>Practice Level</a>&nbsp;  
        </div>  
      <?php
      $count = 0;
      foreach ($_SESSION['practice'] as $question) { 
        if(count($_SESSION['user']['questions_answered']) == count($_SESSION['practice']))
        {
          header("Location: GamePlay.php");
         ?>
         <!-- <center><button style="margin-top: 20%; font-size: 30px; height: 40px;" class="btn waves-effect waves-light" type="submit" name="action"><a href="GamePlay.php" style="color: #fff;">CLICK TO PROCEED TO MAIN GAME
    <i class="material-icons right">send</i></a>
  </button></center> -->
        <?php    
        //break;
        }
        if(!in_array($question['key'],$_SESSION['user']['questions_answered']))
        {                  
        
        ?>
        
        <div class="row">
          <div class="col s8 offset-s2">
            <div class="card hoverable grey lighten-4">
              <div class="card-content" style="padding-bottom: -15px;">

                <div class="col s12" style="font-size:18px;margin-left:5px"><?php echo $question['question'] ?></div>

                <div class="input-field" style="margin-top:0px; margin-left:15px; color:black;">

                  <div class="col s9">
                    <input type="text" placeholder="Your answer" id="answer_<?php echo $question['key'] ?>" class="validate"/>
                  </div>
                  <div class="col s2">
                    <a class="btn-floating btn-large waves-effect waves-light black-text" style="margin-left:5%; margin-bottom: 1%; width: 36px; height: 36px;" id="<?php echo $question['key'] ?>" onclick="submitAnswer(this);">
                      <i class="material-icons" style="line-height: 1px;">done</i>
                    </a>
                    <div class="progress_loader" id="pl_<?php echo $question['key'] ?>" style="display:none;">Loading...</div>
                  </div>                  
                </div>

                <div class="row"></div>
              </div>
            </div>  
          </div>
        </div>

        <?php
      }
    }
      ?>
      <center>
        <a style="font-size: 22px;">Proceed to next level<i class="material-icons">arrow_forward</i></a>
      </center>
    </div>

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
    case 5:
    header("Location: summary.php");
    break;
    
    default:
    header("Location: GamePlay.php");
    break;
  }
}
}
else
{
  header("Location: index.php");

}
?>