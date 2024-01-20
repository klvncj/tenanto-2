<?php
require_once('../config/connect.php');
if (isset($_GET['id'])) {
    $list_id = $_GET['id'];
    $response = delete('listings','listing_id',$list_id);
    if ($response === true) {
        echo "<script>window.history.back();</script>";
    } else {
        echo "<script>Alert('Failed to delete')</script>";
    }
}else{
    header("Location: logout.php");  
}