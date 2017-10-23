<?php
	require_once 'includes/header.php';

	if (!isset($_SESSION['admin_session']) )
	{
		$commons->redirectTo(SITE_PATH.'index.php');
	}

	$czlonekId = isset($_GET['id']) && intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

	if ($czlonekId > 0) {
		require_once ROOT."../includes/classes/admin-class.php";

		$admins 	= new Admins($dbh);
		$czlonekDetails = $admins->getACzlonek($czlonekId);
	}
?>
<html>
	<head>
		<title>panellllllllllllllllllll</title>
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/css/CreativeButtons/css/component.css">
		<link rel="stylesheet" href="public/css/style.css">
	</head>

	<body>
		<main class="container">
			<div class="admin-pannel">
				<div class="dashboard">
					
				<?php if (isset($czlonekDetails) && sizeof($czlonekDetails) > 0) : $czlonek = $czlonekDetails[0]; ?>
					<h1>Edit: <?= htmlentities(strip_tags($czlonek->imie))," ", htmlentities(strip_tags($czlonek->nazwisko)) ?></h1>
					<hr>
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


					<form action="process-edited-user.php" method="POST">
						<div>
							<label for="fname">Imię</label>
							<input type="text" name="fname" id="fname" value="<?= isset($czlonek->imie) ? htmlspecialchars(strip_tags($czlonek->imie)) : '' ?>">
							<input type="hidden" name="id" value="<?= isset($czlonek->id) ? htmlspecialchars(strip_tags($czlonek->id)) : '' ?>">
						</div>

						<div>
							<label for="lname">Nazwisko</label>
							<input type="text" name="lname" id="lname" value="<?= isset($czlonek->nazwisko) ? htmlspecialchars(strip_tags($czlonek->nazwisko)) : '' ?>">
						</div>

						<div>
							<label for="sex">Płeć</label>
							<input type="radio" name="sex" id="sex" value="M" checked>Mężczyzna</br>
							<input type="radio" name="sex" id="sex" value="K">Kobieta</br>
						</div>
						<div>
							<label for="bdate">Data urodzenia:</label>
							<input type="date" name="bdate" id="bdate" min="1979-01-01" max="2005-01-01" value="<?= isset($czlonek->bdate) ? htmlspecialchars(strip_tags($czlonek->bdate)) : '' ?>">
						</div>
						<div>
							<label for="bplace">Miejsce urodzenia:</label>
							<input type="text" name="bplace" id="bplace" value="<?= isset($czlonek->bplace) ? htmlspecialchars(strip_tags($czlonek->bplace)) : '' ?>">
						</div>
						<div>
							<label for="sekcja">Nazwa sekcji:</label>
							<input type="text" name="sekcja" id="sekcja" value="<?= isset($czlonek->sekcja) ? htmlspecialchars(strip_tags($czlonek->sekcja)) : '' ?>">
						</div>
						<div>      
							<label for="adres">Adres</label>
							<textarea name="adres" id="adres" cols="30" rows="10" value="<?= isset($czlonek->adres) ? htmlspecialchars(strip_tags($czlonek->adres)) : '' ?>"></textarea>
						</div>      
						<div>
							<label for="imieo">Imię ojca:</label>
							<input type="text" name="imieo" id="imieo" value="<?= isset($czlonek->imieo) ? htmlspecialchars(strip_tags($czlonek->imieo)) : '' ?>">
						</div>
						<div>
							<label for="imiem">Imię matki:</label>
							<input type="text" name="imiem" id="imiem" value="<?= isset($czlonek->imiem) ? htmlspecialchars(strip_tags($czlonek->imiem)) : '' ?>">
						</div>
						<div>
							<label for="tel">Telefon: +48</label>
							<input type="number" name="tel" id="tel" min="111111111" max="999999999" value="<?= isset($czlonek->tel) ? htmlspecialchars(strip_tags($czlonek->tel)) : '' ?>">
						</div>
						<div>
							<label for="telr">Telefon rodzica: +48</label>
							<input type="number" name="telr" id="telr" min="111111111" max="999999999" value="<?= isset($czlonek->telr) ? htmlspecialchars(strip_tags($czlonek->telr)) : '' ?>">
						</div>
						<div>
							<label for="mail">Email:</label>
							<input type="email" name="mail" id="mail" value="<?= isset($czlonek->mail) ? htmlspecialchars(strip_tags($czlonek->mail)) : '' ?>">
						</div>
						<div>
							<label for="pesel">PESEL:</label>
							<input type="number" name="pesel" id="pesel" min="1111111" max="99999999999" value="<?= isset($czlonek->pesel) ? htmlspecialchars(strip_tags($czlonek->pesel)) : '' ?>">
						</div>
						<div>
							<label for="klasa">Klasa:</label>
							<input type="text" name="klasa" id="klasa" value="<?= isset($czlonek->klasa) ? htmlspecialchars(strip_tags($czlonek->klasa)) : '' ?>">
						</div>
						<div>
							<label for="wychowawca">Wychowawca:</label>
							<input type="text" name="wychowawca" id="wychowawca" value="<?= isset($czlonek->wychowawca) ? htmlspecialchars(strip_tags($czlonek->wychowawca)) : '' ?>">
						</div>

			
						<div class="activate">
							<button type="submit" class="btn-1a">Zatwierdź</button>
						</div>
					</form>
						<br>
						<hr>
						<br>
					<ul class="btns">
						<li><a href="view-user-details.php?id=<?= $czlonek->id ?>" class="btn-1a">&laquo; Return </a></li>
						<li><a href="delete-user.php?id=<?= $czlonek->id ?>" class="btn-1a"  onclick="return confirm('Czy na pewno chcesz go usunąć?');">Usuń</a></li>

					</ul>

				<?php else: ?>
				<h3>nikogo nie wybrano</h3>
				<?php endif ?>
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
