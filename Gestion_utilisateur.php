<!DOCTYPE html>
<html>
<head>
   <?php
      if (isset($_COOKIE["usr_name"])) {
         echo "usr_name : " . $_COOKIE["usr_name"] . "<hr>";
      }
      if (isset($_COOKIE["usr_type"])) {
         echo "usr_type : " . $_COOKIE["usr_type"] . "<hr>";
      }
      echo "<h3> PHP List All POST Variables</h3>";
      foreach ($_POST as $key=>$val)
         echo $key." ".$val."<br/>";

      session_start();
      $co;
      echo "<h3> PHP List All Session Variables</h3>";
      foreach ($_SESSION as $key=>$val)
         echo $key." ".$val."<br/>";

      echo "<br>";
      echo "Bonjour " . $_POST["UserCnx"];
      
      if(isset($_SESSION["Nom"]) xor isset($_SESSION["Visiteur"])){
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
         echo "<hr>";
         echo  date("Y-m-d h:i:sa");
echo "<hr>";
if (isset($_POST["Pseudo"])) {
   $_SESSION["Nom"] = $_POST["Pseudo"];
} else{
   $_SESSION["Nom"] = 'not_yet_defined!';
}
echo 'Nom : ' . $_SESSION["Nom"];

echo "<hr>";
if (isset($_POST["Visiteur"])) {
   $_SESSION["Visiteur"] = $_POST["Visiteur"];
} else{
   $_SESSION["Visiteur"] = 'not_yet_defined!';
}
echo 'Visiteur : ' . $_SESSION["Visiteur"];

$jon = file_get_contents("doc_comple/utilisateurs.json");
$decode= json_decode($jon, true);
$hash = (array)$decode;


echo"<br>";
      echo  date("Y-m-d h:i:sa");
      $_SESSION["Nom"]= $_POST["Pseudo"];
      $_SESSION["Visiteur"]= $_POST["visiteur"];

    if($co == true){
                    echo "<div class='container mt-3'>";
                    echo"<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#myModal'>Deconnexion</button>";
                    echo "</div>";
                    echo'<form action="Home.php" method="post"> ';
                    echo'<div class="container mt-3">';
                    echo'<button type="submit" class="btn btn-success" value="Deco visiteur" id = "visiteur" name="visiteur"> Visiteur </button>';
                    echo'</div>';
                    
                    session_destroy();

                    
                      echo "<br>";
                      echo "Bonjour ";
                      echo " ";
                      print_r($_SESSION["Nom"]);
                      print_r($_SESSION["Visiteur"]);
                    $co == false;
                    
                }
      elseif($co==false)
                {
                  echo "<div class='container mt-3'>";
                    echo "<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#myModal1'>Connexion</button>";
                  echo "</div>";
                  echo'<form action="Home.php" method="post"> ';
                    echo'<div class="container mt-3">';
                    echo'<input type="submit" class="btn btn-success" value="visiteur" id = "visiteur" name="visiteur">';
                    echo'</div>';
                    
                  echo" Vous n'êtes pas co";
                  $co == true;
                }
    
                ?>


  </div>
  


  </form>
  <form action="Home.php" method="post"> 
   <div class="modal" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Connexions</h4>
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
            <div class="valid-feedback">Valid.</div>;
            <div class="invalid-feedback">Please fill out this field.</div>;

            
            
            <?php
            password_hash($_SESSION["pwd"],PASSWORD_DEFAULT);
              for($i = 0; $i < count($hash) ; $i ++){
                if(password_verify($_SESSION["pwd"] ,$hash[$i]['motdepasse'])){
                

                }
                else{
                }
              }
            ?>


          </div>  

          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="myCheck"  name="remember">
            <label class="form-check-label" for="myCheck">Remember me</label>
          </div>

          <p>S'inscrire ?<a type="button" class="btn btn-link" href="Formulaire.php"> Incriptions </a>   </p>  




        </div>
        <div class="modal-footer">
          <button type="Connexions" class="btn btn-primary" >Connexions</button>
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
          
           
          

          <p>Vous voulez vous deconnectez ?</p>

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
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </ul>
  </div>
</nav>

<div class="container p-5 my-5 border">
  <h1>Gestion des utilisateurs</h1>
  <p> 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>utilisateur</th>
        <th>Rôle</th>
        <th>Gestion</th>
        
      </tr>
    </thead>
    <tbody>
        <?php
        for($i = 0; $i < count($hash) ; $i ++){
            echo"<tr>";
            echo"<td>";
            print_r($hash[$i]["utilisateur"]);
            echo"<br>";
            echo"</td>";
            echo"<td>";
            print_r($hash[$i]["role"]);
            echo"<br>";
            echo"</td>";
            echo'<td>';
            echo'  <button type="button" class="btn btn-danger">Supprimer utilisateur <a unset($hash[$i])> </button>';
           
            echo"</tr>";
        }


             ?> 
    </tbody>
  </table>


</div>


   <div>
   <div class="p-5 bg-secondary text-white">
      <p> Tanguy Courel, tanguy.courel@gmail.com , G1   </p>
      <?php
      echo date("Y") . '<img  src=" copyright.png" alt="droit auteur" width="20">';
      echo "<br>";
      
      $host= gethostname();
      $ip = gethostbyname($host);
      echo"$ip";

      echo "<p> PHP List All Session Variables</p>";
      foreach ($_SESSION as $key=>$val)
         echo "<p>" . $key ." : " . $val . "</p>";
      ?>
   </div>

</body>
</html