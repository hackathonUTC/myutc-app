<?php

  	function mix_modules($my_modules, $every_modules){
  		//MIXE LES MODULES EN AJOUTANT UN  ATTRIBUT "ISADDED"; => permet d'etre reutilisé 
  		$modules = array();

  		foreach ($every_modules as $module) {
  			if (in_array($module, $my_modules)){
  				$module['isAdded'] = 1; 
  			}
  			else $module['isAdded'] = 0; 
  			$modules[] = $module;
  		}

  		return $modules;
  	}


	function get_modules() {
		//get every modules in the data base
		$sql = "SELECT * FROM module ORDER BY id";
		$conn = new connection();
		$conn->Connect();
		$response = $conn->Conn->query($sql);
		
		$retour = array();
		while ( $vResult = $response->fetch()) {
			$module = array();
			$module[titre] = $vResult['titre'];
			$module[description] = $vResult['description'];
			$module[lien] = $vResult['lien'];
			$module[id] = $vResult['id'];
			$module[img] = $vResult['img'];
			$retour[] = $module;
		}
		return $retour;
	}


	function get_user_modules($login) {
		//get every module added by the user
		$sql = "SELECT * 
				FROM module INNER JOIN menu_utilisateur 
					ON module.id = menu_utilisateur.module
				WHERE menu_utilisateur.utilisateur = '".phpCAS::getUser()."';";
		$conn = new connection();
		$conn->Connect();
		$response = $conn->Conn->query($sql);
		
		$retour = array();
		while ( $vResult = $response->fetch()) {
			$module = array();
			$module[titre] = $vResult['titre'];
			$module[description] = $vResult['description'];
			$module[lien] = $vResult['lien'];
			$module[id] = $vResult['id'];
			$module[img] = $vResult['img'];
			$retour[] = $module;
		}
		return $retour;
	}
?>