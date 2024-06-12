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
        $cour=affichercourr($id);
        
        
    }
}
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
<html>
<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Courrier</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="stylesheet"  href="but.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
 </head>

<body >

<div class="container">    
        <div class="naVbar"><br>
            <naV>
                <ul>
                <li> 
                 <a href="javascript:history.back()" >
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
<div class="formulaire">
<?php foreach($cour as $courrierarrive): ?>
        <form method="post">
        <h1><img src="logo.png" width="200" height="100"></h1><br><br>
        <b> Refference  :</b> <?= $courrierarrive->ref?> <br><br>
           <b> De :</b> <?= $courrierarrive->envoyerpar ?>
           <div style="text-align: right;"><?= $courrierarrive->datecourr ?></div>
           <b> A :</b> <?= $courrierarrive->distination ?> , <?= $courrierarrive->sousdistination ?>
           <div style="text-align: right;"><?= $courrierarrive->datetraite?></div>
           <b>Objet : </b> <?= $courrierarrive->objet ?><br><br>
            <b> Remarques :</b><br>
            &nbsp &nbsp <?= $courrierarrive->remarque ?><br><br>

        
            <div class="barre2"></div><br>

               <b>Nature de courrier : </b> <?= $courrierarrive->naturecour?><br><br>
               <b>Confidential : </b><?= $courrierarrive->confidentiel ?> <br><br>
              <b>Pièce jointes : </b><a href="pdf.php?id=<?= $courrierarrive->id ?>"><?= $courrierarrive->pdf ?></a>
              <br><br>
              <div class="but">
               <center> <input type="submit" value="Valider" name ="valider">
               <a href="editercour.php?id=<?= $courrierarrive->id ?>"> <input type="button" value="modifier"></a>    
               <a href="supprimercour.php?id=<?= $courrierarrive->id ?>"> <input type="button" value="supprimer"></a></center>
            </div> </form>
        <?php endforeach; ?>
    </div>















    </body>
</html>