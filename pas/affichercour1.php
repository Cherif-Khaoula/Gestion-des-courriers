<?php
require("config/commande.php");
$cour=affichercour();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet"  href="styleadmin.css">
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
</head>
<body>

    <div class="container">    
        <div class="naVbar"><br>
            <naV>
                <ul>
                <li> 
                <a href="respo.php" >
		   <img src="home.png" width="42" height="42" class="rounded-circle" >          
	</a>	         
              </li>
                  
                  <li> 
                     <a href="index.php" >
                         <img src="eteindre.png" width="45" height="45" class="rounded-circle" >
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
        <form method="post">
          <h2> Les Courriers </h2><br>
            

    <?php foreach($cour as $courrierarrive): ?>
      <div class="wrapper">   
    <div class="outer">
      <div class="car" >
        <div class="content">
          <div class="img"><img src="en.jpg" alt=""></div>
          <div class="details"><a href="cour.php?id=<?= $courrierarrive->id ?>">
            <span class="name"><?= $courrierarrive->envoyerpar ?></span><br>
            <p><?= $courrierarrive->remarque ?></p><br>
            <a href="pdf.php?id=<?= $courrierarrive->id ?>"><?= $courrierarrive->pdf ?></a>
            
          </div></a>
        </div>
        <h4><?= $courrierarrive->datecourr ?>
        <a href="supprimercour.php?id=<?= $courrierarrive->id ?>"><img src="Sup.png" style=width:30px;></a></h4>
      </div><br><br>
                 
                     
              <?php endforeach; ?>
  
              
   
        </form>
    </div>













 </div>
  </div>
 </form>
    </div>







</body>
</html>