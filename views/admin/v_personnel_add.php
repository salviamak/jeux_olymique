<?php  include  '../header.php';   ?>
<?php 
 
//ajouter equipe
 if(isset($_POST["v_personnel_add"])){
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);    
    $sexe = htmlspecialchars($_POST["sexe"]);    
    $role = htmlspecialchars($_POST["role"]);    
    $id_equipe = htmlspecialchars($_POST["equipe"]);
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
  
    //affiche tous les données

    $sql ="INSERT INTO personnel VALUES(NULL, :prenom, :nom, :sexe, :role,:id_equipe)";
    
    $st = $pdo->prepare($sql);
    $st->execute([
        "prenom"=>$prenom,
        "nom"=>$nom,
        "sexe"=>$sexe,
        "role"=>$role,
        "id_equipe"=>$id_equipe
    ]);

        $admin = "v_personnel.php";
        header("location:".$admin);
  
 }

$pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//affiche tous les données

$sql = "SELECT * FROM equipe";

$st = $pdo->prepare($sql);
$st->execute();

//fetchall affichage de plusieurs lignes
$equipes = $st->fetchAll();
//var_dump($equipes)
?>

<div class="container">
        <div class="row">

            <div class="col-md-6 m-auto">
            <h1 class="display-5">ajouter personnel</h1>

            <form class="mt-4"  method="POST" action="v_personnel_add.php" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nom</label>
                    <input type="text" class="form-control"  aria-describedby="emailHelp" name="nom">            
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">prénom</label>
                    <input type="text" class="form-control" name="prenom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">role</label>
                    <input type="text" class="form-control" name="role">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">sexe</label>
                    <input type="text" class="form-control" name="sexe">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">équipes</label>
                <select class="form-select mt-2" aria-label="Default select example" name="equipe">
                    <?php foreach($equipes as $equipe) {  ?>
                    <option value="<?php echo $equipe["id_equipe"]?>"><?php echo $equipe["nom_equipe"]?></option>
                    <?php } ?>
                </select>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary" name="v_personnel_add">Ajouter</button>
                <a href="v_personnel.php" class="btn btn-danger">retour</a>
            </form>
            </div>
            
        </div>
</div>