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
        
    }
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lire un  PDF</title>
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
           
         
        <?php
      include 'db.php';
      if(isset($_GET['id'])){
      $sql="SELECT  `pdf` FROM `courrierarrive` WHERE  id=$id ";
      $query=mysqli_query($conn,$sql);
      while ($info=mysqli_fetch_array($query)) {
        ?>
      <embed type="application/pdf" src="pdf/<?php echo $info['pdf'] ; ?>" width="1000" height="600">
    <?php
      }
    }
      ?>
            
        </form>
    </div>











    </body>
</html>
