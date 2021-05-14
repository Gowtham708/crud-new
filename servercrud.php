<? require_once 'index3.php'; ?>    
<?php
session_start();
//initialize variables
$name="";
$city="";
$id=0;
$edit_state = false;
//connect to database
$con=mysqli_connect('localhost','root','','Gowtham');

//IF SUBMIT IS CLICKED
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $city=$_POST['city'];

    $sql="INSERT INTO crud(name,city) VALUES('$name','$city')";
    mysqli_query($con,$sql);
    $_SESSION['msg']="Address Saved";
    header('location:index3.php');//redirect to index page after inserting
}
//update records
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $city=$_POST['city'];
    $id=$_POST['id'];
     $sql="UPDATE crud SET name='$name',city='$city' WHERE id=$id";
     mysqli_query($con,$sql);
    $_SESSION['msg']="Address Updated";
    header('location:index3.php');
}
//delete records
if(isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($con,"DELETE from crud WHERE id=$id");
    $_SESSION['msg']="Address Deleted";
    header('location:index3.php');
}




//retrieve records
$result=mysqli_query($con,"select * from crud");


?>