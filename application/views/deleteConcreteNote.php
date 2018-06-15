<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
    <div>Delete this note?</div> <br>
    <input type="submit" name="yes_delete" value = "yes"> <br>
    <input type="submit" name="no_delete" value = "no"> <br>
</form>
</body>
</html>
<?php
foreach ($data as $note) {
    print_r('date   :' . $note['date'] . '<br>');
    print_r('header :' . $note['header'] . '<br>');
    print_r('text   :' . $note['content'] . '<br>');
    print_r('private:' . $note['private'] . '<br>');
    print_r('id     :' . $note['id'] . '<br>');
}
?>