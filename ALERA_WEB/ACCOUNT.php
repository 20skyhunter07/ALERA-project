<?php
include("logic.php");
$conn = mysqli_connect("localhost","root","","activity_db") or die (mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/calendar.css">
    <script src="JS/calendar.js" defer></script>
    <link rel="stylesheet" href="CSS/size.css">
    <link rel="stylesheet" href="CSS/account.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT</title>
</head>
<body>
    <div class="header">
        <h1>ACCOUNT</h1>
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
        <?php
        $query = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $query);

        while($row=mysqli_fetch_array($result)){
            $usertable[]= [
                "ID" => $row["UserID"],
                "USERNAME" => $row["Username"],
                "PASSWORD" => $row["Password"],
                "USERTYPE" => $row["Usertype"]];
        }?>
        <table>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>USERTYPE</th>
            </tr>
            <?php
            foreach($usertable as $id=>$val){
                echo "<tr>";
                echo "<td>".$val['ID']."</td>";
                echo "<td>".$val['USERNAME']."</td>";
                echo "<td>".$val['PASSWORD']."</td>";
                echo "<td>".$val['USERTYPE']."</td>";
                echo "</tr>";}
            ?>
        </table>
    </div>
    <div class="footer">
        <h1>footer</h1>


    </div>
</body>
</html>