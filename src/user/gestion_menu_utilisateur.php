<!DOCTYPE html>
<html>
	<head>
		<title>Gestion du menu</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
		<style>
		#body{
		padding: 5px;
		background-color: white;
		border-radius: 10px;
		width: 500px;
		}
		</style>
	</head>
	<body>
	<div id="body">
	<h1>Gestion de votre menu</h1>
		<h2>Les modules que vous n'utilisez pas encore</h2>
		<table>
			<tr>
				<th>Module</th>
				<th>Description</th>
				<th>Intégrer</th>
			</tr>
			<?php
			include "../../class/connection.php";

			include "../../check-cas-connection.php";
			include "../../includes/functions.php";

			$user = phpCAS::getUser();

			echo $user;
			$SQL = "
			SELECT module.titre, module.description, menu_utilisateur.utilisateur, module.id FROM module LEFT JOIN menu_utilisateur ON module.id = menu_utilisateur.module
			WHERE menu_utilisateur.module is NULL OR menu_utilisateur.utilisateur <> '". $user ."' GROUP BY menu_utilisateur.module 
			";

			$conn = new connection();
			$conn->Connect();
			
			
			$response = $conn->Conn->query($SQL);
			
			while ($vResult = $response->fetch())
			{
			?>
				<tr>
					<td><?php echo $vResult['0'];?></td>
					<td><?php echo $vResult['1'];?></td>
					<td><a href="ajout_module_utilisateur.php?utilisateur_id=<?php echo $vResult['2'];?>&module=<?php echo $vResult['3'];?>&new=true">&plus;</a></td>
				</tr>
			<?php
			}
			?>
		</table>
		<h2>Modifier la priorité des modules</h2>
	<table>
			<tr>
				<th>Module</th>
				<th>Priorité</th>
				<th>Supprimer</th>
			</tr>
			<?php
			$SQL = "SELECT menu_utilisateur.priorite, menu_utilisateur.utilisateur, module.titre, module.id FROM menu_utilisateur, module WHERE menu_utilisateur.utilisateur = '".$user."' AND menu_utilisateur.priorite > -1 AND module.id = menu_utilisateur.module";
							
			$response = $conn->Conn->query($SQL);
		
			while ($vResult = $response->fetch())
			{
			?>
				<tr>
					<td>
						<?php echo $vResult['titre'];?>
					</td>
					<td>
						<?php $prio = $vResult['priorite'];?>
						<select name="priorite" class="module-priorite" module="<?php echo $vResult['id'];?>"  utilisateur="<?php echo $vResult['utilisateur'];?>">
							<option value="0" class="" <?php if ($prio == 0) { echo selected; }?>>Faible</option>
							<option value="1" class="" <?php if ($prio == 1) { echo selected; }?>>Moyenne</option>
							<option value="2" class="" <?php if ($prio == 2) { echo selected; }?>>Forte</option>
						</select>
					</td>
					<td><a href="supprimer_module_menu.php?module=<?php echo $vResult['id'];?>&utilisateur=<?php echo $vResult['utilisateur'];?>">&otimes;</a></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
		
		
		<script type="text/javascript">
		    var prioSelect = document.getElementsByClassName('module-priorite');
				
				for(var i = 0, len = prioSelect.length ; i < len ; i++)
				{
					var select = prioSelect[i];
                select.onchange = function(){
                    var priorite = select.options[select.selectedIndex].value;
                    var moduleName = select.attributes['module'].nodeValue;
                    var userName = select.attributes['utilisateur'].nodeValue;
                    
                    var url = "ajout_module_utilisateur.php?module=" + moduleName + "&utilisateur=" + userName + "&priorite=" + priorite;
                    console.log(url);
                    window.location = url
                }
            }
		</script>
		
	</body>
</html>