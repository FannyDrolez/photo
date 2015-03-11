<?php
class mainActions extends baseActions {

  public function executeindex() {
      if(isset($_SESSION['id']))
			{
	$sql = new PhotoSQL();
	$this->photo = $sql->findByutilisateur_id($_SESSION['id'])
		->orderBy("post_date DESC")
		->execute();
			}  
	}

}

?>
