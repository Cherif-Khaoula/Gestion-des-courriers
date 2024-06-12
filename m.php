<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();
$acc_name = $_SESSION['acc_name'];

if(!isset($acc_name)){
   header('location:index.php');
};



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
                 <a href="javascript:history.back()" >
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
            <?php
         $select = mysqli_query($conn, "SELECT * FROM `courrierarrive` WHERE envoyerpar = '$acc_name'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         
      ?>
     
  <thead class="thead-dark">
    <tr>
    
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
    </tr>
  </thead>
  <tbody>
          
                <tr>
                
                <td><?php echo $fetch['ref']; ?></td>
                <td><?php echo $fetch['naturecour']; ?></td>
                <td><?php echo $fetch['confidentiel']; ?> </td>
                <td ><?php echo $fetch['datecourr']; ?></td>
                <td ><?php echo $fetch['envoyerpar']; ?></td>
                <td><?php echo $fetch['distination']; ?></td>
                <td ><?php echo $fetch['sousdistination']; ?></td>
                <td ><?php echo $fetch['datetraite']; ?></td>
                <td ><?php echo $fetch['remarque']; ?></td>
                <td ><?php echo $fetch['objet']; ?></td>
                <td ><?php echo $fetch['naturedoc']; ?></td>
                <td><?php echo $fetch['fichier']; ?></td>
                </tr>      
    

            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
