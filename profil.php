<?php

$conn = mysqli_connect('localhost','root','','courrier') or die('connection failed');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:index.php');
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- mon partie -->
    <meta charset="UTF-8" />
    <link rel="stylesheet"  href="styleaccueil.css">
    <link rel="stylesheet"  href="styleformulaire.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<title>Profile</title>
    <link rel="stylesheet" href="p/css/all.min.css" />
    <link rel="stylesheet" href="p/css/framework.css" />
    <link rel="stylesheet" href="p/css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
  

</head>
<body translate="no" >
    <br>
<div class="naVbar">
        <naV>
            <ul>
			  
              <li> 
              <a href="javascript:history.back()">
		             <img src="home.png" width="42" height="42" class="rounded-circle" >
		         </a>
              </li>
              <li> 
			     <a href="deconnexion.php" >
		             <img src="eteindre.png" width="52" height="42" class="rounded-circle" >
		         </a>
              </li>
              
           </ul>
        </naV>
    </div>
<body>
<div class="formulaire">
        <div class="barre"></div><br>
        <form >
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         
      ?>
     





           <div class="content w-full">
             <h1 class="p-relative">Profile <a href="editer.php?id=<?php echo $fetch['id']; ?>"><img src="modifier.png" style=width:40px;></a></h1>
             <div class="profile-page m-20">
             <!-- Start Overview -->
             <div class="overview bg-white rad-10 d-flex align-center">
            <div class="avatar-box txt-c p-20">
            <img src="<?php echo $fetch['image']; ?>"  width="150" height="150">
              <h3 class="m-0"> <?php echo $fetch['nom']; ?><br> <?php echo $fetch['prenom']; ?> </h3>
            </div>
            <div class="info-box w-full txt-c-mobile">
              <!-- Start Information Row -->
              <div class="box p-20  d-flex align-center">
                <h4 class="fs-15 m-0 w-full"><b>Information General : </b> </h4>
                <div class="fs-14">
                  <span class="c-grey">Nom</span>
                  <span> <?php echo $fetch['nom']; ?></span>
                </div>
                <div class="fs-14">
                  <span class="c-grey">Prenom</span>
                  <span><?php echo $fetch['prenom']; ?></span>
                </div>
              
                
                
                <div class="fs-14">
                  <span class="c-grey">Num telephone:</span>
                  <span><?php echo $fetch['num']; ?></span>
                </div>
      
                <div class="fs-14">
                  <span class="c-grey">Email:</span>
                  <span><?php echo $fetch['email']; ?></span>
                </div>
               
               
              
         
                <div class="fs-14">
                  <span class="c-grey">Departement</span>
                  <span><?php echo $fetch['dep']; ?></span>
                </div>
                <div class="fs-14">
                  <span class="c-grey">Direction</span>
                  <span><?php echo $fetch['dir']; ?></span>
                </div>
               
                <div class="fs-14">
                
                </div>
              </div>
              <!-- End Information Row -->
            </div> 
            </div>
          
      
         </form>
         </div>
      </body>
</body>
</html>