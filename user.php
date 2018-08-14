<?php
session_start();
require_once 'database.php';

if(!isset($_SESSION['logged_id'])){

if (isset($_POST['login'])) {
    
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'pass');
    
    
    
    $userQuery = $db->prepare('SELECT id_hodowcy, haslo FROM uzytkownicy WHERE email = :login');
    $userQuery->bindValue(':login', $login, PDO::PARAM_STR);
    $userQuery->execute();
    
    
    
//    echo $userQuery->rowCount();
    
    $user = $userQuery->fetch();
    
//    echo $userQuery;
        if($user && password_verify($password, $user['haslo'])) {
            $_SESSION['logged_id'] = $user['id_hodowcy'];
            unset($_SESSION['bad_attempt']);
        } else {
            $_SESSION['bad_attempt'] = true;
            header('Location: index.php');
            exit();
        }
        
} else {
    
    header('Location: admin.php');
    exit();
}
}

echo 'bóg nie żyje' . "<br>";
echo '$2y$10$4sZdn0EaurMzGCAla1Up7OJ8vDmhJjKdsyCtQIAIuJ3AuxQ0m0Tly' ."<br>";
    echo hash('sha1', 'qwerty');
//print_r ($users);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel administracyjny</title>
    <meta name="description" content="Używanie PDO - odczyt z bazy MySQL">
    <meta name="keywords" content="php, kurs, PDO, połączenie, MySQL">
    <meta http-equiv="X-Ua-Compatible" content="IE=edge">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <header>
        <h1>Karta</h1>
    </header>

    <main>
        <article>

              <table>
                  <thead>
                      
                      <tr><th>kurnik</th><th>wylęgarnia</th><th>rasa</th><th>faktura</th></tr>
                  </thead>
                  <tbody>
                      
                        <tr>
                           <form method="post" action="dane.php">
                                <td><input type="text" name="kurnik"></td>
                                <td><input type="text" name="wylegarnia"></td>
                                <td><input type="text" name="rasa"></td>
                                <td><input type="text" name="faktura"></td>                                
                                <input type="submit" value="Zapisz dane">
                            </form>
                        </tr>
                        
                  </tbody>
              </table>
              <p><a href="logout.php">Wyloguj się!</a></p>
        </article>
    </main>

</div>

</body>
</html>