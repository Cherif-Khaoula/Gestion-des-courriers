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
                 <a href="javascript:history.back()">
		               <img src="home.png" width="42" height="42" class="rounded-circle" ></a>	         
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
             <center><input type="text" name="search" >
           <input type="submit" name="submit"></center><br>
   
<?php
$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
if (isset($_POST["submit"])) {
$str = $_POST["search"];
$sql = "SELECT * FROM `courrierarrive` WHERE envoyerpar = '$str' OR ref='$str' OR distination='$str' OR sousdistination='$str' OR objet='$str' ";
if ($result = mysqli_query($conn, $sql)) {
while ($row = mysqli_fetch_row($result)) {?>





   <div class="wrapper">   
     <div class="outer">
        <div class="car" >
          <div class="content">
           <div class="img"><img src="en.jpg" alt=""></div>
           <div class="details"><a href="cour.php?id=<?php echo $row[0] ; ?>">
             <span class="name"><?php echo $row[6] ; ?></span>
             <p><?php echo $row[9] ; ?></p><br>
             <a href="pdf.php?id=<?php echo $row[0] ; ?>"><?php echo $row[12] ; ?></a>
           </div>
         </div>
         <h4>
           <?php echo $row[4] ; ?>
           <a href="impression.php?id=<?php echo $row[0] ; ?>"><img src="3.png" style=width:30px;></a>
         </h4>
       </div><br><br>
    

</div></div>
<?php
      }
    }

  mysqli_free_result($result);


}

else{?>
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
            </div>
         </div>
         <h4><?= $courrierarrive->datecourr ?>
            <a href="impression.php?id=<?= $courrierarrive->id ?>"><img src="3.png" style=width:30px;></a>
         </h4>
       </div> </div>
 </div><br>
 <?php endforeach; ?>

         
            
  <?php 
}

?>
 









 
 </form>
 </div>
</body>
</html>