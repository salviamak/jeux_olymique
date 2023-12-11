
<?php  
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=jeux_olympique", "root", "", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    $sql = "SELECT * FROM admin";
    $st = $pdo->prepare($sql);
    $st->execute();
    $admin = $st->fetch();


if(isset($_POST["user"]) && isset($_POST["password"])){
    $user = htmlspecialchars($_POST["user"]);
    $password = htmlspecialchars($_POST["password"]);

    if($user == $admin["login"] && $password == $admin["mdp"]){
        echo "connecter";
        $admin = "admin.php";
        header("location:".$admin);
    }
    else {
        
        $error = "errorLogin.php";
        header("location:".$error);
    }

}
?>