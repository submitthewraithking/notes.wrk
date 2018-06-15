<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="POST">
    <div>Edit note</div> <br>
    <input type="text" name="header_edit"  value = "<?php print_r($data[0]['header']) ?> "> <br>
    <input type="text" name="content_edit" value = "<?php print_r($data[0]['content']) ?> "> <br>
    <input type="radio" name="private_edit" value="private"> private
    <input type="submit" name="finish_edit_note" value = "edit!">
</form>
<form method="get" action = "http://localhost/my_notes" >
    <input type="submit" name="" value = "back"> <br>
</form>
</body>
</html>