<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

   <?php
      echo $_SERVER['REQUEST_METHOD'];
      $DisplayForm=1;
      $ErrorFormMsg='';
      $Ins_Name='';
      $Ins_Email='';
      $Ins_pwd='';
      $Ins_cpwd='';
      $Ins_vehicule='';
      $SuccessMsg='';
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
         if (empty($_POST['Ins_Name'])) {
            $ErrorFormMsg="Le champ nom est vide";
         } else {
            $Ins_Name=$_POST['Ins_Name'];
         }
         if (empty($_POST['Ins_Email'])) {
            $ErrorFormMsg="Le champ e-mail est vide";
         } else {
            $Ins_Email=$_POST['Ins_Email'];
         }
         if (empty($_POST['Ins_pwd'])) {
            $ErrorFormMsg="Le champ password est vide";
         } else {
            $Ins_pwd=$_POST['Ins_pwd'];
         }
         if (empty($_POST['Isn_cpwd'])) {
            $ErrorFormMsg="Le champ confimation password est vide";
         } else {
            $Ins_cpwd=$_POST['Isn_cpwd'];
         }
         if (empty($_POST['Ins_vehicule'])) {
            $ErrorFormMsg="Le champ vehicule est vide";
         } else {
            $Ins_vehicule=$_POST['Ins_vehicule'];            
         }
         if ($_POST['Ins_pwd'] != $_POST['Isn_cpwd']) {
            $ErrorFormMsg="Les passwords ne correspondent pas";
         }
         # no error, we check if user already exists
         if ($ErrorFormMsg == '') {
            $jon = file_get_contents("doc_comple/utilisateurs.json");
            $decode= json_decode($jon, true);
            $hash_user = (array)$decode;
            $us_found = false;
            for ($i = 0; $i < count($hash_user) ; $i ++) {
               if ($hash_user[$i]["utilisateur"] == $_POST["Ins_Name"]) {
                  $us_found = true;
               }   
            }
            if ($us_found == true) {
               $ErrorFormMsg = "L'utilisateur " . $_POST["Ins_Name"] . " existe deja";  
            } else {
               $ErrorFormMsg = "A créer!!";
               # On peut ajouter l'utilisateur ici
               array_push( $hash_user, array(
                  "utilisateur" => $_POST["Ins_Name"],
                  'motdepasse' => password_hash($_POST["Ins_pwd"], PASSWORD_DEFAULT) ,
                  'vehicule' => $_POST["Ins_vehicule"],
                  'email' => $_POST["Ins_Email"],
                  'role' => "user"
               ));
               // On réencode en JSON
               $contenu_json = json_encode($hash_user);
               // On sauvegarde le JSON dans le fichier
               file_put_contents('doc_comple/utilisateurs.json', $contenu_json);
               // plus besion d'afficher le formulaire
               $DisplayForm=0;
               $SuccessMsg="L'utilisateur \"" . $_POST["Ins_Name"] . "\" a été ajouté avec success";
            }
         }
      }
   ?>

   <div>
      <div class=" p-5 bg-secondary text-white">
         <h1>Inscription</h1> 
         <?php
            echo  date("Y-m-d h:i:sa");
         ?>
      </div>
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

   <div>
      <?php
         if ($DisplayForm == 1) {
      ?>
            <form action="Formulaire.php" method="post" class="was-validated">
               <div class="row pb-1">
                  <label for="Name" class="col-sm-2 col-form-label">Nom :</label>
                  <div class="col-sm-3">
                     <input type="text" class="form-control" id="Ins_Name" placeholder="Enter Name"
                            name="Ins_Name" value="<?php echo ($Ins_Name != '') ? $Ins_Name : '';?>" required>
                  </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="row pb-1">
                  <label for="Email" class="col-sm-2 col-form-label">Email :</label>
                  <div class="col-sm-3">
                     <input type="text" class="form-control" id="Ins_Email" placeholder="Enter Email"
                            name="Ins_Email" value="<?php echo ($Ins_Email != '') ? $Ins_Email : '';?>" required>
                  </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="row pb-1">
                  <label for="pwd" class="col-sm-2 col-form-label">Password :</label>
                  <div class="col-sm-3">
                     <input type="password" class="form-control" id="Ins_pwd" placeholder="Enter password"
                            name="Ins_pwd" value="<?php echo ($Ins_pwd != '') ? $Ins_pwd : '';?>" required>
                  </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="row pb-1">
                  <label for="confpwd" class="col-sm-2 col-form-label">Confirmation password :</label>
                  <div class="col-sm-3">
                     <input type="password" class="form-control" id="Isn_cpwd" placeholder="Confirm password"
                            name="Isn_cpwd" value="<?php echo ($Ins_cpwd != '') ? $Ins_cpwd : '';?>" required>
                  </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <div class="row pb-1">
                  <label for="vehicule" class="col-sm-2 col-form-label">Véhicule :</label>
                  <div class="col-sm-3">
                     <input type="text" class="form-control" id="Ins_vehicule" placeholder="Your vehicule"
                            name="Ins_vehicule" value="<?php echo ($Ins_vehicule != '') ? $Ins_vehicule : '';?>" required>
                     </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
               </div>
               <button type='submit' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#myModal1'>Créer</button>
            </form>
      <?php
            echo "<div>" . $ErrorFormMsg . "</div>";
         } else {
            echo "<div>" . $SuccessMsg . "</div>";
         }
      ?>

   </div>
</body>
</html