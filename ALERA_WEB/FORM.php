<?php
$conn = mysqli_connect("localhost","root","","activity_db") or die (mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/calendar.css">
    <script src="JS/calendar.js" defer></script>
    <link rel="stylesheet" href="CSS/size.css">
    <link rel="stylesheet" href="CSS/form.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <div class="header">
        <h1>LOG IN</h1>
        <div class="calendar-container">
            <!-- Header-->
            <div class="calendar-header">
                <button class="nav-btn" id="prevMonth">&lt;</button>
                <h2 id="monthYearDisplay"></h2>
                <button class="nav-btn" id="nextMonth">&gt;</button>
            </div>
            
            <!-- Body Layout-->
            <div class="calendar-body">
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days" id="daysGrid"></div>
            </div> 
        </div>
    </div>
    <div class="navibar">
        <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="ABOUT.HTML">ABOUT</a></li>
                <li><a href="SETTING.HTML">SETTING</a></li>
                <li><a href="CONTACT.HTML">CONTACT</a></li>
                <li><a href="ACCOUNT.php">ACCOUNT</a></li>
                <li><a href="FORM.php">FORM</a></li>
            </ul>
    </div>
    <div class="leftbox">
        <h1>leftbox</h1>


    </div>
<div class="article">
    <main class="login-container">

    <form class="login-box" method="POST">

        <h1>Welcome Back</h1>
        <p class="subtitle">Sign in to continue</p>
        
        <div class="input-group">
            <input type="text" id="username" name="username"
                   placeholder=" " required>
            <label for="username">Username</label>
        </div>

        <div class="input-group">
            <input type="password" id="password" name="password"
                   placeholder=" " required>
            <label for="password">Password</label>
        </div>

        <div class="input-group">
            <input type="text" id="usertype" name="usertype"
                   placeholder=" " required>
            <label for="usertype">Usertype</label>
        </div>

        <div class="options">
            <label class="remember">
                <input type="checkbox">
                <span>Remember me</span>
            </label>

            <a href="#">Forgot password?</a>
        </div>

        <button type="submit" name="Login" class="login-btn">
            Login
        </button>

        <p class="register">
            Don't have an account?
            <a href="#">Register</a>
        </p>

    </form>

    </main>
    <?php
    if(isset($_POST['Login'])){
        $a=$_POST["username"];
        $b=$_POST["password"];
        $c=$_POST["usertype"];
        $sql="INSERT INTO user (Username,Password,Usertype) VALUE('$a','$b','$c')";
        mysqli_query($conn, $sql);
        header("Location:FORM.php");
    }
        if (isset($_POST['cancel'])){
            header("Location:index.php");
        }
?>
</div>
    <div class="footer">
        <h1>footer</h1>


    </div>
</body>
</html>