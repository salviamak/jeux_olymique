<?php  include  '../header.php';   ?>
<?php 
 
//ajouter equipe
 if(isset($_POST["v_equipe_add"])){
    
    $nom_equipe = htmlspecialchars($_POST["nom"]);
   
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
  
    //affiche tous les données

    $sql ="INSERT INTO equipe VALUES(NULL, :nom_equipe)";
    
    $st = $pdo->prepare($sql);
    $st->execute([
        "nom_equipe"=>$nom_equipe,
    ]);

        $admin = "v_equipe.php";
        header("location:".$admin);
 }
?>

<div class="container">
        <div class="row">

            <div class="col-md-6 m-auto">
            <h1 class="display-5">ajouter une equipe</h1>

            <form class="mt-4"  method="POST" action="v_equipe_add.php" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nom de l'equipe</label>
                    <input type="text" class="form-control"  aria-describedby="emailHelp" name="nom">            
                </div>
                
                
                <button type="submit" class="btn btn-primary" name="v_equipe_add">Ajouter</button>
                <a href="v_equipe.php" class="btn btn-danger">retour</a>
            </form>
            </div>
            
        </div>
</div>