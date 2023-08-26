<?php
include 'db.php';
$n = $_SESSION['username'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql11 = "DELETE FROM `add_user` WHERE `id`='$id'";
    $rslt11 = mysqli_query($conn, $sql11);
    if ($rslt11) {
        header('Location:home.php');
    }
}
