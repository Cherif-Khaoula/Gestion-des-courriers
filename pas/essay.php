<?php
session_start();
 $access=new pdo("mysql:host=localhost;dbname=courrier;charset=utf8","root","");

if(isset($_POST['envoyer'])){
  if(!empty($_POST['email']) AND !empty($_POST['password']) ){
      $email= htmlspecialchars( $_POST['email']); 
      $password=htmlspecialchars( $_POST['password']);

      $req = $access->prepare("SELECT *  FROM admin WHERE email=? AND mdp =?");
      $req->execute(array($email,$password));
      $user=$req->rowCount();
    if($user == 1){
        $data=$req->fetch();
        $_SESSION['id']= $data['id'];
        $_SESSION['nom']= $data['nom'];
        $_SESSION['email']= $data['email'];
        $_SESSION['mdp']= $data['mdp'];
        $_SESSION['grade']= $data['grade'];
        if($data['grade'] == 'admin'){

          $_SESSION['admin_name'] = $data['nom'];
          $_SESSION['user_id'] = $data['id'];
          header('location:admin.php');
 
       }elseif($data['grade'] == 'respo'){
        $_SESSION['user_id'] = $data['id'];
          $_SESSION['repo_name'] = $data['nom'];
          header('location:respo.php');
 
       }elseif($data['grade'] == 'agent'){
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['agent_name'] = $data['nom'];
        header('location:agent.php');

     }elseif($data['grade'] == 'acc'){
      $_SESSION['user_id'] = $data['id'];
      $_SESSION['acc_name'] = $data['nom'];
      header('location:accueil.php');
  
   }
      
    }else{
       $error[] = 'incorrect email ou mot de passe!';
    }
 
      
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gestion des courriers d'Algerie Telecom</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center" id="hero">
   <main class="form-signin w-100 m-auto" id="p">
    <form method="post">
    <img class="mb-4" src="logo.png" alt="" width="200" height="100">
    <h1 class="h3 mb-3 fw-normal">Courrier</h1>
    <?php
        if(isset($error)){
           foreach($error as $error){
            echo '<div class="message">'.$error.'</div>';
           };
        }
        ?>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name ="email" >
      <label for="floatingInput">Adresse Mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}">
      <label for="floatingPassword">Mot de Passe</label>
    </div>
    <input class="w-100 btn btn-lg btn-dark" type="submit" name="envoyer"value="Se connecter">
 
        
   </form>
   </main>
  </body>
</html>
