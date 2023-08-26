<?php
include 'db.php';


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

        $sql2 = "INSERT INTO `add_user`(`fname`, `lname`, `username`, `email`, `phone`, `password`) VALUES ('$fname','$lname','$username','$email','$phone','$password')";
        $reg_query = mysqli_query($conn, $sql2);
        echo '<script> alert ("Account created");</script>';
        echo '<script>window.location.href="login.php";</script>';
    } else {
        echo '<script> alert ("username  already exists!");</script>';
        echo '<script>window.location.href="add_user.php";</script>';
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



<script>
    //fname
    function Validstr1() {
        var val = document.getElementById('name').value;
        if (!val.match(/^[A-Za-z]+$/)) {
            document.getElementById('msg').innerHTML = "Only alphabets are allowed";
            document.getElementById('name').value = val;
            document.getElementById('name').style.color = "red";
            return false;
            flag = 1;
        } else {
            document.getElementById('msg').innerHTML = " ";
            document.getElementById('name').style.color = "green";
            //return true;

        }
    }


    //lname
    function Validstr2() {
        var val = document.getElementById('lname').value;
        if (!val.match(/^[A-Za-z]+$/)) {
            document.getElementById('msg3').innerHTML = "Only alphabets are allowed";
            document.getElementById('lname').value = val;
            document.getElementById('lname').style.color = "red";
            return false;
            flag = 1;
        } else {
            document.getElementById('msg3').innerHTML = " ";
            document.getElementById('lname').style.color = "green";
            //return true;

        }
    }
    //username
    // function Validstr() {
    //                                                             var val = document.getElementById('username').value;
    //                                                             if (!val.match(/^[A-Za-z]+$/))
    //                                                             {
    //                                                             document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
    //                                                                     document.getElementById('username').value = val;
    //                                                                     document.getElementById('username').style.color = "red";
    //                                                                     return false;
    //                                                                     flag=1;
    //                                                             }
    //                                                             if(val.length<4||val.length>10){
    //                                                             document.getElementById('msg1').innerHTML="Username between 4 to 10 characters";
    //                                                                     document.getElementById('username').value = val;
    //                                                                     document.getElementById('username').style.color = "red";
    //                                                                     return false;
    //                                                                     flag=1;
    //                                                             }else{
    //                                                                 jQuery.ajax({
    //                                                                     url: "ajax.php",
    //                                                                     type: "POST",

    //                                                                     data:'username='+$("#username").val(),
    //                                                                     success:function(response){
    //                                                                     $("#msg1").html(response);

    //                                                                     },
    //                                                                     error:function (){                                                                       
    //                                                                     }
    //                                                                 }); 


    //                                                             }
    //                                                             document.getElementById('msg1').innerHTML=" ";
    //                                                             document.getElementById('username').style.color = "green";
    //                                                             //return true;


    //                                                         }


    //email

    function Validateemail() {
        var email = document.getElementById('email').value;
        var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
        if (email.length < 3 || email.length > 40) {
            document.getElementById('email1').innerHTML = "Invalid Email";
            document.getElementById('email').value = email;
            document.getElementById('email').style.color = "red";
            return false;
        }
        if (!email.match(/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/)) {
            document.getElementById('email1').innerHTML = "Please enter a valid email";
            document.getElementById('email').value = email;
            document.getElementById('email').style.color = "red";
            return false;
        } else {
            document.getElementById('email1').innerHTML = " ";
            document.getElementById('email').style.color = "green";
            // return true;
        }
    }
    //phone

    function Validphone() {
        var val = document.getElementById('phone').value;
        if (!val.match(/^[789][0-9]{9}$/)) {
            document.getElementById('msg2').innerHTML = "Only Numbers are allowed and must contain 10 number";
            document.getElementById('phone').value = val;
            return false;
        } else {
            document.getElementById('msg2').innerHTML = "";
            //   return true;
        }
    }
    //password

    function Password() {
        var pass = document.getElementById('password').value;
        //var patt= /^(?=.[0-9])(?=.[!@#$%^&])[A-Za-z0-9!@#$%^&]{7,15}$/;
        //var patt = /^[a-zA-Z0-9@#$%^&]{7,15}$/;
        var patt = /^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{7,15}$/;

        if (!pass.match(patt)) {
            console.log(pass);
            document.getElementById('pass').innerHTML = "Password must be 7 to 15 character with number and special character ";
            document.getElementById('password').value = pass;
            document.getElementById('password').style.color = "red";
            return false;
        } else {
            console.log(pass, "Green");
            document.getElementById('pass').innerHTML = " ";
            document.getElementById('password').style.color = "green";
            //return true;
        }
    }

    function Val() {
        if (Validstr1() === false || Validstr2() === false || Validstr() === false || ValidateEmail() === false || Validphone() == false || Password() === false) {
            return false;
        }
    }
</script>


<body>
    <h2 align="center">User Registration</h2>
    <form class="user" method="post" onsubmit="return Val();">
        <div class="form-group">
            <label for="exampleInputEmail1">Fname</label>
            <input type="text" class="form-control form-control-user" id="name" name="fname" placeholder="First Name" onkeyup="return Validstr1()" />
        </div>
        <span id="msg" style="color:red;"></span>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Lname</label>
            <input type="text" class="form-control form-control-user" id="lname" name="lname" placeholder="Last name" onkeyup="return Validstr2();" />
        </div>
        <span id="msg3" style="color:red;"></span>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
        </div>
        <!-- <span id="msg1" style="color:red;"></span> -->
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" onkeyup="return Validateemail();" />
        </div>
        <span id="email1" style="color:red;"></span>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Phone" onkeyup="return Validphone()" ; />
        </div>
        <span id="msg2" style="color:red;"></span>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" onkeyup="return Password();" />
        </div>
        <span id="pass" style="color:red;"></span>
        <br>
        <button type="submit" class="btn btn-primary" name="submit" align="center">Submit</button>
    </form>


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>