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
        <title>panel admina</title>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/CreativeButtons/css/component.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>

    <body>
        <main class="container">
            <div class="admin-pannel">
                <div class="dashboard">
                    <h3>dodaj czlonka</h3>
                    <hr>
                    <p>wypelnij to prosze</p>

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


                    <form action="process-new-user.php" method="POST">
                      <div>
                        <label for="fname">Imię</label>
                        <input type="text" name="fname" id="fname">
                      </div>

                      <div>
                        <label for="lname">Nazwisko</label>
                        <input type="text" name="lname" id="lname">
                      </div>

                      <div>
                        <label for="sex">Płeć</label>
                        <input type="radio" name="sex" id="sex" value="M" checked>Mężczyzna</br>
                        <input type="radio" name="sex" id="sex" value="K">Kobieta</br>
                      </div>
                      <div>
                        <label for="bdate">Data urodzenia:</label>
                        <input type="date" name="bdate" id="bdate" min="1979-01-01" max="2005-01-01">
                      </div>
                      <div>
                        <label for="bplace">Miejsce urodzenia:</label>
                        <input type="text" name="bplace" id="bplace">
                      </div>
                      <div>
                        <label for="sekcja">Nazwa sekcji:</label>
                        <input type="text" name="sekcja" id="sekcja">
                      </div>
                      <div>      
                        <label for="adres">Adres</label>
                        <textarea name="adres" id="adres" cols="30" rows="10"></textarea>
                      </div>      
                      <div>
                        <label for="imieo">Imię ojca:</label>
                        <input type="text" name="imieo" id="imieo">
                      </div>
                      <div>
                        <label for="imiem">Imię matki:</label>
                        <input type="text" name="imiem" id="imiem">
                      </div>
                      <div>
                        <label for="tel">Telefon: +48</label>
                        <input type="number" name="tel" id="tel" min="111111111" max="999999999">
                      </div>
                      <div>
                        <label for="telr">Telefon rodzica: +48</label>
                        <input type="number" name="telr" id="telr" min="111111111" max="999999999">
                      </div>
                      <div>
                        <label for="mail">Email:</label>
                        <input type="email" name="mail" id="mail">
                      </div>
                      <div>
                        <label for="pesel">PESEL:</label>
                        <input type="number" name="pesel" id="pesel" min="1111111" max="99999999999">
                      </div>
                      <div>
                        <label for="klasa">Klasa:</label>
                        <input type="text" name="klasa" id="klasa">
                      </div>
                      <div>
                        <label for="wychowawca">Wychowawca:</label>
                        <input type="text" name="wychowawca" id="wychowawca">
                      </div>
                        
                        
                        
                        <div class="activate">
                            <button type="submit" class="btn-1a">Zatwierdź</button>
                        </div>
                    </form>
                </div>
                <aside class="admin-menu">
                    <p>Połączono jako:  <?= strip_tags($_SESSION['admin_session']) ?></p>
                        <ul>
                          <li><a href="dashboard.php">Dashboard</a></li>
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