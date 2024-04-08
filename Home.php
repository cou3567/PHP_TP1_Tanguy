<!DOCTYPE html>
<html>
<head>
   <?php
      session_start();
      $co;
      if (isset($_SESSION["Nom"]) xor isset($_SESSION["Visiteur"])){
         $co= true;
      }
      else{
         $co= false;
      }
   ?>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <div>
   <div class=" p-5 bg-secondary text-white">
      <h1>Covoiturage</h1>
      <?php
         if (isset($_POST["Pseudo"]) && isset($_POST["pwd"])) {
            $jon = file_get_contents("doc_comple/utilisateurs.json");
            $decode= json_decode($jon, true);
            $hash_user = (array)$decode;
            #
            $us_found = false;
            $us_authenticated = false;
            for ($i = 0; $i < count($hash_user) ; $i ++) {
               # echo $hash_user[$i]["utilisateur"];
               # echo "<hr>";
               if ($hash_user[$i]["utilisateur"] == $_POST["Pseudo"]) {
                  $us_found = true ;
                  # echo "trouve";
                  # echo "<hr>";
                  if(password_verify($_POST["pwd"] ,$hash_user[$i]['motdepasse'])){
                     $us_authenticated = true;
                     $co = true;
                  }
               }
            }
            #echo 'us_found : ' . $us_found;
            #echo "<hr>";   
            #echo 'us_auth : ' . $us_authenticated;
            #echo "<hr>";   
         }

         echo "<hr>";
         echo  date("Y-m-d h:i:sa");

         # echo "<hr>";
         if (isset($_POST["Pseudo"])) {
            $_SESSION["Nom"] = $_POST["Pseudo"];
         } else{
            $_SESSION["Nom"] = 'not_yet_defined!';
         }
         # echo 'Nom : ' . $_SESSION["Nom"];

         # echo "<hr>";
         if (isset($_POST["Visiteur"])) {
            $_SESSION["Visiteur"] = $_POST["Visiteur"];
         } else{
            $_SESSION["Visiteur"] = 'not_yet_defined!';
         }
         # echo 'Visiteur : ' . $_SESSION["Visiteur"];

         if ($co == true) {
            echo "<div class='container mt-3'>";
            echo"<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#myModal'>Deconnexion</button>";
            echo "</div>";
            echo'<form action="Home.php" method="post"> ';
            echo'<div class="container mt-3">';
            echo'<button type="submit" class="btn btn-success" value="Deco visiteur" id = "visiteur" name="visiteur"> Visiteur </button>';
            echo'</div>';
                     
            session_destroy();
                     
            echo "<br>";
            echo "Bonjour " . $_SESSION["Nom"];
            $co == false;
            }
         else {
            echo "<div class='container mt-3'>";
            echo "<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#myModal1'>Connexion</button>";
            echo "</div>";
            echo'<form action="Home.php" method="post"> ';
            echo'<div class="container mt-3">';
            echo'<input type="submit" class="btn btn-success" value="visiteur" id = "visiteur" name="visiteur">';
            echo'</div>';
            echo" Vous n'êtes pas connecté";
            $co == true;
         }
         echo '</form>';
      ?>
   </div>

   <form action="Home.php" method="post">
      <div class="modal" id="myModal1">
         <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Connexion</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <div class="mb-3">
               <label for="Pseudo" class="form-label">Pseudo :</label>
               <input type="text" class="form-control" id="Pseudo" placeholder="Enter Pseudo" name="Pseudo" required>
               <div class="valid-feedback">Valid.</div>
               <div class="invalid-feedback">Please fill out this field.</div>      
               </div> 
               <div class="mb-3">
               <label for="pwd" class="form-label">Password :</label>
               <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required >
               <div class="valid-feedback">Valid.</div>
               <div class="invalid-feedback">Please fill out this field.</div>
               </div>  
               <div class="form-check mb-3">
               <input class="form-check-input" type="checkbox" id="myCheck"  name="remember">
               <label class="form-check-label" for="myCheck">Remember me</label>
               </div>
               <p>S'inscrire ?<a type="button" class="btn btn-link" href="Formulaire.php"> Inscriptions </a>   </p>  
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" >Connexion</button>
               <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
         </div>
      </div>
   </form>

   <form action="Home.php" method="post"> 
      <div class="modal" id="myModal">
         <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Deconnexions</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
         <div class="modal-body">
            <p>Voulez vous deconnectez ?</p>
         </div>
         <div class="modal-footer">
            <button type="Connexions" class="btn btn-primary" >Oui</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
         </div>
         </div>
      </div>
   </div>
   </form> 
   </div>

   <nav class="navbar navbar-expand-sm bg-light">
     <div class="container-fluid">
       <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" href="Home.php">Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="Annonce.php">Annonce</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="Recherche_Annonce.php">Recherche annonce</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="Gestion_utilisateur.php">Gestion utilisateurs</a>
         </li>
         <form class="d-flex" method="post">
            <input class="form-control me-2" type="text" placeholder="Search">
            <input type="hidden" name="UserCnx" value="<?php echo $_SESSION["Nom"];?>">
            <button class="btn btn-primary" type="button">Search</button>
         </form>
       </ul>
     </div>
   </nav>

   <div class="container p-5 my-5 border">
   <h1>Introductions</h1>
   <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar in arcu at placerat. Sed convallis massa eu dui ultricies semper.
         Fusce interdum, lacus id gravida varius, enim tortor feugiat ipsum, non euismod quam velit sit amet nisi. Cras fringilla libero erat, venenatis porttitor nunc volutpat at.
         Suspendisse convallis, nibh at lacinia tristique, risus diam aliquet lacus, ac ultricies arcu quam nec turpis. Pellentesque non velit lobortis, finibus ipsum a, eleifend lorem.
         Vivamus in porta mi. Proin lorem lectus, tempor ut ullamcorper ut, consectetur in augue. Praesent faucibus erat scelerisque, fringilla dolor vel, suscipit nisi. Morbi sollicitudin tempor tincidunt.
   </p>

   <h1>Chartres</h1>
   <p>ed laoreet purus quis sagittis egestas. In interdum lectus odio, a luctus ipsum tempus ac. Ut dictum libero leo, placerat consequat erat vulputate sed. 
      Cras posuere augue ut suscipit placerat. Aenean vitae dui velit. Phasellus sed mi libero. Sed dignissim lorem et lorem tempor, quis eleifend arcu suscipit. 
      Nunc congue turpis tortor, et cursus ante luctus in. Vivamus nec urna ut urna consequat accumsan eget sit amet neque. Nulla velit augue, ultricies a sollicitudin non, egestas at lorem. 
      Nunc ac nisl mollis arcu hendrerit maximus. Nam id sodales justo, ut consectetur nulla. Quisque massa risus, vestibulum vel faucibus ultrices, tincidunt ut odio. 
      Phasellus aliquam molestie ex, eu auctor arcu imperdiet et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur condimentum fringilla nunc.

      Aliquam mi metus, consequat sit amet fringilla nec, rutrum non enim. Praesent nec nisi pharetra, mattis lorem nec, facilisis urna. Aliquam mollis aliquet vehicula. Nam maximus placerat leo, eget fermentum justo posuere eu. Maecenas dapibus lorem ut turpis iaculis pharetra. Quisque ac leo ac magna elementum iaculis. 
      Pellentesque sit amet felis elementum, aliquam ipsum vel, placerat urna. Praesent id feugiat mi.</p>
   </div>

   <div>
   <h2></h2>
   <div class="p-5 bg-secondary text-white">
      <p> Tanguy Courel, tanguy.courel@gmail.com , G1   </p>
      <?php
      echo date("Y") . ' <img  src=" copyright.png" alt="droit auteur" width="20">';
      echo "<br>";
      
      $host= gethostname();
      $ip = gethostbyname($host);
      echo"$ip";

      echo "<h3> PHP List All Session Variables</h3>";
      foreach ($_SESSION as $key=>$val)
         echo $key." ".$val."<br/>";
      ?>
   </div>

</body>
</html