<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ensahservice";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);


    $sql = "SELECT email_prof, modepass_prof, etat_prof, id_prof
            FROM professeur 
            WHERE email_prof = '$email' AND modepass_prof = '$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $variable_sql = $row["etat_prof"];

        
        if ($variable_sql == 'Professeur' || $variable_sql == 'Vacataire') {
            $_SESSION["id_prof"] = $row["id_prof"];
            header("Location: /index/prof/accueil.php");
            
            exit;
        } elseif ($variable_sql == 'Chefdepart') {
            $_SESSION["id_prof"] = $row["id_prof"];
            header("Location: /index/chefdepar/accueil.php");
            exit;
        } elseif ($variable_sql == 'Respfiliere') {
            $_SESSION["id_prof"] = $row["id_prof"];
            header("Location: /index/respfiliere/accueil.php");
            exit;
        } else {
            header("Location: page_par_defaut.php");
            exit;
        }
    } else {
        $error_msg = "Identifiants invalides. Veuillez réessayer.";
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
    <link rel="stylesheet" href="/style/login/login.css">
    <title>ENSAH</title>
</head>

<body>

<div class="animated bounceInDown">
    <div class="container">
        <?php if(isset($error_msg)) echo '<span class="error animated tada" id="msg">'.$error_msg.'</span>'; ?>
        <form name="form1" class="box" method="POST" onsubmit="return checkStuff()">
            <div class="img"></div>
            <h4>ENSA<span>H</span></h4>
            <input type="text" name="email" placeholder="Email" autocomplete="off">
            <i class="typcn typcn-eye" id="eye"></i>
            <input type="password" name="password" placeholder="Password" id="pwd" autocomplete="off">
            <label>
                <input type="checkbox">
                <span></span>
                <small class="rmb">Remember me</small>
            </label>
            <a href="#" class="forgetpass">Forget Password?</a>
            <input type="submit" value="Sign in" class="btn1">
        </form>
    </div>
</div>


    <script>
        var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');

eye.addEventListener('click',togglePass);

function togglePass(){

   eye.classList.toggle('active');

   (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
}

// Form Validation

function checkStuff() {
  var email = document.form1.email;
  var password = document.form1.password;
  var msg = document.getElementById('msg');
  
  if (email.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Please enter your email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
  
   if (password.value == "") {
    msg.innerHTML = "Please enter your password";
    password.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(email.value)) {
    msg.innerHTML = "Please enter a valid email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
}


particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 60,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.1,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 6,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.1,
      "width": 2
    },
    "move": {
      "enable": true,
      "speed": 1.5,
      "direction": "top",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
    </script>
    
</body>

</html>
