<?php
require('config.php');
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}


if(isset($REQUEST['tasks'])){
    $task = stripslashes($_REQUEST['username']);
    $query = "INSERT into `task` (taches, id_user)
              VALUES ('$task', )";


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
        <input type="text" id="myInput" name="tasks" placeholder="Nouvelle tache ?">
        <button onclick="newElement()" class="addBtn">Ajouter une tache</button>

    </div>


    <ul id="myUL">

    </ul>

    <div class="taskFoot">

        <button> <a href="indexx.php">Tout éffacer</a></button>

    </div>

</div>

<script type="text/javascript" src="js.js"></script>





