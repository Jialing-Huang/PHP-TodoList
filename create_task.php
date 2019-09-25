<?php
require ("includes/functions.php");

if (isset($_GET['task_name']) && isset($_GET['task_description']) && !empty($_GET['task_name']) && !empty($_GET['task_description'])){
    DB::insert('todo_items', array('name'=>$_GET['task_name'],'date_added'=>DB::sqleval("CURTIME()"),'description'=> $_GET['task_description'],'completed'=>'0','ip_address'=>'192.168.0.1'));
    header("Location: index.php");
};

echo $twig->render("task_form.htm");

?>