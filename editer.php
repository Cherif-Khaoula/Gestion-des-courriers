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
        $prf = afficherUnPro($id);
    }
}

if(isset($_POST['valider']))
{
    if( isset($_POST['nom']) AND isset($_POST['prenom']) AND  isset($_POST['image']) AND isset($_POST['dir']) 
    AND isset($_POST['dep']) AND isset($_POST['num'])  AND isset($_POST['email'])
    AND isset($_POST['mdp']))
    {
    if( !empty($_POST['nom']) AND !empty($_POST['prenom']) AND  !empty($_POST['image']) AND !empty($_POST['dir'])
    AND !empty($_POST['dep'])  AND !empty($_POST['num']) AND !empty($_POST['email']) 
    AND !empty($_POST['mdp']) )
        {
            
            $nom = htmlspecialchars(strip_tags($_POST['nom']));
            $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
            $num = htmlspecialchars(strip_tags($_POST['num']));
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $dir = htmlspecialchars(strip_tags($_POST['dir']));
            $dep = htmlspecialchars(strip_tags($_POST['dep']));
            $email = htmlspecialchars(strip_tags($_POST['email']));
            $mdp = htmlspecialchars(strip_tags($_POST['mdp']));
        
            if(isset($_GET['id'])){

                if(!empty($_GET['id']) OR is_numeric($_GET['id']))
                {
                    $id = $_GET['id'];
                }
            }

        try 
        {
            modifierpro( $nom , $prenom ,$num,  $image ,  $dir ,$dep  ,$email ,$mdp, $id);
            header('Location: profil.php');
            

        } 
        catch (Exception $e) 
        {
            $e->getMessage();
        }

        }
    }
}



?>



<!doctype html>
<html lang="fran">
<head>
    <meta charset="UTF-8" />
    <title>Modifier un compte</title>
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
           </ul>
        </naV>
    </div>
<body>
    <div class="formulaire">
        <div class="barre"></div><br>
        <?php foreach ($prf as $admin): ?>
        <form method="post">
            <h2> Modifier Profil</h2>
            <div class="form1">
                <label for="nomcomplet"  >Nom</label>
                <input type="text" name="nom" class="input" value="<?= $admin->nom ?>"><br><br>
                <label for="nomcomplet">Departement</label>
                <input type="text" placeholder="" required class="input" name="dep" value="<?= $admin->dep ?>" ><br><br>
                <label>Numero De téléphone  : </label>
                <input type="text" placeholder="" required class="input"   pattern="[0-9]{10}"name="num" value="<?= $admin->num ?>"><br><br>
                <label>Mot de passe</label>
                <input type="text" placeholder="" required class="input"  name="mdp" value="<?= $admin->mdp ?>">
            </div>
            <div class="form2">
                <label for="nomcomplet">Prenom</label>
                <input type="text" placeholder="" required class="input" name="prenom" value="<?= $admin->prenom ?>" ><br><br>
                <label>Direction :</label>
                <input type="text" placeholder="" required class="input"  name="dir" value="<?= $admin->dir ?>" ><br><br>
               
                <label>Email</label>
                <input type="text" placeholder="" required class="input"  name="email" value="<?= $admin->email ?>"><br><br>
                <label for="nomcomplet">Image:</label>
                <input type="text" placeholder="" required class="input"name="image" value="<?= $admin->image ?>" >
                
            </div>
            <div class="buTTon">
                <input type="submit" value="Modifier" name ="valider">
            </div>
            
            <?php 
        if(isset($erreur)){
            echo '<font color="black"><b>'.$erreur."</b></font>";
        }
        ?>
        </form>
        <?php endforeach; ?>
    </div>
 </body>
</html>

