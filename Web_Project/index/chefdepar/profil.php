<?php

/*
$variable = $_POST['variable'];
$id_initiale_prof = strrev($variable);
*/
session_start();
if (!isset($_SESSION["id_prof"])) {
    header('Location: login.php');
    exit();
}
$id_initiale_prof = $_SESSION["id_prof"];



// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ensahservice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$id_initiale_prof=123896;

$sql = "SELECT nom_prof, prenom_prof,decriptif_prof,image_prof FROM professeur
        WHERE  id_prof = $id_initiale_prof";        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Parcourir les résultats et afficher les valeurs dans les champs de saisie
    while ($row = $result->fetch_assoc()) {
        $nom_prof = $row["nom_prof"];
        $prenom_prof = $row["prenom_prof"];
        $decrp_prof = $row["decriptif_prof"];
        $img_prof = $row["image_prof"];
    }
} else {
    echo "Aucun résultat trouvé.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adress_prof = isset($_POST["adress"]) ? $_POST["adress"] : NULL;
    $password_prod = isset($_POST["password"]) ? sha1($_POST["password"]) : NULL;
    $City_prof = isset($_POST["City"]) ? $_POST["City"] : NULL;
    $profdescription = isset($_POST["profdescription"]) ? $_POST["profdescription"] : NULL;

    if (isset($_FILES["pdf-file"]) && $_FILES["pdf-file"]["error"] == UPLOAD_ERR_OK) {
        $imagePath = move_uploaded_file($_FILES["pdf-file"]["tmp_name"], "image_" . $nom_prof);
    } else {
        $imagePath = NULL;
    }
$sql = "UPDATE professeur
        SET addresse_prof = ?,
            city = ?,
            decriptif_prof = ?,
            image_prof = ?
            WHERE id_prof = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $adress_prof, $City_prof, $profdescription, $imagePath, $id_initiale_prof);
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "" . $stmt->error;
    }
    if($password_prod !== NULL){
$sql = "UPDATE professeur 
        SET modepass_prof = '$password_prod' 
        WHERE id_prof = $id_initiale_prof";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "" . $conn->error;
    }    
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/chefdepar/profil.css">

    <title>ENSAH</title>
</head>

<body>
    <nav class="navbarline">       
        <div class="logo"><p>ENSAH</p></div>
        <div class="linebar"></div>
        <div class="nabar">
            <ul>
                <li>
                   <div class="imgAccueil"></div>
                   <a href="/index/chefdepar/accueil.php">Accueil</a>
                </li>
                <li>
                    <div class="imgEmploi"></div>
                    <a href="/index/chefdepar/emploi.php">Emploi</a>
                </li>
                <li>
                    <div class="imgProfil"></div>
                    <a href="/index/chefdepar/profil.php">Profil</a>
                </li>
                <li>
                    <div class="imgModulenote"></div>
                    <a href="/index/chefdepar/Modulenote.php">Module/note</a>
                </li>
                <li>
                    <div class="imgEtudinatAbsence"></div>
                    <a href="/index/chefdepar/EtudinatAbsence.php">Etudinat/Absence</a>  
                </li>
                <li>
                    <div class="imgAfficModules"></div>
                    <a href="/index/chefdepar/AfficModules.php">Affic des modules</a>
                </li>
                <li>
                    <div class="imgAfficProfesseurs"></div>
                    <a href="/index/chefdepar/AfficProfesseurs.php">Affic des professeurs</a>  
                </li>
                <li>
                    <div class="imgNotifications"></div>
                    <a href="/index/chefdepar/notifications.php">Notifications</a>  
                </li>
            </ul>
        </div>
    </nav>
    <aside>

        <nav class="navbarcolomne">
           <ul>
            <li>
                <div class="wrap">
                    <div class="search">
                       <input type="text" class="searchTerm" placeholder="Search...">
                       <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  <div class="lineshearch"></div>
            </li>
            <li class="profili">
                <div class="profi1">
                    <button class="but-profi"><div class="im1"></div></button> 
                      <div class="profi2">
                        <a href="/index/chefdepar/profil.php">profil</a>
                        <a href="../login/logout.php">desconecter</a>
                      </div>
                  </div>
            </li>
            <li>
                <a href="/index/chefdepar/notifications.php" class="notification">
                    <div><img src="" alt=""></div>
                    <span class="badge">3</span>
                </a>
            </li>
           </ul>   
        </nav>
        <article class="article1">               
            <aside class="aside1">
                <div class="editprof">
                    <p class="logprof">Profile</p>
                </div>
                <div class="enterinfo">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="name">
                        <div class="col-md-5"><input type="" class="form-control" placeholder="<?php echo $prenom_prof; ?>" value=""/></div>  
                        <div class="col-md-5"><input type="" class="form-control" placeholder="<?php echo $nom_prof; ?>" value=""/></div>  
                    </div>
                    <div class="adres">
                       <div class="col-md-8"><input type="password" class="form-control" name="password" placeholder="Change Password" value=""/></div>    
                       <div class="col-md-8"><input type="text" class="form-control" name="adress" placeholder="Adress" value=""/></div> 
                    </div> 
                    <div class="place">
                        <div class="col-md-3"><input type="text" class="form-control" name="City"  placeholder="City" value=""/></div>    
                        <div class="col-md-9"><input type="text" class="form-control" name="profdescription" placeholder="modifier votre description" value=""/></div> 
                    </div>
                    <div class="line1"></div>
                    <div class="underinfo">
                        <div class="imageinsert">
                          <!--<input class="imginput" type="file" name="image" accept="image/*">
                          <input class="Enregimg" type="submit" value="Enregistrer">
                          <label class="textedaplo" for="pdf-file">Image Professeur:</label>-->
                          <input type="hidden" name="MAX_FILE_SISE" value="100000"/>
                          <input class="imginput" type="file" id="pdf-file" name="pdf-file" accept="image/*"/>
                       </div>
                       <div class="inscrip"><input class="input1" type="submit" value="UPDATE PROFILE"></div>
                    </div>
                </form>
                </div>

            </aside>
            <aside class="aside2">
                <?php
                if($img_prof==NULL){
                    echo' <div class="imgprof"></div>';
                }else{
                    echo' <div class="imgprof src="'. $img_prof .'.png"></div>';//??
                }
                ?>
                <div class="biblio">
                    <h1><?php echo "$prenom_prof"." "."$nom_prof"; ?></h1>
                    <div class="discripprof">
                        <?php 
                        if($decrp_prof== NULL){
                          echo'  <p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                                    xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
                               </p>';
                        }
                        else{
                            echo '<p>
                             '. $decrp_prof .'
                            </p>';
                        }
                        ?>
                </div>
                </div> 
            </aside>   
            <?php $conn->close(); ?>
        </article>
    </aside>
    
</body>
</html>



