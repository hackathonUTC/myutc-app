<html>
<head>
  <title>My UTC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  th, td
  {padding: 10px;}
  input[type="text"]
  {
    padding:3px;
    border:1px solid #848484;
    border-radius:5px;
    box-shadow:1px 1px 2px #C0C0C0 inset;
}
.affix {
  top: 0;
  width: 100%;
  }
.affix + .container-fluid {
      padding-top: 150px;
  }
.navbar-brand {
  font-family: arial;
  font-weight: bolder;
  font-size: 30;
}
  </style>
</head>
<body data-spy="scroll" data-spy="affix" data-target=".navbar" style="background-color:#848484">
<div class="container-fluid">
  <?php

include "check-cas-connection.php";
include "class/connection.php";

include "includes/functions.php";
$result=get_user_modules(phpCAS::getUser());
$moduleadd=array();
$moduleadd['lien']='src/user/gestion_menu_utilisateur.php';
$moduleadd['img']='src/img/add.png';
$result[]=$moduleadd;
echo "<br><br><br>";
//echo'<pre>';
//var_dump ($result);
//echo'</pre>';
$i=0;
//echo"$i";
$j=0;
//echo"$j";
$conteur=count($result);
//echo"$conteur";
?>
  <center>
  <table cellpadding=5 cellspacing=5>
    <tbody>
      <tr>
        <?php
            while($i<$conteur)
              {
                //var_dump($result[$i]);
                $lien=$result[$i]['lien'];
                $img=$result[$i]['img'];
                //echo'<pre>';
                //var_dump($img);
                //echo'</pre>';
                if ($j<2)
                  {
                    ?><td>
                      <center><a href=<?php echo "'".$lien."'";?> >
                        <img src=<?php echo "'".$img."'";?> class='img-rounded' style='max-width:450px' width='90%' height='auto'/>
                      </a>
                      </center></td>
                      <?php
                  }
                else
                  {
                    ?></tr><tr><td>
                      <center><a href=<?php echo "'".$lien."'";?> >
                        <img src=<?php echo "'".$img."'";?> class='img-rounded' style='max-width:450px' width='90%' height='auto'/>
                      </a>
                      </center></td>
                    <?php
                    $j=0;
                  }
                $i=$i+1;
                //echo"$i";
                $j=$j+1;
                //echo"$j";
              }
          ?>
        </tr>
    </tbody>
  </table>
</div>
  </table>
  </center>
  </div>
</body>
</html>
