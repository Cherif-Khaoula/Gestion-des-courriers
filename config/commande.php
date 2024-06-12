<?php


 function getAdmins($email,$password){
  if(require("connexion.php"))
  {
    $req = $access->prepare("SELECT *  FROM admin WHERE email=? AND mdp =?");
    
    $req->execute(array($email,$password));
    if($req->rowCount() == 1){
      $data=$req->fetch();
      return $data;
    }else{
      return false;
    }

    $req->closeCursor(); 
  }
 }


 function ajouter($ref,$naturecour,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet,$type,$etat,$pdf)
 {   
   
         if(require("connexion.php")){
           $req = $access->prepare("INSERT INTO courrierarrive(ref,naturecour,datecourr,envoyerpar,distination,sousdistination,datetraite,remarque,objet,type,etat,pdf) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
     
           $req->execute(array($ref,$naturecour,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet,$type,$etat,$pdf));
     
           $req->closeCursor();
         
          
       }
     

 }
  function ajoutercompte($nom,$prenom,$num,$pdf,$dir,$dep,$email,$mdp,$grade)
  {   if(require("connexion.php")){
      $req = $access->prepare(" INSERT INTO admin(nom, prenom, num, image, dir, dep, email, mdp, grade) VALUES (?,?,?,?,?,?,?,?,?)");

      $req->execute(array($nom,$prenom,$num,$pdf,$dir,$dep,$email,$mdp,$grade));

      $req->closeCursor();
    
     
  }

  }



  function affichercour(){
    if(require("connexion.php")){
        $req=$access->prepare("SELECT * FROM `courrierarrive` WHERE type='arrivee' ORDER BY id DESC " );
        $req->execute();
        $data = $req->fetchall(PDO :: FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
 }


 function affichercourr($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM courrierarrive WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function affichercourrier($envoyerpar){
  if(require("connexion.php")){
      $req=$access->prepare("SELECT * FROM `courrierarrive` WHERE envoyerpar= ?" );
      $req->execute();
      $data = $req->fetchall(PDO :: FETCH_OBJ);
      return $data;
      $req->closeCursor();
  }
}

 
  function afficher(){
    if(require("connexion.php")){
        $req=$access->prepare("SELECT * FROM admin ORDER BY id DESC" );
        $req->execute();
        $data = $req->fetchall(PDO :: FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
 }
  
function afficherUnPro($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM admin WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function afficherUnpdf($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT  `pdf` FROM `courrierarrive` WHERE  id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}


function modifierpro( $nom , $prenom ,$num,  $image ,  $dir ,$dep  ,$email ,$mdp, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE admin SET nom=?,prenom=?,num=?,image=?,dir=?,dep=?,email=?,mdp=? WHERE id=?");

    $req->execute(array( $nom , $prenom ,$num,  $image ,  $dir ,$dep  ,$email ,$mdp, $id));

    $req->closeCursor();
  }
}


function modifiercourr($ref,$naturecour,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE courrierarrive SET ref=?,naturecour=?,datecourr=?,envoyerpar=?,distination=?,sousdistination=?,datetraite=?,remarque=?,objet=?,`etat`='valider'WHERE id=?");

    $req->execute(array($ref,$naturecour,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet, $id));

    $req->closeCursor();
  }
}

function supprimerpro($id) {
  if(require("connexion.php")){
      $req=$access->prepare("DELETE FROM admin WHERE id=? ");
      $req->execute(array($id));
  }
}
function supprimercourr($id) {
  if(require("connexion.php")){
      $req=$access->prepare("DELETE FROM courrierarrive WHERE id=? ");
      $req->execute(array($id));
  }
}

function valider($id) {
  if(require("connexion.php")){
      $req=$access->prepare("UPDATE `courrierarrive` SET `etat`='valider' WHERE id=? ");
      $req->execute(array($id));
  }
}