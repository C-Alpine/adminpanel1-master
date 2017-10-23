<?php


    require_once 'includes/header.php';


    require_once ROOT."../includes/classes/admin-class.php";

    $admins     = new Admins($dbh);

    if (isset($_POST)) 
    {
        $errors = array();

        foreach($_POST as $key => $value) 
        {
          if(empty($value) || trim($value) == '') {
            $errors[$key] = "Pole ".$key." nie może być puste";
          }
          $$key = $value;
        }
        if (!empty($errors) || sizeof($errors) != 0) 
        {
            session::set('errors', $errors);
            $commons->redirectTo(SITE_PATH.'add-admin.php');
        }

        if (!$admins->ArePasswordsSame($_POST['password'], $_POST['repassword'])) 
        {
            session::set('errors', ['Hasła się nie zgadzają.']);
            $commons->redirectTo(SITE_PATH.'add-admin.php');
        }

        unset($_POST['repassword']);


        if ($admins->adminExists($_POST['username'])) 
        {
            session::set('errors', ['Ta nazwa użytkownika jest już zajęta!']);
            $commons->redirectTo(SITE_PATH.'add-admin.php');
        }


        if (!$admins->addNewAdmin($username, $password)) 
        {
            session::set('errors', ['Wystąpił błąd w trakcie dodawania admina.']);
            $commons->redirectTo(SITE_PATH.'add-admin.php');
        }

        session::set('confirm', 'Admin został dodany!');
        $commons->redirectTo(SITE_PATH.'add-admin.php');

    }