<?php
$host_name="localhost";
$host_user="root";
$host_past="root";
$db_name="mm";
$test_user="test_user";
$test_table="test_table";
$end_table="end_table";
$mysqli=new mysqli($host_name,$host_user,$host_past,$db_name);
$mysqli->query("set names 'utf8'");
?>
