

<?php  include 'header.php';   ?>
<?php  include 'nav.php';   ?>

<?php  
$pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//affiche tous les données
// $sql = "SELECT * FROM rencontre";




$sql = "SELECT * FROM rencontre JOIN resultat_match
ON rencontre.id_rencontre = resultat_match.id_rencontre 
WHERE rencontre.date_rencontre LIKE '%2023%'";

$st = $pdo->prepare($sql);
$st->execute();
$resultats = $st->fetchAll();
//var_dump($resultats);
//fetchall affichage de plusieurs lignes


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

<h1 class="display-5 text-center mb-2 text-info text-uppercase">
    les matches passés
</h1>
<a class="btn btn-success mb-2" href="../">les matches à venir</a>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">type de discipline</th>
      <th scope="col">equipe 1</th>
      <th scope="col">score 1</th>
      <th scope="col">-</th>
      <th scope="col">score 2</th>
      <th scope="col">equipe 2</th>
      <th scope="col">lieu</th>
      <th scope="col">Date de rencontre</th>
    </tr>
  </thead>
  <tbody>
    
        <?php foreach($resultats as $resultat) {  ?>
            <tr>
      <td> <?php echo $resultat["type"] ?>  </td>
      <td><?php echo AfficherEquipe($resultat["id_equipe_a"])?></td>
      <td><?php echo $resultat["score_equipe_a"]?></td>
      <td>-</td>
      <td><?php echo $resultat["score_equipe_b"]?></td>
      <td><?php echo AfficherEquipe($resultat["id_equipe_b"]) ?></td>
      <td><?php echo $resultat["lieu"]?></td>
      <td><?php echo $resultat["date_rencontre"]?></td>
      </tr>
      <?php }   ?>
    
    
  </tbody>
</table>

<?php  include 'footer.php';   ?>