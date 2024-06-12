<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();
$sec_name = $_SESSION['sec_name'] ;

if(!isset($sec_name)){
   header('location:index.php');
};



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
    <link rel="stylesheet"  href=recher.css>
</head>
<body>

    <div class="container">    
        <div class="naVbar"><br>
            <naV>
                <ul>
                <li> 
                 <a href="sec.php" >
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
        <form method="post">
          <h2> Les Courriers  Non validers</h2>
            <br><br>
            <center>  
          <input type="text" name="search" >
            <input type="submit" name="submit" value="Recherche"></center>
 <br>
<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');



if (isset($_POST["submit"])) {
	$str = $_POST["search"];


  $sql = "SELECT * FROM `courrierarrive` WHERE (envoyerpar = '$str' OR ref='$str' OR distination='$str' OR sousdistination='$str' OR objet='$str')  AND (type='depart'AND `etat`='non valider' AND (envoyerpar = '$sec_name')) ";

if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {?>
     <div class="wrapper">   
    <div class="outer">
      <div class="car" >
        <div class="content">
          <div class="img"><img src="nvali.png" alt=""></div>
          <div class="details"><a href="cour.php?id=<?php echo $row[0] ; ?>">
            <span class="name"><?php echo $row[6] ; ?></span>
            <p><?php echo $row[9] ; ?></p><br>
            <a href="pdf.php?id=<?php echo $row[0] ; ?>"><?php echo $row[12] ; ?>
          </div></a>
        </div>
        <h4><?php echo $row[4] ; ?>
        </h4>
      </div><br><br>
    
   

    </div></div><br>

 
      <?php
        }
      }

    mysqli_free_result($result);
  
  
}

else{

$sql = "SELECT * FROM `courrierarrive` WHERE type='depart'AND `etat`='non valider' AND (envoyerpar = '$sec_name')";

if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {?>
     <div class="wrapper">   
    <div class="outer">
      <div class="car" >
        <div class="content">
          <div class="img"><img src="nvali.png" alt=""></div>
          <div class="details"><a href="cour.php?id=<?php echo $row[0] ; ?>">
            <span class="name"><?php echo $row[6] ; ?></span>
            <p><?php echo $row[9] ; ?></p><br>
            <a href="pdf.php?id=<?php echo $row[0] ; ?>"><?php echo $row[12] ; ?>
          </div></a>
        </div>
        <h4><?php echo $row[4] ; ?></h4>
      </div></div></div><br>
    
   



      <?php
      }
    }
     
  mysqli_free_result($result);



}


 
      


         
?>

 </form>
    </div>







</body>
</html>