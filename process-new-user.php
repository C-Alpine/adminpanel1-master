<?php


    require_once 'includes/header.php';

    require_once ROOT."../includes/classes/admin-class.php";

    $admins     = new Admins($dbh);

    if (isset($_POST)) 
    {
        $errors = array();

        foreach($_POST as $key => $value) 
        {
          if((empty($value) || trim($value) == '') && $key!='adres') {
            $errors[$key] = "Pole ".$key." nie może być puste";
          }
          $$key =  $value;
        }

        $description = $_POST['adres'];

        if (!empty($errors) || sizeof($errors) != 0) 
        {
            session::set('errors', $errors);
            $commons->redirectTo(SITE_PATH.'add-user.php');
        }
        if (!$admins->addNewCzlonek($fname, $lname, $sex, $bdate, $bplace, $sekcja, $adres, $imieo, $imiem, $tel, $telr, $mail, $pesel, $klasa, $wychowawca)) 
        {

            session::set('errors', ['Zjebałeś']);
            $commons->redirectTo(SITE_PATH.'add-user.php');

        }
        session::set('confirm', 'Członek orkiestry został dodany');
        $commons->redirectTo(SITE_PATH.'add-user.php');

    }