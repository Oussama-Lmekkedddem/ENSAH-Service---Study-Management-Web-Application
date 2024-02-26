<?php
// Connexion à la base de données
session_start();

if (!isset($_SESSION["id_prof"])) {
    header('Location: login.php');
    exit();
}
$id_initial_prof = $_SESSION["id_prof"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/chefdepar/Modulenote.css">

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
            <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ensahservice";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $idprofesseurinitial = 1;
            $idfiliereinitial = 3;
                    echo'
                        <div class="EnsgResp">
                            <div class="Ensg">
                                <div class="Ensgname"><p>Ensigne</p></div>
                                <div class="Ensgmodule">
                                ';
                                $sql = "SELECT mcpf.id_prof, mcpf.id_module, mcpf.id_classe, m.nom_module, m.type_module, m.nombre_heur, c.nom_classe 
                                        FROM module_classe_professeur_filiere AS mcpf
                                        JOIN module AS m ON mcpf.id_module=m.id_module
                                        JOIN classe AS c ON mcpf.id_classe=c.id_classe
                                        WHERE mcpf.id_prof = $idprofesseurinitial AND mcpf.id_filiere=$idfiliereinitial ";
                               $result = mysqli_query($conn, $sql);  
                               if (mysqli_num_rows($result) > 0) {
                                  while ($row = mysqli_fetch_assoc($result)) {
                                    echo'
                                    <form method="post" class="formmodule">
                                        <button class="li1" type="submit" name="classmodulprof" ><h2>' . $row["nom_module"] . '</h2><br><h2>' . $row["nom_classe"] . '</h2><br><h2>' . $row["type_module"] . '</h2><br><h2>' . $row["nombre_heur"] . '</h2></button>
                                        <input type="hidden" name="idp" value="' . $row['id_prof'] . '">
                                        <input type="hidden" name="idm" value="' . $row['id_module'] . '">
                                        <input type="hidden" name="idc" value="' . $row['id_classe'] . '">
                                    </form>
                                    ';
                                  }
                                }
                               echo'     
                                </div>
                            </div>
                            <div class="linevertcal"></div>
                            <div class="Resp">
                                <div class="Respname"><p>Responsable</p></div>
                                <div class="Respmodule">
                                ';
                                $sql = "SELECT mcpf.id_prof, mcpf.id_module, mcpf.id_classe, m.nom_module, m.type_module, m.nombre_heur, c.nom_classe 
                                        FROM module_classe_professeur_filiere AS mcpf
                                        JOIN module AS m ON mcpf.id_module=m.id_module
                                        JOIN classe AS c ON mcpf.id_classe=c.id_classe
                                        WHERE mcpf.id_prof = $idprofesseurinitial AND mcpf.id_filiere=$idfiliereinitial ";
                               $result = mysqli_query($conn, $sql);  
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                      echo'
                                      <form method="post" class="formmodule">
                                        <button class="li1" type="submit" name="classmodulprof" ><h2>' . $row["nom_module"] . '</h2><br><h2>' . $row["nom_classe"] . '</h2><br><h2>' . $row["type_module"] . '</h2><br><h2>' . $row["nombre_heur"] . '</h2></button>
                                        <input type="hidden" name="idp" value="' . $row['id_prof'] . '">
                                        <input type="hidden" name="idm" value="' . $row['id_module'] . '">
                                        <input type="hidden" name="idc" value="' . $row['id_classe'] . '">
                                    </form>
                                      ';
                                    }
                                  }
                               echo'                         
                                </div>
                            </div>
                        </div>';
            
            
            
            if (isset($_POST['classmodulprof'])) {
                $selected_classe_id = $_POST['idc'];
                $selected_prof_id = $_POST['idp'];
                $selected_module_id = $_POST['idm'];
            
                if (isset($_POST['selectoption']) && isset($_FILES['pdf-file'])) {
                    $type_note = $_POST['selectoption'];
                    $pdf_file = $_FILES['pdf-file']['name'];
                    $pdf_tmp = $_FILES['pdf-file']['tmp_name'];
                    $pdf_path = "uploads/" . $pdf_file;
            
                    move_uploaded_file($pdf_tmp, $pdf_path);
            
                    $sql = "INSERT INTO note (address_pdf, type_note, id_prof, id_module, id_classe) VALUES ('$pdf_path', '$type_note', '$selected_prof_id', '$selected_module_id', '$selected_classe_id')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Note insérée avec succès";
                    } else {
                        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            
                echo'
                <div class="entrernote">
                <div class="optionnote">
                    <form method="post" action="">
                        <select class="selectoption" name="selectoption">
                            <option value="Ds">DS</option>
                            <option value="Ordinaire">Ordinaire</option>
                            <option value="Rattrapage">Rattrapage</option>
                        </select>
                        <input type="hidden" name="idc" value="'.$selected_classe_id.'">
                        <input type="hidden" name="idp" value="'.$selected_prof_id.'">
                        <input type="hidden" name="idm" value="'.$selected_module_id.'">
                </div>
                <div class="notefile">
                    <label class="textedaplo" for="pdf-file">Les notes de classe :</label>
                    <input class="uplodefile" type="file" id="pdf-file" name="pdf-file">
                    <input type="submit" value="Uploader" class="upload-btn">
                    </form>
                </div>  
            </div>
            
                ';
            
            }
            
            ?>
            
            
                    </article>
    </aside>
    

    
</body>
</html>