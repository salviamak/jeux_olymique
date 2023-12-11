<?php  include '../header.php';   ?>
<?php  include './nav.php';   ?>
<?php 
  
$pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

//affiche tous les données

$sql = "SELECT * FROM personnel JOIN equipe
ON personnel.id_equipe = equipe.id_equipe";

$st = $pdo->prepare($sql);
$st->execute();

//fetchall affichage de plusieurs lignes
$personnels = $st->fetchAll();
//var_dump($personnels);
?>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1 class="display-3">la liste du personnel</h1>
            <table class="table">
  <thead>
    <tr>
      
      <th scope="col">id personnel</th>
      <th scope="col">prenom</th>
      <th scope="col">nom</th>
      <th scope="col">sexe</th>
      <th scope="col">role</th>
      <th scope="col">nom de l'equipe</th>

      
    </tr>
  </thead>
  <tbody>
    
        <?php foreach($personnels as $personnel) {  ?>
            <tr>
      
      <td><?php echo $personnel["id_personnel"]?> </td>
      <td><?php echo $personnel["prenom"]?> </td>
      <td><?php echo $personnel["nom"]?> </td>
      <td><?php echo $personnel["sexe"]?> </td>
      <td><?php echo $personnel["role"]?> </td>
      <td><?php echo $personnel["nom_equipe"]?> </td>
      

      <td> <a href="traitementEquipe.php?modifier=<?php echo $personnel["id_personnel"]?>"> <i>modifier</i>  </a> /
      <a href="traitementEquipe.php?supprimer=<?php echo $personnel["id_personnel"]?>">supprimer</a></td>
      
      </tr>
      <?php }   ?>
    
    
  </tbody>
</table>
        </div>  
    </div>
</div>