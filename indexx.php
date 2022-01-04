<?php
require('config.php');
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

//Connexion BDD + selection de toutes les taches deja relié aux users pour les afficher a la connexion

    $dbh = new PDO('mysql:host=localhost;dbname=task', 'root', 'bonjour');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tasks = $dbh->query('SELECT * FROM task');


//A FAIRE : inserer nouvelle tache dans BDD

if(isset($REQUEST['tasks'])){
    $task = stripslashes($_REQUEST['username']);
    $task = mysqli_real_escape_string($conn, $task);
    $query = "INSERT into `task` (taches)
              VALUES ('$task')";
    $res = mysqli_query($conn, $query);
    if($res){
        echo "test";
    }
}



//fontion pour tout supprimer
function deleteAll(){
    $dbh = new PDO('mysql:host=localhost;dbname=task', 'root', 'bonjour');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $delete = $dbh->query('DELETE * FROM `task`');
}


?>
<link rel="stylesheet" href="style.css">

<div class="head">
<div class="hello">
<h1>Bienvenue sur Proméo Task <?php echo $_SESSION['username']; ?> !</h1>
</div>
<div class="deco">
    <button> <a href="logout.php">Déconnexion</a> </button>


</div>

</div>

<div class="task">



    <div class="taskCont">
        <div class="TaskHeader">
            <h2><img src="log.svg" alt=""></h2>

        </div>

    </div>

    <div id="myDIV" class="header">
       <form method="post">
            <input type="text" id="myInput" name="tasks" placeholder="Nouvelle tache ?">
            <button onclick="newElement()" id="buttonSub" type="submit" class="addBtn">Ajouter une tache</button>
       </form>
    </div>


    <ul id="myUL">
        <?php foreach ($tasks as $task): ?>
        <li><?= $task['taches']?></li>
        <?php endforeach; ?>
    </ul>



    <div class="taskFoot">
        <!-- boutton qui supprime toutes les taches (utilisation de Ajax a Faire)    -->
        <button onclick="deleteAll()">Tout éffacer</button>

    </div>

</div>

<script type="text/javascript" src="js.js"></script>





