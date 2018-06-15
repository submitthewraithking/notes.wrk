<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="get" action = 'http://localhost/main/all_users'>
    <input type="submit" name="" value = "all_users"> <br>
</form>
<form method="get" action = 'http://localhost/my_notes'>
    <input type="submit" name="" value = "My notes"> <br>
</form>
</body>
</html>
<?php
echo "<pre>";
foreach ($data as $note) {
    $current_header = $note['header'];
    $current_note = $note['id'];
    print_r('date   :' . $note['date'] . '<br>');
    print_r('user   :' . $note['username'] . '<br>');
    echo "header: <a href='http://localhost/note/$current_note'>$current_header</a><br>";
    print_r('text   :' . $note['content'] . '<br>');
    print_r('private:' . $note['private'] . '<br>');
    print_r('id     :' . $note['id'] . '<br>');

    echo "<form  action='http://localhost/my_notes/edit/$current_note' method = 'post'>";
    echo "<input type=\"submit\" name=\"note_edit\" value = \"edit\">";
    echo "</form>";
    echo "<form action='http://localhost/my_notes/delete/$current_note' method = 'post'>";
    echo "<input type=\"submit\" name=\"note_delete\" value = \"delete\">";
    echo "</form>";
echo "</pre>";
}
?>
