


<?php
    session_start();

    if (!isset($_SESSION["id_prof"])) {
       header('Location: login.php');
       exit();
    }
     $id_prof = $_SESSION["id_prof"];

     $host = "localhost";
     $user = "root";
     $pass = "";
     $dbname = "ensahservice";
     $conn = mysqli_connect($host, $user, $pass, $dbname);
     if (mysqli_connect_errno()) {
          die("Failed to connect to MySQL: " . mysqli_connect_error());
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
    <link rel="stylesheet" href="/style/chefdepar/EtudinatAbsence.css">

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
                   <a href="/index/prof/accueil.php">Accueil</a>
                </li>
                <li>
                    <div class="imgEmploi"></div>
                    <a href="/index/prof/emploi.php">Emploi</a>
                </li>
                <li>
                    <div class="imgProfil"></div>
                    <a href="/index/prof/profil.php">Profil</a>
                </li>
                <li>
                    <div class="imgModulenote"></div>
                    <a href="/index/prof/Modulenote.php">Module/note</a>
                </li>
                <li>
                    <div class="imgEtudinatAbsence"></div>
                    <a href="/index/prof/EtudinatAbsence.php">Etudinat/Absence</a>  
                </li>
                <li>
                    <div class="imgNotifications"></div>
                    <a href="/index/prof/notifications.php">Notifications</a>  
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
                        <a href="/index/prof/profil.php">profil</a>
                        <a href="../login/logout.php">desconecter</a>
                      </div>
                  </div>
            </li>
            <li>
                <a href="/index/prof/notifications.php" class="notification">
                    <div><img src="" alt=""></div>
                    <span class="badge">3</span>
                </a>
            </li>
           </ul>   
        </nav>
        <article class="article1">
          <nav class="filierenavbar">
            <ul class="ulfliere">
              <?php
              $sql = "SELECT m.nom_module, m.type_module, c.nom_classe, mcpf.id_classe,mcpf.id_module
                      FROM module m
                      INNER JOIN classe c
                      INNER JOIN module_classe_professeur_filiere mcpf ON m.id_module = mcpf.id_module AND c.id_classe = mcpf.id_classe 
                      WHERE mcpf.id_prof = $id_prof";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<form method="post" class="formmodule">';
                  echo '<li><button type="submit" class="button_mcp" name="classe_profesr_module"> <h1 class="Nmod">' . $row["nom_module"] . '</h1><br><p class="FLmod">' . $row["nom_classe"] . '</p><br><p class="SMmod">' . $row["type_module"] . '</p></button></li>';
                  echo '<input type="hidden" name="idm1" value="' . $row['id_module'] . '">';
                  echo '<input type="hidden" name="idc1" value="' . $row['id_classe'] . '">';
                  echo '</form>';
                }
              }
              ?>
            </ul>
          </nav>
        
          <aside class="Etudinfo">
            <aside class="Etudinfo1">
        
              <div class="titretab">
                <p>table Students</p>
              </div>
              <section class="partiem">
                <table id="dtBasicExample" class="table " cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">ID
                      </th>
                      <th class="th-sm">First name
                      </th>
                      <th class="th-sm">Last name
                      </th>
                      <th class="th-sm">Absence
                      </th>
                      <th class="th-sm">Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
        
                    if (isset($_POST['classe_profesr_module']) || isset($_POST['classe_etudiant'])) {
                      $selected_module_id = isset($_POST['idm1']) ? $_POST['idm1'] : "";
                      $selected_classe_id = isset($_POST['idc1']) ? $_POST['idc1'] : "";
        
                      $sql = "SELECT e.id_etudiant, e.nom_etudiant, e.prenom_etudiant, c.nom_classe
                              FROM etudiant e
                              JOIN classe c ON c.id_classe = e.id_classe
                              WHERE e.id_classe = $selected_classe_id";
        
                      if (!empty($selected_classe_id) && !empty($selected_module_id)) {
                        $sql .= " AND e.id_classe = $selected_classe_id ";
                      }
                      // a resaudre   
                      $result = mysqli_query($conn, $sql);
        
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                          <tr>
                           <form method="post" class="formmodule">
                            <td>' . $row["id_etudiant"] . '</td>
                            <td>' . $row["nom_etudiant"] . '</td>
                            <td>' . $row["prenom_etudiant"] . '</td>
                            <td>' . $row["nom_classe"] . '</td>
                            <td class="lastth"><button class="btn-primary" type="submit" name="classe_etudiant"></button></td>
                            <input type="hidden" name="ide2" value="' . $row['id_etudiant'] . '">
                            <input type="hidden" name="idc2" value="' . $selected_classe_id . '">
                            <input type="hidden" name="idm2" value="' . $selected_module_id . '">
                           </form>
                          </tr>
                          ';
                      }
                      
                    }
                    ?>
                  </tbody>
                </table>
              </section>
            </aside>
            <aside class="Etudinfo2">
              <div class="cherchestudent">
        
                <?php      
                if (isset($_POST['classe_etudiant'])) {
                  $selected_etud_id = $_POST['ide2'];
                  $selected_module_id = $_POST['idm2'];
                  $selected_classe_id = $_POST['idc2'];
        
                  echo '
                       <div class="imgprof2"></div>
                       <div class="infte">
                          <ul>';
        
                  $sql = "SELECT e.id_etudiant, e.nom_etudiant, e.prenom_etudiant, e.email_etudiant , f.nom_filiere ,c.nom_classe
                          FROM etudiant e
                          JOIN classe c ON c.id_classe = e.id_classe 
                          JOIN filiere f ON f.id_filiere = e.id_filiere
                          WHERE id_etudiant= $selected_etud_id 
                          LIMIT 1
                          ";
        
                  $result = mysqli_query($conn, $sql);
        
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                             <li><div class="colomn"><h2>Name       :</h2><p>' . $row["nom_etudiant"] . ' ' . $row["prenom_etudiant"] . '</p><h2 class="h222">ID  :</h2><p class="p11">' . $row["id_etudiant"] . '</p></div></li>
                             <li><div class="colomn"><h2>Email      :</h2><p>' . $row["email_etudiant"] . '</p></div></li>
                             <li><div class="colomn"><h2>Filière    :</h2><p>' . $row["nom_filiere"] . '</p> </div></li>
                             <li><div class="colomn"><h2>Classe     :</h2><p>' . $row["nom_classe"] . '</p></div></li>';
                  }
                  $sql1 = "SELECT nombre_absence,id_absence
                           FROM absence
                           WHERE id_etudiant = $selected_etud_id AND id_prof = $id_prof AND id_module = $selected_module_id 
                          ";
        
                  $result1 = mysqli_query($conn, $sql1);
                  while ($row = mysqli_fetch_assoc($result1)) {
                    echo ' <li><div class="colomn"><h2>Absence    :</h2><p>' . $row["nombre_absence"] . '</p></div></li>';
                  
                  echo '</ul>
                         </div>
                         <div class="modifierinfetud">
                            <form method="post" class="formmodifier">
                               <div class="modifierinf"><button class="btnmodifier" type="submit" name="modifier_etudiant">Modifier</button></td> 
                               <input type="hidden" name="ida1" value="' . $row['id_absence'] . '">              
                            </form>
                         </div>
                           ';
                  }
                }
                echo '</div>';
                ?>
        
        
        <div class="infstud">
          <?php
          if (isset($_POST['modifier_etudiant'])) {
            $selected_abs_id = $_POST['ida1'];
            $sql1 = "SELECT nombre_absence, nbre_abs_justifiee, id_absence
                     FROM absence
                     WHERE id_absence = $selected_abs_id";
        
            $result1 = mysqli_query($conn, $sql1);
        
            while ($row = mysqli_fetch_assoc($result1)) {
              echo '
                <div class="infte1">
                  <ul>
                    <li>
                      <div class="colomn1">
                        <h2>Absences :</h2>
                        <p>' . $row["nombre_absence"] . '</p>
                      </div>
                    </li>
                    <li>
                      <div class="colomn1">
                        <h2>Absences justifiées :</h2>
                        <p>' . $row["nbre_abs_justifiee"] . '</p>
                      </div>
                    </li>
                    <input type="hidden" name="ida2" value="' . $row['id_absence'] . '">
                  </ul>
                </div>
              ';
            }
        ?>
              <div class="modifierabs">
                <form method="post">
                <div>
                  <label for="absence" class="chngeabs" >Nombre d\'absences :</label>
                  <input type="number" class="chngeabs1" name="absence" min="0" max="100" required>
                </div>
                <div>  
                  <label for="absence_justifiee" class="chngeabs" >Nombre d\'absences justifiées :</label>
                  <input type="number" class="chngeabs1" name="absence_justifiee" min="0" max="100" required>
                </div>  
                  <button type="submit" class="btnmodf"><p>Modifier</p></button>
                </form>
              </div>
          
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $selected_abs_id = $_POST['ida1'];
              $sql1 = "SELECT nombre_absence, nbre_abs_justifiee
                       FROM absence
                       WHERE id_absence = $selected_abs_id";
              $result1 = mysqli_query($conn, $sql1);
              while ($row = mysqli_fetch_assoc($result1)) {
                $nbr_abs_initial = $row["nombre_absence"];
                $nbr_abs_jus_initial = $row["nbre_abs_justifiee"];
              }
        
              $nbr_abs = isset($_POST["absence"]) ? $_POST["absence"] : $nbr_abs_initial+1;
              $nbr_abs_jus = isset($_POST["absence_justifiee"]) ? $_POST["absence_justifiee"] : $nbr_abs_jus_initial;
        
              $sql = "UPDATE absence
                      SET nombre_absence = ?, nbre_abs_justifiee = ?
                      WHERE id_absence = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("sss", $nbr_abs, $nbr_abs_jus, $selected_abs_id);
              if ($stmt->execute()) {
                echo "";
              } else {
                echo "" . $stmt->error;
              }
            }
          }
          ?>
        </div>
        
        
              </aside>
            </aside>
          </article>
        
            </aside>
        
        
            
            <script type="text/javascript">
              dTable=$('#myTable').DataTable({
                     "bLengthChange": false,
                     "lengthMenu": [4],
                     "columnDefs": [
                     {"className": "dt-center", "targets": "_all"}
                   ],
                     "dom":"lrtip"
              });
              
                 $('#myCustomSearchBox').keyup(function(){  
                   dTable.search($(this).val()).draw();
              })
              
           
           
              $(document).ready(function () {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
              });
           
          
           </script>
            
        </body>
        </html>
        
        