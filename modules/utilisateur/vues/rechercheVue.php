<?php
foreach($this->utilisateurs as $u) {
	if($u->getId()==$_SESSION['id']) continue; //
	$url=URL."/utilisateur/profil/".$u->getId();
	echo "<a href='$url'>$u->login</a>";

}
?>