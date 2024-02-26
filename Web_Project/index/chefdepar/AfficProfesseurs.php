<?php
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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  $choix = $_POST['filiere'];
    $id_CP1 = null;
    $id_CP2 = null;
    $id_GI = null;
    $id_ID = null;
    $id_GC = null;

    foreach ($choix as $valeur) {
        switch ($valeur) {
            case 'CP1':
                $id_CP1 = 1;
                break;
            case 'CP2':
                $id_CP2 = 2;
                break;
            case 'GI':
                $id_GI = 3;
                break;
            case 'ID':
                $id_ID = 4;
                break;
            case 'GC':
                $id_GC = 5;
                break;
        }
    }

    $nom_prof = $_POST["nom_prof"];
    $prenom_prof = $_POST["prenom_prof"];
    $id_prof = $_POST["id_prof"];
    $Email_prof = $_POST["Email_prof"];
    $password_prof = $_POST["password_prof"];
    $genre_prof = $_POST['genre'];
    $Spesialite_prof =$_POST['Spesialite'];
    $password_hashed = sha1($password_prof);
    $filiere_ensg = $_POST["Filiere_Ensg"];
    if ($Spesialite_prof == "Respfiliere") {
       $filiere_ensg = $_POST["Filiere_Ensg"];
    } else {
       $filiere_ensg = null;
    }

    $sql = "INSERT INTO professeur (id_prof, nom_prof, prenom_prof, email_prof, etat_prof, modepass_prof, specialite, id_CP1, id_CP2, id_GI, id_ID, id_GC, filiere_ensg) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $id_prof, $nom_prof, $prenom_prof, $Email_prof, $genre_prof, $password_hashed, $Spesialite_prof, $id_CP1, $id_CP2, $id_GI, $id_ID, $id_GC, $filiere_ensg);
  
    if ($stmt->execute()) {
        echo "";
    } else {
        echo "" . $stmt->error;
    }

    $stmt->close();
}



  $sql = "SELECT id_prof, nom_prof,prenom_prof, email_prof  FROM professeur ";
  $result = mysqli_query($conn, $sql);  

if (mysqli_num_rows($result) > 0) {
  while ($ligne = mysqli_fetch_assoc($result)) {
    $tableauProfes[] = array(
      'nom_prof' => $ligne['nom_prof'],
      'prenom_prof' => $ligne['prenom_prof'],
      'email_prof' => $ligne['email_prof'],
      'id_prof' => $ligne['id_prof']
    );
  } 
}

if (isset($_GET['prof_button'])) {
  $selected_prof_id = $_GET['idprof'];

  $sql = "SELECT id_prof, nom_prof, prenom_prof, email_prof, specialite, etat_prof, filiere_ensg
                 , id_CP1, id_CP2, id_GI, id_ID, id_GC 
          FROM professeur 
          WHERE id_prof = $selected_prof_id 
         ";
  $result = mysqli_query($conn, $sql);  

if (mysqli_num_rows($result) > 0) {
  while ($ligne = mysqli_fetch_assoc($result)) {
    $Proftable[] = array(
      'nom_prof' => $ligne['nom_prof'],
      'prenom_prof' => $ligne['prenom_prof'],
      'email_prof' => $ligne['email_prof'],
      'id_prof' => $ligne['id_prof'],
      'specialite' => $ligne['specialite'],
      'etat_prof' => $ligne['etat_prof'],
      'filiere_ensg' => $ligne['filiere_ensg'],
      'id_CP1' => ($ligne['id_CP1'] != null) ? 'AP1' : null,
      'id_CP2' => ($ligne['id_CP2'] != null) ? 'AP2' : null,
      'id_GI' => ($ligne['id_GI'] != null) ? 'GI' : null,
      'id_ID' => ($ligne['id_ID'] != null) ? 'ID' : null,
      'id_GC' => ($ligne['id_GC'] != null) ? 'GC' : null
    );
  } 
}
}


if (isset($_GET['delete_button'])) {
  $prof_id = $_GET['idprof'];
     $sqlDelete = "DELETE FROM professeur WHERE id_prof = $prof_id";
     $resultDelete = mysqli_query($conn, $sqlDelete);
}



