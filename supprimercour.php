<?php
session_start();

require("config/commande.php");


if(!isset($_GET['id'])){
    header("Location: valider.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: valider.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $courr = affichercourr($id);
    }
}


?>



<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Supprimer un compte</title>
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="stylesheet"  href="but.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
 </head>
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
                 <a href="valider.php" >
		             <img src="home.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
              <li> 
			     <a href="deconnexion.php" >
		             <img src="eteindre.png" width="52" height="42" class="rounded-circle" >
		         </a>
              </li>
              <li> 
                     <a href="profil.php" >
                         <img src="utilisateur-de-profil.png" width="42" height="42" class="rounded-circle" >
                     </a>
                  </li>
           </ul>
        </naV>
    </div>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <?php foreach ($courr as $courrierarrive): ?>
        <form method="post">
            <h2> supprimer Profil</h2><br><br>
            <div >
            <center>Si vous etes sur que vous voulez supprimer ce utilisateur?</center> </div> <br><br>
            <div class="but">
               <center> <input type="submit" value="Oui" name ="valider">
              <a href="valider.php"> <input type="button" value="Annuler" ></a></center>

            </div>
       
            
            
        </form>
        <?php endforeach; ?>
    </div>
 </body>
</html>

 <?php
   if(isset($_POST['valider'])){
    if(isset($_GET['id'])){

        if(!empty($_GET['id']) OR is_numeric($_GET['id'])){
        
        try{
            supprimercourr($id);
            header('Location: valider.php');
        }
        catch(Exception $e){
            $e->getMessage();
        }
        
        } 
    }
   }
?>
