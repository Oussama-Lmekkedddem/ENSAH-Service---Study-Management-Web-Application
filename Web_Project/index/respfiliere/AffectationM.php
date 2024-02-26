
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
  $_SESSION["selected_filiere_id"] = $id_filiere_initial;


  $sql = "SELECT nom_prof, id_prof, prenom_prof, specialite
          FROM professeur
          WHERE id_CP1 = $id_filiere_initial OR id_CP2 = $id_filiere_initial OR id_ID = $id_filiere_initial OR id_GC = $id_filiere_initial OR id_GI = $id_filiere_initial
         ";
  $result = mysqli_query($conn, $sql);  


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

    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/respfiliere/AffectationM.css">
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
              
                  $sql = "SELECT nom_prof, id_prof, prenom_prof, specialite, email_prof, etat_prof, SUBSTR(nom_prof, 1, 1) AS premier_caractere
                          FROM professeur
                          WHERE id_prof = $selected_prof_id";
                  $result1 = mysqli_query($conn, $sql);
              
                  if (mysqli_num_rows($result1) > 0) {
                      echo'<div class="imgprof2"></div>
                           <div class="infte">
                               ';
                      while ($row = mysqli_fetch_assoc($result1)) {
                          echo '
                            <ul>
                              <li><div class="colomn"><h2>Name       :</h2><p>' . $row["nom_prof"] . ' ' . $row["prenom_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>ID         :</h2><p>' . $row["id_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>Email      :</h2><p>' . $row["email_prof"] . '</p></div></li>
                              <li><div class="colomn"><h2>Spécialite :</h2><p>' . $row["specialite"] . '</p></div></li>
                              <li><div class="colomn"><h2>Etat       :</h2><p>' . $row["etat_prof"] . '</p></div></li>
                              </ul>
                          ';
                          $_SESSION["selected_prof_id"] = $row['id_prof'];
                      }
                      echo'     
                           
                       </div>
                       <div class="dragdropplace">
                      ';
                    }
                    


                    $result2 = mysqli_query($conn, $sql);
              
                  if (mysqli_num_rows($result2) > 0) {
                      while ($row = mysqli_fetch_assoc($result2)) {
                        for($i=0;$i<5;$i++){
                           echo ' 
                              <div class="drag-item" draggable="true" id="' . $row['id_prof'] . '" ><p>' . $row["premier_caractere"] . '.' . $row["prenom_prof"] . '</p></div>
                              '; 
                        }
                      }                      
                      echo' 
                            </div>
                      '; 
                  }
                }
                
?>
                </div>
            </section>
            <section class="partiem">
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">ID
                    </th>
                    <th class="th-sm">Nom
                    </th>
                    <th class="th-sm">Genre
                    </th>
                    <th class="th-sm">Specialite
                    </th>
                    <th class="th-sm">Professeur
                    </th>
                  </tr>
                </thead>
                <tbody>
                 
<?php
            $sql = "SELECT id_module, nom_module, type_module, Specialite
                    FROM module
                    WHERE id_CP1 = $id_filiere_initial OR id_CP2 = $id_filiere_initial OR id_ID = $id_filiere_initial OR id_GC = $id_filiere_initial OR id_GI = $id_filiere_initial
             ";
                   $result3 = mysqli_query($conn, $sql);  
                   if (mysqli_num_rows($result3) > 0) {
                    $i=0;
                    while ($row = mysqli_fetch_assoc($result3)) {
                      $i++;
                      echo'
                            <tr>
                            <td>' . $row["id_module"] . '</td>
                            <td>' . $row["nom_module"] . '</td>
                            <td>' . $row["type_module"] . '</td>
                            <td>' . $row["Specialite"] . '</td>
                            <td id="dropzone' . $i . '" class="dropzone" data-value="' . $row["id_module"] . '"></td>       
                            </tr>
                          ';  
                        }
                   } 
?> 
              </tbody>
             </table>
          </section>    

          <div class="buttvalide"><button class="buttinsert" onclick="insertValues()">INSERT</button></div>  
        </article>      
    </aside>

    
  <script>
    var dropzones = document.querySelectorAll('.dropzone');
    var boxes = document.querySelectorAll('[draggable="true"]');
    var values = {};

    dropzones.forEach(function(dropzone) {
  dropzone.addEventListener('dragover', function(event) {
    event.preventDefault();
  });

  dropzone.addEventListener('drop', function(event) {
    event.preventDefault();
    var box = document.getElementById(event.dataTransfer.getData('text/plain'));
    dropzone.appendChild(box);
    var value = dropzone.getAttribute('data-value');
    if (values[dropzone.id]) {
      values[dropzone.id].push(value);
    } else {
      values[dropzone.id] = [value];
    }
  });
});





    boxes.forEach(function(box) {
      box.addEventListener('dragstart', function(event) {
        event.dataTransfer.setData('text/plain', this.id);
      });
    });

    function insertValues() {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'insert.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          console.log('Values inserted successfully');
        }
      };
      xhr.send('values=' + encodeURIComponent(JSON.stringify(values)));
    }
   </script>


  
  

  
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

   function allowDrop(event) {
			event.preventDefault();
		}

		function drag(event) {
			event.dataTransfer.setData("text", event.target.id);
		}

		function drop(event) {
			event.preventDefault();
			var data = event.dataTransfer.getData("text");
			var target = event.target;
			while (target.tagName !== "TD") {
				target = target.parentNode;
			}
			target.innerHTML = document.getElementById(data).innerHTML;
		}

</script>

</body>
</html>