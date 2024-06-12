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
    <link rel="stylesheet"  href=recher.css>
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
        <form method="post">
          <h2>Les comptes d'utilisateurs </h2><br>

        
         <center> <input type="text" name="search" >
            <input type="submit" name="submit" value="Recherche"></center>
 <br> <br>
            <table class="table">
  <thead class="thead-dark">
    <tr>
    
    <th scope="col">Image</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">Departement</th>
      <th scope="col">Direction</th>
      <th scope="col">grade</th>
      <th scope="col">Num.telephone</th>
      <th scope="col">Email</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
 


 <?php
$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
if (isset($_POST["submit"])) {
$str = $_POST["search"];
$sql = "SELECT * FROM `admin` WHERE `nom`='$str' OR  `prenom`='$str' OR  `num`='$str' OR  `image`='$str' OR  `sexe`='$str' OR  `email`='$str' OR  `grade`='$str' OR  `dep`='$str' OR  `dir`='$str'";
if ($result = mysqli_query($conn, $sql)) {
while ($row = mysqli_fetch_row($result)) {?>

<tr>
                <td><img src="<?php echo $row[4] ; ?>" style="width: 35px"></td>
                <td><?php echo $row[1] ; ?></td>
                <td ><?php echo $row[2] ; ?></td>
                <td ><?php echo $row[11] ; ?></td>
                <td><?php echo $row[12] ; ?></td>
                <td ><?php echo $row[10] ; ?></td>
                <td ><?php echo $row[3] ; ?></td>
                <td ><?php echo $row[7] ; ?></td>
                <td><a href="supprimer.php?id=<?php echo $row[0] ; ?>"><img src="Sup.png" style=width:30px;></a></td>
                </tr> 



   
<?php
      }
    }




}

else{
     ?>
  
    <?php foreach($prf as $admin): ?>
                
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


         
            
 <?php 
}

?>
 
            </tbody>

             
           
            </table>
     
            
        </form>
    </div>















    </body>
</html>
