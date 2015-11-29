<?php

require_once 'check-cas-connection.php';
require_once "class/connection.php";
require_once "includes/functions.php";




//phpCAS::getUser();

//USER
	$my_modules = get_user_modules(phpCAS::getUser());
	$every_modules = get_modules();

	$modules = mix_modules($my_modules, $every_modules);

display_modules($modules);

function display_modules($modules) {
?>
<br>
<br>
<br>
<div class="container">
 <table class="table table-striped">
	 <thead>
		 <tr>
			 <th></th>
		 </tr>
	 </thead>
	 <tbody>
		 <tr>
<?php
$n=count($modules);
$i=0;
while($i<$n){
write_module($modules[$i]);
$i++;
} ?>
</table>
<?php
}
function write_module($module){
	?>
	<tr>
		<td><img src="<?php echo $module['img']; ?>" class="img-rounded" width=60% style="max-width:450px; min-width:100px" height=width></td>
		<td><table style="width:100%">
			<thead>
				<tr>
					<th><?php echo $module['titre']; ?></th>
					<th><?php if ($module['isAdded']==0) {
		      ?>
		      <button type="button" class="btn btn-success">Ajouter</button></th>

		  <?php
		    }
		  else { ?>
		    <button type="button" class="btn btn-danger">Supprimer</button></th>
		  <?php } ?>
  			</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $module['description'];?></td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
<?php
}
?>
