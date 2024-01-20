<?php
session_start();
try {
    $link = mysqli_connect('localhost', 'root', '', 'eric');
} catch (\Throwable $th) {
    echo "Error";
}
require_once("function.php");
?>