$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/chefdepar/AfficProfesseurs.css">



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
            <aside class="Teacherinfo">
                <aside class="Teacherinfo1">
                  <div class="titretab1"><p>Ajouter Professeur</p></div>
                    <div class="cherchetech">
                      <form method="post" action="">
                      <div class="enterinfo">
                        <div class="name">
                            <div class="col-md-5"><input type="text" name="nom_prof" class="form-control" placeholder="First Name" value=""></div>  
                            <div class="col-md-5"><input type="text" name="prenom_prof" class="form-control" placeholder="Last Name" value=""></div>  
                        </div>
                        <div class="name">
                          <div class="col-md-5"><input type="text" class="form-control" name="id_prof"  placeholder="ID professeur" value=""></div>  
                          <div class="etat1">
                            <input type="checkbox" id="CP1" name="filiere[]" value="CP1">CP1
                            <input type="checkbox" id="CP2" name="filiere[]" value="CP2">CP2
                            <input type="checkbox" id="GI" name="filiere[]" value="GI">GI
                            <input type="checkbox" id="ID" name="filiere[]" value="ID">ID
                            <input type="checkbox" id="GC" name="filiere[]" value="GC">GC
                          </div>
                      </div>
                        <div class="adres">
                           <div class="col-md-8"></label><input type="text" name="Email_prof" class="form-control" placeholder="Email" value=""></div> 
                           <div class="name">
                           <div class="col-md-5"></label><input type="password" name="password_prof" class="form-control" placeholder="Password" value=""></div>
                           <div class="col-md-5"></label><input type="text" name="Filiere_Ensg" class="form-control" placeholder="ID Filiere Enseignée" value=""></div>    
                           </div>
                        </div> 
                        <div class="etat">
                        Genre :     <input type ="radio" name="genre" value="Professeur">Professeur
                                   <input type ="radio" name="genre" value="Vacataire">Vacataire
                                   <input type ="radio" name="genre" value="Respfiliere">Responsable de filiere
                        </div>
                        <div class="specialite">
                        Spécialite :     <input type ="radio" name="Spesialite" value="informatique">Informatique
                                         <input type ="radio" name="Spesialite" value="Economique">Economique
                                         <input type ="radio" name="Spesialite"value="Mathematique">Mathematique
                        </div>                 
                        <div class="line1"></div>
                        <div class="inscrip"><input class="input1" type="submit" name="enregistrer" value="Enregistrer"></div>
                      </div>
                    </form>
                    </div>
                    
                    <div class="inftech">

                    <?php foreach ($Proftable as $prof) { ?>
                         <div class="imgprof2"></div>
                         <div class="infte">
                          <ul>
                            <li><div class="colomn"><h2>Name       :</h2><p><?php echo $prof['nom_prof'] . ' ' . $prof['prenom_prof']; ?></p></div></li>
                            <li><div class="colomn"><h2>ID         :</h2><p><?php echo $prof['id_prof']; ?></p></div></li>
                            <li><div class="colomn"><h2>Email      :</h2><p><?php echo $prof['email_prof']; ?></p></div></li>
                            <li><div class="colomn"><h2>Spécialite :</h2><p><?php echo $prof['specialite']; ?></p></div></li>
                            <li><div class="colomn"><h2>Etat       :</h2><p><?php echo $prof['etat_prof']; ?></p></div></li>
                            <li><div class="colomn"><h2>Filieres     :</h2><p><?php   $filieres = [];
                                                                          if ($prof['id_CP1'] !== null) { $filieres[] = 'AP1';}
                                                                          if ($prof['id_CP2'] !== null) {$filieres[] = 'AP2';}
                                                                          if ($prof['id_GI'] !== null) {$filieres[] = 'GI'; }
                                                                          if ($prof['id_ID'] !== null) { $filieres[] = 'ID'; }
                                                                          if ($prof['id_GC'] !== null) {$filieres[] = 'GC';}
                                                                          echo implode(', ', $filieres); ?></p></div>
                            </li>
                            <?php if ($prof['specialite'] == 'Respfiliere') : ?>
                           <li><div class="colomn"><h2>Filiere Enseignée :</h2>
                                                                     <?php if ($prof['filiere_ensg'] == 1) {echo '<p>AP1</p>';
                                                                     } elseif ($prof['filiere_ensg'] == 2) {echo '<p>AP2</p>';
                                                                     } elseif ($prof['filiere_ensg'] == 3) {echo '<p>GI</p>';
                                                                     } elseif ($prof['filiere_ensg'] == 4) {echo '<p>ID</p>';
                                                                     } elseif ($prof['filiere_ensg'] == 5) {echo '<p>GC</p>';
                                                                     }
                                                                     ?>
                           </div></li>
                            <?php endif; ?>
                          </ul>
                        </div>
                        <form method="get">
                             <input type="hidden" name="idprof" value="<?php echo $prof['id_prof']; ?>">
                             <button type="submit" name="delete_button" class="edit-btn">Delete</button>
                        </form> 
                        <?php 
                          } 
                      ?>  
                    </div>
                </aside>
                <aside class="Teacherinfo2">
                  <div class="titretab"><p>Table teacher</p></div>
                    <div class="tableau">
                        <section>
                            <div class="tbl-header">
                              <table>
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="lastth">Action</th>
                                  </tr>
                                </thead>
                              </table>
                            </div>
                            <div class="tbl-content">
                              <table>
                                <tbody>
                                <?php foreach ($tableauProfes as $prof) { ?>  
                                  <tr>
                                    <td><?php echo $prof['id_prof']; ?></td>
                                    <td><?php echo $prof['nom_prof'] . ' ' . $prof['prenom_prof']; ?></td>
                                    <td><?php echo $prof['email_prof']; ?></td>
                                    <form method="GET">
                                        <td class="lastth"><button class="btn-primary" name="prof_button">
                                            <input type="hidden" name="idprof" value="<?php echo $prof['id_prof']; ?>">
                                                           </button>
                                        </td>
                                    </form>
                                  </tr>
                                  <?php 
                                    } 
                                   ?> 
                                </tbody>
                              </table>
                            </div>
                          </section>
                        </div>
   	                       <div class="main-search-input-wrap">
                                <div class="main-search-input fl-wrap">
                                          <div class="main-search-input-item">
                                              <input type="text"  value="" placeholder="Search Teacher...">
                                          </div>
                                          <button class="main-search-button">Search</button>
                                 </div>
                           </div>
                    </aside>
        </article>
    </aside>
    


    
</body>
</html>