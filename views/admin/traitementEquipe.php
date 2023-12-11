<?php  include '../header.php';   ?>

<?php

if(isset($_GET["supprimer"])) {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // DELETE FROM table_name WHERE condition;
    $sql = "DELETE FROM equipe WHERE id_equipe= :id";
    $sta = $pdo->prepare($sql);
    $sta->execute(["id"=>$_GET["supprimer"]]);

    $page = "v_equipe.php";
    header("location:".$page);
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">


        <?php }  elseif(isset($_GET["modifier"])){ ?>

            <p>modifier</p>

        <?php  } ?>

    
        </div>
    </div>
</div>


