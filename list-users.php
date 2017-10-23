<?php
	require_once 'includes/header.php';
	if (!isset($_SESSION['admin_session']) )
	{
		$commons->redirectTo(SITE_PATH.'index.php');
	}
	require_once ROOT."../includes/classes/admin-class.php";
	$numberOfCzlonkowieToFetch = 25;
	
	$admins 	= new Admins($dbh);
	$czlonkowie = $admins->fetchCzlonek($numberOfCzlonkowieToFetch);
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
					<h3>Lista członków</h3>
					<hr>
				<?php if (isset($czlonkowie) && sizeof($czlonkowie) > 0) :?>
					<?php foreach ($czlonkowie as $czlonek) :?>
						<li><a href="view-user-details.php?id=<?= $czlonek->id ?>" title="Click to view user"><?= htmlspecialchars(strip_tags($czlonek->imie))," ", htmlspecialchars(strip_tags($czlonek->nazwisko))?></a></li>
					<?php endforeach ?>
				<?php else: ?>
				<h3>nie ma nikogo w bazie danych</h3>
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