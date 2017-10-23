<?php
    require_once 'includes/header.php';

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
                    <h3>Dodaj admina</h3>
                    <hr>
                    <p>Wypełnij pola.</p>

                    <?php  if ( isset($_SESSION['errors']) ): ?>
                    <div class="pannel panel-warning">
                        <?php foreach ($_SESSION['errors'] as $error):?>
                            <li><?= $error ?></li>
                        <?php endforeach ?>
                    </div>
                    <?php session::destroy('errors'); endif ?>

                    <?php  if ( isset($_SESSION['confirm']) ): ?>
                    <div class="pannel panel-success">
                        <li><?= $_SESSION['confirm'] ?></li>
                    </div>
                    <?php session::destroy('confirm'); endif ?>


                    <form action="process-new-admin.php" method="POST">
                        <div>
                            <label for="username">Login nowego admina</label>
                            <input type="text" name="username" id="username">
                        </div>

                        <div>
                            <label for="password">Hasło nowego admina</label>
                            <input type="password" name="password" id="password">
                        </div>

                        <div>
                            <label for="repassword">Powtórz hasło</label>
                            <input type="password" name="repassword" id="repassword">
                        </div>

                        <div class="activate">
                            <button type="submit" class="btn-1a">Zatwierdź</button>
                        </div>
                    </form>
                </div>
                <aside class="admin-menu">
                    <p>Połączono jako:  <?= strip_tags($_SESSION['admin_session']) ?></p>
                        <ul>
                          <li><a href="add-admin.php">Dodaj admina</a></li>
                          <li><a href="add-user.php">Dodaj członka</a></li>
                          <li><a href="list-users.php">Lista członków</a></li>
                          <li><a href="logout.php">Wyloguj</a></li>
                        </ul>
                        
                        <ul class="btns">
        								<li><a href="dashboard.php" class="btn-1a">Powrót do menu </a></li>
        							</ul>
                </aside>

                <div style="clear:both"> </div>
            </div>

        </main>
    </body>
</html>