<?php
    require_once 'includes/header.php';

    if (!isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    $czlonekId = isset($_GET['id']) && intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

    if ($czlonekId > 0) 
    {
        require_once ROOT."../includes/classes/admin-class.php";

        $admins     = new Admins($dbh);
        $czlonekDetails = $admins->deleteCzlonek($czlonekId);

      
        $commons->redirectTo(SITE_PATH.'list-users.php');
    }
    
