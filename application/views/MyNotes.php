<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form action="http://notes.wrk/my_notes" method="post">
    <div>New note</div> <br>
    <input type="text" name="header"  placeholder="header"> <br>
    <input type="text" name="content" placeholder="text"> <br>
    <input type="radio" name="private" value="private"> private
    <input type="submit" name="note_submit" value = "public this note"> <br>
</form>

<form method="post" action="http://notes.wrk/main">
    <input type="submit" name="to_all_notes" value = "to main page  "> <br>
</form>
</body>
</html>
<?php
$note = new \models\Note();
$val = $_SESSION['user_data'];
$login2 = $val[0];
$notes = $note->get_all_my_notes($login2);
$id_array = array();
$i = 0;
foreach ($notes as $note){
    print_r('date   :' . $note['date'] . '<br>');
    print_r('header :' . $note['name'] . '<br>');
    print_r('text   :' . $note['content']. '<br>');
    print_r('private:' . $note['private']. '<br>');
    print_r('id     :' . $note['id']. '<br>');
    echo "<input type=\"submit\" name=\"note_edit\" value = \"edit\">";
    echo "<input type=\"submit\" name=\"note_delete\" value = \"delete\">";

    $current_note = $note['id'];
    if ($note['private'] == 0){
        echo "<form method='get' name = 'edit_link' action='http://notes.wrk/main/' $current_note  >";
        echo "<a href='main/?edit=" . $note['id'] . "'>edit</a>";
        echo "</form>";
    }
    echo "</br>";
    echo "</br>";
}
?>