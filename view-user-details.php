<?php
    require_once 'includes/header.php';

    if (!isset($_SESSION['admin_session']) )
    {
        $commons->redirectTo(SITE_PATH.'index.php');
    }

    $czlonekId = isset($_GET['id']) && intval($_GET['id']) > 0 ? intval($_GET['id']) : 0;

    if ($czlonekId > 0) {
        require_once ROOT."../includes/classes/admin-class.php";

        $admins     = new Admins($dbh);
        $czlonekDetails = $admins->getACzlonek($czlonekId);
    }
?>


<?php if (isset($czlonekDetails) && sizeof($czlonekDetails) > 0) : $czlonek = $czlonekDetails[0]; ?>
<h1><?= htmlentities(strip_tags($czlonek->imie))," ", htmlentities(strip_tags($czlonek->nazwisko)) ?></h1>
<hr>
<table width="100%" border="1">

<!--<tr>
    <td>Imię</td>
    <td>: <strong><?= htmlentities(strip_tags($czlonek->imie)) ?></strong> </td>
</tr>
<tr>
    <td>Nazwisko</td>
    <td>: <strong><?= htmlentities(strip_tags($czlonek->nazwisko)) ?></strong> </td>
</tr>
-->
<tr>
    <td colspan="2">
    <br>
    Data urodzenia:
        <?= htmlentities(strip_tags(nl2br($czlonek->data_ur))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    PESEL: 
        <?= htmlentities(strip_tags(nl2br($czlonek->PESEL))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Adres: 
        <?= htmlentities(strip_tags(nl2br($czlonek->adres))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Płeć: 
        <?= htmlentities(strip_tags(nl2br($czlonek->plec))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Sekcja: 
        <?= htmlentities(strip_tags(nl2br($czlonek->nazwa_sekcji))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Imiona rodziców: 
        <?= htmlentities(strip_tags(nl2br($czlonek->imie_ojca))), ", ",htmlentities(strip_tags(nl2br($czlonek->imie_matki))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Miejsce urodzenia : 
        <?= htmlentities(strip_tags(nl2br($czlonek->miejsce_ur))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Telefon : 
        <?= htmlentities(strip_tags(nl2br($czlonek->tel))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Telefon rodzica : 
        <?= htmlentities(strip_tags(nl2br($czlonek->tel_r))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Email : 
        <?= htmlentities(strip_tags(nl2br($czlonek->mail))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Klasa : 
        <?= htmlentities(strip_tags(nl2br($czlonek->klasa))) ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <br>
    Wychowawca : 
        <?= htmlentities(strip_tags(nl2br($czlonek->wychowawca))) ?>
    </td>
</tr>

</table>
    <br>
    <hr>
    <br>
<ul class="btns">
    <li><a href="edit-user.php?id=<?= $czlonek->id ?>" class="btn-1a">Edit</a></li>
    <li><a href="delete-user.php?id=<?= $czlonek->id ?>" class="btn-1a" onclick="return confirm('Na pewno chcesz go usunąć?');">Usuń</a></li>
    <li><a href="dashboard.php" class="btn-1a">Powrót do menu</a></li>
  </ul>


<?php else: ?>
<h3>Nie wybrano nikogo</h3>
<?php endif ?>