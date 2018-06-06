
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
    <div>Edit note</div> <br>
    <input type="text" name="header"  placeholder="header"> <br>
    <input type="text" name="content" placeholder="text"> <br>
    <input type="radio" name="private" value="private"> private
    <input type="submit" name="finish_edit_note" value = "edit!">
</form>
<form method="get" action="http://notes.wrk/my_notes">
    <input type="submit" name="to_my_notes1" value = "back"> <br>
</form>
</body>
</html>