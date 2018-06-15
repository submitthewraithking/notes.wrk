<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="POST">
    <div>Edit user</div> <br>
    <input type="text" name="login_edit"  value = "<?php print_r($data[0]['login']) ?> "> <br>
    <input type="text" name="pass_edit" value = "" placeholder = 'new password'> <br>
    <input type="text" name="repeat_pass_edit" value = "" placeholder = 'repeat new password'> <br>
    <input type="text" name="email_edit" value = "<?php print_r($data[0]['email']) ?> "> <br>
    role:
    <input type="radio" name="1_user" value="1_user"> user
    <input type="radio" name="2_redactor" value="2_redactor"> redactor
    <input type="radio" name="3_admin" value="3_admin"> admin
    <input type="submit" name="finish_edit_user" value = "edit user">
</form>
<form method="get" action = "http://localhost/main/all_users">
    <input type="submit" name="" value = "back"> <br>
</form>
</body>
</html>
