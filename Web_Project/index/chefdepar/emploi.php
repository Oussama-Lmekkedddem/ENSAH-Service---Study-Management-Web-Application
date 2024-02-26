<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/chefdepar/emploi.css">

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
            <p>Emploi du temps</p>
            <div class="tableemploi">
                 <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="schedule-table">
                    <table class="table bg-white">
                    <thead>
                    <tr>
                    <th>Emploi</th>
                    <th>08-10 am</th>
                    <th>10-12 am</th>
                    <th>02-04 pm</th>
                    <th class="last">04-06 pm</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php

session_start();
$id_initial_prof = $_SESSION["id_prof"];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ensahservice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM emploi
        WHERE id_prof = $id_initial_prof";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
for($i=0; $i<6; $i++){
    echo'<tr>';
    echo'<td class="day">'. $jours[$i] .'</td>';

    $j = 0;
   while ($j <4)  {
       $k= $j+4*$i+1;
       $valeur = $row['valeur_' . $k];
       if($valeur!=NULL){
        if($valeur == $row['valeur_' . $k+1] && ($j==0 || $j==2)){
         if($valeur == $row['valeur_' . $k+1] && ($j==0)){
            $sql = "SELECT nom_module,type_module FROM module
                    WHERE id_module = '$valeur'";
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
                while ($mod = $result->fetch_assoc()) {
                   $nom_module = $mod["nom_module"];
                   $type_module = $mod["type_module"];
                }
             }
             echo'<td class="active" colspan="2">
                 <h4>'.$nom_module.'</h4>
                 <p>'.$type_module.'</p>
                 <div class="hover">
                     <h4>'.$nom_module.'</h4>
                     <p>'.$type_module.'</p>
                 </div>
              </td>';
         }
         if($valeur == $row['valeur_' . $k+1] && ($j==2)){
            $sql = "SELECT nom_module,type_module FROM module
                    WHERE id_module = '$valeur'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while ($mod = $result->fetch_assoc()) {
                  $nom_module = $mod["nom_module"];
                  $type_module = $mod["type_module"];
              }
            }
            echo'<td class="active" colspan="2">
                <h4>'.$nom_module.'</h4>
                <p>'.$type_module.'</p>
                <div class="hover">
                    <h4>'.$nom_module.'</h4>
                    <p>'.$type_module.'</p>
                </div>
            </td>';
         }
         $j++;
        }
         else{

       
       $sql = "SELECT nom_module,type_module FROM module
        WHERE id_module = '$valeur'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($mod = $result->fetch_assoc()) {
                $nom_module = $mod["nom_module"];
                $type_module = $mod["type_module"];
            }
        }
        echo'<td class="active">
                <h4>'.$nom_module.'</h4>
                <p>'.$type_module.'</p>
                <div class="hover">
                    <h4>'.$nom_module.'</h4>
                    <p>'.$type_module.'</p>
                </div>
             </td>';
       }
    }
       else{
        echo'<td></td>';
       }

       $j++;
   }
   echo'</tr>'; 
 }
} else {
    $jours = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    foreach ($jours as $jour) {
        echo '<tr>';
        echo '<td class="day">' . $jour . '</td>';
        for ($i = 0; $i < 4; $i++) {
            echo '<td></td>';
        }
        echo '</tr>';
    }
    
}
?>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
            </div>

            <div class="emploi">
                <p>Télécharger votre emploi du temps</p>
                <div class="notestud" ><a href="chemin/vers/exemple.xlsx" download class="download-link">Télécharger</a></div>
            </div>

        </article>
    
    

    </aside>
</body>
</html>