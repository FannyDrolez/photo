<div id = 'info'>
	<?php

		$profil = $this->utilisateur;

		echo "<h2>Profil de ".$profil->login."</h2>";

		//suivre


		//photo de profil
		if(!empty($profil->avatar)) echo ">img alt='".$profil->login."' src='".$profil->avatar."'/>";
		else echo "<img alt='".$profil->login."' src='".URL."/img/avatars/anonyme.png'/>";
		

		include("modules/photos/vues/_photosVue.php"); 
		$urlsuivre=URL."/utilisateur/suivre/".$profil->getId();
	?>
	<a href='<?php echo $urlsuivre?>'>Suivre</a>

</div>