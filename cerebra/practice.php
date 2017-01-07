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
     <nav class="top-nav teal darken-2" style="height: 100px">
      <div class="nav-wrapper">
        <a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/k_logo.png" style="width: 250px"></a>
        <a href="#" class="brand-logo right hide-on-med-and-down" style="padding-top: 20px"><img class="responsive-img" src="img/ceg.png" style="width: 250px"></a>

      </div>
    </nav>

    <div class="container">
      <?php
      foreach ($_SESSION['practice'] as $question) { 
        ?>
        <div class="row">
          <div class="col s8 offset-s2">
            <div class="card hoverable grey lighten-4">
              <div class="card-content" style="padding-bottom: -15px;">

                <div class="col s12" style="font-size:18px;margin-left:5px"><?php echo $question['question'] ?></div>

                <div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">

                  <div class="col s10 m9">
                    <input type="text" placeholder="Your answer" id="answer_<?php echo $question['key'] ?>" class="validate"/>
                  </div>
                  <div class="col s2 m3">
                    <a class="btn-floating btn-large waves-effect waves-light teal lighten-3 black-text" style="margin-left:5%; margin-bottom: 1%;" id="<?php echo $question['key'] ?>" onclick="submitAnswer(this);">
                      <i class="material-icons">done</i>
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
      ?>
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