<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    
    exit;
}
?>
<?php include 'css/style-index.css' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/style-index.css">
</head>
<body>
    <nav class="nav1">
        <ul>
            <li><a href="logout.php" onclick="return confirm('Do you want to logout?')"><button>Signout</button></a></li>
            <li class="nav"><a href="reset-password.php">Change Password</a></li>
            <li class="nav"><a href="contactUs.html">Contact Us</a></li>
            <li class="nav"><a href="index.php">Register</a></li>
            <li class="nav"><a href="search.php">Display</a></li>
            <li class="nav"><a href="welcome.php">Home</a></li>
            
        </ul>
    </nav>
    <div class="slider">
        <img class="img1" src="images/ethiopia.jpg" alt="image not loading">
        <h1>Mootummaa Naannoo Oromiyaatti <span> Bulchiinsa Magaalaa Galaan</span></h1>
        <img class="img2" src="images/oromiya.jpg" alt="img">
        <br>
    </div>
    <div class="quicky"><a href="index.php"><button>REGISTER</button></a></div>
    <footer class="main-footer">
        <p>Copyright &copy; 2021 Developers</p>
    </footer>

</body>

</html>