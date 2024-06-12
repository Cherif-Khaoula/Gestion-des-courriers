<?php
session_start();

require("config/commande.php");


if(!isset($_GET['id'])){
    header("Location: afficher.php");
}

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
    header("Location: afficher.php");
}

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];
        $prf = afficherUnPro($id);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
 </head>
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
                 <a href="accueil.php" >
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
        
        <form method="post">
            <h2> valider courrier</h2><br><br>
            <div >
            <center>Si vous etes sur que vous voulez valider ce courrier?</center> </div> <br><br>
            <div class="buTTon">
                <input type="submit" value="Oui" name ="valider">
            </div>
       
            
            
        </form>
    
    </div>
 </body>
</html>

 <?php
   if(isset($_POST['valider'])){
    if(isset($_GET['id'])){

        if(!empty($_GET['id']) OR is_numeric($_GET['id'])){
        
        try{
            valider($id);
            header('Location: valider.php');
        }
        catch(Exception $e){
            $e->getMessage();
        }
        
        } 
    }
   }
?>
