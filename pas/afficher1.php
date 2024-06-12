<?php
require("config/commande.php");
$prf=afficher();

?> 


<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Compte</title>
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
            <h2> Comptes</h2>
            <table class="table">
  <thead class="thead-dark">
    <tr>
    
    <th scope="col">Image</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">dep</th>
      <th scope="col">dir</th>
      <th scope="col">grade</th>
      <th scope="col">Num.telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
            <?php foreach($prf as $admin): ?>
                <tr>
                <tr>
                <td><img src="<?= $admin->image?>" style="width: 35px"></td>
                <td><?= $admin->nom?></td>
                <td ><?= $admin->prenom ?></td>
                <td ><?= $admin->dep ?></td>
                <td><?= $admin->dir ?></td>
                <td ><?= $admin->grade ?></td>
                <td ><?= $admin->num?></td>
                <td ><?= $admin->email ?></td>
                <td><a href="supprimer.php?id=<?= $admin->id ?>"><img src="Sup.png" style=width:30px;></a></td>
                </tr>      
            <?php endforeach; ?>

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
