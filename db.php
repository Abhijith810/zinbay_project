<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="prjt";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{ 
    die("connection failed".$conn->connect_error);  
}
// else{ 
//     echo "success";
// }
?>