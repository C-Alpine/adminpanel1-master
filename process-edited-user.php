<?php
	require_once 'includes/header.php';


	require_once ROOT."../includes/classes/admin-class.php";

	$admins 	= new Admins($dbh);


	if (isset($_POST)) 
	{
		$errors = array();

		foreach($_POST as $key => $value) 
		{
		  if((empty($value) || trim($value) == '') && $key!='description') {
		    $errors[$key] = "Pole ".$key." nie może być puste.";
		  }
		  $$key =  $value;
		}
		
		$description = $_POST['description'];

		if (!empty($errors) || sizeof($errors) != 0) 
		{
			session::set('errors', $errors);
			$commons->redirectTo(SITE_PATH.'edit-user.php?id='.$id);
		}

		if (!$admins->updateCzlonek($id, $fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca)) 
		{
			
			session::set('errors', ['Wystąpił błąd w trakcie edycji danych.']);
			$commons->redirectTo(SITE_PATH.'edit-user.php?id='.$id);

		}

		session::set('confirm', 'Dane zostały edytowane pomyślnie!');
		$commons->redirectTo(SITE_PATH.'edit-user.php?id='.$id);

	}

