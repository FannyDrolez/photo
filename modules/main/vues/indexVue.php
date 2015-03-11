<?php
if(isset($_SESSION['id'])){
	foreach ($this->photo as $c) {
		echo $c->link();
	}
}
?>