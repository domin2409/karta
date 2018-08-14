<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Newsletter - zapisz się!</title>
    <meta name="description" content="Używanie PDO - zapis do bazy MySQL">
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
            <h1>Zaloguj się</h1>
        </header>

        <main>
            <article>
                <form method="post" action="user.php">
                    <label>Login <input type="text" name="login"></label>
                    <label>Hasło <input type="password" name="pass"></label>
                    <input type="submit" value="Zaloguj się!">
                    
                    <?php
                    if (isset($_SESSION['bad_attempt'])) {
                        echo '<p>Niepoprawny login lub hasło! </p>';
                        unset($_SESSION['bad_attempt']);
                    }
                    ?>
                    
                    
                </form>
            </article>
        </main>

    </div>
</body>
</html>