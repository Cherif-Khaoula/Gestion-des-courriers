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
        $cour=affichercourr($id);
        
        
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
 </head>

<body onload="window.print()" >


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
            &nbsp &nbsp <?= $courrierarrive->remarque ?><br><br><br>

        
            <div class="barre2"></div><br>
               <b>Nature de courrier : </b> <?= $courrierarrive->naturecour?><br><br>
               <b>Confidential : </b><?= $courrierarrive->confidentiel ?> <br><br>
              <b>Pièce jointes : </b><a href="pdf.php?id=<?= $courrierarrive->id ?>"><?= $courrierarrive->pdf ?>
              
            
             <?php endforeach; ?>
        </form>
    </div>















    </body>
</html>