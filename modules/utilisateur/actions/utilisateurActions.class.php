<?php
class utilisateurActions extends baseActions {

public function executeAjaxloginexiste($login){
	$sql = new UtilisateurSQL();
	$result = $sql->findBylogin($login)->execute();
if(count($result)==0){
	$this->message = "Ce login est disponible";
}else{
	$this->message = "Ce login n'est pas disponible";
}}

    public function executeInscription() {
		if(isset($_POST['login'])){
			$sql = new UtilisateurSQL();
			$existe = $sql->findBylogin($_POST['login'])->execute();
			if(count($existe)==0){
				$u = new utilisateur($_POST['login'],$_POST['mail'],$_POST['mdp'],"");
				$u->save();
				$_SESSION['id'] = $u->getId();
				$_SESSION['login'] = $u->login;
				header("location:".URL);
			}
		}
    }
	


	public function executeRecherche() {
		$sql = new UtilisateurSQL();
		$this->utilisateurs = $sql->findWithCondition("login like CONCAT(?,'%')",array($_POST['recherche']))->orderBy("login")->execute();
	}
    /** 
    * Fonction de connexion, on reçoit dans le Post le login et le mot de passe
    */
    public function executeconnexion() {
		if(isset($_POST['login'])){
			$sql = new UtilisateurSQL();
			$existe = $sql->findBylogin($_POST['login'])->execute();
			if(count($existe)==1){
				$u = $existe[0];
				if($u->mdp==$_POST['mdp']){
				$_SESSION['id'] = $u->getId();
				$_SESSION['login'] = $u->login;
				header("location:".URL);
			}
		}
    }
   }

    /** 
    * Fonction de changement de profil
    */

  public function executeprofil($id) {
		$sql = new UtilisateurSQL();
		$this->utilisateur = $sql->findById($id);
		if($this->utilisateur==false) header("Location".URL);
		$sqlP=new PhotoSQL();
		$this->photo=$sqlP->findByutilisateur_id($id)
      		->orderBy("post_date DESC")
      		->execute();
	}

 /** 
  *Fonction de déconnexion
 */
  public function executedeconnexion() {
	    session_destroy();
	    header("location:".URL);
  }

  public function executesuivre($suivi_id){
  	if($_SESSION['id']==false)
  		return;
  	$s = new Suit($_SESSION['id'],$suivi_id);
  	$s -> save();
  	header("Location:".URL."/utilisateur/profil/$suivi_id");
  }
//Faire le désabonnement
  
}

//photo que de cette album

/* public function executeAlbum($ida){
	$sql = new PhotoSQL();
	$this->photos = $sql->findWithCondition("id IN(SELECT photo_id FROM contient WHERE album_id=?", array($ida))orderBy("nom")->execute();*/
//}




