<?php
include 'db.php';
$n = $_SESSION['username'];
if (!isset($n)) {
    session_destroy();
    header('location:index.php');
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql11 = "SELECT * FROM `add_user` WHERE `id`='$id'";
    $rslt11 = mysqli_query($conn, $sql11);
    $row1 = $rslt11->fetch_assoc();
}

if (isset($_POST['submit'])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $sql1 = "SELECT * FROM `add_user` WHERE `username`='$username'";
    $rslt1 = mysqli_query($conn, $sql1);
    $rslt2 = mysqli_num_rows($rslt1);

    if ($rslt2 == 0) {

        $sql2 = "UPDATE `add_user` SET `fname`='$fname', `lname`='$lname', `username`='$username', `email`='$email', `phone`='$phone', `password`='$password' WHERE `id`='$id'";
        $reg_query = mysqli_query($conn, $sql2);

        echo '<script> alert ("Account Updated");</script>';
        echo '<script>window.location.href="login.php";</script>';
    } else {
        echo '<script> alert ("username  already exists!");</script>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body>
    <h2 align="center">User Registration</h2>



    <form class="user" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Fname</label>
            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row1['fname']; ?>" aria-describedby="emailHelp" placeholder="Enter First Name">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Lname</label>
            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row1['lname']; ?>" aria-describedby="emailHelp" placeholder="Enter Last Name">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row1['username']; ?>" aria-describedby="emailHelp" placeholder="Enter Username">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row1['email']; ?>" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row1['phone']; ?>" aria-describedby="emailHelp" placeholder="Enter Phone">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $row1['password']; ?>" id="password" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit" align="center">Update</button>
    </form>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>