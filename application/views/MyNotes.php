<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form action="http://localhost/my_notes" method="post">
    <div>New note</div> <br>
    <input type="text" name="header"  placeholder="header"> <br>
    <input type="text" name="content" placeholder="text"> <br>
    <input type="radio" name="private" value="private"> private
    <input type="submit" name="note_submit" value = "public this note"> <br>
</form>

<form method="get">
    <input type="submit" name="to_all_notes" value = "to main page  "> <br>
</form>
</body>
</html>
<?php
foreach ($data as $note){
    $current_header = $note['header'];
    $current_note = $note['id'];
    print_r('date   :' . $note['date'] . '<br>');
    echo "header: <a href='http://localhost/note/$current_note'>$current_header</a><br>";
    print_r('text   :' . $note['content']. '<br>');
    print_r('private:' . $note['private']. '<br>');
    print_r('id     :' . $note['id']. '<br>');
    echo "<form  action='http://localhost/my_notes/edit/$current_note' method = 'post'>";
    echo "<input type=\"submit\" name=\"note_edit\" value = \"edit\">";
    echo "</form>";
    echo "<form action='http://localhost/my_notes/delete/$current_note' method = 'post'>";
    echo "<input type=\"submit\" name=\"note_delete\" value = \"delete\">";
    echo "</form>";
}
?>