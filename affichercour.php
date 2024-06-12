<?php
require("config/commande.php");
$cour=affichercour();

?> 


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
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
              <a href="respo.php" >
		             <img src="home.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
              
              <li> 
                 <a href="profil.php" >
		             <img src="2.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
           </ul>
        </naV>
    </div>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <form method="post">
            <h2> Courriers</h2>
            <table class="table">
  <thead class="thead-dark">
    <tr>
    
      <th scope="col">#</th>
      <th scope="col">Ref</th>
      <th scope="col">N.courrier</th>
      <th scope="col">confidentiel</th>
      <th scope="col">Date.cour</th>
      <th scope="col">Envoyer</th>
      <th scope="col">Dis</th>
      <th scope="col">Sous.dis</th>
      <th scope="col">Date.tra</th>
      <th scope="col">Rema</th>
      <th scope="col">Objet</th>
      <th scope="col">Naturedoc</th>
      <th scope="col">Fichier</th>
      <th scope="col">Modifier</th>
    </tr>
  </thead>
  <tbody>
            <?php foreach($cour as $courrierarrive): ?>
                <tr>
                <th scope="row"><?= $courrierarrive->id ?></th>
                <td><?= $courrierarrive->ref?></td>
                <td><?= $courrierarrive->naturecour?></td>
                <td><?= $courrierarrive->confidentiel ?> </td>
                <td ><?= $courrierarrive->datecourr ?></td>
                <td ><?= $courrierarrive->envoyerpar ?></td>
                <td><?= $courrierarrive->distination ?></td>
                <td ><?= $courrierarrive->sousdistination ?></td>
                <td ><?= $courrierarrive->datetraite?></td>
                <td ><?= $courrierarrive->remarque ?></td>
                <td ><?= $courrierarrive->objet ?></td>
                <td ><?= $courrierarrive->naturedoc ?></td>
                <td><?= $courrierarrive->fichier ?></td>
                <td><a href="editercour.php?id=<?= $courrierarrive->id ?>"><img src="editer.jpg" style=width:40px;></a></td>
                </tr>      
            <?php endforeach; ?>

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
