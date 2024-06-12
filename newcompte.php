<?php
session_start();
require("config/connexion.php");
require("config/commande.php");


if(isset($_POST['valider'])){
    if( isset($_POST['nom']) AND  isset($_POST['prenom'])AND isset($_POST['dir']) 
    AND isset($_POST['image']) AND isset($_POST['dep']) AND isset($_POST['grade']) 
    AND isset($_POST['num'])  AND isset($_POST['email']) 
     AND isset($_POST['mdp']) AND isset($_POST['mdp1']) ) {
        if(!empty($_POST['nom'])  AND !empty($_POST['prenom']) AND  !empty($_POST['dir']) 
        AND  !empty($_POST['image']) AND !empty($_POST['dep']) AND !empty($_POST['grade']) 
        AND  !empty($_POST['num']) AND  !empty($_POST['email']) 
        AND  !empty($_POST['mdp']) AND  !empty($_POST['mdp1'])){
        $nom=htmlspecialchars(strip_tags($_POST['nom']));
        $prenom=htmlspecialchars(strip_tags($_POST['prenom']));
        $dir=htmlspecialchars(strip_tags($_POST['dir']));
        $image=htmlspecialchars(strip_tags($_POST['image']));
        $dep=htmlspecialchars(strip_tags($_POST['dep']));
        $grade=htmlspecialchars(strip_tags($_POST['grade']));
        $num=htmlspecialchars(strip_tags($_POST['num']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $mdp=htmlspecialchars(strip_tags($_POST['mdp']));
        $mdp1=htmlspecialchars(strip_tags($_POST['mdp1']));
        try 
              {
        if($mdp == $mdp1){
          ajoutercompte($nom,$prenom,$num,$image,$dir,$dep,$email,$mdp,$grade);
          $erreur = "le compte a bien ete cree";
          header("Location: admin.php");
        }
        else{
          $erreur = "paas de meme  mot de passe ";
       }}
       catch (Exception $e) 
              {
                  $e->getMessage();
              }
  
        } 
    }
   }
?> 
<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Nouveau courrier</title>
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
                 <a href="admin.php" >
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
            <h2> Nouveau Compte</h2>
            <br><br>  <div class="a"> <?php 
        if(isset($erreur)){
            echo '<font color="red"  width="100" height="42" ><b>'.$erreur."</b></font>";
        }
        ?></div>
            
            
            <div class="form1">
                <label for="nomcomplet"  >Nom</label>
                <input type="text" name="nom" class="input"><br><br>
                <label for="nomcomplet">Image:</label>
                <input type="text" placeholder="" required class="input"name="image" ><br><br>
                <label for="nomcomplet">Departement </label>
                <input type="text" placeholder="" required class="input" name="dep" ><br><br>
                <label>Numero De téléphone</label>
                <input type="numbre" placeholder="" required class="input" pattern="[0-9]{10}"  name="num"><br><br>
                <label>Mot de passe</label>
                <input type="password" placeholder="" required class="input"  name="mdp"><br><br>
            </div>
            <div class="form2">
                <label for="nomcomplet">Prenom</label>
                <input type="text" placeholder="" required class="input" name="prenom"><br><br>
                <label>Direction :</label>
                <input type="text" placeholder="" required class="input" name="dir" ><br><br>
              
                <label>Grade:</label>
                <input type="text" placeholder="" required class="input" name="grade"><br><br>
                <label>Email</label>
                <input type="text" placeholder="" required class="input"  name="email"><br><br>
                <label>Confirmer le Mot de Passe</label>
                <input type="password" placeholder="" required class="input"  name="mdp1"><br><br>
            </div>
            <div class="buTTon">
                <input type="submit" value="Ajouter" name ="valider">
            </div>
          
           
        </form>
       
    </div>
 </body>
</html>
