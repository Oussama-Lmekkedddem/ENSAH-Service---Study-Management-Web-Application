<?php

session_start();

if (!isset($_SESSION["id_prof"])) {
    header('Location: login.php');
    exit();
}
$id_prof_initial = $_SESSION["id_prof"];

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ensahservice";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (mysqli_connect_errno()) {
     die("Failed to connect to MySQL: " . mysqli_connect_error());
}


$sql = "SELECT filiere_ensg
          FROM professeur
          WHERE id_prof = $id_prof_initial
         ";
           $result = mysqli_query($conn, $sql);  
    if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
        $id_filiere_initial = $row['filiere_ensg'];
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
       <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/respfiliere/ValiderNotes.css">

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
                   <a href="/index/respfiliere/accueil.php">Accueil</a>
                </li>
                <li>
                    <div class="imgEmploi"></div>
                    <a href="/index/respfiliere/emploi.php">Emploi</a>
                </li>
                <li>
                    <div class="imgProfil"></div>
                    <a href="/index/respfiliere/profil.php">Profil</a>
                </li>
                <li>
                    <div class="imgModulenote"></div>
                    <a href="/index/respfiliere/Modulenote.php">Module/note</a>
                </li>
                <li>
                    <div class="imgEtudinatAbsence"></div>
                    <a href="/index/respfiliere/EtudinatAbsence.php">Etudinat/Absence</a>  
                </li>
                <li>
                    <div class="imgAffectationM"></div>
                    <a href="/index/respfiliere/AffectationM.php">Affectation des modules</a>
                </li>
                <li>
                    <div class="imgDefiniremploi"></div>
                    <a href="/index/respfiliere/Definiremploi.php">Définir l'emploi</a>
                </li>
                <li>
                    <div class="imgValiderNotes"></div>
                    <a href="/index/respfiliere/ValiderNotes.php">Valider les notes</a>
                </li>
                <li>
                    <div class="imgFormation"></div>
                    <a href="/index/respfiliere/Formation.php">classe emploi</a>  
                </li>
                <li>
                    <div class="imgNotifications"></div>
                    <a href="/index/respfiliere/notifications.php">Notifications</a>  
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
                        <a href="/index/respfiliere/profil.php">profil</a>
                        <a href="../login/logout.php">desconecter</a>
                      </div>
                  </div>
            </li>
            <li>
                <a href="/index/respfiliere/notifications.php" class="notification">
                    <div><img src="" alt=""></div>
                    <span class="badge">3</span>
                </a>
            </li>
           </ul>   
        </nav>

        
        <article class="article1">

         
     
           <section class="partieprofesseur">
                <div class="palcecherhprof">

                     <div class="tabletitre">
                        <table id="myTable">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Spécialite</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
      <?php                  
                         $sql = "SELECT nom_prof, id_prof, prenom_prof, specialite
                         FROM professeur
                         WHERE id_CP1 = $id_filiere_initial OR id_CP2 = $id_filiere_initial OR id_ID = $id_filiere_initial OR id_GC = $id_filiere_initial OR id_GI = $id_filiere_initial
                        ";
                   $result = mysqli_query($conn, $sql);  
                   if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo'
                              <tr>
                                 <form method="post" class="formmodule">
                                   <td>' . $row["id_prof"] . '</td>
                                   <td>' . $row["nom_prof"] . ' ' . $row["prenom_prof"] . '</td>
                                   <td>' . $row["specialite"] . '</td>
                                   <td class="lastth"><button class="btn-primary" type="submit" name="tableauprof"></button></td>
                                   <input type="hidden" name="idp" value="' . $row['id_prof'] . '">
                                 </form>
                              </tr>
                            ';  
                          }
                     }   
                     ?>                          
                           </tbody>
                        </table>
                     </div>
                </div>
                <div class="line11"></div>
                <div class="palceproftable">                    
                    <div class="container">
                        <div class="chespeprof">
                           <div class="input-group">
                              <select id="listsearch" class="form-control" style="width:40%">
                                 <option value="0">Select Filter</option>
                                 <option value="name">Name</option>
                                 <option value="id">ID</option>
                                 <option value="Specialite">Spécialite</option>
                              </select>
                              <input type="text" name="value" id="value" class="form-control" style="width:60%" placeholder="Enter Filter Value">
                              <span class="input-group-btn">
                              <button class="btn btn-close-white"><i class="glyphicon glyphicon-search"></i></button>
                              </span>
                           </div>
                        </div>
                     </div>
                

        <?php
                if (isset($_POST['tableauprof'])) {
                  $selected_prof_id = $_POST['idp'];
              
                   $sql = "SELECT nom_prof, id_prof, prenom_prof, specialite, email_prof, etat_prof
                           FROM professeur
                           WHERE id_prof = $selected_prof_id 
                          ";
                  $result = mysqli_query($conn, $sql);
              
                  if (mysqli_num_rows($result) > 0) {
                      echo'<div class="imgprof2"></div>
                           <div class="infte">
                               ';
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '
                            <ul>
                              <li><div class="colomn"><h2>Name       :</h2><p>' . $row["nom_prof"] . ' ' . $row["prenom_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>ID         :</h2><p>' . $row["id_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>Email      :</h2><p>' . $row["email_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>Spécialite :</h2><p>' . $row["specialite"] . '</p></div></li>
                              <li><div class="colomn"><h2>Etat       :</h2><p>' . $row["etat_prof"] . '</p></div></li>
                              </ul>
                          ';
                      }
                      echo'     
                           
                       </div>
                      ';
                    }
                    $result = mysqli_query($conn, $sql);
                }
          ?>
                </div>
            </section>
            

            <div class="line33"></div>
            <section class="partiemodule">
                <div class="palcemodule">
                    <div class="tableau">
                            <section>
                                <div class="tbl-header">
                                  <table>
                                    <thead>
                                      <tr>
                                        <th>Modules</th>
                                        <th>Classe</th>
                                        <th>Semester</th>
                                        <th>Ord/Ratt</th>
                                        <th>Pdf</th>
                                        <th>Conferme</th>
                                      </tr>
                                    </thead>
                                  </table>
                                </div>
                                <div class="tbl-content">
                                  <table>
                                    <tbody>
            <?php       
                      if (isset($_POST['tableauprof'])) {
                        $selected_prof_id = $_POST['idp'];
                        $sql = "SELECT m.nom_module, c.nom_classe ,n.type_note,n.address_pdf
                                FROM note n
                                JOIN module m ON m.id_module = n.id_module
                                JOIN classe c ON c.id_classe = n.id_classe
                                WHERE c.id_filiere = $id_filiere_initial AND n.id_prof = $selected_prof_id                   
                               ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo'        
                                        <tr class="tr2">
                                            <td>' . $row["nom_module"] . '</td>
                                            <td>' . $row["nom_classe"] . '</td>
                                            <td></p>S2</p></td>
                                            <td></p>' . $row["type_note"] . '</p></td>
                                            <td class="lastth"><a href="' . $row["address_pdf"] . '" download class="download-link"><i class="fa fa-download"></i></a></td>
                                            <td class="lastth"><button class="btn-primary"></button></td>
                                        </tr>
                                ';
                            }
                        }
                    }
            ?>
                                    </tbody>
                                  </table>
                                </div>
                              </section>
                        </div>
                </div>
            </section>
        </article>
    </aside>
    

    <script type="text/javascript">
        dTable=$('#myTable').DataTable({
               "bLengthChange": false, // this gives option for changing the number of records shown in the UI table
               "lengthMenu": [4], // 4 records will be shown in the table
               "columnDefs": [
               {"className": "dt-center", "targets": "_all"} //columnDefs for align text to center
             ],
               "dom":"lrtip" //to hide default searchbox but search feature is not disabled hence customised searchbox can be made.
        });
        
           $('#myCustomSearchBox').keyup(function(){  
             dTable.search($(this).val()).draw();   // this  is for customized searchbox with datatable search feature.
        })
        
     </script>
    
