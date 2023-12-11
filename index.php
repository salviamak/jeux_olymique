

<?php  include 'views/header.php';   ?>
<?php  include 'views/nav.php';   ?>

<?php  
$pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//affiche tous les données

$sql = "SELECT * FROM rencontre WHERE date_rencontre LIKE '%2024%'";

$st = $pdo->prepare($sql);
$st->execute();

//fetchall affichage de plusieurs lignes
$rencontres = $st->fetchAll();

//var_dump($rencontres);

//affiche equipe par son id

function AfficherEquipe($id){
    if(gettype($id) == "string"){ $id = intval($id);}
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    //affiche tous les données
    $sql = "SELECT * FROM equipe WHERE id_equipe = :id";
    $st = $pdo->prepare($sql);
    $st->execute(["id"=>$id]);

    $equipe = $st->fetch();

    //affiche equipe nom
    echo $equipe["nom_equipe"];
    //var_dump($equipe);
}


?>
<a href="views/test.php" class="btn btn-outline-danger">login</a>
<h1 class="display-5 text-center mb-2 text-info text-uppercase">
    les rencontres futures
</h1>
<a href="./views/resultats.php" class="btn btn-success mb-2">les anciennes rencontres</a>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">type de discipline</th>
      <th scope="col">equipe 1</th>
      <th scope="col">vs</th>
      <th scope="col">equipe 2</th>
      <th scope="col">Lieu</th>
      <th scope="col">Date de rencontre</th>
    </tr>
  </thead>
  <tbody>
    
        <?php foreach($rencontres as $rencontre) {  ?>
            <tr>
      
      <td><?php echo $rencontre["type"]?> </td>
      <td><?php echo AfficherEquipe($rencontre["id_equipe_a"])?></td>
      <td>-</td>
      <td><?php echo AfficherEquipe($rencontre["id_equipe_b"]) ?></td>
      <td><?php echo $rencontre["lieu"]?></td>
      <td><?php echo $rencontre["date_rencontre"]?></td>
      </tr>
      <?php }   ?>
    
    
  </tbody>
</table>





<?php  include 'views/footer.php';   ?>