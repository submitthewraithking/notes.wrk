<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
</head>
<body>
<form method="post">
    <div>ALL NOTES</div> <br>
    <input type="submit" name="to_my_notes" value = "My notes"> <br>
</form>

<form method="POST" action="http://localhost/login"">
    <input type="submit" name="to_login" value = "logout"> <br>
</form>
</body>
</html>
<?php
echo "<pre>";
    foreach ($data as $note){
        print_r('user   :' . $note['username'] . '<br>');
        print_r('header :' . $note['header'] . '<br>');
        print_r('text   :' . $note['content']. '<br>');
        print_r('date   :' . $note['date'] . '<br>');
        echo "</br>";
    }
echo "</pre>";
?>

