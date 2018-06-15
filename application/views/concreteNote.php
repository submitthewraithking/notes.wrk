<?php
foreach ($data as $note) {
    print_r('date   :' . $note['date'] . '<br>');
    print_r('header :' . $note['header'] . '<br>');
    print_r('text   :' . $note['content'] . '<br>');
    print_r('private:' . $note['private'] . '<br>');
    print_r('id     :' . $note['id'] . '<br>');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="get" action = "http://localhost/my_notes/edit/<?php print_r($data[0]['id'])?>">
    <input type="submit" name="" value = "edit!"> <br>
</form>
<form method="get" action = "http://localhost/my_notes">
    <input type="submit" name="" value = "back!"> <br>
</form>

</body>
</html>