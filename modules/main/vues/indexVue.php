<?php
if(isset($_SESSION['id'])){
	echo "J'ai $this->nbSuiveur personnes qui me suivent";
	echo "J'ai $this->nbSuivi personnes que je suis";
	
	include("modules/photos/vues/_photosVue.php"); 
	include("modules/photos/vues/uploadVue.php");

}
?>