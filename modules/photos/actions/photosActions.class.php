//Ajouter des photos
//Chercher des gens
//Voir un profil pour décider si on suit la personne ou pas
//Suivre des personnes... 

<?php
class photosActions extends baseActions {
    public function executesupprimer($idp){
        if(!isset($_SESSION['id'])){
            header("Location:index.php");
        }
        
        $sql = new PhotoSQL();
        $c = $sql->findById($idp);
        if($c==false || $c->utilisateur_id=$SESSION['id'])
            header("Location:error404.php");
        
        unlick($c->fichier);
        $c->delete();
        $_SESSION['info']="Votre photos à bien était supprimé";
        header(Location:".$_SERVER[HTTP_REFERER]");
           
    public function executeupload(){
        if(!isset($_SESSION['id'])){
            header("location:".URL);
        }
 print_r($_FILES);
        if(isset($_FILES['photo'])){
            $error = false;
            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $extension_upload = strtolower(  
                substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
        
            if ( !in_array($extension_upload,$extensions_valides) ) 
                $error="Extension non valide";
            if($error==false && $_FILES['photo']['error']==0 && $_FILES['photo']['size']<3000000){
                $fichier="./uploads/".uniqid().".$extension_upload";

                if(move_uploaded_file($_FILES['photo']['tmp_name'],$fichier)) {
                   $c = new Photo($_POST['nom'],$fichier,date("Y-m-d h:i:s"),$_POST['style'],$_SESSION['id']);
                                   $c->save();
                                   header("Location:".URL);
                }
        }
      
    }
    }
}
