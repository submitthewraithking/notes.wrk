<?php
echo "<pre>";
foreach ($data as $user) {
    $current_login = $user['login'];
    $current_user = $user['id'];
    echo "login    :<a href='http://localhost/note/$current_login'>$current_login</a><br>";
    print_r('email    :' . $user['email'] . '<br>');
    print_r('name     :' . $user['name'] . '<br>');
    print_r('surname  :' . $user['surname'] . '<br>');
    print_r('role     :' . $user['role'] . '<br>');
    print_r('blocked? :' . $user['Blocked_by_admin'] . '<br>');

    echo "<form  action='http://localhost/main/all_users/edit/$current_login' method = 'post'>";
    echo "<input type=\"submit\" name=\"user_edit\" value = \"edit\">";
    echo "</form>";
    echo "<form action='http://localhost/main/all_users/delete/$current_login' method = 'post'>";
    echo "<input type=\"submit\" name=\"user_delete\" value = \"delete\">";
    echo "</form>";
}
?>