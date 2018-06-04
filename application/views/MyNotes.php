<?php

$notes = $notes->get_all_private_notes();
foreach ($notes as $note){
    print_r('user   :' . $note['username'] . '<br>');
    print_r('header :' . $note['name'] . '<br>');
    print_r('text   :' . $note['content']. '<br>');
    print_r('date   :' . $note['date'] . '<br>');
    echo "</br>";
}
?>