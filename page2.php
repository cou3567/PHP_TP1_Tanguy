<!DOCTYPE html>
<html>
<head>
  
<?php

$co;
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

$jon = file_get_contents("doc_comple/annonces.json");
$decode= json_decode($jon, true);
$hash2 = (array)$decode;


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
        <a class="nav-link" href="page2.php">Administraction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="page3.php">Recherche annonce</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="page4.php">gestion utilisateurs</a>
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
        <th>Utilisateur</th>
        <th>Date</th>
        <th>Gestion</th>
        <th>Places</th>
        <th>Commentaire</th>
        <th>Inscrits</th>
        
      </tr>
    </thead>
    <tbody>
        <?php
        for($i = 0; $i < count($hash2) ; $i ++){
            echo"<tr>";
            
           
            echo"<td>";
            print_r($hash2[$i]["Pseudo"]);
            echo"<br>";
            echo"</td>";
            echo"<td>";
            print_r($hash2[$i]["Date"]);
            echo"<br>";
            echo"</td>";
            echo"<td>";
            echo "Depart ";
            print_r($hash2[$i]["Depart"]);
            echo"<br>";
            echo"Arriver ";
            print_r($hash2[$i]["Arrivee"]);
            echo"<br>";
            echo"</td>";
            echo'<td>';
            print_r($hash2[$i]["Places"]);
            echo"<br>";
            echo"</td>";
            echo'<td>';
            print_r($hash2[$i]["Commentaire"]);
            echo"<br>";
            echo"</td>";
            echo'<td>';
            foreach($hash2[$i]["Inscrits"] as $incrit)
                print_r($incrit . " ");
                
            echo"<br>";
            echo"</td>";
            echo"</tr>";
        }
             ?> 

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal3">
    Ajouté une annonce
  </button>
<br>
    </br>

<form action="page2.php" method="post"> 
<div class="modal" id="myModal3">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nouvelle annonce</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="mb-3">
            <label for="NomIncri" class="form-label">Utilisateur :</label>
            <input type="text" class="form-control" id="NomIncri" placeholder="Entrez votre nom d'utilisateur" name="NomIncri" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div> 

        <div class="mb-3">
            <label for="Date" class="form-label">La date :</label>
            <input type="text" class="form-control" id="Date" placeholder="Entrez votre nom d'utilisateur" name="Date" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div> 

        <div class="mb-3">
            <label for="Start" class="form-label">Depart :</label>
            <input type="text" class="form-control" id="Start" placeholder="Lieu de depart" name="Start" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div> 

        <div class="mb-3">
            <label for="Arriv" class="form-label">Arrivé :</label>
            <input type="text" class="form-control" id="Arriv" placeholder="Lieu d'arriver'" name="Arriv" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div> 

        <div class="mb-3">
            <label for="Place" class="form-label">Nombre de place :</label>
            <input type="text" class="form-control" id="Place" placeholder="Lieu de depart" name="Place" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div> 

        <div class="mb-3">
            <label for="infosupp" class="form-label">Commentaire :</label>
            <input type="text" class="form-control" id="infosupp" placeholder="Info supplémentaire" name="infosupp" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>      
        </div>


      </div>

      
      <div class="modal-footer">
      
      <?php
    echo'<button type="submit" class="btn btn-primary" > Poster';



   
    //https://openclassrooms.com/forum/sujet/insertion-dans-un-tableau-au-format-json-via-php
    $_SESSION["NomIncri"]= $_POST["NomIncri"];
    $utilisateur= $_SESSION["NomIncri"];

    $_SESSION["Date"]= $_POST["Date"];
    $date=$_SESSION["Date"];

    $_SESSION["Depart"]= $_POST["Start"];
    $start= $_SESSION["Depart"];

    $_SESSION["Arriver"]= $_POST["Arriv"];
    $arriver= $_SESSION["Arriver"];

    $_SESSION["NB_place"]= $_POST["Place"];
    $nb_place= $_SESSION["NB_place"];

    $_SESSION["Infosupp"]= $_POST["infosupp"];
    $info= $_SESSION["Infosupp"];

    $s_file = 'doc_comple/annonces.json';
 
    try {
        // On essayes de récupérer le contenu existant
        $s_fileData = file_get_contents($s_file);
         
        if( !$s_fileData || strlen($s_fileData) == 0 ) {
            // On crée le tableau JSON
            $tableau_pour_json = array();
        } else {
            // On récupère le JSON dans un tableau PHP
            $tableau_pour_json = json_decode($s_fileData, true);
        }
         
        // On ajoute le nouvel élement
        array_push( $tableau_pour_json, array(
            "Pseudo" => $utilisateur,
            'Date' => $date,
            'Depart' => $start,
            'Arrivee' => $arriver,
            'Places' => $nb_place,
            'Commentaire' => $info,
            'Inscrits' => $_SESSION["Nom"]
            
        ));
        // On réencode en JSON
        $contenu_json = json_encode($tableau_pour_json);
         
        // On stocke tout le JSON
        file_put_contents($s_file, $contenu_json);
         
        echo "Vos informations ont été enregistrées";
    }
    catch( Exception $e ) {
        echo "Erreur : ".$e->getMessage();
    }
    echo'</button>';
?>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    </form>





















    </tbody>
  </table>


</div>


<div>
  <h2></h2>
  <div class="p-5 bg-secondary text-white">
    <p> Tanguy Courel, tanguy.courel@gmail.com , G1   </p>
    <?php
    echo date("Y") . '<img  src=" copyright.png" alt="droit auteur" width="20">';
    echo "<br>";
    
    $host= gethostname();
    $ip = gethostbyname($host);
    echo"$ip";
    ?>
</div>

</body>
</html