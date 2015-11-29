<?php
?>
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
  font-family: Arial;
  font-weight: bolder;
  font-size: 30;
}
  </style>
</head>
<body data-spy="scroll" data-spy="affix" data-target=".navbar" style="background-color:#848484">
  <nav class="navbar navbar-inverse" data-spy="affix" style="background-color:#FACC2E">
  <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="color:#fff;text-align:left">MYUTC</a>
      </div>
      <form action="">
        <input type="text" name="recherche" placeholder="recherche">
        <input type="submit" class="btn btn-info" value="chercher" style="background-color:#61380B; border-color:#FACC2E"> </input>
      </form>
      <a src="" type="button" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#61380B; border-color:#FACC2E">Login
     <span class="caret"></span>
   </a>
   <a src="" type="button" class="btn btn-default" style="background-color:#61380B; color:#fff; border-color:#FACC2E">Ajout Module</a>
   <ul class="dropdown-menu">
 <li><a href="#">Déconnexion</a></li>
 <li><a href="#">Profil</a></li>
 </ul>
</div>
</nav>
<div class="container-fluid">
  <?php

  include "check-cas-connection.php";
  include "class/connection.php";

  include "includes/functions.php";
  $result=get_user_modules(phpCAS::getUser());
  //echo'<pre>';
  //var_dump ($result);
  //echo'</pre>';
  $i=0;
  echo"$i";
  $j=0;
  echo"$j";
  $conteur=count($result);
  echo"$conteur";
  ?>
  <table cellpadding=2 cellspacing=2>
    <tbody>
      <tr>
        <?php
          while($i<$conteur)
            {
              //var_dump($result[$i]);
              $lien=$result[$i]['lien'];
              //echo'<pre>';
              //var_dump($lien);
              //echo'</pre>';
              if ($j<=2)
                {
                  echo"<td><center>$lien</center></td>";
                }
              else
                {
                  echo"</tr><tr><td><center>$lien</center></td>";
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
</body>
</html>
