<!DOCTYPE html>
<html>
<body>

<h2>Wyślij wiadomość orkiestrantom:</h2>

<form action="send-mail-action.php/" method="post">
    <br/>
    Tytuł wiadomości:
    <input type="text" name="title" placeholder="Ważny tytuł!"><br>
    <br/>
    Treść:<br>
    <textarea id="content" name="content"
               placeholder="Wpisz wiadomość tutaj..."
               style="height:200px; width: 400px;"></textarea><br/>
    <input type="submit" value="Wyślij!" name="submit">
</form>

</body>
</html>
