<?php
session_start();
require("config/connexion.php");
require("config/commande.php");
if(isset($_POST['valider'])){
    if( isset($_POST['ref']) AND  isset($_POST['naturecour']) 
    AND isset($_POST['datecourr']) AND isset($_POST['envoyerpar']) AND isset($_POST['distination']) 
    AND isset($_POST['sousdistination'])  AND isset($_POST['datetraite']) 
     AND isset($_POST['remarque']) AND isset($_POST['objet'])  AND isset($_POST['type']) AND isset($_POST['etat'])  
     ){
        if(!empty($_POST['ref'])  AND !empty($_POST['naturecour'])  
        AND  !empty($_POST['datecourr']) AND !empty($_POST['envoyerpar']) AND !empty($_POST['distination']) 
        AND  !empty($_POST['sousdistination']) AND  !empty($_POST['datetraite']) 
        AND  !empty($_POST['remarque']) AND  !empty($_POST['objet']) AND !empty($_POST['type'])AND !empty($_POST['etat']) 
         ){
        $ref=htmlspecialchars(strip_tags($_POST['ref']));
        $naturecour=htmlspecialchars(strip_tags($_POST['naturecour']));
        $datecourr=htmlspecialchars(strip_tags($_POST['datecourr']));
        $envoyerpar=htmlspecialchars(strip_tags($_POST['envoyerpar']));
        $distination=htmlspecialchars(strip_tags($_POST['distination']));
        $sousdistination=htmlspecialchars(strip_tags($_POST['sousdistination']));
        $datetraite=htmlspecialchars(strip_tags($_POST['datetraite']));
        $remarque=htmlspecialchars(strip_tags($_POST['remarque']));
        $objet=htmlspecialchars(strip_tags($_POST['objet']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $etat=htmlspecialchars(strip_tags($_POST['etat']));
        $pdf=htmlspecialchars(strip_tags($_FILES['pdf']['name']));
        
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;

          move_uploaded_file($pdf_tem_loc,$pdf_store);
        try{
            
                ajouter($ref,$naturecour,$datecourr,$envoyerpar,$distination,$sousdistination,$datetraite,$remarque,$objet,$type,$etat,$pdf);
                $erreur = "'le courrier a bien ete ajouter'";
              
        }
        catch(Exception $e){
            $erreur = "il y a un probleme  ";
          echo  $e->getMessage();
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
              <a href="javascript:history.back()">
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
        <form class="" action="new.php" method="post" enctype="multipart/form-data">
        
            <h2> Nouveau courrier
         </h2><br><br>  <div class="a"> <?php 
        if(isset($erreur)){
            echo '<font color="red"  width="100" height="42" ><b>'.$erreur."</b></font>";
        }
        ?></div>
           
            <div class="form1">
                <label for="nomcomplet"  >Reference</label>
                <input type="text" name="ref"  required class="input"><br><br>
                <label for="nomcomplet">Envoyer par :</label>
                <input type="text" placeholder="" required class="input" name="envoyerpar"><br><br>
                <label for="nomcomplet">Distinataire :</label>
                <input type="text" placeholder="" required class="input"name="distination" ><br><br>
                <label for="nomcomplet">Sous distinataire :</label>
                <input type="text" placeholder="" required class="input" name="sousdistination" ><br><br>
                <label>Type de courrier:</label>
                <select id="pays" class="input"   required name="type">
                <option value="depart">Depart</option>
                <option value="arrivée">arrivée</option>
                </select><br><br>
                <label>Objet :</label>
                <input type="text" placeholder="" required class="input"  name="objet"><br><br>
            </div>
            <div class="form2">
                <label for="nomcomplet">Date d'envoyer le courrier:</label>
                <input type="date" placeholder="" required class="input" name="datecourr"><br><br>
                <label for="nomcomplet">Date limité de traitement :</label>
                <input type="date" placeholder="" required class="input" name="datetraite"><br><br>
         
                <label> Nature de courrier :</label>
                <select name="naturecour"  required class="input">
                    <option value="urgent">Urgent</option>
                    <option value="normal">Normal</option>
                    <option value="tres urgent ">Tres urgent </option>
                </select><br><br>
          
                <label>Remarque :</label>
                <textarea cols="10" rows="5" required class="input" name="remarque"></textarea><br><br>
               <label>Etat de courrier:</label>
                <select id="pays" class="input"   required name="etat">
                <option value="valider">valider</option>
                <option value="non valider">non valider</option>
                </select><br><br>
                <h3>Ajouter un courrier: </h3><br>
                <input type="file"  required name="pdf">
            </div>
            <div class="buTTon">
                <input type="submit" value="Ajouter" name ="valider">
            </div>
           
            
            
        </form>
    </div>
 </body>
</html>
