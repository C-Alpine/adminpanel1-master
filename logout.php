<?php
    require_once 'includes/header.php';

    if (isset($_SESSION['admin_session']) )
    {
        session::destroy('admin_session');
        $commons->redirectTo(SITE_PATH.'index.php');
    }