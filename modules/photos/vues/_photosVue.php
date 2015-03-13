<?php
foreach ($this->photo as $c) {
		$u = URL."photos/supprimer/".$c->getId();
		 echo "<div class='photos'>".$c->link();
		 if(isset($_SESSION['id']) && $c->utilisateur_id==$_SESSION['id'])
		 	echo "&nbsp;&nbsp;<a href = '$u' >X</a>";
		 echo "</div>";
	}
?>