<?php
session_start();

if (!isset($_SESSION["id_prof"])) {
    header('Location: login.php');
    exit();
}
$id_professeur_initial = $_SESSION["id_prof"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/login/global.css">
    <link rel="stylesheet" href="/style/chefdepar/accueil.css">

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
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }   

            echo'
            <section class="sectionone">
                ';
                $sql = "SELECT nom_prof, prenom_prof
                FROM professeur 
                WHERE id_prof = $id_professeur_initial 
              ";
                $result = mysqli_query($conn, $sql);  
                if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo' 
                           <div class="Accueiltitle"><h2>Dr.' . $row["nom_prof"] . ' '. $row["prenom_prof"] .'</h2></div>
                        ';
                      }
                }

             echo'
                <div class="cadretime">
                    <div class="imgtime"></div>
                    <div class="timepalce" id="current_date"></div>
                </div>
            </section>
            <section class="sectiontwo">
                <div class="welcomeplace">
                    <div class="textewelcome">
                        <h3>Welcome to Ensah-Service</h3>
                        <p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx !</p>
                    </div>
                </div>
                ';

           echo'
                <div class="notf-date">
                    <div class="notifacationplace">
                        <p>Notifications</p>
                        <div class="linediv"></div>
                        <div class="notifactionfinal">

                ';
                $sql = "SELECT * FROM notification ORDER BY date_notification DESC LIMIT 4";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo'<ul class="ulnotf">';
                  while($row = mysqli_fetch_assoc($result)) {
                        echo'        
                                <li>
                                      <div class="palcenotification"><p>' . $row["message"] . '</p></div>
                                </li>
                                
                        ';

    }
}

                echo'      
                        </ul>      
                        </div>
                    </div>
                ';
?>
                    <div class="dateplace">
                        <p>Date</p>
                        <div class="linediv"></div>
                        <div class="Datefinal">
                        



                        </div>
                    </div>
                </div>

                <div class="taskespalce">
                    <div class="emploi">
                        <div class="iceon-name">
                          <p>Emploi</p>
                          <div class="imgEmploi"></div>
                        </div>
                        <div class="linediv1"></div>
                        <div class="final"><a href="/index/chefdepar/emploi.php"><p>more</p></a><h2>></h2></div>
                    </div>
                    <div class="profil">
                        <div class="iceon-name">
                          <p>Profil</p>
                          <div class="imgProfil"></div>
                        </div>
                        <div class="linediv1"></div>
                        <div class="final"><a href="/index/chefdepar/profil.php">more</a><h2>></h2></div>
                    </div>
                    <div class="module-note">
                        <div class="iceon-name">
                          <p>Modules/Notes</p>
                          <div class="imgModulenote"></div>
                        </div>
                        <div class="linediv1"></div>
                        <div class="final"><a href="/index/chefdepar/Modulenote.php">more</a><h2>></h2></div>
                    </div>
                    <div class="etud-absn">
                        <div class="iceon-name">
                          <p>Etudiant/Absence</p>
                          <div class="imgEtudinatAbsence"></div>
                        </div>
                        <div class="linediv1"></div>
                        <div class="final"><a href="/index/chefdepar/EtudinatAbsence.php">more</a><h2>></h2></div>
                    </div>
                </div>
              

      
                <div class="emploiplace">
                    <p>Emploi</p>
                    <div class="linediv"></div>
                    <div class="emploifactionfinal">
 
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
                    <?php include 'emploiprf2.php'; ?>  
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>                
            </section>
        </article>
    </aside>
    



    <script>
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        hour = date.getHours();
        min = date.getMinutes();
        var mois;
        switch(month){
    case 1:
        mois="Jan";
        break;
    case 2:
        mois="Feb";
        break;
    case 3:
        mois="Mar";
        break;
    case 4:
        mois="Apr";
        break;
    case 5:
        mois="May";
        break;
    case 6:
        mois="Jun";
        break;
    case 7:
        mois="Jul";
        break;
    case 8:
        mois="Aug";
        break;
    case 9:
        mois="Sep";
        break;
    case 10:
        mois="Oct";
        break;
    case 11:
        mois="Nov";
        break;
    case 12:
        mois="Dec";
        break;
    default:       
        mois="  ";
}
        document.getElementById("current_date").innerHTML = mois + " " + day + ", " + year + " "+hour+ ":" + min;


        </script>


</body>
</html>