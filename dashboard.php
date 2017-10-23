<?php
    require_once 'includes/header.php';
    require 'vendor/autoload.php';
    if (!isset($_SESSION['admin_session']) )
    {
        session::destroy('admin_session');
        $commons->redirectTo(SITE_PATH.'index.php');
    }
?>
<html>
    <head>
        <title>Panel admina</title>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/CreativeButtons/css/component.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body>
        <main class="container">
            <div class="admin-pannel">

                <div class="dashboard">
                    <p><strong>No nieźle</strong></p>
                    <p>Tu zrobisz kurwa... wszystko</p>
                </div>
                <aside class="admin-menu">
                    <p>Połączono jako:  <?= strip_tags($_SESSION['admin_session']) ?></p>
                        <ul>
                          <li><a href="dashboard.php">Dashboard</a></li>
                          <li><a href="add-admin.php">Dodaj admina</a></li>
                          <li><a href="add-user.php">Dodaj członka</a></li>
                          <li><a href="list-users.php">Lista członków</a></li>
                            <li><a href="send-mail.php">Wyślij wiadomość orkiestrantom!</a></li>
                          <li><a href="logout.php">Wyloguj</a></li>
                        </ul>
                </aside>

                <div style="clear:both"> </div>
            </div>

            <footer>
                <?= date("Y") ?> © sram wam do ryja - <a href="">mati moraski</a>
            </footer>
        </main>
    </body>
</html>