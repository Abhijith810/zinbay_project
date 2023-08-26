<?php
include "db.php";
$n = $_SESSION['username'];

//echo $n;
if (!isset($n)) {
  session_destroy();
  header('location:index.php');
}

if (!isset($n)) {
  session_destroy();
  header('location:login.php');
}

$sql1 = " SELECT * FROM `add_user` where username='$n'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
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
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">Navbar</a>
      <form class="d-flex" action="index.php">
        <button class="btn btn-outline-success" type="submit">Logout</button>
      </form>
    </div>
  </nav>
  <h2 align="center">View Profile</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Password</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row1['fname']; ?></td>
        <td><?php echo $row1['lname']; ?></td>
        <td><?php echo $row1['username']; ?></td>
        <td><?php echo $row1['email']; ?></td>
        <td><?php echo $row1['phone']; ?></td>
        <td><?php echo $row1['password']; ?></td>
        <td><a href="update_user.php?id=<?php echo $row1['id']; ?>">Update</a></td>
      </tr>
    </tbody>
  </table>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>