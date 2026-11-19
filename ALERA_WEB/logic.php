<?php
$conn = mysqli_connect("localhost","root","","activity_db") or die (mysqli_error());
    if(isset($_POST['submit'])){
        $a=$_POST["user_name"];
        $b=$_POST["password"];
        $c=$_POST["usertype"];
        $sql="INSERT INTO user (username,password,usertype) VALUE('$a','$b','$c')";
        mysqli_query($conn, $sql);
        header("Location:FORM.php");
    }
        if (isset($_POST['cancel'])){
            header("Location:index.php");
        }
?>