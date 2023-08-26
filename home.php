<?php
include "db.php";
$n = $_SESSION['username'];
if (!isset($n)) {
    session_destroy();
    header('location:index.php');
}

//echo $n;

$sql1 = "SELECT * FROM `add_user` WHERE type='1'";
$result1 = $conn->query($sql1);

$fil = array();
if ($result1->num_rows > 0) {
    while ($row1 = mysqli_fetch_array($result1)) {
        $fil[] = $row1;
    }
}

if (isset($_POST['fil_email'])) {
    $filter_email = filter_var($_POST['fil_email']);

    if ($filter_email) {
        $fil_email = array();
        foreach ($fil as $row2) {
            if ($row2['email'] === $filter_email) {
                $fil_email[] = $row2;
            }
        }

        $fil = $fil_email;
    }
}

if (isset($_POST['fil_name'])) {
    $sort_name = $_POST['fil_name'];

    if ($sort_name) {
        usort($fil, function($a, $b) {
            return strcmp($a['fname'] . ' ' . $a['lname'], $b['fname'] . ' ' . $b['lname']);
        });
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
    <h2 align="center">View users</h2>

    <form method="post">
        <label for="filter">Filter by Email:</label>
        <input type="text" id="email" name="fil_email" required>
        <button type="submit" name="submit" class="btn btn-primary">Apply Filter</button>
    </form>

    <br>

    <form method="post">
        <label for="Sort">Sort by Name:</label>
        <input type="submit" id="name" name="fil_name" class="btn btn-primary">
    </form>

    <br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Password</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <?php
        foreach ($fil as $row2) {
        ?>
            <tbody id="user">
                <tr>
                    <td><?php echo $row2['fname']; ?></td>
                    <td><?php echo $row2['lname']; ?></td>
                    <td><?php echo $row2['username']; ?></td>
                    <td><?php echo $row2['email']; ?></td>
                    <td><?php echo $row2['phone']; ?></td>
                    <td><?php echo $row2['password']; ?></td>
                    <td><a href="update_user.php?id=<?php echo $row2['id']; ?>" class="btn btn-primary">Update</a></td>
                    <td><a onclick="del(<?php echo $row2['id']; ?>)" class="btn btn-primary">delete</a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>

    <script>
        function del(id) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_user.php?id=" + id;
            }
        }
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>


</html>