</body>
</html>



<!--
$sql = "SELECT m.nommodule, c.nomclasse 
                                FROM module m
                                JOIN classe_module cm ON cm.idmodule = m.idmodule
                                JOIN classe c ON c.idclasse = cm.idclasse
                                JOIN filiere_module fm ON fm.idmodule = m.idmodule
                                JOIN module_professeur mp ON mp.idmodule = m.idmodule   
                                WHERE fm.idfiliere = $id_filiere_initial AND mp.idprof = $selected_prof_id                       
                               ";                                


               <section class="partieprofesseur">
                <div class="palcecherhprof">
                     <div class="tabletitre" >
                        <table id="myTable">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Name</th>
                                 <th>Spécialite</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Mohamed </td>
                                 <td>Informatique</td>
                                 <td class="lastth"><button class="btn-primary"></button></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>

                </div>
                <div class="line11"></div>
                <div class="palceproftable">
                    
                    <div class="container">
                        <div class="chespeprof">
                           <div class="input-group">
                              <select id="listsearch" class="form-control" style="width:40%">
                                 <option value="0">Select Filter</option>
                                 <option value="name">Name</option>
                                 <option value="id">ID</option>
                                 <option value="Specialite">Spécialite</option>
                              </select>
                              <input type="text" name="value" id="value" class="form-control" style="width:60%" placeholder="Enter Filter Value">
                              <span class="input-group-btn">
                              <button class="btn btn-close-white"><i class="glyphicon glyphicon-search"></i></button>
                              </span>
                           </div>
                        </div>
                     </div>

                    <div class="imgprof2"></div>
                         <div class="infte">
                          <ul>
                            <li><div class="colomn"><h2>Name       :</h2><p>Mohamed ali</p></div></li>
                            <li><div class="colomn"><h2>ID         :</h2><p>M123456</p></div></li>
                            <li><div class="colomn"><h2>Email      :</h2><p>Mohamed.ali@gmail.com</p></div></li>
                            <li><div class="colomn"><h2>Spécialite :</h2><p>Informatique</p></div></li>
                            <li><div class="colomn"><h2>Etat       :</h2><p>Vacataire</p></div></li>
                          </ul>
                        </div>
                </div>
            </section>
-->