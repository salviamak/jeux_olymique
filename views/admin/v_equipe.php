<?php  include '../header.php';   ?>
<?php  include './nav.php';   ?>
<?php 
  
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

?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="display-3">la liste des equipes</h1>
            <a href="v_equipe_add.php" class="btn btn-primary">Ajouter une équipe</a>
            <table class="table">
  <thead>
    <tr>
      
      <th scope="col">id equipe</th>
      <th scope="col">nom de l'equipe</th>
      <th scope="col">Action</th>

      
    </tr>
  </thead>
  <tbody>
    
        <?php foreach($equipes as $equipe) {  ?>
            <tr>
      
      <td><?php echo $equipe["id_equipe"]?> </td>
      
     
      <td><?php echo $equipe["nom_equipe"]?></td>
      <td> <a href="traitementEquipe.php?modifier=<?php echo $equipe["id_equipe"]?>"> <i>modifier</i>  </a> /
      <a href="traitementEquipe.php?supprimer=<?php echo $equipe["id_equipe"]?>">supprimer</a></td>
      
      </tr>
      <?php }   ?>
    
    
  </tbody>
</table>
        </div>  
    </div>
</div>